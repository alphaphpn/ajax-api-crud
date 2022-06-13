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
	$item->product_name = isset($_GET['pname']) ? $_GET['pname'] : die('Empty Product not allowed!');
	$item->product_unit = isset($_GET['punit']) ? $_GET['punit'] : die('Empty Unit not allowed!');
	$item->product_price = isset($_GET['pprice']) ? $_GET['pprice'] : die('Invalid Price!');
	$item->product_date_of_expiry = isset($_GET['pdateex']) ? $_GET['pdateex'] : die('Invalid Date!');
	$item->product_available_inventory = isset($_GET['pstock']) ? $_GET['pstock'] : die('Empty Stock not allowed!');

	if (empty(trim($item->product_name)) || empty(trim($item->product_unit)) || empty(trim($item->product_price)) || empty(trim($item->product_date_of_expiry)) || empty(trim($item->product_available_inventory))) {
		echo 'Empty field(s) not allowed!';
	} else {
		if ($item->createInformation()) {
			echo 'Information created successfully.';
		} else{
			echo 'Information could not be created.';
		}
	}

	// By Ludwig Bethnicer C. Napigkit
?>