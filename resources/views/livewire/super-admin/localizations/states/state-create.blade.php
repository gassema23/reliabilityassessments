<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-create',['name'=> __('generals.titles.state')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-create',['name'=> __('generals.titles.state')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="state_name"
                         :label="__('generals.tables.name',['name'=>__('generals.titles.state')])"
                         :value="old('state_name')"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="state_shortname" :value="old('state_shortname')"
                         :label="__('generals.tables.short-name',['name'=>__('generals.titles.state')])"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.forms.countries'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.countries.index')"
                    option-label="country_name"
                    wire:model.defer="country_id"
                    option-value="id"
                    name="country_id"
                />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
