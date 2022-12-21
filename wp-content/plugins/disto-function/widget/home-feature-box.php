<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init', 'disto_home_feature_box_widgets');

function disto_home_feature_box_widgets() {
    register_widget('disto_home_feature_boxwidgets');
}

class disto_home_feature_boxwidgets extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/

    public function __construct() {
        $widget_ops = array(
            'classname' => 'jl_widget_2main_rightlist',
            'description' => esc_html__('Custom Image link', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('disto_home_feature_boxwidgets', esc_html__('jellywp: Home Feature Box', 'disto'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
    function widget($args, $instance) {

        extract($args);

        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $image_url = isset($instance['image_url']) ? esc_attr($instance['image_url']) : '';
        $box_link = isset($instance['box_link']) ? esc_attr($instance['box_link']) : '';       
       ?>

       <div class="jl_feature_box_w">
       <span class="jl_feature_image" style="background-image: url('<?php echo $image_url;?>');"></span>
       <span class="jl_feature_bg"></span>
       <span class="jl_feature_title"><span><?php echo $title;?></span></span>
       <a target="_blank" href="<?php echo $box_link;?>" class="jl_feature_link"></a>
       </div>

<?php }

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image_url'] = strip_tags($new_instance['image_url']);
        $instance['box_link'] = strip_tags($new_instance['box_link']);
        return $instance;
    }


    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $image_url = isset($instance['image_url']) ? esc_attr($instance['image_url']) : '';
        $box_link = isset($instance['box_link']) ? esc_attr($instance['box_link']) : '';
        
        ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" style="width: 100%;" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>">
        <?php esc_html_e('Image URL:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" type="text" value="<?php echo esc_attr($image_url); ?>" style="width: 100%;" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('box_link')); ?>">
        <?php esc_html_e('Link:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('box_link')); ?>" name="<?php echo esc_attr($this->get_field_name('box_link')); ?>" type="text" value="<?php echo esc_attr($box_link); ?>" style="width: 100%;" />
</p>


<?php
    }

}
?>