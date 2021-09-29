<?php
require_once 'utils/smarty.php';

$smarty->assign("titre", "Bienvenue");

$smarty->display("templates/accueil.tpl");

