(function( $ ) {
	'use strict';

	$(function() {

		function rtwbmal_get_date(){
			var rtwbmal_today 	= new Date();
			var rtwbmal_date 	= rtwbmal_today.getDate();
			var rtwbmal_month 	= rtwbmal_today.getMonth()+1; 
			var rtwbmal_year 	= rtwbmal_today.getFullYear();
			
			if( rtwbmal_date < 10 ){
			    rtwbmal_date = '0'+rtwbmal_date;
			} 

			if( rtwbmal_month < 10 ){
			    rtwbmal_month = '0'+rtwbmal_month;
			}

			rtwbmal_today = rtwbmal_year+'-'+rtwbmal_month+'-'+rtwbmal_date;
			return rtwbmal_today;
		}

		var event_array = [];

		var rtwbmal_data = {
 			action 					: 'rtwbmal_get_events',
 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
 		};

		$.ajax({
 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
 			type 		: "POST",
 			data 		: rtwbmal_data,
 			dataType 	: 'json',
 			async 		: false,
 			success 	: function(response) 
 			{
 				if( response ){
 					event_array = response;
 				}
 			}
		 });
		 
	    var calendarEl = $(document).find( '#rtwbmal_calendar' ).get(0);
	    var rtwbmal_today_date = rtwbmal_get_date();
	    var ii = 0;
	    var calendar = new FullCalendar.Calendar(calendarEl, {

	      	plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
	      	header: {
		        left: 'prev,next today',
		        center: 'title',
		        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
	      	},
	      	defaultDate: rtwbmal_today_date,
	      	editable: false,
	      	navLinks: true, // can click day/week names to navigate views
	      	eventLimit: false, // allow "more" link when too many events
	      	selectable: true,
			selectHelper: true,
			eventDurationEditable: false,
			disableDragging: true,
			dayClick: function( date, jsEvent, view) {
			
			
			},
			select: function( start) {
				if ( start.startStr >= rtwbmal_today_date ) {
					$(document).find('.rtwbmal_open_pop').trigger( "click" );

					$(document).find('.rtwbmal_strt_date').val( start.startStr ).change();
				} else {
					// Else part is for past dates
				}
			},
	      	eventRender: function(info) {
			
				if( $(document).find('.fc-list-item-title') ){
					info.el.querySelector('.fc-list-item-title, .fc-title').innerHTML = " " +info.event.title + " " + info.event._def.extendedProps.description ;
				}else{
					info.el.querySelector('.fc-title').innerHTML = " " +info.event.title + " " + info.event._def.extendedProps.description ;
				}
				
			},
		    eventDragStart: function( info ){

		    },
		    eventDrop: function( eventDropInfo ){
		    	console.log(eventDropInfo);

		    	var rtwbmal_event_id = eventDropInfo.event._def.publicId;
		    	var rtwbmal_date = eventDropInfo.delta.days;
		    	var rtwbmal_month = eventDropInfo.delta.months;
		    	var rtwbmal_year = eventDropInfo.delta.years;
		    	var rtwbmal_ful_date = eventDropInfo.event._instance.range.start;

		    	var rtwbmal_data = {
		 			action 					: 'rtwbmal_on_eventdrop',
		 			rtwbmal_date 			: rtwbmal_date,
		 			rtwbmal_month 			: rtwbmal_month,
		 			rtwbmal_year 			: rtwbmal_year,
		 			rtwbmal_id				: rtwbmal_event_id,
		 			rtwbmal_ful_date 		: rtwbmal_ful_date,
		 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce
		 		};

		    	$.ajax({
		 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
		 			type 		: "POST",
		 			data 		: rtwbmal_data,
		 			dataType 	: 'json',
		 			async 		: false,
		 			success 	: function(response) 
		 			{

		 			}
		 		});
		    },
	      	eventClick: function(arg) {
	      		var rtwbmal_event_id = arg.event._def.publicId;
	      		
	      		var rtwbmal_data = {
		 			action 					: 'rtwbmal_edit_appointment',
		 			rtwbmal_app_id			: rtwbmal_event_id,
		 			rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce
		 		};

	      		$.ajax({
		 			url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
		 			type 		: "POST",
		 			data 		: rtwbmal_data,
		 			dataType 	: 'json',
		 			async 		: false,
		 			success 	: function(response) 
		 			{

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
						$(document).find('.rtwbmal_save_or_edit').val(response.rtwbmal_appointment['id'] );
						$(document).find('.rtwbmal_app_status').val(response.rtwbmal_appointment['app_status']).change();
						$(document).find('.rtwbmal_pay_method').val(response.rtwbmal_payment['type']).change();
						$(document).find('.rtwbmal_pay_status').val(response.rtwbmal_payment['status']).change();
						$(document).find('.rtwbmal_paid_amt').val(response.rtwbmal_payment['paid']);
		 			}
		 		});
			},
			eventResizeStart: function(info){

			},
			eventResizeStop: function( infos ){
				
			},
			eventAfterRender: function (calEvent, $calEventList, calendar) {

			},
			minDate: 1,
			
	      	googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
	      	
	      	loading: function(bool) {
	      		if( bool ){
	        		$(document).find( '#loading' ).show();
	        	}
	        	else{
	        		$(document).find( '#loading' ).hide();
	        	}
			}
	    });

	    calendar.render();

	    var i;
		for ( i = 0; i < event_array.length; ++i ) {

			   	calendar.addEvent({ id: event_array[i]['id'], eventcolor: event_array[i]['color'], description: event_array[i]['description'], start: event_array[i]['start'], end: event_array[i]['end'], textColor: 'white', backgroundColor:  event_array[i]['color'], tooltip : event_array[i]['service_name'] + ' '+rtwbmal_global_params.rtwbmal_appointment}
			   );

		}

		$(document).on( 'click', '.rtwbmal_save', function()
		{
			var rtwbmal_select_emp = $(document).find('.rtwbmal_select_emp').val();
			var rtwbmal_select_ser = $(document).find('.rtwbmal_select_ser').val();
			var rtwbmal_select_cus = $(document).find('.rtwbmal_select_cus').val();
			var rtwbmal_strt_date = $(document).find('.rtwbmal_strt_date').val();
			var rtwbmal_end_date = $(document).find('.rtwbmal_end_date').val();
			var rtwbmal_strt_time = $(document).find('.rtwbmal_strt_time').val();
			var rtwbmal_end_time = $(document).find('.rtwbmal_end_time').val();
			var rtwbmal_notify	= $(document).find('.rtwbmal_notify').val();

			var rtwbmal_note	= $(document).find('.rtwbmal_note').val();
			var rtwbmal_no_people	= $(document).find('.rtwbmal_no_people').val();
			
			var rtwbmal_action = '';
			var rtwbmal_appointment_id = $(document).find('.rtwbmal_save_or_edit').val();
			var rtwbmal_pay_method = $(document).find('.rtwbmal_pay_method').val();
			var rtwbmal_pay_status = $(document).find('.rtwbmal_pay_status').val();
			var rtwbmal_paid_amt   = $(document).find('.rtwbmal_paid_amt').val();
			var rtwbmal_app_status = $(document).find('.rtwbmal_app_status').val();
			var length = $(document).find('.rtwbma_number_appointments').val();
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
				length 				: length,
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
		var rtwbmal_today 	= new Date();
	    var rtwbmal_date1 	= rtwbmal_today.getDate();
		var rtwbmal_month1 	= rtwbmal_today.getMonth()+1;
		rtwbmal_month1 		= ( rtwbmal_month1 > 9 ) ? rtwbmal_month1 : '0'+rtwbmal_month1;
		var rtwbmal_year1 	= rtwbmal_today.getFullYear();
		var rtwbmal_today 	= new Date();
		$(document).find( '.datepicker' ).datepicker("setDate", rtwbmal_today);

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
		$(document).find('.timepicker').timepicker({
		    timeFormat: 'h:mm p',
		    interval: 30,
		    minTime: '24',
		    defaultTime: '10', //start time
		    dropdown: true,
		    scrollbar: true
		});
	});

})( jQuery );