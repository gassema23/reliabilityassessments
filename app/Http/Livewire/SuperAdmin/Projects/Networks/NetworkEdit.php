<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use Illuminate\Validation\Rule;
use Livewire\Component;

class NetworkEdit extends Component
{
    public Network $networks;

    public function mount(Network $networks)
    {
        $this->networks = $networks;
    }

    protected function rules()
    {
        return [
            'networks.project_id'          => [
                'required',
            ],
            'networks.city_id'             => [
                'required',
            ],
            'networks.technology_id'       => [
                'required',
            ],
            'networks.network_no'          => [
                'required',
                Rule::unique('networks')->ignore($this->networks->id),
            ],
            'networks.network_element'     => [
                'required',
                Rule::unique('networks')->ignore($this->networks->id),
            ],
            'networks.network_name'        => [
                'required',
                'max:125'
            ],
            'networks.network_description' => [
                'nullable',
            ],
            'networks.network_due_date'    => [
                'required',
                'date'
            ],
        ];
    }

    public function save()
    {
        $this->networks->update($this->validate());
        return redirect()->route('super-admin.projects.networks.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.networks.network-edit');
    }
}
