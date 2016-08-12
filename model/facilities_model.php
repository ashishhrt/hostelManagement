<?php
	
	class Facilities
	{
		public $hostel_id;
		public $facility_name;
		
		public function __construct($hostel_id, $facility_name)
		{
			$this->hostel_id = $hostel_id;
			$this->facility_name = $facility_name;
		}
	}

?>