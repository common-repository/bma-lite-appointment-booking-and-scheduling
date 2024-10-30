(function( $ ) {
	'use strict';

	$(function() {
		$(document).find( ".rtwbmal_select" ).select2({ width : '20%' });

		$(document).on('click', '.rtwbmal_add_new_button', function(){
			$(document).find('.rtwbmal_edit_loc_id').val('save');
		})

		var rules = {
	        rtwbmal_loc_title_input 		: { required: true },
	        rtwbmal_loc_address_input 	: { required: true }
	    };
	    
	    var messages = {
	        rtwbmal_loc_title_input 		: { required: rtwbmal_global_params.rtwbmal_required },
	        rtwbmal_loc_address_input 	: { required: rtwbmal_global_params.rtwbmal_required },
	    };

	    $(document).find( "#rtwbmal_location_error" ).validate({
	        rules: rules,
	        messages: messages
	    });

		$(document).on( 'click', '.rtwbmal_save', function(){
			if( $(document).find( "#rtwbmal_location_error" ).valid() ){
				var attachment_id 	=  $(document).find('#rtwbmal_loc_imgs').val();
				var rtwbmal_loc_name 		= $(document).find( '.rtwbmal_loc_title_input' ).val();
				var rtwbmal_loc_employees 	= (parseInt( $(document).find( '.rtwbmal_emp_select' ).val() ) + 1);

				var rtwbmal_emp = $(document).find('.rtwbmal_select').val();

				var rtwbmal_loc_address 		= $(document).find( '.rtwbmal_loc_address_input' ).val();
				var rtwbmal_loc_description	= $(document).find( '.rtwbmal_loc_description' ).val();
				var rtwbmal_loc_id = $(document).find('.rtwbmal_edit_loc_id').val();
				var rtwbmal_save_edit = '';
				if ( rtwbmal_loc_id == 'save' )
				{
					rtwbmal_save_edit = 'rtwbmal_loc_add_new';
				}else{
					rtwbmal_save_edit = 'rtwbmal_loc_update';
				}

				var rtwbmal_data = {
		 			action 					: rtwbmal_save_edit,
		 			rtwbmal_emp 				: rtwbmal_emp,
		 			rtwbmal_loc_id 			: rtwbmal_loc_id,
		 			attachment_id 			: attachment_id,
		 			rtwbmal_loc_name 		: rtwbmal_loc_name,
		 			rtwbmal_loc_employees 	: rtwbmal_loc_employees,
		 			rtwbmal_loc_address 		: rtwbmal_loc_address,
		 			rtwbmal_loc_description 	: rtwbmal_loc_description,
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
		 					$.growl({
		 						title 	: response.rtwbmal_message, 
						    	location: 'br',
						    	style 	: 'notice',
						    	message : '',
						    });

						    $(document).find( '.close-modal' ).trigger( 'click' );
		 				}
		 				else{
		 					$.growl({
		 						title 	: response.rtwbmal_message, 
						    	location: 'br',
						    	style 	: 'error',
						    	message : ''
						    });
		 				}
		 				$.unblockUI();
	 					window.location.reload(true);
		 			}
		 		});
		 	}
		});

		$(document).on( 'click', '.rtwbmal_edit', function(){
			var rtwbmal_loc_id = $(this).closest('ul').data( 'rtwbmal_loc_id' );
			$(document).find('.rtwbmal_edit_loc_id').val( rtwbmal_loc_id );

			var rtwbmal_data = {
	 			action 					: 'rtwbmal_edit_loc',
	 			rtwbmal_loc_id 			: rtwbmal_loc_id,
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
	 					$(document).find('#rtwbmal_loc_imgs').val( response.rtwbmal_locations['attachment_id'] );

	 					$(document).find('.rtwbmal_loc_title_input').val( response.rtwbmal_locations['loc_name']);

	 					$(document).find('#rtwbmal_loc_img').attr( 'src' , response.rtwbmal_locations['attachment_url']);

	 					$(document).find('.rtwbmal_select').val( response.rtwbmal_locations['emp_id'] ).change();

	 					$(document).find('.rtwbmal_loc_address_input').val( response.rtwbmal_locations['loc_address'] );

	 					$(document).find('.rtwbmal_loc_description').val( response.rtwbmal_locations['loc_descr'] );
	 				}
	 				else{

	 				}
	 				$.unblockUI();
	 			}
	 		});
		});

		$(document).on( 'click', '.rtwbmal_delete', function(){
			
			if( confirm( rtwbmal_global_params.rtwbmal_approval_sure ) ){
				var $this = $(this);
				var rtwbmal_loc_id = $(this).closest('ul').data( 'rtwbmal_loc_id' );
				
				var rtwbmal_data = {
		 			action 					: 'rtwbmal_loc_delete',
		 			rtwbmal_loc_id 			: rtwbmal_loc_id,
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
		 				window.location.reload(true);
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
		      
		      $('#rtwbmal_loc_imgs').val(attachment.id);
		      $('#rtwbmal_loc_img').attr('src', attachment.url);
		    });

		    mediaUploader.open();
		});
		////////// upload image from media //////////

		$(document).on('click', '.rtwbmal_rmove_img', function(){
			$(document).find('#rtwbmal_loc_img').attr( 'src' , '');
			$(document).find('#rtwbmal_loc_imgs').val('');
		});
	});

})( jQuery );