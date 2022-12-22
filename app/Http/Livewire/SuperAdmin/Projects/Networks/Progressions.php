<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Progressions extends Component
{
    public Network $network;

    public function mount(Network $network)
    {
        $this->network = $network;
    }

    public function render()
    {
        return view('livewire.super-admin.projects.networks.progressions');
    }
}
