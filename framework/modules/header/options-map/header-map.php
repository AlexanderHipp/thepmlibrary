<?php

if (!function_exists('superfood_elated_header_options_map')) {

    function superfood_elated_header_options_map() {

        superfood_elated_add_admin_page(
            array(
                'slug' => '_header_page',
                'title' => esc_html__('Header', 'superfood'),
                'icon' => 'fa fa-header'
            )
        );

        $panel_header = superfood_elated_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header',
                'title' => esc_html__('Header', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'radiogroup',
                'name' => 'header_type',
                'default_value' => 'header-standard',
                'label' => esc_html__('Choose Header Type', 'superfood'),
                'description' => esc_html__('Select the type of header you would like to use', 'superfood'),
                'options' => array(
                    'header-standard' => array(
                        'image' => ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/img/header-standard.png'
                    ),
                    'header-full-screen' => array(
                        'image' => ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/img/header-full-screen.png'
                    ),
                    'header-vertical' => array(
                        'image' => ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/img/header-vertical.png'
                    ),
                    'header-divided' => array(
                        'image' => ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/img/header-divided.png',
                        'label' => esc_html__('Divided', 'superfood')
                    ),
                ),
                'args' => array(
                    'use_images' => true,
                    'hide_labels' => true,
                    'dependence' => true,
                    'show' => array(
                        'header-standard' => '#eltdf_panel_header_standard,#eltdf_header_behaviour,#eltdf_panel_fixed_header,#eltdf_panel_sticky_header,#eltdf_panel_main_menu',
                        'header-full-screen' => '#eltdf_panel_header_full_screen',
                        'header-vertical' => '#eltdf_panel_header_vertical,#eltdf_panel_vertical_main_menu',
                        'header-divided' => '#eltdf_panel_header_divided,#eltdf_header_behaviour,#eltdf_panel_fixed_header,#eltdf_panel_sticky_header,#eltdf_panel_main_menu',

                    ),
                    'hide' => array(
                        'header-standard' => '#eltdf_panel_header_full_screen,#eltdf_panel_header_vertical,#eltdf_panel_vertical_main_menu,#eltdf_panel_header_divided',
                        'header-full-screen' => '#eltdf_panel_header_standard,#eltdf_panel_header_vertical,#eltdf_panel_vertical_main_menu,#eltdf_panel_main_menu,#eltdf_header_behaviour,#eltdf_panel_fixed_header,#eltdf_panel_sticky_header',
                        'header-vertical' => '#eltdf_panel_header_standard,#eltdf_panel_header_full_screen,#eltdf_header_behaviour,#eltdf_panel_fixed_header,#eltdf_panel_sticky_header,#eltdf_panel_main_menu',
                        'header-divided' => '#eltdf_panel_header_standard,#eltdf_panel_header_full_screen,#eltdf_panel_header_vertical,#eltdf_panel_vertical_main_menu',
                    )
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'select',
                'name' => 'header_behaviour',
                'default_value' => 'fixed-on-scroll',
                'label' => esc_html__('Choose Header Behaviour', 'superfood'),
                'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'superfood'),
                'options' => array(
                    'sticky-header-on-scroll-up' => esc_html__('Sticky on scroll up', 'superfood'),
                    'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scroll up/down', 'superfood'),
                    'fixed-on-scroll' => esc_html__('Fixed on scroll', 'superfood')
                ),
                'args' => array(
                    'dependence' => true,
                    'show' => array(
                        'sticky-header-on-scroll-up' => '#eltdf_panel_sticky_header',
                        'sticky-header-on-scroll-down-up' => '#eltdf_panel_sticky_header',
                        'fixed-on-scroll' => '#eltdf_panel_fixed_header'
                    ),
                    'hide' => array(
                        'sticky-header-on-scroll-up' => '#eltdf_panel_fixed_header',
                        'sticky-header-on-scroll-down-up' => '#eltdf_panel_fixed_header',
                        'fixed-on-scroll' => '#eltdf_panel_sticky_header'
                    )
                ),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-full-screen',
                    'header-vertical'
                )
            )
        );

        /***************** Top Header Layout **********************/

        superfood_elated_add_admin_field(
            array(
                'name' => 'top_bar',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Top Bar', 'superfood'),
                'description' => esc_html__('Enabling this option will show top bar area', 'superfood'),
                'parent' => $panel_header,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltdf_top_bar_container"
                )
            )
        );

        $top_bar_container = superfood_elated_add_admin_container(array(
            'name' => 'top_bar_container',
            'parent' => $panel_header,
            'hidden_property' => 'top_bar',
            'hidden_value' => 'no'
        ));

        superfood_elated_add_admin_field(
            array(
                'name' => 'top_bar_in_grid',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Top Bar in Grid', 'superfood'),
                'description' => esc_html__('Set top bar content to be in grid', 'superfood'),
                'parent' => $top_bar_container
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'top_bar_background_color',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'superfood'),
            'description' => esc_html__('Choose a background color for header area', 'superfood'),
            'parent' => $top_bar_container
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'top_bar_background_transparency',
            'type' => 'text',
            'label' => esc_html__('Background Transparency', 'superfood'),
            'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
            'parent' => $top_bar_container,
            'args' => array('col_width' => 3)
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'top_bar_height',
            'type' => 'text',
            'label' => esc_html__('Top Bar Height', 'superfood'),
            'description' => esc_html__('Enter top bar height (Default is 30px)', 'superfood'),
            'parent' => $top_bar_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        /***************** Top Header Layout **********************/

        /***************** Header Skin Options ********************/

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header,
                'type' => 'select',
                'name' => 'header_style',
                'default_value' => '',
                'label' => esc_html__('Header Skin', 'superfood'),
                'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'superfood'),
                'options' => array(
                    '' => esc_html__('Default', 'superfood'),
                    'light-header' => esc_html__('Light', 'superfood'),
                    'dark-header' => esc_html__('Dark', 'superfood')
                )
            )
        );

        /***************** Header Skin Options ********************/

        /***************** Standard Header Layout *****************/

        $panel_header_standard = superfood_elated_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_standard',
                'title' => esc_html__('Header Standard', 'superfood'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-full-screen',
                    'header-vertical',
                    'header-divided',
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'yesno',
                'name' => 'enable_grid_layout_header',
                'default_value' => 'no',
                'label' => esc_html__('Enable Grid Layout', 'superfood'),
                'description' => esc_html__('Enabling this option you will set standard header area to be in grid and menu will be on the right side', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'select',
                'name' => 'set_menu_area_position',
                'default_value' => 'center',
                'label' => esc_html__('Choose Menu Area Position', 'superfood'),
                'description' => esc_html__('Select menu area position in your header', 'superfood'),
                'options' => array(
                    'center' => esc_html__('Center', 'superfood'),
                    'right' => esc_html__('Right', 'superfood')
                )
            )
        );

        superfood_elated_add_admin_section_title(
            array(
                'parent' => $panel_header_standard,
                'name' => 'menu_area_title',
                'title' => esc_html__('Menu Area', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'color',
                'name' => 'menu_area_background_color_header_standard',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'superfood'),
                'description' => esc_html__('Choose a background color for header area', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'text',
                'name' => 'menu_area_background_transparency_header_standard',
                'default_value' => '',
                'label' => esc_html__('Background Transparency', 'superfood'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'color',
                'name' => 'menu_area_border_color_header_standard',
                'default_value' => '',
                'label' => esc_html__('Border Color', 'superfood'),
                'description' => esc_html__('Set border color for header', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'text',
                'name' => 'menu_area_height_header_standard',
                'default_value' => '',
                'label' => esc_html__('Height', 'superfood'),
                'description' => esc_html__('Enter Header Height (default is 80px)', 'superfood'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        /***************** Standard Header Layout *****************/

        /***************** Divided Header Layout *******************/

        $panel_header_divided = superfood_elated_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_divided',
                'title' => esc_html__('Header Divided', 'superfood'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
                    'header-full-screen',
                    'header-vertical',
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_divided,
                'type' => 'yesno',
                'name' => 'menu_area_in_grid_header_divided',
                'default_value' => 'no',
                'label' => esc_html__('Enable Grid Layout', 'superfood'),
                'description' => esc_html__('Enabling this option you will set divided header area to be in grid', 'superfood'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#eltdf_menu_area_in_grid_header_divided_container'
                )
            )
        );

        $menu_area_in_grid_header_divided_container = superfood_elated_add_admin_container(
            array(
                'parent' => $panel_header_divided,
                'name' => 'menu_area_in_grid_header_divided_container',
                'hidden_property' => 'menu_area_in_grid_header_divided',
                'hidden_value' => 'no'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_divided,
                'type' => 'color',
                'name' => 'menu_area_background_color_header_divided',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'superfood'),
                'description' => esc_html__('Set background color for header', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_divided,
                'type' => 'text',
                'name' => 'menu_area_background_transparency_header_divided',
                'default_value' => '',
                'label' => esc_html__('Background Transparency', 'superfood'),
                'description' => esc_html__('Set background transparency for header', 'superfood'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_divided,
                'type' => 'color',
                'name' => 'menu_area_border_bottom_color_header_divided',
                'default_value' => '',
                'label' => esc_html__('Border Color', 'superfood'),
                'description' => esc_html__('Set border color for menu area', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_divided,
                'type' => 'text',
                'name' => 'menu_area_height_header_divided',
                'default_value' => '',
                'label' => esc_html__('Height', 'superfood'),
                'description' => esc_html__('Enter Header Height (default is 100px)', 'superfood'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        /***************** Divided Header Layout - end *******************/

        /***************** Full Screen Header Layout *******************/

        $panel_header_full_screen = superfood_elated_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_full_screen',
                'title' => esc_html__('Header Full Screen', 'superfood'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
                    'header-vertical',
                    'header-divided',
                )
            )
        );

        superfood_elated_add_admin_section_title(
            array(
                'parent' => $panel_header_full_screen,
                'name' => 'header_full_screen_title',
                'title' => esc_html__('Header Full Screen', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'yesno',
                'name' => 'enable_grid_layout_header_full_screen',
                'default_value' => 'yes',
                'label' => esc_html__('Enable Grid Layout', 'superfood'),
                'description' => esc_html__('Enabling this option you will set full screen header area to be in grid', 'superfood'),
            )
        );

        superfood_elated_add_admin_section_title(
            array(
                'parent' => $panel_header_full_screen,
                'name' => 'menu_area_title',
                'title' => esc_html__('Menu Area', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'color',
                'name' => 'menu_area_background_color_header_full_screen',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'superfood'),
                'description' => esc_html__('Choose a background color for header area', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'text',
                'name' => 'menu_area_background_transparency_header_full_screen',
                'default_value' => '',
                'label' => esc_html__('Background Transparency', 'superfood'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'color',
                'name' => 'menu_area_border_color_header_full_screen',
                'default_value' => '',
                'label' => esc_html__('Border Color', 'superfood'),
                'description' => esc_html__('Set border color for header', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'text',
                'name' => 'menu_area_height_header_full_screen',
                'default_value' => '',
                'label' => esc_html__('Height', 'superfood'),
                'description' => esc_html__('Enter Header Height (default is 80px)', 'superfood'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        /***************** Full Screen Header Layout *******************/

        /***************** Vertical Header Layout *****************/

        $panel_header_vertical = superfood_elated_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical', 'superfood'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
                    'header-full-screen',
                    'header-divided',
                )
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'vertical_header_background_color',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'superfood'),
            'description' => esc_html__('Choose a background color for header area', 'superfood'),
            'parent' => $panel_header_vertical
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'vertical_header_transparency',
            'type' => 'text',
            'label' => esc_html__('Background Transparency', 'superfood'),
            'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
            'parent' => $panel_header_vertical,
            'args' => array(
                'col_width' => 1
            )
        ));

        superfood_elated_add_admin_field(
            array(
                'name' => 'vertical_header_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'superfood'),
                'description' => esc_html__('Set background image for vertical menu', 'superfood'),
                'parent' => $panel_header_vertical
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name' => 'vertical_header_text_align',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Choose Text Alignment', 'superfood'),
                'description' => esc_html__('Choose text alignment for Vertical Header elements (logo, menu and widgets)', 'superfood'),
                'parent' => $panel_header_vertical,
                'options' => array(
                    '' => esc_html__('Default', 'superfood'),
                    'left' => esc_html__('Left', 'superfood'),
                    'center' => esc_html__('Center', 'superfood')
                )
            )
        );

        /***************** Vertical Header Layout *****************/

        /***************** Sticky Header Layout *******************/

        $panel_sticky_header = superfood_elated_add_admin_panel(
            array(
                'title' => esc_html__('Sticky Header', 'superfood'),
                'name' => 'panel_sticky_header',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-full-screen',
                    'header-vertical',
                    'header-divided',
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name' => 'scroll_amount_for_sticky',
                'type' => 'text',
                'label' => esc_html__('Scroll Amount for Sticky', 'superfood'),
                'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height). This value can be overriden on a page level basis', 'superfood'),
                'parent' => $panel_sticky_header,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'name' => 'sticky_header_in_grid',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Sticky Header in Grid', 'superfood'),
                'description' => esc_html__('Enabling this option will put sticky header in grid', 'superfood'),
                'parent' => $panel_sticky_header,
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'sticky_header_background_color',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'superfood'),
            'description' => esc_html__('Choose a background color for header area', 'superfood'),
            'parent' => $panel_sticky_header
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'sticky_header_transparency',
            'type' => 'text',
            'label' => esc_html__('Background Transparency', 'superfood'),
            'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
            'parent' => $panel_sticky_header,
            'args' => array(
                'col_width' => 1
            )
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'sticky_header_border_color',
            'type' => 'color',
            'label' => esc_html__('Border Color', 'superfood'),
            'description' => esc_html__('Set border bottom color for header area', 'superfood'),
            'parent' => $panel_sticky_header
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'sticky_header_height',
            'type' => 'text',
            'label' => esc_html__('Sticky Header Height', 'superfood'),
            'description' => esc_html__('Enter height for sticky header (default is 60px)', 'superfood'),
            'parent' => $panel_sticky_header,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        $group_sticky_header_menu = superfood_elated_add_admin_group(array(
            'title' => esc_html__('Sticky Header Menu', 'superfood'),
            'name' => 'group_sticky_header_menu',
            'parent' => $panel_sticky_header,
            'description' => esc_html__('Define styles for sticky menu items', 'superfood')
        ));

        $row1_sticky_header_menu = superfood_elated_add_admin_row(array(
            'name' => 'row1',
            'parent' => $group_sticky_header_menu
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'sticky_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Text Color', 'superfood'),
            'description' => '',
            'parent' => $row1_sticky_header_menu
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'sticky_hovercolor',
            'type' => 'colorsimple',
            'label' => esc_html__(esc_html__('Hover/Active Color', 'superfood'), 'superfood'),
            'description' => '',
            'parent' => $row1_sticky_header_menu
        ));

        $row2_sticky_header_menu = superfood_elated_add_admin_row(array(
            'name' => 'row2',
            'parent' => $group_sticky_header_menu
        ));

        superfood_elated_add_admin_field(
            array(
                'name' => 'sticky_google_fonts',
                'type' => 'fontsimple',
                'label' => esc_html__('Font Family', 'superfood'),
                'default_value' => '-1',
                'parent' => $row2_sticky_header_menu,
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'sticky_fontsize',
                'label' => esc_html__('Font Size', 'superfood'),
                'default_value' => '',
                'parent' => $row2_sticky_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'sticky_lineheight',
                'label' => esc_html__('Line Height', 'superfood'),
                'default_value' => '',
                'parent' => $row2_sticky_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'sticky_texttransform',
                'label' => esc_html__('Text Transform', 'superfood'),
                'default_value' => '',
                'options' => superfood_elated_get_text_transform_array(),
                'parent' => $row2_sticky_header_menu
            )
        );

        $row3_sticky_header_menu = superfood_elated_add_admin_row(array(
            'name' => 'row3',
            'parent' => $group_sticky_header_menu
        ));

        superfood_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'sticky_fontstyle',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'superfood'),
                'options' => superfood_elated_get_font_style_array(),
                'parent' => $row3_sticky_header_menu
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'sticky_fontweight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'superfood'),
                'options' => superfood_elated_get_font_weight_array(),
                'parent' => $row3_sticky_header_menu
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'sticky_letterspacing',
                'label' => esc_html__('Letter Spacing', 'superfood'),
                'default_value' => '',
                'parent' => $row3_sticky_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        /***************** Sticky Header Layout *******************/

        /***************** Fixed Header Layout ********************/

        $panel_fixed_header = superfood_elated_add_admin_panel(
            array(
                'title' => esc_html__('Fixed Header', 'superfood'),
                'name' => 'panel_fixed_header',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-full-screen',
                    'header-vertical',
                    'header-divided',
                )
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'fixed_header_background_color',
            'type' => 'color',
            'default_value' => '',
            'label' => esc_html__('Background Color', 'superfood'),
            'description' => esc_html__('Choose a background color for header area', 'superfood'),
            'parent' => $panel_fixed_header
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'fixed_header_transparency',
            'type' => 'text',
            'label' => esc_html__('Background Transparency', 'superfood'),
            'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
            'parent' => $panel_fixed_header,
            'args' => array(
                'col_width' => 1
            )
        ));

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_fixed_header,
                'type' => 'color',
                'name' => 'fixed_header_border_bottom_color',
                'default_value' => '',
                'label' => esc_html__('Border Color', 'superfood'),
                'description' => esc_html__('Set border bottom color for header area', 'superfood'),
            )
        );

        $group_fixed_header_menu = superfood_elated_add_admin_group(array(
            'title' => esc_html__('Fixed Header Menu', 'superfood'),
            'name' => 'group_fixed_header_menu',
            'parent' => $panel_fixed_header,
            'description' => esc_html__('Define styles for fixed menu items', 'superfood')
        ));

        $row1_fixed_header_menu = superfood_elated_add_admin_row(array(
            'name' => 'row1',
            'parent' => $group_fixed_header_menu
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'fixed_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Text Color', 'superfood'),
            'description' => '',
            'parent' => $row1_fixed_header_menu
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'fixed_hovercolor',
            'type' => 'colorsimple',
            'label' => esc_html__(esc_html__('Hover/Active Color', 'superfood'), 'superfood'),
            'description' => '',
            'parent' => $row1_fixed_header_menu
        ));

        $row2_fixed_header_menu = superfood_elated_add_admin_row(array(
            'name' => 'row2',
            'parent' => $group_fixed_header_menu
        ));

        superfood_elated_add_admin_field(
            array(
                'name' => 'fixed_google_fonts',
                'type' => 'fontsimple',
                'label' => esc_html__('Font Family', 'superfood'),
                'default_value' => '-1',
                'parent' => $row2_fixed_header_menu,
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'fixed_fontsize',
                'label' => esc_html__('Font Size', 'superfood'),
                'default_value' => '',
                'parent' => $row2_fixed_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'fixed_lineheight',
                'label' => esc_html__('Line Height', 'superfood'),
                'default_value' => '',
                'parent' => $row2_fixed_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'fixed_texttransform',
                'label' => esc_html__('Text Transform', 'superfood'),
                'default_value' => '',
                'options' => superfood_elated_get_text_transform_array(),
                'parent' => $row2_fixed_header_menu
            )
        );

        $row3_fixed_header_menu = superfood_elated_add_admin_row(array(
            'name' => 'row3',
            'parent' => $group_fixed_header_menu
        ));

        superfood_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'fixed_fontstyle',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'superfood'),
                'options' => superfood_elated_get_font_style_array(),
                'parent' => $row3_fixed_header_menu
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'selectblanksimple',
                'name' => 'fixed_fontweight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'superfood'),
                'options' => superfood_elated_get_font_weight_array(),
                'parent' => $row3_fixed_header_menu
            )
        );

        superfood_elated_add_admin_field(
            array(
                'type' => 'textsimple',
                'name' => 'fixed_letterspacing',
                'label' => esc_html__('Letter Spacing', 'superfood'),
                'default_value' => '',
                'parent' => $row3_fixed_header_menu,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        /***************** Fixed Header Layout ********************/

        /******************* Main Menu Layout *********************/

        $panel_main_menu = superfood_elated_add_admin_panel(
            array(
                'title' => esc_html__('Main Menu', 'superfood'),
                'name' => 'panel_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
                    'header-full-screen',
                    'header-vertical',
                    'header-divided',
                )
            )
        );

        superfood_elated_add_admin_section_title(
            array(
                'parent' => $panel_main_menu,
                'name' => 'main_menu_area_title',
                'title' => esc_html__('Main Menu General Settings', 'superfood')
            )
        );

        $drop_down_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_main_menu,
                'name' => 'drop_down_group',
                'title' => esc_html__('Main Dropdown Menu', 'superfood'),
                'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'superfood')
            )
        );

        $drop_down_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'drop_down_row1',
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $drop_down_row1,
                'type' => 'textsimple',
                'name' => 'dropdown_background_transparency',
                'default_value' => '',
                'label' => esc_html__('Background Transparency', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_main_menu,
                'type' => 'select',
                'name' => 'menu_dropdown_appearance',
                'default_value' => 'dropdown-animate-height',
                'label' => esc_html__('Main Dropdown Menu Appearance', 'superfood'),
                'description' => esc_html__('Choose appearance for dropdown menu', 'superfood'),
                'options' => array(
                    'dropdown-default' => esc_html__('Default', 'superfood'),
                    'dropdown-animate-height' => esc_html__('Animate Height', 'superfood'),
                    'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'superfood'),
                    'dropdown-slide-from-top' => esc_html__('Slide From Top', 'superfood'),
                    'dropdown-slide-from-left' => esc_html__('Slide From Left', 'superfood')
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_main_menu,
                'type' => 'text',
                'name' => 'dropdown_top_position',
                'default_value' => '',
                'label' => esc_html__('Dropdown Position', 'superfood'),
                'description' => esc_html__('Enter value in percentage of entire header height', 'superfood'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => '%'
                )
            )
        );

        $first_level_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_main_menu,
                'name' => 'first_level_group',
                'title' => esc_html__('1st Level Menu', 'superfood'),
                'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'superfood')
            )
        );

        $first_level_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row1'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row1,
                'type' => 'colorsimple',
                'name' => 'menu_color',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row1,
                'type' => 'colorsimple',
                'name' => 'menu_hovercolor',
                'default_value' => '',
                'label' => esc_html__('Hover Text Color', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row1,
                'type' => 'colorsimple',
                'name' => 'menu_activecolor',
                'default_value' => '',
                'label' => esc_html__('Active Text Color', 'superfood'),
            )
        );

        $first_level_row3 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row3',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row3,
                'type' => 'colorsimple',
                'name' => 'menu_light_hovercolor',
                'default_value' => '',
                'label' => esc_html__('Light Menu Hover Text Color', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row3,
                'type' => 'colorsimple',
                'name' => 'menu_light_activecolor',
                'default_value' => '',
                'label' => esc_html__('Light Menu Active Text Color', 'superfood'),
            )
        );

        $first_level_row4 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row4',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row4,
                'type' => 'colorsimple',
                'name' => 'menu_dark_hovercolor',
                'default_value' => '',
                'label' => esc_html__('Dark Menu Hover Text Color', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row4,
                'type' => 'colorsimple',
                'name' => 'menu_dark_activecolor',
                'default_value' => '',
                'label' => esc_html__('Dark Menu Active Text Color', 'superfood'),
            )
        );

        $first_level_row5 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row5',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row5,
                'type' => 'fontsimple',
                'name' => 'menu_google_fonts',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'superfood'),
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row5,
                'type' => 'textsimple',
                'name' => 'menu_fontsize',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row5,
                'type' => 'textsimple',
                'name' => 'menu_lineheight',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $first_level_row6 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row6',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row6,
                'type' => 'selectblanksimple',
                'name' => 'menu_fontstyle',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'superfood'),
                'options' => superfood_elated_get_font_style_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row6,
                'type' => 'selectblanksimple',
                'name' => 'menu_fontweight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'superfood'),
                'options' => superfood_elated_get_font_weight_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row6,
                'type' => 'textsimple',
                'name' => 'menu_letterspacing',
                'default_value' => '',
                'label' => esc_html__('Letter Spacing', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row6,
                'type' => 'selectblanksimple',
                'name' => 'menu_texttransform',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'superfood'),
                'options' => superfood_elated_get_text_transform_array()
            )
        );

        $first_level_row7 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row7',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row7,
                'type' => 'textsimple',
                'name' => 'menu_padding_left_right',
                'default_value' => '',
                'label' => esc_html__('Padding Left/Right', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $first_level_row7,
                'type' => 'textsimple',
                'name' => 'menu_margin_left_right',
                'default_value' => '',
                'label' => esc_html__('Margin Left/Right', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_main_menu,
                'name' => 'second_level_group',
                'title' => esc_html__('2nd Level Menu', 'superfood'),
                'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'superfood')
            )
        );

        $second_level_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name' => 'second_level_row1'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_color',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_hovercolor',
                'default_value' => '',
                'label' => esc_html__('Hover/Active Color', 'superfood')
            )
        );

        $second_level_row2 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name' => 'second_level_row2',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row2,
                'type' => 'fontsimple',
                'name' => 'dropdown_google_fonts',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_fontsize',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_lineheight',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_row3 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name' => 'second_level_row3',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_fontstyle',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'superfood'),
                'options' => superfood_elated_get_font_style_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_fontweight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'superfood'),
                'options' => superfood_elated_get_font_weight_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row3,
                'type' => 'textsimple',
                'name' => 'dropdown_letterspacing',
                'default_value' => '',
                'label' => esc_html__('Letter Spacing', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_texttransform',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'superfood'),
                'options' => superfood_elated_get_text_transform_array()
            )
        );

        $second_level_wide_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_main_menu,
                'name' => 'second_level_wide_group',
                'title' => esc_html__('2nd Level Wide Menu', 'superfood'),
                'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'superfood')
            )
        );

        $second_level_wide_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name' => 'second_level_wide_row1'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_wide_color',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_wide_hovercolor',
                'default_value' => '',
                'label' => esc_html__('Hover/Active Color', 'superfood')
            )
        );

        $second_level_wide_row2 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name' => 'second_level_wide_row2',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row2,
                'type' => 'fontsimple',
                'name' => 'dropdown_wide_google_fonts',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_wide_fontsize',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_wide_lineheight',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_wide_row3 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name' => 'second_level_wide_row3',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_wide_fontstyle',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'superfood'),
                'options' => superfood_elated_get_font_style_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_wide_fontweight',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'superfood'),
                'options' => superfood_elated_get_font_weight_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row3,
                'type' => 'textsimple',
                'name' => 'dropdown_wide_letterspacing',
                'default_value' => '',
                'label' => esc_html__('Letter Spacing', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $second_level_wide_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_wide_texttransform',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'superfood'),
                'options' => superfood_elated_get_text_transform_array()
            )
        );

        $third_level_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_main_menu,
                'name' => 'third_level_group',
                'title' => esc_html__('3nd Level Menu', 'superfood'),
                'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'superfood')
            )
        );

        $third_level_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name' => 'third_level_row1'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_color_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_hovercolor_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Hover/Active Color', 'superfood')
            )
        );

        $third_level_row2 = superfood_elated_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name' => 'third_level_row2',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row2,
                'type' => 'fontsimple',
                'name' => 'dropdown_google_fonts_thirdlvl',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_fontsize_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_lineheight_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_row3 = superfood_elated_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name' => 'third_level_row3',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_fontstyle_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'superfood'),
                'options' => superfood_elated_get_font_style_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_fontweight_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'superfood'),
                'options' => superfood_elated_get_font_weight_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row3,
                'type' => 'textsimple',
                'name' => 'dropdown_letterspacing_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Letter Spacing', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_texttransform_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'superfood'),
                'options' => superfood_elated_get_text_transform_array()
            )
        );

        $third_level_wide_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_main_menu,
                'name' => 'third_level_wide_group',
                'title' => esc_html__('3rd Level Wide Menu', 'superfood'),
                'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'superfood')
            )
        );

        $third_level_wide_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name' => 'third_level_wide_row1'
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_wide_color_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Text Color', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row1,
                'type' => 'colorsimple',
                'name' => 'dropdown_wide_hovercolor_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Hover/Active Color', 'superfood')
            )
        );

        $third_level_wide_row2 = superfood_elated_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name' => 'third_level_wide_row2',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row2,
                'type' => 'fontsimple',
                'name' => 'dropdown_wide_google_fonts_thirdlvl',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'superfood')
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_wide_fontsize_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Font Size', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row2,
                'type' => 'textsimple',
                'name' => 'dropdown_wide_lineheight_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Line Height', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_wide_row3 = superfood_elated_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name' => 'third_level_wide_row3',
                'next' => true
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_wide_fontstyle_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Font Style', 'superfood'),
                'options' => superfood_elated_get_font_style_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_wide_fontweight_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Font Weight', 'superfood'),
                'options' => superfood_elated_get_font_weight_array()
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row3,
                'type' => 'textsimple',
                'name' => 'dropdown_wide_letterspacing_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Letter Spacing', 'superfood'),
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        superfood_elated_add_admin_field(
            array(
                'parent' => $third_level_wide_row3,
                'type' => 'selectblanksimple',
                'name' => 'dropdown_wide_texttransform_thirdlvl',
                'default_value' => '',
                'label' => esc_html__('Text Transform', 'superfood'),
                'options' => superfood_elated_get_text_transform_array()
            )
        );

        /******************* Main Menu Layout *********************/

        /****************** Vertical Main Menu Layout ********************/

        $panel_vertical_main_menu = superfood_elated_add_admin_panel(
            array(
                'title' => esc_html__('Vertical Main Menu', 'superfood'),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
                    'header-standard',
                    'header-full-screen',
                    'header-divided',
                )
            )
        );

        $drop_down_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__('Main Dropdown Menu', 'superfood'),
                'description' => esc_html__('Set a style for dropdown menu', 'superfood')
            )
        );

        $vertical_drop_down_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'eltdf_drop_down_row1',
            )
        );

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_top_margin',
            'default_value' => '',
            'label' => esc_html__('Top Margin', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $vertical_drop_down_row1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_bottom_margin',
            'default_value' => '',
            'label' => esc_html__('Bottom Margin', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $vertical_drop_down_row1
        ));

        $group_vertical_first_level = superfood_elated_add_admin_group(array(
            'name' => 'group_vertical_first_level',
            'title' => esc_html__('1st level', 'superfood'),
            'description' => esc_html__('Define styles for 1st level menu', 'superfood'),
            'parent' => $panel_vertical_main_menu
        ));

        $row_vertical_first_level_1 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_first_level_1',
            'parent' => $group_vertical_first_level
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'vertical_menu_1st_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'superfood'),
            'parent' => $row_vertical_first_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'vertical_menu_1st_hover_color',
            'default_value' => '',
            'label' => esc_html__('Hover/Active Color', 'superfood'),
            'parent' => $row_vertical_first_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_1st_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_first_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_1st_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_first_level_1
        ));

        $row_vertical_first_level_2 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_first_level_2',
            'parent' => $group_vertical_first_level,
            'next' => true
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_1st_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'superfood'),
            'options' => superfood_elated_get_text_transform_array(),
            'parent' => $row_vertical_first_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'vertical_menu_1st_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'superfood'),
            'parent' => $row_vertical_first_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_1st_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'superfood'),
            'options' => superfood_elated_get_font_style_array(),
            'parent' => $row_vertical_first_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_1st_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'superfood'),
            'options' => superfood_elated_get_font_weight_array(),
            'parent' => $row_vertical_first_level_2
        ));

        $row_vertical_first_level_3 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_first_level_3',
            'parent' => $group_vertical_first_level,
            'next' => true
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_1st_letter_spacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_first_level_3
        ));

        $group_vertical_second_level = superfood_elated_add_admin_group(array(
            'name' => 'group_vertical_second_level',
            'title' => esc_html__('2nd level', 'superfood'),
            'description' => esc_html__('Define styles for 2nd level menu', 'superfood'),
            'parent' => $panel_vertical_main_menu
        ));

        $row_vertical_second_level_1 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_second_level_1',
            'parent' => $group_vertical_second_level
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'vertical_menu_2nd_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'superfood'),
            'parent' => $row_vertical_second_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'vertical_menu_2nd_hover_color',
            'default_value' => '',
            'label' => esc_html__('Hover/Active Color', 'superfood'),
            'parent' => $row_vertical_second_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_2nd_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_second_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_2nd_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_second_level_1
        ));

        $row_vertical_second_level_2 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_second_level_2',
            'parent' => $group_vertical_second_level,
            'next' => true
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_2nd_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'superfood'),
            'options' => superfood_elated_get_text_transform_array(),
            'parent' => $row_vertical_second_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'vertical_menu_2nd_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'superfood'),
            'parent' => $row_vertical_second_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_2nd_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'superfood'),
            'options' => superfood_elated_get_font_style_array(),
            'parent' => $row_vertical_second_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_2nd_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'superfood'),
            'options' => superfood_elated_get_font_weight_array(),
            'parent' => $row_vertical_second_level_2
        ));

        $row_vertical_second_level_3 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_second_level_3',
            'parent' => $group_vertical_second_level,
            'next' => true
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_2nd_letter_spacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_second_level_3
        ));

        $group_vertical_third_level = superfood_elated_add_admin_group(array(
            'name' => 'group_vertical_third_level',
            'title' => esc_html__('3rd level', 'superfood'),
            'description' => esc_html__('Define styles for 3rd level menu', 'superfood'),
            'parent' => $panel_vertical_main_menu
        ));

        $row_vertical_third_level_1 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_third_level_1',
            'parent' => $group_vertical_third_level
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'vertical_menu_3rd_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'superfood'),
            'parent' => $row_vertical_third_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'vertical_menu_3rd_hover_color',
            'default_value' => '',
            'label' => esc_html__('Hover/Active Color', 'superfood'),
            'parent' => $row_vertical_third_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_3rd_fontsize',
            'default_value' => '',
            'label' => esc_html__('Font Size', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_third_level_1
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_3rd_lineheight',
            'default_value' => '',
            'label' => esc_html__('Line Height', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_third_level_1
        ));

        $row_vertical_third_level_2 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_third_level_2',
            'parent' => $group_vertical_third_level,
            'next' => true
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_3rd_texttransform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'superfood'),
            'options' => superfood_elated_get_text_transform_array(),
            'parent' => $row_vertical_third_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'fontsimple',
            'name' => 'vertical_menu_3rd_google_fonts',
            'default_value' => '-1',
            'label' => esc_html__('Font Family', 'superfood'),
            'parent' => $row_vertical_third_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_3rd_fontstyle',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'superfood'),
            'options' => superfood_elated_get_font_style_array(),
            'parent' => $row_vertical_third_level_2
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'selectblanksimple',
            'name' => 'vertical_menu_3rd_fontweight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'superfood'),
            'options' => superfood_elated_get_font_weight_array(),
            'parent' => $row_vertical_third_level_2
        ));

        $row_vertical_third_level_3 = superfood_elated_add_admin_row(array(
            'name' => 'row_vertical_third_level_3',
            'parent' => $group_vertical_third_level,
            'next' => true
        ));

        superfood_elated_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'vertical_menu_3rd_letter_spacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'superfood'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_vertical_third_level_3
        ));

        /****************** Vertical Main Menu Layout ********************/


        $panel_mobile_header = superfood_elated_add_admin_panel(array(
            'title' => esc_html__('Mobile Header', 'superfood'),
            'name' => 'panel_mobile_header',
            'page' => '_header_page'
        ));

        $mobile_header_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_mobile_header,
                'name' => 'mobile_header_group',
                'title' => esc_html__('Mobile Header Styles', 'superfood')
            )
        );

        $mobile_header_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $mobile_header_group,
                'name' => 'mobile_header_row1'
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_header_height',
            'type' => 'textsimple',
            'label' => esc_html__('Height', 'superfood'),
            'parent' => $mobile_header_row1,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_header_background_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Background Color', 'superfood'),
            'parent' => $mobile_header_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_header_border_bottom_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Border Bottom Color', 'superfood'),
            'parent' => $mobile_header_row1
        ));

        $mobile_menu_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_mobile_header,
                'name' => 'mobile_menu_group',
                'title' => esc_html__('Mobile Menu Styles', 'superfood')
            )
        );

        $mobile_menu_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $mobile_menu_group,
                'name' => 'mobile_menu_row1'
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_menu_background_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Background Color', 'superfood'),
            'parent' => $mobile_menu_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_menu_border_bottom_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Border Bottom Color', 'superfood'),
            'parent' => $mobile_menu_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_menu_separator_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Menu Item Separator Color', 'superfood'),
            'parent' => $mobile_menu_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_logo_height',
            'type' => 'text',
            'label' => esc_html__('Logo Height For Mobile Header', 'superfood'),
            'description' => esc_html__('Define logo height for screen size smaller than 1024px', 'superfood'),
            'parent' => $panel_mobile_header,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_logo_height_phones',
            'type' => 'text',
            'label' => esc_html__('Logo Height For Mobile Devices', 'superfood'),
            'description' => esc_html__('Define logo height for screen size smaller than 480px', 'superfood'),
            'parent' => $panel_mobile_header,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        superfood_elated_add_admin_section_title(array(
            'parent' => $panel_mobile_header,
            'name' => 'mobile_header_fonts_title',
            'title' => esc_html__('Typography', 'superfood')
        ));

        $first_level_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_mobile_header,
                'name' => 'first_level_group',
                'title' => esc_html__('1st Level Menu', 'superfood'),
                'description' => esc_html__('Define styles for 1st level in Mobile Menu Navigation', 'superfood')
            )
        );

        $first_level_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row1'
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_text_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Text Color', 'superfood'),
            'parent' => $first_level_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_text_hover_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Hover/Active Text Color', 'superfood'),
            'parent' => $first_level_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_font_family',
            'type' => 'fontsimple',
            'label' => esc_html__('Font Family', 'superfood'),
            'parent' => $first_level_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_font_size',
            'type' => 'textsimple',
            'label' => esc_html__('Font Size', 'superfood'),
            'parent' => $first_level_row1,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        $first_level_row2 = superfood_elated_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name' => 'first_level_row2'
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_line_height',
            'type' => 'textsimple',
            'label' => esc_html__('Line Height', 'superfood'),
            'parent' => $first_level_row2,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_text_transform',
            'type' => 'selectsimple',
            'label' => esc_html__('Text Transform', 'superfood'),
            'parent' => $first_level_row2,
            'options' => superfood_elated_get_text_transform_array()
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_font_style',
            'type' => 'selectsimple',
            'label' => esc_html__('Font Style', 'superfood'),
            'parent' => $first_level_row2,
            'options' => superfood_elated_get_font_style_array()
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_font_weight',
            'type' => 'selectsimple',
            'label' => esc_html__('Font Weight', 'superfood'),
            'parent' => $first_level_row2,
            'options' => superfood_elated_get_font_weight_array()
        ));

        $second_level_group = superfood_elated_add_admin_group(
            array(
                'parent' => $panel_mobile_header,
                'name' => 'second_level_group',
                'title' => esc_html__('Dropdown Menu', 'superfood'),
                'description' => esc_html__('Define styles for drop down menu items in Mobile Menu Navigation', 'superfood')
            )
        );

        $second_level_row1 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name' => 'second_level_row1'
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_text_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Text Color', 'superfood'),
            'parent' => $second_level_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_text_hover_color',
            'type' => 'colorsimple',
            'label' => esc_html__('Hover/Active Text Color', 'superfood'),
            'parent' => $second_level_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_font_family',
            'type' => 'fontsimple',
            'label' => esc_html__('Font Family', 'superfood'),
            'parent' => $second_level_row1
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_font_size',
            'type' => 'textsimple',
            'label' => esc_html__('Font Size', 'superfood'),
            'parent' => $second_level_row1,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        $second_level_row2 = superfood_elated_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name' => 'second_level_row2'
            )
        );

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_line_height',
            'type' => 'textsimple',
            'label' => esc_html__('Line Height', 'superfood'),
            'parent' => $second_level_row2,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_text_transform',
            'type' => 'selectsimple',
            'label' => esc_html__('Text Transform', 'superfood'),
            'parent' => $second_level_row2,
            'options' => superfood_elated_get_text_transform_array()
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_font_style',
            'type' => 'selectsimple',
            'label' => esc_html__('Font Style', 'superfood'),
            'parent' => $second_level_row2,
            'options' => superfood_elated_get_font_style_array()
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_dropdown_font_weight',
            'type' => 'selectsimple',
            'label' => esc_html__('Font Weight', 'superfood'),
            'parent' => $second_level_row2,
            'options' => superfood_elated_get_font_weight_array()
        ));

        superfood_elated_add_admin_section_title(array(
            'name' => 'mobile_opener_panel',
            'parent' => $panel_mobile_header,
            'title' => esc_html__('Mobile Menu Opener', 'superfood')
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_menu_title',
            'type' => 'text',
            'label' => esc_html__('Mobile Navigation Title', 'superfood'),
            'description' => esc_html__('Enter title for mobile menu navigation', 'superfood'),
            'parent' => $panel_mobile_header,
            'default_value' => esc_html__('Menu', 'superfood'),
            'args' => array(
                'col_width' => 3
            )
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_icon_color',
            'type' => 'color',
            'label' => esc_html__('Mobile Navigation Icon Color', 'superfood'),
            'parent' => $panel_mobile_header
        ));

        superfood_elated_add_admin_field(array(
            'name' => 'mobile_icon_hover_color',
            'type' => 'color',
            'label' => esc_html__('Mobile Navigation Icon Hover Color', 'superfood'),
            'parent' => $panel_mobile_header
        ));
    }

    add_action('superfood_elated_options_map', 'superfood_elated_header_options_map', 3);
}