<div class="card shadow-lg border-0 rounded-4 mb-5">
    <div class="card-header bg-gradient text-white text-center py-4" style="background: linear-gradient(135deg, #001a4d, #ff4444);">
        <i class="fas fa-map-marker-alt fa-2x mb-3 d-block"></i>
        <h3 class="mb-1 fw-bold">PESO Manolo Fortich Location</h3>
        <p class="mb-0 opacity-90">Manolo Fortich Municipal Hall, Bukidnon</p>
    </div>
    <div class="card-body p-0">
        <div id="pesoMap" style="height: 250px; width: 100%; border-radius: 0 0 20px 20px;"></div>
    </div>
    <div class="card-footer bg-light text-center p-4 border-0">
        <div class="row g-4">
            <div class="col-md-4">
                <h6 class="fw-bold mb-2" style="color: #001a4d;"><i class="fas fa-map-pin me-2 text-danger"></i>Location</h6>
                <p class="mb-0 small text-muted">Barangay 1, Poblacion<br>Manolo Fortich, 8704 Bukidnon</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold mb-2" style="color: #001a4d;"><i class="fas fa-clock me-2 text-warning"></i>Hours</h6>
                <p class="mb-0 small text-muted">Mon-Fri: 8AM-5PM<br>Saturday: 8AM-12PM</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold mb-2" style="color: #001a4d;"><i class="fas fa-phone me-2 text-success"></i>Contact</h6>
                <p class="mb-0 small text-muted">(088) 232-3232<br>peso@manolofortich.gov.ph</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('pesoMap').setView([8.3611, 125.0194], 18); // Street view zoom
    
    // Satellite view using Esri WorldImagery
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    }).addTo(map);
    
    // PESO Main Office
    var pesoIcon = L.divIcon({
        className: 'custom-div-icon',
        html: '<div style="background: #ff4444; color: white; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-weight: bold; box-shadow: 0 2px 10px rgba(255,68,68,0.5); border: 3px solid white;">P</div>',
        iconSize: [30, 30],
        iconAnchor: [15, 30],
        popupAnchor: [0, -30]
    });
    var pesoMarker = L.marker([8.3611, 125.0194], {icon: pesoIcon}).addTo(map);
    pesoMarker.bindPopup(`
        <div class="text-center">
            <h6 class="fw-bold mb-2 text-primary">🏢 PESO Main Office</h6>
            <p class="mb-3 small">Municipal Hall<br>Barangay 1, Poblacion</p>
            <a href="https://maps.google.com/?q=8.3611,125.0194" target="_blank" class="btn btn-sm btn-danger">
                <i class="fas fa-directions me-1"></i>Directions
            </a>
        </div>
    `);

    // Job Fair Location (nearby)
    var jobFairIcon = L.divIcon({
        className: 'custom-div-icon',
        html: '<div style="background: #ffd700; color: #001a4d; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-weight: bold; box-shadow: 0 2px 10px rgba(255,215,0,0.5); border: 3px solid white;">J</div>',
        iconSize: [30, 30],
        iconAnchor: [15, 30]
    });
    var jobFairMarker = L.marker([8.3620, 125.0205], {icon: jobFairIcon}).addTo(map);
    jobFairMarker.bindPopup(`
        <div class="text-center">
            <h6 class="fw-bold mb-2 text-warning">🎉 Job Fair Plaza</h6>
            <p class="mb-3 small">Job fairs monthly<br>300m from PESO</p>
        </div>
    `);

    // Training Center
    var trainingIcon = L.divIcon({
        className: 'custom-div-icon',
        html: '<div style="background: #28a745; color: white; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-weight: bold; box-shadow: 0 2px 10px rgba(40,167,69,0.5); border: 3px solid white;">T</div>',
        iconSize: [30, 30],
        iconAnchor: [15, 30]
    });
    var trainingMarker = L.marker([8.3605, 125.0185], {icon: trainingIcon}).addTo(map);
    trainingMarker.bindPopup(`
        <div class="text-center">
            <h6 class="fw-bold mb-2 text-success">🎓 TESDA Training Center</h6>
            <p class="mb-3 small">Free skills training<br>TESDA accredited</p>
        </div>
    `);

    // Legend
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function(map) {
        var div = L.DomUtil.create('div', 'legend bg-white p-2 rounded shadow-sm');
        div.innerHTML = `
            <small><strong>Locations:</strong></small><br>
            <i style="background:#ff4444" class="fa fa-circle me-1"></i>PESO Office<br>
            <i style="background:#ffd700" class="fa fa-circle me-1"></i>Job Fair<br>
            <i style="background:#28a745" class="fa fa-circle me-1"></i>Training`;
        return div;
    };
    legend.addTo(map);
    
    map.scrollWheelZoom.disable();
});
</script>
