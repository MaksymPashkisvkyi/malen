<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Tab Builder Widget .
 *
 */
class Mechon_Tab_Builder extends Widget_Base {

	public function get_name() {
		return 'mechontabbuilder';
	}

	public function get_title() {
		return __( 'Tab Builder V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	protected function register_controls() {

		$this->start_controls_section(
			'tab_builder_section',
			[
				'label' 	=> __( 'Tab Builder', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Title', 'malen' )
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label' 	=> __( 'Subtitle', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Subtitle', 'malen' )
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'tab_builder_text',
			[
				'label' 	=> __( 'Tab Builder Title', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Ut fermentum massa justo', 'malen' )
			]
        );

		$repeater->add_control(
			'mechon_tab_builder_option',
			[
				'label'     => __( 'Tab Name', 'malen' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->mechon_tab_builder_choose_option(),
				'default'	=> ''
			]
		);

        $repeater->add_control(
			'make_it_active',
			[
				'label' 		=> __( 'Make It Active?', 'malen' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'malen' ),
				'label_off' 	=> __( 'No', 'malen' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'tab_builder_repeater',
			[
				'label' 		=> __( 'Tab', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_builder_text'    => __( 'Cardiology', 'malen' ),
					],
					[
						'tab_builder_text'    => __( 'Gastroenterologist', 'malen' ),
					],
					[
						'tab_builder_text'    => __( 'Neurology', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ tab_builder_text }}}',
			]
		);

        $this->end_controls_section();


    }

	public function mechon_tab_builder_choose_option(){

		$mechon_post_query = new WP_Query( array(
			'post_type'				=> 'mechon_tab_builder',
			'posts_per_page'	    => -1,
		) );

		$mechon_tab_builder_title = array();
		$mechon_tab_builder_title[''] = __( 'Select a Tab','Foodelio');

		while( $mechon_post_query->have_posts() ) {
			$mechon_post_query->the_post();
			$mechon_tab_builder_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $mechon_tab_builder_title;

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        	echo '<div class="tab-menu2-wrap" data-pos-for=".project-sec" data-sec-pos="bottom-half">';
		        echo '<div class="container">';
		            echo '<div class="row">';
		                echo '<div class="col-auto ms-sm-auto">';
		                    echo '<div class="nav tab-menu2" id="tab-menu2" role="tablist">';
		                    	foreach( $settings['tab_builder_repeater'] as $single_menu ){
				            		$title			= $single_menu['tab_builder_text'];
									$replace 		= array(' ',' - ');
									$with 			= array('-','-');
									$tabid 			= strtolower( str_replace( $replace, $with, $title ) );
									$active = $single_menu['make_it_active'] == 'yes' ? 'active':'';
									$area = $single_menu['make_it_active'] == 'yes' ? 'true':'false';
			                        echo '<button class="tab-btn '.$active.'" id="'.$tabid.'-tab" data-bs-toggle="tab" data-bs-target="#'.$tabid.'" type="button" role="tab" aria-controls="'.$tabid.'" aria-selected="'.$active.'">'.esc_html( $single_menu['tab_builder_text'] ).'<span class="project-count">06 Projects</span></button>';
			                    }
		                        
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		       	echo '</div>';
		    echo '</div>';
		    echo '<section class="project-sec bg-title space">';
		        echo '<div class="container">';
		           echo ' <div class="row justify-content-between align-items-center">';
		                echo '<div class="col-lg-6">';
		                   echo ' <div class="title-area text-center text-lg-start">';
		                   		if( !empty( $settings['title'] ) ) {
			                        echo '<span class="sub-title">'.esc_html( $settings['title'] ).'</span>';
			                    }
			                    if( !empty( $settings['subtitle'] ) ) {
			                        echo '<h2 class="sec-title text-white">'.esc_html( $settings['subtitle'] ).'</h2>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-lg-auto">';
		                    echo '<div class="sec-btn text-center">';
		                       echo '<div class="icon-box style4">';
		                            echo '<button data-slick-prev=".project-slide1" class="slick-arrow default"><i class="far fa-arrow-left"></i>'.esc_html__('Prev', 'malen').'</button>';
		                            echo '<button data-slick-next=".project-slide1" class="slick-arrow default">'.esc_html__('Next', 'malen').'<i class="far fa-arrow-right"></i></button>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="container">';
		            echo '<div class="tab-content project-tabcontent" id="project-tabContent">';
		            	foreach( $settings['tab_builder_repeater'] as $single_menu ){
		            		$title			= $single_menu['tab_builder_text'];
							$replace 		= array(' ',' - ');
							$with 			= array('-','-');
							$tabid 			= strtolower( str_replace( $replace, $with, $title ) );
							$active = $single_menu['make_it_active'] == 'yes' ? 'show active':'';
			                echo '<!-- Single item -->';
			                echo '<div class="tab-pane fade '.$active.'" id="'.$tabid.'" role="tabpanel" aria-labelledby="'.$tabid.'-tab">';
		                        $elementor = \Elementor\Plugin::instance();
		                        if( ! empty( $single_menu['mechon_tab_builder_option'] ) ){
		                            echo $elementor->frontend->get_builder_content_for_display( $single_menu['mechon_tab_builder_option'] );
		                        }
			                echo '</div>';
			            }

		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
	}
}