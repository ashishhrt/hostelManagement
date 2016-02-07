<?php
	//require_once($_SERVER['DOCUMENT_ROOT'].'/hostelManagement/config.php');
	echo ' 
		<nav id="navigationBar" class="navbar navbar-inverse">
		  	<div class="container-fluid">
			    <div class="navbar-header">
			    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span> 
			      </button>
			      <a class="navbar-brand" href="'.HTTP.'user/student/view/home.php">Student</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul id="options" class="nav navbar-nav">
			        <li><a href="'.HTTP.'user/student/view/home.php">Profile</a></li>
			        <li><a href="'.HTTP.'user/student/view/bookingStatus.php">Booking status</a></li>
			        <li><a href="'.HTTP.'hostels.php">Search hostels</a></li> 
			        <li><a href="#">Help</a></li> 
			      </ul>
			      <ul id="right_options" class="nav navbar-nav navbar-right">
			      	<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Edit profile</a></li>
        			<li><a href="'.HTTP.'logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			      </ul>
			    </div>
		  	</div>
		</nav>';
?>