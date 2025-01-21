<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "malen_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }


    $alowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array()
    );


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        // 'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Malen Options', 'malen' ),
        'page_title'           => esc_html__( 'Malen Options', 'malen' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'malen' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'malen' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'malen' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'malen' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'malen' );
    Redux::set_help_sidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */


    // -> START General Fields

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'malen' ),
        'id'               => 'malen_general',
        'customizer_width' => '450px',
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'malen_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color', 'malen' ),
            ),
            array(
                'id'       => 'malen_heading_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Heading Color (H1-H6)', 'malen' ),
            ),
            array(
                'id'       => 'malen_body_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Color (Default Text Color)', 'malen' ),
            ),
            array(
                'id'       => 'malen_border_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Border Color', 'malen' ),
            ),
            array(
                'id'       => 'malen_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Links Color', 'malen' ),
                'output'   => array( 'color'    =>  'a' ),
            ),

        )

    ) );

    
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'malen' ),
        'id'               => 'malen_typography',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'malen_theme_body_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font Family', 'malen' ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'       => 'malen_theme_heading_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading Font Family', 'malen' ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
            array(
                'id'    => 'info_1',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Heading Fonts', 'malen'),
            ),
            array(
                'id'       => 'malen_theme_h1_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H1 Font', 'malen' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h1'),
            ),
            array(
                'id'       => 'malen_theme_h2_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H2 Font', 'malen' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h2'),
            ),
            array(
                'id'       => 'malen_theme_h3_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H3 Font', 'malen' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h3'),
            ),
            array(
                'id'       => 'malen_theme_h4_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H4 Font', 'malen' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h4'),
            ),
            array(
                'id'       => 'malen_theme_h5_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H5 Font', 'malen' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h5'),
            ),
            array(
                'id'       => 'malen_theme_h6_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'H6 Font', 'malen' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('h6'),
            ),
            array(
                'id'    => 'info_2',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Paragraph Fonts', 'malen'),
            ),
            array(
                'id'       => 'malen_theme_p_font',
                'type'     => 'typography',
                'title'    => esc_html__( 'P Font', 'malen' ),
                'google'      => true, 
                'font-style' => true,
                'text-transform' => true,
                'subsets' => false,
                'text-align' => false,
                'color' => true,
                'output'      => array('p'),
            ),
           
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back To Top', 'malen' ),
        'id'               => 'malen_backtotop',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'malen_display_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back To Top Button', 'malen' ),
                'subtitle' => esc_html__( 'Switch On to Display back to top button.', 'malen' ),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'malen' ),
                'off'      => esc_html__( 'Disabled', 'malen' ),
            ),
            array(
                'id'       => 'malen_custom_bcktotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Custom Back To Top Button', 'malen' ),
                'subtitle' => esc_html__( 'If you select "Disabled", it will show default design for "back to top" button.', 'malen' ),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'malen' ),
                'off'      => esc_html__( 'Disabled', 'malen' ),
                'required' => array('malen_display_bcktotop','equals','1'),
            ),
            array(
                'id'       => 'malen_custom_bcktotop_icon',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Back To Top Button Icon', 'malen'),
                'subtitle' => esc_html__( 'Write Icon Class Here', 'malen'),
                'required' => array( 'malen_custom_bcktotop', 'equals', '1' ),
            ),
            array(
                'id'       => 'malen_bcktotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Button Background Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Back to top button Background Color.', 'malen' ),
                'required' => array('malen_display_bcktotop','equals','1'),
                'output'   => array( 'background-color' =>'.scroll-btn i' ),
            ),
            array(
                'id'       => 'malen_bcktotop_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Back To Top Icon Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Back to top Icon Color.', 'malen' ),
                'required' => array('malen_display_bcktotop','equals','1'),
                'output'   => array( '.scrollToTop i' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'malen' ),
        'id'               => 'malen_preloader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'malen_display_preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'malen' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'malen' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','malen'),
                'off'      => esc_html__('Disabled','malen'),
            ),

            array(
                'id'       => 'malen_preloader_img',
                'type'     => 'media',
                'title'    => esc_html__( 'Preloader Image', 'malen' ),
                'subtitle' => esc_html__( 'Set Preloader Image.', 'malen' ),
                'required' => array( "malen_display_preloader","equals",true )
            ),
        )
    ));

    /* End General Fields */

    /* Admin Lebel Fields */
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Admin Label', 'malen' ),
        'id'                => 'malen_admin_label',
        'customizer_width'  => '450px',
        'subsection'        => true,
        'fields'            => array(
            array(
                'title'     => esc_html__( 'Admin Login Logo', 'malen' ),
                'subtitle'  => esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'malen' ),
                'id'        => 'malen_admin_login_logo',
                'type'      => 'media',
            ),
            array(
                'title'     => esc_html__( 'Custom CSS For admin', 'malen' ),
                'subtitle'  => esc_html__( 'Any CSS your write here will run in admin.', 'malen' ),
                'id'        => 'malen_theme_admin_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'theme'     => 'chrome',
                'full_width'=> true,
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'malen' ),
        'id'               => 'malen_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'malen_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"   => esc_html__('Prebuilt','malen'),
                    "2"      => esc_html__('Header Builder','malen'),
                ),
                'title'    => esc_html__( 'Header Options', 'malen' ),
                'subtitle' => esc_html__( 'Select header options.', 'malen' ),
            ),
            array(
                'id'       => 'malen_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'malen_header',
                    'posts_per_page' => -1,
                ),
                'title'    => esc_html__( 'Header', 'malen' ),
                'subtitle' => esc_html__( 'Select header.', 'malen' ),
                'required' => array( 'malen_header_options', 'equals', '2' )
            ),

            array(
                'id'       => 'malen_header_topbar_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'malen' ),
                'off'      => esc_html__( 'Hide', 'malen' ),
                'title'    => esc_html__( 'Header Topbar?', 'malen' ),
                'subtitle' => esc_html__( 'Control Header Topbar By Show Or Hide System.', 'malen'),
                'required' => array( 'malen_header_options', 'equals', '1' )
            ),    
            array(
                'id'       => 'malen_logo_shape',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo Shape', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your Logo shape', 'malen' ),
                'required' => array( 'malen_header_topbar_switcher', 'equals', '1' ),
            ),     
            array(
                'id'       => 'malen_header_topbar_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Topbar Background', 'malen' ),
                'subtitle' => esc_html__( 'Set Topbar Background Color', 'malen' ),
                'output'   => array( 'background-color'    =>  '.header-layout2.prebuilt .header-top:before' ),
                'required' => array( 'malen_header_topbar_switcher', 'equals', '1' ),
            ),

            array(
                'id'       => 'malen_topbar_email_icon',
                'type'     => 'text',
                'default'  => esc_html__( '', 'malen' ),
                'title'    => esc_html__( 'Email Icon', 'malen' ),
                'subtitle' => esc_html__( 'Set Email Icon', 'malen' ),
                'required' => array( 
                    array('malen_header_options','equals','1'), 
                    array('malen_header_topbar_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'malen_topbar_email',
                'type'     => 'text',
                'default'  => esc_html__( 'support@gmail.com', 'malen' ),
                'title'    => esc_html__( 'Email Address', 'malen' ),
                'subtitle' => esc_html__( 'Set Email Address', 'malen' ),
                'required' => array( 
                    array('malen_header_options','equals','1'), 
                    array('malen_header_topbar_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'malen_topbar_address_icon',
                'type'     => 'text',
                'default'  => esc_html__( '', 'malen' ),
                'title'    => esc_html__( 'Address Icon', 'malen' ),
                'subtitle' => esc_html__( 'Set Address Icon', 'malen' ),
                'required' => array( 
                    array('malen_header_options','equals','1'), 
                    array('malen_header_topbar_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'malen_topbar_address',
                'type'     => 'text',
                'default'  => esc_html__( '8502 Preston Rd. Inglewood, Maine 98380', 'malen' ),
                'title'    => esc_html__( 'Address', 'malen' ),
                'subtitle' => esc_html__( 'Set Address', 'malen' ),
                'required' => array( 
                    array('malen_header_options','equals','1'), 
                    array('malen_header_topbar_switcher','equals','1') 
                )
            ),
            array(
                'id'       => 'malen_header_lang_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'malen' ),
                'off'      => esc_html__( 'Hide', 'malen' ),
                'title'    => esc_html__( 'Show Language Icon?', 'malen' ),
                'subtitle' => esc_html__( 'Click Show To Display Language Icon?', 'malen'),
                'required' => array( 'malen_header_topbar_switcher', 'equals', '1' )
            ),
            array(
                'id'       => 'malen_header_topbar_social_icon_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'malen' ),
                'off'      => esc_html__( 'Hide', 'malen' ),
                'title'    => esc_html__( 'Header Social Icon?', 'malen' ),
                'subtitle' => esc_html__( 'Click Show To Display Social Icon?', 'malen'),
                'required' => array( 'malen_header_topbar_switcher', 'equals', '1' )
            ),  
            array(
                'id'       => 'malen_header_menu_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Header Menu Background Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Topbar Background Color', 'malen' ),
                'output'   => array( 'background-color'    =>  '.header-layout2.prebuilt .sticky-wrapper' ),
                'required' => array( 'malen_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'malen_header_search_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'malen' ),
                'off'      => esc_html__( 'Hide', 'malen' ),
                'title'    => esc_html__( 'Show Search Icon?', 'malen' ),
                'subtitle' => esc_html__( 'Click Show To Display Search Icon?', 'malen'),
                'required' => array( 'malen_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'malen_header_cart_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'malen' ),
                'off'      => esc_html__( 'Hide', 'malen' ),
                'title'    => esc_html__( 'Show Cart Icon?', 'malen' ),
                'subtitle' => esc_html__( 'Click Show To Display Cart Icon?', 'malen'),
                'required' => array( 'malen_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'malen_phone_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__( 'Show', 'malen' ),
                'off'      => esc_html__( 'Hide', 'malen' ),
                'title'    => esc_html__( 'Phone Box Show?', 'malen' ),
                'subtitle' => esc_html__( 'Click Show To Display Phone?', 'malen'),
                'required' => array( 'malen_header_options', 'equals', '1' )
            ),
            array(
                'id'       => 'malen_topbar_phone_icon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Phone Icon', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your Phone icon ( recommendation png format ).', 'malen' ),
                'required' => array( 
                    array('malen_phone_switcher','equals','1'), 
                )
            ),
            array(
                'id'       => 'malen_topbar_phone_label',
                'type'     => 'text',
                'default'  => esc_html__( 'Need Help? Talk with Us', 'malen' ),
                'title'    => esc_html__( 'Phone Label', 'malen' ),
                'subtitle' => esc_html__( 'Set Phone Label Text', 'malen' ),
                'required' => array( 
                    array('malen_phone_switcher','equals','1'), 
                )
            ),
            array(
                'id'       => 'malen_topbar_phone',
                'type'     => 'text',
                'default'  => esc_html__( '+111 (564) 568
                25', 'malen' ),
                'title'    => esc_html__( 'Phone Number', 'malen' ),
                'subtitle' => esc_html__( 'Set Phone Number', 'malen' ),
                'required' => array( 
                    array('malen_phone_switcher','equals','1'), 
                )
            ),
            // array(
            //     'id'       => 'malen_btn_bg_hover_color',
            //     'type'     => 'color',
            //     'title'    => esc_html__( 'Button Background Hover', 'malen' ),
            //     'subtitle' => esc_html__( 'Set Button Background Hover Color', 'malen' ),
            //     'output'   => array( '--theme-color'  =>  '.prebuilt .th-btn.blue-btn:hover, .prebuilt .th-btn.blue-btn:hover:before'),
            //     'required' => array( 
            //         array('malen_btn_switcher','equals','1') 
            //     )
            // ),
        ),
    ) );
    // -> START Header Logo
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Logo', 'malen' ),
        'id'               => 'malen_header_logo_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'malen_site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site logo for header ( recommendation png format ).', 'malen' ),
            ),
            array(
                'id'       => 'malen_site_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'malen'),
                'output'   => array('.header-logo .logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'malen'),
            ),
            array(
                'id'       => 'malen_site_logomargin_dimensions',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'output'   => array('.header-logo .logo img'),
                'units_extended' => 'false',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Top and Bottom Margin.', 'malen'),
                'left'     => false,
                'right'    => false,
                'subtitle' => esc_html__('Set logo top and bottom margin.', 'malen'),
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'malen_text_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Text Logo', 'malen' ),
                'subtitle' => esc_html__( 'Write your logo text use as logo ( You can use span tag for text color ).', 'malen' ),
            )
        )
    ) );
    // -> End Header Logo

    // -> START Header Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Menu', 'malen' ),
        'id'               => 'malen_header_menu_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'malen_header_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'malen' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu>ul>li>a' ),
            ),
            array(
                'id'       => 'malen_header_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'malen' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu>ul>li>a:hover' ),
            ),
            array(
                'id'       => 'malen_header_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Submenu Color', 'malen' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu ul.sub-menu li a' ),
            ),
            array(
                'id'       => 'malen_header_submenu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Hover Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Submenu Hover Color', 'malen' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu ul.sub-menu li a:hover' ),
            ),
            array(
                'id'       => 'malen_header_submenu_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Submenu Icon Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Submenu Icon Color', 'malen' ),
                'output'   => array( 'color'    =>  '.prebuilt .main-menu ul.sub-menu li a:before' ),
            ),
        )
    ) );
    // -> End Header Menu

     // -> START Mobile Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Offcanvas', 'malen' ),
        'id'               => 'malen_offcanvas_panel',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'malen_offcanvas_panel_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Offcanvas Panel Background', 'malen' ),
                'output'   => array('.sidemenu-wrapper .sidemenu-content'),
                'subtitle' => esc_html__( 'Set Offcanvas Panel Background Color', 'malen' ),
            ),
            array(
                'id'       => 'malen_offcanvas_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Offcanvas Title Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Offcanvas Title color.', 'malen' ),
                'output'   => array( '.sidemenu-content h3.sidebox-title' )
            ),
        )
    ) );
    // -> End Mobile Menu

    // -> START Blog Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'malen' ),
        'id'         => 'malen_blog_page',
        'icon'  => 'el el-blogger',
        'fields'     => array(

            array(
                'id'       => 'malen_blog_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'malen' ),
                'subtitle' => esc_html__( 'Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'malen' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'malen_blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Column', 'malen' ),
                'subtitle' => esc_html__( 'Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'malen' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/1column.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2column.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3column.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'malen_blog_page_title_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__('Show','malen'),
                'off'      => esc_html__('Hide','malen'),
                'title'    => esc_html__('Blog Page Title', 'malen'),
                'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'malen'),
            ),
            array(
                'id'       => 'malen_blog_page_title_setting',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Page Title Setting', 'malen'),
                'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'malen'),
                'options'  => array(
                    "predefine"   => esc_html__('Default','malen'),
                    "custom"      => esc_html__('Custom','malen'),
                ),
                'default'  => 'predefine',
                'required' => array("malen_blog_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'malen_blog_page_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Custom Title', 'malen'),
                'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'malen'),
                'required' => array('malen_blog_page_title_setting','equals','custom')
            ),
            array(
                'id'            => 'malen_blog_postExcerpt',
                'type'          => 'slider',
                'title'         => esc_html__('Blog Posts Excerpt', 'malen'),
                'subtitle'      => esc_html__('Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'malen'),
                "default"       => 46,
                "min"           => 0,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'malen_blog_readmore_setting',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Read More Text Setting', 'malen' ),
                'subtitle' => esc_html__( 'Control read more text from here.', 'malen' ),
                'options'  => array(
                    "default"   => esc_html__('Default','malen'),
                    "custom"    => esc_html__('Custom','malen'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'malen_blog_custom_readmore',
                'type'     => 'text',
                'title'    => esc_html__('Read More Text', 'malen'),
                'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'malen'),
                'required' => array('malen_blog_readmore_setting','equals','custom')
            ),
            array(
                'id'       => 'malen_blog_title_color',
                'output'   => array( '.th-blog .blog-title a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Blog Title Color.', 'malen' ),
            ),
            array(
                'id'       => 'malen_blog_title_hover_color',
                'output'   => array( '.th-blog .blog-title a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Hover Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Blog Title Hover Color.', 'malen' ),
            ),
            array(
                'id'       => 'malen_blog_contant_color',
                'output'   => array( '.blog-content p'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Excerpt / Content Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Blog Excerpt / Content Color.', 'malen' ),
            ),
            array(
                'id'       => 'malen_blog_read_more_button_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Read More Button Color.', 'malen' ),
                'output'   => array( '--theme-color' => '.blog-single .blog-content .th-btn' ),
            ),
            array(
                'id'       => 'malen_blog_read_more_button_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'malen' ),
                'output'   => array( '--title-color' => '.blog-single .blog-content .th-btn:hover' ),
            ),
            array(
                'id'       => 'malen_blog_pagination_color',
                'output'   => array( '.th-pagination a'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Color', 'malen'),
                'subtitle' => esc_html__('Set Blog Pagination Color.', 'malen'),
            ),
            array(
                'id'       => 'malen_blog_pagination_bg_color',
                'output'   => array( '--smoke-color' => '.th-pagination a'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Background', 'malen'),
                'subtitle' => esc_html__('Set Blog Pagination Backgorund Color.', 'malen'),
            ),
            // array(
            //     'id'       => 'malen_blog_pagination_active_color',
            //     'output'   => array( '.pagination li span.current'),
            //     'type'     => 'color',
            //     'title'    => esc_html__('Blog Pagination Active Color', 'malen'),
            //     'subtitle' => esc_html__('Set Blog Pagination Active Color.', 'malen'),
            //     'required'  => array('malen_blog_pagination', '=', '1')
            // ),
            array(
                'id'       => 'malen_blog_pagination_hover_color',
                'output'   => array( '.th-pagination a:hover, .th-pagination a.active'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover & Active Color', 'malen'),
                'subtitle' => esc_html__('Set Blog Pagination Hover & Active Color.', 'malen'),
            ),
            array(
                'id'       => 'malen_blog_pagination_bg_hover_color',
                'output'   => array( '--theme-color' => '.th-pagination a:hover, .th-pagination a.active'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Pagination Hover & Active Background', 'malen'),
                'subtitle' => esc_html__('Set Blog Pagination Background Hover & Active Color.', 'malen'),
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Page', 'malen' ),
        'id'         => 'malen_post_detail_styles',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'malen_blog_single_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'malen' ),
                'subtitle' => esc_html__( 'Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'malen' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'malen_post_details_title_position',
                'type'     => 'button_set',
                'default'  => 'header',
                'options'  => array(
                    'header'        => esc_html__('On Header','malen'),
                    'below'         => esc_html__('Below Thumbnail','malen'),
                ),
                'title'    => esc_html__('Blog Post Title Position', 'malen'),
                'subtitle' => esc_html__('Control blog post title position from here.', 'malen'),
            ),
            array(
                'id'       => 'malen_post_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Details Custom Title', 'malen'),
                'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'malen'),
                'required' => array('malen_post_details_title_position','equals','below')
            ),
            array(
                'id'       => 'malen_display_post_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'malen' ),
                'subtitle' => esc_html__( 'Switch On to Display Tags.', 'malen' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','malen'),
                'off'       => esc_html__('Disabled','malen'),
            ),
            array(
                'id'       => 'malen_post_details_share_options',
                'type'     => 'switch',
                'title'    => esc_html__('Share Options', 'malen'),
                'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'malen'),
                'on'        => esc_html__('Show','malen'),
                'off'       => esc_html__('Hide','malen'),
                'default'   => '0',
            ),
            array(
                'id'       => 'malen_post_details_author_desc_trigger',
                'type'     => 'switch',
                'title'    => esc_html__('Post Author', 'malen'),
                'subtitle' => esc_html__('Control post author from here. If you use this option then you will able to show or hide post author ( Default setting Show ).', 'malen'),
                'on'        => esc_html__('Show','malen'),
                'off'       => esc_html__('Hide','malen'),
                'default'   => true,
            ),
           
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Meta Data', 'malen' ),
        'id'         => 'malen_common_meta_data',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'malen_blog_meta_icon_color',
                'output'   => array( '.blog-meta a i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Meta Icon Color', 'malen'),
                'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'malen'),
            ),
            array(
                'id'       => 'malen_blog_meta_text_color',
                'output'   => array( '.blog-meta a,.blog-meta span'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Text Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Blog Meta Text Color.', 'malen' ),
            ),
            array(
                'id'       => 'malen_blog_meta_text_hover_color',
                'output'   => array( '.blog-meta a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Hover Text Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Blog Meta Hover Text Color.', 'malen' ),
            ),
            array(
                'id'       => 'malen_display_post_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post author', 'malen' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Author.', 'malen' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','malen'),
                'off'       => esc_html__('Disabled','malen'),
            ),
            array(
                'id'       => 'malen_display_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'malen' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Date.', 'malen' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','malen'),
                'off'       => esc_html__('Disabled','malen'),
            ),
            array(
                'id'       => 'malen_display_post_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Comment', 'malen' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Comment Number.', 'malen' ),
                'default'  => false,
                'on'        => esc_html__('Enabled','malen'),
                'off'       => esc_html__('Disabled','malen'),
            ),
            array(
                'id'       => 'malen_display_post_tag',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Category', 'malen' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Category.', 'malen' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','malen'),
                'off'       => esc_html__('Disabled','malen'),
            ),
        )
    ));

    /* End blog Page */

    // -> START Page Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page & Breadcrumb', 'malen' ),
        'id'         => 'malen_page_page',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'malen_page_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select layout', 'malen' ),
                'subtitle' => esc_html__( 'Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'malen' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'malen_page_layoutopt',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Settings', 'malen'),
                'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'malen'),
                //Must provide key => value pairs for options
                'options' => array(
                    '1' => esc_html__( 'Page Sidebar', 'malen' ),
                    '2' => esc_html__( 'Blog Sidebar', 'malen' )
                 ),
                'default' => '1',
                'required'  => array('malen_page_sidebar','!=','1')
            ),
            array(
                'id'       => 'malen_page_title_switcher',
                'type'     => 'switch',
                'title'    => esc_html__('Title', 'malen'),
                'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'malen'),
                'default'  => '1',
                'on'        => esc_html__('Enabled','malen'),
                'off'       => esc_html__('Disabled','malen'),
            ),
            array(
                'id'       => 'malen_page_title_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','malen'),
                    'h2'        => esc_html__('H2','malen'),
                    'h3'        => esc_html__('H3','malen'),
                    'h4'        => esc_html__('H4','malen'),
                    'h5'        => esc_html__('H5','malen'),
                    'h6'        => esc_html__('H6','malen'),
                ),
                'default'  => 'h1',
                'title'    => esc_html__( 'Title Tag', 'malen' ),
                'subtitle' => esc_html__( 'Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'malen' ),
                'required' => array("malen_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'malen_allHeader_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Title Color', 'malen' ),
                'output'   => array( 'color' => '.breadcumb-title' ),
                'required' => array("malen_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'malen_allHeader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background', 'malen' ),
                'subtitle' => esc_html__( 'Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'malen' ),
                'output'   => array( 'background' => '.breadcumb-wrapper' ),
            ),
            array(
                'id'       => 'malen_allHeader_shape',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Breadcumb Shape', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your breadcumb shape', 'malen' ),
            ),
             array(
                'id'       => 'malen_shoppage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Shop Pages', 'malen' ),
                'output'   => array( 'background' => '.custom-woo-class' ),
            ),
            array(
                'id'       => 'malen_archivepage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Archive Pages', 'malen' ),
                'output'   => array( 'background' => '.custom-archive-class' ),
            ),
            array(
                'id'       => 'malen_searchpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Search Pages', 'malen' ),
                'output'   => array( 'background' => '.custom-search-class' ),
            ),
            array(
                'id'       => 'malen_errorpage_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background For Error Pages', 'malen' ),
                'output'   => array( 'background' => '.custom-error-class' ),
            ),
            array(
                'id'       => 'malen_enable_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb Hide/Show', 'malen' ),
                'subtitle' => esc_html__( 'Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'malen' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'malen_allHeader_breadcrumbtextcolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Color', 'malen' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'malen' ),
                'required' => array("malen_page_title_switcher","equals","1"),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li a' ),
            ),
            array(
                'id'       => 'malen_allHeader_breadcrumbtextactivecolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Active Color', 'malen' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'malen' ),
                'required' => array( "malen_page_title_switcher", "equals", "1" ),
                'output'   => array( 'color' => '.breadcumb-wrapper .breadcumb-content ul li:last-child' ),
            ),
            array(
                'id'       => 'malen_allHeader_dividercolor',
                'type'     => 'color',
                'output'   => array( 'color'=>'.breadcumb-wrapper .breadcumb-content ul li:after' ),
                'title'    => esc_html__( 'Breadcrumb Divider Color', 'malen' ),
                'subtitle' => esc_html__( 'Choose breadcrumb divider color.', 'malen' ),
            ),
        ),
    ) );
    /* End Page option */

    // -> START 404 Page

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'malen' ),
        'id'         => 'malen_404_page',
        'icon'       => 'el el-ban-circle',
        'fields'     => array(
            array(
                'id'       => 'malen_for_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Error Image', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your error image ( recommendation png format ).', 'malen' ),
            ),
            array(
                'id'       => 'malen_fof_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Title', 'malen' ),
                'subtitle' => esc_html__( 'Set Page title ', 'malen' ),
                'default'  => esc_html__( '404', 'malen' ),
            ),
            array(
                'id'       => 'malen_fof_description',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Description', 'malen' ),
                'subtitle' => esc_html__( 'Set Page Subtitle ', 'malen' ),
                'default'  => esc_html__( 'Unfortunately, something went wrong and this page does not exist. Try using the search or return to the previous page.', 'malen' ),
            ),
            array(
                'id'       => 'malen_fof_btn_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'malen' ),
                'subtitle' => esc_html__( 'Set Button Text ', 'malen' ),
                'default'  => esc_html__( 'Return To Home', 'malen' ),
            ),
            array(
                'id'       => 'malen_fof_title_color',
                'type'     => 'color',
                'output'   => array( '.error-title' ),
                'title'    => esc_html__( 'Title Color', 'malen' ),
                'subtitle' => esc_html__( 'Pick a subtitle color', 'malen' ),
                'validate' => 'color'
            ),           
            array(
                'id'       => 'malen_fof_desc_color',
                'type'     => 'color',
                'output'   => array( '.error-text' ),
                'title'    => esc_html__( 'Description Color', 'malen' ),
                'subtitle' => esc_html__( 'Pick a description color', 'malen' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'malen_fof_btn_color2',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Color', 'malen' ),
                'subtitle' => esc_html__( 'Button Color.', 'malen' ),
                'output'   => array( 'color' => '.th-btn.error-btn' ),
            ),
            array(
                'id'       => 'malen_fof_btn_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background', 'malen' ),
                'subtitle' => esc_html__( 'Button Color.', 'malen' ),
                'output'   => array( '--theme-color' => '.th-btn.error-btn' ),
            ),
            array(
                'id'       => 'malen_fof_btn_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Button Hover Color.', 'malen' ),
                'output'   => array( 'color' => '.th-btn.error-btn:hover',  ),
            ),
            array(
                'id'       => 'malen_fof_btn_hover_color2',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Hover Color', 'malen' ),
                'subtitle' => esc_html__( 'Set Button Hover Color.', 'malen' ),
                'output'   => array( '--title-color' => '.th-btn.error-btn:hover::before, .th-btn.error-btn:hover::after',  ),
            ),
        ),
    ) );

    /* End 404 Page */
    // -> START Woo Page Option

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Woocommerce Page', 'malen' ),
        'id'         => 'malen_woo_page_page',
        'icon'  => 'el el-shopping-cart',
        'fields'     => array(
            array(
                'id'       => 'malen_woo_shoppage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Set Shop Page Sidebar.', 'malen' ),
                'subtitle' => esc_html__( 'Choose shop page sidebar', 'malen' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'malen_woo_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Column', 'malen' ),
                'subtitle' => esc_html__( 'Set your woocommerce product column.', 'malen' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2' => array(
                        'alt' => esc_attr__('2 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('3 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '4' => array(
                        'alt' => esc_attr__('4 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),
                    '5' => array(
                        'alt' => esc_attr__('5 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/5col.png')
                    ),
                    '6' => array(
                        'alt' => esc_attr__('6 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),),
                'default'  => '4'
            ),
            array(
                'id'       => 'malen_woo_product_perpage',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Per Page', 'malen' ),
                'default' => '10'
            ),
            array(
                'id'       => 'malen_woo_singlepage_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Product Single Page sidebar', 'malen' ),
                'subtitle' => esc_html__( 'Choose product single page sidebar.', 'malen' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'malen_product_details_title_position',
                'type'     => 'button_set',
                'default'  => 'below',
                'options'  => array(
                    'header'        => esc_html__('On Header','malen'),
                    'below'         => esc_html__('Below Thumbnail','malen'),
                ),
                'title'    => esc_html__('Product Details Title Position', 'malen'),
                'subtitle' => esc_html__('Control product details title position from here.', 'malen'),
            ),
            array(
                'id'       => 'malen_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'malen' ),
                'default'  => esc_html__( 'Shop Details', 'malen' ),
                'required' => array('malen_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'malen_product_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Product Details Title', 'malen' ),
                'default'  => esc_html__( 'Shop Details', 'malen' ),
                'required' => array('malen_product_details_title_position','equals','below'),
            ),
            array(
                'id'       => 'malen_woo_relproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Hide/Show', 'malen' ),
                'subtitle' => esc_html__( 'Hide / Show related product in single page (Default Settings Show)', 'malen' ),
                'default'  => '1',
                'on'       => esc_html__('Show','malen'),
                'off'      => esc_html__('Hide','malen')
            ),
            array(
                'id'       => 'malen_woo_relproduct_subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Subtitle', 'malen' ),
                'default'  => esc_html__( 'Some Others Product', 'malen' ),
                'required' => array('malen_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'malen_woo_relproduct_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products Title', 'malen' ),
                'default'  => esc_html__( 'Related products', 'malen' ),
                'required' => array('malen_woo_relproduct_display','equals',true)
            ),
            array(
                'id'       => 'malen_woo_relproduct_slider',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related product Sldier On/Off', 'malen' ),
                'subtitle' => esc_html__( 'Slider On/Off related product slider in single page (Default Settings Slider On)', 'malen' ),
                'default'  => '1',
                'on'       => esc_html__('Slider On','malen'),
                'off'      => esc_html__('Slider Off','malen')
            ),
            array(
                'id'       => 'malen_woo_relproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Related products number', 'malen' ),
                'subtitle' => esc_html__( 'Set how many related products you want to show in single product page.', 'malen' ),
                'default'  => 4,
                'required' => array('malen_woo_relproduct_display','equals',true)
            ),

            array(
                'id'       => 'malen_woo_related_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Related Product Column', 'malen' ),
                'subtitle' => esc_html__( 'Set your woocommerce related product column. it works if slider is off', 'malen' ),
                'required' => array('malen_woo_relproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'malen_woo_upsellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Upsell product Hide/Show', 'malen' ),
                'subtitle' => esc_html__( 'Hide / Show upsell product in single page (Default Settings Show)', 'malen' ),
                'default'  => '1',
                'on'       => esc_html__('Show','malen'),
                'off'      => esc_html__('Hide','malen'),
            ),
            array(
                'id'       => 'malen_woo_upsellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Upsells products number', 'malen' ),
                'subtitle' => esc_html__( 'Set how many upsells products you want to show in single product page.', 'malen' ),
                'default'  => 3,
                'required' => array('malen_woo_upsellproduct_display','equals',true),
            ),

            array(
                'id'       => 'malen_woo_upsell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Upsells Product Column', 'malen' ),
                'subtitle' => esc_html__( 'Set your woocommerce upsell product column.', 'malen' ),
                'required' => array('malen_woo_upsellproduct_display','equals',true),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'malen_woo_crosssellproduct_display',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cross sell product Hide/Show', 'malen' ),
                'subtitle' => esc_html__( 'Hide / Show cross sell product in single page (Default Settings Show)', 'malen' ),
                'default'  => '1',
                'on'       => esc_html__( 'Show', 'malen' ),
                'off'      => esc_html__( 'Hide', 'malen' ),
            ),
            array(
                'id'       => 'malen_woo_crosssellproduct_num',
                'type'     => 'text',
                'title'    => esc_html__( 'Cross sell products number', 'malen' ),
                'subtitle' => esc_html__( 'Set how many cross sell products you want to show in single product page.', 'malen' ),
                'default'  => 3,
                'required' => array('malen_woo_crosssellproduct_display','equals',true),
            ),

            array(
                'id'       => 'malen_woo_crosssell_product_col',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Cross sell Product Column', 'malen' ),
                'subtitle' => esc_html__( 'Set your woocommerce cross sell product column.', 'malen' ),
                'required' => array( 'malen_woo_crosssellproduct_display', 'equals', true ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '6' => array(
                        'alt' => esc_attr__('2 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2col.png')
                    ),
                    '4' => array(
                        'alt' => esc_attr__('3 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3col.png' )
                    ),
                    '3' => array(
                        'alt' => esc_attr__('4 Columns','malen'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/4col.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('6 Columns','malen'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/6col.png' )
                    ),

                ),
                'default'  => '4'
            ),
        ),
    ) );

    /* End Woo Page option */
    // -> START Gallery
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Gallery', 'malen' ),
        'id'         => 'malen_gallery_widget',
        'icon'       => 'el el-gift',
        'fields'     => array(
            array(
                'id'          => 'malen_gallery_image_widget',
                'type'        => 'slides',
                'title'       => esc_html__('Add Gallery Image', 'malen'),
                'subtitle'    => esc_html__('Add gallery Image and url.', 'malen'),
                'show'        => array(
                    'title'          => false,
                    'description'    => false,
                    'progress'       => false,
                    'icon'           => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => true,
                ),
            ),
        ),
    ) );
    // -> START Subscribe
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe', 'malen' ),
        'id'         => 'malen_subscribe_page',
        'icon'       => 'el el-eject',
        'fields'     => array(

            array(
                'id'       => 'malen_subscribe_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp API Key', 'malen' ),
                'subtitle' => esc_html__( 'Set mailchimp api key.', 'malen' ),
            ),
            array(
                'id'       => 'malen_subscribe_listid',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp List ID', 'malen' ),
                'subtitle' => esc_html__( 'Set mailchimp list id.', 'malen' ),
            ),
        ),
    ) );

    /* End Subscribe */

    // -> START Social Media

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'malen' ),
        'id'         => 'malen_social_media',
        'icon'      => 'el el-globe',
        'desc'      => esc_html__( 'Social', 'malen' ),
        'fields'     => array(
            array(
                'id'          => 'malen_social_links',
                'type'        => 'slides',
                'title'       => esc_html__('Social Profile Links', 'malen'),
                'subtitle'    => esc_html__('Add social icon and url.', 'malen'),
                'show'        => array(
                    'title'          => true,
                    'description'    => true,
                    'progress'       => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => false,
                ),
                'placeholder'   => array(
                    'icon'          => esc_html__( 'Icon (example: fa fa-facebook) ','malen'),
                    'title'         => esc_html__( 'Social Icon Class', 'malen' ),
                    'description'   => esc_html__( 'Social Icon Title', 'malen' ),
                ),
            ),
        ),
    ) );

    /* End social Media */


    // -> START Footer Media
    Redux::setSection( $opt_name , array(
       'title'            => esc_html__( 'Footer', 'malen' ),
       'id'               => 'malen_footer',
       'desc'             => esc_html__( 'malen Footer', 'malen' ),
       'customizer_width' => '400px',
       'icon'              => 'el el-photo',
   ) );

   Redux::setSection( $opt_name, array(
       'title'      => esc_html__( 'Pre-built Footer / Footer Builder', 'malen' ),
       'id'         => 'malen_footer_section',
       'subsection' => true,
       'fields'     => array(
            array(
               'id'       => 'malen_footer_builder_trigger',
               'type'     => 'button_set',
               'default'  => 'prebuilt',
               'options'  => array(
                   'footer_builder'        => esc_html__('Footer Builder','malen'),
                   'prebuilt'              => esc_html__('Pre-built Footer','malen'),
               ),
               'title'    => esc_html__( 'Footer Builder', 'malen' ),
            ),
            array(
               'id'       => 'malen_footer_builder_select',
               'type'     => 'select',
               'required' => array( 'malen_footer_builder_trigger','equals','footer_builder'),
               'data'     => 'posts',
               'args'     => array(
                   'post_type'     => 'malen_footerbuild',
                   'posts_per_page' => -1,
               ),
               'on'       => esc_html__( 'Enabled', 'malen' ),
               'off'      => esc_html__( 'Disable', 'malen' ),
               'title'    => esc_html__( 'Select Footer', 'malen' ),
               'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'malen' ),
            ),

           
            
            array(
               'id'       => 'malen_footerwidget_enable',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Widget', 'malen' ),
               'default'  => 1,
               'on'       => esc_html__( 'Enabled', 'malen' ),
               'off'      => esc_html__( 'Disable', 'malen' ),
               'required' => array( 'malen_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'malen_footer_background',
               'type'     => 'background',
               'title'    => esc_html__( 'Footer Widget Background', 'malen' ),
               'subtitle' => esc_html__( 'Set footer background.', 'malen' ),
               'output'   => array( '.footer-layout4' ),
               'required' => array( 'malen_footerwidget_enable','=','1' ),
            ),
            array(
               'id'       => 'malen_footer_widget_title_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Title Color', 'malen' ),
               'required' => array('malen_footerwidget_enable','=','1'),
               'output'   => array( '.footer-widget .widget_title' ),
            ),
            array(
               'id'       => 'malen_footer_widget_anchor_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Color', 'malen' ),
               'required' => array('malen_footerwidget_enable','=','1'),
               'output'   => array( '.footer-widget.widget_nav_menu a' ),
            ),
            array(
               'id'       => 'malen_footer_widget_anchor_hov_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Hover Color', 'malen' ),
               'required' => array('malen_footerwidget_enable','=','1'),
               'output'   => array( '.footer-widget.widget_nav_menu a:hover,.footer-layout1 .footer-wid-wrap .widget-links ul li a:hover' ),
            ),
            array(
                'id'       => 'malen_footer_shape',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Footer Shape', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your footer shape', 'malen' ),
                'required' => array( 
                    array('malen_footerwidget_enable','equals','1'), 
                )
            ),
            array(
                'id'       => 'malen_footer_shape2',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Footer Shape 2', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your footer shape', 'malen' ),
                'required' => array( 
                    array('malen_footerwidget_enable','equals','1'), 
                )
            ),

       ),
   ) );
   
    // -> START Footer Newsletter
   Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Newsletter', 'malen' ),
        'id'         => 'malen_newsletter',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'malen_footer_newsletter_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Newsletter', 'malen' ),
                'default'  => 0,
                'on'       => esc_html__( 'Enabled', 'malen' ),
                'off'      => esc_html__( 'Disable', 'malen' ),
             ),
             array(
                'id'       => 'malen_newsletter_icon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Newsletter Icon', 'malen' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your newsletter icon.', 'malen' ),
                'required' => array( 
                    array('malen_footer_newsletter_enable','equals','1'), 
                )
            ),
            array(
                'id'       => 'malen_newsletter_title',
                'type'     => 'text',
                'title'    => esc_html__('Newsletter Title', 'malen'),
                'subtitle' => esc_html__('Set Newsletter title', 'malen'),
                'default'  => esc_html__( 'Subscribe Our Newsletter Get update', 'malen' ),
                'required' => array('malen_footer_newsletter_enable','=','1'),
            ),
            array(
                'id'       => 'malen_newsletter_placeholder',
                'type'     => 'text',
                'title'    => esc_html__('Newsletter Form Placeholder', 'malen'),
                'subtitle' => esc_html__('Set Newsletter placeholder', 'malen'),
                'default'  => esc_html__( 'Email Address', 'malen' ),
                'required' => array('malen_footer_newsletter_enable','=','1'),
            ),
            array(
                'id'       => 'malen_newsletter_button',
                'type'     => 'text',
                'title'    => esc_html__('Newsletter Button Text', 'malen'),
                'subtitle' => esc_html__('Set Newsletter Button Text', 'malen'),
                'default'  => esc_html__( 'Subscribe<span class="icon"><i class="fa-sharp fa-regular fa-paper-plane"></i></span>', 'malen' ),
                'required' => array('malen_footer_newsletter_enable','=','1'),
            ),
            array(
                'id'       => 'malen_newsletter_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Newsletter Background', 'malen' ),
                'required' => array( 'malen_disable_footer_bottom','=','1' ),
                'output'   => array( '--theme-color'   =>   '.newsletter-area' ),
             ),
             array(
                'id'       => 'malen_newsletter_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Newsletter Title Color', 'malen' ),
                'required' => array( 'malen_disable_footer_bottom','=','1' ),
                'output'   => array( '--white-color'   =>   '.newsletter-area .newsletter-title' ),
             ),

        )
    ));

    // -> START Footer Bottom
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Bottom', 'malen' ),
        'id'         => 'malen_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'malen_disable_footer_bottom',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Bottom?', 'malen' ),
                'default'  => 1,
                'on'       => esc_html__('Enabled','malen'),
                'off'      => esc_html__('Disable','malen'),
                'required' => array('malen_footer_builder_trigger','equals','prebuilt'),
             ),
 
              array(
                'id'       => 'malen_footer_bottom_background2',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Bottom Background Color', 'malen' ),
                'required' => array( 'malen_disable_footer_bottom','=','1' ),
                'output'   => array( '--black-color'   =>   '.footer-layout1 .copyright-wrap.bg-black' ),
             ),
             array(
                'id'       => 'malen_copyright_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Copyright Text', 'malen' ),
                'subtitle' => esc_html__( 'Add Copyright Text', 'malen' ),
                'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s By <a href="%s">%s</a>. All Rights Reserved.',date('Y'),esc_url('#'),__( 'Malen.','malen' ) ),
                'required' => array( 'malen_disable_footer_bottom','equals','1' ),
             ),
             array(
                'id'       => 'malen_footer_copyright_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Text Color', 'malen' ),
                'subtitle' => esc_html__( 'Set footer copyright text color', 'malen' ),
                'required' => array( 'malen_disable_footer_bottom','equals','1'),
                'output'   => array( '.footer-layout1 .copyright-wrap .copyright-text' ),
             ),
             array(
                'id'       => 'malen_footer_copyright_acolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Ancor Color', 'malen' ),
                'subtitle' => esc_html__( 'Set footer copyright ancor color', 'malen' ),
                'required' => array( 'malen_disable_footer_bottom','equals','1'),
                'output'    => array('color' => '.copyright-wrap a, .copyright-wrap .footer-links ul li a')
             ),
             array(
                'id'       => 'malen_footer_copyright_a_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Copyright Ancor Hover Color', 'malen' ),
                'subtitle' => esc_html__( 'Set footer copyright ancor Hover color', 'malen' ),
                'required' => array( 'malen_disable_footer_bottom','equals','1'),
                'output'    => array('color' => '.copyright-wrap a:hover, .copyright-wrap .footer-links ul li a:hover')
             ), 

        )
    ));



    /* End Footer Media */

    // -> START Custom Css
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Css', 'malen' ),
        'id'         => 'malen_custom_css_section',
        'icon'  => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'malen_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__('CSS Code', 'malen'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'malen'),
                'mode'     => 'css',
                'theme'    => 'monokai',
            )
        ),
    ) );

    /* End custom css */



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'malen' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'malen' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'malen' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }