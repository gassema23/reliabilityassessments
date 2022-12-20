<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Statuses;

use App\Models\Status;
use Illuminate\Validation\Rule;
use Livewire\Component;

class StatusUpdate extends Component
{
    public Status $statuses;

    public function mount(Status $statuses)
    {
        $this->statuses = $statuses;
    }

    protected function rules()
    {
        return [
            'statuses.status_name' => [
                'required',
                'max:125',
                Rule::unique('statuses')->ignore($this->statuses->id),
            ],
            'statuses.color'       => [
                'required',
                'max:100',
                Rule::unique('statuses')->ignore($this->statuses->id),
                'regex:/^(#(?:[0-9a-f]{2}){2,4}|#[0-9a-f]{3}|(?:rgba?|hsla?)\((?:\d+%?(?:deg|rad|grad|turn)?(?:,|\s)+){2,3}[\s\/]*[\d\.]+%?\))$/i',
            ]
        ];
    }

    public function save()
    {
        $this->statuses->update($this->validate());
        return redirect()->route('super-admin.settings.statuses.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.settings.statuses.status-update');
    }
}
