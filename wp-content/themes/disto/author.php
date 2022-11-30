<?php get_header();
$infinite_pagination = '';
?>

<div class="main_title_wrapper jl_na_bg_title">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main_title_col">               
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
                                        <?php 
                                        echo '<span class="author_postcount">';                                        
                                        echo count_user_posts( get_the_author_meta('ID') ).' ';
                                        esc_html_e('Articles Written', 'disto');
                                        echo '</span>';
                                        $comment_args = array('post_author' => get_the_author_meta('ID'));
                                        $author_comments = get_comments($comment_args);
                                        echo '<span class="author_commentcount">';                                        
                                        echo count($author_comments).' ';
                                        esc_html_e('Comments', 'disto');
                                        echo '</span>';
                                        ?>
                                    </div>
                                </div>
                            </div>

            </div>
        </div>
    </div>
</div>



<div class="jl_post_loop_wrapper">
    <div class="container" id="wrapper_masonry">
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
          
            }}else{       
                        if (is_search()) {  esc_html_e('No result found', 'disto');}
                  }

?>

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