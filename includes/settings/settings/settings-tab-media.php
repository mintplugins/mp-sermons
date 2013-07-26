<?php			
/**
 * This is the code that will create a new tab of settings for your page.
 * To create a new tab and set up this page:
 * Step 1. Duplicate this page and include it in the "class initialization function".
 * Step 1. Do a find-and-replace for the term 'mp_sermon_settings' and replace it with the slug you set when initializing this class
 * Step 2. Do a find and replace for 'media' and replace it with your desired tab slug
 * Step 3. Go to line 17 and set the title for this tab.
 * Step 4. Begin creating your custom options on line 30
 * Go here for full setup instructions: 
 * http://moveplugins.com/settings-class/
 */

/**
* Create new tab
*/
function mp_sermon_settings_media_new_tab($active_tab){
	
	//Create array containing the title and slug for this new tab
	$tab_info = array( 'title' => __('Media Types' , 'mp_sermons'), 'slug' => 'media' );
	
	global $mp_sermon_settings;
	$mp_sermon_settings->new_tab( $active_tab, $tab_info );
	
}
//Hook into the new tab hook filter contained in the settings class in the Move Plugins Core
add_action('mp_sermon_settings_new_tab_hook', 'mp_sermon_settings_media_new_tab');

/**
* Create settings
*/
function mp_sermon_settings_media_create(){
	
	//This variable must be the name of the variable that stores the class.
	global $mp_sermon_settings_class;
	
	register_setting(
		'mp_sermon_settings_media',
		'mp_sermon_settings_media',
		'mp_core_settings_validate'
	);
	
	add_settings_section(
		'media_settings',
		__( 'Choose your media types', 'mp_sermons' ),
		'__return_false',
		'mp_sermon_settings_media'
	);
	
	add_settings_field(
		'mp_sermons_mp3_type_3',
		__( 'MP3s', 'mp_sermons' ), 
		'mp_core_checkbox',
		'mp_sermon_settings_media',
		'media_settings',
		array(
			'name'        => 'mp_sermons_mp3_type_3',
			'value'       => mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_mp3_type_3' ),
			'preset_value'       => "mp3",
			'description' => __( 'Do you want the ability to upload an MP3 to each sermon?', 'mp_sermons' ),
			'registration'=> 'mp_sermon_settings_media',
			'checked_by_default' => 'true'
		)
	);
	
	add_settings_field(
		'mp_sermons_ogv_type_3',
		__( 'OGVs', 'mp_sermons' ), 
		'mp_core_checkbox',
		'mp_sermon_settings_media',
		'media_settings',
		array(
			'name'        => 'mp_sermons_ogv_type_3',
			'value'       => mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_ogv_type_3' ),
			'preset_value'       => "ogv",
			'description' => __( 'Do you want the ability to upload an OGV to each sermon?', 'mp_sermons' ),
			'registration'=> 'mp_sermon_settings_media',
		)
	);
	
	add_settings_field(
		'mp_sermons_mp4_type_3',
		__( 'MP4s', 'mp_sermons' ), 
		'mp_core_checkbox',
		'mp_sermon_settings_media',
		'media_settings',
		array(
			'name'        => 'mp_sermons_mp4_type_3',
			'value'       => mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_mp4_type_3' ),
			'preset_value'       => "mp4",
			'description' => __( 'Do you want the ability to upload an MP4 to each sermon?', 'mp_sermons' ),
			'registration'=> 'mp_sermon_settings_media',
			'checked_by_default' => 'true'
		)
	);
	
	add_settings_field(
		'mp_sermons_webmv_type_3',
		__( 'WEBMVs', 'mp_sermons' ), 
		'mp_core_checkbox',
		'mp_sermon_settings_media',
		'media_settings',
		array(
			'name'        => 'mp_sermons_webmv_type_3',
			'value'       => mp_core_get_option( 'mp_sermon_settings_media',  'mp_sermons_webmv_type_3' ),
			'preset_value'       => "webmv",
			'description' => __( 'Do you want the ability to upload an WEBMV to each sermon?', 'mp_sermons' ),
			'registration'=> 'mp_sermon_settings_media',
		)
	);
		
	//additional media settings
	do_action('mp_sermon_settings_additional_media_settings_hook');
}
add_action( 'admin_init', 'mp_sermon_settings_media_create' );