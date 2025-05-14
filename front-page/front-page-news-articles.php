<section class="art-news-articles">
  <div class="container">
    <div class="flex">
      <div class="left-col-featured">
        <div class="left-col-title">
          <h3>Featured</h3>
        </div>
        
        <?php $featuredNewsPosts = new WP_Query(
          array(
            'posts_per_page' => 2,
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'ASC',
            'tag' => 'featured'
          ));
        ?>
        <div class="featured-news">
          <?php while($featuredNewsPosts->have_posts()) {
          $featuredNewsPosts->the_post();
          ?>
          <?php get_template_part('template-parts/news-cards/news-cards'); ?>
          <?php } wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="right-col-recent">
        <div class="right-col-title">
          <h3>Most Recent</h3>
        </div>
        <?php 
          $paged_recent = isset($_GET['recent_page']) ? max(1, intval($_GET['recent_page'])) : 1;
          $recentNewsPosts = new WP_Query(array(
            'posts_per_page' => 6,
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged_recent
          ));
        ?>
        <div class="grid">
          <?php while($recentNewsPosts->have_posts()) {
          $recentNewsPosts->the_post();
          ?>
          <?php get_template_part('template-parts/news-cards/news-cards'); ?>
          <?php } ?>
        </div>
        <?php wp_reset_postdata(); ?>
        <div class="pagination">
        <?php 
          echo paginate_links(array(
            'total' => $recentNewsPosts->max_num_pages,
            'current' => $paged_recent,
            'format' => '?recent_page=%#%',
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »')
          )); 
        ?>
        </div>
      </div>
    </div>
  </div>
</section>