(function( $ ) {
	'use strict';

	$(function() {
		var check_sand_enable = $(document).find('.rtwbmal_check_sandbox').val();
		var check_test_enable = $(document).find('.rtwbmal_check_testing').val();
		if( check_sand_enable == 1 )
		{
			$(document).find('.rtwbmal_test_apicredentials').show();
	    	$(document).find('.rtwbmal_live_apicredentials').hide();
		}
		else{
    		$(document).find('.rtwbmal_test_apicredentials').hide();
    		$(document).find('.rtwbmal_live_apicredentials').show();
    	}
    	if( check_test_enable == 1 )
		{
			$(document).find('.rtwbmal_test_credentials').show();
	    	$(document).find('.rtwbmal_live_credentials').hide();
		}
		else{
    		$(document).find('.rtwbmal_test_credentials').hide();
    		$(document).find('.rtwbmal_live_credentials').show();
    	}


		$(document).find('.rtwhide').hide();
		$(document).find('.rtwbmal_emp_breaks_list').hide();
		
		$(document).find( '.datepicker' ).multiDatesPicker({
	        dateFormat : 'yy-mm-dd',
	        onSelect 	: function( dateText, inst ){
	        	var rtwbmal_day 		= inst.selectedDay;
	        	var rtwbmal_month 	= inst.selectedMonth+1;
	        	rtwbmal_month 		= ( rtwbmal_month > 9 ) ? rtwbmal_month : '0'+rtwbmal_month;
	        	var rtwbmal_year 	= inst.selectedYear;
	        	var rtwbmal_date 	= rtwbmal_year +'-'+ rtwbmal_month +'-'+ rtwbmal_day;
	        	$(document).find('.rtwbmal_selected_holidays').val($(document).find('.datepicker').val());
	        },
			beforeShow: function( input, inst){
				$(inst.dpDiv).addClass('rtwbmal_datapicker_calendar_wrapper');
			}
	    });

		$(document).on( 'click', '.rtwbmal_general', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_general_content').addClass('rtwbmal_show');
		} );

		$(document).on( 'click', '.rtwbmal_company', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');
			
			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_company_content').addClass('rtwbmal_show');
		} );

		$(document).on( 'click', '.rtwbmal_payment', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_payment_content').addClass('rtwbmal_show');
			
		} );

		$(document).on( 'click', '.rtwbmal_calendar', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_calendar_content').addClass('rtwbmal_show');
			
		} );

		$(document).on( 'click', '.rtwbmal_business_hr', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_business_hours_content').addClass('rtwbmal_show');
			
		} );

		$(document).on( 'click', '.rtwbmal_holiday', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_holidays_content').addClass('rtwbmal_show');
			
		} );

		$(document).on( 'click', '.rtwbmal_notification', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_notifications_content').addClass('rtwbmal_show');

		} );

		$(document).on( 'click', '.rtwbmal_gateway', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_gateway_content').addClass('rtwbmal_show');

		} );

		$(document).on( 'click', '.rtwbmal_google_cal', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_google_cal_content').addClass('rtwbmal_show');

		} );

		$(document).on( 'click', '.rtwbmal_templates', function(){
			$(document).find('.rtwbmal_active').removeClass('rtwbmal_active');
			$(this).addClass('rtwbmal_active');

			$(document).find('.rtwbmal_show').addClass('rtwbmal_hide');
			$(document).find('.rtwbmal_show').removeClass('rtwbmal_show');
			$(document).find('.rtwbmal_templates_content').addClass('rtwbmal_show');

		} );
		/////////// employees working hours ////////
		$(document).on( 'click', '.addbreak', function(){
			$(this).removeClass('addbreak');
			$(this).closest('li').find('.rtwbmal_emp_breaks_list').show();
			$(this).addClass('addnewbreak');
		});

		$(document).on( 'click', '.addnewbreak', function()
		{
			if( $(this).parent().siblings().hasClass('rtwbmal_emp_breaks_list') )
			{
				var clone = $(this).closest('div').parent().find('.rtwbmal_emp_breaks_list').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
				clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");

				clone.prependTo($(this).closest('div'));
			}

			if( $(document).find('.rtwchkMonday').val() == 0 )
			{
				$(this).closest('li').find('.rtwbmal_emp_breaks_list').show();
			}
		});

		$(document).on( 'change', '.rtwbmal_custom_checkboxes', function(){

			if(	$(this).prop("checked") == true	){
                $(this).closest('li').find('.hideee').show();
               	$(this).closest('li').removeClass('rtwbmal_uncheck');
            }
            else if( $(this).prop("checked") == false ){
                $(this).closest('li').find('.hideee').hide();
                $(this).closest('li').addClass('rtwbmal_uncheck');
            }
		});

		$(document).on( 'click', '.remove_row', function(){
			$(this).parent().remove();
		});
		$(document).on( 'click', '.rtwbmal_emp_breaks_close', function(){

			$(this).parent().hide();
		});

		$(document).on( 'click', '.rtwbmal_emp_apply', function(){
			
			var rtwbmal_strt_hr = $(this).closest('li').find('.rtwbmal_strt_day').val();
			var rtwbmal_end_hr = $(this).closest('li').find('.rtwbmal_end_day').val();
			$(document).find('.rtwbmal_strt_day').val(rtwbmal_strt_hr);
			$(document).find('.rtwbmal_end_day').val(rtwbmal_end_hr);

			var rtwbmal_brk_str = $(this).closest('li').find('.rtwbmal_brk_str').val();
			var rtwbmal_brk_end = $(this).closest('li').find('.rtwbmal_brk_end').val();

			if( rtwbmal_brk_str != 0 )
			{
				$(document).find('.rtwbmal_emp_breaks_list').show();
			}
			$(document).find('.rtwbmal_brk_str').val(rtwbmal_brk_str);
			$(document).find('.rtwbmal_brk_end').val(rtwbmal_brk_end);

			if( $(this).closest('li').find('rtwbmal_emp_bre_select') )
			{
				var clone = $(this).closest('li').find('.rtwbmal_emp_bre_select').clone();
				
				clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");

				clone.prependTo($(document).find('.rtwbmal_emp_breaks_add'));
			}

					
		});
		/////////////////////////////////////////////

		////////// upload image from media //////////
		$(document).on( 'click', '#rtwbmal_company_img' ,function(e) {
			var rtwbmal_mediaUploader;
		    e.preventDefault();
		    // If the uploader object has already been created, reopen the dialog
		      if (rtwbmal_mediaUploader) {
		      rtwbmal_mediaUploader.open();
		      return;
		    }
		    // Extend the wp.media object
		    rtwbmal_mediaUploader = wp.media.frames.file_frame = wp.media({
		      title: 'Select',
		      button: {
		      text: 'Select'
		    }, multiple: false });
		    // When a file is selected, grab the URL and set it as the text field's value
		    var rtwbmal_attachment;
		    rtwbmal_mediaUploader.on('select', function() {
		      rtwbmal_attachment = rtwbmal_mediaUploader.state().get('selection').first().toJSON();
		      
		      $('#rtwbmal_company_imgs').val(rtwbmal_attachment.id);
		      $('#rtwbmal_company_img').attr('src', rtwbmal_attachment.url);
		    });
		    // Open the uploader dialog
		    rtwbmal_mediaUploader.open();
		});


	    var email = {
	    	rtwbmal_paypal_email : { email: true },
	    	rtwbmal_receiver_email : { email: true }

	    }

	    var msg = {
	    	rtwbmal_paypal_email : { email: rtwbmal_global_params.rtwbmal_email },
	    	rtwbmal_receiver_email : { email: rtwbmal_global_params.rtwbmal_email }
	    }

	    $(document).find( "#rtwbmal_check_param" ).validate({
	        rules: email,
	        messages: msg
	    });

	    $(document).on('click', '.rtwbmal_button', function(){
	    	if( $(document).find( "#rtwbmal_check_param" ).valid() )
			{

			}
	    } );

	    $(document).on('click', ".rtwbmal_paypal_sandbox", function(){
	    	
	    	var rtwbmal_enable_sandbox = $("input[name='rtwbmal_paypal_sandbox']:checked").val();

	    	if( rtwbmal_enable_sandbox == 1)
	    	{
	    		$(document).find('.rtwbmal_test_apicredentials').show();
	    		$(document).find('.rtwbmal_live_apicredentials').hide();
	    	}
	    	else{
	    		$(document).find('.rtwbmal_test_apicredentials').hide();
	    		$(document).find('.rtwbmal_live_apicredentials').show();
	    	}

	    });

	    $(document).on('click', ".rtwbmal_stripe_sandbox", function(){
	    	
	    	var rtwbmal_enable_sandbox = $("input[name='rtwbmal_stripe_sandbox']:checked").val();

	    	if( rtwbmal_enable_sandbox == 1)
	    	{
	    		$(document).find('.rtwbmal_test_credentials').show();
	    		$(document).find('.rtwbmal_live_credentials').hide();
	    	}
	    	else{
	    		$(document).find('.rtwbmal_test_credentials').hide();
	    		$(document).find('.rtwbmal_live_credentials').show();
	    	}

	    });

	    $(document).find('.rtwbmal_paypal_settings').show();
	    $(document).find('.rtwbmal_stripe_settings').hide();

	    $(document).on( 'click', '.rtwbmal_paypal_gate', function(){
	    	$(document).find('.rtwbmalactive').removeClass('rtwbmalactive');
	    	$(this).addClass('rtwbmalactive');
	    	$(document).find('.rtwbmal_paypal_settings').show();
	    	$(document).find('.rtwbmal_stripe_settings').hide();

	    });

	    $(document).on( 'click', '.rtwbmal_stripe_gate', function(){
	    	$(document).find('.rtwbmalactive').removeClass('rtwbmalactive');
	    	$(this).addClass('rtwbmalactive');
	    	$(document).find('.rtwbmal_stripe_settings').show();
	    	$(document).find('.rtwbmal_paypal_settings').hide();
	    });
	});

})( jQuery );