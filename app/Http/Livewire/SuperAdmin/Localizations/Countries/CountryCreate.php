<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\Countries;

use App\Models\Country;
use Livewire\Component;

class CountryCreate extends Component
{
    public $country_name;
    public $country_shortname;
    public $phone_code;

    protected function rules()
    {
        return [
            'country_name'      => [
                'required',
                'max:125'
            ],
            'country_shortname' => [
                'nullable',
                'max:5'
            ],
            'phone_code'        => [
                'nullable',
                'numeric'
            ],
        ];
    }

    public function save()
    {
        Country::create($this->validate());
        return redirect()->route('super-admin.localizations.countries.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.countries.country-create');
    }
}
