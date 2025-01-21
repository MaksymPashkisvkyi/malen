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
class malen_Banner extends Widget_Base {

	public function get_name() {
		return 'malenbanner';
	}

	public function get_title() {
		return __( 'Banner', 'malen' );
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
			'layout_style',
			[
				'label' 		=> __( 'Layout Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
				],
			]
		);

		//-------------------------------Style 1-------------------------------//
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
			'banner_subtitle', [
				'label' 		=> __( 'Sub Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Subtitle here' , 'malen' ),
				'label_block' 	=> true,
				'separator' => 'before',
			]
        );

        $repeater->add_control(
			'banner_title', [
				'label' 		=> __( 'Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title here' , 'malen' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title 2 here' , 'malen' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'banner_big_title', [
				'label' 		=> __( 'Big Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '' , 'malen' ),
				'label_block' 	=> true,
			]
        );

        
        $repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Apply Now', 'malen' ),
				'label_block' => true,
				'separator' => 'before'
			]
        );

        $repeater->add_control(
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
			'banner_slides',
			[
				'label' 		=> __( 'Banners', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'banner_subtitle' 	=> __( 'We offer Vehicles Repair', 'malen' ),
						'banner_title' 		=> __( 'Let your car', 'malen' ),
					],
				],		
				'condition'	=> [
					'layout_style' => ['1']
				]			
			]
		);

		//-------------------------------Style 2-------------------------------//
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
            'Shape1',
            [
                'label'     => __( 'Shape 1', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );
		
		$repeater2->add_control(
            'Shape2',
            [
                'label'     => __( 'Shape 2', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );

        $repeater2->add_control(
			'banner_subtitle', [
				'label' 		=> __( 'Sub Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Subtitle here' , 'malen' ),
				'label_block' 	=> true,
				'separator' => 'before',
			]
        );

        $repeater2->add_control(
			'banner_title', [
				'label' 		=> __( 'Title 1', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title 1 here' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater2->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Apply Now', 'malen' ),
				'label_block' => true,
				'separator' => 'before'
			]
        );

        $repeater2->add_control(
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

		$repeater2->add_control(
			'video_link',
			[
				'label' 		=> esc_html__( 'Video Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://www.youtube.com/watch?v=-MbzmkxsApI',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'banner_slides2',
			[
				'label' 		=> __( 'Banners', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'banner_subtitle' 	=> __( 'We’re Provide best services', 'malen' ),
						'banner_title' 		=> __( 'transport For Everything', 'malen' ),
					],
				],		
				'condition'	=> [
					'layout_style' => ['2']
				]			
			]
		);

		//-------------------------------Style 3-------------------------------//
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
			'banner_subtitle', [
				'label' 		=> __( 'Sub Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Subtitle here' , 'malen' ),
				'label_block' 	=> true,
				'separator' => 'before',
			]
		);

		$repeater3->add_control(
			'banner_title', [
				'label' 		=> __( 'Title 1', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title 1 here' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		
		$repeater3->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> esc_html__( 'Apply Now', 'malen' ),
				'label_block' => true,
				'separator' => 'before'
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
			'banner_slides3',
			[
				'label' 		=> __( 'Banners', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater3->get_controls(),
				'default' 		=> [
					[
						'banner_subtitle' 	=> __( 'We offer Vehicles Repair', 'malen' ),
						'banner_title' 		=> __( 'Finely tuned Service is our Specialty', 'malen' ),
					],
				],		
				'condition'	=> [
					'layout_style' => ['3']
				]			
			]
		);
		

		$this->add_control(
            'image',
            [
                'label'     => __( 'Shape', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition'	=> [
					'layout_style' => ['2', '3']
				]	
            ]
        );

		$this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

        //---------------------------------------Subtitle Style---------------------------------------//
		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Subtitle Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'color: {{VALUE}}',
                ],
			]
        );	

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-sub',
			]
        );

        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->end_controls_section();

		//---------------------------------------Title Style---------------------------------------//
		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'tayde' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'tayde' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}} !important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'tayde' ),
                'selector' 	=> '{{WRAPPER}} .th-title',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'tayde' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'tayde' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//-------------------------Button Style-----------------------//
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'advoker' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'advoker' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_color',
			[
				'label' 		=> __( 'Hover Color ', 'advoker' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label' 		=> __( 'Background Color', 'advoker' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'background-color:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_bg',
			[
				'label' 		=> __( 'Background Hover Color', 'advoker' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after' => 'background-color:{{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Typography', 'advoker' ),
				'selector' 	=> '{{WRAPPER}} .th_btn',
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'advoker' ),
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
				'label' 		=> __( 'Padding', 'advoker' ),
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
				'label' 		=> __( 'Border Radius', 'advoker' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();

?>
	<?php if( $settings['layout_style'] == '2' ): ?>
		<div class="th-hero-wrapper hero-2" id="hero">
			<div class="hero-slider-wrap-2">
				<div class="hero-slider-2 th-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true">
					<?php foreach( $settings['banner_slides2'] as $data ): ?>
					<div class="th-hero-slide">
						<div class="th-hero-bg" data-bg-src="<?php echo esc_url($data['banner_img']['url']); ?>">
							<div class="hero-shape"> 
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['Shape1']['url']  ),
								)); ?>
							</div>
							<div class="hero-shape2"> 
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['Shape2']['url']  ),
								)); ?>
							</div>
						</div>
						<div class="container">
							<div class="row align-items-center justify-content-center">
								<div class="col-lg-8 col-md-10">
									<div class="hero-style2">
										<span class="hero-subtitle th-sub" data-ani="slideindown" data-ani-delay="0.2s"><?php echo wp_kses_post($data['banner_subtitle']) ?></span>
										<h1 class="hero-title th-title" data-ani="slideindown" data-ani-delay="0.3s"><?php echo wp_kses_post($data['banner_title']) ?></h1>
										<div class="btn-group justify-content-lg-start justify-content-center mt-40" data-ani="slideindown" data-ani-delay="0.4s">
											<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn th_btn style2"><?php echo wp_kses_post($data['button_text']); ?></a>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="hero-video-1">
										<a href="<?php echo esc_url( $data['video_link']['url'] ); ?>" class="play-btn style4 popup-video">
											<i class="fa-sharp fa-solid fa-play"></i>
										</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="hero-bg">
				<?php echo malen_img_tag( array(
					'url'   => esc_url( $settings['image']['url']  ),
				)); ?>
			</div>
		</div>

	<?php elseif($settings['layout_style'] == '3' ): ?>
		<section class="th-hero-wrapper hero-3" id="hero" data-bg-src="<?php echo esc_url($settings['image']['url']); ?>">
			<div class="hero-slider-3 th-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1">
				<?php foreach( $settings['banner_slides3'] as $data ): ?>
				<div class="th-hero-slide">
					<div class="container">
						<div class="row align-items-end">
							<div class="col-lg-7">
								<div class="hero-style3">
									<span class="hero-subtitle th-sub" data-ani="slideinleft" data-ani-delay="0.1s"><?php echo wp_kses_post($data['banner_subtitle']) ?></span>
									<h1 class="hero-title th-title" data-ani="slideinleft" data-ani-delay="0.3s"><?php echo wp_kses_post($data['banner_title']) ?></h1>
									<div class="btn-group" data-ani="slideinleft" data-ani-delay="0.5s">
										<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn th_btn style2"><?php echo wp_kses_post($data['button_text']); ?></a>
									</div>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="th-hero-img" data-ani="slideinright" data-ani-delay="0.9s">
									<?php echo malen_img_tag( array(
										'url'   => esc_url( $data['banner_img']['url']  ),
									)); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="hero-indicator3" data-asnavfor=".hero-slider-3">
				<?php foreach( $settings['banner_slides3'] as $key => $data ): 
					$active = ($key == 0) ? 'active' : '';
					?>
				<a class="indicatior-btn <?php echo esc_attr($active); ?>">
					<?php echo malen_img_tag( array(
						'url'   => esc_url( $data['banner_img']['url']  ),
					)); ?>
				</a>
				<?php endforeach; ?>
			</div>
		</section>

	<?php else: ?>
		<div class="th-hero-wrapper hero-1" id="hero">
			<div class="hero-slider-wrap-1">
				<div class="hero-slider-1 th-carousel" id="heroSlide1" data-fade="true">
					<?php foreach( $settings['banner_slides'] as $data ): ?>
					<div class="th-hero-slide">
						<div class="th-hero-bg" data-bg-src="<?php echo esc_url($data['banner_img']['url']); ?>">
						</div>
						<div class="container">
							<div class="hero-style1">
								<span class="hero-subtitle th-sub" data-ani="slideinup" data-ani-delay="0.1s"><?php echo wp_kses_post($data['banner_subtitle']) ?></span>
								<h1 class="hero-title th-title mb-0" data-ani="slideinup" data-ani-delay="0.3s"><?php echo wp_kses_post($data['banner_title']) ?></h1>
								<h1 class="hero-title th-title" data-ani="slideinup" data-ani-delay="0.6s"><?php echo wp_kses_post($data['banner_title2']) ?></h1>
								<div class="hero-big">
									<h1 class="hero-big_text"><?php echo wp_kses_post($data['banner_big_title']) ?></h1>
								</div>
								<div class="btn-group justify-content-center" data-ani="slideinup" data-ani-delay="0.8s">
									<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn th_btn style2"><?php echo wp_kses_post($data['button_text']); ?></a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="icon-box hero-icon">
				<button data-slick-prev="#heroSlide1" class="slick-arrow default"><i class="fa-sharp fa-light fa-arrow-left-long"></i><span class="icon-text">prev</span></button>
				<button data-slick-next="#heroSlide1" class="slick-arrow default1"><span class="icon-text">next</span><i class="fa-sharp fa-light fa-arrow-right-long"></i></button>
			</div>

		</div>

	<?php endif; 
		
	}

}