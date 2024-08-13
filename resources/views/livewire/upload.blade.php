<div class="min-h-[100vh] flex mb-[1000px]">
    <nav class="absolute top-0 h-16 flex items-center gap-4 px-4" :class="{ 'left-[300px]': '{{ !$hidden }}' }">
        <button wire:click="hideSidebar" class="flex" :class="{ 'hidden': '{{ !$hidden }}' }">
            <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/sidebar-white.svg') }}" alt="">
        </button>
        <button @click="$refs.todoField.focus()" class="flex" :class="{ 'hidden': '{{ !$hidden }}' }">
            <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/write.svg') }}" alt="">
        </button>
        <h1 class="text-3xl font-bold text-white">Do-It App</h1>
    </nav>

    <section class="w-full max-w-[300px] bg-white px-4 pt-4 flex flex-col gap-8" wire:model="hidden"
        :class="{ 'hidden': '{{ $hidden }}' }">
        <div class="flex items-center gap-3">
            <button wire:click="hideSidebar">
                <img class="h-7 w-7" src="{{ Vite::asset('resources/icons/sidebar.svg') }}" alt="">
            </button>
            <button @click="$refs.todoField.focus()">
                <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/write-black.svg') }}" alt="">
            </button>
            <button class="ml-auto">
                <img class="h-7 w-7" src="{{ Vite::asset('resources/icons/settings.svg') }}" alt="">
            </button>
        </div>


        <div class="flex items-center gap-4 pb-8 border-b-4 border-[#A18AFF]">
            <img class="h-16 w-16 self-start" src="{{ Vite::asset('resources/img/male.svg') }}" alt="">
            <div class="">
                <h1>Do-It App</h1>
                <h2 class="text-[#A18AFF] font-medium text-2xl">Samm Caagbay</h2>
            </div>
        </div>

        <div class="space-y-4">
            <a wire:navigate href="/" class="flex items-center pl-14  gap-4">
                <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/home.svg') }}" alt="">
                <h1 class="font-medium text-xl">Dashboard</h1>
            </a>
            <a wire:navigate href="/upload" class="flex items-center pl-14  gap-4">
                <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/image-upload.svg') }}" alt="">
                <h1 class="font-medium text-xl">Upload Picture</h1>
            </a>
        </div>
    </section>
    <section class="w-full px-[100px] py-[100px] max-w-[1200px] mx-auto ">
        <form wire:submit="uploadImage" class="bg-white p-6 rounded-xl gap-6 flex flex-col">
            <h1 class="text-3xl font-bold text-gray-500">Upload Your Profile Picture</h1>
            <label for="image" class="h-[500px] border-4 border-gray-300 border-dashed rounded-lg relative flex">
                @if ($image)
                    <div class="flex flex-col justify-center items-center gap-8 w-full">
                        <img class="h-64 w-64" src="{{ $image->temporaryURL() }}" alt="">
                        <h1 class="text-2xl font-medium text-gray-400 underline">{{ $imageName }}</h1>
                    </div>
                @endif
                <div class="flex flex-col justify-center items-center gap-8 w-full"
                    :class="{ 'hidden': '{{ $image }}' }">
                    <img class="h-64 w-64" src="{{ Vite::asset('resources/img/img-upload.png') }}" alt="">
                    <h1 class="text-2xl font-medium text-gray-400">Drag an image here or click me!</h1>
                </div>

                <input wire:model="image" class="absolute z-10 border-red-500 w-full h-full border opacity-0"
                    type="file" accept="image/*" id="image">
            </label>
            @error('image')
                <p class="text-red-500 rounded-md w-fit -mt-4 flex items-center gap-2"><img class="h-6 w-6"
                        src="{{ Vite::asset('resources/icons/x.svg') }}" alt="">{{ $message }}</p>
            @enderror
            @session('success')
                <p class="text-green-500 rounded-md w-fit -mt-4 flex items-center gap-2"><img class="h-6 w-6"
                        src="{{ Vite::asset('resources/icons/check.svg') }}" alt="">{{ session('success') }}</p>
            @endsession

            <button type="submit"
                class="text-white border border-gray-400 px-4 py-2 rounded-lg justify-center items-center flex gap-2 transition-all"
                :class="{ 'bg-green-500 cursor-pointer': '{{ $image }}', 'bg-gray-400 cursor-not-allowed': '{{ !$image }}' }"
                @disabled(!$image)>
                <img src="{{ Vite::asset('resources/icons/plus.svg') }}" alt="">
                Create
            </button>
        </form>

    </section>
</div>
