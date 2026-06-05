<div>
    <!-- List of Replies -->
    <div style="display: flex; flex-direction: column; gap: 20px; padding-left: 20px; border-left: 2px solid rgba(45,212,191,0.3);">
        @forelse($replies as $reply)
            <div style="display: flex; gap: 16px;">
                <img style="height: 36px; width: 36px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.1); flex-shrink: 0;" src="{{ $reply->author_avatar }}" alt="">
                <div>
                    <div style="font-size: 0.9rem;">
                        <span style="font-weight: 700; color: #f8fafc;">{{ $reply->author_name }}</span>
                        <span style="color: #64748b; margin-left: 8px;">&middot; {{ $reply->created_at->diffForHumans() }}</span>
                    </div>
                    <div style="margin-top: 8px; font-size: 0.95rem; color: #cbd5e1; line-height: 1.6; white-space: pre-wrap;">
                        {{ $reply->content }}
                    </div>
                </div>
            </div>
        @empty
            <p style="font-size: 0.9rem; color: #64748b; font-style: italic;">Belum ada balasan. Jadilah yang pertama memberikan semangat.</p>
        @endforelse
    </div>

    <!-- Reply Form -->
    <div style="margin-top: 24px; padding-left: 20px;">
        @if(session()->has('message'))
            <div style="margin-bottom: 16px; padding: 10px 14px; background: rgba(45,212,191,0.1); border: 1px solid rgba(45,212,191,0.3); color: var(--teal-l); border-radius: 8px; font-size: 0.85rem;">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="addReply">
            <textarea
                wire:model="content"
                rows="2"
                style="width: 100%; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #f1f5f9; border-radius: 12px; padding: 12px; font-size: 0.9rem; resize: none; focus:outline-none; focus:border-teal-500;"
                placeholder="Tulis balasan untuk memberi semangat... (Maks. 500 karakter)"
            ></textarea>
            @error('content') <span style="color: #ef4444; font-size: 0.8rem; margin-top: 8px; display: block;">{{ $message }}</span> @enderror

            <div style="margin-top: 12px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center;">
                    <input
                        wire:model="isAnonymous"
                        type="checkbox"
                        style="height: 16px; width: 16px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2); border-radius: 4px; accent-color: var(--teal);"
                    >
                    <label style="margin-left: 8px; font-size: 0.85rem; color: #94a3b8;">
                        Balas Anonim
                    </label>
                </div>
                <button
                    type="submit"
                    class="btn-primary"
                    style="padding: 8px 16px; font-size: 0.85rem;"
                    wire:loading.attr="disabled"
                >
                    Kirim Balasan
                </button>
            </div>
        </form>
        
        @guest
            <div style="margin-top: 16px; font-size: 0.85rem; color: #64748b;">
                <a href="{{ route('login') }}" style="color: var(--teal-l); text-decoration: underline;">Login</a> untuk ikut membalas.
            </div>
        @endguest
    </div>
</div>
