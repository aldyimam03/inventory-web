<x-app-layout>
    <div class="p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
            <h2 class="text-xl font-semibold">Daftar Produk</h2>
            <div class="flex w-full md:w-2/3 gap-8">
                <form action="{{ route('product.index') }}" method="GET" class="flex flex-grow gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..."
                        class="flex-grow px-4 py-2 border rounded" />
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
                </form>
            </div>
            <a href="{{ route('product.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition whitespace-nowrap">Tambah
                Produk</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <table class=" w-full border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Kategori</th>
                    <th class="p-2 border">Slug</th>
                    <th class="p-2 border">Description</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="p-2 border text-center">
                            {{ $loop->iteration + $products->perPage() * ($products->currentPage() - 1) }}</td>
                        <td class="p-2 border">{{ $product->name }}</td>
                        <td class="p-2 border text-center">{{ $product->category->category }}</td>
                        <td class="p-2 border">{{ $product->slug }}</td>
                        <td class="p-2 border">{{ $product->description }}</td>
                        <td class="p-2 border w-auto max-w-[200px] whitespace-nowrap align-middle">
                            <div class="flex gap-3 justify-center">
                                <a href="{{ route('product.edit', $product) }}"
                                    class="inline-flex items-center bg-blue-100 text-blue-500 px-2 py-1 rounded text-sm">Edit</a>

                                <form action="{{ route('product.destroy', $product) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center bg-red-100 text-red-500 px-2 py-1 rounded text-sm">Hapus</button>
                                </form>

                                <a href="{{ route('variant.index', ['product' => $product->id]) }}"
                                    class="inline-flex items-center bg-yellow-100 text-yellow-500 px-2 py-1 rounded text-sm">Variant</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $products->links() }}</div>
    </div>
</x-app-layout>
