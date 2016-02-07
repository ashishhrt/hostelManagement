<?php
	
	class Connection{		
		
		private $conn;
		private $servername = 'localhost';
		private $username = 'root';
		private $password = '';
		private $databaseName= 'hostel_management';

		public function __construct(){
			//echo 'Connection constructor called<br>';
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
			/*
			if(!$this->conn){
				$newConn = new Connection();
				return $newConn->getConnection();
			}
			else
			*/
			return $this->conn;
		}
		
		public function closeConnection(){
			$this->conn->close();
		}
		
	}
?>