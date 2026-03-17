<div id="map-container" class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-lg border border-gray-200">
    <h3 class="mb-4 text-lg font-bold text-[#001a4d] text-center">
        <i class="fas fa-map-marker-alt me-2 text-red-500"></i>
        My Current Location
    </h3>
    <div id="map" class="w-full h-[300px] rounded-lg border border-gray-200" style="max-width: 100%;"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([0, 0], 13);
    
    // OpenStreetMap street layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Get user's current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

            map.setView([lat, lng], 16);

            // User marker
            L.marker([lat, lng]).addTo(map)
                .bindPopup('<b>You are here!</b>')
                .openPopup();

            // Accuracy circle (50m radius)
            L.circle([lat, lng], {
                radius: 50,
                color: '#ff4444',
                fillColor: '#ff4444',
                fillOpacity: 0.2
            }).addTo(map);

        }, function() {
            // Fallback - PESO location
            map.setView([8.3611, 125.0194], 16);
            L.marker([8.3611, 125.0194]).addTo(map)
                .bindPopup('PESO Manolo Fortich - Default Location')
                .openPopup();
            alert('Location access denied. Showing PESO location.');
        });
    } else {
        alert('Geolocation not supported');
    }
});
</script>
