<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Gallery Widget .
 *
 */
class Malen_Gallery extends Widget_Base {

	public function get_name() {
		return 'malengallery';
	}

	public function get_title() {
		return __( 'Gallery', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Gallery', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
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
				],
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Gallery Slider', 'advoker' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

        $this->add_control(
			'gallery_icon',
            [
				'label'         => __( 'Gallery Icon', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '<i class="fab fa-instagram"></i>' , 'malen' ),
				'label_block'   => true,
				'rows' => '4',
			]
		);

		$this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------

        //-------------------------------------General styling-------------------------------------//
        $this->start_controls_section(
            'gallery_style_section',
            [
                'label' => __( 'Gallery Style', 'malen' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'gallery_overlay_color',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .sidebar-gallery .gallery-thumb:before',
			]
		);

		$this->add_control(
            'gallery_icon_color',
            [
                'label' 	=> __( 'Overlay Icon Color', 'malen' ),
                'type' 		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-gallery .gallery-btn' => 'color: {{VALUE}}!important;',
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
            <div class="sidebar-gallery">
                <?php foreach ( $settings['gallery'] as $single_data ): ?>
                <div class="gallery-thumb">
                        <?php echo malen_img_tag( array(
                            'url'   => esc_url( $single_data['url'] ),
                        ) ); ?>
                    <a href="<?php echo esc_url( $single_data['url'] ); ?>" class="gallery-btn popup-image"><?php echo wp_kses_post($settings['gallery_icon']) ?></a>
                </div>
                <?php endforeach; ?>
            </div>


    	<?php
    	endif;
	}

}