(function( $ ) {
	'use strict';

	$(function() {
		
		$(document).find( ".rtwbmal_select" ).select2({ width : '20%' });

		$(document).find( ".rtwbmal_services_list_acc_category" ).hide();

		$('.color-field').wpColorPicker();

		$(document).on( "click", ".rtwbmal_category_n", function(){
			$(document).find( ".rtwbmal_services_list_acc_category" ).hide();
			$(document).find( ".rtwbmal_services_list" ).show();
		});

		$(document).on( 'click', '.rtwbmal_cat_edit', function(){
			var text = $.trim($(this).closest('div').siblings().text());
			$(document).find('.rtwbmal_cat_title_input').val(text);

			$(document).find('#rtwbmal_cat_save_edit').val('edit');
			var rtwbmal_cat_id = $(this).closest('ul').data('rtwbmal_cat_id');
			$(document).find('#rtwbmal_category_id').val(rtwbmal_cat_id);
		});

		$(document).on( 'click', '.rtwbmal_add_new_category', function(){
			$(document).find('.rtwbmal_cat_title_input').val('');
			$(document).find('#rtwbmal_cat_save_edit').val('save');
		});

		var rules = {
	        rtwbmal_sms_subject 	: { required: true },
	        rtwbmal_sms 			: { required: true },
	        rtwbmal_send_to		: { required: true }
	    };
	    
	    var messages = {
	        rtwbmal_sms_subject 		: { required: rtwbmal_global_params.rtwbmal_required },
	        rtwbmal_sms 	: { required: rtwbmal_global_params.rtwbmal_required },
	        rtwbmal_send_to 		: { required: rtwbmal_global_params.rtwbmal_required }
	    };

	    $(document).find( "#rtwbmal_service_cat_form" ).validate({
	        rules: rules,
	        messages: messages
	    });

		$(document).on( 'click', '.rtwbmal_cat_save', function(){
			
			var check = $(document).find('#rtwbmal_cat_save_edit').val();
			var rtwbmal_cat_id = $(document).find('#rtwbmal_category_id').val();
			var rtwbmal_cat_name = $(document).find('.rtwbmal_cat_title_input').val();
			var lentgh = $(document).find('.rtwbmal_single_category').length;
			var rtwbmal_action = '';
			if( check == 'save' )
			{
				rtwbmal_action = 'rtwbmal_add_category';
			}
			else if( check == 'edit' )
			{
				rtwbmal_action = 'rtwbmal_edit_category';
			}

			var rtwbmal_display_ordr = 3;
			var rtwbmal_data = {
				action 					: rtwbmal_action,
				lentgh 					: lentgh,
				rtwbmal_cat_id 			: rtwbmal_cat_id,
				rtwbms_cat_name			: rtwbmal_cat_name,
				rtwbmal_display_ordr	: rtwbmal_display_ordr,
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
					}
					else{
						$.growl({
							title 	: response.rtwbmal_message, 
							location: 'br',
							style 	: 'error',
							message : ''
						});
					}
					window.location.reload(true);
				}
			});
		});
		
		$(document).on( 'click', '.rtwbmal_category_name', function(){
			var catid = $(this).data('cat_id');

			var rtwbmal_data = {
	 			action 					: 'rtwbmal_service_category',
	 			rtwbmal_cat_id 			: catid,
	 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
	 		};

	 		$.ajax({
	 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
	 			type 		: "POST",  
	 			data 		: rtwbmal_data,
	 			dataType 	: 'json',	
	 			success 	: function(response) 
	 			{
	 				$(document).find('.rtwbmal_services_list_acc_category').html(response);
	 				$(document).find('.rtwbmal_services_list_acc_category').show();
	 				$(document).find('.rtwbmal_services_list').hide();
	 			}
	 		});
		});

		$(document).on( 'click', '.rtwbmal_cat_del', function(){
			if( confirm( rtwbmal_global_params.rtwbmal_approval_sure ) ){
				var $this = $(this);
				var rtwbmal_cat_id = $(this).closest('ul').data( 'rtwbmal_cat_id' );
				
				var rtwbmal_data = {
		 			action 					: 'rtwbmal_cat_delete',
		 			rtwbmal_cat_id 			: rtwbmal_cat_id,
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

		$(document).on( 'click', '.rtwbmal_save_service', function(){
			var rtwbmal_service_id = $(document).find('.rtwbmal_ser_id').val();
			var attachment_id 	= $(document).find('#rtwbmal_service_imgs').val();
			var service_name 	= $(document).find('.rtwbmal_service_title_input').val();
			var ser_price 		= $(document).find('.rtwbmal_cat_price_input').val();
			var rtwbmal_status 	= $(document).find('.rtwbmal_status').val();
			var ser_cat			= $(document).find('.rtwbmal_ser_cat').val();
			var color 			= $(document).find('.rtwbmal_sel_color').val();
			var time_dur 		= $(document).find('.rtwbmal_time_dur').val();
			var time_gap 		= $(document).find('.rtwbmal_time_gap').val();
			var min_cap 		= $(document).find('.rtwbmal_serv_min_cap').val();
			var max_cap 		= $(document).find('.rtwbmal_serv_max_cap').val();
			var add 			= $(document).find('.rtwbmal_cat_address_input').val();
			var desc 			= $(document).find('.rtwbmal_cat_description').val();

			var length 			= $(document).find('.rtwbmal_single_service').length;
			var rtwbmal_action = '';
			var check = $(document).find('.rtwbmal_save_or_edit').val();
			if( check == 'save' )
			{
				rtwbmal_action = 'rtwbmal_service_add';
			}
			else if( check == 'edit' )
			{
				rtwbmal_action = 'rtwbmal_service_edit';
			}
			
			var rtwbmal_data = {
	 			action 					: rtwbmal_action,
	 			rtwbmal_service_id 		: rtwbmal_service_id,
				rtwbmal_attachment_id 	: attachment_id,
				length 					: length,
	 			rtwbmal_service_status	: rtwbmal_status,
	 			rtwbmal_service_name	: service_name,
	 			rtwbmal_service_price	: ser_price,
	 			rtwbmal_service_catg	: ser_cat,
	 			rtwbmal_service_time	: time_dur,
	 			rtwbmal_service_time_gap: time_gap,
	 			rtwbmal_service_min_cap	: min_cap,
	 			rtwbmal_service_max_cap	: max_cap,
	 			rtwbmal_address 		: add,
				rtwbmal_desc 			: desc,
				rtwbmal_color 			: color,
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
	 				}
	 				else{
	 					$.growl({
	 						title 	: response.rtwbmal_message, 
					    	location: 'br',
					    	style 	: 'error',
					    	message : ''
					    });
	 				}
	 			window.location.reload(true);
	 			}
	 		});
		});

		$(document).on( 'click', '.rtwbmal_service_edit', function(){

			$(document).find('.rtwbmal_save_or_edit').val('edit');
			var rtwbmal_service_id = $(this).closest('ul').data('rtwbmal_service_id');
			$(document).find('.rtwbmal_ser_id').val(rtwbmal_service_id);

			var rtwbmal_data = {
				action 		: 'rtwbmal_edit_service_row',
				rtwbmal_service_id : rtwbmal_service_id,
				rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
			}

			$.ajax({
	 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
	 			type 		: "POST",  
	 			data 		: rtwbmal_data,
	 			dataType 	: 'json',	
	 			success 	: function(response) 
	 			{
	 				if( response.rtwbmal_status ){
						$(document).find('#rtwbmal_service_img').attr( 'src', response.rtwbmal_message.image_url);

						$(document).find('.rtwbmal_sel_color').val(response.color);

						$(document).find('.rtwbmal_service_title_input').val( response.rtwbmal_message.title);

						$(document).find('.rtwbmal_cat_price_input').val( response.rtwbmal_message.price);

						$(document).find('.rtwbmal_status').val( response.rtwbmal_message.status).change();

						$(document).find('.rtwbmal_ser_cat').val( response.rtwbmal_message.cat_id).change();

						$(document).find('.rtwbmal_time_dur').val(response.rtwbmal_message.duration).change();

						$(document).find('.rtwbmal_time_gap').val( response.rtwbmal_message.gap).change();

						$(document).find('.rtwbmal_serv_min_cap').val( response.rtwbmal_message.min_capacity);

						$(document).find('.rtwbmal_serv_max_cap').val( response.rtwbmal_message.max_capacity);

						$(document).find('.rtwbmal_cat_address_input').val( response.rtwbmal_message.address);

						$(document).find('.rtwbmal_cat_description').val( response.rtwbmal_message.description);

						$(document).find('#rtwbmal_service_imgs').val(response.rtwbmal_message.attachment_id)

	 				}
	 				else{

	 				}
	 			}
	 		});
		});

		$(document).on( 'click', '.rtwbmal_add_new_service', function(){
			$(document).find('.rtwbmal_save_or_edit').val('save');
		});

		$(document).on( 'click', '.rtwbmal_service_delete', function(){
			if( confirm( rtwbmal_global_params.rtwbmal_approval_sure ) ){
				var $this = $(this);
				var rtwbmal_service_id = $(this).closest('ul').data( 'rtwbmal_service_id' );
				
				var rtwbmal_data = {
		 			action 					: 'rtwbmal_service_delete',
		 			rtwbmal_service_id 		: rtwbmal_service_id,
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
		    // If the uploader object has already been created, reopen the dialog
		      if (mediaUploader) {
		      mediaUploader.open();
		      return;
		    }
		    // Extend the wp.media object
		    mediaUploader = wp.media.frames.file_frame = wp.media({
		      title: 'Select',
		      button: {
		      text: 'Select'
		    }, multiple: false });
		    // When a file is selected, grab the URL and set it as the text field's value
		    var attachment;
		    mediaUploader.on('select', function() {
		      attachment = mediaUploader.state().get('selection').first().toJSON();
		      
		      $('#rtwbmal_service_imgs').val(attachment.id);
		      $('#rtwbmal_service_img').attr('src', attachment.url);
		    });
		    // Open the uploader dialog
		    mediaUploader.open();
		});

		$(document).on('click', '.rtwbmal_button_remove', function(){
			$('#rtwbmal_service_img').attr('src', '');
		});


	});
})( jQuery );