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
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/malen-constants.php';

//theme setup
require_once MALEN_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once MALEN_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once MALEN_DIR_PATH_INC . 'woo-hooks/malen-woo-hooks.php';

// Woo Hooks Functions
require_once MALEN_DIR_PATH_INC . 'woo-hooks/malen-woo-hooks-functions.php';

// plugin activation
require_once MALEN_DIR_PATH_FRAM . 'plugins-activation/malen-active-plugins.php';

// theme dynamic css
require_once MALEN_DIR_PATH_INC . 'malen-commoncss.php';

// meta options
require_once MALEN_DIR_PATH_FRAM . 'malen-meta/malen-config.php';

// page breadcrumbs
require_once MALEN_DIR_PATH_INC . 'malen-breadcrumbs.php';

// sidebar register
require_once MALEN_DIR_PATH_INC . 'malen-widgets-reg.php';

//essential functions
require_once MALEN_DIR_PATH_INC . 'malen-functions.php';

// helper function
require_once MALEN_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once MALEN_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once MALEN_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// malen options
require_once MALEN_DIR_PATH_FRAM . 'malen-options/malen-options.php';

// hooks
require_once MALEN_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once MALEN_DIR_PATH_HOOKS . 'hooks-functions.php';

