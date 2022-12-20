<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Projects;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProjectCreate extends Component
{
    public $planner_id;
    public $prime_id;
    public $project_no;
    public $project_name;
    public $project_description;
    public $project_due_date;

    protected function rules()
    {
        return [
            'planner_id'          => [
                'required',
            ],
            'prime_id'            => [
                'required',
            ],
            'project_no'          => [
                'required',
                Rule::unique('projects'),
            ],
            'project_name'        => [
                'required',
                'max:125'
            ],
            'project_description' => [
                'nullable',
            ],
            'project_due_date'    => [
                'required',
                'date'
            ],
        ];
    }

    public function save()
    {
        Project::create($this->validate());
        return redirect()->route('super-admin.projects.projects.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.projects.project-create');
    }
}
