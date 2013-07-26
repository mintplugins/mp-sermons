<?php
/**
 * Function which creates new Meta Box
 *
 */
function mp_sermons_embed_create_meta_box(){	
	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_sermons_embed_add_meta_box = array(
		'metabox_id' => 'mp_sermons_embed_metabox', 
		'metabox_title' => __( 'Embed Player', 'mp_jplayer'), 
		'metabox_posttype' => 'mp_sermon', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low' 
	);
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_sermons_embed_items_array = array(
		array(
			'field_id'			=> 'embed_height',
			'field_title' 	=> __( 'Height of Player', 'mp_jplayer'),
			'field_description' 	=> 'If your player looks cut off below, add more to the height of it here. NOTE: You must update the post to preview the change.',
			'field_type' 	=> 'number',
			'field_value' => '100',
		),
		
		array(
			'field_id'			=> 'preview_player',
			'field_title' 	=> __( 'Preview Player', 'mp_jplayer'),
			'field_description' 	=> '',
			'field_type' 	=> 'basictext',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'embed_code',
			'field_title' 	=> __( 'Embed Code (Copy and Paste)', 'mp_jplayer'),
			'field_description' 	=> '',
			'field_type' 	=> 'basictext',
			'field_value' => '',
		),
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_sermons_embed_add_meta_box = has_filter('mp_sermons_embed_meta_box_array') ? apply_filters( 'mp_sermons_embed_meta_box_array', $mp_sermons_embed_add_meta_box) : $mp_sermons_embed_add_meta_box;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_sermons_embed_items_array = has_filter('mp_sermons_embed_items_array') ? apply_filters( 'mp_sermons_embed_items_array', $mp_sermons_embed_items_array) : $mp_sermons_embed_items_array;
	
	
	/**
	 * Create Metabox class
	 */
	global $mp_sermons_embed_meta_box;
	$mp_sermons_embed_meta_box = new MP_CORE_Metabox($mp_sermons_embed_add_meta_box, $mp_sermons_embed_items_array);
}
add_action('plugins_loaded', 'mp_sermons_embed_create_meta_box');
