<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Cities;

use App\Models\City;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CityCreate extends Component
{
    public $clli;
    public $city_name;
    public $longitude;
    public $latitude;
    public $country_id = null;
    public $state_id = null;
    public $area_id = null;


    protected function rules()
    {
        return [
            'clli'      => [
                'required',
                'max:10',
                Rule::unique('cities')
            ],
            'city_name' => [
                'required',
                'max:125'
            ],
            'latitude'  => [
                'numeric',

                'nullable',
                'required_with:longitude',
                'between:-90,90'
            ],
            'longitude' => [
                'numeric',
                'nullable',
                'required_with:latitude',
                'between:-180,180'
            ],
            'area_id'   => [
                'required'
            ]
        ];
    }

    public function updatedCountryId($country_id)
    {
        $this->state_id = null;
    }

    public function updatedStateId($state_id)
    {
        $this->area_id = null;
    }

    public function save()
    {
        City::create($this->validate());
        return redirect()->route('super-admin.localizations.cities.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.cities.city-create');
    }
}
