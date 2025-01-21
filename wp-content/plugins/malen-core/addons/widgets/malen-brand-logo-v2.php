<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Client Logo Widget .
 *
 */
class Mechon_Client_Logo extends Widget_Base {

	public function get_name() {
		return 'mechonclientlogo';
	}

	public function get_title() {
		return __( 'Client Logo V2', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Client Logo', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'client_logo_style',
			[
				'label' 		=> __( 'Client Logo Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options' 		=> [
					'one'  	=> __( 'Style One', 'malen' ),
					'two' 	=> __( 'Style Two', 'malen' ),
					'three' 	=> __( 'Style Three', 'malen' ),
				],
			]
		);
		$this->add_control(
			'show_slider',
			[
				'label' 		=> __( 'Show As Slider?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'malen' ),
				'label_off' 	=> __( 'Hide', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'client_logo_style' => [ 'two' ] ],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'client_logo',
			[
				'label' 	=> __( 'Client Logo', 'malen' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'logos',
			[
				'label' 		=> __( 'Client Logos', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);

        $this->end_controls_section();



	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!-----------------------Start partner Logo Slider----------------------->';
        echo '<div class="partner_logo_wrap">';
        if( $settings['client_logo_style'] == 'one' ) {
	        echo '<div class="row py-10 th-carousel" id="brandSlide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1">';
	        	foreach( $settings['logos'] as $singlelogo ) {
	                echo '<div class="col-auto brand-img">';
	                	echo malen_img_tag( array(
                            'url'   => esc_url( $singlelogo['client_logo']['url'] ),
                        ) );
	                echo '</div>';
		        } 
	        echo '</div>';
	    }elseif( $settings['client_logo_style'] == 'two' ){
	    	echo '<div class="brand-sec">';
		    	echo '<div class="container space-extra">';
			    	echo '<div class="row py-10 th-carousel" id="brandSlide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1">';
			        	foreach( $settings['logos'] as $singlelogo ) {
			                echo '<div class="col-auto brand-img">';
			                	echo malen_img_tag( array(
		                            'url'   => esc_url( $singlelogo['client_logo']['url'] ),
		                        ) );
			                echo '</div>';
				        } 
			        echo '</div>';
		        echo '</div>';
	        echo '</div>';
	    }else{
	    	echo '<div class="brand-sec2">';
		    	echo '<div class="container">';
			    	echo '<div class="row th-carousel" id="brandSlide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1">';
			        	foreach( $settings['logos'] as $singlelogo ) {
			                echo '<div class="col-auto brand-img">';
			                	echo malen_img_tag( array(
		                            'url'   => esc_url( $singlelogo['client_logo']['url'] ),
		                        ) );
			                echo '</div>';
				        } 
			        echo '</div>';
		        echo '</div>';
	        echo '</div>';
	    }
	    echo '</div>';
        echo '<!-----------------------End partner Logo Slider----------------------->';
	}
}