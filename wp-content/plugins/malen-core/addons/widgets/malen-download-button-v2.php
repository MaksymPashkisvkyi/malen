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
 * Download Button Box Widget .
 *
 */
class Mechon_Download_Button_Box extends Widget_Base {

	public function get_name() {
		return 'mechondownloadbutton';
	}

	public function get_title() {
		return __( 'Download Button V2', 'malen' );
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
				'label' 	=> __( 'Download Button', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'File Url', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'files',
			[
				'label' 		=> __( 'Files', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);
		
		
        
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        echo '<div class="widget widget_download style2">';
        	if( ! empty( $settings['title'] ) ){
	            echo '<h4 class="widget_title">'.esc_html( $settings['title'] ).'</h4>';
	        }
            echo '<div class="donwload-media-wrap">';
            	foreach( $settings['files'] as $data ) {
	                echo '<div class="download-media">';
	                    echo '<div class="download-media_icon"><i class="fal fa-file-pdf"></i></div>';
	                    echo '<div class="download-media_info">';
	                    	if( ! empty( $data['title'] ) ){
		                        echo '<h5 class="download-media_title">'.esc_html( $data['title'] ).'</h5>';
		                    }
	                        echo '<span class="download-media_text">'.esc_html__('Download', 'malen').'</span>';
	                    echo '</div>';
	                    if( ! empty( $data['url'] ) ){
		                    echo '<a href="'.esc_url($data['url']).'" class="download-media_btn"><i class="far fa-arrow-right"></i></a>';
		                }
	                echo '</div>';
	            }     
            echo '</div>';
        echo '</div>';
	}

}