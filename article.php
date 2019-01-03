<?php

	include('config.php');
	include('ChromePhp.php');
	
	$article_id = $_POST['article_id'];
	
	$header = $date = $lead = $content = $author = $image = '';
	
	ChromePhp::log($article_id);
	$query = "SELECT * FROM Articles WHERE article_id = " . $article_id;
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
			
		$header = $row['header'];
		ChromePhp::log($header);
		$date = date('F d, Y', $row['article_id']);
		$lead = $row['article_lead'];
		$content = $row['content'];
		
		$sub_query = 'SELECT * FROM Authors WHERE author_id = ' . $row['author_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		$author = $sub_row['firstName'] . ' ' . $sub_row['lastName'];
		
		$sub_query = 'SELECT * FROM Images WHERE article_id = ' . $row['article_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		$image = $sub_row['image_dir'];

	}

?>

<img id="article-image" src="<?php echo $image;?>"></img>

<div id="article-container" class="inside-container">
	
	<div id="article-wrapper">
	
		<h1 id="article-header"><?php echo $header;?></h1>
		<span id="article-cred"><?php echo $date;?> | <?php echo $author?></span>
		<?php echo $content;?>
		
	</div>
	
	<div class="footer-container">
	</div>

</div>


	

<script src="js/footer.js"></script>