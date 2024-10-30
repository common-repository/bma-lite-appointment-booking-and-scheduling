(function( $ ) {
	'use strict';

	$(function() {

		$(document).on( 'click', '.rtwbmal_add_new_button', function(){
			$(document).find('.rtwbmal_appoint_name').val('');
			$(document).find('.rtwbmal_appointment_status').val('').change();
			$(document).find('.rtwbmal_subject').val('');
			$(document).find('#rtwbmal_notification_option').val('');

			$(document).find('.rtwbmal_statuss').val('').change();
			$(document).find('.rtwbmal_receipients').val('').change();

			$(document).find('.rtwbmal_save_or_edit').val('save');
			$(document).find('.rtwbmal_save').text('Save');
		});

		$(document).on('click', '.rtwbmal_selected', function(){
			$(this).select();
		});
	});

	var rules = {
		rtwbma_title_name 			: { required: true },
		rtwbma_appointment_status 	: { required: true },
		rtwbma_title_subject		: { required: true },
		rtwbma_notify_email			: { required: true }
	};
	
	var messages = {
		rtwbma_title_name 		: { required: rtwbmal_global_params.rtwbmal_required },
		rtwbma_appointment_status 	: { required: rtwbmal_global_params.rtwbmal_required },
		rtwbma_title_subject 		: { required: rtwbmal_global_params.rtwbmal_required },
		rtwbma_notify_email 		: { required: rtwbmal_global_params.rtwbmal_required }
	};
	$(document).find( "#rtwbmal_email_form" ).validate({
		rules: rules,
		messages: messages
	});
	/////// save email notification data //////

	$(document).on( 'click', '.rtwbmal_save', function()
		{
			if( $(document).find( "#rtwbmal_email_form" ).valid() )
			{
				var rtwbma_notify_name = $(document).find('.rtwbmal_appoint_name').val();
				var rtwbma_appointment_status = $(document).find('.rtwbmal_appointment_status').val();
				var rtwbma_subject = $(document).find('.rtwbmal_subject').val();
				var rtwbma_message = $(document).find('#rtwbmal_notification_option').val();

				var rtwbma_status = $(document).find('.rtwbmal_statuss').val();

				var rtwbma_receipient = $(document).find('.rtwbmal_receipients').val();

				var rtwbmal_action = '';
				var rtwbma_save_or_edit = $(document).find('.rtwbmal_save_or_edit').val();
				if( rtwbma_save_or_edit == 'save' )
				{
					rtwbmal_action = 'rtwbmal_email_save';
				}
				else
				{
					rtwbmal_action = 'rtwbmal_email_update';
				}

				var rtwbmal_data = {
		 			action 					: rtwbmal_action,
		 			rtwbma_id 				: rtwbma_save_or_edit,
		 			rtwbma_notify_name 		: rtwbma_notify_name,
		 			rtwbma_apntmnt_status 	: rtwbma_appointment_status,
		 			rtwbma_subject 			: rtwbma_subject,
		 			rtwbma_message			: rtwbma_message,
		 			rtwbma_status 		 	: rtwbma_status,
		 			rtwbma_receipient		: rtwbma_receipient,
		 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
		 		};
		 		$.ajax({
		 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
		 			type 		: "POST",  
		 			data 		: rtwbmal_data,
		 			dataType 	: 'json',	
		 			success 	: function(response) 
		 			{
		 				if( response.rtwbma_status ){
		 					
		 					$.growl({
		 						title 	: response.rtwbma_message, 
						    	location: 'br',
						    	style 	: 'notice',
						    	message : ''
						    });
		 				}
		 				else{
		 					$.growl({
		 						title 	: response.rtwbma_message, 
						    	location: 'br',
						    	style 	: 'error',
						    	message : ''
						    });
		 				}
		 			window.location.reload(true);
		 			}
		 		});
		 	}
		});
		////////

		/////// edit email notification data //////

		$(document).on( 'click', '.rtwbmal_email_edit', function(){
			$(document).find('.rtwbmal_save').text('Update');
			var rtwbmal_email_id = $(this).closest('ul').data( 'rtwbmal_email_id' );
			$(document).find('.rtwbmal_save_or_edit').val( rtwbmal_email_id );

			var rtwbma_data = {
	 			action 					: 'rtwbmal_email_edit',
	 			rtwbma_email_id 		: rtwbmal_email_id,
	 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
	 		};

	 		$.ajax({
	 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
	 			type 		: "POST",  
	 			data 		: rtwbma_data,
	 			dataType 	: 'json',	
	 			success 	: function(response) 
	 			{
				
	 				$(document).find('.rtwbmal_appoint_name').val( response.rtwbma_emails['setting_name'] );
					$(document).find('.rtwbmal_appointment_status').val( response.rtwbma_emails['type'] ).change();

					$(document).find('.rtwbmal_subject').val( response.rtwbma_emails['subject'] );

					$(document).find('#rtwbmal_notification_option').val( response.rtwbma_emails['message']  );

					$(document).find('.rtwbmal_statuss').val( response.rtwbma_emails['status'] ).change();

					$(document).find('.rtwbmal_receipients').val( response.rtwbma_emails['message_to'] ).change();
	 			}
	 		});
		});
		////////////////////////

		////////////// delete email /////
		$(document).on('click', '.rtwbmal_email_delete', function(){
			if( confirm( rtwbmal_global_params.rtwbmal_approval_sure ) )
			{
				var rtwbma_email_id = $(this).closest('ul').data( 'rtwbmal_email_id' );

				var rtwbma_data = {
		 			action 					: 'rtwbmal_email_delete',
		 			rtwbma_email_id 		: rtwbma_email_id,
		 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
		 		};

		 		$.ajax({
		 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
		 			type 		: "POST",  
		 			data 		: rtwbma_data,
		 			dataType 	: 'json',	
		 			success 	: function(response) 
		 			{
		 				if( response.rtwbma_status ){
							$(this).closest('ul').closest('li').remove();
		 					$.growl({
		 						title 	: response.rtwbma_message, 
						    	location: 'br',
						    	style 	: 'notice',
						    	message : ''
						    });
		 				}
		 				else{
		 					$.growl({
		 						title 	: response.rtwbma_message, 
						    	location: 'br',
						    	style 	: 'error',
						    	message : ''
						    });
		 				}
		 				window.location.reload(true);
		 			}
		 		});
		 	}
		});


		/////////


})( jQuery );