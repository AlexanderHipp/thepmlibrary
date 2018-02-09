<?php

$eltd_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$eltd_pages[$page->ID] = $page->post_title;
}

//Portfolio Images

$eltdPortfolioImages = new SuperfoodElatedClassMetaBox('portfolio-item', esc_html__('Portfolio Images (multiple upload)', 'superfood'), '', '', 'portfolio_images');
$superfood_elated_global_Framework->eltdMetaBoxes->addMetaBox('portfolio_images',$eltdPortfolioImages);

	$eltd_portfolio_image_gallery = new SuperfoodElatedClassMultipleImages('eltd_portfolio-image-gallery', esc_html__('Portfolio Images', 'superfood'), esc_html__('Choose your portfolio images', 'superfood'));
	$eltdPortfolioImages->addChild('eltd_portfolio-image-gallery', $eltd_portfolio_image_gallery);

//Portfolio Images/Videos 2

$eltdPortfolioImagesVideos2 = new SuperfoodElatedClassMetaBox('portfolio-item', esc_html__('Portfolio Images/Videos (single upload)', 'superfood'));
$superfood_elated_global_Framework->eltdMetaBoxes->addMetaBox('portfolio_images_videos2', $eltdPortfolioImagesVideos2);

	$eltd_portfolio_images_videos2 = new SuperfoodElatedClassImagesVideosFramework('', '');
	$eltdPortfolioImagesVideos2->addChild('eltd_portfolio_images_videos2', $eltd_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$eltdAdditionalSidebarItems = superfood_elated_add_meta_box(
    array(
        'scope' => array('portfolio-item'),
        'title' => esc_html__('Additional Portfolio Sidebar Items', 'superfood'),
        'name' => 'portfolio_properties'
    )
);

	$eltd_portfolio_properties = superfood_elated_add_options_framework(
	    array(
	        'label' => esc_html__('Portfolio Properties', 'superfood'),
	        'name' => 'eltd_portfolio_properties',
	        'parent' => $eltdAdditionalSidebarItems
	    )
	);