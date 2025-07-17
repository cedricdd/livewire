<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/js/app.js'])

    @livewireStyles

    @yield('styles')
</head>

<body class="bg-dark text-white p-6 w-full min-h-screen" x-data x-on:click="$dispatch('search:clear')">
    <header class="w-full text-sm mb-6 not-has-[nav]:hidden">
        <nav class="flex justify-between flex-wrap">
            <div class="my-1">
                <x-nav-button route="home">Home</x-nav-button>
                @livewire('search')
            </div>
            <div class="my-1">
                <x-nav-button route="dashboard">Dashboard</x-nav-button>
            </div>
        </nav>
        <div class="text-center mt-2 text-3xl bg-red-500 py-3 rounded-md" wire:offline>
            You are offline!
        </div>
    </header>
    <main class="w-full transition-opacity opacity-100 duration-750 starting:opacity-0 mt-12">
        {{ $slot }}
    </main>

    @livewireScripts

    @yield('scripts')

    <script>
        document.addEventListener('search:clear', function(event) {
            console.log('Search cleared');
        });
    </script>
</body>

</html>
