<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','disto_ads300x250_load_widgets');


function disto_ads300x250_load_widgets(){
		register_widget("disto_ads300x250_widget");
}

class disto_ads300x250_widget extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 'classname' => 'jellywp_ads300x250_widget', 'description' => esc_html__( 'Advertisement' , 'disto') );
		parent::__construct('disto_ads300x250_widget', esc_html__('jellywp: place your ads here', 'disto'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance){
	extract($args);		
		$title = isset($instance['title']) ? $instance['title'] : "Advertisement";
		$link = isset($instance['link']) ? $instance['link'] : "";
		$image = isset($instance['image']) ? $instance['image'] : "";
		?>

<?php print '<span class="jl_none_space"></span>'.$before_widget;?>
<div class="widget_jl_wrapper ads_widget_container">

    <?php
		if ( ! empty( $title ) ) {
			print '<span class="jl_none_space"></span>'.$before_title.esc_attr($title).$after_title;
		}
		
			?>

    <div class="ads300x250-thumb">
        <a href="<?php if($link != " "){echo esc_url($link);}else{echo "# ";} ?>">
            <img src="<?php if($image != ""){echo esc_url($image);}else{echo esc_url(get_template_directory_uri()."/img/300x250.png ");} ?>" />
        </a>
    </div>

    <?php
		print '<span class="jl_none_space"></span>'.$after_widget;
	print "</div>";
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['link'] = $new_instance['link'];
		$instance['image'] = $new_instance['image'];
		
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance){
		?>
    <?php
			$defaults = array( 'title' => esc_html__( 'Advertisement' , 'disto'), 'link' => '' , 'image' => '' );
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_html_e( 'Title:', 'disto'); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('link')); ?>">
            <?php esc_html_e( 'Link Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_url($instance['link']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image')); ?>">
            <?php esc_html_e( 'Image Url:' , 'disto' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" type="text" value="<?php echo esc_attr($instance['image']); ?>" />
    </p>
    <?php

	}
}
?>