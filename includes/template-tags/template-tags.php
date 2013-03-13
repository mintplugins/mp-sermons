<?php
/**
 * Template tag to display podcast link
 */
function mp_sermons_podcast_url($feed_prefix = 'http://', $podcast_source = NULL){
	
	//Check if podcast source has been set - if so, load the custom post type based on the slug
	if (isset($podcast_source)){
		$url = get_post_type_archive_link( $podcast_source ); // $podcast_source = 'custom_post_type_slug'
		$url = str_replace("http://", $feed_prefix, $url );
	}else{
		//Get the URL path of the current page
		$url = $feed_prefix . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
	
	//Add the query args to the current page's permalink
	$podcast_url = add_query_arg('mp_sermon_podcast', 'true', $url);
	
	return $podcast_url; 		
}

/**
 * Sample Calls:
 *
 * mp_sermons_podcast_url('itpc://', 'mp_sermon'); <-- This will create a podcast page that shows all sermons
 *
 * mp_sermons_podcast_url('itpc://'); <-- This will create a podcast page using the loop on the page where it has been called
 *
 */
