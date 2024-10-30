<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !is_user_logged_in() ){
	$rtwbmal_extra_features 	= get_option( 'rtwbmal_frontend_option', array() );
	
	$rtwbmal_signup_bonus_type 	= isset( $rtwbmal_extra_features[ 'signup_bonus_type' ] ) ? $rtwbmal_extra_features[ 'signup_bonus_type' ] : 0;

	$rtwbmal_reg_temp_features = get_option( 'rtwbmal_reg_temp_opt', array() );

	$rtwbmal_selected_template = isset( $rtwbmal_extra_features[ 'rtwbmal_select_template' ] ) ? $rtwbmal_extra_features[ 'rtwbmal_select_template' ] : 1;

	$rtwbmal_use_default_color_checked = isset( $rtwbmal_reg_temp_features[ 'temp_colors' ] ) ? $rtwbmal_reg_temp_features[ 'temp_colors' ] : 1;

	if( $rtwbmal_use_default_color_checked ){
		unset( $rtwbmal_reg_temp_features[ 'mainbg_color' ] );
		unset( $rtwbmal_reg_temp_features[ 'bg_color' ] );
		unset( $rtwbmal_reg_temp_features[ 'head_color' ] );
		unset( $rtwbmal_reg_temp_features[ 'button_color' ] );
	}

	if( $rtwbmal_selected_template == 1 ){
		$rtwbmal_html = '';

		$rtwbmal_bg_color 		= isset( $rtwbmal_reg_temp_features[ 'bg_color' ] ) ? $rtwbmal_reg_temp_features[ 'bg_color' ] : '#EEEEEE';
		$rtwbmal_button_color 	= isset( $rtwbmal_reg_temp_features[ 'button_color' ] ) ? $rtwbmal_reg_temp_features[ 'button_color' ] : '#219595';
		$rtwbmal_form_custom_css = isset( $rtwbmal_reg_temp_features[ 'css' ] ) ? $rtwbmal_reg_temp_features[ 'css' ] : '';
		$rtwbmal_form_title 	= isset( $rtwbmal_reg_temp_features[ 'title' ] ) ? $rtwbmal_reg_temp_features[ 'title' ] : '';

		$rtwbmal_html .= 	'<style>';
		$rtwbmal_html .= 		'#rtwbmal-register-form{';
		$rtwbmal_html .= 			'border-color:'.$rtwbmal_bg_color.';';
		$rtwbmal_html .= 		'}';
		$rtwbmal_html .= 		'#rtwbmal-register-form form input[type="submit"]{';
		$rtwbmal_html .= 			'background-color:'.$rtwbmal_button_color.';';
		$rtwbmal_html .= 		'}';
		if( $rtwbmal_form_custom_css != '' ){
			$rtwbmal_html .= 	$rtwbmal_form_custom_css;
		}
		$rtwbmal_html .= 	'</style>';

		$rtwbmal_html .= 			'<div id="rtwbmal-register-form">';
		$rtwbmal_html .= 				'<div class="rtwbmal-title">';

		$rtwbmal_html .= 					'<h2>';
		if( $rtwbmal_form_title != '' ){
			$rtwbmal_html .= 					esc_html( $rtwbmal_form_title );
		}
		else{
			$rtwbmal_html .= 					esc_html__( "Login your Account", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 					'</h2>';

		$rtwbmal_html .= 				'</div>';
		$rtwbmal_html .= 				'<form action="'.esc_url( site_url("wp-login.php", "login_post") ).'" method="post">';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="log" placeholder="'.esc_attr__( "Username or Email Address", "rtwbmal-book-my-appointment" ).'" id="log" class="input" required /></div>';

		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="password" name="pwd" placeholder="'.esc_attr__( "Password", "rtwbmal-book-my-appointment" ).'" id="pwd" class="input" required /></div>';

		if( $rtwbmal_signup_bonus_type == 1 ){
			$rtwbmal_html .= 				'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="text" class="input-text" name="rtwwwap_referral_code_field" id="rtwwwap_referral_code_field" value="" placeholder="'.esc_attr__( "Referral Code", "rtwbmal-book-my-appointment" ).'" /></div>';
		}
		$rtwbmal_html .= 					'<div><input type="submit" value="'.esc_attr__( "Login", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-Login" /></div>';
		$rtwbmal_html .=                	'<input type="hidden" value="'.esc_attr( $_SERVER['REQUEST_URI'] ) .'" name="redirect_to">';
		$rtwbmal_html .=                	'<input type="hidden" name="user-cookie" value="1" />';
		$rtwbmal_html .= 				'</form>';
		$rtwbmal_html .= 				'</form>';
		
		$rtwbmal_html .= 			'</div>';
		$rtwbmal_html .= 		'</div>';
	}
	elseif( $rtwbmal_selected_template == 2 ){
		$rtwbmal_html = '';

		$rtwbmal_head_color 	= isset( $rtwbmal_reg_temp_features[ 'head_color' ] ) ? $rtwbmal_reg_temp_features[ 'head_color' ] : '#232055';
		$rtwbmal_button_color 	= isset( $rtwbmal_reg_temp_features[ 'button_color' ] ) ? $rtwbmal_reg_temp_features[ 'button_color' ] : '#232055';
		$rtwbmal_form_custom_css= isset( $rtwbmal_reg_temp_features[ 'css' ] ) ? $rtwbmal_reg_temp_features[ 'css' ] : '';
		$rtwbmal_form_title 	= isset( $rtwbmal_reg_temp_features[ 'title' ] ) ? $rtwbmal_reg_temp_features[ 'title' ] : '';

		$rtwbmal_html .= 	'<style>';
		$rtwbmal_html .= 		'.rtwbmal-form-wrapper form h2{';
		$rtwbmal_html .= 			'background-color:'.$rtwbmal_head_color.';';
		$rtwbmal_html .= 		'}';
		$rtwbmal_html .= 		'.rtwbmal-form-wrapper form input[type="submit"]{';
		$rtwbmal_html .= 			'background-color:'.$rtwbmal_button_color.';';
		$rtwbmal_html .= 		'}';
		if( $rtwbmal_form_custom_css != '' ){
			$rtwbmal_html .= 	$rtwbmal_form_custom_css;
		}
		$rtwbmal_html .= 	'</style>';

		$rtwbmal_html .= 	'<div class="rtwbmal-form-wrapper">';
		$rtwbmal_html .= 		'<form action="'.esc_url( site_url("wp-login.php", "login_post") ).'" method="post">';

		$rtwbmal_html .= 			'<h2>';
		if( $rtwbmal_form_title != '' ){
			$rtwbmal_html .= 			esc_html( $rtwbmal_form_title );
		}
		else{
			$rtwbmal_html .= 			esc_html__( "Login Form", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 			'</h2>';

		$rtwbmal_html .= 			'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="log" placeholder="'.esc_attr__( "Username or Email Address", "rtwbmal-book-my-appointment" ).'" required /></div>';
		$rtwbmal_html .= 			'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="password" name="pwd" placeholder="'.esc_attr__( "Password", "rtwbmal-book-my-appointment" ).'" required ></div>';

		$rtwbmal_html .= 			'<div><input type="submit" value="'.esc_attr__( "Login", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-Login"></div>';
		$rtwbmal_html .=                	'<input type="hidden" value="'.esc_attr( $_SERVER['REQUEST_URI'] ) .'" name="redirect_to">';
		$rtwbmal_html .=                	'<input type="hidden" name="user-cookie" value="1" />';
		$rtwbmal_html .= 				'</form>';
		$rtwbmal_html .= 		'</form>';
		
		$rtwbmal_html .= 	'</div>';
	}
	elseif( $rtwbmal_selected_template == 3 ){
		$rtwbmal_html = '';

		$rtwbmal_button_color 	= isset( $rtwbmal_reg_temp_features[ 'button_color' ] ) ? $rtwbmal_reg_temp_features[ 'button_color' ] : '#f6c719';
		$rtwbmal_form_custom_css= isset( $rtwbmal_reg_temp_features[ 'css' ] ) ? $rtwbmal_reg_temp_features[ 'css' ] : '';
		$rtwbmal_form_title 	= isset( $rtwbmal_reg_temp_features[ 'title' ] ) ? $rtwbmal_reg_temp_features[ 'title' ] : '';

		$rtwbmal_html .= 	'<style>';
		$rtwbmal_html .= 		'.rtwbmal-form-wrapper-2 form input[type="submit"]{';
		$rtwbmal_html .= 			'background-color:'.$rtwbmal_button_color.';';
		$rtwbmal_html .= 		'}';
		if( $rtwbmal_form_custom_css != '' ){
			$rtwbmal_html .= 	$rtwbmal_form_custom_css;
		}
		$rtwbmal_html .= 	'</style>';

		$rtwbmal_html .= 	'<div class="rtwbmal-form-wrapper-2">';
		$rtwbmal_html .= 		'<div class="rtwbmal-form-inner">';
		$rtwbmal_html .= 			'<div class="rtwbmal-form-image" style="background-image: url('.RTWBMAL_URL."assets/images/rtw-form-banner.jpg".');">';
		
		$rtwbmal_html .= 				'<h2>';
		if( $rtwbmal_form_title != '' ){
			$rtwbmal_html .= 				esc_html( $rtwbmal_form_title );
		}
		else{
			$rtwbmal_html .= 				esc_html__( "Login", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 				'</h2>';

		$rtwbmal_html .= 			'</div>';
		$rtwbmal_html .= 			'<div class="rtwbmal-form-content">';
		$rtwbmal_html .= 				'<form action="'.esc_url( site_url("wp-login.php", "login_post") ).'" method="post">';
		$rtwbmal_html .= 					'<label>'.esc_html__( "Username or Email Address", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="log" placeholder="'.esc_attr__( "Username or Email Address", "rtwbmal-book-my-appointment" ).'" required ></div>';
		$rtwbmal_html .= 					'<label>'.esc_html__( "Password", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="password" name="pwd" placeholder="'.esc_attr__( "Password", "rtwbmal-book-my-appointment" ).'" required ></div>';
		$rtwbmal_html .= 					'<div><input type="submit" value="'.esc_attr__( "Login", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-Login"></div>';
		$rtwbmal_html .=                	'<input type="hidden" value="'.esc_attr( $_SERVER['REQUEST_URI'] ) .'" name="redirect_to">';
		$rtwbmal_html .=                	'<input type="hidden" name="user-cookie" value="1" />';
		$rtwbmal_html .= 				'</form>';
		
		$rtwbmal_html .= 			'</div>';
		$rtwbmal_html .= 		'</div>';
		$rtwbmal_html .= 	'</div>';
	}
	elseif( $rtwbmal_selected_template == 4 ){
		$rtwbmal_html = '';

		$rtwbmal_mainbg_color 	= isset( $rtwbmal_reg_temp_features[ 'mainbg_color' ] ) ? $rtwbmal_reg_temp_features[ 'mainbg_color' ] : '#E85A26';
		$rtwbmal_bg_color 		= isset( $rtwbmal_reg_temp_features[ 'bg_color' ] ) ? $rtwbmal_reg_temp_features[ 'bg_color' ] : '#DADAF2';
		$rtwbmal_button_color 	= isset( $rtwbmal_reg_temp_features[ 'button_color' ] ) ? $rtwbmal_reg_temp_features[ 'button_color' ] : '#E85A26';
		$rtwbmal_form_custom_css= isset( $rtwbmal_reg_temp_features[ 'css' ] ) ? $rtwbmal_reg_temp_features[ 'css' ] : '';
		$rtwbmal_form_title 	= isset( $rtwbmal_reg_temp_features[ 'title' ] ) ? $rtwbmal_reg_temp_features[ 'title' ] : '';

		$rtwbmal_html .= 	'<style>';
		$rtwbmal_html .= 		'.rtwbmal-form-wrapper-3{';
		$rtwbmal_html .= 			'background-color:'.$rtwbmal_mainbg_color.';';
		$rtwbmal_html .= 		'}';
		$rtwbmal_html .= 		'.rtwbmal-form-wrapper-3 .rtwbmal-form-content{';
		$rtwbmal_html .= 			'background-color:'.$rtwbmal_bg_color.';';
		$rtwbmal_html .= 		'}';
		$rtwbmal_html .= 		'.rtwbmal-form-wrapper-3 form input[type="submit"]{';
		$rtwbmal_html .= 			'background-color:'.$rtwbmal_button_color.';';
		$rtwbmal_html .= 		'}';
		if( $rtwbmal_form_custom_css != '' ){
			$rtwbmal_html .= 	$rtwbmal_form_custom_css;
		}
		$rtwbmal_html .= 	'</style>';

		$rtwbmal_html .= 	'<div class="rtwbmal-form-wrapper-3">';
		$rtwbmal_html .= 		'<div class="rtwbmal-form-inner">';
		$rtwbmal_html .= 			'<div class="rtwbmal-form-content">';
		$rtwbmal_html .= 				'<form action="'.esc_url( site_url("wp-login.php", "login_post") ).'" method="post">';
		$rtwbmal_html .= 					'<h2>';
		if( $rtwbmal_form_title != '' ){
			$rtwbmal_html .= 					esc_html( $rtwbmal_form_title );
		}
		else{
			$rtwbmal_html .= 					esc_html__( "Login", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 					'</h2>';


		$rtwbmal_html .= 					'<label>'.esc_html__( "Username or Email Address", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="log" placeholder="'.esc_attr__( "Username or Email Address", "rtwbmal-book-my-appointment" ).'" required ></div>';
		$rtwbmal_html .= 					'<label>'.esc_html__( "Password", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="password" name="pwd" placeholder="'.esc_attr__( "Password", "rtwbmal-book-my-appointment" ).'" required></div>';
		$rtwbmal_html .= 					'<div><input type="submit" value="'.esc_attr__( "Login", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-Login"></div>';
		$rtwbmal_html .=                	'<input type="hidden" value="'.esc_attr( $_SERVER['REQUEST_URI'] ) .'" name="redirect_to">';
		$rtwbmal_html .=                	'<input type="hidden" name="user-cookie" value="1" />';
		$rtwbmal_html .= 				'</form>';
		
		$rtwbmal_html .= 			'</div>';
		$rtwbmal_html .= 		'</div>';
		$rtwbmal_html .= 	'</div>';
	}

	return $rtwbmal_html;
}
else{
	global $wpdb;
	$rtwbmal_user_id = get_current_user_id();

	$rtwbmal_all_customers 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_customers LIMIT %d", 10000 ), ARRAY_A );
	$rtwbmal_customer_ids = array();
	foreach( $rtwbmal_all_customers as $rtwbmal_key => $rtwbmal_value )
	{
		$rtwbmal_customer_ids[] = $rtwbmal_value['wp_user_id'];
	}

	$rtwbmal_all_employees 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees LIMIT %d", 10000 ), ARRAY_A );

	$rtwbmal_employee_ids = array();
	foreach( $rtwbmal_all_employees as $rtwbmal_key => $rtwbmal_value )
	{
		$rtwbmal_employee_ids[] = $rtwbmal_value['wp_user_id'];
	}
	/////// BMA SETTINGS ////////
	$rtwbmal_general_setting = get_option( 'rtwbmal_general_settings', array() );
	

	///////////// For Customers ///////////
	if( in_array( $rtwbmal_user_id, $rtwbmal_customer_ids ) )
	{
		$rtwbmal_all_customers_id 	= $wpdb->get_results( $wpdb->prepare( "SELECT id FROM ".$wpdb->prefix."rtwbma_customers  WHERE wp_user_id=%d", $rtwbmal_user_id  ), ARRAY_A );
		
		$rtwbmal_appoin_ids = array();
		foreach( $rtwbmal_all_customers_id as $ids => $id )
		{
			$rtwbmal_appoin_id = $wpdb->get_results( $wpdb->prepare( "SELECT appointment_id FROM ".$wpdb->prefix."rtwbma_customer_appointments  WHERE cust_id=%d", $id['id']  ), ARRAY_A );
			
			if( is_array( $rtwbmal_appoin_id ) && !empty( $rtwbmal_appoin_id ) )
			{
				$rtwbmal_appoin_ids[] = $rtwbmal_appoin_id[0]['appointment_id'];
			}
		}
		
		$rtwbmal_appointments = array();
		foreach( $rtwbmal_appoin_ids as $app_id => $id )
		{
			$rtwbmal_appoins = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_appointments  WHERE id=%d", $id  ), ARRAY_A );
			if( is_array( $rtwbmal_appoins ) && !empty( $rtwbmal_appoins ) )
			{
				$rtwbmal_appointments[] = $rtwbmal_appoins[0];
			}
		}
		
		$rtwbmal_price = $wpdb->get_results( $wpdb->prepare( "SELECT price FROM ".$wpdb->prefix."rtwbma_emp_services  WHERE service_id=%d AND emp_id=%d", 1, 35  ), ARRAY_A );

		$rtwbmal_price = $wpdb->get_results( $wpdb->prepare( "SELECT price FROM ".$wpdb->prefix."rtwbma_emp_services  WHERE service_id=%d AND emp_id=%d", 1, 35  ), ARRAY_A );
		
		?><div class="rtwbmal-cust-wrapper">
				<ul class="rtwbmal-tabs-nav">
					<li><a data-tabs="appointments" class="active"><?php esc_html_e('Appointments', 'rtwbmal-book-my-appointment'); ?></a></li>
					<li><a data-tabs="profile" class=""><?php esc_html_e('Profile', 'rtwbmal-book-my-appointment'); ?></a></li>
				</ul>
				<div class="rtwbmal-cust-tab-content show rtwbmal-tab-content" data-tab-content="appointments">
					<table class="rtwbmal-cust-table">
						<thead>
							<tr>
								<th><?php esc_html_e('Date', 'rtwbmal-book-my-appointment'); ?></th>
								<th><?php esc_html_e('Service', 'rtwbmal-book-my-appointment'); ?></th>
								<th><?php esc_html_e('Employee', 'rtwbmal-book-my-appointment'); ?></th>
								<th><?php esc_html_e('Price', 'rtwbmal-book-my-appointment'); ?></th>
								<th><?php esc_html_e('Status', 'rtwbmal-book-my-appointment'); ?></th>
								<th><?php esc_html_e('Cancel', 'rtwbmal-book-my-appointment'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach( $rtwbmal_appointments as $app_details => $app )
							{
								$rtwbmal_tr = false;
								echo '<tr>';
								echo '<td>'. esc_html( date("jS F Y", strtotime( $app[ 'start_date' ] ))) .', '. esc_html( date("h:i a", strtotime($app[ 'start_time' ]))) .'</td>';

								$rtwbmal_service = $wpdb->get_results( $wpdb->prepare( "SELECT title FROM ".$wpdb->prefix."rtwbma_services WHERE id=%d", $app['service_id'] ), ARRAY_A );

								echo '<td>';
								if( isset( $rtwbmal_service[0]['title'] ) )
								{
									echo esc_html( $rtwbmal_service[0]['title'] );
								}
								echo '</td>';

								$rtwbmal_emp = $wpdb->get_results( $wpdb->prepare( "SELECT first_name FROM ".$wpdb->prefix."rtwbma_employees  WHERE id=%d", $app['emp_id'] ), ARRAY_A );

								echo '<td>';
								if( isset($rtwbmal_emp[0]['first_name']) )
								{
									echo esc_html( $rtwbmal_emp[0]['first_name'] );
								}
								echo '</td>';

								$rtwbmal_price = $wpdb->get_results( $wpdb->prepare( "SELECT price FROM ".$wpdb->prefix."rtwbma_emp_services  WHERE service_id=%d AND emp_id=%d", $app['service_id'], $app['emp_id']  ), ARRAY_A );
								echo '<td>';
								if( isset( $rtwbmal_price[0]['price'] ) )
								{
									echo esc_html( $rtwbmal_price[0]['price'] );
								}
								echo '</td>';

								if( $app['app_status'] == 0 )
								{
									echo '<td><span class="rtwbmal_status_span pending">'. esc_html__('Pending', 'rtwbmal-book-my-appointment') .'</span></td>';
								}
								elseif( $app['app_status'] == 1 )
								{
									echo '<td><span class="rtwbmal_status_span approved">'. esc_html__( 'Approved', 'rtwbmal-book-my-appointment' ) .'</span></td>';
								}
								elseif( $app['app_status'] == 2 )
								{
									echo '<td><span class="rtwbmal_status_span cancelled">'. esc_html__( 'Cancelled', 'rtwbmal-book-my-appointment' ) .'</span></td>';
								}
								elseif( $app['app_status'] == 3 )
								{
									echo '<td><span class="rtwbmal_status_span rejected">'. esc_html__('Rejected', 'rtwbmal-book-my-appointment') .'</span></td>';
								}
								elseif( $app['app_status'] == 4 )
								{
									echo '<td>'. esc_html__('Rescheduled', 'rtwbmal-book-my-appointment') .'</td>';
								}

								if( $app['app_status'] != 2 )
								{
									if(  strtotime( $app[ 'start_date' ] ) > strtotime( date("h:i:s") ) ) 
									{
										$rtwbmal_tr = true;
										echo '<td><a href="javascript:void(0)" class="rtwbmal-cust-btn rtwbmal_cncl_btn" data-attr="' . esc_attr( $app['id'] ). '">'. esc_html__('Cancel', 'rtwbmal-book-my-appointment') .'</a></td>';
									}
									else{
										echo '<td></td>';
									}
									
								}
								else{
									echo '<td></td>';
									echo '<td></td>';
								}
								echo '</tr>';
								if( $rtwbmal_tr )
								{
									echo '<tr class="rtwbmal_cancel_reason"><td colspan="6"></td></tr>';
								}
							}
						?></tbody>
					</table>
				</div>
				<div class="rtwbmal-cust-tab-content rtwbmal-tab-content" data-tab-content="profile">
					<?php 
					$rtwbmal_customer_detail 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_customers WHERE wp_user_id=%d", $rtwbmal_user_id  ), ARRAY_A );
					?><input type="hidden" class="rtwbmal_customer_id" value="<?php echo esc_attr($rtwbmal_customer_detail[0]['id']); ?>">
					<div class="mrb-15"><label><?php esc_html_e('Name', 'rtwbmal-book-my-appointment'); ?></label>
						<input  type="text" value="<?php echo esc_attr($rtwbmal_customer_detail[0]['first_name'] . ' ' . $rtwbmal_customer_detail[0]['last_name'] ); ?>" class="form-control rtwbmal_cust_name"/>
					</div>
					<div class="mrb-15"><label><?php esc_html_e('Email', 'rtwbmal-book-my-appointment'); ?></label>
						<input type="email" value="<?php echo esc_attr( $rtwbmal_customer_detail[0]['email'] ); ?>" class="form-control rtwbmal_cus_email"/>
					</div>
					<div class="mrb-15"><label><?php esc_html_e('Phone', 'rtwbmal-book-my-appointment'); ?></label>
						<input type="tel" value="<?php echo esc_attr( $rtwbmal_customer_detail[0]['phone'] ); ?>" class="form-control rtwbmal_cus_phone"/>
					</div>
					<div class="mrb-15"><label><?php esc_html_e('Birthday', 'rtwbmal-book-my-appointment'); ?></label>
						<div class="rtwbmal-cust-column-row">
							<div class="rtwbmal-cust-column-3">
								<select class="form-control rtwbmal_month">
									<option value="0"><?php esc_html_e('Select Month', 'rtwbmal-book-my-appointment'); ?></option>
									<?php
									for ($m=1; $m<=12; $m++) {
										$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
										$rtwbmal_month = date( "m", strtotime( $rtwbmal_customer_detail[0]['birthday'] ));
										
										if( $rtwbmal_month == $m )
										{
											echo '<option selected value="'.esc_attr( $m ).'">'.esc_html( $month ).'</option>';
										}
										else{
											echo '<option value="'.esc_attr( $m ).'">'.esc_html( $month ).'</option>';
										}
									}
								?></select>
							</div>
							<div class="rtwbmal-cust-column-3">
								<select class="form-control rtwbmal_date">
									<option value=""><?php esc_html_e('Select Day', 'rtwbmal-book-my-appointment'); ?></option>
									<?php
									$rtwbmal_day = date( "d", strtotime( $rtwbmal_customer_detail[0]['birthday'] ));
									for( $d=1; $d<=31; $d++ ) {
										if( $rtwbmal_day == $d )
										{
											echo '<option selected value="'.esc_attr( $d ).'">'.esc_html( $d ).'</option>';
										}
										else{
											echo '<option value="'.esc_attr( $d ).'">'.esc_html( $d ).'</option>';
										}
									}
								?></select>
							</div>
							<div class="rtwbmal-cust-column-3">
								<select class="form-control rtwbmal_year">
									<option value=""><?php esc_html_e( 'Select Year', 'rtwbmal-book-my-appointment' ); ?></option>
									<?php
									$rtwbmal_year = date( "Y", strtotime( $rtwbmal_customer_detail[0]['birthday'] ));
									for( $y=2019; $y>=1920; $y-- ) {
										if( $rtwbmal_year == $y )
										{
											echo '<option selected value="'.esc_attr( $y ).'">'.esc_html( $y ).'</option>';
										}
										else{
											echo '<option value="'.esc_attr( $y ).'">'.esc_html( $y ).'</option>';
										}
									}
								?></select>
							</div>
						</div>
						<div class="mrt-15">
							<input type="button" class="rtwbmal_update_profile" value="<?php esc_html_e('Update Profile', 'rtwbmal-book-my-appointment'); ?>">
						</div>
					</div>
				</div>
			</div>
		<?php
	}
	///////////// For Customers ///////////

	///////////// For Employees ///////////
	if( in_array( $rtwbmal_user_id, $rtwbmal_employee_ids ) )
	{
		$rtwbmal_all_employee 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees WHERE wp_user_id=%d", $rtwbmal_user_id  ), ARRAY_A );
		$rtwbmal_emp_id = $rtwbmal_all_employee[0]['id'];

		$rtwbmal_emp_img = wp_get_attachment_url( $rtwbmal_all_employee[0]['attachment_id'] );
		
		$rtwbmal_emp_services	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_emp_services WHERE emp_id=%d", $rtwbmal_emp_id  ), ARRAY_A );

		$rtwbmal_emp_locations = unserialize($rtwbmal_emp_services[0]['loc_id']);

		$rtwbmal_all_services	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_services LIMIT %d", 1000  ), ARRAY_A );

		$rtwbmal_all_locations 	= $wpdb->get_results( $wpdb->prepare( "SELECT id, loc_name FROM ".$wpdb->prefix."rtwbma_locations ORDER BY `loc_name` ASC LIMIT %d", 10 ), ARRAY_A );
		
		?><div class="rtwbmal-emp-wrapper">
		<input type="hidden" class="rtwbmal_emp_id" value="<?php echo esc_attr( $rtwbmal_emp_id ); ?>">
				<ul class="rtwbmal-tabs-nav rtwbmal-emp-tabs-nav">
					<li><a data-tabs="staffdetails" class="active"><?php esc_html_e('Staff Details', 'rtwbmal-book-my-appointment'); ?></a></li>
					<li><a data-tabs="staffservices"><?php esc_html_e('Staff Services', 'rtwbmal-book-my-appointment'); ?></a></li>
				</ul>
				<div class="rtwbmal-emp-tab-content show rtwbmal-tab-content" data-tab-content="staffdetails">
					<div class="rtwbmal-emp-avatar">
						<img class="rtwbmal-emp-avatar-image" src="<?php echo esc_url($rtwbmal_emp_img); ?>" alt="alt"/>
						<h3><?php echo esc_html( $rtwbmal_all_employee[0]['first_name'] ); ?></h3>
					</div>
					<div class="mrb-15"><label><?php esc_html_e('Full name', 'rtwbmal-book-my-appointment'); ?></label>
					<input type="text" value="<?php echo esc_attr( $rtwbmal_all_employee[0]['first_name'] .' '.$rtwbmal_all_employee[0]['last_name'] ); ?>" name="" class="form-control rtwbmal_emp_name"></div>
					<div class="rtwbmal-emp-column-row">
						<div class="rtwbmal-emp-column-2 mrb-15">
							<label><?php esc_html_e('Email', 'rtwbmal-book-my-appointment'); ?></label>
							<input type="email" value="<?php echo esc_attr( $rtwbmal_all_employee[0]['email'] ); ?>" name="" class="form-control rtwbmal_emp_email">
						</div>
						<div class="rtwbmal-emp-column-2 mrb-15">
							<label><?php esc_html_e('Phone', 'rtwbmal-book-my-appointment'); ?></label>
							<input type="tel" value="<?php echo esc_attr( $rtwbmal_all_employee[0]['phone'] ); ?>" name="" class="form-control rtwbmal_emp_tel">
						</div>
					</div>
					<div class="mrb-15"><label><?php esc_html_e('Address', 'rtwbmal-book-my-appointment'); ?> </label>
						<textarea class="form-control rtwbmal_emp_addr" rows="5" cols="5"><?php echo esc_html( $rtwbmal_all_employee[0]['address'] ); ?></textarea>
					</div>
					<div class="mrb-15"><label><?php esc_html_e('Info', 'rtwbmal-book-my-appointment'); ?> </label>
						<textarea class="form-control rtwbmal_emp_info" rows="5" cols="5"><?php echo esc_html( $rtwbmal_all_employee[0]['info'] ); ?></textarea>
					</div>
					<div class="rtwbmal-emp-visibility">
						<label><?php esc_html_e('Visibility', 'rtwbmal-book-my-appointment'); ?></label>
						<p><?php esc_html_e('If you want to become invisible to your customers set the visibility to "Private". ', 'rtwbmal-book-my-appointment'); ?></p>
						<p><span class="rtwbmal_custom_radio"><input <?php checked( $rtwbmal_all_employee[0]['visibility'], 1 );  ?> type="radio" name="rtwbmal_employee_visible" value="1"></span><?php esc_html_e('Public', 'rtwbmal-book-my-appointment'); ?></p>
						<p><span class="rtwbmal_custom_radio"><input <?php checked( $rtwbmal_all_employee[0]['visibility'], 0 );  ?> type="radio" name="rtwbmal_employee_visible" value="0"></span><?php esc_html_e( 'Private', 'rtwbmal-book-my-appointment' ); ?></p>
					</div>
					<div class="rtwbmal-emp-footer-btn">
							<a href="javascript:void(0)" class="rtwbmal_save_button" id="rtwbmal_edit_emp"><?php esc_html_e('Save', 'rtwbmal-book-my-appointment'); ?></a>
							<a href="javascript:void(0)" class="rtwbmal_cancel_button"><?php esc_html_e('Cancel', 'rtwbmal-book-my-appointment'); ?></a>
					</div>
				</div>
				<div class="rtwbmal-emp-tab-content rtwbmal-tab-content" data-tab-content="staffservices">
					<div class="rtwbmal-panel-default">
						<div class="rtwbmal-panel-header">
							<div class="rtwbmal-row">
								<div class="rtwbmal-col-6">
									<span class="rtwbmal_custom_checkbox">
									</span> <?php esc_html_e( 'Services', 'rtwbmal-book-my-appointment' ); ?>
								</div>
								<div class="rtwbmal-col-6">
									<?php esc_html_e('Price', 'rtwbmal-book-my-appointment'); ?>
								</div>
								<div class="rtwbmal-col-6">
									<?php esc_html_e('Capacity', 'rtwbmal-book-my-appointment'); ?>
								</div>
							</div>
						</div>
						<div class="rtwbmal-panel-body">
							<ul>
							<?php
							$service_ids = array();
							foreach ( $rtwbmal_emp_services as $emp => $ser_id ) 
							{
								$service_ids[$ser_id['service_id']] = array( 
									'price' => $ser_id['price'],
									'min_cap' => $ser_id['cap_min'],
									'max_cap' => $ser_id['cap_max'],
									'active' => $ser_id['active'] );
							}
							
							foreach( $rtwbmal_all_services as $service => $id )
							{ 
								?><li>
									<div class="rtwbmal-row rtwbmal-align-center">
										<div class="rtwbmal-col-6">
											<span class="rtwbmal_custom_checkbox">
												<input class="rtwbmal_selected_service rtwbmal_service_<?php echo esc_attr($id['id']); ?>" value="<?php echo esc_attr( $id['id'] ); ?>" <?php checked( isset( $service_ids[$id['id']]['active'] ) ? $service_ids[$id['id']]['active'] : 0, 1 ); ?> type="checkbox">
											</span><?php echo esc_html( $id['title'] );
										?></div>
										<div class="rtwbmal-col-6">
											<input type="text" class="form-control rtwbmal_ser_price" value="<?php echo esc_attr( isset( $service_ids[$id['id']]['price'] ) ? $service_ids[$id['id']]['price'] : '' ); ?>">
										</div>
										<div class="rtwbmal-col-6 rtwbmal_ser_capacity">
											<input class="rtwbmal_min_cap  rtwbmal_mincap_<?php echo esc_attr($id['id']); ?>" min="1" placeholder="Min" type="number" value="<?php echo esc_attr( isset( $service_ids[$id['id']]['min_cap'] ) ? $service_ids[$id['id']]['min_cap'] : '' ); ?>" name="<?php echo esc_attr( 'rtwbmal_min_'. $id['id'] ); ?>">
											<input class="rtwbmal_max_cap  rtwbmal_maxcap_<?php echo esc_attr($id['id']); ?>" min="1" placeholder="Max" type="number" value="<?php echo esc_attr( isset( $service_ids[$id['id']]['max_cap'] ) ? $service_ids[$id['id']]['max_cap'] : '' ); ?>" name="<?php echo esc_attr('rtwbmal_max_'. $id['id'] ); ?>">
										</div>
									</div>
								</li>
							<?php }?>
							</ul>
						</div>
					</div>
					<div class="rtwbmal-panel-default">
						<div class="rtwbmal-panel-body"><label><?php esc_html_e( 'Select Locations', 'rtwbmal-book-my-appointment' ); ?></label>
							<select class="rtwbmal_select rtwbmal_emp_location" multiple="multiple" data-placeholder="<?php esc_attr_e( 'Locations', 'rtwbmal-book-my-appointment' ); ?>" name="">
								<?php 
								foreach ( $rtwbmal_all_locations as $locations => $loc ) {
									?>	
									<option <?php selected( in_array( $loc['id'], $rtwbmal_emp_locations ), true); ?> value="<?php echo esc_attr( $loc['id'] ); ?>"><?php echo esc_html( $loc[ 'loc_name' ] ); ?></option>
									<?php
								}
							?></select>
						</div>
					</div>


					<div class="rtwbmal-emp-footer-btn">
							<a href="javascript:void(0)" class="rtwbmal_save_button" id="rtwbmal_edit_emp"><?php esc_html_e('Save', 'rtwbmal-book-my-appointment'); ?></a>
							<a href="javascript:void(0)" class="rtwbmal_cancel_button"><?php esc_html_e('Cancel', 'rtwbmal-book-my-appointment'); ?></a>
					</div>	
				</div>
			</div>
		</div>
	<?php
	}
}