<div id="article-container" class="inside-container">

	<?php
	
	include('../config.php');
	include('../ChromePhp.php');
	
	$article_id = $_POST['article_id'];
	
	$query = 'SELECT * FROM Articles WHERE article_id = ' . $article_id;
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	
	$header = $row['header'];
	$content = $row['content'];
	$author_id = $row['author_id'];
	$article_type_id = $row['article_type_id'];
	$upload_date = date('F d, Y; g:i A', $article_id);
	
	$query = 'SELECT * FROM Authors WHERE author_id = ' . $author_id;
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	
	$name = $row['firstName'] . ' ' . $row['lastName'];
	$role = $row['role'];
	
	$query = 'SELECT * FROM Images WHERE article_id = ' . $article_id;
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	$image_dir = $row['image_dir'];

	
	?>

	<div id="wrapper">
		<h1 id="article-header"><?php echo $header;?></h1>
		<img id="article-image" src="<?php echo $image_dir;?>"></img>
		<div id="author-credentials">
			<span id="name"><?php echo $name;?></span>
			<span id="role"><em><?php echo $role;?></em></span>
			<hr />
			<span id="upload-date"><?php echo $upload_date;?></span>
		</div>
		
		<article id="article-content">
			<?php echo $content;?>
		</article>
		
		<a id="back-to-top" href="#site_header">Back to Top</a>
	</div>
	
	
</div>


	<div class="footer-container">
	</div>

<script src="js/footer.js"></script>