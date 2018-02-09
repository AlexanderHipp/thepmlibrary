<button type="submit" <?php superfood_elated_inline_style($button_styles); ?> <?php superfood_elated_class_attribute($button_classes); ?> <?php echo superfood_elated_get_inline_attrs($button_data); ?> <?php echo superfood_elated_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text test"><?php echo esc_html($text); ?>
    </span>
    <?php echo superfood_elated_icon_collections()->renderIcon($icon, $icon_pack); ?>
</button>