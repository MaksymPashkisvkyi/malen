<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Malen
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://themeholy.com/
 *
 */

// enqueue css
function malen_common_custom_css(){
	wp_enqueue_style( 'malen-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = malen_opt( 'malen_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $malen_header_bg =  get_header_image();
    }else{
        if( malen_meta( 'page_breadcrumb_settings' ) == 'page' ){
            if( ! empty( malen_meta( 'breadcumb_image' ) ) ){
                $malen_header_bg = malen_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $malen_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$malen_header_bg}')!important;
        }";
    }
    
	// theme color
	$malenthemecolor = malen_opt('malen_theme_color');
    if( !empty( $malenthemecolor ) ){
        list($r, $g, $b) = sscanf( $malenthemecolor, "#%02x%02x%02x");

        $malen_real_color = $r.','.$g.','.$b;
        if( !empty( $malenthemecolor ) ) {
            $customcss .= ":root {
            --theme-color: rgb({$malen_real_color}); 
            }";
        }
    }
    // Heading  color
	$malenheadingcolor = malen_opt('malen_heading_color');
    if( !empty( $malenheadingcolor ) ){
        list($r, $g, $b) = sscanf( $malenheadingcolor, "#%02x%02x%02x");

        $malen_real_color = $r.','.$g.','.$b;
        if( !empty( $malenheadingcolor ) ) {
            $customcss .= ":root {
                --title-color: rgb({$malen_real_color});
            }";
        }
    }
    // Body color
	$malenbodycolor = malen_opt('malen_body_color');
    if( !empty( $malenbodycolor ) ){
        list($r, $g, $b) = sscanf( $malenbodycolor, "#%02x%02x%02x");

        $malen_real_color = $r.','.$g.','.$b;
        if( !empty( $malenbodycolor ) ) {
            $customcss .= ":root {
                --body-color: rgb({$malen_real_color});
            }";
        }
    }
    // Border color
	$malenbordercolor = malen_opt('malen_border_color');
    if( !empty( $malenbordercolor ) ){
        list($r, $g, $b) = sscanf( $malenbordercolor, "#%02x%02x%02x");

        $malen_real_color = $r.','.$g.','.$b;
        if( !empty( $malenbordercolor ) ) {
            $customcss .= ":root {
                --border-color: rgb({$malen_real_color});
            }";
        }
    }

    // Body font
    $malenbodyfont = malen_opt('malen_theme_body_font', 'font-family');
    if( !empty( $malenbodyfont ) ) {
        $customcss .= ":root {
            --body-font: $malenbodyfont ;
        }";
    }

    // Heading font
    $malenheadingfont = malen_opt('malen_theme_heading_font', 'font-family');
    if( !empty( $malenheadingfont ) ) {
        $customcss .= ":root {
            --title-font: $malenheadingfont ;
        }";
    }
    

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'malen-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'malen_common_custom_css', 100 );