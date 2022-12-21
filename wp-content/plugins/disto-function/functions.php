<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function disto_share_footer_link( $post_id ) {?>
            <ul class="jl_footer_social">
            <li><a href="http://www.facebook.com/share.php?u=<?php echo esc_url(get_permalink());?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title();?>&url=<?php echo esc_url(get_permalink());?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>

            <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_permalink());?>&media=<?php if ( has_post_thumbnail()) {$thumbnail_pin_id = get_post_thumbnail_id(); if( !empty($thumbnail_pin_id) ){ $thumbnail_pin = wp_get_attachment_image_src( $thumbnail_pin_id , 'slider-normal' );} echo esc_attr($thumbnail_pin[0]);}?>" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
            </ul>
    <?php }

function disto_single_share_link( $post_id ) {?>
<div class="single_post_share_wrapper">
<div class="single_post_share_icons social_popup_close"><i class="fa fa-close"></i></div>
<ul class="single_post_share_icon_post">
    <li class="single_post_share_facebook"><a href="http://www.facebook.com/share.php?u=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <li class="single_post_share_twitter"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title();?>&url=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
    <li class="single_post_share_pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_permalink());?>&media=<?php if ( has_post_thumbnail()) {$thumbnail_pin_id = get_post_thumbnail_id(); if( !empty($thumbnail_pin_id) ){ $thumbnail_pin = wp_get_attachment_image_src( $thumbnail_pin_id , 'slider-normal' );} echo esc_attr($thumbnail_pin[0]);}?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
    <li class="single_post_share_linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink());?>&title=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
    <li class="single_post_share_ftumblr"><a href="http://www.tumblr.com/share/link?url=<?php echo esc_url(get_permalink());?>&name=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
    <li class="single_post_share_whatsapp"><a style="background: #24cc3b;" href="https://api.whatsapp.com/send?text=<?php echo get_the_title();?>%20%0A%0A%20<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
</ul>
</div>
    <?php }
function hook_header() {
        if (! is_404() ) {          
            $thumbnail_id = get_post_thumbnail_id();
            if( !empty($thumbnail_id) ){
                $thumbnail = wp_get_attachment_image_src( $thumbnail_id , '1000x500' );?>
                <meta property="og:image" content="<?php echo esc_url($thumbnail[0])?>" />      
            <?php }     
        }
}
add_action('wp_head','hook_header');

    //Woocommerce
if (!function_exists('disto_loop_columns')) {  
    function disto_loop_columns() {  
        return 3;
    }  
}  
add_filter('loop_shop_columns', 'disto_loop_columns'); 
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'disto_jellywp_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'disto_jellywp_theme_wrapper_end', 10);

function disto_jellywp_theme_wrapper_start() {
    echo '<div class="container main-content">';
}
function disto_jellywp_theme_wrapper_end() {
    echo '</div>';
}
add_theme_support( 'woocommerce' ); 

add_filter( 'woocommerce_show_page_title' , 'disto_woo_hide_page_title' );
function disto_woo_hide_page_title() {  
    return false;
}    

/**  Grid Post */
if(!function_exists('jl_ajax_more_post')):
function jl_ajax_more_post(){
  global $wp_query;
  $jl_layout = esc_html($_POST['jl_layout']);
  $number_col = esc_html($_POST['number_col']);
  $post_exception = esc_html($_POST['post_exception']);
  $post_cat_none = esc_html($_POST['post_cat_none']);
  $show_post_format = esc_html($_POST['show_post_format']);  
  $args = $_POST['query'];
  $q_args['paged'] = $_POST['page'] + 1;
  $q_args['cat'] = $_POST['cat'];
  if($jl_layout=="postslg"){
  $q_args['posts_per_page'] = $args['posts_per_page'] - 1;
  }else{
  $q_args['posts_per_page'] = $args['posts_per_page'];  
  }
  $q_args['orderby'] = $args['orderby'];
  $q_args['order'] = $args['order'];
  $q_args['post_type'] = $args['post_type'];
  $q_args['post_status'] = $args['post_status'];
  $q_args['meta_key'] = $args['meta_key'];
  $q_args['meta_value'] = $args['meta_value'];
  $q_args['suppress_filters'] = $args['suppress_filters'];

  
  $posts_query = new WP_Query;
  $posts = $posts_query->query($q_args);
  if ( $posts_query->have_posts() ) :
  $row_count=0;
  while ($posts_query->have_posts()):
    $posts_query->the_post();
    $row_count++;
      if($jl_layout=="postsgrid"){
      ?>
        <div class="col-md-4 blog_grid_post_style" data-aos="fade-up">
<div class="jl_grid_box_wrapper">
                <div class="image-post-thumb">
                    <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                        <?php if ( has_post_thumbnail()) {
                            if($number_col=='col2'){
                            the_post_thumbnail('disto_large_feature_image');
                            }elseif($number_col=='col3'){
                            the_post_thumbnail('disto_large_feature_image');    
                            }else{
                            the_post_thumbnail('disto_slider_grid_small');
                            }
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
                    <?php if($post_exception == 1){?>
                <div class="content_post_grid">
                        <p><?php echo wp_trim_words( get_the_content(), 19, '...' ); ?></p>
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
}
}//end grid layout
elseif($jl_layout=="postslist"){?>
<div class="blog_list_post_style" data-aos="fade-up">
        <div class="image-post-thumb featured-thumbnail home_page_builder_thumbnial">
            <div class="jl_img_container">
                <?php $slider_large_thumb_id = get_post_thumbnail_id();
            $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_feature_image', true ); ?>
                <?php if($slider_large_thumb_id){?>
                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                <?php }else{?>
                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                <?php }?>
                <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>
            </div>
        </div>
        <div class="post-entry-content">
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
            <?php echo disto_post_meta_dc(get_the_ID()); ?>
            <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                    <?php the_title()?></a></h3>
            <div class="large_post_content">
                <p>
                    <?php echo wp_trim_words( get_the_content(), 23, '...' );?> 
                </p>
            </div>
        </div>
    </div>
<?php }
elseif($jl_layout=="postslarge"){?>
<div class="box jl_grid_layout1 blog_large_post_style" data-aos="fade-up">
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

     <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              $title_reactions = get_term_meta($tag->term_id, "disto_cat_reactions", true);
             if($title_reactions){}else{echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';}
            }echo "</span>";}}?>
 <?php echo disto_post_type();?> 
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
<?php } //end large layout
elseif($jl_layout=="postsoverlay"){?>
<div class="col-md-4 blog_grid_post_style <?php echo "jl_row_".$row_count;?>" data-aos="fade-up">
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
<?php } //end grid overlay
elseif($jl_layout=="postslg"){?>
<div class=" jelly_homepage_builder homepage_builder_3grid_post jl_cus_grid2 jl_fontsize22 colstyle1" data-aos="fade-up">
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
<?php } //end large grid layout
elseif($jl_layout=="postsll"){?>
<div class="col-md-12" data-aos="fade-up">
<div class="post_list_medium_widget page_builder_listpost jelly_homepage_builder">
<div class="blog_list_post_style">
        <div class="image-post-thumb featured-thumbnail home_page_builder_thumbnial">
            <div class="jl_img_container">
                <?php $slider_large_thumb_id = get_post_thumbnail_id();
            $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_feature_image', true ); ?>
                <?php if($slider_large_thumb_id){?>
                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                <?php }else{?>
                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                <?php }?>
                <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>
                <?php echo disto_post_type();?>
            </div>
        </div>
        <div class="post-entry-content">
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
            <?php echo disto_post_meta_dc(get_the_ID()); ?>
            <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                    <?php the_title()?></a></h3>
            <div class="large_post_content">
                <p>
                    <?php echo wp_trim_words( get_the_content(), 23, '...' );?> 
                </p>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php } //end large list layout
    endwhile;
  endif;
  die;
}
endif;
add_action('wp_ajax_jl_post_more', 'jl_ajax_more_post');
add_action('wp_ajax_nopriv_jl_post_more', 'jl_ajax_more_post');
?>