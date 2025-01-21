<?php
    /**
     * Class For Builder
     */
    class MalenBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'malen_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'malen-core',MALEN_PLUGDIRURI.'assets/js/malen-core.js',array( 'jquery' ),'1.0',true );
		}


        public function malen_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'malen_header_option',
                [
                    'label'     => __( 'Header Option', 'malen' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'malen_header_style',
                [
                    'label'     => __( 'Header Option', 'malen' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'malen' ),
    					'header_builder'       => __( 'Header Builder', 'malen' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'malen_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'malen' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->malen_header_choose_option(),
                    'condition' => [ 'malen_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'malen_footer_option',
                [
                    'label'     => __( 'Footer Option', 'malen' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'malen_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'malen' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'malen' ),
    				'label_off'     => __( 'No', 'malen' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'malen_footer_style',
                [
                    'label'     => __( 'Footer Style', 'malen' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'malen' ),
    					'footer_builder'       => __( 'Footer Builder', 'malen' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'malen_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'malen_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'malen' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->malen_footer_build_choose_option(),
                    'condition' => [ 'malen_footer_style' => 'footer_builder','malen_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Malen Builder', 'malen' ),
            	esc_html__( 'Malen Builder', 'malen' ),
				'manage_options',
				'malen',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('malen', esc_html__('Footer Builder', 'malen'), esc_html__('Footer Builder', 'malen'), 'manage_options', 'edit.php?post_type=malen_footerbuild');
			add_submenu_page('malen', esc_html__('Header Builder', 'malen'), esc_html__('Header Builder', 'malen'), 'manage_options', 'edit.php?post_type=malen_header');
			add_submenu_page('malen', esc_html__('Tab Builder', 'malen'), esc_html__('Tab Builder', 'malen'), 'manage_options', 'edit.php?post_type=malen_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','malen' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'malen' ),
				'singular_name'      => __( 'Footer', 'malen' ),
				'menu_name'          => __( 'Malen Footer Builder', 'malen' ),
				'name_admin_bar'     => __( 'Footer', 'malen' ),
				'add_new'            => __( 'Add New', 'malen' ),
				'add_new_item'       => __( 'Add New Footer', 'malen' ),
				'new_item'           => __( 'New Footer', 'malen' ),
				'edit_item'          => __( 'Edit Footer', 'malen' ),
				'view_item'          => __( 'View Footer', 'malen' ),
				'all_items'          => __( 'All Footer', 'malen' ),
				'search_items'       => __( 'Search Footer', 'malen' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'malen' ),
				'not_found'          => __( 'No Footer found.', 'malen' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'malen' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'malen_footerbuild', $args );

			$labels = array(
				'name'               => __( 'Header', 'malen' ),
				'singular_name'      => __( 'Header', 'malen' ),
				'menu_name'          => __( 'Malen Header Builder', 'malen' ),
				'name_admin_bar'     => __( 'Header', 'malen' ),
				'add_new'            => __( 'Add New', 'malen' ),
				'add_new_item'       => __( 'Add New Header', 'malen' ),
				'new_item'           => __( 'New Header', 'malen' ),
				'edit_item'          => __( 'Edit Header', 'malen' ),
				'view_item'          => __( 'View Header', 'malen' ),
				'all_items'          => __( 'All Header', 'malen' ),
				'search_items'       => __( 'Search Header', 'malen' ),
				'parent_item_colon'  => __( 'Parent Header:', 'malen' ),
				'not_found'          => __( 'No Header found.', 'malen' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'malen' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'malen_header', $args );

			$labels = array(
				'name'               => __( 'Tab Builder', 'malen' ),
				'singular_name'      => __( 'Tab Builder', 'malen' ),
				'menu_name'          => __( 'Gesund Tab Builder', 'malen' ),
				'name_admin_bar'     => __( 'Tab Builder', 'malen' ),
				'add_new'            => __( 'Add New', 'malen' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'malen' ),
				'new_item'           => __( 'New Tab Builder', 'malen' ),
				'edit_item'          => __( 'Edit Tab Builder', 'malen' ),
				'view_item'          => __( 'View Tab Builder', 'malen' ),
				'all_items'          => __( 'All Tab Builder', 'malen' ),
				'search_items'       => __( 'Search Tab Builder', 'malen' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'malen' ),
				'not_found'          => __( 'No Tab Builder found.', 'malen' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'malen' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'malen_tab_builder', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'malen_footerbuild' == $post->post_type || 'malen_header' == $post->post_type || 'malen_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function malen_footer_build_choose_option(){

			$malen_post_query = new WP_Query( array(
				'post_type'			=> 'malen_footerbuild',
				'posts_per_page'	    => -1,
			) );

			$malen_builder_post_title = array();
			$malen_builder_post_title[''] = __('Select a Footer','malen');

			while( $malen_post_query->have_posts() ) {
				$malen_post_query->the_post();
				$malen_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $malen_builder_post_title;

		}

		public function malen_header_choose_option(){

			$malen_post_query = new WP_Query( array(
				'post_type'			=> 'malen_header',
				'posts_per_page'	    => -1,
			) );

			$malen_builder_post_title = array();
			$malen_builder_post_title[''] = __('Select a Header','malen');

			while( $malen_post_query->have_posts() ) {
				$malen_post_query->the_post();
				$malen_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $malen_builder_post_title;

        }

    }

    $builder_execute = new MalenBuilder();