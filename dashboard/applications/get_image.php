<?php

	include('../config.php');
	include('../ChromePhp.php');
	
	$query = 'SELECT * FROM Images WHERE article_id = ' . $_POST['article_id'];
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	
	echo '../' . $row['image_dir'];
?>