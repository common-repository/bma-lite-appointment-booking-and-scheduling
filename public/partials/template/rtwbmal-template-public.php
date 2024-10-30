<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if( isset( $_GET['rtwbmal_cncl_app'] ) )
{ 
	$return_url = get_option('rtwbmal_return_url', '');
	?><div class="rtwbmal_cancel_app_wrap">
			<form id="rtwbmal_cancel_form">
				<h3><?php esc_html_e('Confirm Cancel', 'rtwbmal-book-my-appointment'); ?></h3>
				<div class="rtwbmal_cancel_app">
					<span class="rtwbmal_yes"><?php esc_html_e('Yes', 'rtwbmal-book-my-appointment'); ?></span>
					<span class="rtwbmal_custom_radio"><input type="radio" name="rtwbmal_cncl_yes" value="yes"></span>
				</div>
				<div class="rtwbmal_cancel_app">
					<span class="rtwbmal_yes"><?php esc_html_e('No', 'rtwbmal-book-my-appointment'); ?></span>
					<span class="rtwbmal_custom_radio"><input type="radio" name="rtwbmal_cncl_yes" value="no"></span>
				</div>
				<div class="rtwbmal_cancel_app mrt-15">
					<span class="rtwbmal_cancel_r"><?php esc_html_e('Cancellation Reason', 'rtwbmal-book-my-appointment'); ?></span>
					<textarea required="required" class="rtwbmal_cancel_reason" name="rtwbmal_cancel_reason"></textarea>
				</div>
				<div class="rtwbmal_cancel_app mrt-15">
					<input type="hidden" id="rtwbmal_ap_id" value="<?php echo esc_attr( $_GET['rtwbmal_cncl_app'] ); ?>" name="">
					<input type="hidden" class="rtwbmal_url" value="<?php echo esc_attr($return_url); ?>" name="">
					<input type="button" class="rtwbmal_cancel_appointment" name="rtwbmal_cancel_appointment" value="Confirm">
				</div>
			</form>
		</div>
<?php }
else{
	if( isset($_GET['rtwbmal_success']) && $_GET['rtwbmal_success'] == true )
	{ 
		$return_url = get_option('rtwbmal_return_url', ''); ?>
		<div class="rtwbmal-success-popup-overlay rtwbmal-success-popup-overlay--show-modal" tabindex="-1">
			<div class="rtwbmal-success-modal" role="dialog" aria-modal="true">
				<div class="rtwbmal-icon rtwbmal-icon--success">
					<span class="rtwbmal-icon--success__line rtwbmal-icon--success__line--long"></span>
					<span class="rtwbmal-icon--success__line rtwbmal-icon--success__line--tip"></span>

					<div class="rtwbmal-icon--success__ring"></div>
					<div class="rtwbmal-icon--success__hide-corners"></div>
				</div>
				<div class="rtwbmal-title" style=""><?php esc_html_e('Success!','rtwbmal-book-my-appointment'); ?></div>
				<div class="rtwbmal-text" style=""><?php esc_html_e('Booking Successful','rtwbmal-book-my-appointment'); ?></div>
				<div class="rtwbmal-footer">
					<div class="rtwbmal-button-container">
						<a href="<?php echo esc_url($return_url);?>" class="rtwbmal-button rtwbmal-button--confirm"><?php esc_html_e('Back To Services','rtwbmal-book-my-appointment'); ?></a>
					</div>
				</div>
			</div>
		</div>
	<?php 
	}
	elseif( isset($_GET['rtwbmal_success']) && $_GET['rtwbmal_success'] == false  )
	{
		$return_url = get_option('rtwbmal_return_url', ''); ?>
		<div class="rtwbmal-success-popup-overlay rtwbmal-success-popup-overlay--show-modal" tabindex="-1">
			<div class="rtwbmal-success-modal" role="dialog" aria-modal="true">
				<div class="rtwbmal-icon rtwbmal-icon--success">
					<span class="rtwbmal-icon--success__line rtwbmal-icon--success__line--long"></span>
					<span class="rtwbmal-icon--success__line rtwbmal-icon--success__line--tip"></span>

					<div class="rtwbmal-icon--success__ring"></div>
					<div class="rtwbmal-icon--success__hide-corners"></div>
				</div>
				<div class="rtwbmal-title" style=""><?php esc_html_e('Failed!','rtwbmal-book-my-appointment'); ?></div>
				<div class="rtwbmal-text" style=""><?php esc_html_e('Booking failed','rtwbmal-book-my-appointment'); ?></div>
				<div class="rtwbmal-footer">
					<div class="rtwbmal-button-container">
						<a href="<?php echo esc_url($return_url);?>" class="rtwbmal-button rtwbmal-button--confirm"><?php esc_html_e('Back To Services','rtwbmal-book-my-appointment'); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	if( isset( $_GET['cancel_booking'] ) && $_GET['cancel_booking'] == true )
	{
		$rtwbmal_verified = wp_verify_nonce( $_GET['_rtwbmalnonce'], 'rtwbmal-cancel_booking' );
		if( $rtwbmal_verified )
		{
			?>
			<div class="rtwbmal-cancel-booking-wrapper">
				<div class="rtwbmal-cancel-booking">
					<p><strong><?php esc_html_e('Booking Cancelled.','rtwbmal-book-my-appointment'); ?></strong></p>
				</div>
			</div>
			<?php
		}
	}
	?>
		<div class="rtwbmal_success_divi"></div>
	<?php
	global $wpdb;
	global $wp;
	$rtwbmal_return_url = get_permalink();
	update_option( 'rtwbmal_return_url', $rtwbmal_return_url );
	
	$rtwbmal_currencies = array(
		'AED' => array( 'symbol' => '&#x62f;.&#x625;',  	'text' => esc_html__( 'UAE dirham', 'rtwbmal-book-my-appointment' )),
		'AFN' => array( 'symbol' => '&#x60b;',  			'text' => esc_html__( 'Afghan afghani', 'rtwbmal-book-my-appointment' )),
		'ALL' => array( 'symbol' => 'L',  					'text' => esc_html__( 'Albanian lek', 'rtwbmal-book-my-appointment' )),
		'AMD' => array( 'symbol' => 'AMD',  				'text' => esc_html__( 'Armenian dram', 'rtwbmal-book-my-appointment' )),
		'ANG' => array( 'symbol' => '&fnof;',  				'text' => esc_html__( 'Netherlands Antillean guilder', 'rtwbmal-book-my-appointment' )),
		'AOA' => array( 'symbol' => 'Kz',  					'text' => esc_html__( 'Angolan kwanza', 'rtwbmal-book-my-appointment' )),
		'ARS' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Argentine peso', 'rtwbmal-book-my-appointment' )),
		'AUD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Australian dollar', 'rtwbmal-book-my-appointment' )),
		'AWG' => array( 'symbol' => 'Afl.',  				'text' => esc_html__( 'Aruban florin', 'rtwbmal-book-my-appointment' )),
		'AZN' => array( 'symbol' => 'AZN',  				'text' => esc_html__( 'Azerbaijani manat', 'rtwbmal-book-my-appointment' )),
		'BAM' => array( 'symbol' => 'KM',  					'text' => esc_html__( 'B&H convertible mark', 'rtwbmal-book-my-appointment' )),
		'BBD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Barbadian dollar', 'rtwbmal-book-my-appointment' )),
		'BDT' => array( 'symbol' => '&#2547;&nbsp;',  		'text' => esc_html__( 'Bangladeshi taka', 'rtwbmal-book-my-appointment' )),
		'BGN' => array( 'symbol' => '&#1083;&#1074;.',  	'text' => esc_html__( 'Bulgarian lev', 'rtwbmal-book-my-appointment' )),
		'BHD' => array( 'symbol' => '.&#x62f;.&#x628;',  	'text' => esc_html__( 'Bahraini dinar', 'rtwbmal-book-my-appointment' )),
		'BIF' => array( 'symbol' => 'Fr',  					'text' => esc_html__( 'Burundian franc', 'rtwbmal-book-my-appointment' )),
		'BMD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Bermudian dollar', 'rtwbmal-book-my-appointment' )),
		'BND' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Brunei dollar', 'rtwbmal-book-my-appointment' )),
		'BOB' => array( 'symbol' => 'Bs.',  				'text' => esc_html__( 'Bolivian boliviano', 'rtwbmal-book-my-appointment' )),
		'BRL' => array( 'symbol' => '&#82;&#36;',  			'text' => esc_html__( 'Brazilian real', 'rtwbmal-book-my-appointment' )),
		'BSD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Bahamian dollar', 'rtwbmal-book-my-appointment' )),
		'BTC' => array( 'symbol' => '&#3647;',  			'text' => esc_html__( 'Bitcoin', 'rtwbmal-book-my-appointment' )),
		'BTN' => array( 'symbol' => 'Nu.',  				'text' => esc_html__( 'Bhutanese ngultrum', 'rtwbmal-book-my-appointment' )),
		'BWP' => array( 'symbol' => 'P',  					'text' => esc_html__( 'Botswana pula', 'rtwbmal-book-my-appointment' )),
		'BYR' => array( 'symbol' => 'Br',  					'text' => esc_html__( 'Belarusian ruble (old)', 'rtwbmal-book-my-appointment' )),
		'BYN' => array( 'symbol' => 'Br',  					'text' => esc_html__( 'Belarusian ruble', 'rtwbmal-book-my-appointment' )),
		'BZD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Belize dollar', 'rtwbmal-book-my-appointment' )),
		'CAD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Canadian dollar', 'rtwbmal-book-my-appointment' )),
		'CDF' => array( 'symbol' => 'Fr',  					'text' => esc_html__( 'Congolese franc', 'rtwbmal-book-my-appointment' )),
		'CHF' => array( 'symbol' => '&#67;&#72;&#70;',  	'text' => esc_html__( 'Swiss franc', 'rtwbmal-book-my-appointment' )),
		'CLP' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Chilean peso', 'rtwbmal-book-my-appointment' )),
		'CNY' => array( 'symbol' => '&yen;',  				'text' => esc_html__( 'Chinese yuan', 'rtwbmal-book-my-appointment' )),
		'COP' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Colombian peso', 'rtwbmal-book-my-appointment' )),
		'CRC' => array( 'symbol' => '&#x20a1;',  			'text' => esc_html__( 'Costa Rican col&oacute;n', 'rtwbmal-book-my-appointment' )),
		'CUC' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Cuban convertible peso', 'rtwbmal-book-my-appointment' )),
		'CUP' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Cuban peso', 'rtwbmal-book-my-appointment' )),
		'CVE' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Cape Verdean escudo', 'rtwbmal-book-my-appointment' )),
		'CZK' => array( 'symbol' => '&#75;&#269;',  		'text' => esc_html__( 'Czech koruna', 'rtwbmal-book-my-appointment' )),
		'DJF' => array( 'symbol' => 'Fr',  					'text' => esc_html__( 'Djiboutian franc', 'rtwbmal-book-my-appointment' )),
		'DKK' => array( 'symbol' => 'DKK',  				'text' => esc_html__( 'Danish krone', 'rtwbmal-book-my-appointment' )),
		'DOP' => array( 'symbol' => 'RD&#36;',  			'text' => esc_html__( 'Dominican peso', 'rtwbmal-book-my-appointment' )),
		'DZD' => array( 'symbol' => '&#x62f;.&#x62c;',  	'text' => esc_html__( 'Algerian dinar', 'rtwbmal-book-my-appointment' )),
		'EGP' => array( 'symbol' => 'EGP',  				'text' => esc_html__( 'Egyptian pound', 'rtwbmal-book-my-appointment' )),
		'ERN' => array( 'symbol' => 'Nfk',  				'text' => esc_html__( 'Eritrean nakfa', 'rtwbmal-book-my-appointment' )),
		'ETB' => array( 'symbol' => 'Br',  					'text' => esc_html__( 'Ethiopian birr', 'rtwbmal-book-my-appointment' )),
		'EUR' => array( 'symbol' => '&euro;',  				'text' => esc_html__( 'Euro', 'rtwbmal-book-my-appointment' )),
		'FJD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Fijian dollar', 'rtwbmal-book-my-appointment' )),
		'FKP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'Falkland Islands pound', 'rtwbmal-book-my-appointment' )),
		'GBP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'Pound sterling', 'rtwbmal-book-my-appointment' )),
		'GEL' => array( 'symbol' => '&#x20be;',  			'text' => esc_html__( 'Georgian lari', 'rtwbmal-book-my-appointment' )),
		'GGP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'Guernsey pound', 'rtwbmal-book-my-appointment' )),
		'GHS' => array( 'symbol' => '&#x20b5;',  			'text' => esc_html__( 'Ghana cedi', 'rtwbmal-book-my-appointment' )),
		'GIP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'Gibraltar pound', 'rtwbmal-book-my-appointment' )),
		'GMD' => array( 'symbol' => 'D',  					'text' => esc_html__( 'Gambian dalasi', 'rtwbmal-book-my-appointment' )),
		'GNF' => array( 'symbol' => 'Fr',  					'text' => esc_html__( 'Guinean franc', 'rtwbmal-book-my-appointment' )),
		'GTQ' => array( 'symbol' => 'Q',  					'text' => esc_html__( 'Guatemalan quetzal', 'rtwbmal-book-my-appointment' )),
		'GYD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Guyanese dollar', 'rtwbmal-book-my-appointment' )),
		'HKD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Hong Kong dollar', 'rtwbmal-book-my-appointment' )),
		'HNL' => array( 'symbol' => 'L',  					'text' => esc_html__( 'Honduran lempira', 'rtwbmal-book-my-appointment' )),
		'HRK' => array( 'symbol' => 'Kn',  					'text' => esc_html__( 'Croatian kuna', 'rtwbmal-book-my-appointment' )),
		'HTG' => array( 'symbol' => 'G',  					'text' => esc_html__( 'Haitian gourde', 'rtwbmal-book-my-appointment' )),
		'HUF' => array( 'symbol' => '&#70;&#116;',  		'text' => esc_html__( 'Hungarian forint', 'rtwbmal-book-my-appointment' )),
		'IDR' => array( 'symbol' => 'Rp',  					'text' => esc_html__( 'Indonesian rupiah', 'rtwbmal-book-my-appointment' )),
		'ILS' => array( 'symbol' => '&#8362;',  			'text' => esc_html__( 'Israeli new shekel', 'rtwbmal-book-my-appointment' )),
		'IMP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'Manx pound', 'rtwbmal-book-my-appointment' )),
		'INR' => array( 'symbol' => '&#8377;',  			'text' => esc_html__( 'Indian rupee', 'rtwbmal-book-my-appointment' )),
		'IQD' => array( 'symbol' => '&#x639;.&#x62f;',  	'text' => esc_html__( 'Iraqi dinar', 'rtwbmal-book-my-appointment' )),
		'IRR' => array( 'symbol' => '&#xfdfc;',  			'text' => esc_html__( 'Iranian rial', 'rtwbmal-book-my-appointment' )),
		'IRT' => array( 'symbol' => '&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;','text' => esc_html__( 'Iranian toman', 'rtwbmal-book-my-appointment' )),
		'ISK' => array( 'symbol' => 'kr.',  				'text' => esc_html__( 'Icelandic kr&oacute;na', 'rtwbmal-book-my-appointment' )),
		'JEP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'Jersey pound', 'rtwbmal-book-my-appointment' )),
		'JMD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Jamaican dollar', 'rtwbmal-book-my-appointment' )),
		'JOD' => array( 'symbol' => '&#x62f;.&#x627;',  	'text' => esc_html__( 'Jordanian dinar', 'rtwbmal-book-my-appointment' )),
		'JPY' => array( 'symbol' => '&yen;',  				'text' => esc_html__( 'Japanese yen', 'rtwbmal-book-my-appointment' )),
		'KES' => array( 'symbol' => 'KSh',  				'text' => esc_html__( 'Kenyan shilling', 'rtwbmal-book-my-appointment' )),
		'KGS' => array( 'symbol' => '&#x441;&#x43e;&#x43c;','text' => esc_html__( 'Kyrgyzstani som', 'rtwbmal-book-my-appointment' )),
		'KHR' => array( 'symbol' => '&#x17db;',  			'text' => esc_html__( 'Cambodian riel', 'rtwbmal-book-my-appointment' )),
		'KMF' => array( 'symbol' => 'Fr',  					'text' => esc_html__( 'Comorian franc', 'rtwbmal-book-my-appointment' )),
		'KPW' => array( 'symbol' => '&#x20a9;',  			'text' => esc_html__( 'North Korean won', 'rtwbmal-book-my-appointment' )),
		'KRW' => array( 'symbol' => '&#8361;',  			'text' => esc_html__( 'South Korean won', 'rtwbmal-book-my-appointment' )),
		'KWD' => array( 'symbol' => '&#x62f;.&#x643;',  	'text' => esc_html__( 'Kuwaiti dinar', 'rtwbmal-book-my-appointment' )),
		'KYD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Cayman Islands dollar', 'rtwbmal-book-my-appointment' )),
		'KZT' => array( 'symbol' => 'KZT',  				'text' => esc_html__( 'Kazakhstani tenge', 'rtwbmal-book-my-appointment' )),
		'LAK' => array( 'symbol' => '&#8365;',  			'text' => esc_html__( 'Lao kip', 'rtwbmal-book-my-appointment' )),
		'LBP' => array( 'symbol' => '&#x644;.&#x644;',  	'text' => esc_html__( 'Lebanese pound', 'rtwbmal-book-my-appointment' )),
		'LKR' => array( 'symbol' => '&#xdbb;&#xdd4;',  		'text' => esc_html__( 'Sri Lankan rupee', 'rtwbmal-book-my-appointment' )),
		'LRD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Liberian dollar', 'rtwbmal-book-my-appointment' )),
		'LSL' => array( 'symbol' => 'L',  					'text' => esc_html__( 'Lesotho loti', 'rtwbmal-book-my-appointment' )),
		'LYD' => array( 'symbol' => '&#x644;.&#x62f;',  	'text' => esc_html__( 'Libyan dinar', 'rtwbmal-book-my-appointment' )),
		'MAD' => array( 'symbol' => '&#x62f;.&#x645;.',  	'text' => esc_html__( 'Moroccan dirham', 'rtwbmal-book-my-appointment' )),
		'MDL' => array( 'symbol' => 'MDL',  				'text' => esc_html__( 'Moldovan leu', 'rtwbmal-book-my-appointment' )),
		'MGA' => array( 'symbol' => 'Ar',  					'text' => esc_html__( 'Malagasy ariary', 'rtwbmal-book-my-appointment' )),
		'MKD' => array( 'symbol' => '&#x434;&#x435;&#x43d;','text' => esc_html__( 'Macedonian denar', 'rtwbmal-book-my-appointment' )),
		'MMK' => array( 'symbol' => 'Ks',  					'text' => esc_html__( 'Burmese kyat', 'rtwbmal-book-my-appointment' )),
		'MNT' => array( 'symbol' => '&#x20ae;',  			'text' => esc_html__( 'Mongolian t&ouml;gr&ouml;g', 'rtwbmal-book-my-appointment' )),
		'MOP' => array( 'symbol' => 'P',  					'text' => esc_html__( 'Macanese pataca', 'rtwbmal-book-my-appointment' )),
		'MRO' => array( 'symbol' => 'UM',  					'text' => esc_html__( 'Mauritanian ouguiya', 'rtwbmal-book-my-appointment' )),
		'MUR' => array( 'symbol' => '&#x20a8;',  			'text' => esc_html__( 'Mauritian rupee', 'rtwbmal-book-my-appointment' )),
		'MVR' => array( 'symbol' => '.&#x783;',  			'text' => esc_html__( 'Maldivian rufiyaa', 'rtwbmal-book-my-appointment' )),
		'MWK' => array( 'symbol' => 'MK',  					'text' => esc_html__( 'Malawian kwacha', 'rtwbmal-book-my-appointment' )),
		'MXN' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Mexican peso', 'rtwbmal-book-my-appointment' )),
		'MYR' => array( 'symbol' => '&#82;&#77;',  			'text' => esc_html__( 'Malaysian ringgit', 'rtwbmal-book-my-appointment' )),
		'MZN' => array( 'symbol' => 'MT',  					'text' => esc_html__( 'Mozambican metical', 'rtwbmal-book-my-appointment' )),
		'NAD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Namibian dollar', 'rtwbmal-book-my-appointment' )),
		'NGN' => array( 'symbol' => '&#8358;',  			'text' => esc_html__( 'Nigerian naira', 'rtwbmal-book-my-appointment' )),
		'NIO' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Nicaraguan c&oacute;rdoba', 'rtwbmal-book-my-appointment' )),
		'NOK' => array( 'symbol' => '&#107;&#114;',  		'text' => esc_html__( 'Norwegian krone', 'rtwbmal-book-my-appointment' )),
		'NPR' => array( 'symbol' => '&#8360;',  			'text' => esc_html__( 'Nepalese rupee', 'rtwbmal-book-my-appointment' )),
		'NZD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'New Zealand dollar', 'rtwbmal-book-my-appointment' )),
		'OMR' => array( 'symbol' => '&#x631;.&#x639;.',  	'text' => esc_html__( 'Omani rial', 'rtwbmal-book-my-appointment' )),
		'PAB' => array( 'symbol' => 'B/.',  				'text' => esc_html__( 'Panamanian balboa', 'rtwbmal-book-my-appointment' )),
		'PEN' => array( 'symbol' => 'S/.',  				'text' => esc_html__( 'Peruvian nuevo sol', 'rtwbmal-book-my-appointment' )),
		'PGK' => array( 'symbol' => 'K',  					'text' => esc_html__( 'Papua New Guinean kina', 'rtwbmal-book-my-appointment' )),
		'PHP' => array( 'symbol' => '&#8369;',  			'text' => esc_html__( 'Philippine peso', 'rtwbmal-book-my-appointment' )),
		'PKR' => array( 'symbol' => '&#8360;',  			'text' => esc_html__( 'Pakistani rupee', 'rtwbmal-book-my-appointment' )),
		'PLN' => array( 'symbol' => '&#122;&#322;',  		'text' => esc_html__( 'Polish z&#x142;oty', 'rtwbmal-book-my-appointment' )),
		'PRB' => array( 'symbol' => '&#x440;.',  			'text' => esc_html__( 'Transnistrian ruble', 'rtwbmal-book-my-appointment' )),
		'PYG' => array( 'symbol' => '&#8370;',  			'text' => esc_html__( 'Paraguayan guaran&iacute;', 'rtwbmal-book-my-appointment' )),
		'QAR' => array( 'symbol' => '&#x631;.&#x642;',  	'text' => esc_html__( 'Qatari riyal', 'rtwbmal-book-my-appointment' )),
		'RMB' => array( 'symbol' => '&yen;',  				'text' => esc_html__( 'Chinese yuan', 'rtwbmal-book-my-appointment' )),
		'RON' => array( 'symbol' => 'lei',  				'text' => esc_html__( 'Romanian leu', 'rtwbmal-book-my-appointment' )),
		'RSD' => array( 'symbol' => '&#x434;&#x438;&#x43d;.','text' => esc_html__( 'Serbian dinar', 'rtwbmal-book-my-appointment' )),
		'RUB' => array( 'symbol' => '&#8381;',  			'text' => esc_html__( 'Russian ruble', 'rtwbmal-book-my-appointment' )),
		'RWF' => array( 'symbol' => 'Fr',  					'text' => esc_html__( 'Rwandan franc', 'rtwbmal-book-my-appointment' )),
		'SAR' => array( 'symbol' => '&#x631;.&#x633;',  	'text' => esc_html__( 'Saudi riyal', 'rtwbmal-book-my-appointment' )),
		'symbolD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Solomon Islands dollar', 'rtwbmal-book-my-appointment' )),
		'SCR' => array( 'symbol' => '&#x20a8;',  			'text' => esc_html__( 'Seychellois rupee', 'rtwbmal-book-my-appointment' )),
		'SDG' => array( 'symbol' => '&#x62c;.&#x633;.',  	'text' => esc_html__( 'Sudanese pound', 'rtwbmal-book-my-appointment' )),
		'SEK' => array( 'symbol' => '&#107;&#114;',  		'text' => esc_html__( 'Swedish krona', 'rtwbmal-book-my-appointment' )),
		'SGD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Singapore dollar', 'rtwbmal-book-my-appointment' )),
		'SHP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'Saint Helena pound', 'rtwbmal-book-my-appointment' )),
		'SLL' => array( 'symbol' => 'Le',  					'text' => esc_html__( 'Sierra Leonean leone', 'rtwbmal-book-my-appointment' )),
		'SOS' => array( 'symbol' => 'Sh',  					'text' => esc_html__( 'Somali shilling', 'rtwbmal-book-my-appointment' )),
		'SRD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Surinamese dollar', 'rtwbmal-book-my-appointment' )),
		'SSP' => array( 'symbol' => '&pound;',  			'text' => esc_html__( 'South Sudanese pound', 'rtwbmal-book-my-appointment' )),
		'STD' => array( 'symbol' => 'Db',  					'text' => esc_html__( 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe dobra', 'rtwbmal-book-my-appointment' )),
		'SYP' => array( 'symbol' => '&#x644;.&#x633;',  	'text' => esc_html__( 'Syrian pound', 'rtwbmal-book-my-appointment' )),
		'SZL' => array( 'symbol' => 'L',  					'text' => esc_html__( 'Swazi lilangeni', 'rtwbmal-book-my-appointment' )),
		'THB' => array( 'symbol' => '&#3647;',  			'text' => esc_html__( 'Thai baht', 'rtwbmal-book-my-appointment' )),
		'TJS' => array( 'symbol' => '&#x405;&#x41c;',  		'text' => esc_html__( 'Tajikistani somoni', 'rtwbmal-book-my-appointment' )),
		'TMT' => array( 'symbol' => 'm',  					'text' => esc_html__( 'Turkmenistan manat', 'rtwbmal-book-my-appointment' )),
		'TND' => array( 'symbol' => '&#x62f;.&#x62a;',  	'text' => esc_html__( 'Tunisian dinar', 'rtwbmal-book-my-appointment' )),
		'TOP' => array( 'symbol' => 'T&#36;',  				'text' => esc_html__( 'Tongan pa&#x2bb;anga', 'rtwbmal-book-my-appointment' )),
		'TRY' => array( 'symbol' => '&#8378;',  			'text' => esc_html__( 'Turkish lira', 'rtwbmal-book-my-appointment' )),
		'TTD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Trinidad and Tobago dollar', 'rtwbmal-book-my-appointment' )),
		'TWD' => array( 'symbol' => '&#78;&#84;&#36;',  	'text' => esc_html__( 'New Taiwan dollar', 'rtwbmal-book-my-appointment' )),
		'TZS' => array( 'symbol' => 'Sh',  					'text' => esc_html__( 'Tanzanian shilling', 'rtwbmal-book-my-appointment' )),
		'UAH' => array( 'symbol' => '&#8372;',  			'text' => esc_html__( 'Ukrainian hryvnia', 'rtwbmal-book-my-appointment' )),
		'UGX' => array( 'symbol' => 'UGX',  				'text' => esc_html__( 'Ugandan shilling', 'rtwbmal-book-my-appointment' )),
		'USD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'United States (US) dollar', 'rtwbmal-book-my-appointment' )),
		'UYU' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'Uruguayan peso', 'rtwbmal-book-my-appointment' )),
		'UZS' => array( 'symbol' => 'UZS',  				'text' => esc_html__( 'Uzbekistani som', 'rtwbmal-book-my-appointment' )),
		'VEF' => array( 'symbol' => 'Bs F',  				'text' => esc_html__( 'Venezuelan bol&iacute;var', 'rtwbmal-book-my-appointment' )),
		'VND' => array( 'symbol' => '&#8363;',  			'text' => esc_html__( 'Vietnamese &#x111;&#x1ed3;ng', 'rtwbmal-book-my-appointment' )),
		'VUV' => array( 'symbol' => 'Vt',  					'text' => esc_html__( 'Vanuatu vatu', 'rtwbmal-book-my-appointment' )),
		'WST' => array( 'symbol' => 'T',  					'text' => esc_html__( 'Samoan t&#x101;l&#x101;', 'rtwbmal-book-my-appointment' )),
		'XAF' => array( 'symbol' => 'CFA',  				'text' => esc_html__( 'Central African CFA franc', 'rtwbmal-book-my-appointment' )),
		'XCD' => array( 'symbol' => '&#36;',  				'text' => esc_html__( 'East Caribbean dollar', 'rtwbmal-book-my-appointment' )),
		'XOF' => array( 'symbol' => 'CFA',  				'text' => esc_html__( 'West African CFA franc', 'rtwbmal-book-my-appointment' )),
		'XPF' => array( 'symbol' => 'Fr',  					'text' => esc_html__( 'CFP franc', 'rtwbmal-book-my-appointment' )),
		'YER' => array( 'symbol' => '&#xfdfc;',  			'text' => esc_html__( 'Yemeni rial', 'rtwbmal-book-my-appointment' )),
		'ZAR' => array( 'symbol' => '&#82;',  				'text' => esc_html__( 'South African rand', 'rtwbmal-book-my-appointment' )),
		'ZMW' => array( 'symbol' => 'ZK',  					'text' => esc_html__( 'Zambian kwacha', 'rtwbmal-book-my-appointment' )),
		);
	$rtwbmal_all_services 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_services WHERE `status`= %d ORDER BY `display_order` ASC LIMIT %d", 1, 1000 ), ARRAY_A );

	$rtwbmal_all_categories 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_categories ORDER BY `display_order` ASC LIMIT %d", 10 ), ARRAY_A );

	$rtwbmal_appointment_count = count($wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_appointments ORDER BY `id` ASC", ARRAY_A ));

	$rtwbmal_all_emp 		= $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees ORDER BY `first_name` ASC", ARRAY_A );
	$rtwbmal_payment_option 	= get_option( 'rtwbmal_payment_option', array() );

	$rtwbmal_holidates = get_option('rtwbmal_holidays_option', array());
    $rtwbmal_weak_days = get_option('rtwbmal_business_hour', array());
    $rtwbmal_holidays = array();
    for( $i=1; $i <= 7; $i++ )
    {
        if(isset( $rtwbmal_weak_days['chk'.$i]) && $rtwbmal_weak_days['chk'.$i] == 0 )
        {
            $rtwbmal_holidays[] = $i;
        }
	}?>
	<input type="hidden" class="rtwbmal_holidates" value="<?php if(isset($rtwbmal_holidates['rtwbmal_select_save_holidays']) && $rtwbmal_holidates['rtwbmal_select_save_holidays']!=''){ echo esc_attr( $rtwbmal_holidates['rtwbmal_select_save_holidays'] ); }?>">
	<input type="hidden" class="rtwbmal_holidays" value="<?php echo esc_attr( json_encode($rtwbmal_holidays)); ?>">
	<input type="hidden" value="<?php echo esc_attr($rtwbmal_appointment_count); ?>" class="rtwbmal_appointment_count">

	<?php
	include_once( RTWBMAL_DIR.'public/partials/template/templates/rtwbmal-template-first.php' );
}