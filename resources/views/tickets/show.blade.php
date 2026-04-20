<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">{{ $ticket->title }}</h3>
                    <span class="px-3 py-1 rounded-full text-sm
                        {{ $ticket->status === 'open' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $ticket->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $ticket->status === 'closed' ? 'bg-gray-100 text-gray-800' : '' }}">
                        {{ $ticket->status }}
                    </span>
                </div>
                <p class="text-gray-600 mb-4">{{ $ticket->description }}</p>
                <div class="border-t pt-4 text-sm text-gray-500">
                    <p>Priority: <span class="font-medium">{{ $ticket->priority }}</span></p>
                    <p>Created: <span class="font-medium">{{ $ticket->created_at->diffForHumans() }}</span></p>
                </div>
                <div class="mt-6">
                    <a href="/tickets" class="text-blue-600 hover:underline">← Back to tickets</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>