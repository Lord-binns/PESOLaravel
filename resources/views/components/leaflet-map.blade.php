<div class="text-center mb-4">
    <h1 class="display-5 fw-bold text-primary mb-2" style="color: #001a4d; font-size: 2.5rem;">Find Us Here</h1>
    <p class="lead mb-0" style="color: #020101;">PESO Manolo Fortich Office Location</p>
</div>
<div class="card border-0">
    <div class="card-body p-2">
        <div id="pesoMap" style="height: 350px; width: 50%; border-radius: 5px;"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('pesoMap').setView([8.366651, 124.863237], 18);
    
    // Street view tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    
    // PESO marker
    var icon = L.divIcon({
        className: 'custom-marker',
        html: '<div style="background: linear-gradient(135deg, #ff4444, #cc0000); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px; box-shadow: 0 4px 12px rgba(255,68,68,0.4); border: 3px solid white;">P</div>',
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });
    
    L.marker([8.366651, 124.863237], {icon: icon}).addTo(map)
        .bindPopup(`
            <div class="p-3 text-center">
                <h6 class="fw-bold mb-3 text-primary">📍 PESO Manolo Fortich</h6>
                <div class="mb-3">
                    <small class="text-muted"><strong>Latitude:</strong> 8.366651</small><br>
                    <small class="text-muted"><strong>Longitude:</strong> 124.863237</small>
                </div>
                <div class="d-grid gap-2">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=8.366651,124.863237" target="_blank" class="btn btn-danger btn-sm">
                        <i class="fas fa-route me-1"></i>Directions
                    </a>
                    <a href="https://maps.google.com/?q=8.366651,124.863237" target="_blank" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-map me-1"></i>View Map
                    </a>
                </div>
            </div>
        `).openPopup();
    
    // Interactive map - enable panning/dragging
    map.scrollWheelZoom.disable();
});
</script>
