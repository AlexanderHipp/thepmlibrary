<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ($max_value && $min_value === $max_value) {
    ?>
    <div class="quantity eltdf-quantity-buttons hidden">
        <input type="hidden" class="qty" name="<?php echo esc_attr($input_name); ?>"
               value="<?php echo esc_attr($min_value); ?>"/>
    </div>
    <?php
} else {
    ?>
    <div class="quantity eltdf-quantity-buttons">
        <span class="eltdf-quantity-minus icon_minus-06"></span>
        <input type="text" step="<?php echo esc_attr($step); ?>" min="<?php echo esc_attr($min_value); ?>"
               max="<?php echo esc_attr($max_value); ?>" name="<?php echo esc_attr($input_name); ?>"
               value="<?php echo esc_attr($input_value); ?>"
               title="<?php echo esc_attr_x('Qty', 'Product quantity input tooltip', 'superfood') ?>"
               class="input-text qty text eltdf-quantity-input" size="4" pattern="<?php echo esc_attr($pattern); ?>"
               inputmode="<?php echo esc_attr($inputmode); ?>"/>
        <span class="eltdf-quantity-plus icon_plus"></span>
    </div>
    <?php
}

