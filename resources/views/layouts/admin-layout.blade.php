<x-app-layout>

<div class="min-h-screen bg-gray-100 flex">

    {{-- Sidebar --}}
    @include('layouts.admin-sidebar')

    {{-- Content --}}
    <main class="flex-1 ml-64 p-6">

        {{ $slot }}

    </main>

</div>

</x-app-layout>