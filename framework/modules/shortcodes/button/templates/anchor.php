<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php superfood_elated_inline_style($button_styles); ?> <?php superfood_elated_class_attribute($button_classes); ?> <?php echo superfood_elated_get_inline_attrs($button_data); ?> <?php echo superfood_elated_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text">
    <?php echo esc_html($text); ?>
    <?php if(!empty($button_animation)) : ?>
    	<span class="eltdf-btn-bottom-line"></span>
    	<span class="eltdf-btn-upper-line"></span>
    <?php endif; ?>
    </span>
    <?php echo superfood_elated_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>