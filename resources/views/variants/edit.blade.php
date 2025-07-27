<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold mb-4">Edit Varian dari {{ $variant->name }}</h2>

        <form action="{{ route('variant.update', [$product->id, $variant->id]) }}" method="POST"
            class="mt-6 max-w-xl space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block font-medium">Nama Varian</label>
                <input type="text" name="name" id="name" value="{{ old('name', $variant->name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1" required>
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="block font-medium">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $variant->stock) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1" required>
                @error('stock')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block font-medium">Deskripsi (opsional)</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">{{ old('description', $variant->description) }}</textarea>
                @error('description')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">
                <button class="px-4 py-2 rounded bg-gray-300 text-gray-800">
                    <a href="{{ route('variant.index', $product->id) }}">Kembali</a>
                </button>
                <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white  hover:bg-blue-700">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>
