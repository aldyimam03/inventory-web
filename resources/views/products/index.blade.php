<x-app-layout>
    <div class="p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
            <h2 class="text-xl font-semibold">Daftar Produk</h2>

            {{-- Form Search --}}
            <div class="w-full md:flex md:justify-center md:flex-1">
                <form action="{{ route('product.index') }}" method="GET" class="flex gap-2 w-full md:max-w-xl">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..."
                        class="flex-grow px-4 py-2 border rounded" />
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 whitespace-nowrap">Cari</button>
                </form>
            </div>

            {{-- Tombol Tambah Produk untuk admin --}}
            @auth
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('product.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition whitespace-nowrap">
                        Tambah Produk
                    </a>
                @endif
            @endauth
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
                    @auth
                        @if (auth()->user()->role == 'admin')
                        <th class="p-2 border">Slug</th>
                        @endif
                    @endauth
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
                        @auth
                            @if (auth()->user()->role == 'admin')
                                <td class="p-2 border">{{ $product->slug }}</td>
                            @endif
                        @endauth
                        <td class="p-2 border">{{ $product->description }}</td>
                        <td class="p-2 border w-auto max-w-[200px] whitespace-nowrap align-middle">
                            <div class="flex gap-3 justify-center">
                                @auth
                                    @if (auth()->user()->role == 'admin')
                                        <a href="{{ route('product.edit', $product) }}"
                                            class="inline-flex items-center bg-blue-100 text-blue-500 px-2 py-1 rounded text-sm">Edit</a>

                                        <form action="{{ route('product.destroy', $product) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center bg-red-100 text-red-500 px-2 py-1 rounded text-sm">Hapus</button>
                                        </form>
                                    @endif
                                @endauth
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
