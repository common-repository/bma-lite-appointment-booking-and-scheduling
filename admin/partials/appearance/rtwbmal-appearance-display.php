<?php
$rtwbmal_frnt_settings = get_option('rtwbmal_front_display_option', array());
?>
<div class="rtwbmal-main">
    <div class="rtwbmal_page_title">
        <h3><?php esc_html_e( 'Appearance', 'rtwbmal-book-my-appointment' ); ?></h3>
    </div>
    <div class="rtwbmal_page_content">
        <span class="rtwbmal_pro_text"><?php esc_html_e('This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
        <a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a></span>
        <div class="rtwbmal_wrap rtwbmal_step_by_step">
            <div class="rtwbmal_step_by_step-nav">
                <ul>
                    <li contenteditable data-attr="service" class="active rtwbmal_step_by_step-item rtwbmal_service"><?php esc_html_e( 'Services', 'rtwbmal-book-my-appointment' ); ?></li>
                    <li contenteditable data-attr="specialist" class="rtwbmal_step_by_step-item rtwbmal_employee"><?php esc_html_e( 'Specialist', 'rtwbmal-book-my-appointment' ); ?></li>
                    <li contenteditable data-attr="date-time" class="rtwbmal_step_by_step-item rtwbmal_date_time"><?php esc_html_e( 'Date &amp; Time', 'rtwbmal-book-my-appointment' ); ?></li>
                    <li contenteditable data-attr="customer" class="rtwbmal_step_by_step-item rtwbmal_customer"><?php esc_html_e( 'Customer', 'rtwbmal-book-my-appointment' ); ?></li>
                    <li contenteditable data-attr="payment" class="rtwbmal_step_by_step-item rtwbmal_payment"><?php esc_html_e( 'Payment', 'rtwbmal-book-my-appointment' ); ?></li>
                </ul>
                <div class="rtwbmal_step_by_step_move"></div>
            </div>
            <div class="rtwbmal_services rtwbmal_tab_content show" data-tab-content="service">
                <div class="rtwbmal_panel_header service_header"  contenteditable>
                    <?php esc_html_e( 'Select a Service', 'rtwbmal-book-my-appointment' ); ?>
                </div>
                <div class="rtwbmal_service_name">
                    <div class="rtwbmal_service_tbl">
                        <div class="rtwbmal_service_tbl_row">
                            <div class="rtwbmal_service_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Service Name', 'rtwbmal-book-my-appointment' ); ?></span></div>
                            <div class="rtwbmal_service_tbl_book_now">
                                <span class="rtwbmal_ser_price"><?php esc_html_e( '$1.00', 'rtwbmal-book-my-appointment' ); ?></span>
                                <a contenteditable href="javascript:;" data-service_id="1" class="rtwbmal_button_link book_now"><?php esc_html_e( 'Book Now', 'rtwbmal-book-my-appointment' ); ?></a>
                            </div>
                        </div>
                        <div class="rtwbmal_service_tbl_row">
                            <div class="rtwbmal_service_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Service Name', 'rtwbmal-book-my-appointment' ); ?></span></div>
                            <div class="rtwbmal_service_tbl_book_now">
                                <span class="rtwbmal_ser_price"><?php esc_html_e( '$1.00', 'rtwbmal-book-my-appointment' ); ?></span>
                                <a href="javascript:;" data-service_id="1" class="rtwbmal_button_link"><?php esc_html_e( 'Book Now', 'rtwbmal-book-my-appointment' ); ?></a>
                            </div>
                        </div>
                        <div class="rtwbmal_service_tbl_row">
                            <div class="rtwbmal_service_tbl_title"><span class="rtwbmal_ser_title"><?php esc_html_e( 'Service Name', 'rtwbmal-book-my-appointment' ); ?></span></div>
                            <div class="rtwbmal_service_tbl_book_now">
                                <span class="rtwbmal_ser_price"><?php esc_html_e( '$1.00', 'rtwbmal-book-my-appointment' ); ?></span>
                                <a href="javascript:;" data-service_id="1" class="rtwbmal_button_link "><?php esc_html_e( 'Book Now', 'rtwbmal-book-my-appointment' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rtwbmal_employee_name rtwbmal_tab_content" data-tab-content="specialist">
                <div class="rtwbmal_panel_header specialist_header"  contenteditable>
                    <?php esc_html_e( 'Select Specialist', 'rtwbmal-book-my-appointment' ); ?>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title">
                        <span class="rtwbmal_ser_title"> <?php esc_html_e( 'Specialist Name', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <span class="rtwbmal_custom_radio"><input type="radio" class="rtwbmal_emp_id" name="rtwbmal_employee" value="28"></span>
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title">
                        <span class="rtwbmal_ser_title"> <?php esc_html_e( 'Specialist Name', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <span class="rtwbmal_custom_radio"><input type="radio" class="rtwbmal_emp_id" name="rtwbmal_employee" value="28"></span>
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title">
                        <span class="rtwbmal_ser_title"> <?php esc_html_e( 'Specialist Name', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <span class="rtwbmal_custom_radio"><input type="radio" class="rtwbmal_emp_id" name="rtwbmal_employee" value="28"></span>
                    </div>
                </div>
            </div>
            <div class="rtwbmal_booking_date rtwbmal_tab_content" data-tab-content="date-time">
                <div class="rtwbmal_panel_header datetime_header"  contenteditable>
                    <?php esc_html_e( 'Select Date & Time for Appointment', 'rtwbmal-book-my-appointment' ); ?>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title">
                        <span contenteditable class="rtwbmal_ser_title select_date"><?php esc_html_e( 'Select Date', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <input type="text" class="datepicker rtwbmal_selected_date hasDatepicker" name="" id="dp1571652071745">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title">
                        <span contenteditable class="rtwbmal_ser_title no_of_people"><?php esc_html_e( 'Enter Number of People', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <input type="text" class="datepicker rtwbmal_selected_date hasDatepicker" name="" id="dp1571652071745">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title">
                        <span contenteditable class="rtwbmal_ser_title select_time">
                        <?php esc_html_e( 'Select Time', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <input type="text" class="datepicker rtwbmal_selected_date hasDatepicker" name="" id="dp1571652071745">
                    </div>
                </div>
            </div>
            <div class="rtwbmal_customer_detail  rtwbmal_tab_content" data-tab-content="customer">
                <div class="rtwbmal_panel_header customer_header"  contenteditable>
                    <?php esc_html_e( 'Customer Detail', 'rtwbmal-book-my-appointment' ); ?>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_cust_tbl_title"><span contenteditable class="rtwbmal_ser_title first_name">
                    <?php esc_html_e( 'First name', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_cust_tbl_input_field">
                        <input type="text" class="customer_first_name" name="customer_first_name">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_cust_tbl_title"><span contenteditable class="rtwbmal_ser_title last_name"><?php esc_html_e( 'Last name', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_cust_tbl_input_field">
                        <input type="text" class="customer_first_name" name="customer_first_name">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_cust_tbl_title"><span contenteditable class="rtwbmal_ser_title cus_email"><?php esc_html_e( 'Email', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_cust_tbl_input_field">
                        <input type="text" class="customer_first_name" name="customer_first_name">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_cust_tbl_title"><span contenteditable class="rtwbmal_ser_title mobile_no"><?php esc_html_e( 'Mobile No', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_cust_tbl_input_field">
                        <input type="text" class="customer_first_name" name="customer_first_name">
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_cust_tbl_title"><span contenteditable class="rtwbmal_ser_title cus_message"><?php esc_html_e( 'Message', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_cust_tbl_input_field">
                        <input type="text" class="customer_first_name" name="customer_first_name">
                    </div>
                </div>
            </div>
            <div class="rtwbmal_customer_detail  rtwbmal_tab_content " data-tab-content="payment">
                <div class="rtwbmal_panel_header payment_header" contenteditable>
                <?php esc_html_e( 'Select Payment Method', 'rtwbmal-book-my-appointment' ); ?>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title"><span contenteditable class="rtwbmal_ser_title pay_local"><?php esc_html_e( 'Pay Locally', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <span class="rtwbmal_custom_radio"><input type="radio" name="rtwbmal_payment" class="rtwbmal_locally_pay rtwbmal_payment_method" value="local"></span>
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title"><span contenteditable class="rtwbmal_ser_title pay_paypal"><?php esc_html_e( 'Using Paypal', 'rtwbmal-book-my-appointment' ); ?>
                    </span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <span class="rtwbmal_custom_radio"><input type="radio" name="rtwbmal_payment" class="rtwbmal_locally_pay rtwbmal_payment_method" value="local"></span>
                    </div>
                </div>
                <div class="rtwbmal_service_tbl_row">
                    <div class="rtwbmal_service_tbl_title"><span contenteditable class="rtwbmal_ser_title pay_stripe"><?php esc_html_e( 'Using Stripe', 'rtwbmal-book-my-appointment' ); ?></span>
                    </div>
                    <div class="rtwbmal_service_tbl_book_now">
                        <span class="rtwbmal_custom_radio"><input type="radio" name="rtwbmal_payment" class="rtwbmal_locally_pay rtwbmal_payment_method" value="local"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="rtwbmal_final_save_text">
            <input type="button" class="rtwbmal_button" value="<?php esc_attr_e('Save Changes', 'rtwbmal-book-my-appointment'); ?>" name="rtwbmal_submit">
        </div>
    </div>
</div>
