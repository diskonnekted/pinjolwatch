<div class="space-y-12">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #public-map { height: 600px; width: 100%; border-radius: 2rem; z-index: 10; border: 1px solid #334155; }
        .leaflet-container { font-family: 'figtree', sans-serif; background: #0f172a; }
        .custom-popup .leaflet-popup-content-wrapper {
            background: #1e293b;
            color: #f1f5f9;
            border-radius: 1.25rem;
            padding: 8px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid #334155;
        }
        .custom-popup .leaflet-popup-tip { background: #1e293b; }
    </style>

    <div 
        x-data="{
            map: null,
            geoLayer: null,
            geoData: null,
            localStats: @entangle('regionalStats'),
            localSource: @entangle('activeDataSource'),
            async initMap() {
                if (this.map) return;
                
                this.map = L.map('public-map', {
                    scrollWheelZoom: false,
                    zoomControl: false,
                    attributionControl: false
                }).setView([-2.5489, 118.0149], 5);

                L.control.zoom({ position: 'topright' }).addTo(this.map);

                L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                    maxZoom: 20
                }).addTo(this.map);

                // Load Local GeoJSON
                try {
                    const response = await fetch('/assets/kabupaten.geojson');
                    this.geoData = await response.json();
                } catch (e) {
                    console.error('Failed to load local GeoJSON:', e);
                }

                this.updateChoropleth();
                
                // Final layout fix
                setTimeout(() => this.map.invalidateSize(), 500);
            },
            getColor(total, source) {
                if (source === 'national') {
                    return total > 10 ? '#4338ca' : // Indigo 700
                           total > 5  ? '#6366f1' : // Indigo 500
                           total > 2  ? '#818cf8' : // Indigo 400
                           total > 0  ? '#c7d2fe' : // Indigo 200
                                        'transparent';
                } else {
                    return total > 10 ? '#be123c' : // Rose 700
                           total > 5  ? '#f43f5e' : // Rose 500
                           total > 2  ? '#fb7185' : // Rose 400
                           total > 0  ? '#fecdd3' : // Rose 200
                                        'transparent';
                }
            },
            updateChoropleth() {
                if (!this.map || !this.geoData) return;
                
                if (this.geoLayer) {
                    this.map.removeLayer(this.geoLayer);
                }

                const stats = JSON.parse(JSON.stringify(this.localStats));
                const source = this.localSource;
                
                // Create a map for quick lookup
                const statsMap = {};
                stats.forEach(s => {
                    if (s.nama) statsMap[s.nama.toUpperCase()] = s.total;
                });

                this.geoLayer = L.geoJSON(this.geoData, {
                    style: (feature) => {
                        const provName = feature.properties.WADMPR ? feature.properties.WADMPR.toUpperCase() : '';
                        const total = statsMap[provName] || 0;
                        return {
                            fillColor: this.getColor(total, source),
                            weight: 0.5,
                            opacity: 0.5,
                            color: '#334155',
                            fillOpacity: total > 0 ? 0.7 : 0.05
                        };
                    },
                    onEachFeature: (feature, layer) => {
                        const provName = feature.properties.WADMPR ? feature.properties.WADMPR.toUpperCase() : 'Unknown';
                        const kabName = feature.properties.WADMKK || '';
                        const total = statsMap[provName] || 0;
                        const unit = source === 'national' ? 'Triliun IDR' : 'Laporan';
                        
                        layer.bindPopup(`
                            <div class='p-3 custom-popup'>
                                <div class='text-[9px] font-black ${source === 'national' ? 'text-indigo-400' : 'text-rose-400'} uppercase tracking-[0.2em] mb-1'>${provName}</div>
                                <h4 class='font-black text-white uppercase text-sm mb-2 leading-tight'>${kabName}</h4>
                                <div class='flex items-center justify-between p-2 bg-slate-900 rounded-xl border border-slate-800'>
                                    <div class='text-xl font-black ${source === 'national' ? 'text-indigo-400' : 'text-rose-400'} tracking-tighter'>${total}${source === 'national' ? '<span class=&quot;text-xs ml-0.5&quot;>T</span>' : ''}</div>
                                    <div class='text-[9px] font-black text-slate-500 uppercase tracking-widest text-right leading-none'>${unit.replace(' ', '<br>')} (Provinsi)</div>
                                </div>
                            </div>
                        `, { closeButton: false, offset: [0, -5] });


                        layer.on({
                            mouseover: (e) => {
                                const l = e.target;
                                l.setStyle({
                                    weight: 3,
                                    color: '#fff',
                                    fillOpacity: 0.9
                                });
                                l.openPopup();
                            },
                            mouseout: (e) => {
                                this.geoLayer.resetStyle(e.target);
                                e.target.closePopup();
                            },
                            click: (e) => {
                                this.map.fitBounds(e.target.getBounds());
                            }
                        });
                    }
                }).addTo(this.map);
            }
        }"
        x-init="initMap(); $watch('localStats', () => updateChoropleth()); $watch('localSource', () => updateChoropleth())"
        class="bg-slate-900 rounded-[3rem] p-6 shadow-2xl border border-slate-800 relative group overflow-hidden"
    >
        {{-- Map Header Overlay --}}
        <div class="absolute top-10 left-10 z-[100] flex flex-col md:flex-row gap-4 items-start md:items-center">
            <div class="bg-slate-950/80 backdrop-blur-md px-5 py-2.5 rounded-2xl border border-slate-800 shadow-2xl flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-primary-500 animate-pulse"></span>
                <span class="text-[10px] font-black text-white uppercase tracking-[0.2em]">Regional Concentration Map</span>
            </div>
            
            <div class="flex items-center bg-slate-950/80 backdrop-blur-md p-1 rounded-2xl border border-slate-800 shadow-2xl">
                <button wire:click="switchDataSource('internal')" class="px-5 py-2 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all {{ $activeDataSource === 'internal' ? 'bg-primary-600 text-white shadow-lg shadow-primary-500/20' : 'text-slate-400 hover:text-slate-200' }}">
                    Laporan Warga
                </button>
                <button wire:click="switchDataSource('national')" class="px-5 py-2 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all {{ $activeDataSource === 'national' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-slate-200' }}">
                    Data OJK (Nasional)
                </button>
            </div>
        </div>

        <div id="public-map" wire:ignore class="shadow-inner"></div>
        
        {{-- Map Legend Overlay --}}
        <div class="absolute bottom-10 right-10 z-[100] bg-slate-950/90 backdrop-blur-xl p-6 rounded-[2rem] border border-slate-800 shadow-2xl hidden lg:block border-l-4 border-l-primary-500">
            <h4 class="text-xs font-black text-white uppercase tracking-widest mb-4 ">Kepadatan Wilayah</h4>
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-4 rounded bg-rose-600 border border-white/20"></span>
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Sangat Tinggi (>10)</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-8 h-4 rounded bg-rose-400 border border-white/20"></span>
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Tinggi (5-10)</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-8 h-4 rounded bg-rose-200 border border-white/20"></span>
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Sedang (1-5)</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Descriptive Info Section --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-8">
            <div class="bg-slate-900 rounded-[2.5rem] p-10 border border-slate-800 relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary-500/5 rounded-full blur-3xl"></div>
                <h3 class="text-2xl font-black text-white uppercase tracking-tighter  mb-6">Membaca Data Geospasial PinjolWatch</h3>
                <div class="prose prose-invert max-w-none text-slate-400 text-sm leading-relaxed space-y-4">
                    <p>
                        Peta di atas merupakan visualisasi transparansi nasional mengenai dampak Pinjaman Online di Indonesia. Data dikumpulkan dari dua sumber utama untuk memberikan perspektif yang berimbang:
                    </p>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong class="text-primary-400">Laporan Warga (Internal):</strong> Merupakan data *crowdsourcing* riil yang dikirimkan oleh korban melalui platform PinjolWatch. Setiap titik mewakili pusat pengaduan di kabupaten/kota tersebut.</li>
                        <li><strong class="text-indigo-400">Data OJK (Nasional):</strong> Merupakan statistik *outstanding* pinjaman (utang berjalan) resmi yang dirilis oleh Otoritas Jasa Keuangan. Ini menunjukkan besarnya perputaran uang pinjol di setiap provinsi.</li>
                    </ul>
                    <p class="pt-4 border-t border-slate-800">
                        Indikator warna yang lebih gelap menunjukkan intensitas yang lebih tinggi, baik dalam jumlah korban maupun volume pinjaman. Kami menggunakan visualisasi ini untuk memetakan "titik panas" yang memerlukan perhatian lebih dari pihak berwenang dan lembaga bantuan hukum.
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-[2.5rem] p-8 border border-slate-700 shadow-xl">
                <div class="w-12 h-12 rounded-2xl bg-primary-500/20 flex items-center justify-center text-2xl mb-6">⚠️</div>
                <h4 class="text-lg font-black text-white uppercase tracking-tighter  mb-4">Catatan Keamanan</h4>
                <p class="text-slate-400 text-xs leading-relaxed">
                    Lokasi yang ditampilkan adalah tingkat Provinsi. Kami tidak pernah menampilkan alamat detail atau identitas korban di peta publik untuk menjamin keamanan dan privasi pelapor sesuai dengan standar perlindungan data kami.
                </p>
            </div>

            <div class="bg-primary-600 rounded-[2.5rem] p-8 shadow-2xl shadow-primary-900/40 relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <h4 class="text-lg font-black text-white uppercase tracking-tighter  mb-2">Ingin Melapor?</h4>
                <p class="text-primary-100 text-xs mb-6">Bantu kami memperbarui peta ini dengan melaporkan pengalaman Anda secara aman.</p>
                <a href="{{ route('report') }}" class="block w-full py-3 bg-white text-primary-600 rounded-xl font-black text-[10px] uppercase tracking-widest text-center shadow-xl hover:scale-105 transition-all">Mulai Laporan Sekarang</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</div>
