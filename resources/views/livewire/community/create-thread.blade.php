<div class="glass" style="padding: 32px; margin-bottom: 32px;">
    @if(session()->has('message'))
        <div style="margin-bottom: 24px; padding: 12px 16px; background: rgba(45,212,191,0.1); border: 1px solid rgba(45,212,191,0.3); color: var(--teal-l); border-radius: 12px; font-size: 0.9rem;">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="createThread">
        <div>
            <label for="content" class="sr-only">Ceritakan pengalaman Anda...</label>
            <textarea
                wire:model="content"
                id="content"
                rows="4"
                style="width: 100%; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #f1f5f9; border-radius: 16px; padding: 16px; resize: none; focus:outline-none; focus:border-teal-500;"
                placeholder="Ceritakan pengalaman Anda di sini... (Aman, Anda bisa memilih untuk tampil anonim)"
            ></textarea>
            @error('content') <span style="color: #ef4444; font-size: 0.8rem; margin-top: 8px; display: block;">{{ $message }}</span> @enderror
        </div>

        @if ($media)
            <div style="margin-top: 16px; position: relative; display: inline-block;">
                @if(in_array(strtolower($media->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                    <img src="{{ $media->temporaryUrl() }}" style="max-height: 200px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1);">
                @else
                    <div style="padding: 12px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; font-size: 0.9rem; color: #cbd5e1; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Video yang dipilih: {{ $media->getClientOriginalName() }}
                    </div>
                @endif
                <button type="button" wire:click="$set('media', null)" style="position: absolute; top: -8px; right: -8px; background: #ef4444; color: white; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: bold;">&times;</button>
            </div>
        @endif
        @error('media') <span style="color: #ef4444; font-size: 0.8rem; margin-top: 8px; display: block;">{{ $message }}</span> @enderror

        <div style="margin-top: 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
            <div style="display: flex; align-items: center; gap: 24px;">
                <div style="display: flex; align-items: center;">
                    <input
                        wire:model="isAnonymous"
                        id="isAnonymous"
                        type="checkbox"
                        style="height: 18px; width: 18px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); border-radius: 4px; accent-color: var(--teal);"
                    >
                    <label for="isAnonymous" style="margin-left: 10px; font-size: 0.9rem; color: #cbd5e1; cursor: pointer;">
                        Samarkan Identitas (Anonim)
                    </label>
                </div>
                
                <div style="position: relative; overflow: hidden; display: inline-block;">
                    <button type="button" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #cbd5e1; padding: 8px 16px; border-radius: 12px; font-size: 0.9rem; cursor: pointer; display: flex; align-items: center; gap: 6px; transition: all 0.3s;">
                        <svg style="width: 18px; height: 18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Lampirkan Media
                    </button>
                    <input type="file" wire:model="media" accept="image/*,video/*" style="font-size: 100px; position: absolute; left: 0; top: 0; opacity: 0; cursor: pointer; height: 100%;">
                </div>
                <div wire:loading wire:target="media" style="color: var(--teal-l); font-size: 0.85rem;">
                    Sedang mengunggah...
                </div>
            </div>
            
            <button
                type="submit"
                class="btn-primary"
                style="padding: 12px 24px; font-size: 0.9rem;"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove wire:target="createThread">Kirim Cerita</span>
                <span wire:loading wire:target="createThread">Mengirim...</span>
            </button>
        </div>
    </form>
    
    @guest
        <div style="margin-top: 24px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.9rem; color: #94a3b8; text-align: center;">
            Anda harus <a href="{{ route('login') }}" style="color: var(--teal-l); text-decoration: underline;">login</a> untuk dapat membagikan cerita.
        </div>
    @endguest
</div>
