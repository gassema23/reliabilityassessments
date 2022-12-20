<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-update',['name'=>$users->name->FullName()]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-update',['name'=>__('generals.titles.user')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="users.employe_id" :label="Str::ucfirst(__('generals.forms.employee-id'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="users.f_name" :label="Str::ucfirst(__('generals.forms.f-name'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="users.l_name" :label="Str::ucfirst(__('generals.forms.l-name'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="users.p_number" :label="Str::ucfirst(__('generals.forms.p-number'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="users.email" :label="Str::ucfirst(__('generals.forms.email'))"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.teams'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.teams.index')"
                    option-label="team_name"
                    wire:model.defer="users.team_id"
                    option-value="id"
                    name="team_id"
                />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.roles'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.roles.index')"
                    option-label="role_name"
                    wire:model.defer="users.role_id"
                    option-value="id"
                    name="role_id"
                />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive :label="Str::ucfirst(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
