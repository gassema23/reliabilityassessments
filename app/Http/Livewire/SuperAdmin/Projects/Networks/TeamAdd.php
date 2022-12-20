<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use App\Models\Status;
use LivewireUI\Modal\ModalComponent;

class TeamAdd extends ModalComponent
{
    public $teams = [];
    public $network, $status;

    public function mount($network_id)
    {
        $this->network = Network::findOrFail($network_id);
        $this->status = Status::where('status_name', 'LIKE', 'Open')->first();
    }

    protected $rules = ['teams' => 'required'];

    public function save()
    {
        foreach ($this->validate() as $team) {
            $this->network->teams()->attach($team);
        }
        $this->forceClose()->closeModal();
        return redirect()->route('super-admin.projects.networks.show',[$this->network->id])->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.desactivated')]));
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
