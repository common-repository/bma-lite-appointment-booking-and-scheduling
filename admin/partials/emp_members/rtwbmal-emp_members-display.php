<?php
global $wpdb;
$rtwbmal_emp_count 		= $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."rtwbma_employees" );
$rtwbmal_all_employees 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees ORDER BY `display_order` ASC LIMIT %d", 100 ), ARRAY_A );
$rtwbmal_all_locations 	= $wpdb->get_results( $wpdb->prepare( "SELECT id, loc_name FROM ".$wpdb->prefix."rtwbma_locations ORDER BY `loc_name` ASC LIMIT %d", 100 ), ARRAY_A );
$rtwbmal_all_services 	= $wpdb->get_results( $wpdb->prepare( "SELECT id, title FROM ".$wpdb->prefix."rtwbma_services ORDER BY `display_order` ASC LIMIT %d", 100 ), ARRAY_A );

$rtwbmal_emp_hours = Rtwbmal_Book_My_Appointment_Admin::rtwbmal_emp_wrkng_hours();

$rtwbmal_end_hours = $rtwbmal_emp_hours;

unset( $rtwbmal_end_hours['00:00'] );

$rtwbmal_emp_break_hours = array_merge( array( '0'=> '' ), $rtwbmal_emp_hours);

$rtwbmal_days_array = array( 
	'1' => esc_html__( 'Monday', 'rtwbmal-book-my-appointment' ),
	'2' => esc_html__( 'Tuesday', 'rtwbmal-book-my-appointment' ),
	'3' => esc_html__( 'Wednesday', 'rtwbmal-book-my-appointment' ),
	'4' => esc_html__( 'Thursday', 'rtwbmal-book-my-appointment' ),
	'5' => esc_html__( 'Friday', 'rtwbmal-book-my-appointment' ),
	'6' => esc_html__( 'Saturday', 'rtwbmal-book-my-appointment' ),
	'7' => esc_html__( 'Sunday', 'rtwbmal-book-my-appointment' ) );

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
?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<?php esc_html_e( 'Employees', 'rtwbmal-book-my-appointment' ); ?>
			<span class="rtwbmal_count"><?php echo esc_html( $rtwbmal_emp_count ); ?></span>
		</h3>
		<div class="rtwbmal_add_new rtwbmal_add_new_emp">
			<a class="rtwbmal_button rtwbmal_add_new_button" rel="modal:open" href="#rtwbmal_emp_popup">
				<span class="rtwbmal_plus">
					<i class="fas fa-plus"></i>
				</span>
				<span class="rtwbmal_text"><?php esc_html_e( 'Add New Employee', 'rtwbmal-book-my-appointment' ); ?></span>
			</a>
		</div>
	</div>
	<div class="rtwbmal_page_content">
		<div class="rtwbmal_emp">
			<!-- header start -->
			<div class="rtwbmal_emp_header">
				<div class="rtwbmal_emp_header_in">
					<span class="rtwbmal_employee_name"><?php esc_html_e( 'Name', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_employee_mail"><?php esc_html_e( 'Email', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_employee_phone"><?php esc_html_e( 'Phone', 'rtwbmal-book-my-appointment' ); ?></span>
				</div>
			</div>
			<!-- header end -->
			<!-- body start -->
			<ul class="rtwbmal_emp_list">
				<?php 
				if( isset($rtwbmal_all_employees) && is_array($rtwbmal_all_employees) && !empty($rtwbmal_all_employees) )
				{
					foreach( $rtwbmal_all_employees as $rtwbmal_key => $rtwbmal_value ){
						?><li class="rtwbmal_single_emp">
							<div class="rtwbmal_emp_img">
								<img src="<?php echo esc_url( wp_get_attachment_url( $rtwbmal_value[ 'attachment_id' ] ) ); ?>" alt="emp_img" />
							</div>
							<div class="rtwbmal_emp_name_add_emp">
								<div class="rtwbmal_emp_name">
									<?php echo esc_html( $rtwbmal_value[ 'first_name' ].' '.$rtwbmal_value[ 'last_name' ] ); ?>
								</div>
								<div class="rtwbmal_emp_mail">
									<?php echo esc_html( $rtwbmal_value[ 'email' ] ); ?>
								</div>
								<div class="rtwbmal_emp_phone">
									<?php echo esc_html( $rtwbmal_value[ 'phone' ] ); ?>
								</div>
								<div class="rtwbmal_emp_edit_del">
									<ul data-rtwbmal_emp_id="<?php echo esc_attr( $rtwbmal_value[ 'id' ] ); ?>">
										<li><a rel="modal:open" href="#rtwbmal_emp_popup" class="rtwbmal_emp_edit"><i class="far fa-edit"></i></a></li>
										<li><a href="javascript:void(0);" class="rtwbmal_delete"><i class="far fa-trash-alt"></i></a></li>
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
	<div id="rtwbmal_emp_popup" class="modal">
		<input type="hidden" id="rtwbmal_add_edit_emp" value="save" name="">
		<div class="rtwbmal_emp_popup_bg">
			<div class="rtwbmal_emp_popup_main">
				<div class="rtwbmal_popup_header">
					<div class="rtwbmal_emp_header_title"><?php esc_html_e( 'Add New Employee', 'rtwbmal-book-my-appointment' ); ?>
				</div>
			</div>
			<div class="rtwbmal_subtabs">
				<ul class="rtwbmal_subtabs_menu">
					<li id="rtwbmal_emp_detail" class="active">
						<span><?php esc_html_e( 'Details', 'rtwbmal-book-my-appointment' ); ?></span>
					</li>
					<li id="rtwbmal_emp_service">
						<span><?php esc_html_e( 'Services', 'rtwbmal-book-my-appointment' ); ?></span>
					</li>
					<li id="rtwbmal_emp_working_hour">
						<span><?php esc_html_e( 'Working Hours', 'rtwbmal-book-my-appointment' ); ?></span>
					</li>
				</ul>
			</div>
			<div class="rtwbmal_popup_body">
				<form id="rtwbmal_emp_form">
					<div class="rtwwdpd_emp_details">
						<label><?php esc_html_e( 'Add Image', 'rtwbmal-book-my-appointment' ); ?></label>
						<div class="rtwbmal_popup_upload_image_wrapper">
							<div class="rtwbmal_popup_upload_image_inner_wrapper">
								<div class="rtwbmal_popup_upload_icon">
									<div class="rtwbmal_popup_upload_img">
										<input type="hidden" id="rtwbmal_emp_imgs" name="service_img">
										<img id="rtwbmal_emp_img" src="" alt="Employee">
									</div>
								</div>
								<div class="rtwbmal_popup_upload_remove">
									<a class="rtwbmal_button rtwbmal_button_remove"  href="#">
										<span class="rtwbmal_plus">
											<i class="far fa-trash-alt"></i>
										</span>
										<span class="rtwbmal_text"><?php esc_html_e( 'Remove', 'rtwbmal-book-my-appointment' ); ?></span>
									</a>
								</div>
								<div class="rtwbmal_loc_popup_upload_change">
									<a class="rtwbmal_button rtwbmal_button_change"  href="#">
										<span class="rtwbmal_plus">
											<i class="far fa-edit"></i>
										</span>
										<span class="rtwbmal_text"><?php esc_html_e( 'Change', 'rtwbmal-book-my-appointment' ); ?></span>
									</a>
								</div>
							</div>
						</div>
						<div class="rtwbmal_popup_content">
							<form id="rtwbmal_employee_error">
								<div class="rtwbmal_emp_input">
									<div class="rtwbmal_wp_user">
										<label>
											<span>
												<?php echo esc_html__( 'Select User', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>
										<?php 
										$users = get_users( array( 'fields' => array( 'ID' ) ) );
										 
										?><select id="rtwbmal_wp_user" class="rtwbmal_select" name="rtwbmal_wp_user">
										<option value="0" ><?php echo esc_html__( 'Select User', 'rtwbmal-book-my-appointment' ); ?></option>
										<?php 
										if( is_array($users) && !empty($users) )
										{
											foreach($users as $user_id){
												echo "<option value='".esc_attr( $user_id->ID )."'>". esc_html( get_user_meta( $user_id->ID )['nickname'][0] )."</option>";
											}
										}
										?></select>
									</div>
								</div>
								<div class="rtwbmal_emp_input">
									<div class="rtwbmal_emp_title">
										<label>
											<span>
												<?php echo esc_html__( 'Name', 'rtwbmal-book-my-appointment' ).'*'; ?>
											</span>
										</label>
										<div class="rtwbmal_emp_first_name_wrap">
										<input type="text" value="" class="rtwbmal_emp_first_name" placeholder="<?php esc_html_e( 'First', 'rtwbmal-book-my-appointment' ); ?>"
										 name="rtwbmal_emp_first_name" />
										 </div>
										 <div class="rtwbmal_emp_first_name_wrap">
										<input type="text" value="" class="rtwbmal_emp_last_name" placeholder="<?php esc_html_e( 'Last', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_emp_last_name" />
										</div>
									</div>
								</div>
								<div class="rtwbmal_emp_input">
									<div class="rtwbmal_service_price">
										<label>
											<span>
												<?php echo esc_html__( 'Email', 'rtwbmal-book-my-appointment' ).'*'; ?>
											</span>
										</label>
										<input type="text" name="rtwbmal_emp_email_input" class="rtwbmal_emp_email_input" placeholder="<?php esc_html_e( 'Enter Email', 'rtwbmal-book-my-appointment' ); ?>"/>
									</div>
								</div>
								<div class="rtwbmal_emp_input">
									<div class="rtwbmal_emp_phone">
										<label>
											<span>
												<?php echo esc_html__( 'Phone', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>
										<input type="tel" class="rtwbmal_emp_phone_no" name="rtwbmal_emp_phone_no"/>
									</div>
								</div>
								<div class="rtwbmal_emp_input">
									<div class="rtwbmal_emp_visiblity">
										<label>
											<span>
												<?php echo esc_html__( 'Visible to Public', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>
										<span class="rtwbmal_custom_checkbox">
											<input type="checkbox" value="1" class="rtwbmal_emp_visible" name="rtwbmal_emp_visible"/>
										</span>
									</div>
								</div>
								<div class="rtwbmal_emp_input">
									<div class="rtwbmal_emp_add">
										<label>
											<span>
												<?php echo esc_html__( 'Address', 'rtwbmal-book-my-appointment' ).''; ?>
											</span>
										</label>
										<textarea class="rtwbmal_emp_address_input" placeholder="<?php esc_html_e( 'Enter Address', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_emp_address_input"></textarea>
									</div>
								</div>
								<div class="rtwbmal_emp_input">
									<div class="rtwbmal_emp_desc">
										<label>
											<span>
												<?php echo esc_html__( 'Other Information', 'rtwbmal-book-my-appointment' ); ?>
											</span>
										</label>
										<textarea class="rtwbmal_emp_description" placeholder="<?php esc_html_e( 'Information', 'rtwbmal-book-my-appointment' ); ?>" name=""></textarea>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="rtwbmal_emp_services">
						<div class="rtwbmal_emp_input">
							<div class="rtwbmal_emp_loc">
								<label>
									<span>
										<?php echo esc_html__( 'Select Location', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_emp_location" multiple="multiple" data-placeholder="<?php esc_html_e( 'Locations', 'rtwbmal-book-my-appointment' ); ?>" name="">
									<?php 
									if( is_array( $rtwbmal_all_locations) && !empty( $rtwbmal_all_locations))
									{
										foreach ( $rtwbmal_all_locations as $locations => $loc ) {
											?><option value="<?php echo esc_attr( $loc['id'] ); ?>"><?php echo esc_html( $loc[ 'loc_name' ] ); ?></option>
											<?php
										}
									}
									?></select>
							</div>
						</div>
						<div class="rtwbmal_emp_input">
							<div class="rtwbmal_emp_serv">
								<ul>
									<li>
										<?php echo esc_html__( 'Select Services', 'rtwbmal-book-my-appointment' ); ?>
									</li>
									<li>
										<?php echo esc_html__( 'Enter Price ($)', 'rtwbmal-book-my-appointment' ); ?>
									</li>
									<li>
										<?php echo esc_html__( 'Capacity', 'rtwbmal-book-my-appointment' ); ?>
									</li>
								</ul>
								<div class="rtwbmal_show_services">
									<?php 
									if( is_array( $rtwbmal_all_services) && !empty( $rtwbmal_all_services))
									{
										foreach ( $rtwbmal_all_services as $services => $id)
										{
											?><div class="rtwbmal_emp_sevices">
												<div class="rtwbmal_emp_sevices_wrap">
													<span class="rtwbmal_custom_checkbox"> <input class="rtwbmal_selected_service rtwbmal_service_<?php echo esc_attr($id['id']); ?> rtwbmal_checkbox" type="checkbox" value="<?php echo esc_attr($id['id']); ?>"></span><?php echo esc_html( $id[ 'title' ] ); ?>
												</div>
												<div class="rtwbmal_price_min_max">
													<input class="rtwbmal_selected_price rtwbmal_ser_pri_<?php echo esc_attr($id['id']); ?>" placeholder="Price" type="number" min="0" value="" name="<?php echo esc_attr('rtwbmal_price_'. $id['id'] ); ?>" >
												</div>
												<div class="rtwbmal_ser_capacity">
													<input class="rtwbmal_min_cap  rtwbmal_mincap_<?php echo esc_attr($id['id']); ?>" min="1" placeholder="Min" value="" type="number" value="" name="<?php echo esc_attr('rtwbmal_min_'. $id['id'] ); ?>">
													<input class="rtwbmal_max_cap  rtwbmal_maxcap_<?php echo esc_attr($id['id']); ?>" min="1" placeholder="Max" value="" type="number" value="" name="<?php echo esc_attr('rtwbmal_max_'. $id['id'] ); ?>">
												</div>
											</div>
											<?php
										}
									}
									?></div>
							</div>
						</div>
					</div>
					<div class="rtwbmal_emp_wrkng_hour">
						<ul>
							<?php 
							if( isset($rtwbmal_days_array) && is_array($rtwbmal_days_array) && !empty($rtwbmal_days_array) )
							{
								$cou = 0;
								foreach ( $rtwbmal_days_array as $days => $day ) { ?>
									<li>
										<div class="rtwbmal_emp_wrkng_hour_col rtwbmal_emp_wrkng_hour_col_first">
											<div class="rtwbmal_emp_wrkng_hour_content">
												<div class="rtwbmal_emp_days">
													<span class="rtwbmal_custom_checkbox">
														<input id="<?php echo esc_attr('chk'.$days); ?>" class="rtwbmal_custom_checkboxes" checked="checked" type="checkbox">
													</span>
													<span class="rtwbmal_emp_days_name">
														<?php esc_html_e( $day, 'rtwbmal-book-my-appointment' ); ?>
													</span>
												</div>
												
												<?php 
												$cou++;
												?>
												<div class="rtwbmal_emp_hours">
													<select class="rtwbmal_strt_day" data-hour_id="<?php echo esc_attr($days); ?>" name="" id="<?php echo esc_attr('strtday'.$days); ?>">
														<?php 
														foreach ( $rtwbmal_emp_hours as $emp => $hour ){ ?>
															<option value="<?php echo esc_attr( $emp ); ?>">
																<?php esc_html_e( $hour, 'rtwbmal-book-my-appointment' ); ?>
															</option>
															<?php 
														}
														?></select>
													<select class="rtwbmal_end_day" name="" id="<?php echo esc_attr( 'endday'.$days ); ?>">
														<?php 
														foreach ( $rtwbmal_end_hours as $emp => $hour ) { ?>
															<option value="<?php echo esc_attr($emp); ?>">
																<?php esc_html_e( $hour, 'rtwbmal-book-my-appointment' ); ?>
															</option>
														<?php }
														?></select>
												</div>
											</div>
										</div>
										<div class="rtwbmal_emp_wrkng_hour_col hideee">
											<div class="rtwbmal_emp_wrkng_hour_content">
												<div class="rtwbmal_emp_days">
													<span class="rtwbmal_emp_days_name">
														<?php esc_html_e( 'Breaks', 'rtwbmal-book-my-appointment' ); ?>
													</span>
												</div>
												<div class="rtwbmal_emp_breaks">
													<div class="rtwbmal_emp_breaks_list" id="<?php echo esc_attr( 'rtwbmal'.$day ); ?>">
														<input type="hidden" class="<?php echo esc_attr( 'rtwchk'. $day ); ?>" value="0" name="">
														<select data-edit_id="<?php echo esc_attr( $days ) ?>" class="<?php echo esc_attr( $day ).'start' ?> rtwbmal_brk_str" name="" id="">
															<?php 
															foreach ( $rtwbmal_emp_break_hours as $emp => $hour ) { ?>
																<option value="<?php echo esc_attr( $emp ); ?>">
																	<?php esc_html_e( $hour, 'rtwbmal-book-my-appointment' ); ?>
																</option>
															<?php }
														?></select>
														<select class="<?php echo esc_attr( $day ).'end' ?> rtwbmal_brk_end" name="" id="">
															<?php 
															foreach ( $rtwbmal_emp_break_hours as $emp => $hour ) 
																{ ?>
																<option value="<?php echo esc_attr( $emp ); ?>">
																	<?php esc_html_e( $hour, 'rtwbmal-book-my-appointment' ); ?>
																</option>
															<?php }
														?></select>
														<a href="javascript:void(0);" id="<?php echo esc_attr( 'rtwbmal_'.$day); ?>" class="rtwbmal_emp_breaks_close">
															<span><?php esc_html_e( 'X', 'rtwbmal-book-my-appointment' ); ?></span>
														</a>
													</div>
													<div class="rtwbmal_emp_breaks_add">
														<a class="addbreak">
															<span><?php esc_html_e( '+', 'rtwbmal-book-my-appointment' ); ?></span>
															<?php esc_html_e( 'Add New', 'rtwbmal-book-my-appointment' );
														?></a>
													</div>
												</div>
											</div>
										</div>
										<div class="rtwbmal_emp_apply">
											<i class="fa fa-check"></i>
											<span class="rtwbmal_apply_all"><?php esc_html_e( 'Apply to all', 'rtwbmal-book-my-appointment' ); ?></span>
										</div>
									</li>
									<?php	
								}
							}
						?></ul>
					</div>
				</form>
			</div>
			<div class="rtwbmal_popup_footer">
				<div class="rtwbmal_popup_action">
					<a href="javascript:void(0);" class="rtwbmal_save_employee"><?php esc_html_e( 'Save', 'rtwbmal-book-my-appointment' ); ?></a>
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