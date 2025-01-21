<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Blog Post Widget .
 *
 */
class malen_Blog extends Widget_Base {

	public function get_name() {
		return 'malenblog';
	}

	public function get_title() {
		return __( 'Blog Post', 'malen' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'malen' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'malen' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
					'2' 		=> __( 'Style Two', 'malen' ),
					'3' 		=> __( 'Style Three', 'malen' ),
				],
				'separator' => 'after'
			]
		);

        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'malen' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'malen' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '5', 'malen' ),
			]
		);

		$this->add_control(
			'excerpt_count',
			[
				'label' 	=> __( 'Excerpt Length', 'malen' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '16', 'malen' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'malen' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','malen'),
                    'DESC'   	=> __('DESC','malen'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'malen' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'malen' ),
                    'author'    => __( 'Author', 'malen' ),
                    'title'    	=> __( 'Title', 'malen' ),
                    'date'    	=> __( 'Date', 'malen' ),
                    'rand'    	=> __( 'Random', 'malen' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'malen' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->malen_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'malen' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->malen_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'malen' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->malen_post_id(),
			]
        );

        $this->add_control(
			'read_more',
			[
				'label' 	=> __( 'Read More Text', 'malen' ),
                'type' 		=> Controls_Manager::TEXTAREA,
				'rows'	=> 3,
                'default'  	=> __( 'Read More', 'malen' ),
			]
        );

        $this->end_controls_section();

		//---------------------------------------
			//Style Section Start
		//---------------------------------------

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
			'title_h_color',
			[
				'label' 		=> __( 'Hover Color', 'tayde' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title a:hover' => 'color: {{VALUE}} !important',
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

		//---------------------------------------Description Style---------------------------------------//
		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Description Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'layout_style' => ['1']
				]
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Typography', 'malen' ),
				'selector' 	=> '{{WRAPPER}} .th-desc',
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Margin', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Padding', 'malen' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------Button styling------------------------------------*/
		$this->start_controls_section(
			'layout_style_section',
			[
				'label' 	=> __( 'Button Style', 'malen' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn' => '--title-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_h_color',
			[
				'label' 		=> __( 'Hover Color', 'malen' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th_btn:hover' => '--theme-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Typography', 'malen' ),
                'selector' 	=> '{{WRAPPER}} .th_btn',
			]
        );

		$this->end_controls_section();

    }

    public function malen_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'malen');
        }

        return $catarr;
    }

    public function malen_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'malen');
        }

        return $catarr;
    }

    // Get Specific Post
    public function malen_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $malen_post = new WP_Query( $args );

        $postarray = [];

        while( $malen_post->have_posts() ){
            $malen_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }


    $blogpost = new WP_Query( $args );
?>
	<?php if( $settings['layout_style'] == '2' ): ?>
		<div class="row slider-shadow th-carousel arrow-wrap" id="blogSlide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">
			<?php  
				while( $blogpost->have_posts() ): 
				$blogpost->the_post(); 
			?>
			<div class="col-md-6 col-xl-4">
				<div class="blog-grid">
					<div class="blog-img">
						<?php the_post_thumbnail( 'malen_305X203' ); ?>
						<div class="blog-wrapper">
							<span class="blog-grid_date">
								<?php echo esc_html( get_the_date( 'd' ) ) ?>
							</span>
							<span class="blog-grid_month">
								<?php echo esc_html( get_the_date( 'M' ) ) ?>
							</span>
						</div>
					</div>
					<div class="blog-grid-content">
						<div class="blog-meta">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="fa-regular fa-user"></i><?php echo esc_html__('Post By ', 'malen'); ?> <span class="blog-post"><?php echo esc_html( ucwords( get_the_author() ) ); ?></span></a>
							<a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa-regular fa-comments"></i>
								<?php 
                                if(get_comments_number() == 1){
                                    echo esc_html__('Comment(', 'malen'); 
                                }else{
                                    echo esc_html__('Comments(', 'malen'); 
                                }
                                echo get_comments_number(); ?>)
							</a>
						</div>
						<h3 class="box-title th-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ); ?></a></h3>
						<hr class="style1">
						<?php  if(!empty($settings['read_more'])): ?>
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="half-line-btn th_btn"><?php echo wp_kses_post($settings['read_more']); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endwhile; wp_reset_postdata();  ?>
		</div>

	<?php elseif( $settings['layout_style'] == '3' ): ?>
		<div class="row slider-shadow th-carousel arrow-wrap" id="blogSlide3" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">
			<?php  
				while( $blogpost->have_posts() ): 
				$blogpost->the_post(); 
			?>
			<div class="col-md-6 col-xl-4">
				<div class="blog-box">
					<div class="blog-img">
						<?php the_post_thumbnail( 'malen_414X273' ); ?>
						<div class="blog-wrapper">
							<span class="blog-grid_date">
								<?php echo esc_html( get_the_date( 'd' ) ) ?> 
							</span>
							<span class="blog-grid_month">
								<?php echo esc_html( get_the_date( 'M' ) ) ?>
							</span>
						</div>
					</div>
					<div class="blog-box_content">
						<div class="blog-meta">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="fa-regular fa-user"></i><?php echo esc_html__('Post By ', 'malen'); ?> <span class="blog-post"><?php echo esc_html( ucwords( get_the_author() ) ); ?></span></a>
							<a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa-regular fa-comments"></i>
								<?php 
                                if(get_comments_number() == 1){
                                    echo esc_html__('Comment(', 'malen'); 
                                }else{
                                    echo esc_html__('Comments(', 'malen'); 
                                }
                                echo get_comments_number(); ?>)
							</a>
						</div>
						<h3 class="box-title th-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ); ?></a></h3>
						<?php  if(!empty($settings['read_more'])): ?>
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="half-line-btn th_btn"><?php echo wp_kses_post($settings['read_more']); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endwhile; wp_reset_postdata();  ?>
		</div>
		
	<?php else: ?>
		<div class="row slider-shadow th-carousel arrow-wrap" id="blogSlide1" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1" data-arrows="true">
			<?php  
				while( $blogpost->have_posts() ): 
				$blogpost->the_post(); 
			?>
			<div class="col-md-6 col-xl-4">
				<div class="blog-card">
					<div class="blog-img">
						<?php the_post_thumbnail( 'malen_414X273' ); ?>	
					</div>
					<div class="blog-card-content">
						<div class="blog-card_wrapper">
							<span class="blog-card_date">
								<?php echo esc_html( get_the_date( 'd' ) ) ?>
							</span>
							<span class="blog-card_month">
								<?php echo esc_html( get_the_date( 'M' ) ) ?>
							</span>
						</div>
						<div class="blog-meta">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="fa-regular fa-user"></i><?php echo esc_html__('Post By ', 'malen'); ?> <span class="blog-post"><?php echo esc_html( ucwords( get_the_author() ) ); ?></span></a>
							<a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa-regular fa-comments"></i>
								<?php 
                                if(get_comments_number() == 1){
                                    echo esc_html__('Comment(', 'malen'); 
                                }else{
                                    echo esc_html__('Comments(', 'malen'); 
                                }
                                echo get_comments_number(); ?>)
							</a>
						</div>
						<h3 class="box-title th-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ); ?></a></h3>
						<p class="blog-text th-desc"><?php echo esc_html( wp_trim_words( get_the_content( ), $settings['excerpt_count'], '' ) ) ?></p>
						<?php  if(!empty($settings['read_more'])): ?>
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="half-line-btn th_btn"><?php echo wp_kses_post($settings['read_more']); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php endwhile; wp_reset_postdata();  ?>
		</div>

	<?php endif; 
      
	}
}