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
			      <a class="navbar-brand" href="'.HTTP.'">Hostels</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul id="options" class="nav navbar-nav">
			        <li><a href="'.HTTP.'">Home</a></li>
			        <li><a href="#">About us</a></li>
			        <li><a href="'.HTTP.'hostels.php">Hostels</a></li> 
			        <li><a href="#">Help</a></li> 
			      </ul>
			      <ul id="right_options" class="nav navbar-nav navbar-right">
			      	<li><a href="'.HTTP.'signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        			<li><a href="'.HTTP.'login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      </ul>
			    </div>
		  	</div>
		</nav>';
?>