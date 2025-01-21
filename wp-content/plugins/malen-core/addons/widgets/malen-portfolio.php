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
 * Portfolio Widget .
 *
 */
class Malen_Portfolio extends Widget_Base {

	public function get_name() {
		return 'malenportfolio';
	}

	public function get_title() {
		return __( 'Portfolio', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		 $this->start_controls_section(
			'portfolio_section',
			[
				'label'     => __( 'portfolios', 'malen' ),
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
					'3'  		=> __( 'Style Three', 'malen' ),
					'4'  		=> __( 'Style Four', 'malen' ),
				],
			]
		);
		
        $this->add_control(
			'arrow_id', [
				'label' 		=> __( 'Arrow ID', 'malen' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'ProjectSlide2' , 'malen' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> [
					'layout_style' => ['2', '3']
				]	
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'portfolio_img',
			[
				'label' 		=> __( 'Choose Image', 'malen' ),
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
			'portfolio_cate',
            [
				'label'         => __( 'Category', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Car repaired' , 'malen' ),
				'label_block'   => true,
				'rows' => '2'
			]
		);

        $repeater->add_control(
			'portfolio_title',
            [
				'label'         => __( 'Title', 'malen' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Engine Repaired' , 'malen' ),
				'label_block'   => true,
				'rows' => '3'
			]
		);

        $repeater->add_control(
			'portfolio_link',
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

		$this->add_control(
			'portfoliolist',
			[
				'label' 		=> __( 'portfolio List', 'malen' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'portfolio_cate'	=> __( 'Car repaired', 'malen' ),
					],
				],
			]
		);
		
        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//---------------------------------------Subtitle Style---------------------------------------//
		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Subtitle Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'color: {{VALUE}}',
				],
			]
		);	

		$this->add_control(
			'subtitle_color2',
			[
				'label' 		=> __( 'Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'background: {{VALUE}}',
				],
			]
		);	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Typography', 'malen' ),
				'selector' 	=> '{{WRAPPER}} .th-sub',
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		//---------------------------------------Title Style---------------------------------------//
		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'tayde' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'tayde' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'title_color2',
			[
				'label' 		=> __( 'Background', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .media-left' => 'background: {{VALUE}}',
				],
			]
		);	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Typography', 'tayde' ),
				'selector' 	=> '{{WRAPPER}} .th-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'tayde' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'tayde' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();
		


	}

	protected function render() {

        $settings = $this->get_settings_for_display(); 
        ?>

        <?php if( $settings['layout_style'] == '2' ): ?>
			<div class="row th-carousel project-slider-2" id="<?php echo esc_attr($settings['arrow_id']) ?>" data-slide-show="1" data-xl-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-center-mode="true" data-xl-center-mode="true">
				<?php foreach( $settings['portfoliolist'] as $data ): ?>
				<div class="col-xl-4 col-xxl-3">
					<div class="project-card style2">
						<div class="project-img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
						</div>
						<div class="project-content">
							<div class="media-left">
								<h6 class="project-subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></h6>
								<h4 class="project-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		<?php elseif( $settings['layout_style'] == '3' ): ?>
			<div class="row  th-carousel projectSlider3" id="<?php echo esc_attr($settings['arrow_id']) ?>" data-slide-show="1" data-xl-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-center-mode="true" data-xl-center-mode="true">
				<?php foreach( $settings['portfoliolist'] as $data ): ?>
                <div class="col-lg-4 col-xl-3">
                    <div class="project-card style2">
                        <div class="project-img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
                        </div>
                        <div class="project-content">
                            <div class="media-left">
                                <h6 class="project-subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></h6>
                                <h4 class="project-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

		<?php elseif( $settings['layout_style'] == '4' ): ?>
			<div class="row gy-4">
				<?php foreach( $settings['portfoliolist'] as $data ): ?>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="project-card style2">
                        <div class="project-img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
                        </div>
                        <div class="project-content">
                            <div class="media-left">
                                <h6 class="project-subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></h6>
                                <h4 class="project-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>

    	<?php else: ?>
			<div class="row th-carousel project-slider-1" id="projectSlider1" data-slide-show="1" data-xl-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-center-mode="true" data-xl-center-mode="true" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true">
				<?php foreach( $settings['portfoliolist'] as $data ): ?>
				<div class="col-lg-4 col-xl-3">
					<div class="project-card">
						<div class="project-img">
							<?php echo malen_img_tag( array(
								'url'   => esc_url( $data['portfolio_img']['url']  ),
							)); ?>
						</div>
						<div class="project-content">
							<div class="media-left">
								<h6 class="project-subtitle th-sub"><?php echo esc_html( $data['portfolio_cate'] ); ?></h6>
								<h4 class="project-title th-title"><a href="<?php echo esc_url( $data['portfolio_link']['url'] ); ?>"><?php echo esc_html( $data['portfolio_title'] ); ?></a></h4>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

      <?php endif; 

	}

}