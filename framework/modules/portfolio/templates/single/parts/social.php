<?php if(superfood_elated_options()->getOptionValue('enable_social_share') == 'yes' && superfood_elated_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="eltdf-portfolio-info-item eltdf-portfolio-social">
        <?php echo superfood_elated_get_social_share_html() ?>
    </div>
<?php endif; ?>