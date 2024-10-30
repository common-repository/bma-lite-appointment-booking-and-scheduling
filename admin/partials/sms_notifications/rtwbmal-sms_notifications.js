(function( $ ) {
	'use strict';

	$(function() {
		
		if( $(document).find('.rtwbmal_msg_nine_method').val() == 'get' )
		{
			$(document).find('.rtwbmal_msgnine_get').css('display', 'block');
			$(document).find('.rtwbmal_msgnine_post').css('display', 'none');
		}else{
			$(document).find('.rtwbmal_msgnine_post').css('display', 'block');
			$(document).find('.rtwbmal_msgnine_get').css('display', 'none');
		}

		$(document).on('change','.rtwbmal_msg_nine_method', function(){
			if($(this).val() == 'get')
			{
				$(document).find('.rtwbmal_msgnine_get').css('display', 'block');
				$(document).find('.rtwbmal_msgnine_post').css('display', 'none');
			}else{
				$(document).find('.rtwbmal_msgnine_post').css('display', 'block');
				$(document).find('.rtwbmal_msgnine_get').css('display', 'none');
			}
		});

		$(document).on('click', '.rtwbmal_sms_method', function(){
			$(document).find('.rtwbmal_sms_method').prop('checked', false);
			$(this). prop("checked", true);
		});

		$(document).find('.rtwbmal_twillio_setting').show();
	    $(document).find('.rtwbmal_other_sms_api_setting').hide();

	    $(document).on( 'click', '.rtwbmal_twillio_api', function(){
	    	$(document).find('.rtwbmalactive').removeClass('rtwbmalactive');
	    	$(this).addClass('rtwbmalactive');
	    	$(document).find('.rtwbmal_twillio_setting').show();
	    	$(document).find('.rtwbmal_other_sms_api_setting').hide();

	    });

	    $(document).on( 'click', '.rtwbmal_other_api', function(){
	    	$(document).find('.rtwbmalactive').removeClass('rtwbmalactive');
	    	$(this).addClass('rtwbmalactive');
	    	$(document).find('.rtwbmal_other_sms_api_setting').show();
	    	$(document).find('.rtwbmal_twillio_setting').hide();
		});
		
		$(document).find( ".rtwbmal_select" ).select2({ width : '20%' });

		$(document).on('click', '.rtwbmal_add_new_button', function(){
			$(document).find('.rtwbmal_app_status').val('');
			$(document).find('.rtwbmal_sms_subject').val('');
			$(document).find('.rtwbmal_sms').val('');
			$(document).find('.rtwbmal_sms_status').val('');
			$(document).find('.rtwbmal_send_to').val('').change();
			$(document).find('.rtwbmal_save_or_edit').val('save');
			$(document).find('.rtwbmal_save').text('Save');
		});

		$(document).on('click', '.rtwbmal_selected', function(){
			$(this).select();
		});
		
	});

})( jQuery );