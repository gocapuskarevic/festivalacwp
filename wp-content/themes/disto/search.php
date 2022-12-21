<?php get_header();
$infinite_pagination = '';
?>
<div class="main_title_wrapper category_title_section jl_na_bg_title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main_title_col">
                <?php
              if (is_search()) {
              echo '<div class="jl_cat_mid_title">';
              echo '<h3 class="categories-title title">';
              esc_html_e('Search for: ', 'disto');
              the_search_query();
              echo '</h3>';
              echo '</div>';
          }
   ?>
            </div>
        </div>
    </div>
</div>
<div class="jl_post_loop_wrapper">
    <div class="container jl_search_rel" id="wrapper_masonry">
        <div class="row">
            <div class="col-md-8 grid-sidebar" id="content">
                <div class="jl_wrapper_cat">
                    <div id="content_masonry" class="pagination_infinite_style_cat <?php echo esc_html($infinite_pagination);?>">
                        <?php
  $disto_qry = disto_get_qry();
  if ( $disto_qry->have_posts() ) {
    while ( $disto_qry->have_posts() ) { 
       $disto_qry->the_post();
        $disto_post_id = $post->ID;          
            get_template_part( 'inc/post-formats/grid-sidebar/content', get_post_format() );          
            }}else{?>
                        <div class="single_section_content_page jl_search_none">
                            <h1 class="jl_none_title">
                                <?php esc_html_e('No result found', 'disto'); ?>
                            </h1>
                            <p class="description">
                                <?php esc_html_e('Please try again with some different keywords.', 'disto'); ?>
                            </p>
                            <div class="search_form_menu jl_search_none_form">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <?php
disto_pagination( $disto_qry );
wp_reset_postdata();
?>
                </div>
            </div>
            <div class="col-md-4" id="sidebar">
                <?php disto_category_sidebar();?>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>