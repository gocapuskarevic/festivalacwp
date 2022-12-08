<?php get_header();?>
<?php
if (have_posts()) { while (have_posts()) { the_post();
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

                                <?php 
                                if (is_active_sidebar('jl_ads_before_content')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_before_content');echo '</div>'; endif;
                                echo '<h2 class="festival-heading-level-2">';
                                    echo 'O festivalu';
                                echo '</h2>';
                                the_content();
                                ?>
                                <div class="smislicemo">
                                    <a href="<?php the_field('tickets'); ?>" class="btn-primary">Karte</a>
                                    <a href="<?php the_field('official_website'); ?>" class="btn-primary">Festivalski websajt</a>
                                </div>

                                <div class="meta-data">
                                    <h2>Bitne informacije</h2>
                                    <p>Datumi:</p>
                                    <?php 
                                        the_field('start_date');
                                        echo '<br>';
                                        the_field('end_date');
                                        //get the taxonomies
                                        $location = get_the_terms( get_the_ID(), 'locations' );
                                        $genres = get_the_terms( get_the_ID(), 'genres' );
                                        $size = get_the_terms( get_the_ID(), 'sizes' );
                                        $lasting = get_the_terms( get_the_ID(), 'numberofdays' );
                                    ?>
                                        
                                    <p>Lokacija: <?php echo $location[0]->name; ?></p>
                                    <p>Zanrovi</p>
                                    <div class="meta-category-small">
                                        <?php
                                            $link = get_site_url();
                                            foreach( $genres as $genre ){
                                                echo '<a href="'.$link.'/genre/'.$genre->slug.'">'.$genre->name.'</a>';
                                            }
                                        ?>
                                    </div>
                                    <div>
                                        <p>Velicina <?php echo $size[0]->name; ?></p>
                                        <p>Trajanje <?php echo $lasting[0]->name; ?></p>
                                    </div>
                                </div>
                                <?php if( $poster || $video ) : ?>
                                    <div class="container">
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
                                                    <div style="width:500px;"><?php echo $video; ?></div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php
                                    if (is_active_sidebar('jl_ads_after_content')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_after_content');echo '</div>'; endif;
                                ?>
                            </div>
                            <?php wp_link_pages( array( 'before' => '<ul class="page-links">', 'after' => '</ul>', 'link_before' => '<li class="page-link">', 'link_after' => '</li>' ) ); ?>
                            <div class="clearfix"></div>
                            <div class="single_tag_share">
                                <?php  if(get_theme_mod('disable_post_tag') !=1){?>
                                    <div class="tag-cat">
                                    <?php if (!empty($tags)){ ?>
                                    <?php the_tags('<ul class="single_post_tag_layout"><li>', '</li><li>', '</li></ul>'); ?>
                                    <?php } ?>
                                    </div>
                                <?php }?>

                                <?php if(get_theme_mod('disable_post_share') !=1){
                                    if(function_exists('disto_single_share_link')){?>
                                    <div class="single_post_share_icons">
                                        <?php esc_html_e('Share', 'disto'); ?><i class="fa fa-share-alt"></i></div>
                                    <?php }}?>
                                    </div>
                                <?php if(get_theme_mod('disable_post_share') !=1){ if(function_exists('disto_single_share_link')){echo disto_single_share_link(get_the_ID());}}?>                            

                                <?php
                                    if(get_theme_mod('disable_post_nav') !=1){
                                    $prev_post = get_previous_post();
                                    if (!empty($prev_post)){
                                    ?>
                                <div class="postnav_left">
                                    <div class="single_post_arrow_content">                                    
                                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" id="prepost">
                                            <?php echo esc_attr($prev_post->post_title); ?>
                                            <span class="jl_post_nav_left">
                                                <?php esc_html_e('Previous post', 'disto'); ?></span></a>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php
                                    $next_post = get_next_post();
                                    if (!empty($next_post)){
                                    ?>
                                <div class="postnav_right">
                                    <div class="single_post_arrow_content">                                    
                                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" id="nextpost">
                                            <?php echo esc_attr($next_post->post_title); ?>
                                            <span class="jl_post_nav_left">
                                                <?php esc_html_e('Next post', 'disto'); ?></span></a>
                                    </div>
                                </div>
                                <?php }} ?>


                                <?php  if(get_theme_mod('disable_post_author') !=1){
                                if(get_the_author_meta('description')){?>
                                <div class="auth">
                                    <div class="author-info">
                                        <div class="author-avatar">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), 165); ?>
                                        </div>
                                        <div class="author-description">
                                            <h5><a itemprop="author" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ))); ?>">
                                                    <?php the_author_meta( 'display_name' ); ?></a></h5>
                                            <p itemprop="description">
                                                <?php echo get_the_author_meta('description'); ?>
                                            </p>
                                            <?php if(function_exists('disto_author_contact')){echo disto_author_contact(get_the_ID());}?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>

                                <?php } ?>

                                <?php } // end of the loop.   ?>

                                <?php if(get_theme_mod('disable_post_related') !=1){?>
                                <div class="related-posts">
                                <?php if (is_active_sidebar('jl_ads_before_related')) : echo '<div class="jl_ads_section">'; dynamic_sidebar('jl_ads_before_related');echo '</div>'; endif;?>  
                                    <h4>
                                        <?php esc_html_e('Related Articles', 'disto'); ?>
                                    </h4>

                                    <div class="single_related_post">

                            <?php
                            $args = array(
                            'posts_per_page' => 4,
                            'post__not_in'   => array( get_the_ID() ),
                            'no_found_rows'  => true,
                            );

                            $cats = wp_get_post_terms( get_the_ID(), 'category' ); 
                            $cats_ids = array();  
                            foreach( $cats as $related_cat ) {
                                $cats_ids[] = $related_cat->term_id; 
                            }
                            if ( ! empty( $cats_ids ) ) {
                                $args['category__in'] = $cats_ids;
                            }

                            $post_query = new wp_query( $args );

                            $post_count = 0;
                        
                            foreach( $post_query->posts as $post ) { setup_postdata( $post );    
                                
                                $post_id = get_the_ID();
                                $categories = get_the_category(get_the_ID());
                                $post_count ++;
                                ?>
                                <div class="jl_related_feature_items">
                                    <div class="jl_related_feature_items_in">
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
                                            echo disto_post_type();
                                        ?> 
                                        <div class="post-entry-content">        
                                            <h3 class="jl-post-title"><a href="<?php the_permalink(); ?>">
                                            <?php the_title()?></a></h3>
                                            <?php echo disto_post_meta(get_the_ID()); ?>
                                        </div>

                                    </div>
                                </div>


                                <?php if($post_count%2==0){echo '<div class="clear_2col_related"></div>';}elseif($post_count%3==0){echo '<div class="clear_3col_related"></div>';}?>
                                <?php } wp_reset_postdata(); ?>
                            </div>

                        </div>
                    <?php } ?>
                    <!-- comment -->                            
                    
                    </div>
                </div>
                <!-- end post -->
                <div class="brack_space"></div>
            </div>
        </div>

        <?php if(!empty($full)){}else{?>
                    <div class="col-12" id="sidebar">
                    <?php echo disto_post_sidebar();?>
                    <div class="brack_space"></div>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<!-- end content -->
<?php get_footer(); ?>