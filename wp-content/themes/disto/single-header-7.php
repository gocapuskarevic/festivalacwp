<div class="jl_single_style4">
    <div class="single_content_header single_captions_overlay_bottom_image_full_width">
        <?php if ( has_post_thumbnail()) {?>
        <?php $category_image_header = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'disto_large_slider_image' ); ?>
        <div class="image-post-thumb" style="background-image: url('<?php echo esc_attr($category_image_header[0]); ?>')"></div>
        <?php }?>
        <div class="single_full_breadcrumbs_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
        <div class="single_post_entry_content_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single_post_entry_content">
                            <h1 class="single_post_title_main" itemprop="headline">
                                <?php the_title()?>
                            </h1>
                            <?php echo disto_singlepost_meta(get_the_ID()); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align:right;font-size:10px;"><?php the_post_thumbnail_caption(); ?></div>
</div>