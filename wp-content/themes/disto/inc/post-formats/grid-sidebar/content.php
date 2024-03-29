<?php if(get_theme_mod('disable_css_animation')==1){$animation_appear='';}else{$animation_appear='fade-up';}?>
<div <?php post_class( 'box jl_grid_layout1 blog_grid_post_style');?> <?php echo 'data-aos="'.esc_attr($animation_appear).'"';?>>
    <div class="post_grid_content_wrapper">
        <?php if ( has_post_thumbnail()) {?>
        <div class="image-post-thumb">
            <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('disto_large_feature_image');?>
                <div class="background_over_image"></div>
            </a>
            <?php echo disto_post_type();?>                
        </div>
        <?php }?>
        <div class="post-entry-content">
            <div class="post-entry-content-wrapper">
                <div class="large_post_content">                    
                    <h3 class="image-post-title"><a href="<?php the_permalink(); ?>">
                            <?php the_title()?></a></h3>
                    <?php echo disto_post_meta(get_the_ID()); ?>
                </div>
            </div>
        </div>
    </div>
</div>