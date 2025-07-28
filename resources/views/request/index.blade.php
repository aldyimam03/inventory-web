<x-app-layout>
    <div class="p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
            <h2 class="text-xl font-semibold">Daftar Permintaan Alat Inventory</h2>

            {{-- Form Search (opsional untuk filter) --}}
            <div class="w-full md:flex md:justify-center md:flex-1">
                <form action="{{ route('request.index') }}" method="GET" class="flex gap-2 w-full md:max-w-xl">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari berdasarkan Nama atau Divisi atau Status..."
                        class="flex-grow px-4 py-2 border rounded" />
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 whitespace-nowrap">Cari</button>
                </form>
            </div>

        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Divisi</th>
                    <th class="p-2 border">Tanggal</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td class="p-2 border text-center">
                            {{ $loop->iteration + $requests->perPage() * ($requests->currentPage() - 1) }}
                        </td>
                        <td class="p-2 border">{{ $request->user->name }}</td>
                        <td class="p-2 border text-center">{{ $request->division->name ?? 'N/A' }}</td>
                        <td class="p-2 border text-center">{{ $request->created_at->format('d M Y') }}</td>
                        <td class="p-2 border text-center">
                            <span
                                class="inline-block px-2 py-1 rounded 
                                {{ $request->status === 'pending'
                                    ? 'bg-yellow-200 text-yellow-800'
                                    : ($request->status === 'approved'
                                        ? 'bg-green-200 text-green-800'
                                        : 'bg-red-200 text-red-800') }}">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="p-2 border w-auto max-w-[200px] whitespace-nowrap align-middle">
                            <div class="flex gap-3 justify-center">
                                <a href="{{ route('request.show', $request->id) }}"
                                    class="inline-flex items-center bg-blue-100 text-blue-500 px-2 py-1 rounded text-sm">Detail</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-2 border text-center text-gray-500">
                            Tidak ada data permintaan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $requests->links() }}</div>
    </div>

    <script>
        function filterByStatus(status) {
            const url = new URL(window.location);
            if (status) {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }
            window.location = url;
        }
    </script>
</x-app-layout>
