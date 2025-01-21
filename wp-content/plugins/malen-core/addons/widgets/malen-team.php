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
class malen_Team extends Widget_Base {

	public function get_name() {
		return 'malenteam';
	}

	public function get_title() {
		return __( 'Team', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'team_section',
			[
				'label'     => __( 'Team Content', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
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
			'arrow_id', [
				'label' 		=> __( 'Arrow ID', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'teamSlide1' , 'malen' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
        );

		// $this->add_control(
		// 	'make_it_slider',
		// 	[
		// 		'label' 		=> __( 'Make It Slider?', 'malen' ),
		// 		'type' 			=> Controls_Manager::SWITCHER,
		// 		'label_on' 		=> __( 'Yes', 'malen' ),
		// 		'label_off' 	=> __( 'No', 'malen' ),
		// 		'return_value' 	=> 'yes',
		// 		'default' 		=> 'yes',
		// 		// 'condition'	=> [
		// 		// 	'layout_style' => ['1', '2', '4', '5']
		// 		// ]
		// 	]
		// );

		$repeater = new Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lilar Dikeoa' , 'malen' ),
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
				'label' 		=> esc_html__( 'Member Image', 'malen' ),
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
			'team_lists',
			[
				'label' 		=> __( 'Member Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Mishel D. Marsh', 'malen' ),
					],
					[
						'name' 		=> __( 'Famhida Ruko Jon', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
			]
		);

        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		/*-----------------------------------------Team styling------------------------------------*/
		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Team Styling', 'malen' ),
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
						'{{WRAPPER}} .th-title a'	=> 'color: {{VALUE}}!important;',
					],
				]
	        );

			$this->add_control(
				'overview_title_color2',
				[
					'label' 		=> __( 'Hover Color', 'malen' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-title:hover a'	=> 'color: {{VALUE}}!important;',
					],
				]
	        );

	        $this->add_group_control(
			Group_Control_Typography::get_type(),
			 	[
					'name' 			=> 'overview_title_typography',
			 		'label' 		=> __( 'Typography', 'malen' ),
			 		'selector' 	=> '{{WRAPPER}} .th-title a',
				]
			);

	        $this->add_responsive_control(
				'overview_title_margin',
				[
					'label' 		=> __( 'Margin', 'malen' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
						'{{WRAPPER}} .th-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .th-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

			// if($settings['make_it_slider'] == 'yes'){
			// 	if( $settings['layout_style'] == '2' ){
			// 		$this->add_render_attribute( 'wrapper', 'class', 'row slider-shadow th-carousel arrow-wrap' );
			// 	}else{
			// 		$this->add_render_attribute( 'wrapper', 'class', 'row slider-shadow  th-carousel arrow-wrap' );
			// 	}
			// }else{
			// 	$this->add_render_attribute( 'wrapper', 'class', 'row gy-4 ' );
			// }
			?>

			<?php if( $settings['layout_style'] == '2' ): ?>
			<div class="row slider-shadow th-carousel arrow-wrap" id="teamSlide2" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">
				<?php foreach( $settings['team_lists'] as $data ): 
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
				?>
		        <div class="col-sm-6 col-lg-4 col-xxl-3">
                    <div class="th-team team-card">
                        <div class="team-img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['team_image']['url']  ),
							)); ?>
                        </div>
						<div class="team-card-content">
                            <div class="team-content">
								<h3 class="team-title box-title th-title"><a <?php echo wp_kses_post( $nofollow.$target ); ?> href="<?php echo esc_url( $data['profile_link']['url'] ); ?>"><?php echo esc_html($data['name']); ?></a></h3>
								<span class="team-desig"><?php echo esc_html($data['designation']); ?></span>
                            </div>
                            <div class="team-social">
                                <div class="icon-btn"><i class="fa-light fa-plus"></i></div>
                                <div class="th-social">
									<?php if( ! empty( $data['fb_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $f_nofollow.$f_target ); ?> href="<?php echo esc_url( $data['fb_link']['url'] ); ?>"><i class="fab fa-facebook-f"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['twitter_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $t_nofollow.$t_target ); ?>  href="<?php echo esc_url( $data['twitter_link']['url'] ); ?>"><i class="fab fa-twitter"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['instagram_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $i_nofollow.$i_target ); ?>  href="<?php echo esc_url( $data['instagram_link']['url'] ); ?>"><i class="fab fa-instagram"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['linkedin_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $l_nofollow.$l_target ); ?>  href="<?php echo esc_url( $data['linkedin_link']['url'] ); ?>"><i class="fab fa-linkedin-in"></i></a> 
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
			</div>

			<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="row gy-4">
				<?php foreach( $settings['team_lists'] as $data ): 
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
				?>
		        <div class="col-sm-6 col-lg-4 col-xxl-3">
                    <div class="th-team team-card">
                        <div class="team-img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['team_image']['url']  ),
							)); ?>
                        </div>
						<div class="team-card-content">
                            <div class="team-content">
								<h3 class="team-title box-title th-title"><a <?php echo wp_kses_post( $nofollow.$target ); ?> href="<?php echo esc_url( $data['profile_link']['url'] ); ?>"><?php echo esc_html($data['name']); ?></a></h3>
								<span class="team-desig"><?php echo esc_html($data['designation']); ?></span>
                            </div>
                            <div class="team-social">
                                <div class="icon-btn"><i class="fa-light fa-plus"></i></div>
                                <div class="th-social">
									<?php if( ! empty( $data['fb_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $f_nofollow.$f_target ); ?> href="<?php echo esc_url( $data['fb_link']['url'] ); ?>"><i class="fab fa-facebook-f"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['twitter_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $t_nofollow.$t_target ); ?>  href="<?php echo esc_url( $data['twitter_link']['url'] ); ?>"><i class="fab fa-twitter"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['instagram_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $i_nofollow.$i_target ); ?>  href="<?php echo esc_url( $data['instagram_link']['url'] ); ?>"><i class="fab fa-instagram"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['linkedin_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $l_nofollow.$l_target ); ?>  href="<?php echo esc_url( $data['linkedin_link']['url'] ); ?>"><i class="fab fa-linkedin-in"></i></a> 
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
			</div>

			<?php else: ?>
			<div class="row slider-shadow th-carousel teamSlide1  arrow-wrap" id="teamSlide1" data-slide-show="3"  data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1">
				<?php foreach( $settings['team_lists'] as $data ): 
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
				?>
                 <div class="col-sm-6 col-lg-4 col-xxl-3">
					<div class="th-team team-card">
						<div class="team-img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['team_image']['url']  ),
							)); ?>
						</div>
						<div class="team-card-content">
							<div class="team-content">
								<h3 class="team-title box-title th-title"><a <?php echo wp_kses_post( $nofollow.$target ); ?> href="<?php echo esc_url( $data['profile_link']['url'] ); ?>"><?php echo esc_html($data['name']); ?></a></h3>
								<span class="team-desig"><?php echo esc_html($data['designation']); ?></span>
							</div>
							<div class="team-social">
								<div class="icon-btn"><i class="fa-light fa-plus"></i></div>
								<div class="th-social">
									<?php if( ! empty( $data['fb_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $f_nofollow.$f_target ); ?> href="<?php echo esc_url( $data['fb_link']['url'] ); ?>"><i class="fab fa-facebook-f"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['twitter_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $t_nofollow.$t_target ); ?>  href="<?php echo esc_url( $data['twitter_link']['url'] ); ?>"><i class="fab fa-twitter"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['instagram_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $i_nofollow.$i_target ); ?>  href="<?php echo esc_url( $data['instagram_link']['url'] ); ?>"><i class="fab fa-instagram"></i></a> 
									<?php endif; ?>

									<?php if( ! empty( $data['linkedin_link']['url']) ): ?>
										<a <?php echo wp_kses_post( $l_nofollow.$l_target ); ?>  href="<?php echo esc_url( $data['linkedin_link']['url'] ); ?>"><i class="fab fa-linkedin-in"></i></a> 
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
            </div>

		<?php endif;
			
	}
}