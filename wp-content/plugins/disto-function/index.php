<?php
/*
Plugin Name: Disto Function
Description: Function and feature for Disto theme
Plugin URI: https://themeforest.net/user/jellywp/portfolio
Author: Jellywp
Author URI: https://themeforest.net/user/jellywp
Version: 1.9
License: GPL2
Text Domain: disto
*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	$jl_theme = wp_get_theme();
	include 'cus-metabox.php';
	include 'post-like.php';
	include 'view-post-counter.php';
	include 'functions.php';
	include 'counter_fan.php';
	require_once plugin_dir_path( __FILE__ ).'/function/init.php';	
	require_once plugin_dir_path( __FILE__ ).'/widget/social_counter.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/comments.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/adswidget.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/popular.php';  
	require_once plugin_dir_path( __FILE__ ).'/widget/recent-large.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/about-us.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/category-widget.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/recent-small.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/slider-post.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/recent-main-list.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/recent-grid.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-main-right-list.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-carousel.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-main-post-below-2-grid.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/recent-small-number.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-large-list.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-large-grid.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-large.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-list-medium.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-slider-tab.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-slider.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-small-grid.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-small-grid-overlay.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-grid5.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-grid6.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-2main-right-list.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-grid-right-list.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/recent-small-overlay.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-newsticker.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-small-list.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/home-feature-box.php';
 ?>