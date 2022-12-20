<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use App\Models\Team;
use LivewireUI\Modal\ModalComponent;

class TeamAdd extends ModalComponent
{
    public $teams;
    public $team_id = [];
    public $network;

    public function mount($network_id)
    {
        $this->teams = Team::all();
        $this->network = Network::where('id', $network_id)->first();
    }

    protected $rules = ['team_id' => 'required'];

    public function save()
    {
        foreach ($this->validate() as $team) {
            $this->network->teams()->sync($team, false);
        }
        $this->closeModalWithEvents([
            'save'
        ]);
    }

    public function close()
    {
        $this->forceClose()->closeModal();
    }

    public function render()
    {
        return view('livewire.super-admin.projects.networks.team-add');
    }
}
