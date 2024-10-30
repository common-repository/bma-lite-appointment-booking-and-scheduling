<?php
	global $wpdb;
	$rtwbmal_all_emp 		= $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."rtwbma_employees ORDER BY `first_name` ASC", ARRAY_A );
	$rtwbmal_all_emp_count 	= sizeof( $rtwbmal_all_emp );

	$rtwbmal_loc_count 		= $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."rtwbma_locations" );
	$rtwbmal_all_locations 	= $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."rtwbma_locations ORDER BY `loc_name` ASC LIMIT %d", 100 ), ARRAY_A );

?><div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<?php esc_html_e( 'Locations', 'rtwbmal-book-my-appointment' ); ?>
			<span class="rtwbmal_count"><?php echo esc_html( $rtwbmal_loc_count ); ?></span>
		</h3>
		<div class="rtwbmal_add_new rtwbmal_add_new_location">
			<a class="rtwbmal_button rtwbmal_add_new_button" rel="modal:open" href="#rtwbmal_popup">
				<span class="rtwbmal_plus">
					<i class="fas fa-plus"></i>
				</span>
				<span class="rtwbmal_text"><?php esc_html_e( 'Add New Location', 'rtwbmal-book-my-appointment' ); ?></span>
			</a>
		</div>
	</div>

	<div class="rtwbmal_page_content">
		<div class="rtwbmal_locations">
			<!-- header start -->
			<div class="rtwbmal_locations_header">
				<div class="rtwbmal_locations_header_in">
					<span class="rtwbmal_location_name"><?php esc_html_e( 'Name', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_location_address"><?php esc_html_e( 'Address', 'rtwbmal-book-my-appointment' ); ?></span>
					<span class="rtwbmal_location_emp"><?php esc_html_e( 'Employees', 'rtwbmal-book-my-appointment' ); ?></span>
				</div>
			</div>
			<!-- header end -->

			<!-- body start -->
			<ul class="rtwbmal_locations_list">
				<?php 
				if( isset($rtwbmal_all_locations) && is_array($rtwbmal_all_locations) && !empty($rtwbmal_all_locations) )
				{
					foreach( $rtwbmal_all_locations as $rtwbmal_key => $rtwbmal_value ){
						?><li class="rtwbmal_single_location">
							<div class="rtwbmal_loc_img">
								<?php if( !empty($rtwbmal_value[ 'attachment_id' ])){ ?>
									<img src="<?php echo esc_url( wp_get_attachment_url( $rtwbmal_value[ 'attachment_id' ] ) ); ?>" />
								<?php }else{ ?>
									<img src="<?php echo esc_url( RTWBMAL_URL . '/assets/images/location_icon.png' ); ?>" />
								<?php } ?>
							</div>
							<div class="rtwbmal_loc_name_add_emp">
								<div class="rtwbmal_loc_name">
									<?php echo esc_html( $rtwbmal_value[ 'loc_name' ] ); ?>
								</div>
								<div class="rtwbmal_loc_address">
									<?php echo  esc_html( $rtwbmal_value[ 'loc_address' ] );
								?></div>
								<div class="rtwbmal_loc_emp">
									<?php echo  esc_html( $rtwbmal_value[ 'loc_emp' ].'/'.$rtwbmal_all_emp_count ); ?>
								</div>

								<div class="rtwbmal_loc_edit_del">
									<ul data-rtwbmal_loc_id="<?php echo esc_attr( $rtwbmal_value[ 'id' ] ); ?>">
										<li><a rel="modal:open" href="#rtwbmal_popup" class="rtwbmal_edit"><i class="far fa-edit"></i></a></li>
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
	<div id="rtwbmal_popup" class="modal">
		<input type="hidden" class="rtwbmal_edit_loc_id" value="save" name="">
		<input type="hidden" class="rtwbmal_emp_select" value="<?php echo esc_attr( $rtwbmal_all_emp_count ); ?>" name="">
		<div class="rtwbmal_loc_popup_bg">
			<div class="rtwbmal_loc_popup_main">
				<div class="rtwbmal_popup_header">
					<div class="rtwbmal_loc_header_title"><?php esc_html_e( 'Add New Location', 'rtwbmal-book-my-appointment' ); ?></div>
				</div>
				<div class="rtwbmal_popup_body">
					<label><?php esc_html_e( 'Add Image', 'rtwbmal-book-my-appointment' ); ?></label>
					<div class="rtwbmal_popup_upload_image_wrapper">
						<div class="rtwbmal_popup_upload_image_inner_wrapper">
							<div class="rtwbmal_popup_upload_icon">
								<div class="rtwbmal_popup_upload_img">
									<input type="hidden" id="rtwbmal_loc_imgs" name="service_img">
									<img id="rtwbmal_loc_img" src="" alt="Location">
								</div>
							</div>
							<div class="rtwbmal_popup_upload_remove">
								<a class="rtwbmal_button"  href="#">
									<span class="rtwbmal_plus">
										<i class="far fa-trash-alt"></i>
									</span>
									<span class="rtwbmal_text rtwbmal_rmove_img"><?php esc_html_e('Remove', 'rtwbmal-book-my-appointment'); ?></span>
								</a>
							</div>
							<div class="rtwbmal_loc_popup_upload_change">
								<a class="rtwbmal_button rtwbmal_button_change"  href="#">
									<span class="rtwbmal_plus">
										<i class="far fa-edit"></i>
									</span>
									<span class="rtwbmal_text"><?php esc_html_e('Change', 'rtwbmal-book-my-appointment'); ?></span>
								</a>
							</div>
						</div>
					</div>
					<div class="rtwbmal_popup_content">
						<form id="rtwbmal_location_error">
							<div class="rtwbmal_loc_input">
								<div class="rtwbmal_loc_title">
									<label>
										<span>
											<?php echo esc_html__( 'Name', 'rtwbmal-book-my-appointment' ).'*'; ?>
										</span>
									</label>
									<input type="text" class="rtwbmal_loc_title_input" placeholder="<?php esc_html_e( 'Enter Location Name', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_loc_title_input" />
								</div>
							</div>
							<div class="rtwbmal_loc_input">
								<div class="rtwbmal_loc_employees">
									<label>
										<span>
											<?php echo esc_html__( 'Employees', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<select class="rtwbmal_select" multiple="multiple" data-placeholder="<?php esc_html_e( 'Select Employees', 'rtwbmal-book-my-appointment' ); ?>" name="">
										<?php
										if(is_array($rtwbmal_all_emp) && !empty($rtwbmal_all_emp))
										{
											foreach( $rtwbmal_all_emp as $rtwbmal_emp_key => $rtwbmal_emp_value )
											{
												?>	
												<option value="<?php echo esc_attr( $rtwbmal_emp_value[ 'id' ]) ?>"><?php echo esc_html( $rtwbmal_emp_value[ 'first_name' ].' '.$rtwbmal_emp_value[ 'last_name' ] ); ?></option>
												<?php
											}
										}
									?></select>
								</div>
							</div>
							<div class="rtwbmal_loc_input">
								<div class="rtwbmal_loc_add">
									<label>
										<span>
											<?php echo esc_html__( 'Address', 'rtwbmal-book-my-appointment' ).'*'; ?>
										</span>
									</label>
									<textarea class="rtwbmal_loc_address_input" placeholder="<?php esc_html_e( 'Enter Location Address', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_loc_address_input"></textarea>
								</div>
							</div>
							<div class="rtwbmal_loc_input">
								<div class="rtwbmal_loc_desc">
									<label>
										<span>
											<?php echo esc_html__( 'Description', 'rtwbmal-book-my-appointment' ); ?>
										</span>
									</label>
									<textarea class="rtwbmal_loc_description" placeholder="<?php esc_html_e( 'Enter Location Description', 'rtwbmal-book-my-appointment' ); ?>" name=""></textarea>
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