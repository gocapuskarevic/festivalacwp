<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'disto_home_small_list_widgets' );

function disto_home_small_list_widgets() {
	register_widget( 'disto_home_small_list_widget' );
}

class disto_home_small_list_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
			
	public function __construct() {
    	$widget_ops = array(
			'classname'   => 'post_list_widget', 
			'description' => esc_html__('Display a list of recent post.', 'disto'),
            'panels_groups' => array('panels')
		);
    	parent::__construct('disto_home_small_list_widget', esc_html__('jellywp: Home Small List', 'disto'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget($args, $instance) {
        extract($args);
        $cats = isset($instance["cats"]) ? $instance["cats"] : "";
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        


        $post_cat_args = array(
            'showposts' => $number,
            'category__in' => $cats,
			'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );

        $post_cat_widget = null;
        $post_cat_widget = new WP_Query($post_cat_args);


        print '<span class="jl_none_space"></span>'.$before_widget;
        print '<div class="widget_jl_wrapper jelly_homepage_builder">';
        if ( $title ){ 
        if (!empty($instance['title'])) {?><div class="homepage_builder_title"><h2><?php echo esc_attr($instance["title"]);?></h2>
        <?php if ($subtitle){?><span class="jl_hsubt"><?php echo esc_attr($subtitle);?></span><?php }?>
        </div><?php }
        }
        

        // Post list in widget
		print '<div class="jl_small_list_wrapper">';
        print '<div class="feature-post-list recent-post-widget jl_home_small_list">';

            $row_count=0;
            while ($post_cat_widget->have_posts()) {
            $row_count++;
            $post_cat_widget->the_post();
			$post_id = get_the_ID();
            $categories = get_the_category(get_the_ID());
            ?>
 
<div class="jl_list_item jl_home_list3">
<a  href="<?php the_permalink(); ?>" class="jl_small_format feature-image-link image_post featured-thumbnail" title="<?php the_title_attribute(); ?>">              
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
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
   <h3 class="feature-post-title"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
   <?php echo disto_post_meta_date(get_the_ID()); ?> 
</div>
   </div>

 
            <?php
            if($row_count %2==0){echo '<div class="clear_line_2col_home"></div>';}
            if($row_count %3==0){echo '<div class="clear_line_3col_home"></div>';}
        }

        wp_reset_postdata();

        print "</div>\n";
		    print "</div>\n";
        print '<span class="jl_none_space"></span>'.$after_widget;
        print "</div>";
    }

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['subtitle'] = strip_tags($new_instance['subtitle']);
        $instance['cats'] = $new_instance['cats'];
		$instance['number'] = absint($new_instance['number']);
        $instance['number_offset'] = absint($new_instance['number_offset']);
		 
        return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 6;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
		
?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'disto'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php esc_html_e('Sub Title:', 'disto'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>" /></p>
                        
        <p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts to show:', 'disto'); ?></label>
        <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>"><?php esc_html_e('Offset posts:', 'disto'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" /></p> 
        
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>"><?php esc_html_e('Choose your category:', 'disto');?> 
            
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
