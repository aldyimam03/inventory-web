<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Edit Produk</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.update', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div>
                <label for="name" class="block font-medium">Nama Produk</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $product->name) }}"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block font-medium">Kategori</label>
                <select name="category_id" id="category_id"
                    class="w-full border rounded px-3 py-2 mt-1 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucfirst($category->category) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block font-medium">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('product.index') }}"
                    class="text-sm text-gray-600 hover:underline">← Kembali</a>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>
