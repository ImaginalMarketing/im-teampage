<?php


// hey future Michael -- add another option to turn default styles on/off



/**
 * custom option and settings
 */
function imteam_settings_init() {
 // register a new setting for "imteam" page
 register_setting( 'imteam', 'imteam_options' );
 
 // register a new section in the "imteam" page
 add_settings_section(
 'imteam_section_developers',
 __( 'hello, just the one option for now', 'imteam' ),
 '',
 'imteam'
 );
 
 // register a new field in the "imteam_section_developers" section, inside the "imteam" page
 add_settings_field(
 'imteam_field_layout', // as of WP 4.6 this value is used only internally
 // use $args' label_for to populate the id inside the callback
 __( 'Select flavor:', 'imteam' ),
 'imteam_field_layout_cb',
 'imteam',
 'imteam_section_developers',
 [
 'label_for' => 'imteam_field_layout',
 'class' => 'imteam_row',
 'imteam_custom_data' => 'custom',
 ]
 );
}
add_action( 'admin_init', 'imteam_settings_init' );
 
 
// layout field cb
function imteam_field_layout_cb( $args ) {
 // get the value of the setting we've registered with register_setting()
 $options = get_option( 'imteam_options' );
 // output the field
 ?>
 <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
 data-custom="<?php echo esc_attr( $args['imteam_custom_data'] ); ?>"
 name="imteam_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
 >
 <option value="modest" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'modest', false ) ) : ( '' ); ?>>
 <?php esc_html_e( 'Modest', 'imteam' ); ?>
 </option>
 <option value="fancy" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'fancy', false ) ) : ( '' ); ?>>
 <?php esc_html_e( 'Fancy', 'imteam' ); ?>
 </option>
 </select>
 <p class="description">
 <?php esc_html_e( 'A straightforward page with the essentials is one option on the table, or hey maybe you\'re feeling a little dangerous and wanna click stuff and make things go.', 'imteam' ); ?>
 </p>
 <?php
}
 
/**
 * top level menu
 */
function imteam_options_page() {
 // add top level menu page
 add_submenu_page(
 'edit.php?post_type=people',
 'Imaginal Team Page Settings',
 '⚙ Settings',
 'manage_options',
 'imteam',
 'imteam_options_page_html'
 );
}
add_action( 'admin_menu', 'imteam_options_page' );
 
/**
 * top level menu:
 * callback functions
 */
function imteam_options_page_html() {
 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }
 
 // add error/update messages
 
 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'imteam_messages', 'imteam_message', __( 'Settings Saved', 'imteam' ), 'updated' );
 }
 
 // show error/update messages
 settings_errors( 'imteam_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post">
 <?php
 // output security fields for the registered setting "imteam"
 settings_fields( 'imteam' );
 // output setting sections and their fields
 // (sections are registered for "imteam", each field is registered to a specific section)
 do_settings_sections( 'imteam' );
 // output save settings button
 submit_button( 'Apply Layout' );
 ?>
 </form>
 </div>
 <?php
}




// Finally, set template file for individual team member (if popups are desired)
add_filter('single_template', 'set_single_template');
function set_single_template($single) {
    global $wp_query, $post;
    if ($post->post_type == 'people'){
        if(file_exists(plugin_dir_path( __FILE__ ) . '../view/single.php'))
            return plugin_dir_path( __FILE__ ) . '../view/single.php';
    }
    return $single;
}