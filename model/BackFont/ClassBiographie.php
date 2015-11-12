<?php
/**
 * Created by PhpStorm.
 * User: Ezechiel Gnepa
 * Date: 2015-05-15
 * Time: 23:41
 */

class ClassBiographie extends Connectdb{
    public $contenuInsert;
    public $contenuRead;
    public $imgBio;
    public $imgBioRead;
    public $date_MaJ;
    public function MaJ()
    {
        $rec="UPDATE biographie SET Content=:Contenu, img_path=:imgBio, date_MaJ=now() WHERE id=1 ";
        try{
            $select=$this->dbcnx->prepare($rec);
            $select->bindParam(':Contenu', $this->contenuInsert, PDO::PARAM_INT);
            $select->bindParam(':imgBio', $this->imgBio, PDO::PARAM_INT);
            $select->execute() or die(print("Echec à la tentative d'injection"));
            return $select;
        }
        catch(PDOException $e){
            echo 'Erreur :'.$e->getMessage();
        }
    }
public function  affichage()
{
    $rec="SELECT content,img_path,date_MaJ FROM biographie  WHERE id=1 ";
    try{
        $select=$this->dbcnx->prepare($rec);
        $select->execute() or die(print_r("Echec à la tentative d'injection",true));
        $result=$select->fetch();
        $this->contenuRead=$result['content'];
        $this->imgBioRead=$result['img_path'];
        $this->date_MaJ='<br/><em style="font-size:11px;">Date de  de derniere mise à jour :'.$result['date_MaJ'].'</em><br/>';
       // echo $this->contenuRead ;

    }
    catch(PDOException $e){
        echo 'Erreur :'.$e->getMessage();
    }
}
}