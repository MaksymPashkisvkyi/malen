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
      exit;
    }
    
    //header
    get_header();

    /**
    * 
    * Hook for Page Start Wrapper
    *
    * Hook malen_page_start_wrap
    *
    * @Hooked malen_page_start_wrap_cb 10
    *  
    */
    do_action( 'malen_page_start_wrap' );

    /**
    * 
    * Hook for Column Start Wrapper
    *
    * Hook malen_page_col_start_wrap
    *
    * @Hooked malen_page_col_start_wrap_cb 10
    *  
    */
    do_action( 'malen_page_col_start_wrap' );

    if( have_posts() ){
      while( have_posts() ){
        the_post();
        // Post Contant
        get_template_part( 'templates/content', 'page' );
      }
      // Reset Data
      wp_reset_postdata();
    }else{
      get_template_part( 'templates/content', 'none' );
    }

    /**
    * 
    * Hook for Column End Wrapper
    *
    * Hook malen_page_col_end_wrap
    *
    * @Hooked malen_page_col_end_wrap_cb 10
    *  
    */
    do_action( 'malen_page_col_end_wrap' );

    /**
    * 
    * Hook for Page Sidebar
    *
    * Hook malen_page_sidebar
    *
    * @Hooked malen_page_sidebar_cb 10
    *  
    */
    do_action( 'malen_page_sidebar' );

    /**
    * 
    * Hook for Page End Wrapper
    *
    * Hook malen_page_end_wrap
    *
    * @Hooked malen_page_end_wrap_cb 10
    *  
    */
    do_action( 'malen_page_end_wrap' );

    //footer
    get_footer();