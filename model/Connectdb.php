<?php
/**
 * Created by PhpStorm.
 * User: Ezechiel Gnepa
 * Date: 2015-05-08
 * Time: 16:28
 */

class Connectdb {
    private $host="localhost";
    private $bdd='db_janetTransforme';
    private $user="root";
    private $passe='';
    public $dbcnx;
    public function __construct(){
        try{
            $chaine="mysql:host=$this->host;dbname=$this->bdd";
            $this->dbcnx=new PDO($chaine,$this->user,$this->passe);
            $this->dbcnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->dbcnx->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, " SET NAMES 'UTF8' ");
        }
        catch(PDOException $ex){
            print"Erreur!" .$ex->getMessage();
        }
    }
}