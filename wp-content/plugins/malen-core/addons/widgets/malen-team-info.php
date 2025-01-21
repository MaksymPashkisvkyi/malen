<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Team Info Widget
 *
 */
class malen_Team_info extends Widget_Base{

	public function get_name() {
		return 'malenteaminfo';
	}

	public function get_title() {
		return esc_html__( 'Team Member Info', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	public function get_script_depends() {
		return [ 'malen-frontend-script' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'team_member_content',
			[
				'label'		=> esc_html__( 'Member Info','malen' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Layout Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'malen' ),
				],
			]
		);

		$this->add_control(
			'content_name',
			[
				'label' 	=> esc_html__( 'Member Name', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Angela Kwang', 'malen' ),
                'rows' => '2'
			]
        );

        $this->add_control(
			'content_desig',
			[
				'label' 	=> esc_html__( 'Member Designation', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Teacher', 'malen' ),
                'rows' => '2'
			]
        ); 

        $this->add_control(
			'description',
			[
				'label' 	=> esc_html__( 'Description', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Synergistically procrastinate technology without inexpensive partnerships. Credibly synergize long-term high-impact infomediaries before covalent solution. ', 'malen' ),
				'separator' => 'after',
			]
        ); 
		
		$this->add_control(
			'number',
			[
				'label' 	=> esc_html__( 'Number', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( '2569', 'malen' ),
                'rows' => '2'
			]
        ); 

		$this->add_control(
			'content',
			[
				'label' 	=> esc_html__( 'Contnet', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Project done over 30 years', 'malen' ),
                'rows' => '2'
			]
        ); 

		$this->end_controls_section();

		$this->start_controls_section(
			'team_contact_info',
			[
				'label'		=> esc_html__( 'Contact Info','malen' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
            [
				'label'         => __( 'Info Title', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Get In Touch' , 'malen' ),
				'label_block'   => true,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'phone_icon',
            [
				'label'         => __( 'Phone Icon', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '<i class="fa-regular fa-phone"></i>' , 'malen' ),
				'label_block'   => true,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'phone_number',
            [
				'label'         => __( 'Phone Number', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '(+65) - 48596 - 5789' , 'malen' ),
				'label_block'   => true,
				'separator' => 'after',
			]
		);		

		$this->add_control(
			'email_icon',
            [
				'label'         => __( 'Email Icon', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '<i class="fa-regular fa-envelope-open"></i>' , 'malen' ),
				'label_block'   => true,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'email_address',
            [
				'label'         => __( 'Email Address', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'info@malen.com' , 'malen' ),
				'label_block'   => true,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'fb_link',
			[
				'label' 		=> esc_html__( 'Facebook Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'twitter_link',
			[
				'label' 		=> esc_html__( 'Twitter Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'pinterest_link',
			[
				'label' 		=> esc_html__( 'Pinterest Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
					
				],
			]
		);

		$this->add_control(
			'linkedin_link',
			[
				'label' 		=> esc_html__( 'Linkedin Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'separator' => 'after',
			]
		);

		$this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

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
						'label' => esc_html__( 'Name', 'malen' ),
					]
				);

			    $this->add_control(
						'overview_title_color',
						[
							'label' 		=> __( 'Color', 'malen' ),
							'type' 			=> Controls_Manager::COLOR,
							'selectors' 	=> [
								'{{WRAPPER}} .about-card_title'	=> 'color: {{VALUE}}!important;',
							],
						]
			    );

			    $this->add_group_control(
					Group_Control_Typography::get_type(),
					 	[
							'name' 			=> 'overview_title_typography',
					 		'label' 		=> __( 'Typography', 'malen' ),
					 		'selector' 	=> '{{WRAPPER}} .about-card_title',
						]
					);

			    $this->add_responsive_control(
						'overview_title_margin',
						[
							'label' 		=> __( 'Margin', 'malen' ),
							'type' 			=> Controls_Manager::DIMENSIONS,
							'size_units' 	=> [ 'px', '%', 'em' ],
							'selectors' 	=> [
								'{{WRAPPER}} .about-card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .about-card_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
						]
			    );

				$this->end_controls_tab();

				//--------------------secound--------------------//
				$this->start_controls_tab(
					'style_hover_tab2',
					[
						'label' => esc_html__( 'Designation', 'malen' ),
					]
				);

				$this->add_control(
					'overview_content_color',
					[
						'label' 		=> __( 'Color', 'malen' ),
						'type' 			=> Controls_Manager::COLOR,
						'selectors' 	=> [
							'{{WRAPPER}} .about-card_desig'	=> 'color: {{VALUE}}!important;',
						],
					]
		        );

			    $this->add_group_control(
					Group_Control_Typography::get_type(),
					 	[
							'name' 			=> 'overview_content_typography',
					 		'label' 		=> __( 'Typography', 'malen' ),
					 		'selector' 	=> '{{WRAPPER}} .about-card_desig',
						]
					);

			    $this->add_responsive_control(
						'overview_content_margin',
						[
							'label' 		=> __( 'Margin', 'malen' ),
							'type' 			=> Controls_Manager::DIMENSIONS,
							'size_units' 	=> [ 'px', '%', 'em' ],
							'selectors' 	=> [
								'{{WRAPPER}} .about-card_desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
								'{{WRAPPER}} .about-card_desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
						]
			   );

				$this->end_controls_tab();

				//--------------------secound--------------------//
				$this->start_controls_tab(
					'style_hover_tab5',
					[
						'label' => esc_html__( 'Content', 'malen' ),
					]
				);

				$this->add_control(
					'co_content_color',
					[
						'label' 		=> __( 'Color', 'malen' ),
						'type' 			=> Controls_Manager::COLOR,
						'selectors' 	=> [
							'{{WRAPPER}} .about-card_text'	=> 'color: {{VALUE}}!important;',
						],
					]
		        );

		        $this->add_group_control(
				Group_Control_Typography::get_type(),
				 	[
						'name' 			=> 'co_content_typography',
				 		'label' 		=> __( 'Typography', 'malen' ),
				 		'selector' 	=> '{{WRAPPER}} .about-card_text',
					]
				);

		        $this->add_responsive_control(
					'co_content_margin',
					[
						'label' 		=> __( 'Margin', 'malen' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', '%', 'em' ],
						'selectors' 	=> [
							'{{WRAPPER}} .about-card_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
					]
		        );

		        $this->add_responsive_control(
					'co_content_padding',
					[
						'label' 		=> __( 'Padding', 'malen' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', '%', 'em' ],
						'selectors' 	=> [
							'{{WRAPPER}} .about-card_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

	    <?php else: 
			$email    	= $settings['email_address'];
			$phone    	= $settings['phone_number'];  
			$email          = is_email( $email );

			$replace        = array(' ','-',' - ');
			$replace_phone        = array(' ','-',' - ', '(', ')');
			$with           = array('','','');

			$emailurl       = str_replace( $replace, $with, $email );
			$phoneurl       = str_replace( $replace_phone, $with, $phone );	

	    	$f_target = $settings['fb_link']['is_external'] ? ' target="_blank"' : '';
			$f_nofollow = $settings['fb_link']['nofollow'] ? ' rel="nofollow"' : '';
			$t_target = $settings['twitter_link']['is_external'] ? ' target="_blank"' : '';
			$t_nofollow = $settings['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';
			$p_target = $settings['pinterest_link']['is_external'] ? ' target="_blank"' : '';
			$p_nofollow = $settings['pinterest_link']['nofollow'] ? ' rel="nofollow"' : '';
			$l_target = $settings['linkedin_link']['is_external'] ? ' target="_blank"' : '';
			$l_nofollow = $settings['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
	    ?>
			<div class="about-card">
				<div class="about-card_content mb-40">
					<h5 class="about-card_title"><?php echo esc_html($settings['content_name']); ?></h5>
					<span class="about-card_desig text-theme"><?php echo esc_html($settings['content_desig']); ?></span>
					<p class="about-card_text"><?php echo esc_html($settings['description']); ?></p>
					<div class="about-counter">
						<h3 class="counter-title"><?php echo wp_kses_post($settings['number']); ?></h3>
						<span class="counter-text"><?php echo wp_kses_post($settings['content']); ?></span>
					</div>
					<div class="contact-info-wrapper">
						<h5><?php echo esc_html($settings['title']); ?></h5>
						<div class="contact-info style2">
							<div class="media-body">
								<?php echo wp_kses_post($settings['phone_icon']); ?>
								<span class="contact-info_text">
									<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>"><?php echo esc_html($phone); ?></a>
								</span>
							</div>
						</div>
						<div class="contact-info style2">
							<div class="media-body">
								<?php echo wp_kses_post($settings['email_icon']); ?>
								<span class="contact-info_text">
									<a href="<?php echo esc_attr( 'mailto:'.$emailurl); ?>"><?php echo esc_html($email); ?></a>
								</span>
							</div>
						</div>
						<div class="th-social">
							<?php if( ! empty( $settings['fb_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $f_nofollow.$f_target ); ?> href="<?php echo esc_url( $settings['fb_link']['url'] ); ?>"><i class="fab fa-facebook-f"></i></a>
							<?php endif; ?>

							<?php if( ! empty( $settings['twitter_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $t_nofollow.$t_target ); ?>  href="<?php echo esc_url( $settings['twitter_link']['url'] ); ?>"><i class="fab fa-twitter"></i></a>
							<?php endif; ?>

							<?php if( ! empty( $settings['pinterest_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $p_nofollow.$p_target ); ?>  href="<?php echo esc_url( $settings['pinterest_link']['url'] ); ?>"><i class="fab fa-pinterest-p"></i></a>
							<?php endif; ?>

							<?php if( ! empty( $settings['linkedin_link']['url']) ): ?>
								<a <?php echo wp_kses_post( $l_nofollow.$l_target ); ?>  href="<?php echo esc_url( $settings['linkedin_link']['url'] ); ?>"><i class="fab fa-linkedin-in"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

    	<?php endif;
		
	}
}