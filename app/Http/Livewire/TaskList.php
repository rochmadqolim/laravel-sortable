<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskList extends Component
{
    public $body;
    public $tasks;
    public $countTask;
    protected $debug = true;

    public function render()
    {
        $this->tasks = Task::orderBy('position', 'asc')->get();
        $this->countTask = Task::count();
        return view('livewire.task-list');
    }

    public function submit(){
        
        $this->validate([
            'body' => 'required',
        ]);

        Task::create([
            'position' => $this->countTask + 1,
            'body' => $this->body,
        ]);

        $this->body = Null;
    }

    public function delete($id){
        $task = Task::find($id); // Menggunakan metode find untuk mencari tugas berdasarkan ID.
            $task->delete(); // Menghapus tugas jika ditemukan.
    }
    

    public function updateTaskOrder($tasks){

        foreach ($tasks as $task) {
            Task::where('id', $task['value'])->update(['position' => $task['order']]);
        }
    }
}