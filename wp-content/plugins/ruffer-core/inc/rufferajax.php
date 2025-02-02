<?php
/**
 * @Packge     : Ruffer
 * @Version    : 1.0
 * @Author     : Ruffer
 * @Author URI : https://www.themeholy.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ruffer_core_essential_scripts( ) {
    wp_enqueue_script('ruffer-ajax',RUFFER_PLUGDIRURI.'assets/js/ruffer.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'ruffer-ajax',
    'rufferajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'ruffer-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','ruffer_core_essential_scripts');


// ruffer Section subscribe ajax callback function
add_action( 'wp_ajax_ruffer_subscribe_ajax', 'ruffer_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_ruffer_subscribe_ajax', 'ruffer_subscribe_ajax' );

function ruffer_subscribe_ajax( ){
  $apiKey = ruffer_opt('ruffer_subscribe_apikey');
  $listid = ruffer_opt('ruffer_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'ruffer-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'ruffer').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'ruffer').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'ruffer').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'ruffer').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'ruffer').'</div>';
        }
   }

   wp_die();

}

add_action('wp_ajax_ruffer_addtocart_notification','ruffer_addtocart_notification');
add_action('wp_ajax_nopriv_ruffer_addtocart_notification','ruffer_addtocart_notification');
function ruffer_addtocart_notification(){

    $_product = wc_get_product($_POST['prodid']);
    $response = [
        'img_url'   => esc_url( wp_get_attachment_image_src( $_product->get_image_id(),array('60','60'))[0] ),
        'title'     => wp_kses_post( $_product->get_title() )
    ];
    echo json_encode($response);

    wp_die();
}