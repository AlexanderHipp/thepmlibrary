<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\Button;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Button that represents button shortcode
 * @package SuperfoodElatedNamespace\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'eltdf_button';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Elated Button', 'superfood'),
            'base'                      => $this->base,
            'admin_enqueue_css' => array(superfood_elated_get_skin_uri().'/assets/css/eltdf-vc-extend.css'),
            'category'                  => esc_html__('by ELATED', 'superfood'),
            'icon'                      => 'icon-wpb-button extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'custom_class',
                        'heading'     => esc_html__('Custom CSS Class', 'superfood')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'type',
                        'heading'     => esc_html__('Type', 'superfood'),
                        'value'       => array(
						    esc_html__('Solid', 'superfood')   => 'solid',
						    esc_html__('Outline', 'superfood') => 'outline',
						    esc_html__('Simple', 'superfood')  => 'simple'
                        ),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'size',
                        'heading'     => esc_html__('Size', 'superfood'),
                        'value'       => array(
						    esc_html__('Default', 'superfood') => '',
						    esc_html__('Small', 'superfood')   => 'small',
						    esc_html__('Medium', 'superfood')  => 'medium',
						    esc_html__('Large', 'superfood')   => 'large',
						    esc_html__('Huge', 'superfood')    => 'huge'
                        ),
                        'save_always' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid', 'outline'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'text',
                        'heading'     => esc_html__('Text', 'superfood'),
                        'value'       => esc_html__('Button Text', 'superfood'),
                        'admin_label' => true,
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'link',
                        'heading'     => esc_html__('Link', 'superfood')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'target',
                        'heading'     => esc_html__('Link Target', 'superfood'),
                        'value'       => array(
						    esc_html__('Same Window', 'superfood')  => '_self',
						    esc_html__('New Window', 'superfood') => '_blank'
                        )
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'button_animation',
                        'heading'     => esc_html__('Button Animation', 'superfood'),
                        'value'       => array(
                            esc_html__('Yes', 'superfood')  => 'yes',
                            esc_html__('No', 'superfood')   => ''
                        ),
                        'dependency'  => array('element' => 'icon_pack', 'value' => array(''))
                    ),
                ),

                superfood_elated_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'color',
                        'heading'     => esc_html__('Color', 'superfood'),
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'hover_color',
                        'heading'     => esc_html__('Hover Color', 'superfood'),
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'background_color',
                        'heading'     => esc_html__('Background Color', 'superfood'),
                        'dependency'  => array('element' => 'type', 'value' => array('solid')),
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'hover_background_color',
                        'heading'     => esc_html__('Hover Background Color', 'superfood'),
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'border_color',
                        'heading'     => esc_html__('Border Color', 'superfood'),
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'param_name'  => 'hover_border_color',
                        'heading'     => esc_html__('Hover Border Color', 'superfood'),
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'font_size',
                        'heading'     => esc_html__('Font Size (px)', 'superfood'),
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'font_weight',
                        'heading'     => esc_html__('Font Weight', 'superfood'),
                        'value'       => array_flip(superfood_elated_get_font_weight_array(true)),
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'text_transform',
                        'heading'     => esc_html__('Text Transform', 'superfood'),
                        'value'       => array_flip(superfood_elated_get_text_transform_array(true)),
                        'save_always' => true,
                        'group'       => esc_html__('Design Options', 'superfood')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'margin',
                        'heading'     => esc_html__('Margin', 'superfood'),
                        'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'superfood'),
                        'group'       => esc_html__('Design Options', 'superfood')
                    )
                )
            )
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'type'                   => 'solid',
            'text'                   => '',
            'link'                   => '',
            'target'                 => '_self',
            'button_animation'       => 'yes',
            'color'                  => '',
            'hover_color'            => '',
            'background_color'       => '',
            'hover_background_color' => '',
            'border_color'           => '',
            'hover_border_color'     => '',
            'font_size'              => '',
            'font_weight'            => '',
            'text_transform'         => '',
            'margin'                 => '',
            'custom_class'           => '',
            'html_type'              => 'anchor',
            'input_name'             => '',
            'custom_attrs'           => array()
        );

        $default_atts = array_merge($default_atts, superfood_elated_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
            $iconPackName   = superfood_elated_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']      = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);

        return superfood_elated_get_shortcode_module_template_part('templates/'.$params['html_type'], 'button', '', $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color']) && $params['type'] !== 'outline') {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.superfood_elated_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight']) && $params['font_weight'] !== '') {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['text_transform']) && $params['text_transform'] !== '') {
            $styles[] = 'text-transform: '.$params['text_transform'];
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'eltdf-btn',
            'eltdf-btn-'.$params['size'],
            'eltdf-btn-'.$params['type'],
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'eltdf-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'eltdf-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'eltdf-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'eltdf-btn-icon';
        }

        else if(!empty($params['button_animation'])) {
            $buttonClasses[] = 'eltdf-btn-animation';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = esc_attr($params['custom_class']);
        }

        return $buttonClasses;
    }
}