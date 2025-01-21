<?php
/**
 * @Packge     : Malen
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeholy.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */
function malen_essential_scripts() {

    wp_enqueue_style( 'malen-style', get_stylesheet_uri() ,array(), wp_get_theme()->get( 'Version' ) );

    // google font
    wp_enqueue_style( 'malen-fonts', malen_google_fonts() ,array(), null );

    // Bootstrap Min
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) ,array(), '5.0.0' );

    // Font Awesome Six
    wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome.min.css' ) ,array(), '6.1.1' );

    // Magnific Popup
    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.min.css' ), array(), '1.0' );

    // odometer
    wp_enqueue_style( 'odometer-theme', get_theme_file_uri( '/assets/css/odometer-theme-default.css' ), array(), '1.0' );

    // Slick css
    wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.min.css' ) ,array(), '4.0.13' );

    // Wishlist css
    wp_enqueue_style( 'wishlist-css', get_theme_file_uri( '/assets/css/th-wl.css' ), array(), '1.0' );

    // malen main style
    wp_enqueue_style( 'malen-main-style', get_theme_file_uri('/assets/css/style.css') ,array(), wp_get_theme()->get( 'Version' ) );


    // Load Js

    // Bootstrap
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '5.0.0', true );

    // Slick
    wp_enqueue_script( 'slick', get_theme_file_uri( '/assets/js/slick.min.js' ), array('jquery'), '1.0.0', true );

    // magnific popup
    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array('jquery'), '1.0.0', true );

     // countdown
     wp_enqueue_script( 'countdown', get_theme_file_uri( '/assets/js/countdown.js' ), array( 'jquery' ), '1.0.0', true );

     //jquery ui
     wp_enqueue_script( 'jquery-ui', get_theme_file_uri( '/assets/js/jquery-ui.min.js' ), array( 'jquery' ), '1.12.1', true );

    // Isotope
    wp_enqueue_script( 'isototpe-pkgd', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '1.0.0', true );

    // Isotope Imagesloaded
    wp_enqueue_script( 'imagesloaded' );

    // odometer
    wp_enqueue_script( 'odometer', get_theme_file_uri( '/assets/js/odometer.js' ), array( 'jquery' ), '1.0.0', true );

    // appear-2
    wp_enqueue_script( 'appear-2', get_theme_file_uri( '/assets/js/appear-2.js' ), array( 'jquery' ), '1.0.0', true );

    // tilt.min
    wp_enqueue_script( 'tilt.min', get_theme_file_uri( '/assets/js/tilt.min.js' ), array( 'jquery' ), '1.0.0', true ); 

    // nice-select
    wp_enqueue_script( 'nice-select', get_theme_file_uri( '/assets/js/nice-select.min.js' ), array( 'jquery' ), '1.0.0', true );

    // circle-progress
    wp_enqueue_script( 'circle-progress', get_theme_file_uri( '/assets/js/circle-progress.js' ), array( 'jquery' ), '1.0.0', true );

    // wow.min
    wp_enqueue_script( 'wow.min', get_theme_file_uri( '/assets/js/wow.min.js' ), array( 'jquery' ), '1.3.0', true );

    // main script
    wp_enqueue_script( 'malen-main-script', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), wp_get_theme()->get( 'Version' ), true );

    // comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'malen_essential_scripts',99 );


function malen_block_editor_assets( ) {
    // Add custom fonts.
    wp_enqueue_style( 'malen-editor-fonts', malen_google_fonts(), array(), null );
}

add_action( 'enqueue_block_editor_assets', 'malen_block_editor_assets' );

/*
Register Fonts
*/
function malen_google_fonts() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
     
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'malen' ) ) {
        $font_url =  'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap';
    }
    return $font_url;
}