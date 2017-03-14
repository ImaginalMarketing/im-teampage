<?php
wp_reset_query();
// get titles + slugs, then push to their arrays
$args = array(
		'orderby'       => 'slug', 
		'order'         => 'DESC',
		);
$getterms = get_terms( 'team_location', $args );

if ( ! empty( $getterms ) && ! is_wp_error( $getterms ) ){
	foreach ( $getterms as $getterm ) {
        $slug = $getterm->slug;
        $title = $getterm->name;
		echo '<label class="small-12 medium-4 columns"><input id="' . $slug . '" name="location" type="radio" value="' . $slug . '" /><span>' . $title . '</span></label>';
	}
}



?>


