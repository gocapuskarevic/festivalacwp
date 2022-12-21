<?php
    //Menu
    $disto_menu_font_family = get_theme_mod('disto_menu_font_family') ?: 'Poppins';
    $disto_menu_font_size = get_theme_mod('disto_menu_font_size') ?: '15px';
    $disto_menu_font_weight = get_theme_mod('disto_menu_font_weight') ?: '600';
    //$disto_menu_transform = get_theme_mod('disto_menu_transform') ?: 'capitalize';
    //Sub Menu
    $disto_sub_menu_font_size = get_theme_mod('disto_sub_menu_font_size') ?: '14px';
    $disto_sub_menu_font_weight = get_theme_mod('disto_sub_menu_font_weight') ?: '400';
    //Paragraph
    $disto_p_font_family = get_theme_mod('disto_p_font_family') ?: 'Poppins';
    $disto_p_font_size = get_theme_mod('disto_p_font_size') ?: '15px';
    $disto_p_font_weight = get_theme_mod('disto_p_font_weight') ?: '400';
    //Title
    $disto_title_font_family = get_theme_mod('disto_title_font_family') ?: 'Poppins';
    $disto_title_font_weight = get_theme_mod('disto_title_font_weight') ?: '700';
    //$disto_title_transform = get_theme_mod('disto_title_transform') ?: 'capitalize';

    $large_post_font_size = get_theme_mod('large_post_font_size');
    $grid_post_font_size = get_theme_mod('grid_post_font_size');
    $list_post_font_size = get_theme_mod('list_post_font_size');
    
?>
<?php
$color = get_theme_mod('theme_color');
if ($color) { ?>
.tagcloud a:hover,.tag-cat a:hover, .current.pagination_page, .pagination>a:hover, .tag-cat a:hover, .comment-reply-link:hover, .comment-edit-link:hover, .email_subscribe_box .buttons:hover, .jelly_homepage_builder .large_continue_reading span a:hover, .pop_post_right_slider .headding_pop_post, .menu_post_feature .builder_cat_title_list_style, .cfs_from_wrapper .cfs_submit input, .post_list_widget .recent_list_item_number, .recent_post_large_widget .recent_list_item_number, #commentform #submit:hover,
.wpcf7-form-control.wpcf7-submit:hover, .single_post_tag_layout li a:hover, .jellywp_pagination ul li span, .jellywp_pagination ul li a:hover, .woocommerce a.remove, .woocommerce .product .onsale,
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .pagination-more div a, .header_layout_style3_custom .header_top_bar_wrapper .search_header_menu .search_header_wrapper, .header_layout_style3_custom .header_top_bar_wrapper .search_header_menu .menu_mobile_icons, .magazine_3_grid_slider .jelly_pro_post_arrow_right:hover, .magazine_3_grid_slider .jelly_pro_post_arrow_left:hover, .jellywp_home_builder_carousel_post .jelly_pro_post_arrow_left:hover, .jellywp_home_builder_carousel_post .jelly_pro_post_arrow_right:hover, .full-slider-main-home .jelly_pro_post_arrow_left:hover, .full-slider-main-home .jelly_pro_post_arrow_right:hover{background: <?php echo esc_attr($color);?> !important;}

.content_single_page a, .content_single_page a:hover, #nextpost:hover, #prepost:hover, .blog_large_post_style .large_post_content a:hover, .loop-large-post .post_content a, .loop-large-post .post_content a:hover, .social-icons-list-widget li a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .post-meta a:hover, .large_post_share_icons li a:hover, .post_large_footer_meta .post_tag_footer a:hover, .post_large_footer_meta .post_comment_footer a:hover, .post_large_footer_meta .post_love_footer a:hover, .comment-meta .comment-author-date:hover, .comment-meta .comment-author-date:hover time, .post-meta-bot .love_post_view a:hover, .post-meta-bot .meta-comment a:hover, .meta_category_text_small a, .logged-in-as a:hover, .widget_categories ul li a:hover, .single-post-meta-wrapper span a:hover,
#menu-footer-menu li a:hover, .navigation_wrapper .jl_main_menu li li:hover > a, .navigation_wrapper .jl_main_menu li li.current-menu-item > a, .single_section_content .counts.mashsbcount,
.header_layout_style3_custom .navigation_wrapper .jl_main_menu > li:hover > a,
.navigation_wrapper .jl_main_menu > li:hover > a, .navigation_wrapper .jl_main_menu > .current-menu-item > a, .navigation_wrapper .jl_main_menu > .current-menu-parent > a, .navigation_wrapper .jl_main_menu > .current-menu-ancestor > a,
.header_layout_style5_custom .jl_random_post_link:hover, .header_layout_style5_custom #mainmenu > li > a:hover, .home_slider_post_tab_nav .slick-list .item.slick-current h5, .builder_cat_title_list_style li.current_cat_post{color: <?php echo esc_attr($color);?> !important;}
.breadcrumbs_options a{color: #000 !important;}
.pop_post_right_slider .slider_pop_post_list_items .featured_thumbnail_link{border-left: 7px solid <?php echo esc_attr($color);?> !important;}
.personal_allin_top_bar #mainmenu > li.sfHover > a, .personal_allin_top_bar #mainmenu > li.current-menu-ancestor > a{
    color: #dadada !important;
}
.blog_large_post_style .large_continue_reading span a:hover{color: #fff !important;}
.large_center_slider_container .large_continue_reading span a:hover{color: #000 !important; background:#fff !important; }
.spr-number{border: 2px solid <?php echo esc_attr($color);?> !important;}
.large_continue_reading span a:hover,
.header_layout_style5_custom .header_top_bar_wrapper .search_header_menu > .search_header_wrapper, .header_layout_style5_custom .header_top_bar_wrapper .search_header_menu .menu_mobile_icons, .footer_top_small_carousel_5 .jl_footer_car_title:after, .jl_newsticker_wrapper .builder_ticker_title_home_page{background: <?php echo esc_attr($color);?> !important;}
.footer_top_small_carousel_5 .slick-dots li.slick-active button{background: <?php echo esc_attr($color);?>; border: 1px solid <?php echo esc_attr($color);?>;}
.tagcloud a:hover{border: 1px solid <?php echo esc_attr($color);?> !important;}
::selection, .jl_custom_title4 #sidebar .widget .widget-title h2:after, .jl_footer_wrapper .jl_footer_car_title:after{
    background-color: <?php echo esc_attr($color);?> !important;
}
<?php } ?>

<?php if(get_theme_mod('menu_text_color')){?>
#mainmenu > li > a, .search_header_menu i, .menu_mobile_icons, #mainmenu>li.current-menu-item>a, .header_layout_style5_custom .jl_main_menu > .current-menu-parent > a, .header_layout_style5_custom #mainmenu > li > a, .header_layout_style5_custom #mainmenu > li > a:hover, #menu_wrapper .search_header_menu:hover i, .header_layout_style3_custom.jl_cus_top_share .search_header_menu.jl_nav_mobile .search_header_wrapper i, .header_layout_style3_custom.jl_cus_top_share .search_header_menu.jl_nav_mobile .search_header_wrapper i:hover, .header_layout_style3_custom.jl_cus_top_share .search_header_menu.jl_nav_mobile .menu_mobile_icons i, .header_layout_style3_custom.jl_cus_top_share .search_header_menu.jl_nav_mobile .menu_mobile_icons i:hover, .headcus5_custom.header_layout_style5_custom #mainmenu > li > a{color:<?php echo get_theme_mod('menu_text_color');?> !important;}
<?php }?>

<?php
$top_menu_bg_color = get_theme_mod('top_menu_bg_color');
$top_menu_bg_color_gradient = get_theme_mod('top_menu_bg_color_gradient');
if ($top_menu_bg_color) {?>
.header_top_bar_wrapper {
    background: <?php echo esc_attr($top_menu_bg_color);?> !important;
    background-image: -webkit-linear-gradient(to right, <?php echo esc_attr($top_menu_bg_color);?>, <?php echo esc_attr($top_menu_bg_color_gradient);?>) !important;
    background-image: -moz-linear-gradient(to right, <?php echo esc_attr($top_menu_bg_color);?>, <?php echo esc_attr($top_menu_bg_color_gradient);?>) !important;
    background-image: -o-linear-gradient(to right, <?php echo esc_attr($top_menu_bg_color);?>, <?php echo esc_attr($top_menu_bg_color_gradient);?>) !important;
    background-image: linear-gradient(to right, <?php echo esc_attr($top_menu_bg_color);?>, <?php echo esc_attr($top_menu_bg_color_gradient);?>) !important;
}
<?php }?>

<?php
$to_menu_text_color = get_theme_mod('to_menu_text_color');
if ($to_menu_text_color) {?>
.jl_current_title, .header_top_bar_wrapper .jl_top_bar_right, .header_top_bar_wrapper .navigation_wrapper #jl_top_menu > li > a{color: <?php echo esc_attr($to_menu_text_color);?> !important;}
<?php }?>

<?php $menu_bg_color_gradient = get_theme_mod('menu_bg_color_gradient');
$menu_bg_color = get_theme_mod('menu_bg_color');
if ($menu_bg_color) {?>
.menu_wrapper,
.header-wraper.jl_large_menu_logo .menu_wrapper,
.header_magazine_video .header_main_wrapper,
.header_magazine_box_menu #mainmenu,
.box_layout_enable_front .header_magazine_box_menu .menu_wrapper_box_style,
.two_header_top_style .menu_wrapper,
.header_magazine_full_screen .menu_wrapper, .header_magazine_full_screen.dark_header_menu .menu_wrapper, .header_magazine_full_screen .menu_wrapper,
.headcus5_custom.header_layout_style5_custom .header_main_wrapper,
.header_layout_style5_custom .menu_wrapper{
background:<?php echo esc_attr($menu_bg_color);?> !important;
background-color: <?php echo esc_attr($menu_bg_color);?> !important;
background-image: -webkit-linear-gradient(to right, <?php echo esc_attr($menu_bg_color);?>, <?php echo esc_attr($menu_bg_color_gradient);?>) !important;
background-image: -moz-linear-gradient(to right, <?php echo esc_attr($menu_bg_color);?>, <?php echo esc_attr($menu_bg_color_gradient);?>) !important;
background-image: -o-linear-gradient(to right, <?php echo esc_attr($menu_bg_color);?>, <?php echo esc_attr($menu_bg_color_gradient);?>) !important;
background-image: linear-gradient(to right, <?php echo esc_attr($menu_bg_color);?>, <?php echo esc_attr($menu_bg_color_gradient);?>) !important;
border-top: 0px !important; border-bottom: 0px solid #f0f0f0 !important;}
.header_layout_style5_custom{border-top: 0px solid #eaeaea !important; border-bottom: 0px solid #eaeaea !important; background: #fff !important;}
<?php }?>

<?php if ($large_post_font_size) {?>
.grid-sidebar .box .jl_post_title_top .image-post-title, .grid-sidebar .blog_large_post_style .post-entry-content .image-post-title, .grid-sidebar .blog_large_post_style .post-entry-content h1, .blog_large_post_style .post-entry-content .image-post-title, .blog_large_post_style .post-entry-content h1, .blog_large_overlay_post_style.box .post-entry-content .image-post-title a{font-size: <?php echo esc_attr($large_post_font_size);?> !important; }
<?php }?>
<?php if ($grid_post_font_size) {?>
.grid-sidebar .box .image-post-title, .show3_post_col_home .grid4_home_post_display .blog_grid_post_style .image-post-title{font-size: <?php echo esc_attr($grid_post_font_size);?> !important; }
<?php }?>
<?php if ($list_post_font_size) {?>
.sd{font-size: <?php echo esc_attr($list_post_font_size);?> !important; }
<?php }?>

<?php if ($disto_menu_font_family) {?>
.header_top_bar_wrapper .navigation_wrapper #jl_top_menu li a, .meta-category-small a, .item_slide_caption .post-meta.meta-main-img, .post-meta.meta-main-img, .post-meta-bot-in, .post-meta span, .single-post-meta-wrapper span, .comment time, .post_large_footer_meta, .blog_large_post_style .large_post_content .jelly_read_more_wrapper a, .love_post_view_header a, .header_date_display, .jl_continue_reading, .menu_post_feature .builder_cat_title_list_style li, .builder_cat_title_list_style li, .main_new_ticker_wrapper .post-date, .main_new_ticker_wrapper .news_ticker_title_style, .jl_rating_front .jl_rating_value, .pop_post_right_slider .headding_pop_post, .jl_main_right_number .jl_number_list, .jl_grid_more .jl_slider_readding, .page_builder_listpost.jelly_homepage_builder .jl_list_more a, .jl_s_slide_text_wrapper .banner-container .jl_ssider_more, .jl_post_meta .jl_author_img_w a, .jl_post_meta .post-date, .jl_large_builder.jelly_homepage_builder .jl_large_more, .feature-image-link.image_post .jl_small_list_num, .social-count-plus .count, .social-count-plus .label, .jl_instagram .instagram-pics + .clear a, .single-post-meta-wrapper .jm-post-like, #commentform #submit, .wpcf7-form-control.wpcf7-submit, .comment-reply-link, .comment-edit-link, .single_post_share_icons, .single_post_tag_layout li a{font-family: <?php echo esc_attr($disto_menu_font_family);?> !important;}
#mainmenu > li > a, #content_nav .menu_moble_slide > li a, .header_layout_style3_custom .navigation_wrapper > ul > li > a, .header_magazine_full_screen .navigation_wrapper .jl_main_menu > li > a{font-family: <?php echo esc_attr($disto_menu_font_family);?> !important;  <?php echo 'font-size:'.esc_attr($disto_menu_font_size).' !important;';?> <?php echo 'font-weight:'.esc_attr($disto_menu_font_weight).' !important;';?> <?php echo 'text-transform: '.esc_attr($disto_menu_transform).' !important;';?> <?php echo 'letter-spacing: '.esc_attr(get_theme_mod('letter_spacing_menu')).' !important;';?>}
#menu-footer-menu li a, .footer-bottom .footer-left-copyright, .navigation_wrapper #mainmenu.jl_main_menu > li li > a{font-family: <?php echo esc_attr($disto_menu_font_family);?> !important;}
<?php }?>

<?php if ($disto_p_font_family) {?>
.content_single_page p, .single_section_content .post_content, .single_section_content .post_content p{font-size: <?php echo esc_attr($disto_p_font_size);?>;}
body, p, .date_post_large_display, #search_block_top #search_query_top, .tagcloud a, .format-quote a p.quote_source, .blog_large_post_style .large_post_content .jelly_read_more_wrapper a, .blog_grid_post_style .jelly_read_more_wrapper a, .blog_list_post_style .jelly_read_more_wrapper a, .pagination-more div a,
.meta-category-small-builder a, .full-slider-wrapper .banner-carousel-item .banner-container .more_btn a, .single-item-slider .banner-carousel-item .banner-container .more_btn a{font-family:<?php echo esc_attr($disto_p_font_family);?> !important; font-weight: <?php echo esc_attr($disto_p_font_weight);?> !important;}
.single_section_content .post_content blockquote p{font-size: 23px !important;}
<?php }?>
.wp-caption p.wp-caption-text{font-size: 14px !important;}
<?php if ($disto_title_font_family) {?>
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .postnav #prepost, .postnav  #nextpost, .bbp-forum-title, .single_post_arrow_content #prepost, .single_post_arrow_content #nextpost{font-weight: <?php echo esc_attr($disto_title_font_weight);?> !important; <?php if($disto_title_transform){echo 'text-transform:'.$disto_title_transform.' !important;';}?> <?php if(get_theme_mod('letter_spacing_heading')){echo 'letter-spacing: '.esc_attr(get_theme_mod('letter_spacing_heading')).' !important;';}?>}
.footer_carousel .meta-comment, .item_slide_caption h1 a,  .tickerfloat, .box-1 .inside h3, .detailholder.medium h3, .feature-post-list .feature-post-title, .widget-title h2, .image-post-title, .grid.caption_header h3, ul.tabs li a, h1, h2, h3, h4, h5, h6, .carousel_title, .postnav a, .format-aside a p.aside_title, .date_post_large_display, .social-count-plus span, .jl_social_counter .num-count,
.sf-top-menu li a, .large_continue_reading span, .single_post_arrow_content #prepost, .single_post_arrow_content #nextpost, .cfs_from_wrapper .cfs_form_title, .comment-meta .comment-author-name, .jl_recent_post_number > li .jl_list_bg_num, .jl_recent_post_number .meta-category-small-text a, .jl_hsubt, .single_post_entry_content .post_subtitle_text, blockquote p{font-family:<?php echo esc_attr($disto_title_font_family);?> !important;}   
<?php }?>
<?php if(get_theme_mod('line_height_heading')){?>
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .postnav #prepost, .postnav  #nextpost, .bbp-forum-title, .single_post_arrow_content #prepost, .single_post_arrow_content #nextpost{<?php echo 'line-height: '.esc_attr(get_theme_mod('line_height_heading')).' !important;';?>}
<?php }?>

<?php $bg_image_box_layout = get_theme_mod('bg_image_box_layout');
if ($bg_image_box_layout) {?>
.options_layout_wrapper{ background-image:url(<?php echo esc_attr($bg_image_box_layout);?>) !important;}
<?php }?>

<?php
$footer_bg_color = get_theme_mod('footer_bg_color');
if ($footer_bg_color) {?>
.enable_footer_columns_dark, .enable_footer_copyright_dark{background: <?php echo esc_attr($footer_bg_color);?> !important;}
.enable_footer_copyright_dark{border-top: 1px solid rgba(0,0,0,.1) !important;}
.enable_footer_columns_dark .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_categories ul li{border-bottom: 1px solid rgba(0,0,0,.1) !important;}
<?php }?>

<?php
$footer_text_color = get_theme_mod('footer_text_color');
if ($footer_text_color) {?>
.enable_footer_columns_dark .widget .widget-title h2, .enable_footer_columns_dark .widget p, .footer-columns .auto_image_with_date .post-date, .enable_footer_columns_dark a, .footer-bottom .footer-left-copyright, .enable_footer_copyright_dark .footer-menu-bottom ul li a{color: <?php echo esc_attr($footer_text_color);?> !important;}
.social-icons-list-widget li a{color: #fff !important;}
<?php }?>

<?php if ($disto_sub_menu_font_size) {?>
.navigation_wrapper #mainmenu.jl_main_menu > li li > a{ <?php echo 'font-size:'.esc_attr($disto_sub_menu_font_size).' !important;';?> <?php echo 'font-weight:'.esc_attr($disto_sub_menu_font_weight).' !important;';?> <?php echo 'letter-spacing: '.esc_attr(get_theme_mod('letter_spacing_menu')).' !important;';?> <?php echo 'text-transform: '.esc_attr($disto_menu_transform).' !important;';?>}
<?php }else{?>
.navigation_wrapper #mainmenu.jl_main_menu > li li > a{ font-size: 14px !important; font-weight: 400 !important;}
<?php }?>

<?php if(get_theme_mod('disable_sidebar')){?>
#content{width: 100%; padding-right:15px;}
#sidebar{display: none;}
<?php }?>

<?php
$categories_widget_color = get_terms('category');
        if ($categories_widget_color) {
            foreach( $categories_widget_color as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '.cat-item-'.$tag->term_id.' span{background: '.$title_bg_Color.' !important;}';
            }
            }
?>
<?php
if ( ! empty( get_theme_mod('hide_nav_desk') ) ) {
echo '.menu_mobile_icons{display: none !important;}@media only screen and (min-width: 768px) and (max-width: 992px) {.menu_mobile_icons{display: block !important;}}@media only screen and (max-width:767px) {.menu_mobile_icons{display: block !important;}}@media only screen and (min-width:480px) and (max-width:767px) {.menu_mobile_icons{display: block !important;}}';
}
?>
<?php if( ! empty(get_theme_mod('logo_width'))){?>
.logo_link img{max-width: <?php echo esc_attr(get_theme_mod('logo_width'))?> !important; max-height: inherit !important;}
<?php }?>

<?php if( ! empty(get_theme_mod('m_logo_width'))){?>
@media only screen and (max-width:767px){.logo_link img{max-width: <?php echo esc_attr(get_theme_mod('m_logo_width'))?> !important; max-height: inherit !important;}}
<?php }?>