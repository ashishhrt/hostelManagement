<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'hostelManagement/config.php');

	if($_SERVER["REQUEST_METHOD"] != 'POST'){
		include_once(ROOT_DIR."view/error/error_top.php");
		echo 'Your connection is NOT SECURE<br>Ensure you are connected safely';
		include_once(ROOT_DIR."view/error/error_bottom.php");
	}
	else{
		$login_type = $_POST["user-type"];
		if($login_type == "student"){
			include_once(ROOT_DIR."user/student/controller/authenticate.php");
			$loginStudent = new Authenticate();
			$loginStudent->authenticate();
		}
		else if($login_type == "owner"){
			include_once(ROOT_DIR."user/owner/controller/authenticate.php");
			$loginOwner = new Authenticate();
			$loginOwner->authenticate();
		}
		else if($login_type == "admin"){
			include_once(ROOT_DIR."user/owner/controller/authenticate.php");
			$loginAdmin = new Authenticate();
			$loginAdmin->authenticate();
		}
		else{
			include_once(ROOT_DIR."view/error/error_top.php");
			echo 'Something went wrong<br>Please Contact us';
			include_once(ROOT_DIR."view/error/error_bottom.php");
		}	
	}
?>	