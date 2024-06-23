// Scroll
document.querySelector('button').addEventListener('click', () => {
  document.querySelector('.md\\:hidden').classList.toggle('hidden');
});

// Maps
// Initialize the map and set its view to the specified coordinates and zoom level
var map = L.map('map').setView([-7.366844, 108.20613], 13);

// Add OpenStreetMap tiles to the map
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors',
}).addTo(map);

// Add a marker at the specified coordinates
L.marker([-7.366844, 108.20613]).addTo(map).bindPopup('Mugarsari, Kec. Tamansari, Kota Tasikmalaya, Jawa Barat').openPopup();

// Popup submit form
