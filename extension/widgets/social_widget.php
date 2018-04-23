<?php
/**
 * Widget Name: Social Widget
 */

add_action( 'widgets_init', 'iweb_social_load_widget' );

function iweb_social_load_widget() {
	register_widget( 'iweb_social_widget' );
}

class iweb_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */

	function __construct() {

		parent::__construct (
			'iweb_social_widget',
			esc_html__( 'Iweb: Social Icons','iweb' ),

			array(
				'description' => esc_html__( 'A widget that displays your social icons','iweb' )
			)
		);
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {

		extract( $args );
		
		/* Before widget (defined by themes). */
        echo $args['before_widget'];

		/* Display the widget title if one was input (before and after defined by themes). */
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

		?>
		
			<div class="social-widget">
				<?php iweb_get_social_url(); ?>
			</div>
			
			
		<?php

		/* After widget (defined by themes). */
        echo $args['after_widget'];
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title']  =   strip_tags( $new_instance['title'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Subscribe & Follow', 'facebook' => 'on', 'twitter' => 'on', 'instagram' => 'on', );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php esc_html_e( 'Title:', 'iweb' ); ?>
            </label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>
		
		<p>
            <?php esc_html_e( 'Note: Set your social links in the iWeb Options', 'iweb' ); ?>
        </p>

	<?php

	}

}