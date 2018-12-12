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
        'imteam_layout_cb', // !important - This is where the args go!
        'imteam', // Page it will be displayed (imteam Settings)
        'imteam_general', // Name of our section
        array( // The $args
            'select_layout', // Should match Option ID
            'Fancy', // Radio Option 1
            'Modest', // Radio Option 2
            'Modest Grid', // Radio Option 3
            'A straightforward page with the essentials is one option on the table, or hey maybe you\'re feeling a little dangerous and wanna click stuff and make things go.' // Description
        )  
    );

    register_setting('imteam','sort_order', 'esc_attr');
    add_settings_field( // Option 1
        'sort_order', // Option ID
        'Sort Order', // Label
        'imteam_binary_cb', // !important - This is where the args go!
        'imteam', // Page it will be displayed (imteam Settings)
        'imteam_general', // Name of our section
        array( // The $args
            'sort_order', // Should match Option ID
            'Random (default)', // Radio Option 1
            'Custom (via post attributes)', // Radio Option 2
            '' // Description
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
            'Enables team member bios which popup in a nifty lightbox. (Fancy + Modest Grid)' // Description
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

    register_setting('imteam','default_team_img', 'esc_attr');
    add_settings_field( // Option 2
        'default_team_img', // Option ID
        'Default Team Image', // Label
        'imteam_image_upload', // !important - This is where the args go!
        'imteam', // Page it will be displayed
        'imteam_general', // Name of our section (imteam Settings)
        array( // The $args
            'default_team_img', // Should match Option ID
            'The default image to be used if no image is uploaded for the team member.' // Description
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

// Layout Radio Callback
function imteam_layout_cb($args) {
    $option = get_option($args[0]); ?>
	<input name="<?php echo $args[0]; ?>" type="radio" value="0" <?php checked( 0, $option ); ?> /> <?php echo $args[1]; ?><br/>
    <input name="<?php echo $args[0]; ?>" type="radio" value="1" <?php checked( 1, $option ); ?> /> <?php echo $args[2]; ?><br/>
	<input name="<?php echo $args[0]; ?>" type="radio" value="2" <?php checked( 2, $option ); ?> /> <?php echo $args[3]; ?>
	<p class="description"><?php echo $args[4]; ?></p>
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

// Image Callback
function imteam_image_upload($args) {
    $option = get_option($args[0]);
    wp_enqueue_media();
    echo '<input type="text" id="child_logo_url" name="'. $args[0] .'" value="'. $option .'" size="50" />'; 
    echo '<input id="child_upload_logo_button" type="button" class="button" value="Upload Image" /> ';
    ?>
    <p class="description"><?php echo $args[1]; ?></p>
    
    <script type="text/javascript">
    // JavaScript to launch media uploader, should be enqueued in a separate file
    jQuery(document).ready(function() {
        jQuery('#child_upload_logo_button').click(function() {
            wp.media.editor.send.attachment = function(props, attachment) {
                jQuery('#child_logo_url').val(attachment.url);
            }
        wp.media.editor.open(this);
        return false;
        });
    });
    </script>
    
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
    $theme_url = get_stylesheet_directory().'/';
    global $wp_query, $post;
    if ($post->post_type == 'people'){
        if ( !empty( locate_template( 'im-teampage/single.php' ) ) ) {
                return $theme_url . 'im-teampage/single.php';
            } else {
                return plugin_dir_path( __FILE__ ) . '../view/single.php';
        }
    }
    return $single;
}