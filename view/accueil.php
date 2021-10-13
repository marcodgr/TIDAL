<?php
require_once 'utils/smarty.php';

$smarty->assign("titre", "Bienvenue");




$base = new Base();
$base->getPatho($base->getDbh());
$base->getMeridien($base->getDbh());


//$base->afficheMeridien();

//$taille = sizeof($base->$this->tableauPatho);
//for($i=0;$i<$base->getTaille();$i++){
//$smarty->assign('patho', $base->getTabPatho()[0]->getIdp());
$smarty->assign('pathos', $base->getTabPatho());



$smarty->display("templates/accueil.tpl");
?>
