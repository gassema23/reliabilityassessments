<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $network;

    /**
     * @param $project
     *
     * @return void
     */
    public function mount($network)
    {
        $this->network = Network::findOrFail($network);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->network->delete();
        return redirect()->route('super-admin.projects.networks.index')->with('success',
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
            'title'   => __('generals.texts.title-desactivate', ['name' => __('generals.titles.network')]),
            'message' => __('generals.texts.descriptions-desactivate', ['name' => __('generals.titles.network')])
        ]);
    }
}
