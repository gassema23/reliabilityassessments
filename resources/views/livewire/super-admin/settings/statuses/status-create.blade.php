<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-create',['name'=> __('generals.titles.status')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-create',['name'=> __('generals.titles.status')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="status_name"
                         :label="__('generals.tables.name',['name'=>__('generals.titles.status')])"
                         :value="old('status_name')"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-color-picker wire:model.defer="color"
                                :label="Str::ucfirst(__('generals.forms.selected',['name'=>__('generals.titles.color')]))"
                                :value="old('color')"

                />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
