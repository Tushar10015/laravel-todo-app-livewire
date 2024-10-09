<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Todo List</h1>

    <!-- Add / Edit Todo -->
    <form wire:submit.prevent="{{ $editId ? 'update' : 'store' }}" class="mb-4">
        <input type="text" wire:model="title" class="w-full p-2 border rounded" placeholder="Enter todo title">
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        <div class="flex justify-between items-center mt-2">
            <label class="flex items-center">
                <input type="checkbox" wire:model="completed" class="mr-2"> Completed
            </label>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                {{ $editId ? 'Update Todo' : 'Add Todo' }}
            </button>
        </div>
    </form>

    <!-- Todo List -->
    <ul>
        @foreach($todos as $todo)
        <li class="flex justify-between items-center p-2 border-b">
            <div>
                <input type="checkbox" wire:click="edit({{ $todo->id }})" {{ $todo->completed ? 'checked' : '' }}>
                <span class="{{ $todo->completed ? 'line-through' : '' }}">{{ $todo->title }}</span>
            </div>
            <div>
                <button wire:click="edit({{ $todo->id }})" class="text-blue-500">Edit</button>
                <button wire:click="delete({{ $todo->id }})" class="text-red-500 ml-2">Delete</button>
            </div>
        </li>
        @endforeach
    </ul>
</div>