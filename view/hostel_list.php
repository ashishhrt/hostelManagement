<?php session_start(); ?>
<html>
	 <head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  
		<title>Hostel List</title>

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
				border-bottom: 1px solid #ddd;
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
			else
				include_once(ROOT_DIR.'view/layout/header.php');
		?>
		<div class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>Hostel name</th>
					<th>Facilities</th>
					<th>Location</th>
					<th>Owner</th>
					<th>Contact No</th>
				</tr>
				<?php
					foreach ($hostels[0] as $hostel) {
						$ownerName;
						$ownerNo;
						foreach($hostels[1] as $owner){
							if($owner->owner_id == $hostel->owner_id){
								$ownerName = ucwords($owner->owner_name);
								$ownerNo = $owner->owner_no;
							}
						}
						echo '<tr>
						<td><a href="'.HTTP.'hostels.php?hostelId='.$hostel->hostel_id.'">'.ucwords($hostel->hostel_name).'</a></td>
						<td><a href="'.HTTP.'hostels.php?facilities='.$hostel->hostel_id.'">Facilities</a></td>
						<td>'.ucwords($hostel->location).'</td>
						<td><a href="'.HTTP.'show_hostel_owner.php?ownerId='.$hostel->owner_id.'">'.$ownerName.'</a</td>
						<td>'.$ownerNo.'</td>
						</tr>';
					}
					
				?>

			</table>
		</div>
		<?php
			include(ROOT_DIR.'view/layout/footer.php');
		?>
	</body>
</html>