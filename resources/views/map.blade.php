<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Peta Sebaran Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:stats-panel />
            
            <div class="bg-slate-900 overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.3)] sm:rounded-2xl p-6 border border-slate-800 mt-6">
                
                <div class="flex flex-wrap gap-4 mb-4 items-center bg-slate-800/50 p-4 rounded-xl border border-slate-700">
                    <h3 class="text-lg font-semibold text-slate-100">Filter Peta</h3>
                    <div>
                        <label for="start_date" class="text-sm font-medium text-slate-300">Tgl Mulai:</label>
                        <input type="date" id="start_date" class="bg-slate-900 border-slate-700 text-slate-300 rounded-md shadow-sm text-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="end_date" class="text-sm font-medium text-slate-300">Tgl Selesai:</label>
                        <input type="date" id="end_date" class="bg-slate-900 border-slate-700 text-slate-300 rounded-md shadow-sm text-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div>
                        <button id="filterBtn" class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-500 text-sm font-semibold transition-colors duration-200 shadow-lg shadow-teal-900/20">Terapkan Filter</button>
                    </div>
                </div>

                <div id="map" style="height: 600px; width: 100%;" class="rounded-xl border border-slate-700 z-10"></div>

            </div>
        </div>
    </div>

    @push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const map = L.map('map').setView([-2.5, 118], 5);
            let geojsonLayer;

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            function getColor(intensity) {
                return intensity > 2 ? '#800026' : // Tinggi
                       intensity > 1 ? '#E31A1C' : // Sedang
                       intensity > 0 ? '#FEB24C' : // Rendah
                                       '#FFEDA0';   // Sangat Rendah / No Data
            }

            function style(feature) {
                return {
                    fillColor: getColor(feature.properties.intensity),
                    weight: 1,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7
                };
            }

            function highlightFeature(e) {
                const layer = e.target;
                layer.setStyle({
                    weight: 3,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.7
                });
                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                    layer.bringToFront();
                }
                updateTooltip(layer);
            }

            function resetHighlight(e) {
                geojsonLayer.resetStyle(e.target);
            }

            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }
            
            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
                
                // Initial tooltip
                let content = `<b>${feature.properties.WADMKK}</b><br>Laporan: ${feature.properties.count || 0}`;
                layer.bindTooltip(content);
            }
            
            function updateTooltip(layer) {
                const props = layer.feature.properties;
                let content = `<b>${props.WADMKK}</b><br>Laporan: ${props.count || 0}`;
                layer.setTooltipContent(content);
            }

            async function loadMapData() {
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;
                
                let apiUrl = '/api/map-stats';
                const params = new URLSearchParams();
                if(startDate) params.append('start', startDate);
                if(endDate) params.append('end', endDate);
                if(params.toString()) apiUrl += '?' + params.toString();

                try {
                    const [geojsonResponse, statsResponse] = await Promise.all([
                        fetch('/assets/kabupaten.geojson'),
                        fetch(apiUrl)
                    ]);

                    if (!geojsonResponse.ok) throw new Error('Gagal memuat GeoJSON');
                    if (!statsResponse.ok) throw new Error('Gagal memuat statistik laporan');

                    const geojsonData = await geojsonResponse.json();
                    const statsData = await statsResponse.json();

                    const normalizeName = (name) => {
                        if (!name) return '';
                        return name.toUpperCase()
                            .replace(/^KABUPATEN /g, '')
                            .replace(/^KOTA /g, '')
                            .trim();
                    };

                    const statsMap = new Map(statsData.map(item => [normalizeName(item.kabupaten_name), item]));

                    geojsonData.features.forEach(feature => {
                        const rawName = feature.properties.WADMKK;
                        const name = normalizeName(rawName);
                        
                        const stats = name ? statsMap.get(name) : null;
                        if (stats) {
                            feature.properties.count = stats.count;
                            feature.properties.intensity = stats.intensity;
                        } else {
                            feature.properties.count = 0;
                            feature.properties.intensity = 0;
                        }
                    });
                    
                    if (geojsonLayer) {
                        map.removeLayer(geojsonLayer);
                    }

                    geojsonLayer = L.geoJSON(geojsonData, {
                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);

                } catch (error) {
                    console.error('Error loading map data:', error);
                    document.getElementById('map').innerHTML = `<div class="p-4 text-red-700 bg-red-100 rounded">Gagal memuat data peta. ${error.message}.</div>`;
                }
            }

            document.getElementById('filterBtn').addEventListener('click', loadMapData);

            // Initial load
            loadMapData();
        });
    </script>
    @endpush
</x-frontend-layout>
