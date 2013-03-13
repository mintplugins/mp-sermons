<?php
/**
 * Function which creates new Meta Box
 *
 */
function mp_sermons_media_create_meta_box(){	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_sermons_media_add_meta_box = array(
		'metabox_id' => 'mp_sermons_media_metabox', 
		'metabox_title' => __( 'Sermon Media', 'mp_sermons'), 
		'metabox_posttype' => 'mp_sermon', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low' 
	);
	
	/**
	 * Custom filter to allow for themes to change the description of the sermon thumbnail. This allows for custom size description. IE: 200px by 100px
	 */
	$mp_sermons_media_thumbnail_description = has_filter('mp_sermons_media_thumbnail_description') ? apply_filters( 'mp_sermons_media_thumbnail_description', $mp_sermons_media_thumbnail_description) : 'Upload a poster image for this media (Optional)';
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_sermons_media_items_array = array(
		array(
			'field_id'			=> 'title',
			'field_title' 	=> __( 'Media\'s Title', 'mp_jplayer'),
			'field_description' 	=> 'Enter the title of this media',
			'field_type' 	=> 'textbox',
			'field_value' => '',
			'field_repeater' => 'jplayer'
		),
		array(
			'field_id'			=> 'poster',
			'field_title' 	=> __( 'Media\'s Poster', 'mp_jplayer'),
			'field_description' 	=> $mp_sermons_media_thumbnail_description,
			'field_type' 	=> 'mediaupload',
			'field_value' => '',
			'field_repeater' => 'jplayer'
		)
	);
	if (mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_mp3_type_3' ) || !mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_mp3_type_3_null' ) ){
		array_push($mp_sermons_media_items_array, 
			array(
				'field_id'			=> 'mp3',
				'field_title' 	=> __( 'Media\'s MP3', 'mp_jplayer'),
				'field_description' 	=> 'Insert your media\'s MP3 file here (Optional)',
				'field_type' 	=> 'mediaupload',
				'field_value' => '',
				'field_repeater' => 'jplayer'
			)
		);
	}
	if (mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_ogv_type_3' )){
		array_push($mp_sermons_media_items_array, 
			array(
				'field_id'			=> 'ogv',
				'field_title' 	=> __( 'Media\'s OGG/OGV File', 'mp_jplayer'),
				'field_description' 	=> 'Insert your media\'s OGG/OGV file here (Optional)',
				'field_type' 	=> 'mediaupload',
				'field_value' => '',
				'field_repeater' => 'jplayer'
			)
		);
	}
	if (mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_mp4_type_3' ) || !mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_mp4_type_3_null' ) ){
		array_push($mp_sermons_media_items_array, 
			array(
				'field_id'			=> 'm4v',
				'field_title' 	=> __( 'Media\'s MP4/M4V Video File', 'mp_jplayer'),
				'field_description' 	=> 'Insert your media\'s MP4/M4V file here (Optional)',
				'field_type' 	=> 'mediaupload',
				'field_value' => '',
				'field_repeater' => 'jplayer'
			)
		);
	}
	if (mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_webmv_type_3' )){
		array_push($mp_sermons_media_items_array, 
			array(
				'field_id'			=> 'webmv',
				'field_title' 	=> __( 'Media\'s WEBM File', 'mp_jplayer'),
				'field_description' 	=> 'Insert your media\'s WEBM file here (Optional)',
				'field_type' 	=> 'mediaupload',
				'field_value' => '',
				'field_repeater' => 'jplayer'
			)
		);
	}
	
	array_push($mp_sermons_media_items_array, 
		array(
			'field_id'			=> 'free',
			'field_title' 	=> __( 'Downloadable', 'mp_jplayer'),
			'field_description' 	=> 'Is this media file able to be downloaded?',
			'field_type' 	=> 'checkbox',
			'field_value' => 'true',
			'field_repeater' => 'jplayer'
		)
	);
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_sermons_media_add_meta_box = has_filter('mp_sermons_media_meta_box_array') ? apply_filters( 'mp_sermons_media_meta_box_array', $mp_sermons_media_add_meta_box) : $mp_sermons_media_add_meta_box;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_sermons_media_items_array = has_filter('mp_sermons_media_items_array') ? apply_filters( 'mp_sermons_media_items_array', $mp_sermons_media_items_array) : $mp_sermons_media_items_array;
	
	
	/**
	 * Create Metabox class
	 */
	global $mp_sermons_media_meta_box;
	$mp_sermons_media_meta_box = new MP_CORE_Metabox($mp_sermons_media_add_meta_box, $mp_sermons_media_items_array);
}
add_action('plugins_loaded', 'mp_sermons_media_create_meta_box');