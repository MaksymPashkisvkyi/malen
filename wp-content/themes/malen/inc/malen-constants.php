<?php
/**
 * @Packge     : Malen 
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeholy.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant 
 *
 */

// Base URI
if ( ! defined( 'MALEN_DIR_URI' ) ) {
    define('MALEN_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'MALEN_DIR_ASSIST_URI' ) ) {
    define( 'MALEN_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'MALEN_DIR_CSS_URI' ) ) {
    define( 'MALEN_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('MALEN_DIR_JS_URI')) {
    define('MALEN_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('MALEN_DIR_PATH')) {
    define('MALEN_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('MALEN_DIR_PATH_INC')) {
    define('MALEN_DIR_PATH_INC', MALEN_DIR_PATH . 'inc/');
}

//MALEN framework Folder Directory
if (!defined('MALEN_DIR_PATH_FRAM')) {
    define('MALEN_DIR_PATH_FRAM', MALEN_DIR_PATH_INC . 'malen-framework/');
}

//Hooks Folder Directory
if (!defined('MALEN_DIR_PATH_HOOKS')) {
    define('MALEN_DIR_PATH_HOOKS', MALEN_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'MALEN_DEMO_DIR_PATH' ) ){
    define( 'MALEN_DEMO_DIR_PATH', MALEN_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'MALEN_DEMO_DIR_URI' ) ){
    define( 'MALEN_DEMO_DIR_URI', MALEN_DIR_URI.'inc/demo-data/' );
}