<?php

@require_once "../to/Plan.class.php";

define("PLAN_BASE_SELECT",
"select plan.*" .
" from plan");

class PlanDao {


    function __construct() {
    }
	
	public function listAll($conn){
		$sql  = constant("PLAN_BASE_SELECT");
		$sql .= " order by plan_id";
		
		$stmt = $conn->getStmt($sql);
		$ret = $stmt->execStmt();
		$stmt->close();

		if (@pg_num_rows($ret) > 0){
			return $this->toList($ret);			
		}else{
			return null;
		}						
	}	
	
	public function getById($id, $conn){
		$sql  = constant("PLAN_BASE_SELECT");
		$sql .= " where plan_id=$1";
		
		$stmt = $conn->getStmt($sql);
		$stmt->setInt(1, $id);
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

        $obj = new Plan();
		
        if (isset($row["plan_id"])) $obj->setPlanId($row["plan_id"]);
        if (isset($row["description"])) $obj->setDescription($row["description"]);
        if (isset($row["minutes"])) $obj->setMinutes($row["minutes"]);
        if (isset($row["fare_additional_min"])) $obj->setFareAdditionalMin($row["fare_additional_min"]);
        
        return $obj;
    }

}
?>
