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
* Creating Author Widget
***************************************/

class malen_author_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'malen_author_widget',

                // Widget name will appear in UI
                esc_html__( 'Malen :: Author Widget', 'malen' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Author Widget', 'malen' ),
                    'classname'                     => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {
            $about_name   = apply_filters( 'widget_author_name', $instance['about_name'] );
            $about_bio   = apply_filters( 'widget_about_bio', $instance['about_bio'] );

            $social_icon      = isset( $instance['social_icon'] ) ? $instance['social_icon'] : false;

            if ( isset( $instance[ 'author_img_url' ] ) ) {
                $author_img_url = $instance[ 'author_img_url' ];
            }else {
                $author_img_url = '#';
            }


        	echo $args['before_widget'];
        	?>
			<div class="author-widget-wrap">
                 <?php if( !empty( $author_img_url )): ?>
                <div class="avater">
                    <?php echo malen_img_tag( array(
                            'url'   => esc_url( $author_img_url ),
                        ) ); ?>
                </div>
                <?php endif; ?>
                <?php if( !empty( $about_name )): ?>
                <div class="author-info">
                    <h4 class="name"><a class="text-inherit" href="classes.html"><?php echo wp_kses_post( $about_name ); ?></a></h4>
                </div>
                <?php endif; ?>
                <?php if( !empty( $about_bio )): ?>
                    <p class="author-bio"><?php echo wp_kses_post( $about_bio ); ?></p>
                <?php endif; ?>
                <?php if($social_icon): ?>
                <div class="author-social">
                    <?php malen_social_icon(); ?>
                </div>
                <?php endif; ?>
            </div>

        	<?php
           echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

             //Image Url
            if ( isset( $instance[ 'author_img_url' ] ) ) {
                $author_img_url = $instance[ 'author_img_url' ];
            }else {
                $author_img_url = '';
            }
            
            if ( isset( $instance[ 'about_name' ] ) ) {
                $about_name = $instance[ 'about_name' ];
            }else {
                $about_name = '';
            }

            if ( isset( $instance[ 'about_bio' ] ) ) {
                $about_bio = $instance[ 'about_bio' ];
            }else {
                $about_bio = '';
            }

            $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;

        	?>
            <p>
                <label for="<?php echo $this->get_field_id( 'author_img_url' ); ?>"><?php _e( 'Image URL:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'author_img_url' ); ?>" name="<?php echo $this->get_field_name( 'author_img_url' ); ?>" type="text" value="<?php echo esc_attr( $author_img_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'about_name' ); ?>"><?php _e( 'Author Name:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'about_name' ); ?>" name="<?php echo $this->get_field_name( 'about_name' ); ?>" type="text" value="<?php echo esc_attr( $about_name ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'about_bio' ); ?>"><?php _e( 'Author Bio:' ,'malen'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_bio' ); ?>" name="<?php echo $this->get_field_name( 'about_bio' ); ?>" rows="4" cols="80"><?php echo esc_html( $about_bio ); ?></textarea>
            </p>
            <p>
                <input class="checkbox" type="checkbox"<?php checked( $social_icon ); ?> id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Display Social Icon?' ); ?></label>
            </p>

        	<?php
           
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {
                $instance = array();

                $instance['author_img_url']    = ( ! empty( $new_instance['author_img_url'] ) ) ? strip_tags( $new_instance['author_img_url'] ) : '';
                $instance['about_name']           = ( ! empty( $new_instance['about_name'] ) ) ? strip_tags( $new_instance['about_name'] ) : '';
                $instance['about_bio']           = ( ! empty( $new_instance['about_bio'] ) ) ? strip_tags( $new_instance['about_bio'] ) : '';
                $instance['social_icon']      = isset( $new_instance['social_icon'] ) ? (bool) $new_instance['social_icon'] : false;
                return $instance;
           
        }

    } // Class malen_author_widget ends here


    // Register and load the widget
    function malen_author_load_widget() {
        register_widget( 'malen_author_widget' );
    }
    add_action( 'widgets_init', 'malen_author_load_widget' );