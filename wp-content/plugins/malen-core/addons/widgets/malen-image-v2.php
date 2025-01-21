<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class Mechon_Image extends Widget_Base {

	public function get_name() {
		return 'mechonimage';
	}

	public function get_title() {
		return __( 'Malen Image V2', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Image', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' 			=> 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' 		=> 'large',
				'separator' 	=> 'none',
			]
		);

        $this->add_responsive_control(
			'image_align',
			[
				'label' 		=> __( 'Alignment', 'malen' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'malen' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'malen' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'malen' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' => [
					'{{WRAPPER}} .ad_img' => 'text-align: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'link',
			[
				'label' 		=> __( 'Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
                'show_external' => true,
				'default' 		=> [
					'url' 			=> '',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
        );
        
		$this->add_control(
			'image_wrapper_class',
			[
				'label'     => __( 'Image Wrapper Class', 'malen' ),
                'type'      => Controls_Manager::TEXT,
			]
        );
        $this->add_control(
			'show_vdo',
			[
				'label' 		=> __( 'Show Video Button?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'button_style',
			[
				'label' 		=> __( 'Play Button Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  	=> __( 'Style One', 'malen' ),
					'two' 	=> __( 'Style Two', 'malen' ),
					'three' 	=> __( 'Style Three', 'malen' ),
				],
				'condition'		=> [ 'show_vdo' => [ 'yes' ] ],
			]
		);
        $this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Url', 'malen' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
                'show_external' => true,
				'default' 		=> [
					'url' 			=> '',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'show_vdo' => [ 'yes' ] ],
			]
        );
		$this->add_control(
			'image_class',
			[
				'label'     => __( 'Image Class', 'malen' ),
                'type'      => Controls_Manager::TEXT,
			]
        );
        $this->end_controls_section();


        $this->start_controls_section(
			'image_style_section',
			[
				'label' 	=> __( 'Image Style', 'malen' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'width',
			[
				'label' 	=> __( 'Width', 'malen' ),
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'unit' 		=> '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ad_img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' 	=> __( 'Max Width', 'malen' ) . ' (%)',
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'unit' 		=> '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ad_img img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'height',
			[
				'label' 	=> __( 'Height', 'malen' ),
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'unit' 		=> '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ad_img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' 	=> Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'image_border',
				'selector' 	=> '{{WRAPPER}} .ad_img img',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .ad_img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'image_box_shadow',
				'exclude' 	=> [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .ad_img img',
			]
		);

		$this->end_controls_section();
		//-------------------------------video button styling------------------------------- //

		$this->start_controls_section(
			'video_btn_style_section',
			[
				'label' 	=> __( 'Video Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_vdo' => [ 'yes' ] ],
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Video Button Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn' => 'color: {{VALUE}}!important;',
                ]
			]
        );
        $this->add_control(
			'video_btn_bg_color',
			[
				'label' 	=> __( 'Button Background Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );
        $this->add_control(
			'video_btn_bg_hvr_color',
			[
				'label' 	=> __( 'Button Background Hover Color', 'malen' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn:hover' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','ad_img');

        $this->add_render_attribute('wrapper','class',esc_attr( $settings['image_wrapper_class'] ));

        if( !empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute('link','href',esc_url( $settings['link']['url'] ));
        }

        if( !empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute('link','rel', 'nofollow' );
        }

        if( !empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute('link','target','_blank');
        }

        if( !empty( $settings['image']['id'] ) ) {
            echo '<!-- Image -->';
                echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					if( ! empty( $settings['link']['url'] ) ){
	                    echo '<a '.$this->get_render_attribute_string('link').'>';
					}

					echo '<img class="'.esc_attr( $settings['image_class'] ).'" src="'.esc_url( Group_Control_Image_Size::get_attachment_image_src($settings['image']['id'],'image',$settings) ).'" alt="'.esc_attr( malen_image_alt( Group_Control_Image_Size::get_attachment_image_src($settings['image']['id'],'image',$settings) ) ).'" >';

					if( ! empty( $settings['link']['url'] ) ){
	                   echo '</a>';
					}
					if($settings['show_vdo'] == 'yes'){
						if( $settings['button_style'] == 'one' ) {
							$class = 'video-btn popup-video';
						}elseif( $settings['button_style'] == 'three' ){
							$class = 'play-btn style2 popup-video';
						}else{
							$class = 'play-btn popup-video';
						}

						if( !empty( $settings['video_link']['url'] ) ) {
							echo '<a href="'.esc_url($settings['video_link']['url']).'" class="'.esc_attr($class).'"><i class="fas fa-play"></i></a>';
						}						
					}
                echo '</div>';
            echo '<!-- End Image -->';
        }
	}

}