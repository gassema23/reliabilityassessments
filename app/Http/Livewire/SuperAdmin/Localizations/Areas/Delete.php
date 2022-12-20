<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Areas;

use App\Models\Area;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public $area;


    /**
     * @param $area
     *
     * @return void
     */
    public function mount($area)
    {
        $this->countries = Area::findOrFail($area);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->countries->delete();
        return redirect()->route('super-admin.localizations.areas.index')->with('success',
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
                ['name' => __('generals.titles.area')])),
            'message' => Str::ucfirst(__('generals.texts.descriptions-desactivate',
                ['name' => __('generals.titles.area')])),
        ]);
    }
}
