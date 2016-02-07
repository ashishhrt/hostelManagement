<?php
	//include_once("view/hostel_owner_view.php");
	include_once(ROOT_DIR."model/model.php");

	class HostelOwnerController{
		public $model;

		public function __construct(){
			$this->model = new Model();
		}

		public function invoke(){
			if(!isset($_GET['ownerId']) || $_GET['ownerId'] == ""){
				include(ROOT_DIR."index.php");
			}
			else{
				//get owner info
				$ownerDetails = $this->model->getOwnerDetails($_GET['ownerId']);

				//List owner info
				include(ROOT_DIR."view/hostel_owner_view.php");
			}
		}
	}
?>