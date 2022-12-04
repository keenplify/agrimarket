// const geolocation = new Geolocation();

const MAP_ID = "leaflet_map";

let map;
let marker;

function initializeLeaflet({ latitude, longitude }) {
  const center = L.latLng(latitude, longitude);
  map = L.map(MAP_ID, {
    center,
    zoom: 50, 
    layers: [
      new L.TileLayer(
          'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
          {
              attribution: 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
          }
      )
  ]
  });

  marker = new L
    .marker(center,{
      draggable: false,
    })
    .addTo(map);
};