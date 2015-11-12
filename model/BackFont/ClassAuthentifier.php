<?php
/**
 * Created by PhpStorm.
 * User: Ezechiel Gnepa
 * Date: 2015-05-08
 * Time: 21:08
 */

class ClassAuthentifier extends Connectdb
{
    public  $login;
    public  $passwd;
    public $user;

    public function Authentifier($login,$passwd){
        $this->user=null;
        $login=addslashes(strtolower($login));
        echo $login." ".$passwd;
        $query = "SELECT *,COUNT(*) AS nbr FROM Admin WHERE login='$login' AND passwd='$passwd'";
        try{
            $select=$this->dbcnx->prepare($query);
            $select->execute() or die(print_r("Echec à la tentative d'injection",true));
            $result=$select->fetch();
            if($result['nbr']==1){
                $this->user=$result['Nom']." ".$result['Prenom'];
                return $result['nbr'];
            }else{
                return $result['nbr'];
            }

        }catch (PDOException $e){
            echo 'Erreur :'.$e->getMessage();
        }

    }
}