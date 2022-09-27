jQuery(document).ready( $ => {
  $('.site-header .menu-principal .menu').slicknav({
    label:'',
    appendTo:'.site-header'
  });

  //BxSlider:
  if ($('.listado-testimoniales').length > 0) {
    $('.listado-testimoniales').bxSlider({
      auto:true,
      mode:'fade',
      controls:false
    });
  }

  //Leaflet maps (Contacto):
  const lat = document.querySelector('#lat').value;
  const lng = document.querySelector('#lng').value;
  const address = document.querySelector('#direccion').value;
  const address2 = document.querySelector('#direccion2').value;

  if (lat && lng && address) {
    var map = L.map('mapa').setView([lat, lng], 15);
  
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
  
    L.marker([lat, lng]).addTo(map)
        .bindPopup('<p style="font-size: 15px"><b>Club Okinawa de Karate-Do</b> <br>'+ address+'<br>'+address2+'</p>')
        .openPopup();
    
  }
});

// Agrega posición fija de header al hacer scroll:
window.onscroll = () => {
  const scroll = window.scrollY;
  const headerNav = document.querySelector('.barra-nav');
  const documentBody = document.querySelector('body');

  //Si la cantidad de scroll es mayor al valor determinado, agregar clase:
  if (scroll > 300) {
    headerNav.classList.add('fixed-top');
    documentBody.classList.add('ft-activo');
  }else{
    headerNav.classList.remove('fixed-top');
    documentBody.classList.remove('ft-activo');
  }
}