<?php
// AUCTION BADGE AS RIBBON
// New badge for auction products
add_action( 'woocommerce_before_shop_loop_item_title', 'new_badge', 3 );
          
function new_badge() {
   global $product;
//If is an auction product
   if (is_a( $product, 'WC_Product_Auction' )){
	echo '<div class="ribbon-container">
    		<div class="ribbon-container-wrapper">
        		<div class="ribbon-container-ribbon">
            		<p><span class="new-badge-auction">' . esc_html__( 'AUCTION', 'woocommerce' ) . '</span></p>
        		</div>
    		</div>
		</div>';
   }
}
?>