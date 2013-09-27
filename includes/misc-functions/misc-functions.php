<?php
/**
 * Check if the current theme supports mp_sermons
 * If it doesn't, attach the sermon with the_content
 */
function mp_sermons_theme_support($content){
	
	if ( !current_theme_supports( 'mp_sermons' ) &&  'mp_sermon' == get_post_type() ){
		return mp_sermon() . $content;
	}
	else{
		return $content;	
	}
}
add_filter( 'the_content', 'mp_sermons_theme_support' );
