<?php if(!get_theme_mod('disable_css_animation')==1){$animation_appear=" appear_animation";}else{$animation_appear="";}?>
<div <?php post_class( 'box jl_grid_layout1 blog_large_post_style'.$animation_appear); ?>>
    <?php if ( has_post_thumbnail()) {?>
    <div class="image-post-thumb">
        <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('disto_large_feature_image');?>
            <div class="background_over_image"></div>
        </a>
    </div>
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
 <?php echo disto_post_type();?> 
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
                    <?php echo disto_list_post_excerpt(40); ?>
                </p>
                
            </div>


        </div>
    </div>
</div>