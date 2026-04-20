<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tickets
            </h2>
            <a href="/tickets/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + New Ticket
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($tickets as $ticket)
                <div class="bg-white shadow-sm rounded-lg p-6 mb-4">
                    <div class="flex justify-between items-center">
                        <a href="/tickets/{{ $ticket->id }}" class="text-lg font-semibold text-blue-600 hover:underline">
                            {{ $ticket->title }}
                        </a>
                        <span class="px-3 py-1 rounded-full text-sm
                            {{ $ticket->status === 'open' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $ticket->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $ticket->status === 'closed' ? 'bg-gray-100 text-gray-800' : '' }}">
                            {{ $ticket->status }}
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm mt-1">Priority: {{ $ticket->priority }}</p>
                </div>
            @empty
                <div class="bg-white shadow-sm rounded-lg p-6 text-center text-gray-500">
                    No tickets yet. Create your first one!
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>