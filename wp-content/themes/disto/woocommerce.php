<?php get_header(); ?>
<div class="main_title_wrapper category_title_section">  
<div class="category_image_bg_image jl_shoppage"></div>
<div class="container">     
  <div class="row">     
         <div class="col-md-12 main_title_col">
          <?php
              echo '<div class="jl_cat_mid_title">';
              echo '<h3 class="categories-title title">';
              woocommerce_page_title();
              echo '</h3>';
              echo '</div>';


          ?>

         </div>
       </div>
       </div>
 </div> 

<section id="content_main" class="container clearfix">
<div class="row main_content">
   <!-- Start content -->
    <div class="col-md-8 loop-large-post " id="content">
 <div <?php post_class('content_single_page woocommerce_content_page'); ?>> 
          <?php woocommerce_content(); ?> 
        </div>
  </div>
  <!-- End content -->
    <!-- Start sidebar -->
	 <div class="col-md-4" id="sidebar"> 
   <?php dynamic_sidebar('woocommerce-sidebar');?>
  </div>
  <!-- End sidebar -->
</div>
 </section>
<!-- end content --> 
<?php get_footer(); ?>