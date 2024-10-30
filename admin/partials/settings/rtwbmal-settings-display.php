<div class="rtwbmal_show_notice">
</div>
<?php
if( isset( $_POST['rtwbmal_save_settings'] ) )
{
	$rtwbmal_general_settings = array(
		'rtwbmal_sel_date_format' => sanitize_text_field( $_POST['rtwbmal_sel_date_format'] ),
		'rtwbmal_sel_time_format' => sanitize_text_field( $_POST['rtwbmal_sel_time_format'] ),
		'rtwbmal_min_cancel_time' => sanitize_text_field( $_POST['rtwbmal_min_cancel_time'] ),
		'rtwbmal_time_interval' => sanitize_text_field( $_POST['rtwbmal_time_interval'] ),
		'rtwbmal_app_per_page' => sanitize_text_field( $_POST['rtwbmal_app_per_page'] ),
		'rtwbmal_app_status' => sanitize_text_field( $_POST['rtwbmal_app_status'] ),
		'rtwbmal_emp_per_page' => sanitize_text_field( $_POST['rtwbmal_emp_per_page'] ),
		'rtwbmal_date_format' => sanitize_text_field( $_POST['rtwbmal_sel_date_format'] ),
		'rtwbmal_cus_per_page' => sanitize_text_field( $_POST['rtwbmal_cus_per_page'] ),
	);
	update_option( 'rtwbmal_general_settings', $rtwbmal_general_settings );

	$rtwbmal_company_option = array(
		'rtwbmal_company_imgs' => sanitize_text_field( $_POST['rtwbmal_company_imgs'] ),
		'rtwbmal_company_name' => sanitize_text_field( $_POST['rtwbmal_company_name'] ),
		'rtwbmal_company_addr' => sanitize_text_field( $_POST['rtwbmal_company_addr'] ),
		'rtwbmal_company_web' => sanitize_text_field( $_POST['rtwbmal_company_web'] ),
		'rtwbmal_company_phone' => sanitize_text_field( $_POST['rtwbmal_company_phone'] ),
	);
	update_option( 'rtwbmal_company_option', $rtwbmal_company_option );

	$rtwbmal_payment_option = array(
		'rtwbmal_pay_per_page' => sanitize_text_field( $_POST['rtwbmal_pay_per_page'] ),
		'rtwbmal_currency_format' => sanitize_text_field( $_POST['rtwbmal_currency_format'] ),
		'rtwbmal_currency_position' => sanitize_text_field( $_POST['rtwbmal_currency_position'] ),
		'rtwbmal_price_decimal' => sanitize_text_field( $_POST['rtwbmal_price_decimal'] ),
	);
	update_option( 'rtwbmal_payment_option', $rtwbmal_payment_option );

	$rtwbmal_holidays_option = array(
		'rtwbmal_holiday_title' => sanitize_text_field( $_POST['rtwbmal_holiday_title'] ),
		'rtwbmal_select_save_holidays' => sanitize_text_field( $_POST['rtwbmal_select_save_holidays'] ),
		'rtwbmal_repeat' => sanitize_text_field( isset( $_POST['rtwbmal_repeat'] ) ? $_POST['rtwbmal_repeat'] : 0 ),
	);
	update_option( 'rtwbmal_holidays_option', $rtwbmal_holidays_option );

	$rtwbmal_business_hour = array(
		'strtday1' => sanitize_text_field( $_POST['strtday1'] ),
		'endday1' => sanitize_text_field( $_POST['endday1'] ),
		'strtday2' => sanitize_text_field( $_POST['strtday2'] ),
		'endday2' => sanitize_text_field( $_POST['endday2'] ),
		'strtday3' => sanitize_text_field( $_POST['strtday3'] ),
		'endday3' => sanitize_text_field( $_POST['endday3'] ),
		'strtday4' => sanitize_text_field( $_POST['strtday4'] ),
		'endday4' => sanitize_text_field( $_POST['endday4'] ),
		'strtday5' => sanitize_text_field( $_POST['strtday5'] ),
		'endday5' => sanitize_text_field( $_POST['endday5'] ),
		'strtday6' => sanitize_text_field( $_POST['strtday6'] ),
		'endday6' => sanitize_text_field( $_POST['endday6'] ),
		'strtday0' => sanitize_text_field( $_POST['strtday0'] ),
		'endday0' => sanitize_text_field( $_POST['endday0'] ),
		'chk1' => sanitize_text_field( isset( $_POST['chk1'] ) ? $_POST['chk1'] : 0 ),
		'chk2' => sanitize_text_field( isset( $_POST['chk2'] ) ? $_POST['chk2'] : 0 ),
		'chk3' => sanitize_text_field( isset( $_POST['chk3'] ) ? $_POST['chk3'] : 0 ),
		'chk4' => sanitize_text_field( isset( $_POST['chk4'] ) ? $_POST['chk4'] : 0 ),
		'chk5' => sanitize_text_field( isset( $_POST['chk5'] ) ? $_POST['chk5'] : 0 ),
		'chk6' => sanitize_text_field( isset( $_POST['chk6'] ) ? $_POST['chk6'] : 0 ),
		'chk0' => sanitize_text_field( isset( $_POST['chk0'] ) ? $_POST['chk0'] : 0 ),
	);
	update_option( 'rtwbmal_business_hour', $rtwbmal_business_hour );

}

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

	$rtwbmal_general_settings = get_option( 'rtwbmal_general_settings', array() );

	$rtwbmal_company_option = get_option( 'rtwbmal_company_option', array() );

	$rtwbmal_payment_option = get_option( 'rtwbmal_payment_option', array() );

	$rtwbmal_holidays_option = get_option( 'rtwbmal_holidays_option', array() );

	$rtwbmal_business_hour = get_option( 'rtwbmal_business_hour', array() );

////////////////////////
	$rtwbmal_time_slot = array(
		'1' 	=> array( 'time' => esc_html__( '1 Minute', 'rtwbmal-book-my-appointment' )),
		'2' 	=> array( 'time' => esc_html__( '2 Minutes', 'rtwbmal-book-my-appointment' )),
		'3' 	=> array( 'time' => esc_html__( '3 Minutes', 'rtwbmal-book-my-appointment' )),
		'4' 	=> array( 'time' => esc_html__( '4 Minutes', 'rtwbmal-book-my-appointment' )),
		'5' 	=> array( 'time' => esc_html__( '5 Minutes', 'rtwbmal-book-my-appointment' )),
		'10' 	=> array( 'time' => esc_html__( '10 Minutes', 'rtwbmal-book-my-appointment' )),
		'15' 	=> array( 'time' => esc_html__( '15 Minutes', 'rtwbmal-book-my-appointment' )),
		'20' 	=> array( 'time' => esc_html__( '20 Minutes', 'rtwbmal-book-my-appointment' )),
		'30' 	=> array( 'time' => esc_html__( '30 Minutes', 'rtwbmal-book-my-appointment' )),
		'45' 	=> array( 'time' => esc_html__( '45 Minutes', 'rtwbmal-book-my-appointment' )),
		'60' 	=> array( 'time' => esc_html__( '1 Hour', 'rtwbmal-book-my-appointment' )),
		'90' 	=> array( 'time' => esc_html__( '1 Hour 30 Minutes', 'rtwbmal-book-my-appointment' )),
		'120' 	=> array( 'time' => esc_html__( '2 Hours', 'rtwbmal-book-my-appointment' )),
		'180' 	=> array( 'time' => esc_html__( '3 Hours', 'rtwbmal-book-my-appointment' )),
		'240' 	=> array( 'time' => esc_html__( '4 Hours', 'rtwbmal-book-my-appointment' )),
		'300' 	=> array( 'time' => esc_html__( '5 Hours', 'rtwbmal-book-my-appointment' )),
		'360' 	=> array( 'time' => esc_html__( '6 Hours', 'rtwbmal-book-my-appointment' )),
		'480' 	=> array( 'time' => esc_html__( '8 Hours', 'rtwbmal-book-my-appointment' )),
		'720' 	=> array( 'time' => esc_html__( '12 Hours', 'rtwbmal-book-my-appointment' )),
	);

	$rtwbmal_days_array = array( 
	'1' => esc_html__( 'Monday', 'rtwbmal-book-my-appointment' ),
	'2' => esc_html__( 'Tuesday', 'rtwbmal-book-my-appointment' ),
	'3' => esc_html__( 'Wednesday', 'rtwbmal-book-my-appointment' ),
	'4' => esc_html__( 'Thursday', 'rtwbmal-book-my-appointment' ),
	'5' => esc_html__( 'Friday', 'rtwbmal-book-my-appointment' ),
	'6' => esc_html__( 'Saturday', 'rtwbmal-book-my-appointment' ),
	'0' => esc_html__( 'Sunday', 'rtwbmal-book-my-appointment' ) );

	$rtwbmal_emp_hours = Rtwbmal_Book_My_Appointment_Admin::rtwbmal_emp_wrkng_hours();
	$rtwbmal_end_hours = $rtwbmal_emp_hours;
	unset( $rtwbmal_end_hours['00:00'] );
	$rtwbmal_emp_break_hours = array_merge( array( '0'=> '' ), $rtwbmal_emp_hours );
?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<?php esc_html_e( 'Settings', 'rtwbmal-book-my-appointment' ); ?>
		</h3>
	</div>

	<div class="rtwbmal_page_contents">
		<div class="rtwbmal_setting_wrapper">
			<div class="rtwbmal_setting_left">
				<!-- <aside class="rtwbmal_setting_aside"> -->
					<ul>
						<li class="rtwbmal_general rtwbmal_active"><i class="fas fa-home"></i> <a href="javascript:void(0);">
							<?php esc_html_e( 'General', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
						<li class="rtwbmal_company"><i class="fas fa-building"></i> <a href="javascript:void(0);">
							<?php esc_html_e( 'Company', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
						<li class="rtwbmal_payment"><i class="fas fa-money-check-alt"></i> <a href="javascript:void(0);">
							<?php esc_html_e( 'Payment', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
						<li class="rtwbmal_business_hr"><i class="fas fa-business-time"></i> <a href="javascript:void(0);">
							<?php esc_html_e( 'Business Hours', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
						<li class="rtwbmal_holiday"><i class="fas fa-briefcase"></i> <a href="javascript:void(0);">
							<?php esc_html_e( 'Holidays', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
						<li class="rtwbmal_notification"><i class="fas fa-bell"></i> <a href="javascript:void(0);">
							<?php esc_html_e( 'Notifications', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
						<li class="rtwbmal_gateway"><i class="fas fa-money-bill-alt"></i> <a href="javascript:void(0);">
							<?php esc_html_e( 'Payment Gateways', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
						<li class="rtwbmal_google_cal"><img src="<?php echo RTWBMAL_URL.'/assets/Google_Calendar.png'; ?>" /> <a href="javascript:void(0);">
							<?php esc_html_e( 'Google Calendar', 'rtwbmal-book-my-appointment' ); ?>
						</a></li>
					</ul>
				<!-- </aside> -->
			</div>
			<?php 
				$newDate1 = date("d-m-Y"); 
				$newDate2 = date("d-M-y"); 
				$newDate3 = date("d-M-Y"); 
				$newDate4 = date("d/m/y"); 
				$newDate5 = date("d/M/Y"); 

				$time1 = date("h:i a");
				$time2 = date("h:i A");
				$time3 = date("h:i");
			?><form id="rtwbmal_check_param" method="post" action="">
				<input type="hidden" class="rtwbmal_check_sandbox" value="<?php echo (isset($rtwbmal_paypal_option['rtwbmal_paypal_sandbox']) ? esc_attr( $rtwbmal_paypal_option['rtwbmal_paypal_sandbox'] ) : esc_attr(0) ); ?>" name="">

				<input type="hidden" class="rtwbmal_check_testing" value="<?php echo (isset($rtwbmal_stripe_option['rtwbmal_stripe_sandbox']) ? esc_attr( $rtwbmal_stripe_option['rtwbmal_stripe_sandbox'] ) : esc_attr(0) ); ?>">

				<div class="rtwbmal_setting_right">
					<div class="rtwbmal_general_content rtwbmal_show">
						<h3><?php esc_html_e( 'General', 'rtwbmal-book-my-appointment' ); ?></h3>
						<div class="rtwbmal_input_fields">
							<table>
								<tr>
									<td>
									<label><?php esc_html_e( 'Date Format', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<select class="rtwbmal_sel_date_format" name="rtwbmal_sel_date_format">
											<option <?php selected( isset( $rtwbmal_general_settings['rtwbmal_sel_date_format'] ) ? $rtwbmal_general_settings['rtwbmal_sel_date_format'] : '' , 'd-m-Y' ); ?> value="d-m-Y"><?php echo esc_html( $newDate1 ); ?></option>
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_sel_date_format']) ? $rtwbmal_general_settings['rtwbmal_sel_date_format'] : '' , 'd-M-y' ); ?> value="d-M-y"><?php echo esc_html( $newDate2 ); ?></option>
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_sel_date_format']) ? $rtwbmal_general_settings['rtwbmal_sel_date_format'] : '' , 'd-M-Y' ); ?> value="d-M-Y"><?php echo esc_html( $newDate3 ); ?></option>
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_sel_date_format']) ? $rtwbmal_general_settings['rtwbmal_sel_date_format'] : '' , 'd/m/y' ); ?> value="d/m/y"><?php echo esc_html( $newDate4 ); ?></option>
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_sel_date_format']) ? $rtwbmal_general_settings['rtwbmal_sel_date_format'] : '' , 'd/M/Y' ); ?> value="d/M/Y"><?php echo esc_html( $newDate5 ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Time Format', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<select class="rtwbmal_sel_time_format" name="rtwbmal_sel_time_format">
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_sel_time_format']) ? $rtwbmal_general_settings['rtwbmal_sel_time_format'] : '' , 'hia' ); ?> value="hia"><?php echo esc_html( $time1 ); ?></option>
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_sel_time_format']) ? $rtwbmal_general_settings['rtwbmal_sel_time_format'] : '' , 'hiA' ); ?> value="hiA"><?php echo esc_html( $time2 ); ?></option>
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_sel_time_format']) ? $rtwbmal_general_settings['rtwbmal_sel_time_format'] : '' , 'hi' ); ?> value="hi"><?php echo esc_html( $time3 ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Minimum Time to Cancel Booking', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<select class="rtwbmal_min_cancel_time" name="rtwbmal_min_cancel_time">
											<?php 
											if( is_array($rtwbmal_time_slot) && !empty($rtwbmal_time_slot))
											{
												foreach ($rtwbmal_time_slot as $tim => $time) { ?>
													<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_min_cancel_time']) ? $rtwbmal_general_settings['rtwbmal_min_cancel_time'] : '' , $tim ); ?> value="<?php echo esc_attr( $tim );?>"> <?php echo esc_html( $time['time'] ); ?></option>
												<?php }
											}
										?></select>
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Time Interval', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<select class="rtwbmal_time_interval" name="rtwbmal_time_interval">
											<?php 
											if( is_array($rtwbmal_time_slot) && !empty($rtwbmal_time_slot))
											{
												foreach ($rtwbmal_time_slot as $tim => $time) { ?>

													<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_time_interval']) ? esc_attr( $rtwbmal_general_settings['rtwbmal_time_interval'] ) : '' , esc_attr( $tim ) ); ?> value="<?php echo esc_attr( $tim ); ?>"> <?php echo esc_html( $time['time'] ); ?> </option>
												<?php }
											}
										?></select>
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Default Appointment Status', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<select class="rtwbmal_app_status" name="rtwbmal_app_status">
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_app_status']) ? esc_attr( $rtwbmal_general_settings['rtwbmal_app_status'] ) : '' , 'pending' ); ?> value="pending"><?php esc_html_e( 'Pending', 'rtwbmal-book-my-appointment' ); ?></option>
											<option <?php selected( isset($rtwbmal_general_settings['rtwbmal_app_status']) ? $rtwbmal_general_settings['rtwbmal_app_status'] : '' , 'approved' ); ?> value="approved"><?php esc_html_e( 'Approved', 'rtwbmal-book-my-appointment' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Appointments per page', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input value="<?php echo esc_attr( isset($rtwbmal_general_settings['rtwbmal_app_per_page']) ? $rtwbmal_general_settings['rtwbmal_app_per_page'] : ''); ?>" type="number" min="1" name="rtwbmal_app_per_page" class="rtwbmal_app_per_page">
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Employees per page', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input type="number" min="1" name="rtwbmal_emp_per_page" class="rtwbmal_emp_per_page" value="<?php echo esc_attr( isset($rtwbmal_general_settings['rtwbmal_emp_per_page']) ? $rtwbmal_general_settings['rtwbmal_emp_per_page'] : '' ); ?>">
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Customers per page', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input type="number" min="1" name="rtwbmal_cus_per_page" class="rtwbmal_cus_per_page"  value="<?php echo esc_attr( isset($rtwbmal_general_settings['rtwbmal_cus_per_page']) ? $rtwbmal_general_settings['rtwbmal_cus_per_page'] : '' ); ?>">
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="rtwbmal_company_content rtwbmal_hide">
						<h3><?php esc_html_e( 'Company', 'rtwbmal-book-my-appointment' );
						$rtwbmal_service_img = ''; ?></h3>
						<div class="rtwbmal_input_fields">
							<table>
								<tr>
									<td>
										<input type="hidden" value="<?php echo esc_attr( isset( $rtwbmal_company_option['rtwbmal_company_imgs'] ) ? $rtwbmal_company_option['rtwbmal_company_imgs'] : '' ); ?>" id="rtwbmal_company_imgs" name="rtwbmal_company_imgs">
										<img id="rtwbmal_company_img" src="<?php echo esc_url( wp_get_attachment_url( isset( $rtwbmal_company_option['rtwbmal_company_imgs'] ) ? $rtwbmal_company_option['rtwbmal_company_imgs'] : '' )  ); ?>" alt="New Company">
									</td>
									<td>
										
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Name', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input type="text" value="<?php echo esc_attr( isset( $rtwbmal_company_option['rtwbmal_company_name'] ) ? $rtwbmal_company_option['rtwbmal_company_name'] : '' ); ?>" name="rtwbmal_company_name" class="rtwbmal_company_name">
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Address', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input type="text" value="<?php echo esc_attr( isset( $rtwbmal_company_option['rtwbmal_company_addr'] ) ? $rtwbmal_company_option['rtwbmal_company_addr'] : '' ); ?>" name="rtwbmal_company_addr" class="rtwbmal_company_addr">
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Website', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input type="text" value="<?php echo esc_attr( isset( $rtwbmal_company_option['rtwbmal_company_web'] ) ? $rtwbmal_company_option['rtwbmal_company_web'] : '' ); ?>" name="rtwbmal_company_web" class="rtwbmal_company_web">
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Phone', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input type="text" value="<?php echo esc_attr( isset( $rtwbmal_company_option['rtwbmal_company_phone'] ) ? $rtwbmal_company_option['rtwbmal_company_phone'] : '' ); ?>" name="rtwbmal_company_phone" class="rtwbmal_company_phone">
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="rtwbmal_payment_content rtwbmal_hide">
						<h3><?php esc_html_e( 'Payment', 'rtwbmal-book-my-appointment' ); ?></h3>
						<div class="rtwbmal_input_fields">
							<table>
								<tr>
									<td>
										<label><?php esc_html_e( 'Payment per page', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input type="number" value="<?php echo esc_attr( isset( $rtwbmal_payment_option['rtwbmal_pay_per_page'] ) ? $rtwbmal_payment_option['rtwbmal_pay_per_page'] : ''); ?>" min="1" name="rtwbmal_pay_per_page" class="rtwbmal_pay_per_page">
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Currency Format', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<?php 
										$rtwbmal_is_active = 'no';
										if( isset($rtwbmal_paypal_option['rtwbmal_paypal_enable']) && $rtwbmal_paypal_option['rtwbmal_paypal_enable'] == 1 )
										{
											$rtwbmal_is_active = 'yes';
										}

										?><input type="hidden" class="rtwbmal_is_active" value="<?php echo esc_attr($rtwbmal_is_active); ?>">
										<select class="rtwbmal_currency_format rtwbmal_select" name="rtwbmal_currency_format">
											<?php

											foreach ($rtwbmal_currencies as $curr => $sym) {
												echo '<option '.selected( isset( $rtwbmal_payment_option['rtwbmal_currency_format'] ) ? $rtwbmal_payment_option['rtwbmal_currency_format'] : '', $curr ).' value="'.$curr.'">'.esc_html__( $sym['text'] .'  '. $sym['symbol'], 'rtwbmal-book-my-appointment').'</option>';
											}
										?></select>
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Currency Position', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<select class="rtwbmal_currency_position rtwbmal_select" name="rtwbmal_currency_position">
											<option <?php selected( isset($rtwbmal_payment_option['rtwbmal_currency_position']) ? $rtwbmal_payment_option['rtwbmal_currency_position'] : '' , 1 ); ?> value="1"><?php esc_html_e( 'Left', 'rtwbmal-book-my-appointment' ); ?></option>
											<option <?php selected( isset($rtwbmal_payment_option['rtwbmal_currency_position']) ? $rtwbmal_payment_option['rtwbmal_currency_position'] : '' , 2 ); ?> value="2"><?php esc_html_e( 'Left-Space', 'rtwbmal-book-my-appointment' ); ?></option>
											<option <?php selected( isset($rtwbmal_payment_option['rtwbmal_currency_position']) ? $rtwbmal_payment_option['rtwbmal_currency_position'] : '' , 3 ); ?> value="3"><?php esc_html_e( 'Right', 'rtwbmal-book-my-appointment' ); ?></option>
											<option <?php selected( isset($rtwbmal_payment_option['rtwbmal_currency_position']) ? $rtwbmal_payment_option['rtwbmal_currency_position'] : '' , 4 ); ?> value="4"><?php esc_html_e( 'Right-Space', 'rtwbmal-book-my-appointment' ); ?></option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label><?php esc_html_e( 'Price Decimal', 'rtwbmal-book-my-appointment' ); ?></label>
									</td>
									<td>
										<input value="<?php echo esc_attr( isset($rtwbmal_payment_option['rtwbmal_price_decimal']) ? $rtwbmal_payment_option['rtwbmal_price_decimal'] : '' ); ?>" type="number" name="rtwbmal_price_decimal" min="0" class="rtwbmal_price_decimal">
									</td>
								</tr>
							</table>
						</div>
						
					</div>
					<div class="rtwbmal_calendar_content rtwbmal_hide">
						<h3><?php esc_html_e( 'Calendar', 'rtwbmal-book-my-appointment' ); ?></h3>
					
					</div>
					<div class="rtwbmal_business_hours_content rtwbmal_hide">
						<h3><?php esc_html_e( 'Business Hours', 'rtwbmal-book-my-appointment' ); ?></h3>
							<div class="rtwbmal_emp_wrkng_hour">
							<ul>
								<?php 
								if( is_array($rtwbmal_days_array) && !empty($rtwbmal_days_array))
								{
									foreach ( $rtwbmal_days_array as $days => $day ) { ?>
										<li>
											<div class="rtwbmal_emp_wrkng_hour_col rtwbmal_emp_wrkng_hour_col_first">
												<div class="rtwbmal_emp_wrkng_hour_content">
													<div class="rtwbmal_emp_days">
														<span class="rtwbmal_custom_checkbox">
															<input <?php checked( isset( $rtwbmal_business_hour['chk'.$days] ) ? $rtwbmal_business_hour['chk'.$days] : 0, 1 ); ?> value="1" id="<?php echo esc_attr('chk'.$days); ?>" class="rtwbmal_custom_checkboxes" name="<?php echo esc_attr('chk'.$days); ?>" type="checkbox">
														</span>
														<span class="rtwbmal_emp_days_name">
															<?php esc_html_e( $day, 'rtwbmal-book-my-appointment' );
														?></span>
													</div>
													<div class="rtwbmal_emp_hours">
														<select class="rtwbmal_strt_day" data-hour_id="" name="<?php echo esc_attr('strtday'.$days); ?>" id="<?php echo esc_attr('strtday'.$days); ?>">
															<?php 
															foreach ( $rtwbmal_emp_hours as $emp => $hour ){ ?>
																<option <?php selected( isset($rtwbmal_business_hour['strtday'.$days]) ? $rtwbmal_business_hour['strtday'.$days] : '', $emp ) ?> value="<?php echo esc_attr( $emp ); ?>">
																	<?php esc_html_e( $hour, 'rtwbmal-book-my-appointment' ); ?>
																</option>
																<?php 
															}
														?></select>
														<select class="rtwbmal_end_day" name="<?php echo esc_attr( 'endday'.$days ); ?>" id="<?php echo esc_attr( 'endday'.$days ); ?>">
															<?php 
															foreach ( $rtwbmal_end_hours as $emp => $hour ) { ?>
																<option <?php selected( isset($rtwbmal_business_hour['endday'.$days]) ? $rtwbmal_business_hour['endday'.$days] : '', $emp ) ?> value="<?php echo esc_attr( $emp ); ?>">
																	<?php esc_html_e( $hour, 'rtwbmal-book-my-appointment' ); ?>
																</option>
															<?php }
														?></select>
													</div>
												</div>
											</div>
										</li>
										<?php	
									}
								}
							?></ul>
						</div>
					</div>
					<div class="rtwbmal_holidays_content rtwbmal_hide">
						<h3><?php esc_html_e( 'Holidays', 'rtwbmal-book-my-appointment' ); ?></h3>
						<div class="rtwbmal_input_fields">
							<table class="rtwbmal_holidays">
								<tr>
									<td>
										<?php esc_html_e( 'Title', 'rtwbmal-book-my-appointment' ); ?>
									</td>
									<td>
										<input value="<?php echo esc_attr( isset( $rtwbmal_holidays_option['rtwbmal_holiday_title'] ) ? $rtwbmal_holidays_option['rtwbmal_holiday_title'] : '' ); ?>" type="text" class="rtwbmal_holiday_title" name="rtwbmal_holiday_title">
									</td>
								</tr>
								<tr>
									<td><?php esc_html_e( 'Date', 'rtwbmal-book-my-appointment' ); ?></td>
									<td>
										<input value="<?php echo esc_attr( isset( $rtwbmal_holidays_option['rtwbmal_select_save_holidays'] ) ? $rtwbmal_holidays_option['rtwbmal_select_save_holidays'] : '' ); ?>" type="text" class="datepicker" name="rtwbmal_selected_holidays">
										<input value="<?php echo esc_attr( isset( $rtwbmal_holidays_option['rtwbmal_select_save_holidays'] ) ? $rtwbmal_holidays_option['rtwbmal_select_save_holidays'] : '' ); ?>" type="hidden" class="rtwbmal_selected_holidays" name="rtwbmal_select_save_holidays">
									</td>
								</tr>
								<tr>
									<td>
										<?php esc_html_e( 'Repeat Every Year', 'rtwbmal-book-my-appointment' ); ?>
									</td>
									<td>
										<span class="rtwbmal_custom_checkbox">
											<input <?php checked( isset( $rtwbmal_holidays_option['rtwbmal_repeat'] ) ? $rtwbmal_holidays_option['rtwbmal_repeat'] : '', 1 ); ?> type="checkbox" value="1" name="rtwbmal_repeat">
										</span>
									</td>
								</tr>
							</table>
							
						</div>
					</div>
					<div class="rtwbmal_notifications_content rtwbmal_hide">
						<span class="rtwbmal_pro_text"><?php esc_html_e('This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
							<a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a>
						</span>
						<h3><?php esc_html_e( 'Notifications', 'rtwbmal-book-my-appointment' ); ?></h3>
						<div class="panel-wrap product_data rtwbmal_pro_text_overlay">
							<div class="rtwbmal_input_fields">
								<table>
									<tr>
										<td>
											<label><?php esc_html_e( 'Mail Serivce', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<select class="rtwbmal_select" name="rtwbmal_select_mail_type">
												<option value="1"><?php esc_html_e( 'PHP Mail', 'rtwbmal-book-my-appointment' ); ?></option>
												<option value="2"><?php esc_html_e( 'WP Mail', 'rtwbmal-book-my-appointment' ); ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Sender Name', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input value="" type="text" name="rtwbmal_sender_name">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Sender Email', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input value="" type="text" name="rtwbmal_sender_email">
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="rtwbmal_gateway_content rtwbmal_hide">
						<span class="rtwbmal_pro_text"><?php esc_html_e('This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
							<a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a>
						</span>
						<div class="rtwbmal_gate_tabs">
							<span class="rtwbmal_paypal_gate rtwbmalactive"><b><?php esc_html_e( 'Paypal', 'rtwbmal-book-my-appointment'); ?></b></span>

							<span class="rtwbmal_stripe_gate"><b><?php esc_html_e( 'Stripe', 'rtwbmal-book-my-appointment'); ?></b></span>
						</div>
						<div class="rtwbmal_paypal_settings">
							<div class="panel-wrap product_data rtwbmal_pro_text_overlay">
								<h3><?php esc_html_e( 'PayPal Setting', 'rtwbmal-book-my-appointment' ); ?></h3>
								<div class="rtwbmal_input_fields">
									<table>
										<tr>
											<td>
												<label><?php esc_html_e( 'Enable Paypal', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<span class="rtwbmal_custom_checkbox">
													<input type="checkbox" value="1"
													<?php checked( isset($rtwbmal_paypal_option['rtwbmal_paypal_enable'] ) ? $rtwbmal_paypal_option['rtwbmal_paypal_enable'] : 0 , 1 ) ?> name="rtwbmal_paypal_enable" class="rtwbmal_paypal_enable">
												</span>
												<i class="rtwbmal_description"><?php esc_html_e( 'Enable/Disable PayPal Payment Gateway.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Title', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input type="text" name="rtwbmal_paypal_title" class="rtwbmal_paypal_title" value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_paypal_title'] ) ? $rtwbmal_paypal_option['rtwbmal_paypal_title'] : 'PayPal' ); ?>" placeholder="PayPal">
												<i class="rtwbmal_description"><?php esc_html_e( 'This title will be displayed for PayPal.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Description', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input type="text" class="rtwbmal_paypal_descri" name="rtwbmal_paypal_descri" value="<?php echo isset($rtwbmal_paypal_option['rtwbmal_paypal_descri'] ) ? stripcslashes($rtwbmal_paypal_option['rtwbmal_paypal_descri']) : 'you can pay with your credit card if you do not have a PayPal account.'; ?>" placeholder="">
												<i class="rtwbmal_description"><?php esc_html_e( 'This controls the description which the user sees during booking.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'PayPal Email', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_paypal_email']) ? $rtwbmal_paypal_option['rtwbmal_paypal_email'] : '' ); ?>" type="text" name="rtwbmal_paypal_email" class="rtwbmal_paypal_email">
												<i class="rtwbmal_description"><?php esc_html_e( 'Please enter your PayPal email address; this is needed in order to take payment.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'PayPal Sandbox', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<span class="rtwbmal_custom_checkbox">
													<input value="1" type="checkbox" name="rtwbmal_paypal_sandbox" class="rtwbmal_paypal_sandbox" <?php checked( isset($rtwbmal_paypal_option['rtwbmal_paypal_sandbox'] ) ? $rtwbmal_paypal_option['rtwbmal_paypal_sandbox'] : 0 , 1 ) ?> >
												</span>
												<i class="rtwbmal_description"><?php esc_html_e( 'PayPal sandbox can be used to test payments. Sign up for a ', 'rtwbmal-book-my-appointment' ); ?>
												<a href="https://developer.paypal.com/"><?php esc_html_e('developer account.', 'rtwbmal-book-my-appointment'); ?>
												</a>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Debug Log', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<span class="rtwbmal_custom_checkbox">
													<input value="1" type="checkbox" name="rtwbmal_paypal_debug" class="rtwbmal_paypal_debug" <?php checked( isset($rtwbmal_paypal_option['rtwbmal_paypal_debug'] ) ? $rtwbmal_paypal_option['rtwbmal_paypal_debug'] : 0 , 1 ) ?> >
												</span>
												<i class="rtwbmal_description"><?php esc_html_e( 'Log PayPal events, such as IPN requests', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Enable IPN Notification', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<span class="rtwbmal_custom_checkbox">
													<input value="1" type="checkbox" name="rtwbmal_paypal_ipn" class="rtwbmal_paypal_ipn" <?php checked( isset($rtwbmal_paypal_option['rtwbmal_paypal_ipn'] ) ? $rtwbmal_paypal_option['rtwbmal_paypal_ipn'] : 0 , 1  ) ?> >
												</span>
												<i class="rtwbmal_description"><?php esc_html_e( 'Send notifications when an IPN is received from PayPal indicating refunds, chargebacks and cancellations.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Receiver Email', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_receiver_email']) ? $rtwbmal_paypal_option['rtwbmal_receiver_email'] : '' ); ?>" type="text" name="rtwbmal_receiver_email" class="rtwbmal_receiver_email">
												<i class="rtwbmal_description"><?php esc_html_e( 'If your main PayPal email differs from the PayPal email entered above, input your main receiver email for your PayPal account here. This is used to validate IPN requests.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'PayPal identity token ', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_paypal_id_token']) ? $rtwbmal_paypal_option['rtwbmal_paypal_id_token'] : '' ); ?>" type="text" name="rtwbmal_paypal_id_token" class="rtwbmal_paypal_id_token">
												<i class="rtwbmal_description"><?php esc_html_e( 'Optionally enable "Payment Data Transfer" (Profile > Profile and Settings > My Selling Tools > Website Preferences) and then copy your identity token here. This will allow payments to be verified without the need for PayPal IPN.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Invoice prefix', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_paypal_invoice_prefix']) ? $rtwbmal_paypal_option['rtwbmal_paypal_invoice_prefix'] : ''); ?>" type="text" name="rtwbmal_paypal_invoice_prefix" class="rtwbmal_paypal_invoice_prefix">
												<i class="rtwbmal_description"><?php esc_html_e( 'Please enter a prefix for your invoice numbers. If you use your PayPal account for multiple stores ensure this prefix is unique as PayPal will not allow orders with the same invoice number.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Payment Action', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<select class="rtwbmal_payment_action rtwbmal_select" name="rtwbmal_payment_action">
													<option <?php selected( isset($rtwbmal_paypal_option['rtwbmal_payment_action']) ? $rtwbmal_paypal_option['rtwbmal_payment_action'] : '' , 1 ); ?> value="1"><?php esc_html_e( 'Capture', 'rtwbmal-book-my-appointment' ); ?></option>
													<option <?php selected( isset($rtwbmal_paypal_option['rtwbmal_payment_action']) ? $rtwbmal_paypal_option['rtwbmal_payment_action'] : '' , 2 ); ?> value="2"><?php esc_html_e( 'Authorize', 'rtwbmal-book-my-appointment' ); ?></option>
												</select>
												<i class="rtwbmal_description"><?php esc_html_e( 'Choose whether you wish to capture funds immediately or authorize payment only.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Image Url', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_paypal_image_url']) ? $rtwbmal_paypal_option['rtwbmal_paypal_image_url'] : '' ); ?>" type="text" name="rtwbmal_paypal_image_url" class="rtwbmal_paypal_image_url">
												<i class="rtwbmal_description">
													<?php esc_html_e( 'Optionally enter the URL to a 150x50px image displayed as your logo in the upper left corner of the PayPal checkout pages.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
									</table>
								</div>
								
								<div class="rtwbmal_live_apicredentials">
									<h3><?php esc_html_e( 'Live API Credentials', 'rtwbmal-book-my-appointment' ); ?></h3>
									<i class="rtwbmal_description">
										<?php esc_html_e( 'Enter your PayPal API credentials to process refunds via PayPal. Learn how to access your ', 'rtwbmal-book-my-appointment' ); ?>
										<a href="https://developer.paypal.com/webapps/developer/docs/classic/api/apiCredentials/#create-an-api-signature"><b><?php esc_html_e( 'PayPal API Credentials.', 'rtwbmal-book-my-appointment' ); ?></b>
										</a>
									</i>
									<div class="rtwbmal_input_fields">
										<table>
											<tr>
												<td>
													<label><?php esc_html_e( 'API Username', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_live_api_user_name']) ? $rtwbmal_paypal_option['rtwbmal_live_api_user_name'] : '' ); ?>" type="text" name="rtwbmal_live_api_user_name" class="rtwbmal_live_api_user_name">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API credentials from PayPal.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'API Password', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_live_api_password']) ? $rtwbmal_paypal_option['rtwbmal_live_api_password'] : '' ); ?>" type="password" name="rtwbmal_live_api_password" class="rtwbmal_live_api_password">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API credentials from PayPal.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'API Signature', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_live_api_sign']) ? $rtwbmal_paypal_option['rtwbmal_live_api_sign'] : '' ); ?>" type="password" name="rtwbmal_live_api_sign" class="rtwbmal_live_api_sign">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API credentials from PayPal.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="rtwbmal_test_apicredentials">
									<h3><?php esc_html_e( 'Sandbox API Credentials', 'rtwbmal-book-my-appointment' ); ?></h3>
									<i class="rtwbmal_description">
										<?php esc_html_e( 'Enter your PayPal API credentials to process refunds via PayPal. Learn how to access your ', 'rtwbmal-book-my-appointment' ); ?>
										<a href="https://developer.paypal.com/webapps/developer/docs/classic/api/apiCredentials/#create-an-api-signature"><b><?php esc_html_e( 'PayPal API Credentials.', 'rtwbmal-book-my-appointment' ); ?></b>
										</a>
									</i>
									<div class="rtwbmal_input_fields">
										<table>
											<tr>
												<td>
													<label><?php esc_html_e( 'Sandbox API Username', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_api_user_name']) ? $rtwbmal_paypal_option['rtwbmal_api_user_name'] : '' ); ?>" type="text" name="rtwbmal_api_user_name" class="rtwbmal_api_user_name">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API credentials from PayPal.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'Sandbox API Password', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_api_password']) ? $rtwbmal_paypal_option['rtwbmal_api_password'] : '' ); ?>" type="password" name="rtwbmal_api_password" class="rtwbmal_api_password">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API credentials from PayPal.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'Sandbox API Signature', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_paypal_option['rtwbmal_api_sign']) ? $rtwbmal_paypal_option['rtwbmal_api_sign'] : ''); ?>" type="password" name="rtwbmal_api_sign" class="rtwbmal_api_sign">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API credentials from PayPal.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="rtwbmal_stripe_settings">
							<h3><?php esc_html_e( 'Stripe Setting', 'rtwbmal-book-my-appointment' ); ?></h3>
							<div class="panel-wrap product_data rtwbmal_pro_text_overlay">
								<div class="rtwbmal_input_fields">
									<table>
										<tr>
											<td>
												<label><?php esc_html_e( 'Enable Stripe', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<span class="rtwbmal_custom_checkbox">
													<input type="checkbox" value="1"
													<?php checked( isset($rtwbmal_stripe_option['rtwbmal_stripe_enable'] ) ? $rtwbmal_stripe_option['rtwbmal_stripe_enable'] : 0 , 1 ) ?> name="rtwbmal_stripe_enable" class="rtwbmal_stripe_enable">
												</span>
												<i class="rtwbmal_description"><?php esc_html_e( 'Enable/Disable stripe Payment Gateway.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Title', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input type="text" name="rtwbmal_stripe_title" class="rtwbmal_stripe_title" value="<?php echo esc_attr( isset($rtwbmal_stripe_option['rtwbmal_stripe_title'] ) ? $rtwbmal_stripe_option['rtwbmal_stripe_title'] : 'Stripe' ); ?>" placeholder="Stripe">
												<i class="rtwbmal_description"><?php esc_html_e( 'This title will be displayed for Stripe.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Test Mode Stripe', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<span class="rtwbmal_custom_checkbox">
													<input value="1" type="checkbox" name="rtwbmal_stripe_sandbox" class="rtwbmal_stripe_sandbox" <?php checked( isset($rtwbmal_stripe_option['rtwbmal_stripe_sandbox'] ) ? $rtwbmal_stripe_option['rtwbmal_stripe_sandbox'] : 0 , 1 ) ?> >
												</span>	
												<i class="rtwbmal_description"><?php esc_html_e( 'stripe test mode can be used to test payments. See Instructions ', 'rtwbmal-book-my-appointment' ); ?>
												<a href="https://stripe.com/docs/testing"><?php esc_html_e('Testing Stripe', 'rtwbmal-book-my-appointment'); ?>
												</a>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Statement Descriptor ', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<input type="text" name="rtwbmal_stripe_descriptor" class="rtwbmal_stripe_descriptor" value="<?php echo esc_attr( isset($rtwbmal_stripe_option['rtwbmal_stripe_descriptor'] ) ? $rtwbmal_stripe_option['rtwbmal_stripe_descriptor'] : 'Stripe' ); ?>">
												<i class="rtwbmal_description"><?php esc_html_e( 'Statement descriptors are limited to 22 characters, cannot use the special characters >, <, ", \, , *, and must not consist solely of numbers. This will appear on your customer\'s statement in capital letters.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Capture charge immediately', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
												<span class="rtwbmal_custom_checkbox">
													<input type="checkbox" value="1"
													<?php checked( isset($rtwbmal_stripe_option['rtwbmal_stripe_capture'] ) ? $rtwbmal_stripe_option['rtwbmal_stripe_capture'] : 0 , 1 ) ?> name="rtwbmal_stripe_capture" class="rtwbmal_stripe_capture">
												</span>
												<i class="rtwbmal_description"><?php esc_html_e( 'Whether or not to immediately capture the charge. When unchecked, the charge issues an authorization and will need to be captured later. Uncaptured charges expire in 7 days.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php esc_html_e( 'Logging', 'rtwbmal-book-my-appointment' ); ?></label>
											</td>
											<td>
											<span class="rtwbmal_custom_checkbox">
												<input type="checkbox" value="1"
												<?php checked( isset($rtwbmal_stripe_option['rtwbmal_stripe_log'] ) ? $rtwbmal_stripe_option['rtwbmal_stripe_log'] : 0 , 1 ) ?> name="rtwbmal_stripe_log" class="rtwbmal_stripe_log">
												</span>
												<i class="rtwbmal_description"><?php esc_html_e( 'Save debug messages to the WooCommerce System Status log.', 'rtwbmal-book-my-appointment' ); ?>
												</i>
											</td>
										</tr>
									</table>
								</div>
								<div class="rtwbmal_live_credentials">
									<h3><?php esc_html_e( 'Live Stripe Credentials', 'rtwbmal-book-my-appointment' ); ?></h3>
									<div class="rtwbmal_input_fields">
										<table>
											<tr>
												<td>
													<label><?php esc_html_e( 'Live Publishable Key', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_stripe_option['rtwbmal_publish_key_live']) ? $rtwbmal_stripe_option['rtwbmal_publish_key_live'] : ''); ?>" type="text" name="rtwbmal_publish_key_live" class="rtwbmal_publish_key_live">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API keys from your stripe account.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'Live Secret Key', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_stripe_option['rtwbmal_secret_key_live']) ? $rtwbmal_stripe_option['rtwbmal_secret_key_live'] : ''); ?>" type="password" name="rtwbmal_secret_key_live" class="rtwbmal_secret_key_live">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API keys from your stripe account.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'Live Webhook Secret', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_stripe_option['rtwbmal_webhook_live']) ? $rtwbmal_stripe_option['rtwbmal_webhook_live'] : ''); ?>" type="password" name="rtwbmal_webhook_live" class="rtwbmal_webhook_live">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your webhook signing secret from the webhooks section in your stripe account.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="rtwbmal_test_credentials">
									<h3><?php esc_html_e( 'Testing Stripe Credentials', 'rtwbmal-book-my-appointment' ); ?></h3>
									<div class="rtwbmal_input_fields">
										<table>
											<tr>
												<td>
													<label><?php esc_html_e( 'Test Publishable Key:', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_stripe_option['rtwbmal_publish_key']) ? $rtwbmal_stripe_option['rtwbmal_publish_key'] : ''); ?>" type="text" name="rtwbmal_publish_key" class="rtwbmal_publish_key">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your API keys from your stripe account.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'Test Secret Key:', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset($rtwbmal_stripe_option['rtwbmal_secret_key']) ? $rtwbmal_stripe_option['rtwbmal_secret_key'] : ''); ?>" type="password" name="rtwbmal_secret_key" class="rtwbmal_secret_key">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your webhook signing secret from the webhooks section in your stripe account.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
											<tr>
												<td>
													<label><?php esc_html_e( 'Test Secret Key:', 'rtwbmal-book-my-appointment' ); ?></label>
												</td>
												<td>
													<input value="<?php echo esc_attr( isset( $rtwbmal_stripe_option['rtwbmal_webhook_test'] ) ? $rtwbmal_stripe_option['rtwbmal_webhook_test'] : ''); ?>" type="password" name="rtwbmal_webhook_test" class="rtwbmal_webhook_test">
													<i class="rtwbmal_description">
														<?php esc_html_e( 'Get your webhook signing secret from the webhooks section in your stripe account.', 'rtwbmal-book-my-appointment' ); ?>
													</i>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="rtwbmal_google_cal_content rtwbmal_hide">
						<span class="rtwbmal_pro_text"><?php esc_html_e('This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
							<a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a>
						</span>
					<h3><?php esc_html_e( 'Google Calendar Settings', 'rtwbmal-book-my-appointment' ); ?></h3>
						<div class="panel-wrap product_data rtwbmal_pro_text_overlay">
							<div class="rtwbmal_input_fields">
								<table>
									<tr>
										<td>
											<label><?php esc_html_e( 'Enable Google Calendar', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input type="checkbox" value="1" name="rtwbmal_google_enable" class="rtwbmal_google_enable">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Client ID', 'rtwbmal-book-my-appointment' ); ?></label>
											<span class="rtwbmal_google_tooltip_wrapper">
												<a class="rtwbmal_anchor" href="https://console.developers.google.com" target="_blank"><i class="fas fa-question"></i></a>
												<span class="rtwbmal_google_tooltip">
												<?php esc_html_e( 'Know how to obtain Google Client ID.', 'rtwbmal-book-my-appointment' ); ?>
												</span>
											</span>
										</td>
										<td>
											<input type="text" name="rtwbmal_google_client_id" class="rtwbmal_google_client_id">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Client Secret', 'rtwbmal-book-my-appointment' ); ?></label>
											<span class="rtwbmal_google_tooltip_wrapper">
												<a class="rtwbmal_anchor" href="https://console.developers.google.com" target="_blank"><i class="fas fa-question"></i></a>
												<span class="rtwbmal_google_tooltip">
												<?php esc_html_e( 'Know how to obtain Google Client Secret.', 'rtwbmal-book-my-appointment' ); ?>
												</span>
											</span>
										</td>
										<td>
											<input type="text" name="rtwbmal_client_secret" class="rtwbmal_client_secret">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Redirect URL', 'rtwbmal-book-my-appointment' ); ?></label>
											<span class="rtwbmal_google_tooltip_wrapper">
												<i class="fas fa-question"></i>
												<span class="rtwbmal_google_tooltip">
												<?php esc_html_e( 'This is the path in your application that users are redirected to after they have authenticated with Google. Add this URI in your Google project credentials under "Authorized redirect URIs".', 'rtwbmal-book-my-appointment' ); ?>
												</span>
											</span>
										</td>
										<td>
											<input type="text" readonly value="<?php echo esc_attr( admin_url().'admin.php?page=rtwbmal-settings' ); ?>" name="rtwbmal_redirect_url" class="rtwbmal_redirect_url">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Event Title', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input type="text" name="rtwbmal_google_cal_event_title" class="rtwbmal_google_cal_event_title">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Event Description', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input type="text" name="rtwbmal_cal_event_desc" class="rtwbmal_cal_event_desc">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Add Event\'s Attendees', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input type="checkbox" class="rtwbmal_add_attendees" name="rtwbmal_add_attendees" value="1">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Add Event\'s Invitation Mail', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input type="checkbox" class="rtwbmal_send_mail" name="rtwbmal_send_mail" value="1">
										</td>
									</tr>
									<tr>
										<td>
											<label><?php esc_html_e( 'Maximum Event Returns', 'rtwbmal-book-my-appointment' ); ?></label>
										</td>
										<td>
											<input type="number" name="rtwbmal_cal_max_events" class="rtwbmal_cal_max_events">
										</td>
									</tr>
									<tr>
										<td>
										
										</td>
										<td>
										<?php // echo esc_url(admin_url().'admin.php?page=rtwbmal-settings&rtwbmal_authenticate'); ?>
											<p  class="rtwbmal_button rtwbmal_google_authenticate"><?php esc_attr_e( 'Authenticate', 'rtwbmal-book-my-appointment' ); ?></p>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="rtwbmal_save_settings">
					<input type="submit" value="<?php esc_attr_e( 'Save', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_save_settings" class="rtwbmal_button">
				</div>
			</form>
		</div>
	</div>
</div>