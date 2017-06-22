<?php 
// include
define('WP_USE_THEMES', false);
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

$location = $_POST['location'];
$service_cat = $_POST['service_cat'];
$experience = $_POST['experience'];
$query_vars = array(
	'post_type' => 'people',
	'orderby' => 'rand',
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
			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$team_exp = wp_get_post_terms($post->ID, 'team_experience', array("fields" => "all"));
			$team_loc = wp_get_post_terms($post->ID, 'team_location', array("fields" => "all"));

			if( $image ) { ?>
			<div class="team_img" style="background-image:url('<?php echo $image; ?>');"></div>
		<?php } else { ?>
			<div class="team_img" style="background-image:url('<?php echo WP_PLUGIN_URL.'/im-teampage/assets/no-img.jpg'; ?>');"></div>
		<?php } ?>
		<div class="team_info">
			<h4><?php the_title(); ?></h4>
			<h5><?php the_field('title'); ?></h5>
			<span><?php echo $team_exp[0]->name; ?></span><br/>
		</div>
	</div>
</div>
<?php endwhile; else : endif; wp_reset_query(); ?>
