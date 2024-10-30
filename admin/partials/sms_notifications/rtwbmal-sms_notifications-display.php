<?php
	$rtwbmal_all_codes = array( '0' => array( 'code' => '{appointment_cancelled}', 'details' => 'appointment is cancelled' ) );

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
?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3><?php esc_html_e('Sender\'s Details', 'rtwbmal-book-my-appointment'); ?></h3>
	</div>
	<div class="rtwbmal_gateway_content">
		<div class="rtwbmal_api_tabs">
			<span class="rtwbmal_twillio_api rtwbmalactive"><b><?php esc_html_e( 'Twillio', 'rtwbmal-book-my-appointment'); ?></b></span>

			<span class="rtwbmal_other_api"><b><?php esc_html_e( 'Other', 'rtwbmal-book-my-appointment'); ?></b></span>
		</div>
	</div>
	<div class="rtwbmal_twillio_setting">
		<div class="rtwbmal_page_content">
		<span class="rtwbmal_pro_text"><?php esc_html_e('This feature works in our Pro version','rtwbmal-book-my-appointment'); ?>
        <a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a></span>
			<div class="rtwbmal_noti">
				<p>
					<?php esc_html_e('SMS Notifications is a service for notifying your customers via text messages which are sent to mobile phones.', 'rtwbmal-book-my-appointment'); ?>
				</p>
				<p>
					<?php esc_html_e('It is necessary to register in ', 'rtwbmal-book-my-appointment'); ?><a href="https://www.twilio.com/docs/"><strong><?php echo esc_html('Twilio') ?></strong></a><?php esc_html_e(' for using this service.', 'rtwbmal-book-my-appointment'); ?>
				</p>
				<p>
					<?php esc_html_e('After registration you will need to configure notification messages and top up your balance in order to start sending SMS.', 'rtwbmal-book-my-appointment'); ?>
				</p>
				<p>
					<?php esc_html_e('You can ', 'rtwbmal-book-my-appointment'); ?><a href="https://www.twilio.com/try-twilio" target="_blank"><b><?php esc_html_e('Sign Up', 'rtwbmal-book-my-appointment'); ?></b></a>
					<?php esc_html_e('here.', 'rtwbmal-book-my-appointment'); ?>
				</p>
				<form id="rtwbmal_sms_sender">
					<div class="rtwbmal_detail_form">
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Use Twilio', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div">
								<input value="1" type="checkbox" class="rtwbmal_sms_method" name="rtwbmal_sms_method">
							</div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Twilio Account SID', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><input value="" type="text" class="rtwbmal_twi_acc_no" placeholder="ACXXXXXXXXXXXXXXXXXXXX" name="rtwbmal_twi_acc_no"></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Twilio Auth Token', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><input value="" type="password" class="rtwbmal_twi_auth_token" placeholder="" name="rtwbmal_twi_auth_token"></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Twilio Number', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><input value="" type="text" class="rtwbmal_twi_number" placeholder="+91234567890" name="rtwbmal_twi_number"></div>
						</div>
						<input type="button" class="save_twilio_detail rtwbmal_button" value="Save" name="save_twilio_detail">
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<div class="rtwbmal_other_sms_api_setting">
		<div class="rtwbmal_page_content">
				<span class="rtwbmal_pro_text"><?php esc_html_e('This feature works in our Pro version','rtwbmal-book-my-appointment'); ?>
				<a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a></span>
			<div>
				<table class="table">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Parameter', 'rtwbmal-book-my-appointment'); ?></th>
							<th><?php esc_html_e( 'Type', 'rtwbmal-book-my-appointment'); ?></th>
							<th><?php esc_html_e( 'Description', 'rtwbmal-book-my-appointment'); ?></th>
						</tr>
					</thead>
					<tbody><!-- ngRepeat: param in ctrl.template.query_params_attributes --><tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'route', 'rtwbmal-book-my-appointment'); ?><span class="required" ng-show="param.is_required">*</span></td>
						<td class="ng-binding"><?php esc_html_e( 'string', 'rtwbmal-book-my-appointment'); ?></td>
						<td class="ng-binding"><?php esc_html_e( 'If your operator supports multiple routes then give one route name. Eg: route=1 for promotional, route=4 for transactional SMS.', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
					<tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'sender', 'rtwbmal-book-my-appointment'); ?><span class="required" ng-show="param.is_required">*</span></td>
						<td class="ng-binding"><?php esc_html_e( 'string', 'rtwbmal-book-my-appointment'); ?></td><td class="ng-binding"><?php esc_html_e( 'Receiver will see this as sender\'s ID', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
					<tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'message', 'rtwbmal-book-my-appointment'); ?><span class="required" ng-show="param.is_required">*</span></td>
						<td class="ng-binding"><?php esc_html_e( 'string', 'rtwbmal-book-my-appointment'); ?></td><td class="ng-binding"><?php esc_html_e( 'Message content to send', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
					<tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'country', 'rtwbmal-book-my-appointment'); ?><span class="required" ng-show="param.is_required">*</span></td>
						<td class="ng-binding"><?php esc_html_e( 'number', 'rtwbmal-book-my-appointment'); ?></td>
						<td class="ng-binding"><?php esc_html_e( '0 for international,1 for USA, 91 for India.', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
					<tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'flash', 'rtwbmal-book-my-appointment'); ?></td>
						<td class="ng-binding"></td><td class="ng-binding"><?php esc_html_e( 'For sending flash message pass 1 else 0', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
					<tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'unicode', 'rtwbmal-book-my-appointment'); ?></td>
						<td class="ng-binding"></td>
						<td class="ng-binding"><?php esc_html_e( 'For message other than english pass 1', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
					<tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'mobiles', 'rtwbmal-book-my-appointment'); ?><span class="required" ng-show="param.is_required">*</span></td>
						<td class="ng-binding"><?php esc_html_e( 'number', 'rtwbmal-book-my-appointment'); ?></td>
						<td class="ng-binding"><?php esc_html_e( 'Enter mobile number with country code, Don\'t include \'+\'', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
					<tr ng-repeat="param in ctrl.template.query_params_attributes" class="ng-scope">
						<td class="ng-binding"><?php esc_html_e( 'authkey', 'rtwbmal-book-my-appointment'); ?><span class="required" ng-show="param.is_required">*</span></td>
						<td class="ng-binding"><?php esc_html_e( 'string', 'rtwbmal-book-my-appointment'); ?></td>
						<td class="ng-binding"><?php esc_html_e( 'In MSG91 panel in API section you will get authkey', 'rtwbmal-book-my-appointment'); ?></td>
					</tr>
				</tbody>
				</table>
			</div>
			<div class="rtwbmal_noti">											
				<form id="rtwbmal_other_sms_sender">
					<div class="rtwbmal_detail_form">
					<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Use MSG91', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div">
								<input value="2" type="checkbox" class="rtwbmal_sms_method" name="rtwbmal_sms_method">
							</div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Method', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div rtwbmal_class_inline">
								<select name="rtwbmal_msg_nine_method" class="rtwbmal_msg_nine_method">
								<option value="get"><?php echo esc_html__('GET', 'rtwbmal-book-my-appointment'); ?></option>
								<option value="post"><?php echo esc_html__('POST', 'rtwbmal-book-my-appointment'); ?></option>
								</select>
								<input class="rtwbmal_msgnine_get" type="text" value="<?php echo esc_attr( 'https://api.msg91.com/api/sendhttp.php?authkey=[auth_key]&mobiles=[mobiles]&country=[country]&message=[message]&sender=[sender]&route=[route]' ) ?> "/>
								<input class="rtwbmal_msgnine_post" type="text" value="<?php echo esc_attr( 'https://api.msg91.com/api/v2/sendsms?country=[country]' ) ?>"?>
							</div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('GET Url : ', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><span>https://api.msg91.com/api/sendhttp.php?authkey=[auth_key]&mobiles=[mobiles]&country=[country]&message=[message]&sender=[sender]&route=[route]</span></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('POST Url : ', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><span>https://api.msg91.com/api/v2/sendsms?country=[country]</span></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Route', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><input value="" type="text" class="rtwbmal_msg_route" name="rtwbmal_msg_route"></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Sender', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><input value="" type="text" class="rtwbmal_msg_sender" placeholder="" name="rtwbmal_msg_sender"></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Country', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><input value="" type="text" class="rtwbmal_msg_country" placeholder="+91234667890" name="rtwbmal_msg_country"></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<label class="rtwbmal_sms_noti_input">
								<span><?php esc_html_e('Auth Key', 'rtwbmal-book-my-appointment'); ?></span>
							</label>
							<div class="rtwbmal_sms_noti_div"><input value="" type="text" class="rtwbmal_msg_auth_key" placeholder="+91234667890" name="rtwbmal_msg_auth_key"></div>
						</div>
						<div class="rtwbmal_sms_noti_input_wrap">
							<div class="rtwbmal_sms_noti_input">
								<p><?php esc_html_e('Use ', 'rtwbmal-book-my-appointment'); ?>[route], [message], [auth_key], [country], [mobiles], [sender] <?php esc_html_e('in the URL to replace values.', 'rtwbmal-book-my-appointment'); ?></p>
							</div>
						</div>
						<input type="button" class="save_other_sms_detail rtwbmal_button" value="Save" name="save_other_sms_detail">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="rtwbmal_page_title">
			<h3>
				<?php esc_html_e( 'SMS Notifications', 'rtwbmal-book-my-appointment' ); ?>
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
			<div class="rtwbmal_noti">
				<!-- header start -->
				<div class="rtwbmal_noti_header">
					<div class="rtwbmal_noti_header_in">
						<span class="rtwbmal_notification_subject"><?php esc_html_e( 'Subject', 'rtwbmal-book-my-appointment' ); ?></span>
						<span class="rtwbmal_notification_mail"><?php esc_html_e( 'Status', 'rtwbmal-book-my-appointment' ); ?></span>
						<span class="rtwbmal_notification_phone"><?php esc_html_e( 'Edit', 'rtwbmal-book-my-appointment' ); ?></span>
					</div>
				</div>
				<!-- header end -->

				<!-- body start -->
				<ul class="rtwbmal_noti_list">
				</ul>
				<!-- body end -->
			</div>
		</div>

		<!-- popup start -->
		<div id="rtwbmal_popup" class="modal">
			<input type="hidden" name="rtwbmal_save_or_edit" class="rtwbmal_save_or_edit" value="save">
			<div class="rtwbmal_sms_noti_popup_bg">
				<div class="rtwbmal_sms_noti_popup_main">
					<div class="rtwbmal_popup_header">
						<div class="rtwbmal_sms_noti_header_title"><?php esc_html_e( 'Add New Notification', 'rtwbmal-book-my-appointment' ); ?></div>
					</div>
					<div class="rtwbmal_popup_body">
						<div class="rtwbmal_popup_content">
							<form id="rtwbmal_sms_form">
								<div class="rtwbmal_sms_noti_input">
									<div class="rtwbmal_sms_noti_subject">
										<label>
											<span>
												<?php esc_html_e( 'Add Subject', 'rtwbmal-book-my-appointment' ); ?>*
											</span>
										</label>
										<input type="text" class="rtwbmal_sms_subject" name="rtwbmal_sms_subject" placeholder="<?php esc_html_e( 'Subject', 'rtwbmal-book-my-appointment' ); ?>" />
									</div>
								</div>
								<div class="rtwbmal_sms_noti_input">
									<div class="rtwbmal_sms_noti_message">
										<label>
											<span>
												<?php esc_html_e( 'Add Message', 'rtwbmal-book-my-appointment' );?>*
											</span>
										</label>
										<textarea class="rtwbmal_sms" name="rtwbmal_sms" rows="4" cols="50" placeholder="<?php esc_html_e( 'Add a Message', 'rtwbmal-book-my-appointment' ); ?>"></textarea>
									</div>
								</div>
								<div class="rtwbmal_sms_noti_input">
									<div class="rtwbmal_sms_noti_status">
										<label>
											<span>
												<?php esc_html_e( 'Status', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>
										<select class="rtwbmal_select rtwbmal_sms_status">
											<option value="1" ><?php esc_html_e( 'Enabled', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="0" ><?php esc_html_e( 'Disabled', 'rtwbmal-book-my-appointment' ); ?></option>
										</select>
									</div>
								</div>
								<div class="rtwbmal_sms_noti_input">
									<div class="rtwbmal_sms_noti_appoint_status">
										<label>
											<span>
												<?php esc_html_e( 'Appointment Status', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>
										<select class="rtwbmal_select rtwbmal_app_status" name="">
											
											<option value="0"><?php esc_html_e( 'Pending', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="1"><?php esc_html_e( 'Approved', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="3"><?php esc_html_e( 'Cancelled', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="2"><?php esc_html_e( 'Rejected', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="4"><?php esc_html_e( 'Rescheduled', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="5"><?php esc_html_e( 'Any', 'rtwbmal-book-my-appointment' ); ?></option>
										</select>
									</div>
								</div>
								<div class="rtwbmal_sms_noti_input">
									<div class="rtwbmal_sms_noti_receivers">
										<label>
											<span>
												<?php esc_html_e( 'Receivers', 'rtwbmal-book-my-appointment' ); ?>*
											</span>
										</label>
										<select class="rtwbmal_select rtwbmal_send_to" name="rtwbmal_send_to" multiple="multiple" data-placeholder="<?php esc_html_e( 'Select Receivers to get notifications', 'rtwbmal-book-my-appointment' ); ?>">
											<option value="1"><?php esc_html_e( 'Admin', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="2"><?php esc_html_e( 'Employee', 'rtwbmal-book-my-appointment' ); ?></option>
											<option value="3"><?php esc_html_e( 'Customer', 'rtwbmal-book-my-appointment' ); ?></option>
										</select>
									</div>
								</div>
								<div class="rtwbmal_sms_noti_input">
									<div class="rtwbmal_sms_noti_codes">
										<label>
											<span>
												<?php esc_html_e( 'Codes', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>
										<div class="rtwbmal_sms_codes">
											<table class="rtwbmal_sms_codess">
												<thead>
													<tr>
														<th><?php esc_html_e( 'Code', 'rtwbmal-book-my-appointment' ); ?></th>
														<th><?php esc_html_e( 'Detail', 'rtwbmal-book-my-appointment' ); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													if(is_array($rtwbmal_shortcodes) && !empty($rtwbmal_shortcodes))
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