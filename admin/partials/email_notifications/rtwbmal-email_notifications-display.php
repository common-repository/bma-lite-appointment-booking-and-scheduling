<?php
global $wpdb;
$rtwbma_all_notification = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_email_notifications ORDER BY `id` ASC", ARRAY_A );
	$rtwbmal_shortcodes = array(
		'appointment_date'               => esc_html__( 'date of appointment', 'rtwbmal-book-my-appointment' ),
		'appointment_end_date'           => esc_html__( 'end date of appointment', 'rtwbmal-book-my-appointment' ),
		'appointment_end_time'           => esc_html__( 'end time of appointment', 'rtwbmal-book-my-appointment' ),
		'appointment_notes'              => esc_html__( 'customer notes for appointment', 'rtwbmal-book-my-appointment' ),
		'appointment_time'               => esc_html__( 'time of appointment', 'rtwbmal-book-my-appointment' ),
		'booking_number'                 => esc_html__( 'booking number', 'rtwbmal-book-my-appointment' ),
		'appointment_notes'              => esc_html__( 'customer notes for appointment', 'rtwbmal-book-my-appointment' ),
		'category_name'                  => esc_html__( 'name of category', 'rtwbmal-book-my-appointment' ),
		'company_address'                => esc_html__( 'address of company', 'rtwbmal-book-my-appointment' ),
		'company_name'                   => esc_html__( 'name of company', 'rtwbmal-book-my-appointment' ),
		'company_phone'                  => esc_html__( 'company phone', 'rtwbmal-book-my-appointment' ),
		'company_website'                => esc_html__( 'company web-site address', 'rtwbmal-book-my-appointment' ),
		'client_address'                 => esc_html__( 'address of client', 'rtwbmal-book-my-appointment' ),
		'client_email'                   => esc_html__( 'email of client', 'rtwbmal-book-my-appointment' ),
		'client_first_name'              => esc_html__( 'first name of client', 'rtwbmal-book-my-appointment' ),
		'client_last_name'               => esc_html__( 'last name of client', 'rtwbmal-book-my-appointment' ),
		'client_name'                    => esc_html__( 'full name of client', 'rtwbmal-book-my-appointment' ),
		'client_phone'                   => esc_html__( 'phone of client', 'rtwbmal-book-my-appointment' ),
		'client_timezone'                => esc_html__( 'time zone of client', 'rtwbmal-book-my-appointment' ),
		'cancel_appointment_url'         => esc_html__( 'URL of cancel appointment link (to use inside <a> tag)', 'rtwbmal-book-my-appointment' ),
		'cancellation_reason'            => esc_html__( 'reason you mentioned while deleting appointment', 'rtwbmal-book-my-appointment' ),
		// 'google_calendar_url'            => esc_html__( 'URL for adding event to client\'s Google Calendar (to use inside <a> tag)', 'rtwbmal-book-my-appointment' ),
		'payment_type'                   => esc_html__( 'payment type', 'rtwbmal-book-my-appointment' ),
		'payment_status'                 => esc_html__( 'payment status', 'rtwbmal-book-my-appointment' ),
		'total_price'                    => esc_html__( 'total price of booking (sum of all cart items after applying coupon)' ),
		'service_duration'               => esc_html__( 'duration of service', 'rtwbmal-book-my-appointment' ),
		'service_info'                   => esc_html__( 'info of service', 'rtwbmal-book-my-appointment' ),
		'service_name'                   => esc_html__( 'name of service', 'rtwbmal-book-my-appointment' ),
		'service_price'                  => esc_html__( 'price of service', 'rtwbmal-book-my-appointment' ),
		'staff_email'                    => esc_html__( 'email of staff', 'rtwbmal-book-my-appointment' ),
		'staff_info'                     => esc_html__( 'info of staff', 'rtwbmal-book-my-appointment' ),
		'staff_name'                     => esc_html__( 'name of staff', 'rtwbmal-book-my-appointment' ),
		'staff_phone'                    => esc_html__( 'phone of staff', 'rtwbmal-book-my-appointment' ),
		'agenda_date'                    => esc_html__( 'agenda date', 'rtwbmal-book-my-appointment' ),
		'next_day_agenda'                => esc_html__( 'staff agenda for next day', 'rtwbmal-book-my-appointment' ),
		'tomorrow_date'                  => esc_html__( 'date of next day', 'rtwbmal-book-my-appointment' ),
		'new_password'                   => esc_html__( 'customer new password', 'rtwbmal-book-my-appointment' ),
		'new_username'                   => esc_html__( 'customer new username', 'rtwbmal-book-my-appointment' ),
		'site_address'                   => esc_html__( 'site address', 'rtwbmal-book-my-appointment' ),
    );

	$rtwbmal_app_status_type = array( 
									0 => esc_html__( 'Pending', 'rtwbmal-book-my-appointment' ),
									1 => esc_html__( 'Approved', 'rtwbmal-book-my-appointment' ),
									2 => esc_html__( 'Cancelled', 'rtwbmal-book-my-appointment' ),
									3 => esc_html__( 'Rejected', 'rtwbmal-book-my-appointment' ),
									4 => esc_html__( 'Rescheduled', 'rtwbmal-book-my-appointment' ),
									5 => esc_html__( 'Any', 'rtwbmal-book-my-appointment' )
								);

?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<?php esc_html_e( 'Notifications', 'rtwbmal-book-my-appointment' ); ?>
		</h3>
		<div class="rtwbmal_add_new rtwbmal_add_new_notification">
			<a class="rtwbmal_button rtwbmal_add_new_button" rel="modal:open" href="#rtwbmal_popup">
				<span class="rtwbmal_plus">
					<i class="fas fa-plus"></i>
				</span>
				<span class="rtwbmal_text"><?php esc_html_e( 'Add New Notification', 'rtwbmal-book-my-appointment' ); ?></span>
			</a>
		</div>
	</div>

	<div class="rtwbmal_page_content">
		<span class="rtwbmal_pro_text"><?php esc_html_e('This feature works in our Pro version','rtwbmal-book-my-appointment'); ?>
        <a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a></span>
		<div class="rtwbmal_noti">
			<!-- header start -->
			<div class="rtwbmal_noti_header">
				<div class="rtwbmal_noti_header_in">
					<span class="rtwbmal_notification_subject"><?php esc_html_e( 'Name', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_notification_mail"><?php esc_html_e( 'Status', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_notification_phone"><?php esc_html_e( 'Edit', 'rtwbmal-book-my-appointment' ); ?></span>
				</div>
			</div>
			<!-- header end -->

			<!-- body start -->
			<ul class="rtwbmal_noti_list">
				<?php 

					$status = array( 1 => esc_html__( 'Enabled', 'rtwbmal-book-my-appointment' ),
					0 => esc_html__( 'Disabled', 'rtwbmal-book-my-appointment'  ));
					if( is_array( $rtwbma_all_notification ) && !empty($rtwbma_all_notification ))
					{
					foreach( $rtwbma_all_notification as $rtwbma_key => $rtwbma_value ){
						?><li class="rtwbmal_single_noti">
							<div class="rtwbmal_noti_name_add_noti">
								<div class="rtwbmal_noti_name">
									<?php echo esc_html( $rtwbma_value[ 'setting_name' ] );
								?></div>
								<div class="rtwbmal_noti_mail">
									<?php echo esc_html( isset($status[$rtwbma_value[ 'status' ]]) ? $status[$rtwbma_value[ 'status' ]] : '' ); ?></div>
								<div class="rtwbmal_noti_edit_del">
									<ul data-rtwbmal_email_id="<?php echo esc_attr($rtwbma_value[ 'id' ]); ?>">
										<li class="rtwbmal_email_edit"><a href="#rtwbmal_popup"  rel="modal:open"><i class="far fa-edit"></i></a></li>
										<li class="rtwbmal_email_delete"><a href="#"><i class="far fa-trash-alt"></i></a></li>
									</ul>
								</div>
							</div>
						</li>
				<?php
					}
				}
					
				?></ul>
			<!-- body end -->
		</div>
	</div>

	<!-- popup start -->
	<div id="rtwbmal_popup" class="modal">
		<input type="hidden" name="rtwbmal_save_or_edit" class="rtwbmal_save_or_edit" value="save">
		<div class="rtwbmal_popup_bg">
			<div class="rtwbmal_popup_main">
				<div class="rtwbmal_popup_header">
					<div class="rtwbmal_header_title"><?php esc_html_e( 'Add New Notification', 'rtwbmal-book-my-appointment' ); ?></div>
				</div>
				<div class="rtwbmal_popup_body">
					<div class="rtwbmal_popup_content">
						<form id="rtwbmal_email_form">
							<div class="rtwbmal_input rtwbmal_email_settings">
								<div class="rtwbmal_input">
									<div class="rtwbmal_add">
										<label>
											<span>
												<?php echo esc_html__( 'Notification Name', 'rtwbmal-book-my-appointment' ).'*'; ?>
											</span>
										</label>
										<input type="text" class="rtwbmal_title_input rtwbmal_appoint_name" placeholder="<?php esc_html_e( 'Enter Notification Name', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_title_name" />
									</div>
								</div>
								<div class="rtwbmal_input">
									<div class="rtwbmal_type">
										<label>
											<span>
												<?php echo esc_html__( 'Appointment Status', 'rtwbmal-book-my-appointment' ); echo '*'; 
											?></span>
										</label>
										<select class="rtwbmal_type_select rtwbmal_select rtwbmal_appointment_status" name="rtwbmal_appointment_status">
											<?php 
											if( is_array( $rtwbmal_app_status_type ) && !empty($rtwbmal_app_status_type ))
											{
												foreach ($rtwbmal_app_status_type as $types => $type) {
													echo '<option value="'.esc_attr($types).'">'.esc_html($type).'</option>';
												}
											}
											?></select>
									</div>
								</div>
								<div class="rtwbmal_title">
									<label>
										<span>
											<?php echo esc_html__( 'Subject', 'rtwbmal-book-my-appointment' ).'*'; ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_title_input rtwbmal_subject" placeholder="<?php esc_html_e( 'Enter Notification Subject', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_title_subject" />
								</div>
								<div class="rtwbmal_message">
									<label>
										<span>
											<?php echo esc_html__( 'Message', 'rtwbmal-book-my-appointment' ); echo '*'; ?>
										</span>
									</label>
						            <?php
									$rtwbmal_content = '';
									$rtwbmal_setting = array(
										'wpautop' => true,
										'media_buttons' => false,
										'textarea_name' => 'rtwbmal_notify_email[mail]',
										'textarea_rows' => 7
									);
									?><div class="rtwbmal_wp_wditor">
										<?php
										wp_editor(  stripcslashes( $rtwbmal_content ), 'rtwbmal_notification_option', $rtwbmal_setting );
									?><div>
								</div>
								<div class="rtwbmal_input">
									<div class="rtwbmal_status">
										<label>
											<span>
												<?php echo esc_html__( 'Recipients', 'rtwbmal-book-my-appointment' ); echo '*'; ?>
											</span>
										</label>
										<select class="rtwbmal_select rtwbmal_receipients" multiple="multiple">
											<option value="0"><?php esc_html_e( 'Adminstrator', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="1"><?php esc_html_e( 'Staff', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="2"><?php esc_html_e( 'Client', 'rtwbmal-book-my-appointment' ); ?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="rtwbmal_settings">
								<div class="rtwbmal_input">
									<div class="rtwbmal_status">
										<label>
											<span>
												<?php echo esc_html__( 'Status', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>

										<select class="rtwbmal_select rtwbmal_statuss">
											<option value="1"><?php esc_html_e( 'Enabled', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="0"><?php esc_html_e( 'Disabled', 'rtwbmal-book-my-appointment'  ); ?></option>
										</select>
									</div>
								</div>
								<b class="rtwbmal_codes"><?php esc_html_e( 'Codes', 'rtwbmal-book-my-appointment' ); ?></b>
								<div class="rtwbmal_mail_codes">
									<table class="rtwbmal_shortcode_table">
										<tbody>
											<?php
											if( is_array( $rtwbmal_app_status_type ) && !empty($rtwbmal_app_status_type ))
											{
												foreach( $rtwbmal_shortcodes as $rtwbmal_code_key => $rtwbmal_code_val )
												{
												?><tr>
													<td>
														<input readonly="readonly" class="rtwbmal_selected" value="{<?php echo esc_html( $rtwbmal_code_key ); ?>}"></td>
													<td><?php echo esc_html( $rtwbmal_code_val); ?></td>
												</tr>
											<?php
												}
											}
											?><tr>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="rtwbmal_popup_footer">
					<div class="rtwbmal_popup_action">
						<a href="javascript:void(0);" class="rtwbmal_save"><?php esc_html_e( 'Save', 'rtwbmal-book-my-appointment' ); ?></a>
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