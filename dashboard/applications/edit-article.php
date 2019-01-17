
<?php

	include('../config.php');
	include('../ChromePhp.php');

	$article_id = $_POST['article_id'];
	ChromePhp::log($article_id);
	
	$query = "SELECT * from Articles WHERE article_id = " . $article_id;
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	
	$header = $row['header'];
	$content = $row['content'];
	$article_author = $row['author_id'];
	$article_type = $row['article_type_id'];
	$article_lead = $row['article_lead'];
	
	$query = "SELECT * FROM Images WHERE article_id = " . $article_id;
	$result = mysqli_query($dbc, $query) or die('[ERROR]:Cannot open article. Article ID not found.');
	$row = mysqli_fetch_array($result);

	$image_id = "";
	$image_dir = "";
	if($row != false){
		$image_id = $row['image_id'];
		$image_dir = $row['image_dir'];
	}

?>

<input type="hidden" name="article_id" value="<?php echo $article_id;?>">

<label for="header">Article Title</label>
<br />
<input type="text" name="header" value="<?php echo $header;?>" />


<br />
<label for="article_lead">Article Lead</label>
<br />
<input type="text" name="article_lead" value="<?php echo $article_lead;?>" />

<br />

<label for="author">Author</label>
<br />
<select name="author">
<?php

	$query = "SELECT * FROM Authors ORDER BY lastName";
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$name = $row['lastName'] . ', ' . $row['firstName'];
		$author_id = $row['author_id'];
		$selected = "";
		
		if($article_author == $author_id){
			$selected = "selected";
		}
		
		echo '
		
			<option value="'.$author_id.'" '.$selected.'>'.$name.'</option>
		
		';
	}

?>
</select>

<br />

<label for="category">Category</label>
<br />
<select name="category">
<?php

	$query = "SELECT * FROM ArticleTypes ORDER BY article_type_name";
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$article_type_name = $row['article_type_name'];
		$article_type_id = $row['article_type_id'];
		$selected = "";
		
		if($article_type == $article_type_id){
			$selected = "selected";
		}
		
		
		echo '
		
			<option value="'.$article_type_id.'" '.$selected.'>'.$article_type_name.'</option>
		
		';
	}

?>
</select>

<br />

<label for="content">Content</label>
<br />
<textarea name="content"><?php echo $content;?></textarea>

<br />

<img class="article-image" src="<?php echo '../'.$image_dir;?>"/>

<form enctype="multipart/form-data" method="post" action="submit.php">
	<input type="hidden" name="MAX_FILE_SIZE" value="4294967296" />
	<input type="hidden" name="article_id" value="<?php echo $article_id;?>" />
	<label class="image-upload-label">
		Upload Image
		<input type="file" name="article_image" />
	</label>
</form>
<br />

<div id="save-article-button">Save Changes</div>


<script src="js/applications/edit-article.js"></script>









