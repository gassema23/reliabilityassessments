<?php

namespace App\Http\Livewire\SuperAdmin\Settings\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserEdit extends Component
{

    public User $users;

    public function mount(User $users)
    {
        $this->users = $users;
    }

    protected function rules()
    {
        return [
            'users.f_name'     => [
                'required',
                'max:125'
            ],
            'users.l_name'     => [
                'required',
                'max:125'
            ],
            'users.email'      => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->users->id)
            ],
            'users.p_number'   => [
                function ($attribute, $value, $fail) {
                    $pattern = '[0-9]{3}[0-9]{3}[0-9]{4}';
                    $regex = '/^('.$pattern.')$/u';
                    if ($value != '' && !preg_match($regex, $value)) {
                        $fail(__('cruds.forms.validations.phonenumber'));
                    }
                }
            ],
            'users.employe_id' => [
                'required',
                'max:7',
                'min:7',
                Rule::unique('users')->ignore($this->users->id),
                function ($attribute, $value, $fail) {
                    $pattern = '(t|T)([0-9]{6})';
                    $regex = '/^('.$pattern.')$/u';
                    if ($value != '' && !preg_match($regex, $value)) {
                        $fail(__('cruds.forms.validations.employeid'));
                    }
                }
            ],
            'users.team_id'    => 'required',
            'users.role_id'    => 'nullable'
        ];
    }

    public function save()
    {
        $this->users->update($this->validate());
        return redirect()->route('super-admin.settings.users.index')->with('success',
            __('generals.notifications.success', ['type' => __('generals.titles.updated')]));
    }

    public function render()
    {
        return view('livewire.super-admin.settings.users.user-edit');
    }
}
