<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Tasks;

use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TaskEdit extends Component
{
    public Task $tasks;

    public function mount(Task $tasks)
    {
        $this->tasks = $tasks;
    }

    protected function rules()
    {
        return [
            'tasks.task_name'     => [
                'required',
                'max:125',
                Rule::unique('tasks')->ignore($this->tasks->id)
            ],
            'tasks.technology_id' => [
                'required',
            ],
        ];
    }

    public function save()
    {
        $this->tasks->update($this->validate());
        return redirect()->route('super-admin.projects.tasks.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.tasks.task-edit');
    }
}
