$(function(){
	var display_footer = true;
	
	if(display_footer){
		$.ajax({
			url: 'footer.php',
			success: function(data){
				$('div.footer-container').html(data);
			}
		});
	}
	
});