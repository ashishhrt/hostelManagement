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
	  	
		<title><?php if(!isset($_SESSION['owner_id'])){echo 'Error';} else{echo 'Hostel details';}?></title>

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
			
			.result{
				margin-top: 31.5px;
			}

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

			#no_booking{
				background-color: #696767;
				padding: 150px;
				text-align: center;
			}
	    </style>
	
</head>
<body>
	<!--Script to mark an navigation tab active-->
    <script type="text/JavaScript">
    	$(document).ready(function(){
    		$("ul[id=options] li:eq(1)").addClass("active");
    	});
    	
    </script>
	<?php
		#echo $_SESSION['owner_id'].'<br>';
		if(!isset($_SESSION['owner_id'])){
			include_once(ROOT_DIR.'view/error/error_top.php');
			echo 'You are not authorized<br><a href="'.HTTP.'login.php">Login</a>';
			include_once(ROOT_DIR.'view/error/error_bottom.php');
		}
		else{
			
			include_once(ROOT_DIR.'user/owner/controller/hostelDetailsController.php');

			$controller = new HostelDetailsController();
			$hostel_details = $controller->invoke($_SESSION['owner_id']); //get hostel details
?>
			

<?php		include_once(ROOT_DIR.'user/owner/view/layout/header.php'); 
			if(is_null($hostel_details)){
				
				echo '<div id="no_booking"><h1>You have not registered any hostel!</h1><br><h2><a href="'.HTTP.'user/owner/view/home.php">Home</a></h2></div>';
				
			}
			else{
				$hostelCount = count($hostel_details); //Number of hostels booked

				foreach($hostel_details as $hostel_data){
?>

	<div class="result table-responsive">
		<table class="table table-hover">
			<tr>
				<th colspan="2">
					<?php
					
					echo 'Hostel details';
					/*
					$name = str_replace(' ', '', strtolower($result[1]));
					echo '
					<img id="profile_picture" src="'.HTTP.'user/student/resources/images/'.$name.'/'.$name.'.jpg" alt="test profile image"/>
					';
					#profile picture in the images folder of student inside folder name same as student name(with no spaces in between)
					#image name same as folder name with .jpg extension 
					*/
					?>

				</th>
			</tr>
				<?php
					$index = 1;
					/*--------Hostel owned by owner detais------------------*/
					echo '<tr><td>Hostel Name</td><td><a href="'.HTTP.'hostels.php?hostelId='.$hostel_data[0].'">'.ucwords($hostel_data[$index++]).'</td></tr>';
					echo '<tr><td>Location</td><td>'.ucwords($hostel_data[$index++]).'</td></tr>';
					echo '<tr><td>Facilities</td><td><a href="'.HTTP.'hostels.php?facilities='.$hostel_data[0].'">Facilities</a></td></tr>';
				?>
		</table>
	</div>
<?php
				}
			}
				#echo '<br><button onclick="logout()">Logout</button>';
				include_once(ROOT_DIR.'user/owner/view/layout/footer.php');
				#echo'<script>function logout(){alert("Loging out"); window.location = "'.HTTP.'logout.php";}</script>';
			
		}

	?>
</body>
</html>