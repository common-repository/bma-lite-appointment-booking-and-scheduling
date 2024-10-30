<?php
global $wpdb;
	$rtwbmal_general_setting = get_option( 'rtwbma_general_settings', array() );
    $rtwbmal_all_services = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_services ORDER BY `title` ASC", ARRAY_A );

    $rtwbmal_total_rejected = 0;
    $rtwbmal_total_approved = 0;
    $rtwbmal_total_cancelled = 0;
    $rtwbam_total_pending = 0;
    $rtwbmal_todays_appointment = 0;
    $rtwbmal_todays_app_array = array();
    $rtwbmal_employee_service = array();
    $today_date = date('Y-m-d');
    $rtwbmal_app_ids = array();
    
    $rtwbmal_service_arr = array();

    $dates_day = array();
    $dates = array();
    for( $i=6; $i>=0; $i-- )
    {
        $timestamp = strtotime( date('Y-m-d', strtotime(-$i.' day') ) );
        $day = date( 'M d', $timestamp );
        $dates_day[$day] =  array( 'paid' => 0, 'price' => 0 );
        $dates[] = $timestamp;
    }
    $pay_dates = $dates_day;
    
    $pay_day = array();
    $i = 0;
    foreach ($pay_dates as $pay => $day) {
        $pay_day[$i] = array( 'date'=> $pay,
        'paid' => $day['paid'],
        'price' => $day['price'] );
        $i++;
    }

    $rtwbmal_total_services = count( $rtwbmal_all_services );

    $rtwbmal_dates = array();
    $dates_day = array();
    $dates = array();
    for( $i=0; $i<=6; $i++ )
    {
        $timestamp = strtotime( date('Y-m-d', strtotime(+$i.' day') ) );
        $day = date( 'M d', $timestamp );
        $dates_day[$i] = $day;
        $dates[] = $timestamp;
    }
    $apps_array = array();
    foreach ($dates as $date => $da) {
        $apps_array[$date] = isset( $rtwbmal_dates[$da] ) ? $rtwbmal_dates[$da] : 0;
    }

    $cust_old = 0;
    $new_cust = 0;
    
    $rtwbmal_pay_array = array();
    $total_amount = 0;
    $total_amount_paid = 0;
	
?><h3><?php esc_html_e( 'Dashboard', 'rtwbmal-book-my-appointment' ); ?></h3>

<div class="rtwbmal_page_contents">
    <span class="rtwbmal_pro_text"><?php esc_html_e('This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
	<a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a></span>
    <div class="rtwbmal_report_wrapper">
        <div class="rtwbmal_bar_chart_wrapper">
            <div class="rtwbmal_bar_chart rtwbmal_bar_full_chart">
                <h2><?php esc_html_e('Approved Appointments', 'rtwbmal-book-my-appointment') ?></h2>
                <canvas data-apps="<?php echo esc_attr(json_encode( $apps_array )); ?>" data-dates="<?php echo esc_attr( json_encode( $dates_day ) ); ?>" id="rtwbmal_this_week_apps"></canvas>
            </div>
            <div class="rtwbmal_bar_chart rtwbmal_bar_full_chart">
                <h2><?php esc_html_e('Customers', 'rtwbmal-book-my-appointment') ?></h2>
                <canvas data-new="<?php echo esc_attr($new_cust); ?>" data-old="<?php echo esc_attr($cust_old); ?>" id="rtwbmal_custmoers_chart"></canvas>
            </div>
            <div class="rtwbmal_bar_chart rtwbmal_bar_full_chart">
                <h2><?php esc_html_e('Revenue', 'rtwbmal-book-my-appointment') ?></h2>
                <canvas data-sevdays="<?php echo esc_attr(json_encode($pay_day)); ?>" data-earned="<?php echo esc_attr($total_amount_paid); ?>" id="rtwbmal_total_revenue"></canvas>
            </div>
        </div>
    </div>
    <div class="rtwbmal_dashboard">
        <div class="rtwbmal_dashboard_column">
            <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Appointments ', 'rtwbmal-book-my-appointment' ); ?>
                    <div class="rtwbmal_dashboard_tooltip_wrapper">
                        <i class="fas fa-question"></i>
                        <div class="rtwbmal_dashboard_tooltip">
                        <?php esc_html_e( 'Indicates the number of total appointments.', 'rtwbmal-book-my-appointment' ); ?>
                        </div>
                    </div>
                </div>
                <span class="rtwbmal_dashboard_value">0</span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
          <div class="rtwbmal_dashboard_inner_content">
            <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Today\'s Total Appointments  ', 'rtwbmal-book-my-appointment' ); ?>
            <div class="rtwbmal_dashboard_tooltip_wrapper">
                <i class="fas fa-question"></i>
                    <div class="rtwbmal_dashboard_tooltip">
                    <?php esc_html_e('Indicates the number of today\'s appointments.', 'rtwbmal-book-my-appointment' ); ?>
                    </div>
                </div>
            </div>
            <span class="rtwbmal_dashboard_value"><?php esc_html_e($rtwbmal_todays_appointment, 'rtwbmal-book-my-appointment') ; ?></span> 
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
            <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Services  ', 'rtwbmal-book-my-appointment' ); ?>
                </div>
                <span class="rtwbmal_dashboard_value"><?php esc_html_e($rtwbmal_total_services, 'rtwbmal-book-my-appointment') ; ?></span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
             <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Employees  ', 'rtwbmal-book-my-appointment' ); ?></div> <span class="rtwbmal_dashboard_value">0</span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
             <div class="rtwbmal_dashboard_inner_content">
                 <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Customers  ', 'rtwbmal-book-my-appointment' ); ?></div> <span class="rtwbmal_dashboard_value">0</span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
             <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Approved Appointments  ', 'rtwbmal-book-my-appointment' ); ?></div> <span class="rtwbmal_dashboard_value"><?php esc_html_e(  $rtwbmal_total_approved, 'rtwbmal-book-my-appointment') ; ?></span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
             <div class="rtwbmal_dashboard_inner_content">
                 <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Pending Appointments  ', 'rtwbmal-book-my-appointment' ); ?></div> <span class="rtwbmal_dashboard_value"><?php esc_html_e( $rtwbam_total_pending, 'rtwbmal-book-my-appointment') ; ?></span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
             <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Cancelled Appointments  ', 'rtwbmal-book-my-appointment' ); ?></div><span class="rtwbmal_dashboard_value"><?php esc_html_e( $rtwbmal_total_cancelled, 'rtwbmal-book-my-appointment') ; ?></span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
             <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Rejected Appointments  ', 'rtwbmal-book-my-appointment' ); ?></div><span class="rtwbmal_dashboard_value"><?php esc_html_e( $rtwbmal_total_rejected, 'rtwbmal-book-my-appointment') ; ?></span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
            <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Amount  ', 'rtwbmal-book-my-appointment' ); ?></div><span class="rtwbmal_dashboard_value"><?php esc_html_e( $total_amount, 'rtwbmal-book-my-appointment' ); ?></span>
            </div>
        </div>
        <div class="rtwbmal_dashboard_column">
            <div class="rtwbmal_dashboard_inner_content">
                <div class="rtwbmal_dashboard_title"><?php esc_html_e( 'Total Received Amount  ', 'rtwbmal-book-my-appointment' ); ?></div><span class="rtwbmal_dashboard_value"><?php esc_html_e( $total_amount_paid, 'rtwbmal-book-my-appointment' ); ?></span> 
            </div>
        </div>
    </div>
</div>
<div class="rtwbmal_page_content">
    <div class="rtwbmal_dashboard_table_wrapper">
            
        <div class="rtwbmal_dashboard_tabs">
            <ul>
                <li><a href="javascript:void(0);" data-tabs="employee" class="active"><?php esc_html_e( 'Employee', 'rtwbmal-book-my-appointment' ); ?></a></li>
                <li><a href="javascript:void(0);" data-tabs="service"><?php esc_html_e( 'Service', 'rtwbmal-book-my-appointment' ); ?></a></li>
            </ul>
        </div>
        <div  data-tabs="employee" class="rtwbmal_dashboard_tabs-content show">
            <table>
                <thead>
                    <tr>
                        <th><?php esc_html_e( 'Employee', 'rtwbmal-book-my-appointment' ); ?></th>
                        <th><?php esc_html_e( '# of appointments', 'rtwbmal-book-my-appointment' ); ?></th>
                        <th><?php esc_html_e( '# of Hours in appointment', 'rtwbmal-book-my-appointment' ); ?></th>
                        <th><?php esc_html_e( '# of appointments done', 'rtwbmal-book-my-appointment' ); ?></th>
                        <th><?php esc_html_e( '% of load', 'rtwbmal-book-my-appointment' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div data-tabs="service" class="rtwbmal_dashboard_tabs-content">
            <table>
                <thead>
                    <tr>
                        <th><?php esc_html_e( 'Service', 'rtwbmal-book-my-appointment' ); ?></th>
                        <th><?php esc_html_e( '# of bookings', 'rtwbmal-book-my-appointment' ); ?></th>
                        <th><?php esc_html_e( 'Duration (Hours)', 'rtwbmal-book-my-appointment' ); ?></th>
                        <th><?php esc_html_e( '# of appointments done', 'rtwbmal-book-my-appointment' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
