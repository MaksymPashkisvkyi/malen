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
* Creating Offer Banner Widget
***************************************/

class malen_offer_banner_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'malen_offer_banner_widget',

                // Widget name will appear in UI
                esc_html__( 'Malen :: Offer Banner Widget', 'malen' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Offer Banner Widget', 'malen' ),
                    'classname'                     => 'no-banner-widget',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {
            $banner_title   = apply_filters( 'widget_banner_title', $instance['banner_title'] );
            $banner_desc   = apply_filters( 'widget_banner_desc', $instance['banner_desc'] );
            $button_text   = apply_filters( 'widget_button_text', $instance['button_text'] );

            if ( isset( $instance[ 'banner_img_url' ] ) ) {
                $banner_img_url = $instance[ 'banner_img_url' ];
            }else {
                $banner_img_url = '#';
            }            

            if ( isset( $instance[ 'button_url' ] ) ) {
                $button_url = $instance[ 'button_url' ];
            }else {
                $button_url = '#';
            }

        	echo $args['before_widget'];
        	?>
                <div class="widget widget_offer  " data-bg-src="<?php echo esc_url($banner_img_url ); ?>">
                    <div class="offer-banner text-center">
                        <h5 class="banner-title text-white"><?php echo esc_html( $banner_title ); ?></h5>
                        <p class="banner-desc text-white"><?php echo esc_html( $banner_desc ); ?></p>
                        <a href="<?php echo esc_url( $button_url ); ?>" class="th-btn red-btn"><?php echo esc_html( $button_text ); ?></a>
                    </div>
                </div>

        	<?php
           echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

             //Image Url
            if ( isset( $instance[ 'banner_img_url' ] ) ) {
                $banner_img_url = $instance[ 'banner_img_url' ];
            }else {
                $banner_img_url = '';
            }

            if ( isset( $instance[ 'banner_title' ] ) ) {
                $banner_title = $instance[ 'banner_title' ];
            }else {
                $banner_title = '';
            }    

            if ( isset( $instance[ 'banner_desc' ] ) ) {
                $banner_desc = $instance[ 'banner_desc' ];
            }else {
                $banner_desc = '';
            } 

            if ( isset( $instance[ 'button_text' ] ) ) {
                $button_text = $instance[ 'button_text' ];
            }else {
                $button_text = '';
            }            

            if ( isset( $instance[ 'button_url' ] ) ) {
                $button_url = $instance[ 'button_url' ];
            }else {
                $button_url = '';
            }

        	?>
            <p>
                <label for="<?php echo $this->get_field_id( 'banner_img_url' ); ?>"><?php _e( 'Image URL:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'banner_img_url' ); ?>" name="<?php echo $this->get_field_name( 'banner_img_url' ); ?>" type="text" value="<?php echo esc_attr( $banner_img_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'banner_title' ); ?>"><?php _e( 'Banner Title:' ,'malen'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'banner_title' ); ?>" name="<?php echo $this->get_field_name( 'banner_title' ); ?>" rows="2" cols="80"><?php echo esc_html( $banner_title ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'banner_desc' ); ?>"><?php _e( 'Banner Description:' ,'malen'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'banner_desc' ); ?>" name="<?php echo $this->get_field_name( 'banner_desc' ); ?>" rows="2" cols="80"><?php echo esc_html( $banner_desc ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e( 'Button URL:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>" />
            </p>

        	<?php
           
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {
                $instance = array();
                $instance['banner_img_url']    = ( ! empty( $new_instance['banner_img_url'] ) ) ? strip_tags( $new_instance['banner_img_url'] ) : '';
                $instance['banner_title']       = ( ! empty( $new_instance['banner_title'] ) ) ? strip_tags( $new_instance['banner_title'] ) : '';   
                $instance['banner_desc']       = ( ! empty( $new_instance['banner_desc'] ) ) ? strip_tags( $new_instance['banner_desc'] ) : ''; 
                $instance['button_text']      = ( ! empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';  
                $instance['button_url']     = ( ! empty( $new_instance['button_url'] ) ) ? strip_tags( $new_instance['button_url'] ) : '';
                return $instance;
           
        }

    } // Class malen_offer_banner_widget ends here


    // Register and load the widget
    function malen_offer_banner_load_widget() {
        register_widget( 'malen_offer_banner_widget' );
    }
    add_action( 'widgets_init', 'malen_offer_banner_load_widget' );