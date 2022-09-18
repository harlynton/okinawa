<?php while (have_posts()): the_post(); ?>
  <h1 class="text-center texto-titulo"><?php the_title(); ?></h1>
  <?php the_post_thumbnail('full',array('class' => 'imagen-destacada')); ?>

  <?php 
    //Revisar si custom post type = clases:
    if(get_post_type() === 'okinawa_clases'){
      $hora_inicio = get_field('hora_inicio');
      $hora_fin = get_field('hora_fin');
  ?>
      <p class = "info-clase"><?php the_field('dias_de_clase');?> - <?php echo $hora_inicio . " a ". $hora_fin?></p>
    <?php
    }?>

  <?php the_content();?>

<?php endwhile; ?>