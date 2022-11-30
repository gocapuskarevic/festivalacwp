<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'home_post_slider_init' );

function home_post_slider_init() {
    register_widget( 'home_post_slider_widget' );
}

class home_post_slider_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
            
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'home_post_slider_widget', 
            'description' => esc_html__('Display Home post slider', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('home_post_slider_widget', esc_html__('jellywp: Home post slider', 'disto'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);

         $titles = apply_filters('widget_title', empty($instance['titles']) ? ' ' : $instance['titles'], $instance, $this->id_base);
    
      if (!$number_show = absint( $instance['number_show'] )){$number_show = 5;}
      if (isset($instance['number_offset'])==''){$number_offset = 0;}else{$number_offset = absint($instance['number_offset']);}
      if (isset($instance['number_show'])==''){$number_show = 0;}else{$number_show = absint($instance['number_show']);}
      if (isset($instance['jl_remove_border'])==''){$jl_remove_border = '';}else{$jl_remove_border = absint($instance['jl_remove_border']);}
      if (!$cats = $instance["cats"]){$cats = '';}
      
      $jellywp_args=array(               
        'showposts' => $number_show,
        'category__in'=> $cats,
        'ignore_sticky_posts' => 1,
        'offset' => $number_offset
        );
      $jellywp_widget = null;
      $jellywp_widget = new WP_Query($jellywp_args);


        // Post list in widget>?>
<div class="page_builder_slider page_builder_slider_single_wrapper jelly_homepage_builder">
    <?php if (!empty($instance['titles'])) {?>
    <div class="homepage_builder_title">
        <h2 class="builder_title_home_page">
            <?php echo esc_attr($instance["titles"]);?>
        </h2>
    </div>
    <?php }?>
    <div class="header-main-slider-large builder_main_single_home_slider">
        <div class="full_width_slider_builder">
            <div class="full-slider-main-home-wrapper <?php if(!get_theme_mod('disable_css_animation')==1){echo " appear_animation ";}else{}?> <?php if($jl_remove_border == 1){echo 'jl_remove_border';}else{}?>">
                <div class="full-slider-main-home single-item-slider jelly_loading_pro">
                    <?php
    $i=0;
        while ($jellywp_widget->have_posts()) {
      $i++;
      $post_id = get_the_ID();
      $jellywp_widget->the_post();
      $categories = get_the_category(get_the_ID());
        ?>
                    <div class="item">
                        <div class="banner-carousel-item">
                            <?php $post_feature_thumb_id = get_post_thumbnail_id();
$slider_large_image_header = wp_get_attachment_image_src( $post_feature_thumb_id, 'disto_large_slider_image', true );
if($post_feature_thumb_id){?>
                            <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                            <?php }else{?>
                            <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                            <?php }?>
                            <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute" title="<?php the_title_attribute(); ?>"></a>

                            <div class="banner-container">
                                <?php
          if(get_theme_mod('disable_post_category') !=1){
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                <h5><a href="<?php the_permalink(); ?>">
                                        <?php the_title()?></a></h5>

                                <?php echo disto_post_meta(get_the_ID()); ?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        wp_reset_postdata(); 
    }

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['titles'] = strip_tags($new_instance['titles']);
        $instance['number_show'] = absint($new_instance['number_show']);  
        $instance['number_offset'] = absint($new_instance['number_offset']);  
        $instance['jl_remove_border'] = esc_attr($new_instance['jl_remove_border']);
        $instance['cats'] = $new_instance['cats'];
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
    function form( $instance ) {
        $titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Home slider';
        $number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
        $jl_remove_border = isset($instance['jl_remove_border']) ? absint($instance['jl_remove_border']) : '';        
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        ?>
<p><label for="<?php echo esc_attr($this->get_field_id('titles')); ?>">
        <?php esc_attr_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('titles')); ?>" name="<?php echo esc_attr($this->get_field_name('titles')); ?>" type="text" value="<?php echo esc_attr($titles); ?>" /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_show')); ?>">
        <?php esc_attr_e('Number of posts to show:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_show')); ?>" name="<?php echo esc_attr($this->get_field_name('number_show')); ?>" type="text" value="<?php echo esc_attr(esc_attr($number_show)); ?>" size="3" /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_attr_e('Offset posts:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" />
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_remove_border')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_remove_border')); ?>" <?php if(isset($instance[ 'jl_remove_border']) && $instance[ 'jl_remove_border']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_remove_border')); ?>">Remove Border Radius</label>
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_html_e('Choose your category:', 'disto');?>

        <?php
                   $categories=  get_categories();
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