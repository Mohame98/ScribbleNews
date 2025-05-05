<a href="<?php the_permalink(); ?>" target="_blank">
  <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
  <div class="news-card-img" style="background-image:url(<?php echo esc_url($url); ?>);"></div>

  <?php get_template_part('template-parts/news-cards/news-card-description'); ?>
</a>