<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-100 border border-l-2 border-b-2">
                    <h2>{{ __('Notifications') }}</h2>
                </div>

                @foreach ($notifications as $notification)
                    <div class="px-6 py-4 border-b">
                        @include('notifications/types/' . str()->snake($notification->type), compact('notification'))
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
