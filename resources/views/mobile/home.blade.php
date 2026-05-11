<x-mobile-layout>
    {{-- Top Header / Profile Area --}}
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 pt-12 pb-24 px-6 rounded-b-[40px] relative shadow-lg">
        {{-- Soft Glow --}}
        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-10 w-24 h-24 bg-primary-400/30 rounded-full blur-xl"></div>
        
        <div class="relative z-10 flex justify-between items-center">
            <div>
                <h1 class="text-white text-2xl font-black tracking-tight leading-none mb-1">PinjolWatch</h1>
                <p class="text-primary-100 text-sm font-medium">Platform Aman & Anonim</p>
            </div>
            <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/20 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.89-.777.89-2.038 0-2.815ZM12 15a.75.75 0 1 1 0 1.5.75.75 0 0 1 0-1.5Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Floating Summary Stats --}}
    <div class="px-6 -mt-14 relative z-20 mb-8">
        <div class="bg-white/80 backdrop-blur-xl border border-white rounded-3xl p-5 shadow-xl shadow-gray-200/50 flex divide-x divide-gray-100">
            <div class="flex-1 text-center pr-2">
                <div class="text-3xl font-black text-gray-900 mb-1 tracking-tighter">100%</div>
                <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Anonim</div>
            </div>
            <div class="flex-1 text-center pl-2">
                <div class="text-3xl font-black text-primary-600 mb-1 tracking-tighter" id="stat-reports">200+</div>
                <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Laporan</div>
            </div>
        </div>
    </div>

    {{-- Main Menu Grid --}}
    <div class="px-6 mb-8">
        <h2 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Akses Cepat</h2>
        
        <div class="grid grid-cols-4 gap-4">
            <!-- Menu 1 -->
            <a href="{{ route('report') }}" class="flex flex-col items-center gap-2 group cursor-pointer">
                <div class="w-14 h-14 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center transition-all group-active:scale-95 group-active:bg-red-100 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" /></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 text-center leading-tight">Lapor Teror</span>
            </a>
            
            <!-- Menu 2 -->
            <a href="{{ route('track') }}" class="flex flex-col items-center gap-2 group cursor-pointer">
                <div class="w-14 h-14 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center transition-all group-active:scale-95 group-active:bg-blue-100 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" /></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 text-center leading-tight">Lacak Tiket</span>
            </a>

            <!-- Menu 3 -->
            <a href="{{ route('quiz') }}" class="flex flex-col items-center gap-2 group cursor-pointer">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center transition-all group-active:scale-95 group-active:bg-emerald-100 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" /></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 text-center leading-tight">Cek Mental</span>
            </a>

            <!-- Menu 4 -->
            <a href="{{ route('info-pinjol') }}" class="flex flex-col items-center gap-2 group cursor-pointer">
                <div class="w-14 h-14 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center transition-all group-active:scale-95 group-active:bg-amber-100 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" /></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 text-center leading-tight">Direktori OJK</span>
            </a>
        </div>
    </div>

    {{-- Banner Alert --}}
    <div class="px-6 mb-8">
        <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-3xl p-5 relative overflow-hidden flex items-center justify-between">
            <div class="absolute -right-4 -bottom-4 text-7xl opacity-10">🛡️</div>
            <div class="relative z-10 w-2/3">
                <h3 class="text-white font-black text-lg mb-1 leading-tight">Hadapi Ancaman DC!</h3>
                <p class="text-gray-300 text-xs leading-relaxed">Jangan panik jika data disebar. Pahami hak hukum Anda di sini.</p>
            </div>
            <a href="{{ route('panduan-dc') }}" class="relative z-10 bg-white text-gray-900 w-12 h-12 rounded-2xl flex items-center justify-center active:scale-90 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" /></svg>
            </a>
        </div>
    </div>

    {{-- Peta Terdampak Card --}}
    <div class="px-6 mb-12">
        <h2 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Peta Sebaran Kasus</h2>
        <a href="{{ route('map') }}" class="block w-full h-40 bg-gray-100 rounded-3xl relative overflow-hidden group shadow-sm">
            <div class="absolute inset-0 bg-cover bg-center opacity-40 group-hover:opacity-50 transition-opacity" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Indonesia_map_blank.svg/1024px-Indonesia_map_blank.svg.png');"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
            <div class="absolute bottom-4 left-4 right-4 text-white">
                <div class="text-lg font-black leading-tight flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500"><path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" /></svg>
                    Lihat Peta Real-Time
                </div>
                <p class="text-xs text-gray-300 mt-1">Lacak area yang paling rentan teror pinjol.</p>
            </div>
        </a>
    </div>

    <script>
        fetch('/api/map-stats')
            .then(res => res.json())
            .then(data => {
                let cnt = data.reduce((a, b) => a + b.count, 0);
                if(cnt > 0) document.getElementById('stat-reports').innerText = cnt;
            })
            .catch(e => console.log('Stats err', e));
    </script>
</x-mobile-layout>
