<?php if($fullwidth) : ?>
<div class="eltdf-full-width">
    <div class="eltdf-full-width-inner">
<?php else: ?>
<div class="eltdf-container">
    <div class="eltdf-container-inner clearfix">
<?php endif; ?>
        <div <?php superfood_elated_class_attribute($holder_class); ?>>
            <?php if(post_password_required()) {
                echo get_the_password_form();
            } else {
                //load proper portfolio template
                superfood_elated_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);

                //load portfolio navigation
                superfood_elated_get_module_template_part('templates/single/parts/navigation', 'portfolio');
                
                if($fullwidth) { ?>
                    <div class="eltdf-container">
                        <div class="eltdf-container-inner clearfix">
                <?php }

                //load portfolio comments
                superfood_elated_get_module_template_part('templates/single/parts/comments', 'portfolio');

                if($fullwidth) { ?>
	                    </div>
	                </div>
                <?php }
            } ?>
        </div>
    </div>
</div>