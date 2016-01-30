<?php 

@header('Content-type: text/html; charset=iso-8859-1');
@require_once "../business/DDDBus.class.php";
@require_once "../to/DDD.class.php";

$ddds = DDDBus::listAll();

if (is_array($ddds) && count($ddds) > 0){	
	$result = array();
	foreach ($ddds as $d){		
		$item = array("ddd" => $d->getDDD());
		$result[] = $item;
	}	
	echo json_encode(array_values($result));
}else {
	echo "[]";
}


?>