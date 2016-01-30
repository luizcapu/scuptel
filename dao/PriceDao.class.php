<?php

@require_once "../to/Price.class.php";

define("PRICE_BASE_SELECT",
"select price.*" .
" from price");

class PriceDao {


    function __construct() {
    }
	
	public function listAll($conn){
		$sql  = constant("PRICE_BASE_SELECT");
		$sql .= " order by from_ddd, to_ddd";
		
		$stmt = $conn->getStmt($sql);
		$ret = $stmt->execStmt();
		$stmt->close();

		if (@pg_num_rows($ret) > 0){
			return $this->toList($ret);			
		}else{
			return null;
		}						
	}	

	public function getByRoute($fromDDD, $toDDD, $conn){
		$sql  = constant("PRICE_BASE_SELECT");
		$sql .= " where from_ddd=$1 and to_ddd=$2";
	
		$stmt = $conn->getStmt($sql);
		$stmt->setString(1, $fromDDD);
		$stmt->setString(2, $toDDD);
		$ret = $stmt->execStmt();
		$stmt->close();
	
		if (@pg_num_rows($ret) > 0){
			return $this->toObject(@pg_fetch_assoc($ret));
		}else{
			return null;
		}
	}
	
    private function toList($dbResult) {
        $result = array ();

        while ($row = pg_fetch_assoc($dbResult)) {
            $result[] = $this->toObject($row);
        }

        return $result;

    }

    private function toObject($row) {

        $obj = new Price();
		
        if (isset($row["from_ddd"])) $obj->setFromDDD($row["from_ddd"]);
        if (isset($row["to_ddd"])) $obj->setToDDD($row["to_ddd"]);
        if (isset($row["price_per_minute"])) $obj->setPricePerMinute($row["price_per_minute"]);
        
        return $obj;
    }

}
?>
