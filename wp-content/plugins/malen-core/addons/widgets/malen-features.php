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
 * Feature Widget .
 *
 */
class Malen_Features extends Widget_Base {

	public function get_name() {
		return 'malenfeatures';
	}

	public function get_title() {
		return __( 'Features', 'malen' );
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
				'label'     => __( 'Features', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Features Style', 'malen' ),
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

		$this->add_control(
			'image',
			[
				'label'     => __( 'Shape', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'condition'	=> [
					'layout_style' => ['3'],
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_icon',
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
			'feature_shape',
			[
				'label'     => __( 'Shape Icon', 'malen' ),
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
			'feature_title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater->add_control(
			'feature_content',
            [
				'label'         => __( 'Content', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Content' , 'malen' ),
				'label_block'   => true,
				'rows' => '4'
			]
		);

		$this->add_control(
			'feature_list',
			[
				'label' 		=> __( 'Feature Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'feature_title' 		=> __( 'Quality parts & Equipment', 'malen' ),
					],
				],
			]
		);

		$this->add_control(
			'star',
			[
				'label' 	=> __( 'Star', 'malen' ),
				'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default'  	=> __( '', 'malen' ), 
				'condition'	=> [
					'layout_style' => ['3'],
				]
			]
        );
		$this->add_control(
			'content',
			[
				'label' 	=> __( 'Content', 'malen' ),
				'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default'  	=> __( 'We’ve more then <span class="odometer" data-count="2356">00</span> + customer satisfied with
				our services', 'malen' ),
				'condition'	=> [
					'layout_style' => ['3'],
				]
			]
        );

		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Button Text', 'malen' ),
				'condition'	=> [
					'layout_style' => ['3'],
				]
			]
        );

        $this->add_control(
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
				'condition'	=> [
					'layout_style' => ['3'],
				]
			]
		);
		
        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------------------Genearl styling-------------------------------------//
        $this->start_controls_section(
			'general_section',
			[
				'label' => __( ' General Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'general_bg',
			[
				'label' 	=> __( 'Background', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .th-wrap' => 'background-color: {{VALUE}}!important;',
                ],
			]
        );	

		$this->add_control(
			'general_h_bg',
			[
				'label' 	=> __( 'Hover Background', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .th-wrap:before' => 'background-color: {{VALUE}}!important;',
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
					'{{WRAPPER}} .th-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

		//---------------------------------------Title Style---------------------------------------//
		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
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
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'malen' ),
				'selector' 	=> '{{WRAPPER}} .th-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
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
				'label' 		=> __( 'Padding', 'malen' ),
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


	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>

        <?php if( $settings['layout_style'] == '3' ): ?>
			<div class="feature-content" data-bg-src="<?php echo esc_url($settings['image']['url']); ?>">
				<div class="row gy-4 mb-30 justify-content-center">
					<?php foreach( $settings['feature_list'] as $data ): ?>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="feature-item-content">
							<div class="feature-item_shape">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['feature_shape']['url']  ),
								)); ?>
							</div>
							<div class="feature-item_icon">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['feature_icon']['url']  ),
								)); ?>
							</div>
							<div class="media-body">
								<h3 class="feature-item_title th-title"><?php echo esc_html( $data['feature_title'] ); ?></h3>
                        		<p class="feature-item_text th-desc"><?php echo esc_html( $data['feature_content'] );  ?></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="feature-counter">
					<h3 class="counter-title">
						<?php echo wp_kses_post($settings['star']) ?>
						<?php echo wp_kses_post($settings['content']) ?>
						<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>"><?php echo wp_kses_post($settings['button_text']); ?></a>
					</h3>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="row gy-4 mb-30 justify-content-center">
				<?php foreach( $settings['feature_list'] as $data ): ?>
				<div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6">
					<div class="feature-item-content style2">
						<div class="feature-item_shape">
							<?php echo malen_img_tag( array(
                                'url'   => esc_url( $data['feature_shape']['url']  ),
                            )); ?>
						</div>
						<div class="feature-item_wrapper">
							<div class="feature-item_icon">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['feature_icon']['url']  ),
								)); ?>
							</div>
							<div class="media-body">
								<h3 class="feature-item_title"><?php echo esc_html( $data['feature_title'] ); ?></h3>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

    	<?php else: 
			if( $settings['layout_style'] == '2' ){
				$class = 'style2';
				$icon = '';
			}else{
				$class = '';
				$icon = 'style1';
			}
			?>
            <div class="feature-wrap <?php echo esc_attr($class); ?>">
                <?php foreach( $settings['feature_list'] as $data ): ?>
                <div class="feature-item-content th-wrap <?php echo esc_attr($icon); ?>">
                    <div class="feature-item_shape">
                        <?php echo malen_img_tag( array(
                                'url'   => esc_url( $data['feature_shape']['url']  ),
                            )); ?>
                    </div>
                    <div class="feature-item_icon">
                        <?php echo malen_img_tag( array(
                                'url'   => esc_url( $data['feature_icon']['url']  ),
                            )); ?>
                    </div>
                    <div class="media-body">
                        <h3 class="feature-item_title th-title"><?php echo esc_html( $data['feature_title'] ); ?></h3>
                        <p class="feature-item_text th-desc"><?php echo esc_html( $data['feature_content'] );  ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
		
      <?php endif; 

	}

}