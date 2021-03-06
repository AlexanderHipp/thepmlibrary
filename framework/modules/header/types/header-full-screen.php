<?php
namespace SuperfoodElatedNamespace\Modules\Header\Types;

use SuperfoodElatedNamespace\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Simple layout and option
 *
 * Class HeaderFullScreen
 */
class HeaderFullScreen extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-full-screen';

        if(!is_admin()) {

            $menuAreaHeight       = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('menu_area_height_header_full_screen'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? intval($menuAreaHeight) : 80;

            $mobileHeaderHeight       = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? intval($mobileHeaderHeight) : 80;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('superfood_elated_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('superfood_elated_per_page_js_vars', array($this, 'getPerPageJSVariables'));
        }
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {

        $parameters = apply_filters('superfood_elated_header_fullscreen_parameters', $parameters);

        superfood_elated_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = superfood_elated_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'eltdf_menu_area_background_transparency_header_full_screen_meta', true) !== '1' && get_post_meta($id, 'eltdf_menu_area_background_transparency_header_full_screen_meta', true) !== ''){
            $menuAreaTransparent = true;
        } else if (superfood_elated_options()->getOptionValue('menu_area_background_transparency_header_full_screen') !== '1' && superfood_elated_options()->getOptionValue('menu_area_background_transparency_header_full_screen') !== '') {
            $menuAreaTransparent = true;
        } else if (is_404() && superfood_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '1' && superfood_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '') {
	        $menuAreaTransparent = true;
        } else {
            $menuAreaTransparent = false;
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;

            if(superfood_elated_is_top_bar_enabled() || superfood_elated_is_top_bar_enabled() && superfood_elated_is_top_bar_transparent()) {
                $transparencyHeight += superfood_elated_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id = superfood_elated_get_page_id();
        $transparencyHeight = 0;

        $menuAreaTransparent = superfood_elated_options()->getOptionValue('fixed_header_transparency') === '0';

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if(superfood_elated_is_top_bar_enabled()) {
            $headerHeight += superfood_elated_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['eltdfLogoAreaHeight'] = 0;
        $globalVariables['eltdfMenuAreaHeight'] = $this->headerHeight;
        $globalVariables['eltdfMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        $perPageVars['eltdfHeaderTransparencyHeight'] = 0;

        return $perPageVars;
    }
}