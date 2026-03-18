<div class="card border-white shadow-sm p-4" style="max-width:100%; margin:auto; padding-bottom:30px;">
    
    <!-- Announcement Row -->
    <div class="row align-items-center mb-4">

        <!-- Image -->
        <div class="col-md-3">
            <img src="https://i.pinimg.com/originals/2c/c5/da/2cc5da0643af4cee2053f7b82f99aefa.gif"
                 class="img-fluid rounded shadow-sm w-100"
                 alt="PESO Announcement"
                 style="height:250px; object-fit:cover;">
        </div>

        <!-- Text -->
        <div class="col-md-9">
            <h4 class="text-primary">Check out our New Location</h4>
            <p class="mb-0">
                We are now located at the LEDIPO Compound, Gen. Andres Bonifacio Street, Tankulan,
                Manolo Fortich, Bukidnon. Visit us for your employment needs and inquiries.
            </p>
        </div>

    </div>

    <!-- Image + Map Row -->
    <div class="row g-3 g-lg-4" style="border:2px solid #001a4d; border-radius:12px; padding:20px 30px; background:#f8f9fa;">

        <div class="col-md-6">
            <img src="{{ asset('images/LEDIPO.png') }}"
                 alt="LEDIPO Office"
                 class="img-fluid rounded shadow"
                 style="height:450px; object-fit:cover; width:100%;">
        </div>

        <div class="col-md-6">
            <div id="pesoMap" style="height:450px; width:100%; border-radius:8px;"></div>
        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('pesoMap').setView([8.36677, 124.863113], 16);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    
    var icon = L.divIcon({
        className: 'custom-marker',
        html: '<div style="background: linear-gradient(135deg, #ff4444, #cc0000); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 11px; box-shadow: 0 2px 6px rgba(255,68,68,0.4); border: 2px solid white;">P</div>',
        iconSize: [24, 24],
        iconAnchor: [12, 24]
    });
    
    L.marker([8.36677, 124.863113], {icon: icon}).addTo(map)
        .bindPopup(`
            <div class="p-2 text-center">
                <h6 class="fw-bold mb-1 text-primary">PESO Location</h6>
                <p class="mb-2 xsmall">8.36677, 124.863113</p>
            </div>
        `);

    map.scrollWheelZoom.disable();
});
</script>