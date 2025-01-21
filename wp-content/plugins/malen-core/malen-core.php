<?php

/**

 * Plugin Name: Malen Core
 * Description: This is a helper plugin of malen theme
 * Version:     1.0
 * Author:      Themeholy
 * Author URI:  http://themeholy.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: malen
 */



 // Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}



// Define Constant

define( 'MALEN_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'MALEN_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'MALEN_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );

define( 'MALEN_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );

define( 'MALEN_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

define( 'MALEN_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );

define( 'MALEN_ASSETS', plugin_dir_url( __FILE__ ) .'assets/' );

define( 'MALEN_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'malen-template/' );



// load textdomain

load_plugin_textdomain( 'malen', false, basename( dirname( __FILE__ ) ) . '/languages' );



//include file.

require_once MALEN_PLUGIN_INC_PATH .'malencore-functions.php';
require_once MALEN_PLUGIN_INC_PATH .'builder/builder.php';
require_once MALEN_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once MALEN_PLUGIN_INC_PATH .'malenajax.php';

require_once MALEN_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';



//Widget

require_once MALEN_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once MALEN_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
// require_once MALEN_PLUGIN_WIDGET_PATH . 'author-widget.php';
require_once MALEN_PLUGIN_WIDGET_PATH . 'search-form.php';
require_once MALEN_PLUGIN_WIDGET_PATH . 'categories-lists.php';
// require_once MALEN_PLUGIN_WIDGET_PATH . 'offer-banner.php';
// require_once MALEN_PLUGIN_WIDGET_PATH . 'social-media.php';



//addons

require_once MALEN_ADDONS . 'addons.php';

// Register widget styles
add_action( 'elementor/editor/after_enqueue_scripts', 'widget_styles' );

function widget_styles() {

    wp_register_style( 'editor-style-1', plugins_url( 'assets/css/editor.css', __FILE__ ) );
    wp_enqueue_style( 'editor-style-1' );

}
