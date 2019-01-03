<?php

	session_save_path('../tmp');
	include('../config.php');
	include('../ChromePhp.php');
	
	$image_id = time();
	$article_id = $_POST['article_id'];
		
	$target_path = '../img/uploaded/' . $_FILES['file']['name'];
	$file_path = 'dashboard/img/uploaded/' . $_FILES['file']['name'];
	move_uploaded_file($_FILES["file"]["tmp_name"], $target_path);
	
	ChromePhp::log('success: broadcasting from upload-picture.php');
	
	
	$test_query = 'SELECT * FROM Images WHERE article_id = ' . $article_id;
	$test_result = mysqli_query($dbc, $test_query);
	
	if($test_row = mysqli_fetch_array($test_result)){

	$query = 'UPDATE Images SET image_dir = \''.$file_path.'\' WHERE article_id = ' . $article_id;
	ChromePhp::log($query);
	$result = mysqli_query($dbc, $query) or die('sad');
	
	}else{
		$query = 'INSERT INTO Images VALUES ('.$image_id.', '.$article_id.', \''.$file_path.'\')';
		ChromePhp::log($query);
		$result = mysqli_query($dbc, $query) or die('sad');
	}
	
	ChromePhp::log('success: broadcasting from upload-picture.php');
?>