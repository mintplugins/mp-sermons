<?php

/**
 * Detect the sermon_podcast URL variable 
 * and create the podcast feed if set
 */
function mp_sermon_convert_page_to_podcast(){
	if (isset($_GET['mp_sermon_podcast'])){
		mp_sermons_podcast();
	}
}
add_action( 'get_header', 'mp_sermon_convert_page_to_podcast' );

/**
 * Podcast Function
 *
 */
function mp_sermons_podcast(){	

		//Variables
		$podcast_title = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_title' );
		$podcast_subtitle = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_subtitle' );
		$podcast_author = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_author' );
		$podcast_description = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_description' );
		$podcast_email = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_email' );
		$podcast_image = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_image' );
		$podcast_cat1 = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_cat_1' );
		$podcast_cat2 = mp_core_get_option( 'mp_sermon_podcast_settings_general',  'mp_sermons_podcast_cat_2' );
		
		header('Content-type: text/xml; charset=utf-8');
				
		echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"; ?>
				
		<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
		
		<channel>
		
		<title><?php echo !empty($podcast_title) ? htmlentities( $podcast_title ) : htmlentities( get_bloginfo() ); ?></title>
		
		<link><?php echo htmlentities( get_bloginfo('url') ) ?></link>
		
		<language>en-us</language>
		
		<copyright>&#x2117; &amp; &#xA9; <?php echo date('Y') . ' ' . htmlentities ( get_bloginfo() );  ?></copyright>
		
		<itunes:subtitle><?php echo !empty($podcast_subtitle) ? htmlentities( $podcast_subtitle ) : htmlentities( get_bloginfo() ); ?></itunes:subtitle>
		
		<itunes:author><?php echo !empty($podcast_author) ? htmlentities( $podcast_author ) : htmlentities( get_bloginfo() ); ?></itunes:author>
		
		<itunes:summary><?php echo !empty($podcast_description) ? htmlentities( $podcast_description ) : htmlentities( get_bloginfo() ); ?></itunes:summary>
		
		<description><?php echo !empty($podcast_description) ? htmlentities( $podcast_description ) : htmlentities( get_bloginfo() ); ?></description>
		
		<itunes:owner>
		
		<itunes:name><?php echo !empty($podcast_author) ? htmlentities( $podcast_author ) : htmlentities( get_bloginfo() ); ?></itunes:name>
		
		<itunes:email><?php echo !empty($podcast_email) ? htmlentities( $podcast_email ) : htmlentities( get_bloginfo( 'admin_email' ) )  ?></itunes:email>
		
		</itunes:owner>
		
		<itunes:image href="<?php echo !empty($podcast_image) ? htmlentities( $podcast_image ) : htmlentities( mp_core_get_avatar_url( get_avatar( get_bloginfo( 'admin_email' ), 1400 ) ) ); ?>" />
		
		<itunes:category text="<?php echo !empty($podcast_cat1) ? htmlentities( $podcast_cat1 ) : 'Arts' ; ?>">
		
		<itunes:category text="<?php echo !empty($podcast_cat2) ? htmlentities( $podcast_cat2 ) : 'Design'; ?>"/>
		
		</itunes:category>
		
		<?php 
			
		if (have_posts()) : 
			while ( have_posts() ) : the_post(); 
			
				$items = get_post_meta( get_the_ID(), 'jplayer', true );
				
				if (is_array($items)){
					foreach ( $items as $item ){ ?>
						
						<item>
						
						<title><?php echo !empty($item['title']) ? $item['title'] : the_title(); ?></title>
						
						<itunes:author><?php echo get_post_meta(get_the_ID(), 'sermonauthor', true)  ?></itunes:author>
						
						<itunes:subtitle><?php echo the_title(); ?></itunes:subtitle>
						
						<itunes:summary><?php echo the_excerpt_rss(); ?></itunes:summary>
                        
                        <?php $featured_image = mp_core_the_featured_image(get_the_ID(), 600, 600); ?>
						
						<itunes:image href="<?php echo !empty($item['poster']) ? mp_aq_resize($item['poster'], 600, 600, true) : !empty ($featured_image) ? $featured_image : ''; ?>" />
						
						<enclosure url="<?php echo $item['mp3']; ?>" length="8727310" type="audio/mpeg" />
						
						<guid><?php echo $item['mp3']  ?></guid>
						
						<pubDate><?php echo the_time('r')  ?></pubDate>
						
						</item>	
					<?php 
					}
				}
		
			endwhile; // end of the loop. 
		endif; ?>
		
		</channel>
		
	</rss>
	<?php
	exit;
}