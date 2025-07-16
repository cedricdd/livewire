<div>
    <h1 class="text-2xl font-bold text-gray-200 mb-4 text-center">
        {{ $form->article ? 'Edit Article ID: ' . $form->article->id : 'Create An Article' }}
    </h1>

    <div class="m-auto max-w-[900px] px-4 mb-6">
        <form action="" wire:submit="{{ $action }}" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="title" class="block font-bold text-gray-300"
                    @if ($action == 'update') wire:dirty.class="italic" wire:target="form.title" @endif>
                    Title
                </label>
                <input type="text" id="title" wire:model="form.title"
                    class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500">
                @error('form.title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block font-bold text-gray-300"
                    @if ($action == 'update') wire:dirty.class="italic" wire:target="form.content" @endif>
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
                <label for="content" class="block font-bold text-gray-300">
                    Photo Cover
                </label>
                <div>
                    <input type="file" id="photo" wire:model="form.photo"
                        class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-white focus:outline-none focus:ring focus:ring-blue-500">
                    <div wire:loading.delay.500ms wire:target="form.photo">Uploading...</div>
                    @if ($form->photo)
                        <div class="my-2">
                            <img class="max-w-[400px] max-h-[400px]" src="{{ $form->photo->temporaryUrl() }}"
                                alt="Preview" />
                        </div>
                    @elseif ($form->article?->photo_path)
                        <div class="my-2">
                            <img class="max-w-[400px] max-h-[400px]" src="{{ $form->article->photo }}" alt="Preview" />
                        </div>
                    @endif
                </div>
                @error('form.photo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center gap-x-2">
                    <input type="checkbox" id="published" wire:model.boolean="form.published">
                    <label for="published"
                        @if ($action == 'update') wire:dirty.class="italic" wire:target="form.published" @endif>
                        Published
                    </label>
                </div>
                @error('form.published')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center gap-x-2">
                    <p class="font-bold"
                        @if ($action == 'update') wire:dirty.class="italic" wire:target="form.notifications" @endif>
                        Allow Notifications
                    </p>
                    <div>
                        <input type="radio" id="yes_notifications" value="true"
                            wire:model.boolean="form.allowNotifications">
                        <label for="yes_notifications">Yes</label>
                    </div>
                    <div>
                        <input type="radio" id="no_notifications" value="false"
                            wire:model.boolean="form.allowNotifications">
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

            <x-buttons.blue type="submit">
                {{ ucwords($action) }} Article
            </x-buttons.blue>
            <x-link-button.white href="{{ route('dashboard') }}">
                Cancel
            </x-link-button.white>
        </form>
    </div>
</div>
