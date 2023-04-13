
// Rename Product Tabs
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );

	function woo_rename_tabs( $tabs ) {
		$tabs['description']['title'] = __( 'Notice' );		// Rename the description tab
		$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
		$tabs['additional_information']['title'] = __( 'Product Data' );	// Rename the additional information tab
	
	return $tabs;
}

// Remove Product Tabs
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

	function woo_remove_product_tabs( $tabs ) {
    		unset( $tabs['reviews'] ); 			// Remove the reviews tab
    		unset( $tabs['additional_information'] );  	// Remove the additional information tab

    	return $tabs;
}

// Go to Checkout on Add to Cart
add_filter('add_to_cart_redirect', 'ql_skip_cart_page');

	function ql_skip_cart_page () {
 		global $woocommerce;
		$redirect_checkout = $woocommerce->cart->get_checkout_url();

 	return $redirect_checkout;
}

// Change add to cart button text per category
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wps_custom_cart_button_text' );

	function wps_custom_cart_button_text() {

		global $product;
		$terms = get_the_terms( $product->ID, 'product_cat' );
		foreach ($terms as $term) {

		$product_cat = $term->slug;
	
	break;
	}

	switch($product_cat) {

		case 'application-fees';
	    	return __('Example Pay Fee', 'your_theme_text_domain' );

	default;
	return __( 'Add to Cart', 'your_theme_text_domain' );
	}

}
