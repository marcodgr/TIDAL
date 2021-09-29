<?php

require_once('../utils/pdo_conn.php');
class Utilisateur {
   
    protected $email ="";
    protected $mdp = "";
    
    public function __construct(string $_email, string $_mdp){
        $this->mdp=$_mdp;
        $this->email=htmlspecialchars($_email);
    }

    public function verifConnexion(){
        $query = $dbh->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $query->bindParam(":email", $this->email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);

        if(is_null($user)){
            return false;
        }

        return hash_equals($this->mdp, $user["password"]);
    }


}
?>
