<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  
		<title>Hostel Details</title>

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
			}

			th,td{
				text-align: center;
			}
			
			#available{
				color: green;
			}
			#not_available{
				color: red;
			}

			.table-responsive{
				margin-top: 46px;
				margin-bottom:20px;
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
					<th>Hostel name</th>
					<th>Room No.</th>
					<th>Rent</th>
					<th>Availability</th>
				</tr>
				<tr style="border-bottom: 1px solid #ddd;">
					<?php
						echo '<th id="hostel_name" rowspan = "'.(count($hostelRooms[1])+1).'">'.ucwords($hostelRooms[0]).'</th>';
					?>
				</tr>
				<?php
					foreach ($hostelRooms[1] as $room) {
						echo '<tr style="border-bottom: 1px solid #ddd;">
						<td>'.$room->room_no.'</td>
						<td>$'.$room->price.'</td>
						<td>'.(($room->availability == 1)?'<span id="not_available">Not available</span>': '<span id="available">Available</span>').'</td>
						</tr>';
					}
					
				?>
		</table>
	</div>
	
	<?php
		include('layout/footer.php');
	?>
</body>
</html>