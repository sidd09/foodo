<?php
	require('../conf/init.php');
	
	if ($_GET['createdb']) {
		$rdb = new RestaurantDb();
		$rdb->createTable();
	}
	else {
		$controller = new ApiController();
		$controller->showAll();
	}