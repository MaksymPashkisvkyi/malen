<?php

/**
* @version  1.0
* @package  Malen
* @author   Themeholy <support@themeholy.com>
*
* Websites: https://themeholy.com/
*
*/
/**************************************
* Creating Search Form Widget
***************************************/

class malen_search_form_widget extends WP_Widget {

        function __construct() {

            parent::__construct(

                // Base ID of your widget

                'malen_search_form_widget',

                // Widget name will appear in UI

                esc_html__( 'Malen :: Search Form', 'malen' ),

                // Widget description

                array(
                    'classname'                     => 'widget_search',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Search Form Widget', 'malen' ),
                )
            );
        }



        // This is where the action happens

        public function widget( $args, $instance ) {

            $title  = apply_filters( 'widget_title', $instance['title'] );

            //Placeholder
            if ( isset( $instance[ 'placeholder' ] ) ) {
                $placeholder = $instance[ 'placeholder' ];
            }else {
                $placeholder = '';
            }


            //before and after widget arguments are defined by themes

            echo $args['before_widget'];
                echo '<h3 class="widget_title">'.esc_html( $title ).'<span class="shape"></span></h3>';
                echo '<form class="search-form" action="'.esc_attr( home_url( '/' ) ).'">';
                    echo '<input type="text" name="s" placeholder="'.esc_attr( $placeholder ).'">';
                    echo '<button type="submit"><i class="far fa-search"></i></button>';
                echo '</form>';
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Placeholder
            if ( isset( $instance[ 'placeholder' ] ) ) {
                $placeholder = $instance[ 'placeholder' ];
            }else {
                $placeholder = '';
            }

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = 'All Services';
            }

            // Widget admin form

            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'placeholder' ); ?>"><?php _e( 'Search:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" type="text" value="<?php echo esc_attr( $placeholder ); ?>" />
            </p>

            <?php
        }


        // Updating widget replacing old instances with new

        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['placeholder']          = ( ! empty( $new_instance['placeholder'] ) ) ? strip_tags( $new_instance['placeholder'] ) : '';

            return $instance;
        }
    } // Class malen_search_form_widget ends here


    // Register and load the widget
    function malen_search_form_load_widget() {
        register_widget( 'malen_search_form_widget' );
    }
    add_action( 'widgets_init', 'malen_search_form_load_widget' );