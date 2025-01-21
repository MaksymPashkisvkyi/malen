<?php
/**
 * @Packge     : Malen
 * @Version    : 1.0
 * @Author     : Malen
 * @Author URI : https://themeholy.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function malen_core_essential_scripts( ) {
    wp_enqueue_script('malen-ajax',MALEN_PLUGDIRURI.'assets/js/malen.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'malen-ajax',
    'malenajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'malen-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','malen_core_essential_scripts');


// malen Section subscribe ajax callback function
add_action( 'wp_ajax_malen_subscribe_ajax', 'malen_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_malen_subscribe_ajax', 'malen_subscribe_ajax' );

function malen_subscribe_ajax( ){
  $apiKey = malen_opt('malen_subscribe_apikey');
  $listid = malen_opt('malen_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'malen-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'malen').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'malen').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'malen').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'malen').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'malen').'</div>';
        }
   }

   wp_die();

}

add_action('wp_ajax_malen_addtocart_notification','malen_addtocart_notification');
add_action('wp_ajax_nopriv_malen_addtocart_notification','malen_addtocart_notification');
function malen_addtocart_notification(){

    $_product = wc_get_product($_POST['prodid']);
    $response = [
        'img_url'   => esc_url( wp_get_attachment_image_src( $_product->get_image_id(),array('60','60'))[0] ),
        'title'     => wp_kses_post( $_product->get_title() )
    ];
    echo json_encode($response);

    wp_die();
}