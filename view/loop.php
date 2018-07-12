<?php 
// include
define('WP_USE_THEMES', false);
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

// first, what is the sort order?
$imteam_sort = get_option('sort_order');
$sort = 'rand';
if ($imteam_sort == '1') {
    $sort = 'menu_order';
} elseif ($imteam_sort == '0') {
    $sort = 'rand';
}

$location = $_POST['location'];
$service_cat = $_POST['service_cat'];
$experience = $_POST['experience'];
$query_vars = array(
	'post_type' => 'people',
	'orderby' => $sort,
	'order' => 'ASC',
	'posts_per_page' => '-1',
	'team_experience' => $experience,
	'team_location' => $location,
	'team_skills' => $service_cat,
	'meta_query' => array(
		'relation' => 'AND'
    )
);
query_posts($query_vars);?>


<?php
    if (have_posts()) : while (have_posts()) : the_post();
	$team_services = $service_cat;
?>
<div class="team_member small-12 medium-4 large-3 columns entry <?php echo $team_services; ?>">
	<div class="team_wrap">
		<?php 
			$getimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$team_exp = wp_get_post_terms($post->ID, 'team_experience', array("fields" => "all"));
			$team_loc = wp_get_post_terms($post->ID, 'team_location', array("fields" => "all"));

			if( $getimage ) {
				$image = $getimage;
			} else { $image = WP_PLUGIN_URL.'/im-teampage/assets/no-img.jpg'; }

			// show bios?
		    $imteam_bios = get_option('show_bios');
		    if ($imteam_bios == '1') {
		        echo '<a class="popup" data-fancybox="team" data-type="iframe" data-arrows="true" data-src="'.get_permalink().'" href="javascript:;"><div class="team_img" style="background-image:url(\''.$image.'\');"></div></a>';
		    } else {
		        echo '<div class="team_img" style="background-image:url(\''.$image.'\');"></div>';
		    }
		?>
		<div class="team_info">
			<h4><?php the_title(); ?></h4>
			<h5><?php the_field('team_title'); ?></h5>
			<span><?php echo $team_exp[0]->name; ?></span>
		</div>
	</div>
</div>
<?php endwhile; else : endif; wp_reset_query(); ?>