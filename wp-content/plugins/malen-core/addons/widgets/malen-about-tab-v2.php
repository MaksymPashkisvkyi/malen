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
 * About Tab Widget .
 *
 */
class Mechon_About_Tab extends Widget_Base {

	public function get_name() {
		return 'mechonabouttab';
	}

	public function get_title() {
		return __( 'Malen About Tab', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'about_tab_section',
			[
				'label'     => __( 'About Tab', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'about_tab_title',
			[
				'label'         => __( 'Tab Title', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Tab Title' , 'malen' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
			'about_tab_desc',
            [
				'label'         => __( 'Tab Description', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '' , 'malen' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'about_tab_progress_title',
            [
				'label'         => __( 'Progress Title', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '' ,'malen' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'about_tab_progress_value',
            [
				'label'         => __( 'Progress Value', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '' ,'malen' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'about_tab_progress_title2',
            [
				'label'         => __( 'Progress Title 2', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '' ,'malen' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'about_tab_progress_value2',
            [
				'label'         => __( 'Progress Value 2', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '' ,'malen' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
            'button_text',
            [
                'label'         => __( 'Button Text', 'malen' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'default'		=> __( 'GET A QUOTE','malen' )
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label'         => __( 'Button Url', 'malen' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'default'		=> '#'
            ]
        );

		$this->add_control(
			'about_tabs',
			[
				'label' 		=> __( 'About Tab', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'about_tab_title' 	=> esc_html__( 'About Us', 'malen' ),
						'about_tab_desc' 	=> esc_html__( 'Nostra habitasse inceptos placerat vivamus vestibulum blandit odio dignissim aliquet nunc taciti,', 'malen' ),
						'about_tab_progress_title' 	=> esc_html__( 'Engine Solution', 'malen' ),
						'about_tab_progress_value' 	=> esc_html__( '90', 'malen' ),
						'about_tab_progress_title2' 	=> esc_html__( 'Engine Diagnostics', 'malen' ),
						'about_tab_progress_value2' 	=> esc_html__( '85', 'malen' ),
					],
					[
						'about_tab_title' 	=> esc_html__( 'Our Mission', 'malen' ),
						'about_tab_desc' 	=> esc_html__( 'Habitasse inceptos placerat vivamus vestibulum blandit odio dignissim aliquet nunc taciti,', 'malen' ),
						'about_tab_progress_title' 	=> esc_html__( 'Solution Any Car', 'malen' ),
						'about_tab_progress_value' 	=> esc_html__( '80', 'malen' ),
						'about_tab_progress_title2' 	=> esc_html__( 'Engine Problems', 'malen' ),
						'about_tab_progress_value2' 	=> esc_html__( '84', 'malen' ),
					],
				],
				'title_field' 	=> '{{about_tab_title}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'about_tab_general_style',
			[
				'label' 	=> __( 'General Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'about_tab_background',
			[
				'label' 		=> __( 'About Tab Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} ' => 'background-color: {{VALUE}}',
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

        $this->add_control(
			'heading_button',
			[
				'label' => esc_html__( 'Button Syle', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		 $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_title_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .tab-menu4 .th-btn',
			]
		);
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab1',
			[
				'label' => esc_html__( 'Normal', 'malen' ),
			]
		);
        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 .th-btn '	=> 'color: {{VALUE}};',
				],
			]
        );
         $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 .th-btn'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 .th-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 .th-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );


		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Hover', 'malen' ),
			]
		);

		 $this->add_control(
			'button_hover_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 .th-btn:hover,  .tab-menu4 .th-btn.active'	=> 'color: {{VALUE}} !important;',
				],
			]
        );
         $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 .th-btn:hover, body div.tab-menu4 .th-btn:before'	=> '--theme-color: {{VALUE}}!important;',
				],
			]
        );


		$this->end_controls_tab();

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		?>

        <div class="nav tab-menu4" role="tablist">
			<?php 
				$x = 0;
				foreach( $settings['about_tabs'] as $data ):
					$x++;
					if( $x == '1' ){
						$is_active		= 'active';
						$ariaexpanded 	= 'true';
					}else{
						$is_active		= '';
						$ariaexpanded 	= 'false';
					}
	
					$info_title 	= strtolower( $data['about_tab_title'] );
					$replace 		= array(' ','-',' - ');
					$with 			= array('','','');
					$final_data 	= str_replace( $replace, $with, $info_title );
			?>
			<button class="th-btn <?php  echo esc_attr($is_active); ?>" id="nav-<?php  echo esc_attr($final_data); ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php  echo esc_attr($final_data); ?>" type="button" role="tab" aria-controls="nav-<?php  echo esc_attr($final_data); ?>" aria-selected="<?php  echo esc_attr($ariaexpanded); ?>"><?php echo esc_html($data['about_tab_title']) ?></button>
			<?php endforeach; ?>
		</div>

		<div class="tab-content why-tabcontent" id="why-tabContent">
			<!-- Single item -->
			<?php 
				$x = 0;
				foreach( $settings['about_tabs'] as $data ):
					$x++;
					if( $x == '1' ){
						$is_active		= 'show active';
						$ariaexpanded 	= 'true';
					}else{
						$is_active		= '';
						$ariaexpanded 	= 'false';
					}
	
					$info_title 	= strtolower( $data['about_tab_title'] );
					$replace 		= array(' ','-',' - ');
					$with 			= array('','','');
					$final_data 	= str_replace( $replace, $with, $info_title );
			?>
			<div class="tab-pane fade <?php  echo esc_attr($is_active); ?>" id="nav-<?php  echo esc_attr($final_data); ?>" role="tabpanel" aria-labelledby="nav-<?php  echo esc_attr($final_data); ?>-tab">
				<?php if(!empty($data['about_tab_desc'])): ?>
				<p class="mb-35"><?php  echo esc_html($data['about_tab_desc']) ?></p>
				<?php endif; ?>
				<div class="skill-card style4">
					<?php if(!empty($data['about_tab_progress_value'])): ?>
					<div class="skill-feature style3">
						<div class="progress-bar" data-percentage="<?php  echo esc_html($data['about_tab_progress_value']) ?>%">
							<h4 class="progress-title-holder"><?php echo  esc_html($data['about_tab_progress_title']) ?> <span class="progress-number-wrapper">
									<span class="progress-number-mark">
										<span class="percent"></span>
									</span>
								</span>
							</h4>
							<div class="progress-content-outter">
								<div class="progress-content"></div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if(!empty($data['about_tab_progress_value2'])): ?>
					<div class="skill-feature style3">
						<div class="progress-bar" data-percentage="<?php echo  esc_html($data['about_tab_progress_value2']) ?>%">
							<h4 class="progress-title-holder"><?php echo  esc_html($data['about_tab_progress_title2']) ?> <span class="progress-number-wrapper">
									<span class="progress-number-mark">
										<span class="percent"></span>
									</span>
								</span>
							</h4>
							<div class="progress-content-outter">
								<div class="progress-content"></div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<?php if(!empty($data['button_text'])): ?>
				<div class="pt-2">
					<a href="<?php echo esc_url($data['button_url']) ?>" class="th-btn"><?php echo esc_html($data['button_text']) ?></a>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>

	<?php
	}

}