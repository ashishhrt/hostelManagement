<?php
	include_once(ROOT_DIR.'model/connection.php');

	class UpdateProfileModel{
		private $conn;
		private $oldDirName = null;
		private $nameChanged = false;

		public function __construct(){
			$this->conn = new Connection();
		}

		//update method to update the details of Owner
		public function update($owner_details, $length){
			//first check whether password is correct or not
			
			$own_id_index = 0;
			$own_name_index = 1;
			$passIndex = 4;
									        //owner_id                      //owner_password
			$result = $this->checkPassword($owner_details[$own_id_index], $owner_details[$passIndex]);
			
			if($result === true){
				$result = $this->updateDetails($owner_details, $length);
			}

			/******************* File rename initiated ************************/
			if($result === true){

				//this will be true when update succeeded , now check if user changed his/her name too
				if(!is_null($this->oldDirName)){
					if($this->oldDirName != $owner_details[$own_name_index])
						$this->nameChanged = true;
				}

				//and if user updated his name, then update his directory name and profile picture name
				//as they have same name as of owner name
				if($this->nameChanged === true){

					$this->renameDir($this->oldDirName, $owner_details[$own_name_index]);
					
				}

			}
			/*****************************************************************/

			$this->conn->closeConnection(); //close connection to db
			return $result;
		}

		//verify the authenticity using owner_id and password
		public function checkPassword($owner_id, $owner_password){

			$nconn = $this->conn->getConnection();
			#var_dump($nconn);
			$result = false; //initialize result with false

			$stmt = "SELECT password from owner_authenticator WHERE owner_id = $owner_id";
			$fetch_pass = $nconn->query($stmt);

			if($fetch_pass->num_rows > 0){
				
				$rows = $fetch_pass->fetch_assoc();

				//if password verified set result true
				if($rows['password'] == $owner_password){
					//if user authenticate fetch its current name before applying any updates

					$stmt = "SELECT name from hostel_owner WHERE owner_id = $owner_id";
					$fetch_name = $nconn->query($stmt);

					if($fetch_name->num_rows > 0){
						
						$rows = $fetch_name->fetch_assoc();
						$this->oldDirName = $rows['name']; //store old name
					}

					$result = true;
				}
			}
			
			$nconn = null;
			return $result;
		}

		//after password verification, update details
		public function updateDetails($owner_details, $length){

			$index = 0;
			$nconn = $this->conn->getConnection(); //get connection
			#var_dump($nconn);
			
			//prepare statement
			$stmt = $nconn->prepare("UPDATE hostel_owner SET name = ?, age = ?, sex = ? WHERE owner_id = ?");
			
			//bind parameters
			#var_dump($stmt);
			                         //owner_name              //age                       //sex                        //owner_id
			$stmt->bind_param('sisi', $owner_details[++$index], $owner_details[++$index], $owner_details[++$index], $owner_details[0]);
			#var_dump($stmt);
			
			if($stmt->execute()){

				$stmt->close(); //closeing is important
				//prepare statement should be closed before preparing  another prepare statement
				return true;
			}

			//return error if some error occured in updation
			return 'error';
		}

		/******* Rename the directory containing profile picture ************/
		public function renameDir($oldDirName, $newDirName){

			$oldDirName = str_replace(" ", "", strtolower($oldDirName));
			$newDirName = str_replace(" ", "", strtolower($newDirName));

			$path = ROOT_DIR.'user/owner/resources/images/'.$oldDirName;
			
			if(file_exists($path)){
				//rename directory only
				rename($path, dirname($path).'/'.$newDirName);
				$path = dirname($path).'/'.$newDirName;
				
				if(file_exists($path.'/'.$oldDirName.'.jpg')){
					//rename profile pic too
					rename($path.'/'.$oldDirName.'.jpg', $path.'/'.$newDirName.'.jpg');
					return true;
				}
			}

			return false;
		}

		/**********************************************************************/
	}
?>