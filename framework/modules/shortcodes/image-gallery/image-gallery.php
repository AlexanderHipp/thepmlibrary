<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\ImageGallery;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'eltdf_image_gallery';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('Elated Image Gallery', 'superfood'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by ELATED', 'superfood'),
			'icon' 						=> 'icon-wpb-image-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'       => 'dropdown',
					'param_name' => 'type',
					'heading'    => esc_html__('Gallery Type', 'superfood'),
					'value'      => array(
						esc_html__('Image Grid', 'superfood')	=> 'image_grid',
						esc_html__('Slider', 'superfood')	=> 'slider',
						esc_html__('Carousel', 'superfood') => 'carousel'
					),
					'admin_label' => true
				),
				array(
					'type'		  => 'attach_images',
					'param_name'  => 'images',
					'heading'	  => esc_html__('Images', 'superfood'),
					'description' => esc_html__('Select images from media library', 'superfood')
				),
				array(
					'type'		  => 'textfield',
					'param_name'  => 'image_size',
					'heading'	  => esc_html__('Image Size', 'superfood'),
					'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'superfood')
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'number_of_columns',
					'heading'    => esc_html__('Number of Columns', 'superfood'),
					'value' => array(
						esc_html__('Two', 'superfood') => '2',
						esc_html__('Three', 'superfood') => '3',
						esc_html__('Four', 'superfood') => '4',
						esc_html__('Five', 'superfood') => '5',
						esc_html__('Six', 'superfood') => '6'
					),
					'dependency'  => array('element' => 'type', 'value' => array('image_grid'))
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'space_between_columns',
					'heading'    => esc_html__('Space Between Columns', 'superfood'),
					'value'      => array(
						esc_html__('Normal', 'superfood') => 'normal',
						esc_html__('Small', 'superfood') => 'small',
						esc_html__('Tiny', 'superfood') => 'tiny',
						esc_html__('No Space', 'superfood') => 'no'
					),
					'dependency'  => array('element' => 'type', 'value' => array('image_grid'))
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'number_of_visible_items',
					'heading'    => esc_html__('Number Of Visible Items', 'superfood'),
					'value'      => array(
						esc_html__('Two', 'superfood') => '2',
						esc_html__('Three', 'superfood') => '3',
						esc_html__('Four', 'superfood') => '4',
						esc_html__('Five', 'superfood') => '5',
						esc_html__('Six', 'superfood') => '6'
					),
					'dependency'  => array('element' => 'type', 'value' => array('carousel'))
				),
				array(
					'type'		 => 'dropdown',
					'param_name' => 'autoplay',
					'heading'	 => esc_html__('Slide Duration', 'superfood'),
					'value'		 => array(
						'3'	=> '3',
						'4'	=> '4',
						'5'	=> '5',
						'6'	=> '6',
						'7'	=> '7',
						'8'	=> '8',
						'9'	=> '9',
						'10' => '10',
						esc_html__('Disable', 'superfood') => 'disable'
					),
					'description' => esc_html__('Auto rotate slides each X seconds', 'superfood'),
					'dependency'  => array('element' => 'type', 'value' => array('slider', 'carousel'))
				),
				array(
					'type'		 => 'dropdown',
					'param_name' => 'slide_animation',
					'heading'	 => esc_html__('Slide Animation', 'superfood'),
					'value'		 => array(
						esc_html__('Slide', 'superfood')	=> 'slide',
						esc_html__('Fade', 'superfood') => 'fade',
						esc_html__('Fade Up', 'superfood') => 'fadeUp',
						esc_html__('Back Slide', 'superfood') => 'backSlide',
						esc_html__('Go Down', 'superfood') => 'goDown'
					),
					'dependency'  => array('element' => 'type', 'value' => array('slider'))
				),
				array(
					'type'		  => 'dropdown',
					'param_name'  => 'pretty_photo',
					'heading'	  => esc_html__('Open PrettyPhoto On Click', 'superfood'),
					'value'       => array_flip(superfood_elated_get_yes_no_select_array(false))
				),
                array(
                    'type'        => 'textarea',
                    'param_name'  => 'custom_links',
                    'heading'     => esc_html__('Custom Links', 'superfood'),
                    'description' => esc_html__('Delimit links by comma', 'superfood'),
                    'dependency'  => Array('element' => 'pretty_photo', 'value' => array('no'))
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'custom_link_target',
                    'heading'     => esc_html__('Custom Link Target', 'superfood'),
                    'value'       => array(
						esc_html__('Same Window', 'superfood')  => '_self',
						esc_html__('New Window', 'superfood') => '_blank'
                    ),
                    'dependency'  => Array('element' => 'pretty_photo', 'value' => array('no'))
                ),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'grayscale',
					'heading'     => esc_html__('Grayscale Images', 'superfood'),
					'value'       => array_flip(superfood_elated_get_yes_no_select_array(false)),
					'dependency'  => array('element' => 'type', 'value' => array('image_grid'))
				),
				array(
					'type'		  => 'dropdown',
					'param_name'  => 'navigation',
					'heading'	  => esc_html__('Show Navigation Arrows', 'superfood'),
					'value'       => array_flip(superfood_elated_get_yes_no_select_array(false, true)),
					'dependency'  => array('element' => 'type', 'value' => array('slider', 'carousel'))
				),
				array(
					'type'		  => 'dropdown',
					'param_name'  => 'pagination',
					'heading'	  => esc_html__('Show Pagination', 'superfood'),
					'value'       => array_flip(superfood_elated_get_yes_no_select_array(false, true)),
					'dependency'  => array('element' => 'type', 'value' => array('slider', 'carousel'))
				)
			)
		));
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'type'                    => 'image_grid',
			'images'			      => '',
			'image_size'		      => 'thumbnail',
			'number_of_columns'		  => '3',
			'space_between_columns'   => 'normal',
			'number_of_visible_items' => '1',
			'autoplay'			      => '3',
			'slide_animation'	      => 'slide',
			'pretty_photo'		      => 'no',
			'custom_links'		      => '',
			'custom_link_target'      => '_self',
			'grayscale'			      => 'no',
			'navigation'		      => 'yes',
			'pagination'		      => 'yes'
		);

		$params = shortcode_atts($args, $atts);
		$params['gallery_classes'] = $this->getGalleryClasses($params);
		
		$params['slider_classes'] = '';
		if ($params['navigation'] === 'yes' && $params['pagination'] === 'yes' ) {
			$params['slider_classes'] = 'eltdf-nav-pag-enabled';
		}
		
		$params['slider_data'] = $this->getSliderData($params);
		
		$params['images'] = $this->getGalleryImages($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		
		$params['enable_links'] = false;
        if(!$params['pretty_photo']) {
            $params['links'] = $this->getGalleryLinks($params);
            if(count($params['images']) == count($params['links'])){
                $params['enable_links'] = true;
            };
        }

        $params['custom_link_target'] = !empty($params['custom_link_target']) ? $params['custom_link_target'] : '_self';
		
		if ($params['type'] === 'image_grid') {
			$template = 'image-gallery';
		} elseif ($params['type'] === 'slider' || $params['type'] === 'carousel') {
			$template = 'image-slider';
		}

		$html = superfood_elated_get_shortcode_module_template_part('templates/' . $template, 'image-gallery', '', $params);

		return $html;
	}
	
	/**
	 * Generates gallery classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getGalleryClasses($params) {
		$holderClasses = '';
		
		$holderClasses .= !empty($params['number_of_columns']) ? ' eltdf-ig-columns-' . $params['number_of_columns'] : ' eltdf-ig-columns-3';
		$holderClasses .= !empty($params['space_between_columns']) ? ' eltdf-ig-' . $params['space_between_columns'] . '-space' : ' eltdf-ig-normal-space';
		$holderClasses .= $params['grayscale'] === 'yes' ? ' eltdf-ig-grayscale' : '';
		
		return $holderClasses;
	}
	
	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {
		$slider_data = array();
		
		$slider_data['data-number-of-visible-items'] = ($params['number_of_visible_items'] !== '' && $params['type'] === 'carousel') ? $params['number_of_visible_items'] : '1';
		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '5000';
		$slider_data['data-animation'] = ($params['slide_animation'] !== '' && $params['type'] !== 'carousel') ? $params['slide_animation'] : 'slide';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		return $slider_data;
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);
			$image['alt'] = get_post_meta( $id, '_wp_attachment_image_alt', true);

			$images[$i] = $image;
			$i++;
		}

		return $images;
	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

    /**
     * Return links for gallery
     *
     * @param $params
     * @return array
     */
    private function getGalleryLinks($params) {

        $custom_links = array();

        if (!empty($params['custom_links'])) {
            $custom_links = array_map('trim', explode(',', $params['custom_links']));
	    }

        return $custom_links;
    }
}