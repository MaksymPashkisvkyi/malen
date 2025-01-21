<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( class_exists('ReduxFramework') ) {
    $malen_woo_relproduct_display = malen_opt('malen_woo_relproduct_display');
    $malen_woo_relproduct_num = malen_opt('malen_woo_relproduct_num');

    $malen_woo_relproduct_slider = malen_opt('malen_woo_relproduct_slider');
    $slider_active = $malen_woo_relproduct_slider ? 'related-products-carousel' : '';

    $subtitle = malen_opt('malen_woo_relproduct_subtitle');
    $title = malen_opt('malen_woo_relproduct_title');
}else{
    $subtitle = esc_html__('','malen');
    $title = esc_html__('Related Shop','malen');
}

if ( $related_products && $malen_woo_relproduct_display) : ?>

    <div class="space-extra-top mb-30">
        
        <div class="related-title-area row justify-content-center">
            <div class="col-auto text-center">
                <p><?php echo esc_html($subtitle) ?> </p>
                <h2 class="sec-title"><?php echo esc_html($title) ?></h2>
            </div>
        </div>

        <div class="row <?php echo esc_attr($slider_active); ?>" id="productCarousel">

        <?php
            if( class_exists('ReduxFramework') ) {
                $malen_woo_related_product_col = malen_opt('malen_woo_related_product_col');
                if( $malen_woo_related_product_col == '2' ) {
                    $malen_woo_product_col_val = 'col-xl-2 col-lg-4 col-sm-6 mb-30';
                } elseif( $malen_woo_related_product_col == '3' ) {
                    $malen_woo_product_col_val = 'col-xl-3 col-lg-4 col-sm-6 mb-30';
                } elseif( $malen_woo_related_product_col == '4' ) {
                    $malen_woo_product_col_val = 'col-xl-4 col-lg-4 col-sm-6 mb-30';
                } elseif( $malen_woo_related_product_col == '6' ) {
                    $malen_woo_product_col_val = 'col-lg-6 col-sm-6 mb-30';
                }
            } else {
                $malen_woo_product_col_val = 'col-xl-3 col-lg-4 col-sm-6 mb-30';
            }
        ?>

            <?php foreach ( $related_products as $related_product ) : ?>
                <div class="<?php echo esc_attr($malen_woo_product_col_val) ?>">
                    <?php
                        $post_object = get_post( $related_product->get_id() );

                        setup_postdata( $GLOBALS['post'] =& $post_object );

                        wc_get_template_part( 'content', 'product' );
                    ?>
                </div>

            <?php endforeach; ?>

        </div>

    </div>

<?php endif;

wp_reset_postdata();