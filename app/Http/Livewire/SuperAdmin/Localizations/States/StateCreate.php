<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\States;

use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class StateCreate extends Component
{
    public $state_name, $state_shortname, $country_id;

    protected function rules()
    {
        return [
            'state_name'      => [
                'required',
                'max:125'
            ],
            'state_shortname' => [
                'nullable',
                'max:5'
            ],
            'country_id'        => [
                'required',
            ],
        ];
    }

    public function save()
    {
        State::create($this->validate());
        return redirect()->route('super-admin.localizations.states.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.states.state-create');
    }
}
