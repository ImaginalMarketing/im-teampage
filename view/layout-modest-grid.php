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

<div id="teampage-modest-grid" class="row small-up-1 medium-up-2 large-up-3">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="team_member column column-block">
	<?php
			$getimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

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
	<h4 class="team_name"><?php the_title(); ?></h4>
	<p class="team_title"><?php the_field('team_title'); ?></p>
</div>
<?php endwhile; else : endif; wp_reset_query(); ?>

</div><br clear="all" />