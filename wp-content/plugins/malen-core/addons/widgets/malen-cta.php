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
 * CTA Widget .
 *
 */
class malen_Cta extends Widget_Base {

	public function get_name() {
		return 'malencta';
	}

	public function get_title() {
		return __( 'CTA', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {


		 $this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'CTA', 'malen' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
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
					'2'  		=> __( 'Style Two', 'malen' ),									
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => __( 'Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
			]
		);

        $this->add_control(
			'image2',
			[
				'label'     => __( 'Image 2', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'condition' => [
					'layout_style' => ['1']
				]
			]
		);

		$this->add_control(
			'title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'title here' , 'malen' ),
				'label_block'   => true,
				'rows' => '2',
			]
		);
        
		$this->add_control(
			'content',
            [
				'label'         => __( 'Content', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Content here' , 'malen' ),
				'label_block'   => true,
				'rows' => '4',
				'condition' => [
					'layout_style' => ['1']
				]
			]
		);
    
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'tayde' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Button Text', 'tayde' ),
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'tayde' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'tayde' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
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
			'general_bg',
			[
				'label'     => __( 'Background', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .th-bg' => 'background-color: {{VALUE}}!important',
				],		
			]
		);

		$this->end_controls_section();

		//-------------------------------------Title styling-------------------------------------//
        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Title Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}}  .th-title',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}}  .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}}  .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

        //-------------------------------------Content styling-------------------------------------//
        $this->start_controls_section(
			'section_desc_style_section',
			[
				'label' => __( 'Content Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => ['1']
				]
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_desc_typography',
				'label' 	=> __( 'Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-desc',
			]
        );

        $this->add_responsive_control(
			'section_desc_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_desc_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after, {{WRAPPER}} .th-btn:hover' => 'background-color:{{VALUE}} !important',
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
		<section class="bg-theme th-bg"  data-bg-src="<?php echo esc_url( $settings['image']['url']); ?>">
			<div class="container pt-30 pb-30">
				<div class="row justify-content-center align-item-center">
					<div class="col-lg-auto">
						<h2 class="sec-title cta-title th-title"><?php echo esc_html( $settings['title'] ); ?></h2>
					</div>
					<div class="col-lg-auto mt-xl-0">
						<div class="btn-group style5">
							<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="cta-btn th_btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>
			
    <?php else: ?>
		<section class="cta-sec bg-theme th-bg" data-bg-src="<?php echo esc_url( $settings['image']['url']); ?>">
			<div class="cta-thumb shape-mockup d-lg-block d-none" data-top="0" data-left="0">
				<?php echo malen_img_tag( array(
					'url'   => esc_url( $settings['image2']['url']  ),
				)); ?>
			</div>
			<div class="container">
				<div class="row justify-content-end align-items-center">
					<div class="col-xxl-6 col-xl-4 col-lg-8">
						<div class="title-area mb-0">
							<h2 class="cta-title2 text-white th-title"><?php echo esc_html( $settings['title'] ); ?></h2>
							<p class="cta-text mb-0 text-white th-desc"><?php echo esc_html( $settings['content'] ); ?></p>
						</div>
					</div>
					<div class="col-xxl-2 col-xl-3 col-lg-4 text-md-end">
						<div class="btn-group d-flex justify-content-center justify-content-lg-end style6">
							<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn th_btn white-btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endif;

	}

}