<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-video-holder">
			<?php superfood_elated_get_module_template_part('templates/parts/video', 'blog'); ?>
		</div>
		<div class="eltdf-post-text">
			<div class="eltdf-post-info-holder">
				<div class="eltdf-post-info clearfix">
					<?php superfood_elated_post_info(array(
						'date' => $display_date,
						'category' => $display_category,
						'comments' => $display_comments,
						'like' => $display_like,
						'share' => $display_share
					)) ?>
				</div>
			</div>
			<?php
				$title_param = array();
				$title_param['title_post_format'] = $post_format;
				$title_param['title_tag'] = 'h4';
				superfood_elated_get_module_template_part('templates/lists/parts/title', 'blog', '', $title_param);
			?>
			<?php if($excerpt_length !== '0') { ?>
				<div class="eltdf-post-excerpt-holder">
					<?php superfood_elated_excerpt($excerpt_length); ?>
					<?php superfood_elated_read_more_button('', 'eltdf-blog-list-button'); ?>
				</div>
			<?php } ?>
			<div class="eltdf-post-info-holder">
				<div class="eltdf-post-info clearfix">
					<?php superfood_elated_post_info(array(
						'author' => $display_author
					)) ?>
				</div>
			</div>
			<?php do_action('superfood_elated_blog_list_tags'); ?>
		</div>
	</div>
</article>