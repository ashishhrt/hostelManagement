<?php
	include_once(ROOT_DIR.'model/connection.php');
	class Model{
		private $conn;

		public function __construct(){
			$this->conn = new Connection();
		}

		public function authenticateOwner($email, $password){
			$nconn = $this->conn->getConnection();
			#var_dump($nconn);
			//using prepare statement to avoid sql injection
			$stmt = $nconn->prepare("SELECT owner_id from owner_authenticator where email = ? AND password = ?");
			//Bind the parameters
			$stmt->bind_param('ss', $email, $password);
			
			//execute the statement
			if($stmt->execute()){
				//bind result variables
				$stmt->bind_result($owner_id);

				$stmt->fetch();//fetch the resultset		
				$stmt->close(); //closeing is important
				//prepare statement should be closed before preparing  another prepare statement

				$this->conn->closeConnection();
				$nconn = null;
				return $owner_id;
			}
			else{
				$this->conn->closeConnection();
				$nconn = null;
				return false;
			}
		}

		public function getOwnerDetails($owner_id){
			#var_dump($this->conn);
			$nconn = $this->conn->getConnection();
			#var_dump($nconn);
			
			//fetch details of student
			$stmt = $nconn->prepare("SELECT * from hostel_owner where owner_id = ?");
			
			$stmt->bind_param('i', $owner_id);

			if($stmt->execute()){
				$owner_details = array();
				$stmt->bind_result($owner_details[0], $owner_details[1], $owner_details[2], $owner_details[3], $owner_details[4]); //bind result variable

				$stmt->fetch();
				$stmt->close();
				$this->conn->closeConnection();
				$nconn = null;

				return $owner_details;
			}
			else{
				$this->conn->closeConnection();
				$nconn = null;
				return null;
			}
		}
	}
?>