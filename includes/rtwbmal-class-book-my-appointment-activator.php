<?php
/**
 * Fired during plugin activation
 *
 * @link       https://www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwbmal_Book_My_Appointment_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function rtwbmal_activate() 
	{
		global $wpdb;
		$charset_collate = 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci';
		$query  = '';

		// EMPLOYEES
		$table_name = $wpdb->prefix.'rtwbma_employees';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`wp_user_id` 		BIGINT(20) UNSIGNED DEFAULT NULL,
                `attachment_id`  	INT UNSIGNED DEFAULT NULL,
               	`first_name`      	VARCHAR(255) DEFAULT NULL,
               	`last_name`      	VARCHAR(255) DEFAULT NULL,
                `email`          	VARCHAR(255) DEFAULT NULL,
                `phone`          	VARCHAR(255) DEFAULT NULL,
                `info`           	TEXT DEFAULT NULL,
                `address`           TEXT DEFAULT NULL,
                `display_order`  	INT UNSIGNED DEFAULT NULL,
                `visibility`     	TINYINT(2) NOT NULL DEFAULT 1 COMMENT '0=>private, 1=>public',
                `google_data`    	TEXT DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		// CATEGORIES
		$table_name = $wpdb->prefix.'rtwbma_categories';
		$sql = "CREATE TABLE `$table_name`(
				`id`						INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `title`    					VARCHAR(255) DEFAULT NULL,
                `attachment_id`  			INT UNSIGNED DEFAULT NULL,
                `color`   					VARCHAR(255) DEFAULT NULL,
                `display_order`       		INT NOT NULL DEFAULT 9999
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		// SERVICES
		$table_name = $wpdb->prefix.'rtwbma_services';
		$sql = "CREATE TABLE `$table_name`(
				`id`					INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`cat_id`         		INT UNSIGNED DEFAULT NULL,
				`status`         		TINYINT(2) NOT NULL DEFAULT 1,
				`title`               	VARCHAR(255) DEFAULT '',
				`price`               	DECIMAL(10,2) NOT NULL DEFAULT 0.00,
				`duration`            	INT NOT NULL DEFAULT 900,
				`buffer_before`        	INT NOT NULL DEFAULT 0,
				`buffer_after`       	INT NOT NULL DEFAULT 0,
				`min_capacity`        	INT NOT NULL DEFAULT 1,
				`max_capacity`        	INT NOT NULL DEFAULT 10,
				`description`           TEXT DEFAULT NULL,
				`address`           	TEXT DEFAULT NULL,
				`visibility`            TINYINT(2) NOT NULL DEFAULT 1,
				`attachment_id`  		INT UNSIGNED DEFAULT NULL,
				`color`               	VARCHAR(255) NOT NULL DEFAULT '#1e73be',
				`gap`              		INT NOT NULL DEFAULT 0,
				`display_order`         INT UNSIGNED DEFAULT 0,
				`price_on` 				TINYINT(3) NOT NULL DEFAULT '1' COMMENT '1=>per service, 2=>per person'
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
			
		// LOCATIONS
		$table_name = $wpdb->prefix.'rtwbma_locations';
		$sql = "CREATE TABLE `$table_name`(
				`id`						INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`loc_name`    		        VARCHAR(255) DEFAULT '',
				`loc_address`     			VARCHAR(255) DEFAULT '',
				`loc_descr`     			VARCHAR(255) DEFAULT '',
				`loc_emp`         			INT UNSIGNED DEFAULT NULL,
				`emp_id`  		        	TEXT DEFAULT NULL,
				`attachment_id`  		   	INT UNSIGNED DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		// EMPLOYEE LOCATIONS
		$table_name = $wpdb->prefix.'rtwbma_emp_loc';
		$sql = "CREATE TABLE `$table_name`(
				`id`			INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`emp_id`     	INT UNSIGNED NOT NULL,
                `loc_id`  		INT UNSIGNED NOT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		// EMPLOYEES SERVICES
		$table_name = $wpdb->prefix.'rtwbma_emp_services';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`service_id`   		INT UNSIGNED NOT NULL,
				`emp_id`     		INT UNSIGNED NOT NULL,
				`active`			TINYINT(2) NOT NULL DEFAULT '0' COMMENT '0=>disable, 1=>enable',
                `loc_id`  			VARCHAR(5000) DEFAULT '',
				`price`        		DECIMAL(10,2) NOT NULL DEFAULT 0.00,
                `cap_min` 			INT NOT NULL DEFAULT 1,
                `cap_max` 			INT NOT NULL DEFAULT 1
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		// CUSTOMERS
		$table_name = $wpdb->prefix.'rtwbma_customers';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `wp_user_id`     	BIGINT(20) UNSIGNED DEFAULT NULL,
               	`first_name`      	VARCHAR(255) DEFAULT NULL,
               	`last_name`      	VARCHAR(255) DEFAULT NULL,
                `email`          	VARCHAR(255) DEFAULT NULL,
                `phone`          	VARCHAR(255) DEFAULT NULL,
                `gender`          	TINYINT(3) DEFAULT 1,
                `birthday` 			DATE DEFAULT NULL,
                `country`          	VARCHAR(255) DEFAULT NULL,
                `state`          	VARCHAR(255) DEFAULT NULL,
                `city`          	VARCHAR(255) DEFAULT NULL,
                `address`          	VARCHAR(255) DEFAULT NULL,
				`post_code`         INT UNSIGNED,
				`info`              TEXT DEFAULT NULL,
				`attachment_id`  	INT UNSIGNED DEFAULT NULL,
                `registration_date`	DATETIME DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
			
		// PAYMENTS
		$table_name = $wpdb->prefix.'rtwbma_payments';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`appointment_id`    INT UNSIGNED DEFAULT NULL,
				`coupon_id`         INT UNSIGNED DEFAULT NULL,
				`type` 	    		TINYINT(3) NOT NULL DEFAULT '0' COMMENT '0=>local, 1=>paypal, 2=>stripe',
				`price`       		DECIMAL(10,2) NOT NULL DEFAULT 0.00,
				`paid`       		DECIMAL(10,2) NOT NULL DEFAULT 0.00,
                `tax_id`			INT UNSIGNED DEFAULT NULL,
                `created_date`		DATETIME DEFAULT NULL,
				`status` 	     	TINYINT(3) NOT NULL DEFAULT '0' COMMENT '0=>zero, 1=>partial, 2=>full',
				`transaction_detail` TEXT DEFAULT NULL,
				`payment_status` 	TEXT DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		

		// APPOINTMENTS
		$table_name = $wpdb->prefix.'rtwbma_appointments';
		$sql = "CREATE TABLE `$table_name`(
				`id`					INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`service_id`         	INT UNSIGNED DEFAULT NULL,
				`emp_id`         		INT UNSIGNED DEFAULT NULL,
				`loc_id`         		INT UNSIGNED DEFAULT NULL,
				`app_status`     	    TINYINT(4) NOT NULL DEFAULT '0' COMMENT '0=>pending, 1=>approved, 2=>cancelled, 3=rejected',
				`cancel_by` 			TINYINT(3)  NOT NULL DEFAULT '0' COMMENT '1=>admin, 2=>customer, 0=>not_cancelled',
				`cancel_reason` 		TEXT DEFAULT NULL,
                `start_date`			DATE DEFAULT NULL,
                `end_date`				DATE DEFAULT NULL,
                `start_time`			TIME DEFAULT NULL,
                `end_time`				TIME DEFAULT NULL,
                `note`           		TEXT DEFAULT NULL,
				`created_from` 	        TINYINT(2)  NOT NULL DEFAULT '0' COMMENT '0=>bma, 1=>google'
				
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		

		// CUSTOMER APPOINTMENTS
		$table_name = $wpdb->prefix.'rtwbma_customer_appointments';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`cust_id`         	INT UNSIGNED DEFAULT NULL,
				`appointment_id`    INT UNSIGNED DEFAULT NULL,
				`payment_id`        INT UNSIGNED DEFAULT NULL,
				`num_of_people`     INT UNSIGNED DEFAULT NULL,
				`price`         	DECIMAL(10,2) NOT NULL DEFAULT 0.00,
				`status`     	    TINYINT(4)  NOT NULL DEFAULT '0' COMMENT '0=>pending, 1=>approved, 2=>canceled, 3=>rejected',
				`status_updated_at`	DATETIME DEFAULT NULL,
				`created_from` 	   	TINYINT(2)  NOT NULL DEFAULT '0' COMMENT '0=>bma, 1=>google',
				`date_created`		DATETIME DEFAULT NULL,
				`rating`			INT UNSIGNED DEFAULT NULL,
				`review`			TEXT DEFAULT NULL
				
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }

			
		// EMPLOYEE WORKING HOURS
		$table_name = $wpdb->prefix.'rtwbma_emp_working_hour';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`emp_id`         	INT UNSIGNED DEFAULT NULL,
				`active`			TINYINT(2) DEFAULT 1 COMMENT '0=>disable, 1=>enable',
                `days`          	TINYINT(7) NOT NULL DEFAULT 1,
                `strt_time`			TIME DEFAULT NULL,
                `end_time`			TIME DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		
		// EMPLOYEE BUSINESS HOURS BREAKS
		$table_name = $wpdb->prefix.'rtwbma_emp_hour_break';
		$sql = "CREATE TABLE `$table_name`(
				`id`					INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`emp_id`         		INT UNSIGNED DEFAULT NULL,
                `days`          		TINYINT(7) NOT NULL DEFAULT 1,
                `strt_time`				TIME DEFAULT NULL,
                `end_time`				TIME DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		
		// EMAIL NOTIFICATIONS
		$table_name = $wpdb->prefix.'rtwbma_email_notifications';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`status` 			TINYINT(2) NOT NULL DEFAULT '0' COMMENT '0=>active, 1=>inactive',
				`type`           	INT UNSIGNED NOT NULL DEFAULT 0,
				`subject`           VARCHAR(255) DEFAULT '',
				`setting_name` 		VARCHAR(50) NOT NULL,
                `message`           TEXT DEFAULT NULL,
                `message_to`       	TINYINT(3) NOT NULL DEFAULT '0' COMMENT '0=>admin, 1=>employee, 2=>customer',
                `scheduled`	       	TINYINT(2) NOT NULL DEFAULT '0' COMMENT '0=>no, 1=>yes',
                `invoice`          	TINYINT(1) NOT NULL DEFAULT 0,
                `day_interval`    	INT NOT NULL DEFAULT 1,
                `time_interval`    	TIME DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }


		// SMS NOTIFICATIONS
		$table_name = $wpdb->prefix.'rtwbma_sms_notifications';
		$sql = "CREATE TABLE `$table_name`(
				`id`				INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`status` 			TINYINT(2) NOT NULL DEFAULT '0' COMMENT '0=>active, 1=>inactive',
				`type`           	INT UNSIGNED NOT NULL DEFAULT 0,
				`subject`           VARCHAR(255) DEFAULT '',
                `message`           TEXT DEFAULT NULL,
				`message_to`       	TINYINT(3) NOT NULL DEFAULT '0' COMMENT '0=>admin, 1=>employee, 2=>customer',
                `scheduled`	       	TINYINT(2) NOT NULL DEFAULT '0' COMMENT '0=>no, 1=>yes',
                `invoice`          	TINYINT(1) NOT NULL DEFAULT 0,
                `day_interval`    	INT NOT NULL DEFAULT 1,
                `time_interval`    	TIME DEFAULT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		
		
		// SENT NOTIFICATIONS
		$table_name = $wpdb->prefix.'rtwbma_notifications_sent';
		$sql = "CREATE TABLE `$table_name`(
				`id`						INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`notification_id`  		   	INT UNSIGNED DEFAULT NULL,
				`appointment_id`  		   	INT UNSIGNED DEFAULT NULL,
				`customer_id`  			   	INT UNSIGNED DEFAULT NULL,
				`employee_id`  			   	INT UNSIGNED DEFAULT NULL,
				`send_by`  			   		TINYINT(2) NOT NULL DEFAULT '0' COMMENT '0=>email, 1=>sms',
                `sent_date`					DATETIME NOT NULL
		) {$charset_collate};";
		
		if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) { $query .= $sql; }
		

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); 
		// need this file for dbDelta() function to work
		dbDelta( $query );

		$wpdb->get_var( "ALTER TABLE $wpdb->prefix".'rtwbma_services'." ADD COLUMN IF NOT EXISTS `price_on` TINYINT(3) NOT NULL DEFAULT '1' COMMENT '1=>per service, 2=>per persons'" );
		
		update_option('rtwbmal_lite_installed', 'yes');
    }
}
?>