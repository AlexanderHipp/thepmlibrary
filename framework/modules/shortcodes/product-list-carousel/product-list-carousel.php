<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\ProductListCarousel;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ProductListCarousel
 */
class ProductListCarousel implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'eltdf_product_list_carousel';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Elated Product List - Carousel', 'superfood'),
            'base' => $this->base,
            'icon' => 'icon-wpb-product-list-carousel extended-custom-icon',
            'category' => esc_html__('by ELATED', 'superfood'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'param_name' => 'type',
                    'heading' => esc_html__('Type', 'superfood'),
                    'value' => array(
                        esc_html__('Standard', 'superfood') => 'standard',
                        esc_html__('Simple', 'superfood') => 'simple'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'number_of_posts',
                    'heading' => esc_html__('Number of Products', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Number of Visible Items', 'superfood'),
                    'param_name' => 'number_of_visible_items',
                    'value' => array(
                        esc_html__('One', 'superfood') => '1',
                        esc_html__('Two', 'superfood') => '2',
                        esc_html__('Three', 'superfood') => '3',
                        esc_html__('Four', 'superfood') => '4',
                        esc_html__('Five', 'superfood') => '5'
                    ),
                    'dependency' => array('element' => 'type', 'value' => array('standard')),
                    'save_always' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Enable Carousel Autoplay', 'superfood'),
                    'param_name' => 'carousel_autoplay',
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false, true))
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'carousel_autoplay_timeout',
                    'heading' => esc_html__('Slide Duration (ms)', 'superfood'),
                    'description' => esc_html__('Autoplay interval timeout. Default value is 5000', 'superfood'),
                    'dependency' => array('element' => 'carousel_autoplay', 'value' => array('yes'))
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'carousel_loop',
                    'heading' => esc_html__('Enable Carousel Loop', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false, true))
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'carousel_speed',
                    'heading' => esc_html__('Animation Speed (ms)', 'superfood'),
                    'description' => esc_html__('Carousel Speed interval. Default value is 650', 'superfood'),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'space_between_items',
                    'heading' => esc_html__('Space Between Items', 'superfood'),
                    'value' => array(
                        esc_html__('Normal', 'superfood') => 'normal',
                        esc_html__('Small', 'superfood') => 'small',
                        esc_html__('Tiny', 'superfood') => 'tiny',
                        esc_html__('No Space', 'superfood') => 'no'
                    ),
                    'dependency' => array('element' => 'type', 'value' => array('standard'))
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'order_by',
                    'heading' => esc_html__('Order By', 'superfood'),
                    'value' => array(
                        esc_html__('Title', 'superfood') => 'title',
                        esc_html__('Date', 'superfood') => 'date',
                        esc_html__('Random', 'superfood') => 'rand',
                        esc_html__('Post Name', 'superfood') => 'name',
                        esc_html__('ID', 'superfood') => 'id',
                        esc_html__('Menu Order', 'superfood') => 'menu_order'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'order',
                    'heading' => esc_html__('Order', 'superfood'),
                    'value' => array(
                        esc_html__('ASC', 'superfood') => 'ASC',
                        esc_html__('DESC', 'superfood') => 'DESC'
                    )
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'taxonomy_to_display',
                    'heading' => esc_html__('Choose Sorting Taxonomy', 'superfood'),
                    'value' => array(
                        esc_html__('Category', 'superfood') => 'category',
                        esc_html__('Tag', 'superfood') => 'tag',
                        esc_html__('Id', 'superfood') => 'id'
                    ),
                    'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'superfood')
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'taxonomy_values',
                    'heading' => esc_html__('Enter Taxonomy Values', 'superfood'),
                    'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Image Proportions', 'superfood'),
                    'param_name' => 'image_size',
                    'value' => array(
                        esc_html__('Default', 'superfood') => '',
                        esc_html__('Original', 'superfood') => 'full',
                        esc_html__('Square', 'superfood') => 'square',
                        esc_html__('Landscape', 'superfood') => 'landscape',
                        esc_html__('Portrait', 'superfood') => 'portrait',
                        esc_html__('Medium', 'superfood') => 'medium',
                        esc_html__('Large', 'superfood') => 'large'
                    ),
                    'save_always' => true
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'carousel_navigation',
                    'heading' => esc_html__('Enable Carousel Navigation', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false, true))
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'carousel_navigation_skin',
                    'heading' => esc_html__('Carousel Navigation Skin', 'superfood'),
                    'value' => array(
                        esc_html__('Default', 'superfood') => 'default',
                        esc_html__('Light', 'superfood') => 'light'
                    ),
                    'dependency' => array('element' => 'carousel_navigation', 'value' => array('yes'))
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'carousel_pagination',
                    'heading' => esc_html__('Enable Carousel Pagination', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false))
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'carousel_pagination_skin',
                    'heading' => esc_html__('Carousel Pagination Skin', 'superfood'),
                    'value' => array(
                        esc_html__('Default', 'superfood') => 'default',
                        esc_html__('Light', 'superfood') => 'light'
                    ),
                    'dependency' => array('element' => 'carousel_pagination', 'value' => array('yes'))
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'carousel_pagination_pos',
                    'heading' => esc_html__('Carousel Pagination Position', 'superfood'),
                    'value' => array(
                        esc_html__('Below Carousel', 'superfood') => 'bellow-slider',
                        esc_html__('Inside Carousel', 'superfood') => 'inside-slider'
                    ),
                    'dependency' => array('element' => 'carousel_pagination', 'value' => array('yes'))
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'display_title',
                    'heading' => esc_html__('Display Title', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false, true)),
                    'group' => esc_html__('Product Info', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'title_tag',
                    'heading' => esc_html__('Title Tag', 'superfood'),
                    'value' => array_flip(superfood_elated_get_title_tag(true)),
                    'save_always' => true,
                    'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                    'group' => esc_html__('Product Info Style', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'title_transform',
                    'heading' => esc_html__('Title Text Transform', 'superfood'),
                    'value' => array_flip(superfood_elated_get_text_transform_array(true)),
                    'save_always' => true,
                    'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                    'group' => esc_html__('Product Info Style', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'display_category',
                    'heading' => esc_html__('Display Category', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false, true)),
                    'group' => esc_html__('Product Info', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'display_excerpt',
                    'heading' => esc_html__('Display Excerpt', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false)),
                    'group' => esc_html__('Product Info', 'superfood')
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'excerpt_length',
                    'heading' => esc_html__('Excerpt Length', 'superfood'),
                    'description' => esc_html__('Number of characters', 'superfood'),
                    'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                    'group' => esc_html__('Product Info Style', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'display_rating',
                    'heading' => esc_html__('Display Rating', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false)),
                    'group' => esc_html__('Product Info', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'display_price',
                    'heading' => esc_html__('Display Price', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false, true)),
                    'group' => esc_html__('Product Info', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'display_button',
                    'heading' => esc_html__('Display Button', 'superfood'),
                    'value' => array_flip(superfood_elated_get_yes_no_select_array(false, true)),
                    'group' => esc_html__('Product Info', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'button_skin',
                    'heading' => esc_html__('Button Skin', 'superfood'),
                    'value' => array(
                        esc_html__('Default', 'superfood') => 'default',
                        esc_html__('Light', 'superfood') => 'light',
                        esc_html__('Dark', 'superfood') => 'dark'
                    ),
                    'dependency' => array('element' => 'display_button', 'value' => array('yes')),
                    'group' => esc_html__('Product Info Style', 'superfood')
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'shader_background_color',
                    'heading' => esc_html__('Shader Background Color', 'superfood'),
                    'group' => esc_html__('Product Info Style', 'superfood')
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type' => 'standard',
            'number_of_posts' => '8',
            'number_of_visible_items' => '4',
            'carousel_autoplay' => 'yes',
            'carousel_autoplay_timeout' => '5000',
            'carousel_loop' => 'yes',
            'carousel_speed' => '650',
            'space_between_items' => 'normal',
            'carousel_navigation' => 'yes',
            'carousel_navigation_skin' => 'default',
            'carousel_pagination' => 'no',
            'carousel_pagination_skin' => 'default',
            'carousel_pagination_pos' => 'bellow-slider',
            'order_by' => 'date',
            'order' => 'ASC',
            'taxonomy_to_display' => 'category',
            'taxonomy_values' => '',
            'image_size' => '',
            'display_title' => 'yes',
            'title_tag' => 'h4',
            'title_transform' => '',
            'display_category' => 'yes',
            'display_excerpt' => 'no',
            'excerpt_length' => '20',
            'display_rating' => 'yes',
            'display_price' => 'yes',
            'display_button' => 'yes',
            'button_skin' => 'default',
            'shader_background_color' => ''
        );

        $params = shortcode_atts($default_atts, $atts);
        extract($params);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['holder_data'] = $this->getProductListCarouselDataAttributes($params);

        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
        $params['title_styles'] = $this->getTitleStyles($params);

        $params['shader_styles'] = $this->getShaderStyles($params);

        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $html = superfood_elated_get_shortcode_module_template_part('templates/product-list-template', 'product-list-carousel', '', $params);

        return $html;
    }

    /**
     * Generates holder classes
     *
     * @param $params
     *
     * @return string
     */
    private function getHolderClasses($params) {
        $holderClasses = '';

        $carouselType = $this->getCarouselTypeClass($params);

        $columnsSpace = $this->getColumnsSpaceClass($params);

        $carouselClasses = $this->getCarouselClasses($params);

        $holderClasses .= ' ' . $carouselType . ' ' . $columnsSpace . ' ' . $carouselClasses;

        return $holderClasses;
    }

    /**
     * Generates carousel type classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getCarouselTypeClass($params) {
        $carouselType = '';
        $type = $params['type'];

        switch ($type) {
            case 'standard':
                $carouselType = 'eltdf-standard-type';
                break;
            case 'simple':
                $carouselType = 'eltdf-simple-type';
                break;
            default:
                $carouselType = 'eltdf-standard-type';
                break;
        }

        return $carouselType;
    }

    /**
     * Generates space between columns classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getColumnsSpaceClass($params) {
        $columnsSpace = '';
        $spaceBetweenItems = $params['space_between_items'];

        switch ($spaceBetweenItems) {
            case 'normal':
                $columnsSpace = 'eltdf-normal-space';
                break;
            case 'small':
                $columnsSpace = 'eltdf-small-space';
                break;
            case 'tiny':
                $columnsSpace = 'eltdf-tiny-space';
                break;
            case 'no':
                $columnsSpace = 'eltdf-no-space';
                break;
            default:
                $columnsSpace = 'eltdf-normal-space';
                break;
        }

        return $columnsSpace;
    }

    /**
     * Generates carousel classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getCarouselClasses($params) {
        $carouselClasses = '';

        if (!empty($params['carousel_navigation_skin'])) {
            $carouselClasses .= ' eltdf-plc-nav-' . $params['carousel_navigation_skin'] . '-skin';
        }

        if (!empty($params['carousel_pagination_pos'])) {
            $carouselClasses .= ' eltdf-plc-pag-' . $params['carousel_pagination_pos'];
        }

        if ($params['carousel_pagination'] === 'yes' && $params['carousel_pagination_pos'] === 'bellow-slider') {
            $carouselClasses .= ' eltdf-plc-pag-enabled';
        }

        if (!empty($params['carousel_pagination_skin'])) {
            $carouselClasses .= ' eltdf-plc-pag-' . $params['carousel_pagination_skin'] . '-skin';
        }

        return $carouselClasses;
    }

    /**
     * Return all data that product list carousel needs
     *
     * @param $params
     * @return array
     */
    private function getProductListCarouselDataAttributes($params) {
        $data = array();

        if (!empty($params['number_of_visible_items']) && $params['type'] !== 'simple') {
            $data['data-number-of-visible-items'] = $params['number_of_visible_items'];
        } else if ($params['type'] === 'simple') {
            $data['data-number-of-visible-items'] = 1;
        }
        if (!empty($params['carousel_autoplay'])) {
            $data['data-autoplay'] = $params['carousel_autoplay'];
        }
        if (!empty($params['carousel_autoplay_timeout'])) {
            $data['data-autoplay-timeout'] = $params['carousel_autoplay_timeout'];
        }
        if (!empty($params['carousel_loop'])) {
            $data['data-loop'] = $params['carousel_loop'];
        }
        if (!empty($params['carousel_speed'])) {
            $data['data-speed'] = $params['carousel_speed'];
        }
        if (!empty($params['carousel_navigation'])) {
            $data['data-navigation'] = $params['carousel_navigation'];
        }
        if (!empty($params['carousel_pagination'])) {
            $data['data-pagination'] = $params['carousel_pagination'];
        }

        return $data;
    }

    /**
     * Generates query array
     *
     * @param $params
     *
     * @return array
     */
    public function generateProductQueryArray($params) {
        $queryArray = array(
            'post_status' => 'publish',
            'post_type' => 'product',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => $params['number_of_posts'],
            'orderby' => $params['order_by'],
            'order' => $params['order'],
            'meta_query' => WC()->query->get_meta_query()
        );

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
    }

    /**
     * Return Style for Title
     *
     * @param $params
     * @return string
     */
    private function getTitleStyles($params) {
        $styles = array();

        if ($params['title_transform'] !== '') {
            $styles[] = 'text-transform: ' . $params['title_transform'];
        }

        return implode(';', $styles);
    }

    /**
     * Return Style for Shader
     *
     * @param $params
     * @return string
     */
    private function getShaderStyles($params) {
        $styles = array();

        if ($params['shader_background_color'] !== '') {
            $styles[] = 'background-color: ' . $params['shader_background_color'];
        }

        return implode(';', $styles);
    }
}