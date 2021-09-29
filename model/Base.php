

<?php
include_once 'Pathologie.php';
include_once 'Meridien.php';




$base = new Base();
$base->getPatho($base->getDbh());
$base->getMeridien($base->getDbh());


$base->afficheMeridien();

//$base->getMeridien($base->getDbh());
//$base->getCode('V');





class Base {
        
    protected $dbh;
    protected $tableauPatho=array();
    protected $tableauMeridien=array();



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

    function getPatho(PDO $dbh){
        
        $query = $this->dbh->prepare("SELECT * FROM patho");
        $query->execute();
        $result = $this->dbh->query("SELECT * FROM patho");


        
       
        foreach($result as $row){
            $patho=new Pathologie($row['idp'], $row['mer'], $row['type'], $row['desc']);
            
            array_push($this->tableauPatho, $patho);
            
        }
    }

    function affichePatho(){
        print_r($this->tableauPatho);
    }


    /* MERIDIEN !*/
    function getMeridien(PDO $dbh){
        
        $query = $this->dbh->prepare("SELECT * FROM meridien");
        $query->execute();
        $result = $this->dbh->query("SELECT * FROM meridien");


        

        foreach($result as $row){
            $meridien=new Meridien($row['code'], $row['nom'], $row['element'], $row['yin']);
            array_push($this->tableauMeridien, $meridien);
        }
    }

    public function getCode($code){
        /*$query = $this->dbh->prepare("SELECT * FROM meridien WHERE code = :code");
        $query->bindParam(":code", $this->code, PDO::PARAM_STR);
        
        $query->execute();
        
        return $query->fetch();*/
        for($i=0;$i<sizeof($this->tableauMeridien);$i++){
            if($this->tableauMeridien[i].['code']==$code){
                print_r($this->tableauMeridien[i]);
            }

        }
    }

    function afficheMeridien(){
        print_r($this->tableauMeridien);
    }
       

}



?>





