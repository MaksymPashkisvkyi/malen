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
 * Feature Box Widget .
 *
 */
class Mechon_Feature_Box extends Widget_Base {

	public function get_name() {
		return 'mechonfeaturebox';
	}

	public function get_title() {
		return __( 'Feature V2', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label' 	=> __( 'Feature', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'feature_style',
			[
				'label' 	=> __( 'Feature Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
					'4' 		=> __( 'Style Four', 'malen' ),
					'5' 		=> __( 'Style Five', 'malen' ),
					'6' 		=> __( 'Style Six', 'malen' ),
				],
			]
		);

        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'feature_style' => ['1','2' ] ],
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Background Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'feature_style' => ['2' ] ],
			]
		);
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'feature_style!' => ['4', '6'] ],
			]
        );
        $this->add_control(
			'counter',
			[
				'label'     => __( 'Counter', 'malen' ),
                'type'      => Controls_Manager::TEXT,
                'condition'		=> [ 'feature_style' => ['3' ] ],
			]
        );
        $this->add_control(
			'content',
			[
				'label'     => __( 'Content', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'feature_style' => ['3' ] ],
			]
        );	
        $this->add_control(
			'contact_form',
			[
				'label'     => __( 'Contact Form Shortcode', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'feature_style' => ['5'] ],
			]
        );


        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
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
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'steps',
			[
				'label' 		=> __( 'Steps', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'malen' ),
					],
				],
				'condition'		=> [ 'feature_style' => ['4' , '6'] ],
			]
		);

		$repeater2 = new Repeater();

		 $repeater2->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater2->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );		
        $repeater2->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater2->add_control(
			'number',
			[
				'label'     => __( 'Number', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
       
        $this->add_control(
			'steps2',
			[
				'label' 		=> __( 'Steps', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'malen' ),
					],
				],
				'condition'		=> [ 'feature_style' => ['5' ] ],
			]
		);

        $this->end_controls_section();

        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'feature_style!' => ['4' ] ],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( 'Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .contact-media,{{WRAPPER}} .feature-block::before, {{WRAPPER}} .our-feature, {{WRAPPER}} .appointment-form-2' => 'background-color: {{VALUE}}!important',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------Form Title styling------------------------------------*/

		$this->start_controls_section(
			'button_style_section2',
			[
				'label' 	=> __( 'Form Title Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'feature_style' => ['5' ] ],
			]
        );
		$this->add_control(
			'overview_content_color2',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .title-area .sec-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography2',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} .title-area .sec-title',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin2',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-area .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding2',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-area .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Title Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'feature_style!' => ['4' ] ],
			]
        );
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

         /*-----------------------------------------subtitle styling------------------------------------*/

		$this->start_controls_section(
			'subtitle_style_section',
			[
				'label' 	=> __( 'Subtitle Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'feature_style' => ['5', '6' ] ],
			]
        );
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .our-feature_text, {{WRAPPER}} .feature-card_subtitle'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'subtitle_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} .our-feature_text, {{WRAPPER}} .feature-card_subtitle',
			]
		);

        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .our-feature_text, {{WRAPPER}} .feature-card_subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .our-feature_text, {{WRAPPER}} .feature-card_subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['feature_style'] == '1' ){
	        echo '<div class="feature-box">';
	        	if(!empty($settings['image']['url'])){
		            echo '<div class="feature-box_icon">';
		                echo malen_img_tag( array(
		                    'url'   => esc_url( $settings['image']['url']  ),
		                ));
		            echo '</div>';
		        }
		        if(!empty($settings['title'])){
		            echo '<h3 class="feature-box_title">'.esc_html($settings['title']).'</h3>';
		        }
	        echo '</div>';
	    }elseif( $settings['feature_style'] == '2' ){
	    	echo '<div class="feature-block" data-bg-src="'.esc_url( $settings['bg_image']['url']  ).'">';
	    		if(!empty($settings['image']['url'])){
		            echo '<div class="feature-block_icon">';
		                echo malen_img_tag( array(
		                    'url'   => esc_url( $settings['image']['url']  ),
		                ));
		            echo '</div>';
		        }
		        if(!empty($settings['title'])){
	                echo '<h3 class="feature-block_title">'.esc_html($settings['title']).'</h3>';
	            }
            echo '</div>';
	    }elseif( $settings['feature_style'] == '3' ){
	    	echo '<div class="feature-media">';
	    		if(!empty($settings['counter'])){
	                echo '<div class="feature-media_num">'.esc_html($settings['counter']).'</div>';
	            }
                echo '<div class="feature-media_content">';
                	if(!empty($settings['title'])){
	                    echo '<h3 class="feature-media_title">'.esc_html($settings['title']).'</h3>';
	                }
	                if(!empty($settings['content'])){
	                    echo '<p class="feature-media_text">'.esc_html($settings['content']).'</p>';
	                }
                echo '</div>';
            echo '</div>';
	    }elseif( $settings['feature_style'] == '4' ){
	    	echo '<div class="service-feature-wrap">';
                foreach( $settings['steps'] as $data ) {            
	                echo '<div class="service-feature">';
	                	if( ! empty( $data['image']['url'] ) ){
		                    echo '<div class="service-feature_icon">';
		                        echo malen_img_tag( array(
									'url'   => esc_url( $data['image']['url'] ),
								) );
		                    echo '</div>';
		                }

	                    echo '<div class="service-feature_content">';
	                    	if( ! empty( $data['title'] ) ){
		                        echo '<h4 class="service-feature_title">'.esc_html( $data['title'] ).'</h4>';
		                    }
		                    if( ! empty( $data['content'] ) ){
		                        echo '<p class="service-feature_text">'.esc_html( $data['content'] ).'</p>';
		                    }
	                    echo '</div>';

	                echo '</div>';
	            }
                
            echo '</div>';
	    }elseif( $settings['feature_style'] == '5' ){
	    ?>
	     <section class="position-relative">
	        <div class="row gx-0 th-carousel" data-slide-show="3" data-md-slide-show="2">
	      		<?php foreach( $settings['steps2'] as $data ): ?>
	            <div class="col-lg-4 col-md-6">
	                <div class="feature-card">
	                	<?php if( ! empty( $data['image']['url'] ) ): ?>
	                    <div class="feature-card_icon">
	                        <?php  echo malen_img_tag( array(
									'url'   => esc_url( $data['image']['url'] ),
								) ); ?>
	                    </div>
	                	<?php endif; ?>
	                    <div class="media-body">
	                    	<?php if( ! empty( $data['subtitle'] ) ): ?>
	                        	<span class="feature-card_subtitle"><?php echo esc_html( $data['subtitle'] ); ?></span>
	                        <?php endif; ?>
	                        <?php if( ! empty( $data['title'] ) ): ?>
	                        	<h3 class="feature-card_title"><?php echo esc_html( $data['title'] ); ?></h3>
	                        <?php endif; ?>
	                    </div>
	                    <?php if( ! empty( $data['number'] ) ): ?>
	                    	<div class="feature-card_number"><?php echo esc_html( $data['number'] ); ?></div>
	                    <?php endif; ?>
	                </div>
	            </div>
	        	<?php endforeach; ?>
	        </div>
	        <?php if( ! empty( $settings['contact_form'] ) ): ?>
	        <div class="appointment-form-2 ajax-contact">
	        	<?php if( ! empty( $settings['title'] ) ): ?>
	            <div class="title-area mb-40 text-xl-start text-center">
	                <h2 class="sec-title"><?php echo esc_html( $settings['title'] ); ?></h2>
	            </div>
	            <?php endif; ?>
	            <?php
	                echo do_shortcode($settings['contact_form']);
	            ?>
	        </div>
	        <?php endif; ?>
	    </section>
	    <?php

	    }else{
    	?>
		<div class="our-feature-wrap">
            <?php foreach( $settings['steps'] as $data ): ?>
            <div class="our-feature">
            	<?php if( ! empty( $data['image']['url'] ) ): ?>
	                <div class="our-feature_icon">
	                    <?php  echo malen_img_tag( array(
								'url'   => esc_url( $data['image']['url'] ),
							) ); ?>
	                </div>
                <?php endif; ?>
                <div class="our-feature_content">
                	<?php if( ! empty( $data['title'] ) ): ?>
                    	<h3 class="our-feature_title"><?php echo esc_html( $data['title'] ); ?></h3>
                    <?php endif; ?>
                    <?php if( ! empty( $data['content'] ) ): ?>
                    	<p class="our-feature_text"><?php echo esc_html( $data['content'] ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    	<?php
	    }
	}

}