<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tickets</h2>
            <a href="/tickets/create" style="padding: 8px 16px; background: #185FA5; color: white; border-radius: 8px; font-size: 13px; font-weight: 500; text-decoration: none;">+ New Ticket</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @forelse($tickets as $ticket)
            <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1rem 1.25rem; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <a href="/tickets/{{ $ticket->id }}" style="font-size: 14px; font-weight: 500; color: #111827; text-decoration: none;">{{ $ticket->title }}</a>
                    <div style="display: flex; gap: 12px; margin-top: 4px;">
                        <span style="font-size: 12px; color: #6b7280;">Priority: {{ $ticket->priority }}</span>
                        <span style="font-size: 12px; color: #6b7280;">{{ $ticket->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <span style="font-size: 12px; padding: 3px 10px; border-radius: 8px;
                    {{ $ticket->status === 'open' ? 'background: #E6F1FB; color: #185FA5;' : '' }}
                    {{ $ticket->status === 'in_progress' ? 'background: #FAEEDA; color: #BA7517;' : '' }}
                    {{ $ticket->status === 'closed' ? 'background: #f3f4f6; color: #6b7280;' : '' }}">
                    {{ $ticket->status }}
                </span>
            </div>
            @empty
            <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 2rem; text-align: center; color: #6b7280;">
                No tickets yet. Create your first one!
            </div>
            @endforelse

        </div>
    </div>
</x-app-layout>