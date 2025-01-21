<?php
	// Block direct access
	if( ! defined( 'ABSPATH' ) ){
		exit( );
	}
	/**
	* @Packge 	   : Malen
	* @Version     : 1.0
	* @Author     : Themeholy
    * @Author URI : https://themeholy.com/
	*
	*/

	if( ! is_active_sidebar( 'malen-woo-sidebar' ) ){
		return;
	}
?>
<div class="col-xl-3 col-lg-4">
	<!-- Sidebar Begin -->
	<aside class="sidebar-area shop-sidebar">
		<?php
			dynamic_sidebar( 'malen-woo-sidebar' );
		?>
	</aside>
	<!-- Sidebar End -->
</div>