<?php

@require_once "../dao/PriceDao.class.php";
@require_once "../util/DBConnection.class.php";

class PriceBus {

    function __construct() {
    }
    
    public static function listAll(){
    	$conn = new DBConnection();
    	$dao  = new PriceDao();    	
    	$ret  = $dao->listAll($conn);
    	$conn->close();
    	
    	return $ret;    	    	    	    	
    }

    public static function getByRoute($fromDDD, $toDDD){
    	$conn = new DBConnection();
    	$dao  = new PriceDao();
    	$ret  = $dao->getByRoute($fromDDD, $toDDD, $conn);
    	$conn->close();
    	 
    	return $ret;
    }
    
}
?>