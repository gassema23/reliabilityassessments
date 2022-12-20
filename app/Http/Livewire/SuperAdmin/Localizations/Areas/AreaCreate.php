<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Areas;

use App\Models\Area;
use App\Models\State;
use Livewire\Component;

class AreaCreate extends Component
{
    public $area_name;
    public $area_shortname;
    public $selectedCountry = null;
    public $state_id = null;


    protected function rules()
    {
        return [
            'area_name'      => [
                'required',
                'max:125'
            ],
            'area_shortname' => [
                'nullable',
                'max:5'
            ],
            'state_id'       => [
                'required',
            ],
        ];
    }

    public function updatedSelectedCountry($country_id)
    {
        $this->state_id = null;
    }

    public function save()
    {
        Area::create($this->validate());
        return redirect()->route('super-admin.localizations.areas.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.areas.area-create');
    }
}
