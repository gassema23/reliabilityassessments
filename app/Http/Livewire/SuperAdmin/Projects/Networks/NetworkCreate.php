<?php

namespace App\Http\Livewire\SuperAdmin\Projects\Networks;

use App\Models\Network;
use Illuminate\Validation\Rule;
use Livewire\Component;

class NetworkCreate extends Component
{
    public $project_id, $city_id, $technology_id, $network_no, $network_element, $network_name, $network_description,
        $network_due_date;
    public $teams = [];

    protected function rules()
    {
        return [
            'project_id'          => [
                'required',
            ],
            'city_id'             => [
                'required',
            ],
            'technology_id'       => [
                'required',
            ],
            'network_no'          => [
                'required',
                Rule::unique('networks'),
            ],
            'network_element'     => [
                'required',
                Rule::unique('networks'),
            ],
            'network_name'        => [
                'required',
                'max:125'
            ],
            'network_description' => [
                'nullable',
            ],
            'network_due_date'    => [
                'required',
                'date'
            ],
            'teams'               => [
                'required',
            ],
        ];
    }

    public function save()
    {
        $this->validate();
        $network = Network::create([
            'project_id'          => $this->project_id,
            'city_id'             => $this->city_id,
            'technology_id'       => $this->technology_id,
            'network_no'          => $this->network_no,
            'network_element'     => $this->network_element,
            'network_name'        => $this->network_name,
            'network_description' => $this->network_description,
            'network_due_date'    => $this->network_due_date,
        ]);
        $network->teams()->attach($this->teams);
        return redirect()->route('super-admin.projects.networks.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.projects.networks.network-create');
    }
}
