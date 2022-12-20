<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Cities;

use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $city;

    /**
     * @param $states
     *
     * @return void
     */
    public function mount($city)
    {
        $this->city = City::findOrFail($city);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->city->delete();
        return redirect()->route('super-admin.localizations.cities.index')->with('success',
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
                ['name' => __('generals.titles.city')])),
            'message' => Str::ucfirst(__('generals.texts.descriptions-desactivate',
                ['name' => __('generals.titles.city')])),
        ]);
    }
}
