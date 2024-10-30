<?php
/**
 * The public-specific functionality of the plugin.
 *
 * @link       https://www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/public
 */

/**
 * The public-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/public
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwbmal_Book_My_Appointment_Public {
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
		
		add_shortcode( 'rtwbma_cus_register_page', array( $this, 'rtwbmal_cus_register_page_callback' ) );
		
		add_shortcode( 'rtwbmal_cus_login_page', array( $this, 'rtwbmal_cus_login_page_callback' ) );

		add_shortcode( 'BookMyAppointmentForm', array( $this, 'rtwbmal_appointment_booking' ) );
		
	}
	 
	/**
	 * Register the stylesheets for the public area.
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

		wp_enqueue_style( $this->rtwbmal_plugin_name, plugin_dir_url( __FILE__ ) . 'css/rtwbmal-book-my-appointment-public.css', array(), $this->rtwbmal_version, 'all' );

		wp_enqueue_style('googleapis', plugin_dir_url( __FILE__ ) . 'css/googleapis.css', array(), $this->rtwbmal_version, 'all' );

		wp_register_style( 'datepicker', RTWBMAL_URL . 'assets/jquery-ui.min.css', array(), $this->rtwbmal_version, 'all' );
		
        wp_enqueue_style('datepicker');
        //jquery-modal
		wp_enqueue_style( 'modal', RTWBMAL_URL . 'assets/jquery-modal/jquery.modal.css', array(), $this->rtwbmal_version, 'all' );

		wp_enqueue_style( 'font-awesome',   RTWBMAL_URL . 'assets/fontawesome/css/all.css', array(), $this->rtwbmal_version, 'all' );

		wp_enqueue_style( "select2", RTWBMAL_URL . 'assets/select2/select2.css' , array(), $this->rtwbmal_version, 'all' );

		////// styling for template ///////
		wp_enqueue_style( "rtwbmal-template",  plugin_dir_url( __FILE__ ) . 'partials/template/rtwbmal-template-public.css', array(), $this->rtwbmal_version, false );

		wp_enqueue_style( "rtwbmal-template-first",  plugin_dir_url( __FILE__ ) . 'partials/template/template-css/template-first.css', array(), $this->rtwbmal_version, false );
		
		////// styling for template ///////

	}

	/**
	 * Register the JavaScript for the public area.
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
		
		$rtwbmal_screen   = function_exists( 'get_current_screen' ) ? get_current_screen() : '';
		
		$rtwbmal_screen_id = ( isset( $rtwbmal_screen->id ) ) ? $rtwbmal_screen->id : '';

		wp_enqueue_script( $this->rtwbmal_plugin_name, plugin_dir_url( __FILE__ ) . 'js/rtwbmal-book-my-appointment-public.js', array( 'jquery' ), $this->rtwbmal_version, false );
		wp_enqueue_script( "select2", RTWBMAL_URL. 'assets/select2/select2.full.min.js', array( 'jquery' ), $this->rtwbmal_version, false );
		wp_enqueue_script( "blockUI", RTWBMAL_URL . 'assets/blockUI/jquery.blockUI.min.js', array( 'jquery' ), $this->rtwbmal_version, false );
		$rtwbmal_frntend_brdr_radi = get_option('rtwbmal_frntend_brdr_radi');

		$rtwbmal_ajax_nonce         = wp_create_nonce( "rtwbmal-ajax-security-string" );
        $rtwbmal_translation_array  = array(
            'rtwbmal_ajaxurl'        => esc_url( admin_url( 'admin-ajax.php' ) ),
            'rtwbmal_nonce'          => $rtwbmal_ajax_nonce,
            'rtwbmal_required'       => esc_html__( 'Required', 'rtwbmal-book-my-appointment' ),
            'rtwbmal_email'			=> esc_html__( 'Enter Valid Email', 'rtwbmal-book-my-appointment'),
            'select_service'  		=> esc_html__( 'Select a Service', 'rtwbmal-book-my-appointment' ),
            'select_specialist' 	=> esc_html__( 'Select a Specialist', 'rtwbmal-book-my-appointment' ),
            'select_datetime' 		=> esc_html__( 'Select a Date & Time', 'rtwbmal-book-my-appointment' ),
            'select_paymethod' 		=> esc_html__( 'Please Select a payment method', 'rtwbmal-book-my-appointment' ),
            'rtwbmal_approval_sure'  => esc_html__( 'Are You Sure?', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_validations'	=> esc_html__( 'Please select a service, specialist, date & time and fill out the customer\'s details to proceed.', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_cncl_reason' 	=> esc_html__( 'Please Enter Reason of Cancellation.', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_first_name' 	=> esc_html__( 'Enter Customer First Name.', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_last_name' 	=> esc_html__( 'Enter Customer Last Name.', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_mob' 	=> esc_html__( 'Enter Mobile Number.', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_cus_no' 	=> esc_html__( 'Enter Number of People.', 'rtwbmal-book-my-appointment' ) ,
			'rtwbmal_pay_metd' 	=> esc_html__( 'Select Payment Method.', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_book_success' =>  esc_html__( 'Back to Services', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_success' =>  esc_html__( 'Success!', 'rtwbmal-book-my-appointment' ),
			'rtwbmal_frntend_brdr_radi' => $rtwbmal_frntend_brdr_radi
        );

        wp_localize_script( $this->rtwbmal_plugin_name, 'rtwbmal_global_params', $rtwbmal_translation_array );
        wp_enqueue_script( $this->rtwbmal_plugin_name );

        wp_register_script('datepicker', RTWBMAL_URL . 'assets/jquery-ui.min.js', array( 'jquery' ), $this->rtwbmal_version, true );
        wp_enqueue_script( 'datepicker' );
        
		wp_enqueue_script( 'jquery.validate', RTWBMAL_URL . 'assets/jquery.validate/jquery.validate.js', array( 'jquery' ), $this->rtwbmal_version, false ); 

		wp_enqueue_script( 'maskedinput', RTWBMAL_URL . 'public/js/jquery.maskedinput.js', array( 'jquery' ), $this->rtwbmal_version, true );
		
		
		wp_enqueue_script( "notitfy", RTWBMAL_URL . 'assets/jquery.notify.min.js', array( 'jquery' ), $this->rtwbmal_version, false );

		////// jquery for template ///////
		wp_enqueue_script( 'rtwbmal_template', plugin_dir_url( __FILE__ ) . 'partials/template/rtwbmal-template-public.js', array( 'jquery', $this->rtwbmal_plugin_name ), $this->rtwbmal_version, false );

		wp_enqueue_script( "rtwbmal-template-first",  plugin_dir_url( __FILE__ ) . 'partials/template/template-js/template-first.js', array(), $this->rtwbmal_version, false );

		////// jquery for template ///////
	}


	/**
	 *   Booking Appointment form.
	 *
	 * @since    1.0.0
	 */
	function rtwbmal_appointment_booking(){
		ob_start();
		include_once( RTWBMAL_DIR.'public/partials/template/rtwbmal-template-public.php' );
		
		if ( ! function_exists( 'get_current_page_url' ) ) {
			function get_current_page_url() {
			  global $wp;
			  return add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
			}
		}
		return ob_get_clean();
	}

	/**
	* function to get service data using service id
	* @since    1.0.0
	*/
	function rtwbmal_book_service_callback(){
		global $wpdb;
		$rtwbmal_service_id = sanitize_text_field($_POST['service_id']);

		$rtwbmal_all_services = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_services ORDER BY `id` ASC", ARRAY_A );

		$emp_array = array();
		foreach ( $rtwbmal_all_services as $key => $value ) {
			if( $rtwbmal_service_id == $value['service_id'] ) 
			{
				if( !in_array( $value['emp_id'], $emp_array ) )
				{
					$emp_array[] = $value['emp_id'];
				}
			}
		}
	
		$rtwbmal_emp_array = array();

		foreach ($emp_array as $emp => $id) {
			$rtwbmal_emp = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees WHERE id=%d", $id ), ARRAY_A );
			$rtwbmal_emp_array[] = $rtwbmal_emp[0];
		}

		$rtwbmal_frnt_settings = get_option('rtwbmal_front_display_option', array());

		$html = '';

		$html .= '<div class"rtwbmal_services"><div class="rtwbmal_services_header"> <div class="rtwbmal_service_name">'. esc_html__(isset($rtwbmal_frnt_settings['specialist_header']) ? $rtwbmal_frnt_settings['specialist_header'] : 'Select Specialist', 'rtwbma-book-my-appointment' ).'</div></div><div class="rtwbmal_service_tbl rtwbmal_employee_div">';

		foreach ( $rtwbmal_emp_array as $emp_name => $emp ) { 
			$html .= '<div class="rtwbmal_service_tbl_row"><div class="rtwbmal_service_tbl_title">
				<div class="rtwbmal_placeholder_image"><img src="'. esc_url(wp_get_attachment_url($emp['attachment_id'])) .'"/> </div>
				<span class="rtwbmal_ser_title">'. esc_html__( $emp["first_name"], "rtwbma-book-my-appointment" ).'</span></div>
				<div class="rtwbmal_service_tbl_book_now">
				<span class="rtwbmal_custom_radio"><input type="radio" class="rtwbmal_emp_id" name="rtwbmal_employee" value="'. esc_attr($emp["id"]) .'"></span>
				</div></div>';
		}

		$html .= '</div><div class="rtwbmal_next">
			<input type="button" class="rtwbmal_prev_btn" data-content="specialist" value="'. esc_attr__("Prev", "rtwbma-book-my-appointment") .'" name="rtwbmal_submit">
			<input type="button" class="rtwbmal_next_btn" data-content="specialist" value=" '.esc_attr__('Next', 'rtwbma-book-my-appointment').'" name="rtwbmal_submit">
		</div></div>';
			
		echo json_encode($html);
		wp_die();
	}

	/**
	* function to get employee data
	* @since    1.0.0
	*/
	function rtwbmal_get_emp_detail_callback(){
		global $wpdb;
		$rtwbmal_emp_id = sanitize_text_field($_POST['emp_id']);
		$rtwbmal_dayOfWeek = sanitize_text_field($_POST['dayOfWeek']);
		$rtwbmal_duration = sanitize_text_field($_POST['duration']);

		$rtwbmal_working_hours = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_working_hour WHERE emp_id=%d AND days=%d", $rtwbmal_emp_id, $rtwbmal_dayOfWeek ), ARRAY_A );
		// echo '<script> alert('.$rtwbmal_working_hours.')</script>';

		$rtwbmal_hours_break = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_hour_break WHERE emp_id=%d AND days=%d", $rtwbmal_emp_id, $rtwbmal_dayOfWeek ), ARRAY_A );

		$rtwbmal_end_time = $rtwbmal_working_hours[0]['end_time'];
		$rtwbmal_start_time = $rtwbmal_working_hours[0]['strt_time'];

		$rtwbmal_html = '';

		$timesplit_start = explode(':',$rtwbmal_start_time);
		$timesplit_end = explode(':',$rtwbmal_end_time);
		$rtwbmal_start_time = (($timesplit_start[0]*60*60)+($timesplit_start[1]*60));
		
		$rtwbmal_end_time = ($timesplit_end[0]*60*60)+($timesplit_end[1]*60);
		$rtwbmal_end_time = $rtwbmal_end_time - $rtwbmal_duration;
		$time_array = $this->rtwbmal_emp_wrkng_hours( $rtwbmal_start_time, $rtwbmal_end_time );

		$rtwbmal_break_strt = explode(':', $rtwbmal_hours_break[0]['strt_time']);
		$rtwbmal_break_end = explode(':', $rtwbmal_hours_break[0]['end_time']);

		$rtwbmal_brk_start_time = (($rtwbmal_break_strt[0]*60*60)+($rtwbmal_break_strt[1]*60));
		$rtwbmal_brk_end_time = ($rtwbmal_break_end[0]*60*60)+($rtwbmal_break_end[1]*60);

		$break_array = $this->rtwbmal_emp_wrkng_hours( $rtwbmal_brk_start_time, $rtwbmal_brk_end_time );

		$rtwbmal_html = '<div class="rtwbmal_times"><ul>';

		if(is_array($time_array) && !empty($time_array))
		{
			foreach ($time_array as $time => $val) {
				if( !array_key_exists( $time, $break_array ) )
				{
					$rtwbmal_html .= '<li class="button rtwbmal_time_app"><div class="rtwbmal_time_key">
					<input type="hidden" class="rtwbmal_save_time" value="'.esc_attr($time).'"><span> '. esc_attr($val) .' </span>
					</div></li>';
				}
			}
		}
		else{
			$rtwbmal_html .= esc_html__( 'Sorry no time slots available', 'rtwbmal-book-my-appointment' );
		}
		
		$rtwbmal_html .= '</ul></div>';
		echo json_encode($rtwbmal_html);
		wp_die();
	}

	/**
	 * array of times with half hour intervals
	 * * @since    1.0.0
	 */
	function rtwbmal_emp_wrkng_hours( $lower = 0, $upper = 86400, $step = 1800 ) {
	    $times = array();
	    $format = '';
	    if ( empty( $format ) ) {
	        $format = 'g:i A';
	    }

	    foreach ( range( $lower, $upper, $step ) as $increment ) {
	        $increment = gmdate( 'H:i', $increment );

	        list( $hour, $minutes ) = explode( ':', $increment );

	        $date = new DateTime( $hour . ':' . $minutes );

	        $times[(string) $increment] = $date->format( $format );
	    }
	    return $times;
	}

	/**
	* function to add appointment from frontend
	* @since    1.0.0
	*/
	function rtwbmal_add_appointment_callback()
	{
		$rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
			global $wpdb;

			$rtwbmal_length = sanitize_text_field($_POST['length']);
			if( $rtwbmal_length > 11)
			{
				$rtwbmal_emp_id = sanitize_text_field($_POST['emp_id']);
				$rtwbmal_user_id = sanitize_text_field($_POST['rtwbmal_user_id']);
				$rtwbmal_service = sanitize_text_field($_POST['rtwbmal_service']);
				$rtwbmal_duration = sanitize_text_field($_POST['duration']);
				$rtwbmal_start_date = sanitize_text_field($_POST['start_date']);
				$rtwbmal_start_time = sanitize_text_field($_POST['start_time']);
				$number_of_people = sanitize_text_field($_POST['number_of_people']);
				$rtwbmal_pay_method = sanitize_text_field($_POST['pay_method']);

				$rtwbmal_cus_first_name = sanitize_text_field($_POST['cus_first_name']);
				$rtwbmal_cus_last_name = sanitize_text_field($_POST['cus_last_name']);
				$rtwbmal_customer_email = sanitize_text_field($_POST['customer_email']);
				$rtwbmal_customer_mob_no = sanitize_text_field($_POST['customer_mob_no']);
				$rtwbmal_customer_message = sanitize_text_field(isset( $_POST['customer_msg']) ? $_POST['customer_msg'] : '' );

				$rtwbmal_rtwbmal_coupon = sanitize_text_field($_POST['rtwbmal_coupon']);
				$rtwbmal_rtwbmal_coupon_id = sanitize_text_field($_POST['rtwbmal_coupon_id']);
				$discounted_price = 0;
				$today_date = date('Y-m-d');

				$rtwbmal_user_id = get_current_user_id();

				$rtwbmal_get_wp_user = get_user_by( 'email', $rtwbmal_customer_email );

				$rtwbmal_wp_user_id = '';
				$rtwbmal_error_msg = '';

				if( $rtwbmal_user_id == 0 && empty( $rtwbmal_get_wp_user ) )
				{
					if( is_email( $rtwbmal_customer_email ) )
					{
					
						$rtwbmal_password = wp_generate_password( 12, true );
						$rtwbmal_userdata = array( 'user_email' => $rtwbmal_customer_email,
										'display_name' => $rtwbmal_cus_first_name,
										'first_name' => $rtwbmal_cus_first_name,
										'last_name' => $rtwbmal_cus_last_name,
										'user_pass' => $rtwbmal_password,
										'user_login' => $rtwbmal_customer_email );

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
				elseif( $rtwbmal_user_id != 0 )
				{
					$rtwbmal_wp_user_id = $rtwbmal_user_id;
				}

				$rtwbmal_end_time = date( "H:i", strtotime( +(int)($rtwbmal_duration).' minutes', $rtwbmal_start_time ) );
				
				$rtwbmal_register_date = date("Y-m-d");
				$rtwbmal_inserted = $wpdb->insert(
					$wpdb->prefix.'rtwbma_customers',
					array(
						'wp_user_id'      => $rtwbmal_wp_user_id,
						'first_name'  => $rtwbmal_cus_first_name,
						'last_name'      => $rtwbmal_cus_last_name,
						'email'  => $rtwbmal_customer_email,
						'phone'    => $rtwbmal_customer_mob_no,
						'gender'  => 1,
						'birthday'    => '',
						'country'      => '',
						'state'=> '',
						'city' => '',
						'address' => '',
						'post_code' => '',
						'info' => '',
						'registration_date' => $rtwbmal_register_date,
						'attachment_id' => '',
					)
				);
				$rtwbmal_last_cust_id = $wpdb->insert_id;
				
				$rtwbmal_inserted = $wpdb->insert(
					$wpdb->prefix.'rtwbma_appointments',
					array(
						'emp_id'      => $rtwbmal_emp_id,
						'service_id'  => $rtwbmal_service,
						'loc_id'      => 1,
						'start_date'  => $rtwbmal_start_date,
						'end_date'    => $rtwbmal_start_date,
						'start_time'  => $rtwbmal_start_time,
						'end_time'    => $rtwbmal_end_time,
						'app_status'  => 0,
						'created_from'=> 0,
						'note' => $rtwbmal_customer_message
					)
				);
				$rtwbmal_last_app_id = $wpdb->insert_id;

				$d = mktime(11, 14, 54, 8, 12, 2014);
				$status_updated = date("Y-m-d h:i:s");

				$rtwbmal_get_price = $wpdb->get_results( $wpdb->prepare( "SELECT price FROM ".$wpdb->prefix."rtwbma_services WHERE id=%d", $rtwbmal_service ), ARRAY_A );

				$pay_type = 0;
				if( $rtwbmal_pay_method == 'paypal' )
				{
					$pay_type = 1;
				}
				elseif( $rtwbmal_pay_method == 'stripe' )
				{
					$pay_type = 2;
				}

				$total_amount = $rtwbmal_get_price[0]['price'] - $discounted_price;
				$rtwbmal_inserted = $wpdb->insert(
					$wpdb->prefix.'rtwbma_payments',
					array(
						'coupon_id'   	=> $rtwbmal_rtwbmal_coupon_id,
						'appointment_id'=> $rtwbmal_last_app_id,
						'type'          => $pay_type,
						'price'         => $total_amount,
						'paid'       	=> 0,
						'tax_id'  		=> 0,
						'created_date'  => $status_updated,
						'status'     	=> 0,
						'transaction_detail' => ''
					)
				);

				$rtwbmal_last_pay_id = $wpdb->insert_id;
				$rtwbmal_inserted = $wpdb->insert(
					$wpdb->prefix.'rtwbma_customer_appointments',
					array(
						'appointment_id'   	=> $rtwbmal_last_app_id,
						'cust_id'           => $rtwbmal_last_cust_id,
						'num_of_people' 	=> $number_of_people,
						'price'            => $total_amount,
						'payment_id'       => $rtwbmal_last_pay_id,
						'status'           => 0,
						'status_updated_at'=> $status_updated,
						'rating'           => 0,
						'review'           => '',
						'date_created'     => $status_updated,
						'created_from'     => 0,
					)
				);

				$rtwbmal_msg = esc_html__('Appointment Added', 'rtwbmal-book-my-appointment');
				$rtwbmal_detail_arr = array( 'emp_id' => $rtwbmal_emp_id,
											'service_id' => $rtwbmal_service,
											'duration' => $rtwbmal_duration,
											'start_date' => $rtwbmal_start_date,
											'start_time' => $rtwbmal_start_time,
											'no_of_people' => $number_of_people,
											'cust_first_name' => $rtwbmal_cus_first_name,
											'cust_last_name' => $rtwbmal_cus_last_name,
											'cust_email' => $rtwbmal_customer_email,
											'cust_mob_no' => $rtwbmal_customer_mob_no,
											'appoin_id' => $rtwbmal_last_app_id,
											'pay_id' => $rtwbmal_last_pay_id,
											'amount' => $total_amount );

				$return_url = '';
				$reload_url = get_option( 'rtwbmal_return_url', get_home_url() );
				$reload_url = $reload_url.'?rtwbmal_success=true';

				echo json_encode($reload_url);
				wp_die();
			}
			else{
				$return_url = '';
				$reload_url = get_option( 'rtwbmal_return_url', get_home_url() );
				$reload_url = $reload_url.'?rtwbmal_success=false';
				echo json_encode($reload_url);
				wp_die();
			}
		}
        wp_die();
	}

	/**
	* function to cancel appointment
	* @since    1.0.0
	*/
	public function rtwbmal_cncl_appointment_callback()
	{
		$rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
			global $wpdb;
			$rtwbmal_appoin_id = sanitize_text_field( $_POST['appoin_id'] );
			$rtwbmal_cncl_reason = sanitize_text_field( $_POST['cancel_reason'] );

			$rtwbmal_inserted = $wpdb->update(
	            $wpdb->prefix.'rtwbma_appointments',
	            array(
	                'app_status'    	=> 2,
	                'cancel_reason'	=> $rtwbmal_cncl_reason
	            ),
	            array(
	            	'id' => $rtwbmal_appoin_id
	            )
	        );

	        $rtwbmal_updated = $wpdb->update(
	            $wpdb->prefix.'rtwbma_customer_appointments',
	            array(
	                'status'           => 2,
	            ),
	            array(
	            	'appointment_id' => $rtwbmal_appoin_id
	            )
	        );

	        $rtwbmal_appointment = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_appointments WHERE id=%d", $rtwbmal_appoin_id ), ARRAY_A );
	        $rtwbmal_cus_appoint = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_customer_appointments WHERE id=%d", $rtwbmal_appoin_id ), ARRAY_A );


	        $return_url = get_option( 'rtwbmal_return_url', get_home_url() );
	        echo json_encode($return_url);
	        wp_die();
		}
	}

	/**
	* Function to register customer 
	* @since    1.0.0
	*/
	function rtwbmal_cus_register_page_callback(){
		ob_start();

		if( !is_admin() && strpos( $_SERVER['REQUEST_URI'], 'wp-login.php' ) === false && strpos($_SERVER['REQUEST_URI'], 'wp-signup.php') === false )
		{
			$rtwbmal_html = include_once( RTWBMAL_DIR.'public/partials/shortcodes/rtwbmal_cus_register_page.php' );
			return $rtwbmal_html;
		}

		return ob_get_clean();
	}

	/**
	* Function to view login page to customer 
	* @since    1.0.0
	*/
	function rtwbmal_cus_login_page_callback(){
		ob_start();

		if( !is_admin() && strpos( $_SERVER['REQUEST_URI'], 'wp-login.php' ) === false && strpos( $_SERVER['REQUEST_URI'], 'wp-signup.php' ) === false )
		{
			$rtwbmal_html = include( RTWBMAL_DIR.'public/partials/shortcodes/rtwbmal_cus_login_page.php' );
			return $rtwbmal_html;
		}

		return ob_get_clean();
	}
	
	/** 
	*  function to update customer dada
	* @since    1.0.0
	**/
	function rtwbmal_update_customer_callback(){
		$rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
			global $wpdb;
			$rtwbmal_cus_id 	= sanitize_text_field( $_POST['cus_id'] );
			$rtwbmal_cus_name 	= sanitize_text_field( $_POST['cus_name'] );
			$rtwbmal_cus_email 	= sanitize_text_field( $_POST['cus_email'] );
			$rtwbmal_cus_phone 	= sanitize_text_field( $_POST['cus_phone'] );
			$rtwbmal_month 		= sanitize_text_field( $_POST['month'] );
			$rtwbmal_date 		= sanitize_text_field( $_POST['date'] );
			$rtwbmal_year 		= sanitize_text_field( $_POST['year'] );

			$rtwbmal_name_array = explode(" ", trim($rtwbmal_cus_name));

			$rtwbmal_first_name = isset( $rtwbmal_name_array[0] ) ? $rtwbmal_name_array[0] : '';
			$rtwbmal_last_name = isset( $rtwbmal_name_array[1] ) ? $rtwbmal_name_array[1] : '';
			
			$rtwbmal_dob = $rtwbmal_year.':'.$rtwbmal_month.':'.$rtwbmal_date;

			$rtwbmal_updated = $wpdb->update(
				$wpdb->prefix.'rtwbma_customers',
				array(
					'first_name'   	=> $rtwbmal_first_name,
					'last_name'     => $rtwbmal_last_name,
					'email'         => $rtwbmal_cus_email,
					'phone'       	=> $rtwbmal_cus_phone,
					'birthday'  	=> $rtwbmal_dob
				),
				array(
					'id' => $rtwbmal_cus_id
				)
			);

			if( $rtwbmal_updated )
			{
				echo json_encode(esc_html__( 'Profile Upadted', 'rtwbmal-book-my-appointment' ));
			}
			else{
				echo json_encode(esc_html__( 'Something went wrong.', 'rtwbmal-book-my-appointment' ));
			}
			wp_die();
		}
	}
	
	/** 
	*  function to update employee dada
	* @since    1.0.0
	**/
	function rtwbmal_update_employee_callback(){
		$rtwbmal_check_ajax = check_ajax_referer( 'rtwbmal-ajax-security-string', 'rtwbmal_security_check' );

        if ( $rtwbmal_check_ajax ) {
			global $wpdb;
			$rtwbmal_emp_id 	= sanitize_text_field( $_POST['emp_id'] );
			$rtwbmal_emp_name 	= sanitize_text_field( $_POST['emp_name'] );
			$rtwbmal_emp_email 	= sanitize_text_field( $_POST['emp_email'] );
			$rtwbmal_emp_phone 	= sanitize_text_field( $_POST['emp_phone'] );
			$rtwbmal_emp_info 	= sanitize_text_field( $_POST['emp_info'] );
			$rtwbmal_emp_addr 	= sanitize_text_field( $_POST['emp_addr'] );
			$rtwbmal_visibility 	= sanitize_text_field( $_POST['visibility'] );

			$rtwbmal_emp_location  = serialize( $_POST[ 'emp_location' ] );

			$rtwbmal_name_array = explode(" ", trim($rtwbmal_emp_name));

			$rtwbmal_first_name = isset( $rtwbmal_name_array[0] ) ? $rtwbmal_name_array[0] : '';
			$rtwbmal_last_name = isset( $rtwbmal_name_array[1] ) ? $rtwbmal_name_array[1] : ''; 

			$rtwbmal_services  = array();
			$rtwbmal_prices = array();
			$rtwbmal_no_service = array();
			
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

			$rtwbmal_emp_updated = $wpdb->update(
				$wpdb->prefix.'rtwbma_employees',
				array(
					'first_name'   	=> $rtwbmal_first_name,
					'last_name'     => $rtwbmal_last_name,
					'email'         => $rtwbmal_emp_email,
					'phone'       	=> $rtwbmal_emp_phone,
					'address'  		=> $rtwbmal_emp_addr,
					'info'			=> $rtwbmal_emp_info,
					'visibility' 	=> $rtwbmal_visibility
				),
				array(
					'id' => $rtwbmal_emp_id
				)
			);

			$rtwbmal_emp_services	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_services WHERE emp_id=%d", $rtwbmal_emp_id  ), ARRAY_A );
			$ser_ids = array();
			foreach ($rtwbmal_emp_services as $key => $id) {
				$ser_ids[] = $id['service_id']; 
			}

			foreach( $rtwbmal_services as $ser_id => $service )
			{
				if( in_array( $ser_id, $ser_ids ) )
				{
					$rtwbmal_emp_updated = $wpdb->update(
						$wpdb->prefix.'rtwbma_emp_services',
						array(
							'loc_id'        => $rtwbmal_emp_location,
							'active' 		=> 1,
							'price'         => $rtwbmal_prices[$ser_id]['price'],
							'cap_min'       => $rtwbmal_prices[$ser_id]['min'],
							'cap_max'       => $rtwbmal_prices[$ser_id]['max']
						),
						array(
							'emp_id' => $rtwbmal_emp_id,
							'service_id' => $ser_id
						)
					);
				
				}
				else
				{
					$rtwbmal_emp_updated = $wpdb->insert(
						$wpdb->prefix.'rtwbma_emp_services',
						array(
							'loc_id'        => $rtwbmal_emp_location,
							'price'         => $rtwbmal_prices[$ser_id]['price'],
							'service_id'  	=> $ser_id,
							'emp_id'		=> $rtwbmal_emp_id,
							'cap_min'       => $rtwbmal_prices[$ser_id]['min'],
							'cap_max'       => $rtwbmal_prices[$ser_id]['max'],
							'active' 		=> 1
						)
					);
				}
			}
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

			if( $rtwbmal_emp_updated )
			{
				echo json_encode(esc_html__( 'Profile Updated', 'rtwbmal-book-my-appointment' ));
			}
			else{
				echo json_encode(esc_html__( 'Something went wrong.', 'rtwbmal-book-my-appointment' ));
			}
			wp_die();
		}
	}
}