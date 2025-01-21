<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class malen_Counterup extends Widget_Base {

	public function get_name() {
		return 'malencounterup';
	}

	public function get_title() {
		return __( 'Counter Up', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Counter Up', 'malen' ),
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

		$repeater = new Repeater();

		$repeater->add_control(
            'image',
            [
                'label'     => __( 'Image/Icon', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );

		$repeater->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'malen' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'malen' ),
			]
		);	
		
		$repeater->add_control(
			'counter_number_after',
			[
				'label'     => __( 'Counter Number After', 'malen' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '', 'malen' ),
			]
		);	

		$repeater->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'malen' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Project Completed', 'malen' ),
			]
		);

		$this->add_control(
			'counter_list',
			[
				'label' 		=> __( 'Counter', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_text' 		=> __( 'Counter One', 'malen' ),
					],
				],
			]
		);

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

        /*-----------------------------------------styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->start_controls_tabs(
			'style_tabs2'
		);

			$this->start_controls_tab(
				'style_normal_tab2',
				[
					'label' => esc_html__( 'Number', 'malen' ),
				]
			);

			$this->add_control(
				'overview_title_color',
				[
					'label' 		=> __( 'Color', 'malen' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-num'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'overview_title_typography',
					'label' 		=> __( 'Typography', 'malen' ),
					'selector' 	=> '{{WRAPPER}} .th-num',
				]
			);

			$this->add_responsive_control(
				'overview_title_margin',
				[
					'label' 		=> __( 'Margin', 'malen' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-num' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .th-num' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

			//--------------------secound--------------------//

			$this->start_controls_tab(
				'style_hover_tab2',
				[
					'label' => esc_html__( 'Title', 'malen' ),
				]
			);

			$this->add_control(
				'overview_content_color',
				[
					'label' 		=> __( 'Color', 'malen' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-title'	=> 'color: {{VALUE}}!important;',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name' 			=> 'overview_content_typography',
					'label' 		=> __( 'Typography', 'malen' ),
					'selector' 	=> '{{WRAPPER}} .th-title',
				]
			);

			$this->add_responsive_control(
				'overview_content_margin',
				[
					'label' 		=> __( 'Margin', 'malen' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			<div class="counter-sec style2">
				<?php  foreach( $settings['counter_list'] as $data ): ?>
                <div class="th-counterup style3">
                    <div class="inner">
                        <div class="icon">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['image']['url'] ),
								'class' => 'svgInject',
							)); ?>
                        </div>
                        <div class="content">
                            <h3 class="counter th-num"><span class="odometer" data-count="<?php echo esc_attr( $data['counter_number'] ) ?>">00</span>
                                <span class="counter-number"><?php echo esc_html( $data['counter_number_after'] ) ?></span>
                            </h3>
                            <p class="counter-card_text th-title"><?php echo wp_kses_post( $data['counter_text'] ) ?></p>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

		<?php else: ?>
			<div class="counter-sec bg-title">
				<?php  foreach( $settings['counter_list'] as $data ): ?>
                <div class="th-counterup">
                    <div class="inner">
                        <div class="icon">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['image']['url'] ),
								'class' => 'svgInject',
							)); ?>
                        </div>
                        <div class="content">
                            <h3 class="counter th-num"><span class="odometer" data-count="<?php echo esc_attr( $data['counter_number'] ) ?>">00</span>
                                <span class="counter-number"><?php echo esc_html( $data['counter_number_after'] ) ?></span>
                            </h3>
                            <p class="counter-card_text th-title"><?php echo wp_kses_post( $data['counter_text'] ) ?></p>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
		<?php endif;

	}

}