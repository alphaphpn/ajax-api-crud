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

	if (empty(trim($item->id))) {
		echo 'Empty field(s) not allowed!';
	} else {
		if ($item->deleteInformation()) {
			echo 'Information deleted.';
		} else{
			echo 'Data could not be deleted';
		}
	}

	// By Ludwig Bethnicer C. Napigkit
?>