<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Technologies;

use App\Models\Technology;
use Livewire\Component;

class TechnologyEdit extends Component
{

    public Technology $technology;

    public function mount(Technology $technology)
    {
        $this->technology = $technology;
    }

    protected function rules()
    {
        return [
            'technology.technology_name' => [
                'required',
                'max:125'
            ],
        ];
    }

    public function save()
    {
        $this->technology->update($this->validate());
        return redirect()->route('super-admin.settings.technologies.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.settings.technologies.technology-edit');
    }
}
