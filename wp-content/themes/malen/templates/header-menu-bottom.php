<?php
/**
 * @Packge     : Malen
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeholy.com/
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( malen_meta('page_breadcrumb_area') ) ) {
            $malen_page_breadcrumb_area  = malen_meta('page_breadcrumb_area');
        } else {
            $malen_page_breadcrumb_area = '1';
        }
    }else{
        $malen_page_breadcrumb_area = '1';
    }
    
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );
    
    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $malen_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title 2 -->';
            if( class_exists( 'ReduxFramework' ) ){
                $ex_class = '';
            }else{
                $ex_class = 'th-breadcumb';
            }
            echo '<div class="breadcumb-wrapper '. esc_attr($ex_class).'" id="breadcumbwrap">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        echo '<div class="breadcumb-content">';
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                                if( !empty( malen_meta('page_breadcrumb_settings') ) ) {
                                    if( malen_meta('page_breadcrumb_settings') == 'page' ) {
                                        $malen_page_title_switcher = malen_meta('page_title');
                                    } else {
                                        $malen_page_title_switcher = malen_opt('malen_page_title_switcher');
                                    }
                                } else {
                                    $malen_page_title_switcher = '1';
                                }
                            } else {
                                $malen_page_title_switcher = '1';
                            }

                            if( $malen_page_title_switcher ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $malen_page_title_tag    = malen_opt('malen_page_title_tag');
                                }else{
                                    $malen_page_title_tag    = 'h1';
                                }

                                if( defined( 'CMB2_LOADED' )  ){
                                    if( !empty( malen_meta('page_title_settings') ) ) {
                                        $malen_custom_title = malen_meta('page_title_settings');
                                    } else {
                                        $malen_custom_title = 'default';
                                    }
                                }else{
                                    $malen_custom_title = 'default';
                                }

                                if( $malen_custom_title == 'default' ) {
                                    echo malen_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $malen_page_title_tag ),
                                            "text"  => esc_html( get_the_title( ) ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    echo malen_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $malen_page_title_tag ),
                                            "text"  => esc_html( malen_meta('custom_page_title') ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }

                            }
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                                if( malen_meta('page_breadcrumb_settings') == 'page' ) {
                                    $malen_breadcrumb_switcher = malen_meta('page_breadcrumb_trigger');
                                } else {
                                    $malen_breadcrumb_switcher = malen_opt('malen_enable_breadcrumb');
                                }

                            } else {
                                $malen_breadcrumb_switcher = '1';
                            }

                            if( $malen_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                                    malen_breadcrumbs(
                                        array(
                                            'breadcrumbs_classes' => '',
                                        )
                                    );
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                if(!empty(malen_opt('malen_allHeader_shape', 'url' ) )){
                    echo '<div class="breadcump-shape shape-mockup" data-bottom="0%" data-right="0%">';
                        echo malen_img_tag( array(
                            "url"   => malen_opt('malen_allHeader_shape', 'url'),
                        ) );
                    echo '</div>';
                }
            echo '</div>';
            echo '<!-- End of Page title -->';
            
        }
    } else {
        echo '<!-- Page title 3 -->';
         if( class_exists( 'ReduxFramework' ) ){
            $ex_class = '';
            if (class_exists( 'woocommerce' ) && is_shop()){
            $breadcumb_bg_class = 'custom-woo-class';
            }elseif(is_404()){
                $breadcumb_bg_class = 'custom-error-class';
            }elseif(is_search()){
                $breadcumb_bg_class = 'custom-search-class';
            }elseif(is_archive()){
                $breadcumb_bg_class = 'custom-archive-class';
            }else{
                $breadcumb_bg_class = '';
            }
        }else{
            $breadcumb_bg_class = '';
            $ex_class = 'th-breadcumb';
        }
        echo '<div class="breadcumb-wrapper shape-mockup-wrap'. esc_attr($breadcumb_bg_class . $ex_class).'">';
            echo '<div class="container z-index-common">';
                    echo '<div class="breadcumb-content">';
                        if( class_exists( 'ReduxFramework' )  ){
                            $malen_page_title_switcher  = malen_opt('malen_page_title_switcher');
                        }else{
                            $malen_page_title_switcher = '1';
                        }

                        if( $malen_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $malen_page_title_tag    = malen_opt('malen_page_title_tag');
                            }else{
                                $malen_page_title_tag    = 'h1';
                            }
                            if( class_exists('woocommerce') && is_shop() ) {
                                echo malen_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $malen_page_title_tag ),
                                        "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_archive() ){
                                echo malen_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $malen_page_title_tag ),
                                        "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_home() ){
                                $malen_blog_page_title_setting = malen_opt('malen_blog_page_title_setting');
                                $malen_blog_page_title_switcher = malen_opt('malen_blog_page_title_switcher');
                                $malen_blog_page_custom_title = malen_opt('malen_blog_page_custom_title');
                                if( class_exists('ReduxFramework') ){
                                    if( $malen_blog_page_title_switcher ){
                                        echo malen_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $malen_page_title_tag ),
                                                "text"  => !empty( $malen_blog_page_custom_title ) && $malen_blog_page_title_setting == 'custom' ? esc_html( $malen_blog_page_custom_title) : esc_html__( 'Latest News', 'malen' ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }else{
                                    echo malen_heading_tag(
                                        array(
                                            "tag"   => "h1",
                                            "text"  => esc_html__( 'Latest News', 'malen' ),
                                            'class' => 'breadcumb-title',
                                        )
                                    );
                                }
                            }elseif( is_search() ){
                                echo malen_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $malen_page_title_tag ),
                                        "text"  => esc_html__( 'Search Result', 'malen' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_404() ){
                                echo malen_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $malen_page_title_tag ),
                                        "text"  => esc_html__( 'Error Page', 'malen' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_singular( 'product' ) ){
                                $posttitle_position  = malen_opt('malen_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }

                                if( $postTitlePos != true ){
                                    echo malen_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $malen_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $malen_post_details_custom_title  = malen_opt('malen_product_details_custom_title');
                                    }else{
                                        $malen_post_details_custom_title = __( 'Shop Details','malen' );
                                    }

                                    if( !empty( $malen_post_details_custom_title ) ) {
                                        echo malen_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $malen_page_title_tag ),
                                                "text"  => wp_kses( $malen_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }else{
                                $posttitle_position  = malen_opt('malen_post_details_title_position');
                                $postTitlePos = false;
                                if( is_single() ){
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }
                                if( is_singular( 'product' ) ){
                                    $posttitle_position  = malen_opt('malen_product_details_title_position');
                                    $postTitlePos = false;
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }

                                if( $postTitlePos != true ){
                                    echo malen_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $malen_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $malen_post_details_custom_title  = malen_opt('malen_post_details_custom_title');
                                    }else{
                                        $malen_post_details_custom_title = __( 'Blog Details','malen' );
                                    }

                                    if( !empty( $malen_post_details_custom_title ) ) {
                                        echo malen_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $malen_page_title_tag ),
                                                "text"  => wp_kses( $malen_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }
                        }
                        if( class_exists('ReduxFramework') ) {
                            $malen_breadcrumb_switcher = malen_opt( 'malen_enable_breadcrumb' );
                        } else {
                            $malen_breadcrumb_switcher = '1';
                        }
                        if( $malen_breadcrumb_switcher == '1' ) {
                            if(malen_breadcrumbs()){
                            echo '<div>';
                                malen_breadcrumbs(
                                    array(
                                        'breadcrumbs_classes' => 'nav',
                                    )
                                );
                            echo '</div>';
                            }
                        }
                    echo '</div>';
            echo '</div>';
            if(!empty(malen_opt('malen_allHeader_shape', 'url' ) )){
            echo '<div class="breadcump-shape shape-mockup" data-bottom="0%" data-right="0%">';
                echo malen_img_tag( array(
                    "url"   => malen_opt('malen_allHeader_shape', 'url'),
                ) );
            echo '</div>';
            }
        echo '</div>';
        echo '<!-- End of Page title -->';
    }