<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.redefiningtheweb.com
 * @since             1.0.0
 * @package           Rtwbmal_Book_My_Appointment
 *
 * @wordpress-plugin
 * Plugin Name:       BMA Lite - Appointment Booking and Scheduling Plugin
 * Plugin URI:        https://www.redefiningtheweb.com
 * Description:       A plugin to handle all meetings and appointments for your site.
 * Version:           1.4.1
 * Author:            RedefiningTheWeb
 * Author URI:        https://www.redefiningtheweb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rtwbmal-book-my-appointment
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	wp_die();
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RTWBMAL_BOOK_MY_APPOINTMENT_VERSION', '1.4.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/rtwbmal-class-book-my-appointment-activator.php
 */
function rtwbmal_activate_book_my_appointment() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/rtwbmal-class-book-my-appointment-activator.php';
	Rtwbmal_Book_My_Appointment_Activator::rtwbmal_activate();
}

register_activation_hook( __FILE__, 'rtwbmal_activate_book_my_appointment' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/rtwbmal-class-book-my-appointment.php';


if ( !defined( 'RTWBMAL_DIR' ) ) {
	define('RTWBMAL_DIR', plugin_dir_path( __FILE__ ) );
}
if ( !defined( 'RTWBMAL_URL' ) ) {
	define('RTWBMAL_URL', plugin_dir_url( __FILE__ ) );
}
if ( !defined( 'RTWBMAL_HOME' ) ) {
	define('RTWBMAL_HOME', home_url() );
}

if ( !defined( 'RTWBMAL_PAYPAL_LOG_FILE' ) ) {
	define('RTWBMAL_PAYPAL_LOG_FILE',  WP_CONTENT_DIR .'/uploads/rtwbmal_logs');
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function rtwbmal_run_book_my_appointment() {
	
	if( function_exists('is_multisite') && is_multisite() )
	{
		include_once(ABSPATH. 'wp-admin/includes/plugin.php');
		if( is_plugin_active('rtwbma-book-my-appointment/rtwbma-book-my-appointment.php') )
		{
			return;
		}
	}else{
		if( in_array('rtwbma-book-my-appointment/rtwbma-book-my-appointment.php', apply_filters('active_plugins', get_option('active_plugins') ) ) )
		{
			return;
		}
	}
	
	$plugin = new Rtwbmal_Book_My_Appointment();
	$plugin->rtwbmal_run();
}
rtwbmal_run_book_my_appointment();