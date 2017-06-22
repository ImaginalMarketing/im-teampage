<?php

// Register General section + its settings
add_action('admin_init', 'imteam_settings_init');  
function imteam_settings_init() {  
    add_settings_section(  
        'imteam_general', // Section ID 
        'General Options', // Section Title
        'general_section_cb', // Callback
        'imteam' // What Page?  This makes the section show up on the imteam Settings Page
    );

    register_setting('imteam','select_layout', 'esc_attr');
    add_settings_field( // Option 1
        'select_layout', // Option ID
        'Select Layout', // Label
        'imteam_binary_cb', // !important - This is where the args go!
        'imteam', // Page it will be displayed (imteam Settings)
        'imteam_general', // Name of our section
        array( // The $args
            'select_layout', // Should match Option ID
            'Fancy', // Radio Option 1
            'Modest', // Radio Option 2
			'A straightforward page with the essentials is one option on the table, or hey maybe you\'re feeling a little dangerous and wanna click stuff and make things go.' // Description
        )  
    ); 

    register_setting('imteam','show_bios', 'esc_attr');
    add_settings_field( // Option 2
        'show_bios', // Option ID
        'Display Bios', // Label
        'imteam_checkbox_cb', // !important - This is where the args go!
        'imteam', // Page it will be displayed
        'imteam_general', // Name of our section (imteam Settings)
        array( // The $args
            'show_bios', // Should match Option ID
            'Enables team member bios which popup in a nifty lightbox.' // Description
        )  
    ); 

    register_setting('imteam','show_booking', 'esc_attr');
    add_settings_field( // Option 2
        'show_booking', // Option ID
        'Show <u>Book Now</u> Button', // Label
        'imteam_checkbox_cb', // !important - This is where the args go!
        'imteam', // Page it will be displayed
        'imteam_general', // Name of our section (imteam Settings)
        array( // The $args
            'show_booking', // Should match Option ID
            'Displays a booking button inside popup bios (if bios are enabled as well).' // Description
        )  
    ); 

    register_setting('imteam','booking_link', 'esc_attr');
    add_settings_field( // Option 2
        'booking_link', // Option ID
        'Booking URL', // Label
        'imteam_textbox_cb', // !important - This is where the args go!
        'imteam', // Page it will be displayed
        'imteam_general', // Name of our section (imteam Settings)
        array( // The $args
            'booking_link', // Should match Option ID
            'Must be relative to site root URL.' // Description
        )  
    ); 

}

// Section Info Callback
function general_section_cb() {
    echo '<p>This section grows slowly but surely.</p>';  
}

// Binary Radio Callback
function imteam_binary_cb($args) {
    $option = get_option($args[0]); ?>
	<input name="<?php echo $args[0]; ?>" type="radio" value="0" <?php checked( 0, $option ); ?> /> <?php echo $args[1]; ?><br/>
	<input name="<?php echo $args[0]; ?>" type="radio" value="1" <?php checked( 1, $option ); ?> /> <?php echo $args[2]; ?>
	<p class="description"><?php echo $args[3]; ?></p>
<?php }

// Checkbox Callback
function imteam_checkbox_cb($args) {
    $option = get_option($args[0]); ?>
    <input type="checkbox" id="<?php echo $args[0]; ?>" name="<?php echo $args[0]; ?>" value="1" <?php checked( 1, $option ); ?> />
	<p class="description"><?php echo $args[1]; ?></p>
<?php }

// Textbox Callback
function imteam_textbox_cb($args) {
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}



/**
 * top level menu
 */
function imteam_options_page() {
 // add top level menu page
 add_submenu_page(
 'edit.php?post_type=people',
 'Imaginal Team Page Settings',
 'Settings',
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
 submit_button( 'Save Those Settings!' );
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