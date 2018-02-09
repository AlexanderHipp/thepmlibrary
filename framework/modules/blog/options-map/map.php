<?php

if ( ! function_exists('superfood_elated_blog_options_map') ) {

	function superfood_elated_blog_options_map() {

		superfood_elated_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'superfood'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */
		$panel_blog_lists = superfood_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'superfood')
			)
		);

		superfood_elated_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'superfood'),
			'description' => esc_html__('Choose a default blog layout', 'superfood'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'			 => esc_html__('Blog: Standard', 'superfood'),
				'masonry' 			 => esc_html__('Blog: Masonry', 'superfood'),
				'masonry-full-width' => esc_html__('Blog: Masonry Full Width', 'superfood')
			)
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar', 'superfood'),
			'description' => esc_html__('Choose a sidebar layout for archived blog post lists and category blog lists', 'superfood'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'superfood'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'superfood'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'superfood'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'superfood'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'superfood')
			)
		));
		
		$superfood_elated_custom_sidebars = superfood_elated_get_custom_sidebars();
		if(count($superfood_elated_custom_sidebars) > 0) {
			superfood_elated_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'superfood'),
				'description' => esc_html__('Choose a sidebar to display on blog post lists and category blog lists. Default sidebar is "Sidebar Page"', 'superfood'),
				'parent' => $panel_blog_lists,
				'options' => superfood_elated_get_custom_sidebars()
			));
		}

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination', 'superfood'),
				'description' => esc_html__('Enabling this option will display pagination links on bottom of blog post list', 'superfood'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_pagination_container'
				)
			)
		);

		$pagination_container = superfood_elated_add_admin_container(
			array(
				'name' => 'eltdf_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '4',
				'label' => esc_html__('Pagination Range Limit', 'superfood'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'superfood'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label'       => esc_html__('Pagination on Masonry', 'superfood'),
			'description' => esc_html__('Choose a pagination style for Masonry Blog List', 'superfood'),
			'parent'      => $pagination_container,
			'default_value' => 'standard',
			'options'     => array(
				'standard'			=> esc_html__('Standard', 'superfood'),
				'load-more'			=> esc_html__('Load More', 'superfood')
			),
		));

        superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__('Load More Pagination on Other Lists', 'superfood'),
				'description' => esc_html__('Enable Load More Pagination on other lists', 'superfood'),
				'parent' => $pagination_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	
		superfood_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt', 'superfood'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'superfood'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt', 'superfood'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'superfood'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt', 'superfood'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'superfood'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_feature_image',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Feature Image', 'superfood'),
			'description'   => esc_html__('Enabling this option will show feature image for your posts on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes',
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Category', 'superfood'),
			'description'   => esc_html__('Enabling this option will show category post info on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Date', 'superfood'),
			'description'   => esc_html__('Enabling this option will show date post info on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_author',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Author', 'superfood'),
			'description'   => esc_html__('Enabling this option will show author post info on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_comment',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'superfood'),
			'description'   => esc_html__('Enabling this option will show comments post info on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_like',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Like', 'superfood'),
			'description'   => esc_html__('Enabling this option will show like post info on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_share',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Share', 'superfood'),
			'description'   => esc_html__('Enabling this option will show share post info on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_list_tags',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Tags', 'superfood'),
			'description'   => esc_html__('Enabling this option will show post tags on your blog page', 'superfood'),
			'parent'        => $panel_blog_lists,
			'default_value' => 'no'
		));

		/**
		 * Blog Single
		 */
		$panel_blog_single = superfood_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'superfood')
			)
		);

		superfood_elated_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'superfood'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'superfood'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'superfood'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'superfood'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'superfood'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'superfood'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'superfood')
			),
			'default_value'	=> 'default'
		));


		if(count($superfood_elated_custom_sidebars) > 0) {
			superfood_elated_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'superfood'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'superfood'),
				'parent' => $panel_blog_single,
				'options' => superfood_elated_get_custom_sidebars()
			));
		}

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'superfood'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		superfood_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'blog_single_feature_image_max_width',
				'label' => esc_html__('Featured Image Max Width', 'superfood'),
				'description' => esc_html__('Define maximum width for featured image on single post pages. Default value is 1100', 'superfood'),
				'parent' => $panel_blog_single,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_category',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Category', 'superfood'),
			'description'   => esc_html__('Enabling this option will show category post info on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Date', 'superfood'),
			'description'   => esc_html__('Enabling this option will show date post info on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_author',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Author', 'superfood'),
			'description'   => esc_html__('Enabling this option will show author post info on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_comment',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'superfood'),
			'description'   => esc_html__('Enabling this option will show comments post info on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_like',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Like', 'superfood'),
			'description'   => esc_html__('Enabling this option will show like post info on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_share',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Share', 'superfood'),
			'description'   => esc_html__('Enabling this option will show share post info on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_tags',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Tags', 'superfood'),
			'description'   => esc_html__('Enabling this option will show post tags on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'superfood'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_related_image_container'
			)
		));

		$related_image_container = superfood_elated_add_admin_container(
			array(
				'name' => 'related_image_container',
				'hidden_property' => 'blog_single_related_posts',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'blog_single_related_image_size',
				'label' => esc_html__('Related Posts Image Max Width', 'superfood'),
				'description' => esc_html__('Define maximum width for related posts images on your single post pages. Default value is 1100', 'superfood'),
				'parent' => $related_image_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments Form', 'superfood'),
			'description'   => esc_html__('Enabling this option will show comments form on your page', 'superfood'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'superfood'),
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'superfood'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = superfood_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'superfood'),
				'description' => esc_html__('Limit your navigation only through current category', 'superfood'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__('Show Author Info Box', 'superfood'),
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'superfood'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = superfood_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'superfood'),
				'description' => esc_html__('Enabling this option will show author email', 'superfood'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'       => esc_html__('Show Author Social Icons', 'superfood'),
				'description' => esc_html__('Enabling this option will show author social icons on your single post page', 'superfood'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	}

	add_action( 'superfood_elated_options_map', 'superfood_elated_blog_options_map', 11);
}