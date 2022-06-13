<?php
	class Information {
		// Database Connection
		private $cnn;
		// Table
		private $db_table = "tbl_ajax_crud_products";
		// Columns
		public $id;
		public $productname;
		public $productunit;
		public $productprice;
		public $productdateofexpiry;
		public $productavailableinventory;
		public $productavailableinventorycost;

		public $modified;
		public $created;


		// Database Connection
		public function __construct($cnn) {
			$this->cnn = $cnn;
		}

		// GET ALL
		public function getInformation() {
			$sqlQuery = "SELECT id AS DT_RowId, product_name, product_unit, replace(concat('$', format(product_price,2)), '$-', '-$') as product_price, product_date_of_expiry, product_available_inventory, replace(concat('$', format(product_available_inventory_cost,2)), '$-', '-$') as product_available_inventory_cost FROM " . $this->db_table . "";
			$this->result = $this->cnn->query($sqlQuery);
			return $this->result;
		}

		// CREATE
		public function createInformation() {
			// Sanitize
			$this->product_name=htmlspecialchars(strip_tags($this->product_name));
			$this->product_unit=htmlspecialchars(strip_tags($this->product_unit));
			$this->product_price=htmlspecialchars(strip_tags($this->product_price));
			$this->product_date_of_expiry=htmlspecialchars(strip_tags($this->product_date_of_expiry));
			$this->product_available_inventory=htmlspecialchars(strip_tags($this->product_available_inventory));
			$this->product_available_inventory_cost=$this->product_price*$this->product_available_inventory;
			$sqlQuery = "INSERT INTO
			". $this->db_table ." SET product_name = '".$this->product_name."', 
			product_unit = '".$this->product_unit."', 
			product_price = '".$this->product_price."', 
			product_date_of_expiry = '".$this->product_date_of_expiry."', 
			product_available_inventory = '".$this->product_available_inventory."', 
			product_available_inventory_cost = '".$this->product_available_inventory_cost."'";
			$record = $this->cnn->query($sqlQuery);
			$dataCount = $record->rowCount();
			if ($dataCount > 0) {
				return true;
			}
			return false;
		}

		// Single Read
		public function getSingleInformation() {
			$sqlQuery = "SELECT id, product_name, product_unit, product_price, product_date_of_expiry, product_available_inventory, product_available_inventory_cost FROM 
			". $this->db_table ." WHERE id = ".$this->id;
			$record = $this->cnn->query($sqlQuery);
			$dataCount = $record->rowCount();
			if ($dataCount > 0) {
				$dataRow = $record->fetch(PDO::FETCH_ASSOC);
				$this->product_name = $dataRow['product_name'];
				$this->product_unit = $dataRow['product_unit'];
				$this->product_price = $dataRow['product_price'];
				$this->product_date_of_expiry = $dataRow['product_date_of_expiry'];
				$this->product_available_inventory = $dataRow['product_available_inventory'];
				$this->product_available_inventory_cost = $dataRow['product_available_inventory_cost'];
			}
		}

		// UPDATE
		public function updateInformation(){
			$this->product_name=htmlspecialchars(strip_tags($this->product_name));
			$this->product_unit=htmlspecialchars(strip_tags($this->product_unit));
			$this->product_price=htmlspecialchars(strip_tags($this->product_price));
			$this->product_date_of_expiry=htmlspecialchars(strip_tags($this->product_date_of_expiry));
			$this->product_available_inventory=htmlspecialchars(strip_tags($this->product_available_inventory));
			$this->product_available_inventory_cost=$this->product_price*$this->product_available_inventory;
			$sqlQuery = "UPDATE ". $this->db_table ." SET product_name = '".$this->product_name."', 
			product_unit = '".$this->product_unit."', 
			product_price = '".$this->product_price."', 
			product_date_of_expiry = '".$this->product_date_of_expiry."', 
			product_available_inventory = '".$this->product_available_inventory."', 
			product_available_inventory_cost = '".$this->product_available_inventory_cost."'
			WHERE id = ".$this->id;
			$record = $this->cnn->query($sqlQuery);
			$dataCount = $record->rowCount();
			if ($dataCount > 0) {
				return true;
			}
			return false;
		}

		// DELETE
		function deleteInformation() {
			$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
			$record = $this->cnn->query($sqlQuery);
			$dataCount = $record->rowCount();
			if ($dataCount > 0) {
				return true;
			}
			return false;
		}
	}

	// By Ludwig Bethnicer C. Napigkit
?>