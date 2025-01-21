<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget .
 *
 */
class Mechon_Button extends Widget_Base {

	public function get_name() {
		return 'mechonbutton';
	}

	public function get_title() {
		return __( 'Button V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'button_style',
			[
				'label' 	=> __( 'Button Styles', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
				],
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'malen' ),
				'condition' => [
					'button_style' => ['1','2']
				]
			]
        );
        $this->add_control(
			'button_icon',
			[
				'label' 	=> __( 'Button Icon Class', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'fa-solid fa-play', 'malen' ),
				'condition' => [
					'button_style' => '3'
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
			]
		);

		$this->add_control(
			'button_style_class',
			[
				'label' 	=> __( 'Button Style Class', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '', 'malen' ),
			]
        ); 

        $this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'malen' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'malen' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'malen' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'malen' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        //-------------------------Button Style-----------------------//
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_color',
			[
				'label' 		=> __( 'Hover Color ', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label' 		=> __( 'Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'background-color:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_bg',
			[
				'label' 		=> __( 'Background Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after' => 'background-color:{{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Typography', 'malen' ),
				'selector' 	=> '{{WRAPPER}} .th_btn',
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
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
				'label' 		=> __( 'Padding', 'malen' ),
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
				'label' 		=> __( 'Border Radius', 'malen' ),
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
		

        $this->add_render_attribute( 'wrapper', 'class', 'btn-wrapper');
        $this->add_render_attribute( 'wrapper', 'class', esc_attr(  $settings['button_align'] ) );
		$this->add_render_attribute( 'button', 'class', esc_attr(  $settings['button_style_class'] ) );
        if( $settings['button_style'] == '1' ){
		    $this->add_render_attribute( 'button', 'class', 'th_btn th-btn' );
		}elseif($settings['button_style'] == '3'){
			$this->add_render_attribute( 'button', 'class', 'th_btn th-btn style-play' );
		}else{
			$this->add_render_attribute( 'button', 'class', 'th_btn th-btn style2' );
		}
	    


        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

        echo '<!-- Button -->';

		?>
		<?php if($settings['button_style'] == '3'): ?>
			 <a <?php echo $this->get_render_attribute_string('button'); ?>><i class="<?php echo esc_html( $settings['button_icon'] ); ?>"></i></a>
		<?php else: 
		        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
        	
	        	if( ! empty( $settings['button_text'] ) ) {
	                echo '<a '.$this->get_render_attribute_string('button').'>'.esc_html( $settings['button_text'] ).'</a>';
	        }
        echo '</div>';

		endif; 

		echo '<!-- End Button -->';
		
	}

}