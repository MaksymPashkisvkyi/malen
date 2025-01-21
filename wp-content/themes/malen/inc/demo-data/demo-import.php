<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : malen
 * @version   : 1.0
 * @Author    : Themeholy
 * @Author URI: https://themeholy.com/
 */

// demo import file
function malen_import_files() {

	$demoImg = '<img src="'. MALEN_DEMO_DIR_URI  .'screen-image.png" alt="'.esc_attr__('Demo Preview Imgae','malen').'" />';

    return array(
        array(
            'import_file_name'             => esc_html__('Malen Demo','malen'),
            'local_import_file'            =>  MALEN_DEMO_DIR_PATH  . 'malen-demo.xml',
            'local_import_widget_file'     =>  MALEN_DEMO_DIR_PATH  . 'malen-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  MALEN_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'malen_opt',
                ),
            ),
            'import_notice' => $demoImg,
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'malen_import_files' );

// demo import setup
function malen_after_import_setup() {
	// Assign menus to their locations.

	$primary_menu  		= get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$footer_menu  		= get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'   	=> $primary_menu->term_id,
			'footer-menu'   	=> $footer_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Home One' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	//woocommerce page added 
	$woocommerce_shop = get_page_by_title('Malen Shop');
	$woocommerce_checkout = get_page_by_title('Malen Checkout');
	$woocommerce_cart = get_page_by_title('Malen Cart');
	$woocommerce_myaccount = get_page_by_title('Malen My Account');

	update_option('woocommerce_cart', $woocommerce_cart->ID);
	update_option('woocommerce_checkout_page_id', $woocommerce_checkout->ID);
	update_option('woocommerce_cart_page_id', $woocommerce_cart->ID);
	update_option('woocommerce_myaccount_page_id', $woocommerce_myaccount->ID);
	update_option('woocommerce_shop_page_id', $woocommerce_shop->ID);

	//Get entire array
	$woosw_settings = get_option( 'woosw_settings' );

	$woosw_settings['button_type'] = 'button';
	$woosw_settings['button_icon'] = 'only';
	$woosw_settings['button_class'] = 'icon-btn';
	$woosw_settings['button_position_archive'] = '0';
	$woosw_settings['button_position_single'] = '0';
	$woosw_settings['page_copy'] = 'no';

	update_option( 'woosw_settings', $woosw_settings );

    
}
add_action( 'pt-ocdi/after_import', 'malen_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function malen_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Malen Demo Import' , 'malen' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'malen' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'malen-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'malen_import_plugin_page_setup' );

// Enqueue scripts
function malen_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'malen-demo-import' ){
		// style
		wp_enqueue_style( 'malen-demo-import', MALEN_DEMO_DIR_URI.'css/malen.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'malen_demo_import_custom_scripts' );