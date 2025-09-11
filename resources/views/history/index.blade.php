<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>
    <div class="p-6">
        <table class=" w-full border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Divisi</th>
                    <th class="p-2 border">Tanggal Peminjaman</th>
                    <th class="p-2 border">Tanggal pengembalian</th>
                    <th class="p-2 border">Product</th>
                    <th class="p-2 border">Variant</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($requests as $request)
                    <tr>
                        <td class="p-2 border text-center">
                            {{ $loop->iteration + $requests->perPage() * ($requests->currentPage() - 1) }}
                        </td>

                        {{-- Nama Peminjam --}}
                        <td class="p-2 border">
                            {{ $request->user->name }}
                        </td>

                        {{-- Divisi --}}
                        <td class="p-2 border">
                            {{ $request->division->name }}
                        </td>

                        {{-- Tanggal Peminjaman --}}
                        <td class="p-2 border">
                            {{ $request->created_at->format('d M Y') }}
                        </td>

                        {{-- Tanggal Pengembalian / kosong jika belum di-returned --}}
                        <td class="p-2 border">
                            {{ $request->status == 'returned' ? $request->updated_at->format('d M Y') : '-' }}
                        </td>

                        <td class="p-2 border">{{ $request->product->name }}</td>
                        <td class="p-2 border">{{ $request->variant->name }}</td>

                        <td class="p-2 border">
                            <span
                                class="px-2 py-1 rounded text-xs
                @if ($request->status == 'approved') bg-green-100 text-green-600
                @elseif($request->status == 'rejected') bg-red-100 text-red-600
                @elseif($request->status == 'returned') bg-purple-100 text-purple-600
                @else bg-yellow-100 text-yellow-600 @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>

                        <td class="p-2 border"></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</x-app-layout>
