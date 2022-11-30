<?php
/*
  Template Name: Home main grid sidebar
 */
?>
<?php get_header();
$pagination_options= get_post_custom_values('pagination_grid_layout_options', get_the_ID());
if($pagination_options[0]=='loadmore'){$pagination = "loadmore";}else{$pagination = "number";}
?>
<div class="jl_post_loop_wrapper">
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
        <div class="col-md-8 grid-sidebar" id="content">
        	<div class="jl_wrapper_cat">
<?php 					
$loop_post=0;									
$disto_qry = disto_get_qry();
  if ( $disto_qry->have_posts() ) {
    while ( $disto_qry->have_posts() ) { 
       $disto_qry->the_post();
        $disto_post_id = $post->ID; 
        $loop_post++;						
						if($loop_post==1){
							echo "<div class='jl_grid_mian loop-large-post'>";
							get_template_part( 'inc/post-formats/large-post/content', get_post_format() );
							echo "</div>";
							echo "<div class='jl_grid_bellow_mian'>";
							echo "<div id='content_masonry'>";
						}else{
							get_template_part( 'inc/post-formats/grid-sidebar/content', get_post_format() );
						}

					    }
					}else{       
                        
                        if (is_search()) {  esc_html_e('No result found', 'disto');}
                                         
                    } ?>
</div></div></div>
<?php if($pagination == "loadmore"){?>
<div class="pagination-more">
                    <div class="more-previous">
                        <?php next_posts_link(esc_html__('Load More', 'disto'), $disto_qry->max_num_pages); ?>
                    </div>
                </div>
<?php }else{ disto_pagination($disto_qry); }?>
<?php wp_reset_postdata();?> 
</div>
		  <div class="col-md-4" id="sidebar">
          <?php echo disto_page_sidebar();?>
</div>

</div>
</div>
</div>
<!-- end content --> 
<?php get_footer(); ?>