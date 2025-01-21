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

	/**
	* Hook for preloader
	*/
	add_action( 'malen_preloader_wrap', 'malen_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'malen_main_wrapper_start', 'malen_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'malen_header', 'malen_header_cb', 10 );
	
	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'malen_blog_start_wrap', 'malen_blog_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'malen_blog_col_start_wrap', 'malen_blog_col_start_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'malen_blog_col_end_wrap', 'malen_blog_col_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'malen_blog_end_wrap', 'malen_blog_end_wrap_cb', 10 );
	
	/**
	* Hook for Blog Pagination
	*/
    add_action( 'malen_blog_pagination', 'malen_blog_pagination_cb', 10 );
    
    /**
	* Hook for Blog Content
	*/
	add_action( 'malen_blog_content', 'malen_blog_content_cb', 10 );
    
    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'malen_blog_sidebar', 'malen_blog_sidebar_cb', 10 );
    
    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'malen_blog_details_sidebar', 'malen_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'malen_blog_details_wrapper_start', 'malen_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'malen_blog_post_meta', 'malen_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'malen_blog_details_share_options', 'malen_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Post Share Options
	*/
	add_action( 'malen_blog_post_share_options', 'malen_blog_post_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'malen_blog_details_author_bio', 'malen_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'malen_blog_details_tags_and_categories', 'malen_blog_details_tags_and_categories_cb', 10 );

	/**
	* Hook for Blog Details Related Post Navigation
	*/
	add_action( 'malen_blog_details_post_navigation', 'malen_blog_details_post_navigation_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'malen_blog_details_comments', 'malen_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('malen_blog_details_col_start','malen_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('malen_blog_details_col_end','malen_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('malen_blog_details_wrapper_end','malen_blog_details_wrapper_end_cb');
	
	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('malen_blog_post_thumb','malen_blog_post_thumb_cb');
    
	/**
	* Hook for Blog Post Content
	*/
	add_action('malen_blog_post_content','malen_blog_post_content_cb');
	
    
	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('malen_blog_postexcerpt_read_content','malen_blog_postexcerpt_read_content_cb');
	
	/**
	* Hook for footer content
	*/
	add_action( 'malen_footer_content', 'malen_footer_content_cb', 10 );
	
	/**
	* Hook for main wrapper end
	*/
	add_action( 'malen_main_wrapper_end', 'malen_main_wrapper_end_cb', 10 );
	
	/**
	* Hook for Back to Top Button
	*/
	add_action( 'malen_back_to_top', 'malen_back_to_top_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'malen_page_start_wrap', 'malen_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'malen_page_end_wrap', 'malen_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'malen_page_col_start_wrap', 'malen_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'malen_page_col_end_wrap', 'malen_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'malen_page_sidebar', 'malen_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'malen_page_content', 'malen_page_content_cb', 10 );