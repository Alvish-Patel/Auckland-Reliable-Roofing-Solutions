<?php
/**
 * @Packge     : Ruffer
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
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
if ( ! defined( 'RUFFER_DIR_URI' ) ) {
    define('RUFFER_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'RUFFER_DIR_ASSIST_URI' ) ) {
    define( 'RUFFER_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'RUFFER_DIR_CSS_URI' ) ) {
    define( 'RUFFER_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('RUFFER_DIR_JS_URI')) {
    define('RUFFER_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('RUFFER_DIR_PATH')) {
    define('RUFFER_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('RUFFER_DIR_PATH_INC')) {
    define('RUFFER_DIR_PATH_INC', RUFFER_DIR_PATH . 'inc/');
}

//RUFFER framework Folder Directory
if (!defined('RUFFER_DIR_PATH_FRAM')) {
    define('RUFFER_DIR_PATH_FRAM', RUFFER_DIR_PATH_INC . 'ruffer-framework/');
}

//Hooks Folder Directory
if (!defined('RUFFER_DIR_PATH_HOOKS')) {
    define('RUFFER_DIR_PATH_HOOKS', RUFFER_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'RUFFER_DEMO_DIR_PATH' ) ){
    define( 'RUFFER_DEMO_DIR_PATH', RUFFER_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'RUFFER_DEMO_DIR_URI' ) ){
    define( 'RUFFER_DEMO_DIR_URI', RUFFER_DIR_URI.'inc/demo-data/' );
}