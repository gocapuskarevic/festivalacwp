<?php
/**
 * Version 0.0.3
 *
 * This file is just an example you can copy it to your theme and modify it to fit your own needs.
 * Watch the paths though.
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if ( !class_exists( 'Radium_Theme_Demo_Data_Importer' ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'importer/radium-importer.php' ); //load admin theme data importer

	class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

		/**
		 * Set framewok
		 *
		 * options that can be used are 'default', 'radium' or 'optiontree'
		 *
		 * @since 0.0.3
		 *
		 * @var string
		 */
		public $theme_options_framework = 'customizer';

		/**
		 * Holds a copy of the object for easy reference.
		 *
		 * @since 0.0.1
		 *
		 * @var object
		 */
		private static $instance;

		/**
		 * Set the key to be used to store theme options
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $theme_option_name       = 'INHYPE_PANEL'; //set theme options name here (key used to save theme options). Optiontree option name will be set automatically

		/**
		 * Set name of the theme options file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $theme_options_file_name = 'theme_options.dat';

		/**
		 * Set name of the widgets json file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widgets_file_name       = 'widgets.json';

		/**
		 * Set name of the content file
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $content_demo_file_name  = 'content.xml';

		/**
		 * Holds a copy of the widget settings
		 *
		 * @since 0.0.2
		 *
		 * @var string
		 */
		public $widget_import_results;

		/**
		 * Constructor. Hooks all interactions to initialize the class.
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			if(!isset($_GET['import_theme_demo'])) {
				$_GET['import_theme_demo'] = 0;
			}

			$this->demo_files_path = plugin_dir_path( __FILE__ ) . 'demo-files/'.$_GET['import_theme_demo'].'/';

			self::$instance = $this;
			parent::__construct();

		}

		/**
		 * Add menus - the menus listed here largely depend on the ones registered in the theme
		 *
		 * @since 0.0.1
		 */
		public function set_demo_menus(){

			// Menus to Import and assign - you can remove or add as many as you want

			$top_menu   = get_term_by('name', 'Top menu', 'nav_menu');
			$main_menu   = get_term_by('name', 'Main menu', 'nav_menu');
			$footer_menu = get_term_by('name', 'Footer menu', 'nav_menu');

			// Default demo
			set_theme_mod( 'nav_menu_locations', array(
				'Top_Menu' => $top_menu->term_id,
				'Main_Menu' => $main_menu->term_id,
				'Footer_Menu' => $top_menu->term_id
				)
			);			

			// update_option( 'show_on_front', 'posts' );

			if($_GET['import_theme_demo'] == 1) {
			$front_page = get_page_by_title( "Home Page" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 2) {
			$front_page = get_page_by_title( "Home personal" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 3) {
			$front_page = get_page_by_title( "Home magazine 4" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 4) {
			$front_page = get_page_by_title( "Home personal post" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 5) {
			$front_page = get_page_by_title( "Home magazine 3" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 6) {
			$front_page = get_page_by_title( "Home Magazine 1" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 7) {
			$front_page = get_page_by_title( "Home Magazine 2" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 8) {
			$front_page = get_page_by_title( "Home grid overlay" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 9) {
			$front_page = get_page_by_title( "Home main with grid sidebar" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			if($_GET['import_theme_demo'] == 10) {
			$front_page = get_page_by_title( "Home Page grid 3 col" );
			update_option( 'page_on_front', $front_page->ID );
			update_option( 'show_on_front', 'page' );
			}

			$checkout_page = get_page_by_title( "Checkout" );
			update_option( 'woocommerce_checkout_page_id', $checkout_page->ID );

			$cart_page = get_page_by_title( "Cart" );
			update_option( 'woocommerce_cart_page_id', $cart_page->ID );

			$shop_page = get_page_by_title( "Shop" );
			update_option( 'woocommerce_shop_page_id', $shop_page->ID );

			$account_page = get_page_by_title( "My Account" );
			update_option( 'woocommerce_myaccount_page_id', $account_page->ID );
			
			$this->flag_as_imported['menus'] = true;
		}

	}

	new Radium_Theme_Demo_Data_Importer;

}
