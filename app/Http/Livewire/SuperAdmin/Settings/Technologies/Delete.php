<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Technologies;

use App\Models\Country;
use App\Models\Technology;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $technologies;

    /**
     * @param $countries
     *
     * @return void
     */
    public function mount($technologies)
    {
        $this->technologies = Technology::findOrFail($technologies);
    }

    /**
     * @return RedirectResponse
     */
    public function destroy()
    {
        $this->technologies->delete();
        return redirect()->route('super-admin.settings.technologies.index')->with('success',
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
                ['name' => __('generals.titles.technology')])),
            'message' => Str::ucfirst(__('generals.texts.descriptions-desactivate',
                ['name' => __('generals.titles.technology')])),
        ]);
    }
}
