<?php			
/**
 * This is the code that will create a new tab of settings for your page.
 * To create a new tab and set up this page:
 * Step 1. Duplicate this page and include it in the "class initialization function".
 * Step 1. Do a find-and-replace for the term 'my_plugin_settings' and replace it with the slug you set when initializing this class
 * Step 2. Do a find and replace for 'general' and replace it with your desired tab slug
 * Step 3. Go to line 17 and set the title for this tab.
 * Step 4. Begin creating your custom options on line 30
 * Go here for full setup instructions: 
 * http://mintplugins.com/settings-class/
 */

/**
* Create new tab
*/
function mp_sermon_podcast_settings_general_new_tab( $active_tab ){
	
	//Create array containing the title and slug for this new tab
	$tab_info = array( 'title' => __('Podcast Settings' , 'mp_sermons'), 'slug' => 'general' );
	
	global $mp_sermon_podcast_settings; $mp_sermon_podcast_settings->new_tab( $active_tab, $tab_info );
		
}
//Hook into the new tab hook filter contained in the settings class in the Mint Plugins Core
add_action('mp_sermon_podcast_settings_new_tab_hook', 'mp_sermon_podcast_settings_general_new_tab');

/**
* Create settings
*/
function mp_sermon_podcast_settings_general_create(){
	
	//This variable must be the name of the variable that stores the class.
	global $mp_sermon_podcast_settings_class;
	
	register_setting(
		'mp_sermon_podcast_settings_general',
		'mp_sermon_podcast_settings_general',
		'mp_core_settings_validate'
	);
	
	add_settings_section(
		'general_settings',
		__( 'General Settings', 'mp_sermons' ),
		'__return_false',
		'mp_sermon_podcast_settings_general'
	);
	
	add_settings_field(
		'mp_sermons_podcast_title',
		__( 'Podcast Title', 'mp_sermons' ), 
		'mp_core_textbox',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_title',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_title' ),
			'description' => __( 'Enter the title of your podcast.', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
		)
	);
	
	add_settings_field(
		'mp_sermons_podcast_subtitle',
		__( 'Podcast Subtitle', 'mp_sermons' ), 
		'mp_core_textbox',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_subtitle',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_subtitle' ),
			'description' => __( 'Enter a short subtitle for the podcast.', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
		)
	);
	
	add_settings_field(
		'mp_sermons_podcast_author',
		__( 'Podcast Author', 'mp_sermons' ), 
		'mp_core_textbox',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_author',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_author' ),
			'description' => __( 'Enter the author of the podcast.', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
		)
	);
	
	add_settings_field(
		'mp_sermons_podcast_description',
		__( 'Podcast Description', 'mp_sermons' ), 
		'mp_core_textarea',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_description',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_description' ),
			'description' => __( 'Enter the description of the podcast.', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
		)
	);
	
	add_settings_field(
		'mp_sermons_podcast_email',
		__( 'Podcast Email', 'mp_sermons' ), 
		'mp_core_email',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_email',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_email' ),
			'description' => __( 'Enter the email contact for the podcast.', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
		)
	);
	
	add_settings_field(
		'mp_sermons_podcast_image',
		__( 'Podcast Image', 'mp_sermons' ), 
		'mp_core_mediaupload',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_image',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_image' ),
			'description' => __( 'Upload an image to represent the podcast. Recommended size 600 x 600 Pixels', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
		)
	);
	
	add_settings_field(
		'mp_sermons_podcast_cat_1',
		__( 'iTunes Category', 'mp_sermons' ), 
		'mp_core_select',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_cat_1',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_cat_1' ),
			'description' => __( 'Select a category for your podcast', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
			'options'      => array("Arts", "Business", "Comedy", "Education", "Games &amp; Hobbies", "Government &amp; Organizations", "Health", "Kids &amp; Family", "Music", "News &amp; Politics", "Religion &amp; Spirituality", "Science &amp; Medicine", "Society &amp; Culture", "Sports &amp; Recreation", "Technology", "TV &amp; Film")
		)
	);
	
	add_settings_field(
		'mp_sermons_podcast_cat_2',
		__( 'iTunes Sub-Category', 'mp_sermons' ), 
		'mp_core_select',
		'mp_sermon_podcast_settings_general',
		'general_settings',
		array(
			'name'        => 'mp_sermons_podcast_cat_2',
			'value'       => mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_cat_2' ),
			'description' => __( 'Select a sub-category for your podcast', 'mp_sermons' ),
			'registration'=> 'mp_sermon_podcast_settings_general',
			'options'=>  array("Design", "Fashion &amp; Beauty", "Food", "Literature", "Performing Arts", "Visual Arts", "Business News", "Careers", "Investing", "Management &amp; Marketing", "Shopping", "Education", "Education Technology", "Higher Education", "K-12", "Language Courses", "Training", "Automotive", "Aviation", "Hobbies", "Other Games", "Video Games", "Local", "National", "Non-Profit", "Regional", "Alternative Health", "Fitness &amp; Nutrition", "Self-Help", "Sexuality", "Buddhism", "Christianity", "Hinduism", "Islam", "Judaism", "Other", "Spirituality", "Medicine", "Natural Sciences", "Social Sciences", "History", "Personal Journals", "Philosophy", "Places &amp; Travel", "Amateur", "College &amp; High School", "Outdoor", "Professional", "Gadgets", "Tech News", "Podcasting", "Software How-To")
		)
	);
	
	
	
	
	//additional general settings
	do_action('mp_sermon_podcast_settings_additional_general_settings_hook');
}
add_action( 'admin_init', 'mp_sermon_podcast_settings_general_create' );