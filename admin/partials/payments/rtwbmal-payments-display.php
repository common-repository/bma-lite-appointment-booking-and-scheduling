<?php
	global $wpdb;
	$rtwbmal_payments_count 	= $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."rtwbma_payments" );
	
	//payment_select_query
	$rtwbmal_select_payment = $wpdb->prefix."rtwbma_payments.id as 'pay_id', ".$wpdb->prefix."rtwbma_payments.type as 'pay_type', ".$wpdb->prefix."rtwbma_payments.price as 'pay_price', ".$wpdb->prefix."rtwbma_payments.paid as 'pay_paid', ".$wpdb->prefix."rtwbma_payments.created_date as 'pay_date', ".$wpdb->prefix."rtwbma_payments.status as 'pay_status', ".$wpdb->prefix."rtwbma_payments.coupon_id";

	//customer_select_query
	$rtwbmal_select_customer = $wpdb->prefix."rtwbma_customers.first_name as 'cust_first_name', ".$wpdb->prefix."rtwbma_customers.last_name as 'cust_last_name'";

	//employee_select_query
	$rtwbmal_select_employee = $wpdb->prefix."rtwbma_employees.first_name as 'emp_first_name', ".$wpdb->prefix."rtwbma_employees.last_name as 'emp_last_name'";

	//service_select_query
	$rtwbmal_select_service = $wpdb->prefix."rtwbma_services.title as 'service_title'";

	//ending_select_query
	$rtwbmal_select_end = "FROM ".$wpdb->prefix."rtwbma_payments JOIN ".$wpdb->prefix."rtwbma_customer_appointments ON ".$wpdb->prefix."rtwbma_payments.id = ".$wpdb->prefix."rtwbma_customer_appointments.payment_id JOIN ".$wpdb->prefix."rtwbma_customers ON ".$wpdb->prefix."rtwbma_customer_appointments.cust_id = ".$wpdb->prefix."rtwbma_customers.id JOIN ".$wpdb->prefix."rtwbma_appointments ON ".$wpdb->prefix."rtwbma_customer_appointments.appointment_id = ".$wpdb->prefix."rtwbma_appointments.id JOIN ".$wpdb->prefix."rtwbma_services ON ".$wpdb->prefix."rtwbma_appointments.service_id = ".$wpdb->prefix."rtwbma_services.id JOIN ".$wpdb->prefix."rtwbma_employees ON ".$wpdb->prefix."rtwbma_appointments.emp_id = ".$wpdb->prefix."rtwbma_employees.id ORDER BY `created_date` ASC LIMIT %d";

	$rtwbmal_select = "SELECT ".$rtwbmal_select_payment.', '.$rtwbmal_select_customer.', '.$rtwbmal_select_employee.', '.$rtwbmal_select_service.' '.$rtwbmal_select_end;

	$rtwbmal_all_payments = $wpdb->get_results( $wpdb->prepare( $rtwbmal_select, 10 ), ARRAY_A );

	
?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<?php esc_html_e( 'Payments', 'rtwbmal-book-my-appointment' ); ?>
			<span class="rtwbmal_count"><?php echo esc_html( $rtwbmal_payments_count ); ?></span>
		</h3>
	</div>

	<div class="rtwbmal_page_content">
		<div class="rtwbmal_payments">
			<!-- header start -->
			<div class="rtwbmal_payments_header">
				<div class="rtwbmal_payments_header_in">
					<span class="rtwbmal_payment_cust"><?php esc_html_e( 'Customer', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_payment_emp"><?php esc_html_e( 'Employee', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_payment_service"><?php esc_html_e( 'Service', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_payment_price"><?php esc_html_e( 'Price', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_payment_paid"><?php esc_html_e( 'Paid', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_payment_appoint_date"><?php esc_html_e( 'Payment Date', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_payment_status"><?php esc_html_e( 'Status', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_payment_type"><?php esc_html_e( 'Payment Type', 'rtwbmal-book-my-appointment' ); ?></span>
				</div>
			</div>
			<!-- header end -->

			<!-- body start -->
			<ul class="rtwbmal_payments_list">
				<?php 
				if( isset($rtwbmal_all_payments) && is_array($rtwbmal_all_payments) && !empty($rtwbmal_all_payments) )
				{
					foreach( $rtwbmal_all_payments as $rtwbmal_key => $rtwbmal_value ){
						?><li class="rtwbmal_single_payment" data-rtwbmal_pay_id="<?php echo esc_attr( $rtwbmal_value[ 'pay_id' ] ); ?>">
							<div class="rtwbmal_payment">
								<div class="rtwbmal_pay_cust">
									<?php echo esc_html( $rtwbmal_value[ 'cust_first_name' ].' '.$rtwbmal_value[ 'cust_last_name' ] ); ?>
								</div>
								<div class="rtwbmal_pay_emp">
									<?php echo esc_html( $rtwbmal_value[ 'emp_first_name' ].' '.$rtwbmal_value[ 'emp_last_name' ] ); ?>
								</div>
								<div class="rtwbmal_pay_service">
									<?php echo esc_html( $rtwbmal_value[ 'service_title' ] );
								?></div>
								<div class="rtwbmal_pay_price">
									<?php echo esc_html( $rtwbmal_value[ 'pay_price' ] ); ?>
								</div>
								<div class="rtwbmal_pay_paid">
									<?php
										if( $rtwbmal_value[ 'pay_paid' ] != 0 ){
											echo esc_html( $rtwbmal_value[ 'pay_paid' ] );
										}
										else{
											echo esc_html( 0 );
										}
								?></div>
								<div class="rtwbmal_pay_appoint_date">
									<?php echo esc_html( $rtwbmal_value[ 'pay_date' ] ); ?>
								</div>
								<div class="rtwbmal_pay_status">
									<?php
										if( $rtwbmal_value[ 'pay_status' ] == 0 ){
											echo '<span class="rtwbmal_appoint_status-tab "><i class="fas fa-circle-notch"></i>';
											esc_html_e( 'Pending', 'rtwbmal-book-my-appointment' );
											echo '</span>';	
										}
										elseif( $rtwbmal_value[ 'pay_status' ] == 1 ){
											echo '<span class="rtwbmal_appoint_status-tab"> <i class="fas fa-circle-notch"></i>';
											esc_html_e( 'Partial', 'rtwbmal-book-my-appointment' );
											echo '</span>';
												
										}
										elseif( $rtwbmal_value[ 'pay_status' ] == 2 ){
											echo '<span class="rtwbmal_appoint_status-tab"><i class="fas fa-circle"></i>';
											esc_html_e( 'Full', 'rtwbmal-book-my-appointment' );
											echo '</span>';	
										}
								?></div>
								<div class="rtwbmal_pay_type">
									<?php
										if( $rtwbmal_value[ 'pay_type' ] == 0 ){
											esc_html_e( 'Local', 'rtwbmal-book-my-appointment' );	
										}
										elseif( $rtwbmal_value[ 'pay_type' ] == 1 ){
											esc_html_e( 'PayPal', 'rtwbmal-book-my-appointment' );	
										}
										elseif( $rtwbmal_value[ 'pay_type' ] == 2 ){
											esc_html_e( 'Stripe', 'rtwbmal-book-my-appointment' );	
										}
								?></div>
							</div>
						</li>
						<?php				
					} 
				}
			?></ul>
			<!-- body end -->
		</div>
	</div>
</div>