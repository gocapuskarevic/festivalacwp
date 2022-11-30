<?php
   get_header(); 
   $cur_cat_id = get_query_var('cat');
   $title_bg_Color = get_term_meta($cur_cat_id, "category_color_options", true);
   $pagination_style = get_term_meta($cur_cat_id, "disto_cat_infinite", true);
   if($pagination_style == 'infinite-load'){
    $infinite_pagination = 'load_more_main_wrapper';
   }elseif($pagination_style =='infinite-scroll'){
    $infinite_pagination = 'scroll_more_main_wrapper';
   }else{
    $infinite_pagination = '';
   }
   $jelly_header_id = absint( get_term_meta( $cur_cat_id, 'jelly_header_id', true ) );
?>
<div class="main_title_wrapper category_title_section <?php if ($jelly_header_id){echo 'jl_cat_img_bg';}?>">
    <?php 
          if ($jelly_header_id){
          $category_image = wp_get_attachment_image_src( $jelly_header_id , 'disto_large_slider_image' );
          echo '<div class="category_image_bg_image" style="background-image: url('.$category_image[0].');"></div>';
          echo '<div class="category_image_bg_ov"></div>';
          }else{}
          
  ?>
    <div class="jl_cat_title_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 main_title_col">
                    <?php
          if(is_category() ) {
              echo '<div class="jl_cat_mid_title">';
              echo '<h3 class="categories-title title">';
              single_cat_title('', true);
              echo '</h3>';
              echo category_description();
              echo '</div>';
          }
          
   ?>
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