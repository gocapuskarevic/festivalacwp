<div class="jl_single_style3">
    <div class="single_content_header single_captions_overlay_image_full_width">
        <?php if ( has_post_thumbnail()) {?>
        <?php $category_image_header = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'disto_large_slider_image' ); ?>
        <div class="image-post-thumb" style="background-image: url('<?php echo esc_attr($category_image_header[0]); ?>')"></div>
        <?php }?>
        <div class="single_post_entry_content">
            <?php  
  $categories = get_the_category(get_the_ID()); 
          if(get_theme_mod('disable_post_category') !=1){
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }?>
            <h1 class="single_post_title_main" itemprop="headline">
                <?php the_title()?>
            </h1>
            <?php echo disto_singlepost_meta(get_the_ID()); ?>
        </div>
    </div>
</div>