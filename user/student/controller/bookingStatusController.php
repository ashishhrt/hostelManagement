<?php
	require_once(ROOT_DIR.'user/student/model/bookingStatusModel.php');

	class BookingStatusController{
		private $model;

		public function __construct(){
			$this->model = new BookingStatusModel();
		}

		public function invoke($student_id){
			$booking_details = $this->model->getBookingDetails($student_id);

			return $booking_details;
			#return null;
			#$booking_details = array(array('Radha', 21, 'kota', 'ashish', '9876543210', 1, 1), array('Radha', 21, 'kota', 'ashish', '9876543210', 1, 1));
			#return $booking_details;

		}
	}
?>