<?php 
  //[foobar]
  function okinawa_ubicacion_shortcode(){
    $ubicacion = get_field('ubicacion');
    ?>
      <div class="ubicacion">
        <div class="texto-direccion">
          <h4>Club Okinawa de Karate Do</h4>
          <p>Coliseo Rubén Darío Quintero <br>
          Cra 50 #54-27 <br> 
          Rionegro, Antioquia <br>
          (+57) 301-356-9359</p>
        </div>
        <input type="hidden" id="lat" value="<?php echo '6.157366';?>">
        <input type="hidden" id="lng" value="<?php echo '-75.37248';?>">
        <input type="hidden" id="direccion" value="<?php echo 'Coliseo Rubén Darío Quintero';?>">
        <input type="hidden" id="direccion2" value="<?php echo 'Cra 50 #54-27, Rionegro, Antioquia';?>">

        <div id="mapa"></div>
      </div>
  <?php
  }
  add_shortcode( 'okinawa_ubicacion', 'okinawa_ubicacion_shortcode' );
?>
