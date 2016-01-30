<?php

@require_once "../to/Price.class.php";

class PriceTest extends PHPUnit_Framework_TestCase {
	
	private $payload = array(
			array("ppm"=>1.9,"duration"=>20,"result"=>38.0),
			array("ppm"=>1.7,"duration"=>80,"result"=>136.0),
			array("ppm"=>1.9,"duration"=>200,"result"=>380.0),
	);
	
	public function testPayload(){
		$p = new Price();

		foreach ($this->payload as $testCase) {
			echo "Testing case: " . json_encode($testCase) . "\n";			
			$p->setPricePerMinute($testCase["ppm"]);
			$this->assertEquals($p->calculateCallCost($testCase["duration"]), $testCase["result"]);
		}
		
	}
	
}

?>