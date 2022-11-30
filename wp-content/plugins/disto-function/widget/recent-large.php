<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init', 'disto_recent_large__widgets');

function disto_recent_large__widgets() {
    register_widget('disto_recent_large_widgets');
}

class disto_recent_large_widgets extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/

    public function __construct() {
        $widget_ops = array(
            'classname' => 'main_post_style',
            'description' => esc_html__('Display post on menu or widget.', 'disto')
        );
        parent::__construct('disto_recent_large_widgets', esc_html__('jellywp: Post large or menu post', 'disto'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
    function widget($args, $instance) {

        extract($args);

        $cats = isset($instance["cats"]) ? $instance["cats"] : "";
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        
        // array to call recent posts.

        $jellywp_args = array(
            'showposts' => $number,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );

        $jellywp_widget = null;
        $jellywp_widget = new WP_Query($jellywp_args);

        print '<span class="jl_none_space"></span>'.$before_widget;

        // Widget title

        print '<span class="jl_none_space"></span>'.$before_title;
        print esc_attr($title);
        print '<span class="jl_none_space"></span>'.$after_title;

        // Post list in widget

       ?>
<div class="jl_recent_large">
    <?php
            while ($jellywp_widget->have_posts()) {
            $jellywp_widget->the_post();
            $post_id = get_the_ID();
            $categories = get_the_category(get_the_ID());
        ?>

    <div class="recent_post_large_widget">
        <div class="image_post feature-item featured-thumbnail">
            <a href="<?php the_permalink(); ?>" class="feature-link" title="<?php the_title_attribute(); ?>">
                <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_slider_grid_small');}
else{echo '<img class="no_feature_img" src="'.esc_url(get_template_directory_uri().'/img/feature_img/post_sidebar.jpg').'">';} ?>
                <div class="background_over_image"></div>
            </a>
            <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              $title_reactions = get_term_meta($tag->term_id, "disto_cat_reactions", true);
             if($title_reactions){}else{echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';}
            }
            echo "</span>";
            }
            }
 ?>
        </div>
        <div class="wrap_box_style_main image-post-title">
            <div class="title_content_wrapper">
                <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                        <?php the_title()?></a></h3>
                <?php echo disto_post_meta(get_the_ID()); ?>
            </div>
        </div>
    </div>




    <?php }?>



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
        $instance['number'] = absint($new_instance['number']);
        $instance['number_offset'] = absint($new_instance['number_offset']);

        return $instance;
    }


    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        ?>
<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>


<p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
        <?php esc_html_e('Number of posts to show:', 'disto'); ?></label>
    <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_html_e('Offset posts:', 'disto'); ?></label>
    <input id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" /></p>

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