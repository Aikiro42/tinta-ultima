$(function(){
	
	/*
	
	$.ajax({
			method: 'post',
			data: {search: name_query},
			url: 'module/submodule/activity_list.php',
			success: function(data){
				activity_list.html(data);
				deactivateWall(500);
			},
			error:	function(xhr, st, er){
						console.log('Server Connection Error!');
					}
	});
	
	*/
	
	$('input[name="article_image"]').off().change(function(){
		console.log('picture uploaded');
		var file_data = $(this).prop('files')[0];
		var article_id_val = $(this).parent().parent().find('input[name="article_id"]').val();
		console.log(article_id_val);
		var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('article_id', article_id_val);
				
		$.ajax({
			method: 'post',
			data: form_data,
			url: 'applications/upload_picture.php',
			cache: false,
			contentType: false,
			processData: false,
			
			success: 	function(data){
							$(this).val('');
							$('div#php-log').html(data);
							
							$.ajax({
								method: 'post',
								data: {article_id: article_id_val},
								url: 'applications/get_image.php',
								success: function(data){
									//remove image element
									//create image element with new source
									$(this).parent().parent().parent().find('img.article_image').attr('src',''+data);
									console.log(data);
								}
							});
							
						},
			error: 	function(xhr, st, er){
						console.log('Server Connection Error!');
					}
		});
	});
	
	$('div#save-article-button').off().click(function(){
		
		var element_parent = $(this).parent();
		var article_id_val = element_parent.find('input[name="article_id"]').val();
		var header_val = element_parent.find('input[name="header"]').val();
		var article_lead_val = element_parent.find('input[name="article_lead"]').val();
		var content_val = element_parent.find('textarea[name="content"]').val();
		var author_id_val = element_parent.find('select[name="author"]').val();
		var article_type_id_val = element_parent.find('select[name="category"]').val();
		var priority_val = 1;
		
		
		$.ajax({
			method: 'post',
			data: {
				article_id: article_id_val,
				article_type_id: article_type_id_val,
				author_id: author_id_val,
				header: header_val,
				article_lead: article_lead_val,
				content: content_val,
				priority: priority_val
			},
			url: 'applications/save-article.php',
			success:	function(data){
				
							$('p#debug-prompt').removeClass('red').addClass('green').html(data);
							
							if(element_parent.css('display') != 'none'){
								element_parent.slideUp(100);
							}
							
							
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