<?php

if (!function_exists('superfood_elated_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 9
	 * @return int number of products to be shown per page
	 */
	function superfood_elated_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (superfood_elated_options()->getOptionValue('eltdf_woo_products_per_page')) {
			$products_per_page = superfood_elated_options()->getOptionValue('eltdf_woo_products_per_page');
		}

		return $products_per_page;
	}
}

if (!function_exists('superfood_elated_woocommerce_thumbnails_per_row')) {
	/**
	 * Function that sets number of thumbnails on single product page per row. Default is 3
	 * @return int number of thumbnails to be shown on single product page per row
	 */
	function superfood_elated_woocommerce_thumbnails_per_row() {
		
		$product_single_layout = superfood_elated_get_meta_field_intersect('single_product_layout');
		$product_thumbnail_position = superfood_elated_get_meta_field_intersect('woo_set_thumb_images_position');
		
		if ($product_single_layout === 'standard' && $product_thumbnail_position === 'on-left-side') {
			return 4;
		} else {
			return 3;
		}
	}
}

if (!function_exists('superfood_elated_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function superfood_elated_woocommerce_related_products_args($args) {

		if (superfood_elated_options()->getOptionValue('eltdf_woo_product_list_columns')) {

			$related = superfood_elated_options()->getOptionValue('eltdf_woo_product_list_columns');
			switch ($related) {
				case 'eltdf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'eltdf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('superfood_elated_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function superfood_elated_woocommerce_template_loop_product_title() {

		$tag = superfood_elated_options()->getOptionValue('eltdf_products_list_title_tag');
		if($tag === '') {
			$tag = 'h4';
		}
		the_title('<' . $tag . ' class="eltdf-product-list-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');
	}
}

if (!function_exists('superfood_elated_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function superfood_elated_woocommerce_template_single_title() {

		$tag = superfood_elated_options()->getOptionValue('eltdf_single_product_title_tag');
		if($tag === '') {
			$tag = 'h2';
		}
		the_title('<' . $tag . '  itemprop="name" class="eltdf-single-product-title">', '</' . $tag . '>');
	}
}

if (!function_exists('superfood_elated_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_sale_flash() {

		return '<span class="eltdf-onsale">' . esc_html__('Sale', 'superfood') . '</span>';
	}
}

if (!function_exists('superfood_elated_woocommerce_product_out_of_stock')) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_product_out_of_stock() {

		global $product;

		if (!$product->is_in_stock()) {
			print '<span class="eltdf-out-of-stock">' . esc_html__('Out of Stock', 'superfood') . '</span>';
		}
	}
}

if (!function_exists('superfood_elated_woocommerce_product_thumbnail_column_size')) {
	function superfood_elated_woocommerce_product_thumbnail_column_size() {
		
		$product_single_layout = superfood_elated_get_meta_field_intersect('single_product_layout');
		$product_thumbnail_position = superfood_elated_get_meta_field_intersect('woo_set_thumb_images_position');
		
		if ($product_single_layout === 'sticky-info') {
			return 1;
		} else if ($product_single_layout === 'standard' && $product_thumbnail_position === 'on-left-side') {
			return 4;
		} else {
			return 3;
		}
	}
}

if (!function_exists('superfood_elated_woocommerce_product_thumbnail_size')) {
	function superfood_elated_woocommerce_product_thumbnail_size() {
		
		$product_single_layout = superfood_elated_get_meta_field_intersect('single_product_layout');
		
		if ($product_single_layout === 'sticky-info') {
			return "shop_single";
		} else {
			return "shop_thumbnail";
		}
	}
}

if (!function_exists('superfood_elated_woocommerce_add_hover_product_image')) {
	/**
	 * Function for overriding Product List Thumbnail Template
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_add_hover_product_image() {
		$hover_image = get_post_meta(get_the_ID(), 'eltdf_product_hover_featured_image_meta', true);
		
		if(!empty($hover_image)) {
			echo '<img class="eltdf-attachment-shop-catalog" src="'.esc_url($hover_image).'" alt="'.esc_html__('Product List Hover Image', 'superfood').'" />';
		}
	}
}

if (!function_exists('superfood_elated_single_product_content_additional_tag_before')) {
	function superfood_elated_single_product_content_additional_tag_before() {

		print '<div class="eltdf-single-product-content">';
	}
}

if (!function_exists('superfood_elated_single_product_content_additional_tag_after')) {
	function superfood_elated_single_product_content_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('superfood_elated_single_product_summary_additional_tag_before')) {
	function superfood_elated_single_product_summary_additional_tag_before() {

		print '<div class="eltdf-single-product-summary">';
	}
}

if (!function_exists('superfood_elated_single_product_summary_additional_tag_after')) {
	function superfood_elated_single_product_summary_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('superfood_elated_pl_holder_additional_tag_before')) {
	function superfood_elated_pl_holder_additional_tag_before() {

		print '<div class="eltdf-pl-main-holder">';
	}
}

if (!function_exists('superfood_elated_pl_holder_additional_tag_after')) {
	function superfood_elated_pl_holder_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('superfood_elated_pl_inner_additional_tag_before')) {
	function superfood_elated_pl_inner_additional_tag_before() {

		print '<div class="eltdf-pl-inner">';
	}
}

if (!function_exists('superfood_elated_pl_inner_additional_tag_after')) {
	function superfood_elated_pl_inner_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('superfood_elated_pl_image_additional_tag_before')) {
	function superfood_elated_pl_image_additional_tag_before() {
		$hover_image = get_post_meta(get_the_ID(), 'eltdf_product_hover_featured_image_meta', true);
		
		if(!empty($hover_image)) {
			print '<div class="eltdf-pl-image eltdf-has-hover-image">';
		} else {
			print '<div class="eltdf-pl-image">';
		}
	}
}

if (!function_exists('superfood_elated_pl_image_additional_tag_after')) {
	function superfood_elated_pl_image_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('superfood_elated_pl_inner_text_additional_tag_before')) {
	function superfood_elated_pl_inner_text_additional_tag_before() {

		print '<div class="eltdf-pl-text"><div class="eltdf-pl-text-outer"><div class="eltdf-pl-text-inner">';
	}
}

if (!function_exists('superfood_elated_pl_inner_text_additional_tag_after')) {
	function superfood_elated_pl_inner_text_additional_tag_after() {

		print '</div></div></div>';
	}
}

if (!function_exists('superfood_elated_pl_text_wrapper_additional_tag_before')) {
	function superfood_elated_pl_text_wrapper_additional_tag_before() {

		print '<div class="eltdf-pl-text-wrapper">';
	}
}

if (!function_exists('superfood_elated_pl_text_wrapper_additional_tag_after')) {
	function superfood_elated_pl_text_wrapper_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('superfood_elated_pl_rating_additional_tag_before')) {
	function superfood_elated_pl_rating_additional_tag_before() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html($product->get_average_rating());;

			if($rating_html !== '') {
				print '<div class="eltdf-pl-rating-holder">';
			}
		}
	}
}

if (!function_exists('superfood_elated_pl_rating_additional_tag_after')) {
	function superfood_elated_pl_rating_additional_tag_after() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html($product->get_average_rating());;

			if($rating_html !== '') {
				print '</div>';
			}
		}
	}
}

if (!function_exists('superfood_elated_woocommerce_title_html_part')) {
	/**
	 * Function for adding Title html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_title_html_part($class_name = '', $title_tag = '', $has_link = '', $title_styles = '') {
		
		if ($has_link === 'yes') {
			$html = '<'.esc_attr($title_tag).' itemprop="name" class="entry-title eltdf-'.esc_attr($class_name).'-title" '.superfood_elated_get_inline_style($title_styles).'><a itemprop="url" href="'.get_the_permalink().'">'.get_the_title().'</a></'.esc_attr($title_tag).'>';
		} else {
			$html = '<'.esc_attr($title_tag).' itemprop="name" class="entry-title eltdf-'.esc_attr($class_name).'-title" '.superfood_elated_get_inline_style($title_styles).'>'.get_the_title().'</'.esc_attr($title_tag).'>';
		}
		
		return $html;
	}
}

if (!function_exists('superfood_elated_woocommerce_category_html_part')) {
	/**
	 * Function for adding Category html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_category_html_part($class_name = '') {
		global $product;
		
		$html = '';
		$product_categories = wc_get_product_category_list($product->get_id(), ', ');

		if (!empty($product_categories)) {
			
			$html = '<h6 class="eltdf-'.esc_attr($class_name).'-category">'.$product_categories.'</h6>';
		}
		
		return $html;
	}
}

if (!function_exists('superfood_elated_woocommerce_excerpt_html_part')) {
	/**
	 * Function for adding Excerpt html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_excerpt_html_part($class_name = '', $excerpt_length = 0) {
		
		$excerpt = ($excerpt_length > 0) ? substr(get_the_excerpt(), 0, intval($excerpt_length)) : get_the_excerpt();
		
		$html = '<p itemprop="description" class="eltdf-'.esc_attr($class_name).'-excerpt">'.esc_html($excerpt).'</p>';
		
		return $html;
	}
}

if (!function_exists('superfood_elated_woocommerce_rating_html_part')) {
	/**
	 * Function for adding Rating html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_rating_html_part($class_name = '') {
		global $product;
		
		$html = '';
		
		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$average      = $product->get_average_rating();
			
			$html = '<div class="eltdf-'.esc_attr($class_name).'-rating-holder"><div class="eltdf-'.esc_attr($class_name).'-rating" title="'.sprintf(esc_html__("Rated %s out of 5", "superfood"), $average ).'"><span style="width:'.(($average / 5)*100).'%"></span></div></div>';
		}
		
		return $html;
	}
}

if (!function_exists('superfood_elated_woocommerce_price_html_part')) {
	/**
	 * Function for adding Price html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_price_html_part($class_name = '') {
		global $product;
		
		$html = '';
		
		if ( $price_html = $product->get_price_html() ) {
			$html = '<div class="eltdf-'.esc_attr($class_name).'-price">'.$price_html.'</div>';
		}
		
		return $html;
	}
}

if (!function_exists('superfood_elated_woocommerce_add_to_cart_html_part')) {
	/**
	 * Function for adding Add To Cart Button html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_add_to_cart_html_part($class_name = '', $button_skin = '') {
		global $product;
		
		$buttonSkinClass = '';
		if(!empty($button_skin)) {
			$buttonSkinClass = 'eltdf-'.$button_skin.'-skin';
		}
		
		if (!$product->is_in_stock()) {
			$button_classes = 'button ajax_add_to_cart eltdf-button';
		} else if ($product->get_type() === 'variable') {
			$button_classes = 'button product_type_variable add_to_cart_button eltdf-button';
		} else if ($product->get_type() === 'external') {
			$button_classes = 'button product_type_external eltdf-button';
		} else {
			$button_classes = 'button add_to_cart_button ajax_add_to_cart eltdf-button';
		}
		$html = '';
		
		$html .= '<div class="eltdf-'.esc_attr($class_name).'-add-to-cart '.esc_attr($buttonSkinClass).'">';
		$html .= apply_filters( 'superfood_elated_product_list_add_to_cart_link',
			sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( $button_classes ),
				esc_html( $product->add_to_cart_text() )
			),
			$product );
		$html .= '</div>';
		
		return $html;
	}
}

if (!function_exists('superfood_elated_woocommerce_image_html_part')) {
	/**
	 * Function for adding Image html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_image_html_part($class_name = '', $image_size = '', $hover_image = '') {
		global $product;
		
		$html = '';
		
		if ($product->is_on_sale()) {
			$html .= '<span class="eltdf-'.esc_attr($class_name).'-onsale">'.esc_html__("Sale", "superfood").'</span>';
		}
		if (!$product->is_in_stock()) {
			$html .= '<span class="eltdf-'.esc_attr($class_name).'-out-of-stock">'.esc_html__("Out of Stock", "superfood").'</span>';
		}
		
		$product_image_size = 'shop_catalog';
		if($image_size === 'full') {
			$product_image_size = 'full';
		} else if ($image_size === 'square') {
			$product_image_size = 'superfood_elated_image_square';
		} else if ($image_size === 'landscape') {
			$product_image_size = 'superfood_elated_image_landscape';
		} else if ($image_size === 'portrait') {
			$product_image_size = 'superfood_elated_image_portrait';
		} else if ($image_size === 'medium') {
			$product_image_size = 'medium';
		} else if ($image_size === 'large') {
			$product_image_size = 'large';
		}
		
		$html .= get_the_post_thumbnail( get_the_ID(), apply_filters( 'superfood_elated_product_list_image_size', $product_image_size ));
		
		if(!empty($hover_image)) {
			$html .= '<img class="eltdf-'.esc_attr($class_name).'-hover-image" src="'.esc_url($hover_image).'" alt="'.esc_html__('Product List Hover Image', 'superfood').'" />';
		}
		
		return $html;
	}
}

if (!function_exists('superfood_elated_woocommerce_no_products_found_html_part')) {
	/**
	 * Function for adding No products were found html part for shortcodes
	 *
	 * @return string
	 */
	function superfood_elated_woocommerce_no_products_found_html_part($class_name = '') {
		
		$html = '<div class="eltdf-'.esc_attr($class_name).'-messsage"><p>'.esc_html__("No products were found!", "superfood").'</p></div>';
		
		return $html;
	}
}