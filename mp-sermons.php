<?php
/*
Plugin Name: MP Sermons
Plugin URI: http://moveplugins.com
Description: Save sermons in series' with audio, video, text and more. 
Version: 1.0.0.7
Author: Move Plugins
Author URI: http://moveplugins.com
Text Domain: mp_sermons
Domain Path: languages
License: GPL2
*/

/*  Copyright 2012  Phil Johnston  (email : phil@moveplugins.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Move Plugins Core.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Move Plugins Core, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
// Plugin version
if( !defined( 'MP_SERMONS_VERSION' ) )
	define( 'MP_SERMONS_VERSION', '1.0.0.0' );

// Plugin Folder URL
if( !defined( 'MP_SERMONS_PLUGIN_URL' ) )
	define( 'MP_SERMONS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Plugin Folder Path
if( !defined( 'MP_SERMONS_PLUGIN_DIR' ) )
	define( 'MP_SERMONS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Plugin Root File
if( !defined( 'MP_SERMONS_PLUGIN_FILE' ) )
	define( 'MP_SERMONS_PLUGIN_FILE', __FILE__ );

/*
|--------------------------------------------------------------------------
| GLOBALS
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| INTERNATIONALIZATION
|--------------------------------------------------------------------------
*/

function mp_sermons_textdomain() {

	// Set filter for plugin's languages directory
	$mp_sermons_lang_dir = dirname( plugin_basename( MP_SERMONS_PLUGIN_FILE ) ) . '/languages/';
	$mp_sermons_lang_dir = apply_filters( 'mp_sermons_languages_directory', $mp_sermons_lang_dir );


	// Traditional WordPress plugin locale filter
	$locale        = apply_filters( 'plugin_locale',  get_locale(), 'mp-sermons' );
	$mofile        = sprintf( '%1$s-%2$s.mo', 'mp-sermons', $locale );

	// Setup paths to current locale file
	$mofile_local  = $mp_sermons_lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/mp-sermons/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		// Look in global /wp-content/languages/mp_sermons folder
		load_textdomain( 'mp_sermons', $mofile_global );
	} elseif ( file_exists( $mofile_local ) ) {
		// Look in local /wp-content/plugins/message_bar/languages/ folder
		load_textdomain( 'mp_sermons', $mofile_local );
	} else {
		// Load the default language files
		load_plugin_textdomain( 'mp_sermons', false, $mp_sermons_lang_dir );
	}

}
add_action( 'init', 'mp_sermons_textdomain', 1 );

/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/
function mp_sermons_include_files(){
	/**
	 * If mp_core isn't active, stop and install it now
	 */
	if (!function_exists('mp_core_textdomain')){
		
		/**
		 * Include Plugin Checker
		 */
		require( MP_SERMONS_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-checker.php' );
		
		/**
		 * Include Plugin Installer
		 */
		require( MP_SERMONS_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-installer.php' );
		
		/**
		 * Check if wp_core in installed
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-core-check.php' );
		
	}
	/**
	 * Otherwise, check for mp_jplayer
	 */
	elseif(!function_exists('mp_jplayer_textdomain')){
		
		/**
		 * Check if mp_jplayer in installed
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-jplayer-check.php' );
		
	}
	/**
	 * Otherwise, if mp_core, mp_jplayer, and mp_people are active, carry out the plugin's functions
	 */
	else{
		
		/**
		 * Update script - keeps this plugin up to date
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/updater/mp-sermons-update.php' );
		
		/**
		 * The Sermon function
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/misc-functions/the-sermon.php' );
		
		/**
		 * Settings Metabox for mp_sermons
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/metaboxes/mp-sermon-meta/mp-sermon-meta.php' );
		
		/**
		 * Media Metabox for mp_sermons
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/metaboxes/mp-sermon-media/mp-sermon-media.php' );
		
		/**
		 * Embed Metabox for mp_sermons
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/metaboxes/mp-sermon-embed/mp-sermon-embed.php' );
		
		/**
		 * People Custom Post Type
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/custom-post-types/sermons.php' );
		
		/**
		 * Settings for mp_sermons
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/settings/settings/settings-options.php' );
		
		/**
		 * Podcast Settings for mp_sermons
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/settings/podcast/podcast-options.php' );
		
		/**
		 * Sermon Widget
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/widgets/class-sermon.php' );
		
		/**
		 * Template Tags for mp_sermons
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/template-tags/template-tags.php' );
		
		/**
		 * Enqueue scripts for mp_sermons
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/misc-functions/enqueue-scripts.php' );
		
		/**
		 * Create Podcast
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/misc-functions/podcast.php' );
		
		/**
		 * Shortcodes
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/misc-functions/shortcodes.php' );
		
		/**
		 * Misc Functions
		 */
		require( MP_SERMONS_PLUGIN_DIR . 'includes/misc-functions/misc-functions.php' );
			
	}
}
add_action('plugins_loaded', 'mp_sermons_include_files', 9);