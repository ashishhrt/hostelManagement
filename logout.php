<?php
	/*destroy session*/
	session_start();
	session_unset();
	session_destroy();
	require_once('config.php');
	/*--------------*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Logout</title>

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
		.outer{
			text-align: center;
			background-color: #999;
			
		}

		h2{
			margin: 0px;
		}

		.progress{
			width:60%;
			margin: auto;
		}
	</style>
</head>
<body>
	<?php	
		echo'<div class="outer">
		<h2><strong>Logging out...</strong></h2><br>
		<div class="progress">
		    <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
		      
		    </div>
		  </div>
		</div>
		';

		header("refresh:2; url=".HTTP."login.php"); //redirect to other page after 1 sec
	?>

	<script type="text/javascript">
		$(document).ready(function() {
			var div_height = $(window).height();
			$(".outer").css({
				height: div_height
			});

			var h2_height = $("h2").height();
			$(".outer").css("padding-top",(div_height-h2_height)/2);
			//animate the progress bar
			$("#bar").animate({width: '100%'},1000);

			$(window).resize(function(){
				var div_height = $(window).height();
				$(".outer").css({
					height: div_height
				});

				var h2_height = $("h2").height();
				$(".outer").css("padding-top",(div_height-h2_height)/2);
			});
		});
	</script>
</body>
</html>
