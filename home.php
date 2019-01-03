<?php

	//$result = strtolower($string);
	//github test
	
	include('config.php');
	include('ChromePhp.php');

	//featured news {
	
	$article_id = '';
	$header = '';
	$lead = '';
	$author = '';
	$date = '';
	$image = '';
	
	$query = 'SELECT * FROM Articles WHERE article_type_id = 4 LIMIT 1';
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
	
	//}
	
	

?>
	<div id="home-featured-image-container">
		<img id="featured-image" src="<?php echo $image;?>"></img>
	</div>

	<div id="home-container" class="inside-container">
		<div class="transform-container">
			<div id="featured-article" class="article-link">
				<h1 id="featured-article-header"><?php echo $header;?></h1>
				<p id="featured-article-lead"><?php echo $lead;?></p>
				<span id="featured-article-cred"><?php echo $date;?> | <?php echo $author;?></span>
				<span class="balita label featured">Balita</span>
				<input type="hidden" value="<?php echo $article_id;?>" />
			</div>
		</div>
		
		<div id="other-featured-container">
			
			<?php
			
				//featured editorial {
				
				$query = 'SELECT * FROM Articles WHERE article_type_id = 1 LIMIT 1';
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
				
				//}
			
			?>
			
			<div class="article-box article-link">
				<input type="hidden" value="<?php echo $article_id;?>" />
				<img class="article-box-image" src="<?php echo $image;?>" />
				<div class="article-box-info">
					<h1 class="article-box-header"><?php echo $header;?></h1>
					<span class="article-box-cred"><?php echo $date;?> | <?php echo $author;?></span>
					<span class="opinyon label">Opinyon</span>
				</div>
				<div class="clear"></div>
			</div>
			
			<?php
			
				//featured feature {
				
				$query = 'SELECT * FROM Articles WHERE article_type_id = 3 LIMIT 1';
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
				
				//}
			
			?>
			
			<div class="article-box article-link">
				<input type="hidden" value="<?php echo $article_id;?>" />
				<img class="article-box-image" src="<?php echo $image;?>" />
				<div class="article-box-info">
					<h1 class="article-box-header"><?php echo $header;?></h1>
					<span class="article-box-cred"><?php echo $date;?> | <?php echo $author;?></span>
					<span class="lathalain label">Lathalain</span>
				</div>
				<div class="clear"></div>
			</div>
			
			<?php
			
				//featured sports {
				
				$query = 'SELECT * FROM Articles WHERE article_type_id = 2 LIMIT 1';
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
				
				//}
			
			?>
			
			
			<div class="article-box article-link">
				<input type="hidden" value="<?php echo $article_id;?>" />
				<img class="article-box-image" src="<?php echo $image;?>" />
				<div class="article-box-info">
					<h1 class="article-box-header"><?php echo $header;?></h1>
					<span class="article-box-cred"><?php echo $date;?> | <?php echo $author;?></span>
					<span class="isports label">Isports</span>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
		
		<div id="other-articles-container">
		
			<div class="article-list" id="balita-list">
				<h1 class="box-label balita">Balita</h1>
				
				<?php
				
					$query = 'SELECT * FROM Articles WHERE article_type_id = 4';
					$result = mysqli_query($dbc, $query);
					while($row = mysqli_fetch_array($result)){
						
						$sub_query = 'SELECT * FROM Authors WHERE author_id = ' . $row['author_id'];
						$sub_result = mysqli_query($dbc, $sub_query);
						$sub_row = mysqli_fetch_array($sub_result);
						$author = $sub_row['firstName'] . ' ' . $sub_row['lastName'];
						$date = date('F d, Y', $row['article_id']);
						echo '
							<div class="article-item article-link">
								<h1 class="article-item-header">'.$row['header'].'</h1>
								<p class="article-item-cred">'.$date.' | '.$author.'</p>
								<input type="hidden" value="'.$row['article_id'].'" />
							</div>
						';
					}
				
				?>

			</div>
			
			<div class="article-list" id="opinyon-list">
				<h1 class="box-label opinyon">Opinyon</h1>
				<?php
				
					$query = 'SELECT * FROM Articles WHERE article_type_id = 1';
					$result = mysqli_query($dbc, $query);
					while($row = mysqli_fetch_array($result)){
						
						$sub_query = 'SELECT * FROM Authors WHERE author_id = ' . $row['author_id'];
						$sub_result = mysqli_query($dbc, $sub_query);
						$sub_row = mysqli_fetch_array($sub_result);
						$author = $sub_row['firstName'] . ' ' . $sub_row['lastName'];
						$date = date('F d, Y', $row['article_id']);
						echo '
							<div class="article-item article-link">
								<h1 class="article-item-header">'.$row['header'].'</h1>
								<p class="article-item-cred">'.$date.' | '.$author.'</p>
								<input type="hidden" value="'.$row['article_id'].'" />
							</div>
						';
					}
				
				?>
			</div>
			
			<div class="article-list" id="lathalain-list">
				<h1 class="box-label lathalain">Lathalain</h1>
				<?php
				
					$query = 'SELECT * FROM Articles WHERE article_type_id = 3';
					$result = mysqli_query($dbc, $query);
					while($row = mysqli_fetch_array($result)){
						
						$sub_query = 'SELECT * FROM Authors WHERE author_id = ' . $row['author_id'];
						$sub_result = mysqli_query($dbc, $sub_query);
						$sub_row = mysqli_fetch_array($sub_result);
						$author = $sub_row['firstName'] . ' ' . $sub_row['lastName'];
						$date = date('F d, Y', $row['article_id']);
						echo '
							<div class="article-item article-link">
								<h1 class="article-item-header">'.$row['header'].'</h1>
								<p class="article-item-cred">'.$date.' | '.$author.'</p>
								<input type="hidden" value="'.$row['article_id'].'" />
							</div>
						';
					}
				
				?>
			</div>
			
			<div class="article-list" id="isports-list">
				<h1 class="box-label isports">Isports</h1>
				<?php
				
					$query = 'SELECT * FROM Articles WHERE article_type_id = 2';
					$result = mysqli_query($dbc, $query);
					while($row = mysqli_fetch_array($result)){
						
						$sub_query = 'SELECT * FROM Authors WHERE author_id = ' . $row['author_id'];
						$sub_result = mysqli_query($dbc, $sub_query);
						$sub_row = mysqli_fetch_array($sub_result);
						$author = $sub_row['firstName'] . ' ' . $sub_row['lastName'];
						$date = date('F d, Y', $row['article_id']);
						echo '
							<div class="article-item article-link">
								<h1 class="article-item-header">'.$row['header'].'</h1>
								<p class="article-item-cred">'.$date.' | '.$author.'</p>
								<input type="hidden" value="'.$row['article_id'].'" />
							</div>
						';
					}
				
				?>
			</div>
		
		</div>
		
		<div class="clear"></div>
		
		<div class="footer-container">
		</div>
	
	</div>


<script src="js/footer.js"></script>
<script src="js/home.js"></script>