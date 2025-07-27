<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold mb-4">Tambah Varian dari {{ $product->name }}</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('variant.store', $product->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium">Nama Varian</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2"
                    value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="stock" class="block font-medium">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full border rounded p-2"
                    value="{{ old('stock') }}" required>
            </div>

            <div>
                <label for="description" class="block font-medium">Deskripsi (opsional)</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-between">
                <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                    <a href="{{ route('variant.index', $product->id) }}">Batal</a>
                </button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded  hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
