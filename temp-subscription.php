<?php 
/*
Template Name: Subscription Page
*/
get_template_part('template-parts/header'); ?>
<main>
  <section class="newsletter-subscription-page">
    <div class="container">
      <h2>Get the best sent to your inbox, every month</h2>
      <p>Join our community of curious minds and get exclusive insights into technology, people, and culture delivered straight to your email.</p>
      <form action="">
        <input type="text" name="news" id="news" placeholder="Type your email">
        <button type="submit">Subscribe</button>
      </form>
      <span>Once monthly, no spam</span>
    </div>
  </section>
</main>
<?php get_template_part('template-parts/footer'); ?>