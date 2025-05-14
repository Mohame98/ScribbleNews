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
  <div class='blocker'></div>
  <nav class="main-nav">
    <div class="container">
      <div class="left-side-navigation">
        <abbr title="ScribbleNews">
          <a class="logo" href="<?php echo home_url(); ?>"><h1>Scribble</h1></a>
        </abbr>
        <nav class="wp-desktop-nav" aria-label="Desktop navigation">
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
          <button class="search-btn" title="Search" aria-haspopup="Search Bar" aria-controls="search-modal" aria-expanded="false">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
    
          <dialog id="search-modal" class="search-modal">
            <div class="modal-nested-wrapper">
            <?php get_search_form(); ?>
            </div>
          </dialog>
        </div>
        <nav class="wp-desktop-nav">
          <?php 
            $rules = array(
              'theme_location' => 'header-menu-right',
              'menu_class' => 'menu right-menu',
            );
            wp_nav_menu($rules);
          ?>
        </nav>
          <button class="mobile-menu-btn" popovertarget="mobile-nav" popovertargetaction="toggle-mobile-nav" aria-haspopup="Menu button" title="Menu Button" aria-expanded="false" aria-controls="mobile-nav">
            <i class="fa-solid fa-bars"></i>
          </button>
          <nav class="mobile-nav popover" id="mobile-nav" aria-label="Mobile navigation" popover>
            <div class="top-menu">
              <?php 
                $rules = array(
                  'theme_location' => 'header-menu-left',
                  'menu_class' => 'menu left-menu',
                );
                wp_nav_menu($rules);
              ?>
            </div>
            <hr>
            <div class="bottom-menu">
              <?php 
                $rules = array(
                  'theme_location' => 'header-menu-right',
                  'menu_class' => 'menu right-menu',
                );
                wp_nav_menu($rules);
              ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </nav>