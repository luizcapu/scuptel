<?php 

@header('Content-type: text/html; charset=iso-8859-1');
@require_once "../business/PlanBus.class.php";
@require_once "../to/Plan.class.php";

$plans = PlanBus::listAll();

if (is_array($plans) && count($plans) > 0){	
	$result = array();
	foreach ($plans as $p){		
		$item = array(
				"plan_id" => $p->getPlanId(),
				"description" => $p->getDescription(),
				"minutes" => $p->getMinutes(),
				"fare_additional_min" => $p->getFareAdditionalMin()				
		);
		$result[] = $item;
	}	
	echo json_encode(array_values($result));
}else {
	echo "[]";
}


?>