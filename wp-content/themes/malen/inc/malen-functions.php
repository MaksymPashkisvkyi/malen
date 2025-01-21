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
    exit;
}

 // theme option callback
function malen_opt( $id = null, $url = null ){
    global $malen_opt;

    if( $id && $url ){

        if( isset( $malen_opt[$id][$url] ) && $malen_opt[$id][$url] ){
            return $malen_opt[$id][$url];
        }
    }else{
        if( isset( $malen_opt[$id] )  && $malen_opt[$id] ){
            return $malen_opt[$id];
        }
    }
}


// theme logo
function malen_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= malen_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !malen_opt('malen_text_title') && malen_opt('malen_site_logo', 'url' )  ){

        $siteLogo = '<img class="img-fluid" src="'.esc_url( malen_opt('malen_site_logo', 'url' ) ).'" alt="'.esc_attr__( 'logo', 'malen' ).'" />';
        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';


    }elseif( malen_opt('malen_text_title') ){
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( malen_opt('malen_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// custom meta id callback
function malen_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_malen_'.$id, true );
    return $value;
}


// Blog Date Permalink
function malen_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function malen_iframe_match() {
    $audio_content = malen_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function malen_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function malen_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'malen' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'malen' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


// Data Background image attr
function malen_data_bg_attr( $imgUrl = '' ){
    return 'data-bg-img="'.esc_url( $imgUrl ).'"';
}

// image alt tag
function malen_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function malen_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function malen_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'malen_pingback_header' );


// Excerpt More
function malen_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'malen_excerpt_more' );


// malen comment template callback
function malen_comment_callback( $comment, $args, $depth ) {
        $add_below = 'comment';
    ?>
    <li <?php comment_class( array('th-comment-item') ); ?>>
        <div id="comment-<?php comment_ID() ?>" class="th-post-comment">
            <?php
                if( get_avatar( $comment, 100 )  ) :
            ?>
            <!-- Author Image -->
            <div class="comment-avater">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, 110 );
                    }
                ?>
            </div>
            <!-- Author Image -->
            <?php endif; ?>
            <!-- Comment Content -->
            <div class="comment-content">
                <div class="">
                    <h3 class="name"><?php echo esc_html( ucwords( get_comment_author() ) ); ?></h3>
                    <span class="commented-on"><i class="fal fa-calendar-alt"></i><?php printf( esc_html__('%1$s', 'malen'), get_comment_date() ); ?></span>
                </div>

                <?php comment_text(); ?>
                
                <div class="reply_and_edit">
                    <?php
                        $reply_text = wp_kses_post( '<i class="fas fa-reply"></i> Reply', 'malen' );

                        $edit_reply_text = wp_kses_post( '<i class="fas fa-pencil-alt"></i> Edit', 'malen' );

                        comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 3, 'max_depth' => 5, 'reply_text' => $reply_text ) ) );
                    ?>  
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'malen' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comment Content -->
<?php
}

//body class
add_filter( 'body_class', 'malen_body_class' );
function malen_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $malen_blog_single_sidebar = malen_opt('malen_blog_single_sidebar');
        if( ($malen_blog_single_sidebar != '2' && $malen_blog_single_sidebar != '3' ) || ! is_active_sidebar('malen-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
        $new_class = is_page() ? malen_meta('custom_body_class') : null;

        if ( $new_class ) {
            $classes[] = $new_class;
        }
    } else {
        if( !is_active_sidebar('malen-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    }
    return $classes;
}


function malen_footer_global_option(){

    // Malen Widget Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $malen_footernewsletter_enable = malen_opt( 'malen_footer_newsletter_enable' );
        $malen_footer_widget_enable = malen_opt( 'malen_footerwidget_enable' );
        $malen_footer_bottom_active = malen_opt( 'malen_disable_footer_bottom' );
    }else{
        $malen_footernewsletter_enable = '';
        $malen_footer_widget_enable = '';
        $malen_footer_bottom_active = '1';
    }

    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'i'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array(),
            'class'     => array(),
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );
   
        if( $malen_footernewsletter_enable == '1' ){
         echo '<div class="newsletter-area">';
             echo '<div class="container">';
                 echo '<div class="row gx-0 align-items-center">';
                     echo '<div class="col-lg-6 col-xl-6 col-xxl-5">';
                            echo '<div class="newsletter-wrapper">';
                                if(!empty(malen_opt('malen_newsletter_icon', 'url' ) )){
                                echo '<div class="newsletter-image jump">';
                                    echo malen_img_tag( array(
                                        "url"   => malen_opt('malen_newsletter_icon', 'url'),
                                    ) );
                                echo '</div>';
                                }
                             echo '<h4 class="h4 newsletter-title text-white">'.wp_kses_post(malen_opt('malen_newsletter_title' )).'</h4>';
                         echo '</div>';
                     echo '</div>';
                     echo '<div class="col-lg-6 col-xl-6 col-xxl-7">';
                        echo '<div class="newsletter-form-wrapper">';
                            echo '<form class="newsletter-form">';
                                echo '<input class="form-control" type="email" placeholder="'.esc_attr(malen_opt('malen_newsletter_placeholder' )).'" required="">';
                                echo '<button type="submit" class="th-btn style3">'.wp_kses( malen_opt( 'malen_newsletter_button' ), $allowhtml ).'</button>';
                            echo '</form>';
                         echo '</div>';
                     echo '</div>';
                 echo '</div>';
             echo '</div>';
         echo '</div>';
        }

        if( $malen_footer_widget_enable == '1' || $malen_footer_bottom_active == '1' ){
            echo '<!---footer-wrapper start-->';


            $custom_bgg = malen_opt('malen_footer_background', 'background-image' ) ? malen_opt('malen_footer_background', 'background-image' ) : '#';

            echo '<footer class="footer-wrapper footer-layout1" data-bg-src="'.esc_url($custom_bgg ).'">';
                if( $malen_footer_widget_enable == '1' ){
                    if( ( is_active_sidebar( 'malen-footer-1' ) || is_active_sidebar( 'malen-footer-2' ) || is_active_sidebar( 'malen-footer-3' ) || is_active_sidebar( 'malen-footer-4' ) )) {
                        echo '<div class="widget-area">';
                            echo '<div class="container">';
                                    echo '<div class="row justify-content-between">';
                                        if( is_active_sidebar( 'malen-footer-1' )){
                                        dynamic_sidebar( 'malen-footer-1' ); 
                                        }
                                        if( is_active_sidebar( 'malen-footer-2' )){
                                        dynamic_sidebar( 'malen-footer-2' ); 
                                        }
                                        if( is_active_sidebar( 'malen-footer-3' )){
                                        dynamic_sidebar( 'malen-footer-3' ); 
                                        } 
                                        if( is_active_sidebar( 'malen-footer-4' )){
                                        dynamic_sidebar( 'malen-footer-4' ); 
                                        }  
                                    echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
                if( $malen_footer_bottom_active == '1' ){
                    $class = has_nav_menu( 'footer-menu' ) ? 'justify-content-between' : 'justify-content-center';
                    $center = has_nav_menu( 'footer-menu' ) ? '' : 'text-center';
                    echo '<div class="copyright-wrap bg-black">';
                        echo '<div class="container">';
                            echo '<div class="row '.$class.'">';
                                echo '<div class="col-lg-6">';
                                        echo '<p class="copyright-text '.$center.'">'.wp_kses( malen_opt( 'malen_copyright_text' ), $allowhtml ).'</p>';
                                echo '</div>';
                                if( has_nav_menu( 'footer-menu' ) ) {
                                echo '<div class="col-lg-6">';
                                    echo '<div class="footer-links">';
                                        wp_nav_menu( array(
                                            "theme_location"    => 'footer-menu',
                                            "container"         => '',
                                            "menu_class"        => ''
                                        ) ); 

                                    echo '</div>';
                                echo '</div>';
                                }
                             echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }

                if(!empty(malen_opt('malen_footer_shape', 'url' ) )){
                    echo '<div  class="shape-mockup" data-bottom="0%" data-left="0%">';
                        echo malen_img_tag( array(
                            "url"   => malen_opt('malen_footer_shape', 'url'),
                        ) );
                    echo '</div>';
                }
                if(!empty(malen_opt('malen_footer_shape2', 'url' ) )){
                    echo '<div  class="shape-mockup" data-bottom="0%" data-right="0%">';
                        echo malen_img_tag( array(
                            "url"   => malen_opt('malen_footer_shape2', 'url'),
                        ) );
                    echo '</div>';
                }

            echo '</footer>';
            echo '<!---footer-wrapper end-->';
        }
}

// Social link
function malen_social_icon(){
    $malen_social_icon = malen_opt( 'malen_social_links' );
    if( ! empty( $malen_social_icon ) && isset( $malen_social_icon ) ){
        foreach( $malen_social_icon as $social_icon ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i>'.esc_attr( $social_icon['description'] ).'</a>';
        }
    }
}


// global header
function malen_global_header_option() {

    if( class_exists( 'ReduxFramework' ) ){ ?>
        <div class="th-header header-layout2 prebuilt header-absolute">
        <?php
        echo malen_header_menu_topbar();
        echo malen_header_cart_offcanvas();
        echo malen_mobile_menu();
        echo malen_search_box();

        $phone     = malen_opt( 'malen_topbar_phone' );
        $phone_label     = malen_opt( 'malen_topbar_phone_label' );

        $replace_phoone = array(' ','-',' - ', '(', ')');
        $with           = array('','','');

        $phoneurl       = str_replace( $replace_phoone, $with, $phone );

        if(!empty(malen_opt( 'malen_topbar_phone_icon' ))){
            $phone_icon     = malen_opt( 'malen_topbar_phone_icon' );
        }else{
            $phone_icon = '';
        } 

        ?>

            <div class="sticky-wrapper">
                <!-- Main Menu Area -->
                <div class="menu-area">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <?php echo malen_theme_logo(); ?>
                                </div>
                            </div>
                            <div class="col-auto me-xl-auto">
                                <nav class="main-menu d-none d-lg-inline-block">
                                    <?php 
                                        wp_nav_menu( array(
                                            "theme_location"    => 'primary-menu',
                                            "container"         => '',
                                            "menu_class"        => ''
                                        ) ); 
                                    ?>
                                </nav>
                            </div>
                            <div class="col-auto">
                                <div class="header-button">
                                    <?php if(!empty(malen_opt( 'malen_header_cart_switcher' )) ): 
                                            if( class_exists( 'woocommerce' ) ):
                                            global $woocommerce;
                                            if( ! empty( $woocommerce->cart->cart_contents_count ) ){
                                                $count = $woocommerce->cart->cart_contents_count;
                                            }else{
                                                $count = "0";
                                            }
                                    ?>
                                        <button type="button" class="icon-btn fs-6 sideMenuToggler">
                                            <i class="fa-regular fa-bag-shopping"></i>
                                            <span class="badge"><?php echo esc_html( $count ) ?></span>
                                        </button>
                                    <?php endif; endif; ?> 

                                    <?php if(!empty(malen_opt( 'malen_header_search_switcher' )) ): ?>
                                        <button type="button" class="icon-btn searchBoxToggler"><i class="fal fa-search"></i></button>
                                    <?php endif; ?> 
                                    <?php if(!empty(malen_opt( 'malen_phone_switcher' )) ): ?>
                                    <div class="header-info">
                                        <?php if(!empty($phone_icon) ): ?>
                                        <div class="header-info_icon">
                                            <a href="<?php echo esc_attr( 'tel:'.$phoneurl ) ?>">
                                                <img src="<?php echo esc_url( malen_opt('malen_topbar_phone_icon', 'url' ) ) ?>" alt="">
                                            </a>
                                        </div>
                                        <?php endif; ?> 
                                        <div class="media-body">
                                            <span class="header-info_label"><?php echo esc_html( $phone_label ); ?></span>
                                            <p class="header-info_link"><a href="<?php echo esc_attr( 'tel:'.$phoneurl ) ?>"><?php echo esc_html( $phone ); ?></a>
                                            </p>
                                        </div>
                                    </div>
                                    <?php endif; ?> 
                                    <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(!empty(malen_opt('malen_logo_shape', 'url' ) )): ?>
                <div class="logo-shape2">
                    <?php echo malen_img_tag( array(
                        "url"   => malen_opt('malen_logo_shape', 'url'),
                    ) ); ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
    <?php
    }else{
        echo malen_global_header();
    }
}

if( ! function_exists( 'malen_header_menu_topbar' ) ){
    function malen_header_menu_topbar(){
        if( class_exists( 'ReduxFramework' ) ){
            $malen_header_topbar_switcher  = malen_opt( 'malen_header_topbar_switcher' );
            $malen_show_social_icon        = malen_opt( 'malen_header_topbar_social_icon_switcher' );
        }else{
            $malen_header_topbar_switcher  = '';
            $malen_show_social_icon        = '';
        }

        if( $malen_header_topbar_switcher ){
            $allowhtml = array(
                'a'    => array(
                    'href' => array(),
                    'class' => array()
                ),
                'u'    => array(
                    'class' => array()
                ),
                'span' => array(
                    'class' => array()
                ),
                'i'    => array(
                    'class' => array()
                )
            );
            $address     = malen_opt( 'malen_topbar_address' );
            $email     = malen_opt( 'malen_topbar_email' );

            $email          = is_email( $email );
            $replace        = array(' ','-',' - ');
            $with           = array('','','');

            $emailurl       = str_replace( $replace, $with, $email );

            if(!empty(malen_opt( 'malen_topbar_address_icon' ))){
                $address_icon     = malen_opt( 'malen_topbar_address_icon' );
            }else{
                $address_icon = '';
            } 

            if(!empty(malen_opt( 'malen_topbar_email_icon' ))){
                $email_icon     = malen_opt( 'malen_topbar_email_icon' );
            }else{
                $email_icon = '';
            } 

            ?>
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                        <div class="col-auto d-none d-md-block">
                            <div class="header-links">
                                <ul>
                                    <li><?php echo wp_kses_post($email_icon); ?><a href="<?php echo esc_attr('mailto:' . $emailurl); ?>"><?php echo esc_html( $email ); ?></a></li>
                                    <li><?php echo wp_kses_post($address_icon); ?><?php echo esc_html( $address ); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="header-right">
                                <?php if(!empty(malen_opt( 'malen_header_lang_switcher' )) ): ?>
                                <div class="langauge lang-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__( 'Language', 'malen' );?></a>
				                        <div class="list dropdown-menu" aria-labelledby="dropdownMenuLink1">
				                            <?php  echo do_shortcode('[gtranslate]'); ?>
				                        </div>
                                </div>
                                <?php endif; ?>

                                <?php  if($malen_show_social_icon ): ?>
                                <div class="header-social">
                                    <?php echo malen_social_icon(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        <?php
        }
    }
}

// malen woocommerce breadcrumb
function malen_woo_breadcrumb( $args ) {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcumb-menu">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'malen' ),
    );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'malen_woo_breadcrumb' );

function malen_custom_search_form( $class ) {
    echo '<!-- Search Form -->';

    echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'" class="'.esc_attr( $class ).'">';
        echo '<label class="searchIcon">';
            echo malen_img_tag( array(
                "url"   => esc_url( get_theme_file_uri( '/assets/img/search-2.svg' ) ),
                "class" => "svg"
            ) );
            echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'malen').'">';
        echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}



//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'malen_remove_tagcloud_inline_style',10,1 );
function malen_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'malen_cat_count_span' );
function malen_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'malen_archive_count_span' );
function malen_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

//header search box
if(! function_exists('malen_search_box')){
    function malen_search_box(){
        echo '<div class="popup-search-box d-none d-lg-block">';
            echo '<button class="searchClose"><i class="fal fa-times"></i></button>';
            echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'">';
                echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'malen').'">';
                echo '<button type="submit"><i class="fal fa-search"></i></button>';
            echo '</form>';
        echo '</div>';
    }
}


// Malen Default Header
if( ! function_exists( 'malen_global_header' ) ){
    function malen_global_header(){ ?>

        <!--Mobile menu & Search box-->
        <?php 
        echo malen_search_box(); 
        echo malen_mobile_menu(); 
        
        ?>

        <!--======== Header ========-->
        <div class="th-header header-layout1 unittest-header">
            <div class="sticky-wrapper">
                <div class="sticky-active">
                    <div class="menu-area">
                        <div class="container">
                            <div class="row gx-20 align-items-center justify-content-between">

                                <div class="col-auto">
                                    <div class="header-logo">
                                       <?php echo malen_theme_logo(); ?>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <?php
                                    if( has_nav_menu( 'primary-menu' ) ) { ?>
                                        <nav class="main-menu d-none d-lg-inline-block">
                                            <?php
                                            wp_nav_menu( array(
                                                "theme_location"    => 'primary-menu',
                                                "container"         => '',
                                                "menu_class"        => ''
                                            ) ); ?>
                                        </nav>
                                    <?php } ?>                                   
                                    </nav>
                                    <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                                </div>
                                <div class="col-auto d-none d-xl-block">
                                    <div class="header-button">
                                        <button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-bg"></div>
                </div>
            </div>
        </div>
    <?php
    }
}


//header Offcanvas
if( ! function_exists( 'malen_header_offcanvas' ) ){
    function malen_header_offcanvas(){
        ?>
    <div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
             <?php 
                if(is_active_sidebar('malen-offcanvas')){
                    dynamic_sidebar( 'malen-offcanvas' );
                }else{
                    echo '<h4 class="text-white">No Widget Added </h3>';
                    echo '<p class="text-white">Please add some widget in Offcanvs Sidebar</p>';
                }
            ?>
        </div>
    </div>

<?php
    }
}

//header Cart Offcanvas
if( ! function_exists( 'malen_header_cart_offcanvas' ) ){
    function malen_header_cart_offcanvas(){
        ?>
    <div class="sidemenu-wrapper d-none d-lg-block">
        <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title"><?php echo esc_html__( 'Shopping cart', 'malen' ); ?></h3>
                <div class="widget_shopping_cart_content">
                     <?php // echo woocommerce_mini_cart(); ?>
                    
                </div>
            </div>
        </div>
    </div>

<?php
    }
}

//header Mobile Menu
if( ! function_exists( 'malen_mobile_menu' ) ){
    function malen_mobile_menu(){
    ?>
 <div class="th-menu-wrapper">
     <div class="th-menu-area">
         <div class="mobile-logo">
                <?php echo malen_theme_logo(); ?>
                <div class="close-menu">
                    <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
                </div>
            </div>
            <div class="th-mobile-menu">
                <?php 
                    if( has_nav_menu( 'primary-menu' ) ){
                        wp_nav_menu( array(
                            "theme_location"    => 'primary-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    }
}



// Blog post views function
function malen_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function malen_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'malen' );
    }
    return $count;
}


// Add Extra Class On Comment Reply Button
function malen_custom_comment_reply_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'malen_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function malen_custom_edit_comment_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'malen_custom_edit_comment_link', 99);


function malen_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        $classes[] = "the-blog blog-single th-post-thumbnail";
    }elseif( get_post_type() === 'product' ){
        // Return Class
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }
    
    return $classes;
}
add_filter( 'post_class', 'malen_post_classes', 10, 3 );

// Contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');