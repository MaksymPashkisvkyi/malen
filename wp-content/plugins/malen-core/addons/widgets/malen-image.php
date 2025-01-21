<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class malen_Image extends Widget_Base {

	public function get_name() {
		return 'malenimage';
	}

	public function get_title() {
		return __( 'Image', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Image', 'malen' ),
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
			'image2',
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
			'image3',
			[
				'label' 		=> __( 'Choose Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);   
		
		$this->add_control(
			'title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 2,
				'condition' => [
					'layout_style' => ['1']
				]
			]
		);

		$this->add_control(
			'year',
            [
				'label'         => __( 'Number of Year', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '25' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 2,
				'condition' => [
					'layout_style' => ['1', '4']
				]
			]
		);

		$this->add_control(
			'after_text',
            [
				'label'         => __( 'After Text', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '+' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 2,
				'condition' => [
					'layout_style' => ['1', '4']
				]
			]
		);

		$this->add_control(
			'desc',
            [
				'label'         => __( 'Description', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Description' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 3,
				'condition' => [
					'layout_style' => ['1', '4']
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
				'label' 		=> __( ' Color', 'tayde' ),
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
				'label' 	=> __( ' Typography', 'tayde' ),
				'selector' 	=> '{{WRAPPER}} .th-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( ' Margin', 'tayde' ),
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
				'label' 		=> __( ' Padding', 'tayde' ),
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

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>

		<?php if( $settings['layout_style'] == '2' ): ?>
			<div class="img-box3">
				<div class="img2">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
							'class' => 'tilt-active',
						)); ?>
				</div>
				<div class="img3 movingX">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image2']['url'] ),
							'class' => 'tilt-active',
						)); ?>
				</div>
				<div class="about-shape jump">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image3']['url'] ),
						)); ?>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="img-box4 pe-xl-5">
				<div class="img4">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
							'class' => 'tilt-active',
						)); ?>
				</div>
				<div class="about3-dot shape-mockup jump" data-bottom="-10px" data-left="20%">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image2']['url'] ),
						)); ?>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="feature-box">
				<div class="img">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
							'class' => 'tilt-active',
						)); ?>
				</div>
				<div class="feature-counter-wrapp">
					<div class="feature-counter bounce-slide">
						<h2 class="counter-card_number"><span class="counter-number"><?php echo esc_html($settings['year']); ?></span><?php echo esc_html($settings['after_text']); ?></h2>
						<p class="counter-card_text"><?php echo esc_html($settings['desc']); ?></p>
						<div class="feature-shape">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $settings['image2']['url'] ),
							)); ?>
						</div>
					</div>
				</div>
			</div>

		<?php else: ?>
			<div class="img-box3 pe-xl-5">
				<div class="img1">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
							'class' => 'tilt-active',
						)); ?>
				</div>
				<div class="vehicle-repair movingX">
						<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image2']['url'] ),
						)); ?>
					<span class="title"><?php echo esc_html($settings['title']); ?></span>
				</div>
				<div class="about-counter">
					<h3 class="counter-title th-title"><span class="counter-number"><?php echo esc_html($settings['year']); ?></span><?php echo esc_html($settings['after_text']); ?></h3>
					<span class="counter-text th-desc"><?php echo esc_html($settings['desc']); ?></span>
					<div class="line-animation">
						<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image3']['url'] ),
						)); ?>
					</div>
				</div>
			</div>
      
      <?php endif;
	}

}