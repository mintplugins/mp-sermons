<?php

/**
 * Shortcode which Displays everything about a sermon
 * Usage [mp_sermon]
 */
function mp_sermon_shortcode(){
	
	return mp_sermon(get_the_id());
                            
}
add_shortcode( 'mp_sermon', 'mp_sermon_shortcode' );