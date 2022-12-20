<div>
    <x-errors class="mb-4 "/>
    <x-form wire:submit.prevent="save">
        <x-slot name="title">
            {{ __('generals.texts.title-update',['name'=> __('generals.titles.task')]) }}
        </x-slot>
        <x-slot name="description">
            {{ __('generals.texts.descriptions-update',['name'=> __('generals.titles.task')]) }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-input wire:model.defer="tasks.task_name"
                         :label="__('generals.tables.name',['name'=>__('generals.titles.task')])"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-select
                    :label="Str::ucfirst(__('generals.titles.technology'))"
                    :placeholder="Str::ucfirst(__('generals.forms.selections'))"
                    :async-data="route('api.technologies.index')"
                    option-label="technology_name"
                    wire:model.defer="tasks.technology_id"
                    option-value="id"
                />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button type="button" wire:click="save" squared spinner positive
                      :label="Str::title(__('generals.titles.save'))"/>
        </x-slot>
    </x-form>
</div>
