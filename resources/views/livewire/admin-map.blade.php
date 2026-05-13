<div class="py-6 px-4 sm:px-6 lg:px-8 bg-slate-50 min-h-screen w-full">
    {{-- Header --}}
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-black tracking-widest uppercase mb-3 border border-emerald-100">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Geospatial Intelligence
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tighter uppercase">
                Pemetaan <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-600">Wilayah</span>
            </h1>
            <p class="text-slate-500 font-bold text-sm mt-1">
                @if($activeDataSource === 'internal')
                    Distribusi sebaran korban dan hotspot pinjol ilegal di Indonesia (Data Internal).
                @else
                    Statistik Outstanding Pinjaman Online Nasional per Provinsi (Data OJK 2024).
                @endif
            </p>
        </div>

        <div class="flex items-center bg-white p-1 rounded-2xl border border-slate-200 shadow-sm">
            <button wire:click="switchDataSource('internal')" class="px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ $activeDataSource === 'internal' ? 'bg-slate-900 text-white shadow-lg shadow-slate-900/20' : 'text-slate-400 hover:text-slate-600' }}">
                Internal Reports
            </button>
            <button wire:click="switchDataSource('national')" class="px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all {{ $activeDataSource === 'national' ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/20' : 'text-slate-400 hover:text-slate-600' }}">
                National (OJK)
            </button>
        </div>
    </div>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { height: 600px; width: 100%; border-radius: 3rem; z-index: 10; border: 1px solid #e2e8f0; }
        .leaflet-container { font-family: 'Inter', sans-serif; background: #f1f5f9; }
        .custom-popup .leaflet-popup-content-wrapper {
            background: #fff;
            color: #333;
            border-radius: 1.5rem;
            padding: 10px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            border: 1px solid #f1f5f9;
        }
        .custom-popup .leaflet-popup-tip { background: #fff; }
    </style>

    <div class="flex flex-col gap-10">
        {{-- Map Container --}}
        <div class="w-full bg-white rounded-[3.5rem] p-6 shadow-2xl shadow-slate-200/50 border border-slate-100 relative group">
            <div id="map" wire:ignore class="shadow-inner"></div>
            
            {{-- Map Legend Overlay --}}
            <div class="absolute bottom-12 left-12 z-[100] bg-white/95 backdrop-blur-xl p-6 rounded-[2rem] border border-slate-100 shadow-2xl hidden md:block transition-all hover:scale-105">
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 shadow-[0_0_15px_rgba(16,185,129,0.7)] animate-pulse"></span>
                    <span class="text-xs font-black text-slate-900 uppercase tracking-widest">Pusat Pemantauan</span>
                </div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.1em] leading-relaxed">Data Terverifikasi Geospasial<br>Update Otomatis Setiap Laporan Masuk</p>
            </div>
        </div>

        {{-- Statistics Grid --}}
        <div class="space-y-8">
            <div class="flex items-center justify-between px-4">
                <div>
                    <h3 class="text-xl font-black text-slate-900 uppercase tracking-tighter italic">Ranking Wilayah Terdampak</h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Distribusi sebaran laporan terbanyak berdasarkan kabupaten/kota</p>
                </div>
                <div class="flex gap-2">
                     <span class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-[10px] font-black text-slate-900 uppercase shadow-sm">Jawa Tengah</span>
                     <span class="px-4 py-2 rounded-xl bg-emerald-600 text-[10px] font-black text-white uppercase shadow-lg shadow-emerald-500/20">Top 19</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @forelse($regionalStats as $stat)
                    <div class="bg-white rounded-[2rem] p-6 border border-slate-100 shadow-lg shadow-slate-200/30 group hover:border-emerald-400 hover:bg-emerald-50 hover:-translate-y-1 transition-all duration-500">
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between">
                                <div class="w-10 h-10 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-lg group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-all duration-500">
                                    📍
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-black text-slate-900 tracking-tighter group-hover:text-emerald-700 transition-colors">
                                        {{ $activeDataSource === 'national' ? number_format($stat['total'], 2) : $stat->total }}
                                    </div>
                                    <div class="text-[8px] font-black text-slate-400 uppercase tracking-widest">
                                        {{ $activeDataSource === 'national' ? 'Triliun IDR' : 'Laporan' }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-[11px] font-black text-slate-900 uppercase tracking-tight line-clamp-1 group-hover:text-emerald-800 transition-colors">
                                    {{ $activeDataSource === 'national' ? $stat['nama'] : $stat->nama }}
                                </p>
                                <p class="text-[8px] font-bold text-emerald-600/60 uppercase tracking-[0.2em] mt-0.5">
                                    {{ ($activeDataSource === 'national' ? $stat['provinsi'] : $stat->provinsi) ?? 'Wilayah Terdeteksi' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 bg-white rounded-[3rem] border border-dashed border-slate-300 text-center">
                        <div class="text-5xl mb-6 grayscale opacity-20">🌏</div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Data statistik sedang dikompilasi oleh sistem...</p>
                    </div>
                @endforelse
            </div>
            
            <div class="bg-slate-900 rounded-[2.5rem] p-8 shadow-2xl border border-slate-800 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="absolute -right-8 -top-8 w-48 h-48 bg-emerald-500/5 rounded-full blur-3xl"></div>
                <div>
                    <h3 class="text-lg font-black text-white uppercase tracking-tighter italic">Laporan Intelijen Geospasial</h3>
                    <p class="text-slate-400 text-xs mt-1">Unduh ringkasan data statistik wilayah dalam format PDF atau CSV untuk keperluan pelaporan resmi ke otoritas.</p>
                </div>
                <div class="flex gap-4 shrink-0">
                    <button class="px-8 py-4 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-2xl font-black text-[10px] uppercase tracking-widest transition-all">PDF Report</button>
                    <button class="px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest transition-all shadow-lg shadow-emerald-500/20">Data Ekspor (.CSV)</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('livewire:navigated', () => {
            const mapElement = document.getElementById('map');
            if (!mapElement) return;

            const dataSource = @json($activeDataSource);

            // Setup Map
            const map = L.map('map', {
                scrollWheelZoom: false,
                zoomControl: false,
                attributionControl: false
            }).setView([-2.5489, 118.0149], 5);

            L.control.zoom({ position: 'topright' }).addTo(map);

            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                maxZoom: 20
            }).addTo(map);

            const regionalData = @json($regionalStats);
            const markers = [];

            regionalData.forEach(region => {
                const lat = region.latitude || region['latitude'];
                const lng = region.longitude || region['longitude'];
                const total = region.total || region['total'];
                const nama = region.nama || region['nama'];
                const provinsi = region.provinsi || region['provinsi'];
                const unit = dataSource === 'national' ? 'Triliun IDR' : 'Total Laporan';

                if (lat && lng) {
                    const baseRadius = dataSource === 'national' ? 15 : 12;
                    const scaleFactor = dataSource === 'national' ? 2 : 4;
                    
                    const marker = L.circleMarker([lat, lng], {
                        radius: baseRadius + (Math.sqrt(total) * scaleFactor),
                        fillColor: dataSource === 'national' ? "#0ea5e9" : "#10b981",
                        color: "#fff",
                        weight: 4,
                        opacity: 1,
                        fillOpacity: 0.9
                    }).addTo(map);

                    markers.push([lat, lng]);

                    marker.bindPopup(`
                        <div class="p-4 custom-popup">
                            <div class="text-[10px] font-black ${dataSource === 'national' ? 'text-sky-600' : 'text-emerald-600'} uppercase tracking-[0.2em] mb-2">${provinsi || 'Nasional'}</div>
                            <h4 class="font-black text-slate-900 uppercase text-base mb-3 leading-tight">${nama}</h4>
                            <div class="flex items-center justify-between p-3 ${dataSource === 'national' ? 'bg-sky-50 border-sky-100' : 'bg-emerald-50 border-emerald-100'} rounded-2xl border">
                                <div class="text-2xl font-black ${dataSource === 'national' ? 'text-sky-700' : 'text-emerald-700'} tracking-tighter">${total}${dataSource === 'national' ? '<span class="text-xs ml-1">T</span>' : ''}</div>
                                <div class="text-[10px] font-black ${dataSource === 'national' ? 'text-sky-600' : 'text-emerald-600'} uppercase tracking-widest text-right leading-none">${unit.replace(' ', '<br>')}</div>
                            </div>
                        </div>
                    `, { closeButton: false, offset: [0, -5] });

                    marker.on('mouseover', function() {
                        this.openPopup();
                        this.setStyle({ 
                            fillColor: dataSource === 'national' ? '#0284c7' : '#059669', 
                            weight: 6, 
                            radius: this.options.radius + 2 
                        });
                    });

                    marker.on('mouseout', function() {
                        this.closePopup();
                        this.setStyle({ 
                            fillColor: dataSource === 'national' ? '#0ea5e9' : '#10b981', 
                            weight: 4, 
                            radius: this.options.radius - 2 
                        });
                    });
                }
            });

            if (markers.length > 0) {
                const bounds = L.latLngBounds(markers);
                map.fitBounds(bounds, { padding: [80, 80], maxZoom: 12 });
            }

            setTimeout(() => {
                map.invalidateSize();
                if (markers.length > 0) {
                    map.fitBounds(L.latLngBounds(markers), { padding: [80, 80], maxZoom: 12 });
                }
            }, 500);

            const ro = new ResizeObserver(() => map.invalidateSize());
            ro.observe(mapElement);
        });
    </script>
</div>
