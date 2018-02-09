<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\ProgressBar;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'eltdf_progress_bar';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Elated Progress Bar', 'superfood'),
            'base' => $this->base,
            'icon' => 'icon-wpb-progress-bar extended-custom-icon',
            'category' => esc_html__('by ELATED', 'superfood'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'param_name' => 'percent',
                    'heading' => esc_html__('Percentage', 'superfood')
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'title',
                    'heading' => esc_html__('Title', 'superfood')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'title_tag',
                    'heading' => esc_html__('Title Tag', 'superfood'),
                    'value' => array_flip(superfood_elated_get_title_tag(true, array('p' => 'p', 'span' => 'span'))),
                    'save_always' => true,
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'color_active',
                    'heading' => esc_html__('Active Color', 'superfood')
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'color_inactive',
                    'heading' => esc_html__('Inactive Color', 'superfood')
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $args = array(
            'percent' => '100',
            'title' => '',
            'title_tag' => 'span',
            'color_active' => '',
            'color_inactive' => ''
        );
        $params = shortcode_atts($args, $atts);

        //Extract params for use in method
        extract($params);

        $params['active_bar_style'] = $this->getActiveColor($params);
        $params['inactive_bar_style'] = $this->getInactiveColor($params);
        $params['title_tag'] = !empty($title_tag) ? $title_tag : $args['title_tag'];

        //init variables
        $html = superfood_elated_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);

        return $html;
    }

    /**
     * Return active color for active bar
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveColor($params) {
        $styles = array();

        if (!empty($params['color_active'])) {
            $styles[] = 'background-color: ' . $params['color_active'];
        }

        return $styles;
    }

    /**
     * Return active color for inactive bar
     *
     * @param $params
     *
     * @return array
     */
    private function getInactiveColor($params) {
        $styles = array();

        if (!empty($params['color_inactive'])) {
            $styles[] = 'background-color: ' . $params['color_inactive'];
        }

        return $styles;
    }
}