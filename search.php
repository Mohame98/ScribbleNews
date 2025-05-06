<?php get_template_part('template-parts/header'); ?>
<main class="search-results">
    <h1 class="search-title">
        Search Results for: <span><?php echo get_search_query(); ?></span>
    </h1>
    <?php if (have_posts()) : ?>
        <ul class="search-results-list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="search-result-item">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="search-excerpt"><?php the_excerpt(); ?></div>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p>No results found. Try a different search term.</p>
    <?php endif; ?>
</main>
<?php get_template_part('template-parts/footer'); ?>