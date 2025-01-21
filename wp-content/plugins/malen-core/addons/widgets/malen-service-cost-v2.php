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
class Mechon_Service_Cost extends Widget_Base {

	public function get_name() {
		return 'mechonservicecost';
	}

	public function get_title() {
		return __( 'Service Cost V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_cost_section',
			[
				'label'     => __( 'Service Cost', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
            'service_cost_thumb',
            [
                'label'     => __( 'Service Cost Image', 'malen' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
		$repeater->add_control(
			'service_cost_title',
			[
				'label'         => __( 'Service Cost Title', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Service Cost Title' , 'malen' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'service_cost_price',
			[
				'label'         => __( 'Service Cost Price', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '$99.99' , 'malen' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'service_cost_feature',
			[
				'label'     => __( 'Features', 'malen' ),
                'type'      => Controls_Manager::WYSIWYG,
				'default'       => __( '<ul><li>Rims & Tire Change</li><li>Rims & Tire Change</li></ul>' , 'malen' ),
				'placeholder' => esc_html__( 'Type enter your list using ul li', 'textdomain' ),
			]
        );
       

		$this->add_control(
			'service_cost_tabs',
			[
				'label' 		=> __( 'Service Cost Tab', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_cost_title' 	=> esc_html__( 'Rims & Tire Change', 'malen' ),
					],
				],
				'title_field' 	=> '{{service_cost_title}}',
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------Step styling------------------------------------*/

		$this->start_controls_section(
			'service_cost_general_style',
			[
				'label' 	=> __( 'General Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'service_cost_background',
			[
				'label' 		=> __( 'Service Cost Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-box-wrap' => 'background-color: {{VALUE}}',
                ]
			]
        );
              $this->add_responsive_control(
		'service_cost_margin',
			[
				'label' 	=> __( 'Margin', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-box-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                	],
		]
        );
         $this->add_responsive_control(
		'service_padding',
			[
				'label' 	=> __( 'Padding', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-box-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'{{WRAPPER}} .price-box_title'	=> 'color: {{VALUE}}!important;',
			],
		]
        );
		$this->add_group_control(
	Group_Control_Typography::get_type(),
	 	[
			'name' 	=> 'title_typography',
	 		'label' 	=> __( 'Typography', 'malen' ),
	 		'selector' 	=> '{{WRAPPER}} .price-box_title',
		]
	);
        $this->add_responsive_control(
		'title_margin',
			[
				'label' 	=> __( 'Margin', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-box_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .price-box_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                		],
		]
        );

         $this->end_controls_section();

          $this->start_controls_section(
		'price_styling',
			[
				'label' 	=> __( 'Price Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

	  $this->add_control(
		'price_color',
		[
			'label' 		=> __( 'Color', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .price-box_price'	=> 'color: {{VALUE}}!important;',
			],
		]
        );
		$this->add_group_control(
	Group_Control_Typography::get_type(),
	 	[
			'name' 	=> 'price_typography',
	 		'label' 	=> __( 'Typography', 'malen' ),
	 		'selector' 	=> '{{WRAPPER}} .price-box_price',
		]
	);
        $this->add_responsive_control(
		'price_margin',
			[
				'label' 	=> __( 'Margin', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-box_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                	],
		]
        );
         $this->add_responsive_control(
		'price_padding',
			[
				'label' 	=> __( 'Padding', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-box_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                		],
		]
        );

         $this->end_controls_section();

         $this->start_controls_section(
		'feature_styling',
			[
				'label' 	=> __( 'Features Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

	  $this->add_control(
		'feature_color',
		[
			'label' 		=> __( 'Color', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .price-box_list li'	=> 'color: {{VALUE}}!important;',
			],
		]
        );
	  	  $this->add_control(
		'feature_bg_color',
		[
			'label' 		=> __( 'Background', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .price-box_list li'	=> 'background-color: {{VALUE}}!important;',
			],
		]
        );
		$this->add_group_control(
	Group_Control_Typography::get_type(),
	 	[
			'name' 	=> 'feature_typography',
	 		'label' 	=> __( 'Typography', 'malen' ),
	 		'selector' 	=> '{{WRAPPER}} .price-box_list li',
		]
	);
        $this->add_responsive_control(
		'feature_margin',
			[
				'label' 	=> __( 'Margin', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-box_list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                	],
		]
        );
         $this->add_responsive_control(
		'feature_padding',
			[
				'label' 	=> __( 'Padding', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-box_list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                		],
		]
        );

         $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		?>    
		<div class="price-box-wrap">
			<?php foreach( $settings['service_cost_tabs'] as $data ): ?>
			<div class="price-box">
				<?php if(!empty($data['service_cost_thumb'])): ?>
				<div class="price-box_img">
					<?php echo malen_img_tag( array(
						'url'   => esc_url( $data['service_cost_thumb']['url']  ),
					)); ?>
				</div>
				<?php endif; ?>
				<div class="price-box_content">
					<div class="price-box_header">
						<?php if(!empty($data['service_cost_title'])): ?>
							<h3 class="price-box_title"><?php echo esc_html($data['service_cost_title']) ?></h3>
						<?php endif; ?>
						<?php if(!empty($data['service_cost_price'])): ?>
							<h4 class="price-box_price"><?php echo esc_html($data['service_cost_price']) ?></h4>
						<?php endif; ?>
					</div>
					<?php if(!empty($data['service_cost_feature'])): ?>
					<div class="price-box_list">
						<?php echo wp_kses_post($data['service_cost_feature']) ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

	<?php
	}

}