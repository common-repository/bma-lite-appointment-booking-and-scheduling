(function( $ ) {
	'use strict';

	$(function() {
        $(document).ready(function(){
            var rtwbmal_form_is_valid;
            $(document).on('click', '.rtwbmal_next_btn', function(){
                var positions = '';
                var i = 0;
                var rtwbmal_current_this = $(this);
                var content = $(this).data('content');
                if(content == 'service')
                {
                    if($(document).find('.rtwbmal_service_tbl_row').hasClass('rtwbmal_parent_row'))
                    {
                        $('.rtwbmal_tab_content').each(function(){
                            if ($(this).attr('data-tab-content') == 'specialist') {
                                $(this).addClass('show');
                            }else{
                                $(this).removeClass('show');
                            }
                        });
                        $(document).find('.rtwbmal_step_by_step-item').each(function(){
                            if($(this).hasClass('active') && i == 0)
                            {
                                i++;
                                $(this).removeClass('active');
                                $(this).next().addClass('active');
                                positions = $(this).next().position();
                            }
                        });
                    }
                    else{
                        $(this).notify( rtwbmal_global_params.select_service,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                }
                else if(content == 'specialist')
                {
                    $(document).find('.rtwbmal_booking_date').show();
                    if($(document).find('.rtwbmal_emp_id').is(':checked'))
                    {
                        $('.rtwbmal_tab_content').each(function(){
                            if ($(this).attr('data-tab-content') == 'date-time') {
                                $(this).addClass('show');
                            }else{
                                $(this).removeClass('show');
                            }
                        });
                        $(document).find('.rtwbmal_step_by_step-item').each(function(){
                            if($(this).hasClass('active') && i == 0)
                            {
                                i++;
                                $(this).removeClass('active');
                                $(this).next().addClass('active');
                                positions = $(this).next().position();
                            }
                        });
                    }
                    else{
                        $(this).notify( rtwbmal_global_params.select_specialist,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                }
                else if(content == 'date-time')
                {
                    if( $(document).find('.rtwbmal_time_app').hasClass('rtwbmal_active') && $(document).find('.rtwbmal_number_of_people').val() != '' )
                    {
                        $('.rtwbmal_tab_content').each(function(){
                            if ($(this).attr('data-tab-content') == 'customer') {
                                $(this).addClass('show');
                            }else{
                                $(this).removeClass('show');
                            }
                        });
                        $(document).find('.rtwbmal_step_by_step-item').each(function(){
                            if($(this).hasClass('active') && i == 0)
                            {
                                i++;
                                $(this).removeClass('active');
                                $(this).next().addClass('active');
                                positions = $(this).next().position();
                            }
                        });
                    }
                    else if( !$(document).find('.rtwbmal_time_app').hasClass('rtwbmal_active'))
                    {
                        $(this).notify( rtwbmal_global_params.select_datetime,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                    else if( $(document).find('.rtwbmal_number_of_people').val() == ''){
                        $(this).notify( rtwbmal_global_params.rtwbmal_cus_no,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                }
                else if(content == 'customer')
                {
                    if( $(document).find( "#rtwbmal_customer_error .customer_first_name" ).val() == '' )
                    {
                        $(this).notify( rtwbmal_global_params.rtwbmal_first_name,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                    else if( $(document).find( "#rtwbmal_customer_error .customer_last_name" ).val() == '' )
                    {
                        $(this).notify( rtwbmal_global_params.rtwbmal_last_name,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                    else if( $(document).find( "#rtwbmal_customer_error .customer_email" ).val() == '' )
                    {
                        $(this).notify( rtwbmal_global_params.rtwbmal_email,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                    else if( $(document).find( "#rtwbmal_customer_error .customer_mob_no" ).val() == '' )
                    {
                        $(this).notify( rtwbmal_global_params.rtwbmal_mob,
                            { position:"left", className: 'rtwbmal_notify' }
                        );
                    }
                    else{
                        rtwbmal_form_is_valid = true;
                        $('.rtwbmal_tab_content').each(function(){
                            if ($(this).attr('data-tab-content') == 'payment') {
                                $(this).addClass('show');
    
    
                            }else{
                                $(this).removeClass('show');
                            }
                        });
                        $(document).find('.rtwbmal_step_by_step-item').each(function(){
                            if($(this).hasClass('active') && i == 0)
                            {
                                i++;
                                $(this).removeClass('active');
                                $(this).next().addClass('active');
                                positions = $(this).next().position();
                            }
                        });
                    }
                }
                $('.rtwbmal_step_by_step_move').css("left",  positions.left);
                
                $(document).find('.rtwbmal_step_by_step-item').each(function(){
                    if($(this).hasClass('active'))
                    {
                        $(this).addClass('rtwbmal_previous');
                    }
                });
    
            });
               
            $(document).on('click', '.rtwbmal_prev_btn', function(){
                var position = '';
                var i = 0;
    
                var content = $(this).data('content');
            
                if(content == 'specialist')
                {
                    $(document).find('.rtwbmal_booking_date').hide();
                    
                    $('.rtwbmal_tab_content').each(function(){
                        if ($(this).attr('data-tab-content') == 'service') {
                            $(this).addClass('show');
                        }else{
                            $(this).removeClass('show');
                        }
                    });
                    $(document).find('.rtwbmal_step_by_step-item').each(function(){
                        if($(this).hasClass('active') && i == 0)
                        {
                            i++;
                            $(this).removeClass('active');
                            $(this).prev().addClass('active');
                            position = $(this).prev().position();
                        }
                    });
                }
                else if(content == 'date-time')
                {
                    $('.rtwbmal_tab_content').each(function(){
                        if ($(this).attr('data-tab-content') == 'specialist') {
                            $(this).addClass('show');
                        }else{
                            $(this).removeClass('show');
                        }
                    });
                    $(document).find('.rtwbmal_step_by_step-item').each(function(){
                        if($(this).hasClass('active') && i == 0)
                        {
                            i++;
                            $(this).removeClass('active');
                            $(this).prev().addClass('active');
                            position = $(this).prev().position();
                        }
                    });
                }
                else if(content == 'customer')
                {
                    rtwbmal_form_is_valid = true;
                    $('.rtwbmal_tab_content').each(function(){
                        if ($(this).attr('data-tab-content') == 'date-time') {
                            $(this).addClass('show');
                        }else{
                            $(this).removeClass('show');
                        }
                    });
                    $(document).find('.rtwbmal_step_by_step-item').each(function(){
                        if($(this).hasClass('active') && i == 0)
                        {
                            i++;
                            $(this).removeClass('active');
                            $(this).prev().addClass('active');
                            position = $(this).prev().position();
                        }
                    });
                }
                else if(content == 'payment')
                {
                    rtwbmal_form_is_valid = true;
                    $('.rtwbmal_tab_content').each(function(){
                        if ($(this).attr('data-tab-content') == 'customer') {
                            $(this).addClass('show');
    
    
                        }else{
                            $(this).removeClass('show');
                        }
                    });
                    $(document).find('.rtwbmal_step_by_step-item').each(function(){
                        if($(this).hasClass('active') && i == 0)
                        {
                            i++;
                            $(this).removeClass('active');
                            $(this).prev().addClass('active');
                            position = $(this).prev().position();
                        }
                    });
                }
                $('.rtwbmal_step_by_step_move').css("left",  position.left);
    
            });

            $('.rtwbmal_step_by_step-nav').on('click', '.rtwbmal_step_by_step-item', function()
            {
                var content = '';
                var attrs = $(this).attr('data-attr');
    
                if( !$(this).hasClass('rtwbmal_previous') )
                {
                    $(document).find('.rtwbmal_step_by_step-item').each(function(){
                        if($(this).hasClass('active'))
                        {
                            content = $(this).attr('data-attr');
                            $(this).addClass('rtwbmal_previous');
                        }
                    });
                    var position = '';
                    var i = 0;
                    
                    if(content == 'service')
                    {
                        if($(document).find('.rtwbmal_service_tbl_row').hasClass('rtwbmal_parent_row'))
                        {
                            $('.rtwbmal_tab_content').each(function(){
                                if ($(this).attr('data-tab-content') == 'specialist') {
                                    $(this).addClass('show');
                                }else{
                                    $(this).removeClass('show');
                                }
                            });
                            $(document).find('.rtwbmal_step_by_step-item').each(function(){
                                if($(this).hasClass('active') && i == 0)
                                {
                                    i++;
                                    $(this).removeClass('active');
                                    $(this).next().addClass('active');
                                    position = $(this).next().position();
                                }
                            });
                        }
                        else{
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.select_service,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                    }
                    else if(content == 'specialist')
                    {
                        $(document).find('.rtwbmal_booking_date').show();
                        if($(document).find('.rtwbmal_emp_id').is(':checked'))
                        {
                            $('.rtwbmal_tab_content').each(function(){
                                if ($(this).attr('data-tab-content') == 'date-time') {
                                    $(this).addClass('show');
                                }else{
                                    $(this).removeClass('show');
                                }
                            });
                            $(document).find('.rtwbmal_step_by_step-item').each(function(){
                                if($(this).hasClass('active') && i == 0)
                                {
                                    i++;
                                    $(this).removeClass('active');
                                    $(this).next().addClass('active');
                                    position = $(this).next().position();
                                }
                            });
                        }
                        else{
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.select_specialist,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                    }
                    else if(content == 'date-time')
                    {
                        if($(document).find('.rtwbmal_time_app').hasClass('rtwbmal_active') && $(document).find('.rtwbmal_number_of_people').val() != '' )
                        {
                            $('.rtwbmal_tab_content').each(function(){
                                if ($(this).attr('data-tab-content') == 'customer') {
                                    $(this).addClass('show');
                                }else{
                                    $(this).removeClass('show');
                                }
                            });
                            $(document).find('.rtwbmal_step_by_step-item').each(function(){
                                if($(this).hasClass('active') && i == 0)
                                {
                                    i++;
                                    $(this).removeClass('active');
                                    $(this).next().addClass('active');
                                    position = $(this).next().position();
                                }
                            });
                        }
                        else if( !$(document).find('.rtwbmal_time_app').hasClass('rtwbmal_active'))
                        {
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.select_datetime,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                        else if( $(document).find('.rtwbmal_number_of_people').val() == ''){
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.rtwbmal_cus_no,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                    }
                    else if(content == 'customer')
                    {
                        if( $(document).find( "#rtwbmal_customer_error .customer_first_name" ).val() == '' )
                        {
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.rtwbmal_first_name,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                        else if( $(document).find( "#rtwbmal_customer_error .customer_last_name" ).val() == '' )
                        {
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.rtwbmal_last_name,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                        else if( $(document).find( "#rtwbmal_customer_error .customer_email" ).val() == '' )
                        {
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.rtwbmal_email,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                        else if( $(document).find( "#rtwbmal_customer_error .customer_mob_no" ).val() == '' )
                        {
                            $('.rtwbmal_next_btn').notify( rtwbmal_global_params.rtwbmal_mob,
                                { position:"left", className: 'rtwbmal_notify' }
                            );
                        }
                        else{
                            rtwbmal_form_is_valid = true;
                            $('.rtwbmal_tab_content').each(function(){
                                if ($(this).attr('data-tab-content') == 'payment') {
                                    $(this).addClass('show');
    
    
                                }else{
                                    $(this).removeClass('show');
                                }
                            });
                            $(document).find('.rtwbmal_step_by_step-item').each(function(){
                                if($(this).hasClass('active') && i == 0)
                                {
                                    i++;
                                    $(this).removeClass('active');
                                    $(this).next().addClass('active');
                                    position = $(this).next().position();
                                }
                            });
                        }
                    }
                    $('.rtwbmal_step_by_step_move').css("left",  position.left);
                }
                else{
                    $('.rtwbmal_step_by_step-item').removeClass('active');
                    $(this).addClass('active');
                    var position = $(this).position();
                    $(this).addClass('rtwbmal_previous');
                    $('.rtwbmal_step_by_step_move').css("left",  position.left);
                    var attr = $(this).attr('data-attr');
    
                    $('.rtwbmal_tab_content').each(function(){
                        if ($(this).attr('data-tab-content') == attr) {
                            $(this).addClass('show');
                        }else{
                            $(this).removeClass('show');
                        }
                    });
                }
            });
            
            
            $(document).on('click', '#rtwbmal_book_app', function(){
                var rtwbmal_user_id = $(document).find('.rtwbmal_customer_id').val();
                var rtwbmal_service = $(document).find('.rtwbmal_selected_service').val();
                var rtwbmal_ser_duration = $(document).find('.rtwbmal_service_duration').val();
                var rtwbmal_start_date = $(document).find('.rtwbmal_start_date').val();
                var rtwbmal_number_people = $(document).find('.rtwbmal_number_of_people').val();
                var rtwbmal_selected_employee = $(document).find('.rtwbmal_selected_employee').val();
                var rtwbmal_selected_date = $(document).find('.rtwbmal_selected_date').val();
                var rtwbmal_start_time = $(document).find('.rtwbmal_start_time').val();
                var rtwbmal_selected_pay_method = $(document).find('.rtwbmal_selected_pay_method').val();
                
                var rtwbmal_cus_first_name = $(document).find('.customer_first_name').val();
                var rtwbmal_cus_last_name = $(document).find('.customer_last_name').val();
                var rtwbmal_customer_email = $(document).find('.customer_email').val();
                var rtwbmal_customer_mob_no = $(document).find('.customer_mob_no').val();
                var rtwbmal_customer_message = $(document).find('.customer_message').val();
                var rtwbmal_length = $(document).find('.rtwbmal_appointment_count').val();

                var rtwbmal_paymethod = $("input[name='rtwbmal_payment']:checked").val();
                
                var rtwbmal_appointment_id = 0;
                if( rtwbmal_paymethod == 'local' )
                {
                    if( rtwbmal_service != '' && rtwbmal_start_date != '' && rtwbmal_number_people != '' && rtwbmal_selected_employee != '' && rtwbmal_selected_date != '' && rtwbmal_start_time != '' && rtwbmal_cus_first_name != '' && rtwbmal_cus_last_name != '' && rtwbmal_customer_email != '' && rtwbmal_customer_mob_no != '' && rtwbmal_paymethod != '' )
                    {
                        if($(document).find('.rtwbmal_payment_method').is(':checked'))
                        {
                            var rtwbmal_data = {
                                action 					: 'rtwbmal_add_appointment',
                                rtwbmal_user_id 		: rtwbmal_user_id,
                                length                  : rtwbmal_length,
                                rtwbmal_service 		: rtwbmal_service,
                                duration 				: rtwbmal_ser_duration,
                                start_date 				: rtwbmal_start_date,
                                start_time 				: rtwbmal_start_time,
                                number_of_people 		: rtwbmal_number_people,
                                emp_id 					: rtwbmal_selected_employee,
                                pay_method 				: rtwbmal_paymethod,
                                cus_first_name 			: rtwbmal_cus_first_name,
                                cus_last_name 			: rtwbmal_cus_last_name,
                                customer_email 			: rtwbmal_customer_email,
                                customer_mob_no 		: rtwbmal_customer_mob_no,
                                customer_msg			: rtwbmal_customer_message,
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
                        else{
                        }
                    }
                    else{
                        $.notify( rtwbmal_global_params.rtwbmal_validations,
                            { position:"right middle" }
                        );
                    }
                }
                else{
                    $(this).notify( rtwbmal_global_params.rtwbmal_pay_metd,
                        { position:"top center", className: 'rtwbmal_notify_top' }
                    );
                }
            });
            

            
            $(document).on( 'click', '.rtwbmal_button', function(){
                var position = '';
                $(document).find('.rtwbmal_service_div').find('.rtwbmal_service_tbl_row').each(function(){
                    if($(this).hasClass('rtwbmal_parent_row'))
                    {
                        $(this).removeClass('rtwbmal_parent_row');
                    }
                });
        
                $(this).parent().parent().addClass('rtwbmal_parent_row');
                            
                $(document).find('.rtwbmal_step_by_step-item').each(function(){
                    if($(this).hasClass('active'))
                    {
                        position = $(this).position();
                    }
                });

                var service_id = $(this).data('service_id');
                $(document).find('.rtwbmal_selected_service').val(service_id);

                var rtwbmal_data = {
                    action 					: 'rtwbmal_book_service',
                    service_id 				: service_id,
                    rtwbmal_security_check	: rtwbmal_global_params.rtwbmal_nonce	
                };

                $.ajax({
                    url 		: rtwbmal_global_params.rtwbmal_ajaxurl, 
                    type 		: "POST",  
                    data 		: rtwbmal_data,
                    dataType 	: 'json',	
                    success 	: function(response) 
                    {
                        $(document).find('.rtwbmal_employee_name').html(response);
                    }
                });
            });

            $(document).on('click', '.rtwbmal_emp_id', function(){
                var emp_id = $(this).val();
                $(document).find('.rtwbmal_employee_div').find('.rtwbmal_service_tbl_row').each(function(){
                    if($(this).hasClass('rtwbmal_parent_row'))
                    {
                        $(this).removeClass('rtwbmal_parent_row');
                    }
                });

                $(this).parent().parent().parent().addClass('rtwbmal_parent_row');

                $(document).find('.rtwbmal_selected_employee').val(emp_id);
            });
		
        });
    });
})( jQuery );