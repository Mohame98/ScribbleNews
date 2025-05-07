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

  wp_localize_script('scribblenews-script', 'wp_ajax', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
  ));

  wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
  wp_enqueue_style('header-style', get_template_directory_uri() . '/css/__header.css');
  wp_enqueue_style('articles-style', get_template_directory_uri() . '/css/__front-page-articles.css');
  wp_enqueue_style('card-style', get_template_directory_uri() . '/css/__news-card.css');
  wp_enqueue_style('footer-style', get_template_directory_uri() . '/css/__footer.css');
  wp_enqueue_style('newsletter-style', get_template_directory_uri() . '/css/__newsletter.css');
  wp_enqueue_style('single-style', get_template_directory_uri() . '/css/__single.css');
  wp_enqueue_style('categories-style', get_template_directory_uri() . '/css/__categories.css');
  wp_enqueue_style('about-style', get_template_directory_uri() . '/css/__about.css');
  wp_enqueue_style('search-style', get_template_directory_uri() . '/css/__search.css');
}
add_action('wp_enqueue_scripts', 'scribblenews_enqueue_assets');


add_action('wp_ajax_live_search', 'my_live_search');
add_action('wp_ajax_nopriv_live_search', 'my_live_search');

function my_live_search() {
    $keyword = sanitize_text_field($_POST['keyword']);
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 5,
        's' => $keyword,
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ob_start();
        echo '<ul class="ajax-search-results">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        echo '</ul>';
        wp_reset_postdata();
        wp_send_json_success(ob_get_clean());
    } else {
        wp_send_json_success('<p>No results found.</p>');
    }
  wp_die();
}

 
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