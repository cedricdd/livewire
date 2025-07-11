<div class="m-auto max-w-[900px] px-4 mb-6">
    <form action="" wire:submit="{{ $action }}">
        <div class="mb-4">
            <label for="title" class="block font-bold text-gray-300" @if($action == "update") wire:dirty.class="italic" wire:target="form.title" @endif>
                Title
            </label>
            <input type="text" id="title" wire:model="form.title"
                class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500">
            @error('form.title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block font-bold text-gray-300" @if($action == "update") wire:dirty.class="italic" wire:target="form.content" @endif>
                Content
            </label>
            <textarea id="content" wire:model="form.content"
                class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500"
                rows="10"></textarea>
            @error('form.content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <div class="flex items-center gap-x-2">
                <input type="checkbox" id="published" wire:model.boolean="form.published">
                <label for="published" @if($action == "update") wire:dirty.class="italic" wire:target="form.published" @endif>
                    Published
                </label>
            </div>
            @error('form.published')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <div class="flex items-center gap-x-2">
                <p class="font-bold" @if($action == "update") wire:dirty.class="italic" wire:target="form.notifications" @endif>
                    Allow Notifications
                </p>
                <div>
                    <input type="radio" id="yes_notifications" value="true" wire:model.boolean="form.allowNotifications">
                    <label for="yes_notifications">Yes</label>
                </div>
                <div>
                    <input type="radio" id="no_notifications" value="false" wire:model.boolean="form.allowNotifications">
                    <label for="no_notifications">No</label>
                </div>
            </div>
            @error('form.allowNotifications')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4" x-show="$wire.form.allowNotifications">
            <div>
                <div>
                    <input type="checkbox" id="notification_email" value="email" wire:model="form.notifications">
                    <label for="notification_email" class="ml-1.5">Email</label>
                </div>
                <div>
                    <input type="checkbox" id="notification_sms" value="sms" wire:model="form.notifications">
                    <label for="notification_sms" class="ml-1.5">SMS</label>
                </div>
                <div>
                    <input type="checkbox" id="notification_push" value="push" wire:model="form.notifications">
                    <label for="notification_push" class="ml-1.5">Push</label>
                </div>
            </div>
            @error('form.notifications')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <x-buttons.blue type="submit" disabled wire:dirty.attr.remove="disabled">
            {{ ucwords($action) }} Article
        </x-buttons.blue>
        <x-link-button.white href="{{ route('dashboard') }}">
            Cancel
        </x-link-button.white>
    </form>
</div>
