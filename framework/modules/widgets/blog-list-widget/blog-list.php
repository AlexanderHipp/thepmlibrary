<?php
class SuperfoodElatedClassBlogListWidget extends SuperfoodElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_blog_list_widget',
            esc_html__('Elated Blog List Widget', 'superfood'),
            array( 'description' => esc_html__( 'Display a list of your blog posts', 'superfood'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__('Widget Title', 'superfood')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'type',
                'title'   => esc_html__('Type', 'superfood'),
                'options' => array(
                    'simple' => esc_html__('Simple', 'superfood'),
                    'classic' => esc_html__('Classic (text only)', 'superfood')
                )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'number_of_posts',
                'title' => esc_html__('Number of Posts', 'superfood')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'space_between_columns',
                'title'   => esc_html__('Space Between items', 'superfood'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'superfood'),
                    'small' => esc_html__('Small', 'superfood'),
                    'tiny' => esc_html__('Tiny', 'superfood'),
                    'no' => esc_html__('No Space', 'superfood')
                )
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'order_by',
                'title'   => esc_html__('Order By', 'superfood'),
                'options' => array(
                    'title' => esc_html__('Title', 'superfood'),
                    'date' => esc_html__('Date', 'superfood'),
                    'rand' => esc_html__('Random', 'superfood'),
                    'name' => esc_html__('Post Name', 'superfood')
                )
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'order',
                'title'   => esc_html__('Order', 'superfood'),
                'options' => array(
                    'ASC' => esc_html__('ASC', 'superfood'),
                    'DESC' => esc_html__('DESC', 'superfood')
                )
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'category',
                'title'       => esc_html__('Category Slug', 'superfood'),
                'description' => esc_html__('Leave empty for all or use comma for list', 'superfood')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_tag',
                'title'   => esc_html__('Title Tag', 'superfood'),
                'options' => superfood_elated_get_title_tag(true)
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_transform',
                'title'   => esc_html__('Title Text Transform', 'superfood'),
                'options' => superfood_elated_get_text_transform_array(true)
            ),
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        $params = '';

        if (!is_array($instance)) { $instance = array(); }

        $instance['post_info_section'] = 'yes';
        $instance['number_of_columns'] = '1';

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

        //generate shortcode params
        foreach($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        $available_types = array('simple', 'classic');

        if (!in_array($instance['type'], $available_types)) {
            $instance['type'] = 'simple';
        }

        echo '<div class="widget eltdf-blog-list-widget">';

            if(!empty($instance['widget_title'])) {
                print $args['before_title'].$instance['widget_title'].$args['after_title'];
            }

            //finally call the shortcode
            echo do_shortcode("[eltdf_blog_list $params]"); // XSS OK

        echo '</div>';
    }
}