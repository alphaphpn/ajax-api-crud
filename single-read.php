<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	include_once "db_connection.php";
	include_once 'product.php';
	$database = new Database();
	$cnn = $database->getConnection();
	
	$item = new Information($cnn);
	$item->id = isset($_GET['id']) ? $_GET['id'] : die('Empty field(s) not allowed!');
	$item->getSingleInformation();
	if ($item->product_name != null) {
		// create array
		$emp_arr = array(
			"id" => $item->id,
			"product_name" => $item->product_name,
			"product_unit" => $item->product_unit,
			"product_price" => $item->product_price,
			"product_date_of_expiry" => $item->product_date_of_expiry,
			"product_available_inventory" => $item->product_available_inventory,
			"product_available_inventory_cost" => $item->product_available_inventory_cost
		);

		http_response_code(200);
		echo json_encode($emp_arr);
	} else {
		http_response_code(404);
		echo json_encode("Information not found.");
	}

	// By Ludwig Bethnicer C. Napigkit
?>