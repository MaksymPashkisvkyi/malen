<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : Malen
 * @version   : 1.0
 * @Author    : Themeholy
 * @Author URI: https://themeholy.com/
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$malen_layout = malen_meta( 'custom_page_layout' );

if( $malen_layout == '1' ){ ?>
	<div class="malen-main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
<?php }elseif( $malen_layout == '2' ){ ?>
    <div class="malen-main-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
<?php }else{ ?>
	<div class="malen-fluid">
<?php } ?>
	<div class="builder-page-wrapper">
	<?php 
	// Query
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			the_content();
		}
        wp_reset_postdata();
	} ?>

	</div>
<?php if( $malen_layout == '1' ){ ?>
				</div>
			</div>
		</div>
	</div>
<?php }elseif( $malen_layout == '2' ){ ?>
				</div>
			</div>
		</div>
	</div>
<?php }else{ ?>
	</div>
<?php }

//footer
get_footer();