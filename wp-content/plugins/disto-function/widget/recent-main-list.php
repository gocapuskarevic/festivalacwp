<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init', 'recent1__widgets');

function recent1__widgets() {
    register_widget('recent1_widgets');
}

class recent1_widgets extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/

    function __construct() {
        $widget_ops = array(
            'classname' => 'main_post_style clearfix',
            'description' => esc_attr__('Display main post with list of recent post.', 'disto')
        );
        parent::__construct('widget-main-post-style', esc_attr__('jellywp: main post images with list post', 'disto'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
    function widget($args, $instance) {

        extract($args);

        $cats = isset($instance["cats"]) ? $instance["cats"] : "";
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        if (isset($instance['enable_dark'])==''){$enable_dark = '';}else{$enable_dark = absint($instance['enable_dark']);}
        
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
        if ( ! empty( $title ) ) {
        print '<span class="jl_none_space"></span>'.$before_title;
        print esc_attr($title);
        print '<span class="jl_none_space"></span>'.$after_title;
        }


        // Post list in widget

        $i = 0;?>
<div class="mainpost_with_list_widget <?php if($enable_dark == 1){echo'jl_dark_main_list';}?>">
    <?php
        while ($jellywp_widget->have_posts()) {
            $jellywp_widget->the_post();
            $post_id = get_the_ID();
            //get all post categories
            $categories = get_the_category(get_the_ID());
             $i++;
            if ($i == 1) {
                ?>


    <div class="box blog_grid_post_style">
        <div class="image-post-thumb">
            <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_slider_grid_small');}
else{echo '<img class="no_feature_img" src="'.esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg').'">';} ?>
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


        <div class="post-entry-content">
            <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                    <?php the_title()?></a></h3>
            <?php echo disto_post_meta(get_the_ID()); ?>
        </div>
    </div>

    <div class="right-post-display-content list-post-right">
        <ul class="feature-post-list">
            <?php
            }else {?>
            <li>
                <a href="<?php the_permalink(); ?>" class="jl_small_format feature-image-link image_post featured-thumbnail" title="<?php the_title_attribute(); ?>">
                    <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_small_feature');}
else{echo '<img class="no_feature_img" src="'.esc_url(get_template_directory_uri().'/img/feature_img/small-feature.jpg').'">';} ?>
                    <div class="background_over_image"></div>
                </a>
                <div class="item-details">
                    <h3 class="feature-post-title"><a href="<?php the_permalink(); ?>">
                            <?php the_title()?></a></h3>
                    <?php echo disto_post_meta_date(get_the_ID()); ?>
                </div>
            </li>

            <?php }}?>



        </ul>
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
        $instance['number'] = absint($new_instance['number']);
        $instance['number_offset'] = absint($new_instance['number_offset']);
        $instance['enable_dark'] = esc_attr($new_instance['enable_dark']);

        return $instance;
    }


    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        $enable_dark = isset($instance['enable_dark']) ? absint($instance['enable_dark']) : '';
        ?>
<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_attr_e('Title:', 'disto'); ?></label>
    <input width="100%" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>


<p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
        <?php esc_attr_e('Number of posts to show:', 'disto'); ?></label>
    <input width="100%" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_attr_e('Offset posts:', 'disto'); ?></label>
    <input width="100%" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" /></p>

<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('enable_dark')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('enable_dark')); ?>" <?php if(isset($instance[ 'enable_dark']) && $instance[ 'enable_dark']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('enable_dark')); ?>">Enable dark options</label>
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_attr_e('Choose your category:', 'disto'); ?>

        <?php
                $categories = get_categories();
                echo "<br/>";
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