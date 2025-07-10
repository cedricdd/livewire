<div class="m-auto max-w-[900px] px-4 mb-6">
    <form action="" wire:submit="{{ $action }}">
        <div class="mb-4">
            <label for="title" class="block font-bold text-gray-300">Title</label>
            <input type="text" id="title" wire:model="form.title"
                class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500">
            @error('form.title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block font-bold text-gray-300">Content</label>
            <textarea id="content" wire:model="form.content"
                class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500"
                rows="10"></textarea>
            @error('form.content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4 flex items-center gap-x-2">
            <input type="checkbox" id="published" wire:model.boolean="form.published">
            <label for="published">Published</label>
        </div>

        <div class="mb-4 flex items-center gap-x-2">
            <p class="font-bold">Notification:</p>
            <div>
                <input type="radio" id="notification_email" value="email" wire:model="form.notification">
                <label for="notification_email">Email</label>
            </div>
            <div>
                <input type="radio" id="notification_sms" value="sms" wire:model="form.notification">
                <label for="notification_sms">SMS</label>
            </div>
            <div>
                <input type="radio" id="notification_none" value="none" wire:model="form.notification">
                <label for="notification_none">None</label>
            </div>
        </div>

        <button type="submit"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-md cursor-pointer">{{ ucwords($action) }}
            Article</button>
    </form>
</div>
