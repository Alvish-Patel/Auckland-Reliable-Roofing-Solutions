<?php
/**
 * @Packge     : Ruffer
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
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
require_once get_parent_theme_file_path() . '/inc/ruffer-constants.php';

//theme setup
require_once RUFFER_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once RUFFER_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once RUFFER_DIR_PATH_INC . 'woo-hooks/ruffer-woo-hooks.php';

// Woo Hooks Functions
require_once RUFFER_DIR_PATH_INC . 'woo-hooks/ruffer-woo-hooks-functions.php';

// plugin activation
require_once RUFFER_DIR_PATH_FRAM . 'plugins-activation/ruffer-active-plugins.php';

// theme dynamic css
require_once RUFFER_DIR_PATH_INC . 'ruffer-commoncss.php';

// meta options
require_once RUFFER_DIR_PATH_FRAM . 'ruffer-meta/ruffer-config.php';

// page breadcrumbs
require_once RUFFER_DIR_PATH_INC . 'ruffer-breadcrumbs.php';

// sidebar register
require_once RUFFER_DIR_PATH_INC . 'ruffer-widgets-reg.php';

//essential functions
require_once RUFFER_DIR_PATH_INC . 'ruffer-functions.php';

// helper function
require_once RUFFER_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once RUFFER_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once RUFFER_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// ruffer options
require_once RUFFER_DIR_PATH_FRAM . 'ruffer-options/ruffer-options.php';

// hooks
require_once RUFFER_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once RUFFER_DIR_PATH_HOOKS . 'hooks-functions.php';