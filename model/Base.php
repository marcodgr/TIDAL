<?php
include_once 'Pathologie.php';
include_once 'Meridien.php';
include_once 'Symptome.php';




$base = new Base();
$base->getPatho($base->getDbh());
$base->getMeridien($base->getDbh());


//$base->affichePatho();

//$base->afficheMeridien();




//$base->getMeridien($base->getDbh());
//$base->getCode('V');





class Base {
        
    public $dbh;
    public $tableauPatho=array();
    public $tableauMeridien=array();



    public function __construct(){
        $this->user='postgres';
        $this->pass='1234567890';
        $this->dbh = new PDO('pgsql:host=localhost;dbname=tidal', $this->user, $this->pass);
    }
    
    function getDbh(){
        return $this->dbh;
    }

    /* PATHOLOGIE !*/
    function getElementbyIdp($tab, $idp){
        return $tab[$idp-1];
    }
    function getTaille(){
        return sizeof($this->tableauPatho);
    }
    function getTabPatho(){
        return $this->tableauPatho;
    }

    function getPatho(){ //TODO Arreter d'utiliser cette merde
        $result = $this->dbh->query("SELECT p.idp, p.mer, p.type, p.desc, s.desc FROM symptome s
        INNER JOIn symptpatho sp
        ON s.ids = sp.ids
        INNER join patho p
        ON sp.idp = p.idp;");
       
        foreach($result as $row){
            $patho=new Pathologie($row[0], $row[1], $row[2], $row[3], $row[4]);
            
            array_push($this->tableauPatho, $patho);
            
        }
        
        return $this->tableauPatho;
    }

    function getPathoSympto(){ //TODO utiliser celle la

        $tempsympto = array();
        
        $result = $this->dbh->query("SELECT * FROM patho");
       
        foreach($result as $row){
            $result2 = $this->dbh->query("select * from symptome s join symptpatho sp on (s.ids = sp.ids) where sp.idp = '".$row[0]."';");
            foreach($result2 as $row2){
                array_push($tempsympto, new Symptome($row2[0], $row2[1]));
            }
            $patho=new Pathologie($row[0], $row[1], $row[2], $row[3], $tempsympto);
            
            array_push($this->tableauPatho, $patho);
            
        }
        
        return $this->tableauPatho;
    }



    function getPathologie(){
        $result = $this->dbh->query("SELECT * FROM patho");
       
        foreach($result as $row){
            $patho=new Pathologie($row[0], $row[1], $row[2], $row[3]);
            array_push($this->tableauPatho, $patho);
            
        }
        
        return $this->tableauPatho;
    }


    function getSymptome(){
        $result = $this->dbh->query("SELECT * FROM symptome");
       
        foreach($result as $row){
            $sympto=new Symptome($row[0], $row[1]);
            array_push($this->tableauPatho, $sympto);
            
        }
        
        return $this->tableauPatho;
    }

    function affichePatho(){
        print_r($this->tableauPatho);
    }


    /* MERIDIEN !*/
    function getMeridien(){
        $result = $this->dbh->query("SELECT * FROM meridien");
        foreach($result as $row){
            $meridien=new Meridien($row['code'], $row['nom'], $row['element'], $row['yin']);
            array_push($this->tableauMeridien, $meridien);
           
        }


        return $this->tableauMeridien;
    }

    public function getCode($code){
        for($i=0;$i<sizeof($this->tableauMeridien);$i++){
            if($this->tableauMeridien[i].['code']==$code){
                print_r($this->tableauMeridien[i]);
            }

        }
    }

    function afficheMeridien(){
        print_r($this->tableauMeridien);
    }

    function getUser($email){
        $query = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $query->bindParam(":email", $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insertUser($email, $password){
        $query = $this->dbh->prepare("INSERT INTO utilisateurs VALUES (:email, :mdp)");
        $query->bindParam(":email", $email);
        $query->bindParam(":mdp", $password);
        $query->execute();
        return true;
    }
       

}



?>





