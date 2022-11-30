<?php
/*
  Template Name: Home Page Builder Sidebar
 */
?>
<?php get_header(); ?>
<div class="jl_home_bw">
<div class="container">
    <div class="row">
        <div class="col-md-8 jl-h-content">
            <div class="jl_3col_wrapin">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile;?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-4 jl-h-sidebar">
                <?php echo disto_page_sidebar();?>
            </div>
    </div>
</div>
</div>
<!-- end content -->
<?php get_footer(); ?>