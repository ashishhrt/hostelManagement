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
	  	
		<title><?php if(!isset($_SESSION['owner_id'])){echo 'Error';} else{echo 'Edit profile';}?></title>

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
			
			
			.container{
				overflow-y: auto;
			}
	    </style>
	
</head>
<body>
	<!--Script to mark an navigation tab active-->
    <script type="text/JavaScript">
    	$(document).ready(function(){
    		$("ul[id=right_options] li:eq(0)").addClass("active");
    	});
    	
    </script>
	<?php
		//if unauthorized show error page else proceed
		if(!isset($_SESSION['owner_id'])){
			include_once(ROOT_DIR.'view/error/error_top.php');
			echo 'You are not authorized<br><a href="'.HTTP.'login.php">Login</a>';
			include_once(ROOT_DIR.'view/error/error_bottom.php');
		}
		else{
			
			include_once(ROOT_DIR.'user/owner/controller/ownerDetailsController.php');

			$controller = new OwnerDetailsController();
			$owner_details = $controller->invoke($_SESSION['owner_id']); //get student details
			$index = 0;
			include_once(ROOT_DIR.'user/owner/view/layout/header.php');
			
?>
			<!-- Owner Profile Update form-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
					</div>

					<div class="col-sm-6">
					
						<form role="form" id="owner_form" action="<?php echo HTTP.'user/owner/view/updateProfile.php'; ?>" method="post">

							<?php if(isset($_GET['authentication']) && $_GET['authentication'] == 'false'){ echo "<div class='text-danger'><strong>! Re-enter the details</strong></div><br>"; } ?>
							<div class="form-group">
								<lable for="ow_name" class="text-primary"><strong>Name:</strong></lable>
								<input type="text" class="form-control" name="ow_name" id="ow_name" autofocus maxlength="20" value="<?php echo ucwords($owner_details[++$index]); ?>" />
							</div>
							
							<div class="form-group">
								<label for="ow_age" class="text-primary"><strong>Age:</strong></label>
								<input type="text" class="form-control" name="ow_age" id="ow_age" maxlength="2" value="<?php echo $owner_details[++$index]; ?>" />
							</div>
							<div class="radio">
								<label><input type="radio" name="sex" value="m" <?php $index++; if(strtolower($owner_details[$index]) == 'm') echo 'checked';?>><strong><span class="text-primary"> Male</span></strong></label>
								<br/>
								<label><input type="radio" name="sex" value="f" <?php if(strtolower($owner_details[$index]) == 'f') echo 'checked';?>><strong><span class="text-primary"> Female</span></strong> </label>
							</div>
							<div class="form-group">
								<label for="password" class="text-primary"><strong>Password:</strong></label>
								<input type="password" class="form-control" name="password" id="password" maxlength="10" placeholder="Enter password to authenticate" />
							</div>
							<?php if(isset($_GET['authentication']) && $_GET['authentication'] == 'false'){ echo "<div class='text-danger'>*Incorrect Password !</div>"; } ?>
							<br>
							<button id="button" type="submit" class="btn btn-primary btn-lg btn-block">Update</button>	
						</form>
					</div>

					<div class="col-sm-3">
					</div>
				</div>
			</div>


	<?php
			
			#echo '<br><button onclick="logout()">Logout</button>';
			include_once(ROOT_DIR.'user/owner/view/layout/footer.php');
			#echo'<script>function logout(){alert("Loging out"); window.location = "'.HTTP.'logout.php";}</script>';
			
		}

	?>


	<script type="text/javascript">
	//script to center the form
	$(document).ready(function() {

		$(window).resize(function() {
			$height = $(window).height();
			//$('body').height($height + "px");
			$navbar_height = $('#navigationBar').outerHeight();
			$footer_height = $('#footer').outerHeight();
			$container_height = $height - ($navbar_height + $footer_height);
			$('.container').innerHeight($container_height + "px");
			$form_height = $('#owner_form').height();
			$container_padding_top = ($container_height - $form_height)/2;
			if ($container_padding_top < 0) {
				$('.container').css('padding-top', 0+"px");
			}
			else{
				$('.container').css('padding-top', $container_padding_top +"px");
			}
		});

		$height = $(window).height();
		//$('body').height($height + "px");
		$navbar_height = $('#navigationBar').outerHeight();
		$footer_height = $('#footer').outerHeight();
		$container_height = $height - ($navbar_height + $footer_height);
		$('.container').innerHeight($container_height + "px");
		$form_height = $('#owner_form').height();
		$container_padding_top = ($container_height - $form_height)/2;
		$('.container').css('padding-top', $container_padding_top +"px");

		//alert($('body').height() + '\n' + $(window).height()+'\n'+ $navbar_height+ '\n'+$footer_height);
	});
	</script>
</body>
</html>