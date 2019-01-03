$(function(){
	
	$.ajax({
		url: 'footer.php',
		success: function(data){
			$('div.footer-container').html(data);
		}
	});
	
});