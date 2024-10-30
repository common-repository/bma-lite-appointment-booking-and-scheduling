<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwbmal_Book_My_Appointment_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function rtwbmal_load_plugin_textdomain() {

		load_plugin_textdomain(
			'rtwbmal-book-my-appointment',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}