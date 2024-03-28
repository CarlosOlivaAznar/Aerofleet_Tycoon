// Recuperamos todos los datos de los aviones
var domAviones = document.getElementsByClassName("avionesUsuario");
console.log(avionesUsuario);

var avionesUsuario = Array();

for (var i = 0; i < domAviones.length; i++) {
  avionesUsuario.push(domAviones[i].value);
}

console.log(avionesUsuario);

// Icono personalizado
var planeIcon = L.icon({
    iconUrl: 'icons/plane-solid-24.png',
    shadowUrl: 'icons/plane-shadow.png',

    iconSize:     [25, 25],
    shadowSize:   [15, 15],
    iconAnchor:   [12.5, 12.5],
    shadowAnchor: [5, 2],
    popupAnchor:  [0, -10],
});

var map = L.map('map').setView([41.6647603, -1.0506562], 4);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: 'Aerofleet Tycoon'
}).addTo(map);

for(var i = 0; i < avionesUsuario.length; i++){
  L.marker([avionesUsuario[(i*4)], avionesUsuario[(i*4)+1]], {
    rotationAngle: avionesUsuario[(i*4)+3],
    rotationOrigin: 'center',
    icon: planeIcon
  }).addTo(map).bindPopup(avionesUsuario[(i*4)+2]);
}

// Dibujamos las lineas de las rutas de los aviones
var domRutas = document.getElementsByClassName("rutasUsuario");

var rutasAviones = Array();

for (var i = 0; i < domRutas.length; i++) {
    rutasAviones.push(domRutas[i].value);
}

for(var i = 0; i < rutasAviones.length; i++){
    var polyLine = L.polyline([[rutasAviones[i*4], rutasAviones[(i*4)+1]],[rutasAviones[(i*4)+2], rutasAviones[(i*4)+3]]], {color: 'red', weight: 2}).addTo(map);
}

var polyLine = L.polyline([[rutasAviones[0], rutasAviones[1]],[rutasAviones[2], rutasAviones[3]]], {color: 'red', weight: 2}).addTo(map);

console.log(rutasAviones);