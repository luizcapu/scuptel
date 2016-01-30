<?php

@header('Content-type: text/html; charset=iso-8859-1');
@require_once "../business/PlanBus.class.php";

if ($_POST) {
	$result = PlanBus::calculate(
			$_POST["from_ddd"], $_POST["to_ddd"], $_POST["duration"], $_POST["plan"]);
	
	if ($result == null) {
		$result = array("normal"=>"Route from/to DDD not found", "plan"=>"Route from/to DDD not found");
	} else {
		$result = array(
				"normal"=>"$ " . number_format($result["normal"], 2, '.', ''), 
				"plan"=>"$ " . number_format($result["plan"], 2, '.', '')				
		);		
	}
	
	echo json_encode($result);
}

?>