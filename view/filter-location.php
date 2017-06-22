<?php
wp_reset_query();
// get titles + slugs, then push to their arrays
$args = array(
		'orderby'       => 'slug', 
		'order'         => 'ASC',
		);
$getterms = get_terms( 'team_location', $args );

// calculate columns
$countterms = wp_count_terms( 'team_location', $args );
if ( $countterms == 1 ) {
	$columns = 'medium-12';
} elseif ( $countterms == 2  ) {
	$columns = 'medium-6';
} elseif ( $countterms == 3  ) {
	$columns = 'medium-4';
} elseif ( $countterms == 4  ) {
	$columns = 'medium-3';
} else { $columns = 'medium-4'; }

// output filter
if ( ! empty( $getterms ) && ! is_wp_error( $getterms ) ){
	foreach ( $getterms as $getterm ) {
        $slug = $getterm->slug;
        $title = $getterm->name;
		echo '<label class="small-12 '.$columns.' columns"><input id="' . $slug . '" name="location" type="radio" value="' . $slug . '" /><span>' . $title . '</span></label>';
	}
}



?>


