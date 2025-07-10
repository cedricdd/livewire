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
                    <a href="{{ route('home') }}" wire:navigate
                        class="inline-block px-5 py-1.5 border border-[#3E3E3A] hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Home
                    </a>
                    @livewire('search')
                </div>
                <div class="my-1">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="inline-block px-5 py-1.5 border border-[#3E3E3A] hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 border border-transparent hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border border-[#3E3E3A] hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
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
