<?php

	include_once "database.php";
	$tblname = "tbl_ajax_crud_products";
	$tblname2 = strtoupper($tblname);
	$TableTitle = "Products";
	$msg_insert = "Insert default data for {$TableTitle} <br>";

	$cnn = new PDO("mysql:host={$host};dbname={$db}", $unameroot, $pw);
	$chksql = "SELECT 1 FROM {$tblname} LIMIT 1";
	$chksql = $cnn->query($chksql);

	if($chksql) {
		echo "Database Table: {$TableTitle} exist.<br>";
		echo '<a href="./">Back</a>';
	} else {
		try {
			$sql = "CREATE TABLE IF NOT EXISTS {$tblname2}(
				id INT(11) AUTO_INCREMENT PRIMARY KEY, 
				product_name TEXT NOT NULL, 
				product_unit TEXT NOT NULL, 
				product_price DOUBLE NOT NULL, 
				product_date_of_expiry DATE NOT NULL, 
				product_available_inventory INT(11) NOT NULL, 
				product_available_inventory_cost DOUBLE NOT NULL, 
				created DATETIME NOT NULL DEFAULT current_timestamp(), 
				modified TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
			);";
			$cnn->exec($sql);
			echo "Database Table created successfully: {$TableTitle}.<br>";
			echo '<a href="./">Back</a>';

			$sql_insert = "INSERT INTO {$tblname} (
					product_name, 
					product_unit, 
					product_price, 
					product_date_of_expiry, 
					product_available_inventory, 
					product_available_inventory_cost
				) 
				VALUES (
					'Coke 8oz', 
					'bottle', 
					'12.50', 
					'2022-01-16', 
					20, 
					250
				), (
					'Sprite 12oz', 
					'bottle', 
					15, 
					'2023-02-11', 
					30, 
					550
				), (
					'Royal 1ltr', 
					'bottle', 
					45, 
					'2024-03-28', 
					40, 
					1800
				)
				";
			$cnn->exec($sql_insert);
			echo $msg_insert.'<br>';
			echo '<a href="./">Back</a>';
		} catch(PDOException $e) {
			echo $e->getMessage()."<br>";
		}
		$cnn = null;
	}

	// By Ludwig Bethnicer C. Napigkit