<?php
/**
 * Function which creates new Meta Box
 *
 */
function mp_sermons_create_meta_box(){	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_sermons_add_meta_box = array(
		'metabox_id' => 'mp_sermons_metabox', 
		'metabox_title' => __( 'Sermon Settings', 'mp_sermons'), 
		'metabox_posttype' => 'mp_sermon', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low' 
	);
	
	/**
	 * Custom filter to allow for themes to change the description of the sermon thumbnail. This allows for custom size description. IE: 200px by 100px
	 */
	$mp_sermons_thumbnail_description = has_filter('mp_sermons_thumbnail_description') ? apply_filters( 'mp_sermons_thumbnail_description', $mp_sermons_thumbnail_description) : 'Upload a thumbnail of this sermon (Optional)';
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_sermons_items_array = array(
		array(
			'field_id'			=> 'sermon_video_url',
			'field_title' 	=> __( 'Sermon Video URL', 'mp_sermons'),
			'field_description' 	=> 'If you have uploaded your sermon to YouTube, Vimeo, or any other online video service, enter the URL to the video page here.',
			'field_type' 	=> 'url',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'sermon_bible_verses',
			'field_title' 	=> __( 'Sermon Bible Verses', 'mp_sermons'),
			'field_description' 	=> 'Enter the bible verses used in this sermon. EG: Galatians 5:1-10',
			'field_type' 	=> 'textbox',
			'field_value' => '',
		),
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_sermons_add_meta_box = has_filter('mp_sermons_meta_box_array') ? apply_filters( 'mp_sermons_meta_box_array', $mp_sermons_add_meta_box) : $mp_sermons_add_meta_box;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_sermons_items_array = has_filter('mp_sermons_items_array') ? apply_filters( 'mp_sermons_items_array', $mp_sermons_items_array) : $mp_sermons_items_array;
	
	
	/**
	 * Create Metabox class
	 */
	global $mp_sermons_meta_box;
	$mp_sermons_meta_box = new MP_CORE_Metabox($mp_sermons_add_meta_box, $mp_sermons_items_array);
}
add_action('plugins_loaded', 'mp_sermons_create_meta_box');