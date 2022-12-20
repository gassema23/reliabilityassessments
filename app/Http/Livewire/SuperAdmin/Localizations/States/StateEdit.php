<?php

namespace App\Http\Livewire\SuperAdmin\Localizations\States;

use App\Models\State;
use Livewire\Component;

class StateEdit extends Component
{
    public State $state;

    public function mount(State $state)
    {
        $this->state = $state;
    }

    protected function rules()
    {
        return [
            'state.state_name'      => [
                'required',
                'max:125'
            ],
            'state.state_shortname' => [
                'nullable',
                'max:5'
            ],
            'state.country_id'      => [
                'required',
            ],
        ];
    }

    public function save()
    {
        $this->state->update($this->validate());
        return redirect()->route('super-admin.localizations.states.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.localizations.states.state-edit');
    }
}
