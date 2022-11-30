<?php
/*
  Template Name: Home main list sidebar
 */
?>
<?php get_header(); ?>
<div class="container" id="wrapper_masonry">
        <div class="row">     
        <div class="col-md-8" id="content">          
                 <?php 
					$disto_qry = disto_get_qry();
  if ( $disto_qry->have_posts() ) {
    $loop_post=0;
    while ( $disto_qry->have_posts() ) { 
       $disto_qry->the_post();
        $disto_post_id = $post->ID; 
						$loop_post++;
						if($loop_post==1){
							echo "<div class='jl_grid_mian loop-large-post'>";
							get_template_part( 'inc/post-formats/large-post/content', get_post_format() );
							echo "</div>";
							echo "<div class='jl_grid_bellow_mian loop-list-post-display home_with_list_post'>";
						}else{
							get_template_part( 'inc/post-formats/list-post/content', get_post_format() );
						}
					    }
					}else{                               
                        if (is_search()) {  esc_html_e('No result found', 'disto');}                                         
                    } ?>
</div>
<?php 
 disto_pagination( $disto_qry );
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