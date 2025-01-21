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
 * Service-list Widget .
 *
 */
class Malen_Service_List extends Widget_Base {

	public function get_name() {
		return 'malenservicelist';
	}

	public function get_title() {
		return __( 'Services List', 'malen' );
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
				'label'     => __( 'Services List', 'malen' ),
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

		$this->add_control(
			'title',
				[
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'All Services' , 'malen' ),
				'label_block'   => true,
				]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'service-cate',
            [
				'label'         => __( 'Service List', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater->add_control(
			'service-icon',
            [
				'label'         => __( 'Service List', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '<i class="fa-regular fa-angles-right"></i>' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

		$repeater->add_control(
			'service-cate-link',
			[
				'label' 		=> esc_html__( 'Service List Link', 'malen' ),
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
			'service_lists',
			[
				'label' 		=> __( 'Services Lists', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service-cate' 		=> __( 'Accessories', 'malen' ),
					],
				],
			]
		);

        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//--------------------------------------- 

		//-------------------------------------Genearl styling-------------------------------------//
        $this->start_controls_section(
			'general_section',
			[
				'label' => __( ' General Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'general_bg',
			[
				'label' 	=> __( 'Background', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .th-cate-wrap' => 'background-color: {{VALUE}}!important;',
                ],
			]
        );	

		$this->add_control(
			'general_color2',
			[
				'label' 		=> __( 'Border Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-cate-wrap:before ' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-cate-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

		//---------------------------------------Title Style---------------------------------------//
		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'tayde' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'tayde' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'tayde' ),
				'selector' 	=> '{{WRAPPER}} .th-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'tayde' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'tayde' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Description Style---------------------------------------//
		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Category Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-cate-wrap li ' => '--title-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'desc_color2',
			[
				'label' 		=> __( 'Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-cate-wrap li a:hover' => '--white-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'desc_color3',
			[
				'label' 		=> __( 'Hover Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-cate-wrap li a' => '--theme-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Typography', 'malen' ),
				'selector' 	=> '{{WRAPPER}} .th-desc',
			]
		);

		$this->end_controls_section();

		

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		?>

        <?php if( $settings['layout_style'] == '2' ): ?>

        <?php else: ?>
            <div class="widget widget_categories th-cate-wrap ">
				<?php if(!empty($settings['title'])): ?>
                <h3 class="widget_title th-title"><?php echo esc_html($settings['title']) ?></h3>
				<?php endif; ?>
                <ul>
                    <?php  foreach( $settings['service_lists'] as $data ): ?>
                    <li>
                        <a href="<?php echo esc_url( $data['service-cate-link']['url'] ); ?>"><?php echo wp_kses_post($data['service-cate']); ?></a>
                        <?php echo wp_kses_post($data['service-icon']); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        <?php endif;
        
	}
}