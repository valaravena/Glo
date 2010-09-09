$(document).ready(function() {
	$(".remove-btn").bind('click', function(){messageRemove(this);return false;});
	$('a.modal').click(function(e) {
		e.preventDefault();
		$('#modal-content').load($(this).attr('href'));
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		$('#mask').fadeTo(500,0.95);	
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
	if ($("#message p").length) {
		$("#message").slideDown(200,function() {
			setTimeout(function(){ 
			   $("#message").slideUp(500);
			  }, 6000 );
		});
	}
});

function messageRemove(that) {
	$(that).parent().slideUp(200);
}    

(function($) {

     $.fn.inlineEdit = function(options) {
     
         // define some options with sensible default values
         // - hoverClass: the css classname for the hover style   

		options = $.extend({
	   		hover: 'hover',
            save: ''
        }, options);       
		return $.each(this, function() {
			// define self container
			var self = $(this);     
			// create a value property to keep track of current value
			self.value = self.text();
     
			// bind the click event to the current element, in this example it's span.editable
			self.bind('click', function() {
				self.html('<input type="text" value="'+ self.value +'">')		
					.find('input')
					.bind('blur', function(event) {   
						if (($.isFunction(options.save) && options.save.call(self, event, $(this).val())) !== false || !options.save) {
							self.value = $(this).val();
							self.text(self.value); 
						}    
					})
					.focus();  
				})
				.hover(
                 	function(){
                     	self.addClass(options.hoverClass);
                 	},
                 	function(){
                     	self.removeClass(options.hoverClass);
                 	}
             	);
			});
     	}
 })(jQuery);


   


