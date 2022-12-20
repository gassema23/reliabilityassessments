<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Cities;

use App\Models\City;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CityEdit extends Component
{

    public $country_id = null;
    public $state_id = null;
    public City $cities;

    public function mount(City $cities)
    {
        $this->cities = $cities;
        $this->country_id = $cities->area->state->country_id;
        $this->state_id = $cities->area->state_id;
    }


    protected function rules()
    {
        return [
            'cities.clli'      => [
                'required',
                'max:10',
                Rule::unique('cities')->ignore($this->cities->id)
            ],
            'cities.city_name' => [
                'required',
                'max:125'
            ],
            'cities.latitude'  => [
                'numeric',
                'nullable',
                'required_with:longitude',
                'between:-90,90'
            ],
            'cities.longitude' => [
                'numeric',
                'nullable',
                'required_with:latitude',
                'between:-180,180'
            ],
            'cities.area_id'   => [
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
        $this->cities->update($this->validate());
        return redirect()->route('super-admin.localizations.cities.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.cities.city-edit');
    }
}
