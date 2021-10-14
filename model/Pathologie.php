<?php
class Pathologie implements JsonSerializable{
    protected $idp = "";
    protected $mer = "";
    protected $type = "";
    protected $desc = "";
    protected $symptome ="";
  

    public function __construct(string $idp, string $mer, string $type, string $desc, $symptome=null){
        $this->idp=$idp;
        $this->mer=$mer;
        $this->type=$type;
        $this->desc=$desc;
        $this->symptome=$symptome;
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
    public function getSymptome(){
        return $this->symptome;
    }
    public function jsonSerialize()
    {
      return [
        'idp' => $this->idp,
        'mer' => $this->mer,
        'type' => $this->type,
        'desc' => $this->desc,
        'symptomes' => $this->symptome,
      ];
    }


    
}
?>
