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

 * Admin Custom Login Logo

 */

function malen_custom_login_logo() {

    $logo = ! empty( malen_opt( 'malen_admin_login_logo', 'url' ) ) ? malen_opt( 'malen_admin_login_logo', 'url' ) : '' ;

    if( isset( $logo ) && ! empty( $logo ) ){

        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}

add_action( 'login_enqueue_scripts', 'malen_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'malen_admin_styles' );

function malen_admin_styles() {

  if ( ! empty( $malen_admin_custom_css ) ) {
        $malen_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $malen_admin_custom_css);
        echo '<style rel="stylesheet" id="malen-admin-custom-css" >';
            echo esc_html( $malen_admin_custom_css );
        echo '</style>';
    }
}

// share button code

 function malen_social_sharing_buttons( ) {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script 

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $pinterest   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
    // Add sharing button at the end of page/page content

    $content = '';

    $content .= ' <li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
    $content .= '  <li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
    $content .= '  <li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
    $content .= '  <li><a class="pinterest" href="'.esc_url( $pinterest ).'" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a></li>';


    return $content;

};

// product share button code
function malen_product_social_sharing_buttons( ) {

    // Get page URL
    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $instagram   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
    // Add sharing button at the end of page/page content

    $content = '';

    $content .= '<a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
    $content .= '<a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a>';
    $content .= '<a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
    $content .= '<a class="instagram" href="'.esc_url( $instagram ).'" target="_blank"><i class="fab fa-instagram"></i></a>';

    return $content;

};

//Post Reading Time Count

function malen_estimated_reading_time() {
    global $post;
    // get the content
    $the_content = $post->post_content;
    // count the number of words
    $words = str_word_count( strip_tags( $the_content ) );
    // rounding off and deviding per 100 words per minute
    $minute = floor( $words / 100 );
    // rounding off to get the seconds
    $second = floor( $words % 100 / ( 100 / 60 ) );
    // calculate the amount of time needed to read
    $estimate = $minute . esc_html__(' Min', 'malen') . ( $minute == 1 ? '' : 's' ) . esc_html__(' Read', 'malen');
    // create output
    $output = $estimate;
    // return the estimate
    return $output;
}



//add SVG to allowed file uploads

function malen_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svgz+xml';
    $mimes['exe'] = 'program/exe';
    $mimes['dwg'] = 'image/vnd.dwg';
    return $mimes;
}

add_filter('upload_mimes', 'malen_mime_types');



function malen_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );

}

add_filter( 'wp_check_filetype_and_ext', 'malen_wp_check_filetype_and_ext', 10, 4 );


// if ( ! function_exists( 'etlms_course_categories' ) ) {
//     function etlms_course_categories() {
//         $course_categories      = array();
//         $course_categories_term = tutils()->get_course_categories_term();
//         foreach ( $course_categories_term as $term ) {
//             $course_categories[ $term->term_id ] = $term->name;
//         }

//         return $course_categories;
//     }
// }

// if ( ! function_exists( 'etlms_course_authors' ) ) {
//     function etlms_course_authors() {
//         $course_authors = array();
//         $authors        = get_users( array( 'role__in' => array( 'author', tutor()->instructor_role ) ) );
//         foreach ( $authors as $author ) {
//             $course_authors[ $author->ID ] = $author->display_name;
//         }

//         return $course_authors;
//     }
// }


// Event Post Type

// add_action( 'init','malen_event', 0 );

function malen_event(){

    $labels = array(

        'name'               => esc_html__( 'Events', 'post Category general name', 'malen' ),
        'singular_name'      => esc_html__( 'Event', 'post Category singular name', 'malen' ),
        'menu_name'          => esc_html__( 'Events', 'admin menu', 'malen' ),
        'name_admin_bar'     => esc_html__( 'Event', 'add new on admin bar', 'malen' ),
        'add_new'            => esc_html__( 'Add New', 'Event', 'malen' ),
        'add_new_item'       => esc_html__( 'Add New Event', 'malen' ),
        'new_item'           => esc_html__( 'New Event', 'malen' ),
        'edit_item'          => esc_html__( 'Edit Event', 'malen' ),
        'view_item'          => esc_html__( 'View Event', 'malen' ),
        'all_items'          => esc_html__( 'All Events', 'malen' ),
        'search_items'       => esc_html__( 'Search Events', 'malen' ),
        'parent_item_colon'  => esc_html__( 'Parent Events:', 'malen' ),
        'not_found'          => esc_html__( 'No Events found.', 'malen' ),
        'not_found_in_trash' => esc_html__( 'No Events found in Trash.', 'malen' ),
    );



    $args = array(

        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'malen' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-list-view',
        'supports'           => array( 'title', 'thumbnail', 'editor', 'elementor' ),
        'rewrite'            => array( 'slug' => 'events' ),
        'menu_position' => 10,
    );

    register_post_type( 'malen_event', $args );


    $labels = array(

        'name'                       => esc_html__( 'Categories', 'taxonomy general name', 'malen' ),
        'singular_name'              => esc_html__( 'Category', 'taxonomy singular name', 'malen' ),
        'search_items'               => esc_html__( 'Search Categorys', 'malen' ),
        'popular_items'              => esc_html__( 'Popular Categorys', 'malen' ),
        'all_items'                  => esc_html__( 'All Categorys', 'malen' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Category', 'malen' ),
        'update_item'                => esc_html__( 'Update Category', 'malen' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'malen' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'malen' ),
        'separate_items_with_commas' => esc_html__( 'Separate Categorys with commas', 'malen' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categorys', 'malen' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categorys', 'malen' ),
        'not_found'                  => esc_html__( 'No Categorys found.', 'malen' ),
        'menu_name'                  => esc_html__( 'Categories', 'malen' ),
    );



    $args = array(

        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'event-category' ),
    );

    register_taxonomy( 'event_category', 'malen_event', $args );



    // Add new taxonomy, NOT hierarchical (like tags)

    $labels = array(

        'name'                       => esc_html__( 'Tags', 'taxonomy general name', 'malen' ),
        'singular_name'              => esc_html__( 'Tag', 'taxonomy singular name', 'malen' ),
        'search_items'               => esc_html__( 'Search Tags', 'malen' ),
        'popular_items'              => esc_html__( 'Popular Tags', 'malen' ),
        'all_items'                  => esc_html__( 'All Tags', 'malen' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => esc_html__( 'Edit Tag', 'malen' ),
        'update_item'                => esc_html__( 'Update Tag', 'malen' ),
        'add_new_item'               => esc_html__( 'Add New Tag', 'malen' ),
        'new_item_name'              => esc_html__( 'New Tag Name', 'malen' ),
        'separate_items_with_commas' => esc_html__( 'Separate Tags with commas', 'malen' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Tags', 'malen' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Tags', 'malen' ),
        'not_found'                  => esc_html__( 'No Tags found.', 'malen' ),
        'menu_name'                  => esc_html__( 'Tags', 'malen' ),

    );

    $args = array(

        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'event-tag' ),
    );

    register_taxonomy( 'event_tag', 'malen_event', $args );
}

/**
 * Single Template
 */

// add_filter( 'single_template', 'malen_core_template_redirect' );

if( ! function_exists( 'malen_core_template_redirect' ) ){

    function malen_core_template_redirect( $single_template ){
        global $post;

        if( $post ){

            if( $post->post_type == 'malen_event' ){

                $single_template = MALEN_CORE_PLUGIN_TEMP . 'single-malen_event.php';

            }
        }

        return $single_template;
    }

}


/**
 * Archive Template
 */

// add_filter( 'archive_template', 'malen_core_template_archive' );

if( ! function_exists( 'malen_core_template_archive' ) ){

    function malen_core_template_archive( $archive_template ){

        global $post;


        if( $post ){

            if( $post->post_type == 'malen_event' ){

                $archive_template = MALEN_CORE_PLUGIN_TEMP . 'archive-malen_event.php';
            }
        }

        return $archive_template;
    }

}



// Add Image Size
add_image_size( 'malen_80X80', 80, 80, true );
add_image_size( 'malen_414X273', 414, 273, true );
add_image_size( 'malen_305X203', 305, 203, true );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
