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
 * Arrows Widget .
 *
 */
class malen_Arrows extends Widget_Base {

	public function get_name() {
		return 'malenarrows';
	}

	public function get_title() {
		return __( 'Slider Arrow', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'arrow_section',
			[
				'label'     => __( 'Slider Arrows', 'malen' ),
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
					'2'  		=> __( 'Style Two', 'malen' ),
				],
			]
		);

        $this->add_control(
			'arrow_id', [
				'label' 		=> __( 'Arrow ID', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'testiSlide' , 'malen' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );

        $this->end_controls_section();


        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		/*-----------------------------------------Arrow styling------------------------------------*/	

	}

	protected function render() {

    $settings = $this->get_settings_for_display();
    ?>
        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="icon-box style3">
				<button data-slick-prev="#<?php echo esc_attr($settings['arrow_id']) ?>" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
				<button data-slick-next="#<?php echo esc_attr($settings['arrow_id']) ?>" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
			</div>
			
        <?php else: ?>
			<div class="icon-box ">
				<button data-slick-prev="#<?php echo esc_attr($settings['arrow_id']) ?>" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
				<button data-slick-next="#<?php echo esc_attr($settings['arrow_id']) ?>" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
			</div>
        <?php endif;
			
	}
}