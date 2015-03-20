jQuery(function($){ // DOM is now read and ready to be manipulated
	$(document).ready(function(){
		
		//initialize recovering widgets.
		$('[name="recover-btn"]').click(function(){
			var request = $.ajax({
			url: Data.url,
			type: 'get',
			data:{
				action: 'process_recovery'
			},
			dataType: 'html' 
		});
		
		//Ajax success
		request.done(function( data ) {
			var html = ajaxPostMessage('success', 'success', data);
			$('.RA-ajax-response').html(html)
		})
		//Ajax fail
		request.fail(function( jqXHR, textStatus ) {
			var html = ajaxPostMessage('danger', 'error', 'It seems to be an server error. Please try again');
			$('.RA-ajax-response').html(html)
		});

		});
		
		//Return html for ajax response
		var ajaxPostMessage = function(cl,status,message){
			var html ='<div class="alert alert-'+cl+'">';
			html+='<strong>'+firstToUpperCase(status)+'! </strong>'+message+'</div>';
			return html;
		}
		
		//Chnage first letter of word to uppercase.
		var firstToUpperCase = function( str ) {
			return str.substr(0, 1).toUpperCase() + str.substr(1);
		}
	});
});