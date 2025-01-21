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

if ( ! is_active_sidebar( 'malen-blog-sidebar' ) ) {
    return;
}
?>

<div class="col-xxl-4 col-lg-5">
    <aside class="sidebar-area">
	    <?php dynamic_sidebar( 'malen-blog-sidebar' ); ?>
	</aside>
</div>