<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TaskCreate extends Component
{
    public $task_name, $technology_id;
    public $teams = [];

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
            ],
            'teams'         => [
                'required'
            ]
        ];
    }

    public function save()
    {

        $this->validate();
        DB::transaction(function () {
            $task = Task::create([
                'task_name'     => $this->task_name,
                'technology_id' => $this->technology_id
            ]);
            $task->teams()->attach($this->teams);
        });
        return redirect()->route('super-admin.projects.tasks.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.tasks.task-create');
    }
}
