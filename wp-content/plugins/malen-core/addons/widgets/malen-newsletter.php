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
class Malen_Newsletter extends Widget_Base {

	public function get_name() {
		return 'malennewsletter';
	}

	public function get_title() {
		return __( 'Newsletter', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }
    

	public function get_categories() {
		return [ 'malen' ];
	}

	
	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label'     => __( 'Newsletter Style', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
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
				'dynamic'   => [
					'active' => true,
				],
			]
		);

        $this->add_control(
			'title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 3,
			]
		);

		$this->add_control(
			'newsletter_placeholder',
			[
				'label' 		=> __( 'Newsletter Placeholder Text', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Enter Your Email', 'malen' ),
			]
		);

		$this->add_control(
			'newsletter_button',
			[
				'label' 		=> __( 'Newsletter Button Text', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Subscribe', 'malen' ),
				// 'condition' => [
				// 	'layout_style' => ['2', '3']
				// ]
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
			'geneal_bg',
			[
				'label'     => __( 'Background', 'malen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .th-bg' => 'background-color: {{VALUE}}!important',
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
                'selector' 	=> '{{WRAPPER}} .th-title',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
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
			'section_title_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
	?>

        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="newsletter-area th-bg ">
				<div class="container">
					<div class="row gx-0 align-items-center">
						<div class="col-lg-6 col-xl-6 col-xxl-5">
							<div class="newsletter-wrapper">
								<?php if(!empty($settings['image']['url'])): ?>
								<div class="newsletter-image jump">
									<?php echo malen_img_tag( array(
										'url'   => esc_url( $settings['image']['url']  ),
									)); ?>
								</div>
								<?php endif; ?>
								<h4 class="h4 newsletter-title th-title text-white"><?php echo esc_html($settings['title']); ?></h4>
							</div>
						</div>
						<div class="col-lg-6 col-xl-6 col-xxl-7">
							<div class="newsletter-form-wrapper">
								<form class="newsletter-form">
									<input class="form-control " type="email" placeholder="<?php echo esc_attr( $settings['newsletter_placeholder'] ); ?>" required="">
									<button type="submit" class="th-btn style3"><?php echo wp_kses_post( $settings['newsletter_button'] ); ?></button>
								</form>
							</div>
						</div>
					</div>
				</div>
            </div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>


    	<?php else: ?>
			<div class="newsletter-area th-bg style2">
                <div class="row gx-0 align-items-center">
                    <div class="col-xl-6">
                        <div class="newsletter-wrapper">
							<?php if(!empty($settings['image']['url'])): ?>
                            <div class="newsletter-image jump">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $settings['image']['url']  ),
								)); ?>
                            </div>
							<?php endif; ?>
                            <h4 class="h4 newsletter-title th-title text-white"><?php echo esc_html($settings['title']); ?></h4>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="newsletter-form-wrapper">
                            <form class="newsletter-form">
                                <input class="form-control " type="email" placeholder="<?php echo esc_attr( $settings['newsletter_placeholder'] ); ?>" required="">
                                <button type="submit" class="th-btn style3"><?php echo wp_kses_post( $settings['newsletter_button'] ); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

	<?php
	endif;
	}
}
						