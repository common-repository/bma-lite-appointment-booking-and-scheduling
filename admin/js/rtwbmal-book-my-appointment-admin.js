(function( $ ) {
	'use strict';
	$(function() {
		$(document).find('.rtwbmal_select').select2();
		var rules = {
	        rtwbmal_purchase_code 	: { required: true }
	    };
	    
	    var messages = {
	        rtwbmal_purchase_code 	: { required: 'Required' }
	    };

	    $(document).find( "#rtwbmal_verify" ).validate({
	        rules: rules,
	        messages: messages
		});
		
		$(document).on('click', '#rtwbmal_verify_code', function(){
			if( $(document).find( "#rtwbmal_verify" ).valid() )
			{
				var rtwbmal_purchase_code = $(document).find('.rtwbmal_purchase_code').val();

				var data = {	
					action	  		:'rtwbmal_verify_purchase_code',
					purchase_code 	: rtwbmal_purchase_code,
					security_check 	: rtwbmal_global_params.rtwbmal_nonce	
				};
				$.blockUI({ message: '',
				timeout: 20000000 });
				$.ajax({
					url: rtwbmal_global_params.rtwbmal_ajaxurl, 
					type: "POST",  
					data: data,
					dataType :'json',	
					success: function(response) 
					{  
						console.log(response);
						if( response.status )
						{
							$(document).find('.rtwbmal_notice_success').removeClass('rtwbmal_hide');
							$(document).find('.rtwbmal_msg_response').html(response.message);
							$(document).find('.rtwbmal_msg_response').removeClass('rtwbmal_errorr');
							$(document).find('.rtwbmal_msg_response').addClass('rtwbmal_successs');
							window.setTimeout(function(){ 
								window.location.reload(true);
							}, 3000);
							
						}
						else{
							$(document).find('.rtwbmal_msg_response').html(response.message);
							$(document).find('.rtwbmal_msg_response').removeClass('rtwbmal_successs');
							$(document).find('.rtwbmal_msg_response').addClass('rtwbmal_errorr');
						}
						$.unblockUI();
					}
				});
			}
		});
	});
})( jQuery );