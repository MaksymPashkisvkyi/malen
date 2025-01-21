
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
 * Contact Info Widget .
 *
 */
class Malen_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'malencontactinfo';
	}

	public function get_title() {
		return __( 'Contact Info', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'title_section',
			[
				'label' 	=> __( 'Contact Info', 'malen' ),
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
				],
			]
		);

		$this->add_control(
			'office_icon',
			[
				'label' 		=> __( 'Office Iocn', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> '<i class="fa-light fa-clock"></i>',
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);

		$this->add_control(
			'office_title',
            [
				'label'         => __( 'Office Label', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Working Time' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 2,
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);		

		$this->add_control(
			'office_time',
            [
				'label'         => __( 'Office Time', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Mon-Fri 09:AM-05:PM' , 'malen' ),
				'rows' 		=> 3,
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);

		$this->add_control(
			'phone_icon',
			[
				'label' 		=> __( 'Phone Iocn', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> '<i class="fa-sharp fa-light fa-phone"></i>',
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);

		$this->add_control(
			'phone_icon2',
            [
				'label' 		=> __( 'Phone Icon', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);	
		
		$this->add_control(
			'phone_title',
            [
				'label'         => __( 'Phone Label', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Phone' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 2,
			]
		);		

		$this->add_control(
			'phone_number',
            [
				'label'         => __( 'Phone Number', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '+125 (405) 555-0128' , 'malen' ),
				'label_block'   => true,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'email_icon',
			[
				'label' 		=> __( 'Email Icon', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' 	=> true,
				'default' 		=> '<i class="fa-regular fa-envelope-open"></i>',
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);

		$this->add_control(
			'email_icon2',
            [
				'label' 		=> __( 'Email Icon', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);	

		$this->add_control(
			'email_title',
            [
				'label'         => __( 'Email Label', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Email' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 2,
			]
		);		

        $this->add_control(
			'email_address',
            [
				'label'         => __( 'Email Address', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'quick.help@gmail.com' , 'malen' ),
				'label_block'   => true,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'address_icon',
            [
				'label' 		=> __( 'Address Icon', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);	

		$this->add_control(
			'address_title',
            [
				'label'         => __( 'Address Label', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Address' , 'malen' ),
				'label_block'   => true,
				'rows' 		=> 2,
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);		

        $this->add_control(
			'address_name',
            [
				'label'         => __( 'Address Name', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '3891 Ranchview Dr. Richardson, California 62639' , 'malen' ),
				'rows' 		=> 3,
				'separator' => 'after',
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'social_section',
			[
				'label' 	=> __( 'Social Info', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout_style' => ['3']
				]
			]
        );

		$this->add_control(
			'social_label',
            [
				'label'         => __( 'Social Label', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Follow Us' , 'malen' ),
				'rows' 		=> 3,
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

        /*-----------------------------------------Content styling------------------------------------*/
		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				// 'condition' => [
				// 	'layout_style' => ['2']
				// ]
			]
        );

        $this->start_controls_tabs(
			'style_tabs'
		);

			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => esc_html__( 'Label', 'malen' ),
				]
			);

	        $this->add_control(
				'tab_style_1_color',
				[
					'label' 		=> __( 'Color', 'malen' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-label'	=> 'color: {{VALUE}}!important;'
					],
				]
	        );

	        $this->add_group_control(
			Group_Control_Typography::get_type(),
			 	[
					'name' 			=> 'tab_style_1_typography',
			 		'label' 		=> __( 'Typography', 'malen' ),
			 		'selector' 	=> '{{WRAPPER}} .th-label',
				]
			);

	        $this->add_responsive_control(
				'tab_style_1_margin',
				[
					'label' 		=> __( 'Margin', 'malen' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
				]
	        );

			$this->end_controls_tab();

			//------------secound----------------//
			$this->start_controls_tab(
				'style_normal_tab2',
				[
					'label' => esc_html__( 'Content', 'malen' ),
				]
			);

			$this->add_control(
				'tab_style_2_color',
				[
					'label' 		=> __( 'Color', 'malen' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-content'	=> 'color: {{VALUE}}!important;',
					],
				]
	        );

	        $this->add_group_control(
			Group_Control_Typography::get_type(),
			 	[
					'name' 			=> 'tab_style_2_typography',
			 		'label' 		=> __( 'Typography', 'malen' ),
			 		'selector' 	=> '{{WRAPPER}} .th-content',
				]
			);

	        $this->add_responsive_control(
				'tab_style_2_margin',
				[
					'label' 		=> __( 'Margin', 'malen' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
				]
	        );

			$this->end_controls_tab();

			//------------secound----------------//
			$this->start_controls_tab(
				'style_normal_tab3',
				[
					'label' => esc_html__( 'Icon', 'malen' ),
				]
			);

			$this->add_control(
				'tab_style_3_color',
				[
					'label' 		=> __( 'Color', 'malen' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-icon'	=> 'color: {{VALUE}}!important;',
					],
				]
	        );

			$this->add_control(
				'tab_style_3_font_size',
				[
					'label' => esc_html__( 'Icon Font Size', 'malen' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 40,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .th-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $email    	= $settings['email_address'];
		$phone    	= $settings['phone_number'];        

		$email          = is_email( $email );

		$replace        = array(' ','-',' - ');
		$replace_phone        = array(' ','-',' - ', '(', ')');
		$with           = array('','','');

		$emailurl       = str_replace( $replace, $with, $email );
		$phoneurl       = str_replace( $replace_phone, $with, $phone );		
        ?>
        <?php if( $settings['layout_style'] == '3' ): 
			
	    	$f_target = $settings['fb_link']['is_external'] ? ' target="_blank"' : '';
			$f_nofollow = $settings['fb_link']['nofollow'] ? ' rel="nofollow"' : '';
			$t_target = $settings['twitter_link']['is_external'] ? ' target="_blank"' : '';
			$t_nofollow = $settings['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';
			$p_target = $settings['pinterest_link']['is_external'] ? ' target="_blank"' : '';
			$p_nofollow = $settings['pinterest_link']['nofollow'] ? ' rel="nofollow"' : '';
			$l_target = $settings['linkedin_link']['is_external'] ? ' target="_blank"' : '';
			$l_nofollow = $settings['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
		?>
			<div class="contact-info-wrap">
				<div class="contact-info">
					<div class="contact-info_icon  th-icon">
						<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['phone_icon2']['url']  ),
						)); ?>
					</div>
					<div class="media-body">
						<h4 class="contact-info_title th-label"><?php echo esc_html($settings['phone_title']); ?></h4>
						<span class="contact-info_text">
							<a class="th-content" href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>"><?php echo esc_html($phone); ?></a>
						</span>
					</div>
				</div>
				<div class="contact-info">
					<div class="contact-info_icon th-icon">
						<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['email_icon2']['url']  ),
						)); ?>
					</div>
					<div class="media-body">
						<h4 class="contact-info_title th-label"><?php echo esc_html($settings['email_title']); ?></h4>
						<span class="contact-info_text">
							<a class="th-content"  href="<?php echo esc_attr( 'mailto:'.$emailurl); ?>"><?php echo esc_html($email); ?></a>
						</span>
					</div>
				</div>
				<div class="contact-info">
					<div class="contact-info_icon th-icon">
						<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['address_icon']['url']  ),
						)); ?>
					</div>
					<div class="media-body">
						<h4 class="contact-info_title th-label"><?php echo esc_html($settings['address_title']); ?></h4>
						<span class="contact-info_text th-content"><?php echo esc_html($settings['address_name']); ?></span>
					</div>
				</div>
				<div class="contact-wrapper">
					<h4 class="info-title"><?php echo esc_html($settings['social_label']); ?></h4>
					<div class="th-social author-social">
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


    	<?php else: 
			if( $settings['layout_style'] == '2' ){
				$class = 'style2';
			}else{
				$class = '';
			}
		?>
			<div class="th-widget-contact <?php echo esc_attr($class); ?>">
				<div class="info-box">
					<div class="info-box_icon th-icon">
						<?php echo wp_kses_post($settings['office_icon']); ?>
					</div>
					<p class="info-box_text">
						<span class="info-box_label th-label"><?php echo esc_html($settings['office_title']); ?></span>
						<span class="th-content">
							<?php echo esc_html($settings['office_time']); ?>
						</span>
					</p>
				</div>
				<div class="info-box">
					<div class="info-box_icon th-icon">
						<?php echo wp_kses_post($settings['phone_icon']); ?>
					</div>
					<p class="info-box_text">
						<span class="info-box_label th-label"><?php echo esc_html($settings['phone_title']); ?></span>
						<a class="info-box_link th-content" href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>"><?php echo esc_html($phone); ?></a>
					</p>
				</div>
				<div class="info-box">
					<div class="info-box_icon th-icon">
						<?php echo wp_kses_post($settings['email_icon']); ?>
					</div>
					<p class="info-box_text">
						<span class="info-box_label th-label"><?php echo esc_html($settings['email_title']); ?></span>
						<a class="info-box_link th-content" href="<?php echo esc_attr( 'mailto:'.$emailurl); ?>"><?php echo esc_html($email); ?></a>
					</p>
				</div>
			</div>

        <?php  endif;

	}

}
