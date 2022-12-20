<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Countries;

use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $countries;


    /**
     * @param $countries
     *
     * @return void
     */
    public function mount($countries)
    {
        $this->countries = Country::findOrFail($countries);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->countries->delete();
        return redirect()->route('super-admin.localizations.countries.index')->with('success',
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
                ['name' => __('generals.titles.country')])),
            'message' => Str::ucfirst(__('generals.texts.descriptions-desactivate',
                ['name' => __('generals.titles.country')])),
        ]);
    }
}
