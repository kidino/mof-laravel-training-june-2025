<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        {{ $notes->links() }}
                    </div>
                    
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">TITLE</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">USER</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($notes as $note)
                            <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-4 py-2 whitespace-nowrap">{{ $note->id }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $note->title }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $note->user?->name }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <a href="{{ route('note.edit', $note->id) }}"  class="text-blue-600 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                    No notes found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
