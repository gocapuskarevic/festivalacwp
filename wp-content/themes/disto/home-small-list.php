<?php
/*
  Template Name: Home small list
 */
?>
<?php get_header();?>
<div class="jl_post_loop_wrapper jl_home_cus">
    <div class="container" id="wrapper_masonry">
        <div class="row jl_front_b_cont">
            <div class="col-md-12 jl_mid_main_3col">
            <div class="jl_3col_wrapin">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile;?>
                <?php endif; ?>
            </div>
        </div> 
        </div>
        <div class="row">
            <div class="col-md-12 grid-sidebar">
                <div class="jl_wrapper_cat">
                        <div class="jl_small_list_wrapper">
                            <div class="feature-post-list recent-post-widget jl_home_small_list">
                                <?php 
                                $disto_qry = disto_get_qry();
                                if ( $disto_qry->have_posts() ) {
                                    $row_count = 0;
                                    while ( $disto_qry->have_posts() ) { 
                                    $disto_qry->the_post();
                                        $disto_post_id = $post->ID; 
                                                $row_count++;?>
                                                    
                                <div class="jl_list_item jl_home_list3">
                                <a  href="<?php the_permalink(); ?>" class="jl_small_format feature-image-link image_post featured-thumbnail" title="<?php the_title_attribute(); ?>">              
                                <?php if ( has_post_thumbnail()) {the_post_thumbnail('disto_small_feature');}
                                else{echo '<img class="no_feature_img" src="'.esc_url(get_template_directory_uri().'/img/feature_img/small-feature.jpg').'">';} ?>
                                <div class="background_over_image"></div>
                                </a>
                                <div class="item-details">
                                    <h3 class="feature-post-title"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
                                 </div>
                            </div>
					
                        <?php
                        if($row_count %2==0){echo '<div class="clear_line_2col_home"></div>';}
                        if($row_count %3==0){echo '<div class="clear_line_3col_home"></div>';}

                     }}else{                               
                        if (is_search()) {  esc_html_e('No result found', 'disto');}                                         
                    } ?>                    
                    </div>                            
                <?php disto_pagination( $disto_qry );?>
                </div>
                </div>
                <?php wp_reset_postdata();?>
            </div>            
        </div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>