<div class="eltdf-rstrnt-item">

    <?php
    if ($show_item_image === 'yes' && $item_image !== '') { ?>

        <div class="eltdf-rstrnt-item-image">
            <?php echo wp_get_attachment_image($item_image, array(158, 107)); ?>
        </div>

    <?php } ?>

    <div class="eltdf-rstrnt-item-inner">

        <?php if ($title !== '' || $price !== '') { ?>

        <div class="eltdf-rstrnt-title-price-holder clearfix">

            <?php if ($title !== '') { ?>

            <<?php echo esc_attr($title_tag); ?> class="eltdf-rstrnt-title">
						<span class="eltdf-rstrnt-title-area" <?php echo superfood_elated_get_inline_style($title_style) ?>>
							<?php echo esc_html($title); ?>
                            <?php if ($trending_item === 'yes') { ?>
                                <span class="eltdf-rstrnt-trending-item icon_star"></span>
                            <?php } ?>
						</span>
        </<?php echo esc_attr($title_tag); ?>>
    <?php }

    if ($price !== '') { ?>

        <div class="eltdf-rstrnt-price-holder">
            <h5 class="eltdf-rstrnt-price">
                <span class="eltdf-rstrnt-currency"><?php echo esc_html($currency); ?></span>
                <span class="eltdf-rstrnt-number"><?php echo esc_html($price); ?></span>
            </h5>
        </div>

    <?php } ?>

    </div>

<?php } ?>

    <?php if ($description !== '') { ?>
        <p class="eltdf-rstrnt-desc"><?php echo esc_html($description); ?></p>
    <?php } ?>
</div>
</div>