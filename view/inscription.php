<?php
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $smarty->assign("titre", "Inscription");

    $smarty->display("templates/inscription.tpl");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once 'model/Utilisateur.php';
    if(isset($_POST['email']) && isset($_POST["password"])){
        $user = new Utilisateur($_POST["email"], $_POST["password"]);

        $result = $user->insertUtilisateur();
        
        if($result){
            // Inscription OK
            $_SESSION["user_id"] = $user->email;
            header('Status: 301 Moved Permanently', false, 301);      
            header("Location: /index.php");
            exit();
        }
        
    } 
        // Si mauvaise inscription
       $_SESSION['error'] = "mdp";
       header('Status: 301 Moved Permanently', false, 301);      
       header("Location: /index.php/login");
       exit();
} else {
    echo "Method not allowed";
    http_response_code(405);
}