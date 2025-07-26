<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Tambah Produk Baru</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama Produk -->
            <div>
                <label for="name" class="block font-medium">Nama Produk</label>
                <input type="text" name="name" id="name"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="{{ old('name') }}" required>
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block font-medium">Kategori</label>
                <select name="category_id" id="category_id"
                    class="w-full border rounded px-3 py-2 mt-1 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block font-medium">Deskripsi (opsional)</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Tuliskan deskripsi produk...">{{ old('description') }}</textarea>
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end gap-2">
                <a href="{{ route('product.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
