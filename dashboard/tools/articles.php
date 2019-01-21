
<div class="sub-container">

<div class="article-list">
	<!--
	<div class="article-item article-sample">
		<h1 class="article-title">This is an Article Title - <em>News</em></h1>
		<img src="img/delete-icon.png" class="delete-article-button util-button">
		<img src="img/edit-icon.png" class="edit-article-button util-button">
		<img src="img/view-icon.png" class="view-article-button util-button">
		<div class="clear"></div>
		<div class="edit-article-container">
		</div>
	</div>
	-->
	<?php
	
		include('../config.php');
		include('../ChromePhp.php');
		
		$query = "SELECT * FROM Articles";
		$result = mysqli_query($dbc, $query);
		while($row = mysqli_fetch_array($result)){
			
			$sub_query = 'SELECT article_type_name FROM ArticleTypes WHERE article_type_id = ' . $row['article_type_id'];
			$sub_result = mysqli_query($dbc, $sub_query);
			$sub_row = mysqli_fetch_array($sub_result);
			
			$article_header = $row['header'];
			$article_type = $sub_row['article_type_name'];
			$article_id = $row['article_id'];
			
			echo '
			
			<div class="article-item">
				<h1 class="article-title">'.$article_header.' - <em>'.$article_type.'</em></h1>
				<img src="img/delete-icon.png" class="delete-article-button util-button">
				<img src="img/edit-icon.png" class="edit-article-button util-button">
				<img src="img/view-icon.png" class="view-article-button util-button">
				<div class="clear"></div>
				
				<input type="hidden" value="'.$article_id.'" name="article_id" />
				<div class="view-article-container"></div>
				<div class="edit-article-container"></div>
			</div>
			
			';
		}
	
	?>

	<span id="add-article-button">+ Add Article +</span>

</div>

</div>

<script src="js/tools/articles.js"></script>