<?php

if(!function_exists('superfood_elated_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function superfood_elated_get_button_html($params) {
        $button_html = superfood_elated_execute_shortcode('eltdf_button', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}