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

    malen_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?>>
    <?php
        if( class_exists('ReduxFramework') ) {
            $malen_post_details_title_position = malen_opt('malen_post_details_title_position');
        } else {
            $malen_post_details_title_position = 'header';
        }

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

        // Blog Post Thumbnail
        do_action( 'malen_blog_post_thumb' );
        
        echo '<div class="blog-content">';

            // Blog Post Meta
            do_action( 'malen_blog_post_meta' );

            if( $malen_post_details_title_position != 'header' ) {
                echo '<h2 class="blog-title">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
            }

            if( get_the_content() ){
                the_content();
                // Link Pages
                malen_link_pages();
            }  

            if( class_exists('ReduxFramework') ) {
                $malen_post_details_share_options = malen_opt('malen_post_details_share_options');
                $malen_display_post_tags = malen_opt('malen_display_post_tags');
                $malen_author_options = malen_opt('malen_post_details_author_desc_trigger');
            } else {
                $malen_post_details_share_options = false;
                $malen_display_post_tags = false;
                $malen_author_options = false;
            }
            
            $malen_post_tag = get_the_tags();
            
            if( ! empty( $malen_display_post_tags ) || ( ! empty($malen_post_details_share_options )) ){
                echo '<div class="share-links clearfix">';
                    echo '<div class="row justify-content-between">';
                        if( is_array( $malen_post_tag ) && ! empty( $malen_post_tag ) ){
                            if( count( $malen_post_tag ) > 1 ){
                                $tag_text = __( 'Tags:', 'malen' );
                            }else{
                                $tag_text = __( 'Tag:', 'malen' );
                            }
                            if($malen_display_post_tags){
                                echo '<div class="col-sm-auto">';
                                    echo '<span class="share-links-title">'.$tag_text.'</span>';
                                    echo '<div class="tagcloud">';
                                        foreach( $malen_post_tag as $tags ){
                                            echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
    
                        /**
                        *
                        * Hook for Blog Details Share Options
                        *
                        * Hook malen_blog_details_share_options
                        *
                        * @Hooked malen_blog_details_share_options_cb 10
                        *
                        */
                        do_action( 'malen_blog_details_share_options' );
    
                    echo '</div>';
    
                echo '</div>';
            }  

            /**
            *
            * Hook for Blog Details author bio
            *
            * Hook malen_blog_details_author_bio
            *
            * @Hooked malen_blog_details_author_bio_cb 10
            *
            */
            do_action( 'malen_blog_details_author_bio' );
    
            /**
            *
            * Hook for Blog Details Comments
            *
            * Hook malen_blog_details_comments
            *
            * @Hooked malen_blog_details_comments_cb 10
            *
            */
            do_action( 'malen_blog_details_comments' );

        echo '</div>';

    echo '</div>'; 
