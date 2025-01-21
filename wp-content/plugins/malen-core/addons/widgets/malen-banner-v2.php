<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Banner Widget.
 *
 */
class Mechon_Banner extends Widget_Base {

	public function get_name() {
		return 'mechonbanner';
	}

	public function get_title() {
		return __( 'Banner v2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Banner_section',
			[
				'label' 	=> __( 'Banner', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'banner_style',
			[
				'label' 		=> __( 'Banner Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
					'4' 		=> __( 'Style Four', 'malen' ),
				],
			]
		);

		/*-----------------------------------------style one ------------------------------------*/

		$repeater = new Repeater();

        $repeater->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater->add_control(
            'overlay_banner_img',
            [
                'label'     => __( 'Overlay Banner Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater->add_control(
			'banner_title', [
				'label' 		=> __( 'Title 1', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Affordable Prices For' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Professional Care' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'tag1', [
				'label' 		=> __( 'Tag 1', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Service' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'tag2', [
				'label' 		=> __( 'Tag 2', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Repair' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'tag3', [
				'label' 		=> __( 'Tag 3', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Estimation' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'malen' ),
			]
        );

        $repeater->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'First Button Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Second Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Latest Projects', 'malen' ),
			]
        );

        $repeater->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Second Button Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		
		$this->add_control(
			'banners_one',
			[
				'label' 		=> __( 'Banners', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Banner One', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'	=> ['banner_style' => '1']
			]
		);

		/*-----------------------------------------style two ------------------------------------*/

		$repeater2 = new Repeater();

        $repeater2->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater2->add_control(
            'banner_shape_img',
            [
                'label'     => __( 'Banner Shape Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater2->add_control(
            'overlay_banner_img',
            [
                'label'     => __( 'Overlay Banner Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater2->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Get The Best Car Solution' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'banner_title', [
				'label' 		=> __( 'Title 1', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'The Best Car Repair' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Service Center' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'malen' ),
			]
        );

        $repeater2->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'First Button Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater2->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Second Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Latest Projects', 'malen' ),
			]
        );

        $repeater2->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Second Button Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		
		$this->add_control(
			'banners_two',
			[
				'label' 		=> __( 'Banners', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Banner One', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'	=> ['banner_style' => '2']
			]
		);

		/*-----------------------------------------style three ------------------------------------*/

		$repeater3 = new Repeater();

		$repeater3->add_control(
			'banner_img',
			[
				'label'     => __( 'Banner Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater3->add_control(
			'overlay_banner_img',
			[
				'label'     => __( 'Overlay Banner Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater3->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Non Stop Car Servicing Center' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater3->add_control(
			'banner_title', [
				'label' 		=> __( 'Title 1', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Get Your Amazing' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater3->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Car Solution' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater3->add_control(
			'banner_desc', [
				'label' 		=> __( 'Description', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 4,
				'default' 		=> __( 'Take payments online with a scalable platform that grows with your perfect business.' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater3->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> esc_html__( 'Get A Quote', 'malen' ),
			]
		);

		$repeater3->add_control(
			'button_link',
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
			]
		);
		
		$this->add_control(
			'banners_three',
			[
				'label' 		=> __( 'Banners', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater3->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Banner Three', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'	=> ['banner_style' => '3']
			]
		);

		/*-----------------------------------------style three ------------------------------------*/

		$repeater4 = new Repeater();

		$repeater4->add_control(
			'banner_img',
			[
				'label'     => __( 'Banner Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater4->add_control(
			'overlay_banner_img',
			[
				'label'     => __( 'Background Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater4->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Better Car Solution' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater4->add_control(
			'banner_title', [
				'label' 		=> __( 'Title 1', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Professional Car Service' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater4->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'And Repair Company' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater4->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> esc_html__( 'Learn more', 'malen' ),
			]
		);

		$repeater4->add_control(
			'button_link',
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
			]
		);
		$repeater4->add_control(
			'button_text2',
			[
				'label' 	=> esc_html__( 'Video Text 1', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> esc_html__( 'Watch Our Story', 'malen' ),
			]
		);		
		$repeater4->add_control(
			'button_text22',
			[
				'label' 	=> esc_html__( 'Video Text 2', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> esc_html__( 'Subscribe Now', 'malen' ),
			]
		);

		$repeater4->add_control(
			'button_link2',
			[
				'label' 		=> esc_html__( 'Video Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		
		$this->add_control(
			'banners_four',
			[
				'label' 		=> __( 'Banners', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater4->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Professional Car Service', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'	=> ['banner_style' => '4']
			]
		);

		$this->end_controls_section();

		        //---------------------------------------Heading Style---------------------------------------//

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Heading Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'banner_style' => ['2', '3', '4']
				]
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( ' Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( ' Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .hero-subtitle',
			]
        );
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( ' Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( ' Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

        //---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h1' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} h1',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
		//---------------------------------------tag Style---------------------------------------//

		$this->start_controls_section(
			'tag_style',
			[
				'label' 	=> __( 'Tag Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> ['banner_style' => '1']
			]
		);
		$this->add_control(
			'tag_color',
			[
				'label' 		=> __( 'Tag Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-meta span, .hero-subtitle' => '--white-color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tag_typography',
				'label' 	=> __( 'Tag Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .hero-meta span, .hero-subtitle',
			]
        );
        $this->add_responsive_control(
			'tag_margin',
			[
				'label' 		=> __( 'Tag Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-meta span, .hero-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'tag_padding',
			[
				'label' 		=> __( 'Tag Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-meta span, .hero-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

				//---------------------------------------Description Style---------------------------------------//

		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Description Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> ['banner_style' => '3']
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Description Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-style3 .hero-text' => '--white-color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Description Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .hero-style3 .hero-text',
			]
        );
        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Description Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-style3 .hero-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Description Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-style3 .hero-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		

		//---------------------------------------Button Style---------------------------------------//

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
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


		//---------------------------------------Button Style---------------------------------------//

		$this->start_controls_section(
			'button_style_section2',
			[
				'label' 	=> __( 'Video Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'banner_style' => ['4']
				]
			]
        );

        $this->add_control(
			'button_bg_color2',
			[
				'label' 		=> __( 'Icon Bg Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .video-btn2 .play-btn > i' => 'background-color:{{VALUE}}',
                ],
			]
        );       
         $this->add_control(
			'button_bg_color22',
			[
				'label' 		=> __( 'Icon Border Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .video-btn2 .play-btn > i' => 'border-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color3',
			[
				'label' 		=> __( 'Text Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .video-btn2 .btn-title, {{WRAPPER}} .video-btn2 .btn-text' => 'color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography2',
				'label' 	=> __( 'Video Typography 1', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .video-btn2 .btn-title',
			]
        );        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography3',
				'label' 	=> __( 'Video  Typography 2', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .video-btn2 .btn-text',
			]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
		?>

		<?php if( $settings['banner_style'] == '2'):  ?>
			<!-- Banner Two -->
			<div class="th-hero-wrapper hero-5">
				<?php 
					echo '<div class="hero-slider-5 th-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true">';
					foreach( $settings['banners_two'] as $data ) {
						echo '<!-- Hero Slide -->';
						echo '<div class="th-hero-slide">';
							if(!empty($data['banner_img']['url'])){
								echo '<div class="th-hero-bg" data-bg-src="'.esc_url($data['banner_img']['url']).'" data-overlay="title" data-opacity="5">';
									if(!empty($data['overlay_banner_img']['url'])){
										echo malen_img_tag( array(
											'url'   => esc_url( $data['overlay_banner_img']['url']  ),
										));
									}
								echo '</div>';
							}
							if(!empty($data['banner_shape_img']['url'])){
								echo '<div class="hero-shape"><img src="'.esc_url($data['banner_shape_img']['url']).'" alt="'.esc_attr('shape','malen').'"></div>';
							}
							echo '<div class="container">';
								echo '<div class="hero-style5">';
									if(!empty($data['heading'])){
										echo '<span class="hero-subtitle" data-ani="slideinup" data-ani-delay="0.1s">'.esc_html($data['heading']).'</span>';
									}
									if(!empty($data['banner_title'])){
										echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.3s">'.esc_html($data['banner_title']).'</h1>';
									}
									if(!empty($data['banner_title2'])){
										echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.6s">'.esc_html($data['banner_title2']).'</h1>';
									}
									echo '<div class="btn-group">';
										if(!empty($data['button_text_1'])){
											echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="th-btn style2" data-ani="slideinup" data-ani-delay="0.7s">'.esc_html($data['button_text_1']).'</a>';
										}
										if(!empty($data['button_text_2'])){
											echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="th-btn style4" data-ani="slideinup" data-ani-delay="0.8s">'.esc_html($data['button_text_2']).'</a>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					
					echo '</div>';
				?>
			</div>
			
		<?php elseif( $settings['banner_style'] == '3'):  ?>
			<div class="th-hero-wrapper hero-4">
				<div class="hero-slider-4 th-carousel number-dots" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true">
					<!-- Hero Slide -->
					<?php foreach( $settings['banners_three'] as $data ): ?>
					<div class="th-hero-slide">
						<div class="th-hero-bg" data-bg-src="<?php echo esc_url($data['banner_img']['url']) ?>">
							<img src="<?php echo esc_url($data['overlay_banner_img']['url']) ?>" alt="Hero Image">
						</div>
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="hero-style4">
										<?php if(!empty($data['heading'])): ?>
										<span class="hero-subtitle" data-ani="slideindown" data-ani-delay="0.2s"><?php echo esc_html($data['heading']); ?></span>
										<?php endif; ?>
										<?php if(!empty($data['banner_title'])): ?>
										<h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.3s"><?php echo esc_html($data['banner_title']); ?></h1>
										<?php endif; ?>
										<?php if(!empty($data['banner_title2'])): ?>
										<h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.4s"><?php echo esc_html($data['banner_title2']); ?></h1>
										<?php endif; ?>
										<?php if(!empty($data['banner_desc'])): ?>
										<p class="hero-text" data-ani="slideindown" data-ani-delay="0.5s"><?php echo esc_html($data['banner_desc']); ?></p>
										<?php endif; ?>
										<?php if(!empty($data['button_text'])): ?>
										<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn style2" data-ani="slideindown" data-ani-delay="0.6s"><?php echo esc_html( $data['button_text']); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</div>
			

		<?php elseif( $settings['banner_style'] == '4'):  ?>
			<div class="th-hero-wrapper hero-7">
			<div class="hero-slider-7 th-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-arrows="true" data-xl-arrows="true" data-ml-arrows="false">
				<?php foreach( $settings['banners_four'] as $data ): ?>
					<!-- Hero Slide -->
					<div class="th-hero-slide">
						<div class="th-hero-bg" data-bg-src="<?php echo esc_url($data['banner_img']['url']) ?>">
							<?php 
								echo malen_img_tag( array(
										'url'   => esc_url( $data['overlay_banner_img']['url']  ),
									));
							?>
						</div>
						<div class="container">
							<div class="hero-style7">
								<?php if(!empty($data['heading'])): ?>
									<span class="hero-subtitle" data-ani="slideinup" data-ani-delay="0.1s"><?php echo esc_html($data['heading']); ?></span>
								<?php endif; ?>
								<?php if(!empty($data['banner_title'])): ?>
									<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.3s"><?php echo esc_html($data['banner_title']); ?></h1>
								<?php endif; ?>
								<?php if(!empty($data['banner_title2'])): ?>
									<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.6s"><?php echo esc_html($data['banner_title2']); ?></h1>
								<?php endif; ?>
								<div class="btn-group">
									<?php if(!empty($data['button_text'])): ?>
										<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn style2" data-ani="slideinup" data-ani-delay="0.7s"><?php echo esc_html( $data['button_text']); ?></a>
									<?php endif; ?>
									<?php if(!empty($data['button_link2']['url'])): ?>
									<div class="video-btn2" data-ani="slideinup" data-ani-delay="0.8s">
										<a href="<?php echo esc_url( $data['button_link2']['url'] ); ?>" class="play-btn popup-video"><i class="fas fa-play"></i></a>
										<div class="media-body">
											<span class="btn-title"><?php echo esc_html( $data['button_text2']); ?></span>
											<span class="btn-text"><?php echo esc_html( $data['button_text22']); ?></span>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		
		<?php else: ?>
			<!-- Banner One -->
			<div class="th-hero-wrapper hero-6">
				<?php
					echo '<div class="hero-slider-6 th-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-arrows="true" data-xl-arrows="true">';
						foreach( $settings['banners_one'] as $data ) {
							echo '<!-- Hero Slide -->';
							echo '<div class="th-hero-slide">';
								if(!empty($data['banner_img']['url'])){
									echo '<div class="th-hero-bg" data-bg-src="'.esc_url($data['banner_img']['url']).'">';
										if(!empty($data['overlay_banner_img']['url'])){
											echo malen_img_tag( array(
												'url'   => esc_url( $data['overlay_banner_img']['url']  ),
											));
										}
									echo '</div>';
								}
								echo '<div class="container">';
									echo '<div class="row">';
										echo '<div class="col">';
											echo '<div class="hero-style6">';
												echo '<div class="hero-meta">';
													if(!empty($data['tag1'])){
														echo '<span data-ani="slideindown" data-ani-delay="0.1s">'.esc_html($data['tag1']).'</span>';
													}
													if(!empty($data['tag2'])){
														echo '<span data-ani="slideindown" data-ani-delay="0.2s">'.esc_html($data['tag2']).'</span>';
													}
													if(!empty($data['tag3'])){
														echo '<span data-ani="slideindown" data-ani-delay="0.3s">'.esc_html($data['tag3']).'</span>';
													}
												echo '</div>';
												if(!empty($data['banner_title'])){
													echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.4s">'.esc_html($data['banner_title']).'</h1>';
												}
												if(!empty($data['banner_title2'])){
													echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.6s">'.esc_html($data['banner_title2']).'</h1>';
												}
												echo '<div class="btn-group">';
													if(!empty($data['button_text_1'])){
														echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="th-btn style2" data-ani="slideinup" data-ani-delay="0.5s">'.esc_html($data['button_text_1']).'</a>';
													}
													if(!empty($data['button_text_2'])){
														echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="th-btn style4" data-ani="slideinup" data-ani-delay="0.6s">'.esc_html($data['button_text_2']).'</a>';
													}
												echo '</div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
							echo '<!-- Hero Slide -->';
						}
					echo '</div>';
				?>
			</div>
			

		<?php endif; ?>

		<?php

	}

}