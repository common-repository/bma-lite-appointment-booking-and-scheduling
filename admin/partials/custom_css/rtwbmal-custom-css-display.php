<?php
if(isset($_POST['rtwbmal_save_brdr_radius_data']))
{
    if(isset($_POST['rtwbmal_services_brdr_radius']) && !empty($_POST['rtwbmal_services_brdr_radius']))
    {
        $rtwbmal_services_brdr_radius =  sanitize_text_field($_POST['rtwbmal_services_brdr_radius']) ;
    }
    else
    {
        $rtwbmal_services_brdr_radius = 50;
    }
    if(isset($_POST['rtwbmal_specialist_brdr_radius']) && !empty($_POST['rtwbmal_specialist_brdr_radius']))
    {
        $rtwbmal_specialist_brdr_radius =  sanitize_text_field($_POST['rtwbmal_specialist_brdr_radius']);
    }
   else
   {
    $rtwbmal_specialist_brdr_radius = 50;
   }
    $rtwbmal_frntend_brdr_radi_arr =array(
        "rtwbmal_services_brdr_radius"       => $rtwbmal_services_brdr_radius,
        "rtwbmal_specialist_brdr_radius"     => $rtwbmal_specialist_brdr_radius
    );
  update_option('rtwbmal_frntend_brdr_radi',$rtwbmal_frntend_brdr_radi_arr);
}
$rtwbmal_frntend_brdr_radi = get_option('rtwbmal_frntend_brdr_radi');

?>
<div class="rtwbmal_page_content">
		<div class="rtwbmal_setting_wrapper">
            <div class="rtwbmal_setting_right">
                <?php 
                if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' )
                {
                    echo '<form method="post" action="">';
                }
                elseif(isset($_GET['action']) && $_GET['action'] == 'add_new')
                {
                    echo '<form method="post" action="'.admin_url('admin.php').'?page=rtwbmal-custom-css&action=add_new">';
                }else{
                    echo '<form method="post" action="">';
                }
                ?>
                    <div class="rtwbmal_general_content rtwbmal_show">
                        <h3><?php esc_html_e( 'For Booking Page', 'rtwbmal-book-my-appointment' ); ?></h3>
                        <div class="rtwbmal_input_fields">
                            <table>
                                <tr>
                                    <td>
                                        <label><?php esc_html_e( 'Add border radius for services image', 'rtwbmal-book-my-appointment' ); ?></label>
                                    </td>
                                    <td>
                                    <input type="number" name="rtwbmal_services_brdr_radius" value="<?php echo isset($rtwbmal_frntend_brdr_radi['rtwbmal_services_brdr_radius']) ? $rtwbmal_frntend_brdr_radi['rtwbmal_services_brdr_radius'] : '50' ?>" class="rtwbmal_bordr_radius_css"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span class="rtwbmal_notice"><b><i><?php esc_html_e( 'Should be given in number.', 'rtwbmal-book-my-appointment' ); ?></i></b></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label><?php esc_html_e( 'Add border radius for specialist image', 'rtwbmal-book-my-appointment' ); ?></label>
                                    </td>
                                    <td>
                                        <input type="number" name="rtwbmal_specialist_brdr_radius" value="<?php echo isset($rtwbmal_frntend_brdr_radi['rtwbmal_specialist_brdr_radius']) ? $rtwbmal_frntend_brdr_radi['rtwbmal_specialist_brdr_radius'] : '50' ?>" class="rtwbmal_bordr_radius_css"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span class="rtwbmal_notice"><b><i><?php esc_html_e( 'Should be given in number.', 'rtwbmal-book-my-appointment' ); ?></i></b></span></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="rtwbmal_save_temp_settings">
                        <input type="submit" value="<?php esc_attr_e( 'Save', 'rtwbmal-book-my-appointment' ); ?>" name="rtwbmal_save_brdr_radius_data" class="rtwbmal_button">
                    </div>
                </form>
            </div>
		</div>
	</div>