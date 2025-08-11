<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl border border-gray-200">
                <div class="p-6 bg-white">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                    Division
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <!-- Name -->
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center space-x-3">
                                            <img class="h-12 w-12 rounded-full object-cover"
                                                src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&auto=format&fit=crop&w=76&q=80"
                                                alt="">
                                            <span class="font-medium text-gray-900 text-base">
                                                {{ $user->name }}
                                            </span>
                                        </div>
                                    </td>
                                    <!-- Email -->
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-gray-700 text-base">{{ $user->email }}</span>
                                    </td>
                                    <!-- Role -->
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded 
                                            {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <!-- Division -->
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-gray-700 text-base">
                                            {{ $user->division->name ?? 'Belum memiliki divisi' }}
                                        </span>
                                    </td>
                                    <!-- Action -->
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('user.edit', $user) }}"
                                                class="px-4 py-1 bg-blue-100 text-blue-500 rounded text-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('user.destroy', $user) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-1 bg-red-100 text-red-500 rounded text-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
