<?php 
global $wpdb;
	$rtwbmal_all_services = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_services ORDER BY `title` ASC", ARRAY_A );
	
	$rtwbmal_all_emp	= $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees ORDER BY `first_name` ASC", ARRAY_A );
	
	$rtwbmal_all_cust = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_customers ORDER BY `first_name` ASC", ARRAY_A );

	$rtwbmal_appointment_count = count($wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_appointments ORDER BY `id` ASC", ARRAY_A ));


?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3><?php esc_html_e( 'Calender', 'rtwbmal-book-my-appointment' ); ?></h3>
		<input type="hidden" class="rtwbma_number_appointments" value="<?php echo esc_attr($rtwbmal_appointment_count); ?>">
	</div>

	<div class="rtwbmal_page_content">
		<div class="rtwbmal_calendar">
			<div class="rtwbmal_calendar_content">
				<div class="rtwbmal_calendar_wrap">
					<div id='script-warning'>
					    <!-- <code>php/get-events.php</code> must be running. -->
					</div>

					<div id='loading'></div>
					
					<div id="rtwbmal_calendar"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="rtwbmal_hidden">
	<a rel="modal:open" href="#rtwbmal_popup" class="rtwbmal_open_pop"><?php esc_html_e( 'Appointment', 'rtwbmal-book-my-appointment' );?></a>
</div>
<div id="rtwbmal_popup" class="modal">
	<input type="hidden" class="rtwbmal_save_or_edit" value="save" name=""/>
	<div class="rtwbmal_appoint_popup_bg">
		<div class="rtwbmal_appoint_popup_main">
			<div class="rtwbmal_popup_header">
				<div class="rtwbmal_appoint_header_title"><?php esc_html_e( 'Edit Appointment', 'rtwbmal-book-my-appointment' ); ?></div>
			</div>
			<div class="rtwbmal_popup_body">
				<div class="rtwbmal_popup_content">
					<form id="rtwbmal_appointment_error">
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_services">
								<label>
									<span>
										<?php echo esc_html__( 'Select Service', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_select_ser" name="rtwbmal_select_ser">
									<option value="select"> <?php echo esc_html__( 'Select Service', 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<?php
									if( is_array($rtwbmal_all_services) && !empty( $rtwbmal_all_services ) ){
										foreach( $rtwbmal_all_services as $rtwbmal_service_key => $rtwbmal_service_value )
										{
											$rtwbmal_duration = $rtwbmal_service_value[ 'duration' ];
											$rtwbmal_hour = floor( $rtwbmal_duration / 60 );
											$rtwbmal_min = ( $rtwbmal_duration - floor( $rtwbmal_duration / 60 ) * 60 );
											
											?><option value="<?php echo esc_attr( $rtwbmal_service_value[ 'id' ]); ?>">
												<?php 
													echo esc_html( $rtwbmal_service_value[ 'title' ] ).' ( ';
													if( $rtwbmal_hour != 0 ){
														echo esc_html__( $rtwbmal_hour . 'hr', 'rtwbmal-book-my-appointment' );
													}
													if( $rtwbmal_min != 0 ){
														echo ' '.esc_html__( $rtwbmal_min. 'min', 'rtwbmal-book-my-appointment' );
													}
													echo ' )';
										?></option>
									<?php
										}
									}
								?></select>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_employees">
								<label>
									<span>
										<?php echo esc_html__( 'Select Employee', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_select_emp" name="rtwbmal_select_emp">
									<option></option>
								</select>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_customers">
								<label>
									<span>
										<?php echo esc_html__( 'Select Customer', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_select_cus" name="">
								<?php
								if( is_array($rtwbmal_all_cust) && !empty( $rtwbmal_all_cust ) ){
									foreach( $rtwbmal_all_cust as $rtwbmal_cust_key => $rtwbmal_cust_value )
									{
										?><option value="<?php echo esc_attr( $rtwbmal_cust_value[ 'id' ] ); ?>"><?php echo esc_html( $rtwbmal_cust_value[ 'first_name' ] .' '.$rtwbmal_cust_value[ 'last_name' ] ); ?></option>
									<?php
									}
								}
								?></select>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_strt_date">
								<label>
									<span>
										<?php echo esc_html__( 'Start Date', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<input type="text" class="datepicker rtwbmal_strt_date" name="datepicker" value="" size="30"/>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_end_date">
								<label>
									<span>
										<?php echo esc_html__( 'End Date', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<input type="text" class="datepicker rtwbmal_end_date" name="datepicker" value="" size="30"/>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_time">
								<label>
									<span>
										<?php echo esc_html__( 'Start Time', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<input type="text" class="timepicker rtwbmal_strt_time" name="timepicker" value="" size="30"/>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_time">
								<label>
									<span>
										<?php echo esc_html__( 'End Time', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<input type="text" class="timepicker rtwbmal_end_time" name="timepicker" value="" size="30"/>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_people">
								<label>
									<span>
										<?php echo esc_html__( 'No of people', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<input type="number" class="rtwbmal_no_people" name="rtwbmal_no_people" value="" min="0"/>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_noti">
								<label>
									<span>
										<?php echo esc_html__( 'Appointment Status', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_app_status" name="">
									<option value="0">
										<?php esc_html_e( "Pending", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option value="1">
										<?php esc_html_e( "Approved", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option value="2">
										<?php esc_html_e( "Cancelled", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option value="3">
										<?php esc_html_e( "Rejected", 'rtwbmal-book-my-appointment' ); ?>
									</option>
								</select>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_noti">
								<label>
									<span>
										<?php echo esc_html__( 'Payment Method', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_pay_method" name="">
									<option value="0">
										<?php esc_html_e( "Locally", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option disabled="disabled" value="1">
										<?php esc_html_e( "PayPal", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option disabled="disabled" value="2">
										<?php esc_html_e( "Stripe", 'rtwbmal-book-my-appointment' ); ?>
									</option>
								</select>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_noti">
								<label>
									<span>
										<?php echo esc_html__( 'Payment Status', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_pay_status" name="">
									<option value="0">
										<?php esc_html_e( "Zero", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option value="1">
										<?php esc_html_e( "Partially Paid", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option value="2">
										<?php esc_html_e( "Fully Paid", 'rtwbmal-book-my-appointment' ); ?>
									</option>
								</select>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_people">
								<label>
									<span>
										<?php echo esc_html__( 'Paid Amount', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<input type="number" class="rtwbmal_paid_amt" name="rtwbmal_paid_amt" value="" min="0.00"/>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_noti">
								<label>
									<span>
										<?php echo esc_html__( 'Send Notification', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_notify" name="">
									<option value="0">
										<?php esc_html_e( "Don't Send Notification", 'rtwbmal-book-my-appointment' ); ?>
									</option>
									<option disabled="disabled" value="1">
										<?php esc_html_e( "Send Notification on Status Changed and New", 'rtwbmal-book-my-appointment' ); ?>
									</option>
								</select>
							</div>
						</div>
						<div class="rtwbmal_appoint_input">
							<div class="rtwbmal_appoint_note">
								<label>
									<span>
										<?php echo esc_html__( 'Add Note', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<textarea class="rtwbmal_note" rows="4" cols="50" placeholder="<?php esc_html_e( 'Add a Note', 'rtwbmal-book-my-appointment' ); ?>"></textarea>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="rtwbmal_popup_footer">
				<div class="rtwbmal_popup_action">
					<a class="rtwbmal_save"><?php esc_html_e( 'Save', 'rtwbmal-book-my-appointment' ); ?></a>
				</div>
				<div class="rtwbmal_popup_action">
					<a href="javascript:void(0);" rel="modal:close" class="rtwbmal_close"><?php esc_html_e( 'Close', 'rtwbmal-book-my-appointment' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>