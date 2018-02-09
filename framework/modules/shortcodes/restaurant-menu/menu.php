<?php

namespace SuperfoodElatedNamespace\Modules\Shortcodes\RestaurantMenu;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class RestaurantMenu implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'eltd_restaurant_menu';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Elated Restaurant Menu', 'superfood'),
            'base' => $this->base,
            'icon' => 'icon-wpb-restaurant-menu extended-custom-icon',
            'category' => esc_html__('by ELATED', 'superfood'),
            'as_parent' => array('only' => 'eltd_restaurant_item'),
            'js_view' => 'VcColumnView',
            'params' => array(
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__('Background Color', 'superfood'),
                    'param_name' => 'background_color',
                    'value' => '',
                    'description' => ''
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $args = array(
            'background_color' => '',
        );

        $params = shortcode_atts($args, $atts);

        $restaurant_style = '';
        if ($params['background_color'] !== '') {
            $restaurant_style .= 'background-color: ' . $params['background_color'] . ';';
        }

        $html = '';

        $html .= '<div class="eltdf-restaurant-menu" ' . superfood_elated_get_inline_style($restaurant_style) . '>';
        $html .= '<div class="eltdf-restaurant-menu-holder">';
        $html .= do_shortcode($content);
        $html .= '</div>';
        $html .= '</div>';

        return $html;

    }

}
