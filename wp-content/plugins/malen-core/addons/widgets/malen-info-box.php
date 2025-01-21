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
 * Info Box Widget .
 *
 */
class malen_Info_Box extends Widget_Base {

	public function get_name() {
		return 'maleninfobox';
	}

	public function get_title() {
		return __( 'Info Box', 'malen' );
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
				'label'		 	=> __( 'Info Box', 'malen' ),
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
					'2'  		=> __( 'Style Two', 'malen' ),					
					'3'  		=> __( 'Style Three', 'malen' ),						
					'4'  		=> __( 'Style Four', 'malen' ),						
					'5'  		=> __( 'Style Five', 'malen' ),											
					'6'  		=> __( 'Style Six', 'malen' ),											
					'7'  		=> __( 'Style Seven', 'malen' ),											
					'8'  		=> __( 'Style Eight', 'malen' ),											
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
			'title',
			[
				'label' 	=> __( 'Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '', 'malen' )
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
						'title'    => __( 'Title', 'malen' ),
					],
				],
				'condition'	=> [
					'layout_style' => ['1', '2'],
				]
			]
		);

		$this->add_control(
            'image',
            [
                'label'     => __( 'Image / Icon', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
            ]
        );

		$this->add_control(
			'label',
			[
				'label' 	=> __( 'Label', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Label', 'malen' ),
				'condition'	=> [
					'layout_style' => ['1', '3', '5', '6', '8'],
				]
			]
        );

		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title', 'malen' ),
				'condition'	=> [
					'layout_style' => ['4', '8'],
				]
			]
        );

		$this->add_control(
			'phone',
			[
				'label' 	=> __( 'Phone', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default'  	=> __( '', 'malen' ),
				'condition'	=> [
					'layout_style' => ['1', '3', '5', '6', '8'],
				]
			]
        );

		$this->add_control(
			'features',
			[
				'label' 	=> __( 'Feature Lists', 'malen' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( '', 'malen' ),
				'condition'	=> [
					'layout_style' => ['1', '2', '3', '7'],
				]
			]
        );
		$this->add_control(
			'desc',
			[
				'label' 	=> __( 'Description', 'malen' ),
				'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default'  	=> __( '', 'malen' ),
				'condition'	=> [
					'layout_style' => ['6'],
				]
			]
        );

		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'label_block' => true,
                'default'  	=> __( 'Button Text', 'malen' ),
				'condition'	=> [
					'layout_style' => ['1', '3', '4', '5', '6'],
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
				'condition'	=> [
					'layout_style' => ['1', '3', '4', '5', '6'],
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
				'label' 	=> __( 'Title Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
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
				'label' 	=> __( 'Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-title',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
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
				'label' 		=> __( 'Padding', 'malen' ),
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

		//-------------------------Button Style-----------------------//
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['1', '3'],
				]
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

        ?>

        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="achive-wrapper">
				<div class="achive-about-wrap">
					<?php  foreach( $settings['info_lists'] as $data ): ?>
					<div class="achive-about">
						<div class="achive-about_icon">
							<?php echo malen_img_tag( array(
									'url'   => esc_url( $data['image']['url']  ),
								));?>
						</div>
						<div class="media-body">
							<h3 class="achive-about_title th-title"><?php echo esc_html($data['title']) ?></h3>
							<p class="achive-about_text th-desc"><?php echo esc_html($data['desc']) ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="about-counter1" data-bg-src="<?php echo esc_url( $settings['image']['url'] ); ?>">
					<?php echo wp_kses_post($settings['features']) ?>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '3' ): 
			$phone = isset($settings['phone']) ? $settings['phone'] : '';

			$replace = array(' ','-',' - ');
			$replace_phone = array(' ','-',' - ', '(', ')');
			$with = array('','','');
			
			$phoneurl = str_replace($replace_phone, $with, $phone);
		?>
			
			<div class="btn-group">
				<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn th_btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
				<div class="feature-wrapper">
					<div class="feature-icon">
						<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>">
							<?php echo malen_img_tag( array(
									'url'   => esc_url( $settings['image']['url']  ),
								));?>
						</a>
					</div>
					<div class="media-body">
						<span class="header-info_label th-title"><?php echo esc_html($settings['label']) ?></span>
						<p class="header-info_link th-desc"><a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>"><?php echo esc_html($phone); ?></a></p>
					</div>
				</div>
			</div>

			<div class="checklist style3">
				<?php echo wp_kses_post($settings['features']) ?>
			</div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="service-group-thumb">
                <div class="thumb">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image']['url']  ),
						));?>
                </div>
                <div class="service-counter">
                    <h3 class="counter-title th-title"><?php echo wp_kses_post($settings['title']); ?><a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>"> <?php echo wp_kses_post($settings['button_text']); ?></a></h3>
                </div>
            </div>

		<?php elseif( $settings['layout_style'] == '5' ): 
			$phone    	= $settings['phone'];        

			$replace        = array(' ','-',' - ');
			$replace_phone        = array(' ','-',' - ', '(', ')');
			$with           = array('','','');
	
			$phoneurl       = str_replace( $replace_phone, $with, $phone );	
		?>
			<div class="btn-group style1">
				<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn th_btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
				<div class="feature-wrapper">
					<div class="feature-icon">
						<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>">
							<?php echo malen_img_tag( array(
									'url'   => esc_url( $settings['image']['url']  ),
								));?>
						</a>
					</div>
					<div class="media-body">
						<span class="header-info_label th-title"><?php echo esc_html($settings['label']) ?></span>
						<p class="header-info_link th-desc"><a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>"><?php echo esc_html($phone); ?></a></p>
					</div>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '6' ): 
			$phone    	= $settings['phone'];        

			$replace        = array(' ','-',' - ');
			$replace_phone        = array(' ','-',' - ', '(', ')');
			$with           = array('','','');
	
			$phoneurl       = str_replace( $replace_phone, $with, $phone );	
		?>
			<div class="info-wrap">
				<p class="sec-desc mb-40"><?php echo wp_kses_post($settings['desc']) ?></p>
				<div class="request-wrapper">
					<div class="btn-group">
						<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn th_btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
					</div>
					
					<div class="feature-wrapper">
						<div class="feature-icon">
							<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>">
								<?php echo malen_img_tag( array(
										'url'   => esc_url( $settings['image']['url']  ),
									));?>
							</a>
						</div>
						<div class="media-body">
							<span class="header-info_label th-title"><?php echo esc_html($settings['label']) ?></span>
							<p class="header-info_link th-desc"><a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>"><?php echo esc_html($phone); ?></a></p>
						</div>
					</div>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '7' ): ?>
			<div class="row gy-4 mb-4 justify-content-center">
				<div class="col-lg-6">
					<div class="page-img">
						<?php echo malen_img_tag( array(
									'url'   => esc_url( $settings['image']['url']  ),
								)); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="checklist">
						<?php echo wp_kses_post($settings['features']) ?>
					</div>
				</div>
			</div>

		<?php elseif( $settings['layout_style'] == '8' ): 
			$phone    	= $settings['phone'];        

			$replace        = array(' ','-',' - ');
			$replace_phone        = array(' ','-',' - ', '(', ')');
			$with           = array('','','');
	
			$phoneurl       = str_replace( $replace_phone, $with, $phone );	
		?>
			<div class="widget_banner  " data-bg-src="<?php echo esc_url( $settings['image']['url'] ); ?>">
				<div class="widget_wrapper">
					<h4 class="widget_title"><?php echo wp_kses_post($settings['title']) ?></h4>
					<div class="widget-banner">
						<div class="widget-icon">
							<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>" class="play-btn"><i class="fa-regular fa-phone"></i></a>
						</div>
						<div class="widget-content">
							<span class="widget_desc"><?php echo esc_html($settings['label']) ?></span>
							<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>" class="banner-link"><?php echo esc_html($phone); ?></a>
						</div>
					</div>
				</div>
			</div>


    	<?php else: 
			$phone    	= $settings['phone'];        

			$replace        = array(' ','-',' - ');
			$replace_phone        = array(' ','-',' - ', '(', ')');
			$with           = array('','','');
	
			$phoneurl       = str_replace( $replace_phone, $with, $phone );	
			?>
			<div class="about-content-wrapper">
				<div class="about-content">
					<div class="checklist">
						<?php echo wp_kses_post($settings['features']) ?>
					</div>
					<div class="header-info">
						<div class="header-info_icon">
							<a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>">
								<?php echo malen_img_tag( array(
									'url'   => esc_url( $settings['image']['url']  ),
								)); ?>
							</a>
						</div>
						<div class="media-body">
							<span class="header-info_label"><?php echo esc_html($settings['label']) ?></span>
							<p class="header-info_link"><a href="<?php echo esc_attr( 'tel:'.$phoneurl); ?>"><?php echo esc_html($phone); ?></a>
							</p>
						</div>
					</div>
					<div class="btn-group">
						<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn th_btn black-btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
					</div>
				</div>
				<div class="counter-wrapper">
					<?php  foreach( $settings['info_lists'] as $data ): ?>
					<div class="th-counterup">
						<div class="inner">
							<div class="content">
								<h3 class="counter th-title">
									<?php echo wp_kses_post($data['title']) ?>
								</h3>
								<p class="counter-card_text th-desc"><?php echo esc_html($data['desc']) ?></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

		<?php endif;

	}

}