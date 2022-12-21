<?php
/*
  Template Name: Home list post
 */
?>
<?php get_header(); ?>
<div class="container" id="wrapper_masonry">
    <div class="row">
        <div class="col-md-8 loop-list-post-display home_with_list_post" id="content">
            <div class="blog-list-padding">
                <div id="content-loop-list-post">
                    <?php 
						$disto_qry = disto_get_qry();
  if ( $disto_qry->have_posts() ) {
    $row_count = 0;
    while ( $disto_qry->have_posts() ) { 
       $disto_qry->the_post();
        $disto_post_id = $post->ID;   
							get_template_part( 'inc/post-formats/list-post/content', get_post_format() );
					    }
					}else{       
                        
                        if (is_search()) {  esc_html_e('No result found', 'disto');}
                                         
                    }
                     disto_pagination($disto_qry);

                    ?>
                </div>
            </div>
            <?php 
 wp_reset_postdata();
 ?>
        </div>
        <div class="col-md-4" id="sidebar">
            <?php echo disto_page_sidebar();?>
        </div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>