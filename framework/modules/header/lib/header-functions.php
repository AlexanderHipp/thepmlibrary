<?php
use SuperfoodElatedNamespace\Modules\Header\Lib;

if(!function_exists('superfood_elated_set_header_object')) {
    function superfood_elated_set_header_object() {
        $header_type = superfood_elated_get_meta_field_intersect('header_type', superfood_elated_get_page_id());

        $object = Lib\HeaderFactory::getInstance()->build($header_type);

        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\HeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'superfood_elated_set_header_object', 1);
}