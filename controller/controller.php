<?php
	include_once(ROOT_DIR."model/model.php");

	class Controller{
		public $model;

		public function __construct()
		{
			$this->model = new Model();
		}

		public function invoke(){
			if(!isset($_GET['hostelId']) && !isset($_GET['facilities'])){
				//if no specific hostel requested show all the available hostels
				$hostels = $this->model->getHostelList();

				include ROOT_DIR.'view/hostel_list.php';
			}
			else if(isset($_GET['facilities'])){
				//if facilities details corresponding to a hostel is requested
				$facilities = $this->model->getHostelFacilities($_GET['facilities']);

				include ROOT_DIR.'view/hostel_facilities.php';
			}
			else{
				//if requested specific hostel, show its rooms 
				$hostelRooms = $this->model->getHostelRooms($_GET['hostelId']);

				include ROOT_DIR.'view/hostel_rooms.php';
			}
		}
	}
?>