<?php
/*
Template Name: All Articles
*/
get_template_part('template-parts/header');
?>

<main class="all-articles-page">
    <section class="all-news-posts">
      <div class="container">
        <h1>All Articles</h1>
        <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1; ?>
        <?php $allArticles = new WP_Query(
          array(
            'posts_per_page' => 6,
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $paged
          ));
        ?>
        <?php if ($allArticles->have_posts()) : ?>
            <div class="grid" id="ajax-request">
                <?php while($allArticles->have_posts()) {
                $allArticles->the_post();
                ?>
                <div class="news-card">
                <?php get_template_part('template-parts/news-cards/news-cards'); ?>
                </div>
                <?php } ?>
            </div>
            <?php wp_reset_postdata(); ?>
            <div class="pagination">
            <?php 
                echo paginate_links(array(
                'total' => $allArticles->max_num_pages,
                'current' => $paged,
                'format' => '?recent_page=%#%',
                'prev_text' => __('« Prev'),
                'next_text' => __('Next »')
                )); 
            ?>
            </div>
        <?php else : ?>
        <p>No posts found.</p>
      <?php endif; ?>
        </div>
    </section>
</main>

<?php get_template_part('/template-parts/newsletter'); ?>
<?php get_template_part('template-parts/footer'); ?>
