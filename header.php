<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head();?>
  <title>Club Okinawa de Karate-do - Rionegro</title>
</head>
<body>
<header class="site-header">
  <div class="contenedor">
    <div class="barra-nav">
      <div class="logo">
        <a href = '/'> <img src="<?php echo get_template_directory_uri();?>/img/logo_header.png" alt="Logo sitio"> </a> 
      </div>
      <?php 
        $args = array(
          'theme_location'=> 'menu-principal',
          'container' => 'nav',
          'container_class' => 'menu-principal'
        );
        wp_nav_menu($args);
      ?>
    </div>
  </div>
</header>