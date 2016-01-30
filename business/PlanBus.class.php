<?php

@require_once "../dao/PlanDao.class.php";
@require_once "../util/DBConnection.class.php";
@require_once "../business/PriceBus.class.php";

class PlanBus {

    function __construct() {
    }
    
    public static function listAll(){
    	$conn = new DBConnection();
    	$dao  = new PlanDao();    	
    	$ret  = $dao->listAll($conn);
    	$conn->close();
    	
    	return $ret;    	    	    	    	
    }

    public static function getById($id){
    	$conn = new DBConnection();
    	$dao  = new PlanDao();
    	$ret  = $dao->getById($id, $conn);
    	$conn->close();
    	 
    	return $ret;
    }
    
    public static function calculate($fromDDD, $toDDD, $duration, $planId) {
    	$price = @PriceBus::getByRoute($fromDDD, $toDDD);
    	if ($price != null) {
    		$normal_price = $price->calculateCallCost($duration);
    		
    		$plan = @PlanBus::getById($planId);
    		if ($plan != null) {
    			return array("normal"=>$normal_price, "plan"=>$plan->calculateCallCost($price, $duration));    			
    		} else {
    			return array("normal"=>$normal_price, "plan"=>"Plan not found");
    		}
    	}
    	
    	return null;
    }
}
?>