<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Tasks;

use App\Models\Task;
use App\Models\TaskTeam;
use App\Models\Team;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TaskEdit extends Component
{
    public Task $tasks;
    public $teams = [];

    public function mount(Task $tasks)
    {
        $this->tasks = $tasks;
        $this->teams = $this->tasks->teams ?? [];
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
            'teams.*.id'          => [
                'required|array|min:1'
            ]
        ];
    }

    public function save()
    {
        $this->tasks->update($this->validate());
        $this->tasks->teams()->sync($this->teams, true);
        return redirect()->route('super-admin.projects.tasks.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.tasks.task-edit');
    }
}
