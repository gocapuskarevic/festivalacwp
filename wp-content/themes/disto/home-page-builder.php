<?php
/*
  Template Name: Home Page Builder
 */
?>
<?php get_header(); ?>
<div class="jl_home_bw">
<div class="container">
    <div class="row">
        <div class="col-md-12 jl_mid_main_3col">
            <div class="jl_3col_wrapin">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile;?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end content -->
<?php get_footer(); ?>