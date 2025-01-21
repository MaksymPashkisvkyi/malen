<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Mechon_Header extends Widget_Base {

	public function get_name() {
		return 'mechonheader';
	}
	public function get_title() {
		return __( 'Header V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen_header_elements' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		
        $this->add_control(
			'header_style',
			[
				'label' 	=> __( 'Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'malen' ),
					'2' => __( 'Style Two', 'malen' ),
					'3' => __( 'Style Three', 'malen' ),
					'4' => __( 'Style Four', 'malen' ),
				],
				'default' => '1',
				
			]
        );

		$this->add_control(
			'show_top_bar',
			[
				'label' 		=> __( 'Show Top Bar?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				// 'separator'		=> 'after',
			]
		);

		$this->add_control(
			'topbar_slogan',
			[
				'label' 		=> __( 'Topbar Slogan', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Welcome To Car Repair & Service Template', 'malen' ),
				'condition'		=> [ 
					'header_style!' => '4',
					'show_top_bar' => [ 'yes' ] 
				],
			]
		);

		$this->add_control(
			'phone_text',
			[
				'label' 	=> __( 'Phone Text', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Call Us:', 'malen' ),
				'label_block' => true,
				'condition'		=> [
					'header_style' => ['4'],
					'show_top_bar' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'phone_number',
			[
				'label' 	=> __( 'Phone Number', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( '+24582145621456', 'malen' ),
				'label_block' => true,
				'condition'		=> [
					'header_style' => ['4'],
					'show_top_bar' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'contact_text',
			[
				'label' 		=> __( 'Mail Text', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'rows' 			=> 2,
				'default' 		=> __( 'Mail To:', 'malen' ),
				'condition'		=> [
					'header_style' => ['2', '4'],
					'show_top_bar' => [ 'yes' ],
				],
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'contact_email',
			[
				'label' 		=> __( 'Mail Address', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'example@domain.com', 'malen' ),
				'condition'		=> [
					'header_style' => ['2', '4'],
					'show_top_bar' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'office_text',
			[
				'label' 		=> __( 'Office Text', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'rows' 			=> 2,
				'default' 		=> __( 'Office Hours: ', 'malen' ),
				'condition'		=> [
					'header_style' => ['1', '4'],
					'show_top_bar' => [ 'yes' ],
				],
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'office_hours',
			[
				'label' 		=> __( 'Office Hours', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Mon-Fri: 09:00AM-6:00PM', 'malen' ),
				'condition'		=> [
					'header_style' => ['1', '4'],
					'show_top_bar' => [ 'yes' ],
				],
			]
		);
		
		$this->add_control(
			'show_language',
			[
				'label' 		=> __( 'Show Language?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [
					'header_style' => '2',
					'show_top_bar' => [ 'yes' ],
				],
				'separator'		=> 'before',
			]
		);

		$this->add_control(
			'show_social',
			[
				'label' 		=> __( 'Show Social?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'show_top_bar' => [ 'yes' ] ],
				'separator'		=> 'before',
			]
		);

		$this->add_control(
			'social_text',
			[
				'label' 	=> __( 'Social Text', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Follow Us:', 'malen' ),
				'label_block' => true,
				'condition'		=> [ 
					'show_top_bar' => [ 'yes' ],
					'show_social'  => 'yes',
				],
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'malen' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','malen' ),
					],
				],
				'condition'		=> [ 
					'show_top_bar' => [ 'yes' ],
					'show_social'  => 'yes',
				],
			]
		);

		
		//---------------------------Main Menu Controls---------------------------//

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(

			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				// 'separator'		=> 'after',
			]
		);

		
		$menus = $this->malen_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'malen_menu_select',
				[
					'label'     	=> __( 'Select Malen Menu', 'malen' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'malen' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'malen' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'malen' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

		$this->add_control(
			'show_search_btn',
			[
				'label' 		=> __( 'Show Search Button?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'show_cart_btn',
			[
				'label' 		=> __( 'Show Cart Button?', 'malen' ),
				'description' 		=> __( 'Click to show offcart. If select any product item', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'offcanvas_title',
			[
				'label' 		=> __( 'Offcanvas Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 	=> __( 'Shopping cart', 'malen' ),
				'condition'		=> [
					'header_style' => '3',
					'show_cart_btn' => [ 'yes' ],
				],
			]
		);
		

		$this->add_control(
			'topbar_email_icon',
			[
				'label' 		=> __( 'Email Icon', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> 'fal fa-envelope-open-text',
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
			]
		);
		$this->add_control(
			'topbar_email_label',
			[
				'label' 	=> __( 'Email Label', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Make An Email', 'malen' ),
				'label_block' => true,
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
			]
		);
		$this->add_control(
			'topbar_email',
			[
				'label' 	=> __( 'Email Address', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'info@malen.com', 'malen' ),
				'label_block' => true,
				'condition'		=> [
					'header_style' => ['1', '3'],
				],	
			]
		);
		$this->add_control(
			'topbar_phone_icon',
			[
				'label' 		=> __( 'Phone Icon', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> 'fal fa-headset',
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'topbar_phone_label',
			[
				'label' 	=> __( 'Phone Label', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Call us 24/7', 'malen' ),
				'label_block' => true,
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
			]
		);
		$this->add_control(
			'topbar_phone',
			[
				'label' 	=> __( 'Phone Number', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( '589 (246) 2145 2142', 'malen' ),
				'label_block' => true,
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
				'separator'		=> 'after',
			]
		);
		$this->add_control(
			'topbar_office_icon',
			[
				'label' 		=> __( 'Office Icon', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> 'fal fa-clock',
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
			]
		);
		$this->add_control(
			'topbar_office_label',
			[
				'label' 		=> __( 'Office Label', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'rows' 			=> 2,
				'default' 		=> __( 'Office Hours', 'malen' ),
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'topbar_office',
			[
				'label' 		=> __( 'Office Hours', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Mon-Sat 8am -6pm', 'malen' ),
				'condition'		=> [
					'header_style' => ['1', '3'],
				],
			]
		);


		$this->add_control(
			'show_location',
			[
				'label' 		=> __( 'Show Location?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				// 'condition'		=> [
				// 	'header_style!' => ['4'],
				// ]
				
			]
		);
		$this->add_control(
			'location_icon',
			[
				'label' 		=> __( 'Location Icon', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> 'fal fa-map-marker-alt',
				'condition'		=> [ 
					// 'header_style!' => ['4'],
					'show_location' => [ 'yes' ] 
				],
			]
		);
		$this->add_control(
			'location_text',
			[
				'label' 	=> __( 'Location Text', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Office Location', 'malen' ),
				'label_block' => true,
				'condition'		=> [
					'header_style' => ['1', '3'],
					'show_location' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'location',
			[
				'label' 		=> __( 'Office Location', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 
					// 'header_style!' => ['4'],
					'show_location' => [ 'yes' ] 
				],
				'separator'		=> 'after',
			]
		);

		$this->add_control(
			'show_btn',
			[
				'label' 		=> __( 'Show Button?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [
					'header_style' => ['2', '4'],
				]
				
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'condition'		=> [
					'header_style' => ['2', '4'],
					'show_btn' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [
					'header_style' => ['2', '4'],
					'show_btn' => [ 'yes' ],
				],
			]
		);
		$this->add_control(
			'button_icon',
			[
				'label' 		=> __( 'Button Icon', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> 'fas fa-arrow-up-right',
				'condition'		=> [
					'header_style' => ['2'],
					'show_btn' => [ 'yes' ],
				],
			]
		);
		


        $this->end_controls_section();


       //-----------------------------------General Styling-------------------------------------//
        $this->start_controls_section(
			'general_styling',
			[
				'label'     => __( 'General Styling', 'malen' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'header_style' => '4'
				]
			]
        );

        $this->add_control(

			'logo_background_color',
			[

				'label'     => __( 'Background Color', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .logo-style3' => 'background-color: {{VALUE}}!important',
                ],
			]
        );
        $this->end_controls_section();

       //-----------------------------------Topbar Styling-------------------------------------//
        $this->start_controls_section(
			'topbar_styling',
			[
				'label'     => __( 'Topbar Styling', 'malen' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(

			'topbar_background_color',
			[

				'label'     => __( 'Background Color', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-layout2 .header-top, {{WRAPPER}} .header-top' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(

			'topbar_content_color',
			[

				'label'     => __( 'Topbar Content Color', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-layout2 .header-top, {{WRAPPER}} .header-top' => '--body-color: {{VALUE}}!important;',
                ],
			]
        );


        $this->add_group_control(
			Group_Control_Typography::get_type(),

			[
				'name'      => 'topbar_content_typography',
				'label'     => __( 'Content Typography', 'malen' ),
                'selectors'  =>[ 
                	'{{WRAPPER}} .header-layout2 .header-top, {{WRAPPER}} .header-top',
            	]
			]
        );

        
        $this->end_controls_section();

        //-----------------------------------Menubar Styling-------------------------------------//
        $this->start_controls_section(
			'menubar_styling',
			[
				'label'     => __( 'Menubar Styling', 'malen' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'top_level_menu_bg_color',
			[
				'label' 		=> __( 'Menu Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_txt_color',
			[
				'label' 			=> __( 'Menu Text Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu > ul > li > a:hover' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_txt_color',
			[
				'label' 			=> __( 'Menu Hover Text Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_bottom_color',
			[
				'label' 			=> __( 'Menu Bottom Hover Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a::before' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'malen' ),
                'selector' 		=> '{{WRAPPER}} .main-menu ul > li > a',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_height',
			[
				'label' 		=> __( 'Height', 'malen' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max'	=> 500
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-menu ul > li > a' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;'
                ]
			]
		);
		$this->end_controls_section();

 		//-----------------------------------Button Styling-------------------------------------//
		  $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'header_style' => '4'
				]
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'malen' ),
				'selector' => '{{WRAPPER}} .th-btn',
			]
		);
        $this->end_controls_section();

    }

	public function malen_menu_select(){
	    $malen_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'malen' );
	    foreach( $malen_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		//Menu by menu select
		$malen_avaiable_menu   = $this->malen_menu_select();
		if( ! $malen_avaiable_menu ){
			return;
		}
		$args = [
			'menu' 			=> $settings['malen_menu_select'],
			'menu_class' 	=> 'malen-menu',
			'container' 	=> '',
		];

	    echo '<!--th-mobile-menu start-->';
            echo '<div class="th-menu-wrapper">';
                echo '<div class="th-menu-area">';
                    echo '<button class="th-menu-toggle"><i class="fal fa-times"></i></button>';
                    echo '<div class="mobile-logo">';
                        echo malen_theme_logo();
                    echo '</div>';

                    if( has_nav_menu( 'primary-menu' ) ) {
                        echo '<div class="th-mobile-menu">';
                            wp_nav_menu( array(
                                "theme_location"    => 'primary-menu',
                                "container"         => '',
                                "menu_class"        => ''
                            ) );
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '<!--th-mobile-menu end-->';

        //Search Form
        echo '<div class="popup-search-box d-none d-lg-block  ">';
	        echo '<button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>';
	        echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'">';
	            echo '<input value="'.esc_html( get_search_query() ).'" name="s" class="border-theme" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'malen').'">';
	            echo '<button type="submit"><i class="fal fa-search"></i></button>';
	        echo '</form>';
	    echo '</div>';
	    ?>

	    <!-- Sidebar -->
		<div class="sidemenu-wrapper d-none d-lg-block  ">
			<div class="sidemenu-content">
				<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
				<div class="widget woocommerce widget_shopping_cart">
					<?php if(!empty($settings['offcanvas_title'])): ?>
					<h3 class="widget_title"><?php echo esc_html($settings['offcanvas_title']) ?></h3>
					<?php endif; ?>

					<?php global $woocommerce;
				        if( ! empty( $woocommerce->cart->cart_contents_count ) ): ?>
				         
						<div class="widget_shopping_cart_content">
							<!-- Show dynamic content -->
						</div>
					<?php else: ?>
						<h4>Cart is empty!</h3>
						<p>Please add some product!</p>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php

		if( $settings['header_style'] == '2' ) {

	    echo '<div class="th-header header-layout5">';
	    	if( $settings['show_top_bar'] == 'yes' ){
          
			$email    	= $settings['contact_email'];

			$email          = is_email( $email );

			$replace        = array(' ','-',' - ');
			$with           = array('','','');

			$emailurl       = str_replace( $replace, $with, $email );

		        echo '<div class="header-top">';
		            echo '<div class="container">';
		                echo '<div class="row justify-content-center justify-content-md-between align-items-center gy-2">';
		                    echo '<div class="col-auto">';
		                        echo '<div class="header-links">';
		                            echo '<ul>';
		                            	if(!empty($settings['topbar_slogan'])){	
			                                echo '<li class="d-none d-lg-inline-block">'.esc_html($settings['topbar_slogan']).'</li>';
			                            }
		                                if(!empty($email)){	
			                                echo '<li>'.esc_html($settings['contact_text']).'<a href="'.esc_attr( 'mailto:'.$emailurl ).'"> '.esc_html($email).'</a></li>';
			                            }
		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="col-auto d-none d-md-block">';
		                        echo '<div class="header-links">';
		                            echo '<ul>';
		                            	if( class_exists( 'GTranslate' ) && $settings['show_language'] == 'yes' ){
			                                echo '<li>';
			                                    echo '<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">'.esc_html__( 'Language', 'malen' ).'</a>';
			                                    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
			                                        echo do_shortcode('[gtranslate]');
			                                    echo '</ul>';
			                                echo '</li>';
			                            }
			                            if( ! empty( $settings['social_icon_list'] ) ){
			                                echo '<li>';
											if( ! empty( $settings['show_social'] ) ){
			                                   echo ' <div class="header-social">';
			                                        echo '<span class="social-title">'.esc_html($settings['social_text']).'</span>';
			                                        foreach( $settings['social_icon_list'] as $social_icon ){
							                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
							                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

							                            echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

							                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

							                          	echo '</a> ';
							                      	}

			                                    echo '</div>';
											}
			                                echo '</li>';
			                            }
		                            echo '</ul>';
		                        echo '</div>';

		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    }

	        echo '<div class="sticky-wrapper">';
	            echo '<div class="sticky-active">';
	                echo '<!-- Main Menu Area -->';
	                echo '<div class="menu-area">';
	                    echo '<div class="container">';
	                        echo '<div class="row gx-20 justify-content-between">';
	                            echo '<div class="col-auto">';
	                            	if( ! empty( $settings['logo_image']['url'] ) ){
							            echo '<div class="header-logo logo-shape1">';
							                echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo malen_img_tag( array(
						                        	'url' => esc_url( $settings['logo_image']['url'] ),
						                        ) );
											echo '</a>';
											echo '<span class="shape"></span>';
							            echo '</div>';
							        }
	                            echo '</div>';
	                            echo '<div class="col-auto">';
	                                echo '<div class="row align-items-center">';
	                                    echo '<div class="col-auto">';
	                                        echo '<nav class="main-menu d-none d-lg-inline-block">';
												if( ! empty( $settings['malen_menu_select'] ) ){
													wp_nav_menu( $args );
												}
	                                            // if( has_nav_menu( 'primary-menu' ) ){
							                    //     wp_nav_menu( array(
							                    //         "theme_location"    => 'primary-menu',
							                    //         "container"         => '',
							                    //         "menu_class"        => ''
							                    //     ) );
								                // }
	                                       	echo ' </nav>';
	                                        echo '<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
	                                    echo '</div>';
	                                    echo '<div class="col-auto d-none d-xl-block">';
	                                        echo '<div class="header-button">';
	                                        	
	                                        	if( $settings['show_search_btn'] == 'yes' ){
		                                            echo '<button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>';
		                                        }
												if( ! empty( $settings['show_location'] ) ){
													if( ! empty( $settings['location']['url'] ) ){
														echo '<a class="icon-btn" href="'.esc_url($settings['location']['url']).'"> <i class="'.esc_html($settings['location_icon']).'"></i></a>';
													}
		                                        }
												if( ! empty( $settings['show_btn'] ) ){
		                                        	if( ! empty( $settings['button_text'] ) ){
					                                	echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="header-link-btn">'.esc_html($settings['button_text']).' <i class="'.esc_html($settings['button_icon']).'"></i></a>';
					                            	}
					                            }
	                                        echo '</div>';
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';	

		}elseif( $settings['header_style'] == '3' ){

			$topbar_email    	= $settings['topbar_email'];
			$topbar_phone    	= $settings['topbar_phone'];

			$topbar_email          = is_email( $topbar_email );

			$replace        = array(' ','-',' - ');
			$with           = array('','','');

			$topbar_emailurl       = str_replace( $replace, $with, $topbar_email );
			$topbar_phoneurl       = str_replace( $replace, $with, $topbar_phone );

			?>

			<div class="th-header header-layout4">
				<div class="header-top-area">
					<?php if($settings['show_top_bar']): ?>
					<div class="header-top">
						<div class="container">
							<div class="row justify-content-center justify-content-md-between align-items-center">
								<?php if(!empty($settings['topbar_slogan'])): ?>
								<div class="col-auto">
									<p class="header-notice d-none d-lg-block"><?php echo esc_html($settings['topbar_slogan']) ?></p>
								</div>
								<?php endif; ?>
								<?php if($settings['show_social']): ?>
								<div class="col-auto">
									<div class="header-social">
										<?php if( ! empty( $settings['social_text']) ): ?>
										<span class="social-title">
											<?php echo esc_html($settings['social_text']) ?>
										</span> 
										<?php endif; ?>
										<?php foreach( $settings['social_icon_list'] as $social_icon ): 
											$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
											$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
										?>
											<a <?php echo esc_html($social_target) ?> <?php echo esc_html($social_nofollow) ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ) ?>"><?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a> 
										<?php endforeach; ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="menu-top">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-auto">
									<?php if( ! empty( $settings['logo_image']['url']) ): ?>
									<div class="logo-style2">
										<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
											<?php echo malen_img_tag( array(
												'url' => esc_url( $settings['logo_image']['url'] ),
											) ); ?>
										</a>
									</div>
									<?php endif; ?>
								</div>
								<div class="col">
									<div class="row">
										<div class="col">
											<div class="row align-items-center justify-content-center justify-content-md-end justify-content-lg-between">
												<div class="col-auto d-none d-lg-block">
													<div class="header-info">
														<?php if( ! empty( $settings['topbar_email_icon']) ): ?>
														<div class="header-info_icon">
															<i class="<?php echo esc_html($settings['topbar_email_icon']) ?>"></i>
														</div>
														<?php endif; ?>
														<div class="media-body">
															<?php if( ! empty( $settings['topbar_email_label']) ): ?>
															<span class="header-info_label">
																<?php echo esc_html($settings['topbar_email_label']) ?>
															</span>
															<?php endif; ?>
															<?php if( ! empty( $topbar_email) ): ?>
															<div class="header-info_link">
																<a href="mailto:<?php echo $topbar_emailurl; ?>">
																	<?php echo esc_html($topbar_email); ?>
																</a>
															</div>
															<?php endif; ?>
														</div>
													</div>
												</div>
												<div class="col-auto d-none d-lg-block">
													<div class="header-info">
														<?php if( ! empty( $settings['topbar_phone_icon']) ): ?>
														<div class="header-info_icon">
															<i class="<?php echo esc_html($settings['topbar_phone_icon']) ?>"></i>
														</div>
														<?php endif; ?>
														<div class="media-body">
														<?php if( ! empty( $settings['topbar_phone_label']) ): ?>
															<span class="header-info_label"><?php echo esc_html($settings['topbar_phone_label']) ?></span>
															<?php endif; ?>
															<?php if( ! empty( $topbar_phone) ): ?>
															<div class="header-info_link">
																<a href="tel:<?php echo $topbar_phoneurl; ?>"><?php echo esc_html($topbar_phone); ?></a>
															</div>
															<?php endif; ?>
														</div>
													</div>
												</div>
												<div class="col-auto d-none d-xl-block">
													<div class="header-info">
														<?php if( ! empty( $settings['topbar_office_icon']) ): ?>
														<div class="header-info_icon">
															<i class="<?php echo esc_html($settings['topbar_office_icon']) ?>"></i>
														</div>
														<?php endif; ?>
														<div class="media-body">
															<?php if( ! empty( $settings['topbar_office_label']) ): ?>
																<span class="header-info_label"><?php echo esc_html($settings['topbar_office_label']) ?></span>
															<?php endif; ?>
															<?php if( ! empty( $settings['topbar_office']) ): ?>
																<div class="header-info_link">
																	<span><?php echo esc_html($settings['topbar_office']) ?></span>
																</div>
															<?php endif; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-auto">
											<div class="header-button">
												<?php if( ! empty( $settings['show_search_btn']) ): ?>
													<button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>
												<?php endif; ?>

													<?php
													if( class_exists( 'woocommerce' ) ){
														global $woocommerce;
														if( ! empty( $woocommerce->cart->cart_contents_count ) ){
														$count = $woocommerce->cart->cart_contents_count;
														}else{
														$count = "0";
														}  ?>

														<a href="<?php echo esc_url('#') ?>" class="icon-btn sideMenuToggler">
															<i class="far fa-cart-shopping"></i>
															<span class="badge"><?php echo esc_html( $count ) ?></span>
														</a>
													<?php } ?>

												<?php if( ! empty( $settings['show_cart_btn']) ): ?>
													<!-- <a class="icon-btn sideMenuToggler d-none d-md-inline-block" href="#">
													<i class="far fa-cart-plus"></i>
												</a> -->
												<?php endif; ?>

												<button class="th-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Main Menu Area -->
				<div class="sticky-wrapper">
					<div class="sticky-active">
						<div class="menu-area">
							<div class="container">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<nav class="main-menu menu-style1 d-none d-lg-block">
										<?php
											if( ! empty( $settings['malen_menu_select'] ) ){
												wp_nav_menu( $args );
											}
										?>
										</nav>
									</div>

									<div class="col-auto">
										<div class="d-flex align-items-center">
											<?php if( ! empty( $settings['show_location']) ): ?>
												<a href="<?php echo esc_url($settings['location']['url']) ?>" class="header-link-btn">
												<i class="<?php echo esc_html($settings['location_icon']) ?>"></i>
												<?php echo esc_html($settings['location_text']) ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php
		}elseif( $settings['header_style'] == '4' ){
			$topbar_email    	= $settings['contact_email'];
			$topbar_phone    	= $settings['phone_number'];

			$topbar_email          = is_email( $topbar_email );

			$replace        = array(' ','-',' - ');
			$with           = array('','','');

			$topbar_emailurl       = str_replace( $replace, $with, $topbar_email );
			$topbar_phoneurl       = str_replace( $replace, $with, $topbar_phone );
		?>
			<div class="th-header header-layout7">
				<?php if($settings['show_top_bar']): ?>
				<div class="header-top">
					<div class="container">
						<div class="row justify-content-center justify-content-md-between align-items-center gy-2">
							<div class="col-auto d-none d-md-block">
								<div class="header-links">
									<ul>
										<li><?php echo esc_html($settings['phone_text']); ?> <a href="<?php echo esc_attr( 'tel:'.$topbar_phoneurl ); ?>"><?php echo esc_html($topbar_phone); ?></a></li>
										<li><?php echo esc_html($settings['contact_text']); ?> <a href="<?php echo esc_attr( 'mailto:'.$topbar_emailurl ); ?>"><?php echo esc_html($topbar_email); ?></a></li>
										<li class="d-none d-xxl-inline-block"><?php echo esc_html($settings['office_text']); ?> <?php echo esc_html($settings['office_hours']); ?></li>
									</ul>
								</div>
							</div>
							<?php if($settings['show_social']): ?>
							<div class="col-auto">
								<div class="header-social">
									<span class="social-title"><?php echo esc_html($settings['social_text']) ?></span> 
									<?php foreach( $settings['social_icon_list'] as $social_icon ): 
										$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
										$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
									?>
										<a <?php echo esc_html($social_target) ?> <?php echo esc_html($social_nofollow) ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ) ?>"><?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a> 
									<?php endforeach; ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<div class="sticky-wrapper">
					<div class="sticky-active">
						<!-- Main Menu Area -->
						<div class="menu-area">
							<div class="container">
								<div class="row gx-20 justify-content-between align-items-center">
									<div class="col-auto">
										<div class="logo-style3">
											<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
												<?php echo malen_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) ); ?>
											</a>
										</div>
									</div>
									<div class="col-auto">
										<nav class="main-menu d-none d-lg-inline-block">
										<?php
											if( ! empty( $settings['malen_menu_select'] ) ){
												wp_nav_menu( $args );
											}
											?>
										</nav>
										<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
									</div>
									<div class="col-auto ms-auto d-none d-xl-block">
										<div class="header-button">
											<?php if( ! empty( $settings['show_search_btn']) ): ?>
												<button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>
											<?php endif; ?>

											<?php if($settings['show_location']): ?>
												<a href="<?php echo esc_url($settings['location']['url']) ?>" class="icon-btn">
													<i class="<?php echo esc_html($settings['location_icon']) ?>"></i>
												</a>
											<?php endif; ?>

											<?php
											if($settings['show_cart_btn']){
												if( class_exists( 'woocommerce' ) ){
													global $woocommerce;
													if( ! empty( $woocommerce->cart->cart_contents_count ) ){
													$count = $woocommerce->cart->cart_contents_count;
													}else{
													$count = "0";
													}  ?>

													<a href="<?php echo esc_url('#') ?>" class="icon-btn sideMenuToggler">
														<i class="far fa-cart-shopping"></i>
														<span class="badge"><?php echo esc_html( $count ) ?></span>
													</a>
											<?php } 
												}?>

											<?php if($settings['show_btn']): ?>
												<a class="th-btn ms-3" href="<?php echo esc_url( $settings['button_url']['url'] ); ?>"><?php echo esc_html($settings['button_text']); ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}else{
			$topbar_email    	= $settings['topbar_email'];
			$topbar_phone    	= $settings['topbar_phone'];

			$topbar_email          = is_email( $topbar_email );

			$replace        = array(' ','-',' - ');
			$with           = array('','','');

			$topbar_emailurl       = str_replace( $replace, $with, $topbar_email );
			$topbar_phoneurl       = str_replace( $replace, $with, $topbar_phone );
		?>
		<div class="th-header header-layout6">
	
			<?php if($settings['show_top_bar']): ?>
			<div class="header-top">
				<div class="container">
					<div class="row justify-content-center justify-content-md-between align-items-center gy-2">
						<div class="col-auto">
							<div class="header-links">
								<ul>
									<li class="d-none d-lg-inline-block"><?php echo esc_html($settings['topbar_slogan']) ?></li>
									<li><?php echo esc_html($settings['office_text']) ?> <?php echo esc_html($settings['office_hours']) ?></li>
								</ul>
							</div>
						</div>
						<?php if($settings['show_social']): ?>
						<div class="col-auto">
							<div class="header-social">
								<span class="social-title"><?php echo esc_html($settings['social_text']) ?></span> 
								<?php foreach( $settings['social_icon_list'] as $social_icon ): 
									$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
									$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
								?>
									<a <?php echo esc_html($social_target) ?> <?php echo esc_html($social_nofollow) ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ) ?>"><?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a> 
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="menu-top">
				<div class="container">
					<div class="row align-items-center justify-content-between gx-25">
						<div class="col-md-auto">
							<div class="logo-style1">
								<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
								<?php echo malen_img_tag( array(
						                        	'url' => esc_url( $settings['logo_image']['url'] ),
						                        ) ); ?>
								</a>
							</div>
						</div>
						<div class="col-sm">
							<div
								class="row align-items-center justify-content-center justify-content-md-end justify-content-lg-between">
								<?php if($settings['show_search_btn']): ?>
								<div class="col-auto">
									<div class="header-search">
										<div class="form-group">
											<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
												<input value="<?php echo esc_html( get_search_query() ) ?>" name="s" required type="search" placeholder="<?php echo esc_attr__('Search keywords...', 'malen'); ?>">
												<button type="submit"><i class="far fa-search"></i></button>
											</form>
										</div>
									</div>
								</div>
								<?php endif; ?>
		
								<div class="col-auto d-none d-xl-block">
									<div class="header-info">
										<div class="header-info_icon">
											<i class="<?php echo esc_html($settings['topbar_email_icon']) ?>"></i>
										</div>
										<div class="media-body">
											<span class="header-info_label"><?php echo esc_html($settings['topbar_email_label']) ?></span>
											<div class="header-info_link">
												<a href="mailto:<?php echo $topbar_emailurl; ?>"><?php echo esc_html($topbar_email) ?></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-auto d-none d-lg-block">
									<div class="header-info">
										<div class="header-info_icon">
											<i class="<?php echo esc_html($settings['topbar_phone_icon']) ?>"></i></div>
										<div class="media-body">
											<span class="header-info_label"><?php echo esc_html($settings['topbar_phone_label']) ?></span>
											<div class="header-info_link">
												<a href="tel:<?php echo $topbar_phoneurl; ?>"><?php echo esc_html($topbar_phone) ?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="sticky-wrapper">
				<div class="sticky-active">
					<div class="menu-area">
						<div class="container">
							<div class="row justify-content-between align-items-center">
								<div class="col-auto">
									<nav class="main-menu menu-style1 d-none d-lg-block">
									<?php
										if( ! empty( $settings['malen_menu_select'] ) ){
											wp_nav_menu( $args );
										}
									?>
									</nav>
									<button class="th-menu-toggle d-inline-block d-lg-none"><i
											class="fal fa-bars"></i></button>
								</div>
								<?php if($settings['show_location']): ?>
								<div class="col-auto">
									<a href="<?php echo esc_url($settings['location']['url']) ?>" class="header-link-btn">
										<i class="<?php echo esc_html($settings['location_icon']) ?>"></i><?php echo esc_html($settings['location_text']) ?>
									</a>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	
		</div>
	
		<?php
		
	}
	}
}