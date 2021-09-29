<?php

require_once 'utils/smarty.php';


if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $smarty->assign("titre", "Inscription");

    $smarty->display("templates/inscription.tpl");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);
} else {
    echo "Method not allowed";
    http_response_code(405);
}