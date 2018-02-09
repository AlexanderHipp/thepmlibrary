<?php

if(!function_exists('superfood_elated_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function superfood_elated_get_vc_version() {
		if(superfood_elated_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}