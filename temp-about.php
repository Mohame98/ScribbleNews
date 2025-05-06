<?php
/*
Template Name: About Page
*/
get_template_part('template-parts/header'); ?>
<?php if (have_posts()) : ?>
  <section class="about">
    <div class="container">
      <?php while (have_posts()) : the_post(); ?>
        <?php
        $page_id = get_the_ID();
        $featured_image = get_the_post_thumbnail_url($page_id, 'full');
        $second_image = get_field('about_page_second_img', $page_id);
        $about_title = get_field('about_page_title', $page_id);
        ?>
      
        <section class="about-page-title">
          <div class="container narrow">
            <?php if ($about_title) : ?>
            <h1 class="title"><?php echo esc_html($about_title); ?></h1>
            <?php endif; ?>
          </div>
        </section>

        <div class="about-page-imgs">
          <?php if ($featured_image) : ?>
          <img class="img" src="<?php echo esc_url($featured_image); ?>" alt="Featured Image">
          <?php endif; ?>

          <?php if ($second_image) : ?>
            <img class="img" src="<?php echo esc_url($second_image); ?>" alt="Second Image">
          <?php endif; ?>
        </div>

        <section class="about-page-content">
          <div class="container narrow">
            <div class="text-editor-content">
              <?php the_content(); ?>
            </div>
          </div>
        </section>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>
<?php get_template_part('/template-parts/newsletter'); ?> 
<?php get_template_part('template-parts/footer'); ?>