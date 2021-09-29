<?php
require_once 'utils/pdo_conn.php';

/**
 * Description of Meridien
 *
 * @author baptiste.pellarin
 */
class Meridien extends PDO_Service {

    protected $code = "";
    protected $nom = "";
    protected $element = "";
    protected $yin = false;
    
    public function __construct(string $_code = null, string $_nom = null, 
            string $_element = null, bool $_yin = false) {
        

        $this->code=$_code;
        $this->nom=$_nom;
        $this->element=$_element;
        $this->yin=$_yin;
        
    }
    
    public function getCode(){
        $query = $this->dbh->prepare("SELECT * FROM meridien WHERE code = :code");
        $query->bindParam(":code", $this->code, PDO::PARAM_STR);
        
        $query->execute();
        
        return $query->fetch();
        
    }
    
    public function __call($name, $arguments) {
    }
    
}
