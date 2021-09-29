<?php

session_start();

require_once 'utils/smarty.php';

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $smarty->assign("titre", "Connexion");
    
    if(isset($_SESSION["error"])){    
        $smarty->assign("error", $_SESSION["error"]);
        unset($_SESSION["error"]);
    }
    
    $smarty->display("templates/connexion.tpl");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once 'model/Utilisateur.php';
    
    $user = new Utilisateur($_POST["email"], $_POST["mdp"]);
    
    if($user->verifConnexion()){
        echo "Félicitation";
    } else {
        // Si mauvaise connexion
        header('Status: 301 Moved Permanently', false, 301);      
        header("Location: /index.php?page=login");
        $_SESSION['error'] = "mdp";
        exit();
    }
    
} else {
    echo "Method not allowed";
    http_response_code(405);
}
