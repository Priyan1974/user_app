<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users List') }}
            </h2>
            <div class="d-flex gap-3">
                <a href="{{ route('gallery.index') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    View Gallery
                </a>
                <a href="{{ route('gallery.create') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    Add Gallery
                </a>
            </div>
        </div>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">First Name</th>
                            <th class="border border-gray-300 px-4 py-2">Last Name</th>
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Address</th>
                            <th class="border border-gray-300 px-4 py-2">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->fname }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->lname }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->address }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
