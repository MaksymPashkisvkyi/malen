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
 * Menu Select Widget .
 *
 */
class Malen_Menu extends Widget_Base {

	public function get_name() {
		return 'malenmenuselect';
	} 
	public function get_title() {
		return __( 'Menu Select', 'malen' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Navigation Menu', 'malen' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$menus = $this->malen_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'malen_menu_select',
				[
					'label'     	=> __( 'Select malen Menu', 'malen' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'malen' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'malen' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'malen' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------


	}

    public function malen_menu_select(){ 
	    $malen_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'malen' );
	    foreach( $malen_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

	$settings = $this->get_settings_for_display();

        //Menu by menu select
        $malen_avaiable_menu   = $this->malen_menu_select();

        if( ! $malen_avaiable_menu ){
            return;
        }
        $args = [
            'menu' 		=> $settings['malen_menu_select'],
            'menu_class' 	=> 'malen-menu',
            'container' 	=> '',
        ];

        if( ! empty( $settings['malen_menu_select'] ) ){
            wp_nav_menu( $args );
        } 


	}

}