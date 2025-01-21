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
 * Contact Tab Widget .
 *
 */
class Mechon_Contact_Tab_Box extends Widget_Base {

	public function get_name() {
		return 'mechoncontacttab';
	}

	public function get_title() {
		return __( 'Contact Tab V2', 'malen' );
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
				'label' 	=> __( 'Contact Tab', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'branch',
			[
				'label'     => __( 'Branch Name', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'phone_contact_label',
			[
				'label'     => __( 'Phone Label', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'phone_contact_info',
			[
				'label'     => __( 'Phone Info', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'phone_icon',
			[
				'label'     => __( 'Icon Class For Phone', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'phone_image',
			[
				'label' 		=> __( 'Choose Image For Phone', 'malen' ),
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
			'email_contact_label',
			[
				'label'     => __( 'Email Label', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'email_contact_info',
			[
				'label'     => __( 'Email Info', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'email_icon',
			[
				'label'     => __( 'Icon Class For Email', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'email_image',
			[
				'label' 		=> __( 'Choose Image For Email', 'malen' ),
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
			'address_contact_label',
			[
				'label'     => __( 'Address Label', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'address_contact_info',
			[
				'label'     => __( 'Address Info', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'address_icon',
			[
				'label'     => __( 'Icon Class For Address', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'address_image',
			[
				'label' 		=> __( 'Choose Image For Address', 'malen' ),
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
			'branches',
			[
				'label' 		=> __( 'Branches', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'branch' 		=> __( 'Comilla', 'malen' ),
					],
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();




        echo '<div class="nav tab-menu3" id="tab-menu3" role="tablist">';
        	$x = 1;
        	foreach( $settings['branches'] as $data ){
        		if( $x == '1' ){
					$is_active		= 'active';
					$ariaexpanded 	= 'true';
				}else{
					$is_active		= '';
					$ariaexpanded 	= 'false';
				}

				$info_title 	= strtolower( $data['branch'] );
				$replace 		= array(' ','-',' - ');
				$with 			= array('','','');
				$final_data 	= str_replace( $replace, $with, $info_title );

	            echo '<button class="th-btn '.esc_attr($is_active).'" id="'.esc_attr( $final_data ).'-tab" data-bs-toggle="tab" data-bs-target="#'.esc_attr( $final_data ).'" type="button" role="tab" aria-controls="'.esc_attr( $final_data ).'" aria-selected="'.esc_attr($ariaexpanded).'">'.esc_html($data['branch']).'</button>';
	        $x++;
			}

        echo '</div>';
        echo '<div class="tab-content">';

        	$x = 1;
        	foreach( $settings['branches'] as $data ){
        		if( $x == '1' ){
					$is_active		= 'show active';
					$ariaexpanded 	= 'true';
				}else{
					$is_active		= '';
				}

				$info_title 			= strtolower( $data['branch'] );
				$replace 		= array(' ','-',' - ');
				$with 			= array('','','');
				$final_data 	= str_replace( $replace, $with, $info_title );
	        	echo '<!-- Single item -->';
	            echo '<div class="tab-pane fade '.esc_attr($is_active).'" id="'.esc_attr( $final_data ).'" role="tabpanel" aria-labelledby="'.esc_attr( $final_data ).'-tab">';
	                echo '<div class="row gy-30 justify-content-center">';
	                	if( ! empty( $data['phone_contact_label'] ) ){
		                    echo '<div class="col-md-6 col-lg-4">';
		                        echo '<div class="contact-box">';
		                        	if( ! empty( $data['phone_image']['url'] ) ){
			                            echo '<div class="contact-box_img">';
			                                echo malen_img_tag( array(
												'url'   => esc_url( $data['phone_image']['url'] ),
											) );
			                            echo '</div>';
			                        }
		                            echo '<div class="contact-box_content">';
		                            	if( ! empty( $data['phone_icon'] ) ){
			                                echo '<div class="contact-box_icon">'.wp_kses_post( $data['phone_icon'] ).'</div>';
			                            }
		                                echo '<div class="contact-box_info">';
		                                    echo '<p class="contact-box_text">'.esc_html($data['phone_contact_label']).'</p>';
		                                    if( ! empty( $data['phone_contact_info'] ) ){
			                                    echo '<h5 class="contact-box_link"><a href="tel:'.esc_attr($data['phone_contact_info']).'">'.esc_html($data['phone_contact_info']).'</a></h5>';
			                                }
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                }
		                if( ! empty( $data['email_contact_label'] ) ){
		                    echo '<div class="col-md-6 col-lg-4">';
		                        echo '<div class="contact-box">';
		                        	if( ! empty( $data['email_image']['url'] ) ){
			                            echo '<div class="contact-box_img">';
			                                echo malen_img_tag( array(
												'url'   => esc_url( $data['email_image']['url'] ),
											) );
			                            echo '</div>';
			                        }
		                            echo '<div class="contact-box_content">';
		                            	if( ! empty( $data['email_icon'] ) ){
			                                echo '<div class="contact-box_icon">'.wp_kses_post( $data['email_icon'] ).'</div>';
			                            }
		                                echo '<div class="contact-box_info">';
		                                    echo '<p class="contact-box_text">'.esc_html($data['email_contact_label']).'</p>';
		                                    if( ! empty( $data['email_contact_info'] ) ){
			                                    echo '<h5 class="contact-box_link"><a href="mailto:'.esc_attr($data['email_contact_info']).'">'.esc_html($data['email_contact_info']).'</a></h5>';
			                                }
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                }
		                if( ! empty( $data['address_contact_label'] ) ){
		                    echo '<div class="col-md-6 col-lg-4">';
		                        echo '<div class="contact-box">';
		                        	if( ! empty( $data['address_image']['url'] ) ){
			                            echo '<div class="contact-box_img">';
			                                echo malen_img_tag( array(
												'url'   => esc_url( $data['address_image']['url'] ),
											) );
			                            echo '</div>';
			                        }
		                            echo '<div class="contact-box_content">';
		                            	if( ! empty( $data['address_icon'] ) ){
			                                echo '<div class="contact-box_icon">'.wp_kses_post( $data['address_icon'] ).'</div>';
			                            }
		                                echo '<div class="contact-box_info">';
		                                    echo '<p class="contact-box_text">'.esc_html($data['address_contact_label']).'</p>';
		                                    if( ! empty( $data['address_contact_info'] ) ){
			                                    echo '<h5 class="contact-box_link">'.esc_html($data['address_contact_info']).'</h5>';
			                                }
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                }
	                echo '</div>';
	            echo '</div>';
	            echo '<!-- Single item -->';
	        $x++;
			}

            
        echo '</div>';    
	}

}