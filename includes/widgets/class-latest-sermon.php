<?php
/**
 * Extends MP_CORE_Widget to create custom widget class.
 */
class MP_SERMONS_Latest_Widget extends MP_CORE_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'mp_sermons_latest_widget', // Base ID
			'Latest Sermon Widget', // Name
			array( 'description' => __( 'Display Latest Sermon', 'mp_sermons' ), ) // Args
		);
		
		//enqueue scripts defined in MP_CORE_Widget
		add_action( 'admin_enqueue_scripts', array( $this, 'mp_widget_enqueue_scripts' ) );
		
		$this->_form = array (
			"field1" => array(
				'field_id' 			=> 'title',
				'field_title' 	=> __('Title:', 'mp_sermons'),
				'field_description' 	=> NULL,
				'field_type' 	=> 'textbox',
			),
		);
	
	}
	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'mp_sermons_latest_widget_title', isset($instance['title']) ? $instance['title'] : '' );
				
		/**
		 * Widget Start and Title
		 */
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		
		/**
		 * Before Hook
		 */
		do_action('mp_sermons_latest_widget_start');
			
		/**
		 * Widget Body
		 */
		
		//Set the args for the new query
		$sermon_args = array(
			'post_type' => "mp_sermon",
			'show_posts' => 1,
		);	
		
		//Create new query for stacks
		$sermons = new WP_Query( apply_filters( 'sermon_args', $sermon_args ) );
			
		//Loop through the stack group		
		if ( $sermons->have_posts() ) : 
			while( $sermons->have_posts() ) : $sermons->the_post(); 
				?>
				
				<a class="mp-sermons-latest-widget-btn-listen" href="<?php the_permalink(); ?>"><?php echo __('Listen', 'mp_sermons' ); ?></a>
				
				<a class="mp-sermons-latest-widget-btn-podcast" href="<?php echo mp_sermons_podcast_url('itpc://', 'mp_sermon'); ?>"><?php echo __('Podcast', 'mp_sermons'); ?></a>
				
				<div class="mp-sermons-latest-widget-title"><?php apply_filters( 'mp-sermons-latest-widget-title', the_title() ); ?></div>
                
                <div class="mp-sermons-latest-widget-date"><?php apply_filters( 'mp-sermons-latest-widget-date', the_time('F j, Y') ); ?></div>
                								   
				<a class="mp-sermons-latest-widget-btn-view-all" href="<?php echo get_post_type_archive_link( 'mp_sermon' ); ?>"><?php _e('View All' , 'mp_sermons'); ?></a>
					
				<?php
			endwhile;
		endif;
		
		/**
		 * After Hook
		 */
		 do_action('mp_sermons_latest_widget_end');
		 
		/**
		 * Widget End
		 */
		echo $after_widget;
                
	}
}

add_action( 'register_sidebar', create_function( '', 'register_widget( "MP_SERMONS_Latest_Widget" );' ) );
