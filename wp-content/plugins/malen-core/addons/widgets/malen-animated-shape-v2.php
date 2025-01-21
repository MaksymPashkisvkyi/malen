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
class Mechon_Animated_Image extends Widget_Base {

	public function get_name() {
		return 'mechonshapeimage';
	}

	public function get_title() {
		return __( 'Malen Animated Image v2', 'malen' );
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

		$this->add_control(
			'effect_style',
			[
				'label' 		=> esc_html__( 'Add Styling Attributes', 'malen' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
					'jump'  			=> esc_html__( 'Jumping Effect', 'malen' ),
					'jump-reverse'  	=> esc_html__( 'Jumping Reverse Effect', 'malen' ),
					'movingX'  			=> esc_html__( 'Moving Effect', 'malen' ),
					'moving'			=> esc_html__( 'Moving Reverse Effect', 'malen' ),
					'rotate'			=> esc_html__( 'Rotate Effect', 'malen' ),
					''					=> esc_html__( 'No Effect', 'malen' ),
				],
				'default' => [ 'jump'],
			]
		);
		$this->add_control(
			'from_top',
			[
				'label' 		=> __( 'Top', 'malen' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);
		$this->add_control(
			'from_left',
			[
				'label' 		=> __( 'Left', 'malen' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_right',
			[
				'label' 		=> __( 'Right', 'malen' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_bottom',
			[
				'label' 		=> __( 'Bottom', 'malen' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);

		$this->add_control(
			'responsive_style',
			[
				'label' 		=> esc_html__( 'Responsive Styling', 'malen' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT2,
				'multiple' 		=> true,
				'options' 		=> [
					'z-index-negative'  => esc_html__( 'Z Index Nagative', 'malen' ),
					'd-xl-block'  		=> esc_html__( 'Hide From large Device', 'malen' ),
					'd-lg-block'  		=> esc_html__( 'Hide From Tablet', 'malen' ),
					'd-md-block'  		=> esc_html__( 'Hide From Mobile', 'malen' ),
					'd-sm-block'  		=> esc_html__( 'D SM Block', 'malen' ),
					'd-none'  			=> esc_html__( 'Display None', 'malen' ),
					' '  				=> esc_html__( 'Default', 'malen' ),
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','shape-mockup');
        $this->add_render_attribute('wrapper','class', $settings['effect_style']);
        $this->add_render_attribute('wrapper','class', $settings['responsive_style']);

        if($settings['from_bottom']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-bottom', $settings['from_bottom']['size'] .'%' );
	    }
	    if($settings['from_top']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-top', $settings['from_top']['size'] .'%' );
	    }
	    if($settings['from_right']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-right', $settings['from_right']['size'] .'%' );
	    }
	    if($settings['from_left']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-left', $settings['from_left']['size'] .'%' );
	    }



        if( !empty( $settings['image']['id'] ) ) {
            echo '<!-- Image -->';
                echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					echo '<img src="'.esc_url( $settings['image']['url']).'" alt="'.esc_html( get_bloginfo('name') ).'" >';
                echo '</div>';
            echo '<!-- End Image -->';
        }
	}
}