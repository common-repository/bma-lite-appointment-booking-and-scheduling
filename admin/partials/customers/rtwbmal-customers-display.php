<?php
	global $wpdb;
	$rtwbmal_cust_count 		= $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."rtwbma_customers" );
	$rtwbmal_all_customers 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_customers LIMIT %d", 1000 ), ARRAY_A );

?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<?php esc_html_e( 'Customers', 'rtwbmal-book-my-appointment' ); ?>
			<span class="rtwbmal_count"><?php echo esc_html( $rtwbmal_cust_count ); ?></span>
		</h3>
		<div class="rtwbmal_add_new rtwbmal_add_new_customer">
			<a class="rtwbmal_button rtwbmal_add_new_button" rel="modal:open" href="#rtwbmal_cust_popup">
				<span class="rtwbmal_plus">
					<i class="fas fa-plus"></i>
				</span>
				<span class="rtwbmal_text"><?php esc_html_e( 'Add New Customer', 'rtwbmal-book-my-appointment' ); ?></span>
			</a>
		</div>
	</div>

	<div class="rtwbmal_page_content">
		<div class="rtwbmal_cust">
			<!-- header start -->
			<div class="rtwbmal_cust_header">
				<div class="rtwbmal_cust_header_in">
					<span class="rtwbmal_customer_name"><?php esc_html_e( 'Name', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_customer_mail"><?php esc_html_e( 'Email', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_customer_phone"><?php esc_html_e( 'Phone', 'rtwbmal-book-my-appointment' ); ?></span>
				</div>
			</div>
			<!-- header end -->

			<!-- body start -->
			<ul class="rtwbmal_cust_list">
				<?php 
				if( is_array($rtwbmal_all_customers) && !empty( $rtwbmal_all_customers ) ){
					foreach( $rtwbmal_all_customers as $rtwbmal_key => $rtwbmal_value ){
						
						?><li class="rtwbmal_single_cust">
							<div class="rtwbmal_cust_img">
								<?php 
								if( wp_get_attachment_url( $rtwbmal_value[ 'attachment_id' ] ) != '' )
								{
								?><img src="<?php echo esc_url( wp_get_attachment_url( $rtwbmal_value[ 'attachment_id' ] ) ); ?>" /> 
								<?php } else{ ?>
								<img src="<?php echo esc_url( RTWBMAL_URL.'assets/images/default-profile-picture.png'); ?>" />
							<?php	} ?>
							</div>
							<div class="rtwbmal_cust_name_add_cust">
								<div class="rtwbmal_cust_name">
									<?php echo esc_html( $rtwbmal_value[ 'first_name' ].' '.$rtwbmal_value[ 'last_name' ] ); ?>
								</div>
								<div class="rtwbmal_cust_mail">
									<?php echo esc_html( $rtwbmal_value[ 'email' ] ); ?>
								</div>
								<div class="rtwbmal_cust_phone">
									<?php echo esc_html( $rtwbmal_value[ 'phone' ] ); ?>
								</div>
								<div class="rtwbmal_cust_edit_del">
									<ul data-rtwbmal_cus_id="<?php echo esc_attr($rtwbmal_value[ 'id' ]); ?>">
										<li><a  rel="modal:open" href="#rtwbmal_cust_popup" class="rtwbmal_edit_cust"><i class="far fa-edit"></i></a></li>
										<li><a class="rtwbmal_delete_cust"><i class="far fa-trash-alt"></i></a></li>
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
	<div id="rtwbmal_cust_popup" class="modal">
		<input type="hidden" id="rtwbmal_save_or_edit" value="save" name="">
		<input type="date" hidden="hidden" class="rtwbmal_cus_regis_date" value="" name="regisdate">
		<div class="rtwbmal_cust_popup_bg">
			<div class="rtwbmal_cust_popup_main">
				<div class="rtwbmal_popup_header">
					<div class="rtwbmal_header_title">
						<?php esc_html_e( 'New Customer', 'rtwbmal-book-my-appointment' ); ?>
					</div>
				</div>
					<div class="rtwbmal_popup_body">
						<div class="rtwwdpd_cust_details">
						<label><?php esc_html_e( 'Add Image', 'rtwbmal-book-my-appointment' ); ?></label>
						<div class="rtwbmal_popup_upload_image_wrapper">
							<div class="rtwbmal_popup_upload_image_inner_wrapper">
								<div class="rtwbmal_popup_upload_icon">
									<div class="rtwbmal_popup_upload_img">
										<input type="hidden" id="rtwbmal_cust_imgs" value="118" name="service_img">
										<img id="rtwbmal_cust_img" src="" alt="Customer">
									</div>
								</div>
								<div class="rtwbmal_popup_upload_remove">
									<a class="rtwbmal_button rtwbmal_button_remove"  href="#">
										<span class="rtwbmal_plus">
											<i class="far fa-trash-alt"></i>
										</span>
										<span class="rtwbmal_text rtwbmal_rmove_img"><?php esc_html_e( 'Remove', 'rtwbmal-book-my-appointment' ); ?></span>
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
							<form id="rtwbmal_customer_error">
							<div class="rtwbmal_emp_input">
								<div class="rtwbmal_wp_user">
									<label>
										<span>
											<?php echo esc_html__( 'Select User', 'rtwbmal-book-my-appointment' ).'*'; ?>
										</span>
									</label>
									<?php 
									$users = get_users( array( 'fields' => array( 'ID' ) ) );	
									?><select id="rtwbmal_wp_user" class="rtwbmal_select" name="rtwbmal_wp_user">
									<?php 
									echo '<option value="0">'.esc_html__( 'Select User', 'rtwbmal-book-my-appointment' ).'</option>';
									if( is_array($users) && !empty($users))
									{
										foreach($users as $user_id){
											echo "<option value='".esc_attr( $user_id->ID )."'>". esc_html( get_user_meta( $user_id->ID)['nickname'][0] )."</option>";
										}
									}
									?></select>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_title rtwbmal_cust_name_title">
									<label>
										<span>
											<?php echo esc_html__( 'Name', 'rtwbmal-book-my-appointment' ).'*'; ?>
										</span>
									</label>
									<div class="rtwbmal_row">
										<div class="rtwbmal_column_6"><input type="text" value="" class="rtwbmal_cust_first_name" placeholder="<?php esc_html_e( 'First', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cust_first_name" /></div>
										<div class="rtwbmal_column_6"><input type="text" value="" class="rtwbmal_cust_last_name" placeholder="<?php esc_html_e( 'Last', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cust_last_name" /></div>
									</div>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_gen">
									<label>
										<span>
											<?php echo esc_html__( 'Gender', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<select class="rtwbmal_cust_gender rtwbmal_select ">
										<option value="1"><?php esc_html_e( 'Male', 'rtwbmal-book-my-appointment' ); ?></option>
										<option value="2"><?php esc_html_e( 'Female', 'rtwbmal-book-my-appointment' ); ?></option>
										<option value="3"><?php esc_html_e( 'Other', 'rtwbmal-book-my-appointment' ); ?></option>
									</select>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_service_price">
									<label>
										<span>
											<?php echo esc_html__( 'Email', 'rtwbmal-book-my-appointment' ).'*'; ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_cust_email" name="rtwbmal_cust_email" placeholder="<?php esc_html_e( 'Enter Email', 'rtwbmal-book-my-appointment' ); ?>"/>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_phone">
									<label>
										<span>
											<?php echo esc_html__( 'Phone', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<input type="tel" class="rtwbmal_cust_phone_no" name="rtwbmal_cust_phone_no"/>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_dobs">
									<label>
										<span>
											<?php echo esc_html__( 'DOB', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<input type="date" class="rtwbmal_cust_dob" name="rtwbmal_cust_dob"/>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_cntry">
									<label>
										<span>
											<?php echo esc_html__( 'Country', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_cust_country" name="rtwbmal_cust_country"/>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_stat">
									<label>
										<span>
											<?php echo esc_html__( 'State', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_cust_state" name="rtwbmal_cust_state"/>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_ct">
									<label>
										<span>
											<?php echo esc_html__( 'City', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_cust_city" name="rtwbmal_cust_city"/>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_add">
									<label>
										<span>
											<?php echo esc_html__( 'Address', 'rtwbmal-book-my-appointment' ).''; ?>
										</span>
									</label>
									<textarea class="rtwbmal_cust_address" placeholder="<?php esc_html_e( 'Enter Address', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cust_address_input"></textarea>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_pin">
									<label>
										<span>
											<?php echo esc_html__( 'Postal Code', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_cust_pincode" name="rtwbmal_cust_pincode"/>
								</div>
							</div>
							<div class="rtwbmal_cust_input">
								<div class="rtwbmal_cust_desc">
									<label>
										<span>
											<?php echo esc_html__( 'Other Information', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<textarea class="rtwbmal_cust_description" placeholder="<?php esc_html_e( 'Information', 'rtwbmal-book-my-appointment' ); ?>" name=""></textarea>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
				<div class="rtwbmal_cust_popup_footer">
					<div class="rtwbmal_popup_footer">
						<div class="rtwbmal_popup_action">
							<a href="javascript:void(0);" class="rtwbmal_save_customer"><?php esc_html_e( 'Save', 'rtwbmal-book-my-appointment' ); ?></a>
						</div>
						<div class="rtwbmal_popup_action">
							<a href="javascript:void(0);" rel="modal:close" class="rtwbmal_close"><?php esc_html_e( 'Close', 'rtwbmal-book-my-appointment' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- popup end -->
</div>