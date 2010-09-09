$(document).ready(function() {
	$(".remove-btn").bind('click', function(){messageRemove(this);return false;});
	$('a.modal').click(function(e) {
		e.preventDefault();
		$('#modal-content').load($(this).attr('href'));
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		$('#mask').fadeTo(800,0.95);	
		var winH = $(window).height();
		var winW = $(window).width();
		$('#modal').css('top',  winH/2-$('#modal').height()/2);
		$('#modal').css('left', winW/2-$('#modal').width()/2);
		$('#modal').fadeIn(2000); 
	});	
	$('#modal-close').click(function () {
		$('#mask').hide();
		$('.modal-container').hide();
	});	
});

function messageRemove(that) {
	$(that).parent().slideUp(200);
}

