<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Formulir Permintaan Inventaris
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow mt-8">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('request.store') }}" method="POST" class="space-y-5">
            @csrf
            <span class="text-xs text-red-500 italic">Note: jika anda belum memiliki divisi, silahkan hubungi
                admin</span>
            {{-- Nama Divisi --}}
            <div>
                <label class="block mb-1 font-medium text-sm">Nama</label>
                <input type="text" value="{{ auth()->user()->name }}" disabled
                    class="w-full px-4 py-2 border rounded bg-gray-100 text-gray-700">
            </div>

            {{-- Nama Divisi --}}
            <div>
                <label class="block mb-1 font-medium text-sm">Divisi</label>
                <input type="text" value="{{ auth()->user()->division->name ?? 'Belum memiliki divisi' }}" disabled
                    class="w-full px-4 py-2 border rounded bg-gray-100 text-gray-700">
            </div>

            {{-- Produk --}}
            <div>
                <label for="product_id" class="block mb-1 font-medium text-sm">Produk</label>
                <select id="product_id" name="product_id" required class="w-full px-4 py-2 border rounded">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Varian --}}
            <div>
                <label for="variant_id" class="block mb-1 font-medium text-sm">Varian Produk</label>
                <select id="variant_id" name="variant_id" required class="w-full px-4 py-2 border rounded">
                    <option value="">-- Pilih Varian --</option>
                </select>
                @error('variant_id')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Jumlah --}}
            <div>
                <label for="quantity" class="block mb-1 font-medium text-sm">Jumlah</label>
                <input type="number" name="quantity" id="quantity" required min="1"
                    class="w-full px-4 py-2 border rounded" value="{{ old('quantity') }}">
                @error('quantity')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Catatan --}}
            <div>
                <label for="note" class="block mb-1 font-medium text-sm">Keterangan / Tujuan Peminjaman</label>
                <textarea name="note" id="note" rows="3" class="w-full px-4 py-2 border rounded">{{ old('note') }}</textarea>
                @error('note')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Kirim Permintaan
                </button>
            </div>
        </form>
    </div>

    {{-- AJAX load variant --}}
    <script>
        document.getElementById('product_id').addEventListener('change', function() {
            const productId = this.value;
            const variantSelect = document.getElementById('variant_id');
            variantSelect.innerHTML = '<option value="">-- Memuat varian... --</option>';

            if (productId) {
                fetch(`/api/products/${productId}/variants`)
                    .then(response => response.json())
                    .then(response => {
                        let options = '<option value="">-- Pilih Varian --</option>';
                        response.data.forEach(variant => {
                            options += `<option value="${variant.id}">${variant.name}</option>`;
                        });
                        variantSelect.innerHTML = options;
                    })
                    .catch(error => {
                        console.error(error);
                        variantSelect.innerHTML = '<option value="">-- Terjadi kesalahan --</option>';
                    });
            } else {
                variantSelect.innerHTML = '<option value="">-- Pilih Varian --</option>';
            }
        });
    </script>
</x-app-layout>
