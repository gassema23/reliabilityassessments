<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Areas;

use App\Models\Area;
use Livewire\Component;

class AreaEdit extends Component
{
    public $country_id = null;
    public $state_id = null;
    public Area $area;

    public function mount(Area $area)
    {
        $this->area = $area;
        $this->country_id = $area->state->country_id;
    }

    protected function rules()
    {
        return [
            'area.area_name'      => [
                'required',
                'max:125'
            ],
            'area.area_shortname' => [
                'nullable',
                'max:5'
            ],
            'area.state_id'       => [
                'required',
            ],
        ];
    }

    public function updatedCountryId($country_id)
    {
        $this->area->state_id = null;
    }

    public function save()
    {
        $this->area->update($this->validate());
        return redirect()->route('super-admin.localizations.areas.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.areas.area-edit');
    }
}
