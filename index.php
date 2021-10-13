<?php
session_start();

require_once 'utils/smarty.php';

if(isset($_SESSION["user_id"])){
    $smarty->assign("user_id", $_SESSION["user_id"]);
}

if (!isset($_GET["page"]) || $_GET["page"] == "accueil"){
    require_once 'view/accueil.php';
} elseif ($_GET["page"] == "login") {
    require_once 'view/connexion.php';
} elseif ($_GET["page"] == "signin") {
    require_once 'view/inscription.php';
} elseif ($_GET["page"] == "main") {
    require_once 'view/accueil.php';
} elseif ($_GET["page"] == "logout") {
    require_once 'view/deconnexion.php';
}
