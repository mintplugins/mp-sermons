<?php
/**
 * Custom Post Types
 *
 * @package mp_sermons
 * @since mp_sermons 1.0
 */

/**
 * Sermon Custom Post Type
 */
function mp_sermons_post_type() {
	
		$sermon_labels =  apply_filters( 'mp_sermons_labels', array(
			'name' 				=> 'Sermons',
			'singular_name' 	=> 'Sermon',
			'add_new' 			=> __('Add New', 'mp_sermons'),
			'add_new_item' 		=> __('Add New Sermon', 'mp_sermons'),
			'edit_item' 		=> __('Edit Sermon', 'mp_sermons'),
			'new_item' 			=> __('New Sermon', 'mp_sermons'),
			'all_items' 		=> __('All Sermons', 'mp_sermons'),
			'view_item' 		=> __('View Sermon', 'mp_sermons'),
			'search_items' 		=> __('Search Sermons', 'mp_sermons'),
			'not_found' 		=>  __('No Sermons found', 'mp_sermons'),
			'not_found_in_trash'=> __('No Sermons found in Trash', 'mp_sermons'), 
			'parent_item_colon' => '',
			'menu_name' 		=> __('Sermons', 'mp_sermons')
		) );
		
			
		$sermon_args = array(
			'labels' 			=> $sermon_labels,
			'public' 			=> true,
			'publicly_queryable'=> true,
			'show_ui' 			=> true, 
			'show_in_nav_menus' => false,
			'show_in_menu' 		=> true, 
			'menu_position'		=> 5,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'sermons' ),
			'capability_type' 	=> 'post',
			'has_archive' 		=> true, 
			'hierarchical' 		=> false,
			'supports' 			=> apply_filters('mp_sermons_people_supports', array( 'title', 'editor', 'thumbnail' ) ),
		); 
		register_post_type( 'mp_sermon', apply_filters( 'mp_sermons_people_post_type_args', $sermon_args ) );
}
add_action( 'init', 'mp_sermons_post_type', 100 );

/**
 * Change default title
 */
function mp_sermons_change_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'mp_sermons' == $screen->post_type ) {
          $title = __('Enter the Sermon\'s Title', 'mp_sermons');
     }
 
     return $title;
}
add_filter( 'enter_title_here', 'mp_sermons_change_default_title' );

/**
 * Disable jplayer menu
 */
function mp_sermons_remove_jplayer_menu() {
	remove_menu_page('edit.php?post_type=mp_jplayer');
}
add_action( 'admin_menu', 'mp_sermons_remove_jplayer_menu' );

/**
 * Preacher Taxonomy
 */
function mp_sermons_preacher_taxonomy() {  
		
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
  
		register_taxonomy(  
			'mp_preachers',  
			'mp_sermon',  
			array(  
				'hierarchical' => true,  
				'label' => 'Preachers',  
				'labels' => $labels,  
				'query_var' => true,  
				'with_front' => false, 
				'rewrite' => array('slug' => 'preachers')  
			)  
		);  
}  
add_action( 'init', 'mp_sermons_preacher_taxonomy' ); 

/**
 * Sermon Series Taxonomy
 */
 
function mp_sermons_series_taxonomy() {  
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Sermon Series', 'mp_sermons' ),
			'singular_name'       => __( 'Sermon Series', 'mp_sermons' ),
			'search_items'        => __( 'Search Sermon Series', 'mp_sermons' ),
			'all_items'           => __( 'All Sermon Series', 'mp_sermons' ),
			'parent_item'         => __( 'Parent Sermon Series', 'mp_sermons' ),
			'parent_item_colon'   => __( 'Parent Sermon Series:', 'mp_sermons' ),
			'edit_item'           => __( 'Edit Sermon Series', 'mp_sermons' ), 
			'update_item'         => __( 'Update Sermon Series', 'mp_sermons' ),
			'add_new_item'        => __( 'Add New Sermon Series', 'mp_sermons' ),
			'new_item_name'       => __( 'New Sermon Series Name', 'mp_sermons' ),
			'menu_name'           => __( 'Sermon Series', 'mp_sermons' ),
		); 	
  
		register_taxonomy(  
			'mp_sermons_groups',  
			'mp_sermon',  
			array(  
				'hierarchical' => true,  
				'label' => 'Sermon Series',  
				'labels' => $labels,  
				'query_var' => true,  
				'with_front' => false, 
				'rewrite' => array('slug' => 'series')  
			)  
		);  
}  
add_action( 'init', 'mp_sermons_series_taxonomy' );  

/**
 * Sermon Topic Taxonomy
 */
 
function mp_sermons_topic_taxonomy() {  
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Sermon Topics', 'mp_sermons' ),
			'singular_name'       => __( 'Sermon Topic', 'mp_sermons' ),
			'search_items'        => __( 'Search Sermon Topics', 'mp_sermons' ),
			'all_items'           => __( 'All Sermon Topics', 'mp_sermons' ),
			'parent_item'         => __( 'Parent Sermon Topic', 'mp_sermons' ),
			'parent_item_colon'   => __( 'Parent Sermon Topic:', 'mp_sermons' ),
			'edit_item'           => __( 'Edit Sermon Topic', 'mp_sermons' ), 
			'update_item'         => __( 'Update Sermon Topic', 'mp_sermons' ),
			'add_new_item'        => __( 'Add New Sermon Topic', 'mp_sermons' ),
			'new_item_name'       => __( 'New Sermon Topic Name', 'mp_sermons' ),
			'menu_name'           => __( 'Sermon Topics', 'mp_sermons' ),
			'separate_items_with_commas' => __( 'Separate topics with commas', 'mp_sermons' ),
		); 	
  
		register_taxonomy(  
			'mp_topics',  
			'mp_sermon',  
			array(  
				'hierarchical' => false,  
				'label' => 'Sermon Topics',  
				'labels' => $labels,  
				'query_var' => true,  
				'with_front' => false, 
				'rewrite' => array('slug' => 'topics')  
			)  
		);  
}  
add_action( 'init', 'mp_sermons_topic_taxonomy' );  

/**
 * Book of the Bible Taxonomy
 */
 
function mp_sermons_book_of_the_bible_taxonomy() {  
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Books of the Bible', 'mp_sermons' ),
			'singular_name'       => __( 'Book of the Bible', 'mp_sermons' ),
			'search_items'        => __( 'Search Books of the Bible', 'mp_sermons' ),
			'all_items'           => __( 'All books of the Bible', 'mp_sermons' ),
			'parent_item'         => __( 'Parent book of the Bible', 'mp_sermons' ),
			'parent_item_colon'   => __( 'Parent book of the Bible:', 'mp_sermons' ),
			'edit_item'           => __( 'Edit book of the Bible', 'mp_sermons' ), 
			'update_item'         => __( 'Update book of the Bible', 'mp_sermons' ),
			'add_new_item'        => __( 'Add New book of the Bible', 'mp_sermons' ),
			'new_item_name'       => __( 'New book of the Bible', 'mp_sermons' ),
			'menu_name'           => __( 'Books of the Bible', 'mp_sermons' ),
			'separate_items_with_commas' => __( 'Separate books of the Bible with commas', 'mp_sermons' ),
		); 	
  
		register_taxonomy(  
			'mp_books_of_the_bible',  
			'mp_sermon',  
			array(  
				'hierarchical' => false,  
				'label' => 'Books of the bible',  
				'labels' => $labels,  
				'query_var' => true,  
				'with_front' => false, 
				'rewrite' => array('slug' => 'books_of_the_bible')  
			)  
		);  
}  
add_action( 'init', 'mp_sermons_book_of_the_bible_taxonomy' );  