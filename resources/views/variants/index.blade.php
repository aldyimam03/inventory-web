<x-app-layout>

    <div class="p-6">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold mb-4">Varian dari {{ $product->name }}</h2>
            <div class="flex justify-between gap-2 py-auto mb-4">
                <a href="{{ route('product.index') }}"
                    class= "bg-gray-300 text-gray-800 px-4 py-2 rounded inline-block">Kembali</a>
                @auth
                    @if (auth()->user()->role == 'admin')
                        <a href="{{ route('variant.create', $product->id) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded inline-block hover:bg-blue-700 transition">Tambah
                            Varian</a>
                    @endif
                @endauth
            </div>
        </div>


        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded my-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama Varian</th>
                    @auth
                        @if (auth()->user()->role == 'admin')
                            <th class="p-2 border">Slug</th>
                        @endif
                    @endauth
                    <th class="p-2 border">Stock</th>
                    <th class="p-2 border">Deskripsi</th>
                    @auth
                        @if (auth()->user()->role == 'admin')
                            <th class="p-2 border">Aksi</th>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($variants as $variant)
                    <tr>
                        <td class="p-2 border text-center">
                            {{ $loop->iteration + $variants->perPage() * ($variants->currentPage() - 1) }}</td>
                        <td class="p-2 border">{{ $variant->name }}</td>
                        @auth
                            @if (auth()->user()->role == 'admin')
                                <td class="p-2 border">{{ $variant->slug }}</td>
                            @endif
                        @endauth
                        <td class="p-2 border text-center">{{ $variant->stock }}</td>
                        <td class="p-2 border">{{ $variant->description }}</td>
                        @auth
                            @if (auth()->user()->role == 'admin')
                                <td class="p-2 border w-auto max-w-[200px] whitespace-nowrap align-middle">
                                    <div class="flex gap-3 justify-center">
                                        <a href="{{ route('variant.edit', [$product->id, $variant->id]) }}"
                                            class="inline-flex items-center bg-blue-100 text-blue-500 px-2 py-1 rounded text-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('variant.destroy', [$product->id, $variant->id]) }}"
                                            method="POST" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center bg-red-100 text-red-500 px-2 py-1 rounded text-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-2 border text-center">Belum ada varian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4"> {{ $variants->links() }} </div>
    </div>
</x-app-layout>
