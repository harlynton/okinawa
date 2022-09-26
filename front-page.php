<?php get_header('front');?>

<section class="bienvenida text-center seccion">
  <h2 class="texto-titulo"><?php the_field('encabezado_bienvenida');?></h2>
  <p><?php the_field('texto_bienvenida')?></p>
</section>

<div class="seccion-areas">
  <ul class="contenedor-areas">
    <li class="area">
      <?php 
        $area1 = get_field('area_1');
        $imgid1 = $area1['area_imagen'];
        $imagen1 = wp_get_attachment_image_src($imgid1, 'full')[0];
      ?>
      <img src="<?php echo esc_attr($imagen1); ?>"/>
      <p><?php echo esc_html($area1['area_texto']); ?></p>
    </li>
    <li class="area">
      <?php 
        $area2 = get_field('area_2');
        $imgid2 = $area2['area_imagen'];
        $imagen2 = wp_get_attachment_image_src($imgid2, 'full')[0];
      ?>
      <img src="<?php echo esc_attr($imagen2); ?>"/>
      <p><?php echo esc_html($area2['area_texto']); ?></p>
    </li>
    <li class="area">
      <?php 
        $area3 = get_field('area_3');
        $imgid3 = $area3['area_imagen'];
        $imagen3 = wp_get_attachment_image_src($imgid3, 'full')[0];
      ?>
      <img src="<?php echo esc_attr($imagen3); ?>"/>
      <p><?php echo esc_html($area3['area_texto']); ?></p>
    </li>
    <li class="area">
      <?php 
        $area4 = get_field('area_4');
        $imgid4 = $area4['area_imagen'];
        $imagen4 = wp_get_attachment_image_src($imgid4, 'full')[0];
      ?>
      <img src="<?php echo esc_attr($imagen4); ?>"/>
      <p><?php echo esc_html($area4['area_texto']); ?></p>
    </li>
  </ul>
</div>
<section class="clases">
  <div class="contenedor seccion">
    <h2 class="text-center texto-titulo">Nuestras Clases</h2>
    <?php okinawa_lista_clases(4); ?>
    <div class="contenedor-boton">
      <a href="<?php echo esc_url(get_permalink(get_page_by_title('Clases')));?>"class = "boton boton-primario">Ver todas las clases</a>
    </div>
  </div>
</section>

<section class="instructores">
  <div class="contenedor seccion">
    <h2 class="text-center texto-titulo">Nuestros instructores</h2>
    <p class="text-center">Lorem ipsum bla bla bla</p>
    <ul class="listado-instructores">
      <?php 
        $args = array(
          'post_type' =>'instructores',
          'post_per_page' => 30
        );

        $instructores = new WP_Query($args);
        while($instructores->have_posts()): $instructores->the_post();
      ?>
      <li class="instructor">
        <?php the_post_thumbnail('mediano'); ?>
        <div class="contenido text-center">
          <h3><?php the_title(); ?></h3>
          <?php the_content(); ?>
          <div class="especialidad">
            <?php 
              $esp =get_field('especialidad');
              foreach($esp as $e): ?>
                <span class="etiqueta"> <?php echo esc_html($e);?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </li>
      <?php endwhile; wp_reset_postdata();?>
    </ul>
  </div>
</section>

<?php get_footer();?>