<?php global $post;
$query_vars = array(
	'post_type' => 'people',
	'orderby' => 'rand',
	'posts_per_page' => '-1'
);
query_posts($query_vars);?>

<div id="teampage-modest">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="team_member">
	<?php 
		$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if( $image ) { ?>
		<div class="team_img" style="background-image:url('<?php echo $image; ?>');"></div>
	<?php } else { ?>
		<div class="team_img" style="background-image:url('<?php bloginfo('template_url'); ?>/assets/images/no-img.jpg');"></div>
	<?php } ?>
	<h4 class="team_name"><?php the_title(); ?></h4>
	<h5 class="team_title"><?php the_field('team_title'); ?></h5>
	<div class="team_bio"><?php the_content(); ?></div>
</div>
<?php endwhile; else : endif; wp_reset_query(); ?>

</div><br clear="all" />