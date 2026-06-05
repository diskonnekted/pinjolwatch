<style>
/* Reusing global styles from welcome.blade.php for consistency */
.glass { background: rgba(255,255,255,.05); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,.1); border-radius: 24px; transition: all .3s ease; }
.glass:hover { background: rgba(255,255,255,.08); border-color: rgba(45,212,191,.3); }
.grad { background: linear-gradient(135deg, #fff 0%, var(--teal-l) 50%, var(--teal) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.badge { display: inline-flex; align-items: center; gap: 8px; padding: 6px 16px; background: rgba(13,148,136,.2); border: 1px solid rgba(45,212,191,.4); border-radius: 999px; font-size: .75rem; font-weight: 700; color: var(--teal-l); letter-spacing: .08em; text-transform: uppercase; }
.btn-primary { display: inline-flex; align-items: center; gap: 10px; padding: 12px 24px; background: linear-gradient(135deg, var(--teal) 0%, #0891b2 100%); color: #fff; font-weight: 800; font-size: 1rem; border-radius: 14px; letter-spacing: .05em; text-transform: uppercase; box-shadow: 0 0 40px rgba(13,148,136,.4); transition: all .3s ease; text-decoration: none; border: none; cursor: pointer; }
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 0 60px rgba(13,148,136,.6); }
.btn-primary:disabled { opacity: 0.5; cursor: not-allowed; transform: none; box-shadow: none; }
:root { --teal: #0d9488; --teal-l: #2dd4bf; }
</style>

<div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-10">
        <div class="badge" style="margin: 0 auto 16px; width: fit-content;">Komunitas</div>
        <h1 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 900;" class="grad mb-4">Berbagi Pengalaman</h1>
        <p style="color: #94a3b8; font-size: 1.1rem;">Ruang aman untuk saling menguatkan. Anda tidak sendirian dalam perjuangan ini.</p>
    </div>

    @livewire('community.create-thread')

    <div class="mt-8 space-y-6">
        @forelse($threads as $thread)
            @livewire('community.thread-item', ['thread' => $thread], key($thread->id))
        @empty
            <div class="glass" style="padding: 48px; text-align: center; color: #64748b;">
                <div style="font-size: 3rem; margin-bottom: 16px;">🌱</div>
                <p>Belum ada pengalaman yang dibagikan.<br>Jadilah yang pertama untuk memulai percakapan ini.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $threads->links(data: ['scrollTo' => false]) }}
    </div>
</div>
