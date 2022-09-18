jQuery(document).ready( $ => {
  $('.site-header .menu-principal .menu').slicknav({
    label:'',
    appendTo:'.site-header'
  });

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