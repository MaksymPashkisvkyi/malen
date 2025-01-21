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

    if( !empty( malen_pagination() ) ) :
?>
<!-- Post Pagination -->
<div class="th-pagination ">
    <ul>
        <?php
            $prev   = '<i class="fas fa-angles-left"></i>';
            $next   = '<i class="fas fa-angles-right"></i>';
            // previous
            if( get_previous_posts_link() ){
                echo '<li>';
                previous_posts_link( $prev );
                echo '</li>';
            }

            echo malen_pagination();

            // next
            if( get_next_posts_link() ){
                echo '<li>';
                next_posts_link( $next );
                echo '</li>';
            }
        ?>
    </ul>
</div>
<!-- End of Post Pagination -->
<?php endif;