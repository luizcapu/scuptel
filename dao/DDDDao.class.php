<?php

@require_once "../to/DDD.class.php";

define("DDD_BASE_SELECT",
"select ddd.*" .
" from ddd");

class DDDDao {


    function __construct() {
    }
	
	public function listAll($conn){
		$sql  = constant("DDD_BASE_SELECT");
		$sql .= " order by ddd";
		
		$stmt = $conn->getStmt($sql);
		$ret = $stmt->execStmt();
		$stmt->close();

		if (@pg_num_rows($ret) > 0){
			return $this->toList($ret);			
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

        $obj = new DDD();
		
        if (isset($row["ddd"])) $obj->setDDD($row["ddd"]);

        return $obj;
    }

}
?>
