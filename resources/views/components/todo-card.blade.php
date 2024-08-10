@props(['todo', 'editId'])

<label wire:key="{{ $todo->id }}" for="check{{ $todo->id }}"
    class="cursor-pointer group  border-4 border-transparent  hover:border-[#1C83F0]  w-full bg-white rounded-2xl px-8 py-2 gap-2 flex flex-col transition-all duration-300"
    :class="{ 'border-[#1C83F0]': '{{ $todo->completed }}' }">
    <div class="flex justify-between items-center gap-6 relative">

        <div class="h-6 w-6">
            @if ($editId != $todo->id)
                <input wire:click="toggle({{ $todo->id }})" class="cursor-pointer h-full w-full"
                    id="check{{ $todo->id }}" type="checkbox" @checked($todo->completed)>
            @endif
        </div>

        <div class="w-full flex-col flex">
            @if ($editId === $todo->id)
                <input wire:model="editName" class="text-2xl bg-gray-200 p-2 rounded-lg w-[90%]" type="text"
                    id="" placeholder="Update your Todo...">
                @error('editName')
                    <p class="text-red-500 rounded-md w-fit pr-4 flex items-center gap-2"><img class="h-6 w-6"
                            src="{{ Vite::asset('resources/icons/x.svg') }}" alt="">{{ $message }}</p>
                @enderror
            @else
                <p class="text-2xl group-hover:font-bold transition-all duration-300 p-2"
                    :class="{ 'text-gray-500 line-through': '{{ $todo->completed }}' }">{{ $todo->name }}</p>
            @endif
        </div>
        <div class="flex gap-4 items-center absolute right-0 top-3">

            @if ($editId === $todo->id)
                <button class="w-6 h-6" wire:key="edit-save-{{ $todo->id }}"
                    wire:click="updateTodo({{ $todo->id }})"><img class="w-full h-full"
                        src="{{ Vite::asset('resources/icons/check.svg') }}" alt=""></button>

                <button class="w-6 h-6" wire:key="edit-reset-{{ $todo->id }}" wire:click="resetUpdate"><img
                        class="w-full h-full" src="{{ Vite::asset('resources/icons/x.svg') }}" alt=""></button>
            @else
                <button class="w-6 h-6" wire:click="edit({{ $todo->id }})"><img class=""
                        src="{{ Vite::asset('resources/icons/edit.svg') }}" alt=""></button>

                <button class="w-6 h-6" wire:click="delete({{ $todo->id }})"
                    wire:confirm="Are you sure you want to delete this?"><img class=""
                        src="{{ Vite::asset('resources/icons/delete.svg') }}" alt=""></button>
            @endif

        </div>
    </div>
    @php
        $time = strtotime($todo->created_at);
    @endphp
    <p class="pl-12 text-gray-400">{{ date('l, F d, Y - h:i A', $time) }}</p>
</label>
