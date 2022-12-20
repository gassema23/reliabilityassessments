<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use LivewireUI\Modal\ModalComponent;

class TeamDelete extends ModalComponent
{

    public $network;
    public $team_id;

    /**
     * @param $network
     *
     * @return void
     */
    public function mount($network, $team_id)
    {
        $this->network = Network::findOrFail($network);
        $this->team_id = $team_id;
    }

    protected $listeners = ['team-delete' => 'delete'];

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->network->teams()->detach($this->team_id);
        $this->forceClose()->closeModal();
        //$this->project->delete();
//            return redirect()->route('super-admin.projects.projects.index')->with('success',
//                __('generals.notifications.success', ['type' => __('generals.titles.desactivated')]));
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
