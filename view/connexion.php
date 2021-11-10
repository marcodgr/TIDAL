<?php

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
        $_SESSION["user_id"] = $user->email;
        header('Status: 301 Moved Permanently', false, 301);      
        header("Location: /index.php");
    } else {
        // Si mauvaise connexion
        header('Status: 301 Moved Permanently', false, 301);      
        header("Location: /index.php/login");
        $_SESSION['error'] = "mdp";
        exit();
    }
    
} else {
    echo "Method not allowed";
    http_response_code(405);
}

