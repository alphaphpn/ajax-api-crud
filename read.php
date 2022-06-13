<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	include_once "db_connection.php";
	include_once 'product.php';
	$database = new Database();
	$cnn = $database->getConnection();
	
	$items = new Information($cnn);
	$records = $items->getInformation();
	$itemCount = $records->rowCount();
	if ($itemCount > 0) {
		$informationArr = array();
		$informationArr["data"] = array();
		$informationArr["itemCount"] = $itemCount;
		
		while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
			array_push($informationArr["data"], $row);
		}

		echo json_encode($informationArr);
	} else {
		http_response_code(404);
		echo json_encode(array("message" => "No record found."));
	}

	// By Ludwig Bethnicer C. Napigkit
?>