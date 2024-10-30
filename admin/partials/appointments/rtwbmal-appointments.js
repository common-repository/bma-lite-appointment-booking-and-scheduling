(function( $ ) {
	'use strict';

	$(function() {
		$(document).on('click', '.rtwbmal_add_new_appointment', function(){
			$(document).find('.rtwbmal_appoint_header_title').text('Add New Appointment');
			$(document).find('.rtwbmal_select_emp').val();
			$(document).find('.rtwbmal_select_ser').val('select').change();
			$(document).find('.rtwbmal_select_cus').val('');
			$(document).find('.rtwbmal_strt_date').val('');
			$(document).find('.rtwbmal_end_date').val('');
			$(document).find('.rtwbmal_strt_time').val('');
			$(document).find('.rtwbmal_end_time').val('');
			$(document).find('.rtwbmal_notify').val('');

			$(document).find('.rtwbmal_note').val('');
			$(document).find('.rtwbmal_no_people').val('');
			$(document).find('.rtwbmal_app_status').val('');
			$(document).find('.rtwbmal_save_or_edit').val('save');
			$(document).find('.rtwbmal_pay_method').val('');
			$(document).find('.rtwbmal_pay_status').val('');
			$(document).find('.rtwbmal_paid_amt').val('');
		});
		
		$(document).on('click', '.rtwbmal_prev', function(){
			var rtwbmal_current_val = $(document).find('.rtwbmal_current_page').val();
			if( rtwbmal_current_val > 1 )
			{
				$(document).find('.rtwbmal_current_page').val( rtwbmal_current_val - 1 );
				$(document).find('.rtwbmal_next').attr("disabled", false);
			}
			else if(rtwbmal_current_val == 1 )
			{
				$(this).attr("disabled", true);
				$(document).find('.rtwbmal_next').attr("disabled", false);
			}
		});

		$(document).on('click', '.rtwbmal_next', function(){
			var rtwbmal_max_page = $(document).find('.rtwbmal_max_page').val();
			var rtwbmal_current_val = $(document).find('.rtwbmal_current_page').val();
			if( rtwbmal_current_val < rtwbmal_max_page )
			{
				$(document).find('.rtwbmal_current_page').val( parseInt(rtwbmal_current_val) + 1 );
				$(document).find('.rtwbmal_prev').attr("disabled", false);
			}
			else if( rtwbmal_current_val == rtwbmal_max_page )
			{
				$(this).attr("disabled", true);
				$(document).find('.rtwbmal_prev').attr("disabled", false);
			}
		});
 
		$(document).find( ".rtwbmal_select" ).select2({ width : '20%' });
		var rtwbmal_holidays = jQuery(document).find('.rtwbmal_holidays').val();

		$(document).find( '.datepicker' ).datepicker({
	        dateFormat : 'yy-mm-dd',
	        onSelect 	: function( dateText, inst ){
	        	var rtwbmal_day 		= inst.selectedDay;
	        	var rtwbmal_month 	= inst.selectedMonth+1;
	        	rtwbmal_month 		= ( rtwbmal_month > 9 ) ? rtwbmal_month : '0'+rtwbmal_month;
	        	var rtwbmal_year 	= inst.selectedYear;
	        	var rtwbmal_date 	= rtwbmal_year +'-'+ rtwbmal_month +'-'+ rtwbmal_day;
			},
			beforeShow: function( input, inst){
				$(inst.dpDiv).addClass('rtwbmal_datapicker_calendar_wrapper');
			}
		});

		$(document).find( '.datepickers' ).datepicker({
	        dateFormat : 'yy-mm-dd',
	        onSelect 	: function( dateText, inst ){
	        	var rtwbmal_day 		= inst.selectedDay;
	        	var rtwbmal_month 	= inst.selectedMonth+1;
	        	rtwbmal_month 		= ( rtwbmal_month > 9 ) ? rtwbmal_month : '0'+rtwbmal_month;
	        	var rtwbmal_year 	= inst.selectedYear;
				var rtwbmal_date 	= rtwbmal_year +'-'+ rtwbmal_month +'-'+ rtwbmal_day;
				
				var rtwbmal_data = {
					action 	: 'rtwbmal_selected_date_of_appointment',
					date 	: dateText,
					emp_id  : $(document).find('.rtwbmal_select_emp').val(),
					service_id : $(document).find('.rtwbmal_select_ser').val(),
					rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce
				};
				$.ajax({
					url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
					type 		: "POST",  
					data 		: rtwbmal_data,
					dataType 	: 'json',	
					success 	: function(response) 
					{
						console.log(response);
						$(document).find('.timepicker').timepicker({
							timeFormat: 'h:mm p',
							interval: 30,
							minTime: response.start_time.toString(),
							maxTime: response.end_time.toString(),
							defaultTime: '10', //start time
							dropdown: true,
							scrollbar: true
						});
					}
				});

			},
			beforeShow: function( input, inst){
				$(inst.dpDiv).addClass('rtwbmal_datapicker_calendar_wrapper');
			},
			minDate: 1
		});

		
	    var rtwbmal_today 	= new Date();
	    var rtwbmal_date1 	= rtwbmal_today.getDate();
		var rtwbmal_month1 	= rtwbmal_today.getMonth()+1;
		rtwbmal_month1 		= ( rtwbmal_month1 > 9 ) ? rtwbmal_month1 : '0'+rtwbmal_month1;
		var rtwbmal_year1 	= rtwbmal_today.getFullYear();
		var rtwbmal_today 	= new Date();
		$(document).find( '.datepicker' ).datepicker("setDate", rtwbmal_today);
		
		$(document).on( 'click', '.rtwbmal_save', function()
		{
			var rtwbmal_select_emp = $(document).find('.rtwbmal_select_emp').val();
			var rtwbmal_select_ser = $(document).find('.rtwbmal_select_ser').val();
			var rtwbmal_select_cus = $(document).find('.rtwbmal_select_cus').val();
			var rtwbmal_strt_date = $(document).find('.rtwbmal_strt_date').val();
			var rtwbmal_end_date = $(document).find('.rtwbmal_end_date').val();
			var rtwbmal_strt_time = $(document).find('.rtwbmal_strt_time').val();
			var length = $(document).find('.rtwbmal_single_appointment').length;
			var rtwbmal_end_time = $(document).find('.rtwbmal_end_time').val();
			var rtwbmal_notify	= $(document).find('.rtwbmal_notify').val();

			var rtwbmal_note	= $(document).find('.rtwbmal_note').val();
			var rtwbmal_no_people	= $(document).find('.rtwbmal_no_people').val();
			var rtwbmal_app_status = $(document).find('.rtwbmal_app_status').val();

			var rtwbmal_action = '';
			var rtwbmal_appointment_id = $(document).find('.rtwbmal_save_or_edit').val();
			var rtwbmal_pay_method = $(document).find('.rtwbmal_pay_method').val();
			var rtwbmal_pay_status = $(document).find('.rtwbmal_pay_status').val();
			var rtwbmal_paid_amt   = $(document).find('.rtwbmal_paid_amt').val();

			if( rtwbmal_appointment_id == 'save' )
			{
				rtwbmal_action = 'rtwbmal_apntmnt_add';
			}
			else
			{
				rtwbmal_action = 'rtwbmal_apntmnt_update';
			}

			var rtwbmal_data = {
				action 					: rtwbmal_action,
				length					: length,
				rtwbmal_select_emp 		: rtwbmal_select_emp,
				rtwbmal_select_ser 		: rtwbmal_select_ser,
				rtwbmal_select_cus		: rtwbmal_select_cus,
				rtwbmal_strt_date		: rtwbmal_strt_date,
				rtwbmal_end_date 		: rtwbmal_end_date,
				rtwbmal_strt_time		: rtwbmal_strt_time,
				rtwbmal_end_time 		: rtwbmal_end_time,
				rtwbmal_no_people 		: rtwbmal_no_people,
				rtwbmal_notify			: rtwbmal_notify,
				rtwbmal_note				: rtwbmal_note,
				rtwbmal_app_status 		: rtwbmal_app_status,
				rtwbmal_pay_method 		: rtwbmal_pay_method,
				rtwbmal_pay_status 		: rtwbmal_pay_status,
				rtwbmal_paid_amt 		: rtwbmal_paid_amt,
				rtwbmal_appointment_id	: rtwbmal_appointment_id,
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

		$(document).on( 'click', '.rtwbmal_edit_apntmnt', function(){
			$(document).find('.rtwbmal_appoint_header_title').text('Edit Appointment');
			var rtwbmal_app_id = $(this).closest('ul').data( 'rtwbmal_app_id' );

			$(document).find('.rtwbmal_save_or_edit').val( rtwbmal_app_id );
			var rtwbmal_data = {
	 			action 				: 'rtwbmal_edit_appointment',
	 			rtwbmal_app_id 		: rtwbmal_app_id,
	 			rtwbmal_security_check : rtwbmal_global_params.rtwbmal_nonce	
	 		};

			$.ajax({
	 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
	 			type 		: "POST",  
	 			data 		: rtwbmal_data,
	 			dataType 	: 'json',	
	 			success 	: function(response) 
	 			{
	 				if( response.rtwbmal_status ){
	 					$(document).find('.rtwbmal_select_emp').val( response.rtwbmal_appointment['emp_id'] ).change();
						$(document).find('.rtwbmal_select_ser').val(response.rtwbmal_appointment['service_id'] ).change();
						$(document).find('.rtwbmal_select_cus').val(response.rtwbmal_cus_appointment['cust_id'] ).change();
						$(document).find('.rtwbmal_strt_date').val( response.rtwbmal_appointment['start_date'] ).change();
						$(document).find('.rtwbmal_end_date').val( response.rtwbmal_appointment['end_date'] ).change();
						$(document).find('.rtwbmal_strt_time').val( response.rtwbmal_appointment['start_time'] ).change();
						$(document).find('.rtwbmal_end_time').val( response.rtwbmal_appointment['end_time'] ).change();
						$(document).find('.rtwbmal_notify').val();
						$(document).find('.rtwbmal_note').val( response.rtwbmal_appointment['note'] ).change();
						$(document).find('.rtwbmal_no_people').val(response.rtwbmal_cus_appointment['num_of_people'] ).change();
						$(document).find('.rtwbmal_save_or_edit').val(response.rtwbmal_appointment['id'] ).change();
						$(document).find('.rtwbmal_app_status').val(response.rtwbmal_appointment['app_status']).change();
						$(document).find('.rtwbmal_pay_method').val(response.rtwbmal_payment['type']).change();
						$(document).find('.rtwbmal_pay_status').val(response.rtwbmal_payment['status']).change();
						$(document).find('.rtwbmal_paid_amt').val(response.rtwbmal_payment['paid']);
	 				}
	 				else{
	 				}
	 			}
	 		});
		});

		$(document).on( 'click', '.rtwbmal_app_delete', function(){
			if( confirm( rtwbmal_global_params.rtwbmal_approval_sure ) ){
				var $this = $(this);
				var rtwbmal_app_id = $(this).closest('ul').data( 'rtwbmal_app_id' );
				
				var rtwbmal_data = {
		 			action 					: 'rtwbmal_app_delete',
		 			rtwbmal_app_id 			: rtwbmal_app_id,
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

		$(document).on('change', '.rtwbmal_select_ser', function(){
			var rtwbmal_ser_id = $(this).val();
				
			var rtwbmal_data = {
	 			action 					: 'rtwbmal_get_employ',
	 			rtwbmal_ser_id 			: rtwbmal_ser_id,
	 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
	 		};

	 		$.ajax({
	 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
	 			type 		: "POST",  
	 			data 		: rtwbmal_data,
	 			dataType 	: 'json',	
	 			success 	: function(response) 
	 			{
	 				$(document).find('.rtwbmal_appoint_employees').html(response);
	 				$(document).find( ".rtwbmal_select" ).select2({ width : '20%' });
	 			}
	 		});
		});
		 
		///////// Appointment filters ////////
		$(document).on( 'click', '.rtwbmal_apply', function(){
			var rtwbmal_frm_date 		= $(document).find('.rtwbmal_from_date').val();
			var rtwbmal_to_date 			= $(document).find('.rtwbmal_to_date').val();
			var rtwbmal_serice_filter 	= $(document).find('.rtwbmal_service_filter').val();
			var rtwbmal_emp_filter 		= $(document).find('.rtwbmal_emp_filter').val();
			var rtwbmal_cus_filter 		= $(document).find('.rtwbmal_cus_filter').val();
			var rtwbmal_status_filter 	= $(document).find('.rtwbmal_status_filter').val();
			
			var rtwbmal_data = {
				action 					: 'rtwbmal_apply_app_filter',
				rtwbmal_frm_date 		: rtwbmal_frm_date,
				rtwbmal_to_date 			: rtwbmal_to_date,
				rtwbmal_serice_filter 	: rtwbmal_serice_filter,
				rtwbmal_emp_filter 		: rtwbmal_emp_filter,
				rtwbmal_cus_filter 		: rtwbmal_cus_filter,
				rtwbmal_status_filter 	: rtwbmal_status_filter,
				rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
			};

			$.ajax({
				url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
				type 		: "POST",  
				data 		: rtwbmal_data,
				dataType 	: 'json',	
				success 	: function(response) 
				{
					$(document).find('.rtwbmal_appointments_list').html(response);
				}
			});
		});

		$(document).on('click', '.rtwbmal_next_app', function(){
			var offset = $(this).attr('data-offset');
			
			var rtwbmal_data = {
				action 					: 'rtwbmal_get_apps',
				offset 					: offset,
				rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
			};

			$.ajax({
				url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
				type 		: "POST",  
				data 		: rtwbmal_data,
				dataType 	: 'json',	
				success 	: function(response) 
				{
					$(document).find('.rtwbmal_appointments_list').html(response);
				}
			});
		});

	});

})( jQuery );
