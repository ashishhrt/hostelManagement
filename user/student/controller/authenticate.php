<?php
	#include_once('../config.php');
	include_once(ROOT_DIR.'user/student/model/model.php');

	class Authenticate{
		public $model;

		public function __construct(){
			$this->model = new Model();
		}

		public function authenticate(){
			$result = $this->model->authenticateStudent($_POST['email'], $_POST['password']);
			#print_r($result);
			if($result != false){
				session_start();
				$_SESSION['student_id'] = $result;

				//include_once(ROOT_DIR.'user/student/view/home.php');
				header('Location:'.HTTP.'user/student/view/home.php');
			}
			else{
				//echo 'ran';
				//include_once(ROOT_DIR.'login.php');

				header('Location:'.HTTP.'login.php?result=false'); //redirect to login page
			}
		}
	}
?>