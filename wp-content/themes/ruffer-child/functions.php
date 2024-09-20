<?php
/**
 *
 * @Packge      ruffer
 * @Author      themeholy
 * @Author URI: https://themeforest.net/user/themeholy
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme
 */
function ruffer_child_enqueue_styles() {

    wp_enqueue_style( 'ruffer-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'ruffer-child-style', get_stylesheet_directory_uri() . '/style.css',array( 'ruffer-style' ),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'ruffer_child_enqueue_styles', 100000 );