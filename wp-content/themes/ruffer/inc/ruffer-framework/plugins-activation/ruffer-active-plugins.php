<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme ecohost for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */



/**
 * Include the TGM_Plugin_Activation class.
 */
require_once RUFFER_DIR_PATH_FRAM . 'plugins-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ruffer_register_required_plugins' );
function ruffer_register_required_plugins() {

    /*
    * Array of plugin arrays. Required keys are name and slug.
    * If the source is NOT from the .org repo, then source is also required.
    */

    $plugins = array(

        array(
            'name'                  => esc_html__( 'Ruffer Core', 'ruffer' ),
            'slug'                  => 'ruffer-core',
            'version'               => '1.0',
            'source'                => RUFFER_DIR_PATH_FRAM . 'plugins/ruffer-core.zip',
            'required'              => true,
        ),

        array(
            'name'                  => esc_html__( 'One Click Demo Importer', 'ruffer' ),
            'slug'                  => 'one-click-demo-import',
            'required'              => true,
        ),

        array(
            'name'      => esc_html__( 'Elementor', 'ruffer' ),
            'slug'      => 'elementor',
            'version'   => '',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'Redux Framework', 'ruffer' ),
            'slug'      => 'redux-framework',
            'version'   => '',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'CMB2', 'ruffer' ),
            'slug'      => 'cmb2',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'Contact Form 7', 'ruffer' ),
            'slug'      => 'contact-form-7',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'WooCommerce', 'ruffer' ),
            'slug'      => 'woocommerce',
            'version'   => '',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'TI WooCommerce Wishlist', 'ruffer' ),
            'slug'      => 'ti-woocommerce-wishlist',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'WPC Smart Quick View for WooCommerce', 'ruffer' ),
            'slug'      => 'woo-smart-quick-view',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'GTranslate', 'ruffer' ),
            'slug'      => 'gtranslate',
            'version'   => '',
            'required'  => true,
        ),
    );

    $config = array(
        'id'           => 'ruffer',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}