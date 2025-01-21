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
class Mechon_Counterup extends Widget_Base {

	public function get_name() {
		return 'mechoncounterup';
	}

	public function get_title() {
		return __( 'Counter Up V2', 'malen' );
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
				'label' 	=> __( 'Content', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'counter_style',
			[
				'label' 	=> __( 'Counter Style', 'malen' ),
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
			'make_it_slider',
			[
				'label' 		=> __( 'Make It Slider?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'malen' ),
				'label_off' 	=> __( 'No', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
      
		$repeater = new Repeater();

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
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'malen' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Years Of Experience', 'malen' ),
			]
		);
		$repeater->add_control(
			'counter_image',
			[
				'label' 		=> __( 'Counter Image', 'malen' ),
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
			'counter',
			[
				'label' 		=> __( 'Counter', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_text' 		=> __( 'Counter One', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ counter_text }}}',
			]
		);
		$this->add_control(
			'counter_bg',
			[
				'label' 		=> __( 'Background Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'counter_style' => ['1', '2']
				]
			]
		);


		$this->end_controls_section();

        /*-----------------------------------------Feedback styling------------------------------------*/

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
				'label' => esc_html__( 'Ttitle', 'malen' ),
			]
		);
		$this->add_control(
			'overview_content_color',
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
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
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
			'overview_content_padding',
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
        if($settings['make_it_slider'] == 'yes'){
			$this->add_render_attribute( 'wrapper', 'class', 'row counter_1' );
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'row' );
		}

        echo '<div class="container counter-wrpaer">';
	        echo '<div class="row th-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">';
	            foreach( $settings['counter'] as $data ) {	
	            	if( $settings['counter_style'] == '1' ){
			            echo '<div class="col-sm-6 col-lg-3">';
			                echo '<div class="counter-block" data-bg-src="'.esc_url( $settings['counter_bg']['url']  ).'">';
			                	if(!empty($data['counter_image']['url'])){
				                    echo '<div class="counter-block_icon">';
				                        echo malen_img_tag( array(
						                    'url'   => esc_url( $data['counter_image']['url']  ),
						                ));
				                    echo '</div>';
				                }
				                if( ! empty( $data['counter_number'] ) ){
				                    echo '<h3 class="counter-block_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>+</h3>';
				                }
				                if( !empty( $data['counter_text'] ) ){
				                    echo '<p class="counter-block_text">'.esc_html( $data['counter_text'] ).'</p>';
				                }
			                echo '</div>';
			            echo '</div>';
			        }elseif( $settings['counter_style'] == '2' ){
			        	echo '<div class="col-sm-6 col-xl-3 counter-box-wrap">';
		                    echo '<div class="counter-box">';
		                        if(!empty($data['counter_image']['url'])){
				                    echo '<div class="counter-box_icon">';
				                        echo malen_img_tag( array(
						                    'url'   => esc_url( $data['counter_image']['url']  ),
						                ));
				                    echo '</div>';
				                }
		                        echo '<div class="counter-box_content">';
		                        	if( ! empty( $data['counter_number'] ) ){
					                    echo '<h3 class="counter-box_number"><span class="counter-number counter-number-1">'.esc_html( $data['counter_number'] ).'</span>+</h3>';
					                }
					                if( !empty( $data['counter_text'] ) ){
					                    echo '<p class="counter-box_text">'.esc_html( $data['counter_text'] ).'</p>';
					                }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
			        }else{
			        	echo '<div class="col-sm-6 col-xl-3 counter-box-wrap border-white">';
		                    echo '<div class="counter-box">';
		                        if(!empty($data['counter_image']['url'])){
				                    echo '<div class="counter-box_icon bg-white">';
				                        echo malen_img_tag( array(
						                    'url'   => esc_url( $data['counter_image']['url']  ),
						                ));
				                    echo '</div>';
				                }
		                        echo '<div class="counter-box_content">';
		                        	if( ! empty( $data['counter_number'] ) ){
					                    echo '<h3 class="counter-box_number"><span class="counter-number counter-number-1">'.esc_html( $data['counter_number'] ).'</span>+</h3>';
					                }
					                if( !empty( $data['counter_text'] ) ){
					                    echo '<p class="counter-box_text text-white">'.esc_html( $data['counter_text'] ).'</p>';
					                }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
			        }
		        }      
	       	echo '</div>';
        echo '</div>';
	}

}