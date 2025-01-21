<?php
/**
 * @Packge     : Malen
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeholy.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}   
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook malen_blog_start_wrap
    *
    * @Hooked malen_blog_start_wrap_cb 10
    *  
    */
    do_action( 'malen_blog_start_wrap' );

    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook malen_blog_col_start_wrap
    *
    * @Hooked malen_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'malen_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook malen_blog_content
    *
    * @Hooked malen_blog_content_cb 10
    *  
    */
    do_action( 'malen_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook malen_blog_pagination
    *
    * @Hooked malen_blog_pagination_cb 10
    *  
    */
    do_action( 'malen_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook malen_blog_col_end_wrap
    *
    * @Hooked malen_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'malen_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook malen_blog_sidebar
    *
    * @Hooked malen_blog_sidebar_cb 10
    *  
    */
    do_action( 'malen_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook malen_blog_end_wrap
    *
    * @Hooked malen_blog_end_wrap_cb 10
    *  
    */
    do_action( 'malen_blog_end_wrap' );

    //footer
    get_footer();