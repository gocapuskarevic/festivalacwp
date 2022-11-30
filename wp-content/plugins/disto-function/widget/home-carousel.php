<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function jl_home_carousel() {
    register_widget( 'jl_home_carousel_widget' );
}
add_action( 'widgets_init', 'jl_home_carousel' );
class jl_home_carousel_widget extends WP_Widget {

    /*-----------------------------------------------------------------------------------*/
    /*  Widget Setup
    /*-----------------------------------------------------------------------------------*/

    protected $glob;
    function __construct() {
        $widget_ops = array(
            'classname' => 'jelly_home_carousel_widget',
            'description' => esc_html__('Displays Category Posts.', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('jl_home_carousel_widget', esc_html__('jellywp: Home Carousel', 'disto'), $widget_ops);
        $this->glob=0;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Display Widget
    /*-----------------------------------------------------------------------------------*/

    public function widget( $args, $instance ) {
        $this->glob++;
        $title = apply_filters( 'widget_title', $instance['title'] );
        $subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : '';
        $post_per_cat = addslashes($instance[ 'post_per_cat' ]);
        $jl_postid = isset($instance["jl_postid"]) ? $instance["jl_postid"] : "";
        $jl_postide = isset($instance["jl_postide"]) ? $instance["jl_postide"] : "";
        if (isset($instance['jl_car_height'])==''){$jl_car_height = 0;}else{$jl_car_height = $instance['jl_car_height'];}
        if (isset($instance['jl_car_space'])==''){$jl_car_space = '15px';}else{$jl_car_space = $instance['jl_car_space'];}
        if (isset($instance['number_offset'])==''){$number_offset = 0;}else{$number_offset = absint($instance['number_offset']);}
        $cat = isset($instance["cat"]) ? $instance["cat"] : "";
        if (isset($instance['show_post_format'])==''){$show_post_format = '';}else{$show_post_format = absint($instance['show_post_format']);}
        if (isset($instance['jl_remove_border'])==''){$jl_remove_border = '';}else{$jl_remove_border = absint($instance['jl_remove_border']);}
        if (isset($instance['jl_hide_author'])==''){$jl_hide_author = '';}else{$jl_hide_author = absint($instance['jl_hide_author']);}
        $jl_hide_cat = isset($instance["jl_hide_cat"]) ? $instance["jl_hide_cat"] : "";
        $jl_hide_author_img = isset($instance["jl_hide_author_img"]) ? $instance["jl_hide_author_img"] : "";
        $jl_hide_date = isset($instance["jl_hide_date"]) ? $instance["jl_hide_date"] : "";        
        if (isset($instance['jl_hide_arrow'])==''){$jl_hide_arrow = '';}else{$jl_hide_arrow = absint($instance['jl_hide_arrow']);}
        if (isset($instance['jl_hide_dots'])==''){$jl_hide_dots = '';}else{$jl_hide_dots = absint($instance['jl_hide_dots']);}
        if (isset($instance['number_col'])==''){$number_col = 'col3';}else{$number_col = esc_attr($instance['number_col']);}
        if (isset($instance['style_col'])==''){$number_col = 'col3';}else{$style_col = esc_attr($instance['style_col']);}
        if (isset($instance['query_post_by'])==''){$query_post_by = 'post_cat';}else{$query_post_by = esc_attr($instance['query_post_by']);}
        if (isset($instance['font_size'])==''){$font_size = 'jl_fontsize16';}else{$font_size = esc_attr($instance['font_size']);}
        
        if($jl_postide){$jl_postide = explode(",",$jl_postide);}else{$jl_postide = "";}
        if($query_post_by == "post_cat"){
        $jellywp_args = array(
            'post_type' => 'post',
            'showposts' => $post_per_cat,            
            'category__in' => $cat,
            'post__not_in'=>$jl_postide,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );
        }else{
        if($jl_postid){$jl_postid = explode(",",$jl_postid);}else{$jl_postid = "";}
        $jellywp_args = array(
            'post_type' => 'post',
            'showposts' => $post_per_cat,            
            'post__in' => $jl_postid,
            'post__not_in'=>$jl_postide,
            'orderby'=>'post__in',
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );
    }
        
        ?>
        <?php
        $jellywp_widget = null;
        $jellywp_widget = new WP_Query($jellywp_args);
        $jl_grid_rand = rand(50,1000);
        $jl_grid_id = 'jelly_cus_h'.$jl_grid_rand;
        ?>        
        <?php
        echo '<style type="text/css">';
        echo '.jl_car_home .jelly_cus_h'.esc_attr($jl_grid_rand).' .jl_car_wrapper .jl_car_img_front{padding-bottom: '.esc_attr($jl_car_height).' !important;}.jl_car_home .row.jelly_cus_h'.esc_attr($jl_grid_rand).' .col-md-3{padding-right: '.esc_attr($jl_car_space).'; padding-left: '.$jl_car_space.';}.jl_car_home .row.jelly_cus_h'.esc_attr($jl_grid_rand).'{margin-right: -'.$jl_car_space.'; margin-left: -'.$jl_car_space.';}';
        if($jl_car_space =='' || $jl_car_space == '0px'){echo '.jl_car_home .row.jelly_cus_h'.esc_attr($jl_grid_rand).'.car_style3 .post-entry-content{border-right: 0px solid #ddd !important;}';}        
        if($jl_hide_arrow == 1){echo '.jl_car_home .row.'.esc_attr($jl_grid_id).' .slick-arrow{display: none !important;}';}else{}
        if($jl_hide_dots == 1){echo '.jl_car_home .row.'.esc_attr($jl_grid_id).' .slick-dots{display: none !important;}';}else{echo '.jl_car_home .row.'.esc_attr($jl_grid_id).' .col-md-3{padding-bottom: 30px;}';}
        echo '</style>';?>
<div class="jelly_homepage_builder jl_car_home jl_nonav_margin">
    <?php if (!empty($instance['title'])) {?>
    <div class="homepage_builder_title">
        <h2>
            <?php echo esc_attr($instance["title"]);?>
        </h2>
        <?php if ($subtitle){?><span class="jl_hsubt"><?php echo esc_attr($subtitle);?></span><?php }?>
    </div>
    <?php }?>
    <div class="jl_wrapper_row">
        <div class="row jelly_loading_pro <?php echo esc_attr($jl_grid_id);?> <?php echo esc_attr($font_size);?> <?php if($number_col){echo esc_attr($number_col);}else{echo "jl_builder_4carousel ";}?> <?php if($style_col){echo esc_attr($style_col);}else{echo "jl_car_style1 ";}?> <?php if($jl_remove_border == 1){echo 'jl_remove_border';}else{}?> <?php if($jl_hide_author == 1){echo 'jl_hide_author';}else{}?> <?php if($jl_hide_author_img == 1){echo 'jl_hide_author_img';}else{}?> <?php if($jl_hide_date == 1){echo 'jl_hide_date';}else{}?> <?php if($jl_hide_arrow == 1){echo 'jl_hide_arrow';}else{}?> <?php if($jl_hide_dots == 1){echo 'jl_hide_dots';}else{}?>">
            <?php
        $row_count=0;
        while ($jellywp_widget->have_posts()) {
           $row_count++;
           $post_id = get_the_ID();
           $jellywp_widget->the_post();
           $categories = get_the_category(get_the_ID());
        ?>
            <div class="col-md-3">
                <div class="jl_car_wrapper">
                     <div class="jl_car_img_front">
        <?php $post_feature_thumb_id = get_post_thumbnail_id();
        if($number_col == 'jl_builder_1carousel' || $number_col == 'jl_builder_2carousel'){
            $slider_large_image_header = wp_get_attachment_image_src( $post_feature_thumb_id, 'disto_slider_grid_large', true );
        }else{
            $slider_large_image_header = wp_get_attachment_image_src( $post_feature_thumb_id, 'disto_justify_feature', true );
        }        
        if($post_feature_thumb_id){?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
        <?php }else{?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
        <?php }?>
        <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute" title="<?php the_title_attribute(); ?>"></a>
        <?php if($show_post_format == 1){echo disto_post_type();}else{}?>                
            <?php if(get_theme_mod('disable_post_category') !=1){
            if($jl_hide_cat == 1){}else{
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
            }
 ?>
    </div>
                    <div class="post-entry-content">
                        <?php if(get_theme_mod('disable_post_category') !=1){
                        if($jl_hide_cat == 1){}else{
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
            }
 ?>
                        <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                                <?php the_title()?></a></h3>
                        <?php echo disto_post_meta(get_the_ID()); ?>
                    </div>
                </div>
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

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['subtitle'] = strip_tags($new_instance['subtitle']);
        $instance['cat'] = $new_instance['cat'];
        $instance['post_per_cat'] = ( ! empty( $new_instance['post_per_cat'] ) ) ? strip_tags( $new_instance['post_per_cat'] ) : '';
        $instance['jl_postid'] = ( ! empty( $new_instance['jl_postid'] ) ) ? strip_tags( $new_instance['jl_postid'] ) : '';
        $instance['jl_postide'] = ( ! empty( $new_instance['jl_postide'] ) ) ? strip_tags( $new_instance['jl_postide'] ) : '';
        $instance['number_col'] =  strip_tags($new_instance['number_col']);
        $instance['style_col'] =  strip_tags($new_instance['style_col']);
        $instance['query_post_by'] =  strip_tags($new_instance['query_post_by']);
        $instance['font_size'] =  strip_tags($new_instance['font_size']);        
        $instance['number_offset'] = absint($new_instance['number_offset']); 
        $instance['small_title_widget'] = esc_attr($new_instance['small_title_widget']);
        $instance['show_post_format'] = esc_attr($new_instance['show_post_format']);
        $instance['jl_remove_border'] = esc_attr($new_instance['jl_remove_border']);
        $instance['jl_hide_cat'] = esc_attr($new_instance['jl_hide_cat']);
        $instance['jl_hide_author'] = esc_attr($new_instance['jl_hide_author']);        
        $instance['jl_hide_author_img'] = esc_attr($new_instance['jl_hide_author_img']);
        $instance['jl_hide_date'] = esc_attr($new_instance['jl_hide_date']);
        $instance['jl_hide_arrow'] = esc_attr($new_instance['jl_hide_arrow']);
        $instance['jl_hide_dots'] = esc_attr($new_instance['jl_hide_dots']);
        $instance['jl_car_height'] = ( ! empty( $new_instance['jl_car_height'] ) ) ? strip_tags( $new_instance['jl_car_height'] ) : '';
        $instance['jl_car_space'] = ( ! empty( $new_instance['jl_car_space'] ) ) ? strip_tags( $new_instance['jl_car_space'] ) : '';
        return $instance;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Form Widget
    /*-----------------------------------------------------------------------------------*/

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {$title = $instance[ 'title' ];}else {$title = esc_html__( 'Home Carousel', 'disto' );}
        $subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : '';
        if ( isset( $instance[ 'post_per_cat' ] ) ) {$post_per_cat = $instance[ 'post_per_cat' ];}else {$post_per_cat = "6";}
        if ( isset( $instance[ 'jl_postid' ] ) ) {$jl_postid = $instance[ 'jl_postid' ];}else {$jl_postid = "";}
        if ( isset( $instance[ 'jl_postide' ] ) ) {$jl_postide = $instance[ 'jl_postide' ];}else {$jl_postide = "";}
        $number_col    = isset( $instance['number_col'] ) ? esc_attr( $instance['number_col'] ) : 'jl_builder_4carousel';
        $style_col    = isset( $instance['style_col'] ) ? esc_attr( $instance['style_col'] ) : 'style1';
        $query_post_by    = isset( $instance['query_post_by'] ) ? esc_attr( $instance['query_post_by'] ) : 'post_cat';                
        $font_size     = isset( $instance['font_size'] ) ? esc_attr( $instance['font_size'] ) : 'jl_fontsize16';        
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        $post_exception = isset($instance['small_title_widget']) ? absint($instance['small_title_widget']) : '';
        $show_post_format = isset($instance['show_post_format']) ? absint($instance['show_post_format']) : '';
        $jl_remove_border = isset($instance['jl_remove_border']) ? absint($instance['jl_remove_border']) : '';        
        $jl_hide_cat = isset($instance['jl_hide_cat']) ? absint($instance['jl_hide_cat']) : '';
        $jl_hide_author = isset($instance['jl_hide_author']) ? absint($instance['jl_hide_author']) : '';
        $jl_hide_author_img = isset($instance['jl_hide_author_img']) ? absint($instance['jl_hide_author_img']) : '';
        $jl_hide_date = isset($instance['jl_hide_date']) ? absint($instance['jl_hide_date']) : '';
        $jl_hide_arrow = isset($instance['jl_hide_arrow']) ? absint($instance['jl_hide_arrow']) : '';
        $jl_hide_dots = isset($instance['jl_hide_dots']) ? absint($instance['jl_hide_dots']) : ''; 
        if ( isset( $instance[ 'jl_car_height' ] ) ) {$jl_car_height = $instance[ 'jl_car_height' ];}else {$jl_car_height = "";} 
        if ( isset( $instance[ 'jl_car_space' ] ) ) {$jl_car_space = $instance[ 'jl_car_space' ];}else {$jl_car_space = "";} 
        ?>

<p>
    <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong>
            <?php esc_html_e( 'Title:', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p><label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php esc_html_e('Sub Title:', 'disto'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>" /></p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id( 'post_per_cat' )); ?>"><strong>
            <?php esc_html_e( 'Posts Per Page:', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'post_per_cat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_per_cat' )); ?>" type="text" value="<?php echo esc_attr( $post_per_cat ); ?>" />
</p>

<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>"><strong>
            <?php esc_attr_e('Offset posts:', 'disto'); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" />
</p>
<p><label for="<?php echo esc_attr( $this->get_field_id( 'query_post_by' ) ); ?>"><strong>
            <?php esc_html_e('Query post by:', 'disto'); ?></strong></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'query_post_by' ) ); ?>" class="jl_query_opt" name="<?php echo esc_attr( $this->get_field_name( 'query_post_by' ) ); ?>">
        <option value="post_cat" <?php if ( $query_post_by=='post_cat' ) echo 'selected="selected"'; ?>>Post category</option>
        <option value="post_id" <?php if ( $query_post_by=='post_id' ) echo 'selected="selected"'; ?>>Post ID</option>        
    </select></p> 
<p class="jl_post_toshow">
    <strong><?php esc_html_e('Choose your category:', 'disto'); ?></strong>
    <?php
                $categories = get_categories();
                print "<br/>";
                foreach ($categories as $cat) {
                    $option = '<span class="jl_cat_alist"><input type="checkbox" id="' . $this->get_field_id('cat') . '[]" name="' . $this->get_field_name('cat') . '[]"';
                    if (isset($instance['cat'])) {
                        foreach ($instance['cat'] as $cats) {
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


<p class="jlwidget_heading"><?php esc_html_e('Carousel Style', 'disto'); ?></p>

<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('show_post_format')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('show_post_format')); ?>" <?php if(isset($instance[ 'show_post_format']) && $instance[ 'show_post_format']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('show_post_format')); ?>">Show Post Format</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_remove_border')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_remove_border')); ?>" <?php if(isset($instance[ 'jl_remove_border']) && $instance[ 'jl_remove_border']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_remove_border')); ?>">Remove Border Radius</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_hide_cat')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_hide_cat')); ?>" <?php if(isset($instance[ 'jl_hide_cat']) && $instance[ 'jl_hide_cat']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_hide_cat')); ?>">Hide Category</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_hide_author')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_hide_author')); ?>" <?php if(isset($instance[ 'jl_hide_author']) && $instance[ 'jl_hide_author']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_hide_author')); ?>">Hide Author</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_hide_author_img')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_hide_author_img')); ?>" <?php if(isset($instance[ 'jl_hide_author_img']) && $instance[ 'jl_hide_author_img']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_hide_author_img')); ?>">Hide Author img</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_hide_date')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_hide_date')); ?>" <?php if(isset($instance[ 'jl_hide_date']) && $instance[ 'jl_hide_date']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_hide_date')); ?>">Hide Date</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_hide_arrow')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_hide_arrow')); ?>" <?php if(isset($instance[ 'jl_hide_arrow']) && $instance[ 'jl_hide_arrow']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_hide_arrow')); ?>">Hide Arrow</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('jl_hide_dots')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('jl_hide_dots')); ?>" <?php if(isset($instance[ 'jl_hide_dots']) && $instance[ 'jl_hide_dots']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('jl_hide_dots')); ?>">Hide Dots</label>
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id( 'jl_car_height' )); ?>"><strong>
            <?php esc_html_e( 'Carousel Height: Custom height you want. EX: 300px or 120%', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'jl_car_height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'jl_car_height' )); ?>" type="text" value="<?php echo esc_attr( $jl_car_height ); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id( 'jl_car_space' )); ?>"><strong>
            <?php esc_html_e( 'Carousel Margin: Custom margin you want. EX: 10px', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'jl_car_space' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'jl_car_space' )); ?>" type="text" value="<?php echo esc_attr( $jl_car_space ); ?>" />
</p>
<p><label for="<?php echo esc_attr( $this->get_field_id( 'number_col' ) ); ?>"><strong>
            <?php esc_html_e('Grid Columns:', 'disto'); ?></strong></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'number_col' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_col' ) ); ?>">
        <option value="jl_builder_1carousel" <?php if ( $number_col=='jl_builder_1carousel' ) echo 'selected="selected"'; ?>>1 Columns</option>
        <option value="jl_builder_2carousel" <?php if ( $number_col=='jl_builder_2carousel' ) echo 'selected="selected"'; ?>>2 Columns</option>
        <option value="jl_builder_3carousel" <?php if ( $number_col=='jl_builder_3carousel' ) echo 'selected="selected"'; ?>>3 Columns</option>
        <option value="jl_builder_4carousel" <?php if ( $number_col=='jl_builder_4carousel' ) echo 'selected="selected"'; ?>>4 Columns</option>
        <option value="jl_builder_5carousel" <?php if ( $number_col=='jl_builder_5carousel' ) echo 'selected="selected"'; ?>>5 Columns</option>
        <option value="jl_builder_6carousel" <?php if ( $number_col=='jl_builder_6carousel' ) echo 'selected="selected"'; ?>>6 Columns</option>
    </select></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'style_col' ) ); ?>"><strong>
            <?php esc_html_e('Carousel Style:', 'disto'); ?></strong></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'style_col' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style_col' ) ); ?>">
        <option value="car_style1" <?php if ( $style_col=='car_style1' ) echo 'selected="selected"'; ?>>Style 1</option>
        <option value="car_style2" <?php if ( $style_col=='car_style2' ) echo 'selected="selected"'; ?>>Style 2</option>
        <option value="car_style3" <?php if ( $style_col=='car_style3' ) echo 'selected="selected"'; ?>>Style 3</option>
        <option value="car_style4" <?php if ( $style_col=='car_style4' ) echo 'selected="selected"'; ?>>Style 4</option>
    </select></p>    

<p><label for="<?php echo esc_attr( $this->get_field_id( 'font_size' ) ); ?>"><strong>
            <?php esc_html_e('Font Size:', 'disto'); ?></strong></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'font_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'font_size' ) ); ?>">
        <option value="jl_fontsize13" <?php if ( $font_size=='jl_fontsize13' ) echo 'selected="selected"'; ?>>font size 13</option>
        <option value="jl_fontsize14" <?php if ( $font_size=='jl_fontsize14' ) echo 'selected="selected"'; ?>>font size 14</option>
        <option value="jl_fontsize15" <?php if ( $font_size=='jl_fontsize15' ) echo 'selected="selected"'; ?>>font size 15</option>
        <option value="jl_fontsize16" <?php if ( $font_size=='jl_fontsize16' ) echo 'selected="selected"'; ?>>font size 16</option>
        <option value="jl_fontsize17" <?php if ( $font_size=='jl_fontsize17' ) echo 'selected="selected"'; ?>>font size 17</option>
        <option value="jl_fontsize18" <?php if ( $font_size=='jl_fontsize18' ) echo 'selected="selected"'; ?>>font size 18</option>
        <option value="jl_fontsize19" <?php if ( $font_size=='jl_fontsize19' ) echo 'selected="selected"'; ?>>font size 19</option>
        <option value="jl_fontsize20" <?php if ( $font_size=='jl_fontsize20' ) echo 'selected="selected"'; ?>>font size 20</option>
        <option value="jl_fontsize21" <?php if ( $font_size=='jl_fontsize21' ) echo 'selected="selected"'; ?>>font size 21</option>
        <option value="jl_fontsize22" <?php if ( $font_size=='jl_fontsize22' ) echo 'selected="selected"'; ?>>font size 22</option>
        <option value="jl_fontsize23" <?php if ( $font_size=='jl_fontsize23' ) echo 'selected="selected"'; ?>>font size 23</option>
        <option value="jl_fontsize24" <?php if ( $font_size=='jl_fontsize24' ) echo 'selected="selected"'; ?>>font size 24</option>
        <option value="jl_fontsize25" <?php if ( $font_size=='jl_fontsize25' ) echo 'selected="selected"'; ?>>font size 25</option>
        <option value="jl_fontsize26" <?php if ( $font_size=='jl_fontsize26' ) echo 'selected="selected"'; ?>>font size 26</option>
        <option value="jl_fontsize27" <?php if ( $font_size=='jl_fontsize27' ) echo 'selected="selected"'; ?>>font size 27</option>
        <option value="jl_fontsize28" <?php if ( $font_size=='jl_fontsize28' ) echo 'selected="selected"'; ?>>font size 28</option>
        <option value="jl_fontsize29" <?php if ( $font_size=='jl_fontsize29' ) echo 'selected="selected"'; ?>>font size 29</option>
        <option value="jl_fontsize30" <?php if ( $font_size=='jl_fontsize30' ) echo 'selected="selected"'; ?>>font size 30</option>
        <option value="jl_fontsize31" <?php if ( $font_size=='jl_fontsize31' ) echo 'selected="selected"'; ?>>font size 31</option>
        <option value="jl_fontsize32" <?php if ( $font_size=='jl_fontsize32' ) echo 'selected="selected"'; ?>>font size 32</option>
        <option value="jl_fontsize33" <?php if ( $font_size=='jl_fontsize33' ) echo 'selected="selected"'; ?>>font size 33</option>
        <option value="jl_fontsize34" <?php if ( $font_size=='jl_fontsize34' ) echo 'selected="selected"'; ?>>font size 34</option>
        <option value="jl_fontsize35" <?php if ( $font_size=='jl_fontsize35' ) echo 'selected="selected"'; ?>>font size 35</option>
        <option value="jl_fontsize36" <?php if ( $font_size=='jl_fontsize36' ) echo 'selected="selected"'; ?>>font size 36</option>
        <option value="jl_fontsize37" <?php if ( $font_size=='jl_fontsize37' ) echo 'selected="selected"'; ?>>font size 37</option>
        <option value="jl_fontsize38" <?php if ( $font_size=='jl_fontsize38' ) echo 'selected="selected"'; ?>>font size 38</option>
        <option value="jl_fontsize39" <?php if ( $font_size=='jl_fontsize39' ) echo 'selected="selected"'; ?>>font size 39</option>
        <option value="jl_fontsize40" <?php if ( $font_size=='jl_fontsize40' ) echo 'selected="selected"'; ?>>font size 40</option>

    </select></p>

<?php 
    }
}
?>