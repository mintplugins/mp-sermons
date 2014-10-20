<?php			
/**
 * This is the code that will create a new tab of settings for your page.
 * To create a new tab and set up this page:
 * Step 1. Duplicate this page and include it in the "class initialization function".
 * Step 1. Do a find-and-replace for the term 'mp_sermon_settings' and replace it with the slug you set when initializing this class
 * Step 2. Do a find and replace for 'general' and replace it with your desired tab slug
 * Step 3. Go to line 17 and set the title for this tab.
 * Step 4. Begin creating your custom options on line 30
 * Go here for full setup instructions: 
 * http://mintplugins.com/settings-class/
 */


/**
* Create new tab
*/
function mp_sermon_settings_general_new_tab( $active_tab ){
	
	//Create array containing the title and slug for this new tab
	$tab_info = array( 'title' => __('Sermon Settings' , 'mp_sermons'), 'slug' => 'general' );
	
	global $mp_sermon_settings; $mp_sermon_settings->new_tab( $active_tab, $tab_info );
		
}
//Hook into the new tab hook filter contained in the settings class in the Mint Plugins Core
add_action('mp_sermon_settings_new_tab_hook', 'mp_sermon_settings_general_new_tab');

/**
* Create settings
*/
function mp_sermon_settings_general_create(){
	
	
	register_setting(
		'mp_sermon_settings_general',
		'mp_sermon_settings_general',
		'mp_core_settings_validate'
	);
	
	add_settings_section(
		'general_settings',
		__( 'General Settings', 'mp_sermons' ),
		'__return_false',
		'mp_sermon_settings_general'
	);
	
	add_settings_field(
		'mp_sermons_bibly_popup',
		__( 'Bible Verse Popups', 'mp_sermons' ), 
		'mp_core_checkbox',
		'mp_sermon_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_bibly_popup',
			'value'       => mp_core_get_option( 'mp_sermon_settings_general',  'mp_sermons_bibly_popup' ),
			'preset_value'       => "popup",
			'description' => __( 'Do you want the bible verses to popup when rolled over?', 'mp_sermons' ),
			'registration'=> 'mp_sermon_settings_general',
		)
	);
		
	//additional general settings
	do_action('mp_sermon_settings_additional_general_settings_hook');
}
add_action( 'admin_init', 'mp_sermon_settings_general_create' );