$(function(){
	
	$('div.article-link').off().click(function(){
		var article_id_val = $(this).find('input').val();
		console.log(article_id_val);
		$.ajax({
			method: 'post',
			data: {article_id: article_id_val},
			url: 'article.php',
			success: function(data){
				$('div.container').html(data);
				window.scrollTo(0, document.getElementById('article-header').offsetTop);
			}
		});
	});
	
});