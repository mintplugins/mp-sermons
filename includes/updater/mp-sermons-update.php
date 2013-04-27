<?php
/**
 * Check for updates for this Theme
 *
 */
 if (!function_exists('mp_sermons_update')){
	function mp_sermons_update() {
		$args = array(
			'software_name' => 'MP Sermons', //<- The exact name of this Plugin. Make sure it matches the title in your mp_sermons, edd, and the WP.org repo
			'software_api_url' => 'http://moveplugins.com',//The URL where EDD and mp_sermons are installed and checked
			'software_filename' => 'mp-sermons.php',
			'software_licenced' => false, //<-Boolean
		);
		
		//Since this is a theme, call the Plugin Updater class
		$mp_sermons_plugin_updater = new MP_CORE_Plugin_Updater($args);
	}
 }
add_action( 'init', 'mp_sermons_update' );
