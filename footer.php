
  <footer class="site-footer contenedor">
    <hr>
    <div class="contenido-footer">
      <?php 
          $args = array(
            'theme_location'=> 'menu-principal',
            'container' => 'nav',
            'container_class' => 'menu-principal'
          );
          wp_nav_menu($args);
        ?>

    </div>
  </footer>
  <div class="barra-copyright">
        <p class="copyright"> Copyright © <?php echo date('Y') ?> Todos los derechos reservados.</p>
        <p class="site-info"> <?php echo get_bloginfo('name');?></p>
        <p class="social-media">
          <a href="https://www.facebook.com/okinawa.karatedorionegro" >
            <span class="dashicons dashicons-facebook-alt"></span>
          </a>
          <a href="https://www.instagram.com/okinawa.karatedo/" >
            <span class="dashicons dashicons-instagram"></span>
          </a>
          
        </p>

    </div>
  <?php wp_footer();?>
  </body>
</html>