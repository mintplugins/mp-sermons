<?php
/**
 * This file contains the function keeps the MP Sermons plugin up to date.
 *
 * @since 1.0.0
 *
 * @package    MP Sermons
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Check for updates for the MP Sermons Plugin by creating a new instance of the MP_CORE_Plugin_Updater class.
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
 if (!function_exists('mp_sermons_update')){
	function mp_sermons_update() {
		$args = array(
			'software_name' => 'MP Sermons', //<- The exact name of this Plugin. Make sure it matches the title in your mp_sermons, edd, and the WP.org sermons
			'software_api_url' => 'http://moveplugins.com',//The URL where EDD and mp_sermons are installed and checked
			'software_filename' => 'mp-sermons.php',
			'software_licensed' => false, //<-Boolean
		);
		
		//Since this is a plugin, call the Plugin Updater class
		$mp_sermons_plugin_updater = new MP_CORE_Plugin_Updater($args);
	}
 }
add_action( 'init', 'mp_sermons_update' );
