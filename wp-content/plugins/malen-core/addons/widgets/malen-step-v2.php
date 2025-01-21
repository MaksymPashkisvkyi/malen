<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Process Box Widget .
 *
 */
class Mechon_Process_Box extends Widget_Base {

	public function get_name() {
		return 'mechonprocessbox';
	}

	public function get_title() {
		return __( 'Malen Process V2', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label' 	=> __( 'Process', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        	);

		$this->add_control(
			'process_style',
			[
				'label' 	=> __( 'Process Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
				],
			]
		);

 	//---------------------------------Process syle 01-------------------------------//

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'counter',
			[
				'label'     => __( 'Counter', 'malen' ),
                'type'      => Controls_Manager::TEXT,
			]
        );
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'steps',
			[
				'label' 		=> __( 'Steps', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter' 		=> __( '01', 'malen' ),
					],
				],
				'condition'		=> [ 
					'process_style' =>  ['1']  
				],
			]
		);

	//---------------------------------Process syle 02-------------------------------//

        $repeater2 = new Repeater();

		$repeater2->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater2->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater2->add_control(
			'content',
			[
				'label'     => __( 'Content', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'steps_2',
			[
				'label' 		=> __( 'Steps', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Step Item 1', 'malen' ),
					],
				],
				'condition'		=> [ 
					'process_style' =>  ['2'] ,
				],
			]
		);

	//---------------------------------Process syle 03-------------------------------//
       $repeater3 = new Repeater();

	$repeater3->add_control(
		'image',
		[
			'label' 		=> __( 'Choose Image', 'malen' ),
			'type' 			=> Controls_Manager::MEDIA,
			'default' 		=> [
				'url' 			=> Utils::get_placeholder_image_src(),
			],
		]
	);
	$repeater3->add_control(
		'title',
		[
			'label'     => __( 'Title', 'malen' ),
	         'type'      => Controls_Manager::TEXTAREA,
	         'rows' 		=> 2,
		]
        );	
	$repeater3->add_control(
		'number',
		[
			'label'     => __( 'Number', 'malen' ),
	         'type'      => Controls_Manager::TEXTAREA,
	         'rows' 		=> 2,
		]
        );
        $repeater3->add_control(
		'content',
		[
			'label'     => __( 'Content', 'malen' ),
	         'type'      => Controls_Manager::TEXTAREA,
	         'rows' 		=> 2,
		]
        );
        $this->add_control(
		'steps_3',
		[
			'label' 		=> __( 'Steps', 'malen' ),
			'type' 			=> Controls_Manager::REPEATER,
			'fields' 		=> $repeater3->get_controls(),
			'default' 		=> [
				[
					'title' 		=> __( 'Step Item 1', 'malen' ),
				],
			],
			'condition'		=> [ 
				'process_style' =>  ['3'] ,
			],
		]
	);

        $this->end_controls_section();

/*-----------------------------------------Step styling------------------------------------*/
        $this->start_controls_section(
		'icon_styling',
			[
				'label' 	=> __( 'Icon Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

	  $this->add_control(
		'icon_bg',
		[
			'label' 		=> __( 'Icon Background', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .process-box_icon'	=> 'background-color: {{VALUE}}!important;',
			],
		]
        );
         $this->add_control(
		'icon_bg_hover',
		[
			'label' 		=> __( 'Icon Hover Background', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .process-box:hover .process-box_icon'	=> 'background-color: {{VALUE}}!important;',
			],
		]
        );

         $this->end_controls_section();

          $this->start_controls_section(
		'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

	  $this->add_control(
		'title_color',
		[
			'label' 		=> __( 'Color', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .process-box_title'	=> 'color: {{VALUE}}!important;',
			],
		]
        );
	$this->add_group_control(
	Group_Control_Typography::get_type(),
	 	[
			'name' 	=> 'title_typography',
	 		'label' 	=> __( 'Typography', 'malen' ),
	 		'selector' 	=> '{{WRAPPER}} .process-box_title',
		]
	);
        $this->add_responsive_control(
		'title_margin',
			[
				'label' 	=> __( 'Margin', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .process-box_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                	],
		]
        );
         $this->add_responsive_control(
		'title_padding',
			[
				'label' 	=> __( 'Padding', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .process-box_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                		],
		]
        );


	$this->end_controls_section();

	 $this->start_controls_section(
		'desc_styling',
			[
				'label' 	=> __( 'Description Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

	 $this->add_control(
		'desc_color',
		[
			'label' 		=> __( 'Color', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .process-box_text'	=> 'color: {{VALUE}}!important;',
			],
		]
        );
	$this->add_group_control(
	Group_Control_Typography::get_type(),
	 	[
			'name' 	=> 'desc_typography',
	 		'label' 	=> __( 'Typography', 'malen' ),
	 		'selector' 	=> '{{WRAPPER}} .process-box_text',
		]
	);
        $this->add_responsive_control(
		'desc_margin',
			[
				'label' 	=> __( 'Margin', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .process-box_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                	],
		]
        );
         $this->add_responsive_control(
		'desc_padding',
			[
				'label' 	=> __( 'Padding', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .process-box_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                		],
		]
        );


	$this->end_controls_section();


	}

	

	protected function render() {

        $settings = $this->get_settings_for_display();
		?>
		<?php  if( $settings['process_style'] == '2' ): ?>
			<div class="row">
				<?php foreach( $settings['steps_2'] as $data ): ?>
				<div class="col-md-6 col-lg-3 process-box-wrap">
					<div class="process-box">
						<?php if( ! empty( $data['image'] ) ): ?>
						<div class="process-box_icon">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['image']['url']  ),
							)); ?>
						</div>
						<?php endif; ?>
						<?php if( ! empty( $data['title'] ) ): ?>
						<h3 class="process-box_title"><?php echo esc_html( $data['title'] ); ?></h3>
						<?php endif; ?>
						<?php if( ! empty( $data['content'] ) ): ?>
						<p class="process-box_text"><?php echo esc_html( $data['content'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		<?php  elseif( $settings['process_style'] == '3' ): ?>
		<div class="row">
			<?php foreach( $settings['steps_3'] as $data ): ?>
		         <div class="col-md-6 col-lg-3 process-box-wrap style2">
		             <div class="process-box">
		             	   <?php if( ! empty( $data['image'] ) ): ?>
		                 <div class="process-box_icon">
		                     <?php echo malen_img_tag( array(
						'url'   => esc_url( $data['image']['url']  ),
					)); ?>
		                     <div class="process-box_number"><?php echo esc_html( $data['number'] ); ?></div>
		                 </div>
		                 <?php endif; ?>
		                 <?php if( ! empty( $data['title'] ) ): ?>
					<h3 class="process-box_title text-white"><?php echo esc_html( $data['title'] ); ?></h3>
				   <?php endif; ?>
				   <?php if( ! empty( $data['content'] ) ): ?>
					<p class="process-box_text text-light"><?php echo esc_html( $data['content'] ); ?></p>
				   <?php endif; ?>
		             </div>
		         </div>
		         <?php endforeach; ?>
		</div>
		<?php  else: ?>
			<?php
			echo '<div class="services-process-wrapper">';
				foreach( $settings['steps'] as $data ) {	
					echo '<div class="services-process">';
						if( ! empty( $data['counter'] ) ){
							echo '<div class="services-process_num">'.esc_html( $data['counter'] ).'</div>';
						}
						if( ! empty( $data['title'] ) ){
							echo '<h5 class="services-process_title">'.esc_html( $data['title'] ).'</h5>';
						}
						if( ! empty( $data['content'] ) ){
							echo '<p class="services-process_text">'.esc_html( $data['content'] ).'</p>';
						}
					echo '</div>';
				}

				echo '</div>'; 
				?>
		<?php endif; ?>
		<?php
        
	}

}