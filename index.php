<?php
	include_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
	<title>Home</title>

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
</head>
<body>

	<script type="text/javascript">
      
      $(document).ready(function(){

        $(window).resize(function(){
          var nav_bar_height = $('#navigationBar').outerHeight();
          var window_height = $(window).height();
          //$('#myCarousel').outerHeight(window_height + "px");
          var footer_height = $('#footer').outerHeight();
          var image_height = window_height -(nav_bar_height + footer_height);
          $('img').outerHeight(image_height + "px");
        });

        var nav_bar_height = $('#navigationBar').outerHeight();
        var window_height = $(window).height();
        //$('#myCarousel').outerHeight(window_height + "px");
        var footer_height = $('#footer').outerHeight();
        var image_height = window_height -(nav_bar_height + footer_height);
        $('img').outerHeight(image_height + "px");
      });
      
    </script>
    
	<!--Script to mark an navigation tab active-->
    <script type="text/JavaScript">
    	$(document).ready(function(){
    		$("ul[id=options] li:eq(0)").addClass("active");
    	});
    	
    </script>

	<?php
		include_once(ROOT_DIR.'view/layout/header.php');
	?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1" ></li>
	    <li data-target="#myCarousel" data-slide-to="2" ></li>
	    <li data-target="#myCarousel" data-slide-to="3" ></li>
	    <li data-target="#myCarousel" data-slide-to="4" ></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	  	
	  	<div class="item active">
	      <img class="img-responsive" src=<?php echo ''.HTTP.'resources/images/hostel-sign.jpg';?> alt="hostel_sign">
	      <div class="carousel-caption">
	        <h3>Welcome</h3>
	        <p>Home away from Home.</p>
	      </div>
	    </div>
		
		<div class="item">
	      <img class="img-responsive" src=<?php echo ''.HTTP.'resources/images/hostel.jpg';?> alt="hostel">
	      <div class="carousel-caption">
	        <h3>Best infrastructure</h3>
	        <p>Best facilities at best prices</p>
	      </div>
	    </div>

	    <div class="item">
	      <img class="img-responsive" src=<?php echo ''.HTTP.'resources/images/boys_hostel.jpg';?> alt="Boys Hostel">
	      <div class="carousel-caption">
	        <h3>Boys Hostel</h3>
	      </div>
	    </div>

	    <div class="item">
	      <img class="img-responsive" src=<?php echo ''.HTTP.'resources/images/girls_hostel.jpg';?> alt="Girls Hostel">
	      <div class="carousel-caption">
	        <h3>Girls Hostel</h3>
	        <p>Safe just as home</p>
	      </div>
	    </div>

	    <div class="item">
	      <img class="img-responsive" src=<?php echo ''.HTTP.'resources/images/girls_dorms.jpg';?> alt="Girls Hostel">
	      <div class="carousel-caption">
	        <h3>Fun with friends</h3>
	        <p>Its good to have company</p>
	      </div>
	    </div>
		
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

	<?php
		include_once(ROOT_DIR.'view/layout/footer.php');
	?>
</body>
</html>