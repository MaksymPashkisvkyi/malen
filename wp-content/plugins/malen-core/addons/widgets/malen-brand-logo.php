<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Brand Logo Widget .
 *
 */
class malen_Brand_Logo extends Widget_Base {

	public function get_name() {
		return 'malenbrandlogo';
	}

	public function get_title() {
		return __( 'Brand Logo', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Brand Logo', 'malen' ),
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
					// '2' 		=> __( 'Style Two', 'malen' ),
				],
			]
		);

		$this->add_control(
			'title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'client_logo',
			[
				'label' 	=> __( 'Client Logo', 'malen' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);		

		$this->add_control(
			'logos',
			[
				'label' 		=> __( 'Client Logos', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
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
				'label' 		=> __( 'Color', 'tayde' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'title_color2',
			[
				'label' 		=> __( 'Line Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title:after, {{WRAPPER}} .th-title:before' => 'background-color: {{VALUE}} !important',
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

	}

	protected function render() {

	    $settings = $this->get_settings_for_display();
	    ?>
	    
	    <?php if( $settings['layout_style'] == '2' ): ?>


	    <?php else: ?>
			<?php if(!empty( $settings['title'] )): ?>
			<div class="title-area text-center">
                <span class="brand-title th-title"><?php echo esc_html( $settings['title'] ); ?></span>
            </div>
			<?php endif; ?>
			<div class="row th-carousel" id="brandSlide1" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="3" data-xs-slide-show="2">
				<?php foreach( $settings['logos'] as $data ): ?>
                <div class="col-auto">
                    <div class="brand-box">
						<?php echo malen_img_tag( array(
			                'url'   => esc_url( $data['client_logo']['url'] ),
			            ) ); ?>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

    <?php endif;

	}
}