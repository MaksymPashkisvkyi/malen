<?php
/**
* @version  1.0
* @package  malen
* @author   Malen <support@themeholy.com>
*
* Websites: https://themeholy.com/
*
*/

/**************************************
* Creating Social Media Widget
***************************************/

class malen_social_media_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'malen_social_media_widget',

                // Widget name will appear in UI
                esc_html__( 'Malen :: Social Media Widget', 'malen' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Social Media Widget', 'malen' ),
                    'classname'                     => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {
        	
        	if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
            	 if( !empty( $title ) ){
               		echo '<h3 class="widget_title">'.esc_html($title).'</h3>';
               	}
                    echo '<div class="th-social widget-social">';
                        malen_social_icon();
                    echo '</div>';
                    
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

           
            $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;
            
            // Widget admin form
            ?>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                    <?php
                        _e( 'Social:' ,'malen');
                    ?>
                </label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" placeholder="<?php echo esc_attr__('Title', 'malen'); ?>" value="<?php echo esc_attr( $title ); ?>" />
            </p>

            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();

            $instance['title']           = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    } // Class malen_social_media_widget ends here


    // Register and load the widget
    function malen_social_media_load_widget() {
        register_widget( 'malen_social_media_widget' );
    }
    add_action( 'widgets_init', 'malen_social_media_load_widget' );