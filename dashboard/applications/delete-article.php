<?php

	include('../config.php');
	include('../ChromePhp.php');
	
	ChromePhp::log($_POST['article_id']);
	
	$query = "DELETE FROM Articles WHERE article_id = " . $_POST['article_id'];
	$result = mysqli_query($dbc, $query) or die('[ERROR]:Article not deleted.');
	
	ChromePhp::log('success: broadcasting from delete-article.php');
	echo "[SUCCESS]:Deleted article entry successfully.";
?>