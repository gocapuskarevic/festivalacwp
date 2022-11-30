<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'disto_popular_widgets' );

function disto_popular_widgets() {
	register_widget( 'disto_popular_widget' );
}


class disto_popular_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 'classname' => 'post_list_widget', 'description' => esc_html__( 'Display a list of popular posts', 'disto' ) );
		parent::__construct('disto_popular_widget', esc_html__('jellywp: popular post', 'disto'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );
		$title = isset($instance['title']) ? $instance['title'] : "Popular Posts";
		$num_posts = isset($instance['num_posts']) ? $instance['num_posts'] : 4;
		
		print '<span class="jl_none_space"></span>'.$before_widget;
		echo '<div class="widget_jl_wrapper">';
		if ( $title ){ 
			print '<span class="jl_none_space"></span>'.$before_title . esc_attr($title) . $after_title; 
		}
		
			$recent_posts = new WP_Query(array(
				'showposts' => $num_posts,
				'orderby' => 'comment_count',
				'ignore_sticky_posts' => 1
			));			
			?>
<div>
    <ul class="feature-post-list popular-post-widget">
        <?php 
			while($recent_posts->have_posts()){ 
			$recent_posts->the_post();
			$post_id = get_the_ID(); 
			?>

        <li>
            <a href="<?php the_permalink(); ?>" class="jl_small_format feature-image-link image_post featured-thumbnail" title="<?php the_title_attribute(); ?>">
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


        <?php }
		wp_reset_postdata(); ?>
    </ul>
</div>
<?php
		print '<span class="jl_none_space"></span>'.$after_widget;
		print "</div>";
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_posts'] = $new_instance['num_posts'];
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance)
	{
		$defaults = array('title' => esc_html__( 'Popular Posts', 'disto' ) , 'num_posts' => 4, 'show_comments' => 'on');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e( 'Title:', 'disto' ) ?></label>
    <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('num_posts')); ?>">
        <?php esc_html_e( 'Number of posts:', 'disto' ); ?></label>
    <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('num_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('num_posts')); ?>" type="text" value="<?php echo esc_attr($instance['num_posts']); ?>" />
</p>
<?php 
	}
}
?>