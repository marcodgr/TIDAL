<?php
require("/usr/local/lib/php/Smarty/Smarty.class.php");


$smarty = new Smarty();


$smarty->assign("titre", "test");

$smarty->display("templates/index.tpl");
