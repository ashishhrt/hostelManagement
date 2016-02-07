<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'hostelManagement/config.php');
    echo '
    <!DOCTYPE html>
    <html>
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      
    	<title>Error</title>

        <!-- Bootstrap -->
        <link href="'.HTTP.'resources/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery (necessary for Bootstrap JavaScript plugins) -->
        <script src="'.HTTP.'resources/js/jquery-1.11.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="'.HTTP.'resources/js/bootstrap.min.js"></script>

        <style type="text/css">
        	.row{
        		margin: 0px;
        	}
        	p{
        		font-weight: bold;
        	}
        </style>
    </head>
    <body class="bg-success">
    	<br>
    	<br>
    	<h1 class="text-danger text-center" ><strong>Error Page</strong></h1>
    	<br>
    	<br>
    	<br>
    	<div class="row">
    	<div class="col-sm-4"></div>
    	<div class="col-sm-4">
    		<p class="text-danger text-center">
    ';
?>