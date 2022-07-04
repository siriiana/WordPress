<?php
// WHATSAPP ON SINGLE PRODUCT PAGE - 24/03/2022
add_action('woocommerce_after_single_product', 'vendor_wa_on_product_page');

function vendor_wa_on_product_page(){
	global $product;
	$seller = get_post_field('post_author', $product->get_id());
	$author = get_user_by('id', $seller);
	$store_info = dokan_get_store_info($author->ID); 
	$whatsapp_number = $store_info["whatsapp_number"];
    if ($whatsapp_number != null) {
		printf('<div class="popup">
			<p class="popup-text" id="chat-popup"><span class="close-popup-button">&times;</span>Kysy tuotteesta WhatsAppilla!</p>
		</div>');
		echo do_shortcode( sprintf( '[dokan-live-chat-whatsapp number="%s"]', $whatsapp_number ) );
	}
}
?>