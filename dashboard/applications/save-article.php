<?php

	include('../config.php');
	include('../ChromePhp.php');
	
	$query = 'UPDATE Articles SET article_type_id = '.$_POST['article_type_id'].', author_id = '.$_POST['author_id'].', header = \''.$_POST['header'].'\', article_lead = \''.$_POST['article_lead'].'\', content = \''.$_POST['content'].'\', priority = '.$_POST['priority'].' WHERE article_id = '.$_POST['article_id'];
	ChromePhp::log($query);
	$result = mysqli_query($dbc, $query) or die('[ERROR]:Article not saved.');
	echo "[SUCCESS]:Article saved successfully.";
	ChromePhp::log('success: broadcasting from save-article.php');

?>