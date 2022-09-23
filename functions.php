<?php 
//Consultas reutilizables:
require get_template_directory() . '/inc/queries.php';

//Shortcodes:
require get_template_directory() . '/inc/shortcodes.php';

//Al activar el tema:
function okinawa_setup() {
  //Habilitar imagenes destacadas:
  add_theme_support('post-thumbnails');

  //Agregar títulos SEO:
  add_theme_support('title-tag');

  //Agregar tamaños de imagen personalizados:
  add_image_size('square',350,350,true);
  add_image_size('portrait',350,724,true);
  add_image_size('cajas',400,375,true);
  add_image_size('mediano',700,400,true);
  add_image_size('blog',966,644,true);
}
add_action('after_setup_theme','okinawa_setup');

//Menús de navegación. (usar el array para agregar menús adicionales):
  function okinawa_menus() {
    register_nav_menus(array('menu-principal' => __('Menú Principal','okinawa')));
  }
add_action('init','okinawa_menus');

//Scripts y hojas de estilo:
function okinawa_scripts_styles() {
  //Normalize.css:
  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

  //SlickNav css:
  wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');

  //Fuentes:
  wp_enqueue_style('googleFont','https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&family=Poppins:wght@400;700;900&display=swap', array(),'1.0.0');

  //Lightbox (galeria):
  if(is_page('galeria')):
    wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.css', array(), '2.11.3');
  endif;

  //Leaflet mapa (contacto):
  if(is_page('contacto')):
    wp_enqueue_style('leafletCSS', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css', array(), '1.8.0');
  endif;

  //Hoja de estilos principal:
  wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');

  //Slicknav js:
  wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);

  //Lightbox (galeria):
  if(is_page('galeria')):
    wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.js', array(), '2.11.3', true);
  endif;

  //Leaflet mapa (Contacto):
  if(is_page('contacto')):
    wp_enqueue_script('leafletJS','https://unpkg.com/leaflet@1.8.0/dist/leaflet.js', array('jquery'), '1.8.0', true);
  endif;
    
  //Scripts personalizados:
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery','slicknavJS'), '1.0.0', true);
}
add_action('wp_enqueue_scripts','okinawa_scripts_styles');

// Zona de Widgets:
function okinawa_widgets(){
  register_sidebar(array(
    'name' => 'Sidebar entradas',
    'id' => 'sidebar_1',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class = "text-center texto-titulo">',
    'after_title' => '</h3>'

  ));

  register_sidebar(array(
    'name' => 'Sidebar clases',
    'id' => 'sidebar_2',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class = "text-center texto-titulo">',
    'after_title' => '</h3>'

  ));
}
add_action('widgets_init', 'okinawa_widgets');

/* Imagen Hero */
function okinawa_hero_image() {
  //Obtener ID de pagina ppal:
  $front_page_id = get_option('page_on_front');
  $id_imagen = get_field('imagen_hero',$front_page_id);
  $imagen = wp_get_attachment_image_src($id_imagen,'full')[0];

  //Style CSS:
  wp_register_style('custom', false);
  wp_enqueue_style('custom');

  //Inyección de CSS:
  $imagen_destacada_css = "
    body.home .site-header {
      background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url($imagen);
    }
  ";

  wp_add_inline_style('custom',$imagen_destacada_css);
}
add_action('init','okinawa_hero_image');