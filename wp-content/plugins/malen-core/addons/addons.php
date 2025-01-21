<?php
if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.
}

/**
 * Main Malen Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Malen_Extension {

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

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'malen_regsiter_widget_scripts' ] );
		// add_action( 'elementor/frontend/before_register_scripts', [ $this, 'malen_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'malen_elementor_widget_categories' ] );
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
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'malen' ),
			'<strong>' . esc_html__( 'Malen Core', 'malen' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'malen' ) . '</strong>'
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

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'malen' ),
			'<strong>' . esc_html__( 'Malen Core', 'malen' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'malen' ) . '</strong>',
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'malen' ),
			'<strong>' . esc_html__( 'Malen Core', 'malen' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'malen' ) . '</strong>',
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

		$widget_register = \Elementor\Plugin::instance()->widgets_manager;

		// Header Elements
		require_once( MALEN_ADDONS . '/header/header.php' );
		require_once( MALEN_ADDONS . '/header/header-v2.php' );

		// Include Widget files
		foreach($this->Malen_Include_File() as $widget_file_name){
			require_once( MALEN_ADDONS . '/widgets/malen-'."$widget_file_name".'.php' );
		}

		// Header Widget Register
		$widget_register->register ( new \Malen_Header() );
		$widget_register->register ( new \Mechon_Header() );
		
		// Register widget
		$widget_register->register ( new \Malen_Section_Title() );
		$widget_register->register ( new \Malen_Button() );
		$widget_register->register ( new \Malen_Blog() );
		$widget_register->register ( new \Malen_Menu() );
		$widget_register->register ( new \Malen_Banner() );
		$widget_register->register ( new \malen_Video() );
		$widget_register->register ( new \Malen_Team() );
		$widget_register->register ( new \Malen_Team_info() );
		$widget_register->register ( new \Malen_Arrows() );
		$widget_register->register ( new \Malen_Testimonial() );
		$widget_register->register ( new \Malen_Service() );
		$widget_register->register ( new \malen_Portfolio() );
		$widget_register->register ( new \malen_Portfolio_Info() );
		$widget_register->register ( new \Malen_Image() );
		$widget_register->register ( new \Malen_Animated_Shape() );
		$widget_register->register ( new \Malen_Brand_Logo() );
		$widget_register->register ( new \Malen_Counterup() );
		$widget_register->register ( new \Malen_Service_List() );
		$widget_register->register ( new \Malen_Contact_Info() );
		$widget_register->register ( new \Malen_Contact_Form() );
		$widget_register->register ( new \Malen_Faq() );
		$widget_register->register ( new \Malen_Tab_Builder() );
		$widget_register->register ( new \Malen_Gallery() );
		$widget_register->register ( new \Malen_Info_Box() );
		$widget_register->register ( new \Malen_Skill() );
		$widget_register->register ( new \Malen_Newsletter() );
		$widget_register->register ( new \Malen_About_Info() );
		$widget_register->register ( new \Malen_Cta() );
		$widget_register->register ( new \Malen_Step() );
		$widget_register->register ( new \Malen_Features() );
		$widget_register->register ( new \Malen_Price() );


		// New Home Added From Here
		$widget_register->register ( new \Mechon_Testimonial_Slider() );
		$widget_register->register ( new \Mechon_About_Tab() );
		$widget_register->register ( new \Mechon_Banner() );
		$widget_register->register ( new \Mechon_Blog_Post() );
		$widget_register->register ( new \Mechon_Client_Logo() );
		$widget_register->register ( new \Mechon_Contact_Informations() );
		$widget_register->register ( new \Mechon_Contact_Tab_Box() );
		$widget_register->register ( new \Mechon_Counterup() );
		$widget_register->register ( new \Mechon_Download_Button_Box() );
		$widget_register->register ( new \Mechon_Experince_Box() );
		$widget_register->register ( new \Mechon_Faq() );
		$widget_register->register ( new \Mechon_Feature_Box() );
		$widget_register->register ( new \Mechon_Gallery_Filter() );
		$widget_register->register ( new \Mechon_Image() );
		$widget_register->register ( new \Mechon_Newsletter_Widgets() );
		$widget_register->register ( new \Mechon_Price_Box() );
		$widget_register->register ( new \Mechon_Product_Slider() );
		$widget_register->register ( new \Mechon_Skill_Box() );
		$widget_register->register ( new \Mechon_Project_Info_Widget() );
		$widget_register->register ( new \Mechon_Projects_Widget() );
		$widget_register->register ( new \Mechon_Service_Cost() );
		$widget_register->register ( new \Mechon_Service() );
		$widget_register->register ( new \Mechon_Simple_Tab() );
		$widget_register->register ( new \Mechon_Tab_Builder() );
		$widget_register->register ( new \Mechon_Team_member_info_Widget() );
		$widget_register->register ( new \Mechon_Team() );
		$widget_register->register ( new \Mechon_Process_Box() );
		$widget_register->register ( new \Mechon_Section_Title_Widget() );
		$widget_register->register ( new \Mechon_Button() );
		$widget_register->register ( new \Mechon_Animated_Image() );
	}

	public function Malen_Include_File(){
		return ['section-title', 'button', 'banner', 'blog', 'menu-select', 'video', 'team', 'team-info', 'arrows', 'testimonial', 'service', 'portfolio', 'portfolio-info', 'image', 'animated-shape', 'brand-logo', 'counterup', 'service-list', 'contact-info', 'contact-form', 'faq', 'tab-builder', 'gallery', 'info-box', 'skill', 'newsletter', 'about-info', 'cta', 'step', 'features', 'price', 'testimonials-v2', 'about-tab-v2', 'banner-v2', 'blog-v2', 'brand-logo-v2', 'contact-informations-v2', 'contact-tab-v2', 'counterup-v2', 'download-button-v2', 'experince-box-v2', 'faq-v2', 'feature-box-v2', 'gallery-filter-v2', 'image-v2', 'newslatter-v2', 'price-v2', 'product-v2', 'progressbar-v2', 'project-info-v2', 'projects-v2', 'service-cost-v2', 'service-v2', 'simple-tab-v2', 'tab-builder-v2', 'team-info-v2', 'team-v2', 'step-v2', 'title', 'button-v2', 'animated-shape-v2',];
	}

    public function widget_scripts() {

        wp_enqueue_script(
            'malen-frontend-script',
            MALEN_PLUGDIRURI . 'assets/js/malen-frontend.js',
            array('jquery'),
            false,
            true
		);

	}


	// public function malen_regsiter_widget_scripts( ) {

	// 	wp_register_script(
 //            'malen-tilt',
 //            MALEN_PLUGDIRURI . 'assets/js/tilt.jquery.min.js',
 //            array('jquery'),
 //            false,
 //            true
	// 	);
	// }


    function malen_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'malen',
            [
                'title' => __( 'Malen', 'malen' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'malen_footer_elements',
            [
                'title' => __( 'Malen Footer Elements', 'malen' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'malen_header_elements',
            [
                'title' => __( 'Malen Header Elements', 'malen' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Malen_Extension::instance();