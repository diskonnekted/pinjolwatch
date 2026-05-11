<x-frontend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-100 leading-tight">
            {{ __('Detail Cerita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:article-detail :slug="$slug" />
    </div>
</x-frontend-layout>
