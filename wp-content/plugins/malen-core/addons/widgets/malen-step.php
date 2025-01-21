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
 * Step Widget .
 *
 */
class Malen_Step extends Widget_Base {

	public function get_name() {
		return 'malenstep';
	}

	public function get_title() {
		return __( 'Step/Process', 'malen' );
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
				'label'		 	=> __( 'Steps', 'malen' ),
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
				],
			]
		);

		$this->add_control(
            'line',
            [
                'label'     => __( 'Line', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );

		$repeater = new Repeater();

		$repeater->add_control(
            'image',
            [
                'label'     => __( 'Image / Icon', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );

        $repeater->add_control(
			'number',
			[
				'label' 	=> __( 'Number', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '01', 'malen' )
			]
        );

		$repeater->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Online Quote', 'malen' )
			]
        );

		$repeater->add_control(
			'desc',
			[
				'label' 	=> __( 'Description', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default'  	=> __( 'Description here', 'malen' )
			]
        );

		$this->add_control(
			'info_lists',
			[
				'label' 		=> __( 'Info Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title'    => __( 'Online Quote', 'malen' ),
					],
				],
				// 'condition'	=> [
				// 	'layout_style' => ['1'],
				// ]
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
				'label' 		=> __( 'Color', 'tayde' ),
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
				'label' 	=> __( 'Typography', 'tayde' ),
                'selector' 	=> '{{WRAPPER}} .th-title',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'tayde' ),
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
				'label' 		=> __( 'Padding', 'tayde' ),
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

		
    	<?php else: ?>
			<div class="step-wrap">
				<div class="process-line jump">
					<?php echo malen_img_tag( array(
						'url'   => esc_url( $settings['line']['url']  ),
					));?>
				</div>

				<div class="row gy-30 align-item-center justify-content-center">
					<?php  foreach( $settings['info_lists'] as $data ): ?>
					<div class="col-sm-6 col-xl-4">
						<div class="process-card">
							<div class="process-card_img">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['image']['url']  ),
								));?>
								<div class="process-card_icon">
									<span class="number"><?php echo esc_html($data['number']); ?></span>
								</div>
							</div>
							<div class="process-card_content">
								<h2 class="process-card_title card-title th-title"><?php echo esc_html($data['title']); ?></h2>
								<p class="process-card_text th-desc"><?php echo esc_html($data['desc']); ?></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>

			</div>

		<?php endif;

	}

}