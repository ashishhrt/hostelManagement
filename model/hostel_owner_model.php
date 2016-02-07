<?php
	
	class HostelOwner
	{
		public $owner_id;
		//public $hostel_id;
		public $owner_name;
		public $owner_age;
		public $owner_sex;
		public $owner_no;

		public function __construct($owner_id, $owner_name, $owner_age, $owner_sex, $owner_no)
		{
			$this->owner_id = $owner_id;
			//$this->hostel_id = $hostel_id;
			$this->owner_name = $owner_name;
			$this->owner_age = $owner_age;
			$this->owner_sex = $owner_sex;
			$this->owner_no = $owner_no;
		}
	}

?>