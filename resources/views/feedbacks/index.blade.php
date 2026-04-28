<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Feedbacks</h2>
            <a href="/feedbacks/create" style="padding: 8px 16px; background: #185FA5; color: white; border-radius: 8px; font-size: 13px; font-weight: 500; text-decoration: none;">+ Leave Feedback</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                {{ session('success') }}
            </div>
            @endif

            @forelse($feedbacks as $feedback)
            <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1.25rem; margin-bottom: 10px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 14px; font-weight: 500; color: #111827;">{{ $feedback->user->name }}</span>
                        <span style="font-size: 12px; color: #6b7280;">{{ $feedback->created_at->diffForHumans() }}</span>
                    </div>
                    <span style="font-size: 16px;">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $feedback->rating ? '⭐' : '☆' }}
                        @endfor
                    </span>
                </div>
                <p style="font-size: 14px; color: #6b7280; margin: 0;">{{ $feedback->comment }}</p>
            </div>
            @empty
            <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 2rem; text-align: center; color: #6b7280;">
                No feedbacks yet. Be the first!
            </div>
            @endforelse

        </div>
    </div>
</x-app-layout>