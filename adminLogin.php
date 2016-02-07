<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  
		<title>Admin Login</title>

	    <!-- Bootstrap -->
	    <link href="resources/css/bootstrap.min.css" rel="stylesheet">

	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="resources/js/jquery-1.11.3.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="resources/js/bootstrap.min.js"></script>

	    <style type="text/css">
	    	#navigationBar{
	    		border-radius: 0;
	    	}

	    	#footer{
	    		border-radius: 0;
	    		margin-bottom: 0;
	    	}

	    	.container{
	    		padding-bottom: 15px;
	    		width: 60%;
	    	}
	    </style>
</head>
<body>
	<?php
		require_once('config.php'); 
		include_once(ROOT_DIR.'view/layout/header.php');
	?>
	<div class="container">
		<h2 class="bg-success text-danger text-center"><strong>Admin Login</strong></h2>
	<!--	
		<div class="row">
			<div class="col-sm-6">
				<button type="button" id="button1" class="btn btn-primary btn-lg btn-block">As a Student</button>
			</div>
			<div class="col-sm-6">
				<button type="button" id="button2" class="btn btn-primary btn-lg  btn-block">As a Owner</button> 
			</div>
		</div>
		<br>
		<p id="log-type" class="text-danger"><strong>Loging in as a Student<strong></p>
	-->
		<p></p>
		<p></p>
		<!-- Login-->
		<form role="form" id="form" action=<?php echo HTTP."controller/login_controller.php"; ?> method="post">
			
			<div class="form-group">
				<label for="email" class="text-primary"><strong>Email:</strong></label>
				<input type="email" class="form-control" name="email" id="email" maxlength="40" placeholder="Email id"/>
			</div>
			<div class="form-group">
				<label for="password" class="text-primary"><strong>Password:</strong></label>
				<input type="password" class="form-control" name="password" id="password" maxlength="10" placeholder="Password"/>
			</div>
			<div class="form-group">
				<input type="hidden" name="user-type" id="user-type" value="admin">
			</div>
			<br>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>	
		</form>
	</div>
	
	<?php
		include_once(ROOT_DIR.'view/layout/footer.php');	
	?>

	<script type="text/JavaScript">
	/*
		$(document).ready(function(){
			$("ul[id=right_options] li:eq(1)").addClass("active");
		
			$("#button1").click(function(){
				$("#user-type").val('student');
				$("#log-type").html('<strong>Loging in as a Student</strong>');
			});

			$("#button2").click(function(){
				$("#user-type").val('owner');
				$("#log-type").html('<strong>Loging in as a Owner</strong>');
			});
		
		});
	*/
	</script>
</body>
</html>