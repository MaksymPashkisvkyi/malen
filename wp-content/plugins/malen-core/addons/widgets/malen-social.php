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
 * Social Widget .
 *
 */
class malen_Social extends Widget_Base {

	public function get_name() {
		return 'malensocial';
	}

	public function get_title() {
		return __( 'Social Media', 'malen' );
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
				'label'     => __( 'Social Content', 'malen' ),
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
					// '2' 		=> __( 'Style Two', 'malen' ),
				],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'social_icon',
            [
				'label'         => __( 'Social Icon', 'malen' ),
				'description'         => __( 'Set socail icon class with tag', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Title' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

		$repeater->add_control(
			'social_link',
			[
				'label' 		=> esc_html__( 'Social Link', 'malen' ),
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
			'social_lists',
			[
				'label' 		=> __( 'Social Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' 		=> __( '<i class="fab fa-facebook-f"></i>', 'malen' ),
					],
					[
						'social_icon' 		=> __( '<i class="fab fa-skype"></i>', 'malen' ),
					],
				],
			]
		);

        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

        //-------------------------------------Social styling-------------------------------------//

        $this->start_controls_section(
            'social_section',
            [
                'label' => __( ' Social Style', 'malen' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );
	
        $this->add_control(
            'social_color',
            [
                'label' 		=> __( 'Color', 'malen' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .th-social.footer-social a'	=> 'color: {{VALUE}}!important;',
                ],
            ]
        );
        	
        $this->add_control(
            'social_bg_color',
            [
                'label' 		=> __( 'Background Color', 'malen' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .th-social.footer-social a'	=> 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_control(
            'social_border_color',
            [
                'label' 		=> __( 'Border Color', 'malen' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .th-social.footer-social a'	=> 'border-color: {{VALUE}}!important;',
                ],
                'separator' => 'after',
            ]
        );
        	
        $this->add_control(
            'social_h_color',
            [
                'label' 		=> __( 'Hover Color', 'malen' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .th-social.footer-social a:hover'	=> 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_control(
            'social_bg_h_color',
            [
                'label' 		=> __( 'Hover Background Color', 'malen' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .th-social.footer-social a:hover'	=> 'background-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_control(
            'social_h_border_color',
            [
                'label' 		=> __( 'Hover Border Color', 'malen' ),
                'type' 			=> Controls_Manager::COLOR,
                'selectors' 	=> [
                    '{{WRAPPER}} .th-social.footer-social a:hover'	=> 'border-color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_responsive_control(
			'social_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-social a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_section();

		

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		?>

        <?php if( $settings['layout_style'] == '2' ): ?>

        <?php else: ?>
            <div class="th-social footer-social">
                <?php  foreach( $settings['social_lists'] as $data ): ?>
                    <a href="<?php echo esc_url( $data['social_link']['url'] ); ?>"><?php echo wp_kses_post($data['social_icon']); ?></a>
                <?php endforeach; ?>
            </div>

        <?php endif;
        
	}
}