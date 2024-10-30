<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !is_user_logged_in() ){

	$rtwbmal_reg_temp_features = get_option( 'rtwbmal_frontend_option' );
	$rtwbmal_selected_template = isset( $rtwbmal_reg_temp_features[ 'rtwbmal_select_template' ] ) ? $rtwbmal_reg_temp_features[ 'rtwbmal_select_template' ] : 1;
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
		$rtwbmal_form_custom_css= isset( $rtwbmal_reg_temp_features[ 'css' ] ) ? $rtwbmal_reg_temp_features[ 'css' ] : '';
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
			$rtwbmal_html .= 					esc_html__( "Register your Account", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 					'</h2>';

		$rtwbmal_html .= 				'</div>';
		$rtwbmal_html .= 				'<form action="'.esc_url( site_url("wp-login.php?action=register", "login_post") ).'" method="post">';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="user_login" placeholder="'.esc_attr__( "Username", "rtwbmal-book-my-appointment" ).'" id="user_login" class="input" required /></div>';

		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="email" name="user_email" placeholder="'.esc_attr__( "E-Mail", "rtwbmal-book-my-appointment" ).'" id="user_email" class="input" required /></div>';


		$rtwbmal_html .= 					'<div><input type="submit" value="'.esc_attr__( "Register", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-register" /></div>';
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
		$rtwbmal_html .= 		'<form action="'.esc_url( site_url("wp-login.php?action=register", "login_post") ).'" method="post">';

		$rtwbmal_html .= 			'<h2>';
		if( $rtwbmal_form_title != '' ){
			$rtwbmal_html .= 			esc_html( $rtwbmal_form_title );
		}
		else{
			$rtwbmal_html .= 			esc_html__( "Registration Form", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 			'</h2>';

		$rtwbmal_html .= 			'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="user_login" placeholder="'.esc_attr__( "Username", "rtwbmal-book-my-appointment" ).'" required /></div>';
		$rtwbmal_html .= 			'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="email" name="user_email" placeholder="'.esc_attr__( "E-Mail", "rtwbmal-book-my-appointment" ).'" required ></div>';

		$rtwbmal_html .= 			'<div><input type="submit" value="'.esc_attr__( "Register", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-register"></div>';
		$rtwbmal_html .= 		'</form>';
		
		$rtwbmal_html .= 	'</div>';
	}
	elseif( $rtwbmal_selected_template == 3 ){
		$rtwbmal_html = '';

		$rtwbmal_button_color 	= isset( $rtwbmal_reg_temp_features[ 'button_color' ] ) ? $rtwbmal_reg_temp_features[ 'button_color' ] : '#0150C9';
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
			$rtwbmal_html .= 				esc_html__( "Registration", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 				'</h2>';

		$rtwbmal_html .= 			'</div>';
		$rtwbmal_html .= 			'<div class="rtwbmal-form-content">';
		$rtwbmal_html .= 				'<form action="'.esc_url( site_url("wp-login.php?action=register", "login_post") ).'" method="post">';
		$rtwbmal_html .= 					'<label>'.esc_html__( "Username", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="user_login" placeholder="'.esc_attr__( "Username", "rtwbmal-book-my-appointment" ).'" required ></div>';
		$rtwbmal_html .= 					'<label>'.esc_html__( "E-Mail", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="email" name="user_email" placeholder="'.esc_attr__( "E-Mail", "rtwbmal-book-my-appointment" ).'" required ></div>';
		
		
		$rtwbmal_html .= 					'<div><input type="submit" value="'.esc_attr__( "Register", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-register"></div>';
		$rtwbmal_html .=                	'<input type="hidden" value="'.esc_attr( $_SERVER['REQUEST_URI'] ) .'?register=true" name="redirect_to">';

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
		$rtwbmal_html .= 				'<form action="'.esc_url( site_url("wp-login.php?action=register", "login_post") ).'" method="post">';

		$rtwbmal_html .= 					'<h2>';
		if( $rtwbmal_form_title != '' ){
			$rtwbmal_html .= 					esc_html( $rtwbmal_form_title );
		}
		else{
			$rtwbmal_html .= 					esc_html__( "Registration", "rtwbmal-book-my-appointment" );
		}
		$rtwbmal_html .= 					'</h2>';

		$rtwbmal_html .= 					'<label>'.esc_html__( "Username", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-user"></i></span><input type="text" name="user_login" placeholder="'.esc_attr__( "Username", "rtwbmal-book-my-appointment" ).'" required ></div>';
		$rtwbmal_html .= 					'<label>'.esc_html__( "E-Mail", "rtwbmal-book-my-appointment" ).'</label>';
		$rtwbmal_html .= 					'<div class="rtwbmal-text"><span class="rtwbmal-text-icon"><i class="far fa-envelope"></i></span><input type="email" name="user_email" placeholder="'.esc_attr__( "E-Mail", "rtwbmal-book-my-appointment" ).'" required></div>';
		
		$rtwbmal_html .=                	'<input type="hidden" value="'.( home_url() ) .'" name="redirect_to">';
		$rtwbmal_html .= 					'<div><input type="submit" value="'.esc_attr__( "Register", "rtwbmal-book-my-appointment" ).'" id="rtwbmal-register"></div>';
		$rtwbmal_html .= 				'</form>';
		
		$rtwbmal_html .= 			'</div>';
		$rtwbmal_html .= 		'</div>';
		$rtwbmal_html .= 	'</div>';
	}

	return $rtwbmal_html;
}
else{
	$rtwbmal_html = do_shortcode( '[rtwbmal_cus_login_page]' );
	return $rtwbmal_html;
}
