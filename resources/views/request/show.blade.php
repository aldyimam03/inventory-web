<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            Detail Permintaan Inventory
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-medium text-gray-800">Informasi Permintaan</h3>
            </div>
            <div class="px-6 pt-4 pb-2">
                <table class="w-full text-sm text-left text-gray-700">
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="font-semibold w-1/3 py-2">Divisi</td>
                            <td class="py-2">{{ $requestInventory->division->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Nama Peminjam</td>
                            <td class="py-2">{{ $requestInventory->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Produk</td>
                            <td class="py-2">{{ $requestInventory->variant->product->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Varian</td>
                            <td class="py-2">{{ $requestInventory->variant->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Jumlah</td>
                            <td class="py-2">{{ $requestInventory->quantity }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Keterangan</td>
                            <td class="py-2">{{ $requestInventory->note }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Tanggal & Jam Request</td>
                            <td class="py-2">{{ $requestInventory->created_at->format('d M Y, H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold py-2">Status</td>
                            <td class="py-2">
                                <span
                                    class="inline-block px-3 py-1 text-sm rounded 
                                    {{ $requestInventory->status == 'pending'
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : ($requestInventory->status == 'approved'
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($requestInventory->status) }}
                                </span>
                            </td>
                        </tr>
                        @if ($requestInventory->approved_by)
                            <tr>
                                <td class="font-semibold py-2">Disetujui Oleh</td>
                                <td class="py-2">{{ $requestInventory->approver->name }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 flex items-center justify-between border-t">
                <a href="{{ route('request.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded">
                    Kembali
                </a>

                @if ($requestInventory->status === 'pending')
                    <form action="{{ route('request.approve', $requestInventory->id) }}" method="POST"
                        class="flex gap-3">
                        @csrf
                        @method('PATCH')

                        <button type="submit" name="action" value="approve"
                            class="px-4 py-2 bg-green-100 text-green-500 rounded">
                            Setujui
                        </button>

                        <button type="submit" name="action" value="reject"
                            class="px-4 py-2 bg-red-100 text-red-500 rounded">
                            Tolak
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
