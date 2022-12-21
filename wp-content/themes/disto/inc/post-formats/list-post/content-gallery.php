<?php if(!get_theme_mod('disable_css_animation')==1){$animation_appear=" appear_animation";}else{$animation_appear="";}?>
<div <?php post_class( 'blog_list_post_style'.$animation_appear); ?>>
   <div class="<?php if(!get_theme_mod('disable_css_animation')==1){echo " appear_animation ";}else{echo " ";}?>">        
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
                    <?php echo disto_list_post_excerpt(20); ?>
                </p>
            </div>
        </div>
    </div>
</div>