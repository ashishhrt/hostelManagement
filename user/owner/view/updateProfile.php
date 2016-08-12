<?php
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'hostelManagement/config.php');
?>

<?php
	//if unauthorized show error page else proceed
	if(!isset($_SESSION['owner_id'])){
		include_once(ROOT_DIR.'view/error/error_top.php');
		echo 'You are not authorized<br><a href="'.HTTP.'login.php">Login</a>';
		include_once(ROOT_DIR.'view/error/error_bottom.php');
	}
	else if($_SERVER['REQUEST_METHOD'] != "POST"){
		session_unset();
		session_destroy();
		include_once(ROOT_DIR."view/error/error_top.php");
		echo 'Your connection is NOT SECURE<br>Ensure you are connected safely';
		include_once(ROOT_DIR."view/error/error_bottom.php");
	}
	else{
		include_once(ROOT_DIR.'user/owner/controller/updateProfileController.php');

		//get all the data from update form
		$owner_details = array();
		$index = -1;
		/************student details, dignose input********************/
		$owner_details[++$index] = (int)htmlspecialchars(stripslashes(trim($_SESSION['owner_id'])));
		$owner_details[++$index] = htmlspecialchars(stripslashes(trim($_POST['ow_name'])));
		$owner_details[++$index] = (int)htmlspecialchars(stripslashes(trim($_POST['ow_age'])));
		$owner_details[++$index] = htmlspecialchars(stripslashes(trim($_POST['sex'])));
		$owner_details[++$index] = htmlspecialchars(stripslashes(trim($_POST['password'])));
		/**********************************************/

		$controller = new UpdateProfileController();
		$result = $controller->invoke($owner_details, $index);
		#echo "result = ".$result;
		//if invalid password then notify
		
		if($result === false){
			header("Location:".HTTP."user/owner/view/editProfile.php?authentication=false");
		}
		else if($result === 'error'){
			//if some error ocurred, notify
			header("Location:".HTTP."user/owner/view/home.php?update=0");
		}
		else{
			//if update success, notify of success
			header("Location:".HTTP."user/owner/view/home.php?update=1");
		}
		
	}
?>