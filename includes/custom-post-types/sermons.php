<?php
/**
 * Custom Post Types
 *
 * @package mp_sermon
 * @since mp_sermon 1.0
 */

/**
 * Sermon Custom Post Type
 */
function mp_sermon_post_type() {
	
		$people_labels =  apply_filters( 'mp_sermon_labels', array(
			'name' 				=> 'Sermons',
			'singular_name' 	=> 'Sermon',
			'add_new' 			=> __('Add New', 'mp_sermon'),
			'add_new_item' 		=> __('Add New Sermon', 'mp_sermon'),
			'edit_item' 		=> __('Edit Sermon', 'mp_sermon'),
			'new_item' 			=> __('New Sermon', 'mp_sermon'),
			'all_items' 		=> __('All Sermons', 'mp_sermon'),
			'view_item' 		=> __('View Sermon', 'mp_sermon'),
			'search_items' 		=> __('Search Sermons', 'mp_sermon'),
			'not_found' 		=>  __('No Sermons found', 'mp_sermon'),
			'not_found_in_trash'=> __('No Sermons found in Trash', 'mp_sermon'), 
			'parent_item_colon' => '',
			'menu_name' 		=> __('Sermons', 'mp_sermon')
		) );
		
			
		$people_args = array(
			'labels' 			=> $people_labels,
			'public' 			=> true,
			'publicly_queryable'=> true,
			'show_ui' 			=> true, 
			'show_in_menu' 		=> true, 
			'menu_position'		=> 5,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'sermons' ),
			'capability_type' 	=> 'post',
			'has_archive' 		=> true, 
			'hierarchical' 		=> false,
			'supports' 			=> apply_filters('mp_sermon_people_supports', array( 'title', 'editor', 'thumbnail' ) ),
		); 
		register_post_type( 'mp_sermon', apply_filters( 'mp_sermon_people_post_type_args', $people_args ) );
}
add_action( 'init', 'mp_sermon_post_type', 100 );

/**
 * Change default title
 */
function mp_sermon_change_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'mp_sermon' == $screen->post_type ) {
          $title = __('Enter the Sermon\'s Title', 'mp_sermon');
     }
 
     return $title;
}
add_filter( 'enter_title_here', 'mp_sermon_change_default_title' );

/**
 * Preacher Taxonomy
 */
function mp_sermon_preacher_taxonomy() {  
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Preachers', 'mp_sermon' ),
			'singular_name'       => __( 'Preacher', 'mp_sermon' ),
			'search_items'        => __( 'Search Preachers', 'mp_sermon' ),
			'all_items'           => __( 'All Preachers', 'mp_sermon' ),
			'parent_item'         => __( 'Parent Preacher', 'mp_sermon' ),
			'parent_item_colon'   => __( 'Parent Preacher:', 'mp_sermon' ),
			'edit_item'           => __( 'Edit Preacher', 'mp_sermon' ), 
			'update_item'         => __( 'Update Preacher', 'mp_sermon' ),
			'add_new_item'        => __( 'Add New Preacher', 'mp_sermon' ),
			'new_item_name'       => __( 'New Preacher Name', 'mp_sermon' ),
			'menu_name'           => __( 'Preachers', 'mp_sermon' ),
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
add_action( 'init', 'mp_sermon_preacher_taxonomy' ); 

/**
 * Sermon Series Taxonomy
 */
 
function mp_sermon_person_group_taxonomy() {  
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Sermon Series', 'mp_sermon' ),
			'singular_name'       => __( 'Sermon Series', 'mp_sermon' ),
			'search_items'        => __( 'Search Sermon Series', 'mp_sermon' ),
			'all_items'           => __( 'All Sermon Series', 'mp_sermon' ),
			'parent_item'         => __( 'Parent Sermon Series', 'mp_sermon' ),
			'parent_item_colon'   => __( 'Parent Sermon Series:', 'mp_sermon' ),
			'edit_item'           => __( 'Edit Sermon Series', 'mp_sermon' ), 
			'update_item'         => __( 'Update Sermon Series', 'mp_sermon' ),
			'add_new_item'        => __( 'Add New Sermon Series', 'mp_sermon' ),
			'new_item_name'       => __( 'New Sermon Series Name', 'mp_sermon' ),
			'menu_name'           => __( 'Sermon Series', 'mp_sermon' ),
		); 	
  
		register_taxonomy(  
			'mp_sermon_groups',  
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
add_action( 'init', 'mp_sermon_person_group_taxonomy' );  

/**
 * Sermon Topic Taxonomy
 */
 
function mp_sermon_topic_taxonomy() {  
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Sermon Topics', 'mp_sermon' ),
			'singular_name'       => __( 'Sermon Topic', 'mp_sermon' ),
			'search_items'        => __( 'Search Sermon Topics', 'mp_sermon' ),
			'all_items'           => __( 'All Sermon Topics', 'mp_sermon' ),
			'parent_item'         => __( 'Parent Sermon Topic', 'mp_sermon' ),
			'parent_item_colon'   => __( 'Parent Sermon Topic:', 'mp_sermon' ),
			'edit_item'           => __( 'Edit Sermon Topic', 'mp_sermon' ), 
			'update_item'         => __( 'Update Sermon Topic', 'mp_sermon' ),
			'add_new_item'        => __( 'Add New Sermon Topic', 'mp_sermon' ),
			'new_item_name'       => __( 'New Sermon Topic Name', 'mp_sermon' ),
			'menu_name'           => __( 'Sermon Topics', 'mp_sermon' ),
			'separate_items_with_commas' => __( 'Separate topics with commas', 'mp_sermon' ),
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
add_action( 'init', 'mp_sermon_topic_taxonomy' );  

/**
 * Book of the Bible Taxonomy
 */
 
function mp_sermon_book_of_the_bible_taxonomy() {  
		
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'                => __( 'Books of the Bible', 'mp_sermon' ),
			'singular_name'       => __( 'Book of the Bible', 'mp_sermon' ),
			'search_items'        => __( 'Search Books of the Bible', 'mp_sermon' ),
			'all_items'           => __( 'All books of the Bible', 'mp_sermon' ),
			'parent_item'         => __( 'Parent book of the Bible', 'mp_sermon' ),
			'parent_item_colon'   => __( 'Parent book of the Bible:', 'mp_sermon' ),
			'edit_item'           => __( 'Edit book of the Bible', 'mp_sermon' ), 
			'update_item'         => __( 'Update book of the Bible', 'mp_sermon' ),
			'add_new_item'        => __( 'Add New book of the Bible', 'mp_sermon' ),
			'new_item_name'       => __( 'New book of the Bible', 'mp_sermon' ),
			'menu_name'           => __( 'Books of the Bible', 'mp_sermon' ),
			'separate_items_with_commas' => __( 'Separate books of the Bible with commas', 'mp_sermon' ),
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
add_action( 'init', 'mp_sermon_book_of_the_bible_taxonomy' );  