<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Projects;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $project;

    /**
     * @param $project
     *
     * @return void
     */
    public function mount($project)
    {
        $this->project = Project::findOrFail($project);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        if (!is_null($this->project->project_complete)) {
            return redirect()->route('super-admin.projects.projects.index')->with('error',
                __('generals.notifications.error'));
        } else {
            $this->project->delete();
            return redirect()->route('super-admin.projects.projects.index')->with('success',
                __('generals.notifications.success', ['type' => __('generals.titles.desactivated')]));
        }
    }

    public function close()
    {
        $this->forceClose()->closeModal();
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.super-admin.delete', [
            'title'   => __('generals.texts.title-desactivate', ['name' => __('generals.titles.project')]),
            'message' => __('generals.texts.descriptions-desactivate', ['name' => __('generals.titles.project')])
        ]);
    }
}
