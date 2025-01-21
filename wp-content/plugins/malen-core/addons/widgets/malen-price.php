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
 * Price Widget .
 *
 */
class Malen_Price extends Widget_Base {

	public function get_name() {
		return 'malenprice';
	}

	public function get_title() {
		return __( 'Price Box', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'price_section',
			[
				'label' 	=> __( 'Price Box', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Layout Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					// '2'  		=> __( 'Style Two', 'malen' ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'active_box',
			[
				'label' 		=> __( 'Active Box?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'separator' => 'before',
			]
		);

        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
			]
		); 

        $repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                 'default'  	=> esc_html__( 'Basic Plan', 'malen' ),
			]
        );

        $repeater->add_control(
			'price',
			[
				'label'     => __( 'Price', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                 'default'  	=> esc_html__( '$55/Per Month', 'malen' ),
			]
        );	

        $repeater->add_control(
			'tag',
			[
				'label'     => __( 'Tag', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                 'default'  	=> esc_html__( 'Save Over 25%', 'malen' ),
			]
        ); 

        $repeater->add_control(
			'features', [
				'label' 		=> __( 'Features', 'malen' ),
				'type' 			=> Controls_Manager::WYSIWYG,
				'default' 		=> __( '12 Hour Session' , 'malen' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
				'rows' => 2,
                'default'  	=> esc_html__( 'Choose Plan', 'malen' ),
			]
        );

        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'malen' ),
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
			'price_list',
			[
				'label' 		=> __( 'Price List', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'malen' ),
					],
				],
			]
		);

		$this->end_controls_section();

         //---------------------------------------
			//Style Section Start
		//---------------------------------------

        //-------------------------------------General styling-------------------------------------//
        $this->start_controls_section(
			'style',
			[
				'label' => __( 'General', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'general_bg',
			[
				'label' 		=> __( 'Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_control(
			'general_bg2',
			[
				'label' 		=> __( 'Active Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card.active' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();


         //-------------------------------------Price Package styling-------------------------------------//
        $this->start_controls_section(
			'price_title_style',
			[
				'label' => __( ' Price Package Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'price_title_color',
			[
				'label' 	=> __( 'Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-card_title' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'price_title_typography',
				'label' 	=> __( '  Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .price-card_title',
			]
		);

        $this->add_responsive_control(
			'price_title_margin',
			[
				'label' 		=> __( '  Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'price_title_padding',
			[
				'label' 		=> __( '  Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

        //-------------------------------------Price styling-------------------------------------//
        $this->start_controls_section(
			'price_style_section',
			[
				'label' => __( 'Price Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'price_subtitle_color',
			[
				'label' 		=> __( ' Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'price_subtitle_typography',
				'label' 	=> __( '  Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .price-card_price',
			]
        );

        $this->add_responsive_control(
			'price_subtitle_margin',
			[
				'label' 		=> __( '  Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]
        );
        $this->add_responsive_control(
			'price_subtitle_padding',
			[
				'label' 		=> __( '  Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
            <div class="row gy-30 justify-content-center">
				<?php foreach( $settings['price_list'] as $data ): 
					if(!empty($data['active_box'])){
						$active = 'active';
					}else{
						$active = '';
					}
				?>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="price-card style2 <?php echo esc_attr($active); ?>">
                        <span class="offer-tag"><?php echo esc_html($data['tag']); ?></span>
                        <div class="price-bg-shape">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['image']['url'] ),
							)); ?>
						</div>
                        <h3 class="price-card_title box-title">
							<?php echo esc_html($data['title']); ?>  
						</h3>
                        <div class="price-card_content">
                            <h4 class="price-card_price">
								<?php echo wp_kses_post($data['price']); ?>
                            </h4>
                            <p class="price-card_text"><?php echo esc_html($data['desc']); ?></p>
                            <div class="available-list">
								<?php echo wp_kses_post($data['features']); ?>
                            </div>
                        </div>
						<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn th_btn btn-fw"><?php echo esc_html($data['button_text']); ?></a>
                    </div>
                </div>
				<?php endforeach; ?>
			</div>


		<?php else: ?>
			<div class="row gy-4 justify-content-center">
				<?php foreach( $settings['price_list'] as $data ): 
					if(!empty($data['active_box'])){
						$active = 'active';
					}else{
						$active = '';
					}
				?>
				<div class="col-xl-4 col-md-6">
					<div class="price-card  <?php echo esc_attr($active); ?>"  data-bg-src="<?php echo esc_url( $data['image']['url'] ); ?>">
                        <h3 class="price-card_title box-title">
                            <?php echo esc_html($data['title']); ?> 
                        </h3>
                        <div class="price-card_content">
                            <h4 class="price-card_price">
                                <?php echo wp_kses_post($data['price']); ?> 
                            </h4>
                            <span class="offer-tag"><?php echo esc_html($data['tag']); ?></span>
                        </div>
                        <div class="available-list">
                            <?php echo wp_kses_post($data['features']); ?>
                        </div>
                        <div class="price-btn">
                            <a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn black-btn th_btn"><?php echo wp_kses_post($data['button_text']); ?></a>
                        </div>

					</div>
				</div>
				<?php endforeach; ?>
			</div>

        <?php endif; 

	}

}