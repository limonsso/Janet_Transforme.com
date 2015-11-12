<?php
/**
 * Created by PhpStorm.
 * User: Ezechiel Gnepa
 * Date: 2015-05-20
 * Time: 23:29
 */

class ClassPortfolio extends Connectdb {
public $monportfolio;

    public function  Remplir()
    {
        $rec="SELECT id,img_path,caption FROM portfolio";
        try{
            $select=$this->dbcnx->prepare($rec);
            $select->execute() or die(print_r("Echec à la tentative d'injection",true));
            $this->monportfolio=$select->fetchAll();
        }
        catch(PDOException $e){
            echo 'Erreur :'.$e->getMessage();
        }
    }
    public function AddNew($img,$caption){
        $rec="INSERT INTO portfolio VALUES ('',?,?,now())";
        try{
            $select=$this->dbcnx->prepare($rec);
            $select->bindParam(1, $img, PDO::PARAM_INT);
            $select->bindParam(2, $caption, PDO::PARAM_INT);
            $select->execute() or die(print_r("Echec à la tentative d'injection",true));
            return $select;
        }catch (PDOException $e){
            echo 'Erreur :'.$e->getMessage();
        }
    }

    /***
     * @param $img
     * @return PDOStatement
     */
    public function delete($img){
        $rec="DELETE FROM portfolio WHERE img_path=:image";
        try{
            $select=$this->dbcnx->prepare($rec);
            $select->bindParam(':image', $img, PDO::PARAM_INT);
            $select->execute() or die(print_r("Echec à la tentative d'injection",true));
            return $select;
        }catch (PDOException $e){
            echo 'Erreur :'.$e->getMessage();
        }
    }

    /**
     * @param $img_src_chemin
     * @param $longueur (w de redim)
     * @param $largeurde (h de redim)
     * @param $dst_chemin (destination)
     */
    public function RedimImg($img_src,$extension,$longueur,$largeur,$dst_chemin){
        //ETAPE 1 Ouvrir l’image

        $extension = strtolower($extension);
        // Afin de simplifier les comparaisons, on met tout en minuscule
        //ETAPE 2 Créer l’image de destination
        switch ( $extension ) {
            case "jpg":
            case "jpeg": //pour le cas où l'extension est "jpeg"
                $img_src_resource =imagecreatefromjpeg($img_src );
                break;

            case "gif":
                $img_src_resource =imagecreatefromgif($img_src );
                break;

            case "png":
                $img_src_resource =imagecreatefrompng( $img_src );
                break;

            // On peut également ouvrir les formats wbmp, xbm et xpm (vérifier la configuration du serveur)
            default:
                echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";
                exit;
                break;
        }
        //ETAPE 3 Redimensionner
        //Pour créer une image de destination de 100 pixels de large sur 200 de haut
        $img_dst_resource = imagecreatetruecolor( $largeur, $longueur );
        // getimagesize renvoie un tableau
        // Ce tableau contient la largeur, la hauteur, un entier représentant le type d'image, et
        // une chaîne width/height pouvant être insérée dans une balise img.
        //  Je vous laisse lire la documentation pour les détails techniques
        list( $img_src_width, $img_src_height ) = getimagesize($img_src);

        // Vérifions tout d'abord que nous pouvons enregistrer le fichier
        /*Deux fonctions permettent de redimensionner une image, imagecopyresized et imagecopyresampled. La première est plus
         rapide mais moins précise et donne un résultat moins fin. Toutes deux demandent les 10 paramètres suivants :
        1.L’image de destination (une ressource, pas un chemin),
        2.L’image d’origine (une ressource aussi),
        3.Les coordonnées horizontales du point où commencer l’écriture,
        4.Les coordonnées verticales du point où commencer l’écriture,
        5.Les coordonnées horizontales du point où commencer la lecture,
        6.Les coordonnées verticales du point où commencer la lecture,
        7.La largeur de l’image de destination,
        8.La hauteur de l’image de destination,
        9.La largeur de l’image d’origine,
        10.La hauteur de l’image d’origine.
        Pour recopier une image sans décalage, mettre 0 pour les paramètres 3 à 6.*/
        imagecopyresized($img_dst_resource,$img_src_resource,0,0,0,0,$largeur,$longueur,$img_src_width,$img_src_height);
        //imagecopyresized($img_dst_resource,$img_src_resource,0,0,0,0,$largeur,$longueur,$img_src_width,$img_src_height);
        //imagejpeg( $img_src_resource, $dst_chemin);
        //ETAPE 4 Enregistrer l’image modifiée

        switch ( $extension ) {
            case "jpg":
            case "jpeg": //pour le cas où l'extension est "jpeg"
            // Pour enregistrer au format jpg
            imagejpeg( $img_dst_resource, $dst_chemin.".jpg" );
            // Un troisième argument, facultatif, est la qualité. Elle est de 75 par défaut.
                break;

            case "gif":
                imagegif( $img_dst_resource, $dst_chemin."gif");
                break;

            case "png":
                imagepng( $img_dst_resource, $dst_chemin."png");
                break;
        }
    }

}