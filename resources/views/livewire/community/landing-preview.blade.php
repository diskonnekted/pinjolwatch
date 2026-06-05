<section style="background: var(--dark); padding: 96px 32px;">
    <div style="max-width: 1100px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 64px;">
            <div class="badge" style="margin: 0 auto 20px; width: fit-content;">Suara Mereka</div>
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 900;" class="grad">Berbagi Pengalaman</h2>
            <p style="mt-4 max-w-2xl text-xl text-gray-400 mx-auto">
                Kumpulan pengalaman nyata dari masyarakat yang berjuang dan bertahan dari jeratan pinjaman online. Anda tidak sendirian.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 32px;">
            @forelse($threads as $thread)
                <div class="glass" style="padding: 32px; display: flex; flex-direction: column; justify-content: space-between; transition: all .4s cubic-bezier(0.4, 0, 0.2, 1); min-height: 280px;">
                    <div>
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                            <img class="h-10 w-10 rounded-full border border-gray-700" src="{{ $thread->author_avatar }}" alt="">
                            <div>
                                <p style="font-size: 0.95rem; font-weight: 700; color: #f1f5f9;">
                                    {{ $thread->author_name }}
                                </p>
                                <p style="font-size: 0.8rem; color: #64748b;">
                                    <time datetime="{{ $thread->created_at->toIso8601String() }}">{{ $thread->created_at->diffForHumans() }}</time>
                                </p>
                            </div>
                        </div>
                        <p style="color: #cbd5e1; line-height: 1.7; font-size: 1rem; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; font-style: italic;">
                            "{{ $thread->content }}"
                        </p>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; color: #64748b; padding: 48px; background: rgba(255,255,255,0.02); border-radius: 16px; border: 1px dashed rgba(255,255,255,0.1);">
                    Belum ada cerita yang dibagikan.
                </div>
            @endforelse
        </div>

        <div style="text-align: center; margin-top: 56px;">
            <a href="{{ route('komunitas') }}" class="btn-primary">
                Buka Forum &amp; Bagikan Ceritamu
            </a>
        </div>
    </div>
</section>
