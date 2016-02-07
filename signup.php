<?php include_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	  
		<title>SignUp</title>

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
		<h2 class="bg-success text-danger text-center"><strong>Sign Up</strong></h2>

		<div class="row">
			<div class="col-sm-6">
				<button type="button" id="button1" class="btn btn-primary btn-lg btn-block">I am a Student!</button>
			</div>
			<div class="col-sm-6">
				<button type="button" id="button2" class="btn btn-primary btn-lg  btn-block">A Hostel owner!</button> 
			</div>
		</div> 
		<p></p>
		<p></p>
		<!-- Student sign up-->
		<form role="form" id="student_form" action="#" method="post">
			<div class="form-group">
				<lable for="st_name" class="text-primary"><strong>Name:</strong></lable>
				<input type="text" class="form-control" name="st_name" id="st_name" autofocus maxlength="20" placeholder="Student name"/>
			</div>
			<div class="form-group">
				<label for="st_email" class="text-primary"><strong>Email:</strong></label>
				<input type="email" class="form-control" name="st_email" id="st_email" maxlength="40" placeholder="Student email id"/>
			</div>
			<div class="form-group">
				<label for="st_password" class="text-primary"><strong>Password:</strong></label>
				<input type="password" class="form-control" name="st_password" id="st_password" maxlength="10" placeholder="Password"/>
			</div>
			<div class="form-group">
				<label for="st_age" class="text-primary"><strong>Age:</strong></label>
				<input type="text" class="form-control" name="st_age" id="st_age" maxlength="2" placeholder="Age"/>
			</div>
			<div class="radio">
				<label><input type="radio" name="sex" value="male" checked><strong><span class="text-primary"> Male</span></strong></label>
				<br/>
				<label><input type="radio" name="sex" vlue="female"><strong><span class="text-primary"> Female</span></strong> </label>
			</div>
			<div class="form-group">
				<input type="hidden" name="user-type" id="user-type" value="student">
			</div>
			<br>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>	
		</form>

		<!-- Hostel owners sign up-->
		<form role="form" id="owner_form" class="hidden" action="#" method="post">
			<div class="form-group">
				<lable for="ow_name" class="text-primary"><strong>Name:</strong></lable>
				<input type="text" class="form-control" name="ow_name" id="ow_name" autofocus maxlength="20" placeholder="Owner name"/>
			</div>
			<div class="form-group">
				<label for="ow_email" class="text-primary"><strong>Email:</strong></label>
				<input type="email" class="form-control" name="ow_email" id="ow_email" maxlength="40" placeholder="Owner email"/>
			</div>
			<div class="form-group">
				<label for="ow_password" class="text-primary"><strong>Password:</strong></label>
				<input type="password" class="form-control" name="ow_password" id="ow_password" maxlength="10" placeholder="Password"/>
			</div>
			<div class="form-group">
				<label for="ow_age" class="text-primary"><strong>Age:</strong></label>
				<input type="text" class="form-control" name="ow_age" id="ow_age" maxlength="2" placeholder="Age"/>
			</div>
			<div class="form-group">
				<label for="ow_contact" class="text-primary"><strong>Contact Number:</strong></label>
				<input type="text" class="form-control" name="ow_contact" id="ow_contact" minlength="10" maxlength="10" placeholder="Owner contact number"/>
			</div>
			<div class="radio">
				<label><input type="radio" name="sex" value="male" checked><strong><span class="text-primary"> Male</span></strong></label>
				<br/>
				<label><input type="radio" name="sex" vlue="female"><strong><span class="text-primary"> Female</span></strong> </label>
			</div>
			<div class="form-group">
				<input type="hidden" name="user-type" id="user-type" value="owner">
			</div>
			<br>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>	
		</form>
	</div>	
	<?php
		include_once(ROOT_DIR.'view/layout/footer.php');
	?>

	<script type="text/JavaScript">

		$(document).ready(function(){
			$("ul[id=right_options] li:eq(0)").addClass("active");

			$("#button1").click(function(){
				$("#student_form").removeClass('hidden');
				$("#owner_form").addClass('hidden');
				$("#st_name").focus();
			});

			$("#button2").click(function(){
				$("#owner_form").removeClass('hidden');
				$("#student_form").addClass('hidden');
				$("#ow_name").focus();
			});
		});

	</script>
	
</body>
</html>