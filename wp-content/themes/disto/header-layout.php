<?php if (get_theme_mod('header_layout_design')=='header_layout_6'){?>
<!-- Start header -->
<header class="header-wraper header_magazine_style two_header_top_style jl_top_social_menu header_layout_style3_custom">
    <!-- Start Main menu -->
    <div class="jl_top_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper <?php if(!get_theme_mod('disable_sticky_menu')==1){echo " jl_top_menu_sticky ";}?>">
        <div class="container">
            <div class="row">
                <div class="main_menu col-md-12">

                    <?php if(!get_theme_mod('disable_social_icons')==1){?>
                    <ul class="social_icon_header personal_header_layout">
                        <?php if(get_theme_mod('facebook')){?>
                        <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>                        
                        <?php if(get_theme_mod('behance')){?>
                        <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('vimeo')){?>
                        <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('youtube')){?>
                        <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('instagram')){?>
                        <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('linkedin')){?>
                        <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('pinterest')){?>
                        <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('twitter')){?>
                        <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('deviantart')){?>
                        <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('dribble')){?>
                        <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('dropbox')){?>
                        <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('rss')){?>
                        <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('skype')){?>
                        <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('stumbleupon')){?>
                        <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('wordpress')){?>
                        <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('yahoo')){?>
                        <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('sound_cloud')){?>
                        <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('spotify_i')){?>
                        <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('wechat')){?>
                        <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('google_podcast')){?>
                        <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('anchor_i')){?>
                        <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('hello_i')){?>
                        <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                        <?php }?>
                        <?php if(get_theme_mod('email_link')){?>
                        <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                        <?php }?>
                    </ul>
                    <?php }?>

                    <!-- main menu -->
                    <div class="menu-primary-container navigation_wrapper">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                        <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="mainmenu" class="jl_main_menu">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
                        </ul>
                        <?php }}?>
                    </div>
                    <!-- end main menu -->                    
                    <div class="search_header_menu">
                        <div class="menu_mobile_icons"><i class="fa fa-bars"></i><i class="fa fa-times"></i></div>
                    <?php if(!get_theme_mod('disable_top_search')==1){?>
                        <div class="search_header_wrapper search_form_menu_personal_click"><i class="fa fa-search"></i></div>
                    <?php }?>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    <div class="header_main_wrapper header_style_3_opt">
        <div class="container">
            <div class="row header-main-position">
                <div class="col-md-12 logo-position-top">
                    <div class="logo_position_wrapper">
                        <div class="logo_position_table">
                            <!-- begin logo -->
                            <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php $logo = get_theme_mod('disto_logo'); ?>
                                <?php if (!empty($logo)): ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                                <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                                <?php if (!empty($disto_logow)): ?>
                                <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                            </a>
                            <!-- end logo -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
<?php }elseif (get_theme_mod('header_layout_design')=='header_layout_4'){?>
<!-- Start header -->
<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cusdate_head">
    <div class="header_top_bar_wrapper <?php if(get_theme_mod('disable_top_bar')==1){echo 'jl_top_bar_dis';}?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-primary-container navigation_wrapper">
                        <?php $top_menu = array('theme_location' => 'Top_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'jl_top_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($top_menu);?>
                    </div>

                    <?php if(get_theme_mod('jl_disable_c_date')){}else{?>
                    <div class="jl_top_bar_right">
                        <span class="jl_current_title"><?php echo esc_attr(get_theme_mod('jl_date_title'));?></span><?php echo date_i18n(get_option('date_format'));?>
                    </div>                    
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Main menu -->
    <div class="jl_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper <?php if(!get_theme_mod('disable_sticky_menu')==1){echo " jl_menu_sticky jl_stick ";}?>">        
        <div class="container">
            <div class="row">
                <div class="main_menu col-md-12">
                    <div class="logo_small_wrapper_table">
                        <div class="logo_small_wrapper">
                            <!-- begin logo -->
                            <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php $logo = get_theme_mod('disto_logo');?>
                                <?php if (!empty($logo)): ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                                <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                                <?php if (!empty($disto_logow)): ?>
                                <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                            </a>
                            <!-- end logo -->
                        </div>
                        </div>

                    <!-- main menu -->
                    <div class="menu-primary-container navigation_wrapper">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                        <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="mainmenu" class="jl_main_menu">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
                        </ul>
                        <?php }}?>
                    </div>

                    
                    <!-- end main menu -->
                    <div class="search_header_menu">
                        <div class="menu_mobile_icons"><i class="fa fa-bars"></i></div>
                        <?php if(!get_theme_mod('disable_top_search')==1){echo '<div class="search_header_wrapper search_form_menu_personal_click"><i class="fa fa-search"></i></div>';}?>
                        <div class="menu_mobile_share_wrapper">
                            <?php if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header_top">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('google_podcast')){?>
                                <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('anchor_i')){?>
                                <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('hello_i')){?>
                                <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('email_link')){?>
                                <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                                <?php }?>
                            </ul>
                            <?php }?>
                        </div>
                        <?php if(get_theme_mod('enable_dark_mode')==1){?>
                        <div class="jl_day_night <?php $wp_night_mode = isset( $_COOKIE['jlNightMode'] ) ? $_COOKIE['jlNightMode'] : '';if ( 'true' === $wp_night_mode ) {echo 'jl_night_en';}else{echo 'jl_day_en';}?>"><span class="jl-night-toggle-icon"><i class="fa fa-moon-o"></i> <i class="la la-sun-o"></i></span></div>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>

    </div>

</header>
<!-- end header -->
<?php }elseif (get_theme_mod('header_layout_design')=='header_magazine_personal'){?>
<!-- Start header -->
<div class="jl_topa_blank_nav"></div>
<header class="header-wraper header_magazine_full_screen header_magazine_full_screen jl_topa_menu_sticky options_dark_header jl_cus_sihead">
    <div id="menu_wrapper" class="menu_wrapper">
    <div class="container">
            <div class="row">
                <div class="col-md-12">    
        <!-- begin logo -->
        <div class="logo_small_wrapper_table">
            <div class="logo_small_wrapper">
                <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $logo = get_theme_mod('disto_logo'); ?>
                    <?php if (!empty($logo)): ?>
                    <img class="logo_black" src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php else: ?>
                    <img class="logo_black" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_w1.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php endif; ?>
                    <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                    <?php if (!empty($disto_logow)): ?>
                    <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php else: ?>
                    <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_w1.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php endif; ?>
                </a>
            </div>
        </div>

        <!-- end logo -->
        <!-- main menu -->
        <div class="menu-primary-container navigation_wrapper header_layout_style1_custom">
            <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
            <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
            <?php }else{ ?>
            <?php if ( current_user_can( 'manage_options' ) ){ ?>
            <ul id="mainmenu" class="jl_main_menu">
                <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                        <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
            </ul>
            <?php }}?>

            <div class="clearfix"></div>
        </div>
        <!-- end main menu -->
        <div class="search_header_menu">             
            <div class="menu_mobile_icons"><i class="fa fa-bars"></i></div>
            <?php if(!get_theme_mod('disable_top_search')==1){?>
            <div class="search_header_wrapper search_form_menu_personal_click"><i class="fa fa-search"></i></div>
            <?php }?>
        <?php if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header_top jl_socialcolor">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('google_podcast')){?>
                                <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('anchor_i')){?>
                                <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('hello_i')){?>
                                <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('email_link')){?>
                                <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                                <?php }?>
                            </ul>
                            <?php }?>
                        <?php if(get_theme_mod('enable_dark_mode')==1){?>
                        <div class="jl_day_night <?php $wp_night_mode = isset( $_COOKIE['jlNightMode'] ) ? $_COOKIE['jlNightMode'] : '';if ( 'true' === $wp_night_mode ) {echo 'jl_night_en';}else{echo 'jl_day_en';}?>"><span class="jl-night-toggle-icon"><i class="fa fa-moon-o"></i> <i class="la la-sun-o"></i></span></div>
                        <?php }?>              
        </div>
    </div>
</div>
</div>
</div>
</header>
<!-- end header -->
<?php }elseif (get_theme_mod('header_layout_design')=='header-header_layout_6'){?>
<!-- Start header -->
<header class="header-wraper header_magazine_full_screen header_magazine_full_screen options_dark_header jl_cus_sihead jl_head_lobl">
<div class="jl_topa_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper jl_topa_menu_sticky">
    <div class="container">
            <div class="row">
                <div class="col-md-12">            
        <!-- main menu -->
        <div class="menu-primary-container navigation_wrapper header_layout_style1_custom">
            <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
            <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
            <?php }else{ ?>
            <?php if ( current_user_can( 'manage_options' ) ){ ?>
            <ul id="mainmenu" class="jl_main_menu">
                <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                        <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
            </ul>
            <?php }}?>

            <div class="clearfix"></div>
        </div>
        <!-- end main menu -->
        <div class="search_header_menu jl_left_share">            
        <?php if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header_top">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('google_podcast')){?>
                                <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('anchor_i')){?>
                                <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('hello_i')){?>
                                <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('email_link')){?>
                                <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                                <?php }?>
                            </ul>
                            <?php }?>
        </div>
        <div class="search_header_menu">             
            <div class="menu_mobile_icons"><i class="fa fa-bars"></i></div>
            <?php if(!get_theme_mod('disable_top_search')==1){?>
            <div class="search_header_wrapper search_form_menu_personal_click"><i class="fa fa-search"></i></div>
            <?php }?>        
        </div>
    </div>
</div>
</div>
</div>
<!-- begin logo -->
        <div class="jl_logo_tm">
            <div class="container">
            <div class="row">
                <div class="col-md-12">  
                    <div class="jl_lgin">  
                <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $logo = get_theme_mod('disto_logo'); ?>
                    <?php if (!empty($logo)): ?>
                    <img class="logo_black" src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php else: ?>
                    <img class="logo_black" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_personal.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php endif; ?>
                    <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                    <?php if (!empty($disto_logow)): ?>
                    <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php else: ?>
                    <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_personal.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php endif; ?>
                </a>
        </div>
        </div>
        </div>
        </div>
        </div>

        <!-- end logo -->
</header>
<!-- end header -->
<?php }elseif (get_theme_mod('header_layout_design')=='header_magazine_full_screen'){?>
<!-- Start header -->
<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cus_top_share">
    <div class="header_top_bar_wrapper <?php if(get_theme_mod('disable_top_bar')==1){echo 'jl_top_bar_dis';}?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-primary-container navigation_wrapper">
                        <?php $top_menu = array('theme_location' => 'Top_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'jl_top_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($top_menu);?>
                    </div>

                    <div class="jl_top_cus_social">
                         <div class="search_header_menu">                            
                        <div class="menu_mobile_share_wrapper">
                            <span class="jl_hfollow"><?php echo get_theme_mod('jl_fl_title');?></span></span>
                            <?php if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header_top jl_socialcolor">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('google_podcast')){?>
                                <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('anchor_i')){?>
                                <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('hello_i')){?>
                                <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('email_link')){?>
                                <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                                <?php }?>

                            </ul>
                            <?php }?>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Start Main menu -->
    <div class="jl_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper <?php if(!get_theme_mod('disable_sticky_menu')==1){echo " jl_menu_sticky jl_stick ";}?>">        
        <div class="container">
            <div class="row">
                <div class="main_menu col-md-12">
                    <div class="logo_small_wrapper_table">
                        <div class="logo_small_wrapper">
                            <!-- begin logo -->
                            <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php $logo = get_theme_mod('disto_logo'); ?>
                                <?php if (!empty($logo)): ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                                <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                                <?php if (!empty($disto_logow)): ?>
                                <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                            </a>
                            <!-- end logo -->
                        </div>
                        </div>

                        <div class="search_header_menu jl_nav_mobile">
                        <div class="menu_mobile_icons"><i class="fa fa-bars"></i></div>
                        <?php if(!get_theme_mod('disable_top_search')==1){?>
                        <div class="search_header_wrapper search_form_menu_personal_click"><i class="fa fa-search"></i></div>
                        <?php }?>
                        <?php if(get_theme_mod('enable_dark_mode')==1){?>
                        <div class="jl_day_night jldnup <?php $wp_night_mode = isset( $_COOKIE['jlNightMode'] ) ? $_COOKIE['jlNightMode'] : '';if ( 'true' === $wp_night_mode ) {echo 'jl_night_en';}else{echo 'jl_day_en';}?>"><span class="jl-night-toggle-icon"><i class="fa fa-moon-o"></i> <i class="la la-sun-o"></i></span></div>
                        <?php }?>
                    </div>

                    <!-- main menu -->
                    <div class="menu-primary-container navigation_wrapper jl_cus_share_mnu">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                        <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="mainmenu" class="jl_main_menu">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
                        </ul>
                        <?php }}?>
                    </div>  
                    <!-- end main menu -->

                     
                   

                </div>
            </div>
        </div>

    </div>

</header>
<!-- end header -->
<?php }elseif (get_theme_mod('header_layout_design')=='header_magazine_black'){?>
<!-- Start header -->
<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style5_custom headcus5_custom">

    <div class="header_main_wrapper header_style_cus5_opt">
        <div class="container jl_header_5container">
            <div class="row header-main-position">
                <div class="col-md-12 logo-position-top">
                    <div class="logo_position_wrapper">
                        <div class="logo_position_table">


                            <?php if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header personal_header_layout">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('google_podcast')){?>
                                <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('anchor_i')){?>
                                <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('hello_i')){?>
                                <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('email_link')){?>
                                <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                                <?php }?>
                            </ul>
                            <?php }?>
                            <!-- begin logo -->
                            <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php $logo = get_theme_mod('disto_logo'); ?>
                                <?php if (!empty($logo)): ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="logo_black" src="<?php echo esc_url(get_template_directory_uri().'/img/crush.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                                <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                                <?php if (!empty($disto_logow)): ?>
                                <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/crush.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                            </a>
                            <!-- end logo -->
                            <div class="jl_header_link_subscribe">
                    <div class="search_header_menu jl_menu_bottom">
                        <div class="menu_mobile_icons"><i class="fa fa-bars"></i></div>
                    </div>

                    <?php if(!get_theme_mod('disable_top_search')==1){?>
                    <div class="search_header_wrapper jl_menu_search search_form_menu_personal_click"><i class="fa fa-search"></i></div>
                    <?php }?>
                    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main menu -->
    <div class="jl_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper <?php if(!get_theme_mod('disable_sticky_menu')==1){echo " jl_menu_sticky jl_stick ";}?>">
        <div class="container">
            <div class="row">
                <div class="main_menu col-md-12">

                    


                    <!-- main menu -->
                    <div class="menu-primary-container navigation_wrapper">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                        <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="mainmenu" class="jl_main_menu">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
                        </ul>
                        <?php }}?>
                    </div>

                    


                    <!-- end main menu -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
<?php }elseif (get_theme_mod('header_layout_design')=='header-header_layout_06'){?>
<!-- Start header -->
<div class="jl_topa_blank_nav jl_blank_06"></div>
<header class="header-wraper header_magazine_full_screen jl_headcus_06 header_magazine_full_screen jl_topa_menu_sticky options_dark_header jl_cus_sihead">
    <div id="menu_wrapper" class="menu_wrapper">
    <div class="container">
            <div class="row">
                <div class="col-md-12">    
        <!-- begin logo -->
        <div class="logo_small_wrapper_table">
            <div class="logo_small_wrapper">
                <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $logo = get_theme_mod('disto_logo'); ?>
                    <?php if (!empty($logo)): ?>
                    <img class="logo_black" src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php else: ?>
                    <img class="logo_black" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_w2.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php endif; ?>
                    <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                    <?php if (!empty($disto_logow)): ?>
                    <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php else: ?>
                    <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_w2.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                    <?php endif; ?>
                </a>
            </div>
        </div>

        <!-- end logo -->
        <!-- main menu -->
        <div class="menu-primary-container navigation_wrapper header_layout_style1_custom">
            <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
            <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
            <?php }else{ ?>
            <?php if ( current_user_can( 'manage_options' ) ){ ?>
            <ul id="mainmenu" class="jl_main_menu">
                <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                        <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
            </ul>
            <?php }}?>

            <div class="clearfix"></div>
        </div>
        <!-- end main menu -->
        <div class="search_header_menu">             
            <div class="menu_mobile_icons"><i class="fa fa-bars"></i></div>
            <?php if(!get_theme_mod('disable_top_search')==1){?>
            <div class="search_header_wrapper search_form_menu_personal_click"><i class="fa fa-search"></i></div>
            <?php }?>
        <?php if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header_top jl_socialcolor">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('google_podcast')){?>
                                <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('anchor_i')){?>
                                <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('hello_i')){?>
                                <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('email_link')){?>
                                <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                                <?php }?>
                            </ul>
                            <?php }?>
        </div>
    </div>
</div>
</div>
</div>
</header>
<!-- end header -->
<?php }else{?>
<!-- Start header -->
<header class="header-wraper jl_header_magazine_style two_header_top_style header_layout_style3_custom jl_cusdate_head">
    <div class="header_top_bar_wrapper <?php if(get_theme_mod('disable_top_bar')==1){echo 'jl_top_bar_dis';}?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="menu-primary-container navigation_wrapper">
                        <?php $top_menu = array('theme_location' => 'Top_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'jl_top_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($top_menu);?>
                    </div>

                    <?php if(get_theme_mod('jl_disable_c_date')){}else{?>
                    <div class="jl_top_bar_right">
                        <span class="jl_current_title"><?php echo get_theme_mod('jl_date_title');?></span><?php echo date_i18n(get_option('date_format'));?>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Main menu -->
    <div class="jl_blank_nav"></div>
    <div id="menu_wrapper" class="menu_wrapper <?php if(!get_theme_mod('disable_sticky_menu')==1){echo " jl_menu_sticky jl_stick ";}?>">        
        <div class="container">
            <div class="row">
                <div class="main_menu col-md-12">
                    <div class="logo_small_wrapper_table">
                        <div class="logo_small_wrapper">
                            <!-- begin logo -->
                            <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php $logo = get_theme_mod('disto_logo'); ?>
                                <?php if (!empty($logo)): ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                                <?php $disto_logow = get_theme_mod('disto_logow'); ?>
                                <?php if (!empty($disto_logow)): ?>
                                <img class="jl_l_white" src="<?php echo esc_url($disto_logow); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_l_white" src="<?php echo esc_url(get_template_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                            </a>
                            <!-- end logo -->
                        </div>
                        </div>

                    <!-- main menu -->
                    <div class="menu-primary-container navigation_wrapper">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){ ?>
                        <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'Main_Menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="mainmenu" class="jl_main_menu">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add navigation menu', 'disto' ); ?></a></li>
                        </ul>
                        <?php }}?>
                    </div>

                    
                    <!-- end main menu -->
                    <div class="search_header_menu">
                        <div class="menu_mobile_icons"><i class="fa fa-bars"></i></div>
                        <?php if(!get_theme_mod('disable_top_search')==1){echo '<div class="search_header_wrapper search_form_menu_personal_click"><i class="fa fa-search"></i></div>';}?>
                        <div class="menu_mobile_share_wrapper">
                            <?php if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header_top">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fa fa-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="fa fa-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="fa fa-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="fa fa-wechat"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('google_podcast')){?>
                                <li><a class="google_podcast" href="<?php echo esc_url(get_theme_mod('google_podcast'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/google_podcast.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('anchor_i')){?>
                                <li><a class="anchor_i" href="<?php echo esc_url(get_theme_mod('anchor_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/anchor.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('hello_i')){?>
                                <li><a class="hello_i" href="<?php echo esc_url(get_theme_mod('hello_i'));?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/img/helo.png'); ?>" /></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('email_link')){?>
                                <li><a class="email_link" href="<?php echo esc_url('mailto:' . antispambot(get_theme_mod('email_link')));?>"><i class="fa fa-envelope"></i></a></li>
                                <?php }?>

                            </ul>
                            <?php }?>
                        </div>
                        <?php if(get_theme_mod('enable_dark_mode')==1){?>
                        <div class="jl_day_night <?php $wp_night_mode = isset( $_COOKIE['jlNightMode'] ) ? $_COOKIE['jlNightMode'] : '';if ( 'true' === $wp_night_mode ) {echo 'jl_night_en';}else{echo 'jl_day_en';}?>"><span class="jl-night-toggle-icon"><i class="fa fa-moon-o"></i> <i class="la la-sun-o"></i></span></div>
                        <?php }?>
                    </div>

                </div>
            </div>
        </div>

    </div>

</header>
<!-- end header -->

<?php }?>