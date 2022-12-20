<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;


class Register extends Component
{
    public $f_name, $l_name, $email, $employe_id, $p_number, $team_id, $password, $password_confirmation;

    protected function rules()
    {
        return [
            'f_name'     => [
                'required',
                'max:125'
            ],
            'l_name'     => [
                'required',
                'max:125'
            ],
            'email'      => [
                'required',
                'email',
                Rule::unique('users')
            ],
            'p_number'   => [
                function ($attribute, $value, $fail) {
                    $pattern = '[0-9]{3}[0-9]{3}[0-9]{4}';
                    $regex = '/^('.$pattern.')$/u';
                    if ($value != '' && !preg_match($regex, $value)) {
                        $fail(__('generals.validations.invalid', ['type' => __('generals.tables.phone-number')]));
                    }
                }
            ],
            'employe_id' => [
                'required',
                'max:7',
                'min:7',
                Rule::unique('users'),
                function ($attribute, $value, $fail) {
                    $pattern = '(t|T)([0-9]{6})';
                    $regex = '/^('.$pattern.')$/u';
                    if ($value != '' && !preg_match($regex, $value)) {
                        $fail(__('generals.validations.invalid', ['type' => __('generals.tables.employee-id')]));
                    }
                }
            ],
            'team_id'    => 'required',
            'password'   => ['required', 'confirmed', Password::min(8)->uncompromised()]
        ];
    }

    public function save()
    {
        if($this->validate()) {
            User::create([
                'email'      => $this->email,
                'f_name'     => $this->f_name,
                'l_name'     => $this->l_name,
                'employe_id' => $this->employe_id,
                'p_number'   => $this->p_number,
                'team_id'    => $this->team_id,
                'password'   => Hash::make($this->password),
                'role_id'    => '97fcf79e-fcaa-4abb-9161-b616623813a5'
            ]);
            return redirect()->route('login')->with('success', 'generals.notifications.register');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
