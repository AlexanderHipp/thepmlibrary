<?php
class SuperfoodElatedClassImageWidget extends SuperfoodElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_image_widget',
            esc_html__('Elated Image Widget', 'superfood'),
            array( 'description' => esc_html__( 'Add image element to widget areas', 'superfood'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'name' => 'extra_class',
                'title' => esc_html__('Custom CSS Class', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'widget_title',
                'title' => esc_html__('Widget Title', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'image_src',
                'title' => esc_html__('Image Source', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'image_alt',
                'title' => esc_html__('Image Alt', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'image_width',
                'title' => esc_html__('Image Width', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'image_height',
                'title' => esc_html__('Image Height', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'link',
                'title' => esc_html__('Link', 'superfood')
            ),
            array(
                'type' => 'dropdown',
                'name' => 'target',
                'title' => esc_html__('Target', 'superfood'),
                'options' => array(
                    '_self' => esc_html__('Same Window', 'superfood'),
                    '_blank' => esc_html__('New Window', 'superfood')
                )
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        extract($args);

        $extra_class = '';
        if (!empty($instance['extra_class'])) {
            $extra_class = $instance['extra_class'];
        }

        $image_src = '';
        $image_alt = esc_html__('Widget Image', 'superfood');
        $image_width = '';
        $image_height = '';

        if (!empty($instance['image_alt'])) {
            $image_alt = $instance['image_alt'];
        }

        if (!empty($instance['image_width'])) {
            $image_width = intval($instance['image_width']);
        }

        if (!empty($instance['image_height'])) {
            $image_height = intval($instance['image_height']);
        }

        if (!empty($instance['image_src'])) {
            $image_src = '<img itemprop="image" src="'.esc_url($instance['image_src']).'" alt="'.$image_alt.'" width="'.$image_width.'" height="'.$image_height.'" />';
        }

        $link_begin_html = '';
        $link_end_html = '';
        $target = '_self';

        if (!empty($instance['target']) && $instance['target'] !== '') {
            $target = $instance['target'];
        }

        if (!empty($instance['link']) && $instance['link'] !== '') {
            $link_begin_html = '<a itemprop="url" href="'.esc_url($instance['link']).'" target="'.esc_attr($target).'">';
            $link_end_html = '</a>';
        }
        ?>

        <div class="widget eltdf-image-widget <?php echo esc_html($extra_class); ?>">
            <?php
                if (!empty($instance['widget_title']) && $instance['widget_title'] !== '') {
                    print $args['before_title'].$instance['widget_title'].$args['after_title'];
                }
                if ($link_begin_html !== '') {
                    print $link_begin_html;
                }
                if ($image_src !== '') {
                    print $image_src;
                }
                if ($link_end_html !== '') {
                    print $link_end_html;
                }
            ?>
        </div>
    <?php 
    }
}