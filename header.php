<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see superfood_elated_header_meta() - hooked with 10
     * @see eltd_user_scalable - hooked with 10
     */
    do_action('superfood_elated_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
    <?php superfood_elated_get_side_area(); ?>

    <?php if(superfood_elated_options()->getOptionValue('smooth_page_transitions') === "yes") { ?>
        <div class="eltdf-smooth-transition-loader eltdf-mimic-ajax">
            <div class="eltdf-st-loader">
                <div class="eltdf-st-loader1">
                    <?php superfood_elated_loading_spinners(); ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="eltdf-wrapper">
        <div class="eltdf-wrapper-inner">
            <?php superfood_elated_get_header(); ?>

            <?php if (superfood_elated_options()->getOptionValue('show_back_button') == "yes") { ?>
                <a id='eltdf-back-to-top' href='#'>
                    <span class="eltdf-icon-stack">
                         <?php superfood_elated_icon_collections()->getBackToTopIcon('font_awesome');?>
                    </span>
                </a>
            <?php } ?>
            <?php superfood_elated_get_full_screen_menu(); ?>
            <div class="eltdf-content" <?php superfood_elated_content_elem_style_attr(); ?>>
                <div class="eltdf-content-inner">