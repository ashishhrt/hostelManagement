<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  
		<title>Owner Details</title>

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
	    	#navigationBar{
	    		border-radius: 0;
	    	}
			
			#footer{
				border-radius: 0;
				margin-bottom: 0;
			}

			#hostel_name{
				text-align: center;
				border-right: 1px solid #ddd;
				vertical-align: middle !important;
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
			
			.table-responsive{
				margin-top: 46px;
				margin-bottom: 20px;
			}
	    </style>
</head>
<body>
	
	<script type="text/JavaScript">
		$(document).ready(function(){
			$("ul[id=options] li:eq(2)").addClass("active");
		});
		
	</script>

	<?php 
		if(isset($_SESSION['student_id']))
			include_once(ROOT_DIR.'user/student/view/layout/header.php');
		else if(isset($_SESSION['owner_id']))
				include_once(ROOT_DIR.'user/owner/view/layout/header.php');
		else
			include_once(ROOT_DIR.'view/layout/header.php');
	?>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th colspan="3">Owner Details</th>
			</tr>
			<?php
				echo '<tr><td>Name<td><td>'.ucwords($ownerDetails->owner_name).'</td></tr>';
				echo '<tr><td>Age<td><td>'.$ownerDetails->owner_age.'</td></tr>';
				echo '<tr><td>Sex<td><td>'.(($ownerDetails->owner_sex == "m")?"Male":"Female").'</td></tr>';
				echo '<tr><td>Contact No<td><td>'.$ownerDetails->owner_no.'</td></tr>';
			?>
		</table>
	</div>
	
	<?php
		include('layout/footer.php');
	?>
</body>
</html>