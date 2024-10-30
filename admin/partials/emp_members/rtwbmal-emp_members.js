(function( $ ) {
	'use strict';

	$(function() {
		$(document).on('click', '.rtwbmal_add_new_emp', function(){
			$(document).find('.rtwbmal_emp_header_title').text('Add New Employee');
			$(document).find('#rtwbmal_emp_imgs').val('');
			$(document).find('#rtwbmal_emp_img').attr( 'src', '');
			$(document).find( '.rtwbmal_emp_first_name' ).val( '' );
			$(document).find( '.rtwbmal_emp_last_name' ).val('');
			$(document).find( '.rtwbmal_emp_email_input' ).val('');
			$(document).find( '.rtwbmal_emp_phone_no' ).val( '');
			$(document).find( '#rtwbmal_wp_user').val(0).change();
			$(document).find( '#rtwbmal_wp_user').attr('disabled', false);
			$(document).find( '.rtwbmal_emp_address_input' ).val('');
			$(document).find( '.rtwbmal_emp_description' ).val('');
		})

		$(document).find('.rtwwdpd_emp_details').show();
		$(document).find('.rtwbmal_emp_wrkng_hour').hide();
		$(document).find('.rtwbmal_emp_services').hide();
		$(document).find('.rtwhide').hide();
		$(document).find('.rtwbmal_emp_breaks_list').hide();
		
		$(document).on('click', '#rtwbmal_emp_detail', function(){
			$(document).find('.rtwwdpd_emp_details').show();
			$(document).find('#rtwbmal_emp_detail').addClass('active');
			$(document).find('#rtwbmal_emp_service').removeClass('active');
			$(document).find('#rtwbmal_emp_working_hour').removeClass('active');
			$(document).find('.rtwbmal_emp_wrkng_hour').hide();
			$(document).find('.rtwbmal_emp_services').hide();
		});

		$(document).on('click', '#rtwbmal_emp_working_hour',  function(){
			$(document).find('.rtwbmal_emp_wrkng_hour').show();
			$(document).find('#rtwbmal_emp_working_hour').addClass('active');
			$(document).find('#rtwbmal_emp_service').removeClass('active');
			$(document).find('#rtwbmal_emp_detail').removeClass('active');
			$(document).find('.rtwwdpd_emp_details').hide();
			$(document).find('.rtwbmal_emp_services').hide();
		});

		$(document).on('click', '#rtwbmal_emp_service',  function(){
			$(document).find('.rtwbmal_emp_services').show();
			$(document).find('#rtwbmal_emp_service').addClass('active');
			$(document).find('#rtwbmal_emp_detail').removeClass('active');
			$(document).find('#rtwbmal_emp_working_hour').removeClass('active');
			$(document).find('.rtwbmal_emp_wrkng_hour').hide();
			$(document).find('.rtwwdpd_emp_details').hide();
		});

	    $(document).on( 'click' , 'rtwbmal_add_new_button', function(){
	    	$(document).find('#rtwbmal_add_edit_emp').val('save');
	    });

	    //jquery_validate
		var rules = {
	        rtwbmal_emp_first_name 	: { required: true },
	        rtwbmal_emp_last_name 	: { required: true },
	        rtwbmal_emp_email_input	: { required: true }
	    };
	    
	    var messages = {
	        rtwbmal_emp_first_name 	: { required: rtwbmal_global_params.rtwbmal_required },
	        rtwbmal_emp_last_name 	: { required: rtwbmal_global_params.rtwbmal_required },
	        rtwbmal_emp_email_input 	: { required: rtwbmal_global_params.rtwbmal_required }
	    };

	    $(document).find( "#rtwbmal_employee_error" ).validate({
	        rules: rules,
	        messages: messages
	    });

		$(document).on('click', '.rtwbmal_selected_service', function(){
			if( $(this).is(":checked") ) {
				
				$(this).closest('div').parent().find('.rtwbmal_selected_price').attr('disabled', false);
				$(this).closest('div').parent().find('.rtwbmal_min_cap').attr('disabled', false);
				$(this).closest('div').parent().find('.rtwbmal_max_cap').attr('disabled', false);
			}
			else{
				$(this).closest('div').parent().find('.rtwbmal_selected_price').attr('disabled', true);
				$(this).closest('div').parent().find('.rtwbmal_min_cap').attr('disabled', true);
				$(this).closest('div').parent().find('.rtwbmal_max_cap').attr('disabled', true);
			}
		});

		// add emp
		$(document).on( 'click', '.rtwbmal_save_employee', function(){
			
			
			var attachment_id 			= $(document).find('#rtwbmal_emp_imgs').val();
			var rtwbmal_emp_fname 		= $(document).find( '.rtwbmal_emp_first_name' ).val();
			var rtwbmal_emp_lname 		= $(document).find( '.rtwbmal_emp_last_name' ).val();
			var rtwbmal_emp_email 		= $(document).find( '.rtwbmal_emp_email_input' ).val();
			var rtwbmal_emp_phone_no 	= $(document).find( '.rtwbmal_emp_phone_no' ).val();
			var rtwbmal_emp_visible 		= $(document).find( '.rtwbmal_emp_visible' ).val();
			var rtwbmal_emp_address 		= $(document).find( '.rtwbmal_emp_address_input' ).val();
			var rtwbmal_emp_description 	= $(document).find( '.rtwbmal_emp_description' ).val();
			var rtwbmal_emp_location 	= $(document).find( '.rtwbmal_emp_location' ).val();
			var rtwbmal_wp_user 			= $(document).find( '#rtwbmal_wp_user').val();
			var rtwbmal_emp_price 		= $(document).find( '.rtwbmal_emp_price' ).val();
			var rtwbmal_emp_sevices		= $(document).find( '.rtwbmal_emp_sevices' ).val();

			var rtwbmal_emp_min_cap		= $(document).find( '.rtwbmal_emp_min_cap' ).val();
			var rtwbmal_emp_max_cap		= $(document).find( '.rtwbmal_emp_max_cap' ).val();
			
			var rtwbmal_service = {};
			var rtwbmal_prices = {};

			$(document).find('.rtwbmal_selected_service').each(function (){
				rtwbmal_prices['rtwbmal_' + $(this).val()] = {};
				if( $(this).is(":checked") ) {
					var price = $(this).parent().parent().parent().find('.rtwbmal_selected_price').val();
					var min = $(this).parent().parent().parent().find('.rtwbmal_min_cap').val();
					var max = $(this).parent().parent().parent().find('.rtwbmal_max_cap').val();
					rtwbmal_prices['rtwbmal_' + $(this).val()]['price'] = price;
					rtwbmal_prices['rtwbmal_' + $(this).val()]['min'] = min;
					rtwbmal_prices['rtwbmal_' + $(this).val()]['max'] = max;
					rtwbmal_service['rtwbmal_' + $(this).val()] = true;
				}else{
					rtwbmal_prices['rtwbmal_' + $(this).val()] = 0;
					rtwbmal_service['rtwbmal_' + $(this).val()] = false;
				}
				
			});
			
			var rtwbmal_active_days = [];
			for( var i=1; i<=7 ; i++ ){
				if( $(document).find('#chk'+i).is(':checked') )
				{
					rtwbmal_active_days[i] = 1;
				}else{
					rtwbmal_active_days[i] = 0;
				}
			} 
		
			var rtwbmal_strt = {};
			rtwbmal_strt['day1'] 		= { 'in': $(document).find('#strtday1').val() };
			rtwbmal_strt['day1']['indx'] = $(document).find('#strtday1').attr('data-hour_id');
			rtwbmal_strt['day2'] 		= { 'in': $(document).find('#strtday2').val() };
			rtwbmal_strt['day2']['indx'] = $(document).find('#strtday2').attr('data-hour_id');
			rtwbmal_strt['day3'] 		= { 'in': $(document).find('#strtday3').val() };
			rtwbmal_strt['day3']['indx'] = $(document).find('#strtday3').attr('data-hour_id');
			rtwbmal_strt['day4']			= { 'in': $(document).find('#strtday4').val() };
			rtwbmal_strt['day4']['indx'] = $(document).find('#strtday4').attr('data-hour_id');
			rtwbmal_strt['day5'] 		= { 'in': $(document).find('#strtday5').val() };
			rtwbmal_strt['day5']['indx'] = $(document).find('#strtday5').attr('data-hour_id');
			rtwbmal_strt['day6'] 		= { 'in': $(document).find('#strtday6').val() };
			rtwbmal_strt['day6']['indx'] = $(document).find('#strtday6').attr('data-hour_id');
			rtwbmal_strt['day7'] 		= { 'in': $(document).find('#strtday7').val() };
			rtwbmal_strt['day7']['indx'] = $(document).find('#strtday7').attr('data-hour_id');
			console.log(rtwbmal_strt);

			var rtwbmal_end = [];
			rtwbmal_end[1] = $(document).find('#endday1').val();
			rtwbmal_end[2] = $(document).find('#endday2').val();
			rtwbmal_end[3] = $(document).find('#endday3').val();
			rtwbmal_end[4] = $(document).find('#endday4').val();
			rtwbmal_end[5] = $(document).find('#endday5').val();
			rtwbmal_end[6] = $(document).find('#endday6').val();
			rtwbmal_end[7] = $(document).find('#endday7').val();

			var rtwbmal_mon_break_strt 	= [];
			var rtwbmal_mon_break_s_indx = [];
			var rtwbmal_mon_break_end 	= [];
			var rtwbmal_tue_break_strt 	= [];
			var rtwbmal_tue_break_s_indx = [];
			var rtwbmal_tue_break_end 	= [];
			var rtwbmal_wed_break_strt 	= [];
			var rtwbmal_wed_break_s_indx = [];
			var rtwbmal_wed_break_end 	= [];
			var rtwbmal_thu_break_strt 	= [];
			var rtwbmal_thu_break_s_indx = [];
			var rtwbmal_thu_break_end 	= [];
			var rtwbmal_fri_break_strt 	= [];
			var rtwbmal_fri_break_s_indx = [];
			var rtwbmal_fri_break_end 	= [];
			var rtwbmal_sat_break_strt 	= [];
			var rtwbmal_sat_break_s_indx = [];
			var rtwbmal_sat_break_end 	= [];
			var rtwbmal_sun_break_strt 	= [];
			var rtwbmal_sun_break_s_indx = [];
			var rtwbmal_sun_break_end 	= [];

			$(document).find('.Mondaystart').each(function(){
				rtwbmal_mon_break_strt.push($(this).val());
				rtwbmal_mon_break_s_indx.push( $(this).attr('data-edit_id') );
			});
			$(document).find('.Mondayend').each(function(){
				rtwbmal_mon_break_end.push($(this).val());
			});
			$(document).find('.Tuesdaystart').each(function(){
				rtwbmal_tue_break_strt.push($(this).val());
				rtwbmal_tue_break_s_indx.push( $(this).attr('data-edit_id') );
			});
			$(document).find('.Tuesdayend').each(function(){
				rtwbmal_tue_break_end.push($(this).val());
			});
			$(document).find('.Wednesdaystart').each(function(){
				rtwbmal_wed_break_strt.push($(this).val());
				rtwbmal_wed_break_s_indx.push( $(this).attr('data-edit_id') );
			});
			$(document).find('.Wednesdayend').each(function(){
				rtwbmal_wed_break_end.push($(this).val());
			});
			$(document).find('.Thursdaystart').each(function(){
				rtwbmal_thu_break_strt.push($(this).val());
				rtwbmal_thu_break_s_indx.push( $(this).attr('data-edit_id') );
			});
			$(document).find('.Thursdayend').each(function(){
				rtwbmal_thu_break_end.push($(this).val());
			});
			$(document).find('.Fridaystart').each(function(){
				rtwbmal_fri_break_strt.push($(this).val());
				rtwbmal_fri_break_s_indx.push( $(this).attr('data-edit_id') );
			});
			$(document).find('.Fridayend').each(function(){
				rtwbmal_fri_break_end.push($(this).val());
			});
			$(document).find('.Saturdaystart').each(function(){
				rtwbmal_sat_break_strt.push($(this).val());
				rtwbmal_sat_break_s_indx.push( $(this).attr('data-edit_id') );
			});
			$(document).find('.Saturdayend').each(function(){
				rtwbmal_sat_break_end.push($(this).val());
			});
			$(document).find('.Sundaystart').each(function(){
				rtwbmal_sun_break_strt.push($(this).val());
				rtwbmal_sun_break_s_indx.push( $(this).attr('data-edit_id') );
			});
			$(document).find('.Sundayend').each(function(){
				rtwbmal_sun_break_end.push($(this).val());
			});
			
			var rtwbmal_break_strt = {};
			rtwbmal_break_strt['break1'] = { 'in':rtwbmal_mon_break_strt };
			rtwbmal_break_strt['break1']['indx'] = rtwbmal_mon_break_s_indx ;
			rtwbmal_break_strt['break2'] = { 'in':rtwbmal_tue_break_strt };
			rtwbmal_break_strt['break2']['indx'] = rtwbmal_tue_break_s_indx ;
			rtwbmal_break_strt['break3'] = { 'in':rtwbmal_wed_break_strt };
			rtwbmal_break_strt['break3']['indx'] = rtwbmal_wed_break_s_indx;
			rtwbmal_break_strt['break4'] = { 'in':rtwbmal_thu_break_strt };
			rtwbmal_break_strt['break4']['indx'] = rtwbmal_thu_break_s_indx;
			rtwbmal_break_strt['break5'] = { 'in':rtwbmal_fri_break_strt };
			rtwbmal_break_strt['break5']['indx'] = rtwbmal_fri_break_s_indx;
			rtwbmal_break_strt['break6'] = { 'in':rtwbmal_sat_break_strt };
			rtwbmal_break_strt['break6']['indx'] = rtwbmal_sat_break_s_indx;
			rtwbmal_break_strt['break7'] = { 'in':rtwbmal_sun_break_strt };
			rtwbmal_break_strt['break7']['indx'] = rtwbmal_sun_break_s_indx;

			var rtwbmal_break_end = [];
			rtwbmal_break_end[1] = rtwbmal_mon_break_end;
			rtwbmal_break_end[2] = rtwbmal_tue_break_end;
			rtwbmal_break_end[3] = rtwbmal_wed_break_end;
			rtwbmal_break_end[4] = rtwbmal_thu_break_end;
			rtwbmal_break_end[5] = rtwbmal_fri_break_end;
			rtwbmal_break_end[6] = rtwbmal_sat_break_end;
			rtwbmal_break_end[7] = rtwbmal_sun_break_end;

			var rtwbmal_ajaxedit = '';

			var rtwbmal_emp_id = $(document).find('#rtwbmal_add_edit_emp').val();

			if( rtwbmal_emp_id != 'save' )
			{
				
				rtwbmal_ajaxedit = 'rtwbmal_emp_update';
			}
			else
			{
				
				rtwbmal_ajaxedit = 'rtwbmal_emp_add';
			}

			var length = $(document).find('.rtwbmal_single_emp').length;

			var rtwbmal_data = {
				action 					: rtwbmal_ajaxedit,
				attachment_id 			: attachment_id,
				length 					: length,
				rtwbmal_emp_id 			: rtwbmal_emp_id,
				rtwbmal_emp_fname 		: rtwbmal_emp_fname,
				rtwbmal_emp_lname 		: rtwbmal_emp_lname,
				rtwbmal_emp_email 		: rtwbmal_emp_email,
				rtwbmal_emp_phone_no 	: rtwbmal_emp_phone_no,
				rtwbmal_emp_visible 		: rtwbmal_emp_visible,
				rtwbmal_emp_address 		: rtwbmal_emp_address,
				rtwbmal_emp_description 	: rtwbmal_emp_description,
				rtwbmal_emp_location 	: rtwbmal_emp_location,
				rtwbmal_emp_sevices 		: rtwbmal_emp_sevices,
				rtwbmal_emp_min_cap 		: rtwbmal_emp_min_cap,
				rtwbmal_emp_max_cap 		: rtwbmal_emp_max_cap,
				rtwbmal_emp_price		: rtwbmal_emp_price,
				rtwbmal_display_order 	: '999',

				rtwbmal_active_days 		: rtwbmal_active_days,
				rtwbmal_service 			: rtwbmal_service,
				rtwbmal_prices 			: rtwbmal_prices,
				rtwbmal_wp_user 			: rtwbmal_wp_user,
				rtwbmal_strt 			: rtwbmal_strt,
				rtwbmal_end 				: rtwbmal_end,

				rtwbmal_break_strt 		: rtwbmal_break_strt,
				rtwbmal_break_end 		: rtwbmal_break_end,

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
					console.log(response);
					// alert(response);
					
					if( response.rtwbmal_status ){
						$.growl({
							title 	: response.rtwbmal_message, 
							location: 'br',
							style 	: 'notice',
							message : '',
						});
						$(document).find( '.close-modal ' ).trigger( 'click' );
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
					$.unblockUI();
				}
			});
		});
		
		$(document).on( 'click', '.rtwbmal_emp_edit', function(){
			var rtwbmal_emp_id = $(this).closest('ul').attr( 'data-rtwbmal_emp_id' );
			$(document).find('.rtwbmal_emp_header_title').text('Edit Employee Data');
			$(document).find('#rtwbmal_add_edit_emp').val( rtwbmal_emp_id );

			var rtwbmal_data = {
		 			action 					: 'rtwbmal_emp_edit',
		 			rtwbmal_emp_id 			: rtwbmal_emp_id,
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
	 					$(document).find('#rtwbmal_emp_imgs').val( response.rtwbmal_get_emp_detail['attachment_id'] );
	 					$(document).find('#rtwbmal_emp_img').attr( 'src', response.rtwbmal_get_emp_detail['attachment_url'] );
						$(document).find( '.rtwbmal_emp_first_name' ).val( response.rtwbmal_get_emp_detail['first_name'] );
						$(document).find( '.rtwbmal_emp_last_name' ).val( response.rtwbmal_get_emp_detail['last_name'] );
						$(document).find( '.rtwbmal_emp_email_input' ).val( response.rtwbmal_get_emp_detail['email'] );
						$(document).find( '.rtwbmal_emp_phone_no' ).val( response.rtwbmal_get_emp_detail['phone'] );

						$(document).find( '#rtwbmal_wp_user').val(response.rtwbmal_get_emp_detail['wp_user_id']).change();
						$(document).find( '#rtwbmal_wp_user').attr('disabled', true);

						if( response.rtwbmal_get_emp_detail['visibility'] == 1 )
						{
							$(document).find( '.rtwbmal_emp_visible' ).attr( 'checked', true );
						}
						
						$(document).find( '.rtwbmal_emp_address_input' ).val( response.rtwbmal_get_emp_detail['address'] );
						$(document).find( '.rtwbmal_emp_description' ).val( response.rtwbmal_get_emp_detail['info'] );

						for( var i=0; i<response.rtwbmal_get_emp_services.length; i++ )
						{
							var service_id = response.rtwbmal_get_emp_services[i]['service_id'];
							
							$(document).find( '.rtwbmal_service_'+service_id ).prop('checked', true);
							$(document).find( '.rtwbmal_ser_pri_'+service_id ).val( response.rtwbmal_get_emp_services[i]['price'] );
							$(document).find( '.rtwbmal_mincap_'+service_id ).val( response.rtwbmal_get_emp_services[i]['cap_min'] );
							$(document).find( '.rtwbmal_maxcap_'+service_id ).val( response.rtwbmal_get_emp_services[i]['cap_max'] );

						}
						
						if( response.rtwbmal_get_emp_services.length !== 0 && response.rtwbmal_get_emp_services.length !== '' )
						{
							$(document).find( '.rtwbmal_emp_location' ).val( response.rtwbmal_get_emp_services[0]['loc_id'] ).change();
						}

						if( response.rtwbmal_get_emp_wrkng_hour[0]['active'] == 1 )
						{
							$(document).find('#chk1').prop('checked', true );
							$(document).find('#chk1').closest('li').addClass('rtwbmal_check');
						}
						else{
							$(document).find('#chk1').prop('checked', false );
							$(document).find('#chk1').closest('li').addClass('rtwbmal_uncheck');
						}
						if( response.rtwbmal_get_emp_wrkng_hour[1]['active'] == 1 )
						{
							$(document).find('#chk2').prop('checked', true );
							$(document).find('#chk2').closest('li').addClass('rtwbmal_check');
						}
						else{
							$(document).find('#chk2').prop('checked', false );
							$(document).find('#chk2').closest('li').addClass('rtwbmal_uncheck');
						}
						if( response.rtwbmal_get_emp_wrkng_hour[2]['active'] == 1 )
						{
							$(document).find('#chk3').prop('checked', true );
							$(document).find('#chk3').closest('li').addClass('rtwbmal_check');
						}
						else{
							$(document).find('#chk3').prop('checked', false );
							$(document).find('#chk3').closest('li').addClass('rtwbmal_uncheck');
						}
						if( response.rtwbmal_get_emp_wrkng_hour[3]['active'] == 1 )
						{
							$(document).find('#chk4').prop('checked', true );
							$(document).find('#chk4').closest('li').addClass('rtwbmal_check');
						}
						else{
							$(document).find('#chk4').prop('checked', false );
							$(document).find('#chk4').closest('li').addClass('rtwbmal_uncheck');
						}
						if( response.rtwbmal_get_emp_wrkng_hour[4]['active'] == 1 )
						{
							$(document).find('#chk5').prop('checked', true );
							$(document).find('#chk4').closest('li').addClass('rtwbmal_check');
						}
						else{
							$(document).find('#chk4').prop('checked', false );
							$(document).find('#chk4').closest('li').addClass('rtwbmal_uncheck');
						}
						if( response.rtwbmal_get_emp_wrkng_hour[5]['active'] == 1 )
						{
							$(document).find('#chk6').prop('checked', true );
							$(document).find('#chk6').closest('li').addClass('rtwbmal_check');
						}
						else{
							$(document).find('#chk6').prop('checked', false );
							$(document).find('#chk6').closest('li').addClass('rtwbmal_uncheck');
						}
						if( response.rtwbmal_get_emp_wrkng_hour[6]['active'] == 1 )
						{
							$(document).find('#chk7').prop('checked', true );
							$(document).find('#chk7').closest('li').addClass('rtwbmal_check');
						}
						else{
							$(document).find('#chk7').prop('checked', false );
							$(document).find('#chk7').closest('li').addClass('rtwbmal_uncheck');
						}
						
						$(document).find('#strtday1').val( response.rtwbmal_get_emp_wrkng_hour[0]['strt_time'] ).change();
						$(document).find('#strtday1').attr('data-hour_id',response.rtwbmal_get_emp_wrkng_hour[0]['days'] );

				 		$(document).find('#strtday2').val( response.rtwbmal_get_emp_wrkng_hour[1]['strt_time'] ).change();
				 		$(document).find('#strtday2').attr('data-hour_id',response.rtwbmal_get_emp_wrkng_hour[1]['days'] );

				 		$(document).find('#strtday3').val( response.rtwbmal_get_emp_wrkng_hour[2]['strt_time'] ).change();
				 		$(document).find('#strtday3').attr('data-hour_id',response.rtwbmal_get_emp_wrkng_hour[2]['days'] );

				 		$(document).find('#strtday4').val( response.rtwbmal_get_emp_wrkng_hour[3]['strt_time'] ).change();
				 		$(document).find('#strtday4').attr('data-hour_id',response.rtwbmal_get_emp_wrkng_hour[3]['days'] );

				 		$(document).find('#strtday5').val( response.rtwbmal_get_emp_wrkng_hour[4]['strt_time'] ).change();
				 		$(document).find('#strtday5').attr('data-hour_id',response.rtwbmal_get_emp_wrkng_hour[4]['days'] );

				 		$(document).find('#strtday6').val( response.rtwbmal_get_emp_wrkng_hour[5]['strt_time'] ).change();
				 		$(document).find('#strtday6').attr('data-hour_id',response.rtwbmal_get_emp_wrkng_hour[5]['days'] );

				 		$(document).find('#strtday7').val( response.rtwbmal_get_emp_wrkng_hour[6]['strt_time'] ).change();
				 		$(document).find('#strtday7').attr('data-hour_id',response.rtwbmal_get_emp_wrkng_hour[6]['days'] );

				 		$(document).find('#endday1').val( response.rtwbmal_get_emp_wrkng_hour[0]['end_time'] ).change();
				 		$(document).find('#endday2').val( response.rtwbmal_get_emp_wrkng_hour[1]['end_time'] ).change();
				 		$(document).find('#endday3').val( response.rtwbmal_get_emp_wrkng_hour[2]['end_time'] ).change();
				 		$(document).find('#endday4').val( response.rtwbmal_get_emp_wrkng_hour[3]['end_time'] ).change();
				 		$(document).find('#endday5').val( response.rtwbmal_get_emp_wrkng_hour[4]['end_time'] ).change();
				 		$(document).find('#endday6').val( response.rtwbmal_get_emp_wrkng_hour[5]['end_time'] ).change();
				 		$(document).find('#endday7').val( response.rtwbmal_get_emp_wrkng_hour[6]['end_time'] ).change();

				 		$.each( response.rtwbmal_get_emp_break_hour, function() {
						  	if( this.days == 1 )
						  	{
						  		$(document).find('#rtwbmalMonday').show();
						  		
						  		if( $(document).find('.rtwchkMonday').val() == 0 )
						  		{
						  			$(document).find('.Mondaystart').val( this.strt_time ).change();
						  			$(document).find('.Mondaystart').attr( 'data-edit_id', this.id );
						  			$(document).find('.Mondayend').val( this.end_time ).change();
						  		}
						  		else{
							 		var clone = $(document).find('#rtwbmalMonday').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
						  			$(document).find('#rtwbmalMonday').parent().find('.addbreak').addClass('addnewbreak');

									clone.find('.Mondaystart').val( this.strt_time ).change();
									clone.find('.Mondaystart').attr( 'data-edit_id', this.id );
									clone.find('.Mondayend').val( this.end_time ).change();
									clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");
									clone.find('.addbreak').addClass('addnewbreak');
									clone.appendTo($(document).find('#rtwbmal_Monday').closest('div').next());
								}
						  		$(document).find('.rtwchkMonday').val(1);
							}
							if( this.days == 2 )
						  	{
						  		$(document).find('#rtwbmalTuesday').show();

						  		if( $(document).find('.rtwchkTuesday').val() == 0 )
						  		{
						  			$(document).find('.Tuesdaystart').val( this.strt_time ).change();
						  			$(document).find('.Tuesdaystart').attr( 'data-edit_id', this.id );
						  			$(document).find('.Tuesdayend').val( this.end_time ).change();
						  		}
						  		else{
							 		var clone = $(document).find('#rtwbmalTuesday').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
						  			$(document).find('#rtwbmalTuesday').parent().find('.addbreak').addClass('addnewbreak');

									clone.find('.Tuesdaystart').val( this.strt_time ).change();
									clone.find('.Tuesdaystart').attr( 'data-edit_id', this.id );
									clone.find('.Tuesdayend').val( this.end_time ).change();
									clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");
									clone.find('.addbreak').addClass('addnewbreak');
									clone.appendTo($(document).find('#rtwbmal_Tuesday').closest('div').next());
								}
						  		$(document).find('.rtwchkTuesday').val(1);
							}
							if( this.days == 3 )
						  	{
						  		$(document).find('#rtwbmalWednesday').show();

						  		if( $(document).find('.rtwchkWednesday').val() == 0 )
						  		{
						  			$(document).find('.Wednesdaystart').val( this.strt_time ).change();
						  			$(document).find('.Wednesdaystart').attr( 'data-edit_id', this.id );
						  			$(document).find('.Wednesdayend').val( this.end_time ).change();
						  		}
						  		else{
							 		var clone = $(document).find('#rtwbmalWednesday').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
						  			$(document).find('#rtwbmalWednesday').parent().find('.addbreak').addClass('addnewbreak');
						  			
									clone.find('.Wednesdaystart').val( this.strt_time ).change();
									clone.find('.Wednesdaystart').attr( 'data-edit_id', this.id );
									clone.find('.Wednesdayend').val( this.end_time ).change();
									clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");
									clone.find('.addbreak').addClass('addnewbreak');
									clone.appendTo($(document).find('#rtwbmal_Wednesday').closest('div').next());
								}
						  		$(document).find('.rtwchkWednesday').val(1);
							}
							if( this.days == 4 )
						  	{
						  		$(document).find('#rtwbmalThursday').show();

						  		if( $(document).find('.rtwchkThursday').val() == 0 )
						  		{
						  			$(document).find('.Thursdaystart').val( this.strt_time ).change();
						  			$(document).find('.Thursdaystart').attr( 'data-edit_id', this.id );
						  			$(document).find('.Thursdayend').val( this.end_time ).change();
						  		}
						  		else{
							 		var clone = $(document).find('#rtwbmalThursday').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
						  			$(document).find('#rtwbmalThursday').parent().find('.addbreak').addClass('addnewbreak');
						  			
									clone.find('.Thursdaystart').val( this.strt_time ).change();
									clone.find('.Thursdaystart').attr( 'data-edit_id', this.id );
									clone.find('.Thursdayend').val( this.end_time ).change();
									clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");
									clone.find('.addbreak').addClass('addnewbreak');
									clone.appendTo($(document).find('#rtwbmal_Thursday').closest('div').next());
								}
						  		$(document).find('.rtwchkThursday').val(1);
							}
							if( this.days == 5 )
						  	{
						  		$(document).find('#rtwbmalFriday').show();

						  		if( $(document).find('.rtwchkFriday').val() == 0 )
						  		{
						  			$(document).find('.Fridaystart').val( this.strt_time ).change();
						  			$(document).find('.Fridaystart').attr( 'data-edit_id', this.id );
						  			$(document).find('.Fridayend').val( this.end_time ).change();
						  		}
						  		else{
							 		var clone = $(document).find('#rtwbmalFriday').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
						  			$(document).find('#rtwbmalFriday').parent().find('.addbreak').addClass('addnewbreak');
						  			
									clone.find('.Fridaystart').val( this.strt_time ).change();
									clone.find('.Fridaystart').attr( 'data-edit_id', this.id );
									clone.find('.Fridayend').val( this.end_time ).change();
									clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");
									clone.find('.addbreak').addClass('addnewbreak');
									clone.appendTo($(document).find('#rtwbmal_Friday').closest('div').next());
								}
						  		$(document).find('.rtwchkFriday').val(1);
							}
							if( this.days == 6 )
						  	{
						  		$(document).find('#rtwbmalSaturday').show();

						  		if( $(document).find('.rtwchkSaturday').val() == 0 )
						  		{
						  			$(document).find('.Saturdaystart').val( this.strt_time ).change();
						  			$(document).find('.Saturdaystart').attr( 'data-edit_id', this.id );
						  			$(document).find('.Saturdayend').val( this.end_time ).change();
						  		}
						  		else{
							 		var clone = $(document).find('#rtwbmalSaturday').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
						  			$(document).find('#rtwbmalSaturday').parent().find('.addbreak').addClass('addnewbreak');
						  			
									clone.find('.Saturdaystart').val( this.strt_time ).change();
									clone.find('.Saturdaystart').attr( 'data-edit_id', this.id );
									clone.find('.Saturdayend').val( this.end_time ).change();
									clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");
									clone.find('.addbreak').addClass('addnewbreak');
									clone.appendTo($(document).find('#rtwbmal_Saturday').closest('div').next());
								}
						  		$(document).find('.rtwchkSaturday').val(1);
							}
							if( this.days == 7 )
						  	{
						  		$(document).find('#rtwbmalSunday').show();

						  		if( $(document).find('.rtwchkSunday').val() == 0 )
						  		{
						  			$(document).find('.Sundaystart').val( this.strt_time ).change();
						  			$(document).find('.Sundaystart').attr( 'data-edit_id', this.id );
						  			$(document).find('.Sundayend').val( this.end_time ).change();
						  		}
						  		else{
							 		var clone = $(document).find('#rtwbmalSunday').clone().prop( 'class', 'rtwbmal_emp_bre_select' );
						  			$(document).find('#rtwbmalSunday').parent().find('.addbreak').addClass('addnewbreak');
						  			
									clone.find('.Sundaystart').val( this.strt_time ).change();
									clone.find('.Sundaystart').attr( 'data-edit_id', this.id );
									clone.find('.Sundayend').val( this.end_time ).change();
									clone.find(".rtwbmal_emp_breaks_close").attr("class" ,"remove_row");
									clone.find('.addbreak').addClass('addnewbreak');
									clone.appendTo($(document).find('#rtwbmal_Sunday').closest('div').next());
								}
						  		$(document).find('.rtwchkSunday').val(1);
							}
				 		
						});	
	 				}
	 				else{
	 				}
	 			}
	 		});
			
		});

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

		$(document).on( 'click', '.rtwbmal_delete', function(){
			if( confirm( rtwbmal_global_params.rtwbmal_approval_sure ) ){
				var $this = $(this);
				var rtwbmal_emp_id = $(this).closest('ul').data( 'rtwbmal_emp_id' );
				
				var rtwbmal_data = {
		 			action 					: 'rtwbmal_emp_delete',
		 			rtwbmal_emp_id 			: rtwbmal_emp_id,
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
		      
		      $('#rtwbmal_emp_imgs').val(attachment.id);
		      $('#rtwbmal_emp_img').attr('src', attachment.url);
		    });

		    mediaUploader.open();
		});
		////////// upload image from media //////////

		$(document).on('click', '.rtwbmal_button_remove', function(){
			$('#rtwbmal_emp_img').attr('src', '');
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
	});

})( jQuery );