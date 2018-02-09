<div class="eltdf-two-columns-66-33 clearfix">
	<div class="eltdf-column1">
		<div class="eltdf-column-inner">
			<?php
			$media = superfood_elated_get_portfolio_single_media();

			if(is_array($media) && count($media)) : ?>
				<div class="eltdf-portfolio-media eltdf-owl-slider">
					<?php foreach($media as $single_media) : ?>
						<div class="eltdf-portfolio-single-media">
							<?php superfood_elated_portfolio_get_media_html($single_media); ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="eltdf-column2">
		<div class="eltdf-column-inner">
			<div class="eltdf-portfolio-info-holder">
				<?php
				//get portfolio content section
				superfood_elated_portfolio_get_info_part('content');

				//get portfolio custom fields section
				superfood_elated_portfolio_get_info_part('custom-fields');
				
				//get portfolio categories section
				superfood_elated_portfolio_get_info_part('categories');
				
				//get portfolio date section
				superfood_elated_portfolio_get_info_part('date');

				//get portfolio tags section
				superfood_elated_portfolio_get_info_part('tags');

				//get portfolio share section
				superfood_elated_portfolio_get_info_part('social');
				?>
			</div>
		</div>
	</div>
</div>