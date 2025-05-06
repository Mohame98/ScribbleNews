<?php

function scribblenews_enqueue_assets() {
  wp_enqueue_style('scribblenews-style', get_stylesheet_uri());
  wp_enqueue_script(
    'scribblenews-script',
    get_template_directory_uri() . '/js/main.js',
    array(), 
    false,   
    true
  );

  wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
  wp_enqueue_style('header-style', get_template_directory_uri() . '/css/__header.css');
  wp_enqueue_style('articles-style', get_template_directory_uri() . '/css/__front-page-articles.css');
  wp_enqueue_style('card-style', get_template_directory_uri() . '/css/__news-card.css');
  wp_enqueue_style('footer-style', get_template_directory_uri() . '/css/__footer.css');
  wp_enqueue_style('newsletter-style', get_template_directory_uri() . '/css/__newsletter.css');
  wp_enqueue_style('single-style', get_template_directory_uri() . '/css/__single.css');
  wp_enqueue_style('categories-style', get_template_directory_uri() . '/css/__categories.css');
  wp_enqueue_style('about-style', get_template_directory_uri() . '/css/__about.css');
}
add_action('wp_enqueue_scripts', 'scribblenews_enqueue_assets');
 
// for featured image
function enable_featured_img(){
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'enable_featured_img');

add_theme_support('widgets');
add_theme_support('menus');
function my_menus() {
  register_nav_menus(
    array(
      'header-menu-left' => __('Header Left Navigation'),
      'header-menu-right' => __('Header right Navigation'),
      'footer-menu-one' => __('Footer Navigation one'),
      'footer-menu-two' => __('Footer Navigation two'),
    )
  );
}
add_action('init', 'my_menus');
?>