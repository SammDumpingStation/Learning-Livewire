<main class="min-h-[100vh] flex">
    <nav class="absolute top-0 right-0 w-full h-16 flex items-center gap-4 px-4"
        :class="{ 'left-[350px]': '{{ !$hidden }}' }">
        <button wire:click="hideSidebar" class="flex" :class="{ 'hidden': '{{ !$hidden }}' }">
            <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/sidebar-white.svg') }}" alt="">
        </button>
        <button @click="$refs.todoField.focus()" class="flex" :class="{ 'hidden': '{{ !$hidden }}' }">
            <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/write.svg') }}" alt="">
        </button>
        <h1 class="text-3xl font-bold text-white">Do-It App</h1>
    </nav>

    <section class="w-full max-w-[350px] bg-white px-4 pt-4 flex flex-col gap-8" wire:model="hidden"
        :class="{ 'hidden': '{{ $hidden }}' }">
        <div class="flex items-center gap-3">
            <button wire:click="hideSidebar">
                <img class="h-7 w-7" src="{{ Vite::asset('resources/icons/sidebar.svg') }}" alt="">
            </button>
            <button @click="$refs.todoField.focus()">
                <img class="h-6 w-6" src="{{ Vite::asset('resources/icons/write-black.svg') }}" alt="">
            </button>
        </div>


        <div class="flex items-center gap-4 pb-8 border-b-4 border-[#A18AFF]">
            <img class="h-16 w-16 self-start" src="{{ Vite::asset('resources/img/male.svg') }}" alt="">
            <div class="">
                <h1>Do-It App</h1>
                <h2 class="text-[#A18AFF] font-medium text-2xl">Samm Caagbay</h2>
            </div>
        </div>
    </section>
    <section class="w-full px-[100px] py-[100px] max-w-[1200px] mx-auto ">
        <x-create-todo />
        <div class="py-12  w-full gap-8 flex flex-col min-h-[650px]">
            @foreach ($todos as $todo)
                <x-todo-card :editId="$editId" :todo="$todo" />
            @endforeach
        </div>
        <div class="">
            {{ $todos->links(data: ['scrollTo' => '#bottom-marker']) }}
        </div>

        <div id="bottom-marker"></div>
    </section>
</main>
