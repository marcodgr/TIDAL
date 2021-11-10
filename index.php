<?php
session_start();

require_once 'utils/smarty.php';

// get the HTTP method, path and body of the request
if(isset($_SERVER['PATH_INFO'])){
    $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
} else {
    $request = [];
}


if(isset($_SESSION["user_id"])){
    $smarty->assign("user_id", $_SESSION["user_id"]);
}

if (array_key_exists(0, $request)) {
    
        switch ($request[0]) {
            case 'login':
                require_once 'view/connexion.php';
                break;
            case "signup":
                require_once 'view/inscription.php';
                break;
            case "accueil":
                require_once 'view/accueil.php';
                break;
            case "logout":
                require_once 'view/deconnexion.php';
                break;
            case "api":
                require_once 'view/api.php';
                break;
            default:
                echo "Page introuvable.";
                http_response_code(404);
                exit();
        }

    
} else {
    require_once 'view/accueil.php';
}
/*
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
} elseif ($_GET["page"] == "api") {
    require_once 'utils/api.php';
} */
