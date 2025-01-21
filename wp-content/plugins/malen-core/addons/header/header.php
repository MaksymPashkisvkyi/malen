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
class Malen_Header extends Widget_Base {

	public function get_name() {
		return 'malenheader';
	}
	public function get_title() {
		return __( 'Header', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen_header_elements' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label' 	=> __( 'Header', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Layout Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'1' => __( 'Style One', 'malen' ),
					'2' => __( 'Style Two', 'malen' ),
					'3' => __( 'Style Three', 'malen' ),
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
			]
		);

		$this->add_control(
			'topbar_email_icon',
			[
				'label' 		=> __( 'Email Icon', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> '<i class="fa-solid fa-envelope"></i>',
				'condition'		=> [ 
					'show_top_bar'  => ['yes'],
				],
			]
		);

		$this->add_control(
			'topbar_email',
			[
				'label' 	=> __( 'Email Address', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'help24/7@gmail.com', 'malen' ),
				'label_block' => true,
				'separator'		=> 'after',
				'condition'		=> [ 
					'show_top_bar'  => ['yes'],
				],
			]
		);

		$this->add_control(
			'topbar_office_icon',
			[
				'label' 		=> __( 'Office Iocn', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> '<i class="fa-regular fa-clock"></i>',
				'condition'		=> [ 
					'show_top_bar'  => ['yes'],
				],
			]
		);
		$this->add_control(
			'topbar_office',
			[
				'label' 	=> __( 'Office Time', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Mon - Fri 09: AM - 05: PM', 'malen' ),
				'label_block' => true,
				'separator'		=> 'after',
				'condition'		=> [ 
					'show_top_bar'  => ['yes'],
				],
			]
		);

		$this->add_control(
			'topbar_address_icon',
			[
				'label' 		=> __( 'Address Iocn', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> '<i class="fal fa-location-dot"></i>',
				'condition'		=> [ 
					'show_top_bar'  => ['yes'],
				],
			]
		);
		$this->add_control(
			'topbar_address',
			[
				'label' 	=> __( 'Address', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> __( 'Richardson, California 62639', 'malen' ),
				'label_block' => true,
				'separator'		=> 'after',
				'condition'		=> [ 
					'show_top_bar'  => ['yes'],
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
					'layout_style' => '3',
					'show_top_bar' => [ 'yes' ],
				],
			]
		);

		//Social 
		$this->add_control(
			'show_social',
			[
				'label' 		=> __( 'Show Social?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'separator'		=> 'before',
				'condition'		=> [ 
					'show_top_bar'  => ['yes'],
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
					'is_external' 	=> false,
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
					'show_social'  => 'yes',
					'show_top_bar'  => ['yes'],
				],
			]
		);

		$this->add_control(
			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				// 'default' 		=> [
				// 	'url' => Utils::get_placeholder_image_src(),
				// ],
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
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'separator'		=> 'before',
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
					'layout_style' => ['1', '2'],
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 	=> __( 'REGISTER NOW', 'malen' ),
				'condition'		=> [
					'layout_style' => ['1', '2'],
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
					'layout_style' => ['1', '2'],
					'show_btn' => [ 'yes' ],
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
					'layout_style' => ['3'],
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
					'layout_style' => ['3'],
				],
			]
		);

        $this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-----------------------------------General BG Styling-------------------------------------//
		$this->start_controls_section(
			'general_styling',
			[
				'label'     => __( 'General Styling', 'malen' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'topbar_bg',
			[
				'label'     => __( 'TopBar Background', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-top' => 'background-color: {{VALUE}}!important',
                ],	
			]
        );
        $this->add_control(
			'topbar_bg2',
			[
				'label'     => __( 'TopBar Background 2', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-top:before' => 'background-color: {{VALUE}}!important',
                ],	
				'condition'	=> [
					'layout_style' => ['3']
				]	
			]
        );

        $this->add_control(
			'logo_bg',
			[
				'label'     => __( 'Logo Background', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .logo-bg:before' => 'background-color: {{VALUE}}!important',
                ],
				'condition'	=> [
					'layout_style' => ['1']
				]	
			]
        );

        $this->add_control(
			'header_menu_bg',
			[
				'label' 		=> __( 'Menu Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sticky-wrapper' => 'background-color: {{VALUE}} !important;',
                ],
			]
        );    

		$this->end_controls_section();

       //-----------------------------------Topbar Styling-------------------------------------//
        $this->start_controls_section(
			'content_styling',
			[
				'label'     => __( 'Content Styling', 'malen' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'content_icon_color',
			[

				'label'     => __( 'Content Icon Color', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-links li > i' => 'color: {{VALUE}}!important',
                ],
				
			]
        );	

		$this->add_control(
			'content_icon_font_size',
			[
				'label' => esc_html__( 'Content Icon Font Size', 'malen' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 40,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .header-links li > i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_color3',
			[

				'label'     => __( 'Content Color', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-links li a, {{WRAPPER}} .header-links li' => 'color: {{VALUE}}!important',
                ],
				
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'content_typography2',
				'label' 	=> __( 'Content Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .header-links a, {{WRAPPER}} .header-links li',
			]
        );

        $this->end_controls_section();

        //-----------------------------------Social Styling-------------------------------------//
        $this->start_controls_section(
			'social_styling',
			[
				'label'     => __( 'Social Styling', 'malen' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'topbar_social_color',
			[

				'label'     => __( 'Social Color', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_control(
			'topbar_social__h_color',
			[

				'label'     => __( 'Social Hover Color', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .header-social a:hover' => 'color: {{VALUE}}!important;',
                ],
				
			]
        );

		$this->add_control(
			'social_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'malen' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 40,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .header-social a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        //-----------------------------------Menubar Styling-------------------------------------//
        $this->start_controls_section(
			'menubar_styling',
			[
				'label'     => __( 'Menu Styling', 'malen' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'menu_etxt_color',
			[
				'label' 			=> __( 'Menu Text Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'menu_text_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu>ul>li>a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'dropdown_txt_color',
			[
				'label' 			=> __( 'Dropdown Text Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'dropdown_txt_hover_color',
			[
				'label' 			=> __( 'Dropdown Hover Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );
		$this->add_control(
			'dropdown_icon_color',
			[
				'label' 			=> __( 'Dropdown Icon Color', 'malen' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a:before' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'menu_typography',
				'label' 		=> __( 'Menu Typography', 'malen' ),
                'selector' 		=> '{{WRAPPER}} .main-menu>ul>li>a, {{WRAPPER}} .main-menu ul.sub-menu li a',
			]
		);

        $this->add_responsive_control(
			'menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->end_controls_section();

		//-------------------------Button Style-----------------------//
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['1', '2']
				]	
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_color',
			[
				'label' 		=> __( 'Hover Color ', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label' 		=> __( 'Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'background-color:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_bg',
			[
				'label' 		=> __( 'Background Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after' => '--title-color:{{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Typography', 'malen' ),
				'selector' 	=> '{{WRAPPER}} .th_btn',
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
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

		global $woocommerce;

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

		 if( class_exists( 'ReduxFramework' ) ){
			 if(malen_opt('malen_menu_icon')){
	            $menu_icon = '';
	        }else{
	            $menu_icon = 'hide-icon';
	        }
	    }

		//Mobile menu 
        echo malen_mobile_menu();

		echo malen_header_cart_offcanvas();
		// echo malen_header_offcanvas();
		echo malen_search_box();

		$email    	= $settings['topbar_email'];
		$email          = is_email( $email );

		$replace        = array(' ','-',' - ');
		$with           = array('','','');

		$emailurl       = str_replace( $replace, $with, $email );
		?>

		<?php if( $settings['layout_style'] == '2' ): ?>
		<div class="th-header header-layout3 header-absolute">
			<?php if(!empty( $settings['show_top_bar'])): ?>
			<div class="header-top">
				<div class="container">
					<div class="row justify-content-center justify-content-lg-between align-items-center">
						<div class="col-auto d-none d-md-block">
							<div class="header-links">
								<ul>
									<li><?php echo wp_kses_post($settings['topbar_email_icon']); ?><a href="<?php echo esc_attr('mailto:' . $emailurl); ?>"><?php echo esc_html($email); ?></a></li>
									<li><?php echo wp_kses_post($settings['topbar_office_icon']); ?><?php echo esc_html($settings['topbar_office']); ?></li>
								</ul>
							</div>
						</div>
						<div class="col-auto">
							<div class="header-right">
								<div class="header-links">
									<ul>
										<li><?php echo wp_kses_post($settings['topbar_address_icon']); ?><?php echo esc_html($settings['topbar_address']); ?></li>
									</ul>
								</div>
								<?php if(!empty( $settings['show_social'])): ?>
								<div class="header-social">
									<?php	 
										foreach( $settings['social_icon_list'] as $social_icon ): 
										$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
										$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
									?>
										<a <?php echo esc_html($social_target) ?> <?php echo esc_html($social_nofollow) ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ) ?>"> <?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a> 
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="sticky-wrapper">
				<!-- Main Menu Area -->
				<div class="menu-area">
					<div class="container">
						<div class="row align-items-center justify-content-between">
							<div class="col-auto">
								<div class="header-logo">
									<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
										<?php echo malen_img_tag( array(
											'url'   => esc_url( $settings['logo_image']['url']  ),
										)); ?>
									</a>
								</div>
							</div>
							<div class="col-auto">
								<nav class="main-menu <?php echo $menu_icon; ?> d-none d-lg-inline-block">
									<?php if( ! empty( $settings['malen_menu_select'] ) ){
											wp_nav_menu( $args );
										} ?>
								</nav>
							</div>
							<div class="col-auto">
								<div class="header-button">
									<?php 
										if(!empty( $settings['show_cart_btn'])): 
											if( ! empty( $woocommerce->cart->cart_contents_count ) ){
												$count = $woocommerce->cart->cart_contents_count;
											}else{
												$count = "0";
											}
									?>
									<button type="button" class="icon-btn sideMenuToggler">
										<i class="fa-regular fa-bag-shopping"></i>
										<span class="badge"><?php echo esc_html( $count ); ?></span>
									</button>
									<?php endif; ?>

									<?php if(!empty( $settings['show_search_btn'])): ?>
										<button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>
									<?php endif; ?>

									<?php if(!empty( $settings['show_btn'])): ?>
                                    	<a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="th-btn th_btn style2"><?php echo wp_kses_post($settings['button_text']); ?></a>
                                    <?php endif; ?>

									<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	
		<?php elseif( $settings['layout_style'] == '3' ): 
			$phone    	= $settings['phone_number'];
			$replace        = array(' ','-',' - ');
			$with           = array('','','');
			$phoneurl       = str_replace( $replace, $with, $phone );
		?>
			<div class="th-header header-layout2 header-absolute">
				<?php if(!empty( $settings['show_top_bar'])): ?>
				<div class="header-top">
					<div class="container">
						<div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
							<div class="col-auto d-none d-md-block">
								<div class="header-links">
									<ul>
										<li><?php echo wp_kses_post($settings['topbar_email_icon']); ?><a href="<?php echo esc_attr('mailto:' . $emailurl); ?>"><?php echo esc_html($email); ?></a></li>
										<li><?php echo wp_kses_post($settings['topbar_office_icon']); ?><?php echo esc_html($settings['topbar_office']); ?></li>
									</ul>
								</div>
							</div>
							<div class="col-auto">
								<div class="header-right">
									<?php if( class_exists( 'GTranslate' ) && $settings['show_language'] == 'yes' ): ?>
										<div class="langauge lang-dropdown">
											<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__( 'Language', 'malen' );?></a>
												<div class="list dropdown-menu" aria-labelledby="dropdownMenuLink1">
													<?php  echo do_shortcode('[gtranslate]'); ?>
												</div>
										</div>
									<?php endif; ?>
									<?php if(!empty( $settings['show_social'])): ?>
									<div class="header-social">
										<?php	 
											foreach( $settings['social_icon_list'] as $social_icon ): 
											$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
											$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
										?>
											<a <?php echo esc_html($social_target) ?> <?php echo esc_html($social_nofollow) ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ) ?>"> <?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a> 
										<?php endforeach; ?>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="sticky-wrapper">
					<!-- Main Menu Area -->
					<div class="menu-area">
						<div class="container">
							<div class="row align-items-center justify-content-between">
								<div class="col-auto">
									<div class="header-logo">
										<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
											<?php echo malen_img_tag( array(
												'url'   => esc_url( $settings['logo_image']['url']  ),
											)); ?>
										</a>
									</div>
								</div>
								<div class="col-auto me-xl-auto">
									<nav class="main-menu <?php echo $menu_icon; ?> d-none d-lg-inline-block">
										<?php if( ! empty( $settings['malen_menu_select'] ) ){
											wp_nav_menu( $args );
										} ?>
									</nav>
								</div>
								<div class="col-auto">
									<div class="header-button">
										<?php 
											if(!empty( $settings['show_cart_btn'])): 
												if( ! empty( $woocommerce->cart->cart_contents_count ) ){
													$count = $woocommerce->cart->cart_contents_count;
												}else{
													$count = "0";
												}
										?>
										<button type="button" class="icon-btn fs-6 sideMenuToggler">
											<i class="fa-light fa-bag-shopping"></i>
											<span class="badge"><?php echo esc_html( $count ); ?></span>
										</button>
										<?php endif; ?>
										<?php if(!empty( $settings['show_search_btn'])): ?>
											<button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>
										<?php endif; ?>
										<?php if(!empty($phone)): ?>
										<div class="header-info">
											<div class="header-info_icon">
												<a href="<?php echo esc_attr( 'tel:'.$phoneurl ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/comment.svg" alt=""></a>
											</div>
											<div class="media-body">
												<span class="header-info_label"><?php echo esc_html($settings['phone_text']); ?></span>
												<p class="header-info_link"><a href="<?php echo esc_attr( 'tel:'.$phoneurl ); ?>"><?php echo esc_html($phone); ?></a>
												</p>
											</div>
										</div>
										<?php endif; ?>
										<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="logo-shape2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-shape2.svg" alt=""></div>
				</div>
			</div>

		<?php else: ?>
		<div class="th-header header-layout1">
			<?php if(!empty( $settings['show_top_bar'])): ?>
			<div class="header-top">
				<div class="container">
					<div class="row justify-content-center justify-content-lg-between align-items-center">
						<div class="col-auto d-none d-md-block">
							<div class="header-links">
								<ul>
									<li><?php echo wp_kses_post($settings['topbar_email_icon']); ?><a href="<?php echo esc_attr('mailto:' . $emailurl); ?>"><?php echo esc_html($email); ?></a></li>
									<li><?php echo wp_kses_post($settings['topbar_office_icon']); ?><?php echo esc_html($settings['topbar_office']); ?></li>
								</ul>
							</div>
						</div>
						<div class="col-auto">
							<div class="header-right">
								<div class="header-links">
									<ul>
										<li><?php echo wp_kses_post($settings['topbar_address_icon']); ?><?php echo esc_html($settings['topbar_address']); ?></li>
									</ul>
								</div>
								<?php if(!empty( $settings['show_social'])): ?>
								<div class="header-social">
									<?php	 
										foreach( $settings['social_icon_list'] as $social_icon ): 
										$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
										$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
									?>
										<a <?php echo esc_html($social_target) ?> <?php echo esc_html($social_nofollow) ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ) ?>"> <?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a> 
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="sticky-wrapper">
				<!-- Main Menu Area -->
				<div class="menu-area">
					<div class="container">
						<div class="row align-items-center justify-content-between">
							<div class="col-auto">
								<div class="header-logo">
									<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
										<?php echo malen_img_tag( array(
											'url'   => esc_url( $settings['logo_image']['url']  ),
										)); ?>
									</a>
								</div>
							</div>
							<div class="col-auto">
								<nav class="main-menu <?php echo $menu_icon; ?> d-none d-lg-inline-block">
									<?php if( ! empty( $settings['malen_menu_select'] ) ){
										wp_nav_menu( $args );
									} ?>
								</nav>
							</div>
							<div class="col-auto">
								<div class="header-button">
									<?php 
										if(!empty( $settings['show_cart_btn'])): 
											if( ! empty( $woocommerce->cart->cart_contents_count ) ){
												$count = $woocommerce->cart->cart_contents_count;
											}else{
												$count = "0";
											}
									?>
									<button type="button" class="icon-btn sideMenuToggler">
										<i class="fa-regular fa-bag-shopping"></i>
										<span class="badge"><?php echo esc_html( $count ); ?></span>
									</button>
									<?php endif; ?>
									<?php if(!empty( $settings['show_search_btn'])): ?>
										<button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>
									<?php endif; ?>
									<?php if(!empty( $settings['show_btn'])): ?>
                                    	<a href="<?php echo esc_url($settings['button_url']['url']); ?>" class="th-btn th_btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
                                    <?php endif; ?>
									<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="logo-bg"></div>
		</div>

		<?php endif; 

	}
}