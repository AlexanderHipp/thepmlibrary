<?php
if (!function_exists('superfood_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function superfood_elated_design_styles() {

        if (superfood_elated_options()->getOptionValue('google_fonts')) {
            $font_family = superfood_elated_options()->getOptionValue('google_fonts');
            if (superfood_elated_is_font_option_valid($font_family)) {
                $font_selector = array(
                    'h1', 'h2', 'h3', 'h4',
                    'blockquote',
                    '.eltdf-comment-holder .eltdf-comment-text .eltdf-comment-date',
                    '.eltdf-comment-holder .eltdf-comment-text #cancel-comment-reply-link',
                    'input.wpcf7-form-control.wpcf7-submit',
                    '.eltdf-pagination ul li a',
                    '.eltdf-pagination ul li.active span',
                    '.eltdf-main-menu > ul > li > a',
                    '.eltdf-title.eltdf-breadcrumbs-type .eltdf-breadcrumbs a',
                    '.eltdf-title.eltdf-breadcrumbs-type .eltdf-breadcrumbs span',
                    'nav.eltdf-fullscreen-menu ul li ul li a',
                    'nav.eltdf-fullscreen-menu > ul > li > a',
                    '.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-field',
                    '.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-submit',
                    '.eltdf-fullscreen-search-holder .eltdf-search-field',
                    '.eltdf-portfolio-single-holder .eltdf-portfolio-info-item:not(.eltdf-content-item).eltdf-portfolio-tags a',
                    '.eltdf-blog-holder article .eltdf-post-excerpt-holder .eltdf-btn:not(.eltdf-btn-custom-hover-color)',
                    '.eltdf-blog-holder article .eltdf-post-info > div',
                    '.eltdf-blog-holder article.format-quote .eltdf-quote-content .eltdf-quote-text .eltdf-quote-author',
                    '.eltdf-related-posts-holder .eltdf-related-post .eltdf-post-info > div',
                    '.eltdf-blog-list-holder .eltdf-bli-info > div',
                    '.eltdf-blog-list-holder .eltdf-single-tags-holder .eltdf-tags a',
                    '.eltdf-blog-list-holder .eltdf-bli-read-more-holder .eltdf-btn',
                    '.eltdf-btn',
                    '.eltdf-countdown',
                    '.eltdf-counter-holder .eltdf-counter',
                    '.eltdf-pie-chart-holder .eltdf-pc-percentage .eltdf-pc-percent',
                    '.eltdf-portfolio-list-holder article .eltdf-pli-text .eltdf-pli-category-holder a',
                    '.eltdf-pl-filter-holder ul li span',
                    '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-title-holder',
                    '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-prices .eltdf-pt-price',
                    '.eltdf-progress-bar span.eltdf-pb-title-holder',
                    '.eltdf-restaurant-menu .eltdf-rstrnt-price-holder .eltdf-rstrnt-price',
                    '.eltdf-tabs .eltdf-tabs-nav li a',
                    '.eltdf-testimonials-holder.eltdf-testimonials-standard .eltdf-testimonial-author',
                    '.eltdf-testimonials-holder.eltdf-testimonials-standard .eltdf-testimonial-position',
                    '.widget.widget_search input',
                    '.widget.widget_search button',
                    '.widget.widget_recent_entries ul li > span',
                    '.widget.widget_tag_cloud a',
                    '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text a.eltdf-tweet-time'
                );

                $woo_font_selector = array();
                if (superfood_elated_is_woocommerce_installed()) {
                    $woo_font_selector = array(
                        '.woocommerce-page .eltdf-content a.button',
                        '.woocommerce-page .eltdf-content a.added_to_cart',
                        '.woocommerce-page .eltdf-content input[type="submit"]',
                        '.woocommerce-page .eltdf-content button[type="submit"]',
                        '.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                        'div.woocommerce a.button',
                        'div.woocommerce a.added_to_cart',
                        'div.woocommerce input[type="submit"]',
                        'div.woocommerce button[type="submit"]',
                        'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                        '.woocommerce .eltdf-onsale',
                        '.woocommerce .eltdf-out-of-stock',
                        '.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-input',
                        'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-input',
                        '.eltdf-woo-single-page .eltdf-single-product-summary .price',
                        '.eltdf-woo-single-page .eltdf-single-product-summary .woocommerce-product-rating .woocommerce-review-link',
                        '.eltdf-woo-single-page .eltdf-single-product-summary .product_meta > span',
                        '.eltdf-woo-single-page .eltdf-single-product-summary .eltdf-woo-social-share-holder > span',
                        '.eltdf-woo-single-page .eltdf-woo-accordions .eltdf-title-holder .eltdf-tab-title',
                        '.eltdf-pl-holder .eltdf-pli .eltdf-pli-price',
                        '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-image .eltdf-pli-onsale',
                        '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-image .eltdf-pli-out-of-stock',
                        '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .button',
                        '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .added_to_cart',
                        '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-image-outer .eltdf-plc-image .eltdf-plc-onsale',
                        '.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-image-outer .eltdf-plc-image .eltdf-plc-out-of-stock',
                        '.widget.woocommerce.widget_price_filter .price_slider_amount .button',
                        '.widget.woocommerce.widget_product_search .woocommerce-product-search button',
                        '.eltdf-shopping-cart-holder .eltdf-header-cart .eltdf-cart-number',
                        '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart',
                    );
                }

                $font_selector = array_merge($font_selector, $woo_font_selector);

                echo superfood_elated_dynamic_css($font_selector, array('font-family' => superfood_elated_get_font_option_val($font_family)));
            }
        }

        if (superfood_elated_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
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
                '.eltdf-blog-list-holder .eltdf-bli-read-more-holder .eltdf-btn:hover',
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
                '.eltdf-footer-top .widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a:hover'
            );

            $woo_color_selector = array();
            if (superfood_elated_is_woocommerce_installed()) {
                $woo_color_selector = array(
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
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

            $color_important_selector = array(
                '.eltdf-btn.eltdf-btn-simple:not(.eltdf-btn-custom-hover-color):hover',
                '.eltdf-portfolio-list-holder.eltdf-pl-hover-overlay-background article .eltdf-pli-text .eltdf-pli-category-holder a:hover'
            );

            $background_color_selector = array(
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
                '.widget #wp-calendar td#today'

            );

            $woo_background_color_selector = array();
            if (superfood_elated_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
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
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(
                '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-button.eltdf-dark-skin .eltdf-btn:hover'
            );

            $border_color_selector = array(
                '.eltdf-st-loader .pulse_circles .ball',
                '.eltdf-btn.eltdf-btn-solid',
                '.eltdf-btn.eltdf-btn-outline',
                '.eltdf-tabs .eltdf-tabs-nav li.ui-state-active a',
                '.eltdf-tabs .eltdf-tabs-nav li.ui-state-hover a'
            );

            $woo_border_color_selector = array(
                '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart'
            );

            $border_color_selector = array_merge($border_color_selector, $woo_border_color_selector);

            $border_color_important_selector = array(
                '.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-button.eltdf-dark-skin .eltdf-btn:hover'
            );

            echo superfood_elated_dynamic_css('::selection', array('background' => superfood_elated_options()->getOptionValue('first_color')));
            echo superfood_elated_dynamic_css('::-moz-selection', array('background' => superfood_elated_options()->getOptionValue('first_color')));
            echo superfood_elated_dynamic_css($color_selector, array('color' => superfood_elated_options()->getOptionValue('first_color')));
            echo superfood_elated_dynamic_css($color_important_selector, array('color' => superfood_elated_options()->getOptionValue('first_color') . '!important'));
            echo superfood_elated_dynamic_css($background_color_selector, array('background-color' => superfood_elated_options()->getOptionValue('first_color')));
            echo superfood_elated_dynamic_css($background_color_important_selector, array('background-color' => superfood_elated_options()->getOptionValue('first_color') . '!important'));
            echo superfood_elated_dynamic_css($border_color_selector, array('border-color' => superfood_elated_options()->getOptionValue('first_color')));
            echo superfood_elated_dynamic_css($border_color_important_selector, array('border-color' => superfood_elated_options()->getOptionValue('first_color') . '!important'));

            $backgroundRGB = superfood_elated_hex2rgb(superfood_elated_options()->getOptionValue('first_color'));

            echo superfood_elated_dynamic_css('.eltdf-instagram-feed li a:after', array('background-color' => 'rgba('.$backgroundRGB[0].', '.$backgroundRGB[1].', '.$backgroundRGB[2].', .8)'));
        }

        if (superfood_elated_options()->getOptionValue('page_background_color')) {
            $background_color_selector = array(
                '.eltdf-wrapper-inner',
                '.eltdf-content'
            );
            echo superfood_elated_dynamic_css($background_color_selector, array('background-color' => superfood_elated_options()->getOptionValue('page_background_color')));
        }

        if (superfood_elated_options()->getOptionValue('selection_color')) {
            echo superfood_elated_dynamic_css('::selection', array('background' => superfood_elated_options()->getOptionValue('selection_color')));
            echo superfood_elated_dynamic_css('::-moz-selection', array('background' => superfood_elated_options()->getOptionValue('selection_color')));
        }

        $boxed_background_style = array();
        if (superfood_elated_options()->getOptionValue('page_background_color_in_box') !== '') {
            $boxed_background_style['background-color'] = superfood_elated_options()->getOptionValue('page_background_color_in_box');
        }

        if (superfood_elated_options()->getOptionValue('boxed_background_image')) {
            $boxed_background_style['background-image'] = 'url(' . esc_url(superfood_elated_options()->getOptionValue('boxed_background_image')) . ')';
            $boxed_background_style['background-position'] = 'center 0px';
            $boxed_background_style['background-repeat'] = 'no-repeat';
        }

        if (superfood_elated_options()->getOptionValue('boxed_pattern_background_image')) {
            $boxed_background_style['background-image'] = 'url(' . esc_url(superfood_elated_options()->getOptionValue('boxed_pattern_background_image')) . ')';
            $boxed_background_style['background-position'] = '0px 0px';
            $boxed_background_style['background-repeat'] = 'repeat';
        }

        if (superfood_elated_options()->getOptionValue('boxed_background_image_attachment')) {
            $boxed_background_style['background-attachment'] = (superfood_elated_options()->getOptionValue('boxed_background_image_attachment'));
        }

        echo superfood_elated_dynamic_css('.eltdf-boxed .eltdf-wrapper', $boxed_background_style);

        $paspartu_style = array();
        if (superfood_elated_options()->getOptionValue('paspartu_color') !== '') {
            $paspartu_style['background-color'] = superfood_elated_options()->getOptionValue('paspartu_color');
        }

        if (superfood_elated_options()->getOptionValue('paspartu_width') !== '') {
            $paspartu_style['padding'] = superfood_elated_options()->getOptionValue('paspartu_width') . '%';
        }

        echo superfood_elated_dynamic_css('.eltdf-paspartu-enabled .eltdf-wrapper', $paspartu_style);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_design_styles');
}

if (!function_exists('superfood_elated_content_styles')) {
    /**
     * Generates content custom styles
     */
    function superfood_elated_content_styles() {

        $content_style = array();
        if (superfood_elated_options()->getOptionValue('content_top_padding') !== '') {
            $padding_top = (superfood_elated_options()->getOptionValue('content_top_padding'));
            $content_style['padding-top'] = superfood_elated_filter_px($padding_top) . 'px';
        }

        $content_selector = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        echo superfood_elated_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
        if (superfood_elated_options()->getOptionValue('content_top_padding_in_grid') !== '') {
            $padding_top_in_grid = (superfood_elated_options()->getOptionValue('content_top_padding_in_grid'));
            $content_style_in_grid['padding-top'] = superfood_elated_filter_px($padding_top_in_grid) . 'px';

        }

        $content_selector_in_grid = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
        );

        echo superfood_elated_dynamic_css($content_selector_in_grid, $content_style_in_grid);

    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_content_styles');
}

if (!function_exists('superfood_elated_h1_styles')) {

    function superfood_elated_h1_styles() {

        $h1_styles = array();

        if (superfood_elated_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = superfood_elated_options()->getOptionValue('h1_color');
        }
        if (superfood_elated_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('h1_google_fonts'));
        }
        if (superfood_elated_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h1_fontsize')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h1_lineheight')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = superfood_elated_options()->getOptionValue('h1_texttransform');
        }
        if (superfood_elated_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = superfood_elated_options()->getOptionValue('h1_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = superfood_elated_options()->getOptionValue('h1_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h1_letterspacing')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h1_margin_top') !== '') {
            $h1_styles['margin-top'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h1_margin_top')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h1_margin_bottom') !== '') {
            $h1_styles['margin-bottom'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h1_margin_bottom')) . 'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo superfood_elated_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_h1_styles');
}

if (!function_exists('superfood_elated_h2_styles')) {

    function superfood_elated_h2_styles() {

        $h2_styles = array();

        if (superfood_elated_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = superfood_elated_options()->getOptionValue('h2_color');
        }
        if (superfood_elated_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('h2_google_fonts'));
        }
        if (superfood_elated_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h2_fontsize')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h2_lineheight')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = superfood_elated_options()->getOptionValue('h2_texttransform');
        }
        if (superfood_elated_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = superfood_elated_options()->getOptionValue('h2_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = superfood_elated_options()->getOptionValue('h2_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h2_letterspacing')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h2_margin_top') !== '') {
            $h2_styles['margin-top'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h2_margin_top')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h2_margin_bottom') !== '') {
            $h2_styles['margin-bottom'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h2_margin_bottom')) . 'px';
        }

        $h2_selector = array(
            'h2'
        );

        $woo_h2_selector = array();
        if (superfood_elated_is_woocommerce_installed()) {
            $woo_h2_selector = array(
                '.eltdf-woocommerce-page .cart-empty'
            );
        }

        $h2_selector = array_merge($h2_selector, $woo_h2_selector);

        if (!empty($h2_styles)) {
            echo superfood_elated_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_h2_styles');
}

if (!function_exists('superfood_elated_h3_styles')) {

    function superfood_elated_h3_styles() {

        $h3_styles = array();

        if (superfood_elated_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = superfood_elated_options()->getOptionValue('h3_color');
        }
        if (superfood_elated_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('h3_google_fonts'));
        }
        if (superfood_elated_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h3_fontsize')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h3_lineheight')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = superfood_elated_options()->getOptionValue('h3_texttransform');
        }
        if (superfood_elated_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = superfood_elated_options()->getOptionValue('h3_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = superfood_elated_options()->getOptionValue('h3_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h3_letterspacing')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h3_margin_top') !== '') {
            $h3_styles['margin-top'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h3_margin_top')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h3_margin_bottom') !== '') {
            $h3_styles['margin-bottom'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h3_margin_bottom')) . 'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo superfood_elated_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_h3_styles');
}

if (!function_exists('superfood_elated_h4_styles')) {

    function superfood_elated_h4_styles() {

        $h4_styles = array();

        if (superfood_elated_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = superfood_elated_options()->getOptionValue('h4_color');
        }
        if (superfood_elated_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('h4_google_fonts'));
        }
        if (superfood_elated_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h4_fontsize')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h4_lineheight')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = superfood_elated_options()->getOptionValue('h4_texttransform');
        }
        if (superfood_elated_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = superfood_elated_options()->getOptionValue('h4_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = superfood_elated_options()->getOptionValue('h4_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h4_letterspacing')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h4_margin_top') !== '') {
            $h4_styles['margin-top'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h4_margin_top')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h4_margin_bottom') !== '') {
            $h4_styles['margin-bottom'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h4_margin_bottom')) . 'px';
        }

        $h4_selector = array(
            'h4'
        );

        $woo_h4_selector = array();
        if (superfood_elated_is_woocommerce_installed()) {
            $woo_h4_selector = array(
                '.eltdf-woo-single-page .related.products > h2',
                '.eltdf-woo-single-page .upsells.products > h2',
                '.eltdf-woo-single-page .eltdf-woo-accordions #reviews h2',
                '.eltdf-woo-single-page .eltdf-woo-accordions #reviews .comment-respond .comment-reply-title',
                '.eltdf-woocommerce-page .cart-collaterals h2'
            );
        }

        $h4_selector = array_merge($h4_selector, $woo_h4_selector);

        if (!empty($h4_styles)) {
            echo superfood_elated_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_h4_styles');
}

if (!function_exists('superfood_elated_h5_styles')) {

    function superfood_elated_h5_styles() {

        $h5_styles = array();

        if (superfood_elated_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = superfood_elated_options()->getOptionValue('h5_color');
        }
        if (superfood_elated_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('h5_google_fonts'));
        }
        if (superfood_elated_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h5_fontsize')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h5_lineheight')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = superfood_elated_options()->getOptionValue('h5_texttransform');
        }
        if (superfood_elated_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = superfood_elated_options()->getOptionValue('h5_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = superfood_elated_options()->getOptionValue('h5_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h5_letterspacing')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h5_margin_top') !== '') {
            $h5_styles['margin-top'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h5_margin_top')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h5_margin_bottom') !== '') {
            $h5_styles['margin-bottom'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h5_margin_bottom')) . 'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo superfood_elated_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_h5_styles');
}

if (!function_exists('superfood_elated_h6_styles')) {

    function superfood_elated_h6_styles() {

        $h6_styles = array();

        if (superfood_elated_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = superfood_elated_options()->getOptionValue('h6_color');
        }
        if (superfood_elated_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('h6_google_fonts'));
        }
        if (superfood_elated_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h6_fontsize')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h6_lineheight')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = superfood_elated_options()->getOptionValue('h6_texttransform');
        }
        if (superfood_elated_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = superfood_elated_options()->getOptionValue('h6_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = superfood_elated_options()->getOptionValue('h6_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h6_letterspacing')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h6_margin_top') !== '') {
            $h6_styles['margin-top'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h6_margin_top')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('h6_margin_bottom') !== '') {
            $h6_styles['margin-bottom'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('h6_margin_bottom')) . 'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo superfood_elated_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_h6_styles');
}

if (!function_exists('superfood_elated_text_styles')) {

    function superfood_elated_text_styles() {

        $text_styles = array();

        if (superfood_elated_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = superfood_elated_options()->getOptionValue('text_color');
        }
        if (superfood_elated_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('text_google_fonts'));
        }
        if (superfood_elated_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('text_fontsize')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('text_lineheight')) . 'px';
        }
        if (superfood_elated_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = superfood_elated_options()->getOptionValue('text_texttransform');
        }
        if (superfood_elated_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = superfood_elated_options()->getOptionValue('text_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = superfood_elated_options()->getOptionValue('text_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('text_letterspacing')) . 'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo superfood_elated_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_text_styles');
}

if (!function_exists('superfood_elated_link_styles')) {

    function superfood_elated_link_styles() {

        $link_styles = array();

        if (superfood_elated_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = superfood_elated_options()->getOptionValue('link_color');
        }
        if (superfood_elated_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = superfood_elated_options()->getOptionValue('link_fontstyle');
        }
        if (superfood_elated_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = superfood_elated_options()->getOptionValue('link_fontweight');
        }
        if (superfood_elated_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = superfood_elated_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo superfood_elated_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_link_styles');
}

if (!function_exists('superfood_elated_link_hover_styles')) {

    function superfood_elated_link_hover_styles() {

        $link_hover_styles = array();

        if (superfood_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = superfood_elated_options()->getOptionValue('link_hovercolor');
        }
        if (superfood_elated_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = superfood_elated_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo superfood_elated_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if (superfood_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = superfood_elated_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo superfood_elated_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_link_hover_styles');
}

if (!function_exists('superfood_elated_smooth_page_transition_styles')) {

    function superfood_elated_smooth_page_transition_styles() {

        $loader_style = array();

        if (superfood_elated_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = superfood_elated_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.eltdf-smooth-transition-loader');

        if (!empty($loader_style)) {
            echo superfood_elated_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if (superfood_elated_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = superfood_elated_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.eltdf-st-loader .eltdf-rotate-circles > div',
            '.eltdf-st-loader .pulse',
            '.eltdf-st-loader .double_pulse .double-bounce1',
            '.eltdf-st-loader .double_pulse .double-bounce2',
            '.eltdf-st-loader .cube',
            '.eltdf-st-loader .rotating_cubes .cube1',
            '.eltdf-st-loader .rotating_cubes .cube2',
            '.eltdf-st-loader .stripes > div',
            '.eltdf-st-loader .wave > div',
            '.eltdf-st-loader .two_rotating_circles .dot1',
            '.eltdf-st-loader .two_rotating_circles .dot2',
            '.eltdf-st-loader .five_rotating_circles .container1 > div',
            '.eltdf-st-loader .five_rotating_circles .container2 > div',
            '.eltdf-st-loader .five_rotating_circles .container3 > div',
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
            '.eltdf-st-loader .pulse_circles .ball'
        );

        if (!empty($spinner_style)) {
            echo superfood_elated_dynamic_css($spinner_selectors, $spinner_style);
        }
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_smooth_page_transition_styles');
}