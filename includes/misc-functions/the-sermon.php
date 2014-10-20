<?php

/**
 * Displays everything about a sermon
 */
function mp_sermon($post_id = NULL){
	
	//Get the global post
	global $post;
	
	//If no post ID has been passed in, use the global post id		
	$post_id = $post_id == NULL ? $post->ID : $post_id;
	
	$html_output = mp_core_the_featured_image( $post_id, 254, 134, '<div class="mp-sermons-featured-image"><img src="', '" width="254px" height="134px" /></div>'); 
	
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
					   
	$html_output .= mp_player($post_id, 'jplayer');
	
	//If there is a video url enteres
	$sermon_video_url = get_post_meta($post_id, 'sermon_video_url', true );
	
	if ( !empty( $sermon_video_url ) ){
		$html_output .= mp_core_oembed_get( get_post_meta($post_id, 'sermon_video_url', true ) ); 
	}
	
	return $html_output;
                            
}