<?php if(($sidebar == "default")||($sidebar == "")) : ?>
	<div class="eltdf-blog-holder eltdf-blog-single">
		<?php superfood_elated_get_single_html(); ?>
	</div>
<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
	<div <?php echo superfood_elated_sidebar_columns_class(); ?>>
		<div class="eltdf-column1 eltdf-content-left-from-sidebar">
			<div class="eltdf-column-inner">
				<div class="eltdf-blog-holder eltdf-blog-single">
					<?php superfood_elated_get_single_html(); ?>
				</div>
			</div>
		</div>
		<div class="eltdf-column2">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
	<div <?php echo superfood_elated_sidebar_columns_class(); ?>>
		<div class="eltdf-column1">
			<?php get_sidebar(); ?>
		</div>
		<div class="eltdf-column2 eltdf-content-right-from-sidebar">
			<div class="eltdf-column-inner">
				<div class="eltdf-blog-holder eltdf-blog-single">
					<?php superfood_elated_get_single_html(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
