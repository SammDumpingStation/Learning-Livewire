<main class="min-h-[100vh] flex">
    <section class="w-[400px] bg-white hidden">

    </section>
    <section class="w-full px-[100px] py-[50px] max-w-[1200px] mx-auto ">
        <x-create-todo />
        <div class="py-12  w-full gap-8 flex flex-col min-h-[650px]">
            @foreach ($todos as $todo)
                <label for="check[{{ $todo->id }}]"
                    class="cursor-pointer group  border-4 border-transparent  hover:border-[#1C83F0]  w-full bg-white rounded-2xl px-8 py-2 gap-2 flex flex-col transition-all duration-300">
                    <div class="flex justify-between items-center gap-6">
                        <input type="checkbox" class="cursor-pointer h-6 w-6" name=""
                            id="check[{{ $todo->id }}]">
                        <div class="w-full">
                            <p class="text-2xl group-hover:font-bold transition-all duration-300">{{ $todo->name }}
                            </p>
                        </div>
                        <div class="flex gap-4">
                            <img class="" src="{{ Vite::asset('resources/icons/edit.svg') }}" alt="">
                            <img class="" src="{{ Vite::asset('resources/icons/delete.svg') }}" alt="">
                        </div>
                    </div>
                    <p class="pl-12 text-gray-400">{{ $todo->created_at }}</p>
                </label>
            @endforeach
        </div>
        <div class="">
            {{ $todos->links(data: ['scrollTo' => '#bottom-marker']) }}
        </div>

        <div id="bottom-marker"></div>
    </section>
</main>
