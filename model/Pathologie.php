<?php
class Pathologie {
    protected $idp = "";
    protected $mer = "";
    protected $type = "";
    protected $desc = "";
  
    public function __construct(string $_idp, string $_mer, string $_type, string $_desc){
        $this->idp=$_idp;
        $this->mer=$_mer;
        $this->type=$_type;
        $this->desc=$_desc;
    }
    public function getIdp(){
        return $this->idp;
    }
    public function getMer(){
        return $this->mer;
    }
    public function getType(){
        return $this->type;
    }
    public function getDesc(){
        return $this->desc;
    }


    
}
?>
