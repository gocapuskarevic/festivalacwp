<?php get_header();
$infinite_pagination = '';
?>
    <div class="jl_post_loop_wrapper">
        <div class="container" id="wrapper_masonry">
            <div class="row">
                <div class="col-md-8 grid-sidebar" id="content">
                    <div class="jl_wrapper_cat">
                        <div id="content_masonry" class="pagination_infinite_style_cat <?php echo esc_html($infinite_pagination);?>">
                             <?php 
                            if (have_posts()){ 
                                while (have_posts()){ 
                                the_post();                         
                                get_template_part( 'inc/post-formats/grid-sidebar/content', get_post_format() );
                            }}else{       
                            if (is_search()) {  esc_html_e('No result found', 'disto');}
                            }
                            ?>
                        </div>
                        <?php
                        disto_pagination();
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