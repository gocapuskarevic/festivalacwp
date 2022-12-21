<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'disto_home_large_grid_init' );

function disto_home_large_grid_init() {
    register_widget( 'disto_home_large_grid_widget' );
}

class disto_home_large_grid_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
            
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'disto_home_large_grid_widget', 
            'description' => esc_html__('Display list post.', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('disto_home_large_grid_widget', esc_html__('jellywp: Home 1st large then grid post', 'disto'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/

    function widget($args, $instance) {
        extract($args);

        $titles = apply_filters('widget_title', empty($instance['titles']) ? 'Recent Posts' : $instance['titles'], $instance, $this->id_base);
        $subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : '';
        if (isset($instance['number_offset'])==''){$number_offset = 0;}else{$number_offset = absint($instance['number_offset']);}
        $jl_postide = isset($instance["jl_postide"]) ? $instance["jl_postide"] : "";
        if (isset($instance['post_loadmore'])==''){$post_loadmore = '';}else{$post_loadmore = absint($instance['post_loadmore']);}
        if (isset($instance['number_show'])==''){$number_show = 0;}else{$number_show = absint($instance['number_show']);}
        if (isset($instance['post_cat_none'])==''){$post_cat_none = '';}else{$post_cat_none = absint($instance['post_cat_none']);}
        if (isset($instance['show_post_format'])==''){$show_post_format = '';}else{$show_post_format = absint($instance['show_post_format']);}
        $cat = isset($instance["cats"]) ? $instance["cats"] : '';
        if($cat !=""){$cats = implode(",",$cat);}else{$cats = "";}
        if($jl_postide){$jl_postide = explode(",",$jl_postide);}else{$jl_postide = "";}
        $posts = null;
        $args =  array(
        'posts_per_page'   => $number_show,
        'offset'           => $number_offset,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'cat'              => $cat,
        'post__not_in'     => $jl_postide,
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'ignore_sticky_posts' => true
        );

        $posts_query = new WP_Query;
        $posts = $posts_query->query($args);
        $unique_block_id = rand(10000, 900000);

        echo '<div class="jl_nonav_margin jelly_homepage_builder jl_large_grid jl-post-block-'.esc_html($unique_block_id).'">';
        echo '<div class="row jl_lg_row">';
        if (!empty($instance['titles'])) {?>
    <div class="homepage_builder_title">
        <div class="col-md-12">
        <h2 class="builder_title_home_page">
            <?php echo esc_attr($instance["titles"]);?>
        </h2>
        <?php if ($subtitle){?><span class="jl_hsubt"><?php echo esc_attr($subtitle);?></span><?php }?>
    </div>
    </div>
    <?php }?>
    <?php
           $rowcount= 0;
           while ($posts_query->have_posts()) {
           $rowcount ++;
           $post_id = get_the_ID();
           $posts_query->the_post();
           $categories = get_the_category(get_the_ID());
            if($rowcount == 1){
        ?>
<div class="col-md-12">
<div class="jl_large_builder jelly_homepage_builder">        
<div class="box jl_grid_layout1 blog_large_post_style">
    <?php if ( has_post_thumbnail()) {?>
    <div class="jl_front_l_w">
    <?php $slider_large_thumb_id = get_post_thumbnail_id();
        $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_slider_grid_large', true ); ?>
        <?php if($slider_large_thumb_id){?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
        <?php }else{?>
        <span class="image_grid_header_absolute"></span>
        <?php }?>
        <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute" title="<?php the_title_attribute(); ?>"></a>

     <?php 
        if($post_cat_none == 1){}else{
        if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              $title_reactions = get_term_meta($tag->term_id, "disto_cat_reactions", true);
             if($title_reactions){}else{echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';}
            }echo "</span>";}}}?>
 <?php if($show_post_format == 1){echo disto_post_type();}else{}?>                
</div>
    <?php }?>
<div class="jl_post_title_top jl_large_format">       
        <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                <?php the_title()?></a></h3>
        <?php echo disto_single_post_meta(get_the_ID()); ?>
    </div>
    <div class="post-entry-content">
        <div class="post-entry-content-wrapper">
            <div class="large_post_content">
                <p>
                   <?php echo wp_trim_words( get_the_content(), 34, '...' );?>
                </p>
                <div class="jl_large_sw">
                 <a href="<?php the_permalink();?>" class="jl_large_more"><?php echo esc_html__('Read More', 'disto')?></a>             
                <?php if(function_exists('disto_share_footer_link')){echo disto_share_footer_link(get_the_ID());}?>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php }else{?>
<div class=" jelly_homepage_builder homepage_builder_3grid_post jl_cus_grid2 jl_fontsize22 colstyle1">
<div class="col-md-4 blog_grid_post_style  <?php echo "jl_row_".$rowcount;?>">
             <div class="jl_grid_box_wrapper">
                <div class="image-post-thumb">
                    <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                        <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_large_feature_image');
                        }else{echo '<img class="no_feature_img" src="'.esc_url(get_template_directory_uri().'/img/feature_img/carousel-image-header-style.jpg').'">';} ?>
                        <div class="background_over_image"></div>
                    </a>
                    <?php 
    if($post_cat_none == 1){}else{
        if(get_theme_mod('disable_post_category') !=1){
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
            }}}?>
                <?php if($show_post_format == 1){echo disto_post_type();}else{}?>                
                </div>
                <div class="post-entry-content">                                        
                    <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                            <?php the_title()?></a></h3>
                            <?php echo disto_post_meta(get_the_ID()); ?>
                <div class="content_post_grid">
                <p><?php echo wp_trim_words( get_the_content(), 19, '...' ); ?></p>
                </div>
                </div>
                </div>
            </div>
            </div>
<?php }?>



    <?php }
            if($post_loadmore == 1){echo '<div class="jl-loadmore-btn-w"><a href="#" class="jl_btn_load">'.esc_html__('Load more', 'disto').'</a></div>';
            wp_add_inline_script( 'disto-custom', "(function($){ $(document).ready(function() {'use strict'; var current_page_".esc_js($unique_block_id)." = 1; $('.jl-post-block-".esc_js($unique_block_id)." .jl_btn_load').click(function(e){ e.preventDefault(); e.stopPropagation(); var button = $(this), data = {'action': 'jl_post_more','query': ".json_encode( $posts_query->query_vars , true).",'page' : current_page_".esc_js($unique_block_id).",'cat' : '".esc_js($cats)."','jl_layout' : 'postslg'}; var button_default_text = button.text(); $.ajax({ url : '".esc_url(site_url())."/wp-admin/admin-ajax.php', data : data, type : 'POST', beforeSend : function ( xhr ) {button.text('');button.addClass('btn-loading'); }, success : function( data ){ if( data ) { button.text( button_default_text ); button.removeClass('btn-loading'); $('.jl-post-block-".esc_js($unique_block_id)." .jl-loadmore-btn-w').before(data); current_page_".esc_js($unique_block_id)."++; if ( current_page_".esc_js($unique_block_id)." == ".esc_js($posts_query->max_num_pages)." ) button.remove(); }else {button.remove();}}});});});})(jQuery);");
            }
            wp_reset_postdata();
    ?>
</div>
</div>
<?php }
/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['titles'] = strip_tags($new_instance['titles']);
        $instance['subtitle'] = strip_tags($new_instance['subtitle']);
        $instance['number_show'] = absint($new_instance['number_show']);  
        $instance['number_offset'] = absint($new_instance['number_offset']);  
        $instance['jl_postide'] = ( ! empty( $new_instance['jl_postide'] ) ) ? strip_tags( $new_instance['jl_postide'] ) : '';
        $instance['post_loadmore'] = esc_attr($new_instance['post_loadmore']);        
        $instance['post_cat_none'] = esc_attr($new_instance['post_cat_none']);
        $instance['show_post_format'] = esc_attr($new_instance['show_post_format']);
        $instance['cats'] = $new_instance['cats'];
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
    function form( $instance ) {
        $titles = isset($instance['titles']) ? esc_attr($instance['titles']) : 'Post large then grid';
        $subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : '';
        $number_show = isset($instance['number_show']) ? absint($instance['number_show']) : 5;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        if ( isset( $instance[ 'jl_postide' ] ) ) {$jl_postide = $instance[ 'jl_postide' ];}else {$jl_postide = "";}
        $post_cat_none = isset($instance['post_cat_none']) ? absint($instance['post_cat_none']) : '';
        $post_loadmore = isset($instance['post_loadmore']) ? absint($instance['post_loadmore']) : '';
        $show_post_format = isset($instance['show_post_format']) ? absint($instance['show_post_format']) : '';
        ?>
<p><label for="<?php echo esc_attr($this->get_field_id('titles')); ?>">
        <?php esc_attr_e('Title:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('titles')); ?>" name="<?php echo esc_attr($this->get_field_name('titles')); ?>" type="text" value="<?php echo esc_attr($titles); ?>" /></p>
<p><label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php esc_html_e('Sub Title:', 'disto'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>" /></p>
<p><label for="<?php echo esc_attr($this->get_field_id('number_show')); ?>">
        <?php esc_attr_e('Number of posts to show:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_show')); ?>" name="<?php echo esc_attr($this->get_field_name('number_show')); ?>" type="text" value="<?php echo esc_attr($number_show); ?>" size="3" /></p>
<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_attr_e('Offset posts:', 'disto'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" /></p>
<p class="jl_post_id">
    <label for="<?php echo esc_attr($this->get_field_id( 'jl_postide' )); ?>"><strong>
            <?php esc_html_e( 'Exclude Posts ID: EX(1,2,3,4)', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'jl_postide' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'jl_postide' )); ?>" type="text" value="<?php echo esc_attr( $jl_postide ); ?>" />
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('post_loadmore')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('post_loadmore')); ?>" <?php if(isset($instance[ 'post_loadmore']) && $instance[ 'post_loadmore']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('post_loadmore')); ?>">Enable load more pagination</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('post_cat_none')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('post_cat_none')); ?>" <?php if(isset($instance[ 'post_cat_none']) && $instance[ 'post_cat_none']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('post_cat_none')); ?>">Disable post category</label>
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('show_post_format')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('show_post_format')); ?>" <?php if(isset($instance[ 'show_post_format']) && $instance[ 'show_post_format']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('show_post_format')); ?>">Show Post Format</label>
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