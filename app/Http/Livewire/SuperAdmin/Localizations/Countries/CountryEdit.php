<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Countries;

use App\Models\Country;
use Livewire\Component;

class CountryEdit extends Component
{
    public Country $country;

    public function mount(Country $country)
    {
        $this->country = $country;
    }

    protected function rules()
    {
        return [
            'country.country_name'      => [
                'required',
                'max:125'
            ],
            'country.country_shortname' => [
                'nullable',
                'max:5'
            ],
            'country.phone_code'        => [
                'nullable',
                'numeric'
            ],
        ];
    }

    public function save()
    {
        $this->country->update($this->validate());
        return redirect()->route('super-admin.localizations.countries.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.countries.country-edit');
    }
}
