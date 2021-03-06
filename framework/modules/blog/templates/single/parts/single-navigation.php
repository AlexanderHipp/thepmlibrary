<?php if ($blog_single_navigation) { ?>
    <div class="eltdf-blog-single-navigation">
        <div class="eltdf-blog-single-navigation-inner clearfix">
            <?php
            /* Single navigation section - SETTING PARAMS */
            $post_navigation = array(
                'prev' => array(
                    'mark' => '<span class="eltdf-blog-single-nav-mark fa fa-angle-left"></span>',
                    'label' => '<span class="eltdf-blog-single-nav-label">Previous post</span>'
                ),
                'next' => array(
                    'mark' => '<span class="eltdf-blog-single-nav-mark fa fa-angle-right"></span>',
                    'label' => '<span class="eltdf-blog-single-nav-label">Next post</span>'
                )
            );

            if (get_previous_post() !== "") {
                if ($blog_navigation_through_same_category) {
                    if (get_previous_post(true) !== "") {
                        $post_navigation['prev']['post'] = get_previous_post(true);
                    }
                } else {
                    if (get_previous_post() != "") {
                        $post_navigation['prev']['post'] = get_previous_post();
                    }
                }
            }
            if (get_next_post() != "") {
                if ($blog_navigation_through_same_category) {
                    if (get_next_post(true) !== "") {
                        $post_navigation['next']['post'] = get_next_post(true);
                    }
                } else {
                    if (get_next_post() !== "") {
                        $post_navigation['next']['post'] = get_next_post();
                    }
                }
            }

            /* Single navigation section - RENDERING */
            if (isset($post_navigation['prev']['post']) || isset($post_navigation['next']['post'])) {
                foreach (array('prev', 'next') as $nav_type) {
                    if (isset($post_navigation[$nav_type]['post'])) { ?>
                        <a itemprop="url" class="eltdf-blog-single-<?php print $nav_type; ?>" href="<?php echo esc_url(get_permalink($post_navigation[$nav_type]['post']->ID)); ?>">
                            <?php print $post_navigation[$nav_type]['mark']; ?>
                            <?php print $post_navigation[$nav_type]['label']; ?>
                        </a>
                    <?php }
                }
            }
            ?>
        </div>
    </div>
<?php } ?>