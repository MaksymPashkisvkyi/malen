<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class Malen_Faq extends Widget_Base {

	public function get_name() {
		return 'malenfaq';
	}

	public function get_title() {
		return __( 'Faq', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'malen' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
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
					'2'  		=> __( 'Style Two', 'malen' ),
					'3'  		=> __( 'Style Three', 'malen' ),
				],
			]
		);

        $this->add_control(
			'faq_id',
			[
				'label' 	=> __( 'Faq ID', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '1', 'malen' )
			]
        );

		$this->add_control(
            'bg',
            [
                'label'     => __( 'background', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'layout_style' => ['1'],
				]
            ]
        );

		$this->add_control(
			'subtitle', [
				'label' 		=> __( 'Sub Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Subtitle here' , 'malen' ),
				'label_block' 	=> true,
				'separator' => 'before',
				'condition'	=> [
					'layout_style' => ['1'],
				]
			]
        );

        $this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Title here' , 'malen' ),
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['1'],
				]
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Our Principles', 'malen' )
			]
        );

        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'malen' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'The time it takes to paint a car repair depends on various factors, such as the extent of damage, the size of the area to be painted, the type of paint used', 'malen' )
			]
        );

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'Our Principles', 'malen' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['1', '2'],
				]
			]
		);

		$repeater2 = new Repeater();

        $repeater2->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Our Principles', 'malen' )
			]
        );

        $repeater2->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'malen' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'The time it takes to paint a car repair depends on various factors, such as the extent of damage, the size of the area to be painted, the type of paint used', 'malen' )
			]
        );

		$repeater2->add_control(
            'image',
            [
                'label'     => __( 'Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );

		$repeater2->add_control(
			'video_link',
			[
				'label' 		=> esc_html__( 'Video URL', 'malen' ),
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
			'faq_repeater2',
			[
				'label' 		=> __( 'Faq', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'Our Principles', 'malen' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['3'],
				]
			]
		);

		$this->add_control(
            'image',
            [
                'label'     => __( 'Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'layout_style' => ['1'],
				]
            ]
        );

		$this->add_control(
			'video_link',
			[
				'label' 		=> esc_html__( 'Video URL', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> [
					'layout_style' => ['1'],
				]
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

        //-------------------------------------Faq styling-------------------------------------//
        $this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Question Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button, {{WRAPPER}} .accordion-button:after' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'faq_question_active_color',
			[
				'label' 	=> __( 'Active Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button:not(.collapsed), {{WRAPPER}} .accordion-button:not(.collapsed):after' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'faq_style_section2',
			[
				'label' => __( 'Faq Answer Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'faq_answer_color2',
			[
				'label' 		=> __( 'Content Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography2',
				'label' 	=> __( 'Content Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin2',
			[
				'label' 		=> __( 'Content Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Answer Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        ?>
        <?php if( $settings['layout_style'] == '2' ): ?>
		<div class="accordion-area accordion" id="faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
			<?php 
			$x = 0;
			$n = 1;
            foreach( $settings['faq_repeater'] as $single_data ):
            	$unique_id = uniqid();
            	$x++;
            	$n++;
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}
		 	 ?>
            <div class="accordion-card">
            	<?php if( ! empty( $single_data['faq_question'] ) ): ?>
                <div class="accordion-header" id="collapse-item-<?php echo esc_attr( $unique_id ); ?>">
                    <button class="accordion-button <?php echo esc_attr( $collesed ); ?>" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-<?php echo esc_attr( $unique_id ); ?>" aria-expanded="<?php echo esc_attr( $ariaexpanded ); ?>" aria-controls="collapse-<?php echo esc_attr( $unique_id ); ?>"><?php echo wp_kses_post($single_data['faq_question']); ?></button>
                </div>
                <?php endif; ?>
                <?php if( ! empty( $single_data['faq_answer'] ) ): ?>
                <div id="collapse-<?php echo esc_attr( $unique_id ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $class ); ?>"
                    aria-labelledby="collapse-item-<?php echo esc_attr( $unique_id ); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
                    <div class="accordion-body">
						<?php echo wp_kses_post($single_data['faq_answer']); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
		<div class="accordion-area accordion" id="faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
			<?php 
			$x = 0;
			$n = 1;
            foreach( $settings['faq_repeater2'] as $single_data ):
            	$unique_id = uniqid();
            	$x++;
            	$n++;
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}
		 	 ?>
            <div class="accordion-card">
            	<?php if( ! empty( $single_data['faq_question'] ) ): ?>
                <div class="accordion-header" id="collapse-item-<?php echo esc_attr( $unique_id ); ?>">
                    <button class="accordion-button <?php echo esc_attr( $collesed ); ?>" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-<?php echo esc_attr( $unique_id ); ?>" aria-expanded="<?php echo esc_attr( $ariaexpanded ); ?>" aria-controls="collapse-<?php echo esc_attr( $unique_id ); ?>"><?php echo wp_kses_post($single_data['faq_question']); ?></button>
                </div>
                <?php endif; ?>
                <?php if( ! empty( $single_data['faq_answer'] ) ): ?>
                <div id="collapse-<?php echo esc_attr( $unique_id ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $class ); ?>"
                    aria-labelledby="collapse-item-<?php echo esc_attr( $unique_id ); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
                    <div class="accordion-body">
						<?php echo wp_kses_post($single_data['faq_answer']); ?>
						<div class="videoWrap">
							<video width="100%" controls preload poster=<?php echo esc_url($single_data['image']['url']); ?>>
								<source src="<?php echo esc_url( $single_data['video_link']['url'] ); ?>">
							</video>
						</div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

		<?php else: ?>
			<div class="faq-sec overflow-hidden bg-smoke2" data-bg-src="<?php echo esc_url($settings['bg']['url']); ?>">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xl-6">
							<div class="accordion-area accordion" id="faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
								<div class="title-area text-center text-xl-start mb-30">
									<span class="sub-title"><?php echo wp_kses_post($settings['subtitle']) ?></span>
									<h2 class="sec-title"><?php echo wp_kses_post($settings['title']) ?></h2>
								</div>

								<?php 
								$x = 0;
								$n = 1;
								foreach( $settings['faq_repeater'] as $single_data ):
									$unique_id = uniqid();
									$x++;
									$n++;
									if( $x == '1' ){
										$ariaexpanded 	= 'true';
										$class 			= 'show';
										$collesed 		= '';
										$is_active 		= 'active';
									}else{
										$ariaexpanded 	= 'false';
										$class 			= '';
										$collesed 		= 'collapsed';
										$is_active 		= '';
									}
								?>
								<div class="accordion-card style2 <?php echo esc_attr($is_active); ?>">
									<?php if( ! empty( $single_data['faq_question'] ) ): ?>
									<div class="accordion-header" id="collapse-item-<?php echo esc_attr( $unique_id ); ?>">
										<button class="accordion-button <?php echo esc_attr( $collesed ); ?>" type="button" data-bs-toggle="collapse"
											data-bs-target="#collapse-<?php echo esc_attr( $unique_id ); ?>" aria-expanded="<?php echo esc_attr( $ariaexpanded ); ?>" aria-controls="collapse-<?php echo esc_attr( $unique_id ); ?>"><?php echo wp_kses_post($single_data['faq_question']); ?></button>
									</div>
									<?php endif; ?>
									<?php if( ! empty( $single_data['faq_answer'] ) ): ?>
									<div id="collapse-<?php echo esc_attr( $unique_id ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $class ); ?>"
										aria-labelledby="collapse-item-<?php echo esc_attr( $unique_id ); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
										<div class="accordion-body">
											<?php echo wp_kses_post($single_data['faq_answer']); ?>
										</div>
									</div>
									<?php endif; ?>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="video-box1">
								<?php echo malen_img_tag( array(
										'url'  => esc_url( $settings['image']['url']  ),
									)); ?>
								<a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="video-play-btn popup-video">
									<i class="fa-sharp fa-solid fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

        <?php endif;

	}
}