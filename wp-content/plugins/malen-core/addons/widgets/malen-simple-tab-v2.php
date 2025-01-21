<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class Mechon_Simple_Tab extends Widget_Base {

	public function get_name() {
		return 'mechonsimpletab';
	}

	public function get_title() {
		return __( 'Simple Tab V2', 'malen' );
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
				'label' 	=> __( 'Content', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
      
		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Tab Title', 'malen' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'malen' ),
			]
		);
		$repeater->add_control(
			'tab_image',
			[
				'label' 		=> __( 'Image', 'malen' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'content_text',
			[
				'label'     => __( 'Content Text', 'malen' ),
				'type'      => Controls_Manager::WYSIWYG,
				'default' 	=> __( 'Years Of Experience', 'malen' ),
			]
		);
		$repeater->add_control(
			'content_list',
			[
				'label'     => __( 'List Item', 'malen' ),
				'type'      => Controls_Manager::WYSIWYG,
				'default' 	=> __( 'Years Of Experience', 'malen' ),
			]
		);
		$this->add_control(
			'values',
			[
				'label' 		=> __( 'Counter', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Counter One', 'malen' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);
		$this->end_controls_section();
		/*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'tab_color',
			[
				'label' 		=> __( 'Tab Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu1 .indicator'	=> 'background-color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu1 .tab-btn'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_control(
			'title_hvr_color',
			[
				'label' 		=> __( 'Title Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu1 .tab-btn:hover'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> esc_html__( 'Title Typography', 'malen' ),
		 		'selector' 		=> '{{WRAPPER}} .tab-menu1 .tab-btn',
		 	]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu1 .tab-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu1 .tab-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        
	}

	protected function render() {

        $settings = $this->get_settings_for_display();



        echo '<div class="simple_tab">';
	        echo '<div class="container">';
	            echo '<div class="row">';
	                echo '<div class="col-lg-4">';
	                    echo '<div class="nav tab-menu1 indicator-active" id="tab-menu1" role="tablist">';
	                    	$x = 1;
			            	foreach( $settings['values'] as $data ){
			            		if( $x == '1' ){
									$is_active		= 'active';
									$ariaexpanded 	= 'true';
								}else{
									$is_active		= '';
									$ariaexpanded 	= 'false';
								}

								$info_title 	= strtolower( $data['title'] );
								$replace 		= array(' ','-',' - ');
								$with 			= array('','','');
								$final_data 	= str_replace( $replace, $with, $info_title );

		                        echo '<button class="tab-btn '.esc_attr($is_active).'" id="'.esc_attr( $final_data ).'-tab" data-bs-toggle="tab" data-bs-target="#'.esc_attr( $final_data ).'" type="button" role="tab" aria-controls="'.esc_attr( $final_data ).'" aria-selected="'.esc_attr($ariaexpanded).'">'.esc_html($data['title']).' <i class="fal fa-circle-arrow-right"></i></button>';
		                    $x++;
	                    	}
	                        
	                    echo '</div>';
	                echo '</div>';
	                echo '<div class="col-lg-8 align-self-center">';
	                    echo '<div class="tab-content why-tabcontent" id="why-tabContent">';
	                    	$x = 1;
			            	foreach( $settings['values'] as $data ){
			            		if( $x == '1' ){
									$is_active		= 'show active';
									$ariaexpanded 	= 'true';
								}else{
									$is_active		= '';
									$ariaexpanded 	= 'false';
								}

								$info_title 			= strtolower( $data['title'] );
								$replace 		= array(' ','-',' - ');
								$with 			= array('','','');
								$final_data 	= str_replace( $replace, $with, $info_title );
		                        echo '<!-- Single item -->';
		                        echo '<div class="tab-pane fade '.esc_attr($is_active).'" id="'.esc_attr( $final_data ).'" role="tabpanel" aria-labelledby="'.esc_attr( $final_data ).'-tab">';
		                        	if(!empty($data['tab_image']['url'])){
			                            echo '<div class="why-img">';
			                                echo malen_img_tag( array(
							                    'url'   => esc_url( $data['tab_image']['url']  ),
							                ));
			                            echo '</div>';
			                        }
			                        if( ! empty( $data['content_text'] ) ){
			                            echo '<div class="why-text">';
			                               echo wp_kses_post( $data['content_text'] ); 
			                            echo '</div>';
			                        }
			                        if( ! empty( $data['content_list'] ) ){
			                            echo wp_kses_post( $data['content_list'] ); 
			                        }
		                            

		                            
		                        echo '</div>';
		                        echo '<!-- Single item -->';
		                    $x++;
		                    }

	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
        echo '</div>';
	}

} 