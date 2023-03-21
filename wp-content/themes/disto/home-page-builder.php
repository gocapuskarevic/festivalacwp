<?php
/*
  Template Name: Home Page Builder
 */
?>
<?php get_header(); ?>
<div class="jl_home_bw">
    <div class="container">
        <div class="row">
            <div class="col-md-12 jl_mid_main_3col">
                <div class="jl_3col_wrapin">
                    <?php
                    if (have_posts()) : 
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    //custom part
                    $args = array(
                        'posts_per_page' => 4,
                        'post_type'     => 'festivals',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'miscellaneous',
                                'field' => 'slug',
                                'terms' => 'srb-festivali', 
                            )
                        )
                    );

                    $post_query = new Wp_query( $args );
                    ?>
                </div>
                <div class="featured-blocks-wrapper">
                <div class="row">
                    <h3>Festivali u Srbiji</h3>
                    <?php
                    foreach( $post_query->posts as $post ) : setup_postdata( $post );
                    $post_id = get_the_ID();
                    ?>
                    <div class="col-md-3">
                        <div class="jl_related_feature_items">
                            <div class="jl_related_feature_items_in">
                                <?php if ( has_post_thumbnail()) : ?>
                                    <div class="image-post-thumb">
                                        <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('disto_large_feature_image');?>
                                            <div class="background_over_image"></div>
                                        </a>
                                    </div>
                                    <?php 
                                    echo disto_post_type();
                                    ?>
                                <?php endif; ?>
                                <div class="post-entry-content">        
                                    <h3 class="jl-post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title()?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <a href="/agenda/?q=srbija" class="btn-primary-blue">Ostali festivali u Srbiji</a>
                </div>
                </div>
                <?php  include 'home-page-blocks/focus.php'; ?>
                <?php  include 'home-page-blocks/show-case.php'; ?>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>