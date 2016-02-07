<?php
	
	class Students
	{
		public $student_id;
		public $student_name;
		public $student_age;
		public $student_sex;

		public function __construct($student_id, $student_name, $student_age, $student_sex)
		{
			$this->student_id = $student_id;
			$this->student_name = $student_name;
			$this->student_age = $student_age;
			$this->student_sex = $student_sex;
		}
	}

?>