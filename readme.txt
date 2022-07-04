In this project there are a few modules for WordPress.

display_name

-Unique display_name
-WooCommerce edit account, when changing display_name the filter checks if it already exists.
-If the display_name does exist -> saves the existing user's username (which is unique).
-If display_name doesn't exist -> saves it.
-No esc_ in place

popup-chat

-Dokan, adds the whatsapp chat to the product page if the vendor has saved one in their shop settings.
-JavaScript adds a popup speach bubble to acknowledge it and it closes on click.

auction-product

-WooCommerce and simple auctions plugin, checks if the product is an auction product.
-If it is an auction product, a ribbon is added to the shop_loop to signify it.
-Also hides the existing default auction mark.

shop-category-product

-Adds the Dokan shop category to product page