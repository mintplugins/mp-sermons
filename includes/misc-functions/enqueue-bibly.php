<?php
/**
 * Enqueue Bibly scripts
 *
 */
function mp_sermons_enqueue_bibly_scripts(){	
	
	$popups = mp_core_get_option( 'mp_sermon_settings_general',  'mp_sermons_bibly_popup' );
	
	if (!empty($popups)){
		//mp_sermons_bibly_style
		wp_enqueue_style( 'mp_sermons_bibly_style', 'http://code.bib.ly/bibly.min.css' );
		
		//mp_sermons_bibly_script
		wp_enqueue_script( 'mp_sermons_bibly_script', 'http://code.bib.ly/bibly.min.js' );
	}
	
}
add_action('wp_enqueue_scripts', 'mp_sermons_enqueue_bibly_scripts');