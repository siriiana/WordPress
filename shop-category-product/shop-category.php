<?php
/* DOKAN VENDOR CATEGORY - 21/02/2022 */
// Fetches the vendor category
function fetch_store_category($store_info) {
$kategoria=$store_info['categories'];
	
$name = $kategoria[0]->description; //Gets the category's DESCRIPTION
return ($name);
}
//Display category information on single product page
add_action( 'woocommerce_share', 'display_store_category', 21 );

function display_store_category() {
    // Get the author ID (the vendor ID)
    $vendor_id = get_post_field( 'post_author', get_the_id() );
    // Get the WP_User object (the vendor) from author ID
    $vendor = new WP_User($vendor_id);
    $store_info  = dokan_get_store_info( $vendor_id ); // Get the store data
    $store_category = fetch_store_category($store_info); //Get the specified category info back from function
		
    // Display the seller store category description
	echo( "<p>{$store_category}</p>");
}
?>