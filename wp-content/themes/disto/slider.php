<?php
$page_slider_options_page_slider_options= get_post_custom_values('page_slider_options_page_slider_options', get_the_ID());

if($page_slider_options_page_slider_options[0]=='home_grid_2_post_header'){
 $slider='home_grid_2_post_header';
}elseif($page_slider_options_page_slider_options[0]=='home_grid_4_post_header'){
 $slider='home_grid_4_post_header';
}elseif($page_slider_options_page_slider_options[0]=='home_grid_3_post_header'){
 $slider='home_grid_3_post_header';
}elseif($page_slider_options_page_slider_options[0]=='homeslider2'){
 $slider='home_slider_large_full';
}elseif($page_slider_options_page_slider_options[0]=='homefullscreen'){
 $slider='home_slider_large_fullscreen';
}elseif($page_slider_options_page_slider_options[0]=='home_single_slider'){
 $slider='home_single_slider';
}elseif($page_slider_options_page_slider_options[0]=='home_single_right'){
 $slider='home_single_right';
}elseif($page_slider_options_page_slider_options[0]=='home_center_slider'){
 $slider='home_center_slider';
}elseif($page_slider_options_page_slider_options[0]=='page_slider_grid_5'){
 $slider='page_slider_grid_5';
}elseif($page_slider_options_page_slider_options[0]=='homeslider_full_tab'){
 $slider='homeslider_full_tab';
}elseif($page_slider_options_page_slider_options[0]=='home_no_slider'){
 $slider='home_no_slider';
}
else{
 $slider="";
}

if (get_theme_mod('number_offset_post_right')){$number_offset_post_right = get_theme_mod('number_offset_post_right');}else{$number_offset_post_right = 0;}
if($slider=='homeslider_full_tab'){?>

<div class="large_center_slider_container header_slider_and_feaure_post_options jl_slider_nav_tab">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="large_center_slider_wrapper">
                    <div class="home_slider_header_tab jelly_loading_pro">
                        <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }
  $post_array_slider = array(
            'showposts' => 4,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
    $i=0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
      $i++;
      $post_id = get_the_ID();
      $categories = get_the_category(get_the_ID());
      ?>
                        <div class="item">
                            <div class="banner-carousel-item">
                                <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                                <?php if($slider_large_thumb_id){?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                <?php }else{?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                <?php }?>
                                <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>
                                <div class="banner-container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="banner-inside-wrapper">
                                                    <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                                    <h5><a href="<?php the_permalink(); ?>">
                                                            <?php the_title()?></a></h5>
                                                    <div class="slider_exception"><a class="jl_slider_readding" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Read More', 'disto'); ?></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="jlslide_tab_nav_container">
                        <div class="jlslide_tab_nav_row">
                            <div class="home_slider_header_tab_nav news_tiker_loading_pro">
                                <?php
      while ($jellywp_widget_slider->have_posts()) {
      $jellywp_widget_slider->the_post();
    ?>
                                <div class="item">
                                    <div class="banner-carousel-item">
                                        <?php $slider_large_thumb_id = get_post_thumbnail_id();
$slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_small_feature', true ); ?>
                                        <?php if($slider_large_thumb_id){?>
                                        <span class="image_small_nav" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                        <?php }else{?>
                                        <span class="image_small_nav" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                        <?php }?>
                                        <h5>
                                            <?php the_title()?>
                                        </h5>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_reset_postdata();?>
<?php }elseif($slider=='home_single_slider'){?>
<div class="large_center_slider_container jl_full_padding_single_slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="large_center_slider_wrapper">
                    <div class="large_center_slider jelly_loading_pro">
                        <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
    $i=0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
      $i++;
      $post_id = get_the_ID();
      $categories = get_the_category(get_the_ID());
      ?>
                        <div class="item">
                            <div class="banner-carousel-item">

                                <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                                <?php if($slider_large_thumb_id){?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                <?php }else{?>
                                <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                <?php }?>
                                <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>
                                <div class="banner-container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="banner-inside-wrapper">
                                                    <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                                    <h5><a href="<?php the_permalink(); ?>">
                                                            <?php the_title()?></a></h5>
                                                    <div class="slider_exception"><a class="jl_slider_readding" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Read More', 'disto'); ?></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
    wp_reset_postdata();
    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }elseif($slider=='home_single_right'){?>

<div class="large_center_slider_container jl_s_slide_text_wrapper jl_single_slider_box header_slider_and_feaure_post_options">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="large_center_slider_wrapper">
                    <div class="large_center_slider_text jelly_loading_pro">
                        <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  } 
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
    $i=0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
      $i++;
      $post_id = get_the_ID();
      $categories = get_the_category(get_the_ID());
      ?>
                        <div class="item">
                            <div class="banner-carousel-item">

                                <div class="jl_s_slider_img">
                                    <span class="pagingInfo"></span>
                                    <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                                    <?php if($slider_large_thumb_id){?>
                                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                                    <?php }else{?>
                                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                                    <?php }?>
                                    <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>
                                </div>


                                <div class="banner-container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="banner-inside-wrapper">
                                                    <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                                    <h5><a href="<?php the_permalink(); ?>">
                                                            <?php the_title()?></a></h5>
                                                    <?php echo disto_header_post_meta_img(get_the_ID()); ?>
                                                    <p class="jl_slider_desc">
                                                        <?php echo disto_list_post_excerpt(23); ?>
                                                    </p>
                                                    <a href="<?php the_permalink(); ?>" class="jl_ssider_more">
                                                        <?php esc_html_e('Read More', 'disto'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
    wp_reset_postdata();
    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($slider=='home_slider_large_full'){?>

<div class="large_center_slider_container header_slider_and_feaure_post_options jl_slider_fullwidth">
    <div class="large_center_slider_wrapper">
        <div class="large_center_slider jelly_loading_pro">
            <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  } 
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
    $i=0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
      $i++;
      $post_id = get_the_ID();
      $categories = get_the_category(get_the_ID());
      ?>
            <div class="item">
                <div class="banner-carousel-item">

                    <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                    <?php if($slider_large_thumb_id){?>
                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                    <?php }else{?>
                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                    <?php }?>
                    <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>
                    <div class="banner-container">
                        <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                        <h5><a href="<?php the_permalink(); ?>">
                                <?php the_title()?></a></h5>
                        <div class="slider_exception"><a class="jl_slider_readding" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Read More', 'disto'); ?></a></div>
                    </div>



                </div>
            </div>
            <?php }
    wp_reset_postdata();
    ?>
        </div>
    </div>
</div>
<?php }elseif($slider=='home_slider_large_fullscreen'){?>

<div class="large_center_slider_container header_slider_and_feaure_post_options">
    <div class="large_center_slider_wrapper jl_full_screen_height">
        <div class="large_center_slider jelly_loading_pro">
            <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  } 
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
    $i=0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
      $i++;
      $post_id = get_the_ID();
      $categories = get_the_category(get_the_ID());
      ?>
            <div class="item jl_full_screen_height">
                <div class="banner-carousel-item">

                    <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                    <?php if($slider_large_thumb_id){?>
                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                    <?php }else{?>
                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                    <?php }?>
                    <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>



                    <div class="banner-container">
                        <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                        <h5><a href="<?php the_permalink(); ?>">
                                <?php the_title()?></a></h5>
                        <div class="slider_exception"><a class="jl_slider_readding" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Read More', 'disto'); ?></a></div>
                    </div>
                </div>
            </div>
            <?php }
    wp_reset_postdata();
    ?>
        </div>
    </div>
</div>
<?php }elseif($slider=='home_grid_2_post_header'){?>

<div class="home_grid_2_post_header_wrapper header_slider_and_feaure_post_options">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="home_grid_2_post_header jl_car_2col home_grid_2_post_header_style jelly_loading_pro">
                    <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
     $grid_counter = 0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
            $post_id = get_the_ID();
            $grid_counter ++;
            //get all post categories
            $categories = get_the_category(get_the_ID());
      ?>
                    <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_slider_grid_large', true ); ?>
                    <div class="large_main_image_header">
                        <?php if($slider_large_thumb_id){?>
                        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                        <?php }else{?>
                        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                        <?php }?>
                        <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute">
                        </a>                  
                        <div class="banner-container">
                          <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                            <h1><a class="heading" href="<?php the_permalink(); ?>">
                                    <?php the_title()?></a> </h1>
                            <?php echo disto_header_post_meta(get_the_ID()); ?>                            
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($slider=='home_grid_4_post_header'){?>
<div class="home_grid_2_post_header_wrapper header_slider_and_feaure_post_options col3_homepost_carosel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home_grid_4_post_header jl_car_4col home_grid_2_post_header_style jelly_loading_pro">
                    <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
     $grid_counter = 0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
            $post_id = get_the_ID();
            $grid_counter ++;
            //get all post categories
            $categories = get_the_category(get_the_ID());
      ?>
                    <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_slider_grid_large', true ); ?>
                    <div class="large_main_image_header">
                        <?php if($slider_large_thumb_id){?>
                        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                        <?php }else{?>
                        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                        <?php }?>
                        <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute">
                        </a>                  
                        <div class="banner-container">
                          <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                            <h1><a class="heading" href="<?php the_permalink(); ?>">
                                    <?php the_title()?></a> </h1>
                            <?php echo disto_header_post_meta(get_the_ID()); ?>
                            
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($slider=='home_grid_3_post_header'){?>

<div class="home_grid_2_post_header_wrapper header_slider_and_feaure_post_options col3_homepost_carosel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }
  ?>
                <div class="home_grid_3_post_header jl_car_3col home_grid_2_post_header_style jelly_loading_pro">
                    <?php
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
     $grid_counter = 0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
            $post_id = get_the_ID();
            $grid_counter ++;
            //get all post categories
            $categories = get_the_category(get_the_ID());
      ?>
                    <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_slider_grid_large', true ); ?>
                    <div class="large_main_image_header">
                        <?php if($slider_large_thumb_id){?>
                        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                        <?php }else{?>
                        <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                        <?php }?>
                        <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute">
                        </a>
                        
                        <div class="banner-container">
                          <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                            <h1><a class="heading" href="<?php the_permalink(); ?>">
                                    <?php the_title()?></a> </h1>
                            <?php echo disto_header_post_meta(get_the_ID()); ?>
                            
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($slider=='home_center_slider'){?>
<div class="large_center_slider_container header_slider_and_feaure_post_options">
    <div class="large_center_slider_wrapper">
        <div class="large_center_mode_slider jelly_loading_pro">
            <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  } 
  $post_array_slider = array(
            'showposts' => $number_slider,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
    $i=0;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
      $i++;
      $post_id = get_the_ID();
      $categories = get_the_category(get_the_ID());
      ?>
            <div class="item">
                <div class="banner-carousel-item">

                    <?php $slider_large_thumb_id = get_post_thumbnail_id();
  $slider_large_image_header = wp_get_attachment_image_src( $slider_large_thumb_id, 'disto_large_slider_image', true ); ?>
                    <?php if($slider_large_thumb_id){?>
                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url($slider_large_image_header[0]); ?>')"></span>
                    <?php }else{?>
                    <span class="image_grid_header_absolute" style="background-image: url('<?php echo esc_url(get_template_directory_uri().'/img/feature_img/header_carousel.jpg');?>')"></span>
                    <?php }?>
                    <a href="<?php the_permalink(); ?>" class="link_grid_header_absolute"></a>

                    <div class="banner-container">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-inside-wrapper">
                                        <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                        <h5><a href="<?php the_permalink(); ?>">
                                                <?php the_title()?></a></h5>
                                        <?php echo disto_header_post_meta_img(get_the_ID()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
    wp_reset_postdata();
    ?>
        </div>
    </div>
</div>
<?php }elseif($slider=='page_slider_grid_5'){?>

<div class="home_slider_5grid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_slider_grid_5_style header_slider_and_feaure_post_options">
                    <div class="single-item-slider jelly_loading_pro">
                        <?php
  $cats=[];
  $number_slider= get_theme_mod('slider_number');
  $category_slider= get_theme_mod('slider_category_select');
  if(is_array($category_slider)) {
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }else{
    $category_slider = explode(" ",$category_slider);
    if(!empty($category_slider)) {
    foreach($category_slider as $key=>$value) { if($value != null) { $cats[] = $key; } } 
  }
  }
  $post_array_slider = array(
            'showposts' => 5,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset_post_right
        );  
        $jellywp_widget_slider = new WP_Query($post_array_slider);
     $count = 1;
     $grid_counter = 0;
    $get_main_ft = TRUE;
     while ($jellywp_widget_slider->have_posts()) {
            $jellywp_widget_slider->the_post();
      $post_id = get_the_ID();
      $grid_counter ++;
      //get all post categories
            $categories = get_the_category(get_the_ID());
      ?>
                        <?php if($get_main_ft){?>
                        <div class="item_slide">

                            <div class="main-static-post-header <?php echo 'margin_'.$count?>">
                                <?php if ( has_post_thumbnail()) {?>
                                <?php $category_image_header = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'disto_slider_grid_large' ); ?>
                                <div class="slider_grid_image_style" style="background-image: url('<?php echo esc_url($category_image_header[0]); ?>')">
                                </div>
                                <?php }?>
                                <span class="background_color_absolute_<?php echo esc_attr($grid_counter);?>"></span>
                                <a href="<?php the_permalink(); ?>" class="featured_thumbnail_link"></a>
                                <div class="banner-container">
                                  <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                    <h1><a class="heading" href="<?php the_permalink(); ?>">
                                            <?php the_title()?></a> </h1>
                                    <?php echo disto_header_post_meta(get_the_ID()); ?>
                                </div>
                            </div>
                            <?php 
$get_main_ft = FALSE;
}else{?>
                            <div class="small-static-post-header <?php echo 'margin_'.$count?>">

                                <?php if ( has_post_thumbnail()) {?>
                                <?php $category_image_header = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'disto_carousel_small' ); ?>
                                <div class="slider_grid_image_style" style="background-image: url('<?php echo esc_url($category_image_header[0]); ?>')">
                                </div>
                                <?php }?>
                                <span class="background_color_absolute_<?php echo esc_attr($grid_counter);?>"></span>
                                <a href="<?php the_permalink(); ?>" class="featured_thumbnail_link"></a>
                                <div class="banner-container">
                                  <?php if(get_theme_mod('disable_post_category') !=1){
          $categories = get_the_category(get_the_ID());          
          if ($categories) {
            echo '<span class="meta-category-small">';
            foreach( $categories as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
              echo '<a class="post-category-color-text" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
            }
            echo "</span>";
            }
            }
 ?>
                                    <h1><a class="heading" href="<?php the_permalink(); ?>">
                                            <?php the_title()?></a> </h1>
                                    <?php echo disto_header_post_meta(get_the_ID()); ?>
                                </div>

                            </div>
                            <?php }?>

                            <?php if($count%5==0){ 
                $get_main_ft = TRUE; ?>
                        </div>

                        <?php
    }
    $count++;
  }

$last_count_post = $count - 1;
      if($last_count_post % 5 != 0){
      echo '</div>';
      }
  wp_reset_postdata();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif($slider=='home_no_slider'){?>
<?php }else{?>

<?php }?>
