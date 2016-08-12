<?php
	require_once(ROOT_DIR.'user/owner/model/hostelDetailsModel.php');

	class HostelDetailsController{
		private $model;

		public function __construct(){
			$this->model = new HostelDetailsModel();
		}

		public function invoke($owner_id){
			$hostel_details = $this->model->getHostelDetails($owner_id);

			return $hostel_details;
			#return null;
			#$booking_details = array(array('Radha', 21, 'kota', 'ashish', '9876543210', 1, 1), array('Radha', 21, 'kota', 'ashish', '9876543210', 1, 1));
			#return $booking_details;

		}
	}
?>