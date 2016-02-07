<?php
	
	class Rooms
	{
		public $hostel_id;
		public $room_no;
		public $price;
		public $availability;
		public $student_id;

		public function __construct($hostel_id, $room_no, $price, $availability, $student_id)
		{
			$this->hostel_id = $hostel_id;
			$this->room_no = $room_no;
			$this->price = $price;
			$this->availability = $availability;
			$this->student_id = $student_id;
		}
		/*
		//Overloading concept in php is not same as in other opps languages

		public function __construct($room_no, $price, $availabilty, $student_id)
		{
			$this->hostel_id = NULL;
			$this->room_no = $room_no;
			$this->price = $price;
			$this->availabilty = $availabilty;
			$this->student_id = $student_id;
		}
		*/
	}
?>