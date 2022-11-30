<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'home_post_newsticker_init' );

function home_post_newsticker_init() {
    register_widget( 'home_post_newsticker_widget' );
}

class home_post_newsticker_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
            
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'home_post_newsticker_widget', 
            'description' => esc_html__('Display Home post Newsticker', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('home_post_newsticker_widget', esc_html__('jellywp: Home newsticker', 'disto'), $widget_ops);
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
      if (!$cats = $instance["cats"]){$cats = '';}
      
      $jellywp_args=array(               
        'showposts' => 4,
        'category__in'=> $cats,
        'ignore_sticky_posts' => 1,
        'offset' => $number_offset
        );
      $jellywp_widget = null;
      $jellywp_widget = new WP_Query($jellywp_args);


        // Post list in widget>?>
<div class="page_builder_slider jelly_homepage_builder">    
    <div class="jl_newsticker_wrapper">
        <?php if (!empty($instance['titles'])) {?>
    <div class="homepage_ticker_title">
        <h3 class="builder_ticker_title_home_page">
            <?php echo esc_attr($instance["titles"]);?>
        </h3>
    </div>
    <?php }?>
                    <div class="home_newsticker jelly_loading_pro">
                    <?php
    $i=0;
        while ($jellywp_widget->have_posts()) {
      $i++;
      $post_id = get_the_ID();
      $jellywp_widget->the_post();
      $categories = get_the_category(get_the_ID());
        ?>
                    <div class="item">
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h5>
                            
                        </div>
                    <?php }?>
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
        $instance['cats'] = $new_instance['cats'];
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
    function form( $instance ) {
        $titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Home slider';
        $number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
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
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" /></p>
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