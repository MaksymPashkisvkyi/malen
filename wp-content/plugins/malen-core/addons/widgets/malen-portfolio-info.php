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
 * Portfolio Info Widget
 *
 */
class malen_Portfolio_Info extends Widget_Base{

	public function get_name() {
		return 'maleneportfolioinfo';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Info', 'malen' );
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
			'portfolio_content',
			[
				'label'		=> esc_html__( 'Portfolio Info','malen' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);
 
        $repeater = new Repeater();

        $repeater->add_control(
			'label',
			[
				'label' 	=> __( 'List Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '', 'malen' )
			]
        );

        $repeater->add_control(
			'content',
			[
				'label' 	=> __( 'List Content', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '', 'malen' )
			]
        );

		$this->add_control(
			'portfolio_lists',
			[
				'label' 		=> __( 'Portfolio Info List', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title'    => __( 'Clients :', 'malen' ),
						'content'    => __( 'Ronald Richards', 'malen' ),
					],
				],
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
            ]
        );

        $this->start_controls_tabs(
            'style_tabs2'
        );

            $this->start_controls_tab(
                'style_normal_tab2',
                [
                    'label' => esc_html__( 'Title', 'malen' ),
                ]
            );

            $this->add_control(
                'overview_title_color',
                [
                    'label' 		=> __( 'Color', 'malen' ),
                    'type' 			=> Controls_Manager::COLOR,
                    'selectors' 	=> [
                        '{{WRAPPER}} .project-details-wrap .title'	=> 'color: {{VALUE}}!important;'
                    ],
                ]
            );

            $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'name' 			=> 'overview_title_typography',
                    'label' 		=> __( 'Typography', 'malen' ),
                    'selector' 	=> '{{WRAPPER}} .project-details-wrap .title',
                ]
            );

            $this->add_responsive_control(
                'overview_title_margin',
                [
                    'label' 		=> __( 'Margin', 'malen' ),
                    'type' 			=> Controls_Manager::DIMENSIONS,
                    'size_units' 	=> [ 'px', '%', 'em' ],
                    'selectors' 	=> [
                        '{{WRAPPER}} .project-details-wrap .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            //--------------------secound--------------------//
            $this->start_controls_tab(
                'style_hover_tab2',
                [
                    'label' => esc_html__( 'Content', 'malen' ),
                ]
            );

            $this->add_control(
                'overview_content_color',
                [
                    'label' 		=> __( 'Color', 'malen' ),
                    'type' 			=> Controls_Manager::COLOR,
                    'selectors' 	=> [
                        '{{WRAPPER}} .project-details-wrap .text'	=> 'color: {{VALUE}}!important;',
                    ],
                ]
            );

            $this->add_group_control(
            Group_Control_Typography::get_type(),
                [
                    'name' 			=> 'overview_content_typography',
                    'label' 		=> __( 'Typography', 'malen' ),
                    'selector' 	=> '{{WRAPPER}} .project-details-wrap .text',
                ]
            );

            $this->add_responsive_control(
                'overview_content_margin',
                [
                    'label' 		=> __( 'Margin', 'malen' ),
                    'type' 			=> Controls_Manager::DIMENSIONS,
                    'size_units' 	=> [ 'px', '%', 'em' ],
                    'selectors' 	=> [
                        '{{WRAPPER}} .project-details-wrap .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            <ul class="project-details-wrap">
                <?php  foreach( $settings['portfolio_lists'] as $data ): ?>
                <li>
                    <h6 class="title"><?php echo esc_html( $data['label'] ); ?></h6>
                    <p class="text"><?php echo esc_html( $data['content'] ); ?></p>
                </li>
                <?php endforeach; ?>
            </ul>

    	<?php
		
	}
}