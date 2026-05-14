<div class="space-y-8">
    {{-- Header Section --}}
    <div class="bg-gradient-to-br from-indigo-900 to-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary-500/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <h2 class="text-3xl font-black tracking-tight mb-2 uppercase">Perjalanan <span class="text-primary-400">Pemulihan</span></h2>
                <p class="text-slate-300 text-sm max-w-md font-medium leading-relaxed">Pantau langkah demi langkah Anda menuju kebebasan finansial dan ketenangan mental. Anda tidak sendirian.</p>
            </div>
            <div class="flex items-center gap-4 bg-white/10 backdrop-blur-md px-6 py-4 rounded-3xl border border-white/10">
                <div class="text-center">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Progress</p>
                    <p class="text-2xl font-black">{{ count($userProgress) }} / {{ count($stages) }}</p>
                </div>
                <div class="w-px h-10 bg-white/20"></div>
                <div class="text-center">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Status</p>
                    <p class="text-xs font-bold px-2 py-1 bg-emerald-500/20 text-emerald-400 rounded-lg">BERTAHAN</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Journey Map --}}
    <div class="relative">
        {{-- Vertical Connecting Line --}}
        <div class="absolute left-8 top-12 bottom-12 w-1 bg-gradient-to-b from-primary-500 via-indigo-500 to-slate-200 rounded-full hidden md:block"></div>

        <div class="space-y-12">
            @foreach($stages as $index => $stage)
                @php
                    $isCompleted = isset($userProgress[$stage->id]);
                    $isCurrent = $currentStageIndex === $index && !$isCompleted;
                    $isLocked = $index > $currentStageIndex && !$isCompleted;
                @endphp

                <div class="relative flex flex-col md:flex-row gap-8 items-start group">
                    {{-- Step Indicator --}}
                    <div class="relative z-10 shrink-0 mt-2">
                        <div class="w-16 h-16 rounded-3xl flex items-center justify-center transition-all duration-500 shadow-xl
                            @if($isCompleted) bg-emerald-500 text-white shadow-emerald-200 rotate-12
                            @elseif($isCurrent) bg-primary-600 text-white shadow-primary-200 scale-110
                            @else bg-slate-100 text-slate-400 border border-slate-200 @endif">
                            
                            @if($isCompleted)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            @else
                                <span class="text-2xl font-black">{{ $index + 1 }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- Content Card --}}
                    <div class="flex-1 bg-white rounded-[2rem] p-8 shadow-xl border transition-all duration-300
                        @if($isCompleted) border-emerald-100 bg-emerald-50/30
                        @elseif($isCurrent) border-primary-200 shadow-primary-100/50 scale-[1.02]
                        @else border-slate-100 opacity-60 @endif">
                        
                        <div class="flex flex-col lg:flex-row justify-between gap-6">
                            <div class="space-y-4 max-w-xl">
                                <div class="flex items-center gap-3">
                                    <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ $stage->name }}</h3>
                                    @if($isCompleted)
                                        <span class="text-[10px] font-black uppercase tracking-widest bg-emerald-100 text-emerald-700 px-2 py-1 rounded-lg">Selesai</span>
                                    @elseif($isCurrent)
                                        <span class="text-[10px] font-black uppercase tracking-widest bg-primary-100 text-primary-700 px-2 py-1 rounded-lg animate-pulse">Sedang Berjalan</span>
                                    @endif
                                </div>
                                <p class="text-slate-600 text-sm font-medium leading-relaxed">{{ $stage->description }}</p>
                                
                                {{-- Task List --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6">
                                    @foreach($stage->tasks as $task)
                                        <div 
                                            @if($isCurrent) wire:click="toggleTask('{{ addslashes($task) }}')" @endif
                                            class="flex items-start gap-3 p-3 bg-white/50 rounded-2xl border border-slate-100 group/task transition-all @if($isCurrent) cursor-pointer hover:border-primary-500 hover:bg-primary-50 @endif">
                                            
                                            @php
                                                $taskDone = $isCompleted || in_array($task, $currentStageTasks);
                                            @endphp

                                            <div class="w-5 h-5 rounded-md border-2 @if($taskDone) border-emerald-500 bg-emerald-500 text-white @else border-slate-200 group-hover/task:border-primary-500 @endif flex items-center justify-center shrink-0 mt-0.5 transition-colors">
                                                @if($taskDone)
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" /></svg>
                                                @endif
                                            </div>
                                            <span class="text-xs font-bold text-slate-700 @if($taskDone) line-through opacity-50 @endif transition-all">{{ $task }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Actions Area --}}
                            @if($isCurrent)
                                <div class="lg:w-72 space-y-4 p-6 bg-slate-50 rounded-3xl border border-slate-200 animate-in fade-in zoom-in duration-500">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 text-center">Bagaimana perasaan Anda hari ini?</p>
                                    <div class="flex justify-between gap-2">
                                        @foreach([1, 2, 3, 4, 5] as $mood)
                                            <button 
                                                wire:click="$set('selectedMood', {{ $mood }})"
                                                class="w-10 h-10 flex items-center justify-center rounded-xl text-xl transition-all duration-300 hover:scale-125
                                                @if($selectedMood == $mood) bg-primary-600 shadow-lg scale-110 @else bg-white hover:bg-primary-50 @endif">
                                                @if($mood == 1) 😫 @elseif($mood == 2) 😕 @elseif($mood == 3) 😐 @elseif($mood == 4) 🙂 @else 🤩 @endif
                                            </button>
                                        @endforeach
                                    </div>
                                    
                                    <textarea 
                                        wire:model="note"
                                        placeholder="Catatan kecil untuk diri sendiri..."
                                        class="w-full h-24 border-slate-200 rounded-2xl text-xs font-medium placeholder:text-slate-400 focus:border-primary-500 focus:ring-primary-500"></textarea>

                                    <button 
                                        wire:click="completeStage({{ $stage->id }})"
                                        class="w-full py-4 bg-primary-600 hover:bg-primary-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary-200 transition-all active:scale-95">
                                        Selesaikan Fase
                                    </button>
                                </div>
                            @elseif($isCompleted)
                                <div class="lg:w-48 flex flex-col items-center justify-center text-center opacity-50">
                                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.563.563 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                    </div>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-500">Target Tercapai</p>
                                    <p class="text-[9px] text-slate-400 font-bold mt-1">{{ $userProgress[$stage->id]->format('d M Y') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Motivational Footer --}}
    <div class="bg-primary-50 rounded-[2.5rem] p-10 border border-primary-100 text-center relative overflow-hidden">
        <div class="relative z-10">
            <h3 class="text-2xl font-black text-primary-900 mb-2 ">"Setiap langkah kecil adalah kemenangan besar."</h3>
            <p class="text-primary-700 text-sm font-medium">Teruslah melangkah, masa depan Anda lebih berharga daripada tagihan yang menumpuk.</p>
        </div>
    </div>
</div>
