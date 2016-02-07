<?php
	include_once('config.php');
	include_once(ROOT_DIR."controller/controller.php");
	
	$controller = new Controller();
	$controller->invoke();
?>
