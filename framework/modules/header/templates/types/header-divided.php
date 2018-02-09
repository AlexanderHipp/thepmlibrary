<?php do_action('superfood_elated_before_page_header'); ?>

    <header class="eltdf-page-header" <?php superfood_elated_inline_style($menu_area_background_color . $header_bottom_margin); ?>>
        <?php if ($show_fixed_wrapper) : ?>
        <div class="eltdf-fixed-wrapper">
            <?php endif; ?>
            <?php do_action('superfood_elated_after_header_area_html_open'); ?>
            <div class="eltdf-menu-area" <?php superfood_elated_inline_style($menu_area_border_bottom_color); ?>>
                <?php do_action('superfood_elated_after_header_menu_area_html_open') ?>
                <?php if ($header_divided_in_grid) : ?>
                <div class="eltdf-grid">
                    <?php endif; ?>
                    <div class="eltdf-vertical-align-containers">
                        <div class="eltdf-position-left">
                            <div class="eltdf-position-left-inner">
                                <?php superfood_elated_get_divided_left_main_menu(); ?>
                            </div>
                        </div>
                        <div class="eltdf-position-center">
                            <div class="eltdf-position-center-inner">
                                <?php if (!$hide_logo) {
                                    superfood_elated_get_logo('divided');
                                } ?>
                            </div>
                        </div>
                        <div class="eltdf-position-right">
                            <div class="eltdf-position-right-inner">
                                <?php superfood_elated_get_divided_right_main_menu(); ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($menu_area_in_grid) : ?>
                </div>
            <?php endif; ?>
            </div>
            <?php if ($show_fixed_wrapper) { ?>
            <?php do_action('superfood_elated_end_of_page_header_html'); ?>
        </div>
    <?php } else {
        do_action('superfood_elated_end_of_page_header_html');
    } ?>
        <?php if ($show_sticky) {
            superfood_elated_get_sticky_header('divided');
        } ?>
    </header>

<?php do_action('superfood_elated_after_page_header'); ?>