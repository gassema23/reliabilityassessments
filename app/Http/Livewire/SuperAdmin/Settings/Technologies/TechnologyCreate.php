<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Technologies;

use App\Models\Technology;
use Livewire\Component;

class TechnologyCreate extends Component
{

    public $technology_name;

    protected function rules()
    {
        return [
            'technology_name'      => [
                'required',
                'max:125'
            ],
        ];
    }

    public function save()
    {
        Technology::create($this->validate());
        return redirect()->route('super-admin.settings.technologies.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.settings.technologies.technology-create');
    }
}
