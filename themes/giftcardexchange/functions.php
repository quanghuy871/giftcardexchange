<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

defined( 'ASSETS_VERSION' ) or define( 'ASSETS_VERSION', '1.2.9' );
//add_filter( 'acf/settings/show_admin', ( defined( 'SHOW_ACF' ) && SHOW_ACF ? '__return_true' : '__return_false' ) );

add_filter( 'body_class', 'body_classes' );
function body_classes( $classes ) {
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}

add_action( 'wp_head', 'pingback_header' );
function pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'after_setup_theme', 'setup_theme' );
function setup_theme() {
  add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ] );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'customize-selective-refresh-widgets' );

  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );

  add_image_size( 'thumbnails_600_516', 600, 516, true );

  add_post_type_support( 'post', 'excerpt' );

  register_nav_menus( [
    'primary_menu_right' => __( 'Primary Menu - Right' ),
    'footer_menu'        => __( 'Footer Menu' ),
  ] );
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
function enqueue_scripts() {
  $suffix = SCRIPT_DEBUG ? '' : '.min';

  /* Common assets */
  $assets_css = [
    'css-bootstrap-reboot' => 'plugins/bootstrap-4.0.0-beta.3/css/bootstrap-reboot.css',
    'css-bootstrap-grid'   => 'plugins/bootstrap-4.0.0-beta.3/css/bootstrap-grid.min.css',
    'css-bootstrap'        => 'plugins/bootstrap-4.0.0-beta.3/css/bootstrap.min.css',
    'css-font-awesome'     => 'plugins/font-awesome-4.7.0/css/font-awesome.min.css',
    'css-select2'          => 'plugins/select2-4.0.6-rc.1/dist/css/select2.min.css',
    'css-wow'              => 'plugins/wow/css/libs/animate.css',
    'css-swiper'           => 'plugins/swiper/swiper-bundle.min.css',
  ];
  $assets_js  = [
    'js-html5'       => 'js/html5.min.js',
    'js-respond'     => 'js/respond.min.js',
    'js-bootstrap'   => 'plugins/bootstrap-4.0.0-beta.3/js/bootstrap.bundle.min.js',
    'js-css-browser' => 'plugins/css_browser_selector/css_browser_selector.js',
    'js-wow'         => 'plugins/wow/dist/wow.min.js',
    'js-select2'     => 'plugins/select2-4.0.6-rc.1/dist/js/select2.full.min.js',
    'js-swiper'      => 'plugins/swiper/swiper-bundle.min.js',
  ];

  /* Specific assets */
  if ( is_page_template( 'templates/page-packages.php' ) ) {
    $assets_js['js-swiper'] = 'plugins/swiper/swiper-bundle.min.js';
  }

  if ( is_page() || is_single()) {
    $assets_css['css-wow'] = 'plugins/wow/css/libs/animate.css';
    $assets_js['js-wow'] = 'plugins/wow/dist/wow.min.js';
  }

  /* Enqueue */
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'underscore' );
  foreach ( $assets_css as $handle => $path ) {
    wp_enqueue_style( $handle, get_assets_path( $path ), [], ASSETS_VERSION );
  }
  foreach ( $assets_js as $handle => $path ) {
    wp_enqueue_script( $handle, get_assets_path( $path ), [], ASSETS_VERSION, true );
  }

  /* Main assets */
  wp_enqueue_style( 'theme-dashicons', includes_url( "css/dashicons$suffix.css" ), [], ASSETS_VERSION );
  wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/main.css', [], ASSETS_VERSION );
  wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/assets/js/main.js', [], ASSETS_VERSION, true );

  wp_localize_script( 'theme-js',
    'GCR',
    [
      'ajaxUrl' => admin_url( 'admin-ajax.php' ),
    ]
  );
}

add_action( 'wp_head', 'hook_head' );
function hook_head() {
  echo '<script type="text/javascript">var $ = jQuery.noConflict();</script>';
}

function get_assets_path( $filename ) {
  $dist_path = get_template_directory_uri() . '/assets/';
  $directory = dirname( $filename ) . '/';
  $file      = basename( $filename );

  return esc_url( $dist_path . $directory . $file );
}

function the_assets_path( $filename ) {
  echo get_assets_path( $filename );
}