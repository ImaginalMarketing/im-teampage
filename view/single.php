<html>
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL; ?>/im-teampage/assets/team.css" />	
<style>
	body.team-member {
		padding: 30px;
	}
</style>
<?php wp_head(); ?>
</head>

<body class="team-member">
<?php
	while (have_posts()) : the_post();

	$getimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$default_image = get_option('default_team_img');
	$team_exp = wp_get_post_terms($post->ID, 'team_experience', array("fields" => "all"));
	$team_loc = wp_get_post_terms($post->ID, 'team_location', array("fields" => "all"));

	if( $getimage ) {
		$image = $getimage;
	} elseif ($default_image !== '') {
		$image = $default_image;
	} else { $image = WP_PLUGIN_URL.'/im-teampage/assets/no-img.jpg'; }

?>
	<div id="bio" class="row">
		<div id="biothumb" class="medium-4 columns">
			<img class="team_img" src="<?php echo $image; ?>" alt="<?php the_title_attribute(); ?>" />
			<h2><?php the_title(); ?></h2>
			<h5><?php the_field('team_title'); ?></h5>
			<h5><?php echo $team_loc[0]->name; ?></h5>
			<br/>

			<?php // show booking button?
		    $imteam_booking = get_option('show_booking');
		    if ($imteam_booking == '1') {
		        echo '<a class="button booking" href="'.get_site_url().'/'.get_option("booking_link").'">Book Now</a>';
		    } else { echo ''; } ?>

		</div>
		<div id="bioinfo" class="medium-8 columns">
			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; ?>
<?php wp_footer(); ?>
</body>
</html>