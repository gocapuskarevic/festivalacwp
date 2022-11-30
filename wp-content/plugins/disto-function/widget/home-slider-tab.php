<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'home_post_slider_tab_init' );

function home_post_slider_tab_init() {
    register_widget( 'home_post_slider_tab_widget' );
}

class home_post_slider_tab_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
            
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'home_post_slider_tab_widget', 
            'description' => esc_html__('Display Home post slider', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('home_post_slider_tab_widget', esc_html__('jellywp: Home post slider tab', 'disto'), $widget_ops);
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
      $jl_postid = isset($instance["jl_postid"]) ? $instance["jl_postid"] : "";
      $jl_postide = isset($instance["jl_postide"]) ? $instance["jl_postide"] : "";
      if (isset($instance['query_post_by'])==''){$query_post_by = 'post_cat';}else{$query_post_by = esc_attr($instance['query_post_by']);}
      if (isset($instance['query_filter_by'])==''){$query_filter_by = 'date';}else{$query_filter_by = esc_attr($instance['query_filter_by']);}
      if (isset($instance['query_order_by'])==''){$query_order_by = 'DESC';}else{$query_order_by = esc_attr($instance['query_order_by']);}
        
        
      
      // $jellywp_args=array(      
      //   'showposts' => 4,
      //   'category__in'=> $cats,
      //   'ignore_sticky_posts' => 1,
      //   'offset' => $number_offset
      //   );

      if($jl_postide){$jl_postide = explode(",",$jl_postide);}else{$jl_postide = "";}
        if($query_post_by == "post_cat"){
        $jellywp_args = array(
            'post_type' => 'post',
            'showposts' => 4,
            'orderby' => $query_filter_by,
            'order' => $query_order_by,
            'category__in' => $cats,
            'post__not_in'=>$jl_postide,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );
        }else{
        if($jl_postid){$jl_postid = explode(",",$jl_postid);}else{$jl_postid = "";}
        $jellywp_args = array(
            'post_type' => 'post',
            'showposts' => 4,
            'post__in' => $jl_postid,
            'post__not_in'=>$jl_postide,
            'orderby'=>'post__in',
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset,

        );
    }

      $jellywp_widget = null;
      $jellywp_widget = new WP_Query($jellywp_args);


        // Post list in widget>?>
<div class="page_builder_slider jelly_homepage_builder">
    <?php if (!empty($instance['titles'])) {?>
    <div class="homepage_builder_title">
        <h2 class="builder_title_home_page">
            <?php echo esc_attr($instance["titles"]);?>
        </h2>
    </div>
    <?php }?>
    <div class="jl_slider_nav_tab large_center_slider_container">
    <div class="row header-main-slider-large">
        <div class="col-md-12">
            <div class="large_center_slider_wrapper">
                <div class="home_slider_header_tab jelly_loading_pro">
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

                                <?php $slider_large_thumb_id = get_post_thumbnail_id();
                                $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                                <?php if($slider_large_thumb_id){?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                <?php }else{?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                <?php }?>
                                <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>


                            <div class="banner-container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="banner-inside-wrapper">
                                                    <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text '.$tag->name.'" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h5>
                                                    <?php echo disto_post_meta(get_the_ID()); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    <?php }?>
                </div>



                <div class="jlslide_tab_nav_container">
                        <div class="jlslide_tab_nav_row">
                            <div class="home_slider_header_tab_nav news_tiker_loading_pro">
                                <?php
      while ($jellywp_widget->have_posts()) {
      $jellywp_widget->the_post();
    ?>
                                <div class="item">
                                    <div class="banner-carousel-item">
                                        <?php $slider_large_thumb_id = get_post_thumbnail_id();
$slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_small_feature', true ); ?>
                                        <?php if($slider_large_thumb_id){?>
                                        <span class="image_small_nav" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                        <?php }else{?>
                                        <span class="image_small_nav" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                        <?php }?>
                                        <h5>
                                            <?php the_title()?>
                                        </h5>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>



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
        $instance['cats'] = $new_instance['cats'];
        $instance['jl_postid'] = ( ! empty( $new_instance['jl_postid'] ) ) ? strip_tags( $new_instance['jl_postid'] ) : '';
        $instance['jl_postide'] = ( ! empty( $new_instance['jl_postide'] ) ) ? strip_tags( $new_instance['jl_postide'] ) : '';
        $instance['query_post_by'] =  strip_tags($new_instance['query_post_by']);
        $instance['query_filter_by'] =  strip_tags($new_instance['query_filter_by']);
        $instance['query_order_by'] =  strip_tags($new_instance['query_order_by']);
        
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
    function form( $instance ) {
        $titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Home slider';
        $number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        if ( isset( $instance[ 'jl_postid' ] ) ) {$jl_postid = $instance[ 'jl_postid' ];}else {$jl_postid = "";}
        if ( isset( $instance[ 'jl_postide' ] ) ) {$jl_postide = $instance[ 'jl_postide' ];}else {$jl_postide = "";}
        $query_post_by    = isset( $instance['query_post_by'] ) ? esc_attr( $instance['query_post_by'] ) : 'post_cat';
        $query_filter_by    = isset( $instance['query_filter_by'] ) ? esc_attr( $instance['query_filter_by'] ) : 'date';
        $query_order_by    = isset( $instance['query_order_by'] ) ? esc_attr( $instance['query_order_by'] ) : 'DESC';
        
        ?>
<p><label for="<?php echo esc_attr($this->get_field_id('titles')); ?>">
        <?php esc_attr_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('titles')); ?>" name="<?php echo esc_attr($this->get_field_name('titles')); ?>" type="text" value="<?php echo esc_attr($titles); ?>" /></p>

<p style="display:none;"><label for="<?php echo esc_attr($this->get_field_id('number_show')); ?>">
        <?php esc_attr_e('Number of posts to show:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_show')); ?>" name="<?php echo esc_attr($this->get_field_name('number_show')); ?>" type="text" value="<?php echo esc_attr(esc_attr($number_show)); ?>" size="3" /></p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_attr_e('Offset posts:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" /></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'query_post_by' ) ); ?>"><strong>
            <?php esc_html_e('Query post by:', 'disto'); ?></strong></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'query_post_by' ) ); ?>" class="jl_query_opt" name="<?php echo esc_attr( $this->get_field_name( 'query_post_by' ) ); ?>">
        <option value="post_cat" <?php if ( $query_post_by=='post_cat' ) echo 'selected="selected"'; ?>>Post category</option>
        <option value="post_id" <?php if ( $query_post_by=='post_id' ) echo 'selected="selected"'; ?>>Post ID</option>        
    </select></p> 

<p><label for="<?php echo esc_attr( $this->get_field_id( 'query_filter_by' ) ); ?>"><strong>
            <?php esc_html_e('Order by :', 'disto'); ?></strong></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'query_filter_by' ) ); ?>" class="jl_query_opt" name="<?php echo esc_attr( $this->get_field_name( 'query_filter_by' ) ); ?>">
        <option value="date" <?php if ( $query_filter_by=='date' ) echo 'selected="selected"'; ?>>Date</option>
        <option value="ID" <?php if ( $query_filter_by=='ID' ) echo 'selected="selected"'; ?>>Post ID</option>        
        <option value="title" <?php if ( $query_filter_by=='title' ) echo 'selected="selected"'; ?>>Title</option>        
        <option value="name" <?php if ( $query_filter_by=='name' ) echo 'selected="selected"'; ?>>Post Slug</option>        
        <option value="modified" <?php if ( $query_filter_by=='modified' ) echo 'selected="selected"'; ?>>Modified Date</option>        
        <option value="rand" <?php if ( $query_filter_by=='rand' ) echo 'selected="selected"'; ?>>Random</option>        
        <option value="comment_count" <?php if ( $query_filter_by=='comment_count' ) echo 'selected="selected"'; ?>>Comment Count</option>        
    </select>

<select id="<?php echo esc_attr( $this->get_field_id( 'query_order_by' ) ); ?>" class="jl_query_opt" name="<?php echo esc_attr( $this->get_field_name( 'query_order_by' ) ); ?>">
        <option value="DESC" <?php if ( $query_order_by=='DESC' ) echo 'selected="selected"'; ?>>DESC</option>
        <option value="ASC" <?php if ( $query_order_by=='ASC' ) echo 'selected="selected"'; ?>>ASC</option>        
    </select>
    </p> 

<p class="jl_post_toshow">
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_html_e('Choose your category:', 'disto');?>

        <?php
                   $categories=  get_categories();
                     echo "<br/>";
                     foreach ($categories as $cat) {
                    $option = '<span class="jl_cat_alist"><input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
              
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
                    $option .= '</span>';
                    print '<span class="jl_none_space"></span>'.$option;
                }
                    
                    ?>
    </label>
</p>

<p class="jl_post_id">
    <label for="<?php echo esc_attr($this->get_field_id( 'jl_postid' )); ?>"><strong>
            <?php esc_html_e( 'Posts ID: EX(1,2,3,4)', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'jl_postid' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'jl_postid' )); ?>" type="text" value="<?php echo esc_attr( $jl_postid ); ?>" />
</p>
<p class="jl_post_id">
    <label for="<?php echo esc_attr($this->get_field_id( 'jl_postide' )); ?>"><strong>
            <?php esc_html_e( 'Exclude Posts ID: EX(1,2,3,4)', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'jl_postide' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'jl_postide' )); ?>" type="text" value="<?php echo esc_attr( $jl_postide ); ?>" />
</p>

<?php
    }
}
?>