$(function(){
	
	$('span#add-article-button').off().click(function(){
		$.ajax({
			method: 'post',
			url: 'applications/add-article.php',
			success: function(data){
				$('div#php-log').html(data);
				var target = $('div#articles-tool').find('div.utility-container');
				$.ajax({
					method: 'post',
					url: 'tools/articles.php',
					success: function(data){
								target.html(data);
							},
							
					error: function(xhr, st, er){
								console.log('Server Connection Error!');
							}
				});
			}
		});
	});
	
	$('img.edit-article-button').off().click(function(){
		
		var article_id_val = $(this).parent().find('input[name="article_id"]').val();
		var target_container = $(this).parent().find('div.edit-article-container');
		
		$.ajax({
			method: 'post',
			data: {article_id: article_id_val },
			url: 'applications/edit-article.php',
			success: function(data){
				target_container.html(data);
				if(target_container.css('display') == 'none'){
					target_container.slideDown(100);
				}else{
					target_container.slideUp(100);
				}
			}
		});
	});
	
	$('img.view-article-button').off().click(function(){
		
		var article_id_val = $(this).parent().find('input[name="article_id"]').val();
		var target_container = $(this).parent().find('div.view-article-container');
		
		$.ajax({
			method: 'post',
			data: {article_id: article_id_val },
			url: 'applications/view-article.php',
			success: function(data){
				target_container.html(data);
				if(target_container.css('display') == 'none'){
					target_container.slideDown(100);
				}else{
					target_container.slideUp(100);
				}
			}
		});
	});
	
	$('img.delete-article-button').off().click(function(){
		
		var article_id_val = $(this).parent().find('input[name="article_id"]').val();

		$.ajax({
			method: 'post',
			data: {article_id: article_id_val },
			url: 'applications/delete-article.php',
			success:	function(data){
							var target = $('div#articles-tool').find('div.utility-container');
							$.ajax({
								method: 'post',
								url: 'tools/articles.php',
								success: function(data){
											target.html(data);
										},
										
								error: function(xhr, st, er){
											console.log('Server Connection Error!');
										}
							});
						},
			error:	function(xhr, st, er){
						console.log('Server Connection Error!');
					}
		});
	});
	
	
});