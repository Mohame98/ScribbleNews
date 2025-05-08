  <footer>
    <div class="container">
      <div class="grid">
        <abbr title="ScribbleNews">
          <a class="logo" href="<?php echo home_url(); ?>"><h1>Scribble</h1></a>
        </abbr>
      
        <div class="footer-col-one">
          <h3>Pages</h3>
          <nav>
            <?php 
              $rules = array(
                'theme_location' => 'footer-menu-one',
                'menu_class' => 'footer footer-one',
              );
              wp_nav_menu($rules);
            ?>
          </nav>
        </div>
        <div class="footer-col-two">
          <nav>
            <h3>Category</h3>
            <?php 
              $rules = array(
                'theme_location' => 'footer-menu-two',
                'menu_class' => 'menu footer-two',
              );
              wp_nav_menu($rules);
            ?>
          </nav>
        </div>
        <div class="footer-col-three">
          <h3>Contact</h3>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Pinterest</a></li>
            <li><a href="#">Youtube</a></li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="footer-end">
				<a href="https://digitalportfolio.host" target="_blank">Made By Mohame</a> • © <span class="year"></span>			
      </div>
    </div>
  </footer>
  <!-- aos js -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <script> 
      // initialize aos
      // AOS.init({ duration: 1000, easing: "ease-in-out", once: true });
  </script>
  <?php wp_footer(); ?>
  </body>
</html>