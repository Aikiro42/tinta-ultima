$(function(){
	
	function resizerespo(){
		
		var nav = $('header nav');
		if($('body').width() <= 640 ){
			nav.slideUp(0);
		}else{
			nav.slideDown(0);
		}
	
	}
	
	$('a#home_link').off().click(function(){
		$.ajax({
			url: 'home.php',
			success: function(data){
				$('div.container').html(data);
			}
		});
		resizerespo();
	});
	
	function setNavLinkSectionID(linkID, articleTypeID){
		$('a#' + linkID).off().click(function(){
			$.ajax({
				method: 'post',
				data: {article_type_id : articleTypeID},
				url: 'section.php',
				success: function(data){
					$('div.container').html(data);
				}
			});
			resizerespo();
		});
	}
	
	setNavLinkSectionID("opinyon_link", 1);
	setNavLinkSectionID("isports_link", 2);
	setNavLinkSectionID("lathalain_link", 3);
	setNavLinkSectionID("balita_link", 4);
	
	
	$('a#tinta_link').off().click(function(){
		$.ajax({
			url: 'tinta.php',
			success: function(data){
				$('div.container').html(data);
			}
		});
		resizerespo();
	});
	
	$('header img#menu_icon').off().click(function(){
		var nav = $(this).parent().find('nav');
		if(nav.css('display') == 'none'){
			nav.slideDown(100);
		}else{
			nav.slideUp(100);
		}
	});
	
	$(window).resize(resizerespo());
	
	$('span#site_name').off().click(function(){
		$.ajax({
			url: 'home.php',
			success: function(data){
				$('div.container').html(data);
			}
		});
	});
	
	$.ajax({
		url: 'home.php',
		success: function(data){
			$('div.container').html(data);
		}
	});

});