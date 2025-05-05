<div class="news-card-description">
  <div class="category-and-date">
    <div class="categories">
      <?php
        $categories = get_the_category();
        if ($categories) {
          foreach ($categories as $category) {
            echo '<span class="category">' . esc_html($category->name) . '</span> ';
          }
        }
      ?>
    </div>
    <?php echo get_the_date('M j, Y'); ?>
  </div>

  <div class="card-content">
    <h3 class="title"><?php the_title(); ?></h3>
    <p class="post-description"><?php the_field('post_small_description'); ?></p>
  </div>
</div>