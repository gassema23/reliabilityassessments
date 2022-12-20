<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Statuses;

use App\Models\Status;
use Illuminate\Validation\Rule;
use Livewire\Component;

class StatusCreate extends Component
{
    public $status_name;
    public $color;

    protected function rules()
    {
        return [
            'status_name' => [
                'required',
                'max:125',
                Rule::unique('statuses'),
            ],
            'color'       => [
                'required',
                'max:100',
                Rule::unique('statuses'),
                'regex:/^(#(?:[0-9a-f]{2}){2,4}|#[0-9a-f]{3}|(?:rgba?|hsla?)\((?:\d+%?(?:deg|rad|grad|turn)?(?:,|\s)+){2,3}[\s\/]*[\d\.]+%?\))$/i',
            ]
        ];
    }

    public function save()
    {
        Status::create($this->validate());
        return redirect()->route('super-admin.settings.statuses.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.created')]));
    }

    public function render()
    {
        return view('livewire.super-admin.settings.statuses.status-create');
    }
}
