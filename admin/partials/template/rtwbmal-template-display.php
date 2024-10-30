<?php 
$rtwbmal_templates = array( 1 => 'Template 1',
                            2 => 'Template 2',
                            3 => 'Template 3',
                            4 => 'Template 4',
                            5 => 'Template 5',
                            6 => 'Template 6',
                            7 => 'Template 7' );
?>
<div class="rtwbmal-main">
	<div class="rtwbmal_page_title">
		<h3>
			<?php esc_html_e( 'Template', 'rtwbmal-book-my-appointment' ); ?>
		</h3>
	</div>
	<div class="rtwbmal_page_content">
        <span class="rtwbmal_pro_text"><?php esc_html_e('This feature is available in Pro version','rtwbmal-book-my-appointment'); ?>
        <a target="_blank" href="<?php echo esc_url('https://codecanyon.net/item/bma-wordpress-appointment-booking-plugin-for-enterprise/25230155'); ?>"><?php esc_html_e('Get it now','rtwbmal-book-my-appointment'); ?></a></span>
		<div class="rtwbmal_setting_wrapper">
			<div class="panel-wrap product_data rtwbmal_pro_text_overlay">
                <div class="rtwbmal_setting_right">
                    <form method="post" action="">
                        <div class="rtwbmal_general_content rtwbmal_show">
                            <h3><?php esc_html_e( 'For Booking Page', 'rtwbmal-book-my-appointment' ); ?></h3>
                            <div class="rtwbmal_input_fields">
                                <table>
                                    <tr>
                                        <td>
                                            <label><?php esc_html_e( 'Select Template for Desktop', 'rtwbmal-book-my-appointment' ); ?></label>
                                        </td>
                                        <td>
                                            <select class="rtwbmal_temp_desktop rtwbmal_select" name="rtwbmal_temp_desktop">
                                                <?php 
                                                if(is_array($rtwbmal_templates ) && !empty($rtwbmal_templates ))
                                                {
                                                    foreach ( $rtwbmal_templates as $template => $temp ) { ?>
                                                        <option value="<?php echo esc_attr( $template );?>"> <?php esc_html_e( $temp ); ?>
                                                        </option>
                                                    <?php 
                                                    }
                                                }
                                            ?></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><?php esc_html_e( 'Select Template for Tablet', 'rtwbmal-book-my-appointment' ); ?></label>
                                        </td>
                                        <td>
                                            <select class="rtwbmal_temp_tablet rtwbmal_select" name="rtwbmal_temp_tablet">
                                                <?php 
                                                if(is_array($rtwbmal_templates ) && !empty($rtwbmal_templates ))
                                                {
                                                    foreach ( $rtwbmal_templates as $template => $temp ) { ?>
                                                        <option value="<?php echo esc_attr( $template );?>"> <?php esc_html_e( $temp ); ?>
                                                        </option>
                                                    <?php 
                                                    }
                                                }
                                            ?></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><?php esc_html_e( 'Select Template for Mobile', 'rtwbmal-book-my-appointment' ); ?></label>
                                        </td>
                                        <td>
                                            <select class="rtwbmal_temp_mobile rtwbmal_select" name="rtwbmal_temp_mobile">
                                                <?php
                                                if(is_array($rtwbmal_templates ) && !empty($rtwbmal_templates ))
                                                { 
                                                    foreach ( $rtwbmal_templates as $template => $temp ) { ?>
                                                        <option value="<?php echo esc_attr( $template );?>"> <?php esc_html_e( $temp ); ?>
                                                        </option>
                                                    <?php 
                                                    }
                                                }
                                            ?></select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="rtwbmal_general_content rtwbmal_show">
                            <h3><?php esc_html_e( 'For Login/Register Page', 'rtwbmal-book-my-appointment' ); ?></h3>
                            <div class="rtwbmal_input_fields">
                                <table>
                                    <tr>
                                        <td>
                                            <label><?php esc_html_e( 'Choose Template', 'rtwbmal-book-my-appointment' ); ?></label>
                                        </td>
                                        <td>
                                            <select class="rtwbmal_select" name="rtwbmal_select_template">
                                                <option value="1"><?php esc_html_e( 'Template 1', 'rtwbmal-book-my-appointment' ); ?></option>
                                                <option value="2"><?php esc_html_e( 'Template 2', 'rtwbmal-book-my-appointment' ); ?></option>
                                                <option value="3"><?php esc_html_e( 'Template 3', 'rtwbmal-book-my-appointment' ); ?></option>
                                                <option value="4"><?php esc_html_e( 'Template 4', 'rtwbmal-book-my-appointment' ); ?></option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="rtwbmal_save_temp_settings">
                            <input type="button" value="<?php esc_attr_e( 'Save', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_save_temp_settings" class="rtwbmal_button">
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>