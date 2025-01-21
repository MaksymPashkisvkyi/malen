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
 * Price Box Widget .
 *
 */
class Mechon_Price_Box extends Widget_Base {

	public function get_name() {
		return 'mechonpricebox';
	}

	public function get_title() {
		return __( 'Price Box V2', 'malen' );
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
				'label' 	=> __( 'Price Box', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'price_style',
			[
				'label' 		=> __( 'Price Style', 'malen' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'malen' ),
					'2' 		=> __( 'Style Two', 'malen' ),
				],
				'separator'		=> 'after'
			]
		);
		$this->add_control(
			'title',
			[
				'label'     => __( 'Package Name', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
				'default' 		=> __( 'Premium Package' , 'malen' ),
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
				'default' 		=> __( 'Pricing plan for startup company' , 'malen' ),
			]
        );
        $this->add_control(
			'price',
			[
				'label'     => __( 'Price', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
				'default' 		=> __( '$199.00' , 'malen' ),
			]
        );	
        $this->add_control(
			'duration',
			[
				'label'     => __( 'Duration', 'malen' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
				'default' 		=> __( 'Yearly' , 'malen' ),
			]
        );
		$this->add_control(
			'icon',
			[
				'label' 		=> __( 'Icon Class', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="fas fa-ticket"></i>' , 'malen' ),
				'label_block' 	=> true,
				
			]
		);

        $this->add_control(
			'package_feature',
			[
				'label'     => __( 'Features', 'malen' ),
                'type'      => Controls_Manager::WYSIWYG,
				'condition'	=> [
					'price_style' => '1'
				]
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'price_package_feature',
			[
				'label'         => __( 'Package Feature', 'malen' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Feature Name' , 'malen' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'price_package_features',
			[
				'label' 		=> __( 'Package Features', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'separator'		=> 'before',
				'default' 		=> [
					[
						'price_package_feature' 	=> esc_html__( 'Rims & Tire Change', 'malen' ),
					],
			
					[
						'price_package_feature' 	=> esc_html__( 'Interior Cleaning', 'malen' ),
					],
			
				],
				'title_field' 	=> '{{price_package_feature}}',
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'malen' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'malen' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'malen' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);	

        $this->end_controls_section();

        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'malen' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( 'Box Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-item .price-card_header' => '--title-color: {{VALUE}}!important',
                ],
			]
        );
        $this->add_control(
			'bg_hvr_color',
			[
				'label' 		=> __( 'Box Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-item' => '--theme-color: {{VALUE}}!important',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['price_style'] == '2'): ?>
			<div class="price-item style2">
				<div class="price-item_header">
					<?php if(!empty($settings['title'])): ?>
					<h3 class="price-item_title"><?php echo esc_html($settings['title']); ?></h3>
					<?php endif; ?>
					<?php if(!empty($settings['subtitle'])): ?>
					<p class="price-item_subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
					<?php endif; ?>
				</div>
				<?php if(!empty($settings['price'])): ?>
				<div class="price-item_price">
					<span class="price">
						<?php echo esc_html($settings['price']); ?>
						<?php if(!empty($settings['duration'])): ?>
						<span class="package-duration">/<?php echo esc_html($settings['duration']); ?></span>
						<?php endif; ?>
					</span>
					<?php 
						if(!empty($settings['icon'])){
							echo wp_kses_post( $settings['icon'] );
						}
					 ?>
				</div>
				<?php endif; ?>
				<div class="price-item_content">
					<div class="checklist">
						<ul>
							<?php foreach($settings['price_package_features'] as $data): ?>
							<li><?php echo esc_html($data['price_package_feature']); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php if(!empty($settings['button_text'])): ?>
						<a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="th-btn"><?php echo esc_html($settings['button_text']); ?></a>
					<?php endif; ?>
				</div>
			</div>
		<?php else: 
			 echo '<div class="price-item">';
			 echo '<div class="price-item_header">';
				 if(!empty($settings['title'])){
					 echo '<h3 class="price-item_title">'.esc_html($settings['title']).'</h3>';
				 }
				 if(!empty($settings['subtitle'])){
					 echo '<p class="price-item_subtitle">'.esc_html($settings['subtitle']).'</p>';
				 }
			 echo '</div>';
			 echo '<div class="price-item_price">';
				 if(!empty($settings['price'])){
					 echo '<span class="price">';
						 echo wp_kses_post( $settings['price'] ); 
					 echo '</span>';
				 }
				 if(!empty($settings['icon'])){
					 echo wp_kses_post( $settings['icon'] ); 
				 }
			 echo '</div>';
			 echo '<div class="price-item_content">';
				 if(!empty($settings['package_feature'])){
					 echo '<div class="checklist">';
						 echo wp_kses_post( $settings['package_feature'] ); 
					 echo '</div>';
				 }
				 if( ! empty( $settings['button_text'] ) ){
					 echo '<a href="'.esc_url( $settings['button_link']['url'] ).'" class="th-btn">'.esc_html( $settings['button_text'] ).'</a>';
				 }
			 echo '</div>';
		 echo '</div>';
			
		endif;

       
	}

}