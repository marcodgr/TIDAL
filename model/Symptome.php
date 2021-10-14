<?php
class Symptome implements JsonSerializable{
    protected $ids = "";
    protected $desc = "";
  
    public function __construct(string $ids, string $desc){
        $this->ids=$ids;
        $this->desc=$desc;
    }
    public function getIds(){
        return $this->ids;
    }

    public function getDesc(){
        return $this->desc;
    }

    public function jsonSerialize()
    {
      return [
        'ids' => $this->ids,
        'desc' => $this->desc,
      ];
    }


    
}
?>
