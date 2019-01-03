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
			error: onError
	});
	
	*/
	
	$('h1#articles-button').off().click(function(){
		var target = $('div#articles-tool').find('div.utility-container');
		
		$.ajax({
			method: 'post',
			url: 'tools/articles.php',
			success: function(data){
						target.html(data);
						
						if(target.css('display') == 'none'){
							target.slideDown(100);
						}else{
							target.slideUp(100);
						}
					},
					
			error: function(xhr, st, er){
						console.log('Server Connection Error!');
					}
		});
		
	});
	
});