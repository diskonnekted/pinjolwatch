<div class="py-6">
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 bg-gray-50 flex flex-wrap items-center justify-between gap-4">
            <h3 class="text-lg font-bold text-gray-800">Antrean Moderasi Laporan</h3>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input wire:model.live="search" type="text" placeholder="Cari tiket/aplikasi..." class="pl-10 pr-4 py-2 border-gray-300 rounded-lg text-sm focus:ring-primary-500 focus:border-primary-500">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196 7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                </div>
                <select wire:model.live="statusFilter" class="border-gray-300 rounded-lg text-sm focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Semua Status</option>
                    <option value="received">Received</option>
                    <option value="verified">Verified</option>
                    <option value="forwarded">Forwarded</option>
                    <option value="resolved">Resolved</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">Tiket & Tanggal</th>
                        <th class="px-6 py-4 font-semibold">Lokasi & Ancaman</th>
                        <th class="px-6 py-4 font-semibold">Aplikasi</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($reports as $report)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-mono font-bold text-gray-900">{{ $report->ticket_id }}</div>
                                <div class="text-xs text-gray-400 mt-1">{{ $report->created_at->format('d M Y H:i') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $report->kabupaten->nama }}</div>
                                <div class="text-xs text-primary-600 font-semibold mt-0.5">{{ $report->threatType->label }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($report->legalPinjol)
                                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-green-50 border border-green-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5 text-green-600">
                                          <path fill-rule="evenodd" d="M16.403 12.652a3 3 0 0 0 0-5.304 3 3 0 0 0-3.75-3.751 3 3 0 0 0-5.305 0 3 3 0 0 0-3.751 3.75 3 3 0 0 0 0 5.305 3 3 0 0 0 3.75 3.751 3 3 0 0 0 5.305 0 3 3 0 0 0 3.751-3.75Zm-2.546-4.46a.75.75 0 0 0-1.214-.883l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-xs font-bold text-green-700 uppercase tracking-tight">{{ $report->legalPinjol->app_name }}</span>
                                    </div>
                                @else
                                    <div class="text-sm text-gray-600 font-medium">
                                        {{ $report->app_name ?: 'Tidak Disebutkan' }}
                                        <span class="block text-[10px] text-red-400 font-bold uppercase tracking-widest mt-1">Tidak Terdaftar OJK</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    @if($report->status == 'received') bg-amber-100 text-amber-800
                                    @elseif($report->status == 'verified') bg-blue-100 text-blue-800
                                    @elseif($report->status == 'forwarded') bg-purple-100 text-purple-800
                                    @elseif($report->status == 'resolved') bg-green-100 text-green-800
                                    @endif">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.reports.detail', ['ticket' => $report->ticket_id]) }}" class="p-1 text-gray-600 hover:bg-gray-50 rounded" title="Lihat Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639l4.43-7.561a1.012 1.012 0 0 1 1.733.001l4.43 7.561a1.012 1.012 0 0 1 0 .639l-4.43 7.561a1.012 1.012 0 0 1-1.733-.001l-4.43-7.561Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                    @if($report->status == 'received')
                                        <button wire:click="updateStatus({{ $report->id }}, 'verified')" class="p-1 text-blue-600 hover:bg-blue-50 rounded" title="Verifikasi">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    @endif
                                    
                                    @if($report->status == 'verified')
                                        <button wire:click="updateStatus({{ $report->id }}, 'forwarded')" class="p-1 text-purple-600 hover:bg-purple-50 rounded" title="Teruskan ke Otoritas">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                            </svg>
                                        </button>
                                    @endif

                                    @if($report->status == 'forwarded')
                                        <button wire:click="updateStatus({{ $report->id }}, 'resolved')" class="p-1 text-green-600 hover:bg-green-50 rounded" title="Selesaikan">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15a2.251 2.251 0 0 1 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-13.125-1.5 1.5 1.5 3-3m-3-1.5V15" />
                                            </svg>
                                        </button>
                                    @endif

                                    <button wire:click="deleteReport({{ $report->id }})" wire:confirm="Anda yakin ingin menghapus laporan ini?" class="p-1 text-red-600 hover:bg-red-50 rounded" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.12 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">Tidak ada laporan yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
            {{ $reports->links() }}
        </div>
    </div>
</div>
