<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class malen_Testimonial extends Widget_Base{

	public function get_name() {
		return 'malentestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'malen' ),
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
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
					'4' 		=> __( 'Style Four', 'malen' ),
				],
			]
		);

		$this->add_control(
			'arrow_id', [
				'label' 		=> __( 'Arrow ID', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'testiSlide1' , 'malen' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['4'],
				],
			]
        );

		$this->add_control(
			'shape_image',
			[
				'label' 		=> __( 'Shape Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'description'  => __( '' , 'malen' ),
				'condition'	=> [
					'layout_style' => ['1', '2'],
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'quote_image',
			[
				'label' 		=> __( 'Quote Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'description'  => __( 'This option for only style 1 & 2' , 'malen' ),
			]
		);

		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Vlademir Hilto' , 'malen' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'client_desig', [
				'label' 		=> __( 'Client Designation', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'IT Student' , 'malen' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '“Quickly maximize visionary solutions after mission critical action items productivate premium portals for impactful -services stinctively negotiate enabled niche markets via growth strategies”' , 'malen' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'advoker' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'advoker' ),
					'two' 		=> __( 'Two Star', 'advoker' ),
					'three' 	=> __( 'Three Star', 'advoker' ),
					'four' 		=> __( 'Four Star', 'advoker' ),
					'five' 	 	=> __( 'Five Star', 'advoker' ),
				],
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------


		/*-----------------------------------------Feedback styling------------------------------------*/
		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Feedback Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->start_controls_tabs(
			'style_tabs2'
		);

		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Nmae', 'malen' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-name'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .th-name',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .th-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//
		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Desig', 'malen' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .th-desig',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .th-desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------threth--------------------//
		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Feedback', 'malen' ),
			]
		);
		$this->add_control(
			'testi_feedback_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'testi_feedback_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .th-text',
			]
		);

        $this->add_responsive_control(
			'testi_feedback_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testi_feedback_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		?>
		<?php if( $settings['layout_style'] == '2' ): ?>
            <div class="row slider-shadow th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true">
				<?php foreach( $settings['slides'] as $data ) : ?>
				<div class="col-md-6 col-lg-4">
                    <div class="testi-item style2" data-bg-src="<?php echo esc_url( $settings['shape_image']['url'] ); ?>">
                        <div class="testi-item_wrapper">
                            <div class="testi-item_img">
								<?php  echo malen_img_tag( array(
										'url'	=> esc_url( $data['client_image']['url'] ),
									) ); ?>
                            </div>
                            <div class="testi-item_content">
                                <p class="testi-item_text"><?php echo wp_kses_post( $data['client_feedback'] ); ?></p>
                            </div>
                        </div>
                        <div class="testi-item_profile">
                            <div class="testi-quote">
								<?php  echo malen_img_tag( array(
									'url'	=> esc_url( $data['quote_image']['url'] ),
								) ); ?>
                            </div>
                            <div class="testi-item_info">
								<h3 class="testi-item_name th-name"><?php echo esc_html( $data['client_name'] ); ?></h3>
                                <span class="testi-item_desig th-desig"><?php echo esc_html( $data['client_desig'] ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
           
		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class=" slider-shadow th-carousel" id="testiSlide1" data-slide-show="1" data-fade="true" >
				<?php foreach( $settings['slides'] as $data ) : ?>
				<div>
					<div class="testi-box">
						<p class="testi-box_text th-text"><?php echo wp_kses_post( $data['client_feedback'] ); ?></p>
						<div class="testi-box_wrapper">
							<div class="testi-box_profile">
								<div class="testi-box_avater">
									<?php  echo malen_img_tag( array(
											'url'	=> esc_url( $data['client_image']['url'] ),
										) ); ?>
								</div>
								<div class="media-body">
									<h3 class="testi-box_name h6  th-name"><?php echo esc_html( $data['client_name'] ); ?></h3>
									<span class="testi-box_desig th-desig"><?php echo esc_html( $data['client_desig'] ); ?></span>
								</div>
							</div>
							<div class="testi-star">
								<?php 
									if( $data['client_rating'] == 'one' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}elseif( $data['client_rating'] == 'two' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}elseif( $data['client_rating'] == 'three' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}elseif( $data['client_rating'] == 'four' ){
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-regular fa-star"></i>';
									}else{
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
										echo '<i class="fa-solid fa-star"></i>';
									}
								?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="row testi-slide2 slider-shadow th-carousel" id="testiSlide1" data-slide-show="3" data-lg-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1">
				<?php foreach( $settings['slides'] as $data ) : ?>
                <div class="ol-md-6 col-lg-4">
                    <div class="testi-card style2">
                        <div class="testi-content">
                            <p class="testi-box_text"><?php echo wp_kses_post( $data['client_feedback'] ); ?></p>
                            <div class="testi-card_wrapp">
                                <div class="testi-card_line"></div>
                                <div class="star-icon">
									<?php 
										if( $data['client_rating'] == 'one' ){
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
										}elseif( $data['client_rating'] == 'two' ){
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
										}elseif( $data['client_rating'] == 'three' ){
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
										}elseif( $data['client_rating'] == 'four' ){
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-regular fa-star"></i></a>';
										}else{
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
											echo '<a href="#"><i class="fa-solid fa-star"></i></a>';
										}
									?>
                                </div>
                            </div>
                            <div class="testi-card_wrapper">
                                <div class="testimonial-author">
                                    <div class="testi-box_avater">
										<?php  echo malen_img_tag( array(
												'url'	=> esc_url( $data['client_image']['url'] ),
											) ); ?>
                                    </div>
                                    <div class="testimonial-author">
                                        <div class="testi-box_profile">
                                            <div class="media-body">
												<h3 class="testi-card_name th-name"><?php echo esc_html( $data['client_name'] ); ?></h3>
                                				<span class="testi-card_desig th-desig"><?php echo esc_html( $data['client_desig'] ); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testi-quote">
									<?php  echo malen_img_tag( array(
											'url'	=> esc_url( $data['quote_image']['url'] ),
										) ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 				<?php endforeach; ?>
            </div>
           
		<?php else: ?>
			<div class="row testi-slide slider-shadow th-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true">
				<?php foreach( $settings['slides'] as $data ) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="testi-item">
						<?php if(!empty($settings['shape_image']['url'])): ?>
                        <div class="testi-item_shape">
							<?php  echo malen_img_tag( array(
									'url'	=> esc_url( $settings['shape_image']['url'] ),
								) ); ?>
                        </div>
						<?php endif; ?>
                        <div class="testi-item_wrapper">
                            <div class="testi-item_img">
								<?php  echo malen_img_tag( array(
									'url'	=> esc_url( $data['client_image']['url'] ),
								) ); ?>
                            </div>
                            <div class="testi-item_content">
                                <p class="testi-item_text  th-text"><?php echo wp_kses_post( $data['client_feedback'] ); ?></p>
                                <div class="testi-item_profile">
                                    <div class="testi-item_info">
										<h3 class="testi-item_name th-name"><?php echo esc_html( $data['client_name'] ); ?></h3>
                                        <span class="testi-item_desig th-desig"><?php echo esc_html( $data['client_desig'] ); ?></span>
                                    </div>
                                    <div class="testi-quote">
										<?php  echo malen_img_tag( array(
											'url'	=> esc_url( $data['quote_image']['url'] ),
										) ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              	<?php endforeach; ?>
            </div>

		<?php endif;

	}

}