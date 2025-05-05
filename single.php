<?php get_template_part('template-parts/header'); ?>
<!-- START LOOP HERE -->
<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post(); 
    $tags = get_the_Tags(); 
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail');
?>
<main>
    <section class="single-news-title">
      <div class="container">
      <?php get_template_part('template-parts/news-cards/news-card-description'); ?>
      </div>
    </section>

    <section>
      <div class="main img" style="background-image:url(<?php echo $url; ?>);"></div>
    </section>

    <section class="single-news-content">
      <div class="container">
        <div class="text-editor-content">
          <?php the_content(); ?>
          <?php $prev_post = get_previous_post(); ?>
          <?php $next_post = get_next_post(); ?>
          <div class="pagination">
            <div class="page-links">
              <?php if($prev_post) : ?>
                  <a class="btn learn-more" href="<?php echo get_permalink($prev_post->ID); ?>">Previous</a>
              <?php endif; ?>
              <?php if($next_post) : ?>
                  <a class="btn learn-more" href="<?php echo get_permalink($next_post->ID); ?>">Next</a>
              <?php endif; ?>
            </div>
          </div>   
        </div>
      </div>
    </section> 

    <section class="related-news-blogs">
      <div class="container">
        <?php
        $current_post_id = get_the_ID();
        $categories = get_the_category($current_post_id);

        if (!empty($categories)) {
          $category_ids = wp_list_pluck($categories, 'term_id');

        $similarNewsPosts = new WP_Query(
          array(
            'posts_per_page' => 2,
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'category__in' => $category_ids,  
            'post__not_in' => array($current_post_id),
          ));
        }
        ?>
        <?php while($similarNewsPosts->have_posts()) {
          $similarNewsPosts->the_post();
        ?>
        <h2>More in 
        <?php
          $categories = get_the_category();
          if ($categories) {
            foreach ($categories as $category) {
              echo '<span class="category">' . esc_html($category->name) . '</span> ';
            }
          }
        ?>
        </h2>
        <div class="news-card">
        <?php get_template_part('template-parts/news-cards/news-cards'); ?>
        </div>
        <?php } wp_reset_postdata(); ?>
      </div>
    </section>

    <?php get_template_part('/template-parts/newsletter'); ?>
</main>
<?php
    } // end while
  } // end if
?>
<!-- END POSTS LOOP -->
<?php get_template_part('template-parts/footer'); ?>