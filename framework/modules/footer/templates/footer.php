</div> <!-- close div.content_inner -->
	</div>  <!-- close div.content -->
		<footer <?php superfood_elated_class_attribute($footer_classes); ?>>
			<div class="eltdf-footer-inner clearfix">
				<?php
					if($display_footer_top) {
						superfood_elated_get_footer_top();
					}
					if($display_footer_bottom) {
						superfood_elated_get_footer_bottom();
					}
				?>
			</div>			
		</footer>
	</div> <!-- close div.eltdf-wrapper-inner  -->
</div> <!-- close div.eltdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>