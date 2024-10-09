<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Component;

class Todo extends Component
{
    public $todos;
    public $title;
    public $editId = null;
    public $completed = false;

    public function mount()
    {
        $this->todos = ModelsTodo::all();
    }

    public function store()
    {
        $this->validate(['title' => 'required|string|max:255']);

        ModelsTodo::create(['title' => $this->title, 'completed' => false]);
        $this->resetForm();
        $this->todos = ModelsTodo::all(); // Refresh list
    }

    public function edit($id)
    {
        $todo = ModelsTodo::find($id);
        $this->editId = $todo->id;
        $this->title = $todo->title;
        $this->completed = $todo->completed;
    }

    public function update()
    {
        $this->validate(['title' => 'required|string|max:255']);

        $todo = ModelsTodo::find($this->editId);
        $todo->update(['title' => $this->title, 'completed' => $this->completed]);

        $this->resetForm();
        $this->todos = ModelsTodo::all();
    }

    public function delete($id)
    {
        ModelsTodo::destroy($id);
        $this->todos = ModelsTodo::all(); // Refresh list
    }

    public function resetForm()
    {
        $this->title = '';
        $this->editId = null;
        $this->completed = false;
    }
    public function render()
    {
        return view('livewire.todo');
    }
}
