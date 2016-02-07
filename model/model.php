<?php
	include_once(ROOT_DIR."model/hostel_model.php");
	include_once(ROOT_DIR."model/hostel_owner_model.php");
	include_once(ROOT_DIR."model/facilities_model.php");
	include_once(ROOT_DIR."model/rooms_model.php");
	include_once(ROOT_DIR."model/students_model.php");
	include_once(ROOT_DIR."model/connection.php");

	class Model{
		private $conn;
		public function  __construct(){
			//echo 'Model constructor called<br>';
			//get connection object
			$this->conn = new Connection();
		}

		//method to obtain all the hostels list
		public function getHostelList(){
			$nconn = $this->conn->getConnection();
			//get hostel list
			$sql = "SELECT * FROM hostel";
			$result = $nconn->query($sql);

			if($result->num_rows > 0){
				$hostels = array();
				$index = 0;
				while($row = $result->fetch_assoc()){
					$hostels[$index++] = new Hostel($row['hostel_id'], $row['hostel_name'], $row['location'], $row['owner_id']);
				}

				//get owner details of hostels
				$sql = "SELECT * from hostel_owner";
				$result = $nconn->query($sql);
				$owner = array();
				$index = 0;

				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						$owner[$index++] = new HostelOwner($row['owner_id'], $row['name'], $row['age'], $row['sex'], $row['phone_no']);
					}
				}

				$this->conn->closeConnection();
				return array($hostels,$owner);
			}
			else{
				$this->conn->closeConnection();
				return NULL;
			}
		}

		//method to obtain facilities corresponding to a  hostel
		public function getHostelFacilities($hostelId){
			$nconn = $this->conn->getConnection();

			$sql = "SELECT facility_name FROM facilities WHERE hostel_id = $hostelId";

			$result = $nconn->query($sql);

			if($result->num_rows > 0){
				$facilities = array();
				$index = 0;

				while($row = $result->fetch_assoc()){
					$facilities[$index++] = new Facilities($hostelId,$row['facility_name']);
					//Facilities of a hostel
				}

				$sql = "SELECT hostel_name FROM hostel WHERE hostel_id = $hostelId";
				$hostelName = $nconn->query($sql);

				if($hostelName->num_rows > 0){
					$hostelName = $hostelName->fetch_assoc();
					$hostelName = $hostelName['hostel_name'];
					//Hostel name
				}
				else{
					$hostelName = '';
				}
				//close db connection
				$this->conn->closeConnection();

				return array($hostelName, $facilities);
				//return hostel_id hostel_name and its facilities
			}
			else{
				$this->conn->closeConnection();
				return NULL;
			}
		}

		//method to fetch details of rooms of a hostel
		public function getHostelRooms($hostelId){
			$nconn = $this->conn->getConnection();
			
			$sql = "SELECT room_no, price, availability, student_id FROM rooms WHERE hostel_id = $hostelId";

			$result = $nconn->query($sql);

			if($result->num_rows > 0){
				$rooms = array();
				$index = 0;

				while($row = $result->fetch_assoc()){
					$rooms[$index++] = new Rooms($hostelId, $row['room_no'], $row['price'], $row['availability'], $row['student_id']);
					//get all the rooms of a hostel
				}

				$sql = "SELECT hostel_name FROM hostel WHERE hostel_id = $hostelId";
				$hostelName =  $nconn->query($sql);

				if($hostelName->num_rows > 0){
					$hostelName = $hostelName->fetch_assoc();
					$hostelName = $hostelName['hostel_name'];
					//get hostel name
				}
				else{
					$hostelName = '';
				}

				$this->conn->closeConnection();
				return array($hostelName, $rooms);
				//return hostel_id, hostel_name, room_no and corrsponding detail
			}
			else{
				$this->conn->closeConnection();
				return NULL;
			}
		}

		//Function to get details of an hostel owner
		public function getOwnerDetails($ownerId){
			$nconn = $this->conn->getConnection();
			$sql = "SELECT * FROM hostel_owner WHERE owner_id = $ownerId";

			$result = $nconn->query($sql);

			$this->conn->closeConnection();

			if($result->num_rows > 0){
				$ownerDetails = $result->fetch_assoc();
				$ownerDetails = new HostelOwner($ownerDetails['owner_id'], $ownerDetails['name'], $ownerDetails['age'], $ownerDetails['sex'], $ownerDetails['phone_no']);

				return $ownerDetails;
			}
			else{
				return null;
			}
		}
	}
?>