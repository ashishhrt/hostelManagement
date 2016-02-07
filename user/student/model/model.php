<?php
	include_once(ROOT_DIR.'model/connection.php');
	class Model{
		private $conn;

		public function __construct(){
			$this->conn = new Connection();
		}

		public function authenticateStudent($email, $password){
			$nconn = $this->conn->getConnection();
			#var_dump($nconn);
			//using prepare statement to avoid sql injection
			$stmt = $nconn->prepare("SELECT student_id from student_authenticator where email = ? AND password = ?");
			//Bind the parameters
			$stmt->bind_param('ss', $email, $password);
			
			//execute the statement
			if($stmt->execute()){
				//bind result variables
				$stmt->bind_result($student_id);

				$stmt->fetch();//fetch the resultset		
				$stmt->close(); //closeing is important
				//prepare statement should be closed before preparing  another prepare statement

				$this->conn->closeConnection();
				return $student_id;
			}
			else{
				$this->conn->closeConnection();
				$nconn = null;
				return false;
			}
		}

		public function getStudentDetails($student_id){
			#var_dump($this->conn);
			$nconn = $this->conn->getConnection();
			#var_dump($nconn);
			
			//fetch details of student
			$stmt = $nconn->prepare("SELECT * from students where student_id = ?");
			
			$stmt->bind_param('i', $student_id);

			if($stmt->execute()){
				$student_details = array();
				$stmt->bind_result($student_details[0], $student_details[1], $student_details[2], $student_details[3]); //bind result variable

				$stmt->fetch();
				$stmt->close();
				$this->conn->closeConnection();
				$nconn = null;

				return $student_details;
			}
			else{
				$this->conn->closeConnection();
				$nconn = null;
				return null;
			}
		}
	}
?>