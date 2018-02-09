<?php do_action('superfood_elated_before_sticky_header'); ?>

    <div class="eltdf-sticky-header">
        <?php do_action('superfood_elated_after_sticky_menu_html_open'); ?>
        <div class="eltdf-sticky-holder">
            <?php if ($sticky_header_in_grid) : ?>
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
                                superfood_elated_get_logo('divided-sticky');
                            } ?>
                        </div>
                    </div>
                    <div class="eltdf-position-right">
                        <div class="eltdf-position-right-inner">
                            <?php superfood_elated_get_divided_right_main_menu(); ?>
                        </div>
                    </div>
                </div>
                <?php if ($sticky_header_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php do_action('superfood_elated_after_sticky_header'); ?>