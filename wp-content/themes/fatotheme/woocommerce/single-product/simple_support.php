<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
/*
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
*/
//$woocommerce = fatotheme_get_woocommerce();

$primaryProductID = $_POST['primary_prod_id'];

WC()->cart->add_to_cart( $primaryProductID );
//$woocommerce->cart->add_to_cart( $primaryProductID );

//echo $primaryProductID;
?>
<?php /*endif;*/ ?>
