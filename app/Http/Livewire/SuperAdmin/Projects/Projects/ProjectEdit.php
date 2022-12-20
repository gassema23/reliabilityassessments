<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Projects;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProjectEdit extends Component
{
    public Project $projects;

    public function mount(Project $projects)
    {
        $this->projects = $projects;
    }

    protected function rules()
    {
        return [
            'projects.planner_id'          => [
                'required',
            ],
            'projects.prime_id'            => [
                'required',
            ],
            'projects.project_no'          => [
                'required',
                Rule::unique('projects')->ignore($this->projects->id),
            ],
            'projects.project_name'        => [
                'required',
                'max:125'
            ],
            'projects.project_description' => [
                'nullable',
            ],
            'projects.project_due_date'    => [
                'required',
                'date'
            ],
        ];
    }

    public function save()
    {
        $this->projects->update($this->validate());
        return redirect()->route('super-admin.projects.projects.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.projects.project-edit');
    }
}
