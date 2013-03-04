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
 * http://moveplugins.com/settings-class/
 */

/**
* Create new tab
*/
$mp_sermon_settings->mp_core_new_tab(__('Sermon Settings' , 'my_plugin'), 'general');

function mp_sermon_settings_general_create(){
	
	//This variable must be the name of the variable that stores the class.
	global $mp_sermon_settings_class;
	
	register_setting(
		'mp_sermon_settings_general',
		'mp_sermon_settings_general',
		'mp_core_settings_validate'
	);
	
	add_settings_section(
		'general_settings',
		__( 'General Settings', 'mt_malachi' ),
		'__return_false',
		'mp_sermon_settings_general'
	);
	
	add_settings_field(
		'mp_sermons_bibly_popup',
		__( 'Bible Verse Popups', 'mt_malachi' ), 
		'mp_core_checkbox',
		'mp_sermon_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_bibly_popup',
			'value'       => mp_core_get_option( 'mp_sermon_settings_general',  'mp_sermons_bibly_popup' ),
			'preset_value'       => "popup",
			'description' => __( 'Do you want the bible verses to popup when rolled over?', 'mt_malachi' ),
			'registration'=> 'mp_sermon_settings_general',
		)
	);
		
	//additional general settings
	do_action('mp_sermon_settings_additional_general_settings_hook');
}
add_action( 'admin_init', 'mp_sermon_settings_general_create' );