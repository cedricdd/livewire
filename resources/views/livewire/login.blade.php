<div>
    <h1 class="text-4xl text-center">Login</h1>

    <form action="" class="mt-6 max-w-[800px] mx-auto border border-gray-600 p-6 rounded-md" wire:submit="authenticate">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="text" id="title" wire:model="email"
                    class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="text" id="title" wire:model="password"
                    class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <x-buttons.blue>Login</x-buttons.blue>
    </form>
</div>
