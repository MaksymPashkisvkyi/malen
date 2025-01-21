<?php
/**
 * @Packge     : Malen
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeholy.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $malen_post_id = get_the_ID();

            // Get the page settings manager
            $malen_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $malen_page_settings_model = $malen_page_settings_manager->get_model( $malen_post_id );

            // Retrieve the color we added before
            $malen_header_style = $malen_page_settings_model->get_settings( 'malen_header_style' );
            $malen_header_builder_option = $malen_page_settings_model->get_settings( 'malen_header_builder_option' );

            if( $malen_header_style == 'header_builder'  ) {

                if( !empty( $malen_header_builder_option ) ) {
                    $malenheader = get_post( $malen_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $malenheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $malen_header_builder_trigger = malen_opt('malen_header_options');
                if( $malen_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $malen_global_header_select = get_post( malen_opt( 'malen_header_select_options' ) );
                    $header_post = get_post( $malen_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    malen_global_header_option();
                }
            }
        } else {
            $malen_header_options = malen_opt('malen_header_options');
            if( $malen_header_options == '1' ) {
                malen_global_header_option();
            } else {
                $malen_header_select_options = malen_opt('malen_header_select_options');
                $malenheader = get_post( $malen_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $malenheader->ID );
                echo '</header>';
            }
        }
    } else {
        malen_global_header_option();
    }