<?php

	session_start();
	require_once($_SERVER['DOCUMENT_ROOT'].'hostelManagement/config.php');
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  	
		<title><?php if(!isset($_SESSION['student_id'])){echo 'Error';} else{echo 'Profile';}?></title>

	    <!-- Bootstrap -->
	    <?php
	    echo'
	    <link href="'.HTTP.'resources/css/bootstrap.min.css" rel="stylesheet">
	    <link href="'.HTTP.'resources/css/index.css" rel="stylesheet" type="text/css">

	    <!-- jQuery (necessary for Bootstrap JavaScript plugins) -->
	    <script src="'.HTTP.'resources/js/jquery-1.11.3.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="'.HTTP.'resources/js/bootstrap.min.js"></script>';
	    ?>

	    <style type="text/css">

	    	table{
	    		font-size: 1.3em;
				width: 50% !important;
				margin: 0px auto 20px auto !important;
				border-left: 1px solid #ddd !important;
				border-right: 1px solid #ddd !important;
				border-bottom: 1px solid #ddd !important;
			}

			th,td{
				text-align: center;
			}

			#profile_picture{
				border: 1px solid #0B0B0B;
				width: 280px;
				height: 356px;
			}

			.table-responsive{
				margin-top: 29px;
				margin-bottom: 0px;
			}
	    </style>
	
</head>
<body>
	<!--Script to mark an navigation tab active-->
    <script type="text/JavaScript">
    	$(document).ready(function(){
    		$("ul[id=options] li:eq(0)").addClass("active");
    	});
    	
    </script>
	<?php
		#echo $_SESSION['student_id'].'<br>';
		if(!isset($_SESSION['student_id'])){
			include_once(ROOT_DIR.'view/error/error_top.php');
			echo 'You are not authorized<br><a href="'.HTTP.'login.php">Login</a>';
			include_once(ROOT_DIR.'view/error/error_bottom.php');
		}
		else{
			
			include_once(ROOT_DIR.'user/student/controller/studentDetailsController.php');

			$controller = new StudentDetailsController();
			$result = $controller->invoke($_SESSION['student_id']); //get student details

			if(is_null($result)){
				session_unset();
				session_destroy();
				include_once(ROOT_DIR.'view/error/error_top.php');
				echo 'You are not authorized<br><a href="'.HTTP.'login.php">Login</a>';
				include_once(ROOT_DIR.'view/error/error_bottom.php');
			}
			else{
				include_once(ROOT_DIR.'user/student/view/layout/header.php');
?>	
	<div class="table-responsive">
	<table class="table table-hover">
		<tr>
			<th colspan="3">
			<?php
			$name = str_replace(' ', '', strtolower($result[1]));
			echo '
			<img id="profile_picture" src="'.HTTP.'user/student/resources/images/'.$name.'/'.$name.'.jpg" alt="test profile image"/>
			';
			#profile picture in the images folder of student inside folder name same as student name(with no spaces in between)
			#image name same as folder name with .jpg extension 
			?> 
			</th>
		</tr>
		<?php
			$index = 1;
			/*--------student detais------------------*/
			echo '<tr><td>Name<td><td>'.ucwords($result[$index++]).'</td></tr>';
			echo '<tr><td>Age<td><td>'.$result[$index++].'</td></tr>';
			echo '<tr><td>Sex<td><td>'.(($result[$index++] == "m")?"Male":"Female").'</td></tr>';
			#echo '<tr><td>Contact No<td><td>'.$ownerDetails->owner_no.'</td></tr>';
		?>
	</table>
	</div>
<?php

				#echo '<br><button onclick="logout()">Logout</button>';
				include_once(ROOT_DIR.'user/student/view/layout/footer.php');
				#echo'<script>function logout(){alert("Loging out"); window.location = "'.HTTP.'logout.php";}</script>';
			}
		}

	?>
</body>
</html>