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
class malen_Service extends Widget_Base {

	public function get_name() {
		return 'malenservice';
	}

	public function get_title() {
		return __( 'Services', 'malen' );
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
				'label'     => __( 'Services', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Services Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2'  		=> __( 'Style Two', 'malen' ),
					'3'  		=> __( 'Style Three', 'malen' ),
					'4'  		=> __( 'Style Four', 'malen' ),
				],
			]
		);

		// $this->add_control(
		// 	'make_it_slider',
		// 	[
		// 		'label' 		=> __( 'Make It Slider?', 'malen' ),
		// 		'type' 			=> Controls_Manager::SWITCHER,
		// 		'label_on' 		=> __( 'Yes', 'malen' ),
		// 		'label_off' 	=> __( 'No', 'malen' ),
		// 		'return_value' 	=> 'yes',
		// 		'default' 		=> 'yes',
		// 		'condition'	=> [
		// 			'layout_style' => ['1']
		// 		]
		// 	]
		// );

		$this->add_control(
			'shape',
			[
				'label'     => __( 'Shape', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				// 'condition'	=> [
				// 	'layout_style' => ['1', '2', '3']
				// ]
			]
		);

		$this->add_control(
			'shape2',
			[
				'label'     => __( 'Shape 2', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'service_img',
			[
				'label'     => __( 'Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'service_icon',
			[
				'label'     => __( 'Icon', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'service_title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater->add_control(
			'service_content',
            [
				'label'         => __( 'Content', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Content' , 'malen' ),
				'label_block'   => true,
				'rows' => '4'
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Read More', 'malen' )
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'service_list',
			[
				'label' 		=> __( 'Service Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Personalized Learning', 'malen' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
		);

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'service_icon',
			[
				'label'     => __( 'Icon', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
			]
		);

        $repeater2->add_control(
			'service_title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater2->add_control(
			'service_content',
            [
				'label'         => __( 'Content', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Content' , 'malen' ),
				'label_block'   => true,
				'rows' => '4'
			]
		);
		
		$repeater2->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Read More', 'malen' )
			]
        );

        $repeater2->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'service_list2',
			[
				'label' 		=> __( 'Service Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Personalized Learning', 'malen' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['2', '4']
				]
			]
		);

		$repeater3 = new Repeater();

		$repeater3->add_control(
			'service_img',
			[
				'label'     => __( 'Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater3->add_control(
			'service_icon',
			[
				'label'     => __( 'Icon', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater3->add_control(
			'service_title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater3->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'service_list3',
			[
				'label' 		=> __( 'Service Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater3->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Personalized Learning', 'malen' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['3']
				]
			]
		);
		
        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

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
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_color2',
			[
				'label' 		=> __( 'Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-wrap:hover .th-title' => 'color: {{VALUE}} !important',
				],
				'condition'	=> [
					'layout_style' => ['1', '2', '3']
				]
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

		//---------------------------------------Description Style---------------------------------------//
		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Description Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'desc_color2',
			[
				'label' 		=> __( 'Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-wrap:hover .th-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Typography', 'malen' ),
				'selector' 	=> '{{WRAPPER}} .th-desc',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		//---------------------------------------Button Style---------------------------------------//
		$this->start_controls_section(
			'button_style',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['1', '2', '4']
				]
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => '--title-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_color2',
			[
				'label' 		=> __( 'Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-wrap:hover .th_btn' => '--theme-color: {{VALUE}}',
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

		$this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>

        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="row slider-shadow th-carousel arrow-wrap" id="serviceSlide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">
				<?php foreach( $settings['service_list2'] as $data ): ?>
				<div class="col-md-6 col-lg-6 col-xl-4">
					<div class="service-item">
						<div class="service-item_shape">
							<?php echo malen_img_tag( array(
									'url'   => esc_url( $settings['shape']['url']  ),
								)); ?>
						</div>
						<div class="service-item-content">
							<div class="service-item_icon">
								<?php echo malen_img_tag( array(
										'url'   => esc_url( $data['service_icon']['url']  ),
										'class' => 'svgInject',
									)); ?>
							</div>
							<h3 class="service-item_title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>

							<p class="service-item_text th-desc"><?php echo esc_html( $data['service_content'] );  ?></p>
							<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="half-line-btn th_btn"><?php echo wp_kses_post($data['button_text']); ?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="row slider-shadow th-carousel arrow-wrap" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="true">
				<?php foreach( $settings['service_list3'] as $data ): ?>
				<div class="col-md-6 col-lg-6 col-xl-4">
					<div class="service-grid" data-bg-src="<?php echo esc_url( $settings['shape']['url']  ); ?>">
						<div class="service-grid_wrapper">
							<div class="service-grid_icon">
								<?php echo malen_img_tag( array(
										'url'   => esc_url( $data['service_icon']['url']  ),
									)); ?>
							</div>
							<h3 class="box-title service-title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a>
							</h3>
						</div>
						<div class="service-grid_img">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['service_img']['url']  ),
								)); ?>
							<div class="service-grid_btn">
								<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><i class="far fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="row gy-4">
				<?php foreach( $settings['service_list2'] as $data ): ?>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="service-item style2">
						<div class="service-item_shape">
							<?php echo malen_img_tag( array(
									'url'   => esc_url( $settings['shape']['url']  ),
								)); ?>
						</div>
						<div class="service-item-content">
							<div class="service-item_icon style2">
								<?php echo malen_img_tag( array(
										'url'   => esc_url( $data['service_icon']['url']  ),
									)); ?>
							</div>
							<h3 class="service-item_title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a></h3>

							<p class="service-item_text th-desc"><?php echo esc_html( $data['service_content'] );  ?></p>
							<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="half-line-btn th_btn"><?php echo wp_kses_post($data['button_text']); ?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

    	<?php else: ?>
			<div class="row slider-shadow th-carousel arrow-wrap" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="true">
				<?php foreach( $settings['service_list'] as $data ): ?>
				<div class="col-md-6 col-lg-6 col-xl-4">
					<div class="service-box th-wrap">
						<div class="service-box_img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['service_img']['url']  ),
							)); ?>
						</div>
						<div class="service-box_content" data-bg-src="<?php echo esc_url( $settings['shape']['url']  ); ?>">
							<div class="service-box_wrapper">
								<div class="service-box_icon">
									<?php echo malen_img_tag( array(
										'url'   => esc_url( $data['service_icon']['url']  ),
										'class' => 'svgInject',
									)); ?>
								</div>
								<h3 class="box-title service-title th-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['service_title'] ); ?></a>
									<span class="line-animation">
										<?php echo malen_img_tag( array(
											'url'   => esc_url( $settings['shape2']['url']  ),
										)); ?>
									</span>
								</h3>
							</div>
							<p class="service-box_text th-desc"><?php echo esc_html( $data['service_content'] );  ?></p>
							<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="half-line-btn th_btn"><?php echo wp_kses_post($data['button_text']); ?></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

      <?php endif; 

	}

}