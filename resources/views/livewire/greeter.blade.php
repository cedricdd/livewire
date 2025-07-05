<div>
    Hello, {{ $name }}!

    <form action="" wire:submit="changeName(document.getElementById('name').value)">
        <div class="mt-2">
            <input type="text" name="name" id="name" class="rounded-md px-4 py-2 border w-full mb-4 bg-white/5" />
        </div>
        <div class="mt-2">
            <button type="submit" class="font-medium rounded-md px-4 py-2 bg-blue-600">
                Greet
            </button>
        </div>
    </form>  
</div>
