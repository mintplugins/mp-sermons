<?php

/**
 * Displays everything about a sermon
 */
function mp_sermons_the_sermon($post_id){
	
	$html_output = mp_core_the_featured_image( $post_id, 254, 134, '<div class="single-featured-image"><img src="', '" width="254px" height="134px" /></div>'); 
	
	$html_output .= '<div class="mp-sermons-sermon-info">';
							   
		//Preacher
		$html_output .= mp_sermons_preacher_list( $post_id );
		
		//Books of the bible
		$html_output .= mp_sermons_bible_list( $post_id ); 
		
		//Sermon Series
		$html_output .= mp_sermons_series_list( $post_id );
		
		//Topics
		$html_output .= mp_sermons_topics_list( $post_id );
		
		//Bible Verses
		$html_output .= mp_sermons_bible_verses( $post_id );
		
		

	$html_output .= '</div>';
					   
	$html_output .= mp_jplayer($post_id, 'jplayer');
	
	$html_output .= mp_core_oembed_get( get_post_meta($post_id, 'sermon_video_url', true ) ); 
	
	return $html_output;
                            
}