<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ScribbleNews</title>

  <!-- font awesome -->
  <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

  <!-- aos css -->
  <link 
    href="https://unpkg.com/aos@2.3.1/dist/aos.css" 
    rel="stylesheet" >
  
  <?php wp_head(); ?>
</head>
<body>
  <nav class="main-nav">
    <div class="container">
      <div class="left-side-navigation">
        <div class="logo-container">
          <a class="logo" href="<?php echo home_url(); ?>"><h1>Scribble</h1></a>
          <div class="hover-caption">Home</div>
        </div>
        
        <nav>
          <?php 
            $rules = array(
              'theme_location' => 'header-menu-left',
              'menu_class' => 'menu left-menu',
            );
            wp_nav_menu($rules);
          ?>
        </nav>
      </div>
      <div class="right-side-navigation">
        <div class="search-container">
          <button class="search-btn">
            <i class="fa-solid fa-magnifying-glass"></i>
            <div class="hover-caption">Search</div>
          </button>


          <dialog class="search-modal">
            <div class="modal-nested-wrapper">
              <?php get_search_form(); ?>
            </div>
          </dialog>
        </div>
        <nav>
          <?php 
            $rules = array(
              'theme_location' => 'header-menu-right',
              'menu_class' => 'menu right-menu',
            );
            wp_nav_menu($rules);
          ?>
        </nav>
        <div class="search-container">
          <button class="search-btn">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>

          <dialog class="search-modal">
            <i class="fa-solid fa-magnifying-glass"></i>
            <?php get_search_form(); ?>
          </dialog>
        </div>
      </div>
    </div>
  </nav>