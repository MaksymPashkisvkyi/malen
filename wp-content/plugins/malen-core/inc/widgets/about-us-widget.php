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
* Creating About Us Widget
***************************************/

class malen_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'malen_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Malen :: About Us Widget', 'malen' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'malen' ),
                    'classname'                     => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $about_us   = apply_filters( 'widget_about_us', $instance['about_us'] );
            $social_text   = apply_filters( 'widget_btn_text', $instance['social_text'] );
            $social_icon      = isset( $instance['social_icon'] ) ? $instance['social_icon'] : false;
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '#';
            }


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                echo '<div class="th-widget-about">';
                    echo '<div class="about-logo">';
                        echo malen_img_tag( array(
                            'url'   => esc_url( $aboutus_img_url ),
                        ) );
                    echo '</div>';
                    echo '<p class="about-text">'.wp_kses_post( $about_us ).'</p>';
                    echo '<h6 class="social-title text-white">'.esc_html($social_text).'</h6>';
                    if($social_icon){
                        echo '<div class="th-social">';
                            echo malen_social_icon();
                        echo '</div>';
                    }
                echo '</div>';

            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Image
            if ( isset( $instance[ 'aboutus_img' ] ) ) {
                $aboutus_img = $instance[ 'aboutus_img' ];
            }else {
                $aboutus_img = '';
            }

            //Image Url
            if ( isset( $instance[ 'aboutus_img_url' ] ) ) {
                $aboutus_img_url = $instance[ 'aboutus_img_url' ];
            }else {
                $aboutus_img_url = '';
            }
            
            if ( isset( $instance[ 'about_us' ] ) ) {
                $about_us = $instance[ 'about_us' ];
            }else {
                $about_us = '';
            }

            //Social text
            if ( isset( $instance[ 'social_text' ] ) ) {
                $social_text = $instance[ 'social_text' ];
            }else {
                $social_text = '';
            }

            $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;
            
            // Widget admin form
            ?>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>"><?php _e( 'Image URL:' ,'malen'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'aboutus_img_url' ); ?>" name="<?php echo $this->get_field_name( 'aboutus_img_url' ); ?>" type="text" value="<?php echo esc_attr( $aboutus_img_url ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
                    <?php
                        _e( 'About Us:' ,'malen');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">
                    <?php
                        _e( 'Social Label' ,'malen');
                    ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'social_text' ); ?>" name="<?php echo $this->get_field_name( 'social_text' ); ?>" type="text" placeholder="<?php echo esc_attr__('Social Label', 'malen'); ?>" value="<?php echo esc_attr( $social_text ); ?>" />
            </p>

            <p>
                <input class="checkbox" type="checkbox"<?php checked( $social_icon ); ?> id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Display Social Icon?' ); ?></label>
            </p>
            <script>
            jQuery(function($){
                'use strict';
                /**
                 *
                 * About Widget About Us upload
                 *
                 */
                $( function(){
                    $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                    $(document).on('widget-updated',function(event,widget){
                        var widget_id = $(widget).attr('id');
                        if(widget_id.indexOf('malen_aboutus_widget')!=-1){
                            $imgval = $(".img_val").val();
                            $(".img_show").attr("src",$imgval);
                            $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
                        }
                    });
                    $("body").off("click",".about-up-btn");
                    $("body").on("click",".about-up-btn",function( e ){

                        let frame = wp.media({
                            title: 'Select or Upload Media About Us',
                            button: {
                                text: 'Use this About Us'
                            },
                            multiple: false
                        });

                        frame.on("select",function(){
                            // Get media attachment details from the frame state
                            let $img = frame.state().get('selection').first().toJSON();

                            $(".img_show").attr("src",$img.url);
                            $(".img_val").val($img.url);

                            $(".img_val").trigger('change');

                            $(".about-up-btn").text("Change Image");
                        });

                        // Open Media Modal
                        frame.open();
                        e.preventDefault();
                    });
                });
            });
            </script>
            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['aboutus_img']        = ( ! empty( $new_instance['aboutus_img'] ) ) ? strip_tags( $new_instance['aboutus_img'] ) : '';
            $instance['aboutus_img_url']    = ( ! empty( $new_instance['aboutus_img_url'] ) ) ? strip_tags( $new_instance['aboutus_img_url'] ) : '';
            $instance['about_us']           = ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';
            $instance['social_text']           = ( ! empty( $new_instance['social_text'] ) ) ? strip_tags( $new_instance['social_text'] ) : '';
            $instance['social_icon']      = isset( $new_instance['social_icon'] ) ? (bool) $new_instance['social_icon'] : false;
            return $instance;
        }
    } // Class malen_aboutus_widget ends here


    // Register and load the widget
    function malen_aboutus_load_widget() {
        register_widget( 'malen_aboutus_widget' );
    }
    add_action( 'widgets_init', 'malen_aboutus_load_widget' );