<?php
include_once get_template_directory() . '/theme-includes.php';

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

if (!function_exists('superfood_elated_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function superfood_elated_styles() {

        //include theme's core styles
        wp_enqueue_style('superfood_elated_default_style', ELATED_ROOT . '/style.css');
        wp_enqueue_style('superfood_elated_modules', ELATED_ASSETS_ROOT . '/css/modules.min.css');

        superfood_elated_icon_collections()->enqueueStyles();

        wp_enqueue_style('wp-mediaelement');

        //is woocommerce installed?
        if (superfood_elated_is_woocommerce_installed()) {
            if (superfood_elated_load_woo_assets()) {

                //include theme's woocommerce styles
                wp_enqueue_style('superfood_elated_woo', ELATED_ASSETS_ROOT . '/css/woocommerce.min.css');
            }
        }

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();
        if (superfood_elated_load_woo_assets()) {
            $style_dynamic_deps_array = array('superfood_elated_woo', 'superfood_elated_woo_responsive');
        }

        if (file_exists(ELATED_ROOT_DIR . '/assets/css/style_dynamic.css') && superfood_elated_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('superfood_elated_style_dynamic', ELATED_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(ELATED_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        }

        //is responsive option turned on?
        if (superfood_elated_is_responsive_on()) {
            wp_enqueue_style('superfood_elated_modules_responsive', ELATED_ASSETS_ROOT . '/css/modules-responsive.min.css');

            //is woocommerce installed?
            if (superfood_elated_is_woocommerce_installed()) {
                if (superfood_elated_load_woo_assets()) {

                    //include theme's woocommerce responsive styles
                    wp_enqueue_style('superfood_elated_woo_responsive', ELATED_ASSETS_ROOT . '/css/woocommerce-responsive.min.css');
                }
            }

            //include proper styles
            if (file_exists(ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && superfood_elated_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('superfood_elated_style_dynamic_responsive', ELATED_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
            }
        }

        //include Visual Composer styles
        if (class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_style('js_composer_front');
        }
    }

    add_action('wp_enqueue_scripts', 'superfood_elated_styles');
}

if (!function_exists('superfood_elated_generate_first_main_color_per_page')) {
    /**
     * Function that checks first main color in page options and generate css if color is set
     */
    function superfood_elated_generate_first_main_color_per_page($style) {
        $id = superfood_elated_get_page_id();
        $first_color = superfood_elated_get_meta_field_intersect('first_color', $id);
        if ($first_color !== '') {

            extract(superfood_elated_generate_first_color_selectors());

            $style .= superfood_elated_dynamic_css($color_selector, array('color' => $first_color));
            $style .= superfood_elated_dynamic_css('::selection', array('background' => $first_color));
            $style .= superfood_elated_dynamic_css('::-moz-selection', array('background' => $first_color));
            $style .= superfood_elated_dynamic_css($color_important_selector, array('color' => $first_color . ' !important'));
            $style .= superfood_elated_dynamic_css($background_color_selector, array('background-color' => $first_color));
            $style .= superfood_elated_dynamic_css($background_color_important_selector, array('background-color' => $first_color . ' !important'));
            $style .= superfood_elated_dynamic_css($border_color_selector, array('border-color' => $first_color));
            $style .= superfood_elated_dynamic_css($border_color_important_selector, array('border-color' => $first_color . ' !important'));

            $backgroundRGB = superfood_elated_hex2rgb($first_color);

        }

        return $style;
    }

    add_filter('superfood_elated_add_page_custom_style', 'superfood_elated_generate_first_main_color_per_page');
}

if (!function_exists('superfood_elated_generate_first_color_selectors')) {
    /**
     * Function generate arrays of selectors for first color option
     */
    function superfood_elated_generate_first_color_selectors() {

        $return_array = array();
        //generate color selector array
        $return_array['color_selector'] = array(
            'a:hover',
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover',
            'p a:hover',
            '.eltdf-comment-holder .eltdf-comment-text .comment-edit-link',
            '.eltdf-comment-holder .eltdf-comment-text .comment-reply-link',
            '.eltdf-comment-holder .eltdf-comment-text .replay',
            '.eltdf-comment-holder .eltdf-comment-text #cancel-comment-reply-link',
            '.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-next-icon',
            '.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-prev-icon',
            '.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-next-icon',
            '.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-prev-icon',
            '.eltdf-pagination ul li a:hover',
            '.eltdf-pagination ul li.active span',
            '.eltdf-main-menu ul li a:hover',
            '.eltdf-main-menu>ul>li.eltdf-active-item>a',
            '.eltdf-drop-down .second .inner ul li.current-menu-ancestor>a',
            '.eltdf-drop-down .second .inner ul li.current-menu-item>a',
            '.eltdf-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
            '.eltdf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
            '.eltdf-header-vertical .eltdf-vertical-menu ul li a:hover',
            '.eltdf-mobile-header .eltdf-mobile-nav ul li a:hover',
            '.eltdf-mobile-header .eltdf-mobile-nav ul li h5:hover',
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-ancestor>a',
            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item>a',
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid>ul>li.eltdf-active-item>a',
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid>ul>li>a:hover',
            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid>ul>li>h5:hover',
            '.eltdf-mobile-header .eltdf-mobile-nav .mobile_arrow:hover',
            '.eltdf-mobile-header .eltdf-mobile-menu-opener a:hover',
            '.eltdf-title.eltdf-breadcrumbs-type .eltdf-breadcrumbs a:hover',
            '.eltdf-side-menu-button-opener.opened',
            '.eltdf-side-menu-button-opener:hover',
            'nav.eltdf-fullscreen-menu ul li ul li.current-menu-ancestor>a',
            'nav.eltdf-fullscreen-menu ul li ul li.current-menu-item>a',
            'nav.eltdf-fullscreen-menu>ul>li.eltdf-active-item>a',
            '.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-submit:hover',
            '.eltdf-search-page-holder article.sticky .eltdf-post-title-area h3 a',
            '.eltdf-portfolio-single-holder .eltdf-portfolio-info-item:not(.eltdf-content-item).eltdf-portfolio-tags a:hover',
            '.eltdf-blog-holder article.sticky .eltdf-post-title a',
            '.eltdf-blog-holder article .eltdf-post-excerpt-holder .eltdf-btn:not(.eltdf-btn-custom-hover-color)',
            '.eltdf-blog-holder article .eltdf-post-info>div a:hover',
            '.eltdf-single-tags-holder .eltdf-tags a:hover',
            '.eltdf-social-share-tags-holder .eltdf-blog-single-share .eltdf-social-share-holder.eltdf-list li a:hover',
            '.eltdf-related-posts-holder .eltdf-related-post .eltdf-post-info>div a:hover',
            '.eltdf-related-posts-holder .eltdf-related-post .eltdf-post-info a:hover',
            '.eltdf-blog-single-navigation .eltdf-blog-single-next:hover',
            '.eltdf-blog-single-navigation .eltdf-blog-single-prev:hover',
            '.eltdf-single-links-pages .eltdf-single-links-pages-inner>a:hover',
            '.eltdf-single-links-pages .eltdf-single-links-pages-inner>span:hover',
            '.eltdf-blog-list-holder .eltdf-bli-info>div a:hover',
            '.eltdf-blog-list-holder .eltdf-single-tags-holder .eltdf-tags a:hover',
            '.eltdf-blog-list-holder.eltdf-boxed .eltdf-bli-info>div.eltdf-blog-share .eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown-opener',
            '.eltdf-blog-list-holder.eltdf-boxed .eltdf-bli-info>div a:hover',
            '.eltdf-blog-list-holder.eltdf-masonry .eltdf-bli-info>div.eltdf-blog-share .eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown-opener',
            '.eltdf-blog-list-holder.eltdf-masonry .eltdf-bli-info>div a:hover',
            '.eltdf-btn.eltdf-btn-outline',
            '.eltdf-message-box-holder .eltdf-mb-icon>*',
            '.eltdf-portfolio-list-holder article .eltdf-pli-text .eltdf-pli-category-holder a:hover',
            '.eltdf-pl-filter-holder ul li.eltdf-pl-current span',
            '.eltdf-pl-filter-holder ul li:hover span',
            '.eltdf-portfolio-slider-holder .owl-nav .owl-next:hover .eltdf-next-icon',
            '.eltdf-portfolio-slider-holder .owl-nav .owl-next:hover .eltdf-prev-icon',
            '.eltdf-portfolio-slider-holder .owl-nav .owl-prev:hover .eltdf-next-icon',
            '.eltdf-portfolio-slider-holder .owl-nav .owl-prev:hover .eltdf-prev-icon',
            '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-prices .eltdf-pt-value',
            '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-prices .eltdf-pt-price',
            '.eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown-opener:hover',
            '.eltdf-team-holder.eltdf-main-info-on-hover .eltdf-team-social-holder a:hover',
            '.eltdf-team-holder.eltdf-main-info-on-hover.eltdf-light-skin .eltdf-team-social-holder a:hover',
            '.eltdf-team-holder.eltdf-main-info-on-hover.eltdf-dark-skin .eltdf-team-social-holder a:hover',
            'footer .eltdf-footer-top .eltdf-icon-widget-holdera:hover .eltdf-icon-text-holder',
            '.widget.widget_rss>h4 .rsswidget:hover',
            '.widget.widget_search button:hover',
            '.widget.widget_tag_cloud a:hover',
            '.eltdf-top-bar .widget a:hover',
            'footer .eltdf-footer-top .widget a:hover',
            '.eltdf-top-bar .widget.widget_search button:hover',
            'footer .eltdf-footer-top .widget.widget_search button:hover',
            '.eltdf-top-bar .widget.widget_tag_cloud a:hover',
            'footer .eltdf-footer-top .widget.widget_tag_cloud a:hover',
            '.eltdf-top-bar .widget.widget_rss .eltdf-footer-widget-title .rsswidget:hover',
            'footer .eltdf-footer-top .widget.widget_rss .eltdf-footer-widget-title .rsswidget:hover',
            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a',
            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-twitter-icon i',
            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text a',
            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text span',
            '.eltdf-footer-inner .widget_icl_lang_sel_widget #lang_sel ul li a:hover',
            '.eltdf-footer-inner .widget_icl_lang_sel_widget #lang_sel_click ul li a:hover',
            '.eltdf-footer-inner .widget_icl_lang_sel_widget .lang_sel_list_horizontal ul li a:hover',
            '.eltdf-footer-inner .widget_icl_lang_sel_widget .lang_sel_list_vertical ul li a:hover',
            '.eltdf-top-bar .widget_icl_lang_sel_widget #lang_sel ul li a:hover',
            '.eltdf-top-bar .widget_icl_lang_sel_widget #lang_sel_click ul li a:hover',
            '.eltdf-top-bar .widget_icl_lang_sel_widget .lang_sel_list_horizontal ul li a:hover',
            '.eltdf-top-bar .widget_icl_lang_sel_widget .lang_sel_list_vertical ul li a:hover',
            '.eltdf-main-menu .menu-item-language .submenu-languages a:hover',
            '.woocommerce-pagination .page-numbers li a.current',
            '.woocommerce-pagination .page-numbers li a:hover',
            '.woocommerce-pagination .page-numbers li span.current',
            '.woocommerce-pagination .page-numbers li span:hover',
            '.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
            '.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
            'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
            'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
            '.woocommerce .star-rating span',
            '.eltdf-woo-single-page .eltdf-single-product-summary .product_meta>span a:hover',
            '.eltdf-woocommerce-page table.cart tr.cart_item td.product-remove a:hover',
            '.eltdf-pl-holder .eltdf-pli .eltdf-pli-rating span',
            '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-rating span',
            '.eltdf-plc-holder .owl-nav .owl-next:hover .eltdf-next-icon',
            '.eltdf-plc-holder .owl-nav .owl-next:hover .eltdf-prev-icon',
            '.eltdf-plc-holder .owl-nav .owl-prev:hover .eltdf-next-icon',
            '.eltdf-plc-holder .owl-nav .owl-prev:hover .eltdf-prev-icon',
            '.eltdf-pls-holder .eltdf-pls-text .eltdf-pls-rating span',
            '.widget.woocommerce.widget_layered_nav ul li.chosen a',
            '.eltdf-footer-top .widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a:hover'
        );

        //generate color important selector array
        $return_array['color_important_selector'] = array(
            '.eltdf-btn.eltdf-btn-simple:not(.eltdf-btn-custom-hover-color):hover',
            '.eltdf-portfolio-list-holder.eltdf-pl-hover-overlay-background article .eltdf-pli-text .eltdf-pli-category-holder a:hover'
        );

        //generate background color selectors array
        $return_array['background_color_selector'] = array(
            '.eltdf-st-loader .pulse',
            '.eltdf-st-loader .double_pulse .double-bounce1',
            '.eltdf-st-loader .double_pulse .double-bounce2',
            '.eltdf-st-loader .rotating_cubes .cube1',
            '.eltdf-st-loader .rotating_cubes .cube2',
            '.eltdf-st-loader .stripes>div',
            '.eltdf-st-loader .wave>div',
            '.eltdf-st-loader .two_rotating_circles .dot1',
            '.eltdf-st-loader .two_rotating_circles .dot2',
            '.eltdf-st-loader .cube',
            '.eltdf-st-loader .four_rotating_circles .circle1',
            '.eltdf-st-loader .four_rotating_circles .circle2',
            '.eltdf-st-loader .four_rotating_circles .circle3',
            '.eltdf-st-loader .four_rotating_circles .circle4',
            '.eltdf-st-loader .five_rotating_circles .container1>div',
            '.eltdf-st-loader .five_rotating_circles .container2>div',
            '.eltdf-st-loader .five_rotating_circles .container3>div',
            '.eltdf-st-loader .atom .ball-1:before',
            '.eltdf-st-loader .atom .ball-2:before',
            '.eltdf-st-loader .atom .ball-3:before',
            '.eltdf-st-loader .atom .ball-4:before',
            '.eltdf-st-loader .clock .ball:before',
            '.eltdf-st-loader .mitosis .ball',
            '.eltdf-st-loader .lines .line1',
            '.eltdf-st-loader .lines .line2',
            '.eltdf-st-loader .lines .line3',
            '.eltdf-st-loader .lines .line4',
            '.eltdf-st-loader .fussion .ball',
            '.eltdf-st-loader .fussion .ball-1',
            '.eltdf-st-loader .fussion .ball-2',
            '.eltdf-st-loader .fussion .ball-3',
            '.eltdf-st-loader .fussion .ball-4',
            '.eltdf-st-loader .wave_circles .ball',
            '.eltdf-st-loader .pulse_circles .ball',
            '#submit_comment',
            '.post-password-form input[type=submit]',
            'input.wpcf7-form-control.wpcf7-submit',
            '#eltdf-back-to-top>span',
            '.eltdf-side-menu a.eltdf-close-side-menu:hover .eltdf-side-menu-lines .eltdf-side-menu-line',
            '.eltdf-fullscreen-menu-opener.eltdf-fm-opened .eltdf-close-fullscreen-menu:hover .eltdf-fullscreen-menu-line',
            '.eltdf-blog-holder article .eltdf-blog-list-button .eltdf-btn-text:before',
            '.eltdf-blog-holder article .eltdf-blog-list-button .eltdf-btn-text:after',
            '.eltdf-blog-holder article.format-link .eltdf-link-content',
            '.eltdf-blog-holder article.format-quote .eltdf-quote-content',
            '.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
            '.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
            '.eltdf-blog-holder.eltdf-blog-type-masonry article.format-quote .eltdf-quote-content',
            '.eltdf-blog-holder.eltdf-blog-type-masonry article.format-link .eltdf-quote-content',
            '.eltdf-author-description',
            '.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-active',
            '.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-hover',
            '.eltdf-blog-list-holder .eltdf-bli-read-more-holder .eltdf-btn .eltdf-btn-text:before',
            '.eltdf-blog-list-holder .eltdf-bli-read-more-holder .eltdf-btn .eltdf-btn-text:after',
            '.eltdf-btn.eltdf-btn-solid',
            '.eltdf-btn.eltdf-btn-outline.eltdf-btn-animation .eltdf-btn-text .eltdf-btn-bottom-line',
            '.eltdf-btn.eltdf-btn-outline.eltdf-btn-animation .eltdf-btn-text .eltdf-btn-upper-line',
            '.eltdf-icon-shortcode.eltdf-circle',
            '.eltdf-icon-shortcode.eltdf-dropcaps.eltdf-circle',
            '.eltdf-icon-shortcode.eltdf-square',
            '.eltdf-masonry-gallery-holder .eltdf-mg-item.eltdf-mg-standard:hover .eltdf-mg-image-overlay',
            '.eltdf-masonry-gallery-holder .eltdf-mg-item.eltdf-mg-simple.eltdf-mg-skin-default .eltdf-mg-item-inner',
            '.eltdf-progress-bar .eltdf-pb-content-holder .eltdf-pb-content',
            '.eltdf-tabs .eltdf-tabs-nav li.ui-state-active a',
            '.eltdf-tabs .eltdf-tabs-nav li.ui-state-hover a',
            '.eltdf-author-info-widget',
            '.widget #wp-calendar td#today',
            '.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
            '.woocommerce-page .eltdf-content a.added_to_cart',
            '.woocommerce-page .eltdf-content a.button',
            '.woocommerce-page .eltdf-content button[type=submit]',
            '.woocommerce-page .eltdf-content input[type=submit]',
            'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
            'div.woocommerce a.added_to_cart',
            'div.woocommerce a.button',
            'div.woocommerce button[type=submit]',
            'div.woocommerce input[type=submit]',
            '.eltdf-woo-single-page .eltdf-single-product-summary .price del:after',
            'ul.products>.product .added_to_cart:hover',
            'ul.products>.product .button:hover',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .added_to_cart',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .button',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .added_to_cart:hover',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .button:hover',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .added_to_cart:hover',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .button:hover',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .added_to_cart',
            '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .button',
            '.eltdf-plc-holder .eltdf-plc-item .added_to_cart',
            '.eltdf-plc-holder .eltdf-plc-item .button',
            '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .added_to_cart',
            '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .button',
            '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .added_to_cart:hover',
            '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .button:hover',
            '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .added_to_cart:hover',
            '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .button:hover',
            '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart'

        );

        // generate background color important selectors array
        $return_array['background_color_important_selector'] = array(
            '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-button.eltdf-dark-skin .eltdf-btn:hover'
        );

        //generate border color selectors array
        $return_array['border_color_selector'] = array(
            '.eltdf-st-loader .pulse_circles .ball',
            '.eltdf-btn.eltdf-btn-solid',
            '.eltdf-btn.eltdf-btn-outline',
            '.eltdf-tabs .eltdf-tabs-nav li.ui-state-active a',
            '.eltdf-tabs .eltdf-tabs-nav li.ui-state-hover a',
            '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart'
        );

        $return_array['border_color_important_selector'] = array(
            '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-button.eltdf-dark-skin .eltdf-btn:hover'
        );

        return $return_array;

    }

}

if (!function_exists('superfood_elated_google_fonts_styles')) {
    /**
     * Function that includes google fonts defined anywhere in the theme
     */
    function superfood_elated_google_fonts_styles() {
        $font_simple_field_array = superfood_elated_options()->getOptionsByType('fontsimple');
        if (!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = superfood_elated_options()->getOptionsByType('font');
        if (!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);

        $google_font_weight_array = superfood_elated_options()->getOptionValue('google_font_weight');
        if (!empty($google_font_weight_array)) {
            $google_font_weight_array = array_slice(superfood_elated_options()->getOptionValue('google_font_weight'), 1);
        }

        $font_weight_str = '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';
        if (!empty($google_font_weight_array) && $google_font_weight_array !== '') {
            $font_weight_str = implode(',', $google_font_weight_array);
        }

        $google_font_subset_array = superfood_elated_options()->getOptionValue('google_font_subset');
        if (!empty($google_font_subset_array)) {
            $google_font_subset_array = array_slice(superfood_elated_options()->getOptionValue('google_font_subset'), 1);
        }

        $font_subset_str = 'latin,latin-ext';
        if (!empty($google_font_subset_array) && $google_font_subset_array !== '') {
            $font_subset_str = implode(',', $google_font_subset_array);
        }

        //define available font options array
        $fonts_array = array();
        foreach ($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = superfood_elated_options()->getOptionValue($font_option);
            if (superfood_elated_is_font_option_valid($font_option_value) && !superfood_elated_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value . ':' . $font_weight_str;
                if (!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        wp_reset_postdata();

        $fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts
        $default_font_string = 'Open Sans:' . $font_weight_str . '|Signika:' . $font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode($font_subset_str),
            );

            $superfood_elated_global_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('superfood_elated_google_fonts', esc_url_raw($superfood_elated_global_fonts), array(), '1.0.0');

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode($font_subset_str),
            );
            $superfood_elated_global_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('superfood_elated_google_fonts', esc_url_raw($superfood_elated_global_fonts), array(), '1.0.0');
        }

    }

    add_action('wp_enqueue_scripts', 'superfood_elated_google_fonts_styles');
}

if (!function_exists('superfood_elated_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function superfood_elated_scripts() {
        global $wp_scripts;

        //init theme core scripts
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('wp-mediaelement');

        // 3rd party JavaScripts that we used in our theme
        wp_enqueue_script('appear', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array('jquery'), false, true);
        wp_enqueue_script('modernizr', ELATED_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array('jquery'), false, true);
        wp_enqueue_script('hoverIntent', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array('jquery'), false, true);
        wp_enqueue_script('hoverDir', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverDir.min.js', array('jquery'), false, true);
        wp_enqueue_script('jquery-plugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array('jquery'), false, true);
        wp_enqueue_script('countdown', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.countdown.min.js', array('jquery'), false, true);
        wp_enqueue_script('owl-carousel', ELATED_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array('jquery'), false, true);
        wp_enqueue_script('parallax', ELATED_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array('jquery'), false, true);
        wp_enqueue_script('easypiechart', ELATED_ASSETS_ROOT . '/js/modules/plugins/easypiechart.js', array('jquery'), false, true);
        wp_enqueue_script('waypoints', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array('jquery'), false, true);
        wp_enqueue_script('chart', ELATED_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array('jquery'), false, true);
        wp_enqueue_script('counter', ELATED_ASSETS_ROOT . '/js/modules/plugins/counter.js', array('jquery'), false, true);
        wp_enqueue_script('absoluteCounter', ELATED_ASSETS_ROOT . '/js/modules/plugins/absoluteCounter.min.js', array('jquery'), false, true);
        wp_enqueue_script('fluidvids', ELATED_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array('jquery'), false, true);
        wp_enqueue_script('prettyPhoto', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array('jquery'), false, true);
        wp_enqueue_script('nicescroll', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.nicescroll.min.js', array('jquery'), false, true);
        wp_enqueue_script('ScrollToPlugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array('jquery'), false, true);
        wp_enqueue_script('waitforimages', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array('jquery'), false, true);
        wp_enqueue_script('jquery-easing-1.3', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array('jquery'), false, true);
        wp_enqueue_script('multiscroll', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.multiscroll.min.js', array('jquery'), false, true);
        wp_enqueue_script('isotope', ELATED_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array('jquery'), false, true);
        wp_enqueue_script('packery', ELATED_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array('jquery'), false, true);

        if (superfood_elated_is_woocommerce_installed()) {
            wp_enqueue_script('select2');
        }

        //include google map api script
        $eltdf_google_maps_api_key = superfood_elated_options()->getOptionValue('google_maps_api_key');
        if (!empty($eltdf_google_maps_api_key)) {
            wp_enqueue_script('superfood_elated_google_map_api', '//maps.googleapis.com/maps/api/js?key=' . $eltdf_google_maps_api_key, array(), false, true);
        }

        wp_enqueue_script('superfood_elated_modules', ELATED_ASSETS_ROOT . '/js/modules.min.js', array('jquery'), false, true);

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        //include Visual Composer script
        if (class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_script('wpb_composer_front_js');
        }
    }

    add_action('wp_enqueue_scripts', 'superfood_elated_scripts');
}

//defined content width variable
if (!isset($content_width)) $content_width = 1060;

if (!function_exists('superfood_elated_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function superfood_elated_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
        add_theme_support('title-tag');

        //define thumbnail sizes
        add_image_size('superfood_elated_square', 550, 550, true);
        add_image_size('superfood_elated_landscape', 800, 600, true);
        add_image_size('superfood_elated_portrait', 600, 800, true);

        load_theme_textdomain('superfood', get_template_directory() . '/languages');
    }

    add_action('after_setup_theme', 'superfood_elated_theme_setup');
}

if (!function_exists('superfood_elated_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function superfood_elated_is_responsive_on() {
        return superfood_elated_options()->getOptionValue('responsiveness') !== 'no';
    }
}

if (!function_exists('superfood_elated_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function superfood_elated_rgba_color($color, $transparency) {
        if ($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = superfood_elated_hex2rgb($color);
            $rgba_color .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';

            return $rgba_color;
        }
    }
}

if (!function_exists('superfood_elated_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function superfood_elated_header_meta() { ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>

    <?php }

    add_action('superfood_elated_header_meta', 'superfood_elated_header_meta');
}

if (!function_exists('superfood_elated_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to superfood_elated_header_meta action
     */
    function superfood_elated_user_scalable_meta() {
        //is responsiveness option is chosen?
        if (superfood_elated_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
        <?php }
    }

    add_action('superfood_elated_header_meta', 'superfood_elated_user_scalable_meta');
}

if (!function_exists('superfood_elated_get_page_id')) {
    /**
     * Function that returns current page / post id.
     * Checks if current page is woocommerce page and returns that id if it is.
     * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
     * page that is created in WP admin.
     *
     * @return int
     *
     * @version 0.1
     *
     * @see superfood_elated_is_woocommerce_installed()
     * @see superfood_elated_is_woocommerce_shop()
     */
    function superfood_elated_get_page_id() {
        if (superfood_elated_is_woocommerce_installed() && superfood_elated_is_woocommerce_shop()) {
            return superfood_elated_get_woo_shop_page_id();
        }

        if (is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
            return -1;
        }

        return get_queried_object_id();
    }
}

if (!function_exists('superfood_elated_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function superfood_elated_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if (!function_exists('superfood_elated_get_page_template_name')) {
    /**
     * Returns current template file name without extension
     * @return string name of current template file
     */
    function superfood_elated_get_page_template_name() {
        $file_name = '';

        if (!superfood_elated_is_default_wp_template()) {
            $file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

            if ($file_name_without_ext !== '') {
                $file_name = $file_name_without_ext;
            }
        }

        return $file_name;
    }
}

if (!function_exists('superfood_elated_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function superfood_elated_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if ($shortcode) {
            //if content variable isn't past
            if ($content == '') {
                //take content from current post
                $page_id = superfood_elated_get_page_id();
                if (!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if (is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if (stripos($content, '[' . $shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if (!function_exists('superfood_elated_get_sidebar')) {
    /**
     * Return Sidebar
     *
     * @return string
     */
    function superfood_elated_get_sidebar() {

        $id = superfood_elated_get_page_id();

        $sidebar = "sidebar";

        if (get_post_meta($id, 'eltdf_custom_sidebar_meta', true) != '') {
            $sidebar = get_post_meta($id, 'eltdf_custom_sidebar_meta', true);
        } else {
            if (is_single() && superfood_elated_options()->getOptionValue('blog_single_custom_sidebar') != '') {
                $sidebar = esc_attr(superfood_elated_options()->getOptionValue('blog_single_custom_sidebar'));
            } elseif ((superfood_elated_is_product_category() || superfood_elated_is_product_tag()) && superfood_elated_get_woo_shop_page_id()) {
                $shop_id = superfood_elated_get_woo_shop_page_id();
                if (get_post_meta($shop_id, 'eltdf_custom_sidebar_meta', true) != '') {
                    $sidebar = esc_attr(get_post_meta($shop_id, 'eltdf_custom_sidebar_meta', true));
                }
            } elseif ((is_archive() || (is_home() && is_front_page())) && superfood_elated_options()->getOptionValue('blog_custom_sidebar') != '') {
                $sidebar = esc_attr(superfood_elated_options()->getOptionValue('blog_custom_sidebar'));
            } elseif (is_search() && superfood_elated_options()->getOptionValue('search_page_custom_sidebar') != '') {
                $sidebar = esc_attr(superfood_elated_options()->getOptionValue('search_page_custom_sidebar'));
            } elseif (is_page() && superfood_elated_options()->getOptionValue('page_custom_sidebar') != '') {
                $sidebar = esc_attr(superfood_elated_options()->getOptionValue('page_custom_sidebar'));
            }
        }

        return $sidebar;
    }
}

if (!function_exists('superfood_elated_sidebar_columns_class')) {

    /**
     * Return classes for columns holder when sidebar is active
     *
     * @return array
     */

    function superfood_elated_sidebar_columns_class() {

        $sidebar_class = array();
        $sidebar_layout = superfood_elated_sidebar_layout();

        switch ($sidebar_layout):
            case 'sidebar-33-right':
                $sidebar_class[] = 'eltdf-two-columns-66-33';
                break;
            case 'sidebar-25-right':
                $sidebar_class[] = 'eltdf-two-columns-75-25';
                break;
            case 'sidebar-33-left':
                $sidebar_class[] = 'eltdf-two-columns-33-66';
                break;
            case 'sidebar-25-left':
                $sidebar_class[] = 'eltdf-two-columns-25-75';
                break;

        endswitch;

        $sidebar_class[] = ' eltdf-content-has-sidebar clearfix';

        return superfood_elated_class_attribute($sidebar_class);
    }
}

if (!function_exists('superfood_elated_sidebar_layout')) {

    /**
     * Function that check is sidebar is enabled and return type of sidebar layout
     */
    function superfood_elated_sidebar_layout() {

        $sidebar_layout = '';
        $page_id = superfood_elated_get_page_id();

        $page_sidebar_meta = get_post_meta($page_id, 'eltdf_sidebar_meta', true);

        if (($page_sidebar_meta !== '') && $page_id !== -1) {
            if ($page_sidebar_meta == 'no-sidebar') {
                $sidebar_layout = '';
            } else {
                $sidebar_layout = $page_sidebar_meta;
            }
        } else {
            if (is_single() && superfood_elated_options()->getOptionValue('blog_single_sidebar_layout')) {
                $sidebar_layout = esc_attr(superfood_elated_options()->getOptionValue('blog_single_sidebar_layout'));
            } elseif ((is_archive() || (is_home() && is_front_page())) && superfood_elated_options()->getOptionValue('archive_sidebar_layout')) {
                $sidebar_layout = esc_attr(superfood_elated_options()->getOptionValue('archive_sidebar_layout'));
            } elseif (is_page() && superfood_elated_options()->getOptionValue('page_sidebar_layout')) {
                $sidebar_layout = esc_attr(superfood_elated_options()->getOptionValue('page_sidebar_layout'));
            }
        }

        return $sidebar_layout;
    }
}

if (!function_exists('superfood_elated_page_custom_style')) {
    /**
     * Function that print custom page style
     */
    function superfood_elated_page_custom_style() {
        $style = '';
        $style = apply_filters('superfood_elated_add_page_custom_style', $style);

        if ($style !== '') {
            wp_add_inline_style('superfood_elated_style_dynamic', $style);
        }
    }

    add_action('wp_enqueue_scripts', 'superfood_elated_page_custom_style');
}

if (!function_exists('superfood_elated_container_style')) {
    /**
     * Function that return container style
     */
    function superfood_elated_container_style($style) {
        $id = superfood_elated_get_page_id();
        $class_id = superfood_elated_get_page_id();
        if (superfood_elated_is_woocommerce_installed() && is_product()) {
            $class_id = get_the_ID();
        }

        $class_prefix = superfood_elated_get_unique_page_class($class_id);

        $container_selector = array(
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-container',
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-full-width',
        );

        $container_class = array();
        $page_backgorund_color = get_post_meta($id, "eltdf_page_background_color_meta", true);

        if ($page_backgorund_color) {
            $container_class['background-color'] = $page_backgorund_color;
        }

        $current_style = superfood_elated_dynamic_css($container_selector, $container_class);
        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('superfood_elated_add_page_custom_style', 'superfood_elated_container_style');
}

if (!function_exists('superfood_elated_content_padding_top')) {
    /**
     * Function that return padding for content
     */
    function superfood_elated_content_padding_top($style) {
        $id = superfood_elated_get_page_id();
        $class_id = superfood_elated_get_page_id();
        if (superfood_elated_is_woocommerce_installed() && is_product()) {
            $class_id = get_the_ID();
        }

        $class_prefix = superfood_elated_get_unique_page_class($class_id);

        $current_style = '';

        $content_selector = array(
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
            $class_prefix . ' .eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        $content_class = array();

        $page_padding_top = get_post_meta($id, "eltdf_page_content_top_padding", true);

        if (!superfood_elated_core_plugin_installed() && empty($page_padding_top)) {
            $page_padding_top = 40;
        }

        if ($page_padding_top !== '') {
            if (get_post_meta($id, "eltdf_page_content_top_padding_mobile", true) == 'yes') {
                $content_class['padding-top'] = superfood_elated_filter_px($page_padding_top) . 'px !important';
            } else {
                $content_class['padding-top'] = superfood_elated_filter_px($page_padding_top) . 'px';
            }
            $current_style .= superfood_elated_dynamic_css($content_selector, $content_class);
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('superfood_elated_add_page_custom_style', 'superfood_elated_content_padding_top');
}

if (!function_exists('superfood_elated_get_unique_page_class')) {
    /**
     * Returns unique page class based on post type and page id
     *
     * @return string
     */
    function superfood_elated_get_unique_page_class($id) {
        $page_class = '';

        if (is_single()) {
            $page_class = '.postid-' . $id;
        } elseif ($id === superfood_elated_get_woo_shop_page_id()) {
            $page_class = '.archive';
        } else {
            $page_class .= '.page-id-' . $id;
        }

        return $page_class;
    }
}

if (!function_exists('superfood_elated_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function superfood_elated_print_custom_css() {
        $custom_css = superfood_elated_options()->getOptionValue('custom_css');

        if ($custom_css !== '') {
            wp_add_inline_style('superfood_elated_modules', $custom_css);
        }
    }

    add_action('wp_enqueue_scripts', 'superfood_elated_print_custom_css');
}

if (!function_exists('superfood_elated_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function superfood_elated_print_custom_js() {
        $custom_js = superfood_elated_options()->getOptionValue('custom_js');

        if ($custom_js !== '') {
            wp_add_inline_script('superfood_elated_modules', $custom_js);
        }
    }

    add_action('wp_enqueue_scripts', 'superfood_elated_print_custom_js');
}

if (!function_exists('superfood_elated_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function superfood_elated_get_global_variables() {

        $global_variables = array();

        $global_variables['eltdfAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['eltdfElementAppearAmount'] = 100;
        $global_variables['eltdfFinishedMessage'] = esc_html__('No more posts', 'superfood');
        $global_variables['eltdfMessage'] = esc_html__('Loading new posts...', 'superfood');
        $global_variables['eltdAddingToCart'] = esc_html__('Adding to Cart...', 'superfood');

        $global_variables = apply_filters('superfood_elated_js_global_variables', $global_variables);

        wp_localize_script('superfood_elated_modules', 'eltdfGlobalVars', array(
            'vars' => $global_variables
        ));
    }

    add_action('wp_enqueue_scripts', 'superfood_elated_get_global_variables');
}

if (!function_exists('superfood_elated_per_page_js_variables')) {
    /**
     * Outputs global JS variable that holds page settings
     */
    function superfood_elated_per_page_js_variables() {
        $per_page_js_vars = apply_filters('superfood_elated_per_page_js_vars', array());

        wp_localize_script('superfood_elated_modules', 'eltdfPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'superfood_elated_per_page_js_variables');
}

if (!function_exists('superfood_elated_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function superfood_elated_content_elem_style_attr() {
        $styles = apply_filters('superfood_elated_content_elem_style_attr', array());

        superfood_elated_inline_style($styles);
    }
}

if (!function_exists('superfood_elated_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function superfood_elated_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if (!function_exists('superfood_elated_core_plugin_installed')) {
    //is Elated CPT installed?
    function superfood_elated_core_plugin_installed() {
        return defined('ELATED_CORE_VERSION');
    }
}

if (!function_exists('superfood_elated_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function superfood_elated_visual_composer_installed() {
        //is Visual Composer installed?
        if (class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('superfood_elated_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function superfood_elated_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if (defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('superfood_elated_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function superfood_elated_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if (!function_exists('superfood_elated_max_image_width_srcset')) {
    /**
     * Set max width for srcset to 1920
     *
     * @return int
     */
    function superfood_elated_max_image_width_srcset() {
        return 1920;
    }

    add_filter('max_srcset_image_width', 'superfood_elated_max_image_width_srcset');
}
