<?php


class Utilisateur {


    public $email ="";

    protected $password = "";

    public function __construct(string $_email, string $_password){

        $this->password=hash("sha256",$_password);

        $this->email=htmlspecialchars($_email);

    }



    public function verifConnexion(){
        require_once('utils/pdo_conn.php');
        $query = $dbh->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $query->bindParam(":email", $this->email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);

        if(!$user){
            return false;
        }

        return hash_equals($user->password, $this->password);
    }


    public function insertUtilisateur(){
        require_once('utils/pdo_conn.php');
        if($this->verifConnexion()){
            return false; //l'utilisateur existe deja
        }
        $query = $dbh->prepare("INSERT INTO utilisateurs VALUES (:email, :mdp)");
        $query->bindParam(":email", $this->email);
        $query->bindParam(":mdp", $this->password);
        $query->execute();
        return true;
    }
}
