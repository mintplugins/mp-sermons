<?php
/**
 * Extends MP_CORE_Widget to create custom widget class.
 */
class MP_SERMONS_Widget extends MP_CORE_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'mp_sermons_widget', // Base ID
			'Sermon Widget', // Name
			array( 'description' => __( 'Display A Sermon', 'mp_sermons' ), ) // Args
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
			"field1" => array(
				'field_id' 			=> 'sermon_id',
				'field_title' 	=> __('Select a sermon:', 'mp_sermons'),
				'field_description' 	=> NULL,
				'field_type' 	=> 'select',
				'field_select_values' 	=> mp_core_get_all_posts_by_type('mp_sermon'),
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
		$title = apply_filters( 'mp_sermons_widget_title', isset($instance['title']) ? $instance['title'] : '' );
				
		/**
		 * Widget Start and Title
		 */
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		
		/**
		 * Before Hook
		 */
		do_action('mp_sermons_widget_start');
			
		/**
		 * Widget Body
		 */
		
	
		?>
		<div class="sermon">	
        
            <a class="mp-sermons-widget-btn-listen" href="<?php echo get_permalink($instance['sermon_id']); ?>"><?php echo __('Listen', 'mp_sermons' ); ?></a>
            
            <a class="mp-sermons-widget-btn-podcast" href="<?php echo mp_sermons_podcast_url('itpc://', 'mp_sermon'); ?>"><?php echo __('Podcast', 'mp_sermons'); ?></a>
            
            <div class="mp-sermons-widget-title"><?php echo apply_filters( 'mp-sermons-latest-widget-title', get_the_title($instance['sermon_id']) ); ?></div>
            
            <div class="mp-sermons-widget-date"><?php echo apply_filters( 'mp-sermons-latest-widget-date', get_the_time('F j, Y', $instance['sermon_id']) ); ?></div>
                                               
            <a class="mp-sermons-widget-btn-view-all" href="<?php echo get_post_type_archive_link( 'mp_sermon' ); ?>"><?php _e('View All' , 'mp_sermons'); ?></a>
		
        </div>
		<?php
		
		
		/**
		 * After Hook
		 */
		 do_action('mp_sermons_widget_end');
		 
		/**
		 * Widget End
		 */
		echo $after_widget;
                
	}
}

add_action( 'register_sidebar', create_function( '', 'register_widget( "MP_SERMONS_Widget" );' ) );
