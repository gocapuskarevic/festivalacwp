<?php get_header();?>
<div class="festivals-single">

    <?php
    if (have_posts()) { while (have_posts()) { the_post();
    $coat_of_arms = get_field('coat_of_arms_of_festival');
    $poster = get_field('announcement_poster');
    $video = get_field('youtube_link');
    $categories = get_the_category();
    $tags = get_the_tags();
    $post_id = get_the_ID();
    $full = get_post_meta( get_the_ID(), 'single_post_full_single_post_full', true );
    $post_layout_display = get_post_meta( $post_id, 'single_post_layout', true );
    get_template_part('single-header-7');
    ?>

    <section id="content_main" class="clearfix jl_spost">
        <div class="container">
            <div class="row main_content">
                <div class="col-md-12 enable_single_post_full loop-large-post" id="content">
                    <div class="widget_container content_page">
                        <!-- start post -->
                        <div <?php post_class(); ?> id="post-<?php the_ID();?>">
                            <div class="single_section_content box blog_large_post_style">
                                    
                                <div class="post_content" itemprop="articleBody">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                                if (is_active_sidebar('jl_ads_before_content')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_before_content');echo '</div>'; endif;
                                                    echo '<h2 class="festival-heading-level-2">';
                                                        echo 'O festivalu';
                                                    echo '</h2>';
                                                    the_content();
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="meta-data">
                                                <h2>Bitne informacije</h2>
                                                <span><b>Datumi:</b></span>
                                                
                                                <div>
                                                    <p>Početak: <?php the_field('start_date'); ?></p>
                                                    <p>Kraj: <?php the_field('end_date'); ?></p>
                                                </div>
                                                <?php
                                                    //get the taxonomies
                                                    $location = get_the_terms( get_the_ID(), 'locations' );
                                                    $genres = get_the_terms( get_the_ID(), 'genres' );
                                                    $size = get_the_terms( get_the_ID(), 'sizes' );
                                                    $lasting = get_the_terms( get_the_ID(), 'numberofdays' );
                                                ?>
                                                    
                                                <p><b>Lokacija: </b><?php echo $location[0]->name; ?></p>
                                                <p><b>Zanrovi: </b></p>
                                                <div class="meta-category-small">
                                                    <?php
                                                        $link = get_site_url();
                                                        foreach( $genres as $genre ){
                                                            echo '<a href="'.$link.'/genre/'.$genre->slug.'">'.$genre->name.'</a>';
                                                        }
                                                    ?>
                                                </div>
                                                <div>
                                                    <p><b>Velicina: </b> <?php echo $size[0]->name; ?></p>
                                                    <p><b>Trajanje: <b><?php echo $lasting[0]->name; ?> dana</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <h3>Externe informacije</h3>
                                        <div class="flex">
                                            <div class="image">
                                                <?php if($coat_of_arms) echo '<img src="'. $coat_of_arms .'" width="350px">'; ?>
                                            </div>
                                            <div class="links">
                                                <a href="<?php the_field('tickets'); ?>" class="btn-primary">Karte</a>
                                                <a href="<?php the_field('official_website'); ?>" class="btn-primary">Festivalski websajt</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <h3>Lineup - to be implemented</h3>
                                        
                                    </div>

                                    <?php
                                    if( $poster || $video ) : ?>
                                        <div class="row">
                                        <?php if( $poster ) : ?>
                                            <div class="col-md-6">
                                                <h3 class="poster">Poster</h3>
                                                <img src="<?php echo $poster; ?>" width="350px">
                                            </div>
                                        <?php endif; ?>
                                        <?php if( $video ) : ?>
                                            <div class="col-md-6">
                                                <h3 class="video">Video</h3>
                                                    <div><?php echo $video; ?></div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if(get_theme_mod('disable_post_share') !=1){
                                        if(function_exists('disto_single_share_link')){?>
                                        <div class="single_post_share_icons">
                                            <?php esc_html_e('Share', 'disto'); ?><i class="fa fa-share-alt"></i></div>
                                        <?php }}?>
                                        </div>
                                    <?php if(get_theme_mod('disable_post_share') !=1){ if(function_exists('disto_single_share_link')){echo disto_single_share_link(get_the_ID());}}?>                            

                                    

                                <?php } ?>

                            <?php } // end of the loop.   ?>

                            <div class="related-posts">
                                    <?php
                                    $cat = get_the_category();
                                    if($cat[0]->term_id)
                                            $args = array('cat' => $cat[0]->term_id, 'posts_per_page' => 4);
                                            $category_posts = new WP_Query($args);
                                            if( $category_posts->have_posts() ) : ?>
                                                <div class="row">
                                                    
                                                <h3>Povezane vesti</h3>
                                                <?php while( $category_posts->have_posts() ) : $category_posts->the_post(); ?>
                                                    <div class="col-md-6">
                                                        <div class="jl_related_feature_items">
                                                            <div class="jl_related_feature_items_in">
                                                                <div class="image-post-thumb">
                                                                    <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                                                                        <?php the_post_thumbnail('disto_large_feature_image');?>
                                                                        <div class="background_over_image"></div>
                                                                        <div class="post-entry-content">        
                                                                            <h3 class="jl-post-title" style="margin-top:30px">
                                                                                <?php the_title()?>
                                                                            </h3>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php endwhile; wp_reset_postdata(); ?>
                                                </div>
                                            <?php endif; ?>
                            
                                </div>

                            </div>                
                        
                        </div>
                    </div>
                    <!-- end post -->
                    <div class="brack_space"></div>
                </div>
            </div>

            </div>
        </div>
    </section>
</div>
<!-- end content -->
<?php get_footer(); ?>
