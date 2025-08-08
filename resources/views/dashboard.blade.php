<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-0 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-center text-xl">
            <!-- Card: Total Produk -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-center">Total Produk</div>
                <div class="mt-3 text-2xl font-bold" id="count-products">0</div>
            </div>

            <!-- Card: Total Variant -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-center">Total Variant</div>
                <div class="mt-3 text-2xl font-bold" id="count-variants">0</div>
            </div>

            <!-- Card: Total Request -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-center">Total Request</div>
                <div class="mt-3 text-2xl font-bold" id="count-requests">0</div>
            </div>

            <!-- Card: Total User -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-500 text-center">Total User</div>
                <div class="mt-3 text-2xl font-bold" id="count-users">0</div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 pb-8">
        <!-- Diagram Batang Request per Status -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Diagram Jumlah Request per Status</h3>
            <canvas id="statusChart" height="200"></canvas>
        </div>

        <!-- Tabel Request Terbaru -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-6 text-gray-800">Request Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto text-base text-left">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-6 py-4 w-1/4 text-center">Tanggal</th>
                            <th class="px-6 py-4 w-1/2 text-center">Nama User</th>
                            <th class="px-6 py-4 w-1/4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($recentRequests as $request)
                            <tr>
                                <td class="px-6 py-4 text-center">{{ $request->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-center">{{ $request->user->name }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-block px-3 py-1 rounded text-sm font-medium 
                                @if ($request->status === 'approved') bg-green-100 text-green-700
                                @elseif ($request->status === 'rejected') bg-red-100 text-red-700
                                @else bg-yellow-100 text-yellow-700 @endif">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manual counter animation function
            function animateCounter(elementId, endValue, duration = 900) {
                const element = document.getElementById(elementId);
                if (!element) return;

                const startValue = 0;
                const increment = endValue / (duration / 16); // 60fps
                let currentValue = startValue;

                element.textContent = '0';

                const timer = setInterval(() => {
                    currentValue += increment;
                    if (currentValue >= endValue) {
                        element.textContent = endValue.toLocaleString();
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(currentValue).toLocaleString();
                    }
                }, 16);
            }

            // Start animations with delay
            setTimeout(() => {
                animateCounter('count-products', {{ $totalProducts ?? 0 }});
                animateCounter('count-variants', {{ $totalVariants ?? 0 }});
                animateCounter('count-requests', {{ $totalRequests ?? 0 }});
                animateCounter('count-users', {{ $totalUsers ?? 0 }});
            }, 300);
        });
        const ctx = document.getElementById('statusChart').getContext('2d');

        const statusChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($requestStatusCounts->keys()) !!},
                datasets: [{
                    label: 'Jumlah Request',
                    data: {!! json_encode($requestStatusCounts->values()) !!},
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            boxWidth: 50, // Hilangkan kotak
                            boxHeight: 15,
                            color: '#000000',
                            font: {
                                size: 15
                            }
                        }
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Menetapkan langkah ke 1
                            precision: 0 // Menghapus angka desimal
                        }
                    }
                }
            }
        });
    </script>


</x-app-layout>
