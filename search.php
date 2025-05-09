<?php get_template_part('template-parts/header'); ?>
<main class="search-results-page">
  <?php if (have_posts()) : ?>
    <section class="search-results-posts">
      <div class="container">
        <h1 class="search-title">
          Search Results for : <span><?php echo get_search_query(); ?></span>
        </h1>
        <div class="grid" id="ajax-request">
          <?php while (have_posts()) : the_post(); ?>
          <div class="news-card">
            <?php get_template_part('template-parts/news-cards/news-cards'); ?>
          </div>
          <?php endwhile; ?>
        </div>
        <div class="pagination ajax">
        <?php the_posts_pagination(); ?>
        </div>
      </div>
    </section>
  <?php else : ?>
    <section class="no-results">
      <div class="container">
        <h1>No results found for: <?php echo get_search_query(); ?></h1>
        <p>Try a different search term.</p>
      </div>
    </section>
  <?php endif; ?>
</main>
<?php get_template_part('/template-parts/newsletter'); ?>
<?php get_template_part('template-parts/footer'); ?>