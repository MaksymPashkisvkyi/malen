<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Service Widget .
 *
 */
class Mechon_Service extends Widget_Base {

	public function get_name() {
		return 'mechonservice';
	}

	public function get_title() {
		return __( 'Service V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_section',
			[
				'label'     => __( 'Service Slider', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'service_style',
			[
				'label' 	=> __( 'Service Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
					'4' 		=> __( 'Style Four', 'malen' ),
					'5' 		=> __( 'Style Five', 'malen' ),
				],
			]
		);
		$this->add_control(
			'make_it_slider',
			[
				'label' 		=> __( 'Make It Slider?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'malen' ),
				'label_off' 	=> __( 'No', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition' => [
					'service_style!' => '5'
				]
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'service_slider_image',
			[
				'label'     => __( 'Service Slider Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'service_slider_icon_image',
			[
				'label'     => __( 'Service Icon/BG Pattern', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'service_title',
            [
				'label'         => __( 'Service Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Neurology Specialist' , 'malen' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'service_number',
			[
				'label'         => __( 'Service Number', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '01' , 'malen' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'service_description',
            [
				'label'         => __( 'Service Description', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'There are many variations injected many alteration humour believable.' ,'malen' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
            'button_text',
            [
                'label'         => __( 'Button Text', 'malen' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'default'		=> __( 'View Details','malen' )
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label'         => __( 'Button Url', 'malen' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'default'		=> '#'
            ]
        );

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Service Slider', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'service_style!' => '5'
				]
			]
		);

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'service_slider_icon_image',
			[
				'label'     => __( 'Service Icon/BG Pattern', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater2->add_control(
			'service_slider_image',
			[
				'label'     => __( 'Service Slider Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater2->add_control(
			'service_title',
            [
				'label'         => __( 'Service Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				 'rows' 		=> 2,
				'default'       => __( 'Neurology Specialist' , 'malen' ),
				'label_block'   => true,
			]
		);
        $repeater2->add_control(
			'service_description',
            [
				'label'         => __( 'Service Description', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				 'rows' 		=> 4,
				'default'       => __( 'There are many variations injected many alteration humour believable.' ,'malen' ),
				'label_block'   => true,
			]
		);
		$repeater2->add_control(
			'features', [
				'label' 		=> __( 'Others Content', 'acadu' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'acadu' ),
				'label_block' 	=> true,
			]
        );

        $repeater2->add_control(
            'button_text',
            [
                'label'         => __( 'Button Text', 'malen' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                 'rows' 		=> 2,
				'default'		=> __( 'View Details','malen' )
            ]
        );

        $repeater2->add_control(
            'button_url',
            [
                'label'         => __( 'Button Url', 'malen' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                 'rows' 		=> 2,
				'default'		=> '#'
            ]
        );

		$this->add_control(
			'slides2',
			[
				'label' 		=> __( 'Service', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'service_style' => '5'
				]
			]
		);

        $this->end_controls_section();

		/*-----------------------------------------General styling------------------------------------*/
		$this->start_controls_section(
			'service_slider_general_style',
			[
				'label' 	=> __( 'General Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_style!' => '5'
				]
			]
		);
		$this->add_control(
			'service_box_background',
			[
				'label' 		=> __( 'Service Box Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_content,{{WRAPPER}} .service-card_content,{{WRAPPER}} .service-item-2_content' => 'background-color: {{VALUE}}',
                ]
			]
        );
		

		$this->end_controls_section();


		/*-----------------------------------------Icon styling------------------------------------*/
		$this->start_controls_section(
			'icon_styling',
			[
				'label' 	=> __( 'General Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_style' => '5'
				]
			]
		);
		$this->add_control(
			'Icon_background',
			[
				'label' 		=> __( 'Icon Big Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-tab-menu .tab-btn' => 'background-color: {{VALUE}}',
                ]
			]
        );		
        $this->add_control(
			'Icon_background2',
			[
				'label' 		=> __( 'Icon Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-tab-menu .tab-btn:after' => 'background-color: {{VALUE}}',
                ]
			]
        );		
        $this->add_control(
			'Icon_background3',
			[
				'label' 		=> __( 'Active Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-tab-menu .tab-btn.active:after' => 'background-color: {{VALUE}}',
                ]
			]
        );
		

		$this->end_controls_section();

		/*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_style!' => '5'
				]
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Number', 'malen' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_number,{{WRAPPER}} .service-card_number, .service-block_number'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .service-box-two_number,{{WRAPPER}} .service-card_number, .service-block_number',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_number,{{WRAPPER}} .service-card_number, .service-block_number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_number,{{WRAPPER}} .service-card_number, .service-block_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Title', 'malen' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-item-2_title, .service-block_title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .service-box-two_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-item-2_title, .service-block_title',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-item-2_title, .service-block_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-item-2_title, .service-block_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();


		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Description', 'malen' ),
			]
		);
		$this->add_control(
			'counter_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_text,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-item-2_text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'counter_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .service-box-two_tex,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-item-2_text',
			]
		);

        $this->add_responsive_control(
			'counter_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_text,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-item-2_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'counter_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box-two_text,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-item-2_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		//-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'title_style_section',
			[
				'label' => __( ' Title Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_style' => '5'
				]
			]
		);

        $this->add_control(
			'title_color',
			[
				'label' 	=> __( '  Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-tab_title a' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( '  Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .service-tab_title a',
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( '  Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-tab_title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( '  Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-tab_title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

        //-------------------------------------Description styling-------------------------------------//

        $this->start_controls_section(
			'desc_style_section',
			[
				'label' => __( ' Description Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'service_style' => '5'
				]
			]
		);

        $this->add_control(
			'desc_color',
			[
				'label' 	=> __( '  Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-tab_text, {{WRAPPER}}  .service-list li' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( '  Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .service-tab_text, {{WRAPPER}}  .service-list li',
			]
		);

        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( ' Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-tab_text, {{WRAPPER}}  .service-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( ' Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-tab_text, {{WRAPPER}} .service-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

         //-------------------------------------Button styling-------------------------------------//

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


	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		if( ! empty( $settings['slides'] ) || ! empty( $settings['slides2'] ) ){
			if($settings['make_it_slider'] == 'yes'){
				$this->add_render_attribute( 'wrapper', 'class', 'row th-carousel' );
				$this->add_render_attribute( 'wrapper2', 'class', 'row service_slider_2' );
			}else{
				$this->add_render_attribute( 'wrapper', 'class', 'row gy-30' );
				$this->add_render_attribute( 'wrapper2', 'class', 'row gy-30' );
			}
			if( $settings['service_style'] == '1' ){
				echo '<div class="service_1 arrow-wrap">';
					echo '<div class="row th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-arrows="true">';
	                	foreach( $settings['slides'] as $service_slider ){
			                echo '<div class="col-md-6 col-lg-4">';
			                    echo '<div class="service-box-two">';
			                    	if( ! empty( $service_slider['service_slider_image']['url'] ) ){
				                        echo '<div class="service-box-two_img">';
				                            echo malen_img_tag( array(
												'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
											) );
				                        echo '</div>';
				                    }
				                    if( ! empty( $service_slider['service_slider_icon_image']['url'] ) ){
				                        echo '<div class="service-box-two_icon">';
				                            echo malen_img_tag( array(
												'url'   => esc_url( $service_slider['service_slider_icon_image']['url'] ),
											) );
				                        echo '</div>';
				                    }
			                        echo '<div class="service-box-two_content">';
			                        	if( ! empty( $service_slider['service_number'] ) ){
				                            echo '<span class="service-box-two_number">'.esc_html( $service_slider['service_number'] ).'</span>';
				                        }
			                            if( ! empty( $service_slider['service_title'] ) ){
				                            echo '<h3 class="service-box-two_title"><a href="'.esc_url( $service_slider['button_url'] ).'">'.esc_html( $service_slider['service_title'] ).'</a></h3>';
				                        }
				                        if( ! empty( $service_slider['service_description'] ) ){
				                            echo '<p class="service-box-two_text">'.esc_html( $service_slider['service_description'] ).'</p>';
				                        }
			                        echo '</div>';
			                        if( ! empty( $service_slider['button_text'] ) ){
				                        echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="service-box-two_btn">'.esc_html( $service_slider['button_text'] ).' <i class="fas fa-arrow-right"></i></a>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            }
		                
		            echo '</div>';
	            echo '</div>';
			}elseif( $settings['service_style'] == '2' ){
				echo '<div class="service_2 arrow-wrap">';
					echo '<div class="row th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-arrows="true">';
						foreach( $settings['slides'] as $service_slider ){
				            echo '<div class="col-md-6 col-lg-4">';
				                echo '<div class="services-2-box">';
				                	if( ! empty( $service_slider['service_slider_image']['url'] ) ){
				                        echo '<div class="services-2-box_img">';
				                            echo malen_img_tag( array(
												'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
											) );
				                        echo '</div>';
				                    }
				                    echo '<div class="services-2-box_content">';
				                    	if( ! empty( $service_slider['service_number'] ) ){
				                            echo '<span class="services-2-box_number">'.esc_html( $service_slider['service_number'] ).'</span>';
				                        }
			                            if( ! empty( $service_slider['service_title'] ) ){
				                            echo '<h3 class="services-2-box_title"><a href="'.esc_url( $service_slider['button_url'] ).'">'.esc_html( $service_slider['service_title'] ).'</a></h3>';
				                        }
				                        if( ! empty( $service_slider['service_description'] ) ){
				                            echo '<p class="services-2-box_text">'.esc_html( $service_slider['service_description'] ).'</p>';
				                        }
				                    echo '</div>';
				                    if( ! empty( $service_slider['button_text'] ) ){
				                        echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="services-2-box_btn">'.esc_html( $service_slider['button_text'] ).' <i class="fas fa-arrow-right"></i></a>';
				                    }
				                echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
			}elseif( $settings['service_style'] == '4' ){
				?>
				<div class="row th-carousel" data-slide-show="3" data-md-slide-show="2" data-arrows="true">
					<?php foreach( $settings['slides'] as $service_slider ): ?>
					<div class="col-md-6 col-lg-4">
						<div class="service-block">
							<?php if( ! empty( $service_slider['service_slider_image']['url'] ) ): ?>
							<div class="service-block_img">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
								) ); ?>
							</div>
							<?php endif; ?>
							<div class="service-block_content" data-bg-src="<?php echo esc_url( $service_slider['service_slider_icon_image']['url']); ?>">
								<?php if( ! empty( $service_slider['service_number'] ) ): ?>
								<span class="service-block_number"><?php echo esc_html( $service_slider['service_number']); ?></span>
								<?php endif; ?>

								<?php if( ! empty( $service_slider['service_title'] ) ): ?>
								<h3 class="service-block_title"><a href="<?php echo esc_url( $service_slider['button_url'] ); ?>"><?php echo esc_html( $service_slider['service_title'] ); ?></a></h3>
								<?php endif; ?>

								<?php if( ! empty( $service_slider['button_text'] ) ): ?>
								<a href="<?php echo esc_url( $service_slider['button_url'] ); ?>" class="th-btn"><?php echo esc_html( $service_slider['button_text'] ); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
            	</div>

			<?php
			}elseif( $settings['service_style'] == '5' ){
			?>
			<div class="service-tab-menu" data-asnavfor=".service-tab-slide">
			<?php foreach( $settings['slides2'] as $service_slider ): 
				$x = 0;
				if( $x == '1' ){
					$is_active 		= 'active';
				}else{
					$is_active 		= '';
				}
			?>
            <div class="tab-btn <?php echo esc_attr($is_active); ?>">
                <?php  echo malen_img_tag( array(
						'url'   => esc_url( $service_slider['service_slider_icon_image']['url'] ),
					) ); ?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="service-tab-slide th-carousel" data-fade="true">
        	<?php foreach( $settings['slides2'] as $service_slider ): ?>
            <div class="">
                <div class="service-tab">
                    <div class="service-tab_img">
                        <?php  echo malen_img_tag( array(
							'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
						) ); ?>
                    </div>
                    <div class="service-tab_content">
                    	<?php  if( ! empty( $service_slider['service_title'] ) ): ?>
                        	<h3 class="service-tab_title"><a href="<?php echo esc_url( $service_slider['button_url'] ); ?>"><?php echo esc_html( $service_slider['service_title'] ); ?></a></h3>
                        <?php endif; ?>
                        <?php  if( ! empty( $service_slider['service_description'] ) ): ?>
                        	<p class="service-tab_text"><?php echo esc_html( $service_slider['service_description'] ); ?></p>
                        <?php endif; ?>
                        <div class="service-list">
                        	<?php  if( ! empty( $service_slider['features'] ) ): ?>
                            	<?php echo wp_kses_post( $service_slider['features'] ); ?>
                            <?php endif; ?>
                        </div>
                        <?php  if( ! empty( $service_slider['button_text'] ) ): ?>
	                        <a href="<?php echo esc_url( $service_slider['button_url'] ); ?>" class="th-btn"><?php echo esc_html( $service_slider['button_text'] ); ?></a>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
       		<?php endforeach; ?>
        </div>

			<?php
			}else{
				echo '<div class="service_3">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						foreach( $settings['slides'] as $service_slider ){
				            echo '<div class="col-md-6 col-lg-4">';
				                echo '<div class="service-item-2">';
				                	if( ! empty( $service_slider['service_slider_image']['url'] ) ){
				                        echo '<div class="service-item-2_img">';
				                            echo malen_img_tag( array(
												'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
											) );
				                        echo '</div>';
				                    }
				                    echo '<div class="service-item-2_content">';
			                            if( ! empty( $service_slider['service_title'] ) ){
				                            echo '<h3 class="service-item-2_title"><a href="'.esc_url( $service_slider['button_url'] ).'">'.esc_html( $service_slider['service_title'] ).'</a></h3>';
				                        }
				                        if( ! empty( $service_slider['service_description'] ) ){
				                            echo '<p class="service-item-2_text">'.esc_html( $service_slider['service_description'] ).'</p>';
				                        }
				                        if( ! empty( $service_slider['button_text'] ) ){
					                        echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="th-btn">'.esc_html( $service_slider['button_text'] ).' <i class="fas fa-arrow-right"></i></a>';
					                    }
				                    echo '</div>';
				                echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
			}
		}

	}

}