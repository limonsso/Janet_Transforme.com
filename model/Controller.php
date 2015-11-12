<?php
/**
 * Created by PhpStorm.
 * User: Ezechiel Gnepa
 * Date: 2015-05-08
 * Time: 16:51
 */
require_once("model/Connectdb.php"); //Connexion a la BD
/**
 * LA PARTIE CONTROLER DE NOTRE APPLICATION BACKEND / FONTEND
 *
 */

// On Charge toutes nos classe de facon dymanique

function chargerClasse($classname)
{
    require('model/BackFont/'.$classname.'.php');
}

spl_autoload_register("chargerClasse");
$Bio=new ClassBiographie();
$Bio->affichage();
$identite = new ClassAuthentifier();
$user_cnx = new ClassInfoUser();
$portfolio=new ClassPortfolio();
?>