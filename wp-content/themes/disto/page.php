<?php
/*
  The main template file for display page
 */
?>
<?php get_header();
$jelly_header_id = get_the_post_thumbnail_url(get_the_ID(), 'disto_large_slider_image'); 
$jl_rm_title= get_post_custom_values('jl_rm_title', get_the_ID());
if($jl_rm_title){}else{
?>
<div class="main_title_wrapper category_title_section <?php if($jelly_header_id){echo 'jl_cat_img_bg';}?>">
    <?php 
          if ($jelly_header_id){
          echo '<div class="category_image_bg_image" style="background-image: url('.$jelly_header_id.');"></div>';
          echo '<div class="category_image_bg_ov"></div>';
          }          
  ?>
     <div class="container">
        <div class="row">
            <div class="col-md-12 main_title_col">
                <?php
              echo '<div class="jl_cat_mid_title">';
              echo '<h3 class="categories-title title">';
              echo get_the_title();
              echo '</h3>';
              echo '</div>';
          ?>
            </div>
        </div>
    </div>
</div>
<?php }?>
<section id="content_main" class="clearfix">
    <div class="container">
        <div class="row main_content">
            <!-- Start content -->
            <div class="col-md-8 loop-large-post" id="content">
                <div <?php post_class( 'content_single_page'); ?>>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php if ( has_post_thumbnail()) {
  echo '<div class="image-post-thumb">';
  //the_post_thumbnail('disto_large_feature_image');
  echo '</div>';}?>
                    <?php the_content(); ?>
                    <?php endwhile; // end of the loop.  ?>
                    <?php endif; ?>
                    <?php comments_template('', true); ?>
                    <div class="brack_space"></div>
                    <?php wp_link_pages( array( 'before' => '<ul class="page-links">', 'after' => '</ul>', 'link_before' => '<li class="page-link">', 'link_after' => '</li>' ) ); ?>
                </div>
            </div>
            <!-- End content -->
            <!-- Start sidebar -->
            <div class="col-md-4" id="sidebar">
                <?php echo disto_page_sidebar();?>
            </div>
            <!-- End sidebar -->
        </div>
    </div>
</section>
<!-- end content -->
<?php get_footer(); ?>