<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Tasks;

use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TaskCreate extends Component
{
    public $task_name, $technology_id;

    protected function rules()
    {
        return [
            'task_name'     => [
                'required',
                'max:125',
                Rule::unique('tasks')
            ],
            'technology_id' => [
                'required'
            ]
        ];
    }

    public function save()
    {
        Task::create($this->validate());
        return redirect()->route('super-admin.projects.tasks.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.tasks.task-create');
    }
}
