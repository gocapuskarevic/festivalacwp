<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function home_grid_overlay() {
    register_widget( 'home_grid_overlay_widget' );
}
add_action( 'widgets_init', 'home_grid_overlay' );
class home_grid_overlay_widget extends WP_Widget {

    /*-----------------------------------------------------------------------------------*/
    /*  Widget Setup
    /*-----------------------------------------------------------------------------------*/

    protected $glob;
    function __construct() {
        $widget_ops = array(
            'classname' => 'jelly_category_ajax_widget',
            'description' => esc_html__('Displays Category Posts.', 'disto'),
            'panels_groups' => array('panels')
        );
        parent::__construct('home_grid_overlay_widget', esc_html__('jellywp: Home Grid Post Overlay', 'disto'), $widget_ops);
        $this->glob=0;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Display Widget
    /*-----------------------------------------------------------------------------------*/

    public function widget( $args, $instance ) {
        $this->glob++;
        $title = apply_filters( 'widget_title', $instance['title'] );
        if (isset($instance['number_col'])==''){$number_col = 'col3';}else{$number_col = esc_attr($instance['number_col']);}
        if (isset($instance['font_size'])==''){$font_size = 'jl_fontsize16';}else{$font_size = esc_attr($instance['font_size']);}        
        if (isset($instance['jl_hide_cat'])==''){$jl_hide_cat = '';}else{$jl_hide_cat = absint($instance['jl_hide_cat']);}
        $jl_hide_cat = isset($instance["jl_hide_cat"]) ? $instance["jl_hide_cat"] : "";
        $jl_hide_author = isset($instance["jl_hide_author"]) ? $instance["jl_hide_author"] : "";
        $jl_hide_author_img = isset($instance["jl_hide_author_img"]) ? $instance["jl_hide_author_img"] : "";
        $jl_hide_date = isset($instance["jl_hide_date"]) ? $instance["jl_hide_date"] : "";        
        if (isset($instance['post_exception'])==''){$post_exception = '';}else{$post_exception = absint($instance['post_exception']);}
        if (isset($instance['number_offset'])==''){$number_offset = 0;}else{$number_offset = absint($instance['number_offset']);}
        if (isset($instance['excp_show'])==''){$excp_show = 25;}else{$excp_show = absint($instance['excp_show']);}
        if (isset($instance['post_loadmore'])==''){$post_loadmore = '';}else{$post_loadmore = absint($instance['post_loadmore']);}
        if (isset($instance['post_cat_none'])==''){$post_cat_none = '';}else{$post_cat_none = absint($instance['post_cat_none']);}
        if (isset($instance['show_post_format'])==''){$show_post_format = '';}else{$show_post_format = absint($instance['show_post_format']);}
        $post_per_cat = addslashes($instance[ 'post_per_cat' ]);
        $cat = isset($instance["cat"]) ? $instance["cat"] : '';
        if($cat !=""){$cats = implode(",",$cat);}else{$cats = "";}
        $posts = null;
        $args =  array(
        'posts_per_page'   => $post_per_cat,
        'offset'           => $number_offset,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'cat'              => $cat,
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'ignore_sticky_posts' => true
        );
        $posts_query = new WP_Query;
        $posts = $posts_query->query($args);
        $unique_block_id = rand(10000, 900000);
        ?>
<div class="jelly_homepage_builder jl_nonav_margin homepage_builder_3grid_post jl_cus_grid_overlay <?php echo esc_attr($font_size);?> <?php if($number_col=='col2'){echo " jl_cus_grid2 ";}elseif($number_col=='col4'){echo "jl_cus_grid4 ";}elseif($number_col=='col5'){echo "jl_cus_grid5 ";}else{echo "jl_cus_grid3 ";}?> <?php if($jl_hide_author == 1){echo 'jl_hide_author';}else{}?> <?php if($jl_hide_author_img == 1){echo 'jl_hide_author_img';}else{}?> <?php if($jl_hide_date == 1){echo 'jl_hide_date';}else{}?>">
    <?php if (!empty($instance['title'])) {?>
    <div class="homepage_builder_title">
        <h2>
            <?php echo esc_attr($instance["title"]);?>
        </h2>
    </div>
    <?php }
        echo '<div class="jl_wrapper_row jl-post-block-'.esc_html($unique_block_id).'">';
        echo '<div class="row">';
        $row_count=0;
        while ($posts_query->have_posts()) {
           $row_count++;
           $post_id = get_the_ID();
           $posts_query->the_post();
           $categories = get_the_category(get_the_ID());
        ?>


            <div class="col-md-4 blog_grid_post_style <?php echo "jl_row_".$row_count;?>">
                <div class="jl_grid_box_wrapper">            
        <?php $slider_large_thumb_id = get_post_thumbnail_id();
        $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_feature_image', true ); ?>
        <?php if($slider_large_thumb_id){?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
        <?php }else{?>
        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
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
            }
            echo "</span>";
            }
            }
            }
 ?>
                    <?php if($show_post_format == 1){echo disto_post_type();}else{}?>                                
                <div class="post-entry-content">                                        
                    <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                            <?php the_title()?></a></h3>
                            <?php echo disto_post_meta(get_the_ID()); ?>
                <?php if($post_exception == 1){?>
                <div class="content_post_grid">
                        <p>
                            <?php echo wp_trim_words( get_the_content(), esc_attr($excp_show), '...' );?>
                        </p>
                    </div>
                    <?php }else{}?>    
                </div>
            </div>
            </div>
            <?php 
if($number_col=='col2'){
    if($row_count %2==0){echo '<div class="clear_line_3col_home"></div>';}
}elseif($number_col=='col4'){
    if($row_count %4==0){echo '<div class="clear_line_3col_home"></div>';}
}elseif($number_col=='col5'){
    if($row_count %5==0){echo '<div class="clear_line_3col_home"></div>';}
}else{
    if($row_count %3==0){echo '<div class="clear_line_3col_home"></div>';}
}?>


            <?php }
            if($post_loadmore == 1){echo '<div class="jl-loadmore-btn-w"><a href="#" class="jl_btn_load">'.esc_html__('Load more', 'disto').'</a></div>';
            wp_add_inline_script( 'disto-custom', "(function($){ $(document).ready(function() {'use strict'; var current_page_".esc_js($unique_block_id)." = 1; $('.jl-post-block-".esc_js($unique_block_id)." .jl_btn_load').click(function(e){ e.preventDefault(); e.stopPropagation(); var button = $(this), data = {'action': 'jl_post_more','query': ".json_encode( $posts_query->query_vars , true).",'page' : current_page_".esc_js($unique_block_id).",'cat' : '".esc_js($cats)."','jl_layout' : 'postsoverlay','post_exception' : '".esc_js($post_exception)."','post_cat_none' : '".esc_js($post_cat_none)."','show_post_format' : '".esc_js($show_post_format)."','number_col' : '".esc_js($number_col)."'}; var button_default_text = button.text(); $.ajax({ url : '".esc_url(site_url())."/wp-admin/admin-ajax.php', data : data, type : 'POST', beforeSend : function ( xhr ) {button.text('');button.addClass('btn-loading'); }, success : function( data ){ if( data ) { button.text( button_default_text ); button.removeClass('btn-loading'); $('.jl-post-block-".esc_js($unique_block_id)." .jl-loadmore-btn-w').before(data); current_page_".esc_js($unique_block_id)."++; if ( current_page_".esc_js($unique_block_id)." == ".esc_js($posts_query->max_num_pages)." ) button.remove(); }else {button.remove();}}});});});})(jQuery);");
            }
            wp_reset_postdata();
            ?>

        </div>
    </div>
</div>
<?php
}

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['cat'] = $new_instance['cat'];
        $instance['post_per_cat'] = ( ! empty( $new_instance['post_per_cat'] ) ) ? strip_tags( $new_instance['post_per_cat'] ) : '';
        $instance['number_col'] =  strip_tags($new_instance['number_col']);
        $instance['font_size'] =  strip_tags($new_instance['font_size']);
        $instance['number_offset'] = absint($new_instance['number_offset']); 
        $instance['jl_hide_cat'] = esc_attr($new_instance['jl_hide_cat']);
        $instance['jl_hide_author'] = esc_attr($new_instance['jl_hide_author']);
        $instance['jl_hide_author_img'] = esc_attr($new_instance['jl_hide_author_img']);
        $instance['jl_hide_date'] = esc_attr($new_instance['jl_hide_date']);
        $instance['excp_show'] = absint($new_instance['excp_show']); 
        $instance['post_cat_none'] = esc_attr($new_instance['post_cat_none']);
        $instance['show_post_format'] = esc_attr($new_instance['show_post_format']);
        $instance['post_exception'] = esc_attr($new_instance['post_exception']);
        $instance['post_loadmore'] = esc_attr($new_instance['post_loadmore']);
        $instance['loader_img'] = ( ! empty( $new_instance['loader_img'] ) ) ? strip_tags( $new_instance['loader_img'] ) : '';
        return $instance;
    }

    /*-----------------------------------------------------------------------------------*/
    /*  Form Widget
    /*-----------------------------------------------------------------------------------*/

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {$title = $instance[ 'title' ];}else {$title = esc_html__( 'Home Small Grid', 'disto' );}
        if ( isset( $instance[ 'post_per_cat' ] ) ) {$post_per_cat = $instance[ 'post_per_cat' ];}else {$post_per_cat = "6";}
        $number_col    = isset( $instance['number_col'] ) ? esc_attr( $instance['number_col'] ) : 'col3';
        $font_size     = isset( $instance['font_size'] ) ? esc_attr( $instance['font_size'] ) : 'jl_fontsize22';
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        $jl_hide_cat = isset($instance['jl_hide_cat']) ? absint($instance['jl_hide_cat']) : '';
        $jl_hide_author = isset($instance['jl_hide_author']) ? absint($instance['jl_hide_author']) : '';
        $jl_hide_author_img = isset($instance['jl_hide_author_img']) ? absint($instance['jl_hide_author_img']) : '';
        $jl_hide_date = isset($instance['jl_hide_date']) ? absint($instance['jl_hide_date']) : '';
        $excp_show = isset($instance['excp_show']) ? absint($instance['excp_show']) : 25;
        $post_cat_none = isset($instance['post_cat_none']) ? absint($instance['post_cat_none']) : '';
        $post_exception = isset($instance['post_exception']) ? absint($instance['post_exception']) : '';
        $post_loadmore = isset($instance['post_loadmore']) ? absint($instance['post_loadmore']) : '';
        $show_post_format = isset($instance['show_post_format']) ? absint($instance['show_post_format']) : '';
        ?>

<p>
    <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong>
            <?php esc_html_e( 'Title:', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id( 'post_per_cat' )); ?>"><strong>
            <?php esc_html_e( 'Posts Per Page:', 'disto' ); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'post_per_cat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_per_cat' )); ?>" type="text" value="<?php echo esc_attr( $post_per_cat ); ?>" />
</p>
<p><label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>"><strong>
            <?php esc_attr_e('Offset posts:', 'disto'); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="text" value="<?php echo esc_attr($number_offset); ?>" size="3" />
</p>
<p class="jl_post_toshow">
    <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><strong>
            <?php esc_html_e('Choose your category:', 'disto'); ?></strong></label>

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
<p class="jlwidget_heading"><?php esc_html_e('Grid Overlay Style', 'disto'); ?></p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('post_cat_none')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('post_cat_none')); ?>" <?php if(isset($instance[ 'post_cat_none']) && $instance[ 'post_cat_none']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('post_cat_none')); ?>">Hide post category</label>
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
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('post_exception')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('post_exception')); ?>" <?php if(isset($instance[ 'post_exception']) && $instance[ 'post_exception']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('post_exception')); ?>">Enable post exception</label>
</p>
<p><label for="<?php echo esc_attr($this->get_field_id('excp_show')); ?>"><strong>
            <?php esc_attr_e('Exception text to show: EX: 200', 'disto'); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('excp_show')); ?>" name="<?php echo esc_attr($this->get_field_name('excp_show')); ?>" type="text" value="<?php echo esc_attr($excp_show); ?>" size="3" />
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('show_post_format')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('show_post_format')); ?>" <?php if(isset($instance[ 'show_post_format']) && $instance[ 'show_post_format']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('show_post_format')); ?>">Show Post Format</label>
</p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'number_col' ) ); ?>"><strong>
            <?php  echo "Grid Columns:"; ?></strong></label>
    <select id="<?php echo esc_attr( $this->get_field_id( 'number_col' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_col' ) ); ?>">
        <option value="col2" <?php if ( $number_col=='col2' ) echo 'selected="selected"'; ?>>2 Columns</option>
        <option value="col3" <?php if ( $number_col=='col3' ) echo 'selected="selected"'; ?>>3 Columns</option>
        <option value="col4" <?php if ( $number_col=='col4' ) echo 'selected="selected"'; ?>>4 Columns</option>
        <option value="col5" <?php if ( $number_col=='col5' ) echo 'selected="selected"'; ?>>5 Columns</option>
    </select></p>

<p><label for="<?php echo esc_attr( $this->get_field_id( 'font_size' ) ); ?>"><strong>
            <?php  echo "Font Size:"; ?></strong></label>
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