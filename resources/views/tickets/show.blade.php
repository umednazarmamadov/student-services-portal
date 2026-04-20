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

                <!-- Смена статуса -->
                <div class="mt-6 border-t pt-4">
                    <p class="text-gray-700 font-medium mb-3">Change Status:</p>
                    <div class="flex gap-3">
                        <form method="POST" action="/tickets/{{ $ticket->id }}/status">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="open">
                            <button type="submit" style="{{ $ticket->status === 'open' ? 'background:#22c55e;color:white;' : 'background:#dcfce7;color:#166534;' }}" class="px-4 py-2 rounded-lg">
                                Open
                            </button>
                        </form>
                        <form method="POST" action="/tickets/{{ $ticket->id }}/status">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="in_progress">
                            <button type="submit" style="{{ $ticket->status === 'in_progress' ? 'background:#eab308;color:white;' : 'background:#fef9c3;color:#854d0e;' }}" class="px-4 py-2 rounded-lg">
                                In Progress
                            </button>
                        </form>
                        <form method="POST" action="/tickets/{{ $ticket->id }}/status">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="closed">
                            <button type="submit" style="{{ $ticket->status === 'closed' ? 'background:#6b7280;color:white;' : 'background:#f3f4f6;color:#1f2937;' }}" class="px-4 py-2 rounded-lg">
                                Closed
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="/tickets" class="text-blue-600 hover:underline">← Back to tickets</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>