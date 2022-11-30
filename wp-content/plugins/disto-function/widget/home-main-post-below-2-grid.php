<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init', 'disto_main_b_grid_widgets');

function disto_main_b_grid_widgets() {
    register_widget('disto_main_b_gridwidgets');
}

class disto_main_b_gridwidgets extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/

    public function __construct() {
        $widget_ops = array(
            'classname' => 'jl_widget_2main_rightlist',
            'description' => esc_html__('Display Recent post with many layout', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('disto_main_b_gridwidgets', esc_html__('jellywp: Home main below grid', 'disto'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
    function widget($args, $instance) {

        extract($args);

        $cats = isset($instance["cats"]) ? $instance["cats"] : "";
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        
        // array to call recent posts.

        $jellywp_args = array(
            'showposts' => 3,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );

        $jellywp_widget = null;
        $jellywp_widget = new WP_Query($jellywp_args);

        print '<span class="jl_none_space"></span>'.$before_widget;
       ?>
       <div class="jl_main_b_grid_builder jelly_homepage_builder">
       <?php if (!empty($instance['title'])) {?>
    <div class="homepage_builder_title">
        <h2 class="builder_title_home_page">
            <?php echo esc_attr($instance["title"]);?>
        </h2>
    </div>
    <?php }?>
<div class="jl_main_b_grid_wrapper">
    <div class="jl_main_b_grid_container">
    <?php
            $i = 0;
            while ($jellywp_widget->have_posts()) {
            $i ++;
            $jellywp_widget->the_post();
            $post_id = get_the_ID();
            $categories = get_the_category(get_the_ID());    
            ?>
        <?php if ($i == 1){?>
        <div class="jl_main_b_grid_item_w">
        <div class="jl_main_b_grid_item">
        <div class="jl_main_b_grid_itemin">
        <?php $slider_large_thumb_id = get_post_thumbnail_id();
$slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_slider_grid_large', true ); ?>
        <?php if($slider_large_thumb_id){?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
        <?php }else{?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
        <?php }?>
        <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute" title="<?php the_title_attribute(); ?>"></a>          
        <?php
          if(get_theme_mod('disable_post_category') !=1){
          if ($categories) {
            echo '<span class="meta-category-small-overlay meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
            echo disto_post_type();
            ?>
        </div>
        <div class="jl_main_b_grid_captions">        
        <div class="wrap_box_style_main image-post-title">          
            <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                    <?php the_title()?></a></h3>
            <?php echo disto_post_meta(get_the_ID()); ?>
        </div>
        </div>
        </div>
        </div>
<?php }else{?>

 <div class="jl_main_b_grid_item jl_second_feature">
        <div class="jl_main_b_grid_itemin_wrapper">
        <div class="jl_main_b_grid_itemin">
        <?php $slider_large_thumb_id = get_post_thumbnail_id();
$slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_slider_grid_large', true ); ?>
        <?php if($slider_large_thumb_id){?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
        <?php }else{?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
        <?php }?>
        <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute" title="<?php the_title_attribute(); ?>"></a>          
        <?php
          if(get_theme_mod('disable_post_category') !=1){
          if ($categories) {
            echo '<span class="meta-category-small-overlay meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
            echo disto_post_type();
            ?>
        </div>       

        <div class="wrap_box_style_main image-post-title">          
            <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                    <?php the_title()?></a></h3>
            <?php echo disto_post_meta(get_the_ID()); ?>
        </div>
        </div>

        </div>

    <?php }?>
    <?php }?>


</div>
</div>
</div>
<?php
        wp_reset_postdata();


        print '<span class="jl_none_space"></span>'.$after_widget;
    }

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
        $instance['number_offset'] = absint($new_instance['number_offset']);
        
        return $instance;
    }


    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        ?>
<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" style="width: 100%;" /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_html_e('Offset posts:', 'disto'); ?></label>
    <input id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" style="width: 100%;" /></p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_html_e('Choose your category:', 'disto'); ?>

        <?php
                $categories = get_categories();
                print "<br/>";
                foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
                    if (isset($instance['cats'])) {
                        foreach ($instance['cats'] as $cats) {
                            if ($cats == $cat->term_id) {
                                $option = $option . ' checked="checked"';
                            }
                        }
                    }
                    $option .= ' value="' . $cat->term_id . '" />';
                    $option .= '&nbsp;';
                    $option .= $cat->cat_name.' ('.esc_html( $cat->category_count ).')';
                    $option .= '<br />';
                    print '<span class="jl_none_space"></span>'.$option;
                }
                ?>
    </label>
</p>

<?php
    }

}
?>