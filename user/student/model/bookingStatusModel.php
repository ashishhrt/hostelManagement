<?php
	require_once(ROOT_DIR.'model/connection.php');

	class BookingStatusModel{
		private $conn;

		public function __construct(){
			$this->conn = new Connection();
		}

		public function getBookingDetails($student_id){
			$nconn = $this->conn->getConnection(); //data base connection

			//get hostel_id, room_no
			$sql = "SELECT hostel_id, room_no FROM rooms WHERE student_id = $student_id"; 
			$result = $nconn->query($sql);

			//if room found corresponding student_id get hostel details as well owner details
 			if($result->num_rows > 0){
				$roomNo = array();
				$roomIndex = 0;

				while($row = $result->fetch_assoc()){	
					$roomNo[$roomIndex][0] = $row['hostel_id'];
					$roomNo[$roomIndex][1] = $row['room_no'];
					$roomIndex++;
				}
				//in final result considering a student can book more than one hostels
				$finalResult = array();
				$finalResultIndex = 0;

				$hostelDetails;
				
				for($index = 0; $index < count($roomNo); $index++){
					$hostel_id = $roomNo[$index][0];
					#echo 'hostel_id = '.$hostel_id.'<br>';

					//get hostel details corresponding to hostel_id
					$sql = "SELECT hostel_name, location, owner_id FROM hostel WHERE hostel_id = $hostel_id";
					$result = $nconn->query($sql);

					if($result->num_rows > 0){
						$row = $result->fetch_assoc();
						$hostelDetails = array($row['hostel_name'], $row['location'], $row['owner_id']);

						//get owner details
						$sql = "SELECT name, phone_no FROM hostel_owner WHERE owner_id = $hostelDetails[2]";
						$result = $nconn->query($sql);

						if($result->num_rows > 0){
							$row = $result->fetch_assoc();

							//order of final result -> hostel_name, room_no, location, owner_name, contact_no, hostel_id, owner_id
							$finalResult[$finalResultIndex++] = array($hostelDetails[0], $roomNo[$index][1], $hostelDetails[1], $row['name'], $row['phone_no'], $roomNo[$index][0], $hostelDetails[2]);
						}
					}
				}

				$this->conn->closeConnection();
				$nconn = NULL;
				return $finalResult;
			}
			else{
				$this->conn->closeConnection();
				$nconn = null;
				return NULL;
			}
		}
	}
?>