<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use App\Models\User;
use App\Notifications\AssignedNetworkNotification;
use Illuminate\Support\Facades\Notification;
use LivewireUI\Modal\ModalComponent;

class TeamAdd extends ModalComponent
{
    public $teams = [];
    public $network;

    public function mount($network_id)
    {
        $this->network = Network::findOrFail($network_id);
        foreach ($this->network->teams as $team) {
            if ($team->pivot->network_id === $network_id) {
                $this->teams[] = $team->id;
            }
        }
    }

    protected $rules = ['teams' => 'required'];

    public function save()
    {
        foreach ($this->validate() as $team) {
            $this->network->teams()->sync($team);
            $users = User::where('team_id', $team)->get();
            foreach ($users as $user) {
                Notification::send($user, new AssignedNetworkNotification($this->network, $user));
                usleep(500000); //use usleep(500000) for half a second or less
            }
        }
        $this->forceClose()->closeModal();
        return redirect()->route('super-admin.projects.networks.show', [$this->network->id])->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
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
