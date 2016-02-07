<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  
		<title>Login</title>

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

	    	.container{
	    		padding-bottom: 15px;
	    		width: 60%;
	    	}
	    </style>
</head>
<body>
	<?php 
		include_once(ROOT_DIR.'view/layout/header.php');
	?>
	<div class="container">
		<h2 class="bg-success text-danger text-center"><strong>Login</strong></h2>

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
		<p></p>
		<?php
			if(isset($_GET['result']) && ($_GET['result'] == 'false')){
				echo '<p class="text-danger"><strong>Invalid login id or password<strong></p>';
			}
		?>
		<p></p>
		<!-- Login-->
		<form role="form" id="form" action=<?php echo HTTP."controller/login_controller.php"; ?>  method="post">
			
			<div class="form-group">
				<label for="email" class="text-primary"><strong>Email:</strong></label>
				<input type="email" class="form-control" name="email" id="email" maxlength="40"autofocus placeholder="Email id"/>
			</div>
			<div class="form-group">
				<label for="password" class="text-primary"><strong>Password:</strong></label>
				<input type="password" class="form-control" name="password" id="password" maxlength="10" placeholder="Password"/>
			</div>
			<div class="form-group">
				<input type="hidden" name="user-type" id="user-type" value="student">
			</div>
			<br>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>	
		</form>
	</div>
	
	<?php
		include_once(ROOT_DIR.'view/layout/footer.php');	
	?>

	<script type="text/JavaScript">

		$(document).ready(function(){
			$("ul[id=right_options] li:eq(1)").addClass("active");

			$("#button1").click(function(){
				$("#user-type").val('student');
				$("#log-type").html('<strong>Loging in as a Student</strong>');
				$("#email").focus();
			});

			$("#button2").click(function(){
				$("#user-type").val('owner');
				$("#log-type").html('<strong>Loging in as a Owner</strong>');
				$('#email').focus();
			});
		});

	</script>
</body>
</html>