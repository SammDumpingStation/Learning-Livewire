<main class="min-h-[100vh] flex">
    <section class="w-[400px] bg-white">
        
    </section>
    <section class="w-full px-[100px] py-[50px]">
        <div class="flex flex-col gap-1">
            <h1 class="text-4xl text-white">Create New To-do</h1>
            <h2 class="text-4xl text-white font-bold">To-do:</h2>
            <div class="mt-14 border flex items-center px-4 py-2 gap-4 bg-white rounded-2xl">
                <div class="flex gap-2">
                    <div class="w-4 h-4 bg-[#FAC608] rounded-full"></div>
                    <div class="w-4 h-4 bg-[#40D4F4] rounded-full"></div>
                    <div class="w-4 h-4 bg-[#FD99AF] rounded-full"></div>
                </div>
                <input class="w-full py-2 px-4 text-lg" type="text" name="" id=""
                    placeholder="Create new To-do">
                <button
                    class="bg-[#A18AFF] text-white font-bold py-2 px-5 rounded-lg flex items-center justify-center gap-2">Create
                    <img class="" src="{{ Vite::asset('resources/icons/plus.svg') }}" alt=""></button>
            </div>
            <div class="mt-6 border flex items-center px-4 py-2 gap-2 max-w-fit bg-white rounded-2xl">
                <img src="{{ Vite::asset('resources/icons/search.svg') }}" alt="">
                <input type="text" placeholder="Search" class="px-2 py-1" name="" id="">
            </div>
        </div>
        <div class="py-12">
            <div class="bg-white rounded-2xl px-8 py-2 gap-2 flex flex-col">
                <div class="flex justify-between items-center gap-6">
                    <input type="checkbox" class="cursor-pointer h-6 w-6" name="" id="">
                    <div class="w-full">
                        <p class="text-2xl">Do dishes</p>
                    </div>
                    <div class="flex gap-4">
                        <img class="" src="{{ Vite::asset('resources/icons/edit.svg') }}" alt="">
                        <img class="" src="{{ Vite::asset('resources/icons/delete.svg') }}" alt="">
                    </div>
                </div>
                 <p class="pl-12 text-gray-400">2023, 12 203234</p>
            </div>
        </div>
    </section>
</main>
