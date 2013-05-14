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

/**
 * Generate list of preachers for a sermon
 */
function mp_sermons_preacher_list( $post_id ){
		
	//Get all the preachers for this post
	$preachers = wp_get_post_terms( $post_id, 'mp_preachers' );
	
	if ( !empty( $preachers ) ) {
		
		$preachers_return = apply_filters( 'mp_preachers_list_title', '' );
		$preachers_return .= '<ul id="mp-preachers-' . $post_id . '" class="mp-preachers-list">';
								
		//Loop through each preacher to generatehtml output for each
		foreach ( $preachers as $preacher ){
			$preachers_return .= ( '<li class=mp-preacher"><a href="' . get_term_link( $preacher->slug, $preacher->taxonomy ) . '">' . $preacher->name . '</a></li>' );
		}
		
		$preachers_return .= '</ul>';
		
		return $preachers_return;
	}
}

/**
 * Generate list of bible books for a sermon
 */
function mp_sermons_bible_list( $post_id ){
		
	//Get all the preachers for this post
	$bible_books = wp_get_post_terms( $post_id, 'mp_bible_books' );
	
	if ( !empty( $bible_books ) ) {
		
		$bible_books_return = apply_filters( 'mp_bible_books_list_title', '<div class="mp-books-of-the-bible-list-title">' . __( "Books:", 'mp_sermons' ) . '</div>' );
		$bible_books_return .= '<ul id="mp-books-of-the-bible-' . $post_id . '" class="mp-books-of-the-bible-list">';
								
		//Loop through each preacher to generatehtml output for each
		foreach ( $bible_books as $bible_book ){
			$bible_books_return .= ( '<li class=mp-book-of-the-bible"><a href="' . get_term_link( $bible_book->slug, $bible_book->taxonomy ) . '">' . $bible_book->name . '</a></li>' );
		}
		
		$bible_books_return .= '</ul>';
		
		return $bible_books_return;
	}
}


/**
 * Generate list of topics for a sermon
 */
function mp_sermons_topics_list( $post_id ){
		
	//Get all the preachers for this post
	$topics = wp_get_post_terms( $post_id, 'mp_topics' );
	
	if ( !empty( $topics ) ) {
		
		$topics_return = apply_filters( 'mp_topics_list_title', '<div class="mp-topics-list-title">' . __( "Topics:", 'mp_sermons' ) . '</div>' );
		$topics_return .= '<ul id="mp-topics-' . $post_id . '" class="mp-topics-list">';
								
		//Loop through each preacher to generatehtml output for each
		foreach ( $topics as $topic ){
			$topics_return .= ( '<li class=mp-topic"><a href="' . get_term_link( $topic->slug, $topic->taxonomy ) . '">' . $topic->name . '</a></li>' );
		}
		
		$topics_return .= '</ul>';
		
		return $topics_return;
	}
}


/**
 * Generate list of series for a sermon
 */
function mp_sermons_series_list( $post_id ){
		
	//Get all the preachers for this post
	$series = wp_get_post_terms( $post_id, 'mp_sermon_series' );
	
	if ( !empty( $series ) ) {
		
		$series_return = apply_filters( 'mp_series_list_title', '<div class="mp-series-list-title">' . __( "Sermon Series:", 'mp_sermons' ) . '</div>' );
		$series_return .= '<ul id="mp-sermon-series-' . $post_id . '" class="mp-series-list">';
								
		//Loop through each preacher to generatehtml output for each
		foreach ( $series as $serie ){
			$series_return .= ( '<li class=mp-serie"><a href="' . get_term_link( $serie->slug, $serie->taxonomy ) . '">' . $serie->name . '</a></li>' );
		}
		
		$series_return .= '</ul>';
		
		return $series_return;
	}
}

/**
 * Show Bible Verses with popup
 */
function mp_sermons_bible_verses( $post_id ){
	
		$scripture = get_post_meta($post_id, 'sermon_bible_verses', true); 
		
		if ( !empty( $scripture ) ){ 
			$html_output = '<div class="mp_sermons_bible_verses">';
				$html_output .= __('Scripture: ', 'mp_sermons');
				$html_output .= get_post_meta($post_id, 'sermon_bible_verses', true); 
			$html_output .= '</div>';
			
			return $html_output;
		}

}