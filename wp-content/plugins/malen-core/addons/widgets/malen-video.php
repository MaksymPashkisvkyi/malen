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
 * Video Widget .
 *
 */
class malen_Video extends Widget_Base {

	public function get_name() {
		return 'malenvideo';
	}

	public function get_title() {
		return __( 'Video Box', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'video_section',
			[
				'label' 	=> __( 'video Box', 'malen' ),
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
					// '3' 		=> __( 'Style Three', 'malen' ),
				],
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
            ]
        );

		$this->add_control(
            'image2',
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
					'layout_style' => ['2'],
				]
            ]
        );

		$this->add_control(
			'video_link',
			[
				'label' 		=> esc_html__( 'Video URL', 'acadu' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'acadu' ),
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

		//-------------------------------------General styling-------------------------------------//
		$this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'general_bg',
			[
				'label' 		=> __( 'Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-bg' => 'background-color: {{VALUE}}!important',
				],
			]
		);

		$this->add_responsive_control(
			'general_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-bg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .th-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'contact_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'malen' ),
				'selector' => '{{WRAPPER}} .th-bg',
			]
		);
		
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>
        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="row gy-4">
				<div class="col-lg-6">
					<div class="page-img mb-0">
						<?php echo malen_img_tag( array(
							'url'  => esc_url( $settings['image']['url']  ),
						)); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="video-box2" data-bg-src="<?php echo esc_url( $settings['image2']['url'] ); ?>">
							<?php echo malen_img_tag( array(
								'url'  => esc_url( $settings['image2']['url']  ),
							)); ?>
						<a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="video-play-btn popup-video">
							<i class="fa-sharp fa-solid fa-play"></i></a>
					</div>
				</div>
			</div>

        <?php else: ?>
			
			<div class="video-box1">
				<?php echo malen_img_tag( array(
						'url'  => esc_url( $settings['image']['url']  ),
					)); ?>
				<a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="video-play-btn popup-video">
					<i class="fa-sharp fa-solid fa-play"></i></a>
			</div>

        <?php endif;

	}

}