<div>
    <form wire:submit.prevent="save">
        @if (session()->has('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
            <input type="text" id="title" wire:model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('title') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Isi Cerita:</label>
            <textarea id="content" wire:model="content" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('content') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar (Opsional):</label>
            <input type="file" id="image" wire:model="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('image') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror

            @if ($image)
                <div class="mt-4">
                    <p>Pratinjau Gambar:</p>
                    <img src="{{ $image->temporaryUrl() }}" class="w-64 h-auto">
                </div>
            @endif
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Simpan Artikel
        </button>
    </form>
</div>
