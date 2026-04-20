<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
                <p style="font-size: 13px; color: #6b7280; margin: 4px 0 0;">Welcome back, {{ auth()->user()->name }}</p>
            </div>
            <a href="/tickets/create" style="padding: 8px 16px; background: #185FA5; color: white; border-radius: 8px; font-size: 13px; font-weight: 500; text-decoration: none;">+ New Ticket</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 12px; margin-bottom: 1.5rem;">
                <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1rem 1.25rem;">
                    <p style="font-size: 12px; color: #6b7280; margin: 0 0 8px;">Total tickets</p>
                    <p style="font-size: 28px; font-weight: 500; margin: 0; color: #111827;">{{ $total }}</p>
                </div>
                <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1rem 1.25rem;">
                    <p style="font-size: 12px; color: #6b7280; margin: 0 0 8px;">Open</p>
                    <p style="font-size: 28px; font-weight: 500; margin: 0; color: #185FA5;">{{ $open }}</p>
                </div>
                <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1rem 1.25rem;">
                    <p style="font-size: 12px; color: #6b7280; margin: 0 0 8px;">In progress</p>
                    <p style="font-size: 28px; font-weight: 500; margin: 0; color: #BA7517;">{{ $in_progress }}</p>
                </div>
                <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1rem 1.25rem;">
                    <p style="font-size: 12px; color: #6b7280; margin: 0 0 8px;">Closed</p>
                    <p style="font-size: 28px; font-weight: 500; margin: 0; color: #6b7280;">{{ $closed }}</p>
                </div>
            </div>

            <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1.25rem;">
                <h3 style="font-size: 15px; font-weight: 500; margin: 0 0 1rem; color: #111827;">Recent tickets</h3>

                @forelse($recent_tickets as $ticket)
                <div style="border-bottom: 0.5px solid #e5e7eb; padding-bottom: 12px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <a href="/tickets/{{ $ticket->id }}" style="font-size: 14px; font-weight: 500; color: #111827; text-decoration: none;">{{ $ticket->title }}</a>
                        <p style="font-size: 12px; color: #6b7280; margin: 3px 0 0;">{{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
                    <span style="font-size: 12px; padding: 3px 10px; border-radius: 8px;
                        {{ $ticket->status === 'open' ? 'background: #E6F1FB; color: #185FA5;' : '' }}
                        {{ $ticket->status === 'in_progress' ? 'background: #FAEEDA; color: #BA7517;' : '' }}
                        {{ $ticket->status === 'closed' ? 'background: #f3f4f6; color: #6b7280;' : '' }}">
                        {{ $ticket->status }}
                    </span>
                </div>
                @empty
                <p style="font-size: 14px; color: #6b7280; text-align: center; padding: 1rem 0;">No tickets yet.</p>
                @endforelse

                <a href="/tickets" style="font-size: 13px; color: #185FA5; text-decoration: none;">View all tickets →</a>
            </div>

        </div>
    </div>
</x-app-layout>