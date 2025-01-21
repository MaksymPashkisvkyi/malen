<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * gallery filter Widget .
 *
 */
class Mechon_Gallery_Filter extends Widget_Base {

	public function get_name() {
		return 'mechongalleryfilter';
	}

	public function get_title() {
		return __( 'Malen Gallery V2', 'malen' );
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
			'gallery_style',
			[
				'label' 	=> __( 'Gallery Style', 'malen' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
				],
			]
		);    
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Gallery Slider', 'malen' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        if( $settings['gallery_style'] == '1' ){
	  		echo '<div class="row project-slide1 th-carousel" data-slide-show="2">';
	        foreach ( $settings['gallery'] as $single_data ) {
	            echo '<div class="col-lg-4">';
	                echo '<div class="project-item">';
	                    echo '<div class="project-img">';
	                        echo malen_img_tag( array(
	                            'url'   => esc_url( $single_data['url'] )
	                        ) );
	                        echo '<div class="shape"></div>';
	                        echo '<a href="'.esc_url( $single_data['url'] ).'" class="project-btn popup-image"><i class="fa-solid fa-arrow-up-right-and-arrow-down-left-from-center"></i></a>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';    
	        }
	        echo '</div>';
	    }else{
	    	echo '<div class="gallery-section">';
		    	echo '<div class="row gy-30 filter-active">';
	                foreach ( $settings['gallery'] as $single_data ) {
					    echo '<div class="col-xxl-auto col-md-6 filter-item">';
					        echo '<div class="project-box">';
					            echo '<div class="project-img">';
					                echo malen_img_tag( array(
			                            'url'   => esc_url( $single_data['url'] )
			                        ) );
					                echo '<div class="shape"></div>';
					                echo '<a href="'.esc_url( $single_data['url'] ).'" class="project-btn popup-image"><i class="far fa-eye"></i></a>';
					            echo '</div>';
					        echo '</div>';
					    echo '</div>';
					}  
				echo '</div>';
			echo '</div>';
	    }

	}

}