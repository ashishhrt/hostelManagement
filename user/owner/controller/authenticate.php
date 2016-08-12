<?php
	#include_once('../config.php');
	include_once(ROOT_DIR.'user/owner/model/model.php');

	class Authenticate{
		public $model;

		public function __construct(){
			$this->model = new Model();
		}

		public function authenticate(){
			$result = $this->model->authenticateOwner($_POST['email'], $_POST['password']);
			print_r($result);
			if($result != false){
				session_start();
				$_SESSION['owner_id'] = $result;

				//include_once(ROOT_DIR.'user/owner/view/home.php');
				header('Location:'.HTTP.'user/owner/view/home.php');
			}
			else{
				//echo 'ran';
				//include_once(ROOT_DIR.'login.php');

				header('Location:'.HTTP.'login.php?result=false'); //redirect to login page
			}
		}
	}
?>