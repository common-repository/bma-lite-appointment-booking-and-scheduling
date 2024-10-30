(function( $ ) {
	'use strict';

	$(function() {

		var rules = {
	        rtwbmal_cust_first_name 	: { required: true },
	        rtwbmal_cust_last_name 	: { required: true },
	        rtwbmal_cust_email		: { required: true }
	    };
	    
	    var messages = {
	        rtwbmal_cust_first_name 		: { required: rtwbmal_global_params.rtwbmal_required },
	        rtwbmal_cust_last_name 	: { required: rtwbmal_global_params.rtwbmal_required },
	        rtwbmal_cust_email 		: { required: rtwbmal_global_params.rtwbmal_required }
	    };

	    $(document).find( "#rtwbmal_customer_error" ).validate({
	        rules: rules,
	        messages: messages
	    });

		
		$(document).on( 'click', '.rtwbmal_save_customer', function()
		{
			if( $(document).find( "#rtwbmal_customer_error" ).valid() )
			{
				var rtwbmal_attach_id 		= $(document).find('#rtwbmal_cust_imgs').val();
				var rtwbmal_cus_fname 		= $(document).find('.rtwbmal_cust_first_name').val();
				var rtwbmal_cus_lname 		= $(document).find('.rtwbmal_cust_last_name').val();
				var rtwbmal_cus_gender 		= $(document).find('.rtwbmal_cust_gender').val();
				var rtwbmal_cus_email 		= $(document).find('.rtwbmal_cust_email').val();
				var rtwbmal_cus_phone 		= $(document).find('.rtwbmal_cust_phone_no').val();
				var rtwbmal_cus_dob			= $(document).find('.rtwbmal_cust_dob').val();
				var rtwbmal_wp_user 			= $(document).find('#rtwbmal_wp_user').val();
				var rtwbmal_cus_country		= $(document).find('.rtwbmal_cust_country').val();
				var rtwbmal_cus_state		= $(document).find('.rtwbmal_cust_state').val();
				var rtwbmal_cus_city			= $(document).find('.rtwbmal_cust_city').val();
				var rtwbmal_cus_address		= $(document).find('.rtwbmal_cust_address').val();
				var rtwbmal_cus_post			= $(document).find('.rtwbmal_cust_pincode').val();
				var rtwbmal_cus_info 		= $(document).find('.rtwbmal_cust_description').val();
				var rtwbmal_cus_resgis_date 	= $(document).find('.rtwbmal_cus_regis_date').val();
				
				var rtwbmal_action = '';
				var rtwbmal_cus_id = $(document).find('#rtwbmal_save_or_edit').val();
				if( rtwbmal_cus_id == 'save' )
				{
					rtwbmal_action = 'rtwbmal_customer_add';
				}
				else
				{
					rtwbmal_action = 'rtwbmal_customer_update';
				}

				var rtwbmal_data = {
		 			action 					: rtwbmal_action,
		 			rtwbmal_attach_id 		: rtwbmal_attach_id,
		 			rtwbmal_cus_fname 		: rtwbmal_cus_fname,
		 			rtwbmal_cus_lname		: rtwbmal_cus_lname,
		 			rtwbmal_cus_gender		: rtwbmal_cus_gender,
		 			rtwbmal_cus_email		: rtwbmal_cus_email,
		 			rtwbmal_cus_phone		: rtwbmal_cus_phone,
		 			rtwbmal_cus_dob			: rtwbmal_cus_dob,
		 			rtwbmal_cus_country		: rtwbmal_cus_country,
		 			rtwbmal_cus_state		: rtwbmal_cus_state,
		 			rtwbmal_cus_address		: rtwbmal_cus_address,
		 			rtwbmal_cus_city 		: rtwbmal_cus_city,
		 			rtwbmal_cus_post			: rtwbmal_cus_post,
		 			rtwbmal_cus_info 		: rtwbmal_cus_info,
					rtwbmal_cus_id 			: rtwbmal_cus_id,
					rtwbmal_wp_user 			: rtwbmal_wp_user,
		 			rtwbmal_cus_resgis_date 	: rtwbmal_cus_resgis_date,
		 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
		 		};

		 		$.ajax({
		 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
		 			type 		: "POST",  
		 			data 		: rtwbmal_data,
		 			dataType 	: 'json',	
		 			success 	: function(response) 
		 			{
		 				if( response.rtwbmal_status ){
		 					
		 					$.growl({
		 						title 	: response.rtwbmal_message, 
						    	location: 'br',
						    	style 	: 'notice',
						    	message : ''
						    });
							window.location.reload(true);
		 				}
		 				else{
		 					$.growl({
		 						title 	: response.rtwbmal_message, 
						    	location: 'br',
						    	style 	: 'error',
						    	message : ''
						    });
		 				}
		 			}
		 		});
		 	}
		});

		$(document).on('click', '.rtwbmal_add_new_customer', function(){
			$(document).find('.rtwbmal_header_title').text('Add New Customer');
			$(document).find('#rtwbmal_cust_imgs').val( );
			$(document).find('#rtwbmal_wp_user').attr('disabled', false);
			$(document).find('#rtwbmal_wp_user').val(0).change();
			$(document).find('.rtwbmal_cust_first_name').val( '');
			$(document).find('.rtwbmal_cust_last_name').val('');
			$(document).find('#rtwbmal_cust_img').attr( 'src' , '');
			$(document).find('.rtwbmal_cust_email').val( '' );
			$(document).find('.rtwbmal_cust_phone_no').val('' );
			$(document).find('.rtwbmal_cust_dob').val( '');
			$(document).find('.rtwbmal_cust_country').val( '');
			$(document).find('.rtwbmal_cust_state').val('');
			$(document).find('.rtwbmal_cust_city').val('' );
			$(document).find('.rtwbmal_cust_address').val( '');
			$(document).find('.rtwbmal_cust_pincode').val( '');
			$(document).find('.rtwbmal_cust_city').val('');
			$(document).find('.rtwbmal_cust_description').val( '');
		});

		$(document).on('click', '.rtwbmal_edit_cust', function(){
			var rtwbmal_cus_id = $(this).closest('ul').data( 'rtwbmal_cus_id' );
			$(document).find('.rtwbmal_header_title').text('Edit Customer Data');
			$(document).find('#rtwbmal_save_or_edit').val( rtwbmal_cus_id );

			var rtwbmal_data = {
	 			action 					: 'rtwbmal_edit_customer',
	 			rtwbmal_cus_id 			: rtwbmal_cus_id,
	 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
	 		};

	 		$.blockUI({ message: '' });
	 		$.ajax({
	 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
	 			type 		: "POST",  
	 			data 		: rtwbmal_data,
	 			dataType 	: 'json',	
	 			success 	: function(response) 
	 			{
	 				if( response.rtwbmal_status ){
						$(document).find('#rtwbmal_cust_imgs').val( response.rtwbmal_customer['attachment_id'] );
						 
						$(document).find('#rtwbmal_wp_user').val( response.rtwbmal_customer['wp_user_id']).change();

						$(document).find('#rtwbmal_wp_user').attr('disabled', true);

	 					$(document).find('.rtwbmal_cust_first_name').val( response.rtwbmal_customer['first_name']);
	 					$(document).find('.rtwbmal_cust_last_name').val( response.rtwbmal_customer['last_name']);

	 					$(document).find('#rtwbmal_cust_img').attr( 'src' , response.rtwbmal_customer['attachment_url']);

	 					$(document).find('.rtwbmal_cust_gender').val( response.rtwbmal_customer['gender'] ).change();
	 					$(document).find('.rtwbmal_cust_email').val( response.rtwbmal_customer['email'] );
	 					$(document).find('.rtwbmal_cust_phone_no').val( response.rtwbmal_customer['phone'] );
	 					$(document).find('.rtwbmal_cust_dob').val( response.rtwbmal_customer['dob'] );
	 					$(document).find('.rtwbmal_cust_country').val( response.rtwbmal_customer['country'] );
	 					$(document).find('.rtwbmal_cust_state').val( response.rtwbmal_customer['state'] );
	 					$(document).find('.rtwbmal_cust_city').val( response.rtwbmal_customer['city'] );
	 					$(document).find('.rtwbmal_cust_address').val( response.rtwbmal_customer['address'] );
	 					$(document).find('.rtwbmal_cust_pincode').val( response.rtwbmal_customer['post_code'] );
	 					$(document).find('.rtwbmal_cust_city').val( response.rtwbmal_customer['city'] );
	 					$(document).find('.rtwbmal_cust_description').val( response.rtwbmal_customer['info'] );
	 					$(document).find('.rtwbmal_cus_regis_date').val( response.rtwbmal_customer['registration_date'] );
	 				}
	 				else{

	 				}
	 				$.unblockUI();
	 			}
	 		});
		});

		$(document).on( 'click', '.rtwbmal_delete_cust', function(){
			
			if( confirm( rtwbmal_global_params.rtwbmal_approval_sure ) ){
				var $this = $(this);
				var rtwbmal_cus_id = $(this).closest('ul').data( 'rtwbmal_cus_id' );
				
				var rtwbmal_data = {
		 			action 					: 'rtwbmal_cus_delete',
		 			rtwbmal_cus_id 			: rtwbmal_cus_id,
		 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
		 		};

		 		$.ajax({
		 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
		 			type 		: "POST",  
		 			data 		: rtwbmal_data,
		 			dataType 	: 'json',	
		 			success 	: function(response) 
		 			{
		 				if( response.rtwbmal_status ){
		 					$this.closest('ul').closest('li').remove();
		 					$.growl({
		 						title 	: response.rtwbmal_message, 
						    	location: 'br',
						    	style 	: 'notice',
						    	message : ''
						    });
		 				}
		 				else{
		 					$.growl({
		 						title 	: response.rtwbmal_message, 
						    	location: 'br',
						    	style 	: 'error',
						    	message : ''
						    });
		 				}
		 			}
		 		});
		 	}
		});

		////////// upload image from media //////////
		$(document).on( 'click', '.rtwbmal_button_change, .rtwbmal_popup_upload_icon' ,function(e) {
			var mediaUploader;
		    e.preventDefault();

		      if (mediaUploader) {
		      mediaUploader.open();
		      return;
		    }

		    mediaUploader = wp.media.frames.file_frame = wp.media({
		      title: 'Select',
		      button: {
		      text: 'Select'
		    }, multiple: false });

		    var attachment;
		    mediaUploader.on('select', function() {
		      attachment = mediaUploader.state().get('selection').first().toJSON();
		      
		      $('#rtwbmal_cust_imgs').val(attachment.id);
		      $('#rtwbmal_cust_img').attr('src', attachment.url);
		    });

		    mediaUploader.open();
		});
		////////// upload image from media //////////
		$(document).on('click', '.rtwbmal_rmove_img', function(){
			$(document).find('#rtwbmal_cust_img').attr( 'src' , '');
			$(document).find('#rtwbmal_cust_imgs').val('');
		});
	});

})( jQuery );