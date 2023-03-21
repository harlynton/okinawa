<?php get_header();?>
  <main class="pagina seccion no-sidebars contenedor">
    <ul class = "listado-blog">

    <?php
        while(have_posts()) {
            the_post();
            get_template_part('template-parts/blog');
        }
    ?>

    </ul>
  </main>

<?php get_footer();?>