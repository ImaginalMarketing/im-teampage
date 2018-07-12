<?php

// Output everything via shortcode + choose layout based on setting
function teampage_shortcode($atts){
    // paramater to grab category id input from the user
    extract(shortcode_atts(array(
        'location' => NULL
    ), $atts));

    // add js (isotope + custom loop AJAX)
    wp_enqueue_script( 'isotope-js', 'https://cdn.jsdelivr.net/isotope/3.0.1/isotope.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'imteam-js', plugin_dir_url( __FILE__ ) . '../assets/team.js' );
    // WP path variable for team.js
    $wp_path = array( 'wp_path' => get_bloginfo('url') );
    wp_localize_script( 'imteam-js', 'imtheme', $wp_path );

    // select layout + make sure the_content() renders above the team roster
    ob_start();
    $imteam_layout = get_option('select_layout');
    $theme_url = get_site_url().'/wp-content/themes/'.get_option('stylesheet').'/';

        if ($imteam_layout == '1') {
            // modest
            if ( !empty( locate_template( 'im-teampage/layout-modest.php' ) ) ) {
                require($theme_url . 'im-teampage/layout-modest.php');
            } else {
                require(plugin_dir_path( __FILE__ ) . '../view/layout-modest.php');
            }
        } elseif ($imteam_layout == '0') {
            // fancy
            if ( !empty( locate_template( 'im-teampage/layout-fancy.php' ) ) ) {
                require($theme_url . 'im-teampage/layout-fancy.php');
            } else {
                require(plugin_dir_path( __FILE__ ) . '../view/layout-fancy.php');
            }
        } elseif ($imteam_layout == '2') {
            // modest grid
            if ( !empty( locate_template( 'im-teampage/layout-modest-grid.php' ) ) ) {
                require($theme_url . 'im-teampage/layout-modest-grid.php');
            } else {
                require(plugin_dir_path( __FILE__ ) . '../view/layout-modest-grid.php');
            }
        } else {
            require(plugin_dir_path( __FILE__ ) . '../view/layout-modest.php');
        }

    $ReturnString = ob_get_contents();
    ob_end_clean();
    return $ReturnString;
    
}
add_shortcode('im-teampage', 'teampage_shortcode');


// add class to body (currently only for lightbox styling purposes)
function im_team_class( $c ) {
    global $post;
    if( isset($post->post_content) && has_shortcode( $post->post_content, 'im-teampage' ) ) {
        $c[] = 'im_team_page';
    }
    return $c;
}
add_filter( 'body_class', 'im_team_class' );


// output main team stylesheet
function imteamcss() {
    wp_register_style('imteam-css', plugin_dir_url( __FILE__ ) . '../assets/team.css');
    wp_enqueue_style('imteam-css');

        wp_register_style('fancybox-css', plugin_dir_url( __FILE__ ) . '../assets/jquery.fancybox.min.css');
        wp_enqueue_style('fancybox-css');
        wp_enqueue_script( 'fancybox-js', plugin_dir_url( __FILE__ ) . '../assets/jquery.fancybox.min.js', array( 'jquery' ), '', true );
}
add_action ('wp_enqueue_scripts', 'imteamcss');