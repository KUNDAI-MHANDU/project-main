var layer1 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
var layer2 = L.tileLayer.provider('Stamen.TonerLite');
var layer3 = L.tileLayer.provider('OpenStreetMap.HOT');
var layer4 = L.tileLayer.provider('Esri.WorldImagery');
var marker = undefined;
var maps = {
    OSM: layer1,
    '2': layer2,
    '3': layer3,
    'sa': layer4
};
var map = L.map('map', {
    center: [-26.1955599, 28.0076413],
    zoom: 13,
    layers: [layer1]
});

// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// }).addTo(map);

var mapLayers = L.control.layers(maps).addTo(map);

var measure = L.control.polylineMeasure({
    position: 'topleft',
    measureControlTile: 'Measure Length'
}).addTo(map);

L.control.locate().addTo(map);

let apiKey = 'a7cc033ce0314a62bcd2aa6d974d22c1';
let latitude, longitude;
let latitude1, longitude1
let btn = document.getElementById('directions');
let btn2 = document.getElementById('currentLocation');
let div = document.getElementById('output');
let div1 = document.getElementById('output1');
let API_KEY = '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';
const addressSearchControl = L.control.addressSearch(apiKey, {
  className: 'custom-address-field', // add a custom class name
  resultCallback: (address) => {
    if (marker) {
      marker.remove();
    }
    
    if (!address) {
      return;
    }
    latitude = address.lat;
    longitude = address.lon;
    marker = L.marker([latitude, longitude]).addTo(map);
    if (address.bbox && address.bbox.lat1 !== address.bbox.lat2 && address.bbox.lon1 !== address.bbox.lon2) {
      map.fitBounds([[address.bbox.lat1, address.bbox.lon1], [address.bbox.lat2, address.bbox.lon2]], { padding: [100, 100] })
    } else {
      map.setView([latitude, longitude], 15);
    }
    btn.style.display = 'block';
    function getDirections(){
      btn.disabled = true;
      btn2.style.display = 'block';
    //   const addressSearchControl1 = L.control.addressSearch(apiKey, {
    //     resultCallback: (address) => {
    //         if (marker) {
    //         marker.remove();
    //         }
    //         if (!address) {
    //         return;
    //         }
    //         latitude1 = address.lat;
    //         longitude1 = address.lon;
    //         marker = L.marker([latitude, longitude]).addTo(map);
    //         if (address.bbox && address.bbox.lat1 !== address.bbox.lat2 && address.bbox.lon1 !== address.bbox.lon2) {
    //         map.fitBounds([[address.bbox.lat1, address.bbox.lon1], [address.bbox.lat2, address.bbox.lon2]], { padding: [100, 100] })
    //         } else {
    //         map.setView([latitude1, longitude1], 15);
    //         }
    //         var control = L.Routing.control({
    //             waypoints: [
    //                 L.latLng(latitude, longitude),
    //                 L.latLng(latitude1, longitude1)
    //             ],
    //             lineOptions: {
    //                 styles: [{color: 'black', opacity: 0.15, weight: 9}, {color: 'white', opacity: 0.8, weight: 6}, {color: 'green', opacity: 1, weight: 10}]
    //             }
    //         }).addTo(map); 
    //         console.log(control);
    //     }
    // }).addTo(map);
    // map.addControl(addressSearchControl1);
    }
  function currentLocation(){
    navigator.geolocation.getCurrentPosition(showPosition);
  }
  function showPosition(position){
    latitude1 = position.coords.latitude;
    longitude1 = position.coords.longitude;
    var control = L.Routing.control({
      waypoints: [
          L.latLng(latitude1, longitude1),
          L.latLng(latitude, longitude)
      ],
      lineOptions: {
          styles: [{color: 'black', opacity: 0.15, weight: 9}, {color: 'white', opacity: 0.8, weight: 6}, {color: 'green', opacity: 1, weight: 10}]
      }
  }).addTo(map); 
  }
  btn.addEventListener('click', getDirections);
  btn2.addEventListener('click', currentLocation);
  },
  suggestionsCallback: (suggestions) => {
    console.log(suggestions);
    let loc = suggestions[0].address_line2;
    async function getInfo(){
      let Options = {
          method: 'POST',
          headers: {
            'Authorization': `Bearer ${API_KEY}`,
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [{role: "user", content: `what is the crime rate ${loc} of this location you can estimate the results`}]
          })           
      }
      try{
        let response = await fetch('https://api.openai.com/v1/chat/completions', Options);
        let data = await response.json();
        div.innerHTML = data.choices[0].message.content;
      }
      catch (error){
        div.innerHTML = 'error';
      }
    }
    async function getcityInfo(){
      let Options = {
          method: 'POST',
          headers: {
            'Authorization': `Bearer ${API_KEY}`,
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [{role: "user", content: `give any random information about this ${loc} city`}]
          })           
      }
      try{
        let response = await fetch('https://api.openai.com/v1/chat/completions', Options);
        let data = await response.json();
        div1.innerHTML = data.choices[0].message.content;
      }
      catch (error){
        div1.innerHTML = 'error';
      }
    }
    getInfo();
    getcityInfo();
  }
}).addTo(map);
map.addControl(addressSearchControl);
