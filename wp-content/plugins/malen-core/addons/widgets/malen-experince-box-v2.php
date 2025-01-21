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
 * Experince Box Widget .
 *
 */
class Mechon_Experince_Box extends Widget_Base {

	public function get_name() {
		return 'mechonexperiencebox';
	}

	public function get_title() {
		return __( 'Experince Box v2', 'malen' );
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
				'label'     => __( 'Experince Box', 'malen' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'exp_style',
			[
				'label' 	=> __( 'Chose Style', 'malen' ),
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
			'exp_title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Title' , 'malen' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'exp_years',
            [
				'label'         => __( 'Years Of Experience', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '32' , 'malen' ),
				'label_block'   => true,
			]
		);
		
		$this->add_control(
			'thumb_image',
			[
				'label' 		=> __( 'Thumb Image 1', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'exp_style' => ['1','3'],
				]
			]
		);
		$this->add_control(
			'thumb_image2',
			[
				'label' 		=> __( 'Thumb Image 2', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'exp_style' => ['3'],
				]
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Background Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'exp_style' => ['1','2'],
				]
			]
		);
        $this->end_controls_section();

 /*-----------------------------------------Step styling------------------------------------*/

		$this->start_controls_section(
			'ex_general_style',
			[
				'label' 	=> __( 'General Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'ex_background',
			[
				'label' 		=> __( 'Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-experience.style3' => 'background-color: {{VALUE}}',
                ]
			]
        );
         $this->add_responsive_control(
		'ex_padding',
			[
				'label' 	=> __( 'Padding', 'malen' ),
				'type' 	=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-experience.style3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'{{WRAPPER}} .th-experience.style3 .experience-year'	=> 'color: {{VALUE}}!important;',
			],
		]
        );
		$this->add_group_control(
	Group_Control_Typography::get_type(),
	 	[
			'name' 	=> 'title_typography',
	 		'label' 	=> __( 'Typography', 'malen' ),
	 		'selector' 	=> '{{WRAPPER}} .th-experience.style3 .experience-year',
		]
	);

         $this->end_controls_section();

          $this->start_controls_section(
		'experience_styling',
			[
				'label' 	=> __( 'Experince Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

	  $this->add_control(
		'experience_color',
		[
			'label' 		=> __( 'Color', 'malen' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> [
				'{{WRAPPER}} .th-experience.style3 .experience-text'	=> 'color: {{VALUE}}!important;',
			],
		]
        );
		$this->add_group_control(
	Group_Control_Typography::get_type(),
	 	[
			'name' 	=> 'experience_typography',
	 		'label' 	=> __( 'Typography', 'malen' ),
	 		'selector' 	=> '{{WRAPPER}} .th-experience.style3 .experience-text',
		]
	);

         $this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		echo '<!-----------------------Start Experince Box Area----------------------->';
			if( $settings['exp_style'] == '2' ):
			
			echo '<div class="th-experience style2 background-image" data-bg-src="'.esc_url( $settings['bg_image']['url'] ).'">';
			if(!empty($settings['exp_years'])){
				echo '<h3 class="experience-year"><span class="counter-number">'.esc_html($settings['exp_years']).'</span></h3>';
			}
			if(!empty($settings['exp_title'])){
				echo '<h4 class="experience-text">'.esc_html($settings['exp_title']).'</h4>';
			}
	        echo '</div>';
		?>

		<?php elseif( $settings['exp_style'] == '3' ): ?>
			<div class="img-box-3">
				<?php if(!empty($settings['thumb_image']['url'])): ?>
				<div class="img1">
					<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['thumb_image']['url']  ),
						));
					 ?>
				</div>
				<?php endif; ?>
				<div class="img2">
					<div class="th-experience style3">
						<?php if(!empty($settings['exp_years'])): ?>
						<h3 class="experience-year"><span class="counter-number"><?php echo esc_html($settings['exp_years']); ?></span>+</h3>
						<?php endif; ?>
						<?php if(!empty($settings['exp_title'])): ?>
						<h4 class="experience-text"><?php echo esc_html($settings['exp_title']); ?></h4>
						<?php endif; ?>
					</div>
					<?php if(!empty($settings['thumb_image2']['url'])){
						echo malen_img_tag( array(
							'url'   => esc_url( $settings['thumb_image2']['url']  ),
						));
					} ?>
				</div>
			</div>
		<?php else: 
			echo '<div class="appointment-img">';
	        	if(!empty($settings['thumb_image']['url'])){
	                echo malen_img_tag( array(
	                    'url'   => esc_url( $settings['thumb_image']['url']  ),
	                ));
	            }
	            echo '<div class="th-experience" data-bg-src="'.esc_url( $settings['bg_image']['url'] ).'">';
	            	if(!empty($settings['exp_years'])){
		                echo '<h3 class="experience-year"><span class="counter-number">'.esc_html($settings['exp_years']).'</span>+</h3>';
		            }
		            if(!empty($settings['exp_title'])){
		                echo '<h4 class="experience-text">'.esc_html($settings['exp_title']).'</h4>';
		            }
	            echo '</div>';
	        echo '</div>';

		 endif; 

		 echo '<!-----------------------Start Experince Box Area----------------------->';	

	}

}