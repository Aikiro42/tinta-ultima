<?php

	include('../config.php');
	include('../ChromePhp.php');
	
	//ChromePhp::log('your log goes here');
	
	$current_time = time();
	$query = 'INSERT INTO Articles VALUES ('.$current_time.', 1, 1, \'New Article\', \'article lead\', \'content\', 1)';
	$result = mysqli_query($dbc, $query) or die('sad');
	ChromePhp::log('success: broadcrasting from applications/add-article.php');
?>