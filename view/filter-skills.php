<?php
// declare your shit
$slugs = array();
$titles = array();
$terms = array();
$i = 0;
// get titles + slugs, then push to their arrays
$args = array(
		'orderby'       => 'slug', 
		'order'         => 'DESC',
		);
$getterms = get_terms( 'team_skills', $args );
if ( ! empty( $getterms ) && ! is_wp_error( $getterms ) ){
	foreach ( $getterms as $getterm ) {
        $i++;
        $slugs[] = $getterm->slug;
        $titles[] = $getterm->name;
        // stack slugs for Isotope
        $output = array_slice($slugs, 0, $i);
        array_push($terms, $output);
	}
    $terms = array_reverse($terms);
    $titles = array_reverse($titles);
}

// put it all together
echo '<ul id="stylistSort">';
$x = -1;
foreach ($titles as $title) {
    // count up, parse slugs, print filter
    $x++;
    $slug = implode(",", $terms[$x]);
    echo '<li class="hair"><label><input name="service_cat" type="radio" value="' . $slug . '">' . $title . '</label></li>';
}
echo '</ul>';

?>


