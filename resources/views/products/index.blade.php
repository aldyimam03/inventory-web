<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-semibold">Daftar Produk</h2>
            <a href="{{ route('product.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Produk</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Kategori</th>
                    <th class="p-2 border">Slug</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="p-2 border text-center">{{ $loop->iteration + $products->perPage() * ($products->currentPage() - 1) }}</td>
                        <td class="p-2 border">{{ $product->name }}</td>
                        <td class="p-2 border">{{ $product->category->category }}</td>
                        <td class="p-2 border">{{ $product->slug }}</td>
                            <td class="p-2 border flex gap-2 justify-center">
                                <button class="bg-blue-100 p-2 rounded">
                                    <a href="{{ route('product.edit', $product) }}" class="text-blue-500">Edit</a>
                                </button>
                                    <form action="{{ route('product.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-100 p-2 rounded text-red-500">Hapus</button>
                                    </form>
                                <button class="bg-yellow-100 p-2 rounded">
                                    <a href="{{ route('product.show', $product) }}" class="text-yellow-500">Variant</a>
                                </button>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $products->links() }}</div>
    </div>
</x-app-layout>
