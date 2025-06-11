<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between items-center mb-4">
                        <div>
                            {{ $users->links() }}
                        </div>
                        <a href="{{ route('user.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            + Add New User
                        </a>
                    </div>
                    
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">NAME</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">EMAIL</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-4 py-2 whitespace-nowrap">{{ $user['id'] }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $user['name'] }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $user['email'] }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <a href="{{ route('user.edit', $user['id']) }}" class="text-blue-600 hover:underline">EDIT</a> 
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
