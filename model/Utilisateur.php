<?php


class Utilisateur {


    public $email ="";

    protected $password = "";

    public function __construct(string $_email, string $_password){
        require_once "model/Base.php";

        $this->BaseSQL = new Base();

        $this->password=hash("sha256",$_password);

        $this->email=htmlspecialchars($_email);

    }



    public function verifConnexion(){

        $user = $this->BaseSQL->getUser($this->email);

        if(!$user){
            return false;
        }

        return hash_equals($user->password, $this->password);
    }


    public function insertUtilisateur(){
        if($this->verifConnexion()){
            return false; //l'utilisateur existe deja
        }
        $this->BaseSQL->insertUser($this->email, $this->password);
        return true;
    }
}
