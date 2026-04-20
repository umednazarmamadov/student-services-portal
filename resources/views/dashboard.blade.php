<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Статистика -->
            <div class="grid grid-cols-4 gap-4 mb-8">
                <div class="bg-white shadow-sm rounded-lg p-6 text-center">
                    <p class="text-4xl font-bold text-gray-800">{{ $total }}</p>
                    <p class="text-gray-500 mt-1">Total Tickets</p>
                </div>
                <div class="bg-white shadow-sm rounded-lg p-6 text-center">
                    <p class="text-4xl font-bold text-green-600">{{ $open }}</p>
                    <p class="text-gray-500 mt-1">Open</p>
                </div>
                <div class="bg-white shadow-sm rounded-lg p-6 text-center">
                    <p class="text-4xl font-bold text-yellow-600">{{ $in_progress }}</p>
                    <p class="text-gray-500 mt-1">In Progress</p>
                </div>
                <div class="bg-white shadow-sm rounded-lg p-6 text-center">
                    <p class="text-4xl font-bold text-gray-400">{{ $closed }}</p>
                    <p class="text-gray-500 mt-1">Closed</p>
                </div>
            </div>

            <!-- Быстрые действия -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="flex gap-4">
                    <a href="/tickets" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        View All Tickets
                    </a>
                    <a href="/tickets/create" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                        + New Ticket
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>