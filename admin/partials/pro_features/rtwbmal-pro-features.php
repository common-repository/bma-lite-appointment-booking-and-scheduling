<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    rtwbmal_Woocommerce_Quickbooks_Connector
 * @subpackage rtwbmal_Woocommerce_Quickbooks_Connector/admin/partials
 */
?>
<div class="rtwbmal_setup_content_wrapper">
    <div class="rtwbmal-help-wrapper">
        <div class="rtwbmal-help-section-heading"><?php esc_html_e( 'Templates in Premium Version', 'rtwbmal-book-my-appointment' ); ?></div>
        <div class="rtwbmal-column">
            <div class="rtwwdcp-inner-content rtwbmal-inner-content-height">
                <div class="rtwbmal-help-image">
                    <img src="<?php echo esc_url( RTWBMAL_URL.'/assets/images/template-gif/template-1.gif' ); ?>">
                </div>
            </div>
        </div>
        <div class="rtwbmal-column">
            <div class="rtwwdcp-inner-content rtwbmal-inner-content-height">
                <div class="rtwbmal-help-image">
                    <img src="<?php echo esc_url( RTWBMAL_URL.'/assets/images/template-gif/template-2.gif' ); ?>">
                </div>
            </div>
        </div>
        <div class="rtwbmal-column">
            <div class="rtwwdcp-inner-content rtwbmal-inner-content-height">
                <div class="rtwbmal-help-image">
                    <img src="<?php echo esc_url( RTWBMAL_URL.'/assets/images/template-gif/template-3.gif' ); ?>">
                </div>
            </div>
        </div>
        <div class="rtwbmal-column">
            <div class="rtwwdcp-inner-content rtwbmal-inner-content-height">
                <div class="rtwbmal-help-image">
                    <img src="<?php echo esc_url( RTWBMAL_URL.'/assets/images/template-gif/template-4.gif' ); ?>">
                </div>
            </div>
        </div>
        <div class="rtwbmal-column rtwbmal-faq-column">
            <div class="rtwwdcp-inner-content">
                <div class="rtwbmal-help-image">
                    <h2 class="rtwbmal-help-section-heading"><?php esc_html_e( 'Premium Vs Free', 'rtwbmal-book-my-appointment' ); ?></h2>
                </div>
                <div class="rtwbmal-faq-wrapper">
                    <div class="rtwbmal-faq-content">
                        <h5 class="rtwbmal-faq-heading"><?php esc_html_e( 'Features', 'rtwbmal-book-my-appointment' ); ?></h5>
                        <div class="rtwbmal-faq-desc1">
                            <div class="rtwbmal-faq-desc">
                                <div class="rtwbmal-width-fifty rtwwdcp-inner-content">
                                    <?php esc_html_e( 'Premium:', 'rtwbmal-book-my-appointment' ); ?>
                                    <ol>
                                        <li><b><?php esc_html_e( 'Changeable Panel Position ', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( 'on front-end which makes the appointment form more custommizable.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Graphical Dashboard ', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( 'for the admin to view appointments/ payments/ services/ and much more.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Send Email Notification ', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( 'to your Customers.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Send SMS Notification ', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( 'to your Customers.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Add custom fields ', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( 'for customer details form on the front-end.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Use different SMS notifications method.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Choose different Template for different Devices (i,e. Desktop, Tablet, Mobile).', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Create Unlimited Service Categories.', 'rtwbmal-book-my-appointment' ); ?></b></li>
                                        <li><b><?php esc_html_e( 'Create Unlimited Services', 'rtwbmal-book-my-appointment' ); ?></b></li>
                                        <li><b><?php esc_html_e( 'Create Unlimited Locations.', 'rtwbmal-book-my-appointment' ); ?></b></li>
                                        <li><b><?php esc_html_e( 'Choose Unlimited Employees', 'rtwbmal-book-my-appointment' ); ?></b></li>
                                        <li><b><?php esc_html_e( 'Unlimited Customers ', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( 'can book Appointment.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Unlimited Appointments Booking.', 'rtwbmal-book-my-appointment' ); ?></b></li>
                                        <li><?php esc_html_e( 'Make your own form for the customers', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Select amoung 7 well designed templates.', 'rtwbmal-book-my-appointment' ); ?></b></li>
                                        <li><?php esc_html_e( 'Two additional payment method suppported .', 'rtwbmal-book-my-appointment' ); ?><b><?php esc_html_e( '(PayPal & Stripe).', 'rtwbmal-book-my-appointment' ); ?></b></li>
                                        <li><b><?php esc_html_e( 'Synchronization with Google Calendar ', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( 'to create events in Calendar.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><b><?php esc_html_e( 'Create Coupons.', 'rtwbmal-book-my-appointment' ); ?></b><?php esc_html_e( ' to give discount to your customers.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Change Label text of front-end.', 'rtwbmal-book-my-appointment' ); ?></li>
                                    </ol>
                                </div>
                                <div class="rtwbmal-width-fifty rtwwdcp-inner-content">
                                    <?php esc_html_e( 'Free:', 'rtwbmal-book-my-appointment' ); ?>
                                    <ol>
                                        <li class="rtwbma_padding_bottom"><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li class="rtwbma_padding_bottom"><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li class="rtwbma_padding_bottom"><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li class="rtwbma_padding_bottom"><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Create only 1 Service Category.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Create only 5 Services', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Available', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Create only 5 Employees', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Only first 10 customers can book appointments.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( '10 Appointments allowed.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Not Available', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Only one template is given.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li class="rtwbma_padding_bottom"><?php esc_html_e( 'only Locally payment method is allowed.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li class="rtwbma_padding_bottom"><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                        <li><?php esc_html_e( 'Not Available.', 'rtwbmal-book-my-appointment' ); ?></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rtwbmal-help-section-heading"><?php esc_html_e( 'Contact Our Support Through', 'rtwbmal-book-my-appointment' ); ?> </div>
        <div class="rtwbmal-column">
            <div class="rtwwdcp-inner-content">
                <div class="rtwbmal-help-image rtwbmal-support-help">
                    <img src="<?php echo esc_url(RTWBMAL_URL . 'assets/images/support.png'); ?>">
                </div>
                <a target="_blank" href="https://redefiningtheweb.freshdesk.com/support/tickets/new" class="rtwbmal_button"><?php esc_html_e( 'Support Desk', 'rtwbmal-book-my-appointment' ); ?></a>
            </div>
        </div>
        <div class="rtwbmal-column">
            <div class="rtwwdcp-inner-content">
                <div class="rtwbmal-help-image rtwbmal-support-help">
                    <img src="<?php echo esc_url(RTWBMAL_URL . 'assets/images/skype.png'); ?>">
                </div>
                <a href="javascript:;" class="rtwbmal_button"><?php esc_html_e( 'Skype (Pro)', 'rtwbmal-book-my-appointment' ); ?></a>
            </div>
        </div>
    </div>
</div>

<?php
if( function_exists('is_multisite') && is_multisite() )
{
    include_once(ABSPATH. 'wp-admin/includes/plugin.php');
    if( !is_plugin_active('rtwbma-book-my-appointment/rtwbma-book-my-appointment.php') )
    {
        ?>
        <div class="rtw_popup">
            <div class="rtw_card">
                <div class="rtw_card_label">
                    <label><?php esc_html_e( 'Limited time offer', 'rtwbmal-book-my-appointment' ); ?></label>
                </div>
                <div class="rtw_card_body">
                    <div class="rtw_close_popup">
                        <i class="far fa-times-circle"></i>
                    </div>
                
                
                    <h2><?php esc_html_e( 'Get Pro @ Huge% Off', 'rtwbmal-book-my-appointment' ); ?></h2>
                    <a href="https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155" target="_blank"><button><?php esc_html_e( 'Buy Now', 'rtwbmal-book-my-appointment' ); ?></button></a>
                    <p class="price"><?php esc_html_e( 'just in ', 'rtwbmal-book-my-appointment' ); ?><span><strike>$89</strike></span><span>$29</span></p>
                    <p class="bottom_text"><?php esc_html_e( 'Hurry up offer ends soon ', 'rtwbmal-book-my-appointment' ); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}else{
    if( !in_array('rtwbma-book-my-appointment/rtwbma-book-my-appointment.php', apply_filters('active_plugins', get_option('active_plugins') ) ) )
    {
        ?>
        <div class="rtw_popup">
            <div class="rtw_card">
                <div class="rtw_card_label">
                    <label><?php esc_html_e( 'Limited time offer', 'rtwbmal-book-my-appointment' ); ?></label>
                </div>
                <div class="rtw_card_body">
                    <div class="rtw_close_popup">
                        <i class="far fa-times-circle"></i>
                    </div>
                
                
                    <h2><?php esc_html_e( 'Get Pro @ Huge% Off', 'rtwbmal-book-my-appointment' ); ?></h2>
                    <a href="https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155" target="_blank"><button><?php esc_html_e( 'Buy Now', 'rtwbmal-book-my-appointment' ); ?></button></a>
                    <p class="price"><?php esc_html_e( 'just in ', 'rtwbmal-book-my-appointment' ); ?><span><strike>$89</strike></span><span>$29</span></p>
                    <p class="bottom_text"><?php esc_html_e( 'Hurry up offer ends soon ', 'rtwbmal-book-my-appointment' ); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}
?>