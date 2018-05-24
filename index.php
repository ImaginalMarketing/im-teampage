<?php
/*
░░░░░░░░░░░░▄▐
░░░░░░▄▄▄░░▄██▄
░░░░░▐▀█▀▌░░░░▀█▄
░░░░░▐█▄█▌░░░░░░▀█▄
░░░░░░▀▄▀░░░▄▄▄▄▄▀▀
░░░░▄▄▄██▀▀▀▀
░░░█▀▄▄▄█░▀▀
░░░▌░▄▄▄▐▌▀▀▀
▄░▐░░░▄▄░█░▀▀ U HAVE BEEN SPOOKED BY THE
▀█▌░░░▄░▀█▀░▀
░░░░░░░▄▄▐▌▄▄
░░░░░░░▀███▀█░▄
░░░░░░▐▌▀▄▀▄▀▐▄ SPOOKY SKELETON
░░░░░░▐▀░░░░░░▐▌
░░░░░░█░░░░░░░░█
░░░░░▐▌░░░░░░░░░█
░░░░░█░░░░░░░░░░▐▌

Plugin Name: IM Team Page
Plugin URI: http://imaginalmarketing.com
Description: A custom post type for staff/team/serfs with filters and stuff. Execute with <strong>[im-teampage]</strong> or <strong>[im-teampage location='slug']</strong>
Author: Imaginal Marketing
Version: 0.2.1
Author URI: http://imaginalmarketing.com
*/

// hello
require_once( 'BFIGitHubPluginUploader.php' );
if ( is_admin() ) {
    new BFIGitHubPluginUpdaterTeam( __FILE__, 'ImaginalMarketing', "im-teampage", "f27a821d3f4a070b7a18123203fd81c403d071d5" );
}

require_once('func/cpt.php');
require_once('func/acf.php');
require_once('func/option.php');
require_once('func/shortcode.php');

// goodbye