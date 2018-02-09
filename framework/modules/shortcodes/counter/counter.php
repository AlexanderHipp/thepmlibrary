<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\Counter;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Counter
 */
class Counter implements ShortcodeInterface
{

    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'eltdf_counter';

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
            'name' => esc_html__('Elated Counter', 'superfood'),
            'base' => $this->getBase(),
            'category' => esc_html__('by ELATED', 'superfood'),
            'icon' => 'icon-wpb-counter extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'param_name' => 'type',
                    'heading' => esc_html__('Type', 'superfood'),
                    'value' => array(
                        esc_html__('Zero Counter', 'superfood') => 'eltdf-zero-counter',
                        esc_html__('Random Counter', 'superfood') => 'eltdf-random-counter'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'digit',
                    'heading' => esc_html__('Digit', 'superfood')
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'digit_font_size',
                    'heading' => esc_html__('Digit Font Size (px)', 'superfood'),
                    'dependency' => array('element' => 'digit', 'not_empty' => true)
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'digit_color',
                    'heading' => esc_html__('Digit Color', 'superfood'),
                    'dependency' => array('element' => 'digit', 'not_empty' => true)
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
                    'value' => array_flip(superfood_elated_get_title_tag(true)),
                    'save_always' => true,
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'title_color',
                    'heading' => esc_html__('Title Color', 'superfood'),
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type' => 'textarea',
                    'param_name' => 'text',
                    'heading' => esc_html__('Text', 'superfood')
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'text_color',
                    'heading' => esc_html__('Text Color', 'superfood'),
                    'dependency' => array('element' => 'text', 'not_empty' => true)
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
            'type' => 'eltdf-zero-counter',
            'digit' => '123',
            'digit_font_size' => '',
            'digit_color' => '',
            'title' => '',
            'title_tag' => 'h3',
            'title_color' => '',
            'text' => '',
            'text_color' => ''
        );

        $params = shortcode_atts($args, $atts);

        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];

        $params['counter_styles'] = $this->getCounterStyles($params);
        $params['counter_title_styles'] = $this->getCounterTitleStyles($params);
        $params['counter_text_styles'] = $this->getCounterTextStyles($params);

        //Get HTML from template
        $html = superfood_elated_get_shortcode_module_template_part('templates/counter', 'counter', '', $params);

        return $html;
    }

    /**
     * Return Counter styles
     *
     * @param $params
     * @return string
     */
    private function getCounterStyles($params) {
        $styles = array();

        if (!empty($params['digit_font_size'])) {
            $styles[] = 'font-size: ' . superfood_elated_filter_px($params['digit_font_size']) . 'px';
        }

        if (!empty($params['digit_color'])) {
            $styles[] = 'color: ' . $params['digit_color'];
        }

        return implode(';', $styles);
    }

    private function getCounterTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_color'])) {
            $styles[] = 'color: ' . $params['title_color'];
        }

        return implode(';', $styles);
    }

    private function getCounterTextStyles($params) {
        $styles = array();

        if (!empty($params['text_color'])) {
            $styles[] = 'color: ' . $params['text_color'];
        }

        return implode(';', $styles);
    }
}