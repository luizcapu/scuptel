<?php

class Price {

    private $fromDDD;
    private $toDDD;
    private $pricePerMinute;
    
    function __construct() {
    }

    public function setFromDDD($value){
    	$this->fromDDD = $value;
    }

    public function getFromDDD(){
    	return $this->fromDDD;
    }
    
    public function setToDDD($value){
    	$this->toDDD = $value;
    }

    public function getToDDD(){
    	return $this->toDDD;
    }
    
    public function setPricePerMinute($value){
    	$this->pricePerMinute = $value;
    }

    public function getPricePerMinute(){
    	return $this->pricePerMinute;
    }
    
    public function calculateCallCost($duration) {
    	return $duration * $this->pricePerMinute;
    }
}
?>
