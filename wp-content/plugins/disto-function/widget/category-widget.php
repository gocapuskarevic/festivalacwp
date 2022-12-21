<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','disto_category_widget');


function disto_category_widget(){
		register_widget("disto_category_image_widget_register");
}

class disto_category_image_widget_register extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 'classname' => 'jellywp_cat_image', 'description' => esc_html__( 'Dispaly Category With Image' , 'disto') );
		parent::__construct('disto_category_image_widget_register', esc_html__('jellywp: Category Image', 'disto'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance){
	extract($args);		
		
		$title = isset($instance['title']) ? $instance['title']: "Display Category With image";
		$number_of_cat = isset($instance['number_of_cat']) ? $instance['number_of_cat']: "";
		$cat_id = isset($instance['cat_id']) ? $instance['cat_id']: "";
		
		print '<span class="jl_none_space"></span>'.$before_widget;
        if ( $title ){ 
        print '<span class="jl_none_space"></span>'.$before_title . esc_attr($title) . $after_title; 
        }
		?>

<div class="wrapper_category_image">
    <?php

    		if($cat_id){$cat_id = explode(",",$cat_id);}else{$cat_id = "";}
			$args = array(
		    'orderby'       => 'include', 
			'order'         => 'ASC',
			'hide_empty'    => false,
		    'fields'        => 'all',
		    'pad_counts'    => false, 
		    'include'       => $cat_id,
		    'number'        => $number_of_cat,
		    );
			$categories = get_terms('category', $args);
			if ($categories) {
            echo '<div class="category_image_wrapper_main">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              $category_image_main = get_term_meta($tag->term_id, "jelly_cat_header_image_id", true);

              $category_image = '';
			  $jelly_header_id = absint( get_term_meta( $tag->term_id, 'jelly_header_id', true ) );
				if ($jelly_header_id){
				$category_image = wp_get_attachment_image_src( $jelly_header_id , 'disto_slider_grid_small' );
				echo '<div class="category_image_bg_image" style="background-image: url('.$category_image[0].');">';
				}else{
				echo '<div class="category_image_bg_image">';
				}
             echo '<a class="category_image_link" id="category_color_'.$tag->term_id.'" href="'.esc_url($tag_link).'"><span class="jl_cm_overlay"><span class="jl_cm_name">'.$tag->name.'</span><span class="jl_cm_count">'.$tag->count.'</span></span></a>';
            echo '<div class="category_image_bg_overlay" style="background: '.$title_bg_Color.';"></div>';
            echo '</div>';
            }
            echo "</div>";
            }

			?>

    <?php
		print '<span class="jl_none_space"></span>'.$after_widget;
		echo "</div>";
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['number_of_cat'] = $new_instance['number_of_cat'];
		$instance['cat_id'] = $new_instance['cat_id'];
		
		return $instance;
	}



	function form($instance){
		?>
    <?php
			$defaults = array( 'title' => esc_html__( 'Categories' , 'disto'), 'number_of_cat' => '4', 'cat_id' => '');
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_html_e( 'Title:', 'disto'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number_of_cat')); ?>">
            <?php esc_html_e( 'Number Of Category:', 'disto'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('number_of_cat')); ?>" name="<?php echo esc_attr($this->get_field_name('number_of_cat')); ?>" type="text" value="<?php echo esc_attr($instance['number_of_cat']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">
            <?php esc_html_e( 'Category id EX: 1,2,3', 'disto'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('cat_id')); ?>" name="<?php echo esc_attr($this->get_field_name('cat_id')); ?>" type="text" value="<?php echo esc_attr($instance['cat_id']); ?>" />
    </p>


    <?php

	}
}
?>