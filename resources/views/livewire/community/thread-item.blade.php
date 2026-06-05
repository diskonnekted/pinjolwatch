<div class="glass" style="padding: 24px; margin-bottom: 24px; border-radius: 20px;">
    <div style="display: flex; align-items: center; gap: 16px;">
        <img style="height: 48px; width: 48px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.1);" src="{{ $thread->author_avatar }}" alt="">
        <div>
            <p style="font-size: 1rem; font-weight: 800; color: #f8fafc;">
                {{ $thread->author_name }}
            </p>
            <p style="font-size: 0.85rem; color: #94a3b8;">
                <time datetime="{{ $thread->created_at->toIso8601String() }}">{{ $thread->created_at->diffForHumans() }}</time>
            </p>
        </div>
    </div>
    
    <div style="margin-top: 20px; font-size: 1.05rem; color: #cbd5e1; line-height: 1.7; white-space: pre-wrap;">
        {{ $thread->content }}
    </div>

    @if($thread->media_path)
        <div style="margin-top: 16px; border-radius: 16px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1);">
            @if($thread->media_type === 'image')
                <img src="{{ Storage::url($thread->media_path) }}" alt="Lampiran Media" style="width: 100%; max-height: 400px; object-fit: contain; background: rgba(0,0,0,0.3); display: block;">
            @elseif($thread->media_type === 'video')
                <video controls style="width: 100%; max-height: 400px; background: rgba(0,0,0,0.3); display: block;">
                    <source src="{{ Storage::url($thread->media_path) }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            @endif
        </div>
    @endif

    <div style="margin-top: 24px; display: flex; gap: 24px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
        <button 
            wire:click="toggleLike"
            style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; font-weight: 600; background: none; border: none; cursor: pointer; transition: all 0.3s; color: {{ $isLiked ? '#ec4899' : '#94a3b8' }};"
        >
            <svg style="height: 20px; width: 20px; transition: transform 0.2s;" fill="{{ $isLiked ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor" class="{{ $isLiked ? 'scale-110' : 'hover:scale-110' }}">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            {{ $thread->likes_count }} Dukungan
        </button>

        <div x-data="{ open: false }" style="position: relative; width: 100%;">
            <button 
                @click="open = !open"
                style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; font-weight: 600; color: #94a3b8; background: none; border: none; cursor: pointer; transition: color 0.3s;"
                onmouseover="this.style.color='#38bdf8'"
                onmouseout="this.style.color='#94a3b8'"
            >
                <svg style="height: 20px; width: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                {{ $thread->replies_count }} Balasan
            </button>
            
            <div x-show="open" style="margin-top: 24px; padding-top: 24px; border-top: 1px dashed rgba(255,255,255,0.1); width: 100%; display: none;" x-transition>
                @livewire('community.thread-replies', ['thread' => $thread], key('replies-'.$thread->id))
            </div>
        </div>
    </div>
</div>
