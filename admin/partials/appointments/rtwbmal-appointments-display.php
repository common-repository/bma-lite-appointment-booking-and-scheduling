<?php
	global $wpdb;
	$rtwbmal_general_setting = get_option( 'rtwbma_general_settings', array() );

	$rtwbmal_app_per_page = 10 ;
	if( isset($rtwbmal_general_setting['rtwbma_app_per_page']) && !empty($rtwbmal_general_setting['rtwbma_app_per_page']) )
	{
		$rtwbmal_app_per_page =$rtwbmal_general_setting['rtwbma_app_per_page'];
	}

	//appointment_select_query
	$rtwbmal_select_appointment = $wpdb->prefix."rtwbma_customer_appointments.appointment_id as 'id', ".$wpdb->prefix."rtwbma_customer_appointments.date_created as 'date_created', ".$wpdb->prefix."rtwbma_customer_appointments.status as 'status', ".$wpdb->prefix."rtwbma_customer_appointments.price as 'price'";
	
	//customer_select_query
	$rtwbmal_select_customer = $wpdb->prefix."rtwbma_customers.first_name as 'cust_first_name', ".$wpdb->prefix."rtwbma_customers.last_name as 'cust_last_name', ".$wpdb->prefix."rtwbma_customers.email as 'cust_email', ".$wpdb->prefix."rtwbma_customers.phone as 'cust_phone'";

	//employee_select_query
	$rtwbmal_select_employee = $wpdb->prefix."rtwbma_employees.first_name as 'emp_first_name', ".$wpdb->prefix."rtwbma_employees.last_name as 'emp_last_name'";
	
	//service_select_query
	$rtwbmal_select_service = $wpdb->prefix."rtwbma_services.title as 'service_title', ".$wpdb->prefix."rtwbma_services.duration as 'duration'";
	
	$rtwbmal_select_app = $wpdb->prefix."rtwbma_appointments.start_date as 'start_date', ".$wpdb->prefix."rtwbma_appointments.end_date as 'end_date', " .$wpdb->prefix."rtwbma_appointments.start_time as 'start_time', " .$wpdb->prefix."rtwbma_appointments.end_time as 'end_time' ";

	$rtwbmal_strt_date = date( "y-m-d", strtotime( date( "y-m-d", strtotime( date("y-m-d") ) ) . "-1 month" ) );
	
	//ending_select_query
	$rtwbmal_select_end = "FROM ".$wpdb->prefix."rtwbma_appointments JOIN ".$wpdb->prefix."rtwbma_customer_appointments ON ".$wpdb->prefix."rtwbma_appointments.id = ".$wpdb->prefix."rtwbma_customer_appointments.appointment_id JOIN ".$wpdb->prefix."rtwbma_customers ON ".$wpdb->prefix."rtwbma_customer_appointments.cust_id = ".$wpdb->prefix."rtwbma_customers.id JOIN ".$wpdb->prefix."rtwbma_services ON ".$wpdb->prefix."rtwbma_appointments.service_id = ".$wpdb->prefix."rtwbma_services.id JOIN ".$wpdb->prefix."rtwbma_employees ON ".$wpdb->prefix."rtwbma_appointments.emp_id = ".$wpdb->prefix."rtwbma_employees.id WHERE `start_date` >= '$rtwbmal_strt_date' ORDER BY `start_date` ASC LIMIT %d";

	$rtwbmal_select = "SELECT ".$rtwbmal_select_appointment.', '.$rtwbmal_select_app.', '.$rtwbmal_select_customer.', '.$rtwbmal_select_employee.', '.$rtwbmal_select_service.' '.$rtwbmal_select_end;
	
	////////// $rtwbmal_app_per_page
	$rtwbmal_all_appointments = $wpdb->get_results( $wpdb->prepare( $rtwbmal_select, 1000 ), ARRAY_A );

	
	$rtwbmal_all_services = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_services ORDER BY `title` ASC", ARRAY_A );
	
	$rtwbmal_all_emp	= $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees ORDER BY `first_name` ASC", ARRAY_A );
	
	$rtwbmal_all_cust = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_customers ORDER BY `first_name` ASC", ARRAY_A );

	$rtwbmal_total_apps = count( $rtwbmal_all_appointments );
	$no_of_pages = ceil( $rtwbmal_total_apps / $rtwbmal_app_per_page );
	$rtwbmal_holidays_opt = get_option('rtwbmal_holidays_option', array());
	$rtwbmal_holidays = '';
	if(isset($rtwbmal_holidays_opt['rtwbmal_select_save_holidays']))
	{
		$rtwbmal_holidays = json_encode( $rtwbmal_holidays_opt['rtwbmal_select_save_holidays'] );
	}
?>
<div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<input type="hidden" class="rtwbmal_holidays" value="<?php echo esc_attr($rtwbmal_holidays); ?>">
			<?php esc_html_e( 'Appointments', 'rtwbmal-book-my-appointment' ); ?>
		</h3>
		<div class="rtwbmal_add_new rtwbmal_add_new_appointment">
			<a class="rtwbmal_button rtwbmal_add_new_button" rel="modal:open" href="#rtwbmal_popup">
				<span class="rtwbmal_plus">
					<i class="fas fa-plus"></i>
				</span>
				<span class="rtwbmal_text"><?php esc_html_e( 'Add New Appointment', 'rtwbmal-book-my-appointment' ); ?></span>
			</a>
		</div>
	</div>
	
	<div class="rtwbmal_page_content">
		<div class="rtwbmal_filter_fields_wrap">
			<div class="rtwbmal_filter_fields_search"><?php esc_html_e('Search:','rtwbmal-book-my-appointment');?></div>
				<div class="rtwbmal_filter_fields"><input type="text" class="datepicker rtwbmal_from_date" name="rtwbmal_from_date" placeholder="ehsgh" value="<?php echo esc_attr( date("y-m-d")); ?>" size="30"/></div>
				<div class="rtwbmal_filter_fields"><input type="text" class="datepicker rtwbmal_to_date" name="rtwbmal_to_date" value="<?php echo esc_attr(date('y-m-d', strtotime("+30 days"))); ?>" size="30"/></div>
				<div class="rtwbmal_filter_fields">
					<select class="rtwbmal_select rtwbmal_status_filter rtwbmal_select_filter">
						<option value="5"><?php esc_html_e('All Status', 'rtwbmal-book-my-appointment'); ?></option>
						<option value="0"><?php esc_html_e('Pending', 'rtwbmal-book-my-appointment'); ?></option>
						<option value="1"><?php esc_html_e('Approved', 'rtwbmal-book-my-appointment'); ?></option>
						<option value="2"><?php esc_html_e('Cancelled', 'rtwbmal-book-my-appointment'); ?></option>
						<option value="3"><?php esc_html_e('Rescheduled', 'rtwbmal-book-my-appointment'); ?></option>
					</select>
				</div>
			
				<div class="rtwbmal_filter_fields">
					<select class="rtwbmal_select rtwbmal_service_filter rtwbmal_select_filter">
					<option value="0"><?php esc_html_e('All Services', 'rtwbmal-book-my-appointment'); ?></option>
					<?php 
					if( is_array($rtwbmal_all_services) && !empty($rtwbmal_all_services))
					{
						foreach( $rtwbmal_all_services as $services => $ser_id )
						{ 
							echo '<option value="'. esc_attr( $ser_id['id'] ).'">'. esc_html( $ser_id['title'] ).'</option>';
						} 
					} ?>
					</select>
				</div>
				<div class="rtwbmal_filter_fields">
					<select class="rtwbmal_select rtwbmal_emp_filter rtwbmal_select_filter">
					<option value="0"><?php esc_html_e('All Employees', 'rtwbmal-book-my-appointment'); ?></option>
					<?php 
					if( is_array($rtwbmal_all_emp) && !empty($rtwbmal_all_emp))
					{
						foreach($rtwbmal_all_emp as $employ => $emp_id )
						{ 
							echo '<option value="'. esc_attr( $emp_id['id'] ).'">'. esc_html( $emp_id['first_name'] ).' '. esc_html( $emp_id['last_name'] ) .'</option>';
						}
					} ?>
					</select>
				</div>
				<div class="rtwbmal_filter_fields">
					<select class="rtwbmal_select rtwbmal_cus_filter rtwbmal_select_filter">
					<option value="0"><?php esc_html_e('All customers', 'rtwbmal-book-my-appointment'); ?></option>
					<?php 
					if( is_array($rtwbmal_all_cust) && !empty($rtwbmal_all_cust))
					{
						foreach($rtwbmal_all_cust as $customer => $cus_id )
						{ 
							echo '<option value="'. esc_attr( $cus_id['id'] ).'">'.esc_html( $cus_id['first_name']).' '.esc_html( $cus_id['last_name'] ) .'</option>';
						} 
					} ?>
					</select>
				</div>
			<div class="rtwbmal_apply_filter">
				<input type="button" class="rtwbmal_apply rtwbmal_button" value="<?php esc_attr_e('Filters', 'rtwbmal-book-my-appointment'); ?>">
			</div>
		</div>

		<div class="rtwbmal_appointments">
			<!-- header start -->
			<div class="rtwbmal_appointments_header">
				<div class="rtwbmal_appointments_header_in">
					<span class="rtwbmal_appointment_date"><?php esc_html_e( 'Date', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_appointment_emp"><?php esc_html_e( 'Employee', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_appointment_serv"><?php esc_html_e( 'Service', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_appointment_cust_name"><?php esc_html_e( 'Customer Name', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_appointment_price"><?php esc_html_e( 'Price', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_appointment_status"><?php esc_html_e( 'Status', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_appointment_duration"><?php esc_html_e( 'Duration', 'rtwbmal-book-my-appointment' ); ?></span>
				</div>
			</div>
			<!-- header end -->

			<!-- body start -->
			<ul class="rtwbmal_appointments_list">
				<?php 
					$rtwbmal_date = array();
					if( is_array($rtwbmal_all_appointments) && !empty($rtwbmal_all_appointments))
					{
						foreach( $rtwbmal_all_appointments as $rtwbmal_key => $rtwbmal_value ){
						?><li class="rtwbmal_single_appointment">
							<?php
							if( !in_array( $rtwbmal_value['start_date'], $rtwbmal_date ) )
							{
								$rtwbmal_date[] = $rtwbmal_value['start_date'];
							?>
							<div class="rtwbmal_appoint_day_separator">
								<div class="rtwbmal_appoint_date_holder">
									<?php echo esc_html( date("jS F Y", strtotime( $rtwbmal_value[ 'start_date' ] ))); ?>
								</div>
							</div>
							<?php } ?>
							<div class="rtwbmal_appoint_name_add_emp">
								<div class="rtwbmal_appoint_date">
									<i class="far fa-clock"></i>  <?php echo esc_html( date("h:i:s A", strtotime( $rtwbmal_value[ 'start_time' ] ))); ?>
								</div>
								<div class="rtwbmal_appoint_emp">
									<?php echo esc_html( $rtwbmal_value[ 'emp_first_name' ] ).' '. esc_html( $rtwbmal_value[ 'emp_last_name' ] ); ?>
								</div>
								<div class="rtwbmal_appoint_service">
									<?php echo esc_html( $rtwbmal_value[ 'service_title' ] ); ?>
								</div>
								<div class="rtwbmal_appoint_cust_name">
									<?php echo esc_html( $rtwbmal_value[ 'cust_first_name' ] ).' '.esc_html( $rtwbmal_value[ 'cust_last_name' ] ); ?>
								</div>
								<div class="rtwbmal_appoint_price">
									<?php echo esc_html( $rtwbmal_value[ 'price' ] ); ?>
								</div>
								<div class="rtwbmal_appoint_status">
									<?php 
									if( $rtwbmal_value['status'] == 0 )
									{
										echo '<span class="rtwbmal_appoint_status-tab pending"><i class="fas fa-circle-notch"></i> ';
										esc_html_e('Pending', 'rtwbmal-book-my-appointment');
										echo '</span>';
									}
									elseif( $rtwbmal_value['status'] == 1 )
									{	
										echo '<span class="rtwbmal_appoint_status-tab"><i class="far fa-check-circle"></i> ';
										esc_html_e('Approved', 'rtwbmal-book-my-appointment');
										echo '</span>';
									}
									elseif( $rtwbmal_value['status'] == 2 )
									{
										echo '<span class="rtwbmal_appoint_status-tab cancelled"><i class="far fa-times-circle"></i> ';
										esc_html_e('Cancelled', 'rtwbmal-book-my-appointment');
										echo '</span>';
									}
									elseif( $rtwbmal_value['status'] == 3 )
									{
										echo '<span class="rtwbmal_appoint_status-tab rejected"><i class="fa fa-trash"></i> ';
										esc_html_e('Rejected', 'rtwbmal-book-my-appointment');
										echo '</span>';
									}
									 ?>
								</div>
								<div class="rtwbmal_appoint_duration">
									<?php echo esc_html( $rtwbmal_value[ 'duration' ] );
									esc_html_e('min', 'rtwbmal-book-my-appointment');
									 ?>
								</div>
								<div class="rtwbmal_appoint_edit_del">
									<ul data-rtwbmal_app_id="<?php echo esc_attr($rtwbmal_value[ 'id' ]); ?>">
										<li><a class="rtwbmal_edit_apntmnt" rel="modal:open" href="#rtwbmal_popup"><i class="far fa-edit"></i></a></li>
										<li><a class="rtwbmal_app_delete" href="javascript:;"><i class="far fa-trash-alt"></i></a></li>
									</ul>
								</div>
							</div>
						</li>
				<?php				
					} 
				}
				?>
			</ul>
			<div class="rtwbmal_next_prev">
				<input type="hidden" class="rtwbmal_current_page" value="4">
				<input type="hidden" class="rtwbmal_max_page" value="5">
				<?php 
				for( $i=1; $i <= $no_of_pages; $i++ )
				{
					if( ($i - 1) != 0 )
					{
						echo "<button data-offset='".esc_attr( ( $i - 1 ) )."' class='rtwbmal_next_app active'>". esc_html( $i )." </button>";
					}
				}
				?></div>
			<!-- body end -->
		</div>
	</div>

	<!-- popup start -->
	<div id="rtwbmal_popup" class="modal">
		<input type="hidden" class="rtwbmal_save_or_edit" value="save" name="">
		<div class="rtwbmal_appoint_popup_bg">
			<div class="rtwbmal_appoint_popup_main">
				<div class="rtwbmal_popup_header">
					<div class="rtwbmal_appoint_header_title"><?php esc_html_e( 'Add New Appointment', 'rtwbmal-book-my-appointment' ); ?></div>
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
										if( !empty( $rtwbmal_all_services ) ){
											foreach( $rtwbmal_all_services as $rtwbmal_service_key => $rtwbmal_service_value )
											{
												$rtwbmal_duration = $rtwbmal_service_value[ 'duration' ];
												$rtwbmal_hour = floor( $rtwbmal_duration / 60 );
												$rtwbmal_min = ( $rtwbmal_duration - floor( $rtwbmal_duration / 60 ) * 60 );
												
												?><option value="<?php echo esc_attr( $rtwbmal_service_value[ 'id' ] ); ?>">
													<?php 
														echo esc_html( $rtwbmal_service_value[ 'title' ] ).' ( ';
														if( $rtwbmal_hour != 0 ){
															echo esc_html__( $rtwbmal_hour. 'hr', 'rtwbmal-book-my-appointment' );
														}
														if( $rtwbmal_min != 0 ){
															echo ' '.esc_html__( $rtwbmal_min.'min', 'rtwbmal-book-my-appointment' );
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
									<?php 
									if(is_array($rtwbmal_all_emp) && !empty($rtwbmal_all_emp))
									{
										foreach( $rtwbmal_all_emp as $emp_id => $id )
										{
											echo '<option value="'. esc_attr( $id['id'] ).'">'.esc_html( $id['first_name'] ).'</option>';
										}
									}
									?></select>
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
										if( !empty( $rtwbmal_all_cust ) ){
											foreach( $rtwbmal_all_cust as $rtwbmal_cust_key => $rtwbmal_cust_value )
											{
												?><option value="<?php echo esc_attr( $rtwbmal_cust_value[ 'id' ] ) ?>"><?php echo esc_html( $rtwbmal_cust_value[ 'first_name' ] ).' '.esc_html( $rtwbmal_cust_value[ 'last_name' ]); ?></option>
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
									<input type="text" class="datepickers rtwbmal_strt_date" name="datepickers" value="" size="30"/>
								</div>
							</div>
							<div class="rtwbmal_appoint_input">
								<div class="rtwbmal_appoint_end_date">
									<label>
										<span>
											<?php echo esc_html__( 'End Date', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<input type="text" class="datepickers rtwbmal_end_date" name="datepickers" value="" size="30"/>
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
										<option value="4">
											<?php esc_html_e( "Reschedule", 'rtwbmal-book-my-appointment' ); ?>
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
	<!-- popup end -->
</div>
