// const geolocation = new Geolocation();

const MAP_ID = "leaflet_map";

let leaflet_map;
let leaflet_marker;

async function initializeLeaflet({ latitude, longitude }) {
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

  if (items) {
    for (const item of items) {
      const lat = Number.parseFloat(`${item.sellerlatitude}`);
      const long = Number.parseFloat(`${item.sellerlongitude}`);

      if (!lat || !long) continue;

      const icon = L.icon({
        iconUrl: '/img/user/' + item.sellerimage,
        iconSize: [40, 40],
        className: 'leaflet-product-icon'
      })

      const productsResponse = await fetch(`/knplfy/api/items.php?itemSELLER=${item.sellerID}`);
      const products = await productsResponse.json();
      var productsHTML = '';

      if (Array.isArray(products)) {
        for (const product of products) {
          productsHTML += `
          <div class="card card-block mx-2" style="width: 156px; height: 254px;">
            <div class="ratio ratio-1x1 w-100 h-100 position-relative" style="aspect-ratio: 1;">
              <img class="w-100 h-100 position-absolute top-50 start-50 translate-middle" src="/img/product/${product.itemIMG}">
            </div>
            <div class="card-body">
              <h5 class="card-title text-truncate">${product.itemNAME}</h5>
              <a href="/viewproduct.php?itemid=${product.itemID}" class="btn btn-primary text-white">View Product</a>
            </div>
          </div>
          `
        }
      }
      
      var itemPopup = `
      <script src="/"></script>
      <div class="container-fluid p-2">
        <h4>${item.sellerfirstname} ${item.sellerlastname}'s Products</h4>
        <div id="popup-products-container" style="display: grid; grid-auto-flow: column; overflow-x: scroll">
          ${productsHTML}
        </div>
      </div>
      `;

      // specify popup options 
      var options =
      {
        'maxWidth': '500',
      }

      L.marker(
        [lat, long],
        { icon }
      ).bindPopup(itemPopup, options).addTo(leaflet_map);
    }
  }

  leaflet_marker = new L
    .marker(center, {
      draggable: false,
      autoPan: true
    })
    .addTo(leaflet_map)
};

function load() {

  if (typeof defaultCenter !== 'undefined') return initializeLeaflet(defaultCenter);

  navigator.geolocation.getCurrentPosition(position => {

    // Default to school if low accuracy
    if (position.coords.accuracy >= 25000) {
      const school = {
        latitude: 14.4129563,
        longitude: 121.4482315
      }
      initializeLeaflet(school);
    } else {
      initializeLeaflet(position.coords);
    }

  }, error => {
    console.error("error", error);
    initializeLeaflet({
      latitude: 14.5995,
      longitude: 120.9842
    });
  });
}

load();