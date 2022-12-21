<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use LivewireUI\Modal\ModalComponent;

class TeamDelete extends ModalComponent
{

    public $network;
    public $teams = [];

    /**
     * @param $network
     *
     * @return void
     */
    public function mount($network_id, $team_id)
    {
        $this->network = Network::findOrFail($network_id);
        $this->teams = Team::findOrFail($team_id)
            ->whereHas('networks', function ($query) use ($team_id) {
                $query->where('team_id', $team_id);
            })->get();
        //dump($this->teams);
    }

    protected $listeners = ['team-delete' => 'delete'];

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->network->teams()->detach($this->teams);
        $this->forceClose()->closeModal();
        return redirect()->route('super-admin.projects.networks.show', [$this->network->id])->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.desactivated')]));
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
            'title'   => __('generals.texts.title-desactivate', ['name' => __('generals.titles.team')]),
            'message' => __('generals.texts.descriptions-desactivate', ['name' => __('generals.titles.team')])
        ]);
    }
}
