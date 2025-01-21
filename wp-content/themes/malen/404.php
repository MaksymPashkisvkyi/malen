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

    if( class_exists( 'ReduxFramework' ) ) {
        $malen404title     = malen_opt( 'malen_fof_title' );
        $malen404description  = malen_opt( 'malen_fof_description' );
        $malen404btntext      = malen_opt( 'malen_fof_btn_text' );
    } else {
        $malen404title     = __( 'Page is Not Found', 'malen' );
        $malen404description  = __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'malen' );
        $malen404btntext      = __( ' Back To Home', 'malen');

    }

    // get header //
    get_header(); ?>

    <section class="space">
        <div class="container">
            <div class="error-img">
                <?php if(!empty(malen_opt('malen_for_img', 'url' ) )): ?>
                    <img src="<?php echo esc_url( malen_opt('malen_for_img', 'url' ) ) ?>" alt="<?php echo esc_attr__('404 image', 'malen'); ?>">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/error.svg" alt="<?php echo esc_attr__('404 image', 'malen'); ?>">
                <?php endif; ?>
            </div>
            <div class="error-content">
                <h2 class="error-title"><?php echo esc_html( $malen404title ); ?></h2>
                <p class="error-text"><?php echo esc_html( $malen404description ); ?></p>
                <div class="btn-group justify-content-center">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="th-btn error-btn">
                        <i class="fal fa-home me-2"></i><?php echo esc_html( $malen404btntext ); ?></a>
                </div>
            </div>
        </div>
    </section>

    <?php
    //footer
    get_footer();