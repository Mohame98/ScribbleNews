<?php get_template_part('template-parts/header'); ?>

<div class="category-page">
  <?php if (have_posts()) : ?>
    <section class="category-news-posts">
      <div class="container">
      <h1><?php single_cat_title(); ?></h1>
      <?php while (have_posts()) : the_post(); ?>
      <div class="news-card">
      <?php get_template_part('template-parts/news-cards/news-cards'); ?>
      </div>
      <?php endwhile; ?>
      </div>
    </section>

    <div class="pagination">
      <?php the_posts_pagination(); ?>
    </div>

  <?php else : ?>
    <p>No posts found in this category.</p>
  <?php endif; ?>
</div>

<?php get_template_part('template-parts/footer'); ?>