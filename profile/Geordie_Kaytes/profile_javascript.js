$(document).ready(function () {
	$('a.contentlink').click( function( event ) {
		set_ajax_link( $(this), event );
		$('.popwrapper').fadeIn('slow');
		$('a.contentlink').removeClass('activelink');
		$(this).addClass('activelink');
	});
	
	$('#closebutton').on("click",function(){
		$('.popwrapper').fadeOut('fast');
		$('a.contentlink').removeClass('activelink');
	});
	
});
	
function set_ajax_link( el, event ){
	event.preventDefault();
	var url = el.attr("href");
	load_page_content( url );
}

function load_page_content( url ){
	$("#content").load( url );
}