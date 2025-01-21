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
 * Contact Form Widget .
 *
 */
class malen_Contact_Form extends Widget_Base {

	public function get_name() {
		return 'malencontactform';
	}

	public function get_title() {
		return __( 'Contact Form', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	public function get_as_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $as_cfa         = array();
        $as_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $as_forms       = get_posts( $as_cf_args );
        $as_cfa         = ['0' => esc_html__( 'Select Form', 'malen' ) ];
        if( $as_forms ){
            foreach ( $as_forms as $as_form ){
                $as_cfa[$as_form->ID] = $as_form->post_title;
            }
        }else{
            $as_cfa[ esc_html__( 'No contact form found', 'malen' ) ] = 0;
        }
        return $as_cfa;
    }

	protected function register_controls() {

		$this->start_controls_section(
			'contact_form_section',
			[
				'label' 	=> __( 'Contact Form', 'malen' ),
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
					// '5' 		=> __( 'Style Five', 'malen' ),
					// '6' 		=> __( 'Style Six', 'malen' ),
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
				'condition'	=> [
					'layout_style' => ['2'],
				]
			]
		);   
		
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Title', 'malen' ),
			]
        );

         $this->add_control(
            'malen_select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'malen' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_as_contact_form(),
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

		//-------------------------Button Style-----------------------//
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'advoker' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'advoker' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_color',
			[
				'label' 		=> __( 'Hover Color ', 'advoker' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg',
			[
				'label' 		=> __( 'Background Color', 'advoker' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => 'background-color:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_bg',
			[
				'label' 		=> __( 'Background Hover Color', 'advoker' ),
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
				'label' 	=> __( 'Typography', 'advoker' ),
				'selector' 	=> '{{WRAPPER}} .th_btn',
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'advoker' ),
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
				'label' 		=> __( 'Padding', 'advoker' ),
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
				'label' 		=> __( 'Border Radius', 'advoker' ),
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

	    ?>
		<?php if( $settings['layout_style'] == '2' ): ?>
			<div class="request-quote-form th-bg">
				<?php if(!empty($settings['title'])): ?>
					<h4 class="text-white th-title text-center text-xl-start mb-30"><?php echo esc_html($settings['title']); ?></h4>
				<?php endif; ?>

				<?php 
					if( !empty($settings['malen_select_contact_form']) ){
						echo do_shortcode( '[contact-form-7  id="'.$settings['malen_select_contact_form'].'"]' ); 
					}else{
						echo '<div class="alert alert-warning"><p class="m-0">' . __('Please Select contact form.', 'malen' ). '</p></div>';
					}
				?>
				<div class="request-shape">
					<?php  echo malen_img_tag( array(
						'url'	=> esc_url( $settings['image']['url'] ),
						) ); ?>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="contact-form-wrapper th-bg">
				<div class="contact-form ajax-contact">
					<?php if(!empty($settings['title'])): ?>
						<h2 class="form-title th-title"><?php echo esc_html($settings['title']); ?></h2>
					<?php endif; ?>
					<?php 
						if( !empty($settings['malen_select_contact_form']) ){
							echo do_shortcode( '[contact-form-7  id="'.$settings['malen_select_contact_form'].'"]' ); 
						}else{
							echo '<div class="alert alert-warning"><p class="m-0">' . __('Please Select contact form.', 'malen' ). '</p></div>';
						}
					?>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="team-form ajax-contact th-bg">
				<?php if(!empty($settings['title'])): ?>
					<h4 class="text-center mb-30 th-title"><?php echo esc_html($settings['title']); ?></h4>
				<?php endif; ?>

				<?php 
					if( !empty($settings['malen_select_contact_form']) ){
						echo do_shortcode( '[contact-form-7  id="'.$settings['malen_select_contact_form'].'"]' ); 
					}else{
						echo '<div class="alert alert-warning"><p class="m-0">' . __('Please Select contact form.', 'malen' ). '</p></div>';
					}
				?>

            </div>

		<?php else: ?>
			<div class="request-quote-form style2 th-bg">
				<?php if(!empty($settings['title'])): ?>
				<h3 class="form-title th-title text-center text-xl-start"><?php echo esc_html($settings['title']); ?></h3>
				<?php endif; ?>

				<?php 
					if( !empty($settings['malen_select_contact_form']) ){
						echo do_shortcode( '[contact-form-7  id="'.$settings['malen_select_contact_form'].'"]' ); 
					}else{
						echo '<div class="alert alert-warning"><p class="m-0">' . __('Please Select contact form.', 'malen' ). '</p></div>';
					}
				?>
			</div>
	    	 
	    <?php endif;

	}

}