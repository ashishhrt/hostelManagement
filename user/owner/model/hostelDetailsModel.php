<?php
	require_once(ROOT_DIR.'model/connection.php');

	class hostelDetailsModel{
		private $conn;

		public function __construct(){
			$this->conn = new Connection();
		}

		public function getHostelDetails($owner_id){
			$nconn = $this->conn->getConnection(); //data base connection

			//get hostel_id, room_no
			$sql = "SELECT hostel_id, hostel_name, location FROM hostel WHERE owner_id = $owner_id"; 
			$result = $nconn->query($sql);

			//if hostels found corresponding owner_id get hostel details
 			if($result->num_rows > 0){
				$hostel = array();
				$hostelIndex = 0;

				while($row = $result->fetch_assoc()){	
					$hostel[$hostelIndex][0] = $row['hostel_id'];
					$hostel[$hostelIndex][1] = $row['hostel_name'];
					$hostel[$hostelIndex][2] = $row['location'];
					$hostelIndex++;
				}

				$this->conn->closeConnection();
				$nconn = NULL;
				return $hostel;
			}
			else{
				$this->conn->closeConnection();
				$nconn = null;
				return NULL;
			}
		}
	}
?>