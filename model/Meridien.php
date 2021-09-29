<?php

class Meridien{

    protected $code = "";
    protected $nom = "";
    protected $element = "";
    protected $yin = false;
    
    public function __construct(string $_code = null, string $_nom = null, string $_element = null, bool $_yin = false) {
            $this->code=$_code;
        $this->nom=$_nom;
        $this->element=$_element;
        $this->yin=$_yin;
        
    }
    
     
    
    
    public function __call($name, $arguments) {
    }
    
}
