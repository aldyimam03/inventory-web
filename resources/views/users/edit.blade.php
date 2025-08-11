<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-200">
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" disabled name="name" id="name"
                            value="{{ old('name', $user->name) }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 sm:text-base"
                            required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" disabled name="email" id="email"
                            value="{{ old('email', $user->email) }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 bg-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base"
                            required>
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" id="role"
                            class="mt-1 block w-full rounded-lg border-gray-300   shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <!-- Division -->
                    <div>
                        <label for="division" class="block text-sm font-medium text-gray-700">Division</label>
                        <select name="division_id" id="division_id"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-base">

                            @if (is_null($user->division_id))
                                <option value="" selected disabled>-- Pilih Divisi --</option>
                            @endif

                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}"
                                    {{ $user->division_id == $division->id ? 'selected' : '' }}>
                                    {{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <a href="{{ route('user.index') }}"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                            Cancel
                        </a>
                        <button type="submit"
                            class="ml-3 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
