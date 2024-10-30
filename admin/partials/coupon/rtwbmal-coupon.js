(function( $ ) {
	'use strict';

	$(function() {
        $(document).find('.rtwbmal_coupon_form').hide();
        $(document).on('click', '.rtwbmal_add_new_coupon', function(){
            $(document).find('.rtwbmal_coupon_form').slideDown();
            $(document).find('.edit_coupon').val('save');
            $(document).find('.rtwbmal_coupon_code').val('');
            $(document).find('.rtwbmal_coupon_value').val('');
            $(document).find('.rtwbmal_coupon_start_date').val('');
            $(document).find('.rtwbmal_coupon_end_date').val('');
            $(document).find('.rtwbmal_use_count').val('').change();
            $(document).find('.rtwbmal_exe_category').val('').change();
            $(document).find('.rtwbmal_discount_type').val('').change();
            $(document).find('.rtwbmal_exe_employee').val('').change();
            $(document).find('.rtwbmal_exe_service').val('').change();
            $(document).find('.rtwbmal_individual').prop('checked', false);
            
        });
        $(document).on('click', '.rtwbmal_cancel', function(){
            $(document).find('.rtwbmal_coupon_form').slideUp();
        });
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
			},
        });

        $(document).on('click', '.rtwbmal_edit_coupon', function(){
            var id = $(this).closest('ul').data('rtwbmal_coupon_id');
            var coupon_code = $(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_coupon_name').val();
            var category = $.parseJSON($(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_exe_cat').val());
            var employee = $.parseJSON($(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_exe_empl').val());
            var services = $.parseJSON($(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_exe_servi').val());
            var disc_type = $(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_discount_typ').val();

            var disc_val = $(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_coupon_val').val();
            var start_date = $(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_coupon_start').val();
            var end_date = $(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_coupon_end_da').val();

            var count = $(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_use_cnt').val();
            var indiviual = $(this).parents('.rtwbmal_single_couponment').find('.rtwbmal_enable_individual').val();

            if( indiviual == 1 )
            {
                $(document).find('.rtwbmal_individual').prop('checked', true);
            }

            $(document).find('.rtwbmal_coupon_form').slideDown();
            $(document).find('.edit_coupon').val(id);
            $(document).find('.rtwbmal_coupon_code').val(coupon_code);
            $(document).find('.rtwbmal_coupon_value').val(disc_val);
            $(document).find('.rtwbmal_coupon_start_date').val(start_date);
            $(document).find('.rtwbmal_coupon_end_date').val(end_date);
            $(document).find('.rtwbmal_use_count').val(count).change();
            $(document).find('.rtwbmal_exe_category').val(category).change();
            $(document).find('.rtwbmal_discount_type').val(disc_type).change();
            $(document).find('.rtwbmal_exe_employee').val(employee).change();
            $(document).find('.rtwbmal_exe_service').val(services).change();
        });

        $(document).on('click', '.rtwbmal_coupon_delete', function(){
            var id = $(this).closest('ul').data('rtwbmal_coupon_id');
            $(this).parents('.rtwbmal_single_couponment').remove();

            var rtwbmal_data = {
                action 	    : 'rtwbmal_delete_coupon',
                coupon_id 	: id,
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
                }
            });
        })

    });

})( jQuery );