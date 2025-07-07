<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>

    @vite(['resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-dark text-white flex p-6 lg:p-8 min-h-screen justify-center">
    {{ $slot }}

    @livewireScripts
</body>
</html>
