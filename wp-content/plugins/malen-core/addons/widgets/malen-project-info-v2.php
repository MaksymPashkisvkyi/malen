<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * Project Info Widget .
 *
 */
class Mechon_Project_Info_Widget extends Widget_Base{

	public function get_name() {
		return 'mechonprojectinfo';
	}

	public function get_title() {
		return esc_html__( 'Project Info V2', 'malen' );
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
				'label'		=> esc_html__( 'Project Info','malen' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' 	=> esc_html__( 'Heading', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Mechon - Heading', 'malen' ),
			]
        );

        $this->add_control(
			'category',
			[
				'label' 	=> esc_html__( 'Category', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Mechon - Category Name', 'malen' ),
			]
        );

        $this->add_control(
			'client',
			[
				'label' 	=> esc_html__( 'Client Name', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Mechon - client Name', 'malen' ),
			]
        );

        $this->add_control(
			's_date',
			[
				'label' 	=> esc_html__( 'Project Date', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Mechon Date', 'malen' ),
			]
        );

        $this->add_control(
			'address',
			[
				'label' 	=> esc_html__( 'Address', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Mechon - Website', 'malen' ),
			]
        );

		$this->end_controls_section();

		//-----------------------------------------Heading STYLING---------------------------------------------//

		$this->start_controls_section(
			'content_heading',
			[
				'label' 	=> esc_html__( 'Heading Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'heading_color',
			[
				'label' 		=> esc_html__( 'Heading Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-information h3'=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'heading_typography',
		 		'label' 		=> esc_html__( 'Heading Typography', 'malen' ),
		 		'selector' 		=> '{{WRAPPER}} .project-information h3',
			]
		);

        $this->add_responsive_control(
			'heading_margin',
			[
				'label' 		=> esc_html__( 'Heading Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-information h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'heading_padding',
			[
				'label' 		=> esc_html__( 'Heading Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-information h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

    	echo '<!-----------------------Start Project Info----------------------->';
    	
    	echo '<div class="project-information mb-25 d-inline-block">';

    		echo '<div class="widget widget_project_info  ">';
    			if(!empty($settings['heading'])){
	                echo '<h4 class="widget_title">'.esc_html($settings['heading']).'</h4>';
	            }
                echo '<div class="project-info-wrap">';
                	if(!empty($settings['client'])){
	                    echo '<div class="project-info">';
	                        echo '<div class="project-info_icon"><i class="fas fa-user"></i></div>';
	                        echo '<div class="project-info_content">';
	                            echo '<p class="project-info_text">'.esc_html__( 'Client:', 'malen' ).'</p>';
	                            echo '<h6 class="project-info_title">'.esc_html($settings['client']).'</h6>';
	                        echo '</div>';

	                    echo '</div>';
	                }
	                if(!empty($settings['category'])){
	                    echo '<div class="project-info">';
	                        echo '<div class="project-info_icon"><i class="fas fa-layer-group"></i></div>';
	                        echo '<div class="project-info_content">';
	                            echo '<p class="project-info_text">'.esc_html__( 'Category:', 'malen' ).'</p>';
	                            echo '<h6 class="project-info_title">'.esc_html($settings['category']).'</h6>';
	                        echo '</div>';

	                    echo '</div>';
	                }
	                if(!empty($settings['s_date'])){
	                    echo '<div class="project-info">';
	                        echo '<div class="project-info_icon"><i class="fas fa-calendar-days"></i></div>';
	                        echo '<div class="project-info_content">';
	                            echo '<p class="project-info_text">'.esc_html__( 'Date:', 'malen' ).'</p>';
	                            echo '<h6 class="project-info_title">'.esc_html($settings['s_date']).'</h6>';
	                        echo '</div>';

	                    echo '</div>';
	                }
	                if(!empty($settings['address'])){
	                    echo '<div class="project-info">';
	                        echo '<div class="project-info_icon"><i class="fas fa-location-dot"></i></div>';
	                        echo '<div class="project-info_content">';
	                            echo '<p class="project-info_text">'.esc_html__( 'Address:', 'malen' ).'</p>';
	                            echo '<h6 class="project-info_title">'.esc_html($settings['address']).'</h6>';
	                        echo '</div>';

	                    echo '</div>';
	                }
                echo '</div>';
            echo '</div>';
	    echo '</div>';

		echo '<!-----------------------End Project Info----------------------->';
	}
}