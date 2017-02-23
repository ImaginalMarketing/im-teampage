<html>
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/style.css" />	
<style>
	body {
		padding: 30px;
	}
</style>
<?php wp_head(); ?>
</head>

<body class="team-member">
<?php
	while (have_posts()) : the_post();
	$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$team_exp = wp_get_post_terms($post->ID, 'team_experience', array("fields" => "all"));
	$team_loc = wp_get_post_terms($post->ID, 'team_location', array("fields" => "all"));
?>
	<div id="bio" class="row" data-equalizer data-equalize-on="medium">
		<div id="biothumb" class="medium-6 large-5 columns" data-equalizer-watch>
			<?php if( $image ) { ?>
				<div class="team_img" style="background-image:url('<?php echo $image; ?>');"></div>
			<?php } else { ?>
				<div class="team_img" style="background-image:url('<?php bloginfo('template_url'); ?>/assets/images/no-img.jpg');"></div>
			<?php } ?>
			<h3><?php the_title(); ?></h3>
			<h6><?php the_field('team_title'); ?> <span>&bull;</span> <?php echo $team_loc[0]->name; ?></h6>
			<br/>
		</div>
		<div id="bioinfo" class="medium-10 large-11 columns" data-equalizer-watch>
			<h6>My specialty is...</h6>
			<p><?php the_field('team_specialty'); ?></p>
			<h6>What I want every client to know about me...</h6>
			<p><?php the_field('team_whattoknow'); ?></p>
			<h6>My favorite thing about my work...</h6>
			<p><?php the_field('team_favthing'); ?></p>
			<h6>My dream client is...</h6>
			<p><?php the_field('team_dreamclient'); ?></p>
		</div>
	</div>
<?php endwhile; ?>
<?php wp_footer(); ?>
</body>
</html>