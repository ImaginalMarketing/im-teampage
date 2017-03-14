<?php
wp_reset_query();
// get titles + slugs, then push to their arrays
$args = array(
		'orderby'       => 'slug', 
		'order'         => 'DESC',
		);
$getterms = get_terms( 'team_skills', $args );
echo '<ul id="stylistSort">';
if ( ! empty( $getterms ) && ! is_wp_error( $getterms ) ){
	foreach ( $getterms as $getterm ) {
        $slug = $getterm->slug;
        $title = $getterm->name;
		echo '<li class="' . $slug . '"><label><input name="service_cat" type="radio" value="' . $slug . '">' . $title . '</label></li>';
	}
}

// put it all together
echo '</ul>';

?>
