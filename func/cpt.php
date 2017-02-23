<?php

// Register People Post Type
function people_cpt() {
	$labels = array(
		'name'                => _x( 'People', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Team Members', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Team Member:', 'text_domain' ),
		'all_items'           => __( 'All People', 'text_domain' ),
		'view_item'           => __( 'View Team Member', 'text_domain' ),
		'add_new_item'        => __( 'Add New Team Member', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Team Member', 'text_domain' ),
		'update_item'         => __( 'Update Team Member', 'text_domain' ),
		'search_items'        => __( 'Search Team Members', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'people', 'text_domain' ),
		'description'         => __( 'Directory of team members', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'taxonomies'          => array( 'groups' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-groups',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
     	'exclude_from_search' => true
	);
	register_post_type( 'people', $args );
}
add_action( 'init', 'people_cpt', 0 );


// Register Location Taxonomy
function team_location() {
	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Locations', 'text_domain' ),
		'all_items'                  => __( 'All Locations', 'text_domain' ),
		'parent_item'                => __( 'Parent Location', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Location:', 'text_domain' ),
		'new_item_name'              => __( 'New Location Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Location', 'text_domain' ),
		'edit_item'                  => __( 'Edit Location', 'text_domain' ),
		'update_item'                => __( 'Update Location', 'text_domain' ),
		'view_item'                  => __( 'View Location', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate locations with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove locations', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Locations', 'text_domain' ),
		'search_items'               => __( 'Search Locations', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No locations', 'text_domain' ),
		'items_list'                 => __( 'Locations list', 'text_domain' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'team_location', array( 'people' ), $args );
}
add_action( 'init', 'team_location', 0 );


// Register Experience Taxonomy
function team_experience() {
	$labels = array(
		'name'                       => _x( 'Experience', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Experience', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Experience', 'text_domain' ),
		'all_items'                  => __( 'All Experience', 'text_domain' ),
		'parent_item'                => __( 'Parent Experience', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Experience:', 'text_domain' ),
		'new_item_name'              => __( 'New Experience Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Experience', 'text_domain' ),
		'edit_item'                  => __( 'Edit Experience', 'text_domain' ),
		'update_item'                => __( 'Update Experience', 'text_domain' ),
		'view_item'                  => __( 'View Experience', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate experience with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove experience', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Experience', 'text_domain' ),
		'search_items'               => __( 'Search Experience', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No locations', 'text_domain' ),
		'items_list'                 => __( 'Experience list', 'text_domain' ),
		'items_list_navigation'      => __( 'Experience list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'team_experience', array( 'people' ), $args );
}
add_action( 'init', 'team_experience', 0 );
// Change locations metabox
add_action( 'admin_menu', 'experience_remove_meta_box');
function experience_remove_meta_box(){
	remove_meta_box('tagsdiv-team_experience', 'people', 'normal');
}
//Add new taxonomy meta box
add_action( 'add_meta_boxes', 'experience_add_meta_box');
function experience_add_meta_box() {
	add_meta_box( 'team_experiencediv', 'Team Member Experience','experience_metabox','people' ,'normal','core');
}
//Callback to set up the metabox
function experience_metabox( $post ) {
    //Get taxonomy and terms
    $taxonomy = 'team_experience';
    //Set up the taxonomy object and get terms
    $tax = get_taxonomy($taxonomy);
    $terms = get_terms($taxonomy,array('hide_empty' => 0));
    //Name of the form
    $name = 'tax_input[' . $taxonomy . ']';
    //Get current and popular terms
    $popular = get_terms( $taxonomy, array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hierarchical' => false ) );
    $postterms = get_the_terms( $post->ID,$taxonomy );
    $current = ($postterms ? array_pop($postterms) : false);
    $current = ($current ? $current->term_id : 0);
    ?>
    <div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
        <!-- Display tabs-->
        <ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
            <li class="tabs"><a href="#<?php echo $taxonomy; ?>-all" tabindex="3"><?php echo $tax->labels->all_items; ?></a></li>
        </ul>
        <!-- Display taxonomy terms -->
        <div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
            <ul id="<?php echo $taxonomy; ?>checklist" class="list:<?php echo $taxonomy?> categorychecklist form-no-clear">
                <?php   foreach($terms as $term){
                    $id = $taxonomy.'-'.$term->term_id;
                    echo "<li id='$id'><label class='selectit'>";
                    echo "<input type='radio' id='in-$id' name='{$name}'".checked($current,$term->term_id,false)."value='$term->name' />$term->name<br />";
                   echo "</label></li>";
                } ?>
           </ul>
        </div>
    </div>
<?php }



// Register Experience Taxonomy
function team_skills() {
	$labels = array(
		'name'                       => _x( 'Skills', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Skills', 'text_domain' ),
		'all_items'                  => __( 'All Skills', 'text_domain' ),
		'parent_item'                => __( 'Parent Skill', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Skill:', 'text_domain' ),
		'new_item_name'              => __( 'New Skill Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Skill', 'text_domain' ),
		'edit_item'                  => __( 'Edit Skill', 'text_domain' ),
		'update_item'                => __( 'Update Skill', 'text_domain' ),
		'view_item'                  => __( 'View Skill', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate skills with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove skills', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Skills', 'text_domain' ),
		'search_items'               => __( 'Search Skills', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No locations', 'text_domain' ),
		'items_list'                 => __( 'Skill list', 'text_domain' ),
		'items_list_navigation'      => __( 'Skill list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'team_skills', array( 'people' ), $args );
}
add_action( 'init', 'team_skills', 0 );