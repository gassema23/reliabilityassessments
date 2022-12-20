<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-update',['name'=> __('generals.titles.country')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-update',['name'=> __('generals.titles.country')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="country.country_name"
                         :label="__('generals.tables.name',['name'=>__('generals.titles.country')])"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="country.country_shortname"
                         :label="__('generals.tables.short-name',['name'=>__('generals.titles.country')])"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="country.phone_code"
                         :label="__('generals.tables.phone-code',['name'=>__('generals.titles.country')])"/>
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
