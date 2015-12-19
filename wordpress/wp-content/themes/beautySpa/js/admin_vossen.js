
var $post_type = '';

(function($){
	"use strict";

	$(document).ready(function(){
		
		 jQuery.ajax({
			 type : "POST",
			 dataType : "text",
			 async: false,
			 url : vossenAjax.ajaxurl,
			 data :{action:'bautySpa_get_custom_post_type'},
			 success: function(responses) { 
				var json_formate_text = responses.replace("<!---->", "");
				$post_type = $.parseJSON(json_formate_text);
				
					console.log($post_type);
				
			 },
			error: function(jqXHR, exception) {
				 
				if (jqXHR.status === 0) {
					alert('Not connect.\n Verify Network.');
				} else if (jqXHR.status == 404) {
					alert('Requested page not found. [404]');
				} else if (jqXHR.status == 500) {
					alert('Internal Server Error [500].');
				} else if (exception === 'parsererror') {
					alert('Requested JSON parse failed.');
				} else if (exception === 'timeout') {
					alert('Time out error.');
				} else if (exception === 'abort') {
					alert('Ajax request aborted.');
				} else {
					alert('Uncaught Error.\n' + jqXHR.responseText);
				}
			}
        }); 
		
		
	});

})(jQuery);