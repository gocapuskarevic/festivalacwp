<div class="jl_single_style2">
    <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
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

    <?php 
if (is_active_sidebar('jl_ads_under_post_title')) : echo '<div class="jl_ads_u_title image_ads_bl">'; dynamic_sidebar('jl_ads_under_post_title');echo '</div>'; endif;               

    if(has_post_format('gallery')){ ?>
    <div class="single_content_header jl_single_feature_below">
        <div class="image-post-thumb jlsingle-title-above">
            <div class="justified-gallery-post">
                <?php $image_gallery_val = get_post_meta( get_the_ID(), 'gallery_post_format' , true);
if($image_gallery_val !== ""){
      $image_gallery_array = explode(',',$image_gallery_val);
      if(isset($image_gallery_array) && count($image_gallery_array)!= 0):
      foreach($image_gallery_array as $gimg_id):
      $the_image = wp_get_attachment_image_src( $gimg_id, 'disto_justify_feature' );?>
                <a class="featured-thumbnail" href="<?php echo esc_url($the_image[0]); ?>">
                    <img src="<?php echo esc_url($the_image[0]); ?>" />
                    <div class="background_over_image"></div>
                </a>
                <?php endforeach;
      endif;
      }?>
            </div>
        </div>
    </div>
    <?php }elseif(has_post_format('quote')){?>
    <div class="single_content_header">
        <div class="image-post-thumb jlsingle-title-above">

            <?php if(get_post_meta( $post->ID, 'quote_post_title', true )){?>
            <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_justify_feature', true ); ?>
            <?php if($slider_large_thumb_id){?>
            <div class="qoute_large_background image_grid_header_absolute" style="background-image: url('<?php echo esc_attr($slider_large_image_header[0]); ?>')">
                <?php }else{?>
                <div class="qoute_large_background image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')">
                    <?php }?>
                    <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute" title="<?php the_title_attribute(); ?>"></a>
                    <div class="qoute_large_content_inside">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                        <p class="quote_text_des">
                            <?php echo get_post_meta( $post->ID, 'quote_post_title', true ); ?>
                        </p>
                        <p class="quote_source">
                            <?php echo get_post_meta( $post->ID, 'quote_post_author', true ); ?>
                        </p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }elseif(has_post_format('video')){?>
        <div class="single_content_header jl_single_feature_below">
            <div class="image-post-thumb jlsingle-title-above">
                <?php
                 $format_video_post = get_post_meta( $post->ID, 'video_post_embed', true );
                 $format_video_local = get_post_meta( $post->ID, 'video_post_link', true );
                 if($format_video_post){
                  echo get_post_meta( $post->ID, 'video_post_embed', true );
                 }else{
                echo do_shortcode('[video width="1280" height="720" mp4="'.esc_url($format_video_local).'"][/video]');
                }?>
            </div>
        </div>
        <?php }elseif(has_post_format('audio')){?>
        <div class="single_content_header jl_single_feature_below">
            <div class="image-post-thumb jlsingle-title-above">
                <?php $audio_embed = get_post_meta( $post->ID, 'auto_post_embed', true );
      if($audio_embed !=""){
        echo get_post_meta( $post->ID, 'auto_post_embed', true );
      }else{ ?>
                <?php $audio_url_host = get_post_meta( $post->ID, 'auto_post_link', true );
      if ( has_post_thumbnail()) {the_post_thumbnail('disto_justify_feature');}
      echo do_shortcode('[audio mp3="'.esc_url($audio_url_host).'"][/audio]');
      }?>
            </div>
        </div>
        <?php }else{?>
        <div class="single_content_header jl_single_feature_below">
            <div class="image-post-thumb jlsingle-title-above">
                <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_justify_feature');}?>
            </div>
        </div>
        <?php }?>
    </div>