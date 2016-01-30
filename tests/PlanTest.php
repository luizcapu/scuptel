<?php

@require_once "../to/Price.class.php";
@require_once "../to/Plan.class.php";

class PlanTest extends PHPUnit_Framework_TestCase {
	
	private $payload = array(
			array("price"=>array("ppm"=>1.9),"plan"=>array("min"=>30,"fare"=>10),"duration"=>20,"result"=>0.0),
			array("price"=>array("ppm"=>1.7),"plan"=>array("min"=>60,"fare"=>10),"duration"=>80,"result"=>37.40),
			array("price"=>array("ppm"=>1.9),"plan"=>array("min"=>120,"fare"=>10),"duration"=>200,"result"=>167.20),
	);
	
	public function testPayload(){
		$price = new Price();
		$plan = new Plan();
		
		foreach ($this->payload as $testCase) {
			echo "Testing case: " . json_encode($testCase) . "\n";			
			
			$price->setPricePerMinute($testCase["price"]["ppm"]);
			
			$plan->setMinutes($testCase["plan"]["min"]);
			$plan->setFareAdditionalMin($testCase["plan"]["fare"]);
			
			$this->assertEquals($plan->calculateCallCost($price, $testCase["duration"]), $testCase["result"]);				
		}
	}
	
}

?>