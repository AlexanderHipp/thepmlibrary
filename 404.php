<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * superfood_elated_header_meta hook
     *
     * @see superfood_elated_header_meta() - hooked with 10
     * @see eltd_user_scalable_meta() - hooked with 10
     */
    do_action('superfood_elated_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php if (superfood_elated_options()->getOptionValue('smooth_page_transitions') === "yes") { ?>
    <div class="eltdf-smooth-transition-loader eltdf-mimic-ajax">
        <div class="eltdf-st-loader">
            <div class="eltdf-st-loader1">
                <?php superfood_elated_loading_spinners(); ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="eltdf-wrapper eltdf-404-page">
    <div class="eltdf-wrapper-inner">
        <?php superfood_elated_get_header(); ?>

        <?php if (superfood_elated_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='eltdf-back-to-top' href='#'>
                    <span class="eltdf-icon-stack">
                         <?php superfood_elated_icon_collections()->getBackToTopIcon('font_awesome'); ?>
                    </span>
            </a>
        <?php } ?>
        <?php superfood_elated_get_full_screen_menu(); ?>
        <div class="eltdf-content" <?php superfood_elated_content_elem_style_attr(); ?>>
            <div class="eltdf-content-inner">
                <div class="eltdf-page-not-found">
                    <?php if (superfood_elated_options()->getOptionValue('404_page_title_image')) { ?>
                        <div class="eltdf-404-title-image">
                            <img src="<?php echo esc_attr(superfood_elated_options()->getOptionValue('404_page_title_image')); ?>" alt=""/>
                        </div>
                    <?php } ?>
                    <h1>
                        <?php if (superfood_elated_options()->getOptionValue('404_title')) {
                            echo esc_html(superfood_elated_options()->getOptionValue('404_title'));
                        } else {
                            esc_html_e('404', 'superfood');
                        } ?>
                    </h1>
                    <h3>
                        <?php if (superfood_elated_options()->getOptionValue('404_subtitle')) {
                            echo esc_html(superfood_elated_options()->getOptionValue('404_subtitle'));
                        } else {
                            esc_html_e('Page not found', 'superfood');
                        } ?>
                    </h3>
                    <p class="eltdf-page-not-found-text">
                        <?php if (superfood_elated_options()->getOptionValue('404_text')) {
                            echo esc_html(superfood_elated_options()->getOptionValue('404_text'));
                        } else {
                            esc_html_e('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'superfood');
                        } ?>
                    </p>
                    <?php
                    $params = array();
                    if (superfood_elated_options()->getOptionValue('404_back_to_home')) {
                        $params['text'] = superfood_elated_options()->getOptionValue('404_back_to_home');
                    } else {
                        $params['text'] = esc_html__('BACK TO HOME', 'superfood');
                    }
                    $params['link'] = esc_url(home_url('/'));
                    $params['target'] = '_self';
                    $params['type'] = 'solid';
                    $params['size'] = 'large';
                    $params['border_color'] = '#B11A5D';

                    if (superfood_elated_options()->getOptionValue('404_button_style') == 'light-button') {
                        $params['custom_class'] = 'eltdf-btn-light';
                    }

                    echo superfood_elated_execute_shortcode('eltdf_button', $params); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>