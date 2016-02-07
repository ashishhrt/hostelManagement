<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'hostelManagement/config.php');
	require_once(ROOT_DIR.'user/student/model/model.php');

	class StudentDetailsController{
		private $model;

		public function __construct(){
			$this->model = new Model();
		}

		public function invoke($student_id){ //fetch student details of corresponding student_id
			
			$student_details = $this->model->getStudentDetails($student_id);
			if(is_null($student_details[0]))
				return null;
			else
				return $student_details;
		}
	}
?>