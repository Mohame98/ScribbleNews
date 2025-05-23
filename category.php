<?php get_template_part('template-parts/header'); ?>
<main class="category-page">
  <?php if (have_posts()) : ?>
    <section class="category-news-posts">
      <div class="container">
        <h1><?php single_cat_title(); ?></h1>
        <div class="grid" id="ajax-request">
          <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/news-cards/news-cards'); ?>
          <?php endwhile; ?>
        </div>
        <div class="pagination ajax">
        <?php the_posts_pagination(); ?>
        </div>
      </div>
    </section>
  <?php else : ?>
    <section>
      <div class="container">
        <p>No posts found in this category.</p>
      </div>
    </section>
  <?php endif; ?>
</main>
<?php get_template_part('/template-parts/newsletter'); ?>
<?php get_template_part('template-parts/footer'); ?>