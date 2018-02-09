<?php

$eltd_blog_categories = array();
$categories = get_categories();
foreach($categories as $category) {
    $eltd_blog_categories[$category->term_id] = $category->name;
}

$blog_meta_box = superfood_elated_add_meta_box(
    array(
        'scope' => array('page'),
        'title' => esc_html__('Blog', 'superfood'),
        'name' => 'blog_meta'
    )
);

    superfood_elated_add_meta_box_field(
        array(
            'name'        => 'eltdf_blog_category_meta',
            'type'        => 'selectblank',
            'label'       => esc_html__('Blog Category', 'superfood'),
            'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'superfood'),
            'parent'      => $blog_meta_box,
            'options'     => $eltd_blog_categories
        )
    );

    superfood_elated_add_meta_box_field(
        array(
            'name'        => 'eltdf_show_posts_per_page_meta',
            'type'        => 'text',
            'label'       => esc_html__('Number of Posts', 'superfood'),
            'description' => esc_html__('Enter the number of posts to display', 'superfood'),
            'parent'      => $blog_meta_box,
            'options'     => $eltd_blog_categories,
            'args'        => array("col_width" => 3)
        )
    );
	

