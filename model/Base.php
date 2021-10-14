

<?php
include_once 'Pathologie.php';
include_once 'Meridien.php';




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

    function getPatho(PDO $dbh){
        
        $query = $this->dbh->prepare("SELECT p.idp, p.mer, p.type, p.desc, s.desc FROM symptome s
        INNER JOIn symptpatho sp
        ON s.ids = sp.ids
        INNER join patho p
        ON sp.idp = p.idp;");
        $query->execute();
        $result = $this->dbh->query("SELECT p.idp, p.mer, p.type, p.desc, s.desc FROM symptome s
        INNER JOIn symptpatho sp
        ON s.ids = sp.ids
        INNER join patho p
        ON sp.idp = p.idp;");
       
        foreach($result as $row){
            $patho=new Pathologie($row[0], $row[1], $row[2], $row[3], $row[4]);
            
            array_push($this->tableauPatho, $patho);
            
        }
    }

    function affichePatho(){
        print_r($this->tableauPatho);
        //print_r($this->tableauPatho[0]->getIdp());

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





