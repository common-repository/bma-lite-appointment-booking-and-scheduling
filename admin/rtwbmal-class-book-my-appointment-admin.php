<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/admin
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwbmal_Book_My_Appointment_Admin {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rtwbmal_plugin_name    The ID of this plugin.
	 */
	private $rtwbmal_plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rtwbmal_version    The current version of this plugin.
	 */
	private $rtwbmal_version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $rtwbmal_plugin_name       The name of this plugin.
	 * @param      string    $rtwbmal_version    The version of this plugin.
	 */
	public function __construct( $rtwbmal_plugin_name, $rtwbmal_version ) {

		$this->rtwbmal_plugin_name = $rtwbmal_plugin_name;
		$this->rtwbmal_version = $rtwbmal_version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function rtwbmal_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the rtwbmal_run() function
		 * defined in Book_My_Appointment_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_My_Appointment_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        $rtwbmal_css_allowed_pages = array( 
            'book-my-appointment-lite_page_rtwbmal-calendar',
            'book-my-appointment-lite_page_rtwbmal-locations',
            'book-my-appointment-lite_page_rtwbmal-services',
            'book-my-appointment-lite_page_rtwbmal-emp_members',
            'book-my-appointment-lite_page_rtwbmal-customers',
            'book-my-appointment-lite_page_rtwbmal-appointments',
            'book-my-appointment-lite_page_rtwbmal-email_notifications',
            'book-my-appointment-lite_page_rtwbmal-sms_notifications',
            'book-my-appointment-lite_page_rtwbmal-payments',
            'book-my-appointment-lite_page_rtwbmal-settings',
            'book-my-appointment-lite_page_rtwbmal-status',
            'book-my-appointment-lite_page_rtwbmal-appearance',
            'book-my-appointment-lite_page_rtwbmal-template',
            'book-my-appointment-lite_page_rtwbmal-forms',
            'book-my-appointment-lite_page_rtwbmal-dashboard',
            'book-my-appointment-lite_page_rtwbmal-coupon',
            'book-my-appointment-lite_page_rtwbmal-pro',
            'book-my-appointment-lite_page_rtwbmal-custom-css'
        );

        $rtwbmal_screen    = function_exists( 'get_current_screen' ) ? get_current_screen() : '';
        $rtwbmal_screen_id = ( isset( $rtwbmal_screen->id ) ) ? $rtwbmal_screen->id : '';
       
        if( in_array( $rtwbmal_screen_id, $rtwbmal_css_allowed_pages ) ){
    		wp_enqueue_style( $this->rtwbmal_plugin_name, plugin_dir_url( __FILE__ ) . 'css/rtwbmal-book-my-appointment-admin.css', array('font-awesome'), $this->rtwbmal_version, 'all' );

            wp_enqueue_style( 'font-awesome',   RTWBMAL_URL . 'assets/fontawesome/css/all.css', array(), $this->rtwbmal_version, 'all' );

            wp_enqueue_style( "select2", RTWBMAL_URL . 'assets/select2/select2.css', array('font-awesome'), $this->rtwbmal_version, 'all' );

            //jquery-modal
            wp_enqueue_style( 'modal', RTWBMAL_URL . 'assets/jquery-modal/jquery.modal.css', array('font-awesome'), $this->rtwbmal_version, 'all' );

            //growl-js
            wp_enqueue_style( 'growl', RTWBMAL_URL . 'assets/jquery.growl/jquery.growl.css', array('font-awesome'), $this->rtwbmal_version, 'all' );

            wp_register_style( 'datepicker', RTWBMAL_URL . 'assets/jquery-ui.min.css', array(), $this->rtwbmal_version, 'all' );
		
            wp_enqueue_style('datepicker');
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-calendar' ){
            //fullcalendar
            wp_enqueue_style( 'core', RTWBMAL_URL . 'assets/fullcalendar/core/main.css', array(), $this->rtwbmal_version, 'all' );
            wp_enqueue_style( 'daygrid', RTWBMAL_URL . 'assets/fullcalendar/daygrid/main.css', array(), $this->rtwbmal_version, 'all' );
            wp_enqueue_style( 'timegrid', RTWBMAL_URL . 'assets/fullcalendar/timegrid/main.css', array(), $this->rtwbmal_version, 'all' );
            wp_enqueue_style( 'list', RTWBMAL_URL . 'assets/fullcalendar/list/main.css', array(), $this->rtwbmal_version, 'all' );
            
            wp_enqueue_style( 'calendar', RTWBMAL_URL . 'admin/partials/calendar/rtwbmal-calendar.css', array(), $this->rtwbmal_version, 'all' );
            
            wp_enqueue_style( 'timepicker', plugin_dir_url( __FILE__ ) . 'css/timepicker.min.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-dashboard' ){
            wp_enqueue_style( 'rtwbmal-dashboard', RTWBMAL_URL . 'admin/partials/dashboard/rtwbmal-dashboard.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-template' ){
            wp_enqueue_style( 'rtwbmal-template', RTWBMAL_URL . 'admin/partials/template/rtwbmal-template.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-locations' ){
            wp_enqueue_style( 'rtwbmal-locations', RTWBMAL_URL . 'admin/partials/locations/rtwbmal-locations.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-services' ){
            wp_enqueue_style( 'rtwbmal-services', RTWBMAL_URL . 'admin/partials/services/rtwbmal-services.css', array(), $this->rtwbmal_version, 'all' );
            
            wp_enqueue_style( 'wp-color-picker' );
        }
        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-custom-css'){
            wp_enqueue_style( 'rtwbmal-services', RTWBMAL_URL . 'admin/partials/custom_css/rtwbmal-custom-css.css', array(), $this->rtwbmal_version, 'all' );
            
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-emp_members' ){
            wp_enqueue_style( 'rtwbmal-emp_members', RTWBMAL_URL . 'admin/partials/emp_members/rtwbmal-emp_members.css', array('font-awesome'), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-customers' ){
            wp_enqueue_style( 'rtwbmal-customers', RTWBMAL_URL . 'admin/partials/customers/rtwbmal-customers.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-appointments' )
        {
            wp_enqueue_style( 'timepicker', plugin_dir_url( __FILE__ ) . 'css/timepicker.min.css', array(), $this->rtwbmal_version, 'all' );

            wp_enqueue_style( 'rtwbmal-appointments', RTWBMAL_URL . 'admin/partials/appointments/rtwbmal-appointments.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-email_notifications' ){
            wp_enqueue_style( 'rtwbmal-email_notifications', RTWBMAL_URL . 'admin/partials/email_notifications/rtwbmal-email_notifications.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-status' ){
            wp_enqueue_style( 'rtwbmal-status', RTWBMAL_URL . 'admin/partials/status/rtwbmal-status.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-sms_notifications' )
        {
            wp_enqueue_style( 'rtwbmal-sms_notifications', RTWBMAL_URL . 'admin/partials/sms_notifications/rtwbmal-sms_notifications.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-payments' ){
            wp_enqueue_style( 'rtwbmal-payments', RTWBMAL_URL . 'admin/partials/payments/rtwbmal-payments.css', array(), $this->rtwbmal_version, 'all' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-coupon' ){
            wp_enqueue_style( 'rtwbmal-coupon', RTWBMAL_URL . 'admin/partials/coupon/rtwbmal-coupon.css', array(), $this->rtwbmal_version, 'all' );

            wp_register_style( 'datepicker', RTWBMAL_URL . 'assets/jquery-ui.min.css', array(), $this->rtwbmal_version, 'all' );
		
            wp_enqueue_style('datepicker');
        }
        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-forms' ){
            wp_enqueue_style( 'rtwbmal-forms', RTWBMAL_URL . 'admin/partials/forms/rtwbmal-forms.css', array(), $this->rtwbmal_version, 'all' );
        }
        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-settings' ){
            wp_enqueue_style( 'rtwbmal-settings', RTWBMAL_URL . 'admin/partials/settings/rtwbmal-settings.css', array(), $this->rtwbmal_version, 'all' );

            wp_register_style( 'datepicker', RTWBMAL_URL . 'assets/jquery-ui.min.css', array(), $this->rtwbmal_version, 'all' );
            wp_enqueue_style('datepicker');
            wp_enqueue_script( "notitfy", RTWBMAL_URL . 'assets/jquery.notify.min.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }
        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-appearance' ){
            wp_enqueue_style( 'rtwbmal-appearance', RTWBMAL_URL . 'admin/partials/appearance/rtwbmal-appearance.css', array(), $this->rtwbmal_version, 'all' );
        }
        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-pro' ){
            wp_enqueue_style( 'rtwbmal-pro', RTWBMAL_URL . 'admin/partials/pro_features/rtwbmal-pro.css', array(), $this->rtwbmal_version, 'all' );
        }
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function rtwbmal_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the rtwbmal_run() function
		 * defined in Book_My_Appointment_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Book_My_Appointment_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        $rtwbmal_js_allowed_pages = array( 
            'book-my-appointment-lite_page_rtwbmal-calendar',
            'book-my-appointment-lite_page_rtwbmal-locations',
            'book-my-appointment-lite_page_rtwbmal-services',
            'book-my-appointment-lite_page_rtwbmal-emp_members',
            'book-my-appointment-lite_page_rtwbmal-customers',
            'book-my-appointment-lite_page_rtwbmal-appointments',
            'book-my-appointment-lite_page_rtwbmal-email_notifications',
            'book-my-appointment-lite_page_rtwbmal-sms_notifications',
            'book-my-appointment-lite_page_rtwbmal-payments',
            'book-my-appointment-lite_page_rtwbmal-settings',
            'book-my-appointment-lite_page_rtwbmal-status',
            'book-my-appointment-lite_page_rtwbmal-appearance',
            'book-my-appointment-lite_page_rtwbmal-template',
            'book-my-appointment-lite_page_rtwbmal-forms',
            'book-my-appointment-lite_page_rtwbmal-dashboard',
            'book-my-appointment-lite_page_rtwbmal-coupon',
            'book-my-appointment-lite_page_rtwbmal-pro'
        );

        $rtwbmal_screen    = function_exists( 'get_current_screen' ) ? get_current_screen() : '';
        $rtwbmal_screen_id = ( isset( $rtwbmal_screen->id ) ) ? $rtwbmal_screen->id : '';
        
        wp_register_script('jquery-ui-datepicker', RTWBMAL_URL . plugins_url( 'woocommerce/assets/jquery-ui.min.js' ), array( 'jquery' ), $this->rtwbmal_version, true);

        if( in_array( $rtwbmal_screen_id, $rtwbmal_js_allowed_pages ) ){
    		wp_enqueue_script( $this->rtwbmal_plugin_name, plugin_dir_url( __FILE__ ) . 'js/rtwbmal-book-my-appointment-admin.js', array( 'jquery' ), $this->rtwbmal_version, false );

            wp_register_script('datepicker', RTWBMAL_URL . 'assets/jquery-ui.min.js', array( 'jquery' ), $this->rtwbmal_version, true);
            wp_enqueue_script( 'datepicker' );
            //select2
            wp_enqueue_script( "select2", RTWBMAL_URL . 'assets/select2/select2.full.min.js', array( 'jquery' ), $this->rtwbmal_version, false );

            //blockUI
            wp_enqueue_script( "blockUI", RTWBMAL_URL . 'assets/blockUI/jquery.blockUI.min.js', array( 'jquery' ), $this->rtwbmal_version, false );

            //jquery-modal
            wp_enqueue_script( 'modal', RTWBMAL_URL . 'assets/jquery-modal/jquery.modal.js', array( 'jquery' ), $this->rtwbmal_version, false );

            //growl-js
            wp_enqueue_script( 'growl', RTWBMAL_URL . 'assets/jquery.growl/jquery.growl.js', array( 'jquery' ), $this->rtwbmal_version, false );

            //jquery.validate
            wp_enqueue_script( 'validate', RTWBMAL_URL . 'assets/jquery.validate/jquery.validate.js', array( 'jquery' ), $this->rtwbmal_version, false );       

            $rtwbmal_ajax_nonce         = wp_create_nonce( "rtwbmal-ajax-security-string" );
            $rtwbmal_translation_array  = array(
                'rtwbmal_ajaxurl'        => esc_url( admin_url( 'admin-ajax.php' ) ),
                'rtwbmal_nonce'          => $rtwbmal_ajax_nonce,
                'rtwbmal_required'       => esc_html__( 'Required', 'rtwbmal-book-my-appointment' ),
                'rtwbmal_approval_sure'  => esc_html__( 'Are You Sure?', 'rtwbmal-book-my-appointment' ),
                'rtwbmal_appointment'  => esc_html__( 'Appointment', 'rtwbmal-book-my-appointment' ),
                'rtwbmal_client_id'  => esc_html__( 'Enter Client ID', 'rtwbmal-book-my-appointment' ),
                'rtwbmal_client_secret'  => esc_html__( 'Enter Client Secret', 'rtwbmal-book-my-appointment' ),
                'rtwbmal_client_redirect_url'  => esc_html__( 'Enter Redirect Url', 'rtwbmal-book-my-appointment' ),
            );

            wp_localize_script( $this->rtwbmal_plugin_name, 'rtwbmal_global_params', $rtwbmal_translation_array );
            wp_enqueue_script( $this->rtwbmal_plugin_name );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-dashboard' ){
            wp_enqueue_script( 'rtwbmal_dashboard', RTWBMAL_URL . 'admin/partials/dashboard/rtwbmal-dashboard.js', array( 'jquery' ), $this->rtwbmal_version, false );
            wp_enqueue_script( 'chart-bundle', RTWBMAL_URL . 'assets/Chart.bundle.js', array( 'jquery' ), $this->rtwbmal_version, false );

        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-template' ){
            wp_enqueue_script( 'rtwbmal_template', RTWBMAL_URL . 'admin/partials/template/rtwbmal-template.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-calendar' ){
            
            wp_enqueue_script( 'core', RTWBMAL_URL . 'assets/fullcalendar/core/main.js', array( 'jquery', 'jquery-ui-datepicker' ), $this->rtwbmal_version, false );
            wp_enqueue_script( 'interaction', RTWBMAL_URL . 'assets/fullcalendar/interaction/main.js', array( 'jquery' ), $this->rtwbmal_version, false );
            wp_enqueue_script( 'daygrid', RTWBMAL_URL . 'assets/fullcalendar/daygrid/main.js', array( 'jquery' ), $this->rtwbmal_version, false );
            wp_enqueue_script( 'timegrid', RTWBMAL_URL . 'assets/fullcalendar/timegrid/main.js', array( 'jquery' ), $this->rtwbmal_version, false );
            wp_enqueue_script( 'list', RTWBMAL_URL . 'assets/fullcalendar/list/main.js', array( 'jquery' ), $this->rtwbmal_version, false );

            wp_enqueue_script( 'timepicker',  RTWBMAL_URL . 'assets/jquery.timepicker.min.js', array( 'jquery' ), $this->rtwbmal_version, false );
            
            wp_enqueue_script( 'popper', RTWBMAL_URL . 'assets/popper.min.js', array( 'jquery' ), $this->rtwbmal_version, false );
            
            wp_enqueue_script( 'tooltip', RTWBMAL_URL . 'assets/tooltip.min.js', array( 'jquery', 'popper' ), $this->rtwbmal_version, false );
            
            wp_enqueue_script( 'jquery-ui-datepicker' );
            wp_enqueue_script( 'calendar', RTWBMAL_URL . 'admin/partials/calendar/rtwbmal-calendar.js', array( 'jquery','jquery-ui-datepicker', 'core', 'interaction', 'daygrid', 'timegrid', 'list'  ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-locations' ){
            wp_enqueue_script( 'rtwbmal-locations', RTWBMAL_URL . 'admin/partials/locations/rtwbmal-locations.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-services' ){
            wp_enqueue_script( 'rtwbmal-services', RTWBMAL_URL . 'admin/partials/services/rtwbmal-services.js', array( 'jquery', 'wp-color-picker' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-forms' ){
            wp_enqueue_style( 'rtwbmal-forms', RTWBMAL_URL . 'admin/partials/forms/rtwbmal-forms.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-emp_members' ){
            wp_enqueue_script( 'rtwbmal-emp_members', RTWBMAL_URL . 'admin/partials/emp_members/rtwbmal-emp_members.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-customers' ){
            wp_enqueue_script( 'rtwbmal-customers', RTWBMAL_URL . 'admin/partials/customers/rtwbmal-customers.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-appearance' ){
            wp_enqueue_script( 'rtwbmal-appearance', RTWBMAL_URL . 'admin/partials/appearance/rtwbmal-appearance.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-appointments' ){
            wp_enqueue_script( 'jquery-ui-datepicker' );

            wp_enqueue_script( 'timepicker',  RTWBMAL_URL . 'assets/jquery.timepicker.min.js', array( 'jquery' ), $this->rtwbmal_version, false );
            wp_enqueue_script( 'rtwbmal-appointments', RTWBMAL_URL . 'admin/partials/appointments/rtwbmal-appointments.js', array( 'jquery', 'jquery-ui-datepicker' ), $this->rtwbmal_version, false );

        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-email_notifications' ){
            wp_enqueue_script( 'rtwbmal-email_notifications', RTWBMAL_URL . 'admin/partials/email_notifications/rtwbmal-email_notifications.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-sms_notifications' ){
            wp_enqueue_script( 'rtwbmal-sms_notifications', RTWBMAL_URL . 'admin/partials/sms_notifications/rtwbmal-sms_notifications.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-payments' ){
            wp_enqueue_script( 'rtwbmal-payments', RTWBMAL_URL . 'admin/partials/payments/rtwbmal-payments.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-status' ){
            wp_enqueue_script( 'rtwbmal-payments', RTWBMAL_URL . 'admin/partials/status/rtwbmal-status.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-coupon' ){
            wp_enqueue_script( 'rtwbmal-coupon', RTWBMAL_URL . 'admin/partials/coupon/rtwbmal-coupon.js', array( 'jquery' ), $this->rtwbmal_version, false );
            wp_register_script('datepicker', RTWBMAL_URL . 'assets/jquery-ui.min.js', array( 'jquery' ), $this->rtwbmal_version, true);
            wp_enqueue_script( 'datepicker' );
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-settings' ){
            wp_enqueue_script( 'rtwbmal-settings', RTWBMAL_URL . 'admin/partials/settings/rtwbmal-settings.js', array( 'jquery' ), $this->rtwbmal_version, false );
            wp_enqueue_script( 'jquery-ui-datepicker' );
            wp_register_script('multidatespicker', RTWBMAL_URL . 'assets/multidatespicker.js',array( 'jquery' ), $this->rtwbmal_version, true);
            wp_enqueue_script('multidatespicker');
            wp_enqueue_script('datepicker');
        }

        if( $rtwbmal_screen_id == 'book-my-appointment-lite_page_rtwbmal-pro' ){
            wp_enqueue_script( 'rtwbmal-pro', RTWBMAL_URL . 'admin/partials/pro_features/rtwbmal-pro.js', array( 'jquery' ), $this->rtwbmal_version, false );
        }

        wp_enqueue_media();
       
	}

	/** 
     * Funtion To create Admin Menu
     *  @since    1.0.0
     */
    public function rtwbmal_add_admin_menu(){
		// Add Main Menu

        global $current_user, $submenu;

        $is_staff = 1;
        if( current_user_can( 'manage_options' ) )
        {
            if ( $current_user->has_cap( 'administrator' ) || $current_user->has_cap( 'rtwbmal_edit_appointment' ) || $is_staff ) {
                $rtwbmal_menu_position = '80';
                if ( $current_user->has_cap( 'manage_options' ) || $current_user->has_cap( 'rtwbmal_edit_appointment' ) ) {
                    add_menu_page( esc_html__( 'Book My Appointment Lite', 'rtwbmal-book-my-appointment' ), esc_html__( 'Book My Appointment Lite', 'rtwbmal-book-my-appointment' ), 'read', 'rtwbmal-menu', '', RTWBMAL_URL.'assets/images/logobma.png', $rtwbmal_menu_position );

                    $rtwbmal_appointments   	= esc_html__( 'Appointments', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_calendar       	= esc_html__( 'Calendar', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_emp_members  	= esc_html__( 'Employees', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_profile  		= esc_html__( 'Profile', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_services       	= esc_html__( 'Services', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_locations       = esc_html__( 'Locations', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_email_noti  	= esc_html__( 'Email Notifications', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_sms_noti        = esc_html__( 'SMS Notifications', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_customers      	= esc_html__( 'Customers', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_payments       	= esc_html__( 'Payments', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_appearance     	= esc_html__( 'Appearance', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_settings       	= esc_html__( 'Settings', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status          = esc_html__( 'Status', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_template        = esc_html__( 'Template', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_dashboard        = esc_html__( 'Dashboard', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_coupon        = esc_html__( 'Coupons', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_pro        = esc_html__( 'Pro Features', 'rtwbm    al-book-my-appointment' );
                    $rtwbmal_forms       = esc_html__( 'Forms', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_custom_css       = esc_html__( 'Custom Css', 'rtwbmal-book-my-appointment' );

            
                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_dashboard, $rtwbmal_dashboard, 'read', 'rtwbmal-dashboard', array( $this, 'rtwbmal_dashboard' ) );
                
                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_appointments, $rtwbmal_appointments, 'read', 'rtwbmal-appointments', array( $this, 'rtwbmal_appointments' ) );
                

                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_calendar, $rtwbmal_calendar, 'read', 'rtwbmal-calendar', array( $this, 'rtwbmal_calendar' ) );

                    if ( $current_user->has_cap( 'administrator' ) ) {
                        
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_emp_members, $rtwbmal_emp_members, 'read', 'rtwbmal-emp_members', array( $this, 'rtwbmal_emp_members' ) );
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_locations, $rtwbmal_locations, 'read', 'rtwbmal-locations', array( $this, 'rtwbmal_locations' ) );
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_payments, $rtwbmal_payments, 'read', 'rtwbmal-payments', array( $this, 'rtwbmal_payments' ) );
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_appearance, $rtwbmal_appearance, 'read', 'rtwbmal-appearance', array( $this, 'rtwbmal_appearance' ) );
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_status, $rtwbmal_status, 'read', 'rtwbmal-status', array( $this, 'rtwbmal_status' ) );
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_template, $rtwbmal_template, 'read', 'rtwbmal-template', array( $this, 'rtwbmal_template' ) );
                    }

                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_services, $rtwbmal_services, 'read', 'rtwbmal-services', array( $this, 'rtwbmal_services' ) );
                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_custom_css, $rtwbmal_custom_css, 'read', 'rtwbmal-custom-css', array( $this, 'rtwbmal_custom_css' ) );

                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_forms, $rtwbmal_forms, 'read', 'rtwbmal-forms', array( $this, 'rtwbmal_forms' ) );

                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_email_noti, $rtwbmal_email_noti, 'read', 'rtwbmal-email_notifications', array( $this, 'rtwbmal_email_noti' ) );
                    add_submenu_page( 'rtwbmal-menu', $rtwbmal_sms_noti, $rtwbmal_sms_noti, 'read', 'rtwbmal-sms_notifications', array( $this, 'rtwbmal_sms_noti' ) );

                    if ( $current_user->has_cap( 'manage_options' ) || $current_user->has_cap( 'rtwbmal_edit_appointment' ) ) {
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_customers, $rtwbmal_customers, 'read', 'rtwbmal-customers', array( $this, 'rtwbmal_customers' ) );
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_settings, $rtwbmal_settings, 'read', 'rtwbmal-settings', array( $this, 'rtwbmal_settings' ) );
                        add_submenu_page( 'rtwbmal-menu', $rtwbmal_coupon, $rtwbmal_coupon, 'read', 'rtwbmal-coupon', array( $this, 'rtwbmal_coupon' ) );
                    }

                    add_submenu_page( 'rtwbmal-menu', '<span class="rtwbma_pro_menu"><i class="fas fa-user-tie"></i> '.$rtwbmal_pro.'</span>','<span class="rtwbma_pro_menu"><i class="fas fa-user-tie"></i> '.$rtwbmal_pro.'</span>', 'read', 'rtwbmal-pro', array( $this, 'rtwbmal_pro' ) );
                }

                unset( $submenu[ 'rtwbmal-menu' ][0] );
            }
        }
    }

    /** 
     * Funtion to display sections
     *  @since    1.0.0
     */
    function rtwbmal_display( $section = 'dashboard' ){
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php' );
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-'.$section.'-display.php' );
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php' );
    }

    /** 
     * Funtion to display coupons
     *  @since    1.0.0
     */
    function rtwbmal_coupon(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');
        
        include_once( RTWBMAL_DIR.'admin/partials/coupon/rtwbmal-coupon-display.php');
       
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /** 
     * Funtion to display calendar
     *  @since    1.0.0
     */
    function rtwbmal_calendar(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/calendar/rtwbmal-calendar-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /** 
     * Funtion to display dashboard
     *  @since    1.0.0
     */
    function rtwbmal_dashboard(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/dashboard/rtwbmal-dashboard-display.php');

    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /** 
     * Funtion to display template settings
     *  @since    1.0.0
     */
    function rtwbmal_template(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/template/rtwbmal-template-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /** 
     * Funtion to display appointments
     * @since    1.0.0
     */
    function rtwbmal_appointments(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/appointments/rtwbmal-appointments-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display emp_members
     * @since    1.0.0
     */
    function rtwbmal_emp_members(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/emp_members/rtwbmal-emp_members-display.php');
           
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display locations
     * @since    1.0.0
     */
    function rtwbmal_locations(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/locations/rtwbmal-locations-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display payments
     * @since    1.0.0
     */
    function rtwbmal_payments(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/payments/rtwbmal-payments-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display appearance
     * @since    1.0.0
     */
    function rtwbmal_appearance(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/appearance/rtwbmal-appearance-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display services
     * @since    1.0.0
     */
    function rtwbmal_services(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/services/rtwbmal-services-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display Custom Css
     * @since    1.0.0
     */
    function rtwbmal_custom_css()
    {
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/custom_css/rtwbmal-custom-css-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display forms
     * @since    1.0.0
     */
    function rtwbmal_forms(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/forms/rtwbmal-forms-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display email notifications
     * @since    1.0.0
     */
    function rtwbmal_email_noti(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/email_notifications/rtwbmal-email_notifications-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display sms notifications
     * @since    1.0.0
     */
    function rtwbmal_sms_noti(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/sms_notifications/rtwbmal-sms_notifications-display.php');
        
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display customers
     * @since    1.0.0
     */
    function rtwbmal_customers(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/customers/rtwbmal-customers-display.php');
        
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display settings
     * @since    1.0.0
     */
    function rtwbmal_settings(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php');

        include_once( RTWBMAL_DIR.'admin/partials/settings/rtwbmal-settings-display.php');
         
    	include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php');
    }

    /**
     * Funtion to display settings
     * @since    1.0.0
     */
    function rtwbmal_status(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php' );

        include_once( RTWBMAL_DIR.'admin/partials/status/rtwbmal-status-display.php' );
           
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php' );
    }

    /**
     * Funtion to pro features
     * @since    1.0.0
     */
    function rtwbmal_pro(){
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-header-display.php' );

        include_once( RTWBMAL_DIR.'admin/partials/pro_features/rtwbmal-pro-features.php' );
           
        include_once( RTWBMAL_DIR.'admin/partials/rtwbmal-footer-display.php' );
    }

    /**
     *  Funtion To add new location
     * @since    1.0.0
     */
    function rtwbmal_loc_add_new_callback()
    {
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_loc_name        = sanitize_text_field( $_POST[ 'rtwbmal_loc_name' ] );
                $rtwbmal_loc_address     = sanitize_text_field( $_POST[ 'rtwbmal_loc_address' ] );
                $rtwbmal_loc_description = sanitize_text_field( $_POST[ 'rtwbmal_loc_description' ] );
                $rtwbmal_loc_employees   = sanitize_text_field( $_POST[ 'rtwbmal_loc_employees' ] );
                $attachment_id   = sanitize_text_field( $_POST[ 'attachment_id' ] );

                $rtwbmal_emp = array();
                if(is_array($_POST[ 'rtwbmal_emp' ] ) && !empty($_POST[ 'rtwbmal_emp' ] ))
                {
                    foreach ($_POST[ 'rtwbmal_emp' ] as $key => $value) {
                        $rtwbmal_emp[sanitize_text_field($key)] = json_decode(sanitize_text_field( $value ));
                    }
                }
                $rtwbmal_emp = serialize( $rtwbmal_emp );

                $rtwbmal_loc_emp_size = ( $rtwbmal_loc_employees ) ? $rtwbmal_loc_employees : 0;

                $rtwbmal_inserted = $wpdb->insert(
                    $wpdb->prefix.'rtwbma_locations',
                    array(
                        'loc_name'      => $rtwbmal_loc_name,
                        'loc_address'   => $rtwbmal_loc_address,
                        'loc_descr'     => $rtwbmal_loc_description,
                        'loc_emp'       => $rtwbmal_loc_emp_size,
                        'attachment_id' => $attachment_id,
                        'emp_id'        => $rtwbmal_emp
                    )
                );

                if( $rtwbmal_inserted ){
                    $rtwbmal_lastid = $wpdb->insert_id;
                    if(is_array($rtwbmal_loc_employees) && !empty($rtwbmal_loc_employees))
                    {
                        foreach( $rtwbmal_loc_employees as $rtwbmal_key => $rtwbmal_value ){
                            $wpdb->insert(
                                $wpdb->prefix.'rtwbma_emp_loc',
                                array(
                                    'emp_id'    => $rtwbmal_value,
                                    'loc_id'    => $rtwbmal_lastid
                                )
                            );
                        }
                    }

                    $rtwbmal_message = esc_html__( 'Location Added', 'rtwbmal-book-my-appointment' );
                }
                else{
                    $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_inserted, 'rtwbmal_message' => $rtwbmal_message ) );
                wp_die();
            }
        }
    }

    /**
     *  Funtion to edit location
     * @since    1.0.0
     */
    function rtwbmal_edit_loc_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) ) 
            {
                global $wpdb;
                $rtwbmal_loc_id      = sanitize_text_field( $_POST[ 'rtwbmal_loc_id' ] );

                $rtwbmal_get_loc = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_locations WHERE id=%d", $rtwbmal_loc_id ), ARRAY_A );
                $rtwbmal_get_loc[0]['attachment_url'] = wp_get_attachment_url( $rtwbmal_get_loc[0]['attachment_id'] );
                $rtwbmal_status = 1;
                $rtwbmal_get_loc[0]['emp_id'] = unserialize( $rtwbmal_get_loc[0]['emp_id'] );
                
                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_locations' => $rtwbmal_get_loc[0] ) );
                wp_die();
            }
        }
    }

    /**
     * Funtion to update location
     * @since    1.0.0
     */
    function rtwbmal_loc_update_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            global $wpdb;
            $rtwbmal_loc_name        = sanitize_text_field( $_POST[ 'rtwbmal_loc_name' ] );
            $rtwbmal_loc_address     = sanitize_text_field( $_POST[ 'rtwbmal_loc_address' ] );
            $rtwbmal_loc_description = sanitize_text_field( $_POST[ 'rtwbmal_loc_description' ] );
            $rtwbmal_loc_employees   = sanitize_text_field( $_POST[ 'rtwbmal_loc_employees' ] );
            $attachment_id   = sanitize_text_field( $_POST[ 'attachment_id' ] );
            $rtwbmal_loc_id = sanitize_text_field( $_POST[ 'rtwbmal_loc_id' ] );

            $rtwbmal_emp = array();
            if(is_array($_POST[ 'rtwbmal_emp' ]) && !empty($_POST[ 'rtwbmal_emp' ]))
            {
                foreach ($_POST[ 'rtwbmal_emp' ] as $key => $value) {
                    $rtwbmal_emp[sanitize_text_field($key)] = json_decode(sanitize_text_field( $value ));
                }
            }
            $rtwbmal_emp = serialize( $rtwbmal_emp );

            $rtwbmal_loc_emp_size = ( $rtwbmal_loc_employees ) ? $rtwbmal_loc_employees : 0;

            $rtwbmal_emp_updated = $wpdb->query( $wpdb->prepare( "UPDATE ".$wpdb->prefix.'rtwbma_locations'." SET id='%d', loc_name='%s', loc_address='%s', loc_descr='%s', emp_id='%s', attachment_id='%d', loc_emp='%d'  WHERE id='%d'", $rtwbmal_loc_id, $rtwbmal_loc_name, $rtwbmal_loc_address, $rtwbmal_loc_description, $rtwbmal_emp, $attachment_id, $rtwbmal_loc_employees, $rtwbmal_loc_id ) );

            $rtwbmal_status = 0;
            $rtwbmal_emp_updated = 1;
            if( $rtwbmal_emp_updated ){
                $rtwbmal_status = 1;
                $rtwbmal_message = esc_html__( 'Updated', 'rtwbmal-book-my-appointment' );
            }
            else{
                $rtwbmal_status = 1;
                $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
            }

            echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
            wp_die();
        }
    }

    /**
     * Funtion to delete location
     * @since    1.0.0
     */
    function rtwbmal_loc_delete_callback(){
        $rtwbmal_loc_id = sanitize_text_field( $_POST[ 'rtwbmal_loc_id' ] );
        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_loc_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_locations', array( 'id' => $rtwbmal_loc_id ), array( '%d' ) );

                if( $rtwbmal_loc_deleted ){
                    //delete from employee location
                    $rtwbmal_emp_loc_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_emp_loc', array( 'loc_id' => $rtwbmal_loc_id ), array( '%d' ) );
                    
                    //delete from appointments
                    $rtwbmal_appointments_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_appointments', array( 'loc_id' => $rtwbmal_loc_id ), array( '%d' ) );

                    $rtwbmal_message    = esc_html__( 'Deleted', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = true;
                }
                else{
                    $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = false;
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
            }
        }
        wp_die();
    }

    /**
     * Funtion to add employee
     * @since    1.0.0
     */
    function rtwbmal_emp_add_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                
                global $wpdb;
                $rtwbmal_lentgh = sanitize_text_field( $_POST[ 'length' ] );
               
                if( $rtwbmal_length < 5 )
                {
                    $rtwbmal_emp_fname        = sanitize_text_field( $_POST[ 'rtwbmal_emp_fname' ] );
                    $rtwbmal_emp_lname        = sanitize_text_field( $_POST[ 'rtwbmal_emp_lname' ] );
                    $rtwbmal_emp_email        = sanitize_text_field( $_POST[ 'rtwbmal_emp_email' ] );
                    $rtwbmal_emp_phone_no     = sanitize_text_field( $_POST[ 'rtwbmal_emp_phone_no' ] );
                    $rtwbmal_emp_visible      = sanitize_text_field( $_POST[ 'rtwbmal_emp_visible' ] );
                    $rtwbmal_emp_address      = sanitize_text_field( $_POST[ 'rtwbmal_emp_address' ] );
                    $rtwbmal_emp_description  = sanitize_text_field( $_POST[ 'rtwbmal_emp_description' ] );
                    $rtwbmal_emp_price        = sanitize_text_field( $_POST[ 'rtwbmal_emp_price' ] );
                    $rtwbmal_wp_user          = sanitize_text_field( $_POST[ 'rtwbmal_wp_user' ] );
                    
                    $rtwbmal_get_wp_user = get_user_by( 'email', $rtwbmal_emp_email );

                    $rtwbmal_wp_user_id = '';
                    $rtwbmal_error_msg = '';
                    if( $rtwbmal_wp_user == 0 && empty( $rtwbmal_get_wp_user ) )
                    {
                        if( is_email( $rtwbmal_emp_email ) )
                        {
                            
                            $rtwbmal_password = wp_generate_password( 12, true );
                            $rtwbmal_userdata = array( 'user_email' => $rtwbmal_emp_email,
                                            'display_name'          => $rtwbmal_emp_fname,
                                            'first_name'            => $rtwbmal_emp_fname,
                                            'last_name'             => $rtwbmal_emp_lname,
                                            'user_pass'             => $rtwbmal_password,
                                            'user_login'            => $rtwbmal_emp_email );

                            $response = wp_insert_user( $rtwbmal_userdata );

                            if( is_wp_error($response) ){
                                $rtwbmal_error_msg = $response->get_error_message();
                                echo json_encode( array( 'rtwbmal_status' => 0, 'rtwbmal_message' => $rtwbmal_error_msg ) );
                                wp_die();
                            }
                            else{
                                $rtwbmal_wp_user_id = $response;
                                wp_new_user_notification( $response, '', 'both' );
                            }
                        }
                        else{
                            
                            $rtwbmal_error_msg = esc_html__( 'Please Enter Correct Email.', 'rtwbmal-book-my-appointment' );
                            echo json_encode( array( 'rtwbmal_status' => 0, 'rtwbmal_message' => $rtwbmal_error_msg ) );
                            wp_die();
                        }
                    }
                    elseif( !empty($rtwbmal_get_wp_user) ){
                        $rtwbmal_wp_user_id = $rtwbmal_get_wp_user->ID;
                    }
                    elseif( $rtwbmal_wp_user != 0 )
                    {
                        $rtwbmal_wp_user_id = $rtwbmal_wp_user;
                    }

                    $rtwbmal_services  = array();
                    $rtwbmal_prices = array();
                    if(is_array($_POST['rtwbmal_service']) && !empty($_POST['rtwbmal_service']))
                    {
                        foreach( $_POST['rtwbmal_service'] as $ser => $ser_id )
                        {
                            $serv = sanitize_text_field($ser);
                            
                            if( sanitize_text_field( $ser_id ) == 'true' )
                            {
                                $rtwbmal_services[explode("rtwbmal_", $serv)[1]] = sanitize_text_field( $ser_id );
                            }
                        }
                    }
                    if(is_array($_POST['rtwbmal_prices']) && !empty($_POST['rtwbmal_prices']))
                    {
                        foreach( $_POST['rtwbmal_prices'] as $pric => $prices )
                        {
                            $pri = sanitize_text_field($pric);
                            if( $prices != 0 )
                            {
                                $rtwbmal_pri_min_max = array( 'price' => sanitize_text_field( 
                                                            $prices['price']),
                                                            'min' => sanitize_text_field( 
                                                                $prices['min']),
                                                            'max' => sanitize_text_field( 
                                                                $prices['max'])
                                        );
                                $rtwbmal_prices[explode("rtwbmal_", $pri)[1]] =  $rtwbmal_pri_min_max;
                            }
                        }
                    }

                    $rtwbmal_day_off = [];
                    if(is_array($_POST['rtwbmal_active_days']) && !empty($_POST['rtwbmal_active_days']))
                    {
                        foreach( $_POST['rtwbmal_active_days'] as $days => $day )
                        {
                            if( sanitize_text_field( $day ) != '' )
                            {
                                $rtwbmal_day_off[ sanitize_text_field( $days ) ] = sanitize_text_field( $day );
                            }
                        }
                    }
                            
                    $rtwbmal_emp_location = array();
                    if(is_array($_POST['rtwbmal_emp_location']) && !empty($_POST['rtwbmal_emp_location']))
                    {
                        foreach ( $_POST['rtwbmal_emp_location'] as $key => $value ) {
                            $rtwbmal_emp_location[sanitize_text_field($key)] = json_decode(sanitize_text_field( $value ));
                        }
                    }

                    $rtwbmal_emp_location   = serialize( $rtwbmal_emp_location );
                    $attachment_id = sanitize_text_field( $_POST[ 'attachment_id' ] );
                    $rtwbmal_display_order = ( $_POST[ 'rtwbmal_display_order' ] );

                    $rtwbmal_strt = ($_POST['rtwbmal_strt']);
                    $rtwbmal_end  = ($_POST['rtwbmal_end']);

                    $rtwbmal_break_strt = ($_POST['rtwbmal_break_strt']);
                    $rtwbmal_break_end  = ($_POST['rtwbmal_break_end']);

                    $rtwbmal_inserted = $wpdb->insert(
                        $wpdb->prefix.'rtwbma_employees',
                        array(
                            'wp_user_id' => $rtwbmal_wp_user_id,
                            'first_name'      => $rtwbmal_emp_fname,
                            'last_name'   => $rtwbmal_emp_lname,
                            'email'     => $rtwbmal_emp_email,
                            'phone'       => $rtwbmal_emp_phone_no,
                            'visibility' => $rtwbmal_emp_visible,
                            'attachment_id' => $attachment_id,
                            'display_order' => $rtwbmal_display_order,
                            'visibility'   => $rtwbmal_emp_visible,
                            'address' => $rtwbmal_emp_address,
                            'info' => $rtwbmal_emp_description,
                        )
                    );

                    $rtwbmal_lastid = $wpdb->insert_id;

                    if(is_array($rtwbmal_services) && !empty($rtwbmal_services))
                    {
                        foreach( $rtwbmal_services as $ser_id => $service )
                        {
                            $rtwbmal_inserted = $wpdb->insert(
                                $wpdb->prefix.'rtwbma_emp_services',
                                array(
                                    'emp_id'        => $rtwbmal_lastid ,
                                    'service_id'    => $ser_id,
                                    'loc_id'        => $rtwbmal_emp_location,
                                    'price'         => $rtwbmal_prices[$ser_id]['price'],
                                    'cap_min'       => $rtwbmal_prices[$ser_id]['min'],
                                    'cap_max'       => $rtwbmal_prices[$ser_id]['max'],
                                    'active'        => 1
                                )
                            );
                        }
                    }

                    if( $rtwbmal_inserted ){

                        $i=1;
                        if(is_array($rtwbmal_strt) && !empty($rtwbmal_strt))
                        {
                            foreach ($rtwbmal_strt as $strt => $time)
                            {
                                 $rtwbmal_emp_updated = $wpdb->insert(
                                    $wpdb->prefix.'rtwbma_emp_working_hour',
                                    array(
                                        'emp_id'  => $rtwbmal_lastid,
                                        'days'     => $i,
                                        'active'   => $rtwbmal_day_off[$i],
                                        'strt_time' => $time['in'],
                                        'end_time' => $rtwbmal_end[$i]
                                    )
                                );
                                $i++;
                            }
                        }

                        $ii=1;
                        if(is_array($rtwbmal_break_strt) && !empty($rtwbmal_break_strt))
                        {
                            foreach ( $rtwbmal_break_strt as $strt => $break ) 
                            {
                                foreach ($break['in'] as $k => $v) 
                                {
                                
                                  $rtwbmal_emp_updated =  $wpdb->insert(
                                        $wpdb->prefix.'rtwbma_emp_hour_break',
                                        array(
                                            'emp_id'  => $rtwbmal_lastid,
                                            'days'     => $ii,
                                            'strt_time' => $v,
                                            'end_time' => $rtwbmal_break_end[$ii][0]
                                        )
                                    );
                                }
                                
                                $ii++;
                            }
                        }
                        $rtwbmal_message = esc_html__( 'Employee Added', 'rtwbmal-book-my-appointment' );
                    }
                    else{
                        $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                    }

                    echo json_encode( array( 'rtwbmal_status' => $rtwbmal_inserted, 'rtwbmal_message' => $rtwbmal_message ) );
                    wp_die();
                }
                else{
                    echo json_encode( array( 'rtwbmal_status' => 0, 'rtwbmal_message' => esc_html__('Maximum number of employees added.', 'rtwbmal-book-my-appointment') ) );
                    wp_die();
                }
            }
        }
    }

    /**
     * Funtion to edit employee data
     * @since    1.0.0
     */
    function rtwbmal_emp_edit_callback(){
         $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_emp_id      = sanitize_text_field( $_POST[ 'rtwbmal_emp_id' ] );

                $rtwbmal_get_emp_detail = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees WHERE id=%d", $rtwbmal_emp_id ), ARRAY_A );

                $rtwbmal_get_emp_detail[0]['attachment_url'] = wp_get_attachment_url( $rtwbmal_get_emp_detail[0]['attachment_id'] );

                $rtwbmal_get_emp_wrkng_hour = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_working_hour WHERE emp_id=%d", $rtwbmal_emp_id ), ARRAY_A );

                $rtwbmal_get_emp_break_hour = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_hour_break WHERE emp_id=%d", $rtwbmal_emp_id ), ARRAY_A );

                $rtwbmal_get_emp_services = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_services WHERE emp_id=%d AND active=%d", $rtwbmal_emp_id, 1 ), ARRAY_A );
           
                if( isset( $rtwbmal_get_emp_services ) && is_array( $rtwbmal_get_emp_services ) && !empty( $rtwbmal_get_emp_services ) )
                {
                    foreach( $rtwbmal_get_emp_services as $emp_service => $loc )
                    {
                        $rtwbmal_get_emp_services[$emp_service]['loc_id'] = unserialize( $rtwbmal_get_emp_services[$emp_service]['loc_id'] );
                    }
                }
                
                $rtwbmal_status = 1;
                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_get_emp_detail' => $rtwbmal_get_emp_detail[0], 'rtwbmal_get_emp_wrkng_hour' => $rtwbmal_get_emp_wrkng_hour,
                'rtwbmal_get_emp_break_hour' => $rtwbmal_get_emp_break_hour,
                'rtwbmal_get_emp_services' => $rtwbmal_get_emp_services ) );
                wp_die();
            }
        }
    }

    /** 
     * Funtion to update employee data
     * @since    1.0.0
     */
    function rtwbmal_emp_update_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_emp_id      = sanitize_text_field( $_POST[ 'rtwbmal_emp_id' ] );
                $rtwbmal_wp_user     = sanitize_text_field( $_POST[ 'rtwbmal_wp_user' ] );
                $rtwbmal_emp_fname   = sanitize_text_field( $_POST[ 'rtwbmal_emp_fname' ] );
                $rtwbmal_emp_lname   = sanitize_text_field( $_POST[ 'rtwbmal_emp_lname' ] );
                $rtwbmal_emp_email   = sanitize_text_field( $_POST[ 'rtwbmal_emp_email' ] );
                $rtwbmal_emp_phone_no     = sanitize_text_field( $_POST[ 'rtwbmal_emp_phone_no' ] );
                $rtwbmal_emp_visible      = sanitize_text_field( $_POST[ 'rtwbmal_emp_visible' ] );
                $rtwbmal_emp_address      = sanitize_text_field( $_POST[ 'rtwbmal_emp_address' ] );
                $rtwbmal_emp_description  = sanitize_text_field( $_POST[ 'rtwbmal_emp_description' ] );

                $rtwbmal_emp_location        = serialize( $_POST[ 'rtwbmal_emp_location' ] );
                $rtwbmal_services  = array();
                $rtwbmal_prices = array();
                $rtwbmal_no_service = array();
                if(is_array($_POST['rtwbmal_service']) && !empty($_POST['rtwbmal_service']))
                {
                    foreach( $_POST['rtwbmal_service'] as $ser => $ser_id )
                    {
                        $serv = sanitize_text_field($ser);
                        
                        if( sanitize_text_field( $ser_id ) == 'true' )
                        {
                            $rtwbmal_services[explode("rtwbmal_", $serv)[1]] = sanitize_text_field( $ser_id );
                        }
                        else{
                            $rtwbmal_no_service[explode("rtwbmal_", $serv)[1]] = explode("rtwbmal_", $serv)[1];
                        }
                    }
                }
                if(is_array($_POST['rtwbmal_prices']) && !empty($_POST['rtwbmal_prices']))
                {
                    foreach( $_POST['rtwbmal_prices'] as $pric => $prices )
                    {
                        $pri = sanitize_text_field($pric);
                        if( $prices != 0 )
                        {
                            $rtwbmal_pri_min_max = array( 'price' => sanitize_text_field( 
                                                        $prices['price']),
                                                        'min' => sanitize_text_field( 
                                                            $prices['min']),
                                                        'max' => sanitize_text_field( 
                                                            $prices['max'])
                                    );
                            $rtwbmal_prices[explode("rtwbmal_", $pri)[1]] =  $rtwbmal_pri_min_max;
                        }
                    }
                }
                $rtwbmal_day_off = [];
                if(is_array($_POST['rtwbmal_active_days']) && !empty($_POST['rtwbmal_active_days']))
                {
                    foreach( $_POST['rtwbmal_active_days'] as $days => $day )
                    {
                        if( sanitize_text_field( $day ) != '' )
                        {
                            $rtwbmal_day_off[ sanitize_text_field( $days ) ] = sanitize_text_field( $day );
                        }
                    }
                }


                $attachment_id =  $_POST[ 'attachment_id' ] ;
                $rtwbmal_display_order =  $_POST[ 'rtwbmal_display_order' ];

                $rtwbmal_strt = $_POST['rtwbmal_strt'] ;

                $rtwbmal_end  = $_POST['rtwbmal_end'] ;
                $rtwbmal_break_strt = $_POST['rtwbmal_break_strt'] ;
                $rtwbmal_break_end  = $_POST['rtwbmal_break_end'] ;

                $rtwbmal_emp_updated = $wpdb->update(
                    $wpdb->prefix.'rtwbma_employees',
                    array(
                        'first_name'    => $rtwbmal_emp_fname,
                        'wp_user_id'    => $rtwbmal_wp_user,
                        'last_name'     => $rtwbmal_emp_lname,
                        'email'         => $rtwbmal_emp_email,
                        'phone'         => $rtwbmal_emp_phone_no,
                        'visibility'    => $rtwbmal_emp_visible,
                        'attachment_id' => $attachment_id,
                        'display_order' => $rtwbmal_display_order,
                        'address'       => $rtwbmal_emp_address,
                        'info'          => $rtwbmal_emp_description
                    ),
                    array(
                        'id'            => $rtwbmal_emp_id
                    )
                );


                $rtwbmal_emp_services	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_services WHERE emp_id=%d", $rtwbmal_emp_id  ), ARRAY_A );
                $ser_ids = array();
                if(is_array($rtwbmal_emp_services) && !empty($rtwbmal_emp_services))
                {
                    foreach ($rtwbmal_emp_services as $key => $id) {
                        $ser_ids[] = $id['service_id']; 
                    }
                }

                if(is_array($rtwbmal_services) && !empty($rtwbmal_services))
                {
                    foreach( $rtwbmal_services as $ser_id => $service )
                    {
                        if( in_array( $ser_id, $ser_ids ) )
                        {
                            $rtwbmal_emp_updated = $wpdb->update(
                                $wpdb->prefix.'rtwbma_emp_services',
                                array(
                                    'loc_id'        => $rtwbmal_emp_location,
                                    'price'         => $rtwbmal_prices[$ser_id]['price'],
                                    'cap_min'       => $rtwbmal_prices[$ser_id]['min'],
                                    'cap_max'       => $rtwbmal_prices[$ser_id]['max'],
                                    'active'        => 1
                                ),
                                array(
                                    'emp_id' => $rtwbmal_emp_id,
                                    'service_id' => $ser_id
                                )
                            );
                        }
                        else{
                            $rtwbmal_emp_updated = $wpdb->insert(
                                $wpdb->prefix.'rtwbma_emp_services',
                                array(
                                    'loc_id'        => $rtwbmal_emp_location,
                                    'price'         => $rtwbmal_prices[$ser_id]['price'],
                                    'service_id'  	=> $ser_id,
                                    'emp_id'		=> $rtwbmal_emp_id,
                                    'cap_min'		=> $rtwbmal_prices[$ser_id]['min'],
                                    'cap_max'		=> $rtwbmal_prices[$ser_id]['max'],
                                    'active'        => 1
                                )
                            );
                        }
                    }
                }
                if(is_array($rtwbmal_no_service) && !empty($rtwbmal_no_service))
                {
                    foreach( $rtwbmal_no_service as $serv_id => $service )
                    {
                        $rtwbmal_emp_updated = $wpdb->update(
                            $wpdb->prefix.'rtwbma_emp_services',
                            array(
                                'active' => 0,
                                'emp_id' => $rtwbmal_emp_id
                            ),
                            array(
                                'emp_id' => $rtwbmal_emp_id,
                                'service_id' => $service
                            )
                        );
                    }
                }
                $rtwbmal_emp_updated = '';
                $ii = 1;
   
                if(is_array($rtwbmal_strt) && !empty($rtwbmal_strt))
                {
                    foreach ($rtwbmal_strt as $strt => $time)
                    {
                        $rtwbmal_emp_updated =  $wpdb->query( $wpdb->prepare( "UPDATE ".$wpdb->prefix.'rtwbma_emp_working_hour'." SET emp_id='%d', days='%d', strt_time='%s', end_time='%s', active=%d  WHERE id='".$time['indx']."'", $rtwbmal_emp_id, $ii, $time['in'], $rtwbmal_end[$ii], $rtwbmal_day_off[$time['indx']] ) );

                        $ii++;
                    }
                }
                
                $iii = 1;
                if(is_array($rtwbmal_break_strt) && !empty($rtwbmal_break_strt))
                {
                    foreach ($rtwbmal_break_strt as $strt => $break) {
                        foreach ($break['in'] as $k => $v) {
                            $val = $break['indx'][0];
                            $rtwbmal_emp_updated = $wpdb->query( $wpdb->prepare( "UPDATE ".$wpdb->prefix.'rtwbma_emp_hour_break'." SET emp_id='%d', days='%d', strt_time='%s', end_time='%s'  
                            WHERE id='$val'", 
                            $rtwbmal_emp_id, $iii, $v, $rtwbmal_break_end[$iii][0] ) ); 
                        }
                        $iii++;
                    }
                }
                $rtwbmal_emp_updated = 1;
                if( $rtwbmal_emp_updated )
                {
                    $rtwbmal_message = esc_html__( 'Updated', 'rtwbmal-book-my-appointment' );
                }
                else
                {
                    $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_emp_updated, 'rtwbmal_message' => $rtwbmal_message ) );
                wp_die();
            }
        }
    }

    /**
     * Funtion to delete employee
     * @since    1.0.0
     */
    function rtwbmal_emp_delete_callback(){
        $rtwbmal_emp_id = sanitize_text_field( $_POST[ 'rtwbmal_emp_id' ] );

        global $wpdb;
        $rtwbmal_emp_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_employees', array( 'id' => $rtwbmal_emp_id ), array( '%d' ) );

        if( $rtwbmal_emp_deleted ){
            //delete from employee location
            $rtwbmal_emp_loc_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_emp_loc', array( 'emp_id' => $rtwbmal_emp_id ), array( '%d' ) );

            //delete from appointments
            $rtwbmal_appointments_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_appointments', array( 'emp_id' => $rtwbmal_emp_id ), array( '%d' ) );

            $rtwbmal_appointments_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_emp_services', array( 'emp_id' => $rtwbmal_emp_id ), array( '%d' ) );

            $rtwbmal_appointments_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_emp_working_hour', array( 'emp_id' => $rtwbmal_emp_id ), array( '%d' ) );

            $rtwbmal_appointments_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_emp_hour_break', array( 'emp_id' => $rtwbmal_emp_id ), array( '%d' ) );

            $rtwbmal_message    = esc_html__( 'Deleted', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = true;
        }
        else{
            $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = false;
        }

        echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
        wp_die();
    }

    /**
     * Funtion to add category
     * @since    1.0.0
     */
    function rtwbmal_add_category_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );
        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_length        = sanitize_text_field( $_POST[ 'length' ] );
                if( $rtwbmal_length < 1 )
                {
                    $rtwbmal_cat_id        = sanitize_text_field( $_POST[ 'rtwbmal_cat_id' ] );
                    $rtwbms_cat_name        = sanitize_text_field( $_POST[ 'rtwbms_cat_name' ] );
                    $rtwbmal_display_ordr        = sanitize_text_field( $_POST[ 'rtwbmal_display_ordr' ] );

                    $rtwbmal_inserted = $wpdb->insert(
                        $wpdb->prefix.'rtwbma_categories',
                        array(
                            'display_order' => 3,
                            'title'      => $rtwbms_cat_name
                        )
                    );
                    $rtwbmal_status = 0;
                    if( $rtwbmal_inserted ){

                        $rtwbmal_message = esc_html__( 'Category Added', 'rtwbmal-book-my-appointment' );
                        $rtwbmal_status = 1;
                    }
                    else{
                        $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                    }

                    echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
                    wp_die();
                }
                else{
                    echo json_encode( array( 'rtwbmal_status' => 0, 'rtwbmal_message' => esc_html__('Maximum number of categories added', 'rtwbmal-book-my-appointment') ) );
                    wp_die();
                }
            }
        }
    }

    /**
     * Funtion to edit category
     * @since    1.0.0
     */
    function rtwbmal_edit_category_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_cat_id      = sanitize_text_field( $_POST[ 'rtwbmal_cat_id' ] );
                $rtwbms_cat_name    = sanitize_text_field( $_POST['rtwbms_cat_name'] );
                $rtwbmal_display_ordr     = sanitize_text_field( $_POST['rtwbmal_display_ordr'] );

                $rtwbmal_category_updated = $wpdb->query( $wpdb->prepare( "UPDATE ".$wpdb->prefix.'rtwbma_categories'." SET  title='%s', display_order='%d' WHERE id='%d'", $rtwbms_cat_name, $rtwbmal_display_ordr, $rtwbmal_cat_id ) );

                if( $rtwbmal_category_updated ){
                    $rtwbmal_message    = esc_html__( 'Updated', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = true;
                }
                else{
                    $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = false;
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
            }
        }
        wp_die();
    }

    /**
     * Funtion to delete category
     * @since    1.0.0
     */
    function rtwbmal_cat_delete_callback(){
        $rtwbmal_cat_id = sanitize_text_field( $_POST[ 'rtwbmal_cat_id' ] );

        global $wpdb;
        $rtwbmal_cat_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_categories', array( 'id' => $rtwbmal_cat_id ), array( '%d' ) );

        if( $rtwbmal_cat_deleted ){
            
            $rtwbmal_service_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_services', array( 'cat_id' => $rtwbmal_cat_id ), array( '%d' ) );

            $rtwbmal_message    = esc_html__( 'Deleted', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = true;
        }
        else{
            $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = false;
        }

        echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
        wp_die();
    }

    /**
     *  Funtion to add service
     * @since    1.0.0
     */
    function rtwbmal_service_add_callback(){
        $rtwbmal_service_id = sanitize_text_field( $_POST[ 'rtwbmal_service_add' ] );

        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_lentgh = sanitize_text_field( $_POST[ 'length' ] );
                if( $rtwbmal_length < 3 )
                {
                    $rtwbmal_service_name        = sanitize_text_field( $_POST[ 'rtwbmal_service_name' ] );
                    $rtwbmal_attachment_id        = sanitize_text_field( $_POST[ 'rtwbmal_attachment_id' ] );
                    $rtwbmal_service_price        = sanitize_text_field( $_POST[ 'rtwbmal_service_price' ] );
                    $rtwbmal_service_catg        = sanitize_text_field( $_POST[ 'rtwbmal_service_catg' ] );
                    $rtwbmal_service_emp        = sanitize_text_field( $_POST[ 'rtwbmal_service_emp' ] );
                    $rtwbmal_service_time        = sanitize_text_field( $_POST[ 'rtwbmal_service_time' ] );
                    $rtwbmal_color       = sanitize_text_field( $_POST['rtwbmal_color']);
                    $rtwbmal_service_time_gap    = sanitize_text_field( $_POST[ 'rtwbmal_service_time_gap' ] );
                    $rtwbmal_service_min_cap        = sanitize_text_field( $_POST[ 'rtwbmal_service_min_cap' ] );
                    $rtwbmal_service_max_cap        = sanitize_text_field( $_POST[ 'rtwbmal_service_max_cap' ] );
                    $rtwbmal_address     = sanitize_text_field( $_POST[ 'rtwbmal_address' ] );
                    $rtwbmal_service_description = sanitize_text_field( $_POST[ 'rtwbmal_desc' ] );
                    $rtwbmal_service_status = sanitize_text_field( $_POST[ 'rtwbmal_service_status' ] );

                    $rtwbmal_inserted = $wpdb->insert(
                        $wpdb->prefix.'rtwbma_services',
                        array(
                            'cat_id'        => $rtwbmal_service_catg,
                            'color'         => $rtwbmal_color,
                            'title'         => $rtwbmal_service_name,
                            'status'        => $rtwbmal_service_status,
                            'price'         => $rtwbmal_service_price,
                            'duration'      => $rtwbmal_service_time,
                            'gap'           => $rtwbmal_service_time_gap,
                            'min_capacity'  => $rtwbmal_service_min_cap,
                            'max_capacity'  => $rtwbmal_service_max_cap,
                            'visibility'    => 1,
                            'attachment_id' => $rtwbmal_attachment_id,
                            'display_order' => '',
                            'address'       => $rtwbmal_address,
                            'description'   => $rtwbmal_service_description
                        )
                    );

                    if( $rtwbmal_inserted ){

                        $rtwbmal_message = esc_html__( 'Service Added', 'rtwbmal-book-my-appointment' );
                    }
                    else{
                        $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                    }

                    echo json_encode( array( 'rtwbmal_status' => $rtwbmal_inserted, 'rtwbmal_message' => $rtwbmal_message ) );
                    wp_die();
                }
                else{
                    echo json_encode( array( 'rtwbmal_status' => 0, 'rtwbmal_message' => esc_html__('Maximum number of services added', 'rtwbmal-book-my-appointment') ) );
                    wp_die();
                }
            }
        }
    }

     /**
     * Funtion to edit service
     * @since    1.0.0
     */
    function rtwbmal_service_edit_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_service_id      = sanitize_text_field( $_POST[ 'rtwbmal_service_id' ] );
                $rtwbmal_color       = sanitize_text_field( $_POST['rtwbmal_color']);
                $rtwbmal_attachment_id    = sanitize_text_field( $_POST['rtwbmal_attachment_id'] );
                $rtwbmal_service_status   = sanitize_text_field( $_POST['rtwbmal_service_status'] );
                $rtwbmal_service_name     = sanitize_text_field( $_POST['rtwbmal_service_name'] );
                $rtwbmal_service_price    = sanitize_text_field( $_POST['rtwbmal_service_price'] );

                $rtwbmal_service_catg = sanitize_text_field( $_POST['rtwbmal_service_catg'] );

                $rtwbmal_service_emp      = sanitize_text_field( $_POST['rtwbmal_service_emp'] );
                $rtwbmal_service_time     = sanitize_text_field( $_POST['rtwbmal_service_time'] );
                $rtwbmal_service_time_gap = sanitize_text_field( $_POST['rtwbmal_service_time_gap'] );
                $rtwbmal_service_min_cap  = sanitize_text_field( $_POST['rtwbmal_service_min_cap'] );
                $rtwbmal_service_max_cap  = sanitize_text_field( $_POST['rtwbmal_service_max_cap'] );
                $rtwbmal_address    = sanitize_text_field( $_POST['rtwbmal_address'] );
                $rtwbmal_desc       = sanitize_text_field( $_POST['rtwbmal_desc'] );


                $rtwbmal_service_updated = $wpdb->query( $wpdb->prepare( "UPDATE ".$wpdb->prefix.'rtwbma_services'." SET id='%d', cat_id='%s', status='%d', title='%s', price='%s', duration='%d', gap='%d', min_capacity='%d', max_capacity='%d', visibility='%d', attachment_id='%d', color='%s', display_order='%d', address='%s', description='%s'  WHERE id='$rtwbmal_service_id'", $rtwbmal_service_id, $rtwbmal_service_catg, $rtwbmal_service_status, $rtwbmal_service_name, $rtwbmal_service_price, $rtwbmal_service_time, $rtwbmal_service_time_gap, $rtwbmal_service_min_cap, $rtwbmal_service_max_cap, 1, $rtwbmal_attachment_id, $rtwbmal_color, 1, $rtwbmal_address, $rtwbmal_desc) );

                $rtwbmal_service_updated = 1;
                if( $rtwbmal_service_updated ){

                    $rtwbmal_message    = esc_html__( 'Updated', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = true;
                }
                else{
                    $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = false;
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
            }
        }
        wp_die();
    }

    /**
     * Funtion to delete service
     * @since    1.0.0
     */
    function rtwbmal_service_delete_callback(){
        $rtwbmal_service_id = sanitize_text_field( $_POST[ 'rtwbmal_service_id' ] );

        global $wpdb;
        $rtwbmal_service_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_services', array( 'id' => $rtwbmal_service_id ), array( '%d' ) );

        if( $rtwbmal_service_deleted ){
            $rtwbmal_get_appointment_ids = $wpdb->get_results( $wpdb->prepare( "SELECT id FROM ".$wpdb->prefix."rtwbma_appointments WHERE service_id=%d", $rtwbmal_service_id ), ARRAY_A );
            
            //delete from appointment
            $rtwbmal_appointment_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_appointments', array( 'service_id' => $rtwbmal_service_id ), array( '%d' ) );
                
            //delete from customer appointment
            if( $rtwbmal_appointment_deleted ){
                $rtwbmal_cust_appoint_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_appointments', array( 'appointment_id' => $rtwbmal_service_id ), array( '%d' ) );
            }

            $rtwbmal_message    = esc_html__( 'Deleted', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = true;
        }
        else{
            $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = false;
        }

        echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
        wp_die();
    }

    /**
     * Funtion to get service row data 
     * @since    1.0.0
     */
    function rtwbmal_edit_service_row_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_service_id      = sanitize_text_field( $_POST[ 'rtwbmal_service_id' ] );

                $rtwbmal_get_service_ids = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_services WHERE id=%d", $rtwbmal_service_id ), ARRAY_A );

                if( $rtwbmal_get_service_ids ){

                    $rtwbmal_status     = true;
                }
                else{
                    $rtwbmal_status     = false;
                }
                
                $rtwbmal_get_service_ids[0]['image_url'] = wp_get_attachment_url( $rtwbmal_get_service_ids[0]['attachment_id'] );
                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_get_service_ids[0] ) );
                wp_die();
            }
        }
    }

    /**
    * Funtion to get services according to category id
    * @since    1.0.0
    */
    function rtwbmal_service_category_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_cat_id      = sanitize_text_field( $_POST[ 'rtwbmal_cat_id' ] );
                if( $rtwbmal_cat_id != 0 )
                {
                    $rtwbmal_get_service_ids = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_services WHERE cat_id=%d", $rtwbmal_cat_id ), ARRAY_A );
                }
                else{
                    $rtwbmal_get_service_ids = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_services ORDER BY `display_order` ASC LIMIT %d", 20 ), ARRAY_A );
                }


                $html = '';
                if(is_array($rtwbmal_get_service_ids) && !empty($rtwbmal_get_service_ids))
                {
                    foreach( $rtwbmal_get_service_ids as $rtwbmal_key => $rtwbmal_value ){
                        $rtwbmal_duration = $rtwbmal_value[ 'duration' ];
                        $rtwbmal_hour = floor( $rtwbmal_duration / 60 );
                        $rtwbmal_min = ( $rtwbmal_duration - floor( $rtwbmal_duration / 60 ) * 60 );
            
                    $html .=   '<li class="rtwbmal_single_service">
                            <div class="rtwbmal_service_img">';

                    $html .= '<img src=" ' .esc_url( wp_get_attachment_url( $rtwbmal_value[ 'attachment_id' ] ) ) .'" alt="service_img" />
                            </div>
                            <div class="rtwbmal_service_name_price_duration">
                                <div class="rtwbmal_service_name">';

                    $html .= esc_html($rtwbmal_value[ 'title' ]) .'
                                </div>
                                <div class="rtwbmal_service_price">';
                    $html .= esc_html($rtwbmal_value[ 'price' ]).'
                                </div>
                                <div class="rtwbmal_service_duration">';
                        if( $rtwbmal_hour != 0 ){
                    $html .= $rtwbmal_hour.esc_html__( 'hr', 'rtwbmal-book-my-appointment' );
                        }
                        if( $rtwbmal_min != 0 ){
                    $html .=  ' '.$rtwbmal_min.esc_html__( 'min', 'rtwbmal-book-my-appointment' );
                        }
                    
                    $html .=  '</div><div class="rtwbmal_service_status">';
                        if( $rtwbmal_value[ 'status' ] == 1 ){
                            $html .= esc_html__( 'Active', 'rtwbmal-book-my-appointment' );
                        }
                        if(  $rtwbmal_value[ 'status' ] == 0 ){
                            $html .=esc_html__( 'Inactive', 'rtwbmal-book-my-appointment' );
                        }
                    $html .=  '</div>';

                    $html .= '<div class="rtwbmal_service_edit_del">
                                    <ul class="rtwbmal_serv_id" data-rtwbmal_service_id="' . esc_attr( $rtwbmal_value[ 'id' ] ) .'">
                                        <li><a rel="modal:open" href="#rtwbmal_service_popup" class="rtwbmal_service_edit"><i class="far fa-edit"></i></a></li>
                                        <li><a href="javascript:void(0);" class="rtwbmal_service_delete"><i class="far fa-trash-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>';          
                    } 
                }
                echo json_encode($html);
                wp_die();
            }
        }
        wp_die();
    }

    /**
     * Funtion to get events for calender
     * @since    1.0.0
     */
    function rtwbmal_get_events_callback(){
       
        global $wpdb;
        $rtwbmal_first_day_month     = date( 'Y-m-d', strtotime( 'first day of this month' ) );
        $rtwbmal_last_day_month      = date( 'Y-m-d', strtotime( 'last day of this month' ) );
        
        $rtwbmal_select = $wpdb->prefix."rtwbma_appointments.id, ".$wpdb->prefix."rtwbma_appointments.start_date, ".$wpdb->prefix."rtwbma_appointments.end_date, ".$wpdb->prefix."rtwbma_appointments.start_time, ".$wpdb->prefix."rtwbma_appointments.end_time,".$wpdb->prefix."rtwbma_services.title, ".$wpdb->prefix."rtwbma_services.color, ".$wpdb->prefix."rtwbma_customers.first_name, ".$wpdb->prefix."rtwbma_customers.phone, ".$wpdb->prefix."rtwbma_customers.email, ".$wpdb->prefix."rtwbma_customer_appointments.price, ".$wpdb->prefix."rtwbma_customer_appointments.num_of_people, ".$wpdb->prefix."rtwbma_customer_appointments.payment_id, ".$wpdb->prefix."rtwbma_appointments.app_status,".$wpdb->prefix."rtwbma_employees.id as emp_id, ".$wpdb->prefix."rtwbma_employees.attachment_id, ".$wpdb->prefix."rtwbma_employees.first_name as emp_first_name";

        $rtwbmal_all_appointments = $wpdb->get_results( $wpdb->prepare( "SELECT ".$rtwbmal_select." FROM ".$wpdb->prefix."rtwbma_appointments JOIN ".$wpdb->prefix."rtwbma_customer_appointments ON ".$wpdb->prefix."rtwbma_appointments.id = ".$wpdb->prefix."rtwbma_customer_appointments.appointment_id JOIN ".$wpdb->prefix."rtwbma_customers ON ".$wpdb->prefix."rtwbma_customer_appointments.cust_id = ".$wpdb->prefix."rtwbma_customers.id JOIN ".$wpdb->prefix."rtwbma_services ON ".$wpdb->prefix."rtwbma_appointments.service_id = ".$wpdb->prefix."rtwbma_services.id JOIN ".$wpdb->prefix."rtwbma_employees ON ".$wpdb->prefix."rtwbma_appointments.emp_id = ".$wpdb->prefix."rtwbma_employees.id WHERE `start_date` >= %s AND `start_date` <= %s ORDER BY `start_date` ASC", $rtwbmal_first_day_month, $rtwbmal_last_day_month ), ARRAY_A );

        $rtwbmal_day_arr = array();
        if(is_array($rtwbmal_all_appointments) && !empty($rtwbmal_all_appointments))
        {
            foreach( $rtwbmal_all_appointments as $rtwbmal_key => $rtwbmal_value ){
                $rtwbmal_html = '';
                $rtwbmal_app_id          = $rtwbmal_value[ 'id' ];
                $rtwbmal_service         = $rtwbmal_value[ 'title' ];
                $rtwbmal_customer        = $rtwbmal_value[ 'first_name' ];
                $rtwbmal_emp_first_name  = $rtwbmal_value['emp_first_name'];
                $rtwbmal_cust_number     = $rtwbmal_value[ 'phone' ];
                $rtwbmal_cust_mail       = $rtwbmal_value[ 'email' ];
                $rtwbmal_amount          = $rtwbmal_value[ 'price' ];
                $rtwbmal_color           = $rtwbmal_value['color'];
                $rtwbmal_strt_time       = $rtwbmal_value['start_time'];
                $rtwbmal_end_time       = $rtwbmal_value['end_time'];
                $attchment_id           = $rtwbmal_value['attachment_id'];
                $rtwbmal_amount_status   = ( $rtwbmal_value[ 'payment_id' ] ) ? esc_html__( 'Paid', 'rtwbmal-book-my-appointment' ) : esc_html__( 'Pending', 'rtwbmal-book-my-appointment' );
                $rtwbmal_capacity        = $rtwbmal_value[ 'num_of_people' ];
                $rtwbmal_status          = esc_html__( 'Pending', 'rtwbmal-book-my-appointment' );
                
                if( $rtwbmal_value[ 'app_status' ] == '1' ){
                    $rtwbmal_status = esc_html__( 'Approved', 'rtwbmal-book-my-appointment' );
                }
                if( $rtwbmal_value[ 'app_status' ] == '2' ){
                    $rtwbmal_status = esc_html__( 'Cancelled', 'rtwbmal-book-my-appointment' );
                }
                if( $rtwbmal_value[ 'app_status' ] == '3' ){
                    $rtwbmal_status = esc_html__( 'Rejected', 'rtwbmal-book-my-appointment' );
                }

                $rtwbmal_day_indx  = date( 'D', strtotime($rtwbmal_value[ 'start_date' ]) );
                
                if( $rtwbmal_day_indx == 'Sat' || $rtwbmal_day_indx == 'Fri' )
                {
                    $rtwbmal_html .= '<div class="rtwbmal_cal_content">
                        <div class="rtwbmal_cal_title">
                        '.date('h:m a', strtotime($rtwbmal_strt_time)).' ' .$rtwbmal_service .'
                        </div>
                    <div class="rtwbmal_event_hover_info rtwbmal_event_right_info">';
                }
                else{

                    $rtwbmal_html .= '<div class="rtwbmal_cal_content">
                        <div class="rtwbmal_cal_title">
                        '.date('h:m a', strtotime($rtwbmal_strt_time)).' ' .$rtwbmal_service .'
                        </div>
                    <div class="rtwbmal_event_hover_info">';
                }
                
                $rtwbmal_html .= '<div class="rtwbmal_event_hover_inner">
                                    <div class="rtwbmal_event_header">
                                        <div class="rtwbmal_event_emp_img">
                                            <img src="'. esc_attr( wp_get_attachment_image_url( $attchment_id ) ).'"/>
                                        </div>
                                        <div class="rtwbmal_event_emp_name">
                                            <div class="rtwbmal_event_emp">'.esc_html__('Employee','rtwbmal-book-my-appointment').'</div>
                                            <div class="rtwbmal_event_emp_title">'.esc_attr($rtwbmal_emp_first_name).'</div>
                                        </div>
                                    </div>
                                    <div class="rtwbmal_event_body">
                                        <div class="rtwbmal_event_title_holder">'.esc_attr($rtwbmal_service).'</div>
                                        <div class="rtwbmal_event_time_holder">'.date('h:m a', strtotime($rtwbmal_strt_time)).' - '.date('h:m a', strtotime($rtwbmal_end_time)) .'</div>
                                        <div class="rtwbmal_event_customer_wrap">'.esc_attr($rtwbmal_capacity . ' Customers').'</div>
                                        <div class="rtwbmal_event_emp_location">'.esc_attr($rtwbmal_customer).'</div>
                                    </div>
                                    <div class="rtwbmal_event_footer">
                                        <div class="rtwbmal_status_holder">
                                            <i class="far fa-check-circle"></i>
                                        </div>
                                        <div class="rtwbmal_event_edit">
                                            <a rel="modal:open" href="#rtwbmal_popup"><i class="far fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';

                $rtwbmal_day_arr[] = array(
                    'id'                => $rtwbmal_app_id,
                    'start'             => $rtwbmal_value[ 'start_date' ],
                    'end'               => $rtwbmal_value[ 'start_date' ],
                    'description'       => $rtwbmal_html,
                    'color'             => $rtwbmal_color,
                    'className'         => 'rtwbmal_appoint_'.$rtwbmal_value[ 'id' ],
                    'rtwbmal_event_id'   => $rtwbmal_value[ 'id' ],
                    'service_name'      => $rtwbmal_service,
                    'customer_name'     => $rtwbmal_customer,
                    'cust_no'           => $rtwbmal_cust_number,
                    'cust_mail'         => $rtwbmal_cust_mail,
                    'amount'            => $rtwbmal_amount,
                    'amount_status'     => $rtwbmal_amount_status,
                    'capacity'          => $rtwbmal_capacity,
                    'status'            => $rtwbmal_status,
                    'color'             => $rtwbmal_color,
                    'start_time'        => $rtwbmal_strt_time,
                    'end_time'          => $rtwbmal_end_time
                );
            }
        }
        
        echo json_encode( $rtwbmal_day_arr );
        wp_die();
    }

    /**
     * Funtion to get single event details
     * @since    1.0.0
     */
    function rtwbmal_get_single_event_callback(){
        $rtwbmal_event_id = saniiz_text_field( $_POST[ 'rtwbmal_event_id' ] );

        global $wpdb;

        $rtwbmal_select = $wpdb->prefix."rtwbma_appointments.id, ".$wpdb->prefix."rtwbma_appointments.start_date, ".$wpdb->prefix."rtwbma_appointments.end_date, ".$wpdb->prefix."rtwbma_appointments.start_time, ".$wpdb->prefix."rtwbma_appointments.end_time, ".$wpdb->prefix."rtwbma_appointments.note, ".$wpdb->prefix."rtwbma_appointments.service_id, ".$wpdb->prefix."rtwbma_services.title, ".$wpdb->prefix."rtwbma_customers.id as cus_id, ".$wpdb->prefix."rtwbma_customers.phone, ".$wpdb->prefix."rtwbma_customers.email, ".$wpdb->prefix."rtwbma_customer_appointments.price, ".$wpdb->prefix."rtwbma_customer_appointments.num_of_people, ".$wpdb->prefix."rtwbma_customer_appointments.payment_id, ".$wpdb->prefix."rtwbma_appointments.status, ".$wpdb->prefix."rtwbma_appointments.emp_id";

        $rtwbmal_appointment = $wpdb->get_results( $wpdb->prepare( "SELECT ".$rtwbmal_select." FROM ".$wpdb->prefix."rtwbma_appointments JOIN ".$wpdb->prefix."rtwbma_customer_appointments ON ".$wpdb->prefix."rtwbma_appointments.id = ".$wpdb->prefix."rtwbma_customer_appointments.appointment_id JOIN ".$wpdb->prefix."rtwbma_customers ON ".$wpdb->prefix."rtwbma_customer_appointments.cust_id = ".$wpdb->prefix."rtwbma_customers.id JOIN ".$wpdb->prefix."rtwbma_services ON ".$wpdb->prefix."rtwbma_appointments.service_id = ".$wpdb->prefix."rtwbma_services.id WHERE ".$wpdb->prefix."rtwbma_appointments.id = %d ORDER BY `start_date` ASC", $rtwbmal_event_id ), ARRAY_A );

        echo json_encode( $rtwbmal_appointment[0] );
        wp_die();
    }

    /**
     * Funtion to get array of times with half hour intervals
     * @since    1.0.0
     */
    function rtwbmal_emp_wrkng_hours( $lower = 0, $upper = 86400, $step = 1800 ) {
        $times = array();

        $format = '';
        if ( empty( $format ) ) {
            $format = 'g:i A';
        }
        foreach ( range( $lower, $upper, $step ) as $increment ) {
            $increment = gmdate( 'H:i:s', $increment );
            
            list( $hour, $minutes ) = explode( ':', $increment );
            
            $date = new DateTime( $hour . ':' . $minutes );
            
            $times[(string) $increment] = $date->format( $format );
        }
        
        return $times;
    }
    
    /**
     * Funtion to add customer
     * @since    1.0.0
     */
    function rtwbmal_customer_add_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_attach_id        = sanitize_text_field( $_POST[ 'rtwbmal_attach_id' ] );
                $rtwbmal_cus_fname        = sanitize_text_field( $_POST[ 'rtwbmal_cus_fname' ] );
                $rtwbmal_cus_lname        = sanitize_text_field( $_POST[ 'rtwbmal_cus_lname' ] );
                $rtwbmal_cus_gender        = sanitize_text_field( $_POST[ 'rtwbmal_cus_gender' ] );
                $rtwbmal_cus_email        = sanitize_text_field( $_POST[ 'rtwbmal_cus_email' ] );
                $rtwbmal_cus_phone        = sanitize_text_field( $_POST[ 'rtwbmal_cus_phone' ] );
                $rtwbmal_cus_dob    = sanitize_text_field( $_POST[ 'rtwbmal_cus_dob' ] );
                $rtwbmal_cus_country        = sanitize_text_field( $_POST[ 'rtwbmal_cus_country' ] );
                $rtwbmal_cus_state        = sanitize_text_field( $_POST[ 'rtwbmal_cus_state' ] );
                $rtwbmal_cus_address     = sanitize_text_field( $_POST[ 'rtwbmal_cus_address' ] );
                $rtwbmal_cus_city     = sanitize_text_field( $_POST[ 'rtwbmal_cus_city' ] );
                $rtwbmal_cus_post = sanitize_text_field( $_POST[ 'rtwbmal_cus_post' ] );
                $rtwbmal_cus_info = sanitize_text_field( $_POST[ 'rtwbmal_cus_info' ] );
                $rtwbmal_cus_id = sanitize_text_field( $_POST[ 'rtwbmal_cus_id' ] );

                $rtwbmal_wp_user = sanitize_text_field( $_POST[ 'rtwbmal_wp_user' ] );
                $rtwbmal_cus_id = 0;
                $rtwbmal_cus_regis = date('m/d/Y h:i:s a', time());

                $rtwbmal_get_wp_user = get_user_by( 'email', $rtwbmal_cus_email );

                $rtwbmal_wp_user_id = '';
                $rtwbmal_error_msg = '';

                if( $rtwbmal_wp_user == 0 && empty( $rtwbmal_get_wp_user ) )
                {
                    if( is_email( $rtwbmal_cus_email ) )
                    {
                    
                        $rtwbmal_password = wp_generate_password( 12, true );
                        $rtwbmal_userdata = array( 'user_email' => $rtwbmal_cus_email,
                                        'display_name' => $rtwbmal_cus_fname,
                                        'first_name' => $rtwbmal_cus_fname,
                                        'last_name' => $rtwbmal_cus_lname,
                                        'user_pass' => $rtwbmal_password,
                                        'user_login' => $rtwbmal_cus_email );

                        $response = wp_insert_user( $rtwbmal_userdata );

                        if( is_wp_error($response) ){
                            $rtwbmal_error_msg = $response->get_error_message();
                            echo json_encode( array( 'rtwbmal_status' => 0, 'rtwbmal_message' => $rtwbmal_error_msg ) );
                            wp_die();
                        }
                        else{
                            $rtwbmal_wp_user_id = $response;
                            wp_new_user_notification( $response, '', 'both' );
                        }
                    }else{
                        $rtwbmal_error_msg = esc_html__( 'Please Enter Correct Email.', 'rtwbmal-book-my-appointment' );
                        echo json_encode( array( 'rtwbmal_status' => 0, 'rtwbmal_message' => $rtwbmal_error_msg ) );
                        wp_die();
                    }
                }
                elseif( !empty($rtwbmal_get_wp_user) ){
                    $rtwbmal_wp_user_id = $rtwbmal_get_wp_user->ID;
                }
                elseif( $rtwbmal_wp_user != 0 )
                {
                    $rtwbmal_wp_user_id = $rtwbmal_wp_user;
                }


                $rtwbmal_inserted = $wpdb->insert(
                    $wpdb->prefix.'rtwbma_customers',
                    array(
                        'wp_user_id'      => $rtwbmal_wp_user_id,
                        'first_name'   => $rtwbmal_cus_fname,
                        'last_name'     => $rtwbmal_cus_lname,
                        'email'       => $rtwbmal_cus_email,
                        'phone' => $rtwbmal_cus_phone,
                        'gender' => $rtwbmal_cus_gender,
                        'birthday' => $rtwbmal_cus_dob,
                        'country'   => $rtwbmal_cus_country,
                        'state' => $rtwbmal_cus_state,
                        'city' => $rtwbmal_cus_city,
                        'address'       => $rtwbmal_cus_address,
                        'post_code'   => $rtwbmal_cus_post,
                        'info'  => $rtwbmal_cus_info,
                        'registration_date' => $rtwbmal_cus_regis,
                        'attachment_id' => $rtwbmal_attach_id
                    )
                );

                if( $rtwbmal_inserted ){

                    $rtwbmal_message = esc_html__( 'Customer Added', 'rtwbmal-book-my-appointment' );
                }
                else{
                    $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_inserted, 'rtwbmal_message' => $rtwbmal_message ) );
                wp_die();
            }
        }
    }

    /**
     * Funtion to edit customer data
     * @since    1.0.0
     */
    function rtwbmal_edit_customer_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) ) 
            {
                global $wpdb;
                $rtwbmal_cus_id      = sanitize_text_field( $_POST[ 'rtwbma_cus_id' ] );

                $rtwbmal_get_cust = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_customers WHERE id=%d", $rtwbmal_cus_id ), ARRAY_A );
              
                $rtwbmal_get_cust[0]['attachment_url'] = wp_get_attachment_url( $rtwbmal_get_cust[0]['attachment_id'] );
                $rtwbmal_status = 1;
                $rtwbmal_get_cust[0]['emp_id'] = unserialize( $rtwbmal_get_cust[0]['emp_id'] );
                
                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_customer' => $rtwbmal_get_cust[0] ) );
                wp_die();
            }
        }
    }

    /**
     * Funtion to edit customer data
     * @since    1.0.0
     */
    function rtwbmal_customer_update_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_attach_id        = sanitize_text_field( $_POST[ 'rtwbmal_attach_id' ] );
                $rtwbmal_cus_fname        = sanitize_text_field( $_POST[ 'rtwbmal_cus_fname' ] );
                $rtwbmal_cus_lname        = sanitize_text_field( $_POST[ 'rtwbmal_cus_lname' ] );
                $rtwbmal_cus_gender        = sanitize_text_field( $_POST[ 'rtwbmal_cus_gender' ] );
                $rtwbmal_cus_email        = sanitize_text_field( $_POST[ 'rtwbmal_cus_email' ] );
                $rtwbmal_cus_phone        = sanitize_text_field( $_POST[ 'rtwbmal_cus_phone' ] );
                $rtwbmal_cus_dob    = sanitize_text_field( $_POST[ 'rtwbmal_cus_dob' ] );
                $rtwbmal_cus_country        = sanitize_text_field( $_POST[ 'rtwbmal_cus_country' ] );
                $rtwbmal_cus_state        = sanitize_text_field( $_POST[ 'rtwbmal_cus_state' ] );
                $rtwbmal_cus_address     = sanitize_text_field( $_POST[ 'rtwbmal_cus_address' ] );
                $rtwbmal_cus_city     = sanitize_text_field( $_POST[ 'rtwbmal_cus_city' ] );
                $rtwbmal_cus_post = sanitize_text_field( $_POST[ 'rtwbmal_cus_post' ] );
                $rtwbmal_cus_info = sanitize_text_field( $_POST[ 'rtwbmal_cus_info' ] );
                $rtwbmal_cus_id = sanitize_text_field( $_POST[ 'rtwbmal_cus_id' ] );
                $rtwbmal_cus_resgis_date = sanitize_text_field( $_POST[ 'rtwbmal_cus_resgis_date' ] );
                $rtwbmal_wp_user = sanitize_text_field( $_POST[ 'rtwbmal_wp_user' ] );
                $rtwbmal_cus_regis = date('m/d/Y h:i:s a', time());

                $rtwbmal_cus_updated = $wpdb->query( $wpdb->prepare( "UPDATE ".$wpdb->prefix.'rtwbma_customers'." SET wp_user_id='%d', first_name='%s', last_name='%s', email='%s', phone='%s', gender='%d', birthday='%s', country='%s', state='%s', city='%s', address='%s', post_code='%s', info='%s', registration_date='%s', attachment_id='%d'  WHERE id='%d'", $rtwbmal_wp_user, $rtwbmal_cus_fname, $rtwbmal_cus_lname, $rtwbmal_cus_email, $rtwbmal_cus_phone, $rtwbmal_cus_gender, $rtwbmal_cus_dob, $rtwbmal_cus_country, $rtwbmal_cus_state, $rtwbmal_cus_city, $rtwbmal_cus_address, $rtwbmal_cus_post, $rtwbmal_cus_info, $rtwbmal_cus_resgis_date, $rtwbmal_attach_id, $rtwbmal_cus_id ) );

                $rtwbmal_status = 0;
                if( $rtwbmal_cus_updated ){
                    $rtwbmal_status = 1;
                    $rtwbmal_message = esc_html__( 'Updated', 'rtwbmal-book-my-appointment' );
                }
                else{
                    $rtwbmal_status = 0;
                    $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
                wp_die();
            }
        }
    }

    /**
    * Funtion to delete customer data
    * @since    1.0.0
    */
    function rtwbmal_cus_delete_callback(){
        $rtwbmal_cus_id = sanitize_text_field( $_POST[ 'rtwbmal_cus_id' ] );

        global $wpdb;
        $rtwbmal_cus_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_customers', array( 'id' => $rtwbmal_cus_id ), array( '%d' ) );

        if( $rtwbmal_cus_deleted ){

            $rtwbmal_message    = esc_html__( 'Deleted', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = true;
        }
        else{
            $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
            $rtwbmal_status     = false;
        }

        echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
        wp_die();
    }

    /**
    * Funtion to add appointment by admin
    * @since    1.0.0
    */
    function rtwbmal_apntmnt_add_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_length        = sanitize_text_field( $_POST[ 'length' ] );
                if( $rtwbmal_length < 15 )
                {
                    $rtwbmal_select_emp        = sanitize_text_field( $_POST[ 'rtwbmal_select_emp' ] );
                    $rtwbmal_select_ser     = sanitize_text_field( $_POST[ 'rtwbmal_select_ser' ] );
                    $rtwbmal_select_cus = sanitize_text_field( $_POST[ 'rtwbmal_select_cus' ] );
                    $rtwbmal_strt_date   = sanitize_text_field( $_POST[ 'rtwbmal_strt_date' ] );
                    $rtwbmal_end_date   = sanitize_text_field( $_POST[ 'rtwbmal_end_date' ] );
                    $rtwbmal_strt_time   = sanitize_text_field( $_POST[ 'rtwbmal_strt_time' ] );
                    $rtwbmal_end_time   = sanitize_text_field( $_POST[ 'rtwbmal_end_time' ] );
                    $rtwbmal_no_people  = sanitize_text_field( $_POST['rtwbmal_no_people'] );
                    $rtwbmal_notify     = sanitize_text_field( $_POST[ 'rtwbmal_notify' ] );
                    $rtwbmal_note = sanitize_text_field( $_POST[ 'rtwbmal_note' ] );
                    $rtwbmal_appointment_id   = sanitize_text_field( $_POST[ 'rtwbmal_appointment_id' ] );
                    $rtwbmal_app_status = sanitize_text_field( $_POST['rtwbmal_app_status'] );
                    $rtwbmal_pay_method = sanitize_text_field( $_POST['rtwbmal_pay_method'] );
                    $rtwbmal_pay_status = sanitize_text_field( $_POST['rtwbmal_pay_status'] );
                    $rtwbmal_paid_amt = sanitize_text_field( $_POST['rtwbmal_paid_amt'] );

                    $rtwbmal_select_loc = 0;
    
                    $rtwbmal_app_id = $wpdb->insert(
                        $wpdb->prefix.'rtwbma_appointments',
                        array(
                            'emp_id'      => $rtwbmal_select_emp,
                            'service_id'  => $rtwbmal_select_ser,
                            'loc_id'      => $rtwbmal_select_loc,
                            'start_date'  => $rtwbmal_strt_date,
                            'end_date'    => $rtwbmal_end_date,
                            'start_time'  => $rtwbmal_strt_time,
                            'end_time'    => $rtwbmal_end_time,
                            'app_status'  => $rtwbmal_app_status,
                            'created_from'=> 0,
                            'note' => $rtwbmal_note
                        )
                    );
                    $rtwbmal_last_appid = $wpdb->insert_id;

                    $rtwbmal_get_price = $wpdb->get_results( $wpdb->prepare( "SELECT price FROM ".$wpdb->prefix."rtwbma_services WHERE id=%d", $rtwbmal_select_ser ), ARRAY_A );

                    $d=mktime(11, 14, 54, 8, 12, 2014);
                    $status_updated = date("Y-m-d h:i:s");

                    if( $rtwbmal_app_id ){
                        

                        $rtwbmal_inserted = $wpdb->insert(
                            $wpdb->prefix.'rtwbma_payments',
                            array(
                                'coupon_id'     => '',
                                'type'          => $rtwbmal_pay_method, /// local, paypal, stripe
                                'price'         => $rtwbmal_get_price[0]['price'],
                                'paid'          => $rtwbmal_paid_amt,
                                'tax_id'        => '',
                                'created_date'  => $status_updated,
                                'status'        => $rtwbmal_pay_status, /// zero, partial, full
                                'appointment_id' => $rtwbmal_last_appid
                            )
                        );
                        $rtwbmal_last_payid = $wpdb->insert_id;

                        $rtwbmal_inserted = $wpdb->insert(
                            $wpdb->prefix.'rtwbma_customer_appointments',
                            array(
                                'appointment_id'   => $rtwbmal_last_appid,
                                'cust_id'          => $rtwbmal_select_cus,
                                'num_of_people'    => $rtwbmal_no_people,
                                'price'            => $rtwbmal_get_price[0]['price'],
                                'payment_id'       => $rtwbmal_inserted,
                                'status'           => $rtwbmal_app_status,
                                'status_updated_at'=> $status_updated,
                                'rating'           => 0,
                                'review'           => '',
                                'date_created'     => $status_updated,
                                'created_from'     => 0,
                            )
                        );

                    }
                    else{
                        $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                    }
                    if( $rtwbmal_inserted ){

                        $rtwbmal_message = esc_html__( 'Added', 'rtwbmal-book-my-appointment' );
                    }
                    else{
                        $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                    }

                    echo json_encode( array( 'rtwbmal_status' => $rtwbmal_inserted, 'rtwbmal_message' => $rtwbmal_message ) );
                    wp_die();
                }
                else{
                    echo json_encode( array( 'rtwbmal_status' => $rtwbmal_inserted, 'rtwbmal_message' => esc_html__('Maximum number of appointment achieved', 'rtwbma-book-my-appointment') ) );
                    wp_die();
                }
            }
        }
    }

    /** 
    * Funtion to edit appointment
    * @since    1.0.0
    */
    function rtwbmal_edit_appointment_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) ) 
            {
                global $wpdb;
                $rtwbmal_app_id      = sanitize_text_field( $_POST[ 'rtwbmal_app_id' ] );

                $rtwbmal_get_appnmnts = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_appointments WHERE id=%d", $rtwbmal_app_id ), ARRAY_A );

                $rtwbmal_get_cus_app = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_customer_appointments WHERE appointment_id=%d", $rtwbmal_app_id ), ARRAY_A );

                $rtwbmal_payments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_payments WHERE id=%d", $rtwbmal_get_cus_app[0]['payment_id'] ), ARRAY_A );

                $rtwbmal_status = 1;
                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_appointment' => $rtwbmal_get_appnmnts[0], 'rtwbmal_cus_appointment' => $rtwbmal_get_cus_app[0],
                    'rtwbmal_payment' => $rtwbmal_payments[0]) );
                wp_die();
            }
        }
    }

    /**
    * Funtion to update appointment
    * @since    1.0.0
    */
    function rtwbmal_apntmnt_update_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_select_emp        = sanitize_text_field( $_POST[ 'rtwbmal_select_emp' ] );
                $rtwbmal_select_ser     = sanitize_text_field( $_POST[ 'rtwbmal_select_ser' ] );
                $rtwbmal_select_cus = sanitize_text_field( $_POST[ 'rtwbmal_select_cus' ] );
                $rtwbmal_strt_date   = sanitize_text_field( $_POST[ 'rtwbmal_strt_date' ] );
                $rtwbmal_end_date   = sanitize_text_field( $_POST[ 'rtwbmal_end_date' ] );
                $rtwbmal_strt_time   = sanitize_text_field( $_POST[ 'rtwbmal_strt_time' ] );
                $rtwbmal_end_time   = sanitize_text_field( $_POST[ 'rtwbmal_end_time' ] );
                $rtwbmal_no_people  = sanitize_text_field( $_POST['rtwbmal_no_people'] );
                $rtwbmal_notify     = sanitize_text_field( $_POST[ 'rtwbmal_notify' ] );
                $rtwbmal_note = sanitize_text_field( $_POST[ 'rtwbmal_note' ] );
                $rtwbmal_appointment_id   = sanitize_text_field( $_POST[ 'rtwbmal_appointment_id' ] );
                $rtwbmal_app_status = sanitize_text_field( $_POST['rtwbmal_app_status'] );
                $rtwbmal_pay_method = sanitize_text_field( $_POST['rtwbmal_pay_method'] );
                $rtwbmal_pay_status = sanitize_text_field( $_POST['rtwbmal_pay_status'] );
                $rtwbmal_paid_amt   = sanitize_text_field( $_POST['rtwbmal_paid_amt'] );
                $rtwbmal_select_loc = 0;

                $rtwbmal_inserted = $wpdb->update(
                    $wpdb->prefix.'rtwbma_appointments',
                    array(
                        'emp_id'      => $rtwbmal_select_emp,
                        'service_id'  => $rtwbmal_select_ser,
                        'loc_id'      => $rtwbmal_select_loc,
                        'start_date'  => $rtwbmal_strt_date,
                        'end_date'    => $rtwbmal_end_date,
                        'start_time'  => $rtwbmal_strt_time,
                        'end_time'    => $rtwbmal_end_time,
                        'app_status'  => $rtwbmal_app_status,
                        'created_from' => 0,
                        'note'         => $rtwbmal_note
                    ),
                    array(
                        'id' => $rtwbmal_appointment_id
                    )
                );

                $rtwbmal_get_price = $wpdb->get_results( $wpdb->prepare( "SELECT price FROM ".$wpdb->prefix."rtwbma_services WHERE id=%d", $rtwbmal_select_ser ), ARRAY_A );

                $rtwbmal_get_payment_id = $wpdb->get_results( $wpdb->prepare( "SELECT payment_id FROM ".$wpdb->prefix."rtwbma_customer_appointments WHERE appointment_id=%d", $rtwbmal_appointment_id ), ARRAY_A );

                $d=mktime(11, 14, 54, 8, 12, 2014);
                $status_updated = date("Y-m-d h:i:s");

                    $rtwbmal_inserted = $wpdb->update(
                        $wpdb->prefix.'rtwbma_customer_appointments',
                        array(
                            'cust_id'           => $rtwbmal_select_cus,
                            'num_of_people' => $rtwbmal_no_people,
                            'price'            => $rtwbmal_get_price[0]['price'],
                            'payment_id'       => $rtwbmal_get_payment_id[0]['payment_id'],
                            'status'           => $rtwbmal_app_status,
                            'status_updated_at'=> $status_updated,
                            'rating'           => 0,
                            'review'           => '',
                            'created_from'     => 0,
                        ),
                        array(
                            'appointment_id' => $rtwbmal_appointment_id
                        )
                    );

                    $rtwbmal_inserted = $wpdb->update(
                        $wpdb->prefix.'rtwbma_payments',
                        array(
                            'coupon_id'     => '',
                            'type'          => $rtwbmal_pay_method, //local, paypal, stripe
                            'price'         => $rtwbmal_get_price[0]['price'],
                            'paid'          => $rtwbmal_paid_amt,
                            'tax_id'        => '',
                            'created_date'  => $status_updated,
                            'status'        => $rtwbmal_pay_status, /// zero, partially, full
                        ),
                        array(
                            'id'    => $rtwbmal_get_payment_id[0]['payment_id']
                        )
                    );

                $rtwbmal_inserted = 1;
                if( $rtwbmal_inserted ){

                    $rtwbmal_message = esc_html__( 'Appointment Updated', 'rtwbmal-book-my-appointment' );
                }

                else{
                    $rtwbmal_message = esc_html__( 'Something Went Wrong', 'rtwbmal-book-my-appointment' );
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_inserted, 'rtwbmal_message' => $rtwbmal_message ) );
                wp_die();
            }
        }
    }

    /**
    * Funtion to delete appointment
    * @since    1.0.0
    */
    function rtwbmal_app_delete_callback(){
         $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                $rtwbmal_app_id = sanitize_text_field( $_POST[ 'rtwbmal_app_id' ] );

                global $wpdb;
                $rtwbmal_app_detail = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ". $wpdb->prefix . "rtwbma_appointments WHERE id=%d", $rtwbmal_app_id ), ARRAY_A );

                $rtwbmal_cus_app_detail = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ". $wpdb->prefix . "rtwbma_customer_appointments WHERE appointment_id=%d", $rtwbmal_app_id ), ARRAY_A );

                $rtwbmal_select_cus = $rtwbmal_cus_app_detail[0]['cust_id'];
                $rtwbmal_select_emp = $rtwbmal_app_detail[0]['emp_id'];
                $rtwbmal_payment_id = $rtwbmal_cus_app_detail[0]['paymet_id'];
                $rtwbmal_app_status = 3;

                $rtwbmal_app_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_appointments', array( 'id' => $rtwbmal_app_id ), array( '%d' ) );

                $rtwbmal_app_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_customer_appointments', array( 'appointment_id' => $rtwbmal_app_id ), array( '%d' ) );

                if( $rtwbmal_app_deleted ){

                    $rtwbmal_message    = esc_html__( 'Deleted', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = true;
                    
                }
                else{
                    $rtwbmal_message    = esc_html__( 'Something went wrong. Try again', 'rtwbmal-book-my-appointment' );
                    $rtwbmal_status     = false;
                }

                echo json_encode( array( 'rtwbmal_status' => $rtwbmal_status, 'rtwbmal_message' => $rtwbmal_message ) );
            }
        }
        wp_die();
    }

    /**
    * Funtion to get selected service employee
    * @since    1.0.0
    */
    function rtwbmal_get_employ_callback(){

        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            { 
                global $wpdb;
                $rtwbmal_service_id = sanitize_text_field( $_POST[ 'rtwbmal_ser_id' ] );

                $rtwbmal_all_services = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_services ORDER BY `id` ASC", ARRAY_A );
        
                $emp_array = array();
                if(is_array($rtwbmal_all_services) && !empty($rtwbmal_all_services))
                {
                    foreach ($rtwbmal_all_services as $key => $value) {
                        
                        if( $rtwbmal_service_id == $value['service_id'] )
                        {
                            if( !in_array($value['emp_id'], $emp_array) )
                            {
                                $emp_array[] = $value['emp_id'];
                            }
                        }
                    }
                }

                $rtwbmal_emp_array = array();
                if(is_array($emp_array) && !empty($emp_array))
                {
                    foreach ($emp_array as $emp => $id) {
                        $rtwbmal_emp = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees WHERE id=%d", $id ), ARRAY_A );
                        $rtwbmal_emp_array[] = $rtwbmal_emp[0];
                    }
                }

                $html = '';
                $html .= '<label>
                            <span>
                                '.esc_html__( 'Select Employee', 'rtwbmal-book-my-appointment' ).'
                            </span>
                        </label>
                        <select class="rtwbmal_select rtwbmal_select_emp" name="rtwbmal_select_emp">';

                if( is_array($rtwbmal_emp_array) && !empty( $rtwbmal_emp_array ) ){
                    foreach( $rtwbmal_emp_array as $rtwbmal_emp_key => $rtwbmal_emp_value )
                    {
                    $html .= '<option value="'. esc_attr($rtwbmal_emp_value[ 'id' ]) .'">'.esc_html($rtwbmal_emp_value[ 'first_name' ]) .' '.esc_html( $rtwbmal_emp_value[ 'last_name' ]).'</option>';
                
                    }
                }
                $html .= '</select>';

                echo json_encode($html);
                wp_die();
            }
        }
    }

    /**
     * Check if this gateway is enabled and available in the user's country.
     *
     * @return bool
     * @since    1.0.0
     */
    public function rtwbmal_is_valid_for_use( $rtwbmal_currency ) {

        return in_array(
            $rtwbmal_currency ,
            apply_filters(
                'rtwbmal_paypal_supported_currencies',
                array( 'AUD', 'BRL', 'CAD', 'MXN', 'NZD', 'HKD', 'SGD', 'USD', 'EUR', 'JPY', 'TRY', 'NOK', 'CZK', 'DKK', 'HUF', 'ILS', 'MYR', 'PHP', 'PLN', 'SEK', 'CHF', 'TWD', 'THB', 'GBP', 'RMB', 'RUB', 'INR' )
            ),
            true
        );
    }


    /**
    * function to give filtered appointments
    * @since    1.0.0
     */
    function rtwbmal_apply_app_filter_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            {
                global $wpdb;
                $rtwbmal_frm_date        = sanitize_text_field( $_POST[ 'rtwbmal_frm_date' ] );
                $rtwbmal_to_date         = sanitize_text_field( $_POST[ 'rtwbmal_to_date' ] );
                $rtwbmal_serice_filter   = sanitize_text_field( $_POST[ 'rtwbmal_serice_filter' ] );
                $rtwbmal_emp_filter      = sanitize_text_field( $_POST[ 'rtwbmal_emp_filter' ] );
                $rtwbmal_cus_filter      = sanitize_text_field( $_POST[ 'rtwbmal_cus_filter' ] );
                $rtwbmal_status_filter   = sanitize_text_field( $_POST[ 'rtwbmal_status_filter' ] );

                //appointment_select_query
                $rtwbmal_select_appointment = $wpdb->prefix."rtwbma_customer_appointments.appointment_id as 'id', ".$wpdb->prefix."rtwbma_customer_appointments.date_created as 'date_created', ".$wpdb->prefix."rtwbma_customer_appointments.status as '__status', ".$wpdb->prefix."rtwbma_customer_appointments.price as 'price' ";

                //customer_select_query
                $rtwbmal_select_customer = $wpdb->prefix."rtwbma_customers.first_name as 'cust_first_name', ".$wpdb->prefix."rtwbma_customers.last_name as 'cust_last_name', ".$wpdb->prefix."rtwbma_customers.email as 'cust_email', ".$wpdb->prefix."rtwbma_customers.phone as 'cust_phone', ".$wpdb->prefix."rtwbma_customers.id as 'cust_id'";

                //employee_select_query
                $rtwbmal_select_employee = $wpdb->prefix."rtwbma_employees.first_name as 'emp_first_name', ".$wpdb->prefix."rtwbma_employees.last_name as 'emp_last_name', ".$wpdb->prefix."rtwbma_employees.id as 'emp_id'";

                //service_select_query
                $rtwbmal_select_service = $wpdb->prefix."rtwbma_services.title as 'service_title', ".$wpdb->prefix."rtwbma_services.duration as 'duration', ".$wpdb->prefix."rtwbma_services.id as 'service_id' ";

                $rtwbmal_select_app = $wpdb->prefix."rtwbma_appointments.start_date as 'start_date', ".$wpdb->prefix."rtwbma_appointments.end_date as 'end_date', " .$wpdb->prefix."rtwbma_appointments.start_time as 'start_time', " .$wpdb->prefix."rtwbma_appointments.end_time as 'end_time', " .$wpdb->prefix."rtwbma_appointments.app_status as 'app_status' ";

                //ending_select_query
                $rtwbmal_select_end = "FROM ".$wpdb->prefix."rtwbma_appointments JOIN ".$wpdb->prefix."rtwbma_customer_appointments ON ".$wpdb->prefix."rtwbma_appointments.id = ".$wpdb->prefix."rtwbma_customer_appointments.appointment_id JOIN ".$wpdb->prefix."rtwbma_customers ON ".$wpdb->prefix."rtwbma_customer_appointments.cust_id = ".$wpdb->prefix."rtwbma_customers.id JOIN ".$wpdb->prefix."rtwbma_services ON ".$wpdb->prefix."rtwbma_appointments.service_id = ".$wpdb->prefix."rtwbma_services.id JOIN ".$wpdb->prefix."rtwbma_employees ON ".$wpdb->prefix."rtwbma_appointments.emp_id = ".$wpdb->prefix."rtwbma_employees.id WHERE `start_date` >= '$rtwbmal_frm_date' AND `start_date` <= '$rtwbmal_to_date'";

                if( $rtwbmal_serice_filter != 0 )
                {
                    $rtwbmal_select_end .= " AND `service_id` = '$rtwbmal_serice_filter'";
                }
                if( $rtwbmal_emp_filter != 0 )
                {
                    $rtwbmal_select_end .= " AND `emp_id` = '$rtwbmal_emp_filter'";
                }
                if( $rtwbmal_cus_filter != 0 )
                {
                    $rtwbmal_select_end .= " AND `cust_id` = '$rtwbmal_cus_filter'";
                }
                if( $rtwbmal_status_filter != 5 )
                {
                    $rtwbmal_select_end .= " AND `app_status` = '$rtwbmal_status_filter'";
                }
                $rtwbmal_select_end .= " ORDER BY `start_date` ASC LIMIT %d";

                $rtwbmal_select = "SELECT ".$rtwbmal_select_appointment.', '.$rtwbmal_select_app.', '.$rtwbmal_select_customer.', '.$rtwbmal_select_employee.', '.$rtwbmal_select_service.' '.$rtwbmal_select_end;

                $rtwbmal_all_appointments = $wpdb->get_results( $wpdb->prepare( $rtwbmal_select, 1000 ), ARRAY_A );
                
                $rtwbmal_date = array();
                $rtwbmal_html = '';
                if( is_array($rtwbmal_all_appointments) && !empty( $rtwbmal_all_appointments ) ){
                    foreach( $rtwbmal_all_appointments as $rtwbmal_key => $rtwbmal_value )
                    {
                        $rtwbmal_html .= '<li class="rtwbmal_single_appointment">';
                        if( !in_array( $rtwbmal_value['start_date'], $rtwbmal_date ) )
                        {
                            $rtwbmal_date[] = $rtwbmal_value['start_date'];
                            $rtwbmal_html .= '<div class="rtwbmal_appoint_day_separator">
                                <div class="rtwbmal_appoint_date_holder">'.
                                    esc_html( date("jS F Y", strtotime( $rtwbmal_value[ 'start_date' ] ))).'
                                </div>
                            </div>';
                        } 
                        $rtwbmal_html .= '<div class="rtwbmal_appoint_name_add_emp">
                            <div class="rtwbmal_appoint_date">
                                <i class="far fa-clock"></i> '. esc_html( date("h:i:s A", strtotime($rtwbmal_value[ 'start_time' ]))).'
                            </div>
                            <div class="rtwbmal_appoint_emp">'.
                            esc_html($rtwbmal_value[ 'emp_first_name' ]).' '.esc_html($rtwbmal_value[ 'emp_last_name' ]).'
                            </div>
                            <div class="rtwbmal_appoint_service">'.
                            esc_html($rtwbmal_value[ 'service_title' ]).'
                            </div>
                            <div class="rtwbmal_appoint_cust_name">'.
                            esc_html($rtwbmal_value[ 'cust_first_name' ]).' '.esc_html($rtwbmal_value[ 'cust_last_name' ]).'
                            </div>
                            <div class="rtwbmal_appoint_price">'.
                            esc_html($rtwbmal_value[ 'price' ]).'
                            </div>
                            <div class="rtwbmal_appoint_status">';
                            
                            if( $rtwbmal_value['app_status'] == 0 )
                            {
                                $rtwbmal_html .= '<span class="rtwbmal_appoint_status-tab pending"><i class="far fa-check-circle"></i> '.
                                esc_html__('Pending', 'rtwbmal-book-my-appointment').'</span>';
                            }
                            elseif( $rtwbmal_value['app_status'] == 1 )
                            {	
                                $rtwbmal_html .=  '<span class="rtwbmal_appoint_status-tab"><i class="far fa-check-circle"></i> '.
                                esc_html__('Approved', 'rtwbmal-book-my-appointment').'
                                </span>';
                            }
                            elseif( $rtwbmal_value['app_status'] == 2 )
                            {
                                $rtwbmal_html .= '<span class="rtwbmal_appoint_status-tab cancelled"><i class="far fa-check-circle"></i> '.
                                esc_html__('Cancelled', 'rtwbmal-book-my-appointment').'
                                </span>';
                            }
                            elseif( $rtwbmal_value['app_status'] == 3 )
                            {
                                $rtwbmal_html .= '<span>'.
                                esc_html__('Rejected', 'rtwbmal-book-my-appointment').'
                                </span>';
                            }
                                
                            $rtwbmal_html .= '</div>
                                <div class="rtwbmal_appoint_duration">'.
                                esc_html( $rtwbmal_value[ 'duration' ]);
                                    esc_html__('min', 'rtwbmal-book-my-appointment').'
                                </div>
                                <div class="rtwbmal_appoint_edit_del">
                                    <ul data-rtwbmal_app_id="'. esc_attr($rtwbmal_value[ 'id' ]) .'">
                                        <li><a class="rtwbmal_edit_apntmnt" rel="modal:open" href="#rtwbmal_popup"><i class="far fa-edit"></i></a></li>
                                        <li><a class="rtwbmal_app_delete" href="javascript:;"><i class="far fa-trash-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>';	
                    } 
                }
				
                echo json_encode( $rtwbmal_html );
                wp_die();
            }
        }
        wp_die();
    }

    /**
    * Functuion to call appointments using offset
    * @since    1.0.0
    */
    function rtwbmal_get_apps_callback(){
        $rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );
        if ( $rtwbmal_check_ajax ) {
            global $wpdb;
            $rtwbmal_get_offset       = sanitize_text_field( $_POST[ 'offset' ] );

            $rtwbmal_general_setting = get_option( 'rtwbmal_general_settings', array() );
            $rtwbmal_limit = 10;

            if( isset( $rtwbmal_general_setting['rtwbmal_app_per_page'] ) && !empty( $rtwbmal_general_setting['rtwbmal_app_per_page'] ) )
            {
                $rtwbmal_limit = $rtwbmal_general_setting['rtwbmal_app_per_page'];
            }
            //appointment_select_query
            $rtwbmal_select_appointment = $wpdb->prefix."rtwbma_customer_appointments.appointment_id as 'id', ".$wpdb->prefix."rtwbma_customer_appointments.date_created as 'date_created', ".$wpdb->prefix."rtwbma_customer_appointments.status as 'status', ".$wpdb->prefix."rtwbma_customer_appointments.price as 'price'";

            //customer_select_query
            $rtwbmal_select_customer = $wpdb->prefix."rtwbma_customers.first_name as 'cust_first_name', ".$wpdb->prefix."rtwbma_customers.last_name as 'cust_last_name', ".$wpdb->prefix."rtwbma_customers.email as 'cust_email', ".$wpdb->prefix."rtwbma_customers.phone as 'cust_phone'";

            //employee_select_query
            $rtwbmal_select_employee = $wpdb->prefix."rtwbma_employees.first_name as 'emp_first_name', ".$wpdb->prefix."rtwbma_employees.last_name as 'emp_last_name'";

            //service_select_query
            $rtwbmal_select_service = $wpdb->prefix."rtwbma_services.title as 'service_title', ".$wpdb->prefix."rtwbma_services.duration as 'duration'";

            $rtwbmal_select_app = $wpdb->prefix."rtwbma_appointments.start_date as 'start_date', ".$wpdb->prefix."rtwbma_appointments.end_date as 'end_date', " .$wpdb->prefix."rtwbma_appointments.start_time as 'start_time', " .$wpdb->prefix."rtwbma_appointments.end_time as 'end_time' ";

            $rtwbmal_strt_date = date("y-m-d", strtotime( date( "y-m-d", strtotime( date("y-m-d") ) ) . "-1 month" ) );
            //ending_select_query
            $rtwbmal_select_end = "FROM ".$wpdb->prefix."rtwbma_appointments JOIN ".$wpdb->prefix."rtwbma_customer_appointments ON ".$wpdb->prefix."rtwbma_appointments.id = ".$wpdb->prefix."rtwbma_customer_appointments.appointment_id JOIN ".$wpdb->prefix."rtwbma_customers ON ".$wpdb->prefix."rtwbma_customer_appointments.cust_id = ".$wpdb->prefix."rtwbma_customers.id JOIN ".$wpdb->prefix."rtwbma_services ON ".$wpdb->prefix."rtwbma_appointments.service_id = ".$wpdb->prefix."rtwbma_services.id JOIN ".$wpdb->prefix."rtwbma_employees ON ".$wpdb->prefix."rtwbma_appointments.emp_id = ".$wpdb->prefix."rtwbma_employees.id WHERE `start_date` >= '$rtwbmal_strt_date' ORDER BY `start_date` ASC LIMIT %d, %d";


            $rtwbmal_select = "SELECT ".$rtwbmal_select_appointment.', '.$rtwbmal_select_app.', '.$rtwbmal_select_customer.', '.$rtwbmal_select_employee.', '.$rtwbmal_select_service.' '.$rtwbmal_select_end;
            ////////// $rtwbmal_app_per_page
            $rtwbmal_offset  = ( $rtwbmal_get_offset * $rtwbmal_limit );

            $rtwbmal_all_appointments = $wpdb->get_results( $wpdb->prepare( $rtwbmal_select, $rtwbmal_offset, $rtwbmal_limit ), ARRAY_A );

            $rtwbmal_html = '';

            $rtwbmal_date = array();
            if( is_array($rtwbmal_all_appointments) && !empty( $rtwbmal_all_appointments ) ){
                foreach( $rtwbmal_all_appointments as $rtwbmal_key => $rtwbmal_value )
                {
                    $rtwbmal_html .= '<li class="rtwbmal_single_appointment">';
                                
                    if( !in_array( $rtwbmal_value['start_date'], $rtwbmal_date ) )
                    {
                        $rtwbmal_date[] = $rtwbmal_value['start_date'];

                        $rtwbmal_html .= '<div class="rtwbmal_appoint_day_separator">
                            <div class="rtwbmal_appoint_date_holder">'.
                                esc_html( date("jS F Y", strtotime( $rtwbmal_value[ 'start_date' ] ))).' 
                            </div>
                        </div>';
                    } 
                    
                    $rtwbmal_html .= '<div class="rtwbmal_appoint_name_add_emp">
                                    <div class="rtwbmal_appoint_date">
                                        <i class="far fa-clock"></i> '. 
                                esc_html( date("h:i:s A", strtotime($rtwbmal_value[ 'start_time' ]))).'
                                    </div>
                                    <div class="rtwbmal_appoint_emp">'.
                                    esc_html($rtwbmal_value[ 'emp_first_name' ]).' '.esc_html($rtwbmal_value[ 'emp_last_name' ]).'
                                    </div>
                                    <div class="rtwbmal_appoint_service">'.
                                    esc_html($rtwbmal_value[ 'service_title' ]).'
                                    </div>
                                    <div class="rtwbmal_appoint_cust_name">'.
                                    esc_html($rtwbmal_value[ 'cust_first_name' ]).' '.esc_html($rtwbmal_value[ 'cust_last_name' ]).'
                                    </div>
                                    <div class="rtwbmal_appoint_price">'.
                                    esc_html($rtwbmal_value[ 'price' ]).'
                                    </div>
                                    <div class="rtwbmal_appoint_status">';
                                        
                    if( $rtwbmal_value['status'] == 0 )
                    {
                        $rtwbmal_html .= '<span class="rtwbmal_appoint_status-tab pending"><i class="far fa-check-circle"></i> '.
                        esc_html__('Pending', 'rtwbmal-book-my-appointment').'</span>';
                    }
                    elseif( $rtwbmal_value['status'] == 1 )
                    {	
                        $rtwbmal_html .= '<span class="rtwbmal_appoint_status-tab"><i class="far fa-check-circle"></i> '.
                        esc_html__('Approved', 'rtwbmal-book-my-appointment').'</span>';
                    }
                    elseif( $rtwbmal_value['status'] == 2 )
                    {
                        $rtwbmal_html .= '<span class="rtwbmal_appoint_status-tab cancelled"><i class="far fa-times-circle"></i> '.
                        esc_html__('Cancelled', 'rtwbmal-book-my-appointment').'</span>';
                    }
                    elseif( $rtwbmal_value['status'] == 3 )
                    {
                        $rtwbmal_html .= '<span>'.
                        esc_html__('Rejected', 'rtwbmal-book-my-appointment').'</span>';
                    }

                    $rtwbmal_html .= '</div>
                                    <div class="rtwbmal_appoint_duration">'.
                                    esc_html($rtwbmal_value[ 'duration' ]);
                                        esc_html__('min', 'rtwbmal-book-my-appointment').'
                                    </div>';
                    $rtwbmal_html .= '<div class="rtwbmal_appoint_edit_del">
                                        <ul data-rtwbmal_app_id="'. esc_attr($rtwbmal_value[ 'id' ]).'">
                                            <li><a class="rtwbmal_edit_apntmnt" rel="modal:open" href="#rtwbmal_popup"><i class="far fa-edit"></i></a></li>
                                            <li><a class="rtwbmal_app_delete" href="javascript:void(0);"><i class="far fa-trash-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>';	
                }
            }
            echo  json_encode($rtwbmal_html);
            wp_die();
        }
        wp_die();
    }


    function rtwbmal_selected_date_of_appointment_callback(){
        if (!wp_verify_nonce($_POST['rtwbmal_security_check'], 'rtwbmal-ajax-security-string')){
            return;
        }
        global $wpdb;
        $rtwbmal_date = sanitize_text_field( $_POST['date'] );
        $rtwbmal_emp_id = sanitize_text_field( $_POST['emp_id'] );
        $rtwbmal_service_id = sanitize_text_field( $_POST['service_id'] );

        $rtwbmal_emp = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees WHERE id=%d", $rtwbmal_emp_id ), ARRAY_A );

        $rtwbmal_get_appointment = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_appointments WHERE emp_id=%d", $rtwbmal_emp_id ), ARRAY_A );

        $rtwbmal_service_dura = $wpdb->get_results( $wpdb->prepare( "SELECT duration FROM ".$wpdb->prefix."rtwbma_services WHERE id=%d", $rtwbmal_service_id ), ARRAY_A );

        $rtwbmal_service_duration = $rtwbmal_service_dura[0]['duration'];

        $rtwbmal_emp_services	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_services WHERE emp_id=%d AND service_id=%d", $rtwbmal_emp_id, $rtwbmal_service_id ), ARRAY_A );


        $timestamp = strtotime( $rtwbmal_date );
        $day = date( 'D', $timestamp );
        
        $sel_date = 0;
        if( $day == 'Mon' )
        {
            $sel_date = 0;
        }
        elseif( $day == 'Tue' ){
            $sel_date = 1;
        }
        elseif( $day == 'Wed' ){
            $sel_date = 2;
        }
        elseif( $day == 'Thu' ){
            $sel_date = 3;
        }
        elseif( $day == 'Fri' ){
            $sel_date = 4;
        }
        elseif( $day == 'Sat' ){
            $sel_date = 5;
        }
        elseif( $day == 'Sun' ){
            $sel_date = 6;
        }
        
        
        $rtwbmal_emp_wrkng_hour = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_working_hour WHERE emp_id=%d AND days=%d", $rtwbmal_emp_id, $sel_date ), ARRAY_A );
        
        $rtwbmal_emp_working_hour = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_working_hour WHERE emp_id=%d", $rtwbmal_emp_id ), ARRAY_A );

        $hour_calculate = strtotime( isset($rtwbmal_emp_working_hour[ $sel_date ]['strt_time']) );
        $hour_calculate_end = strtotime( $rtwbmal_emp_working_hour[ $sel_date ]['end_time'] );

        $strt_hour = date( 'H', $hour_calculate );
        $end_hour = date( 'H', $hour_calculate_end );
        
        $start_time = '';
        foreach ($rtwbmal_get_appointment as $key => $value) {
            if(isset($rtwbmal_emp_wrkng_hour[0]['active']) && $rtwbmal_emp_wrkng_hour[0]['active'] == 1 )
            {
                if( $value['start_date'] == $rtwbmal_date )
                {
                    $start_time = $value['end_time'];
                }
            }
        }
        if( empty($start_time) )
        {
            $start_time = $strt_hour;
        }

        $response_array = array( 'start_time' => $start_time,
                        'end_time' => $end_hour );

        echo json_encode($response_array);
        wp_die();
    }

    ////Email Notification //

    function rtwbmal_email_save_callback(){
        $rtwbma_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbma_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            { 
                global $wpdb;
                $rtwbma_notify_name        = sanitize_text_field( $_POST[ 'rtwbma_notify_name' ] );
                $rtwbma_apntmnt_status        = sanitize_text_field( $_POST[ 'rtwbma_apntmnt_status' ] );
                $rtwbma_subject        = sanitize_text_field( $_POST[ 'rtwbma_subject' ] );
                $rtwbma_message        = sanitize_text_field( $_POST[ 'rtwbma_message' ] );
                $rtwbma_status        = sanitize_text_field( $_POST[ 'rtwbma_status' ] );
                $rtwbma_receipient        = serialize($_POST[ 'rtwbma_receipient' ] );

                $rtwbma_inserted = $wpdb->insert(
                    $wpdb->prefix.'rtwbma_email_notifications',
                    array(
                        'subject'      => $rtwbma_subject ,
                        'setting_name'   => $rtwbma_notify_name,
                        'message'     => $rtwbma_message,
                        'type'       => $rtwbma_apntmnt_status,
                        'status' => $rtwbma_status,
                        'message_to' => $rtwbma_receipient
                    )
                );

                if( $rtwbma_inserted ){

                    $rtwbma_message = esc_html__( 'Email Added', 'rtwbma-book-my-appointment' );
                }
                else{
                    $rtwbma_message = esc_html__( 'Something Went Wrong', 'rtwbma-book-my-appointment' );
                }

                echo json_encode( array( 'rtwbma_status' => $rtwbma_inserted, 'rtwbma_message' => $rtwbma_message ) );
                wp_die();
            }
        }
        wp_die();
    }

      /**
    * Function to get email db values
    * @since    1.0.0
    */
    function rtwbmal_email_edit_callback(){
        $rtwbma_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbma_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            { 
                global $wpdb;
                $rtwbma_email_id      = sanitize_text_field( $_POST[ 'rtwbma_email_id' ] );
                $rtwbma_get_email = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_email_notifications WHERE id=%d", $rtwbma_email_id ), ARRAY_A );

                $rtwbma_get_email[0]['message_to'] = unserialize( $rtwbma_get_email[0]['message_to'] );

                $rtwbma_status = 1;
                echo json_encode( array( 'rtwbma_status' => $rtwbma_status, 'rtwbma_emails' => $rtwbma_get_email[0] ) );
                wp_die();
            }
        }
    }

     /**
    * Funtion to upadte emails
    * @since    1.0.0
    */
    function rtwbmal_email_update_callback(){
        $rtwbma_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

      if ( $rtwbma_check_ajax ) {
          if( current_user_can( 'manage_options' ) )
          { 
              global $wpdb;
              $rtwbma_email_id = sanitize_text_field( $_POST[ 'rtwbma_id' ] );
              $rtwbma_notify_name        = sanitize_text_field( $_POST[ 'rtwbma_notify_name' ] );
              $rtwbma_apntmnt_status        = sanitize_text_field( $_POST[ 'rtwbma_apntmnt_status' ] );
              $rtwbma_subject        = sanitize_text_field( $_POST[ 'rtwbma_subject' ] );
              $rtwbma_message        = sanitize_text_field( $_POST[ 'rtwbma_message' ] );
              $rtwbma_status        = sanitize_text_field( $_POST[ 'rtwbma_status' ] );
              $rtwbma_receipient        = serialize($_POST[ 'rtwbma_receipient' ] );

              $rtwbma_inserted = $wpdb->update(
                  $wpdb->prefix.'rtwbma_email_notifications',
                  array(
                      'subject'      => $rtwbma_subject ,
                      'setting_name'   => $rtwbma_notify_name,
                      'message'     => $rtwbma_message,
                      'type'       => $rtwbma_apntmnt_status,
                      'status' => $rtwbma_status,
                      'message_to' => $rtwbma_receipient,
                  ),
                  array(
                      'id' => $rtwbma_email_id
                  )
              );
              $rtwbma_inserted = 1;
              if( $rtwbma_inserted ){

                  $rtwbma_message = esc_html__( 'Updated', 'rtwbma-book-my-appointment' );
              }
              else{
                  $rtwbma_message = esc_html__( 'Something Went Wrong', 'rtwbma-book-my-appointment' );
              }

              echo json_encode( array( 'rtwbma_status' => $rtwbma_inserted, 'rtwbma_message' => $rtwbma_message ) );
              wp_die();
          }
      }
      wp_die();
  }

  /**
    * Funtion to delete email data
    * @since    1.0.0
    */
    function rtwbmal_email_delete_callback(){
        $rtwbma_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );
        if ( $rtwbma_check_ajax ) {
            if( current_user_can( 'manage_options' ) )
            { 
                $rtwbma_email_id = sanitize_text_field( $_POST[ 'rtwbma_email_id' ] );

                global $wpdb;
                $rtwbma_loc_deleted = $wpdb->delete( $wpdb->prefix.'rtwbma_email_notifications', array( 'id' => $rtwbma_email_id ), array( '%d' ) );

                if( $rtwbma_loc_deleted ){
                    
                    $rtwbma_message    = esc_html__( 'Deleted', 'rtwbma-book-my-appointment' );
                    $rtwbma_status     = true;
                }
                else{
                    $rtwbma_message    = esc_html__( 'Something went wrong. Try again', 'rtwbma-book-my-appointment' );
                    $rtwbma_status     = false;
                }

                echo json_encode( array( 'rtwbma_status' => $rtwbma_status, 'rtwbma_message' => $rtwbma_message ) );
                    
            }
        }
        wp_die();
    }
    
}