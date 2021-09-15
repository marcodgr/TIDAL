<?php
require("/usr/local/lib/php/Smarty/Smarty.class.php");


$smarty = new Smarty();


//$smarty->assign("titre", "Nsm les pede");

$smarty->display("templates/index.tpl");

phpinfo();
