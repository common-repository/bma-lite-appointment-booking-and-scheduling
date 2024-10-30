<?php
	global $wpdb;
	$rtwbmal_all_services_count 	= $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."rtwbma_services" );

	$rtwbmal_all_categories_count = $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."rtwbma_categories" );

	$rtwbmal_all_services 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_services ORDER BY `display_order` ASC LIMIT %d", 10 ), ARRAY_A );

	$rtwbmal_all_categories 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_categories ORDER BY `display_order` ASC LIMIT %d", 10 ), ARRAY_A );

	$rtwbmal_all_emp 	= $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees ORDER BY `first_name` ASC", ARRAY_A );

	$rtwbmal_all_emp_count 	= sizeof( $rtwbmal_all_emp );

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
	<div class="rtwbmal_page_content">
		<div class="rtwbmal_categories">
			<!-- header start -->
			<div class="rtwbmal_add_new">
				<a class="rtwbmal_button rtwbmal_add_new_category" rel="modal:open" href="#rtwbmal_service_category_popup">
					<span class="rtwbmal_plus">
						<i class="fas fa-plus"></i>
					</span>
					<span class="rtwbmal_text"><?php esc_html_e('Add New Category', 'rtwbmal-book-my-appointment');?></span>
				</a>
			</div>
			<div class="rtwbmal_categories_header">
				<?php esc_html_e( 'Categories', 'rtwbmal-book-my-appointment' ); ?>
				<span class="rtwbmal_count"><?php echo esc_html( $rtwbmal_all_categories_count ); ?></span>
			</div>
			<!-- header end -->

			<!-- body start -->
			<ul class="rtwbmal_categories_list">
				<li class="rtwbmal_single_category">
					
					<div class="rtwbmal_category_order_name_action">
						<div data-cat_id="0" class="rtwbmal_category_name">
							<b><?php esc_html_e('All Services', 'rtwbmal-book-my-appointment') ?></b>
						</div>
					</div>
				</li>
				<?php 
				if(is_array($rtwbmal_all_categories) && !empty($rtwbmal_all_categories))
				{
					foreach( $rtwbmal_all_categories as $rtwbmal_key => $rtwbmal_value ){
						?><li class="rtwbmal_single_category">
							<div class="rtwbmal_category_order">
								<i class="fas fa-bars"></i>
							</div>
							<div class="rtwbmal_category_img">
							</div>
							<div class="rtwbmal_category_order_name_action">
								<div data-cat_id="<?php echo esc_attr( $rtwbmal_value[ 'id' ] ); ?>" class="rtwbmal_category_name">
									<b><?php echo esc_html( $rtwbmal_value[ 'title' ] ); ?></b>
								</div>
								<div class="rtwbmal_category_edit_del">
									<ul data-rtwbmal_cat_id="<?php echo esc_attr( $rtwbmal_value[ 'id' ] ); ?>">
										<li><a rel="modal:open" href="#rtwbmal_service_category_popup" class="rtwbmal_cat_edit"><i class="far fa-edit"></i></a></li>
										<li><a href="javascript:void(0);" class="rtwbmal_cat_del"><i class="far fa-trash-alt"></i></a></li>
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

		<div class="rtwbmal_services">
			<div class="rtwbmal_add_new rtwbmal_add_new_service">
				<a class="rtwbmal_button rtwbmal_add_new_button" rel="modal:open" href="#rtwbmal_service_popup">
					<span class="rtwbmal_plus">
						<i class="fas fa-plus"></i>
					</span>
					<span class="rtwbmal_text"><?php esc_html_e( 'Add New Service', 'rtwbmal-book-my-appointment' ); ?></span>
				</a>
			</div>
			<!-- header start -->
			<div class="rtwbmal_services_header">
				<div class="rtwbmal_services_header_in">
					<span class="rtwbmal_service_name"><?php esc_html_e( 'Service', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_service_price"><?php esc_html_e( 'Price', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_location_duration"><?php esc_html_e( 'Duration', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_service_status"><?php esc_html_e( 'Status', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_count"><?php echo esc_html__( 'Total', 'rtwbmal-book-my-appointment' ).' '. esc_html( $rtwbmal_all_services_count); ?></span>
				</div>
			</div>
			<!-- header end -->

			<!-- body start -->
			<ul class="rtwbmal_services_list">

				<?php 
				if(is_array($rtwbmal_all_services) && !empty($rtwbmal_all_services))
				{
					foreach( $rtwbmal_all_services as $rtwbmal_key => $rtwbmal_value ){
						$rtwbmal_duration = $rtwbmal_value[ 'duration' ];
						$rtwbmal_hour = floor( $rtwbmal_duration / 60 );
						$rtwbmal_min = ( $rtwbmal_duration - floor( $rtwbmal_duration / 60 ) * 60 );
						?><li class="rtwbmal_single_service">
							<div class="rtwbmal_service_img">
								<img src="<?php echo esc_url( wp_get_attachment_url( $rtwbmal_value[ 'attachment_id' ] ) ); ?>"/>
							</div>
							<div class="rtwbmal_service_name_price_duration">
								<div class="rtwbmal_service_name">
									<?php echo esc_html( $rtwbmal_value[ 'title' ] ); ?>
								</div>
								<div class="rtwbmal_service_price">
									<?php echo esc_html( $rtwbmal_value[ 'price' ] ); ?>
								</div>
								<div class="rtwbmal_service_duration">
									<?php 
										if( $rtwbmal_hour != 0 ){
											echo esc_html__( $rtwbmal_hour.'hr', 'rtwbmal-book-my-appointment' );
										}
										if( $rtwbmal_min != 0 ){
											echo esc_html__( ' '.$rtwbmal_min.'min', 'rtwbmal-book-my-appointment' );
										}
								?></div>
								<div class="rtwbmal_service_status">
									<?php 
										if( $rtwbmal_value[ 'status' ] == 1 ){
											esc_html_e( 'Active', 'rtwbmal-book-my-appointment' );
										}
										if(  $rtwbmal_value[ 'status' ] == 0 ){
											esc_html_e( 'Inactive', 'rtwbmal-book-my-appointment' );
										}
								?></div>
								<div class="rtwbmal_service_edit_del">
									<ul class="rtwbmal_serv_id" data-rtwbmal_service_id="<?php echo esc_attr( $rtwbmal_value[ 'id' ] ); ?>">
										<li><a rel="modal:open" href="#rtwbmal_service_popup" class="rtwbmal_service_edit"><i class="far fa-edit"></i></a></li>
										<li><a href="javascript:void(0);" class="rtwbmal_service_delete"><i class="far fa-trash-alt"></i></a></li>
									</ul>
								</div>
							</div>
						</li>
				<?php				
					} 
				}
			?></ul>
			<!-- body end -->
			<ul class="rtwbmal_services_list_acc_category">
				
			</ul>
		</div>
	</div>
	
	<!-- popup service category start -->
	<div id="rtwbmal_service_category_popup" class="modal">
		<div class="rtwbmal_loc_popup_bg">
			<div class="rtwbmal_loc_popup_main">
				<div class="rtwbmal_popup_header">
					<div class="rtwbmal_loc_header_title"><?php esc_html_e( 'Add New Category', 'rtwbmal-book-my-appointment' ); ?></div>
				</div>
				<div class="rtwbmal_popup_body">
					<div class="rtwbmal_popup_content">
						<form id="rtwbmal_service_cat_form">
							<input type="hidden" id="rtwbmal_category_id">
							<input type="hidden" id="rtwbmal_cat_save_edit">
							<div class="rtwbmal_loc_input">
								<div class="rtwbmal_loc_title">
									<label>
										<span>
											<?php echo esc_html__( 'Name', 'rtwbmal-book-my-appointment' ).'*'; ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_cat_title_input" placeholder="<?php esc_html_e( 'Enter Category Name', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cat_title_input" />
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="rtwbmal_popup_footer">
					<div class="rtwbmal_popup_action">
						<a href="javascript:void(0);" class="rtwbmal_cat_save"><?php esc_html_e( 'Save', 'rtwbmal-book-my-appointment' ); ?></a>
					</div>
					<div class="rtwbmal_popup_action">
						<a href="javascript:void(0);" rel="modal:close" class="rtwbmal_close"><?php esc_html_e( 'Close', 'rtwbmal-book-my-appointment' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- popup service category end -->

	<!-- popup service start -->
	<div id="rtwbmal_service_popup" class="modal">
		<input type="hidden" class="rtwbmal_save_or_edit" value="">
		<input type="hidden" class="rtwbmal_ser_id" value="">
		<div class="rtwbmal_loc_popup_main">
			<div class="rtwbmal_popup_header">
				<div class="rtwbmal_loc_header_title"><?php esc_html_e( 'Add New Service', 'rtwbmal-book-my-appointment' ); ?></div>
			</div>
			<div class="rtwbmal_popup_body">
				<label><?php esc_html_e( 'Add Image', 'rtwbmal-book-my-appointment' ); ?></label>
				<div class="rtwbmal_popup_upload_image_wrapper">
					<div class="rtwbmal_popup_upload_image_inner_wrapper">
						<div class="rtwbmal_popup_upload_icon">
							<div class="rtwbmal_popup_upload_img">
								<input type="hidden" id="rtwbmal_service_imgs" name="service_img">
								<img id="rtwbmal_service_img" src="" alt="New Service">
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
					<form id="rtwbmal_service_form">
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_title">
								<label>
									<span>
										<?php echo esc_html__( 'Name', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<input type="text" value="" class="rtwbmal_service_title_input" placeholder="<?php esc_html_e( 'Enter Service Title', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cat_title_input" />
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_price">
								<label>
									<span>
										<?php echo esc_html__( 'Price', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<input type="number" class="rtwbmal_cat_price_input" placeholder="<?php esc_html_e( 'Enter Price', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cat_title_input" min="0"/>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_title">
								<label>
									<span>
										<?php echo esc_html__( 'Status', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_status" data-placeholder="<?php esc_html_e( 'Select Status', 'rtwbmal-book-my-appointment' ); ?>" name="">
									<option value="1"><?php esc_html_e( 'Active', 'rtwbmal-book-my-appointment' ); ?></option>
									<option value="0"><?php esc_html_e( 'Inactive', 'rtwbmal-book-my-appointment' ); ?></option>
								</select>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_title">
								<label>
									<span>
										<?php echo esc_html__( 'Select Category', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_ser_cat"  data-placeholder="<?php esc_html_e( 'Select Category', 'rtwbmal-book-my-appointment' ); ?>" name="">
									<?php 
									if(is_array($rtwbmal_all_categories) && !empty($rtwbmal_all_categories))
									{
										foreach ( $rtwbmal_all_categories as $rtwbmal_cat => $cat ) {
											?>	
											<option value="<?php echo esc_attr( $cat[ 'id' ] ); ?>"><?php echo esc_html( $cat[ 'title' ] ); ?></option>
											<?php
										}
									}
								?></select>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_title">
								<label>
									<span>
										<?php echo esc_html__( 'Select Color', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<input class="color-field rtwbmal_sel_color" type="text" value="">
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_time">
								<label>
									<span>
										<?php echo esc_html__( 'Time Duration', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_time_dur" data-placeholder="<?php esc_html_e( 'Duration', 'rtwbmal-book-my-appointment' ); ?>" name="">
									<?php 
									if(is_array($rtwbmal_time_slot) && !empty($rtwbmal_time_slot))
									{
										foreach ( $rtwbmal_time_slot as $rtwbmal_cat => $cat ) {
											?><option value="<?php echo esc_attr( $rtwbmal_cat ); ?>"><?php echo esc_html( $cat[ 'time' ] ); ?></option>
											<?php
										}
									}
								?></select>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_time_gap">
								<label>
									<span>
										<?php echo esc_html__( 'Buffer Time', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<select class="rtwbmal_select rtwbmal_time_gap" data-placeholder="<?php esc_html_e( 'Time Gap', 'rtwbmal-book-my-appointment' ); ?>" name="">
									<?php 
									if(is_array($rtwbmal_time_slot) && !empty($rtwbmal_time_slot))
									{
										foreach ( $rtwbmal_time_slot as $rtwbmal_cat => $cat ) {
											?><option value="<?php echo esc_attr( $rtwbmal_cat ); ?>"><?php echo esc_html( $cat[ 'time' ] ); ?></option>
											<?php
										}
									}
								?></select>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_min_cap">
								<label>
									<span>
										<?php echo esc_html__( 'Min Capacity', 'rtwbmal-book-my-appointment' ).'*'; ?>
									</span>
								</label>
								<input type="number" class="rtwbmal_serv_min_cap" placeholder="<?php esc_html_e( 'Min', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cat_title_input" min="0"/>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_max_cap">
								<label>
									<span>
										<?php echo esc_html__( 'Max Capacity', 'rtwbmal-book-my-appointment' ).''; ?>
									</span>
								</label>
								<input type="number" class="rtwbmal_serv_max_cap" placeholder="<?php esc_html_e( 'Min', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cat_title_input" min="0"/>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_add">
								<label>
									<span>
										<?php echo esc_html__( 'Address', 'rtwbmal-book-my-appointment' ).''; ?>
									</span>
								</label>
								<textarea class="rtwbmal_cat_address_input" placeholder="<?php esc_html_e( 'Enter location Address', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_cat_address_input"></textarea>
							</div>
						</div>
						<div class="rtwbmal_cat_input">
							<div class="rtwbmal_service_desc">
								<label>
									<span>
										<?php echo esc_html__( 'Description', 'rtwbmal-book-my-appointment' ); ?>
									</span>
								</label>
								<textarea class="rtwbmal_cat_description" placeholder="<?php esc_html_e( 'Enter location Description', 'rtwbmal-book-my-appointment' ); ?>" name=""></textarea>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="rtwbmal_popup_footer">
				<div class="rtwbmal_popup_action">
					<a href="javascript:void(0);" class="rtwbmal_save_service"><?php esc_html_e( 'Save', 'rtwbmal-book-my-appointment' ); ?></a>
				</div>
				<div class="rtwbmal_popup_action">
					<a href="javascript:void(0);" rel="modal:close" class="rtwbmal_close"><?php esc_html_e( 'Close', 'rtwbmal-book-my-appointment' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- popup service end -->
</div>