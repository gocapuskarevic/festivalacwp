<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'disto_recent_post_widgets' );

function disto_recent_post_widgets() {
    register_widget( 'disto_recent_post_widget' );
}

class disto_recent_post_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
            
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'post_list_widget', 
            'description' => esc_html__('Display a list of recent post.', 'disto')
        );
        parent::__construct('disto_recent_post_widget', esc_html__('jellywp: Recently Posts', 'disto'), $widget_ops);
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
        if (isset($instance['en_number_over'])==''){$en_number_over = '';}else{$en_number_over = absint($instance['en_number_over']);}
        


        $post_cat_args = array(
            'showposts' => $number,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );

        $post_cat_widget = null;
        $post_cat_widget = new WP_Query($post_cat_args);


        print '<span class="jl_none_space"></span>'.$before_widget;
        print '<div class="widget_jl_wrapper">';
        if ( $title ){ 
        print '<span class="jl_none_space"></span>'.$before_title . esc_attr($title) . $after_title; 
        }        

        // Post list in widget
        print '<div>';
        print '<ul class="feature-post-list recent-post-widget">';

            $i=0;
            while ($post_cat_widget->have_posts()) {
            $i++;
            $post_cat_widget->the_post();
            $post_id = get_the_ID();
            ?>

<li>
    <a href="<?php the_permalink(); ?>" class="jl_small_format feature-image-link image_post featured-thumbnail" title="<?php the_title_attribute(); ?>">
        <?php if($en_number_over == 1){echo '<span class="jl_small_list_num">'.$i.'</span>';}else{}?>
        <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_small_feature');}
else{echo '<img class="no_feature_img" src="'.esc_url(get_template_directory_uri().'/img/feature_img/small-feature.jpg').'">';} ?>
        <div class="background_over_image"></div>
    </a>
    <div class="item-details">
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
        <h3 class="feature-post-title"><a href="<?php the_permalink(); ?>">
                <?php the_title()?></a></h3>
        <?php echo disto_post_meta_date(get_the_ID()); ?>
    </div>
</li>


<?php
        }

        wp_reset_postdata();

        print "</ul>\n";
            print "</div>\n";
        print '<span class="jl_none_space"></span>'.$after_widget;
        print "</div>";
    }

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
        $instance['number'] = absint($new_instance['number']);
        $instance['number_offset'] = absint($new_instance['number_offset']);
        $instance['en_number_over'] = esc_attr($new_instance['en_number_over']);
         
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        $post_exception = isset($instance['en_number_over']) ? absint($instance['en_number_over']) : '';
        
?>
<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
        <?php esc_html_e('Number of posts to show:', 'disto'); ?></label>
    <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" style="width: 100%;"  /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_html_e('Offset posts:', 'disto'); ?></label>
    <input id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" style="width: 100%;" /></p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('en_number_over')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('en_number_over')); ?>" <?php if(isset($instance[ 'en_number_over']) && $instance[ 'en_number_over']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('en_number_over')); ?>"><?php esc_attr_e('Enable number overlay', 'disto'); ?></label>
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_html_e('Choose your category:', 'disto');?>

        <?php
                   $categories=  get_categories();
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