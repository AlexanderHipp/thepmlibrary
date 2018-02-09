<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<div><label class="screen-reader-text" for="s"><?php esc_html_e('Search for', 'superfood'); ?>:</label>
		<input type="text" value="" placeholder="<?php esc_html_e('Search', 'superfood'); ?>" name="s" id="s" />
		<button type="submit" id="searchsubmit"><span class="icon_search"></span></button>
	</div>
</form>