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
 * Team Widget .
 *
 */
class Mechon_Team extends Widget_Base {

	public function get_name() {
		return 'mechonteam';
	}

	public function get_title() {
		return __( 'Malen Team V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_section',
			[
				'label'     => __( 'Team Slider', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'team_style',
			[
				'label' 	=> __( 'Team Style', 'malen' ),
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
			'make_it_slider',
			[
				'label' 		=> __( 'Make It Slider?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'malen' ),
				'label_off' 	=> __( 'No', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label' 		=> esc_html__( 'Shape Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'malen' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'profile_link',
			[
				'label' 		=> esc_html__( 'Profile Link', 'malen' ),
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
		$repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'malen' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'malen' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'team_image',
			[
				'label' 		=> esc_html__( 'Speaker Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
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
		$repeater->add_control(
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
		$repeater->add_control(
			'instagram_link',
			[
				'label' 		=> esc_html__( 'Instagram Link', 'malen' ),
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
		$repeater->add_control(
			'linkedin_link',
			[
				'label' 		=> esc_html__( 'Linkedin Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'malen' ),
				'show_external' => true,
			]
		);

		$this->add_control(
			'team_members',
			[
				'label' 		=> __( 'Speaker Member', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'service_slider_general_style',
			[
				'label' 	=> __( 'General Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'service_box_background',
			[
				'label' 		=> __( 'Team Box Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-box .team-content,{{WRAPPER}} .team-item .team-content, {{WRAPPER}} .team-block .team-content' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .team-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .team-title',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'malen' ),
		 		'selector' 	=> '{{WRAPPER}} .team-desig',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		if( ! empty( $settings['team_members'] ) ){
			
			echo '<div class="team_1 arrow-wrap">';
				if( $settings['team_style'] == '1' ) {
					
				} elseif( $settings['team_style'] == '2' ) {
					
				} 
				if($settings['make_it_slider'] == 'yes'){
					if( $settings['team_style'] == '1' ){
						echo '<div class="row slider-shadow th-carousel" data-slide-show="3" data-md-slide-show="2" data-arrows="true">';
					} elseif( $settings['team_style'] == '2' ) {
						echo '<div class="row slider-shadow th-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-arrows="true">';
					} elseif( $settings['team_style'] == '3' ) {
						echo '<div class="row slider-shadow th-carousel" id="teamSlide3" data-slide-show="2" data-md-slide-show="2">';
					}
				}else{
					echo '<div class="row gy-30">';
				}
                	foreach( $settings['team_members'] as $data ) {
                		$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

						$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
						$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

						$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
						$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

						$i_target = $data['instagram_link']['is_external'] ? ' target="_blank"' : '';
						$i_nofollow = $data['instagram_link']['nofollow'] ? ' rel="nofollow"' : '';

						$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
						$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
						if( $settings['team_style'] == '1' ){
			                echo '<!-- Single Item -->';
			                echo '<div class="col-md-6 col-lg-4">';
			                    echo '<div class="team-box">';
			                        echo '<div class="team-img">';

			                            if( ! empty( $data['team_image']['url'] ) ){
											echo malen_img_tag( array(
					                            'url'       => esc_url( $data['team_image']['url'] ),
					                        ) );
										}
			                            echo '<div class="team-content">';
			                            	if( ! empty( $data['name']) ){
						                        echo '<h3 class="team-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
						                    }
						                    if( ! empty( $data['designation']) ){
						                        echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
						                    }
			                            echo '</div>';
			                        echo '</div>';
			                       echo ' <div class="th-social" data-bg-src="'.esc_url( $settings['shape_image']['url'] ).'">';
			                            if( ! empty( $data['fb_link']['url']) ){
			                                echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
			                            }
			                            if( ! empty( $data['twitter_link']['url']) ){
			                                echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
			                            }
			                            if( ! empty( $data['instagram_link']['url']) ){
			                                echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['instagram_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
			                            }
			                            if( ! empty( $data['linkedin_link']['url']) ){
			                                echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
			                            }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }elseif( $settings['team_style'] == '2' ){
			            	
			            	echo '<div class="col-md-6 col-lg-4 col-xl-3">';
			                    echo '<div class="team-item">';
			                    	if( ! empty( $data['team_image']['url'] ) ){
				                        echo '<div class="team-img">';
				                            echo malen_img_tag( array(
					                            'url'       => esc_url( $data['team_image']['url'] ),
					                        ) );
				                        echo '</div>';
				                    }
			                        echo '<div class="team-content" data-bg-src="'.esc_url( $settings['shape_image']['url'] ).'">';
			                           	if( ! empty( $data['name']) ){
					                        echo '<h3 class="team-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
					                    }
			                            if( ! empty( $data['designation']) ){
					                        echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
					                    }
			                            echo '<div class="th-social">';
			                                if( ! empty( $data['fb_link']['url']) ){
				                                echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
				                            }
				                            if( ! empty( $data['twitter_link']['url']) ){
				                                echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
				                            }
				                            if( ! empty( $data['instagram_link']['url']) ){
				                                echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['instagram_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
				                            }
				                            if( ! empty( $data['linkedin_link']['url']) ){
				                                echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
				                            }
			                            echo '</div>';
			                        echo '</div>';
			                   echo ' </div>';
			               	echo ' </div>';
			            }else{
			            	echo '<div class="col-md-6 col-lg-4 col-xl-3">';
			                    echo '<div class="team-block">';
			                        echo '<div class="team-img">';

			                            if( ! empty( $data['team_image']['url'] ) ){
											echo malen_img_tag( array(
					                            'url'       => esc_url( $data['team_image']['url'] ),
					                        ) );
										}
			                            echo '<div class="team-content">';
			                            	if( ! empty( $data['name']) ){
						                        echo '<h3 class="team-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
						                    }
						                    if( ! empty( $data['designation']) ){
						                        echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
						                    }
						                    echo ' <div class="th-social" data-bg-src="'.esc_url( $settings['shape_image']['url'] ).'">';
					                            if( ! empty( $data['fb_link']['url']) ){
					                                echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
					                            }
					                            if( ! empty( $data['twitter_link']['url']) ){
					                                echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
					                            }
					                            if( ! empty( $data['instagram_link']['url']) ){
					                                echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['instagram_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
					                            }
					                            if( ! empty( $data['linkedin_link']['url']) ){
					                                echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
					                            }
					                        echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                  
			                    echo '</div>';
			                echo '</div>';
			            }
		            }  
	            echo '</div>';
            echo '</div>';	
		}
	}
}