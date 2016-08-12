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
		
	}
?>