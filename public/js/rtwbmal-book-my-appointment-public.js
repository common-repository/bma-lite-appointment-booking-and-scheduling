(function( $ ) {
	'use strict';

	$(function() {
		var unavailableDate = $(document).find('.rtwbmal_holidates').val();
		
		var unavailableDates = '';
		if( unavailableDate )
		{
			unavailableDates = $(document).find('.rtwbmal_holidates').val().split(", ");
		}
		var holidays = '';
		if($(document).find('.rtwbmal_holidays').length != 0)
		{
			holidays = $.parseJSON($(document).find('.rtwbmal_holidays').val());
		}
		var rules = {
	        customer_first_name : { required: true },
	        customer_last_name 	: { required: true },
	        customer_email		: { required: true },
	        customer_mob_no 	: { required: true }
	    };

	    var messages = {
	        customer_first_name : { required: rtwbmal_global_params.rtwbmal_required },
	        customer_last_name 	: { required: rtwbmal_global_params.rtwbmal_required },
	        customer_email 		: { required: rtwbmal_global_params.rtwbmal_required,
	        						email: rtwbmal_global_params.rtwbmal_email },
	        customer_mob_no 	: { required: rtwbmal_global_params.rtwbmal_required }
	    };

	    $(document).find( "#rtwbmal_customer_error" ).validate({
	        rules: rules,
	        messages: messages
	    });


		//
		var rtwbmal_services_brdr_radius = rtwbmal_global_params.rtwbmal_frntend_brdr_radi.rtwbmal_services_brdr_radius;
		var rtwbmal_specialist_brdr_radius =rtwbmal_global_params.rtwbmal_frntend_brdr_radi.rtwbmal_specialist_brdr_radius;
		$(document).find(".rtwbmal_placeholder_image >img").css("border-radius",rtwbmal_services_brdr_radius+"%");
		// ////

		$(document).find('.rtwbmal_hidden').hide();

		var rtwbmal_enable_paypal = $(document).find('.rtwbmal_enable_paypal').val();
		if( rtwbmal_enable_paypal == 'no' )
		{
			$(document).find('.rtwbmal_check_active_paypal').remove();
		}

		$(document).on('click', '.rtwbmal_time_app', function(){
			if ($('.rtwbmal_time_app').hasClass('rtwbmal_active')) {
				$('.rtwbmal_time_app').removeClass('rtwbmal_active');
			}
			$(this).addClass('rtwbmal_active');
		});

	    $(document).on('click', '.rtwbmal_time_app', function(){
	    	var value = $(this).find('.rtwbmal_save_time').val();
			$(document).find('.rtwbmal_start_time').val(value);
	    });

	    $(document).find('.rtwbmal_stripe_form').hide();

	    $(document).on('click', 'input[name="rtwbmal_payment"]' , function(){

			$(document).find('.rtwbmal_payment_div').find('.rtwbmal_service_tbl_row').each(function(){
				if($(this).hasClass('rtwbmal_parent_row'))
				{
					$(this).removeClass('rtwbmal_parent_row');
				}
			});
			
	    	var rtwbmal_pay = $("input[name='rtwbmal_payment']:checked").val();
	    	if( rtwbmal_pay == 'stripe' )
	    	{
				$(document).find('.rtwbmal_stripe_form').show();
	    	}
	    	else{
				$(document).find('.rtwbmal_stripe_form').hide();
	    	}
			$(this).parent().parent().parent().addClass('rtwbmal_parent_row');
	    });

	    var rul = {
	        rtwbmal_cancel_appointment : { required: true },
	    };

	    var msg = {
	        rtwbmal_cancel_appointment : { required: rtwbmal_global_params.rtwbmal_required },
	    };

	    $(document).find( "#rtwbmal_cancel_form" ).validate({
	        rules: rul,
	        messages: msg
	    });

	    $(document).find('.rtwbmal_cancel_appointment').on('click', function(){
	    	var rtwbmal_confrm = $(document).find('input[name="rtwbmal_cncl_yes"]:checked').val();
	    	
	    	if( rtwbmal_confrm == 'yes'  )
	    	{
	    		if( $(document).find( "#rtwbmal_cancel_form" ).valid() )
				{
		    		var appoin_id = $(document).find('#rtwbmal_ap_id').val();
		    		var cancel_reason = $(document).find('.reason_cancel').val();
			    	var rtwbmal_data = {
			 			action 					: 'rtwbmal_cncl_appointment',
			 			appoin_id 				: appoin_id,
			 			cancel_reason 			: cancel_reason,
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
			 				
			 				window.location.replace(response);
			 				$.unblockUI();
			 			}
			 		});
			 	}
		 	}
		 	else{
		 		var rtwbmal_url = $(document).find('.rtwbmal_url').val();
		 		window.location.replace(rtwbmal_url);
		 	}
	    });

		$(document).on('click','.rtwbmal_cncl_btn', function(){
			var app_id = $(this).data('attr');
			if( confirm('Are you sure?', true ) )
			{
				var html = '<td colspan="6"><span class="rtwbmal_cncl_text">'+rtwbmal_global_params.rtwbmal_cncl_reason+'</span><textarea class="reason_cancel" ></textarea><a href="javascript:void(0)" class="rtwbmal-cust-btn rtwbmal_cncl_submit" data-attr="'+app_id+'">Submit</a></td>';
				$(this).parent().parent().next().html(html);

			}
		});

		$(document).on('click', '.rtwbmal_cncl_submit', function(){
			var message = $(document).find('.reason_cancel').val();
			if( message != '' )
			{
				var appoin_id = $(this).data('attr');
				
				var rtwbmal_data = {
					action 					: 'rtwbmal_cncl_appointment',
					appoin_id 				: appoin_id,
					cancel_reason 			: message,
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
						window.location.replace(response);
						$.unblockUI();
					}
				});
			}else{
				$.notify( rtwbmal_global_params.rtwbmal_cncl_reason,
					{ position:"right middle" }
				);
			}
		});

		$(document).find('.rtwbmal_select').select2({width : '50%'});

		$(document).on('click', '.rtwbmal_update_profile', function(){
			var cus_name = $(document).find('.rtwbmal_cust_name').val();
			var cus_email = $(document).find('.rtwbmal_cus_email').val();
			var cus_phone = $(document).find('.rtwbmal_cus_phone').val();
			var month = $(document).find('.rtwbmal_month').val();
			var date = $(document).find('.rtwbmal_date').val();
			var year = $(document).find('.rtwbmal_year').val();
			var cus_id = $(document).find('.rtwbmal_customer_id').val();
			var rtwbmal_data = {
				action 				: 'rtwbmal_update_customer',
				cus_id 				: cus_id,
				cus_name 			: cus_name,
				cus_email 			: cus_email,
				cus_phone 			: cus_phone,
				month 				: month,
				date 				: date,
				year 				: year,
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
					$.unblockUI();
					window.location.reload(true);
				}
			});
		});

		$(document).on('click', '#rtwbmal_edit_emp', function(){
			
			var emp_id 		= $(document).find('.rtwbmal_emp_id').val();
			var emp_name 	= $(document).find('.rtwbmal_emp_name').val();
			var emp_email 	= $(document).find('.rtwbmal_emp_email').val();
			var emp_phone 	= $(document).find('.rtwbmal_emp_tel').val();
			var emp_info 	= $(document).find('.rtwbmal_emp_info').val();
			var emp_addr 	= $(document).find('.rtwbmal_emp_addr').val();
			var visibility 	= $("input[name='rtwbmal_employee_visible']:checked").val();
			var emp_location = $(document).find('.rtwbmal_emp_location').val();
			//////////// employee services ///////////
			var rtwbmal_service = {};
			var rtwbmal_prices = {};

			$(document).find('.rtwbmal_selected_service').each(function (){
				rtwbmal_prices['rtwbmal_' + $(this).val()] = {};
				var min = $(this).parent().parent().parent().find('.rtwbmal_min_cap').val();
				var max = $(this).parent().parent().parent().find('.rtwbmal_max_cap').val();
				if( $(this).is(":checked") ) {
					var price = $(this).parent().parent().parent().find('.rtwbmal_ser_price').val();
					rtwbmal_prices['rtwbmal_' + $(this).val()]['price'] = price;
					rtwbmal_prices['rtwbmal_' + $(this).val()]['min'] = min;
					rtwbmal_prices['rtwbmal_' + $(this).val()]['max'] = max;
					rtwbmal_service['rtwbmal_' + $(this).val()] = true;
				}else{
					rtwbmal_prices['rtwbmal_' + $(this).val()] = 0;
					rtwbmal_service['rtwbmal_' + $(this).val()] = false;
				}
				
			});
			
			var rtwbmal_data = {
				action 				: 'rtwbmal_update_employee',
				emp_name 			: emp_name,
				emp_email 			: emp_email,
				emp_phone 			: emp_phone,
				emp_info 			: emp_info,
				emp_addr 			: emp_addr,
				visibility 			: visibility,
				emp_id 				: emp_id,
				rtwbmal_service 		: rtwbmal_service,
				rtwbmal_prices 		: rtwbmal_prices,
				emp_location 		: emp_location,
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
					$.unblockUI();
					window.location.reload(true);
				}
			});
		});

		$(document).find( '.datepicker' ).datepicker({
			dateFormat : 'yy-mm-dd',
			onSelect 	: function( dateText, inst ){
				
				var rtwbmal_day 		= inst.selectedDay;
				var rtwbmal_month 	= inst.selectedMonth+1;
				rtwbmal_month 		= ( rtwbmal_month > 9 ) ? rtwbmal_month : '0'+rtwbmal_month;
				var rtwbmal_year 	= inst.selectedYear;
				var rtwbmal_date 	= rtwbmal_year +'-'+ rtwbmal_month +'-'+ rtwbmal_day;

				$(document).find('.rtwbmal_selected_date').val(rtwbmal_date);

				var service_id = $(document).find('.rtwbmal_selected_service').val();
				var duration = $(document).find('.rtwbmal_'+ service_id).val();
				var min_cap = $(document).find('.rtwbmal_'+ service_id).data('min');
				var max_cap = $(document).find('.rtwbmala_'+ service_id).val();
				
				$(document).find('.rtwbmal_number_of_people').attr({
				   "max" : max_cap,
				   "min" : min_cap  
				});

				$(document).find('.rtwbmal_service_duration').val(duration);
				$(document).find('.rtwbmal_start_date').val(rtwbmal_date);

				var date = $(this).datepicker('getDate');
				var dayOfWeek = date.getUTCDay();
				var emp_id = 0;
				$(document).find('.rtwbmal_emp_id').each(function(){
					if($(this).prop("checked") == true)
					{
						emp_id = $(this).val();
					}
				});

				var rtwbmal_data = {
					 action 					: 'rtwbmal_get_emp_detail',
					 dayOfWeek 				: dayOfWeek,
					 emp_id 					: emp_id,
					 duration 				: duration,
					 rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
				 };

				 $.ajax({
					 url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
					 type 		: "POST",  
					 data 		: rtwbmal_data,
					 dataType 	: 'json',	
					 success 	: function(response) 
					 {
						 var rtyr = $(document).find('.rtwbmal_times_sec').html(response);
						console.log(rtyr);
					 }
				 });

			},
			minDate: 1, // new Date()
			beforeShowDay: function(date){
                    var day = date.getDay(), Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6, Sunday = 0;
                    
                    var closedDays = [[0], [4]];
                    for (var i = 0; i < holidays.length; i++) {
                        if (day == holidays[i]) {
                            return [false];
                        }
                    }
                    var dmy = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
                   
                    if ($.inArray(dmy, unavailableDates) < 0) {
                    // if( unavailableDates.indexOf(dmy)){
                        return [true,"","Book Now"];
                    } else {
                        return [false,"","Booked Out"];
                    }
                }
		});

		$(document).on('hover', '.entry-content', function(){
			$(document).find('.rtwbmal_input_field').each(function(){
				var tmpThis = $(this).val();
				if(tmpThis !='' ){
					$(this).parents('.rtwbmal_input_wrapper').addClass('isfocus');
				}
			})
		});

		$(document).on('focus', '.rtwbmal_input_field', function(){
			var tmpThis = $(this).val();
			if(tmpThis == '' ){
				$(this).parents('.rtwbmal_input_wrapper').addClass('isfocus');
			}
			else if(tmpThis !='' ){
				$(this).parents('.rtwbmal_input_wrapper').addClass('isfocus');
			}
		});
		$(document).on('blur', '.rtwbmal_input_field', function(){
			$(document).find('.rtwbmal_input_field').each(function(){
				var tmpThis = $(this).val();
				if( tmpThis == '' ) {
					$(this).parents('.rtwbmal_input_wrapper').removeClass('isfocus');
				}
				else if( tmpThis != '' ){
					$(this).parents('.rtwbmal_input_wrapper').addClass('isfocus');
				}
			});
		});

		$(document).on('click', '.rtwbmal-tabs-nav li a', function(){
			var data_content = $(this).attr('data-tabs');
			$(document).find('.rtwbmal-tabs-nav li a').removeClass('active');
			$(this).addClass('active');

			$(document).find('.rtwbmal-cust-tab-content').each(function(){
				if( $(this).attr('data-tab-content') == data_content )
				{
					$(this).addClass('show');
				}else{
					$(this).removeClass('show');
				}
			});
			$(document).find('.rtwbmal-emp-tab-content').each(function(){
				if( $(this).attr('data-tab-content') == data_content )
				{
					$(this).addClass('show');
				}else{
					$(this).removeClass('show');
				}
			});
		});
	})
})( jQuery );