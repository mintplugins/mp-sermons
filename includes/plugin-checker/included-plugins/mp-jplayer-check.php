<?php
/**
 * Install Jplayer Plugin
 *
 */
 if (!function_exists('mp_jplayer_plugin_check')){
	function mp_jplayer_plugin_check() {
		$args = array(
			'plugin_name' => 'MP Jplayer',
			'plugin_message' => __('You require the MP Jplayer plugin. Install it here.', 'mp_sermons'), 
			'plugin_slug' => 'mp-jplayer', 
			'plugin_filename' => 'mp-jplayer.php',
			'plugin_required' => true,
			'plugin_download_link' => 'http://repo.moveplugins.com/repo/mp-jplayer/?downloadfile=true'
		);
		$mp_jplayer_plugin_check = new MP_CORE_Plugin_Checker($args);
	}
 }
add_action( 'init', 'mp_jplayer_plugin_check' );

