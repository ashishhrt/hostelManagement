<?php
	
	class Hostel{
		public $hostel_id;
		public $hostel_name;
		public $location;
		public $owner_id;

		public function __construct($hostel_id, $hostel_name, $location, $owner_id)
		{
			$this->hostel_id = $hostel_id;
			$this->hostel_name = $hostel_name;
			$this->location = $location;
			$this->owner_id = $owner_id;
		}
	}
?>