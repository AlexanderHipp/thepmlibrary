<?php

if(!function_exists('superfood_elated_get_portfolio_category_list')) {
    function superfood_elated_get_portfolio_category_list($category = '') {

	    $number_of_items = 12;
	    $number_of_items_option = superfood_elated_options()->getOptionValue('portfolio_archive_number_of_items');
	    if(!empty($number_of_items_option)) {
		    $number_of_items = $number_of_items_option;
	    }

	    $number_of_columns = 4;
	    $number_of_columns_option = superfood_elated_options()->getOptionValue('portfolio_archive_number_of_columns');
	    if(!empty($number_of_columns_option)) {
		    $number_of_columns = $number_of_columns_option;
	    }

	    $space_between_items = 'normal';
	    $space_between_items_option = superfood_elated_options()->getOptionValue('portfolio_archive_space_between_items');
	    if(!empty($space_between_items_option)) {
		    $space_between_items = $space_between_items_option;
	    }

	    $image_size = 'landscape';
	    $image_size_option = superfood_elated_options()->getOptionValue('portfolio_archive_image_size');
	    if(!empty($image_size_option)) {
		    $image_size = $image_size_option;
	    }

	    $params = array(
		    'type'                  => 'gallery',
		    'number_of_items'       => $number_of_items,
		    'number_of_columns'     => $number_of_columns,
		    'space_between_items'   => $space_between_items,
		    'image_proportions'     => $image_size,
		    'category'              => $category,
		    'show_load_more'        => 'yes',
	    );

	    $html = superfood_elated_execute_shortcode('eltdf_portfolio_list', $params);

	    print $html;
    }
}

if(!function_exists('superfood_elated_get_portfolio_tag_list')) {
	function superfood_elated_get_portfolio_tag_list($tag = '') {

		$number_of_items = 12;
		$number_of_items_option = superfood_elated_options()->getOptionValue('portfolio_archive_number_of_items');
		if(!empty($number_of_items_option)) {
			$number_of_items = $number_of_items_option;
		}

		$number_of_columns = 4;
		$number_of_columns_option = superfood_elated_options()->getOptionValue('portfolio_archive_number_of_columns');
		if(!empty($number_of_columns_option)) {
			$number_of_columns = $number_of_columns_option;
		}

		$space_between_items = 'normal';
		$space_between_items_option = superfood_elated_options()->getOptionValue('portfolio_archive_space_between_items');
		if(!empty($space_between_items_option)) {
			$space_between_items = $space_between_items_option;
		}

		$image_size = 'landscape';
		$image_size_option = superfood_elated_options()->getOptionValue('portfolio_archive_image_size');
		if(!empty($image_size_option)) {
			$image_size = $image_size_option;
		}

		$params = array(
			'type'                  => 'gallery',
			'number_of_items'       => $number_of_items,
			'number_of_columns'     => $number_of_columns,
			'space_between_items'   => $space_between_items,
			'image_proportions'     => $image_size,
			'tag'                   => $tag,
			'show_load_more'        => 'yes',
		);

		$html = superfood_elated_execute_shortcode('eltdf_portfolio_list', $params);

		print $html;
	}
}

if(!function_exists('superfood_elated_single_portfolio')) {
    function superfood_elated_single_portfolio() {
        $portfolio_template = superfood_elated_get_portfolio_single_type();

        $params = array(
            'portfolio_template' => $portfolio_template,
            'fullwidth'          => $portfolio_template == 'full-width-custom',
            'holder_class'       => array(
                $portfolio_template,
                'eltdf-portfolio-single-holder'
            )
        );

        if ($portfolio_template == 'gallery') {
            $params['holder_class'][] = 'eltdf-portfolio-gallery-' . superfood_elated_options()->getOptionValue('portfolio_single_numb_columns');
        }

        superfood_elated_get_module_template_part('templates/single/holder', 'portfolio', '', $params);
    }
}

if(!function_exists('superfood_elated_get_portfolio_single_type')) {
    function superfood_elated_get_portfolio_single_type() {
        return superfood_elated_get_meta_field_intersect('portfolio_single_template');
    }
}

if(!function_exists('superfood_elated_get_portfolio_single_media')) {
    function superfood_elated_get_portfolio_single_media() {
        $image_ids       = get_post_meta(get_the_ID(), 'eltd_portfolio-image-gallery', true);
        $videos          = get_post_meta(get_the_ID(), 'eltd_portfolio_images', true);
        $portfolio_media = array();

        if($image_ids !== '') {
            $image_ids = explode(',', $image_ids);

            foreach($image_ids as $image_id) {
                $media                = array();
                $media['title']       = get_the_title($image_id);
                $media['type']        = 'image';
                $media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $media['image_src']   = wp_get_attachment_image_src($image_id, 'full');

                $portfolio_media[] = $media;
            }
        }

        if(is_array($videos) && count($videos)) {
            usort($videos, 'superfood_elated_compare_portfolio_videos');
            foreach($videos as $video) {
                $media = array();

                if(!empty($video['portfoliovideotype'])) {
                    $media['title']       = $video['portfoliotitle'];
                    $media['type']        = $video['portfoliovideotype'];
                    $media['description'] = 'video';
                    $media['video_url']   = superfood_elated_portfolio_get_video_url($video);

                    if($video['portfoliovideotype'] == 'self') {
                        $media['video_cover'] = !empty($video['portfoliovideoimage']) ? $video['portfoliovideoimage'] : '';
                    }

                    if($video['portfoliovideotype'] !== 'self') {
                        $media['video_id'] = $video['portfoliovideoid'];
                    }
                } elseif(!empty($video['portfolioimgtype'])) {
                    $media['title']     = $video['portfoliotitle'];
                    $media['type']      = $video['portfolioimgtype'];
                    $media['image_src'] = $video['portfolioimg'];
                }

                $portfolio_media[] = $media;
            }
        }

        return $portfolio_media;
    }
}

if(!function_exists('superfood_elated_portfolio_get_video_url')) {
    function superfood_elated_portfolio_get_video_url($video) {
        switch($video['portfoliovideotype']) {
            case 'youtube':
                return 'https://www.youtube.com/embed/'.$video['portfoliovideoid'].'?wmode=transparent';
                break;
            case 'vimeo';
                return 'https://player.vimeo.com/video/'.$video['portfoliovideoid'].'?title=0&amp;byline=0&amp;portrait=0';
                break;
            case 'self':
                $return_array = array();
                if(!empty($video['portfoliovideowebm'])) {
                    $return_array['webm'] = $video['portfoliovideowebm'];
                }

                if(!empty($video['portfoliovideomp4'])) {
                    $return_array['mp4'] = $video['portfoliovideomp4'];
                }

                if(!empty($video['portfoliovideoogv'])) {
                    $return_array['ogv'] = $video['portfoliovideoogv'];
                }

                return $return_array;

                break;
        }
    }
}

if(!function_exists('superfood_elated_portfolio_get_media_html')) {
    function superfood_elated_portfolio_get_media_html($media) {
        global $wp_filesystem;
        $params = array();

        //For adding image overlay in gallery template type
        $params['gallery'] = (superfood_elated_get_portfolio_single_type() == 'gallery') ? true : false;

        if($media['type'] == 'image') {
            $params['lightbox'] = superfood_elated_options()->getOptionValue('portfolio_single_lightbox_images') == 'yes';

            $media['image_url'] = is_array($media['image_src']) ? $media['image_src'][0] : $media['image_src'];
            if(empty($media['description'])) {
                $media['description'] = $media['title'];
            }
        }

        if(in_array($media['type'], array('youtube', 'vimeo'))) {
            $params['lightbox'] = superfood_elated_options()->getOptionValue('portfolio_single_lightbox_videos') == 'yes';

            if($params['lightbox']) {
                switch($media['type']) {
                    case 'vimeo':
						WP_Filesystem();
                        $url      = 'https://vimeo.com/api/v2/video/'.$media['video_id'].'.php';
                        $response = unserialize($wp_filesystem->get_contents($url));

                        $params['video_title']    = $response[0]['title'];
                        $params['lightbox_thumb'] = $response[0]['thumbnail_large'];
                        break;
                    case 'youtube':
                        $url      = 'https://gdata.youtube.com/feeds/api/videos/'.trim($media['video_id']).'?alt=json';

                        $params['video_title'] = $media['title'];

                        $params['lightbox_thumb'] = 'https://img.youtube.com/vi/'.trim($media['video_id']).'/maxresdefault.jpg';
                        break;
                }
            }
        }

        $params['media'] = $media;

        superfood_elated_get_module_template_part('templates/single/media/'.$media['type'], 'portfolio', '', $params);
    }
}

if(!function_exists('superfood_elated_compare_portfolio_videos')) {
    /**
     * Function that compares two portfolio image for sorting
     *
     * @param $a int first image
     * @param $b int second image
     *
     * @return int result of comparison
     */
    function superfood_elated_compare_portfolio_videos($a, $b) {
        if(isset($a['portfolioimgordernumber']) && isset($b['portfolioimgordernumber'])) {
            if($a['portfolioimgordernumber'] == $b['portfolioimgordernumber']) {
                return 0;
            }

            return ($a['portfolioimgordernumber'] < $b['portfolioimgordernumber']) ? -1 : 1;
        }

        return 0;
    }
}

if(!function_exists('superfood_elated_compare_portfolio_options')) {
    /**
     * Function that compares two portfolio options for sorting
     *
     * @param $a int first option
     * @param $b int second option
     *
     * @return int result of comparison
     */
    function superfood_elated_compare_portfolio_options($a, $b) {
        if(isset($a['optionlabelordernumber']) && isset($b['optionlabelordernumber'])) {
            if($a['optionlabelordernumber'] == $b['optionlabelordernumber']) {
                return 0;
            }

            return ($a['optionlabelordernumber'] < $b['optionlabelordernumber']) ? -1 : 1;
        }

        return 0;
    }
}

if(!function_exists('superfood_elated_portfolio_get_info_part')) {
    function superfood_elated_portfolio_get_info_part($part) {
        $portfolio_template = superfood_elated_get_portfolio_single_type();

        superfood_elated_get_module_template_part('templates/single/parts/'.$part, 'portfolio', $portfolio_template);
    }
}