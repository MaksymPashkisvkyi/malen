<?php
/**
 * @Packge     : Malen
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeholy.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }


    // preloader hook function
    if( ! function_exists( 'malen_preloader_wrap_cb' ) ) {
        function malen_preloader_wrap_cb() {
            $preloader_display              =  malen_opt('malen_display_preloader');
            ?>
            <div class="th-cursor"></div>
            <?php
            if( class_exists('ReduxFramework') ){
                if( $preloader_display ){?>
                    <div class="preloader">
                        <button class="th-btn style2 preloaderCls"><?php echo esc_html__( 'Cancel Preloader', 'malen' ) ?></button>
                        <div class="preloader-inner">
                            <div class="loader">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="subline"></div>
                                <div class="subline"></div>
                                <div class="subline"></div>
                                <div class="subline"></div>
                                <div class="subline"></div>
                                <div class="loader-circle-1">
                                    <div class="loader-circle-2"></div>
                                </div>
                                <div class="needle"></div>
                                <div class="loading">Loading</div>
                            </div>
                        </div>
                    </div>
                <?php }
            }else{ ?>
                <div class="preloader">
                    <button class="th-btn style2 preloaderCls"><?php echo esc_html__( 'Cancel Preloader', 'malen' ) ?></button>
                    <div class="preloader-inner">
                        <span class="loader"></span>
                    </div>
                </div>
            <?php }
        }
    }

    // Header Hook function
    if( !function_exists('malen_header_cb') ) {
        function malen_header_cb( ) {
            get_template_part('templates/header');
            get_template_part('templates/header-menu-bottom');
        }
    }

    // back top top hook function
    if( ! function_exists( 'malen_back_to_top_cb' ) ) {
        function malen_back_to_top_cb( ) {
            $backtotop_trigger = malen_opt('malen_display_bcktotop');
            $custom_bcktotop   = malen_opt('malen_custom_bcktotop');
            $custom_bcktotop_icon   = malen_opt('malen_custom_bcktotop_icon');
            if( class_exists( 'ReduxFramework' ) ) {
                if( $backtotop_trigger ) {
                    if( $custom_bcktotop ) { ?>
                        <div class="scroll-top">
                                <i class="<?php echo esc_attr( $custom_bcktotop_icon ); ?>"></i>
                        </div>
                    <?php } else { ?>
                         <div class="scroll-top">
                            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
                                </path>
                            </svg>
                             <!-- <i class="fa-regular fa-arrow-up"></i> -->
                        </div>
                    <?php }
                }
            }

        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('malen_blog_start_wrap_cb') ) {
        function malen_blog_start_wrap_cb() { ?>
            <section class="th-blog-wrapper space-top space-extra-bottom arrow-wrap">
                <div class="container">
                    <div class="row">
        <?php }
    }

    // Blog End Wrapper Function
    if( !function_exists('malen_blog_end_wrap_cb') ) {
        function malen_blog_end_wrap_cb() {?>
                    </div>
                </div>
            </section>
        <?php }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('malen_blog_col_start_wrap_cb') ) {
        function malen_blog_col_start_wrap_cb() {
            if( class_exists('ReduxFramework') ) {
                $malen_blog_sidebar = malen_opt('malen_blog_sidebar');
                if( $malen_blog_sidebar == '2' && is_active_sidebar('malen-blog-sidebar') ) {
                    echo '<div class="col-lg-8 order-lg-last">';
                } elseif( $malen_blog_sidebar == '3' && is_active_sidebar('malen-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('malen-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('malen_blog_col_end_wrap_cb') ) {
        function malen_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('malen_blog_sidebar_cb') ) {
        function malen_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_blog_sidebar = malen_opt('malen_blog_sidebar');
            } else {
                $malen_blog_sidebar = 2;
                
            }
            if( $malen_blog_sidebar != 1 && is_active_sidebar('malen-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('malen_blog_details_sidebar_cb') ) {
        function malen_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_blog_single_sidebar = malen_opt('malen_blog_single_sidebar');
            } else {
                $malen_blog_single_sidebar = 4;
            }
            if( $malen_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }

        }
    }

    // Blog Pagination Function
    if( !function_exists('malen_blog_pagination_cb') ) {
        function malen_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('malen_blog_content_cb') ) {
        function malen_blog_content_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_blog_grid = malen_opt('malen_blog_grid');
            } else {
                $malen_blog_grid = '1';
            }

            if( $malen_blog_grid == '1' ) {
                $malen_blog_grid_class = 'col-lg-12';
            } elseif( $malen_blog_grid == '2' ) {
                $malen_blog_grid_class = 'col-sm-6';
            } else {
                $malen_blog_grid_class = 'col-lg-4 col-sm-6';
            }

            echo '<div class="row">';
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        echo '<div class="'.esc_attr($malen_blog_grid_class).'">';
                            get_template_part('templates/content',get_post_format());
                        echo '</div>';
                    }
                    wp_reset_postdata();
                } else{
                    get_template_part('templates/content','none');
                }
            echo '</div>';
        }
    }

    // footer content Function
    if( !function_exists('malen_footer_content_cb') ) {
        function malen_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'malen_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'malen_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'malen_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $malen_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $malen_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $malen_footer_builder_trigger = malen_opt('malen_footer_builder_trigger');
                            if( $malen_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $malen_global_footer_select = get_post( malen_opt( 'malen_footer_builder_select' ) );
                                $footer_post = get_post( $malen_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                malen_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $malen_footer_builder_trigger = malen_opt('malen_footer_builder_trigger');
                    if( $malen_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $malen_global_footer_select = get_post( malen_opt( 'malen_footer_builder_select' ) );
                        $footer_post = get_post( $malen_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        malen_footer_global_option();
                    }
                }
            } else { ?>
                <div class="footer-layout1">
                    <div class="copyright-wrap">
                        <div class="container">
                            <p class="copyright-text text-center"><?php echo sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Malen.','malen' ),esc_url('#'),__( 'Themeholy', 'malen' ) ) ?></p>
                        </div>
                    </div>
                </div>
            <?php }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('malen_blog_details_wrapper_start_cb') ) {
        function malen_blog_details_wrapper_start_cb( ) {
            echo '<section class="th-blog-wrapper blog-details space-top space-extra-bottom">';
                echo '<div class="container">';
                    if( is_active_sidebar( 'malen-blog-sidebar' ) ){
                        $malen_gutter_class = 'gx-60';
                    }else{
                        $malen_gutter_class = '';
                    }
                    // echo '<div class="row './/esc_attr( $malen_gutter_class ).'">';
                    echo '<div class="row">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('malen_blog_details_col_start_cb') ) {
        function malen_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_blog_single_sidebar = malen_opt('malen_blog_single_sidebar');
                if( $malen_blog_single_sidebar == '2' && is_active_sidebar('malen-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7 order-last">';
                } elseif( $malen_blog_single_sidebar == '3' && is_active_sidebar('malen-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('malen-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('malen_blog_post_meta_cb') ) {
        function malen_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_display_post_author      =  malen_opt('malen_display_post_author');
                $malen_display_post_tag   =  malen_opt('malen_display_post_tag');
                $malen_display_post_date      =  malen_opt('malen_display_post_date');
                $malen_display_post_comments      =  malen_opt('malen_display_post_comments');
            } else {
                $malen_display_post_author      = '1';
                $malen_display_post_tag   = '1';
                $malen_display_post_date      = '1';
                $malen_display_post_comments      = '0';
            }

                echo '<div class="blog-meta">';
                    if( $malen_display_post_author ){
                        echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fa-regular fa-user"></i>'.esc_html__('Post By ', 'malen').esc_html( ucwords( get_the_author() ) ).'</a>';
                    }
                    if( $malen_display_post_date ){
                        echo '<a href="'.esc_url( malen_blog_date_permalink() ).'"><i class="fa-light fa-calendar-days"></i>';
                            echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                        echo '</a>';
                    }
                    if( $malen_display_post_tag ){
                        $categories = get_the_category(); 
                        if(!empty($categories)){
                        echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"><i class="fa-regular fa-tags"></i>'.esc_html( $categories[0]->name ).'</a>';
                        }
                    }
                    if( $malen_display_post_comments ){
                        ?>
                        <a href="#"><i class="fa-regular fa-comments"></i>
                            <?php 
                                if(get_comments_number() == 1){
                                    echo esc_html__('Comment(', 'malen'); 
                                }else{
                                    echo esc_html__('Comments(', 'malen'); 
                                }
                                echo get_comments_number(); ?>)</a>
                        <?php
                    }
                echo '</div>';
        }
    }

    // blog details share options hook function
    if( !function_exists('malen_blog_details_share_options_cb') ) {
        function malen_blog_details_share_options_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_post_details_share_options = malen_opt('malen_post_details_share_options');
            } else {
                $malen_post_details_share_options = false;
            }
            if( function_exists( 'malen_social_sharing_buttons' ) && $malen_post_details_share_options ) { ?>
                <div class="col-sm-auto text-xl-end">
                        <span class="share-links-title"><?php echo esc_html__('Share:', 'malen') ?></span>
                        <ul class="social-links">
                           <?php echo malen_social_sharing_buttons(); ?>
                        </ul>
                    <!-- End Social Share -->
                </div>
            <?php }
        }
    }
    
    // blog details author bio hook function
    if( !function_exists('malen_blog_details_author_bio_cb') ) {
        function malen_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  malen_opt( 'malen_post_details_author_desc_trigger' );
            } else {
                $postauthorbox = '1';
            }
            if(  $postauthorbox == '1' ) {

                echo '<div class="">';
                    echo '<div class="author-widget-wrap">';
                        echo '<div class="avater">';
                            echo '<img src="'.esc_url( get_avatar_url( get_the_author_meta('ID') ) ).'" alt="img">';
                        echo '</div>';
                        echo '<div class="avater-content">';
                            echo '<div class="author-info">';
                                echo '<h4 class="name"><a class="text-inherit" href="cases.html">'.esc_html( ucwords( get_the_author() )).'</a></h4>';
                                echo '<span class="text">'.get_user_meta( get_the_author_meta('ID'), '_malen_author_desig',true ).'</span>';
                            echo '</div>';
                            echo '<p class="author-bio">'.get_the_author_meta( 'user_description', get_the_author_meta('ID') ).'</p>';
                            echo '<div class="author-social">';
                                    $malen_social_icons = get_user_meta( get_the_author_meta('ID'), '_malen_social_profile_group',true );
                                    if(!empty($malen_social_icons)){
                                        foreach( $malen_social_icons as $singleicon ) {
                                            if( ! empty( $singleicon['_malen_social_profile_icon'] ) ) {
                                                echo '<a href="'.esc_url( $singleicon['_malen_lawyer_social_profile_link'] ).'"><i class="'.esc_attr( $singleicon['_malen_social_profile_icon'] ).'"></i></a>';
                                            }
                                        }
                                    }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
             echo '</div>';

               
            }

        }
    }

     // Blog Details Post Navigation hook function
     if( !function_exists( 'malen_blog_details_post_navigation_cb' ) ) {
        function malen_blog_details_post_navigation_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_post_details_post_navigation = malen_opt('malen_post_details_post_navigation');
            } else {
                $malen_post_details_post_navigation = true;
            }

            $prevpost = get_previous_post();
            $nextpost = get_next_post();

            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( $malen_post_details_post_navigation && ! empty( $prevpost ) || !empty( $nextpost ) ) {
                echo '<ul class="project-details-nav">';
                    if( ! empty( $prevpost ) ) {
                    echo '<li>';
                        echo '<a href="'.esc_url( get_permalink( $prevpost->ID ) ).'">';
                            echo '<span class="thumb"><span class="icon"><i class="far fa-arrow-left"></i></span>';
                            if( class_exists('ReduxFramework') ) {
                                if (has_post_thumbnail( $prevpost->ID )) {
                                    echo get_the_post_thumbnail( $prevpost->ID, 'malen_80X80' );
                                };
                            }
                            echo '</span>';
                            echo '<span class="text d-xl-block d-none">'.esc_html__( ' Previous Post', 'malen' ).'</span>';
                        echo '</a>';
                    echo '</li>';
                    }

                    if( ! empty( $nextpost ) && ! empty( $nextpost )  ) {
                    echo '<li>';
                        echo '<a class="project-details-bar-icon" href="#">';
                            echo '<i class="fa-light fa-grid-2"></i>';
                        echo '</a>';
                    echo '</li>';
                    }

                    if( ! empty( $nextpost ) ) {
                    echo '<li class="next-project-nav">';
                        echo '<a href="'.esc_url( get_permalink( $nextpost->ID ) ).'">';
                             echo '<span class="text d-xl-block d-none">'.esc_html__( ' Next Post', 'malen' ).'</span>';
                            echo '<span class="thumb">';
                                if( class_exists('ReduxFramework') ) {
                                    if (has_post_thumbnail( $nextpost->ID )) {
                                        echo get_the_post_thumbnail( $nextpost->ID, 'malen_80X80' );
                                    };
                                }
                            echo '<span class="icon"><i class="far fa-arrow-right"></i></span></span>';
                        echo '</a>';
                    echo '</li>';
                    }
                echo '</ul>';
            }
        }
    }

    // Blog Details Comments hook function
    if( !function_exists('malen_blog_details_comments_cb') ) {
        function malen_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo malen_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'malen' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('malen_blog_details_col_end_cb') ) {
        function malen_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('malen_blog_details_wrapper_end_cb') ) {
        function malen_blog_details_wrapper_end_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('malen_page_start_wrap_cb') ) {
        function malen_page_start_wrap_cb( ) {
            
            if( is_page( 'cart' ) ){
                $section_class = "th-cart-wrapper space-top space-extra-bottom";
            }elseif( is_page( 'checkout' ) ){
                $section_class = "th-checkout-wrapper space-top space-extra-bottom";
            }elseif( is_page('wishlist') ){
                $section_class = "wishlist-area space-top space-extra-bottom";
            }else{
                $section_class = "space-top space-extra-bottom";  
            }
            echo '<section class="'.esc_attr( $section_class ).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('malen_page_end_wrap_cb') ) {
        function malen_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('malen_page_col_start_wrap_cb') ) {
        function malen_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_page_sidebar = malen_opt('malen_page_sidebar');
            }else {
                $malen_page_sidebar = '1';
            }
            if( $malen_page_sidebar == '2' && is_active_sidebar('malen-page-sidebar') ) {
                echo '<div class="col-lg-8 order-last">';
            } elseif( $malen_page_sidebar == '3' && is_active_sidebar('malen-page-sidebar') ) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('malen_page_col_end_wrap_cb') ) {
        function malen_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('malen_page_sidebar_cb') ) {
        function malen_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $malen_page_sidebar = malen_opt('malen_page_sidebar');
            }else {
                $malen_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $malen_page_layoutopt = malen_opt('malen_page_layoutopt');
            }else {
                $malen_page_layoutopt = '3';
            }

            if( $malen_page_layoutopt == '1' && $malen_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $malen_page_layoutopt == '2' && $malen_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('malen_page_content_cb') ) {
        function malen_page_content_cb( ) {
            if(  class_exists('woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_page('wishlist') || is_account_page() )  ) {
                echo '<div class="woocommerce--content">';
            } else {
                echo '<div class="page--content clearfix">';
            }

                the_content();

                // Link Pages
                malen_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        }
    }

    if( !function_exists('malen_blog_post_thumb_cb') ) {
        function malen_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $malen_post_slider_thumbnail = malen_meta( 'post_format_slider' );

            if( !empty( $malen_post_slider_thumbnail ) ){
                echo '<div class="blog-img th-blog-carousel arrow-wrap">';
                    foreach( $malen_post_slider_thumbnail as $single_image ){
                        echo malen_img_tag( array(
                            'url'   => esc_url( $single_image )
                        ) );
                    }
                echo '</div>';
            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="blog-img">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                    }

                    the_post_thumbnail();

                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && ! empty ( malen_meta( 'post_format_video' ) ) ){
                    echo '<div class="blog-img blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail();
                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( malen_meta( 'post_format_video' ) ).'" class="white-play-btn popup-video">';
                            echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo malen_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $malen_audio = malen_meta( 'post_format_audio' );
                if( ! empty( $malen_audio ) ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $malen_audio );
                    echo '</div>';
                }elseif( ! is_single() ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $malen_audio );
                    echo '</div>';
                }
            }

        }
    }

    if( !function_exists('malen_blog_post_content_cb') ) {
        function malen_blog_post_content_cb( ) {
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );
            if( class_exists( 'ReduxFramework' ) ) {
                $malen_excerpt_length          = malen_opt( 'malen_blog_postExcerpt' );
                $malen_display_post_category   = malen_opt( 'malen_display_post_category' );
            } else {
                $malen_excerpt_length          = '48';
                $malen_display_post_category   = '1';
            }

            if( class_exists( 'ReduxFramework' ) ) {
                $malen_blog_admin = malen_opt( 'malen_blog_post_author' );
                $malen_blog_readmore_setting_val = malen_opt('malen_blog_readmore_setting');
                if( $malen_blog_readmore_setting_val == 'custom' ) {
                    $malen_blog_readmore_setting = malen_opt('malen_blog_custom_readmore');
                } else {
                    $malen_blog_readmore_setting = __( 'Read More', 'malen' );
                }
            } else {
                $malen_blog_readmore_setting = __( 'Read More', 'malen' );
                $malen_blog_admin = true;
            }
            echo '<!-- blog-content -->';

                do_action( 'malen_blog_post_thumb' );
                
                echo '<div class="blog-content">';

                    // Blog Post Meta
                    do_action( 'malen_blog_post_meta' );

                    echo '<!-- Post Title -->';
                    echo '<h2 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h2>';
                    echo '<!-- End Post Title -->';

                    echo '<!-- Post Summary -->';
                    echo malen_paragraph_tag( array(
                        "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $malen_excerpt_length, '' ), $allowhtml ),
                        "class" => 'blog-text',
                    ) );
  
                    if( !empty( $malen_blog_readmore_setting ) ){
                        echo '<div class="btn-group">';
                            echo '<a href="'.esc_url( get_permalink() ).'" class="th-btn">'.esc_html( $malen_blog_readmore_setting ).'<i class="fa-regular fa-arrow-right ms-2"></i></a>';
                        echo '</div>';
                    }

                    echo '<!-- End Post Summary -->';
                echo '</div>';
            echo '<!-- End Post Content -->';
        }
    }
