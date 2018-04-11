<?php

/**
 * Shop WooCommerce Hooks
 */

/**
 * Layout
 *
 * @see iweb_woo_before_main_content()
 * @see iweb_woo_before_shop_loop_open()
 * @see iweb_woo_before_shop_loop_close()
 * @see iweb_woo_after_main_content()
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', 'iweb_woo_before_main_content', 10 );

add_action( 'woocommerce_before_shop_loop', 'iweb_woo_before_shop_loop_open',  5 );
add_action( 'woocommerce_before_shop_loop', 'iweb_woo_before_shop_loop_close',  35 );

add_action( 'iweb_woo_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_after_main_content', 'iweb_woo_after_main_content', 10 );


/**
 * Single Product
 *
 * @see iweb_woo_before_single_product()
 * @see iweb_woo_before_single_product_summary_open_warp()
 * @see iweb_woo_before_single_product_summary_open()
 * @see iweb_woo_before_single_product_summary_close()
 * @see iweb_woo_after_single_product_summary_close_warp()
 * @see iweb_woo_after_single_product()
 *
 */

add_action( 'woocommerce_before_single_product', 'iweb_woo_before_single_product', 5 );

add_action( 'woocommerce_before_single_product_summary', 'iweb_woo_before_single_product_summary_open_warp',  1 );

add_action( 'woocommerce_before_single_product_summary', 'iweb_woo_before_single_product_summary_open', 5 );
add_action( 'woocommerce_before_single_product_summary', 'iweb_woo_before_single_product_summary_close', 30 );

add_action( 'woocommerce_after_single_product_summary', 'iweb_woo_after_single_product_summary_close_warp', 5 );

add_action( 'woocommerce_after_single_product', 'iweb_woo_after_single_product', 30 );

