<?php



if (!isset($_GET["page"]) || $_GET["page"] == "accueil"){
    require_once 'view/accueil.php';
} elseif ($_GET["page"] == "login") {
    require_once 'view/connexion.php';
}
