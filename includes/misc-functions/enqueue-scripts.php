<?php
/**
 * Enqueue Bibly scripts
 *
 */
function mp_sermons_enqueue_scripts(){	
	
	//Check whether the user has turned-on bible verse popups
	$popups = mp_core_get_option( 'mp_sermon_settings_general',  'mp_sermons_bibly_popup' );
	
	if (!empty($popups)){
		//mp_sermons_bibly_style
		wp_enqueue_style( 'mp_sermons_bibly_style', 'http://code.bib.ly/bibly.min.css' );
		
		//mp_sermons_bibly_script
		wp_enqueue_script( 'mp_sermons_bibly_script', 'http://code.bib.ly/bibly.min.js' );
	}
		
	 //Filter or set default icon font for sermons 
	$mp_sermons_font_location = has_filter('mp_sermons_font_style_location') ? apply_filters( 'mp_sermons_font_style_location', $first_output) : plugins_url('css/mp-sermons-icon-font.css', dirname(__FILE__));
	
	//Enqueue Icon Font
	if ( !empty( $mp_sermons_font_location ) ){
		wp_enqueue_style( 'mp_sermons_icon_font', $mp_sermons_font_location );
	}
	
}
add_action('wp_enqueue_scripts', 'mp_sermons_enqueue_scripts');