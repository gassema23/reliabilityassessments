<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\States;

use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $states;


    /**
     * @param $states
     *
     * @return void
     */
    public function mount($states)
    {
        $this->states = State::findOrFail($states);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->states->delete();
        return redirect()->route('super-admin.localizations.states.index')->with('success',
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
            'title'   => Str::ucfirst(__('generals.texts.title-desactivate',
                ['name' => __('generals.titles.state')])),
            'message' => Str::ucfirst(__('generals.texts.descriptions-desactivate',
                ['name' => __('generals.titles.state')])),
        ]);
    }
}
