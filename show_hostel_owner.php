<?php
	require_once('config.php');
	include_once(ROOT_DIR."controller/hostel_owner_controller.php");
	
	$ownerController = new HostelOwnerController();
	$ownerController->invoke();
?>