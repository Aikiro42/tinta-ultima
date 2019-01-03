<?php

	include('config.php');
	include('ChromePhp.php');
	
	$article_type_id = $_POST['article_type_id'];
	
	$query = "SELECT * FROM ArticleTypes WHERE article_type_id = " . $article_type_id;
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	$section = $row['article_type_name'];
	$section_class = strToLower($section);
		
	$article_id = '';
	$header = '';
	$lead = '';
	$author = '';
	$date = '';
	$image = '';
	
	//offset restraint, remember
	$query = 'SELECT * FROM Articles WHERE article_type_id = '.$article_type_id.' ORDER BY article_id DESC';
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		
		$article_id = $row['article_id'];
		$header = $row['header'];
		$lead = $row['article_lead'];
		
		$sub_query = 'SELECT * FROM Authors WHERE author_id = ' . $row['author_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		
		$author = $sub_row['firstName'] . ' ' . $sub_row['lastName'];
		$date = date('F d, Y', $row['article_id']);
		
		$sub_query = 'SELECT * FROM Images WHERE article_id = ' . $row['article_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		
		$image = $sub_row['image_dir'];
	}

?>
<h1 class="section-label <?php echo $section_class;?>"><?php echo $section;?></h1>
<img id="featured-section-image" src="<?php echo $image;?>" />

<div id="section-container" class="inside-container">
	<div class="transform-container">
		<div id="featured-section-article">
			<h1 id="featured-section-article-header"><?php echo $header;?></h1>
			<p id="featured-section-article-lead"><?php echo $lead?></p>
			<span id="featured-section-article-cred"><?php echo $date?> | <?php echo $author?></span>
			<input type="hidden" value="<?php echo $article_id?>" />
		</div>
	</div>

	<div id="article-item-list">
		
		<?php
			$query = 'SELECT * FROM Articles WHERE article_type_id = '.$article_type_id.' ORDER BY article_id DESC OFFSET 2';
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result)){
				
				$article_id = $row['article_id'];
				$header = $row['header'];
				$lead = $row['article_lead'];
				
				$sub_query = 'SELECT * FROM Authors WHERE author_id = ' . $row['author_id'];
				$sub_result = mysqli_query($dbc, $sub_query);
				$sub_row = mysqli_fetch_array($sub_result);
				
				$author = $sub_row['firstName'] . ' ' . $sub_row['lastName'];
				$date = date('F d, Y', $row['article_id']);
				
				$sub_query = 'SELECT * FROM Images WHERE article_id = ' . $row['article_id'];
				$sub_result = mysqli_query($dbc, $sub_query);
				$sub_row = mysqli_fetch_array($sub_result);
				
				$image = $sub_row['image_dir'];
				
				echo '
				
				<div class="article-item">
					<img class="article-item-image" src="'.$image.'" />
					<div class="article-item-info">
						<h1 class="article-item-header">'.$header.'</h1>
						<p class="article-item-lead">'.$lead.'</p>
						<span class="article-item-cred">'.$date.' | '.$author.'</span>
					</div>
					<div class="clear"></div>
					<input type="hidden" value="<?php echo $article_id?>" />
				</div>
				
				
				';
			}
		
		?>
		
		

	</div>

	<div class="footer-container">
	</div>
		
	
</div>

<script src="js/footer.js"></script>
<script src="js/section.js"></script>