<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwbmal_Book_My_Appointment {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Rtwbmal_Book_My_Appointment_Loader    $rtwbmal_loader    Maintains and registers all hooks for the plugin.
	 */
	protected $rtwbmal_loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $rtwbmal_plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $rtwbmal_plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $rtwbmal_version    The current version of the plugin.
	 */
	protected $rtwbmal_version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'RTWBMAL_BOOK_MY_APPOINTMENT_VERSION' ) ) {
			$this->rtwbmal_version = RTWBMAL_BOOK_MY_APPOINTMENT_VERSION;
		} else {
			$this->rtwbmal_version = '1.0.0';
		}
		$this->rtwbmal_plugin_name = 'rtwbmal-book-my-appointment';

		$this->rtwbmal_load_dependencies();
		$this->rtwbmal_set_locale();
		$this->rtwbmal_define_admin_hooks();
		$this->rtwbmal_define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Rtwbmal_Book_My_Appointment_Loader. Orchestrates the hooks of the plugin.
	 * - Rtwbmal_Book_My_Appointment_i18n. Defines internationalization functionality.
	 * - Rtwbmal_Book_My_Appointment_Admin. Defines all hooks for the admin area.
	 * - Rtwbmal_Book_My_Appointment_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwbmal_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/rtwbmal-class-book-my-appointment-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/rtwbmal-class-book-my-appointment-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/rtwbmal-class-book-my-appointment-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/rtwbmal-class-book-my-appointment-public.php';

		$this->rtwbmal_loader = new Rtwbmal_Book_My_Appointment_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Rtwbmal_Book_My_Appointment_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwbmal_set_locale() {

		$rtwbmal_plugin_i18n = new Rtwbmal_Book_My_Appointment_i18n();

		$this->rtwbmal_loader->rtwbmal_add_action( 'plugins_loaded', $rtwbmal_plugin_i18n, 'rtwbmal_load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwbmal_define_admin_hooks() {

		$rtwbmal_plugin_admin = new Rtwbmal_Book_My_Appointment_Admin( $this->rtwbmal_get_plugin_name(), $this->rtwbmal_get_version() );

		$this->rtwbmal_loader->rtwbmal_add_action( 'admin_enqueue_scripts', $rtwbmal_plugin_admin, 'rtwbmal_enqueue_styles' );
		$this->rtwbmal_loader->rtwbmal_add_action( 'admin_enqueue_scripts', $rtwbmal_plugin_admin, 'rtwbmal_enqueue_scripts' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'admin_menu', $rtwbmal_plugin_admin, 'rtwbmal_add_admin_menu' );
        
            // location ajax  
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_loc_add_new', $rtwbmal_plugin_admin, 'rtwbmal_loc_add_new_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_edit_loc', $rtwbmal_plugin_admin, 'rtwbmal_edit_loc_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_loc_update', $rtwbmal_plugin_admin, 'rtwbmal_loc_update_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_loc_delete', $rtwbmal_plugin_admin, 'rtwbmal_loc_delete_callback' );

        // calendar ajax
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_get_events', $rtwbmal_plugin_admin, 'rtwbmal_get_events_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_get_single_event', $rtwbmal_plugin_admin, 'rtwbmal_get_single_event_callback' );
        
        // employee ajax
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_emp_add', $rtwbmal_plugin_admin, 'rtwbmal_emp_add_callback' );
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_emp_delete', $rtwbmal_plugin_admin, 'rtwbmal_emp_delete_callback' );
        
        // category ajax
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_cat_delete', $rtwbmal_plugin_admin, 'rtwbmal_cat_delete_callback' );
        
        // service ajax
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_service_delete', $rtwbmal_plugin_admin, 'rtwbmal_service_delete_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_service_edit', $rtwbmal_plugin_admin, 'rtwbmal_service_edit_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_service_add', $rtwbmal_plugin_admin, 'rtwbmal_service_add_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_edit_service_row', $rtwbmal_plugin_admin, 'rtwbmal_edit_service_row_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_add_category', $rtwbmal_plugin_admin, 'rtwbmal_add_category_callback' );
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_service_category', $rtwbmal_plugin_admin, 'rtwbmal_service_category_callback' );
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_edit_category', $rtwbmal_plugin_admin, 'rtwbmal_edit_category_callback' );
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_emp_edit', $rtwbmal_plugin_admin, 'rtwbmal_emp_edit_callback' );
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_emp_update', $rtwbmal_plugin_admin, 'rtwbmal_emp_update_callback' );


        ///////////////// customer /////////////////////
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_customer_add', $rtwbmal_plugin_admin, 'rtwbmal_customer_add_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_edit_customer', $rtwbmal_plugin_admin, 'rtwbmal_edit_customer_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_customer_update', $rtwbmal_plugin_admin, 'rtwbmal_customer_update_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_cus_delete', $rtwbmal_plugin_admin, 'rtwbmal_cus_delete_callback' );

        ///////////// appointments ///////////////////
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_apntmnt_add', $rtwbmal_plugin_admin, 'rtwbmal_apntmnt_add_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_edit_appointment', $rtwbmal_plugin_admin, 'rtwbmal_edit_appointment_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_apntmnt_update', $rtwbmal_plugin_admin, 'rtwbmal_apntmnt_update_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_app_delete', $rtwbmal_plugin_admin, 'rtwbmal_app_delete_callback' );
        
        //////////// calendar ///////////
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_get_employ', $rtwbmal_plugin_admin, 'rtwbmal_get_employ_callback' );

        //////////// appointments filters //////
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_apply_app_filter', $rtwbmal_plugin_admin, 'rtwbmal_apply_app_filter_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_get_apps', $rtwbmal_plugin_admin, 'rtwbmal_get_apps_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_selected_date_of_appointment', $rtwbmal_plugin_admin, 'rtwbmal_selected_date_of_appointment_callback' );
		 ///////////// email notification ///////////////////
		 $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_email_save', $rtwbmal_plugin_admin, 'rtwbmal_email_save_callback' );
		 $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_email_edit', $rtwbmal_plugin_admin, 'rtwbmal_email_edit_callback' );
		 $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_email_update', $rtwbmal_plugin_admin, 'rtwbmal_email_update_callback' );
		 $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_email_delete', $rtwbmal_plugin_admin, 'rtwbmal_email_delete_callback' );
        
	}
	
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function rtwbmal_define_public_hooks() {

		$rtwbmal_plugin_public = new Rtwbmal_Book_My_Appointment_Public( $this->rtwbmal_get_plugin_name(), $this->rtwbmal_get_version() );
        $rtwbmal_verification_done = get_option( 'rtwwdpd_verification_done', array() );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_enqueue_scripts', $rtwbmal_plugin_public, 'rtwbmal_enqueue_styles' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_enqueue_scripts', $rtwbmal_plugin_public, 'rtwbmal_enqueue_scripts' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_book_service', $rtwbmal_plugin_public, 'rtwbmal_book_service_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_nopriv_rtwbmal_book_service', $rtwbmal_plugin_public, 'rtwbmal_book_service_callback' );


        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_get_emp_detail', $rtwbmal_plugin_public, 'rtwbmal_get_emp_detail_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_nopriv_rtwbmal_get_emp_detail', $rtwbmal_plugin_public, 'rtwbmal_get_emp_detail_callback' );
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_add_appointment', $rtwbmal_plugin_public, 'rtwbmal_add_appointment_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_nopriv_rtwbmal_add_appointment', $rtwbmal_plugin_public, 'rtwbmal_add_appointment_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_nopriv_rtwbmal_cncl_appointment', $rtwbmal_plugin_public, 'rtwbmal_cncl_appointment_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_cncl_appointment', $rtwbmal_plugin_public, 'rtwbmal_cncl_appointment_callback' );

        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_update_customer', $rtwbmal_plugin_public, 'rtwbmal_update_customer_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_nopriv_rtwbmal_update_customer', $rtwbmal_plugin_public, 'rtwbmal_update_customer_callback' );
        
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_rtwbmal_update_employee', $rtwbmal_plugin_public, 'rtwbmal_update_employee_callback' );
        $this->rtwbmal_loader->rtwbmal_add_action( 'wp_ajax_nopriv_rtwbmal_update_employee', $rtwbmal_plugin_public, 'rtwbmal_update_employee_callback' );


	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function rtwbmal_run() {
		$this->rtwbmal_loader->rtwbmal_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function rtwbmal_get_plugin_name() {
		return $this->rtwbmal_plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Book_My_Appointment_Loader    Orchestrates the hooks of the plugin.
	 */
	public function rtwbmal_get_loader() {
		return $this->rtwbmal_loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function rtwbmal_get_version() {
		return $this->rtwbmal_version;
	}
}