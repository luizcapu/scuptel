<?php

class Plan {

    private $planId;
    private $description;
    private $minutes;
    private $fareAdditionalMin;
    
    function __construct() {
    }

    public function setPlanId($value){
    	$this->planId = $value;
    }

    public function getPlanId(){
    	return $this->planId;
    }
    
    public function setDescription($value){
    	$this->description = $value;
    }
    
    public function getDescription(){
    	return $this->description;
    }
    
    public function setMinutes($value){
    	$this->minutes = $value;
    }
    
    public function getMinutes(){
    	return $this->minutes;
    }
    
    public function setFareAdditionalMin($value){
    	$this->fareAdditionalMin = $value;
    }
    
    public function getFareAdditionalMin(){
    	return $this->fareAdditionalMin;
    }
    
    public function calculateCallCost($price, $duration) {
        $remaining_minutes = $duration - $this->getMinutes();
    	$result = 0;
    	if ($remaining_minutes > 0) {
    		$result = $remaining_minutes * $price->getPricePerMinute();
    		$result += $result * $this->fareAdditionalMin / 100;
    	}
    	return $result;
    }
    
}
?>
