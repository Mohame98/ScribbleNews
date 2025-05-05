<?php
/*
Template Name: About Page
*/
get_template_part('template-parts/header'); ?>

<?php if (have_posts()) : ?>
  <section class="about">
    <div class="container">
      <?php while (have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <div class="page-content">
      <?php the_content(); ?>
      </div>
      <?php get_template_part('/template-parts/newsletter'); ?> 
      <?php
      endwhile;
      endif;
      ?>
    </div>
  </section>
<?php get_template_part('template-parts/footer'); ?>