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
 * Team Member Ifo Widget .
 *
 */
class Mechon_Team_member_info_Widget extends Widget_Base{

	public function get_name() {
		return 'mechonteammemberinfo';
	}

	public function get_title() {
		return esc_html__( 'Team Member info V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}
	public function get_script_depends() {
		return [ 'mechon-frontend-script' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'team_member_content',
			[
				'label'		=> esc_html__( 'Team Member Informmation','malen' ),
				'tab'		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_name',
			[
				'label' 	=> esc_html__( 'Team Member Name', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Mechon - Content Title', 'malen' ),
			]
        );

        $this->add_control(
			'content_desig',
			[
				'label' 	=> esc_html__( 'Team Member Designation', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Mechon - Content Title', 'malen' ),
			]
        );

        $this->add_control(
			'description',
			[
				'label' 	=> esc_html__( 'Description Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> esc_html__( 'Continually utilize 24/365 bandwidth before real-time interfaces. Credibly grow team core competencies with pandemic commerce. Objectively initiate pandemic users with deliver bricks clicks meta services for bricks-and-clicks innovation streamline front end aradigms expedite granular human capital rather than intuitive testing procedures.', 'malen' ),
			]
        );

        $this->add_control(
			'content_experience',
			[
				'label' 	=> esc_html__( 'Experience', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Mechon - Experience', 'malen' ),
			]
        );
        $this->add_control(
			'content_email',
			[
				'label' 	=> esc_html__( 'Email', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'inf@domain.com', 'malen' ),
			]
        );
        $this->add_control(
			'content_phone',
			[
				'label' 	=> esc_html__( 'Phone', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( '+825 (2569) 1253', 'malen' ),
			]
        );
        $this->add_control(
			'content_fax',
			[
				'label' 	=> esc_html__( 'Fax', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( '+2568145632', 'malen' ),
			]
        );

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'malen' )
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
					'{{WRAPPER}} .team-about_title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .team-about_title',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-about_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-about_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-about_desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .team-about_desig',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-about_desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-about_desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab5',
			[
				'label' => esc_html__( 'Contwnt', 'malen' ),
			]
		);
		$this->add_control(
			'co_content_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-about_text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'co_content_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .team-about_text',
			]
		);

        $this->add_responsive_control(
			'co_content_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-about_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-about_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();





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

		$phone_number   =  $settings['content_phone'] ;
        $email   		=  $settings['content_email'] ;
        $fax   		=  $settings['content_fax'] ;
        $email 			= is_email( $email );

    	$replace 		= array(' ','-',' - ');
    	$with 			= array('','','');

    	$phoneurl 		= str_replace( $replace, $with, $phone_number );
    	$emailurl 		= str_replace( $replace, $with, $email );
    	$faxurl 		= str_replace( $replace, $with, $email );

		echo '<!-----------------------Start Team Member Info Area----------------------->';



		echo '<div class="team-about">';
			if(!empty($settings['content_name'])) {
	            echo '<h2 class="team-about_title">'.esc_html($settings['content_name']).'</h2>';
	        }
	        if(!empty($settings['content_desig'])) {
	            echo '<p class="team-about_desig">'.esc_html($settings['content_desig']).'</p>';
	        }
	        if(!empty($settings['description'])) {
	            echo '<p class="team-about_text">'.esc_html($settings['description']).'</p>';
	        }
            echo '<div class="about-info-wrap">';
            	if(!empty($settings['content_experience'])) {
	                echo '<div class="about-info">';
	                    echo '<div class="about-info_icon"><i class="fas fa-car-wrench"></i></div>';
	                    echo '<div class="about-info_content">';
	                        echo '<p class="about-info_subtitle">'.esc_html__('Experience', 'malen').'</p>';
	                        echo '<h6 class="about-info_title">'.esc_html($settings['content_experience']).'</h6>';
	                    echo '</div>';
	                echo '</div>';
	            }
	            if(!empty($phone_number)) {
	                echo '<div class="about-info">';
	                    echo '<div class="about-info_icon"><i class="fas fa-phone"></i></div>';
	                    echo '<div class="about-info_content">';
	                        echo '<p class="about-info_subtitle">'.esc_html__('Phone', 'malen').'</p>';
	                        echo '<h6 class="about-info_title"><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html( $phone_number ).'</a></h6>';
	                    echo '</div>';
	                echo '</div>';
	            }
	            if(!empty($email)) {
	                echo '<div class="about-info">';
	                    echo '<div class="about-info_icon"><i class="fas fa-envelope"></i></div>';
	                    echo '<div class="about-info_content">';
	                        echo '<p class="about-info_subtitle">'.esc_html__('Email', 'malen').'</p>';
	                        echo '<h6 class="about-info_title"><a href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html( $email ).'</a></h6>';
	                    echo '</div>';
	                echo '</div>';
	            }
	            if(!empty($fax)) {
	                echo '<div class="about-info">';
	                    echo '<div class="about-info_icon"><i class="fas fa-fax"></i></div>';
	                    echo '<div class="about-info_content">';
	                        echo '<p class="about-info_subtitle">'.esc_html__('Fax', 'malen').'</p>';
	                        echo '<h6 class="about-info_title"><a href="'.esc_attr( 'fax:'.$emailurl ).'">'.esc_html( $email ).'</a></h6>';
	                   echo ' </div>';
	                echo '</div>';
	            }
            echo '</div>';
            if( ! empty( $settings['button_text'] ) ){
	            echo '<a href="'.esc_url( $settings['button_link']['url'] ).'" class="th-btn">'.esc_html( $settings['button_text'] ).'</a>';
	        }
        echo '</div>';

		echo '<!-----------------------End Team Member Info Area----------------------->';
	}
}