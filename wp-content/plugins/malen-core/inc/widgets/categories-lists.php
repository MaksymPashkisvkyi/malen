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
* Creating Category List Widget
***************************************/

class malen_category_list_widget extends WP_Widget {

        function __construct() {

            parent::__construct(

                // Base ID of your widget

                'malen_category_list_widget',

                // Widget name will appear in UI

                esc_html__( 'Malen :: Category List', 'malen' ),

                // Widget description

                array(
                    'classname'                     => 'widget widget_categories',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Category List Widget', 'malen' ),
                )
            );
        }



        // This is where the action happens

        public function widget( $args, $instance ) {

            $title  = apply_filters( 'widget_title', $instance['title'] );

            //before and after widget arguments are defined by themes

            echo $args['before_widget'];

           if( !empty( $title  ) ){
                // echo $args['before_title'];
                //     echo esc_html( $title );
                //     echo '<span class="shape"></span>';
                // echo $args['after_title'];
                echo '<h3 class="widget_title">'.esc_html( $title ).'<span class="shape"></span></h3>';
            }

            if ( isset( $instance[ 'number' ] ) ) {
                $number = $instance[ 'number' ];
            }else {
                $number = '5';
            }

			$categories = get_categories();
            $limit= $number;
            $counter=0;
			?>

            <ul>
            	<?php foreach($categories as $category): 
                        if($counter<$limit):?>
                <li>
                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo $category->name ?>
                        <?php //echo $category->category_count ?>
                    </a>
                        <i class="fa-regular fa-angles-right"></i>
                </li>
            	<?php 
                    $counter++; 
                        endif;
                    endforeach; ?>
            </ul>
		<?php

            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

             //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = 'Categories';
            }

             //Number
            if ( isset( $instance[ 'number' ] ) ) {
                $number = $instance[ 'number' ];
            }else {
                $number = '5';
            }

            // Widget admin form

            ?>
             <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of Category:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
            </p>

            <?php
        }


        // Updating widget replacing old instances with new

        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['number']          = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';

            return $instance;
        }
    } // Class malen_category_list_widget ends here


    // Register and load the widget
    function malen_category_list_load_widget() {
        register_widget( 'malen_category_list_widget' );
    }
    add_action( 'widgets_init', 'malen_category_list_load_widget' );