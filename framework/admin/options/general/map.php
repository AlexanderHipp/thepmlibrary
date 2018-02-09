<?php

if ( ! function_exists('superfood_elated_general_options_map') ) {
    /**
     * General options page
     */
    function superfood_elated_general_options_map() {

        superfood_elated_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'superfood'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = superfood_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Google Font Family', 'superfood'),
                'description'   => esc_html__('Choose a default Google font for your site', 'superfood'),
                'parent' => $panel_design_style
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'superfood'),
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = superfood_elated_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'superfood'),
                'description'   => esc_html__('Choose additional Google font for your site', 'superfood'),
                'parent'        => $additional_google_fonts_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'superfood'),
                'description'   => esc_html__('Choose additional Google font for your site', 'superfood'),
                'parent'        => $additional_google_fonts_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'superfood'),
                'description'   => esc_html__('Choose additional Google font for your site', 'superfood'),
                'parent'        => $additional_google_fonts_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'superfood'),
                'description'   => esc_html__('Choose additional Google font for your site', 'superfood'),
                'parent'        => $additional_google_fonts_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'superfood'),
                'description'   => esc_html__('Choose additional Google font for your site', 'superfood'),
                'parent'        => $additional_google_fonts_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Style & Weight', 'superfood'),
                'description' => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'superfood'),
                'parent' => $panel_design_style,
                'options' => array(
                    '100'       => esc_html__('100 Thin', 'superfood'),
                    '100italic' => esc_html__('100 Thin Italic', 'superfood'),
                    '200'       => esc_html__('200 Extra-Light', 'superfood'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'superfood'),
                    '300'       => esc_html__('300 Light', 'superfood'),
                    '300italic' => esc_html__('300 Light Italic', 'superfood'),
                    '400'       => esc_html__('400 Regular', 'superfood'),
                    '400italic' => esc_html__('400 Regular Italic', 'superfood'),
                    '500'       => esc_html__('500 Medium', 'superfood'),
                    '500italic' => esc_html__('500 Medium Italic', 'superfood'),
                    '600'       => esc_html__('600 Semi-Bold', 'superfood'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'superfood'),
                    '700'       => esc_html__('700 Bold', 'superfood'),
                    '700italic' => esc_html__('700 Bold Italic', 'superfood'),
                    '800'       => esc_html__('800 Extra-Bold', 'superfood'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'superfood'),
                    '900'       => esc_html__('900 Ultra-Bold', 'superfood'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'superfood')
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Subset', 'superfood'),
                'description' => esc_html__('Choose a default Google font subsets for your site', 'superfood'),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__('Latin', 'superfood'),
                    'latin-ext' => esc_html__('Latin Extended', 'superfood'),
                    'cyrillic' => esc_html__('Cyrillic', 'superfood'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'superfood'),
                    'greek' => esc_html__('Greek', 'superfood'),
                    'greek-ext' => esc_html__('Greek Extended', 'superfood'),
                    'vietnamese' => esc_html__('Vietnamese', 'superfood')
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'superfood'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #00bbb3', 'superfood'),
                'parent'        => $panel_design_style
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'superfood'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'superfood'),
                'parent'        => $panel_design_style
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'superfood'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'superfood'),
                'parent'        => $panel_design_style
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'superfood'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_boxed_container"
                )
            )
        );

        $boxed_container = superfood_elated_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'superfood'),
                'description'   => esc_html__('Choose the page background color outside box', 'superfood'),
                'parent'        => $boxed_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'superfood'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'superfood'),
                'parent'        => $boxed_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'boxed_pattern_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Pattern', 'superfood'),
                'description'   => esc_html__('Choose an image to be used as background pattern', 'superfood'),
                'parent'        => $boxed_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'superfood'),
                'description'   => esc_html__('Choose background image attachment', 'superfood'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => esc_html__('Fixed', 'superfood'),
                    'scroll'    => esc_html__('Scroll', 'superfood')
                )
            )
        );
        
        superfood_elated_add_admin_field(
            array(
                'name'          => 'paspartu',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Passepartout', 'superfood'),
                'description'   => esc_html__('Enabling this option will display passepartout around site content', 'superfood'),
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_paspartu_container"
                )
            )
        );

        $paspartu_container = superfood_elated_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'paspartu_container',
                'hidden_property'   => 'paspartu',
                'hidden_value'      => 'no'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'paspartu_color',
                'type'          => 'color',
                'label'         => esc_html__('Passepartout Color', 'superfood'),
                'description'   => esc_html__('Choose passepartout color, default value is #ffffff', 'superfood'),
                'parent'        => $paspartu_container
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name' => 'paspartu_width',
                'type' => 'text',
                'label' => esc_html__('Passepartout Size', 'superfood'),
                'description' => esc_html__('Enter size amount for passepartout', 'superfood'),
                'parent' => $paspartu_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => '%'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $paspartu_container,
                'type' => 'yesno',
                'default_value' => 'no',
                'name' => 'disable_top_paspartu',
                'label' => esc_html__('Disable Top Passepartout', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'superfood'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'superfood'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    'grid-1100' => esc_html__('1100px - default', 'superfood'),
                    'grid-1300' => esc_html__('1300px', 'superfood'),
                    'grid-1200' => esc_html__('1200px', 'superfood'),
                    'grid-1000' => esc_html__('1000px', 'superfood'),
                    'grid-800'  => esc_html__('800px', 'superfood')
                )
            )
        );

        $panel_settings = superfood_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'superfood'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links', 'superfood'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_page_transitions_container"
                )
            )
        );

        $page_transitions_container = superfood_elated_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'superfood'),
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = superfood_elated_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'superfood'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'superfood'),
            'parent'        => $page_transitions_container
        ));

        $row_pt_spinner_animation = superfood_elated_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        superfood_elated_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'superfood'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                'rotate_circles' => esc_html__('Rotate Circles', 'superfood'),
                'pulse' => esc_html__('Pulse', 'superfood'),
                'double_pulse' => esc_html__('Double Pulse', 'superfood'),
                'cube' => esc_html__('Cube', 'superfood'),
                'rotating_cubes' => esc_html__('Rotating Cubes', 'superfood'),
                'stripes' => esc_html__('Stripes', 'superfood'),
                'wave' => esc_html__('Wave', 'superfood'),
                'two_rotating_circles' => esc_html__('2 Rotating Circles', 'superfood'),
                'four_rotating_circles' => esc_html__('4 Rotating Circles', 'superfood'),
                'five_rotating_circles' => esc_html__('5 Rotating Circles', 'superfood'),
                'atom' => esc_html__('Atom', 'superfood'),
                'clock' => esc_html__('Clock', 'superfood'),
                'mitosis' => esc_html__('Mitosis', 'superfood'),
                'lines' => esc_html__('Lines', 'superfood'),
                'fussion' => esc_html__('Fussion', 'superfood'),
                'wave_circles' => esc_html__('Wave Circles', 'superfood'),
                'pulse_circles' => esc_html__('Pulse Circles', 'superfood')
            )
        ));

        superfood_elated_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'superfood'),
            'parent'        => $row_pt_spinner_animation
        ));

        superfood_elated_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'superfood'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'superfood'),
                'parent'        => $panel_settings
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'superfood'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'superfood'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = superfood_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'superfood'),
                'description'   => esc_html__('Enter your custom CSS here', 'superfood'),
                'parent'        => $panel_custom_code
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'superfood'),
                'description'   => esc_html__('Enter your custom Javascript here', 'superfood'),
                'parent'        => $panel_custom_code
            )
        );
	
	    $panel_google_api = superfood_elated_add_admin_panel(
		    array(
			    'page'  => '',
			    'name'  => 'panel_google_api',
			    'title' => esc_html__('Google API', 'superfood')
		    )
	    );
	
	    superfood_elated_add_admin_field(
		    array(
			    'name'        => 'google_maps_api_key',
			    'type'        => 'text',
			    'label'       => esc_html__('Google Maps Api Key', 'superfood'),
			    'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation. Temporarily you can use "AIzaSyAidINa74sv7bt7Y3vqjKjM7m0PgJN1bhk".', 'superfood'),
			    'parent'      => $panel_google_api
		    )
	    );
    }

    add_action( 'superfood_elated_options_map', 'superfood_elated_general_options_map', 1);
}