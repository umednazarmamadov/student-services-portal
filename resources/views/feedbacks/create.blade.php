<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leave Feedback</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div style="background: white; border: 0.5px solid #e5e7eb; border-radius: 12px; padding: 1.5rem;">

                <form method="POST" action="/feedbacks">
                    @csrf

                    <div style="margin-bottom: 1rem;">
                        <label style="font-size: 13px; color: #6b7280; display: block; margin-bottom: 6px;">Rating</label>
                        <select name="rating" style="width: 100%; padding: 10px 12px; border: 0.5px solid #e5e7eb; border-radius: 8px; font-size: 14px;">
                            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                            <option value="4">⭐⭐⭐⭐ Good</option>
                            <option value="3">⭐⭐⭐ Average</option>
                            <option value="2">⭐⭐ Poor</option>
                            <option value="1">⭐ Very Poor</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="font-size: 13px; color: #6b7280; display: block; margin-bottom: 6px;">Comment</label>
                        <textarea name="comment" rows="4" required
                            style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 0.5px solid #e5e7eb; border-radius: 8px; font-size: 14px;"></textarea>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <a href="/feedbacks" style="font-size: 13px; color: #185FA5; text-decoration: none; padding-top: 8px;">Cancel</a>
                        <button type="submit" style="padding: 8px 20px; background: #185FA5; color: white; border: none; border-radius: 8px; font-size: 14px; cursor: pointer;">
                            Submit Feedback
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>