<div class="jl_single_style8">
    <div class="single_captions_aboves_image_full_width_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <div class="jl_single_full_box">
                        
                        <?php $slider_large_thumb_id = get_post_thumbnail_id();
                                $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                                <?php if($slider_large_thumb_id){?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                <?php }else{}?>
                                <span class="link_grid_header_absolute"></span>
                        
                        <div class="single_post_entry_content single_post_caption_full_width_format">
                            <?php  
    if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small single_meta_category">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              $title_reactions = get_term_meta($tag->term_id, "disto_cat_reactions", true);
             if($title_reactions){}else{echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';}
            }
            echo "</span>";
            }
            }?>
                            <h1 class="single_post_title_main" itemprop="headline">
                                <?php the_title()?>
                            </h1>
                            <?php $jl_sub_post_title = get_post_meta( get_the_ID(), 'single_post_subtitle', true ); ?>
                            <?php if ($jl_sub_post_title){?>
                            <p class="post_subtitle_text" itemprop="description">
                                <?php echo get_post_meta( get_the_ID(), 'single_post_subtitle', true ); ?>
                            </p>
                            <?php }?>
                            <?php echo disto_singlepost_meta(get_the_ID()); ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>