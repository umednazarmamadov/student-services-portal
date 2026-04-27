<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ticket Details</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div style="margin-bottom: 1.25rem;">
                <a href="/tickets" style="font-size: 13px; color: #185FA5; text-decoration: none;">← Back to tickets</a>
            </div>

            <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1.5rem;">

                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.25rem;">
                    <h2 style="font-size: 18px; font-weight: 500; margin: 0; color: #111827;">{{ $ticket->title }}</h2>
                    <span style="font-size: 12px; padding: 4px 12px; border-radius: 8px; white-space: nowrap; margin-left: 12px;
                        {{ $ticket->status === 'open' ? 'background: #E6F1FB; color: #185FA5;' : '' }}
                        {{ $ticket->status === 'in_progress' ? 'background: #FAEEDA; color: #BA7517;' : '' }}
                        {{ $ticket->status === 'closed' ? 'background: #f3f4f6; color: #6b7280;' : '' }}">
                        {{ $ticket->status }}
                    </span>
                </div>

                <p style="font-size: 14px; color: #6b7280; margin: 0 0 1.5rem; line-height: 1.6;">{{ $ticket->description }}</p>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 1.5rem;">
                    <div style="background: #f9fafb; border-radius: 8px; padding: 12px;">
                        <p style="font-size: 12px; color: #6b7280; margin: 0 0 4px;">Priority</p>
                        <p style="font-size: 14px; font-weight: 500; margin: 0; color: #111827;">{{ $ticket->priority }}</p>
                    </div>
                    <div style="background: #f9fafb; border-radius: 8px; padding: 12px;">
                        <p style="font-size: 12px; color: #6b7280; margin: 0 0 4px;">Created</p>
                        <p style="font-size: 14px; font-weight: 500; margin: 0; color: #111827;">{{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <div style="border-top: 0.5px solid #e5e7eb; padding-top: 1.25rem;">
                    <p style="font-size: 13px; font-weight: 500; color: #111827; margin: 0 0 12px;">Change status</p>
                    <div style="display: flex; gap: 8px;">
                        <form method="POST" action="/tickets/{{ $ticket->id }}/status">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="open">
                            <button type="submit" style="padding: 7px 16px; border-radius: 8px; font-size: 13px; cursor: pointer; border: 0.5px solid #e5e7eb;
                                {{ $ticket->status === 'open' ? 'background: #185FA5; color: white; border-color: #185FA5;' : 'background: #f9fafb; color: #111827;' }}">Open</button>
                        </form>
                        <form method="POST" action="/tickets/{{ $ticket->id }}/status">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="in_progress">
                            <button type="submit" style="padding: 7px 16px; border-radius: 8px; font-size: 13px; cursor: pointer; border: 0.5px solid #e5e7eb;
                                {{ $ticket->status === 'in_progress' ? 'background: #BA7517; color: white; border-color: #BA7517;' : 'background: #f9fafb; color: #111827;' }}">In Progress</button>
                        </form>
                        <form method="POST" action="/tickets/{{ $ticket->id }}/status">
                            @csrf @method('PATCH')
                            <input type="hidden" name="status" value="closed">
                            <button type="submit" style="padding: 7px 16px; border-radius: 8px; font-size: 13px; cursor: pointer; border: 0.5px solid #e5e7eb;
                                {{ $ticket->status === 'closed' ? 'background: #6b7280; color: white; border-color: #6b7280;' : 'background: #f9fafb; color: #111827;' }}">Closed</button>
                        </form>
                    </div>
                </div>

                <!-- AI Suggestion -->
                <div style="border-top: 0.5px solid #e5e7eb; padding-top: 1.25rem; margin-top: 1.25rem;">
                    <p style="font-size: 13px; font-weight: 500; color: #111827; margin: 0 0 12px;">AI Suggestion</p>
                    <button onclick="getAISuggestion({{ $ticket->id }})"
                        style="padding: 7px 16px; background: #185FA5; color: white; border: none; border-radius: 8px; font-size: 13px; cursor: pointer;">
                        ✨ Get AI Suggestion
                    </button>
                    <div id="ai-result" style="margin-top: 12px; display: none; background: #f0f7ff; border-radius: 8px; padding: 12px; font-size: 14px; color: #111827;"></div>
                </div>

            </div>

            <div style="margin-top: 1.25rem;">
                <a href="/tickets" style="font-size: 13px; color: #185FA5; text-decoration: none;">← Back to tickets</a>
            </div>

        </div>
    </div>

    <script>
    function getAISuggestion(ticketId) {
        document.getElementById('ai-result').style.display = 'block';
        document.getElementById('ai-result').innerHTML = '⏳ Generating suggestion...';

        fetch('/tickets/' + ticketId + '/suggest')
            .then(response => response.json())
            .then(data => {
                document.getElementById('ai-result').innerHTML = '🤖 ' + data.suggestion;
            })
            .catch(error => {
                document.getElementById('ai-result').innerHTML = 'Error getting suggestion.';
            });
    }
    </script>
</x-app-layout>