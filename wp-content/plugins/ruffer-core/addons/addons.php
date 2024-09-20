<?php
if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.
}

/**
 * Main Ruffer Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Ruffer_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'ruffer_regsiter_widget_scripts' ] );
		// add_action( 'elementor/frontend/before_register_scripts', [ $this, 'ruffer_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'ruffer_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ruffer' ),
			'<strong>' . esc_html__( 'Ruffer Core', 'ruffer' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ruffer' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ruffer' ),
			'<strong>' . esc_html__( 'Ruffer Core', 'ruffer' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ruffer' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ruffer' ),
			'<strong>' . esc_html__( 'Ruffer Core', 'ruffer' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'ruffer' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		// Include Widget files

		require_once( RUFFER_ADDONS . '/widgets/button.php' );
		require_once( RUFFER_ADDONS . '/widgets/section-title.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-blog.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-animated-shape.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-banner.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-group-image.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-features.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-services.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-contact-form.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-image-box.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-why-chose-us.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-team.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-faq.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-work-process.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-progressbar.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-project.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-testimonials.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-counterup.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-experience-area.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-newslatter.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-contact-info.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-project-info.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-about-us_2.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-why-chose-us-2.php' );
		require_once( RUFFER_ADDONS . '/widgets/ruffer-cta-widgets.php' );
		
		
		
		
		
		
		

		// Register widget

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Animated_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Group_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Features() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Contact_Form() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_WCU() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_WorkProcess_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Skill_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Project() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Counterup() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Experience_area() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Newsletter_Widgets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Contact_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Project_Info_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_About_Us() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Chose_Us_2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_CTA_Widget() );
		
		
		
		

		// Header Elements

		require_once( RUFFER_ADDONS . '/header/header.php' );

		

		// Header Widget Register

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Ruffer_Header() );


	}

    public function widget_scripts() {

        wp_enqueue_script(
            'ruffer-frontend-script',
            RUFFER_PLUGDIRURI . 'assets/js/ruffer-frontend.js',
            array('jquery'),
            false,
            true
		);
	}



    function ruffer_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'ruffer',
            [
                'title' => __( 'Ruffer', 'ruffer' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'ruffer_footer_elements',
            [
                'title' => __( 'Ruffer Footer Elements', 'ruffer' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'ruffer_header_elements',
            [
                'title' => __( 'Ruffer Header Elements', 'ruffer' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Ruffer_Extension::instance();