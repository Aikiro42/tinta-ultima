<?php

	include('../config.php');
	include('../ChromePhp.php');
	
	//ChromePhp::log('your log goes here');
	
	$current_time = time();
	/*
	$current_date = date('Y-m-d',$current_time);
	ChromePhp::log('[add-article.php]: ' . $current_date);
	$query = 'INSERT INTO Articles VALUES ('.$current_time.', 1, 1, \'New Article\', \'article lead\', \'content\', 1, '.$current_date.','.$current_date.')';
	*/
	$query = 'INSERT INTO Articles VALUES ('.$current_time.', 1, 1, \'New Article\', \'article lead\', \'content\', 1)';
	$result = mysqli_query($dbc, $query) or die('[ERROR]:Article not added.');
	ChromePhp::log('success: broadcrasting from applications/add-article.php');
	echo "[SUCCESS]: Added new article template.";
?>