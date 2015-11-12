<?php
/**
 * Created by PhpStorm.
 * User: Ezechiel Gnepa
 * Date: 2015-05-10
 * Time: 00:49
 */

class ClassInfoUser extends Connectdb
{

//defini le statu de l'administrateur(connecté/deconnecté)
    public function statu($session,$statu){

        $rec="UPDATE admin SET statu='$statu', last_cnx=now() WHERE Nom='$session'";
        try{
            $select=$this->dbcnx->prepare($rec);
            $select->execute() or die(print("echec"));
            return $select;
        }
        catch(PDOException $e){
            echo 'Erreur :'.$e->getMessage();}
    }
}