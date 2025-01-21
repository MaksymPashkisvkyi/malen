<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Product Widget .
 *
 */
class Mechon_Product_Slider extends Widget_Base {

	public function get_name() {
		return 'mechonproductslider';
	}

	public function get_title() {
		return __( 'Product Slider V2', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'product_slider_section',
			[
				'label' 	=> __( 'Product Slider', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		
        $this->add_control(
			'product_count',
			[
				'label' 		=> __( 'Product Count', 'malen' ),
				'type' 			=> Controls_Manager::NUMBER,
				'min' 			=> 1,
				'max' 			=> 50,
				'step' 			=> 1,
				'default' 		=> 6,
			]
		);

        $this->add_control(
			'product_cats',
			[
				'label' 		=> __( 'Product Categories', 'malen' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
                'label_block'   => true,
                'options' 		=> $this->product_cats_get(),
			]
        );

		$this->end_controls_section();
    }

    protected function product_cats_get() {
        $terms = get_terms( array( 'taxonomy' => 'product_cat' ) );
        $term_array = array();
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            foreach ( $terms as $term ) {
                $term_array[$term->slug] = $term->name;
            }
        }

        return $term_array;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();


        $args = array(
            "post_type" 		=> "product",
            "posts_per_page"    => esc_attr( $settings['product_count'] )
		);

		$args['order'] 		= 'ASC';
		$args['orderby'] 	= 'title';

        if( ! empty( $settings['product_cats'] ) ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $settings['product_cats'],
                ),
            );
        }

        $prods = new WP_Query( $args );
		
		echo '<div class="th-product-wrapper arrow-wrap">';
	        echo '<div class="row th-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">';
	            while( $prods->have_posts() ) { 
	                $prods->the_post();
					echo '<div class="col-xl-3 col-lg-4 col-sm-6">';
						wc_get_template( 'content-product.php' );
					echo '</div>';
	            }
	            wp_reset_postdata();
	        echo '</div>';
	    echo '</div>';
	}
}