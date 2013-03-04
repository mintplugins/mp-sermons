<?php
/**
 * Custom Post Types
 *
 * @package mp_sermon
 * @since mp_sermon 1.0
 */

/**
 * Preacher Labels for the persons tax when used on sermon pages
 */
function mp_sermon_person_labels($labels) {
	
	$post_type = isset($_GET['post_type']) ? $_GET['post_type'] : NULL;
	if ($post_type == 'mp_sermon'){
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Preachers', 'mp_sermons' ),
			'singular_name'       => __( 'Preacher', 'mp_sermons' ),
			'search_items'        => __( 'Search Preachers', 'mp_sermons' ),
			'all_items'           => __( 'All Preachers', 'mp_sermons' ),
			'parent_item'         => __( 'Parent Preacher', 'mp_sermons' ),
			'parent_item_colon'   => __( 'Parent Preacher:', 'mp_sermons' ),
			'edit_item'           => __( 'Edit Preacher', 'mp_sermons' ), 
			'update_item'         => __( 'Update Preacher', 'mp_sermons' ),
			'add_new_item'        => __( 'Add New Preacher', 'mp_sermons' ),
			'new_item_name'       => __( 'New Preacher Name', 'mp_sermons' ),
			'menu_name'           => __( 'Preachers', 'mp_sermons' ),
		); 
	}
	return $labels;
}
add_filter( 'mp_persons_labels', 'mp_sermon_person_labels' );

/**
 * Add Person (preacher) tax to the mp_sermons custom post type
 */
function mp_sermon_person_post_types($post_types) {
	array_push($post_types, 'mp_sermon');
	return $post_types;
}
add_filter( 'mp_persons_post_types', 'mp_sermon_person_post_types' );