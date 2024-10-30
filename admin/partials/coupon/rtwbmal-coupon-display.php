<div class="rtwbmal-main">
    <button class="rtwbmal_button rtwbmal_add_new_coupon"><?php esc_html_e('Add New Coupon', 'rtwbmal-book-my-couponment'); ?></button>
    <div class="rtwbmal_coupon_form">
        <div class="rtwbmal_page_title">
            <h3>
                <?php esc_html_e( 'Coupons', 'rtwbmal-book-my-couponment' ); ?>
            </h3>
        </div>
        <div class="rtwbmal_page_content">
            <span class="rtwbmal_pro_text">
                <a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get Pro now', 'rtwbmal-book-my-appointment'); ?></a><?php esc_html_e(' This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
            </span>
            <div class="rtwbmal_setting_wrapper">
				<div class="panel-wrap product_data rtwbmal_pro_text_overlay">
                    <div class="rtwbmal_setting_right">
                        <form method="post" action="">
                            <input type="hidden" name="edit_coupon" class="edit_coupon" value="save">
                            <div class="rtwbmal_general_content rtwbmal_show">
                                <div class="rtwbmal_input_fields">
                                
                                        <div class="rwbma-row">
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'Enter Coupon Code', 'rtwbmal-book-my-couponment' ); ?></label>
                                                <input type="text" name="rtwbmal_coupon_code" class="rtwbmal_coupon_code">
                                            </div>
                                            <div class="rwbma-col-6">
                                            <label><?php esc_html_e( 'Select Discount Type', 'rtwbmal-book-my-couponment' ); ?></label>
                                            <select class="rtwbmal_discount_type rtwbmal_select" name="rtwbmal_discount_type">
                                                    <option value="rtwbmal_percent"><?php esc_html_e('Percent', 'rtwbmal-book-my-couponment'); ?></option>
                                                    <option value="rtwbmal_fixed"><?php esc_html_e('Fixed', 'rtwbmal-book-my-couponment'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="rwbma-row">
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'Enter Discount Value', 'rtwbmal-book-my-couponment' ); ?></label>
                                                <input type="number" name="rtwbmal_coupon_value" class="rtwbmal_coupon_value">
                                            </div>
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'Start Date', 'rtwbmal-book-my-couponment' ); ?></label>
                                        
                                                <input type="text" name="rtwbmal_coupon_start_date" class="datepicker rtwbmal_coupon_start_date">
                                            </div>
                                        
                                        </div>
                                    
                                        <div class="rwbma-row">
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'End Date', 'rtwbmal-book-my-couponment' ); ?></label>
                                                <input type="text" name="rtwbmal_coupon_end_date" class="datepicker rtwbmal_coupon_end_date">
                                            </div>
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'Usage Limit', 'rtwbmal-book-my-couponment' ); ?></label>
                                        
                                                <input type="number" name="rtwbmal_use_count" class="rtwbmal_use_count">
                                            </div>
                                        </div>
                                    
                                        <div class="rwbma-row">
                                            <div class="rwbma-col-6">
                                                <span class="rtwbmal_custom_checkbox">
                                                    <input type="checkbox" name="rtwbmal_individual" value="1" class="rtwbmal_individual">
                                                </span>
                                                <label class="rwbma-custom-checkbox-label"><?php esc_html_e( 'For Individual Use Only', 'rtwbmal-book-my-couponment' ); ?></label>
                                            </div>
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'Exclude Categories', 'rtwbmal-book-my-couponment' ); ?></label>
                                        
                                                <select multiple="multiple" class="rtwbmal_exe_category rtwbmal_select" name="rtwbmal_exe_category[]">
                                                <?php if(is_array($rtwbmal_all_categories) && !empty($rtwbmal_all_categories))
                                                { 
                                                    foreach ($rtwbmal_all_categories as $key => $value) { ?>
                                                        <option value="<?php echo esc_attr($value['id']) ?>"><?php esc_html_e($value['title'], 'rtwbmal-book-my-couponment'); ?></option>
                                                    
                                                <?php }
                                                } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="rwbma-row">
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'Exclude Services', 'rtwbmal-book-my-couponment' ); ?></label>
                                                <select multiple="multiple" class="rtwbmal_exe_service rtwbmal_select" name="rtwbmal_exe_service[]">
                                                <?php if(is_array($rtwbmal_all_services) && !empty($rtwbmal_all_services))
                                                {
                                                    foreach ($rtwbmal_all_services as $key => $value) {
                                                        echo '<option value="'.$value['id'].'">'.esc_html__($value['title'], 'rtwbmal-book-my-couponment').'</option>';
                                                    }
                                                } ?>
                                                </select>
                                            </div>
                                            <div class="rwbma-col-6">
                                                <label><?php esc_html_e( 'Exclude Employee', 'rtwbmal-book-my-couponment' ); ?></label>
                                        
                                                <select multiple="multiple" class="rtwbmal_exe_employee rtwbmal_select" name="rtwbmal_exe_employee[]">
                                                    <?php if(is_array($rtwbmal_all_employees) && !empty($rtwbmal_all_employees))
                                                    {
                                                        foreach ($rtwbmal_all_employees as $key => $value) {
                                                            echo '<option value="'.$value['id'].'">'.esc_html($value['first_name']).'</option>';
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="rtwbmal_coupon_settings">
                                <input type="submit" value="<?php esc_attr_e( 'Save', 'rtwbmal-book-my-couponment' ); ?>" name="rtwbmal_coupon_settings" class="rtwbmal_button">
                            </div>
                        </form>
                        <div class="rtwbmal_coupon_settings">
                            <button class="rtwbmal_cancel rtwbmal_button"><?php esc_html_e( 'Cancel', 'rtwbmal-book-my-couponment' ); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rtwbmal_couponments rtwbmal_page_content">
    <!-- header start -->
    <div class="rtwbmal_couponments_header">
        <div class="rtwbmal_couponments_header_in">
            <span class="rtwbmal_couponment_code"><?php esc_html_e( 'Coupon Code', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_dis_type"><?php esc_html_e( 'Discount Type', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_value"><?php esc_html_e( 'Value', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_start_date"><?php esc_html_e( 'Start Date', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_end_date"><?php esc_html_e( 'End Date', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_usage_limit"><?php esc_html_e( 'Usage Limit', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_category"><?php esc_html_e( 'Excluded Category', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_service"><?php esc_html_e( 'Excluded Service', 'rtwbmal-book-my-couponment' ); ?></span>
            <span class="rtwbmal_couponment_staff"><?php esc_html_e( 'Excluded Staff', 'rtwbmal-book-my-couponment' ); ?></span>
        </div>
    </div>
    <ul class="rtwbmal_couponments_list">
    </ul>
</div>