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
 * Projects Widget .
 *
 */
class Mechon_Projects_Widget extends Widget_Base{

	public function get_name() {
		return 'mechonprojects';
	}

	public function get_title() {
		return esc_html__( 'Malen Projects V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'project_content',
			[
				'label'		=> esc_html__( 'Projects','malen' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'project_image',
			[
				'label' 		=> esc_html__( 'Project Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );		
        $repeater->add_control(
			'project_icon',
			[
				'label' 		=> esc_html__( 'Project Icon', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Tire Repairing' , 'malen' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'subtitle', [
				'label' 		=> __( 'Subtitle', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Car Interior' , 'malen' ),
				'label_block' 	=> true,
			]
        );		
        $repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Continually expedite parallel process improvements vis-à-vis emerging schemas. Continually vesiculate cross-unit' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( ' Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'malen' ),
			]
        );
        $repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( ' Button Link', 'malen' ),
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
			'project_list',
			[
				'label' 		=> __( 'Projects', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		//-----------------------------------------General STYLING---------------------------------------------//

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> esc_html__( 'General Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'bg_color',
			[
				'label' 		=> esc_html__( 'Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-content'=> 'background-color: {{VALUE}}!important;',
				],
			]
        );        
        $this->add_control(
			'bg_shape_color',
			[
				'label' 		=> esc_html__( 'Shape Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .shape-triangle'=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> esc_html__( ' Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

		//-----------------------------------------Title STYLING---------------------------------------------//

		$this->start_controls_section(
			'content_heading',
			[
				'label' 	=> esc_html__( 'Title Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' 		=> esc_html__( ' Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-title a'=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> esc_html__( ' Typography', 'malen' ),
		 		'selector' 		=> '{{WRAPPER}} .project-title a',
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> esc_html__( ' Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> esc_html__( ' Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

        //-----------------------------------------Subtitle STYLING---------------------------------------------//

		$this->start_controls_section(
			'subtitle_styling',
			[
				'label' 	=> esc_html__( 'Subtitle Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'subtitle_color',
			[
				'label' 		=> esc_html__( ' Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-subtitle'=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'subtitle_typography',
		 		'label' 		=> esc_html__( ' Typography', 'malen' ),
		 		'selector' 		=> '{{WRAPPER}} .project-subtitle',
			]
		);

        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> esc_html__( ' Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> esc_html__( ' Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

        //-----------------------------------------Description STYLING---------------------------------------------//

		$this->start_controls_section(
			'description_styling',
			[
				'label' 	=> esc_html__( 'Description Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'desc_color',
			[
				'label' 		=> esc_html__( ' Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-text'=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'desc_typography',
		 		'label' 		=> esc_html__( ' Typography', 'malen' ),
		 		'selector' 		=> '{{WRAPPER}} .project-text',
			]
		);

        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> esc_html__( ' Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> esc_html__( ' Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

        //-----------------------------------------Button STYLING---------------------------------------------//

          $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'malen' ),
				'selector' => '{{WRAPPER}} .th-btn',
			]
		);
        $this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>
		<div class="row project-slide2 th-carousel" data-slide-show="2" data-lg-slide-show="2" data-md-slide-show="2"> 
           	<?php foreach( $settings['project_list'] as $data ): ?>
            <div class="col-lg-4">
                <div class="project-grid">
                	<?php if(!empty($data['project_image']['url'])): ?>
                    <div class="project-img">
                        <?php echo malen_img_tag( array(
	                            'url'   => esc_url( $data['project_image']['url']  ),
	                        )); ?>
                    </div>
                    <?php endif; ?>
                    <div class="shape-triangle"></div>
                    <div class="project-content">
                    	<?php if(!empty($data['project_icon']['url'])): ?>
                        <div class="project-icon">
                             <?php echo malen_img_tag( array(
	                            'url'   => esc_url( $data['project_icon']['url']  ),
	                        )); ?>
                        </div>
                        <?php endif; ?>
                         <?php if(!empty($data['title'])): ?>
                        	<h3 class="project-title"><a href="<?php echo esc_url( $data['button_link']['url'] ); ?>"><?php echo esc_html( $data['title']); ?></a></h3>
                        <?php endif; ?>
                         <?php if(!empty($data['subtitle'])): ?>
                        	<span class="project-subtitle"><?php echo esc_html( $data['subtitle']); ?></span>
                        <?php endif; ?>
                         <?php if(!empty($data['designation'])): ?>
                        	<p class="project-text"><?php echo esc_html( $data['designation']); ?></p>
                        <?php endif; ?>
                        <?php if(!empty($data['button_text'])): ?>
                        	<a href="<?php echo esc_url( $data['button_link']['url'] ); ?>" class="th-btn"><?php echo esc_html( $data['button_text']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        	<?php endforeach ?>
        </div>
		<?php
    	
	}
}