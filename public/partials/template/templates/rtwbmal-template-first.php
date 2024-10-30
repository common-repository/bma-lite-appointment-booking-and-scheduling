<div class="rtwbmal_wrap rtwbmal_step_by_step">
    <div class="rtwbmal_step_by_step-nav">
        <ul>
            <li data-attr="service" class="active rtwbmal_step_by_step-item rtwbmal_previous"><?php esc_html_e( 'Services', 'rtwbma-book-my-appointment' ); ?></li>
            <li data-attr="specialist" class="rtwbmal_step_by_step-item"><?php esc_html_e( 'Specialist', 'rtwbma-book-my-appointment' ); ?></li>
            <li data-attr="date-time" class="rtwbmal_step_by_step-item"><?php esc_html_e( 'Date &amp; Time', 'rtwbma-book-my-appointment' ); ?></li>
            <li data-attr="customer" class="rtwbmal_step_by_step-item"><?php esc_html_e( 'Customer', 'rtwbma-book-my-appointment' ); ?></li>
            <li data-attr="payment" class="rtwbmal_step_by_step-item"><?php esc_html_e( 'Payment', 'rtwbma-book-my-appointment' ); ?></li>
        </ul>
        <div class="rtwbmal_step_by_step_move"></div>
    </div>
    <div class="rtwbmal_services rtwbmal_tab_content show" data-tab-content="service">
        <div class="rtwbmal_panel_header"><?php esc_html_e( 'Select a Service', 'rtwbma-book-my-appointment' ); ?></div>
        <div class="rtwbmal_service_name">
                <div class="rtwbmal_service_tbl rtwbmal_service_div">
                <?php 
                if( isset( $rtwbmal_all_services ) && is_array($rtwbmal_all_services) && !empty($rtwbmal_all_services) )
                {
                    foreach ($rtwbmal_all_services as $service_name => $service) { 

                        $rtwbmal_imgage_url = wp_get_attachment_url( $service['attachment_id'] );
                        ?><div class="rtwbmal_service_tbl_row">
                            <input type="hidden" class="rtwbmal_<?php echo esc_attr($service['id']); ?>" value="<?php echo esc_attr($service['duration']); ?>" name="" data-min="<?php echo esc_attr($service['min_capacity']); ?>">
                            <input type="hidden" class="rtwbmaa_<?php echo esc_attr($service['id']); ?>" value="<?php echo esc_attr($service['max_capacity']); ?>" name="">
                            <div class="rtwbmal_service_tbl_title">
                                <div class="rtwbmal_placeholder_image"><img src="<?php echo esc_url( $rtwbmal_imgage_url ); ?> " height = "100% " width="100%" /></div>   
                                <span class="rtwbmal_ser_title"><?php esc_html_e( $service['title'], 'rtwbma-book-my-appointment' ); ?>
                                </span>
                            </div>
                            <div class="rtwbmal_service_tbl_book_now">
                                <span class="rtwbmal_ser_price"><?php echo esc_html( $rtwbmal_currencies[isset( $rtwbmal_payment_option['rtwbmal_currency_format']) ? $rtwbmal_payment_option['rtwbmal_currency_format'] : 'USD']['symbol'] ) ; esc_html_e( $service['price'], 'rtwbma-book-my-appointment' ); ?></span>
                                <a href="javascript:;" data-service_id="<?php echo esc_attr($service['id']); ?>" class="rtwbmal_button"><?php esc_html_e( 'Book Now', 'rtwbma-book-my-appointment' ); ?>
                            </a></div>
                        </div>
                    <?php }
            } ?></div>
        </div>
        <div class="rtwbmal_next">
            <button type="button" data-content="service" class="rtwbmal_next_btn" >
            <?php esc_html_e('Next', 'rtwbma-book-my-appointment'); ?> <i class="fas fa-long-arrow-alt-right"></i>
                <span class="rtwbmal_spinner_loader"><i class="fas fa-spinner fa-pulse"></i></span>
            </button>
        </div>
    </div>
    <div class="rtwbmal_employee_name rtwbmal_tab_content" data-tab-content="specialist">
        
        <div class="rtwbmal_panel_header"><?php esc_html_e( 'Select Specialist', 'rtwbma-book-my-appointment' ); ?></div>
    </div>
    <div class="rtwbmal_booking_date rtwbmal_tab_content" data-tab-content="date-time">
        <div class="rtwbmal_panel_header"><?php esc_html_e( 'Select Date & Time for Appointment', 'rtwbma-book-my-appointment' ); ?></div>
        <div class="rtwbmal_service_name">
            <div class="rtwbmal_service_tbl rtwbmal_date_div">
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Select Date', 'rtwbma-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <input type="text" class="datepicker rtwbmal_selected_date" name="">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Enter Number of People', 'rtwbma-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <input type="number" class="rtwbmal_number_of_people" name="">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row rtwbmal_time_wrapper">
                    <div class="rtwbmal_service_title"><span class="rtwbmal_ser_title rtwbmal_time_tab"><?php esc_html_e( 'Select Time', 'rtwbma-book-my-appointment' ); ?></span>
                
                        <div class="rtwbmal_times_sec"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rtwbmal_next">
            <input type="button" class="rtwbmal_prev_btn" data-content="date-time" value="<?php esc_attr_e('Prev', 'rtwbma-book-my-appointment'); ?>" name="rtwbmal_submit">
            <input type="button" class="rtwbmal_next_btn" data-content="date-time" value="<?php esc_attr_e('Next', 'rtwbma-book-my-appointment'); ?>" name="rtwbmal_submit">
        </div>
    </div>
    <div class="rtwbmal_customer_detail  rtwbmal_tab_content" data-tab-content="customer">
        <form id="rtwbmal_customer_error">
            <div class="rtwbmal_panel_header"><?php esc_html_e( 'Customer Detail', 'rtwbma-book-my-appointment' ); ?></div>
            <div class="rtwbmal_service_name">
                <div class="rtwbmal_service_tbl rtwbmal_customer_div">
                    <div class="rtwbmal_service_tbl_row">
                        <div class="rtwbmal_cust_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'First name', 'rtwbma-book-my-appointment' ); ?></span>
                        </div>
                        <div class="rtwbmal_cust_tbl_input_field">
                            <input type="text" class="customer_first_name" name="customer_first_name">
                        </div>
                    </div>
                    <div class="rtwbmal_service_tbl_row">
                        <div class="rtwbmal_cust_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Last name', 'rtwbma-book-my-appointment' ); ?></span>
                        </div>
                        <div class="rtwbmal_cust_tbl_input_field">
                            <input type="text" class="customer_last_name" name="customer_last_name">
                        </div>
                    </div>
                    <div class="rtwbmal_service_tbl_row">
                        <div class="rtwbmal_cust_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Email', 'rtwbma-book-my-appointment' ); ?></span>
                        </div>
                        <div class="rtwbmal_cust_tbl_input_field">
                            <input type="text" class="customer_email" name="customer_email">
                        </div>
                    </div>
                    <div class="rtwbmal_service_tbl_row">
                        <div class="rtwbmal_cust_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Mobile No', 'rtwbma-book-my-appointment' ); ?></span>
                        </div>
                        <div class="rtwbmal_cust_tbl_input_field">
                            <input type="text" class="customer_mob_no" name="customer_mob_no">
                        </div>
                    </div>
                    <div class="rtwbmal_service_tbl_row">
                        <div class="rtwbmal_cust_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Message', 'rtwbma-book-my-appointment' ); ?></span>
                        </div>
                        <div class="rtwbmal_cust_tbl_input_field">
                            <input type="textarea" class="customer_message" name="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="rtwbmal_next">
                <input type="button" class="rtwbmal_prev_btn" data-content="customer" value="<?php esc_attr_e('Prev', 'rtwbma-book-my-appointment'); ?>" name="rtwbmal_submit">
                <input type="button" class="rtwbmal_next_btn" data-content="customer" value="<?php esc_attr_e('Next', 'rtwbma-book-my-appointment'); ?>" name="rtwbmal_submit">
            </div>
        </form>
    </div>
    <div class="rtwbmal_payment_method rtwbmal_tab_content" data-tab-content="payment">
        <div class="rtwbmal_panel_header"><?php esc_html_e( 'Select Payment Method', 'rtwbma-book-my-appointment' ); ?></div>
        <div class="rtwbmal_service_name">
            <div class="rtwbmal_service_tbl rtwbmal_payment_div">
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Pay Locally', 'rtwbma-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <span class="rtwbmal_custom_radio">
                            <input type="radio" name="rtwbmal_payment" class="rtwbmal_locally_pay rtwbmal_payment_method" value="local"/>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="rtwbmal_next">
                <input type="button" class="rtwbmal_prev_btn" data-content="payment" value="<?php esc_attr_e('Prev', 'rtwbma-book-my-appointment'); ?>" name="rtwbmal_submit">
            </div>
        <div class="rtwbmal_final_submit">
            <input type="button" id="rtwbmal_book_app" value="<?php esc_attr_e('Confirm Booking', 'rtwbma-book-my-appointment'); ?>" name="rtwbmal_submit">
        </div>
    </div>

    <div class="rtwbmal_hidden">
        <input type="hidden" class="rtwbmal_customer_id" value="<?php echo esc_attr( get_current_user_id() ); ?>" name="">
        <input type="hidden" class="rtwbmal_selected_service" value="">
        <input type="hidden" class="rtwbmal_service_duration" value="">
        <input type="hidden" class="rtwbmal_start_date" value="">
        <input type="hidden" class="rtwbmal_number_people" value="">
        <input type="hidden" class="rtwbmal_selected_employee" value="">
        <input type="hidden" class="rtwbmal_selected_date" value="">
        <input type="hidden" class="rtwbmal_start_time" value="">
        <input type="hidden" class="rtwbmal_selected_pay_method" value="">
        <input type="hidden" class="rtwbmal_publish_key" value="">
    </div>
</div>