<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Notification;


class TasksTable extends Component
{
    use WithPagination;

    public $taskId, $title, $description, $completed_at, $user_id;
    public $isOpen = false;
    public $isDeleteOpen = false;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed_at' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function render()
    {
        if(auth()->user()->hasRole(['admin'])){
            $tasks = Task::select('id', 'user_id', 'title', 'description', 'completed_at', 'created_at')
            ->with('user:id,name')
            ->orderByRaw('completed_at IS NOT NULL ASC') // Not completed first (NULL first)
            ->orderBy('completed_at', 'DESC') // Among completed, newest first
            ->orderBy('created_at', 'DESC') // Among not completed, newest first
            ->paginate(10);
        }else{
            $tasks = Task::select('id', 'user_id', 'title', 'description', 'completed_at', 'created_at')
            ->whereRelation('user', 'id', '=', auth()->user()->id)
            ->with('user:id,name')
            ->orderByRaw('completed_at IS NOT NULL ASC') // Not completed first (NULL first)
            ->orderBy('completed_at', 'DESC') // Among completed, newest first
            ->orderBy('created_at', 'DESC') // Among not completed, newest first
            ->paginate(10);
        }


        $users = User::select('id', 'name')->where('id', '!=', auth()->user()->id)->get();

        return view('livewire.tasks-table', [   
            'tasks' => $tasks,
            'users' => $users,
            'title' => $this->title,
            'description' => $this->description,
            'completed_at' => $this->completed_at,
            'user_id' => $this->user_id,
            'taskId' => $this->taskId,
        ]);
    }

    public function init()
    {
        $this->dispatch('init-modals');
    }

    public function create()
    {
        $this->resetInputFields();
        if(auth()->user()->hasRole('user'))
        {
            $this->user_id = auth()->user()->id;
        }

        $this->isOpen = true;
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->taskId = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->user_id = $task->user_id;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ];

        $task = Task::updateOrCreate(['id' => $this->taskId], $data);

        Notification::create([
            'user_id' => $this->user_id,
            'task_id' => $task->id,
            'is_read' => 0,
        ]);

        $this->taskId ? $this->dispatch('update-task') : $this->dispatch('create-task', ['userId' => $this->user_id, 'taskTitle' => $this->title]);

        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteConfirm($id)
    {
        $this->taskId = $id;
        $this->isDeleteOpen = true;
    }
    
    public function delete()
    {
        Task::find($this->taskId)->delete();
        $this->dispatch('delete-task');
        $this->isDeleteOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->completed_at = '';
        $this->user_id = '';
        $this->taskId = '';
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isDeleteOpen = false;
    }

    public function completeTask($taskId)
    {
        Task::updateOrCreate(['id' => $taskId], ['completed_at' => now()]);
        $this->dispatch('complete-task');
    }

}