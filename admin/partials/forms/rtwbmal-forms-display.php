<div class="rtwbmal_page_content">
    <span class="rtwbmal_pro_text"><a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a><?php esc_html_e(' This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
    </span>  
    <div class="panel-wrap product_data rtwbmal_pro_text_overlay">  
        <div class="rtwbmal-main">
            <div class="rtwbmal_page_title">
                <h3>
                    <?php esc_html_e( 'BookMyAppointment Forms', 'rtwbmal-book-my-appointment' ); ?>
                </h3>
                <div class="rtwbmal_add_new rtwbmal_add_new_emp">
                    <a class="rtwbmal_button rtwbmal_add_new_button" href="javascript:void(0);">
                        <span class="rtwbmal_plus">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="rtwbmal_text"><?php esc_html_e( 'Add New Template', 'rtwbmal-book-my-appointment' ); ?></span>
                    </a>
                </div>
                <?php include_once( RTWBMAL_DIR. 'admin/partials/forms/rtwbmal-forms-list.php' ); 
                $myListTable = new rtwbmal_Shortcodes();
                $myListTable->prepare_items();
                $myListTable->display();
                ?>
            </div>
        </div>
    </div>
</div>