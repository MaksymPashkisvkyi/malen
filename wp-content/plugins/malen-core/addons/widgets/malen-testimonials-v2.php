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
class Mechon_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'mechontestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider V2', 'malen' );
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
			'testimonial_style',
			[
				'label' 		=> __( 'Testimonial Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'malen' ),
					'two' 			=> __( 'Style Two', 'malen' ),
					'three' 		=> __( 'Style Three', 'malen' ),
					'four' 		=> __( 'Style Four', 'malen' ),
				],
			]
		);

		 $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'malen' ),
                'condition' => [
                	'testimonial_style' => 'four'
                ]
			]
        );

		 $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'malen' ),
                'condition' => [
                	'testimonial_style' => 'four'
                ]
			]
        );

		//----------------------------feddback repeter start--------------------------------//

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
			'client_name', [
				'label' 		=> __( 'Client Name', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'malen' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Chef Leader' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'malen' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'malen' ),
					'two' 		=> __( 'Two Star', 'malen' ),
					'three' 	=> __( 'Three Star', 'malen' ),
					'four' 		=> __( 'Four Star', 'malen' ),
					'five' 	 	=> __( 'Five Star', 'malen' ),
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
						'client_name' 		=> __( 'Rubaida Kanom', 'malen' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'malen' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'malen' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'malen' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'malen' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'malen' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();


        //-------------------------------general settings-------------------------------//

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'feedback_bg_clr',
			[
				'label' 		=> __( 'Feedback Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi_box_body, .testi-block' => 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .testi_box_img::before, {{WRAPPER}}  .testi-block-area:after' => 'background-color: {{VALUE}}!important;',
				],
			]
		);
		$this->end_controls_section();

		  //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Section Title Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				 'condition' => [
                	'testimonial_style' => 'four'
                ]
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Section Title Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-title' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .sec-title',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Section Title Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Section Title Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();


        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'section_subtitle_style_section',
			[
				'label' => __( 'Section Subtitle Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				 'condition' => [
                	'testimonial_style' => 'four'
                ]
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Section Subtitle Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Section Subtitle Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .sub-title',
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Section Subtitle Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]
        );
        $this->add_responsive_control(
			'section_subtitle_padding',
			[
				'label' 		=> __( 'Section Subtitle Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

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
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Designation', 'malen' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} span'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} span',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------three--------------------//

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
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'testi_feedback_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'testi_feedback_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();




	}

	protected function render() {

		$settings = $this->get_settings_for_display();


		
		echo '<!-----------------------Start Testimonials Area----------------------->';
		if( $settings['testimonial_style'] == 'one' ){
			echo '<div class="testimonial-wrapper-1 arrow-wrap">';
				echo '<div class="row th-carousel" data-slide-show="3" data-md-slide-show="2" data-arrows="true">';
					foreach( $settings['slides'] as $singleslide ) {
		                echo '<div class="col-md-6 col-lg-4">';
		                    echo '<div class="testi-box-two">';
		                    	if( ! empty( $singleslide['client_image']['url'] ) ){
			                        echo '<div class="testi-box-two_img">';
		                                echo malen_img_tag( array(
											'url'	=> esc_url( $singleslide['client_image']['url'] ),
										) );
										echo '<div class="testi-box-two_icon"><i class="fas fa-quote-right"></i></div>';
		                            echo '</div>';
		                        }
		                        if( ! empty( $singleslide['client_feedback'] ) ) {
		                            echo '<p class="testi-box-two_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
		                        }
		                        echo '<div class="testi-box-two_info">';
		                        	if( ! empty( $singleslide['client_name'] ) ) {
			                            echo '<h3 class="testi-box-two_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
			                        }
			                        if( ! empty( $singleslide['client_designation'] ) ) {
			                            echo '<span class="testi-box-two_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            }

	                
	            echo '</div>';
            echo '</div>';
		}elseif( $settings['testimonial_style'] == 'three' ){
			?>
       		<div class="row th-carousel" data-slide-show="2" data-md-slide-show="1" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true" data-sm-dots="true" data-xs-dots="true">
				<?php foreach( $settings['slides'] as $singleslide ): ?>
                <div class="col-md-6 col-lg-4"> 
                    <div class="testi-block">
                        <div class="testi-block_profile">
							<?php if( ! empty( $singleslide['client_image'] ) ): ?>
                            <div class="testi-block_img">
                                <?php 
								echo malen_img_tag( array(
									'url'	=> esc_url( $singleslide['client_image']['url'] ),
								) );
								?>
                                <div class="testi-block_icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
							<?php endif; ?>
                            <div class="testi-block_info">
								<?php if( ! empty( $singleslide['client_name'] ) ): ?>
                                <h3 class="testi-block_name"><?php echo wp_kses_post( $singleslide['client_name'] ) ?></h3>
								<?php endif; ?>
								<?php if( ! empty( $singleslide['client_designation'] ) ): ?>
                                <span class="testi-block_desig"><?php echo wp_kses_post( $singleslide['client_designation'] ) ?></span>
								<?php endif; ?>
                            </div>
                        </div>
						<?php if( ! empty( $singleslide['client_feedback'] ) ): ?>
                        	<p class="testi-block_text"><?php echo wp_kses_post( $singleslide['client_feedback'] ) ?></p>
						<?php endif; ?>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
		<?php
		}elseif( $settings['testimonial_style'] == 'four' ){
		?>
		  <div class="testi-block-two-area">
            <div class="title-area mb-40 text-md-start text-center">
            	<?php if( ! empty( $settings['section_subtitle'] ) ): ?>
                	<span class="sub-title"><?php echo wp_kses_post( $settings['section_subtitle'] ); ?></span>
                <?php endif; ?>
                <?php if( ! empty( $settings['section_title'] ) ): ?>
                	<h2 class="sec-title"><?php echo wp_kses_post( $settings['section_title'] ); ?></h2>
                <?php endif; ?>
            </div>
            <div class="testi-block-two-slide slider-shadow th-carousel" data-slide-show="1" data-md-slide-show="1">
            	<?php foreach( $settings['slides'] as $singleslide ): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="testi-block-two">
                        <div class="testi-block-two_review">
                            <?php 
                            if( $singleslide['client_rating'] == 'one' ){
			                	echo '<i class="fas fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
			                }elseif( $singleslide['client_rating'] == 'two' ){
			                	echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
			                }elseif( $singleslide['client_rating'] == 'three' ){
			                	echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
			                }elseif( $singleslide['client_rating'] == 'four' ){
			                	echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="far fa-star"></i>';
			                }else{
			                	echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
				                echo '<i class="fas fa-star"></i>';
			                }  
                             ?>
                        </div>
                        <?php if( ! empty( $singleslide['client_feedback'] ) ): ?>
                        	<p class="testi-block-two_text"><?php echo wp_kses_post( $singleslide['client_feedback'] ) ?></p>
						<?php endif; ?>

                        <div class="testi-block-two_profile">
                            <div class="testi-block-two_img">
                                <?php echo malen_img_tag( array(
									'url'	=> esc_url( $singleslide['client_image']['url'] ),
								) ); ?>

                                <div class="testi-block-two_icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                            <div class="testi-block-two_info">
                            	<?php if( ! empty( $singleslide['client_name'] ) ): ?>
                                	<h3 class="testi-block-two_name"><?php echo wp_kses_post( $singleslide['client_name'] ) ?></h3>
								<?php endif; ?>
								<?php if( ! empty( $singleslide['client_designation'] ) ): ?>
                                	<span class="testi-block-two_desig"><?php echo wp_kses_post( $singleslide['client_designation'] ) ?></span>
								<?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
           		<?php endforeach; ?>
            </div>
            <div class="icon-box">
                <button data-slick-prev=".testi-block-two-slide" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                <button data-slick-next=".testi-block-two-slide" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
            </div>
        </div>
		<?php
		}else{
			echo '<div class="row justify-content-center">';
                echo '<div class="col-xl-10">';
                    echo '<div class="testi-card-2-slide th-carousel" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-fade="true" data-slide-show="1">';
                    	foreach( $settings['slides'] as $singleslide ) {
                    		echo '<div>';
	                            echo '<div class="testi-card-2">';
	                            	if( ! empty( $singleslide['client_image']['url'] ) ){
		                                echo '<div class="testi-card-2_img">';
		                                    echo malen_img_tag( array(
												'url'	=> esc_url( $singleslide['client_image']['url'] ),
											) );
		                                echo '</div>';
		                            }

	                                echo '<div class="testi-card-2_content">';
	                                	if( ! empty( $singleslide['client_feedback'] ) ) {
		                                    echo '<p class="testi-card-2_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
		                                }

	                                    if( ! empty( $singleslide['client_name'] ) ) {
				                            echo '<h3 class="testi-card-2_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
				                        }
	                                    if( ! empty( $singleslide['client_designation'] ) ) {
				                            echo '<span class="testi-card-2_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
				                        }
	                                    echo '<div class="testi-card-2_review">';
	                                		if( $singleslide['client_rating'] == 'one' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }elseif( $singleslide['client_rating'] == 'two' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }elseif( $singleslide['client_rating'] == 'three' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }elseif( $singleslide['client_rating'] == 'four' ){
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="far fa-star"></i>';
							                }else{
							                	echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
								                echo '<i class="fas fa-star"></i>';
							                }  
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
                            echo '</div>';
                        }

                    echo '</div>';
                    echo '<div class="testi-card-2-tab" data-asnavfor=".testi-card-2-slide">';
						$i = 0;
						foreach ($settings['slides'] as $singleslide) {
							$i++;
						
							$active_class = ($i == 1) ? ' active' : ''; 
						
							echo '<button class="tab-btn' . esc_attr($active_class) . '" type="button">';
							echo malen_img_tag(array(
								'url' => esc_url($singleslide['client_image']['url']),
							));
							echo '</button>';
						}

                    echo '</div>';
                echo '</div>';
            echo '</div>';
		}
		echo '<!-----------------------End Testimonials Area----------------------->';
	}

}