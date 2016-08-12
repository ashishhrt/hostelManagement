<?php
	
	class Connection{		
		
		private $conn;
		private $servername = 'localhost';
		private $username = 'root';
		private $password = '';
		private $databaseName= 'hostel_management';

		public function __construct(){
			//create connection
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->databaseName);

			//check connection
			if($this->conn->connect_error)
			{
				die("connection failed: ". $this->$conn->connect_error);
				$this->conn = null;
			}
			
		}
		public function getConnection(){
			
			return $this->conn;
		}
		
		public function closeConnection(){
			$this->conn->close();
		}
		
	}
?>