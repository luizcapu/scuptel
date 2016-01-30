<?php

@require_once "../dao/DDDDao.class.php";
@require_once "../util/DBConnection.class.php";

class DDDBus {

    function __construct() {
    }
    
    public static function listAll(){
    	$conn = new DBConnection();
    	$dao  = new DDDDao();    	
    	$ret  = $dao->listAll($conn);
    	$conn->close();
    	
    	return $ret;    	    	    	    	
    }
    
}
?>