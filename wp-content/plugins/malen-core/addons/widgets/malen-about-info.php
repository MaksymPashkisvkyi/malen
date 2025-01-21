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
 * About Info Widget .
 *
 */
class Malen_About_Info extends Widget_Base {

	public function get_name() {
		return 'malenaboutinfo';
	}

	public function get_title() {
		return __( 'About Info', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {


		 $this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'About Info', 'malen' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Layout Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'malen' ),				
					'2'  		=> __( 'Style Two', 'malen' ),				
					// '3'  		=> __( 'Style Three', 'malen' ),				
					// '4'  		=> __( 'Style Four', 'malen' ),				
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => __( 'Image', 'malen' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		
        $this->add_control(
			'logo_link',
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
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);

		$this->add_control(
			'desc',
            [
				'label'         => __( 'Description', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Description here' , 'malen' ),
				'label_block'   => true,
				'rows' => '4',
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'social_icon',
            [
				'label'         => __( 'Social Icon', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '<i class="fab fa-facebook-f"></i>' , 'malen' ),
				'label_block'   => true,
				'rows' => '4',
			]
		);


        $repeater->add_control(
			'social_link',
			[
				'label' 		=> esc_html__( 'Social Link', 'souler' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'souler' ),
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
				'label' 		=> __( 'Social Lists', 'souler' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'condition' => [
					'layout_style' => ['1', '2']
				]
			]
		);


        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

        //-------------------------------------Content styling-------------------------------------//
        $this->start_controls_section(
			'section_desc_style_section',
			[
				'label' => __( 'Content Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_desc_typography',
				'label' 	=> __( 'Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th-desc',
			]
        );

        $this->add_responsive_control(
			'section_desc_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_desc_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>

        <?php if( $settings['layout_style'] == '3' ): ?>
			<div class="btn-group mt-45">
				<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="th-btn"><?php echo wp_kses_post($settings['button_text']); ?></a>
				<div class="about-profile">
					<div class="about-avater">
						<?php echo malen_img_tag( array(
								'url'   => esc_url( $settings['image']['url']  ),
							)); ?>
					</div>
					<div class="media-body">
						<h6 class="title"><?php echo esc_html( $settings['title'] ); ?></h6>
						<span class="desig"><?php echo esc_html( $settings['desc'] ); ?></span>
					</div>
				</div>
            </div>

        <?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="profile-wrap">
				<div class="about-profile style2">
					<div class="avater">
						<?php echo malen_img_tag( array(
								'url'   => esc_url( $settings['image']['url']  ),
							)); ?>
					</div>
					<div class="media-body">
						<h6 class="title"><?php echo esc_html( $settings['title'] ); ?></h6>
						<span class="desig"><?php echo esc_html( $settings['desc'] ); ?></span>
					</div>
				</div>
				<div class="signature">
						<?php echo malen_img_tag( array(
							'url'   => esc_url( $settings['image2']['url']  ),
						)); ?>
				</div>
			</div>
			
    	<?php else: 
			if( $settings['layout_style'] == '2' ){
				$class = 'style2';
			}else{
				$class = '';
			}
		?>
			<div class="widget footer-widget">
				<div class="th-widget-about <?php echo esc_attr($class); ?>">
					<div class="about-logo">
						<a href="<?php echo esc_url( $settings['logo_link']['url'] ); ?>">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $settings['image']['url']  ),
							)); ?>
						</a>
					</div>
					<p class="about-text th-desc"><?php echo esc_html( $settings['desc'] ); ?></p>
					<div class="th-social">
						<?php foreach( $settings['social_lists'] as $data ):?>
							<a href="<?php echo esc_url( $data['social_link']['url'] ); ?>"><?php echo wp_kses_post($data['social_icon']) ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		<?php endif;

	}

}
