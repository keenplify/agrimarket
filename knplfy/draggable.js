// const geolocation = new Geolocation();

const MAP_ID = "leaflet_map";

const latInput = document.querySelector("#input-lat");
const longInput = document.querySelector("#input-lng");

let leaflet_map;
let leaflet_marker;

function initializeLeaflet({ latitude, longitude }) {
  const center = L.latLng(latitude, longitude);
  leaflet_map = L.map(MAP_ID, {
    center,
    zoom: 13, 
    layers: [
      new L.TileLayer(
          'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
          {
              attribution: 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
          }
      )
  ]
  });

  leaflet_marker = new L
    .marker(center,{
      draggable: true,
      autoPan: true,
    })
    .addTo(leaflet_map)
    .on('dragend', (e) => {
      const {lat, lng} = e.target._latlng;
      latInput.setAttribute("value", lat);
      longInput.setAttribute("value", lng);
    });
};

function load() {

  if (typeof defaultCenter !== 'undefined') return initializeLeaflet(defaultCenter);

  navigator.geolocation.getCurrentPosition(position => {

    // Default to school if low accuracy
    if (position.coords.accuracy >= 25000) {
      console.log(position);
      const school = {
        latitude: 14.4129563,
        longitude: 121.4482315
      }
      latInput.setAttribute("value", school.latitude);
      longInput.setAttribute("value", school.longitude);
      initializeLeaflet(school);
    } else {
      latInput.setAttribute("value", position.coords.latitude);
      longInput.setAttribute("value", position.coords.longitude);
      initializeLeaflet(position.coords);
    }
    
  }, error => {
    console.log("error", error);
    initializeLeaflet({
      latitude: 14.5995,
      longitude: 120.9842
    });
  });
}

load();