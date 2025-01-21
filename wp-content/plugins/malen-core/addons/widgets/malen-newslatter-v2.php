<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Background;
/**
 * 
 * Newsletter Widget .
 *
 */
class Mechon_Newsletter_Widgets extends Widget_Base {

	public function get_name() {
		return 'vendoranewsletter2';
	}

	public function get_title() {
		return __( 'Malen Newsletter V2', 'vendora' );
	}


	public function get_icon() {
		return 'eicon-code';
    }
    

	public function get_categories() {
		return [ 'vendora' ];
	}

	
	protected function register_controls() {

		$this->start_controls_section(
			'newsletter_content',
			[
				'label' 	=> __( 'Newsletter', 'vendora' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'newsletter_style',
			[
				'label' 	=> __( 'Newsletter Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
				],
			]
		);

		
		$this->add_control(
			'newsletter_placeholder',
			[
				'label' 		=> __( 'Newsletter Placeholder Text', 'vendora' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Enter Your Email', 'vendora' ),
			]
		);
		$this->add_control(
			'newsletter_button',
			[
				'label' 		=> __( 'Newsletter Button Text', 'vendora' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Subscribe', 'vendora' ),
			]
		);

        $this->end_controls_section();

        //-------------------------------button styling--------------------------------//
		
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'vendora' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'vendora' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn.style3' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'button_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'vendora' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn.style3::before' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'button_txt_color',
			[
				'label' 		=> __( 'Button Text Color', 'vendora' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn.style3' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'button_txt_hvr_color',
			[
				'label' 		=> __( 'Button Text Hover Color', 'vendora' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn.style3:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'vendora' ),
                'selector' 	=> '{{WRAPPER}} .th-btn.style3',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border2',
				'label' 	=> __( 'Border', 'vendora' ),
                'selector' 	=> '{{WRAPPER}} .th-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'vendora' ),
                'selector' 	=> '{{WRAPPER}} .th-btn.style3',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'vendora' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn.style3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'vendora' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn.style3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'vendora' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn.style3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

			if($settings['newsletter_style'] == '2'): ?>
			<div class="widget_newsletter">
 				<form class="newsletter-form">
					<input class="form-control" type="email" placeholder="<?php echo esc_attr( $settings['newsletter_placeholder'] ); ?>" required="">
					<button type="submit" class="th-btn style3"><?php echo esc_html( $settings['newsletter_button'] ) ?></button>
				</form>
			</div>
		<?php else: 
	        echo '<form class="newsletter-form style4">';
	                echo '<input type="email" class="form-control" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
	                echo '<button type="submit" class="th-btn">'.esc_html( $settings['newsletter_button'] ).'</button>';
	        echo '</form>';

		endif;
	}

}

						