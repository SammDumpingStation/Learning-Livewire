<div class="flex flex-col gap-5">
    <div class="flex gap-2">
        <div>
            <input wire:model="name" type="text" class="w-72 border border-black p-1" placeholder="Name">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input wire:model="email" type="email" class="w-72 border border-black p-1" placeholder="Email">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input wire:model="password" type="password" class="w-72 border border-black p-1" placeholder="Password">
            @error('password')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button wire:click="createNewUser"
                class="p-1 border-2 text-white border-green-700 rounded-md  ml-2 bg-green-500 ">Create Account</button>
        </div>

    </div>
    <div>
        <h1 class="font-bold text-2xl">Users</h1>
        @foreach ($users as $user)
            <div class="flex w-96 border justify-between p-2 items-center">
                <h1 class="">{{ $loop->iteration }}. {{ $user->name }}</h1>
                <button class="bg-red-500 p-2 text-white rounded-lg">Delete</button>
            </div>
        @endforeach
    </div>
    <div class="w-full">
        {{ $users->links() }}
    </div>
</div>
