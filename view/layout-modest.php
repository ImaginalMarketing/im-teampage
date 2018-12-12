<?php global $post;

// first, what is the sort order?
$imteam_sort = get_option('sort_order');
$sort = 'rand';
if ($imteam_sort == '1') {
    $sort = 'menu_order';
} elseif ($imteam_sort == '0') {
    $sort = 'rand';
}

// are there locations? if not, ignore that taxonomy or else you get blank tables
if (isset($location)) {
	$query_vars = array(
		'post_type' => 'people',
		'orderby' => $sort,
		'order' => 'ASC',
		'posts_per_page' => '-1',
        'tax_query' => array(
        	array(
        		'taxonomy'=>'team_location',
                'field'=>'slug',
                'terms'=>$location
            )
        )
	);
} else {
	$query_vars = array(
		'post_type' => 'people',
		'orderby' => $sort,
		'order' => 'ASC',
		'posts_per_page' => '-1'
	);
}

query_posts($query_vars);
?>

<div id="teampage-modest">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="team_member">
	<?php 
		$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$default_image = get_option('default_team_img');
		if( $image ) { ?>
		<div class="team_img" style="background-image:url('<?php echo $image; ?>');"></div>
	<?php } elseif ($default_image !== '') { ?>
		<div class="team_img" style="background-image:url('<?php echo $default_image; ?>');"></div>
				<?php } else { ?>
		<div class="team_img" style="background-image:url('<?php echo WP_PLUGIN_URL.'/im-teampage/assets/no-img.jpg'; ?>');"></div>
	<?php } ?>
	<h4 class="team_name"><?php the_title(); ?></h4>
	<h5 class="team_title"><?php the_field('team_title'); ?></h5>
	<div class="team_bio"><?php the_content(); ?></div>
</div>
<?php endwhile; else : endif; wp_reset_query(); ?>

</div><br clear="all" />