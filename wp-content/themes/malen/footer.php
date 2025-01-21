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
    
    /**
    *
    * Hook for Footer Content
    *
    * Hook malen_footer_content
    *
    * @Hooked malen_footer_content_cb 10
    *
    */
    do_action( 'malen_footer_content' );


    /**
    *
    * Hook for Back to Top Button
    *
    * Hook malen_back_to_top
    *
    * @Hooked malen_back_to_top_cb 10
    *
    */
    do_action( 'malen_back_to_top' );

    wp_footer();
    ?>
</body>
</html>