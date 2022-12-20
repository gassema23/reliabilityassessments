<div>
    <form wire:submit.prevent="save">
        <x-errors class="my-4"/>
        <div class="mt-4">
            <x-input wire:model.defer="employe_id" :label="Str::ucfirst(__('generals.forms.employee-id'))"
                     :value="old('employe_id')"/>
        </div>
        <div class="mt-4">
            <x-input wire:model.defer="f_name" :label="Str::ucfirst(__('generals.forms.f-name'))"
                     :value="old('f_name')"/>
        </div>
        <div class="mt-4">
            <x-input wire:model.defer="l_name" :label="Str::ucfirst(__('generals.forms.l-name'))"
                     :value="old('l_name')"/>
        </div>
        <div class="mt-4">
            <x-input wire:model.defer="p_number" :label="Str::ucfirst(__('generals.forms.p-number'))"
                     :value="old('p_number')"/>
        </div>
        <div class="mt-4">
            <x-input wire:model.defer="email" :label="Str::ucfirst(__('generals.forms.email'))" :value="old('email')"/>
        </div>
        <div class="mt-4">
            <x-select
                :label="Str::ucfirst(__('generals.forms.teams'))"
                :placeholder="__('cruds.forms.inputs.select')"
                :async-data="route('api.teams.index')"
                option-label="team_name"
                :value="old('team_id')"
                option-value="id"
                wire:model.defer="team_id"
            />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-inputs.password wire:model.defer="password" :label="Str::ucfirst(__('generals.forms.password'))"/>
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-inputs.password wire:model.defer="password_confirmation"
                               :label="Str::ucfirst(__('generals.forms.confirm-password'))"/>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-slate-600 hover:text-slate-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
               href="{{ route('login') }}">
                {{ Str::ucfirst(__('generals.titles.already-register')) }}
            </a>
        </div>
        <x-button type="button" wire:click="save" spinner squared positive
                  :label="Str::ucfirst(__('generals.titles.register'))"
                  class="block w-full mt-4"/>
    </form>
</div>
