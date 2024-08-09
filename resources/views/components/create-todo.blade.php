<div class="flex flex-col gap-1 w-full ">
    <h1 class="text-4xl text-white">Create New To-do</h1>
    <h2 class="text-4xl text-white font-bold">To-do:</h2>
    <form wire:submit="createNewTodo" class="mt-14 border flex items-center px-4 py-2 gap-4 bg-white rounded-2xl">
        <div class="flex gap-2">
            <div class="w-4 h-4 bg-[#FAC608] rounded-full"></div>
            <div class="w-4 h-4 bg-[#40D4F4] rounded-full"></div>
            <div class="w-4 h-4 bg-[#FD99AF] rounded-full"></div>
        </div>
        <input wire:model="task" class="w-full py-2 px-4 text-lg" type="text" name="task" id=""
            placeholder="Create new To-do">
        <button type="submit"
            class="bg-[#A18AFF] text-white font-bold py-2 px-5 rounded-lg flex items-center justify-center gap-2">Create
            <img class="" src="{{ Vite::asset('resources/icons/plus.svg') }}" alt=""></button>
    </form>
    @error('task')
        <p class="text-red-500 italic">{{ $message }}</p>
    @enderror
    <p class="">Saved</p>
    <div class="mt-6 border flex items-center px-4 py-2 gap-2 max-w-fit bg-white rounded-2xl">
        <img src="{{ Vite::asset('resources/icons/search.svg') }}" alt="">
        <input type="text" placeholder="Search" class="px-2 py-1" name="" id="">
    </div>
</div>
